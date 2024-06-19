<?php
require 'vendor/autoload.php';
require 'utils/db.php';

\Stripe\Stripe::setApiKey($env['STRIPE_SECRET_KEY']);

$input = json_decode(file_get_contents('php://input'), true);
$token = $input['token'];
$email = $input['email'];
$stripePriceId = $input['stripePriceId'];

if (isset($token) && isset($email) && isset($stripePriceId)) {
    try {
        $user = findRecord('users', ['email' => $email]);
        $product = findRecord('products', ['stripe_price_id' => $stripePriceId]);
        $existingSubscription = findRecord(
            'subscriptions',
            [
                'user_id' => $user['id'],
                'status' => 'active'
            ]
        );

        $stripeCustomerId = $user['stripe_customer_id'];

        if (!isset($stripeCustomerId)) {
            // Create a new customer
            $customer = \Stripe\Customer::create([
                'source' => $token,
                'email' => $email,
            ]);

            $stripeCustomerId = $customer->id;

            $updatedUser = updateRecord(
                'users',
                ['email' => $email],
                ['stripe_customer_id' => $stripeCustomerId]
            );
        }

        // Only create subscription if no subscription is currently active
        if (!isset($existingSubscription)) {
            // Create a new subscription
            $subscription = \Stripe\Subscription::create([
                'customer' => $stripeCustomerId,
                'items' => [
                    [
                        'price' => $stripePriceId,
                    ],
                ],
            ]);

            // Save the subscription in the DB
            $subscriptionRecord = createRecord(
                'subscriptions',
                [
                    'user_id' => $user['id'],
                    'product_id' => $product['id'],
                    'stripe_subscription_id' => $subscription->id,
                    'stripe_price_id' => $stripePriceId,
                    'status' => 'active',
                    'start_date' =>  date('Y-m-d H:i:s', $subscription->current_period_start),
                    'end_date' => date('Y-m-d H:i:s', $subscription->current_period_start)
                ]
            );

            echo json_encode(['success' => true, 'subscription' => $subscription]);
        } else {
            echo json_encode(['success' => false, 'message' => "Can't subscribe to the plan. You already have active subscription."]);
        }
    } catch (\Stripe\Exception\ApiErrorException $e) {
        echo json_encode(['error' => $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Insufficient arguments provided.']);
}

<?php
require 'vendor/autoload.php';
require 'utils/db.php';

\Stripe\Stripe::setApiKey($env['STRIPE_SECRET_KEY']);

$input = json_decode(file_get_contents('php://input'), true);
$token = $input['token'];
$email = $input['email'];
$stripePriceId = $input['stripePriceId'];
$discountCoupon = $input['discountCoupon'];

if (isset($token) && isset($email) && isset($stripePriceId)) {
    try {
        $user = findRecord('users', ['email' => $email]);
        $product = findRecord('products', ['stripe_price_id' => $stripePriceId]);

        $query = "
            SELECT 
                *
            FROM 
                subscriptions 
            INNER JOIN
                products
            ON
                subscriptions.product_id = products.id
            WHERE 
                subscriptions.user_id = {$user['id']}
            AND 
                subscriptions.status = 'active'
            AND 
                products.type = '{$product['type']}';
        ";

        $existingSubscription = runQuery($query) ?: null;

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
            $subscriptionData = [
                'customer' => $stripeCustomerId,
                'items' => [
                    [
                        'price' => $stripePriceId,
                    ],
                ],
            ];

            if (isset($discountCoupon)) {
                $subscriptionData['coupon'] = $discountCoupon;
            }

            // Create a new subscription
            $subscription = \Stripe\Subscription::create($subscriptionData);

            // Save the subscription in the DB
            $subscriptionRecord = createRecord(
                'subscriptions',
                [
                    'user_id' => $user['id'],
                    'product_id' => $product['id'],
                    'stripe_subscription_id' => $subscription->id,
                    'stripe_price_id' => $stripePriceId,
                    'status' => 'active',
                ]
            );

            echo json_encode(['success' => true, 'subscription' => $subscription]);
        } else {
            echo json_encode(['success' => false, 'message' => "Can't subscribe. You already have an active subscription for this product type."]);
        }
    } catch (\Stripe\Exception\ApiErrorException $e) {
        echo json_encode(['error' => $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Insufficient arguments provided.']);
}

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

        // Create a new subscription
        $subscription = \Stripe\Subscription::create([
            'customer' => $stripeCustomerId,
            'items' => [
                [
                    'price' => $stripePriceId,
                ],
            ],
        ]);

        echo json_encode(['success' => true, 'subscription' => $subscription]);
    } catch (\Stripe\Exception\ApiErrorException $e) {
        echo json_encode(['error' => $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Insufficient arguments provided.']);
}

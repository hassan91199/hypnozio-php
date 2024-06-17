<?php
require 'vendor/autoload.php';
require 'utils/functions.php';

\Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

$input = json_decode(file_get_contents('php://input'), true);
$token = $input['token'];
$email = $input['email'];
$stripePriceId = $input['stripePriceId'];

try {
    // Create a new customer
    $customer = \Stripe\Customer::create([
        'source' => $token,
        'email' => $email,
    ]);

    // Create a new subscription
    $subscription = \Stripe\Subscription::create([
        'customer' => $customer->id,
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

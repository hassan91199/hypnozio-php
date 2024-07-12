<?php
require 'vendor/autoload.php';
require 'utils/db.php';

\Stripe\Stripe::setApiKey($env['STRIPE_SECRET_KEY']);

$endpoint_secret = $env['STRIPE_WEBHOOK_SECRET'];

$payload = @file_get_contents('php://input');
$sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
$event = null;

try {
    $event = \Stripe\Webhook::constructEvent(
        $payload,
        $sig_header,
        $endpoint_secret
    );
} catch (\UnexpectedValueException $e) {
    var_dump("Invalid payload: {$e->getMessage()}");
    http_response_code(400);
    exit();
} catch (\Stripe\Exception\SignatureVerificationException $e) {
    var_dump("Invalid signature: {$e->getMessage()}");
    http_response_code(400);
    exit();
}

switch ($event->type) {
    case 'customer.subscription.updated':
    case 'customer.subscription.deleted':
        $subscription = $event->data->object;
        $stripeSubscriptionId = $subscription->id;

        $subscriptionExists = findRecord('subscriptions', ['stripe_subscription_id' => $stripeSubscriptionId]);

        if (isset($subscriptionExists)) {
            $status = $subscription->status;

            $updatedSubscription = updateRecord(
                'subscriptions',
                ['stripe_subscription_id' => $stripeSubscriptionId],
                [
                    'status' => $status,
                ]
            );
            var_dump("Subscription updated successfully.");
        }
        var_dump("This subscription doesn't exists.");
        break;

    default:
        var_dump("This subscription doesn't exists.");
        break;
}

http_response_code(200);

<?php
require(__DIR__ . '/../vendor/autoload.php');
require(__DIR__ . '/../utils/db.php');
session_start();

\Stripe\Stripe::setApiKey($env['STRIPE_SECRET_KEY']);

header('Content-Type: application/json');

$input = json_decode(file_get_contents('php://input'), true);

$stripeSubscriptionId = $input['stripe_subscription_id'];

try {
    // Cancel the subscription
    $subscription = \Stripe\Subscription::retrieve($stripeSubscriptionId);
    $canceledSubscription = $subscription->cancel();

    // Update the subscription in the db
    $updatedSubscription = updateRecord(
        'subscriptions',
        ['stripe_subscription_id' => $stripeSubscriptionId],
        [
            'status' => $canceledSubscription->status,
        ]
    );

    // Retrieve the latest invoice for the subscription
    $invoices = \Stripe\Invoice::all([
        'subscription' => $stripeSubscriptionId,
        'limit' => 1,
    ]);

    if (count($invoices->data) > 0) {
        $invoice = $invoices->data[0];
        $paymentIntentId = $invoice->payment_intent;

        // Retrieve the PaymentIntent
        $paymentIntent = \Stripe\PaymentIntent::retrieve($paymentIntentId);

        // Refund the PaymentIntent
        $refund = \Stripe\Refund::create([
            'payment_intent' => $paymentIntentId,
            'amount' => $paymentIntent->amount, // Refund the full amount
        ]);

        $_SESSION['SESSION_MESSAGE'] = [
            'status' => 'success',
            'message' => 'Subscription cancelled and refund issued successfully.'
        ];
    } else {
        $_SESSION['SESSION_MESSAGE'] = [
            'status' => 'error',
            'message' => 'No invoices found for this subscription.',
        ];
    }
} catch (\Stripe\Exception\ApiErrorException $e) {
    $_SESSION['SESSION_MESSAGE'] = [
        'status' => 'error',
        'message' => 'There was an error canceling the subscription.' . $e->getMessage(),
    ];
} finally {
    echo json_encode([
        'message' => 'Script ended successfully'
    ]);
}

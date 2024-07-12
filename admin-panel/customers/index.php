<?php
require(__DIR__ . '/../../utils/db.php');
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: " . $env['BASE_URL'] . "admin-panel/login.php");
    exit();
}

$sessionMessage = $_SESSION['SESSION_MESSAGE'] ?? null;
$showSessionMessage = false;
if (isset($sessionMessage)) {
    $showSessionMessage = true;
    unset($_SESSION['SESSION_MESSAGE']);
}

$query = "
    SELECT 
        users.email,
        products.name,
        products.type,
        subscriptions.status,
        subscriptions.stripe_subscription_id
    FROM 
        users
    INNER JOIN 
        subscriptions
    ON 
        users.id = subscriptions.user_id
    INNER JOIN 
        products
    ON 
        subscriptions.product_id = products.id;
";

$customers = runQuery($query);
?>

<!DOCTYPE html>
<html lang="en" class="">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <link rel="icon" type="image/x-icon" href="/assets/icons/logo.svg" />

    <title>Admin Panel</title>

    <link rel="preload" as="style" href="/assets/css/app.css" />
    <link rel="stylesheet" href="/assets/css/app.css" data-navigate-track="reload" />
    <link rel="modulepreload" href="/assets/js/app-5f69faf4.js" />
    <link rel="modulepreload" href="/assets/js/bootstrap-214fcc70.js" />
    <link rel="modulepreload" href="/assets/js/jquery-2c3981e2.js" />
    <link rel="modulepreload" href="/assets/js/module.esm-958008ac.js" />
    <link rel="modulepreload" href="/assets/js/_commonjsHelpers-de833af9.js" />
    <link rel="modulepreload" href="/assets/js/jquery-68c15ecd.js" />
    <script type="module" src="/assets/js/app-5f69faf4.js" data-navigate-track="reload"></script>
    <link rel="modulepreload" href="/assets/js/cookies-ee50a713.js" />
    <script type="module" src="/assets/js/cookies-ee50a713.js" data-navigate-track="reload"></script>
    <link rel="modulepreload" href="/assets/js/gtm-tags-e2664de5.js" />
    <script type="module" src="/assets/js/gtm-tags-e2664de5.js" data-navigate-track="reload"></script>
    <link rel="modulepreload" href="/assets/js/alpine-js-2881bf21.js" />
    <link rel="modulepreload" href="/assets/js/module.esm-958008ac.js" />
    <script type="module" src="/assets/js/alpine-js-2881bf21.js" data-navigate-track="reload"></script>
</head>

<body class="antialiased bg-surface text-onSurface scroll-smooth">
    <nav class="relative">
        <div x-data="{
						navigationIsOpened: false,
						}" class="container text-white py-4 md:py-5">
            <div class="flex justify-between items-center">
                <img src="/assets/icons/logo.svg" class="" alt="" />
                <div class="flex items-center space-x-4">
                    <div x-show="!navigationIsOpened" x-on:click="navigationIsOpened = !navigationIsOpened">
                        <div class="text-onSurface cursor-pointer">
                            <svg class="w-6 h-6 md:w-8 md:h-8" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M3 8V6H21V8H3ZM3 13H21V11H3V13ZM3 18H21V16H3V18Z" fill="currentColor"></path>
                            </svg>
                        </div>
                    </div>
                    <div x-show="navigationIsOpened" class="fixed top-0 bottom-0 left-0 w-screen h-screen overflow-hidden nav-bg z-50" style="display: none">
                        <div x-show="navigationIsOpened" x-transition:enter="transition duration-300 transform ease-out" x-transition:enter-start="opacity-0 translate-x-full" x-transition:enter-end="opacity-100 translate-x-0" x-transition:leave="transition duration-300 transform ease-in" x-transition:leave-start="opacity-100 translate-x-0" x-transition:leave-end="opacity-0 translate-x-full" class="w-[279px] bg-white rounded-l-[64px] ml-auto mr-0 flex h-full flex-col" style="display: none">
                            <div class="px-4 py-2">
                                <svg class="ml-auto mr-0 cursor-pointer" x-on:click="navigationIsOpened = !navigationIsOpened" width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.29844 25.0999L6.89844 23.6999L14.5984 15.9999L6.89844 8.2999L8.29844 6.8999L15.9984 14.5999L23.6984 6.8999L25.0984 8.2999L17.3984 15.9999L25.0984 23.6999L23.6984 25.0999L15.9984 17.3999L8.29844 25.0999Z" fill="#1B1B1F"></path>
                                </svg>
                                <div class="space-y-6 pt-10 pb-8">
                                    <a href="/admin-panel/customers">
                                        <div class="flex justify-center">
                                            <div class="ml-1 text-onSurface">
                                                Customers
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <hr class="text-neutral-70 w-full" />
                                <div class="space-y-6 pt-10 pb-8">
                                    <a href="/admin-panel/logout.php">
                                        <div class="flex justify-center">
                                            <div class="ml-1 text-onSurface">
                                                Logout
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div>
        <div class="mt-4 md:mt-8 pb-10 md:pb-20 lg:pb-8">
            <div class="container">
                <div class="basis-full lg:basis-1/2 lg:pr-12">
                    <div class="text-headline-medium sm:text-display-small xl:text-display-medium">
                        Customers
                    </div>
                </div>
                <div class="overflow-auto">
                    <?php if ($showSessionMessage === true) : ?>
                        <div id="session-message" class="w-full my-5 message <?= $sessionMessage['status'] ?>">
                            <?= $sessionMessage['message'] ?>
                        </div>
                    <?php endif; ?>

                    <table class="w-full my-5">
                        <tr>
                            <th>Email</th>
                            <th>Product</th>
                            <th>Type</th>
                            <th>Subscription Status</th>
                            <th>Actions</th>
                        </tr>

                        <?php foreach ($customers as $customer) : ?>
                            <tr>
                                <td><?= $customer['email'] ?></td>
                                <td><?= $customer['name'] ?></td>
                                <td><?= $customer['type'] ?></td>
                                <td><?= $customer['status'] ?></td>
                                <td>
                                    <?php if ($customer['status'] === 'active') : ?>
                                        <button id="cancel-subscription-btn" type="submit" class="hover:opacity-60" title="Cancel Subscription" data-stripe-subscription-id="<?= $customer['stripe_subscription_id'] ?>" onclick="handleCancelSubscription(this)">
                                            <svg class="w-6 h-6 cancel-subscription-icon feather feather-x-circle" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <circle cx="12" cy="12" r="10"></circle>
                                                <line x1="15" y1="9" x2="9" y2="15"></line>
                                                <line x1="9" y1="9" x2="15" y2="15"></line>
                                            </svg>
                                            <svg class="w-6 h-6 cancel-subscription-spinner hidden text-white/80 animate-spin fill-primary" aria-hidden="true" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor" />
                                                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill" />
                                            </svg>
                                        </button>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        function handleCancelSubscription(button) {
            // Disable the button to avoid unnecessary cancelations
            button.disabled = true;

            const cancelIcon = button.querySelector('.cancel-subscription-icon');
            const spinner = button.querySelector('.cancel-subscription-spinner');

            // Show the spinner
            cancelIcon.classList.add('hidden');
            spinner.classList.remove('hidden');

            const stripeSubscriptionId = button.getAttribute('data-stripe-subscription-id');
            const url = '/stripe/cancel-subscription.php';

            fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    stripe_subscription_id: stripeSubscriptionId,
                }),
            }).then(response => {
                return response.json();
            }).then(result => {
                location.reload();
            });
        }

        document.addEventListener("DOMContentLoaded", function() {
            const messageElement = document.getElementById("session-message");
            if (messageElement) {
                setTimeout(function() {
                    messageElement.style.display = "none";
                }, 5000);
            }
        });
    </script>

</body>

</html>
<?php
require(__DIR__ . '/../utils/functions.php');
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

<body dir="ltr" class="antialiased h-full scroll-smooth">
    <div class="pt-16 lg:pt-24 pb-16">
        <div class="container">
            <div class="flex flex-wrap justify-center">
                <div class="basis-full sm:basis-10/12 md:basis-1/2 lg:basis-1/3 mx-auto">
                    <div class="text-headline-medium text-center sm:text-display-small xl:text-display-medium">
                        Admin Login
                    </div>
                    <form action="/admin-panel/authenticate.php" method="POST" id="login-form" class="mt-4">
                        <div class="space-y-6">
                            <div class="relative z-0 w-full group input-text-2 rounded-[4px] text-onSurface">
                                <input id="username" type="text" name="username" placeholder="Enter Username" required />
                            </div>
                            <div class="relative z-0 w-full group input-text-2 rounded-[4px] text-onSurface">
                                <input id="password" name="password" type="password" placeholder="Enter password" required />
                            </div>
                        </div>

                        <button class="btn relative btn-secondary mt-10" type="submit">
                            Login
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
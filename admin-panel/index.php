<?php
require(__DIR__ . '/../utils/functions.php');
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: " . env('BASE_URL') . "/admin-panel/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en" class="">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <link rel="icon" type="image/x-icon" href="assets/icons/logo.svg" />

    <title>Admin Panel</title>

    <link rel="preload" as="style" href="assets/css/app-b0fb382d.css" />
    <link rel="stylesheet" href="assets/css/app-b0fb382d.css" data-navigate-track="reload" />
    <link rel="modulepreload" href="assets/js/app-5f69faf4.js" />
    <link rel="modulepreload" href="assets/js/bootstrap-214fcc70.js" />
    <link rel="modulepreload" href="assets/js/jquery-2c3981e2.js" />
    <link rel="modulepreload" href="assets/js/module.esm-958008ac.js" />
    <link rel="modulepreload" href="assets/js/_commonjsHelpers-de833af9.js" />
    <link rel="modulepreload" href="assets/js/jquery-68c15ecd.js" />
    <script type="module" src="assets/js/app-5f69faf4.js" data-navigate-track="reload"></script>
    <link rel="modulepreload" href="assets/js/cookies-ee50a713.js" />
    <script type="module" src="assets/js/cookies-ee50a713.js" data-navigate-track="reload"></script>
    <link rel="modulepreload" href="assets/js/gtm-tags-e2664de5.js" />
    <script type="module" src="assets/js/gtm-tags-e2664de5.js" data-navigate-track="reload"></script>
    <link rel="modulepreload" href="assets/js/alpine-js-2881bf21.js" />
    <link rel="modulepreload" href="assets/js/module.esm-958008ac.js" />
    <script type="module" src="assets/js/alpine-js-2881bf21.js" data-navigate-track="reload"></script>
</head>

<body class="antialiased bg-surface text-onSurface scroll-smooth">
    <nav class="relative">
        <div x-data="{
						navigationIsOpened: false,
						}" class="container text-white py-4 md:py-5">
            <div class="flex justify-between items-center">
                <img src="assets/icons/logo.svg" class="" alt="" />
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

    <div class="lg:h-min lg:min-h-screen">
        <div class="mt-4 md:mt-8 pb-10 md:pb-20 lg:pb-8">
            <div class="container">
                <div class="flex flex-wrap justify-between">
                    <div class="basis-full lg:basis-1/2 lg:pr-12">
                        <div class="text-headline-medium sm:text-display-small xl:text-display-medium">
                            Welcome to the Admin Panel
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
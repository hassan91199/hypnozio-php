<?php
session_start();

require_once __DIR__ . '/utils/functions.php';
require_once __DIR__ . '/utils/db.php';

$ageRange = $_SESSION['AGE_RANGE'] ?? '';
$overWeightReason = $_SESSION['OVERWEIGHT_REASON'] ?? '';
$desiredWeight = $_SESSION['summary']['desired_weight'] ?? '';

// Getting all the products
$conn = getDbConnection();

$sql = "SELECT * FROM products";
$result = $conn->query($sql);

$products = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
}

?>

<!DOCTYPE html>
<html lang="en" class="">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <link rel="icon" type="image/x-icon" href="assets/favicon/favicon.svg">
    <title>Natural Neuro Hypnosis | Checkout</title>

    <link rel="preload" as="style" href="assets/css/app-824c45d5.css" />
    <link rel="stylesheet" href="assets/css/app-824c45d5.css" data-navigate-track="reload" />
    <link rel="modulepreload" href="assets/js/app-5f69faf4.js" />
    <link rel="modulepreload" href="assets/js/bootstrap-214fcc70.js" />
    <link rel="modulepreload" href="assets/js/jquery-2c3981e2.js" />
    <link rel="modulepreload" href="assets/js/module.esm-3f6ffe0c.js" />
    <link rel="modulepreload" href="assets/js/_commonjsHelpers-de833af9.js" />
    <link rel="modulepreload" href="assets/js/jquery-68c15ecd.js" />
    <script type="module" src="assets/js/app-5f69faf4.js" data-navigate-track="reload"></script>
    <link rel="modulepreload" href="assets/js/cookies-ee50a713.js" />
    <script type="module" src="assets/js/cookies-ee50a713.js" data-navigate-track="reload"></script>
    <link rel="modulepreload" href="assets/js/alpine-splide-54756862.js" />
    <link rel="modulepreload" href="assets/js/module.esm-958008ac.js" />
    <link rel="modulepreload" href="assets/js/alpine-splide.esm-09083027.js" />
    <script type="module" src="assets/js/alpine-js-2881bf21.js" data-navigate-track="reload"></script>
    <link rel="modulepreload" href="assets/js/input-validation-36ee9ab8.js" />
    <script type="module" src="assets/js/input-validation-36ee9ab8.js" data-navigate-track="reload"></script>
    <link rel="modulepreload" href="assets/js/audio-player.js" />
    <script type="module" src="assets/js/audio-player.js" data-navigate-track="reload"></script>
    <link rel="modulepreload" href="assets/js/gtm-tags-e2664de5.js" />
    <script type="module" src="assets/js/gtm-tags-e2664de5.js" data-navigate-track="reload"></script>
    <div>

    </div>
    <script src="https://js.stripe.com/v3/"></script>

    <style>
        .StripeElement {
            box-sizing: border-box;
            width: 100%;
            height: 40px;
            padding: 10px 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: white;
            box-shadow: 0 1px 3px 0 #e6ebf1;
            transition: box-shadow 150ms ease;
        }

        .StripeElement--focus {
            box-shadow: 0 1px 3px 0 #cfd7df;
        }

        .StripeElement--invalid {
            border-color: #fa755a;
        }

        .StripeElement--webkit-autofill {
            background-color: #fefde5 !important;
        }

        #subscription-form {
            width: 100%;
        }


        .form-container {
            max-width: 400px;
            margin: 0 auto;
        }
    </style>

</head>

<body class="antialiased bg-surface text-onSurface scroll-smooth">
    <nav class="relative mt-8">
        <div x-data="{
            navigationIsOpened: false,
            disableClick: false,
            activeLanguageCode: 'en',
            activeLanguageName: 'English',
            languageDesktopNavIsOpened: false,
            languageMobileNavIsOpened: false,
            showWhiteMode: false,
        }" class="container text-white py-4 md:py-5">
            <div class="flex justify-between items-center">
                <img src="assets/icons/logo.svg" class="" alt="NH">
                <div class="flex items-center space-x-4">
                </div>
            </div>
        </div>
    </nav>

    <div x-data="{ checked: 'hypnozio-monthly-6-months'}" class="pb-11 lg:pb-16">
        <div class="container">
            <div class="flex flex-wrap">
                <div class="basis-full lg:basis-1/2 mx-auto">
                    <div class="text-headline-large text-center">Here’s your Natural Neuro Hypnosis program</div>
                    <div class="mt-6 lg:mt-10 max-w-[552px] mx-auto lg:mr-0">
                        <div class="rounded shadow overflow-hidden">
                            <div class="bg-primary-95 p-4">
                                <div class="text-title-large text-center font-semibold text-primary-10">Your weight loss program</div>
                                <div class="space-y-4">
                                    <div class="text-body-medium lg:text-body-large first:mt-6">
                                        <span class="font-semibold">Age range:</span>
                                        <span><?= $ageRange ?></span>
                                    </div>
                                    <div class="text-body-medium lg:text-body-large first:mt-6">
                                        <span class="font-semibold">Overweight reason:</span>
                                        <span><?= $overWeightReason ?></span>
                                    </div>
                                    <div class="text-body-medium lg:text-body-large first:mt-6">
                                        <span class="font-semibold">Weight goal:</span>
                                        <span><?= $desiredWeight ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-white p-4 space-y-4">
                                <div class="flex items-center">
                                    <div class="bg-tertiary-60 shrink-0 text-tertiary-99 rounded-full w-10 h-10 flex justify-center items-center font-semibold text-body-medium">
                                        1
                                    </div>
                                    <div class="bg-neutralVariant-99 rounded p-2 ml-4 w-full">
                                        <div class="text-body-medium lg:text-body-large font-semibold">
                                            <span>Week 1:</span>
                                        </div>
                                        <div class="mt-0.5 text-body-medium lg:text-body-large">Changing Outlook</div>
                                    </div>
                                </div>
                                <div class="flex items-center">
                                    <div class="bg-tertiary-60 shrink-0 text-tertiary-99 rounded-full w-10 h-10 flex justify-center items-center font-semibold text-body-medium">
                                        2
                                    </div>
                                    <div class="bg-neutralVariant-99 rounded p-2 ml-4 w-full">
                                        <div class="text-body-medium lg:text-body-large font-semibold">
                                            <span>Week 2:</span>
                                        </div>
                                        <div class="mt-0.5 text-body-medium lg:text-body-large">Visualising New Habits</div>
                                    </div>
                                </div>
                                <div class="flex items-center">
                                    <div class="bg-tertiary-60 shrink-0 text-tertiary-99 rounded-full w-10 h-10 flex justify-center items-center font-semibold text-body-medium">
                                        3
                                    </div>
                                    <div class="bg-neutralVariant-99 rounded p-2 ml-4 w-full">
                                        <div class="text-body-medium lg:text-body-large font-semibold">
                                            <span>Week 3:</span>
                                        </div>
                                        <div class="mt-0.5 text-body-medium lg:text-body-large">Solidifying New Practices</div>
                                    </div>
                                </div>
                                <div class="flex items-center">
                                    <div class="bg-tertiary-60 shrink-0 text-tertiary-99 rounded-full w-10 h-10 flex justify-center items-center font-semibold text-body-medium">
                                        4
                                    </div>
                                    <div class="bg-neutralVariant-99 rounded p-2 ml-4 w-full">
                                        <div class="text-body-medium lg:text-body-large font-semibold">
                                            <span>Week 4:</span>
                                        </div>
                                        <div class="mt-0.5 text-body-medium lg:text-body-large">Changing Views on Unhealthy Foods and Sugary Drinks</div>
                                    </div>
                                </div>
                                <div class="flex items-center">
                                    <div class="bg-tertiary-60 shrink-0 text-tertiary-99 rounded-full w-10 h-10 flex justify-center items-center font-semibold text-body-medium">
                                        5
                                    </div>
                                    <div class="bg-neutralVariant-99 rounded p-2 ml-4 w-full">
                                        <div class="text-body-medium lg:text-body-large font-semibold">
                                            <span>Week 5:</span>
                                        </div>
                                        <div class="mt-0.5 text-body-medium lg:text-body-large">Eliminating Binge Eating Patterns</div>
                                    </div>
                                </div>
                                <div class="flex items-center">
                                    <div class="bg-tertiary-60 shrink-0 text-tertiary-99 rounded-full w-10 h-10 flex justify-center items-center font-semibold text-body-medium">
                                        6
                                    </div>
                                    <div class="bg-neutralVariant-99 rounded p-2 ml-4 w-full">
                                        <div class="text-body-medium lg:text-body-large font-semibold">
                                            <span>Week 6:</span>
                                        </div>
                                        <div class="mt-0.5 text-body-medium lg:text-body-large">Managing Caloric Intake Effectively</div>
                                    </div>
                                </div>
                                <div class="flex items-center">
                                    <div class="bg-alert shrink-0 text-tertiary-99 rounded-full w-10 h-10 flex justify-center items-center font-semibold text-body-medium">
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M3.66406 14.6666C3.38906 14.6666 3.15365 14.5687 2.95781 14.3729C2.76198 14.177 2.66406 13.9416 2.66406 13.6666V6.43329C2.66406 6.15829 2.76198 5.92288 2.95781 5.72704C3.15365 5.53121 3.38906 5.43329 3.66406 5.43329H4.83073V3.83329C4.83073 2.95718 5.13965 2.21038 5.7575 1.59288C6.37534 0.975376 7.12256 0.666626 7.99916 0.666626C8.87576 0.666626 9.6224 0.975376 10.2391 1.59288C10.8557 2.21038 11.1641 2.95718 11.1641 3.83329V5.43329H12.3307C12.6057 5.43329 12.8411 5.53121 13.037 5.72704C13.2328 5.92288 13.3307 6.15829 13.3307 6.43329V13.6666C13.3307 13.9416 13.2328 14.177 13.037 14.3729C12.8411 14.5687 12.6057 14.6666 12.3307 14.6666H3.66406ZM3.66406 13.6666H12.3307V6.43329H3.66406V13.6666ZM8.0002 11.3333C8.35389 11.3333 8.65573 11.2109 8.90573 10.9661C9.15573 10.7213 9.28073 10.427 9.28073 10.0833C9.28073 9.74996 9.1548 9.44718 8.90293 9.17496C8.65106 8.90274 8.34829 8.76663 7.9946 8.76663C7.64091 8.76663 7.33906 8.90274 7.08906 9.17496C6.83906 9.44718 6.71406 9.75274 6.71406 10.0916C6.71406 10.4305 6.84 10.7222 7.09186 10.9666C7.34373 11.2111 7.64651 11.3333 8.0002 11.3333ZM5.83073 5.43329H10.1641V3.83329C10.1641 3.23144 9.95361 2.71987 9.5327 2.29858C9.11177 1.87728 8.60066 1.66663 7.99936 1.66663C7.39805 1.66663 6.88628 1.87728 6.46406 2.29858C6.04184 2.71987 5.83073 3.23144 5.83073 3.83329V5.43329Z" fill="white" />
                                        </svg>
                                    </div>
                                    <div class="bg-neutralVariant-99 rounded p-2 ml-4 w-full">
                                        <div class="text-body-medium lg:text-body-large font-semibold">
                                            <span>Post week 6 program:</span>
                                        </div>
                                        <div class="mt-0.5 text-body-medium lg:text-body-large">Unlock your ongoing weight loss management plan</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="basis-full lg:basis-10/12 mx-auto mt-12 lg:mt-8">
                    <div class="hidden lg:flex justify-center text-headline-large mb-10">
                        Select your plan
                    </div>
                    <div class="lg:flex justify-between lg:mx-8 xl:mx-12">
                        <div class="lg:order-2 max-w-[552px] lg:min-w-[396px] lg:w-full mx-auto lg:mr-0">
                            <div class="">
                                <div class="bg-white shadow rounded p-4">
                                    <div class="text-title-large text-center">All plans include</div>
                                    <div class="mt-6 space-y-2">
                                        <div class="flex">
                                            <div class="mr-2">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M9.44961 17.85L3.84961 12.25L4.92461 11.175L9.44961 15.7L19.0496 6.09998L20.1246 7.17498L9.44961 17.85Z" fill="#3A5BA9" />
                                                </svg>
                                            </div>
                                            <div>Full access to Natural Neuro Hypnosis audio library</div>
                                        </div>
                                        <div class="flex">
                                            <div class="mr-2">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M9.44961 17.85L3.84961 12.25L4.92461 11.175L9.44961 15.7L19.0496 6.09998L20.1246 7.17498L9.44961 17.85Z" fill="#3A5BA9" />
                                                </svg>
                                            </div>
                                            <div>Your goals-oriented hypnotherapy program</div>
                                        </div>
                                        <div class="flex">
                                            <div class="mr-2">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M9.44961 17.85L3.84961 12.25L4.92461 11.175L9.44961 15.7L19.0496 6.09998L20.1246 7.17498L9.44961 17.85Z" fill="#3A5BA9" />
                                                </svg>
                                            </div>
                                            <div>Long-term weight control support</div>
                                        </div>
                                        <div class="flex">
                                            <div class="mr-2">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M9.44961 17.85L3.84961 12.25L4.92461 11.175L9.44961 15.7L19.0496 6.09998L20.1246 7.17498L9.44961 17.85Z" fill="#3A5BA9" />
                                                </svg>
                                            </div>
                                            <div>Content available on any devices</div>
                                        </div>
                                        <div class="flex">
                                            <div class="mr-2">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M9.44961 17.85L3.84961 12.25L4.92461 11.175L9.44961 15.7L19.0496 6.09998L20.1246 7.17498L9.44961 17.85Z" fill="#3A5BA9" />
                                                </svg>
                                            </div>
                                            <div>24/7 client support</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="lg:order-1 lg:w-full lg:mr-6">
                            <div class="mt-6 lg:mt-0 lg:min-w-[396px]" x-data="{
        tableComponentCount: 1,
        checkedTos: false,
        disableCta: false,
        showModal: false,
        formattedPrice: '$66.00',
        subscriptionPrice: '$66.00',
        subscriptionInterval: '6',
        interval: '',
        formattedInterval: ' 0.85714285714286 weeks',
        taboolaEvtData: {
            notify: 'event',
            name: 'start_checkout',
            id: 111111,
            revenue: 66,
            currency: 'USD',
            quantity: 1,
        },
     }">
                                <h2 class="text-title-large text-center lg:hidden mb-6">Select your plan</h2>
                                <div class="flex flex-col items-center max-w-[503px] mx-auto">
                                    <label class="w-full cursor-pointer bg-white border border-neutralVariant-90 rounded p-4 min-w-[343px] max-w-[503px] xl:max-w-[397px] relative overflow-hidden mb-2 !max-w-full" :for="$id('order-input')" x-bind:style="checked === 'hypnozio-monthly-2-months' ? 'border: 2px solid #27BFB3;' : 'border:1px solid #E1E2EC;'" x-on:click="
            checked = 'hypnozio-monthly-2-months';
            formattedPrice = '$33.00',
            subscriptionPrice = '$33.00',
            subscriptionInterval = '2',
            interval = '',
            formattedInterval = ' 0.28571428571429 weeks',
            toggleAllCheckboxesByValue('hypnozio-monthly-2-months');
            taboolaEvtData = {
                notify: 'event',
                name: 'start_checkout',
                id: 11111,
                revenue: 33,
                currency: 'USD',
                quantity: 1,
            };">
                                        <div class="flex flex-row items-center">
                                            <div class="basis-7/12">
                                                <div class="flex flex-row items-center">
                                                    <input class="checkbox-circle w-6 h-6 bg-checkmarker2 mr-4 lg:mr-6" type="radio" autocomplete="off" value="hypnozio-monthly-2-months" :id="$id('order-input')" :name="'order-radio-' + tableComponentCount" />
                                                    <div class="flex flex-col space-y-1 pr-2 lg:pr-4">
                                                        <div class="font-semibold break-all min-w-[150px] text-label-extra-large">
                                                            2-month plan
                                                        </div>
                                                        <div class="flex text-body-small">
                                                            <div class="line-through text-accent mr-3">$66.00</div>
                                                            <div class="text-neutralVariant-80">$33.00</div>
                                                        </div>
                                                        <div class="text-neutralVariant-60 text-body-small">Billed every 2 months</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="basis-5/12 border-l border-neutralVariant-90 min-h-[82px] flex flex-col items-center justify-center">
                                                <div class="flex flex-col justify-center items-center mx-auto">
                                                    <div class="font-semibold text-headline-small sm:text-headline-medium">
                                                        $16.50
                                                    </div>
                                                    <div class="text-neutralVariant-60 text-body-small">
                                                        per month
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </label>
                                    <label class="w-full cursor-pointer bg-white border border-neutralVariant-90 rounded p-4 min-w-[343px] max-w-[503px] xl:max-w-[397px] relative overflow-hidden mb-2 !max-w-full" :for="$id('order-input')" x-bind:style="checked === 'hypnozio-monthly-6-months' ? 'border: 2px solid #27BFB3;' : 'border:1px solid #E1E2EC;'" x-on:click="
            checked = 'hypnozio-monthly-6-months';
            formattedPrice = '$66.00',
            subscriptionPrice = '$66.00',
            subscriptionInterval = '6',
            interval = '',
            formattedInterval = ' 0.85714285714286 weeks',
            toggleAllCheckboxesByValue('hypnozio-monthly-6-months');
            taboolaEvtData = {
                notify: 'event',
                name: 'start_checkout',
                id: 1111,
                revenue: 66,
                currency: 'USD',
                quantity: 1,
            };">
                                        <div class="flex flex-row items-center">
                                            <div class="basis-7/12">
                                                <div class="flex flex-row items-center">
                                                    <input class="checkbox-circle w-6 h-6 bg-checkmarker2 mr-4 lg:mr-6" type="radio" autocomplete="off" value="hypnozio-monthly-6-months" :id="$id('order-input')" :name="'order-radio-' + tableComponentCount" checked />
                                                    <div class="flex flex-col space-y-1 pr-2 lg:pr-4">
                                                        <div class="font-semibold break-all min-w-[150px] text-label-extra-large">
                                                            6-month plan
                                                        </div>
                                                        <div class="flex text-body-small">
                                                            <div class="line-through text-accent mr-3">$264.00</div>
                                                            <div class="text-neutralVariant-80">$66.00</div>
                                                        </div>
                                                        <div class="text-neutralVariant-60 text-body-small">Billed every 6 months</div>
                                                        <div class="w-fit bg-accent py-1 px-2 rounded-[14px] text-white font-semibold text-body-small">
                                                            Most popular
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="basis-5/12 border-l border-neutralVariant-90 min-h-[82px] flex flex-col items-center justify-center">
                                                <div class="flex flex-col justify-center items-center mx-auto">
                                                    <div class="font-semibold text-headline-small sm:text-headline-medium">
                                                        $11.00
                                                    </div>
                                                    <div class="text-neutralVariant-60 text-body-small">
                                                        per month
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </label>
                                    <label class="w-full cursor-pointer bg-white border border-neutralVariant-90 rounded p-4 min-w-[343px] max-w-[503px] xl:max-w-[397px] relative overflow-hidden mb-2 !max-w-full" :for="$id('order-input')" x-bind:style="checked === 'hypnozio-monthly-4-months-5394' ? 'border: 2px solid #27BFB3;' : 'border:1px solid #E1E2EC;'" x-on:click="
            checked = 'hypnozio-monthly-4-months-5394';
            formattedPrice = '$53.94',
            subscriptionPrice = '$53.94',
            subscriptionInterval = '4',
            interval = '',
            formattedInterval = ' 0.57142857142857 weeks',
            toggleAllCheckboxesByValue('hypnozio-monthly-4-months-5394');
            taboolaEvtData = {
                notify: 'event',
                name: 'start_checkout',
                id: 111111,
                revenue: 53.94,
                currency: 'USD',
                quantity: 1,
            };">
                                        <div class="flex flex-row items-center">
                                            <div class="basis-7/12">
                                                <div class="flex flex-row items-center">
                                                    <input class="checkbox-circle w-6 h-6 bg-checkmarker2 mr-4 lg:mr-6" type="radio" autocomplete="off" value="hypnozio-monthly-4-months-5394" :id="$id('order-input')" :name="'order-radio-' + tableComponentCount" />
                                                    <div class="flex flex-col space-y-1 pr-2 lg:pr-4">
                                                        <div class="font-semibold break-all min-w-[150px] text-label-extra-large">
                                                            4-month plan
                                                        </div>
                                                        <div class="flex text-body-small">
                                                            <div class="line-through text-accent mr-3">$107.88</div>
                                                            <div class="text-neutralVariant-80">$53.94</div>
                                                        </div>
                                                        <div class="text-neutralVariant-60 text-body-small">Billed every 4 months</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="basis-5/12 border-l border-neutralVariant-90 min-h-[82px] flex flex-col items-center justify-center">
                                                <div class="flex flex-col justify-center items-center mx-auto">
                                                    <div class="font-semibold text-headline-small sm:text-headline-medium">
                                                        $13.49
                                                    </div>
                                                    <div class="text-neutralVariant-60 text-body-small">
                                                        per month
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </label>
                                    <div class="flex w-full max-w-[338px] lg:max-w-[434px] flex-col" x-id="['tos-checkbox']">
                                        <div class="max-w-[503px] mx-auto w-full mt-6">
                                            <label class="flex items-center sm:justify-center text-body-medium cursor-pointer lg:text-body-large font-normal font-sourceSansPro" :for="$id('tos-checkbox')">
                                                <input class="checkbox text-body-medium cursor-pointer lg:text-body-large mr-2 mb-[2.5px]" type="checkbox" autocomplete="off" name="tos" :id="$id('tos-checkbox')" x-on:click="toggleAllCheckboxesByName($el.name, checkedTos = !checkedTos); enableLinkPointerEvents($el.id)" />
                                                <div>I agree to the <a class="text-primary font-semibold no-underline" href="">T&Cs</a> and <a class="text-primary font-semibold no-underline" href="">Privacy policy</a></div>
                                            </label>
                                        </div>
                                        <a class="relative cursor-pointer max-w-[503px] lg:max-w-[397px] mx-auto mt-6 btn h-14 validatable-link" x-on:click="if (validateTosCheckboxById($id('tos-checkbox'), $event) === false) {
                   disableCta = false;
                   } else {
                   disableCta = true;
                   showModal = true;
                       if (checked === 'hypnozio-monthly-2-months' && true ) {
                           $event.preventDefault();
                           disableCta = false;
                   }
               }; _tfa.push(taboolaEvtData)" x-bind:class="!disableCta ? '' : 'btn-disabled'">
                                            <div x-bind:class="disableCta ? 'opacity-50' : ''">
                                                Order now
                                            </div>
                                            <div class="ml-4">
                                                <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g fill="currentColor">
                                                        <path d="M9.629 5.25L5.606 1.227L6.6665 0.166504L12.5 6L6.6665 11.8335L5.606 10.773L9.629 6.75H0.5V5.25H9.629Z" />
                                                    </g>
                                                </svg>
                                            </div>
                                            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2" x-cloak x-show="disableCta">
                                                <div role="status">
                                                    <svg aria-hidden="true" class="w-8 h-8 mr-2 text-white/80 animate-spin fill-primary" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor" />
                                                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill" />
                                                    </svg>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="text-neutralVariant-60 text-body-medium text-center mt-6">
                                        Cancel anytime | No hidden fees
                                    </div>
                                    <div class="mt-8 max-w-[359px] mx-auto">
                                        <img src="assets/images/safe-checkout-en.png" alt="" />
                                    </div>
                                    <div x-cloak x-show="showModal" class="fixed left-0 top-0 w-full h-full flex justify-center items-center bg-modal z-10">
                                        <div x-on:click.outside="showModal = false; event.preventDefault(); disableCta = false" class="bg-white p-6 rounded">
                                            <a class="close-btn" href="<?= "{$_SERVER['REQUEST_URI']}?d=20" ?>" @click="showModal = false; disableCta = false">&times;</a>
                                            <div class="text-center">
                                                <h2 class="text-headline-small md:text-headline-medium font-bold">
                                                    Submit a secure payment.
                                                </h2>
                                            </div>

                                            <div class="lg:flex justify-between lg:mx-8 xl:mx-12">
                                                <div class="lg:w-full p-3">
                                                    <h3 class="font-semibold break-all min-w-[150px] text-label-extra-large my-4">
                                                        Your Order Summary
                                                    </h3>
                                                    <div class="flex justify-between my-4">
                                                        <p class="text-neutralVariant-60 text-body-medium text-center">Personalised Pilates Challenge</p>
                                                        <p class="text-neutralVariant-60 text-body-medium text-center">RM 44.00</p>
                                                    </div>
                                                    <hr class="my-4">
                                                    <div class="flex justify-between my-4">
                                                        <h3 class="font-semibold break-all text-label-extra-large">Total:</h3>
                                                        <h3 class="font-semibold break-all text-label-extra-large">RM 44.00</h3>
                                                    </div>
                                                </div>
                                                <div class="vertical-line"></div>
                                                <div class="lg:w-full p-3">
                                                    <div class="flex justify-center py-2">
                                                        <img class="mx-2 card-brand" src="assets/icons/jcb.svg" alt="jcb icon">
                                                        <img class="mx-2 card-brand" src="assets/icons/discover.svg" alt="discover icon">
                                                        <img class="mx-2 card-brand" src="assets/icons/diners-club.svg" alt="diners-club icon">
                                                        <img class="mx-2 card-brand" src="assets/icons/american-express.svg" alt="american-express icon">
                                                        <img class="mx-2 card-brand" src="assets/icons/unionpay.svg" alt="unionpay icon">
                                                        <img class="mx-2 card-brand" src="assets/icons/mastercard.svg" alt="mastercard icon">
                                                        <img class="mx-2 card-brand" src="assets/icons/visa.svg" alt="visa icon">
                                                    </div>

                                                    <div class="flex justify-center py-2 form-container">
                                                        <form id="subscription-form">
                                                            <input type="hidden" id="stripe-publishable-key" value="<?= env('STRIPE_PUBLISHABLE_KEY') ?>" />
                                                            <div id="card-number-element" class="StripeElement mb-3"></div>
                                                            <div id="card-expiry-element" class="StripeElement mb-3"></div>
                                                            <div id="card-cvc-element" class="StripeElement mb-3"></div>
                                                            <button type="submit" class="cursor-pointer link btn h-14 my-6 text-body-large md:text-label-extra-large">
                                                                <img class="mx-2" src="assets/icons/unlocked.svg" alt="unlocked icon">
                                                                CONTINUE
                                                            </button>
                                                        </form>
                                                    </div>

                                                    <p class="text-neutral-60 text-body-small" id="">
                                                        BetterMe International Limited | Themistokli Dervi 39, 1st floor, Office 104, 1066, Nicosia, Cyprus
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-col justify-center items-center mt-8 lg:mt-20">
            <h2 class="text-title-large lg:text-headline-large text-center mb-6 lg:mb-10">
                Why customers love us?
            </h2>
            <div class="bg-white w-full">
                <div class="container">
                    <div class="md:hidden pt-5">
                        <div class="flex justify-center relative" x-data="Splide({
                    buildMarkup: true,
                    options: {
                        type: 'slide',
                        perPage: 1,
                        arrows: false,
                        pagination: true
                    }
                })">
                            <div class="flex flex-col relative max-w-[344px] h-full mx-auto min-h-[480px]">
                                <img class="w-full rounded-tl-[64px] rounded-br-[64px]" src="assets/images/client1.png" alt="" />
                                <div class="p-4 pt-2 h-full flex flex-col">
                                    <img class="w-[102px] mx-auto" src="assets/icons/all-filled-stars.svg" alt="">
                                    <div class="text-centerfont-normal text-body-medium mt-2">
                                        &quot;Hypnotherapy for weight loss changed my life. The program helped me control my cravings, overcome emotional eating habits, and lose 20 pounds. I feel more confident and empowered than ever before.&quot;
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-col relative max-w-[344px] h-full mx-auto min-h-[480px]">
                                <img class="w-full rounded-tl-[64px] rounded-br-[64px]" src="assets/images/client2.png" alt="" />
                                <div class="p-4 pt-2 h-full flex flex-col">
                                    <img class="w-[102px] mx-auto" src="assets/icons/all-filled-stars.svg" alt="">
                                    <div class="text-centerfont-normal text-body-medium mt-2">
                                        &quot;I was skeptical, but the hypnotherapy program for weight loss helped me address underlying issues like stress and anxiety that were causing me to overeat. I&#039;ve lost over 30 pounds and highly recommend it to anyone struggling with their weight.&quot;
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-col relative max-w-[344px] h-full mx-auto min-h-[480px]">
                                <img class="w-full rounded-tl-[64px] rounded-br-[64px]" src="assets/images/client3.png" alt="" />
                                <div class="p-4 pt-2 h-full flex flex-col">
                                    <img class="w-[102px] mx-auto" src="assets/icons/all-filled-stars.svg" alt="">
                                    <div class="text-centerfont-normal text-body-medium mt-2">
                                        &quot;Hypnotherapy is a game-changer for me. The program helped me to address the emotional issues that were contributing to my weight gain. The sessions were relaxing and enjoyable, and I felt a significant difference in my attitude towards food&quot;
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="hidden md:flex justify-between md:space-x-12 py-8">
                        <div class="flex flex-col">
                            <img class="w-[343px] rounded-tl-[64px] rounded-br-[64px]" src="assets/images/client1.png" alt="" />
                            <div class="pt-2 flex flex-col space-y-2 px-4">
                                <img class="w-[120px] mx-auto" src="assets/icons/all-filled-stars.svg" alt="">
                                <div class="text-center font-normal text-body-medium mb-2 max-w-[343px]">
                                    &quot;Hypnotherapy for weight loss changed my life. The program helped me control my cravings, overcome emotional eating habits, and lose 20 pounds. I feel more confident and empowered than ever before.&quot;
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col">
                            <img class="w-[343px] rounded-tl-[64px] rounded-br-[64px]" src="assets/images/client2.png" alt="" />
                            <div class="pt-2 flex flex-col space-y-2 px-4">
                                <img class="w-[120px] mx-auto" src="assets/icons/all-filled-stars.svg" alt="">
                                <div class="text-center font-normal text-body-medium mb-2 max-w-[343px]">
                                    &quot;I was skeptical, but the hypnotherapy program for weight loss helped me address underlying issues like stress and anxiety that were causing me to overeat. I&#039;ve lost over 30 pounds and highly recommend it to anyone struggling with their weight.&quot;
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col">
                            <img class="w-[343px] rounded-tl-[64px] rounded-br-[64px]" src="assets/images/client3.png" alt="" />
                            <div class="pt-2 flex flex-col space-y-2 px-4">
                                <img class="w-[120px] mx-auto" src="assets/icons/all-filled-stars.svg" alt="">
                                <div class="text-center font-normal text-body-medium mb-2 max-w-[343px]">
                                    &quot;Hypnotherapy is a game-changer for me. The program helped me to address the emotional issues that were contributing to my weight gain. The sessions were relaxing and enjoyable, and I felt a significant difference in my attitude towards food&quot;
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-title-large lg:text-headline-large text-center mt-20 mb-6 md:mb-10">
            Hypnotherapy was covered in
        </div>
        <div class="bg-neutralVariant-99 shadow-inner py-6 lg:py-16">
            <div class="container flex flex-wrap items-center">
                <div class="basis-full sm:basis-10/12 md:basis-8/12 lg:basis-10/12 xl:basis-8/12 mx-auto">
                    <div class="flex items-center justify-between">
                        <img class="w-[72px] lg:w-[210px]" src="assets/icons/bloomberg-logo.svg" alt="" />
                        <img class="w-[74px] lg:w-[125px]" src="assets/icons/business-insider-logo.svg" alt="" />
                        <img class="w-[69px] lg:w-[105px]" src="assets/icons/yahoo-logo.svg" alt="" />
                        <img class="w-[64px] lg:w-[131px]" src="assets/icons/cbs-logo.svg" alt="" />
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-12 lg:mt-20">
            <div class="flex flex-wrap">
                <div class="basis-full md:basis-8/12 lg:basis-1/2 mx-auto">
                    <div class="">
                        <div class="text-title-large lg:text-headline-large text-center mb-6 lg:mb-10">How does it work?</div>
                        <div class="space-y-2 lg:space-y-4">
                            <div class="flex items-center rounded bg-neutralVariant-95 p-4">
                                <div class="h-10 w-10 shrink-0 bg-tertiary-60 rounded-full flex justify-center items-center font-semibold text-body-medium text-tertiary-99">
                                    1
                                </div>
                                <div class="text-neutralVariant-30 text-body-large ml-4 lg:ml-6">Find a quiet place where you can relax</div>
                            </div>
                            <div class="flex items-center rounded bg-neutralVariant-95 p-4">
                                <div class="h-10 w-10 shrink-0 bg-tertiary-60 rounded-full flex justify-center items-center font-semibold text-body-medium text-tertiary-99">
                                    2
                                </div>
                                <div class="text-neutralVariant-30 text-body-large ml-4 lg:ml-6">Access the hypnotherapy recording in our member area</div>
                            </div>
                            <div class="flex items-center rounded bg-neutralVariant-95 p-4">
                                <div class="h-10 w-10 shrink-0 bg-tertiary-60 rounded-full flex justify-center items-center font-semibold text-body-medium text-tertiary-99">
                                    3
                                </div>
                                <div class="text-neutralVariant-30 text-body-large ml-4 lg:ml-6">Listen to one 20-minute session per day</div>
                            </div>
                            <div class="flex items-center rounded bg-neutralVariant-95 p-4">
                                <div class="h-10 w-10 shrink-0 bg-tertiary-60 rounded-full flex justify-center items-center font-semibold text-body-medium text-tertiary-99">
                                    4
                                </div>
                                <div class="text-neutralVariant-30 text-body-large ml-4 lg:ml-6">Enjoy the first results in one week</div>
                            </div>
                        </div>
                        <a class="cursor-pointer link btn h-14 mt-10 max-w-[360px] mx-auto" id="" href="#pricingTable">
                            Order now
                        </a>
                    </div>
                    <div class="text-title-large lg:text-headline-large text-center mt-12 lg:mt-20 mb-6 lg:mb-10">
                        Still not sure? Listen to your first session
                    </div>
                    <div class="audio-player bg-inherit max-w-[552px] mx-auto">
                        <div class="bg-[#F2F4FF] p-4 rounded">
                            <div class="flex justify-between items-center">
                                <div data-audio-player-button="NbvYIuGp7" class="w-14 h-14 bg-play bg-cover shrink-0 mr-0.5 md:mr-0"></div>
                                <div class="text-[18px] leading-6 md:text-title-large sm:text-headline-medium text-primary text-center w-full">
                                    Self Love
                                </div>
                            </div>
                            <div class="audio-wrapper">
                                <audio data-audio-player="NbvYIuGp7" preload="auto" ontimeupdate="updateProgressBar(document.querySelector(`[data-audio-player='NbvYIuGp7']`), null)">
                                    <source src="https://download.naturalhypnosis.com/a66dbe674428b3882b48a3befebe8af260f9ce9bd736c541a1d135e26c702662/Self%20Belief%20-%20Natural%20Hypnosis.mp3" type="audio/mpeg">
                                </audio>
                            </div>
                            <div class="player-controls scrubber mt-4">
                                <progress class="w-full !h-2 !rounded-[4px] overflow-hidden" data-audio-player-progress-bar="NbvYIuGp7" value="0" max="1">
                                </progress>
                                <div class="flex justify-between text-body-small text-primary-10">
                                    <div data-audio-player-start-time="NbvYIuGp7"></div>
                                    <div data-audio-player-end-time="NbvYIuGp7"></div>
                                </div>
                            </div>
                        </div>
                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                initAudioPlayer();
                                initProgressBar(document.querySelector(`[data-audio-player='NbvYIuGp7']`));
                                initVolumeBar(document.querySelector(`[data-audio-player='NbvYIuGp7']`));
                            });
                        </script>
                    </div>
                    <div class="text-title-large lg:text-headline-large text-center mt-12 lg:mt-20">
                        People often ask us
                    </div>
                    <div class="space-y-4 mt-6 lg:mt-10">
                        <div x-data="{ open: false }" x-on:click="open = !open" class="p-4 rounded shadow-2 bg-white">
                            <div class="flex justify-between">
                                <div class="text-body-medium lg:text-body-large font-semibold text-inherit">
                                    What happens after I order?
                                </div>
                                <div>
                                    <svg x-bind:class="open ? 'rotate-180' : ''" width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11.9752 14.475L8.80017 11.3C8.56684 11.0667 8.51267 10.7959 8.63767 10.4875C8.76267 10.1792 8.99184 10.025 9.32517 10.025H15.6752C16.0085 10.025 16.2377 10.1792 16.3627 10.4875C16.4877 10.7959 16.4335 11.0667 16.2002 11.3L13.0252 14.475C12.9418 14.5584 12.8585 14.6167 12.7752 14.65C12.6918 14.6834 12.6002 14.7 12.5002 14.7C12.4002 14.7 12.3085 14.6834 12.2252 14.65C12.1418 14.6167 12.0585 14.5584 11.9752 14.475Z" fill="#1B1B1F" />
                                    </svg>
                                </div>
                            </div>
                            <div x-show="open" class="text-body-medium mt-4">Each hypnotherapy session will be available in your member area, complete with clear instructions. Every session consists of a 20-minute recording that you can conveniently access on your phone, tablet, or computer.</div>
                        </div>
                        <div x-data="{ open: false }" x-on:click="open = !open" class="p-4 rounded shadow-2 bg-white">
                            <div class="flex justify-between">
                                <div class="text-body-medium lg:text-body-large font-semibold text-inherit">
                                    How was our hypnotherapy course created?
                                </div>
                                <div>
                                    <svg x-bind:class="open ? 'rotate-180' : ''" width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11.9752 14.475L8.80017 11.3C8.56684 11.0667 8.51267 10.7959 8.63767 10.4875C8.76267 10.1792 8.99184 10.025 9.32517 10.025H15.6752C16.0085 10.025 16.2377 10.1792 16.3627 10.4875C16.4877 10.7959 16.4335 11.0667 16.2002 11.3L13.0252 14.475C12.9418 14.5584 12.8585 14.6167 12.7752 14.65C12.6918 14.6834 12.6002 14.7 12.5002 14.7C12.4002 14.7 12.3085 14.6834 12.2252 14.65C12.1418 14.6167 12.0585 14.5584 11.9752 14.475Z" fill="#1B1B1F" />
                                    </svg>
                                </div>
                            </div>
                            <div x-show="open" class="text-body-medium mt-4">Certified hypnotherapist Edward Miller, with over 20 years of experience in the field, has created our hypnotherapy course. He has successfully helped thousands of customers with similar problems.</div>
                        </div>
                        <div x-data="{ open: false }" x-on:click="open = !open" class="p-4 rounded shadow-2 bg-white">
                            <div class="flex justify-between">
                                <div class="text-body-medium lg:text-body-large font-semibold text-inherit">
                                    Is hypnotherapy safe for you?
                                </div>
                                <div>
                                    <svg x-bind:class="open ? 'rotate-180' : ''" width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11.9752 14.475L8.80017 11.3C8.56684 11.0667 8.51267 10.7959 8.63767 10.4875C8.76267 10.1792 8.99184 10.025 9.32517 10.025H15.6752C16.0085 10.025 16.2377 10.1792 16.3627 10.4875C16.4877 10.7959 16.4335 11.0667 16.2002 11.3L13.0252 14.475C12.9418 14.5584 12.8585 14.6167 12.7752 14.65C12.6918 14.6834 12.6002 14.7 12.5002 14.7C12.4002 14.7 12.3085 14.6834 12.2252 14.65C12.1418 14.6167 12.0585 14.5584 11.9752 14.475Z" fill="#1B1B1F" />
                                    </svg>
                                </div>
                            </div>
                            <div x-show="open" class="text-body-medium mt-4">Hypnotherapy is a safe form of therapy that is conducted in a relaxed and comfortable environment. It does not involve any physical contact or the use of medication, making it a low-risk option for those seeking a non-invasive approach to healing.</div>
                        </div>
                    </div>
                    <div class="bg-[#FAFFFD] rounded shadow-2 p-4 mt-12 lg:mt-20">
                        <div class="flex items-center">
                            <svg class="shrink-0" width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.041 22.8334L17.541 18.0417L13.5827 14.9584H18.416L19.9993 10L21.541 14.9584H26.416L22.4577 18.0417L23.916 22.8334L19.9993 19.875L16.041 22.8334ZM10.166 38.3334V25.6667C8.91602 24.3612 8.02018 22.9306 7.47852 21.375C6.93685 19.8195 6.66602 18.25 6.66602 16.6667C6.66602 12.8889 7.94379 9.72226 10.4993 7.16671C13.0549 4.61115 16.2216 3.33337 19.9993 3.33337C23.7771 3.33337 26.9438 4.61115 29.4993 7.16671C32.0549 9.72226 33.3327 12.8889 33.3327 16.6667C33.3327 18.25 33.0618 19.8195 32.5202 21.375C31.9785 22.9306 31.0827 24.3612 29.8327 25.6667V38.3334L19.9993 35.0417L10.166 38.3334ZM19.9993 27.5C23.0271 27.5 25.5896 26.4514 27.6868 24.3542C29.7841 22.257 30.8327 19.6945 30.8327 16.6667C30.8327 13.6389 29.7841 11.0764 27.6868 8.97921C25.5896 6.88199 23.0271 5.83337 19.9993 5.83337C16.9716 5.83337 14.4091 6.88199 12.3118 8.97921C10.2146 11.0764 9.16602 13.6389 9.16602 16.6667C9.16602 19.6945 10.2146 22.257 12.3118 24.3542C14.4091 26.4514 16.9716 27.5 19.9993 27.5ZM12.666 34.8334L19.9993 32.5417L27.3327 34.8334V27.7084C26.2216 28.5139 25.0271 29.0973 23.7493 29.4584C22.4716 29.8195 21.2216 30 19.9993 30C18.7771 30 17.5271 29.8195 16.2493 29.4584C14.9716 29.0973 13.7771 28.5139 12.666 27.7084V34.8334Z" fill="#006A63" />
                            </svg>
                            <div class="text-title-large">
                                30-day money back guarantee
                            </div>
                        </div>
                        <div class="text-body-medium mt-6">
                            We offer a 100% money-back guarantee to users who have listened to at least 6 sessions within 30 days of purchase and have not experienced any improvement.
                        </div>
                    </div>
                </div>
                <div id="pricingTable" class="basis-full lg:basis-10/12 mx-auto mt-12 lg:mt-8">
                    <div class="hidden lg:flex justify-center text-headline-large mb-10">
                        Select your plan
                    </div>
                    <div class="lg:flex lg:justify-between lg:mx-8 xl:mx-12">
                        <div class="lg:order-2 max-w-[552px] lg:min-w-[396px] lg:w-full mx-auto lg:mr-0">
                            <div class="">
                                <div class="bg-white shadow rounded p-4">
                                    <div class="text-title-large text-center">All plans include</div>
                                    <div class="mt-6 space-y-2">
                                        <div class="flex">
                                            <div class="mr-2">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M9.44961 17.85L3.84961 12.25L4.92461 11.175L9.44961 15.7L19.0496 6.09998L20.1246 7.17498L9.44961 17.85Z" fill="#3A5BA9" />
                                                </svg>
                                            </div>
                                            <div>Full access to Natural Neuro Hypnosis audio library</div>
                                        </div>
                                        <div class="flex">
                                            <div class="mr-2">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M9.44961 17.85L3.84961 12.25L4.92461 11.175L9.44961 15.7L19.0496 6.09998L20.1246 7.17498L9.44961 17.85Z" fill="#3A5BA9" />
                                                </svg>
                                            </div>
                                            <div>Your goals-oriented hypnotherapy program</div>
                                        </div>
                                        <div class="flex">
                                            <div class="mr-2">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M9.44961 17.85L3.84961 12.25L4.92461 11.175L9.44961 15.7L19.0496 6.09998L20.1246 7.17498L9.44961 17.85Z" fill="#3A5BA9" />
                                                </svg>
                                            </div>
                                            <div>Long-term weight control support</div>
                                        </div>
                                        <div class="flex">
                                            <div class="mr-2">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M9.44961 17.85L3.84961 12.25L4.92461 11.175L9.44961 15.7L19.0496 6.09998L20.1246 7.17498L9.44961 17.85Z" fill="#3A5BA9" />
                                                </svg>
                                            </div>
                                            <div>Content available on any devices</div>
                                        </div>
                                        <div class="flex">
                                            <div class="mr-2">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M9.44961 17.85L3.84961 12.25L4.92461 11.175L9.44961 15.7L19.0496 6.09998L20.1246 7.17498L9.44961 17.85Z" fill="#3A5BA9" />
                                                </svg>
                                            </div>
                                            <div>24/7 client support</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="lg:order-1 lg:w-full lg:mr-6">
                            <div class="mt-6 lg:mt-0 lg:min-w-[396px] lg:w-full" x-data="{
        tableComponentCount: 2,
        checkedTos: false,
        disableCta: false,
        showModal: false,
        formattedPrice: '$66.00',
        subscriptionPrice: '$66.00',
        subscriptionInterval: '6',
        interval: '',
        formattedInterval: ' 0.85714285714286 weeks',
        taboolaEvtData: {
            notify: 'event',
            name: 'start_checkout',
            id: 1111,
            revenue: 66,
            currency: 'USD',
            quantity: 1,
        },
     }">
                                <h2 class="text-title-large text-center lg:hidden mb-6">Select your plan</h2>
                                <div class="flex flex-col items-center max-w-[503px] mx-auto">
                                    <label class="w-full cursor-pointer bg-white border border-neutralVariant-90 rounded p-4 min-w-[343px] max-w-[503px] xl:max-w-[397px] relative overflow-hidden mb-2 !max-w-full" :for="$id('order-input')" x-bind:style="checked === 'hypnozio-monthly-2-months' ? 'border: 2px solid #27BFB3;' : 'border:1px solid #E1E2EC;'" x-on:click="
            checked = 'hypnozio-monthly-2-months';
            formattedPrice = '$33.00',
            subscriptionPrice = '$33.00',
            subscriptionInterval = '2',
            interval = '',
            formattedInterval = ' 0.28571428571429 weeks',
            toggleAllCheckboxesByValue('hypnozio-monthly-2-months');
            taboolaEvtData = {
                notify: 'event',
                name: 'start_checkout',
                id: 11111,
                revenue: 33,
                currency: 'USD',
                quantity: 1,
            };">
                                        <div class="flex flex-row items-center">
                                            <div class="basis-7/12">
                                                <div class="flex flex-row items-center">
                                                    <input class="checkbox-circle w-6 h-6 bg-checkmarker2 mr-4 lg:mr-6" type="radio" autocomplete="off" value="hypnozio-monthly-2-months" :id="$id('order-input')" :name="'order-radio-' + tableComponentCount" />
                                                    <div class="flex flex-col space-y-1 pr-2 lg:pr-4">
                                                        <div class="font-semibold break-all min-w-[150px] text-label-extra-large">
                                                            2-month plan
                                                        </div>
                                                        <div class="flex text-body-small">
                                                            <div class="line-through text-accent mr-3">$66.00</div>
                                                            <div class="text-neutralVariant-80">$33.00</div>
                                                        </div>
                                                        <div class="text-neutralVariant-60 text-body-small">Billed every 2 months</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="basis-5/12 border-l border-neutralVariant-90 min-h-[82px] flex flex-col items-center justify-center">
                                                <div class="flex flex-col justify-center items-center mx-auto">
                                                    <div class="font-semibold text-headline-small sm:text-headline-medium">
                                                        $16.50
                                                    </div>
                                                    <div class="text-neutralVariant-60 text-body-small">
                                                        per month
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </label>
                                    <label class="w-full cursor-pointer bg-white border border-neutralVariant-90 rounded p-4 min-w-[343px] max-w-[503px] xl:max-w-[397px] relative overflow-hidden mb-2 !max-w-full" :for="$id('order-input')" x-bind:style="checked === 'hypnozio-monthly-6-months' ? 'border: 2px solid #27BFB3;' : 'border:1px solid #E1E2EC;'" x-on:click="
            checked = 'hypnozio-monthly-6-months';
            formattedPrice = '$66.00',
            subscriptionPrice = '$66.00',
            subscriptionInterval = '6',
            interval = '',
            formattedInterval = ' 0.85714285714286 weeks',
            toggleAllCheckboxesByValue('hypnozio-monthly-6-months');
            taboolaEvtData = {
                notify: 'event',
                name: 'start_checkout',
                id: 1111,
                revenue: 66,
                currency: 'USD',
                quantity: 1,
            };">
                                        <div class="flex flex-row items-center">
                                            <div class="basis-7/12">
                                                <div class="flex flex-row items-center">
                                                    <input class="checkbox-circle w-6 h-6 bg-checkmarker2 mr-4 lg:mr-6" type="radio" autocomplete="off" value="hypnozio-monthly-6-months" :id="$id('order-input')" :name="'order-radio-' + tableComponentCount" checked />
                                                    <div class="flex flex-col space-y-1 pr-2 lg:pr-4">
                                                        <div class="font-semibold break-all min-w-[150px] text-label-extra-large">
                                                            6-month plan
                                                        </div>
                                                        <div class="flex text-body-small">
                                                            <div class="line-through text-accent mr-3">$264.00</div>
                                                            <div class="text-neutralVariant-80">$66.00</div>
                                                        </div>
                                                        <div class="text-neutralVariant-60 text-body-small">Billed every 6 months</div>
                                                        <div class="w-fit bg-accent py-1 px-2 rounded-[14px] text-white font-semibold text-body-small">
                                                            Most popular
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="basis-5/12 border-l border-neutralVariant-90 min-h-[82px] flex flex-col items-center justify-center">
                                                <div class="flex flex-col justify-center items-center mx-auto">
                                                    <div class="font-semibold text-headline-small sm:text-headline-medium">
                                                        $11.00
                                                    </div>
                                                    <div class="text-neutralVariant-60 text-body-small">
                                                        per month
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </label>
                                    <label class="w-full cursor-pointer bg-white border border-neutralVariant-90 rounded p-4 min-w-[343px] max-w-[503px] xl:max-w-[397px] relative overflow-hidden mb-2 !max-w-full" :for="$id('order-input')" x-bind:style="checked === 'hypnozio-monthly-4-months-5394' ? 'border: 2px solid #27BFB3;' : 'border:1px solid #E1E2EC;'" x-on:click="
            checked = 'hypnozio-monthly-4-months-5394';
            formattedPrice = '$53.94',
            subscriptionPrice = '$53.94',
            subscriptionInterval = '4',
            interval = '',
            formattedInterval = ' 0.57142857142857 weeks',
            toggleAllCheckboxesByValue('hypnozio-monthly-4-months-5394');
            taboolaEvtData = {
                notify: 'event',
                name: 'start_checkout',
                id: 11111,
                revenue: 53.94,
                currency: 'USD',
                quantity: 1,
            };">
                                        <div class="flex flex-row items-center">
                                            <div class="basis-7/12">
                                                <div class="flex flex-row items-center">
                                                    <input class="checkbox-circle w-6 h-6 bg-checkmarker2 mr-4 lg:mr-6" type="radio" autocomplete="off" value="hypnozio-monthly-4-months-5394" :id="$id('order-input')" :name="'order-radio-' + tableComponentCount" />
                                                    <div class="flex flex-col space-y-1 pr-2 lg:pr-4">
                                                        <div class="font-semibold break-all min-w-[150px] text-label-extra-large">
                                                            4-month plan
                                                        </div>
                                                        <div class="flex text-body-small">
                                                            <div class="line-through text-accent mr-3">$107.88</div>
                                                            <div class="text-neutralVariant-80">$53.94</div>
                                                        </div>
                                                        <div class="text-neutralVariant-60 text-body-small">Billed every 4 months</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="basis-5/12 border-l border-neutralVariant-90 min-h-[82px] flex flex-col items-center justify-center">
                                                <div class="flex flex-col justify-center items-center mx-auto">
                                                    <div class="font-semibold text-headline-small sm:text-headline-medium">
                                                        $13.49
                                                    </div>
                                                    <div class="text-neutralVariant-60 text-body-small">
                                                        per month
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </label>
                                    <div class="flex w-full max-w-[338px] lg:max-w-[434px] flex-col" x-id="['tos-checkbox']">
                                        <div class="max-w-[503px] mx-auto w-full mt-6">
                                            <label class="flex items-center sm:justify-center text-body-medium cursor-pointer lg:text-body-large font-normal font-sourceSansPro" :for="$id('tos-checkbox')">
                                                <input class="checkbox text-body-medium cursor-pointer lg:text-body-large mr-2 mb-[2.5px]" type="checkbox" autocomplete="off" name="tos" :id="$id('tos-checkbox')" x-on:click="toggleAllCheckboxesByName($el.name, checkedTos = !checkedTos); enableLinkPointerEvents($el.id)" />
                                                <div>I agree to the <a class="text-primary font-semibold no-underline" href="">T&Cs</a> and <a class="text-primary font-semibold no-underline" href="">Privacy policy</a></div>
                                            </label>
                                        </div>
                                        <a class="relative cursor-pointer max-w-[503px] lg:max-w-[397px] mx-auto mt-6 btn h-14 validatable-link" x-on:click="if (validateTosCheckboxById($id('tos-checkbox'), $event) === false) {
                   disableCta = false;
                   } else {
                   disableCta = true;
                   showModal = true;
                       if (checked === 'hypnozio-monthly-2-months' && true ) {
                           $event.preventDefault();
                           disableCta = false;
                   }
               }; _tfa.push(taboolaEvtData)" x-bind:class="!disableCta ? '' : 'btn-disabled'">
                                            <div x-bind:class="disableCta ? 'opacity-50' : ''">
                                                Order now
                                            </div>
                                            <div class="ml-4">
                                                <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g fill="currentColor">
                                                        <path d="M9.629 5.25L5.606 1.227L6.6665 0.166504L12.5 6L6.6665 11.8335L5.606 10.773L9.629 6.75H0.5V5.25H9.629Z" />
                                                    </g>
                                                </svg>
                                            </div>
                                            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2" x-cloak x-show="disableCta">
                                                <div role="status">
                                                    <svg aria-hidden="true" class="w-8 h-8 mr-2 text-white/80 animate-spin fill-primary" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor" />
                                                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill" />
                                                    </svg>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="text-neutralVariant-60 text-body-medium text-center mt-6">
                                        Cancel anytime | No hidden fees
                                    </div>
                                    <div class="mt-8 max-w-[359px] mx-auto">
                                        <img src="assets/images/safe-checkout-en.png" alt="" />
                                    </div>
                                    <div x-cloak x-show="showModal" class="fixed left-0 top-0 w-full h-full flex justify-center items-center bg-modal z-10">
                                        <div x-on:click.outside="showModal = false; event.preventDefault(); disableCta = false" class="bg-white p-6 rounded">
                                            <a class="close-btn" href="<?= "{$_SERVER['REQUEST_URI']}?d=20" ?>" @click="showModal = false; disableCta = false">&times;</a>
                                            <div class="text-center">
                                                <h2 class="text-headline-small md:text-headline-medium font-bold">
                                                    Submit a secure payment.
                                                </h2>
                                            </div>

                                            <div class="lg:flex justify-between lg:mx-8 xl:mx-12">
                                                <div class="lg:w-full p-3">
                                                    <h3 class="font-semibold break-all min-w-[150px] text-label-extra-large my-4">
                                                        Your Order Summary
                                                    </h3>
                                                    <div class="flex justify-between my-4">
                                                        <p class="text-neutralVariant-60 text-body-medium text-center">Personalised Pilates Challenge</p>
                                                        <p class="text-neutralVariant-60 text-body-medium text-center">RM 44.00</p>
                                                    </div>
                                                    <hr class="my-4">
                                                    <div class="flex justify-between my-4">
                                                        <h3 class="font-semibold break-all text-label-extra-large">Total:</h3>
                                                        <h3 class="font-semibold break-all text-label-extra-large">RM 44.00</h3>
                                                    </div>
                                                </div>
                                                <div class="vertical-line"></div>
                                                <div class="lg:w-full p-3">
                                                    <div class="flex justify-center py-2">
                                                        <img class="mx-2 card-brand" src="assets/icons/jcb.svg" alt="jcb icon">
                                                        <img class="mx-2 card-brand" src="assets/icons/discover.svg" alt="discover icon">
                                                        <img class="mx-2 card-brand" src="assets/icons/diners-club.svg" alt="diners-club icon">
                                                        <img class="mx-2 card-brand" src="assets/icons/american-express.svg" alt="american-express icon">
                                                        <img class="mx-2 card-brand" src="assets/icons/unionpay.svg" alt="unionpay icon">
                                                        <img class="mx-2 card-brand" src="assets/icons/mastercard.svg" alt="mastercard icon">
                                                        <img class="mx-2 card-brand" src="assets/icons/visa.svg" alt="visa icon">
                                                    </div>

                                                    <div class="flex justify-center py-2">
                                                        <form action="" class="w-full max-w-md text-center">
                                                            <input name="card_number" type="text" placeholder="XXXX XXXX XXXX XXXX">
                                                            <input name="card_expiry" type="text" placeholder="MM/YY">
                                                            <input name="card_cvv" type="tel" placeholder="CVV">

                                                            <button class="cursor-pointer link btn h-14 my-6 text-body-large md:text-label-extra-large">
                                                                <img class="mx-2" src="assets/icons/unlocked.svg" alt="unlocked icon">
                                                                CONTINUE
                                                            </button>
                                                        </form>
                                                    </div>

                                                    <p class="text-neutral-60 text-body-small" id="">
                                                        BetterMe International Limited | Themistokli Dervi 39, 1st floor, Office 104, 1066, Nicosia, Cyprus
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const stripe = Stripe(document.getElementById('stripe-publishable-key').value);
        const elements = stripe.elements();

        // Create separate elements for card number, expiry date, and CVC
        const cardNumberElement = elements.create('cardNumber');
        const cardExpiryElement = elements.create('cardExpiry');
        const cardCvcElement = elements.create('cardCvc');

        cardNumberElement.mount('#card-number-element');
        cardExpiryElement.mount('#card-expiry-element');
        cardCvcElement.mount('#card-cvc-element');

        const form = document.getElementById('subscription-form');
        form.addEventListener('submit', async (event) => {
            event.preventDefault();
            const {
                token,
                error
            } = await stripe.createToken(cardNumberElement);
            if (error) {
                // Handle error
                console.error(error);
            } else {
                // Send token to server
                fetch('subscribe.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        token: token.id
                    }),
                }).then(response => {
                    return response.json();
                }).then(result => {
                    if (result.error) {
                        // Handle error
                        console.error(result.error);
                    } else {
                        // Handle success
                        console.log('Subscription successful!', result);
                    }
                });
            }
        });
    </script>

</body>


</html>
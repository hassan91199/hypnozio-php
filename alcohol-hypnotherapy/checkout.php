<?php
session_start();

$ageRange = $_SESSION['AGE_RANGE'] ?? '';
$timeOnAddiction = $_SESSION['TIME_ON_ADDICTION'];
?>

<!DOCTYPE html>
<html lang="en" class="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <link rel="icon" type="image/x-icon" href="../assets/images/favicons/hypnozio.svg">
    <title>Hypnozio | Checkout</title>

    <link rel="preload" as="style" href="../assets/app-b0fb382d.css" />
    <link rel="modulepreload" href="../assets/app-5f69faf4.js" />
    <link rel="modulepreload" href="../assets/bootstrap-214fcc70.js" />
    <link rel="modulepreload" href="../assets/jquery-2c3981e2.js" />
    <link rel="modulepreload" href="../assets/module.esm-958008ac.js" />
    <link rel="modulepreload" href="../assets/module.esm-21387d6f.js" />
    <link rel="modulepreload" href="../assets/_commonjsHelpers-de833af9.js" />
    <link rel="modulepreload" href="../assets/jquery-68c15ecd.js" />
    <link rel="stylesheet" href="../assets/app-b0fb382d.css" data-navigate-track="reload" />
    <script type="module" src="../assets/app-5f69faf4.js" data-navigate-track="reload"></script>
    <link rel="modulepreload" href="../assets/cookies-ee50a713.js" />
    <script type="module" src="../assets/cookies-ee50a713.js" data-navigate-track="reload"></script>
    <link rel="modulepreload" href="../assets/alpine-splide-54756862.js" />
    <link rel="modulepreload" href="../assets/module.esm-958008ac.js" />
    <link rel="modulepreload" href="../assets/alpine-splide.esm-09083027.js" />
    <script type="module" src="../assets/alpine-splide-54756862.js" data-navigate-track="reload"></script>
    <link rel="modulepreload" href="../assets/build/input-validation-36ee9ab8.js" />
    <script type="module" src="../assets/build/input-validation-36ee9ab8.js" data-navigate-track="reload"></script>
    <link rel="modulepreload" href="../assets/audio-player-c450f4f7.js" />
    <script type="module" src="../assets/audio-player-c450f4f7.js" data-navigate-track="reload"></script>
    <link rel="modulepreload" href="../assets/gtm-tags-e2664de5.js" />
    <script type="module" src="../assets/gtm-tags-e2664de5.js" data-navigate-track="reload"></script>
    <div>
        <script>
            window.fwSettings = {
                'widget_id': 155000000003
            };
            ! function() {
                if ("function" != typeof window.FreshworksWidget) {
                    var n = function() {
                        n.q.push(arguments)
                    };
                    n.q = [], window.FreshworksWidget = n
                }
            }()
        </script>
        <script type='text/javascript' src='https://widget.freshworks.com/widgets/155000000003.js' async defer>
        </script>
    </div>
</head>

<body class="antialiased bg-surface text-onSurface scroll-smooth">
    <!-- <div class="text-center font-semibold bg-[#FFE9EB] text-accent py-1 lg:py-[5px] text-body-small md:text-label-extra-large font-bold z-10 fixed top-0 w-full">
        <div class="container">
            <div class="flex items-center justify-center">
                <p class="mr-2">75% Discount only valid for</p>
                <div x-data="
        {
            redirect: '',
            allowInitialStorageValue: '',
            storageKey: 'checkout-countdown',
            expires: '1717357019000',
            timer: {
                days: '00',
                hours: '00',
                minutes: '15',
                seconds: '00',
            },
            calculateTime: function () {
                if (this.storageKey) {
                if(!this.allowInitialStorageValue) {
                    localStorage.removeItem(this.storageKey, this.expires);
                }
                    this.expires = localStorage.getItem(this.storageKey) || this.expires;
                    localStorage.setItem(this.storageKey, this.expires);
                }
                var timeDistance = this.expires - new Date().getTime();
                if (timeDistance < 0) {
                    timeDistance = 0;
                }

                this.timer.days = this.formatCounter(Math.floor(timeDistance / (1000 * 60 * 60 * 24)));
                this.timer.hours = this.formatCounter(Math.floor((timeDistance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)));
                this.timer.minutes = this.formatCounter(Math.floor((timeDistance % (1000 * 60 * 60)) / (1000 * 60)));
                this.timer.seconds = this.formatCounter(Math.floor((timeDistance % (1000 * 60)) / 1000));











            },
            formatCounter: function (number) {
                return number.toString().padStart(2, '0');
            }
        }
" x-init="calculateTime(); setInterval(function () { calculateTime() }, 1000)" class="flex items-center font-normal text-body-small md:text-body-large">
                    <svg class="mr-1" width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 3V1.5H15V3H9ZM11.25 14.175H12.75V8.425H11.25V14.175ZM12 22.475C10.7667 22.475 9.60417 22.2375 8.5125 21.7625C7.42083 21.2875 6.46667 20.6417 5.65 19.825C4.83333 19.0083 4.1875 18.0542 3.7125 16.9625C3.2375 15.8708 3 14.7083 3 13.475C3 12.2417 3.2375 11.0792 3.7125 9.9875C4.1875 8.89583 4.83333 7.94167 5.65 7.125C6.46667 6.30833 7.42083 5.6625 8.5125 5.1875C9.60417 4.7125 10.7667 4.475 12 4.475C13.1167 4.475 14.1667 4.6625 15.15 5.0375C16.1333 5.4125 17.0083 5.93333 17.775 6.6L19.05 5.325L20.1 6.375L18.825 7.65C19.425 8.31667 19.9375 9.125 20.3625 10.075C20.7875 11.025 21 12.1583 21 13.475C21 14.7083 20.7625 15.8708 20.2875 16.9625C19.8125 18.0542 19.1667 19.0083 18.35 19.825C17.5333 20.6417 16.5792 21.2875 15.4875 21.7625C14.3958 22.2375 13.2333 22.475 12 22.475ZM12 20.975C14.0833 20.975 15.8542 20.2458 17.3125 18.7875C18.7708 17.3292 19.5 15.5583 19.5 13.475C19.5 11.3917 18.7708 9.62083 17.3125 8.1625C15.8542 6.70417 14.0833 5.975 12 5.975C9.91667 5.975 8.14583 6.70417 6.6875 8.1625C5.22917 9.62083 4.5 11.3917 4.5 13.475C4.5 15.5583 5.22917 17.3292 6.6875 18.7875C8.14583 20.2458 9.91667 20.975 12 20.975Z" fill="#FF4958" />
                    </svg>
                    <span x-text="timer.hours">00</span> :
                    <span x-text="timer.minutes">00</span> :
                    <span x-text="timer.seconds">00</span>
                </div>
            </div>
        </div>
    </div> -->
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
                <img src="../assets/logo.svg" class="w-[110px] md:w-[108px]" alt="Hypnozio">
                <div class="flex items-center space-x-4">
                </div>
            </div>
        </div>
    </nav>

    <div x-data="{ checked: 'hypnozio-addictions-6-months-subscription'}" class="pb-11 lg:pb-16">
        <div class="container">
            <div class="flex flex-wrap">
                <div class="basis-full lg:basis-1/2 mx-auto">
                    <div class="text-headline-large text-center">Here’s your Hypnozio program</div>
                    <div class="mt-6 lg:mt-10 max-w-[552px] mx-auto">
                        <div class="rounded shadow overflow-hidden">
                            <div class="bg-primary-95 p-4">
                                <div class="text-title-large text-center font-semibold text-primary-10">Your alcohol addiction recovery program</div>
                                <div class="space-y-4">
                                    <div class="text-body-medium lg:text-body-large first:mt-6">
                                        <span class="font-semibold">Age range:</span>
                                        <span><?= $ageRange ?></span>
                                    </div>
                                    <div class="text-body-medium lg:text-body-large first:mt-6">
                                        <span class="font-semibold">Time on addiction:</span>
                                        <span><?= $timeOnAddiction ?></span>
                                    </div>
                                    <div class="text-body-medium lg:text-body-large first:mt-6">
                                        <span class="font-semibold">Severity:</span>
                                        <span>1/10</span>
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
                                        <div class="mt-0.5 text-body-medium lg:text-body-large">Introduction to positive change</div>
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
                                        <div class="mt-0.5 text-body-medium lg:text-body-large">Visualizing a healthy future</div>
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
                                        <div class="mt-0.5 text-body-medium lg:text-body-large">Find coping mechanisms for stress</div>
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
                                        <div class="mt-0.5 text-body-medium lg:text-body-large">Reframing triggers</div>
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
                                        <div class="mt-0.5 text-body-medium lg:text-body-large">Building self-esteem and confidence</div>
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
                                        <div class="mt-0.5 text-body-medium lg:text-body-large">Rewriting negative thought patterns</div>
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
                                        <div class="mt-0.5 text-body-medium lg:text-body-large">Unlock your ongoing alcohol addiction management plan</div>
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
                                            <div>Full access to Hypnozio audio library</div>
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
                                            <div>Long-term addiction control support</div>
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
        tableComponentCount: 1,
        checkedTos: false,
        orderUrl: 'https://hypnozio.com/order/hypnozio-addictions-6-months-subscription/e98z30n?disc=75&amp;c=USD',
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
            id: 1521676,
            revenue: 66,
            currency: 'USD',
            quantity: 1,
        },
     }">
                                <h2 class="text-title-large text-center lg:hidden mb-6">Select your plan</h2>
                                <div class="flex flex-col items-center max-w-[503px] mx-auto">
                                    <label class="w-full cursor-pointer bg-white border border-neutralVariant-90 rounded p-4 min-w-[343px] max-w-[503px] xl:max-w-[397px] relative overflow-hidden mb-2 !max-w-full" :for="$id('order-input')" x-bind:style="checked === 'hypnozio-addictions-2-months-subscription' ? 'border: 2px solid #27BFB3;' : 'border:1px solid #E1E2EC;'" x-on:click="
            orderUrl = 'https://hypnozio.com/order/hypnozio-addictions-2-months-subscription/e98z30n?disc=50&amp;c=USD';
            checked = 'hypnozio-addictions-2-months-subscription';
            formattedPrice = '$33.00',
            subscriptionPrice = '$33.00',
            subscriptionInterval = '2',
            interval = '',
            formattedInterval = ' 0.28571428571429 weeks',
            toggleAllCheckboxesByValue('hypnozio-addictions-2-months-subscription');
            taboolaEvtData = {
                notify: 'event',
                name: 'start_checkout',
                id: 1521676,
                revenue: 33,
                currency: 'USD',
                quantity: 1,
            };">
                                        <div class="flex flex-row items-center">
                                            <div class="basis-7/12">
                                                <div class="flex flex-row items-center">
                                                    <input class="checkbox-circle w-6 h-6 bg-checkmarker2 mr-4 lg:mr-6" type="radio" autocomplete="off" value="hypnozio-addictions-2-months-subscription" :id="$id('order-input')" :name="'order-radio-' + tableComponentCount" />
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
                                            <div class="border-l border-neutralVariant-90 min-h-[82px] flex flex-col items-center justify-center basis-5/12">
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
                                    <label class="w-full cursor-pointer bg-white border border-neutralVariant-90 rounded p-4 min-w-[343px] max-w-[503px] xl:max-w-[397px] relative overflow-hidden mb-2 !max-w-full" :for="$id('order-input')" x-bind:style="checked === 'hypnozio-addictions-6-months-subscription' ? 'border: 2px solid #27BFB3;' : 'border:1px solid #E1E2EC;'" x-on:click="
            orderUrl = 'https://hypnozio.com/order/hypnozio-addictions-6-months-subscription/e98z30n?disc=75&amp;c=USD';
            checked = 'hypnozio-addictions-6-months-subscription';
            formattedPrice = '$66.00',
            subscriptionPrice = '$66.00',
            subscriptionInterval = '6',
            interval = '',
            formattedInterval = ' 0.85714285714286 weeks',
            toggleAllCheckboxesByValue('hypnozio-addictions-6-months-subscription');
            taboolaEvtData = {
                notify: 'event',
                name: 'start_checkout',
                id: 1521676,
                revenue: 66,
                currency: 'USD',
                quantity: 1,
            };">
                                        <div class="flex flex-row items-center">
                                            <div class="basis-7/12">
                                                <div class="flex flex-row items-center">
                                                    <input class="checkbox-circle w-6 h-6 bg-checkmarker2 mr-4 lg:mr-6" type="radio" autocomplete="off" value="hypnozio-addictions-6-months-subscription" :id="$id('order-input')" :name="'order-radio-' + tableComponentCount" checked />
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
                                            <div class="border-l border-neutralVariant-90 min-h-[82px] flex flex-col items-center justify-center basis-5/12">
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
                                    <label class="w-full cursor-pointer bg-white border border-neutralVariant-90 rounded p-4 min-w-[343px] max-w-[503px] xl:max-w-[397px] relative overflow-hidden mb-2 !max-w-full" :for="$id('order-input')" x-bind:style="checked === 'hypnozio-addictions-4-months-subscription' ? 'border: 2px solid #27BFB3;' : 'border:1px solid #E1E2EC;'" x-on:click="
            orderUrl = 'https://hypnozio.com/order/hypnozio-addictions-4-months-subscription/e98z30n?disc=50&amp;c=USD';
            checked = 'hypnozio-addictions-4-months-subscription';
            formattedPrice = '$46.00',
            subscriptionPrice = '$46.00',
            subscriptionInterval = '4',
            interval = '',
            formattedInterval = ' 0.57142857142857 weeks',
            toggleAllCheckboxesByValue('hypnozio-addictions-4-months-subscription');
            taboolaEvtData = {
                notify: 'event',
                name: 'start_checkout',
                id: 1521676,
                revenue: 46,
                currency: 'USD',
                quantity: 1,
            };">
                                        <div class="flex flex-row items-center">
                                            <div class="basis-7/12">
                                                <div class="flex flex-row items-center">
                                                    <input class="checkbox-circle w-6 h-6 bg-checkmarker2 mr-4 lg:mr-6" type="radio" autocomplete="off" value="hypnozio-addictions-4-months-subscription" :id="$id('order-input')" :name="'order-radio-' + tableComponentCount" />
                                                    <div class="flex flex-col space-y-1 pr-2 lg:pr-4">
                                                        <div class="font-semibold break-all min-w-[150px] text-label-extra-large">
                                                            4-month plan
                                                        </div>
                                                        <div class="flex text-body-small">
                                                            <div class="line-through text-accent mr-3">$92.00</div>
                                                            <div class="text-neutralVariant-80">$46.00</div>
                                                        </div>
                                                        <div class="text-neutralVariant-60 text-body-small">Billed every 4 months</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="border-l border-neutralVariant-90 min-h-[82px] flex flex-col items-center justify-center basis-5/12">
                                                <div class="flex flex-col justify-center items-center mx-auto">
                                                    <div class="font-semibold text-headline-small sm:text-headline-medium">
                                                        $11.50
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
                       if (checked === '' && false ) {
                           showModal = true;
                           $event.preventDefault();
                           disableCta = false;
                   }
               }; _tfa.push(taboolaEvtData)" x-bind:href="orderUrl" x-bind:class="!disableCta ? '' : 'btn-disabled'">
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
                                        <img src="../assets/hypnozio/checkouts/safe-checkout-en.png" alt="" />
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
            <div class="bg-inherit w-full">
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
                                <img class="w-full rounded-tl-[64px] rounded-br-[64px]" src="../assets/client4.jpg" alt="" />
                                <div class="p-4 pt-2 h-full flex flex-col">
                                    <img class="w-[102px] mx-auto" src="../assets/theme/all-filled-stars.svg" alt="">
                                    <div class="text-centerfont-normal text-body-medium mt-2">
                                        &quot;Throughout my hypnotherapy sessions, I&#039;ve discovered profound insights and harnessed an inner strength that has been pivotal in my journey to sobriety.&quot;
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-col relative max-w-[344px] h-full mx-auto min-h-[480px]">
                                <img class="w-full rounded-tl-[64px] rounded-br-[64px]" src="../assets/client5.jpg" alt="" />
                                <div class="p-4 pt-2 h-full flex flex-col">
                                    <img class="w-[102px] mx-auto" src="../assets/theme/all-filled-stars.svg" alt="">
                                    <div class="text-centerfont-normal text-body-medium mt-2">
                                        &quot;The sessions have been transformative, each offering a deeper understanding and shift in my mindset towards alcohol and drugs. I&#039;ve also gained tools that support me daily.&quot;
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-col relative max-w-[344px] h-full mx-auto min-h-[480px]">
                                <img class="w-full rounded-tl-[64px] rounded-br-[64px]" src="../assets/client6.jpg" alt="" />
                                <div class="p-4 pt-2 h-full flex flex-col">
                                    <img class="w-[102px] mx-auto" src="../assets/theme/all-filled-stars.svg" alt="">
                                    <div class="text-centerfont-normal text-body-medium mt-2">
                                        &quot;I was initially skeptical about hypnotherapy, but after experiencing the sessions, my commitment to recovery has solidified. Their compassionate and effective approach has truly made a positive impact on my life.&quot;
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="hidden md:flex justify-between md:space-x-12 py-8">
                        <div class="flex flex-col">
                            <img class="w-[343px] rounded-tl-[64px] rounded-br-[64px]" src="../assets/client4.jpg" alt="" />
                            <div class="pt-2 flex flex-col space-y-2 px-4">
                                <img class="w-[120px] mx-auto" src="../assets/theme/all-filled-stars.svg" alt="">
                                <div class="text-center font-normal text-body-medium mb-2 max-w-[343px]">
                                    &quot;Throughout my hypnotherapy sessions, I&#039;ve discovered profound insights and harnessed an inner strength that has been pivotal in my journey to sobriety.&quot;
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col">
                            <img class="w-[343px] rounded-tl-[64px] rounded-br-[64px]" src="../assets/client5.jpg" alt="" />
                            <div class="pt-2 flex flex-col space-y-2 px-4">
                                <img class="w-[120px] mx-auto" src="../assets/theme/all-filled-stars.svg" alt="">
                                <div class="text-center font-normal text-body-medium mb-2 max-w-[343px]">
                                    &quot;The sessions have been transformative, each offering a deeper understanding and shift in my mindset towards alcohol and drugs. I&#039;ve also gained tools that support me daily.&quot;
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col">
                            <img class="w-[343px] rounded-tl-[64px] rounded-br-[64px]" src="../assets/client6.jpg" alt="" />
                            <div class="pt-2 flex flex-col space-y-2 px-4">
                                <img class="w-[120px] mx-auto" src="../assets/theme/all-filled-stars.svg" alt="">
                                <div class="text-center font-normal text-body-medium mb-2 max-w-[343px]">
                                    &quot;I was initially skeptical about hypnotherapy, but after experiencing the sessions, my commitment to recovery has solidified. Their compassionate and effective approach has truly made a positive impact on my life.&quot;
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
                        <img class="w-[72px] lg:w-[210px]" src="../assets/hypnozio/checkouts/bloomberg-logo.svg" alt="" />
                        <img class="w-[74px] lg:w-[125px]" src="../assets/hypnozio/checkouts/business-insider-logo.svg" alt="" />
                        <img class="w-[69px] lg:w-[105px]" src="../assets/hypnozio/checkouts/yahoo-logo.svg" alt="" />
                        <img class="w-[64px] lg:w-[131px]" src="../assets/hypnozio/checkouts/cbs-logo.svg" alt="" />
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
                                <div data-audio-player-button="uJfLtJcIA" class="w-14 h-14 bg-play bg-cover shrink-0 mr-0.5 md:mr-0"></div>
                                <div class="text-[18px] leading-6 md:text-title-large sm:text-headline-medium text-primary text-center w-full">
                                    Introduction to Positive Change
                                </div>
                            </div>
                            <div class="audio-wrapper">
                                <audio data-audio-player="uJfLtJcIA" preload="auto" ontimeupdate="updateProgressBar(document.querySelector(`[data-audio-player='uJfLtJcIA']`), null)">
                                    <source src="https://storage.googleapis.com/digital-audio-files/hypnozio-courses/alcohol-addiction/en/courses-hypnozio-alcohol-addiction-program-1.mp3" type="audio/mpeg">
                                </audio>
                            </div>
                            <div class="player-controls scrubber mt-4">
                                <progress class="w-full !h-2 !rounded-[4px] overflow-hidden" data-audio-player-progress-bar="uJfLtJcIA" value="0" max="1">
                                </progress>
                                <div class="flex justify-between text-body-small text-primary-10">
                                    <div data-audio-player-start-time="uJfLtJcIA"></div>
                                    <div data-audio-player-end-time="uJfLtJcIA"></div>
                                </div>
                            </div>
                        </div>
                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                initAudioPlayer();
                                initProgressBar(document.querySelector(`[data-audio-player='uJfLtJcIA']`));
                                initVolumeBar(document.querySelector(`[data-audio-player='uJfLtJcIA']`));
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
                            <div x-show="open" class="text-body-medium mt-4">Our hypnotherapy program was created by certified leading experts in the field. One of the leading hypnotherapist, Rachel Moffett, has designed the program with the goal of improving your mindset, addressing the root causes of addiction and reaching your desired state of recovery. She has successfully helped thousands of customers with various problems.</div>
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
                    <div class="lg:flex lg:justify-between lg:mx-8 xl:mx-12 lg:space-x-6">
                        <div class="mt-6 lg:mt-0 lg:min-w-[396px] lg:w-full" x-data="{
        tableComponentCount: 2,
        checkedTos: false,
        orderUrl: 'https://hypnozio.com/order/hypnozio-addictions-6-months-subscription/e98z30n?disc=75&amp;c=USD',
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
            id: 1521676,
            revenue: 66,
            currency: 'USD',
            quantity: 1,
        },
     }">
                            <h2 class="text-title-large text-center lg:hidden mb-6">Select your plan</h2>
                            <div class="flex flex-col items-center max-w-[503px] mx-auto">
                                <label class="w-full cursor-pointer bg-white border border-neutralVariant-90 rounded p-4 min-w-[343px] max-w-[503px] xl:max-w-[397px] relative overflow-hidden mb-2 !max-w-full" :for="$id('order-input')" x-bind:style="checked === 'hypnozio-addictions-2-months-subscription' ? 'border: 2px solid #27BFB3;' : 'border:1px solid #E1E2EC;'" x-on:click="
            orderUrl = 'https://hypnozio.com/order/hypnozio-addictions-2-months-subscription/e98z30n?disc=50&amp;c=USD';
            checked = 'hypnozio-addictions-2-months-subscription';
            formattedPrice = '$33.00',
            subscriptionPrice = '$33.00',
            subscriptionInterval = '2',
            interval = '',
            formattedInterval = ' 0.28571428571429 weeks',
            toggleAllCheckboxesByValue('hypnozio-addictions-2-months-subscription');
            taboolaEvtData = {
                notify: 'event',
                name: 'start_checkout',
                id: 1521676,
                revenue: 33,
                currency: 'USD',
                quantity: 1,
            };">
                                    <div class="flex flex-row items-center">
                                        <div class="basis-7/12">
                                            <div class="flex flex-row items-center">
                                                <input class="checkbox-circle w-6 h-6 bg-checkmarker2 mr-4 lg:mr-6" type="radio" autocomplete="off" value="hypnozio-addictions-2-months-subscription" :id="$id('order-input')" :name="'order-radio-' + tableComponentCount" />
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
                                        <div class="border-l border-neutralVariant-90 min-h-[82px] flex flex-col items-center justify-center basis-5/12">
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
                                <label class="w-full cursor-pointer bg-white border border-neutralVariant-90 rounded p-4 min-w-[343px] max-w-[503px] xl:max-w-[397px] relative overflow-hidden mb-2 !max-w-full" :for="$id('order-input')" x-bind:style="checked === 'hypnozio-addictions-6-months-subscription' ? 'border: 2px solid #27BFB3;' : 'border:1px solid #E1E2EC;'" x-on:click="
            orderUrl = 'https://hypnozio.com/order/hypnozio-addictions-6-months-subscription/e98z30n?disc=75&amp;c=USD';
            checked = 'hypnozio-addictions-6-months-subscription';
            formattedPrice = '$66.00',
            subscriptionPrice = '$66.00',
            subscriptionInterval = '6',
            interval = '',
            formattedInterval = ' 0.85714285714286 weeks',
            toggleAllCheckboxesByValue('hypnozio-addictions-6-months-subscription');
            taboolaEvtData = {
                notify: 'event',
                name: 'start_checkout',
                id: 1521676,
                revenue: 66,
                currency: 'USD',
                quantity: 1,
            };">
                                    <div class="flex flex-row items-center">
                                        <div class="basis-7/12">
                                            <div class="flex flex-row items-center">
                                                <input class="checkbox-circle w-6 h-6 bg-checkmarker2 mr-4 lg:mr-6" type="radio" autocomplete="off" value="hypnozio-addictions-6-months-subscription" :id="$id('order-input')" :name="'order-radio-' + tableComponentCount" checked />
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
                                        <div class="border-l border-neutralVariant-90 min-h-[82px] flex flex-col items-center justify-center basis-5/12">
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
                                <label class="w-full cursor-pointer bg-white border border-neutralVariant-90 rounded p-4 min-w-[343px] max-w-[503px] xl:max-w-[397px] relative overflow-hidden mb-2 !max-w-full" :for="$id('order-input')" x-bind:style="checked === 'hypnozio-addictions-4-months-subscription' ? 'border: 2px solid #27BFB3;' : 'border:1px solid #E1E2EC;'" x-on:click="
            orderUrl = 'https://hypnozio.com/order/hypnozio-addictions-4-months-subscription/e98z30n?disc=50&amp;c=USD';
            checked = 'hypnozio-addictions-4-months-subscription';
            formattedPrice = '$46.00',
            subscriptionPrice = '$46.00',
            subscriptionInterval = '4',
            interval = '',
            formattedInterval = ' 0.57142857142857 weeks',
            toggleAllCheckboxesByValue('hypnozio-addictions-4-months-subscription');
            taboolaEvtData = {
                notify: 'event',
                name: 'start_checkout',
                id: 1521676,
                revenue: 46,
                currency: 'USD',
                quantity: 1,
            };">
                                    <div class="flex flex-row items-center">
                                        <div class="basis-7/12">
                                            <div class="flex flex-row items-center">
                                                <input class="checkbox-circle w-6 h-6 bg-checkmarker2 mr-4 lg:mr-6" type="radio" autocomplete="off" value="hypnozio-addictions-4-months-subscription" :id="$id('order-input')" :name="'order-radio-' + tableComponentCount" />
                                                <div class="flex flex-col space-y-1 pr-2 lg:pr-4">
                                                    <div class="font-semibold break-all min-w-[150px] text-label-extra-large">
                                                        4-month plan
                                                    </div>
                                                    <div class="flex text-body-small">
                                                        <div class="line-through text-accent mr-3">$92.00</div>
                                                        <div class="text-neutralVariant-80">$46.00</div>
                                                    </div>
                                                    <div class="text-neutralVariant-60 text-body-small">Billed every 4 months</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="border-l border-neutralVariant-90 min-h-[82px] flex flex-col items-center justify-center basis-5/12">
                                            <div class="flex flex-col justify-center items-center mx-auto">
                                                <div class="font-semibold text-headline-small sm:text-headline-medium">
                                                    $11.50
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
                       if (checked === '' && false ) {
                           showModal = true;
                           $event.preventDefault();
                           disableCta = false;
                   }
               }; _tfa.push(taboolaEvtData)" x-bind:href="orderUrl" x-bind:class="!disableCta ? '' : 'btn-disabled'">
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
                                    <img src="../assets/hypnozio/checkouts/safe-checkout-en.png" alt="" />
                                </div>
                            </div>
                        </div>
                        <div class="max-w-[552px] lg:min-w-[396px] lg:w-full mx-auto lg:mr-0 mt-8 lg:mt-0">
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
                                            <div>Full access to Hypnozio audio library</div>
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
                    </div>
                </div>
            </div>
        </div>
    </div>



</body>


</html>
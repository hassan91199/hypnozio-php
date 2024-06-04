<?php
session_start();

$currentDate = new DateTime();
$currentMonth = $currentDate->format('F');
$futureDate = $currentDate->modify('+3 months');
$futureMonth = $futureDate->format('F');

$timeOnAddiction = $_SESSION['TIME_ON_ADDICTION'];
$addictionFrequency = $_SESSION['ADDICTION_FREQUENCY'];
$primaryGoal = $_SESSION['PRIMARY_GOAL'];

?>

<!DOCTYPE html>
<html lang="en" class="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <link rel="icon" type="image/x-icon" href="../assets/favicon/favicon.svg">
    <title>Hypnozio | Summary</title>

    <link rel="preload" as="style" href="../assets/css/app-b0fb382d.css" />
    <link rel="modulepreload" href="../assets/js/app-5f69faf4.js" />
    <link rel="modulepreload" href="../assets/js/bootstrap-214fcc70.js" />
    <link rel="modulepreload" href="../assets/js/jquery-2c3981e2.js" />
    <link rel="modulepreload" href="../assets/js/module.esm-958008ac.js" />
    <link rel="modulepreload" href="../assets/module.esm-21387d6f.js" />
    <link rel="modulepreload" href="../assets/js/_commonjsHelpers-de833af9.js" />
    <link rel="modulepreload" href="../assets/js/jquery-68c15ecd.js" />
    <link rel="stylesheet" href="../assets/css/app-b0fb382d.css" data-navigate-track="reload" />
    <script type="module" src="../assets/js/app-5f69faf4.js" data-navigate-track="reload"></script>
    <link rel="modulepreload" href="../assets/js/cookies-ee50a713.js" />
    <script type="module" src="../assets/js/cookies-ee50a713.js" data-navigate-track="reload"></script>
    <link rel="modulepreload" href="../assets/js/alpine-js-2881bf21.js" />
    <link rel="modulepreload" href="../assets/js/module.esm-958008ac.js" />
    <script type="module" src="../assets/js/alpine-js-2881bf21.js" data-navigate-track="reload"></script>
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

<body class="antialiased bg-surface scroll-smooth">
    <nav class="relative">
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
                <img src="../assets/icons/logo.svg" class="w-[110px] md:w-[108px]" alt="Hypnozio">
                <div class="flex items-center space-x-4">
                </div>
            </div>
        </div>
    </nav>

    <div class="pt-6 lg:pt-4 pb-11 lg:pb-36">
        <div class="container">
            <div class="flex flex-wrap">
                <div class="lg:basis-8/12 mx-auto">
                    <div class="flex flex-col space-y-4 lg:space-y-6 justify-center">
                        <div class="text-headline-large lg:text-display-small text-onSurface text-center">
                            Hypnozio is likely to work for you!
                        </div>
                        <div class="text-body-large lg:text-title-large text-onSurface text-center lowercase">
                            89% of people similar to you successfully overcame their <span class="font-bold">alcohol addiction</span> after completing the program.
                        </div>
                    </div>
                    <div class="flex flex-col mt-6">
                        <div class="">
                            <div class="text-body-large lg:text-title-large text-onSurface text-center mb-6">
                                You can expect a significant decrease in cravings by September 2024.
                            </div>
                            <div class="relative p-4 sm:p-9 bg-white shadow sm:shadow-2 mt-6 max-w-[343px] sm:max-w-[744px] mx-auto rounded">
                                <img class="w-[311px] sm:w-[672px] mx-auto" src="../assets/hypnozio/summary/alc-graph.png" alt="Weight loss graph">
                                <div class="flex flex-row justify-between ml-4 mr-5 sm:mx-12 mt-2.5 text-neutralVariant-60 text-body-small sm:text-body-large">
                                    <div><?= $currentMonth ?></div>
                                    <div><?= $futureMonth ?></div>
                                </div>
                                <div class="absolute top-[7px] sm:top-[44px] md:top-[57px] lg:top-[53px] xl:top-[57px] left-[22px] sm:left-[44px]">
                                    <div class="flex flex-col relative">
                                        <div class="flex flex-col items-center rounded-[6px] bg-danger-90 p-1 sm:p-2 shadow-8 w-[90px] sm:w-[120px]">
                                            <div class="text-danger text-body-small sm:text-body-large sm:leading-[19px] font-semibold break-words text-center">
                                                Cravings today
                                            </div>
                                        </div>
                                        <div class="w-[9px] md:w-6 mx-auto">
                                            <svg class="block" viewBox="0 0 24 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12 19L24 4.17233e-07H0L12 19Z" fill="#FFDAD6" />
                                            </svg>
                                        </div>
                                        <div class="w-8 md:w-12 mx-auto">
                                            <svg class="block mt-1" fill="none" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="24" cy="24" fill="#e8645a" fill-opacity=".3" r="24" />
                                                <path d="m35.454 24.1508c0 6.4696-5.2447 11.7143-11.7143 11.7143s-11.7143-5.2447-11.7143-11.7143 5.2447-11.7143 11.7143-11.7143 11.7143 5.2447 11.7143 11.7143z" fill="#fff" stroke="#e8645a" stroke-width="4" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="absolute top-[78px] sm:top-[144px] md:top-[211px] lg:top-[199px] xl:top-[208px] right-[12px] sm:right-[32px]">
                                    <div class="flex flex-col relative">
                                        <div class="flex flex-col items-center rounded-[6px] bg-primary-90 p-1 sm:p-2 shadow-8 w-[100px] sm:w-[162px]">
                                            <div class="text-primary-10 text-body-small sm:text-body-large font-semibold break-words text-center">
                                                Cravings after Hypnozio
                                            </div>
                                        </div>
                                        <div class="absolute top-[40px] left-[33px] sm:top-[64px] md:top-[58px] sm:left-[62px] md:left-[54px]">
                                            <div class="w-[9px] md:w-6 mx-auto">
                                                <svg class="block" fill="none" viewBox="0 0 22 15" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="m11 14.356 10.3923-14.250043h-20.784604z" fill="#dae2ff" />
                                                </svg>
                                            </div>
                                            <div class="w-8 md:w-12">
                                                <svg class="block mt-1" fill="none" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="24" cy="24" fill="#7cb9ff" fill-opacity=".5" r="24" />
                                                    <path d="m35.7137 24.0004c0 6.4696-5.2446 11.7143-11.7143 11.7143-6.4696 0-11.7142-5.2447-11.7142-11.7143s5.2446-11.7143 11.7142-11.7143c6.4697 0 11.7143 5.2447 11.7143 11.7143z" fill="#fff" stroke="#7cb9ff" stroke-width="4" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <a class="cursor-pointer link text-label-extra-large text-center text-white font-bold bg-primary hover:bg-primary-50 hover:shadow-2 py-[17px] rounded min-w-[340px] lg:min-w-[360px] mx-auto mt-6 lg:mt-10" id="" href="/alcohol-hypnotherapy/checkout.php">
                            Get my plan
                        </a>
                    </div>
                </div>
                <div class="basis-full lg:basis-10/12 mx-auto mt-12 lg:mt-20">
                    <div class="flex flex-col space-y-6 lg:space-y-8">
                        <div class="flex justify-center">
                            <div class="text-title-large lg:text-headline-large text-onSurface text-center w-full">
                                We harmonize brain function to ensure sustained addiction recovery
                            </div>
                        </div>
                        <div class="flex space-x-4 sm:space-x-0 sm:justify-between bg-white shadow rounded px-[19px] py-4 lg:px-4 lg:py-6">
                            <div class="flex flex-col lg:flex-row space-y-2 lg:space-y-0 lg:space-x-2 items-center">
                                <img src="../assets/hypnozio/summary/hourglass-red.svg" alt="feature" />
                                <div class="text-body-small lg:text-body-large text-onSurface text-center">
                                    Only 20 minutes a day
                                </div>
                            </div>
                            <div class="flex flex-col lg:flex-row space-y-2 lg:space-y-0 lg:space-x-2 items-center">
                                <img src="../assets/hypnozio/summary/graph-green.svg" alt="feature" />
                                <div class="text-body-small lg:text-body-large text-onSurface text-center">
                                    First results after one week
                                </div>
                            </div>
                            <div class="flex flex-col lg:flex-row space-y-2 lg:space-y-0 lg:space-x-2 items-center">
                                <img src="../assets/hypnozio/summary/approved.svg" alt="feature" />
                                <div class="text-body-small lg:text-body-large text-onSurface text-center">
                                    Created by experts
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col space-y-6 lg:space-y-10 mt-12 lg:mt-20">
                        <div class="text-title-large lg:text-headline-large text-center max-w-[744px] mx-auto">You will see <span class="text-tertiary-70 font-semibold md:font-normal">improvement</span> in these areas after completing our hypnotherapy course.</div>
                        <div class="grid md:grid-cols-2 gap-6 lg:gap-10">
                            <div class="flex flex-col items-center bg-white rounded shadow p-6">
                                <img class="w-12 lg:w-14" src="../assets/hypnozio/summary/jogging.svg" alt="Physical Health Icon" />
                                <div class="text-[20px] lg:text-title-large text-primary text-center mt-2">Physical Health</div>
                                <hr class="text-neutral-80 my-4 w-full" />
                                <div class="text-body-medium lg:text-body-large text-neutral-50 text-center">Hypnotherapy reinforces positive behaviors essential for recovery, leading to improved sleep, energy, and immune function.</div>
                            </div>
                            <div class="flex flex-col items-center bg-white rounded shadow p-6">
                                <img class="w-12 lg:w-14" src="../assets/hypnozio/summary/money.svg" alt="Financial Stability Icon" />
                                <div class="text-[20px] lg:text-title-large text-primary text-center mt-2">Financial Stability</div>
                                <hr class="text-neutral-80 my-4 w-full" />
                                <div class="text-body-medium lg:text-body-large text-neutral-50 text-center">Hypnotherapy addresses addiction root causes, promoting healthier coping mechanisms and better financial decisions.</div>
                            </div>
                            <div class="flex flex-col items-center bg-white rounded shadow p-6">
                                <img class="w-12 lg:w-14" src="../assets/hypnozio/summary/brain.svg" alt="Mental Health Icon" />
                                <div class="text-[20px] lg:text-title-large text-primary text-center mt-2">Mental Health</div>
                                <hr class="text-neutral-80 my-4 w-full" />
                                <div class="text-body-medium lg:text-body-large text-neutral-50 text-center">Hypnotherapy addresses stressors and negative thoughts associated with addiction, decreasing anxiety and depression, and improving mental well-being.</div>
                            </div>
                            <div class="flex flex-col items-center bg-white rounded shadow p-6">
                                <img class="w-12 lg:w-14" src="../assets/hypnozio/summary/users.svg" alt="Relationships Icon" />
                                <div class="text-[20px] lg:text-title-large text-primary text-center mt-2">Relationships</div>
                                <hr class="text-neutral-80 my-4 w-full" />
                                <div class="text-body-medium lg:text-body-large text-neutral-50 text-center">Hypnotherapy resolves past traumas and improves communication, crucial for rebuilding trust and healthier relationships.</div>
                            </div>
                            <div class="flex flex-col items-center bg-white rounded shadow p-6">
                                <img class="w-12 lg:w-14" src="../assets/hypnozio/summary/settings.svg" alt="Productivity and Performance Icon" />
                                <div class="text-[20px] lg:text-title-large text-primary text-center mt-2">Productivity and Performance</div>
                                <hr class="text-neutral-80 my-4 w-full" />
                                <div class="text-body-medium lg:text-body-large text-neutral-50 text-center">Hypnotherapy improves focus, motivation, and time management, essential for enhanced productivity and performance.</div>
                            </div>
                        </div>
                        <a class="cursor-pointer link text-label-extra-large text-center text-white font-bold bg-primary hover:bg-primary-50 hover:shadow-2 py-[17px] rounded min-w-[340px] lg:min-w-[360px] mx-auto mt-6 lg:mt-10" id="" href="/alcohol-hypnotherapy/checkout.php">
                            Get my plan
                        </a>
                    </div>
                    <div class="mt-12 lg:mt-20">
                        <div class="text-headline-small lg:text-headline-large text-center mb-6 lg:mb-10">Your personal summary</div>
                        <div class="flex flex-wrap [&amp;&gt;*:nth-child(3)]:md:-mt-2">
                            <div class="basis-full md:basis-1/2 h-fit rounded border border-primary-70 p-6 text-primary-10 mb-6 md:mb-0 last:mb-0 md:mt-10 first:md:mt-0 md:max-w-[400px] lg:max-w-[428px] xl:max-w-[448px] md:mx-auto">
                                <div class="flex items-center">
                                    <img class="w-12 mr-4" src="../assets/hypnozio/summary/beer.svg" alt="" />
                                    <div class="text-[20px] lg:text-title-large text-primary-10">Addiction you would like to overcome</div>
                                </div>
                                <hr class="w-full text-primary-70 my-4">
                                <div class="py-4 rounded border border-primary px-6 bg-primary-95">Alcohol</div>
                            </div>
                            <div class="basis-full md:basis-1/2 h-fit rounded border border-primary-70 p-6 text-primary-10 mb-6 md:mb-0 last:mb-0 md:mt-10 first:md:mt-0 md:max-w-[400px] lg:max-w-[428px] xl:max-w-[448px] md:mx-auto">
                                <div class="flex items-center">
                                    <img class="w-12 mr-4" src="../assets/hypnozio/summary/calendar.svg" alt="" />
                                    <div class="text-[20px] lg:text-title-large text-primary-10">You engage in your addictive behavior</div>
                                </div>
                                <hr class="w-full text-primary-70 my-4">
                                <div class="py-4 rounded border border-primary px-6 bg-primary-95"><?= $addictionFrequency ?></div>
                            </div>
                            <div class="basis-full md:basis-1/2 h-fit rounded border border-primary-70 p-6 text-primary-10 mb-6 md:mb-0 last:mb-0 md:mt-10 first:md:mt-0 md:max-w-[400px] lg:max-w-[428px] xl:max-w-[448px] md:mx-auto">
                                <div class="flex items-center">
                                    <img class="w-12 mr-4" src="../assets/hypnozio/summary/trophy.svg" alt="" />
                                    <div class="text-[20px] lg:text-title-large text-primary-10">Your primary goal is</div>
                                </div>
                                <hr class="w-full text-primary-70 my-4">
                                <div class="py-4 rounded border border-primary px-6 bg-primary-95"><?= $primaryGoal ?></div>
                            </div>
                            <div class="basis-full md:basis-1/2 h-fit rounded border border-primary-70 p-6 text-primary-10 mb-6 md:mb-0 last:mb-0 md:mt-10 first:md:mt-0 md:max-w-[400px] lg:max-w-[428px] xl:max-w-[448px] md:mx-auto">
                                <div class="flex items-center">
                                    <img class="w-12 mr-4" src="../assets/hypnozio/summary/hourglass.svg" alt="" />
                                    <div class="text-[20px] lg:text-title-large text-primary-10">You&#039;ve been struggling with your addiction for</div>
                                </div>
                                <hr class="w-full text-primary-70 my-4">
                                <div class="py-4 rounded border border-primary px-6 bg-primary-95"><?= $timeOnAddiction ?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="lg:basis-8/12 mx-auto mt-12 lg:mt-20">
                    <div class="flex flex-col space-y-10 lg:space-y-8">
                        <div class="text-headline-small md:text-headline-medium lg:text-headline-large text-onSurface text-center">Your plan includes:</div>
                        <div class="flex flex-wrap gap-8 md:gap-10">
                            <div class="md:basis-3/12 mx-auto">
                                <img class="max-w-[178px] md:max-w-[199px]" src="../assets/hypnozio/summary/iphone-plan.png" alt="Image of an Iphone playing an audio course">
                            </div>
                            <div class="md:basis-8/12 ">
                                <div class="flex flex-col space-y-4 lg:space-y-5 ">
                                    <div class="flex space-x-4 p-4 bg-neutralVariant-95 rounded">
                                        <div>
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect x="3" y="3" width="18" height="18" rx="4" fill="#27BFB3" />
                                                <path d="M8.28033 11.775C7.98744 11.4821 7.51256 11.4821 7.21967 11.775C6.92678 12.0679 6.92678 12.5427 7.21967 12.8356L9.94202 15.558C10.2349 15.8509 10.7098 15.8509 11.0027 15.558L17.447 9.11367C17.7399 8.82078 17.7399 8.34591 17.447 8.05301C17.1541 7.76012 16.6792 7.76012 16.3863 8.05301L10.4724 13.967L8.28033 11.775Z" fill="white" />
                                            </svg>
                                        </div>
                                        <div class="text-body-medium md:text-body-medium lg:text-body-large">Hypnotherapy audio course created to change your relationship with addictive substances or behaviors.</div>
                                    </div>
                                    <div class="flex space-x-4 p-4 bg-neutralVariant-95 rounded">
                                        <div>
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect x="3" y="3" width="18" height="18" rx="4" fill="#27BFB3" />
                                                <path d="M8.28033 11.775C7.98744 11.4821 7.51256 11.4821 7.21967 11.775C6.92678 12.0679 6.92678 12.5427 7.21967 12.8356L9.94202 15.558C10.2349 15.8509 10.7098 15.8509 11.0027 15.558L17.447 9.11367C17.7399 8.82078 17.7399 8.34591 17.447 8.05301C17.1541 7.76012 16.6792 7.76012 16.3863 8.05301L10.4724 13.967L8.28033 11.775Z" fill="white" />
                                            </svg>
                                        </div>
                                        <div class="text-body-medium md:text-body-medium lg:text-body-large">50+ hypnotherapy sessions to help you overcome your alcohol addiction.</div>
                                    </div>
                                    <div class="flex space-x-4 p-4 bg-neutralVariant-95 rounded">
                                        <div>
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect x="3" y="3" width="18" height="18" rx="4" fill="#27BFB3" />
                                                <path d="M8.28033 11.775C7.98744 11.4821 7.51256 11.4821 7.21967 11.775C6.92678 12.0679 6.92678 12.5427 7.21967 12.8356L9.94202 15.558C10.2349 15.8509 10.7098 15.8509 11.0027 15.558L17.447 9.11367C17.7399 8.82078 17.7399 8.34591 17.447 8.05301C17.1541 7.76012 16.6792 7.76012 16.3863 8.05301L10.4724 13.967L8.28033 11.775Z" fill="white" />
                                            </svg>
                                        </div>
                                        <div class="text-body-medium md:text-body-medium lg:text-body-large">Monthly hypnotherapy sessions to maintain addiction recovery.</div>
                                    </div>
                                    <div class="flex space-x-4 p-4 bg-neutralVariant-95 rounded">
                                        <div>
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect x="3" y="3" width="18" height="18" rx="4" fill="#27BFB3" />
                                                <path d="M8.28033 11.775C7.98744 11.4821 7.51256 11.4821 7.21967 11.775C6.92678 12.0679 6.92678 12.5427 7.21967 12.8356L9.94202 15.558C10.2349 15.8509 10.7098 15.8509 11.0027 15.558L17.447 9.11367C17.7399 8.82078 17.7399 8.34591 17.447 8.05301C17.1541 7.76012 16.6792 7.76012 16.3863 8.05301L10.4724 13.967L8.28033 11.775Z" fill="white" />
                                            </svg>
                                        </div>
                                        <div class="text-body-medium md:text-body-medium lg:text-body-large">Content available on any device.</div>
                                    </div>
                                    <div class="flex space-x-4 p-4 bg-neutralVariant-95 rounded">
                                        <div>
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect x="3" y="3" width="18" height="18" rx="4" fill="#27BFB3" />
                                                <path d="M8.28033 11.775C7.98744 11.4821 7.51256 11.4821 7.21967 11.775C6.92678 12.0679 6.92678 12.5427 7.21967 12.8356L9.94202 15.558C10.2349 15.8509 10.7098 15.8509 11.0027 15.558L17.447 9.11367C17.7399 8.82078 17.7399 8.34591 17.447 8.05301C17.1541 7.76012 16.6792 7.76012 16.3863 8.05301L10.4724 13.967L8.28033 11.775Z" fill="white" />
                                            </svg>
                                        </div>
                                        <div class="text-body-medium md:text-body-medium lg:text-body-large">24/7 client support.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="cursor-pointer link text-label-extra-large text-center text-white font-bold bg-primary hover:bg-primary-50 hover:shadow-2 py-[17px] rounded min-w-[340px] lg:min-w-[360px] mx-auto mt-8 lg:mt-10" id="" href="/alcohol-hypnotherapy/checkout.php">
                            Get my plan
                        </a>
                    </div>
                </div>
                <div class="lg:basis-8/12 mx-auto mt-12 lg:mt-20">
                    <div class="bg-white shadow rounded p-6 flex flex-col">
                        <div class="text-headline-small md:text-headline-medium text-center mb-6">Our promise</div>
                        <p class="mb-6 text-body-medium md:text-body-large text-onSurface ">We promise to provide you with the highest quality hypnotherapy sessions that are specifically designed to support your addiction recovery efforts. Our team of experienced hypnotherapists has carefully crafted each session to address the root causes of addiction and help you build healthy habits for sustainable recovery.</p>
                        <p class="mb-0 text-body-medium md:text-body-large text-onSurface ">We are confident that you will see results with our product, and we are here to support you every step of the way. If you ever have any questions or concerns, please do not hesitate to reach out to us.<br />We promise to continue delivering exceptional products and services to help you achieve your addiction recovery goals.</p>
                        <div class="text-body-medium md:text-body-large text-onSurface mt-3 font-bold">Hypnozio team</div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</body>


</html>
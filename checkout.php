<?php
session_start();

$ageRange = $_SESSION['AGE_RANGE'] ?? '';
$overWeightReason = $_SESSION['OVERWEIGHT_REASON'] ?? '';
$desiredWeight = $_SESSION['summary']['desired_weight'] ?? '';
?>

<!DOCTYPE html>
<html lang="en" class="">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <link rel="icon" type="image/x-icon" href="assets/images/favicons/nh.svg">
    <title>Natural Neuro Hypnosis | Checkout</title>

    <link rel="preload" as="style" href="assets/css/app.css" />
    <link rel="stylesheet" href="assets/css/app.css" data-navigate-track="reload" />
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
                <img src="assets/logo.svg" class="" alt="NH">
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
              
                  
                   
                    
                    
            </div>
        </div>
        
        <div id="pricingTable" class="basis-full lg:basis-10/12 mx-auto mt-12 lg:mt-8">
                    <div class="lg:flex justify-center text-headline-large mb-10">
                  <center>      <p class="offer-text">
        Get Your Complete Weight Loss Program Today <br>
        For Just <span class="strike-text">$197</span> FREE! <br>
         <span class="small-text"> For a limited time, you can test-drive the weight loss program for free. After 7 days you'll get lifetime acess for just $29. </span></center> 
    </p>
</div>
 
                     </div>
                     
                   

                                            <a class="cursor-pointer link btn h-14 mt-10 max-w-[360px] mx-auto" id="" href="https://paymentgateway.thrivecart.com/neuro-weight-loss-special/">
                              YES! I Want To Start My Free Trial!
                              
                        </a>
                        
                        <center>Pay $0 Today, And $29 One-Time After 7 days </center> 
                        
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
                                <img class="w-full rounded-tl-[64px] rounded-br-[64px]" src="assets/checkouts/client1.png" alt="" />
                                <div class="p-4 pt-2 h-full flex flex-col">
                                    <img class="w-[102px] mx-auto" src="assets/theme/detoxety/upsells/all-filled-stars.svg" alt="">
                                    <div class="text-centerfont-normal text-body-medium mt-2">
                                        &quot;Hypnotherapy for weight loss changed my life. The program helped me control my cravings, overcome emotional eating habits, and lose 20 pounds. I feel more confident and empowered than ever before.&quot;
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-col relative max-w-[344px] h-full mx-auto min-h-[480px]">
                                <img class="w-full rounded-tl-[64px] rounded-br-[64px]" src="assets/checkouts/client2.png" alt="" />
                                <div class="p-4 pt-2 h-full flex flex-col">
                                    <img class="w-[102px] mx-auto" src="assets/theme/detoxety/upsells/all-filled-stars.svg" alt="">
                                    <div class="text-centerfont-normal text-body-medium mt-2">
                                        &quot;I was skeptical, but the hypnotherapy program for weight loss helped me address underlying issues like stress and anxiety that were causing me to overeat. I&#039;ve lost over 30 pounds and highly recommend it to anyone struggling with their weight.&quot;
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-col relative max-w-[344px] h-full mx-auto min-h-[480px]">
                                <img class="w-full rounded-tl-[64px] rounded-br-[64px]" src="assets/checkouts/client3.png" alt="" />
                                <div class="p-4 pt-2 h-full flex flex-col">
                                    <img class="w-[102px] mx-auto" src="assets/theme/detoxety/upsells/all-filled-stars.svg" alt="">
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
                            <img class="w-[343px] rounded-tl-[64px] rounded-br-[64px]" src="assets/checkouts/client1.png" alt="" />
                            <div class="pt-2 flex flex-col space-y-2 px-4">
                                <img class="w-[120px] mx-auto" src="assets/theme/detoxety/upsells/all-filled-stars.svg" alt="">
                                <div class="text-center font-normal text-body-medium mb-2 max-w-[343px]">
                                    &quot;Hypnotherapy for weight loss changed my life. The program helped me control my cravings, overcome emotional eating habits, and lose 20 pounds. I feel more confident and empowered than ever before.&quot;
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col">
                            <img class="w-[343px] rounded-tl-[64px] rounded-br-[64px]" src="assets/checkouts/client2.png" alt="" />
                            <div class="pt-2 flex flex-col space-y-2 px-4">
                                <img class="w-[120px] mx-auto" src="assets/theme/detoxety/upsells/all-filled-stars.svg" alt="">
                                <div class="text-center font-normal text-body-medium mb-2 max-w-[343px]">
                                    &quot;I was skeptical, but the hypnotherapy program for weight loss helped me address underlying issues like stress and anxiety that were causing me to overeat. I&#039;ve lost over 30 pounds and highly recommend it to anyone struggling with their weight.&quot;
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col">
                            <img class="w-[343px] rounded-tl-[64px] rounded-br-[64px]" src="assets/checkouts/client3.png" alt="" />
                            <div class="pt-2 flex flex-col space-y-2 px-4">
                                <img class="w-[120px] mx-auto" src="assets/theme/detoxety/upsells/all-filled-stars.svg" alt="">
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
                        <img class="w-[72px] lg:w-[210px]" src="assets/checkouts/bloomberg-logo.svg" alt="" />
                        <img class="w-[74px] lg:w-[125px]" src="assets/checkouts/business-insider-logo.svg" alt="" />
                        <img class="w-[69px] lg:w-[105px]" src="assets/checkouts/yahoo-logo.svg" alt="" />
                        <img class="w-[64px] lg:w-[131px]" src="assets/checkouts/cbs-logo.svg" alt="" />
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
                       
                    </div>
                    <div class="text-title-large lg:text-headline-large text-center mt-12 lg:mt-20 mb-6 lg:mb-10">
                        Still not sure? Listen to a short sample of the hypnosis.
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
                                    <source src="self-belief.mp3" type="audio/mpeg">
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
                  
                <div id="pricingTable" class="basis-full lg:basis-10/12 mx-auto mt-12 lg:mt-8">
                    <div class="lg:flex justify-center text-headline-large mb-10">
                         
                    <div class="offer-container">
   <center>      <p class="offer-text">
        Get Your Complete Weight Loss Program Today <br>
        For Just <span class="strike-text">$197</span> FREE! <br>
        <span class="small-text"> For a limited time, you can test-drive the weight loss program for free. After 7 days you'll get lifetime acess for just $29. </span></center> 
</div>
<style>
.offer-container {
    text-align: center;
    padding: 20px;
}

.offer-text {
    font-size: 18px;
    font-weight: bold;
}

.strike-text {
    text-decoration: line-through;
}

.small-text {
    font-size: 16px;
    display: block;
    margin-top: 1px;
    font-weight: normal;
}

@media (max-width: 600px) {
    .offer-container {
        padding: 10px;
    }
}

</style>

                    </div>
                    
                    
              

                                          <a class="cursor-pointer link btn h-14 mt-10 max-w-[360px] mx-auto" id="" href="https://paymentgateway.thrivecart.com/neuro-weight-loss-special/">
                           YES! I Want To Start My Free Trial!
                        </a>
                 
                                         <center>Pay $0 Today, And $29 One-Time After 7 days </center> 

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
        </div>
    </div>

</br>
</br>
<center>Copyright 2024 - NH Special</center>

</body>


</html>
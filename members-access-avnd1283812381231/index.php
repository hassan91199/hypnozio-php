<!DOCTYPE html>
<html lang="en" class="">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <link rel="icon" type="image/x-icon" href="/assets/images/favicons/naturalhypnosis.svg">
    <title>Members Area</title>

    <link rel="preload" as="style" href="/assets/build/app-824c45d5.css" />
    <link rel="stylesheet" href="/assets/build/app-824c45d5.css" data-navigate-track="reload" />
    <link rel="modulepreload" href="/assets/build/app-824c45d5.js" />
    <link rel="modulepreload" href="/assets/build/bootstrap-214fcc70.js" />
    <link rel="modulepreload" href="/assets/build/jquery-2c3981e2.js" />
    <link rel="modulepreload" href="/assets/build/module.esm-3f6ffe0c.js" />
    <link rel="modulepreload" href="/assets/build/_commonjsHelpers-de833af9.js" />
    <link rel="modulepreload" href="/assets/build/jquery-68c15ecd.js" />
    <script type="module" src="/assets/build/app-5f69faf4.js" data-navigate-track="reload"></script>
    <link rel="modulepreload" href="/assets/build/cookies-ee50a713.js" />
    <script type="module" src="/assets/build/cookies-ee50a713.js" data-navigate-track="reload"></script>
    <link rel="modulepreload" href="/assets/build/alpine-splide-54756862.js" />
    <link rel="modulepreload" href="/assets/build/module.esm-958008ac.js" />
    <link rel="modulepreload" href="/assets/build/alpine-splide.esm-09083027.js" />
    <script type="module" src="/assets/build/alpine-js-2881bf21.js" data-navigate-track="reload"></script>
    <link rel="modulepreload" href="/assets/build/input-validation-36ee9ab8.js" />
    <script type="module" src="/assets/build/input-validation-36ee9ab8.js" data-navigate-track="reload"></script>
    <link rel="modulepreload" href="/assets/build/audio-player.js" />
    <script type="module" src="/assets/build/audio-player.js" data-navigate-track="reload"></script>
    <link rel="modulepreload" href="/assets/build/gtm-tags-e2664de5.js" />
    <script type="module" src="/assets/build/gtm-tags-e2664de5.js" data-navigate-track="reload"></script>
    
    <style>/* General body settings */
body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
}

/* Container should take full width of the screen */
.container {
    width: 100%;
    padding: 0 15px;
    margin: 0 auto;
}

/* Navigation */
nav {
    width: 100%;
    padding: 10px 0;
    background: #007BFF;
}

nav .container {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

/* Flexbox settings for general alignment */
.flex {
    display: flex;
    flex-wrap: wrap;
}

.flex-center {
    justify-content: center;
    align-items: center;
}

/* Headline and title text */
.text-headline-large {
    font-size: 1.5em;
    text-align: center;
    margin-top: 20px;
}

.text-title-large {
    font-size: 1.25em;
    text-align: center;
    margin: 20px 0;
}

/* Buttons styling */
.buttonflex-container .buttonflex-button {
    display: block;
    width: 90%;
    max-width: 500px;
    padding: 15px;
    margin: 10px auto;
    text-decoration: none;
    color: white;
    background-color: #007BFF;
    border-radius: 5px;
    font-size: 18px;
    transition: background-color 0.3s;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
}

.buttonflex-container .buttonflex-button span.music-note {
    margin-right: 10px;
}

.buttonflex-container .buttonflex-button:hover {
    background-color: #28a745; /* Change to green when hovered */
}

/* Tips list styling */
.tips-list {
    list-style: none;
    padding: 0;
}

.tips-list li {
    display: flex;
    align-items: center;
    margin-bottom: 15px;
    background: #F1F1F1;
    border-radius: 8px;
    padding: 15px;
}

.tips-list li .number {
    flex-shrink: 0;
    width: 30px;
    height: 30px;
    border-radius: 50%;
    background: #28a745;
    color: white;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 16px;
    margin-right: 10px;
}

.tips-list li .text {
    flex-grow: 1;
}

/* FAQ dropdown button styling */
.faq-item {
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-bottom: 10px;
}

.faq-item header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px;
    background: #fff;
    cursor: pointer;
}

.faq-item header:hover {
    background: #f9f9f9;
}

.faq-item header svg {
    transition: transform 0.3s;
}

.faq-item.open header svg {
    transform: rotate(180deg);
}

.faq-item .content {
    padding: 10px;
    display: none;
}

.faq-item.open .content {
    display: block;
}

/* Responsive settings */
@media only screen and (max-width: 600px) {
    .container {
        padding: 0 10px;
    }

    .text-headline-large, .text-title-large {
        font-size: 1.2em;
    }

    .buttonflex-container .buttonflex-button {
        font-size: 16px;
        padding: 10px;
    }

    .tips-list li {
        flex-direction: column;
        align-items: flex-start;
    }

    .tips-list li .number {
        margin-bottom: 10px;
        margin-right: 0;
    }
}

/* Ensure transparent background for logo */
nav img {
    background: transparent;
}

</style>
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
                <img src="/assets/logo.svg" class="w-[110px] md:w-[108px]" alt="nh">
                <div class="flex items-center space-x-4">
                </div>
            </div>
        </div>
    </nav>

     <div class="container">
            <div class="flex flex-wrap">
                <div class="basis-full lg:basis-1/2 mx-auto">
                    <div class="text-headline-large text-center">Members Area</div>
                    <div class="mt-6 lg:mt-10 max-w-[552px] mx-auto lg:mr-0">
                        <div class="rounded shadow overflow-hidden">
                            <div class="bg-primary-95 p-4">
                               
                            <div class="bg-white p-4 space-y-4">
                                
                              This page is a permanent archive of your downloads, and will always be available for you to access. We've also e-mailed you a link to this page for you to keep in your records.
                                </br>
Once again thank you for purchasing from us, we hope you achieve amazing results from our albums.
                            </div>
                          
                            </div>
                        </div>
                    </div>
                </div>
     
      
                    
        
        <div class="container mt-12 lg:mt-20">
            <div class="flex flex-wrap">
                <div class="basis-full md:basis-8/12 lg:basis-1/2 mx-auto">
                    <div class="">
                        <div class="text-title-large lg:text-headline-large text-center mb-6 lg:mb-10">Tips for Effective Hypnotherapy Sessions</div>
                        <div class="space-y-2 lg:space-y-4">
                            <div class="flex items-center rounded bg-neutralVariant-95 p-4">
                                <div class="h-10 w-10 shrink-0 bg-tertiary-60 rounded-full flex justify-center items-center font-semibold text-body-medium text-tertiary-99">
                                    1
                                </div>
                                <div class="text-neutralVariant-30 text-body-large ml-4 lg:ml-6"><strong>Choose a Quiet Place:</strong> Find a peaceful, distraction-free environment.</div>
                            </div>
                            <div class="flex items-center rounded bg-neutralVariant-95 p-4">
                                <div class="h-10 w-10 shrink-0 bg-tertiary-60 rounded-full flex justify-center items-center font-semibold text-body-medium text-tertiary-99">
                                    2
                                </div>
                                <div class="text-neutralVariant-30 text-body-large ml-4 lg:ml-6"><strong>Wear Comfortable Clothes and Use Headphones:</strong> Opt for non-restrictive clothing and ensure clear audio for better focus.</div>
                            </div>
                            <div class="flex items-center rounded bg-neutralVariant-95 p-4">
                                <div class="h-10 w-10 shrink-0 bg-tertiary-60 rounded-full flex justify-center items-center font-semibold text-body-medium text-tertiary-99">
                                    3
                                </div>
                                <div class="text-neutralVariant-30 text-body-large ml-4 lg:ml-6"><strong>Find a Relaxing Position: </strong>Be comfortable but avoid positions that induce sleep.</div>
                            </div>
                            <div class="flex items-center rounded bg-neutralVariant-95 p-4">
                                <div class="h-10 w-10 shrink-0 bg-tertiary-60 rounded-full flex justify-center items-center font-semibold text-body-medium text-tertiary-99">
                                    4
                                </div>
                                <div class="text-neutralVariant-30 text-body-large ml-4 lg:ml-6"><strong>Listen Regularly:</strong> Listen to each hypnotherapy session in one continuous play without breaks, and ensure you hear each session at least 3 times per week before moving to the next one.</div>
                            </div>
                        </div>
                      
                    </div>
                    
                    
                    
                    <div class="bg-[#FAFFFD] rounded shadow-2 p-4 mt-12 lg:mt-20">
                        <div class="flex items-center">
                            <svg class="shrink-0" width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.041 22.8334L17.541 18.0417L13.5827 14.9584H18.416L19.9993 10L21.541 14.9584H26.416L22.4577 18.0417L23.916 22.8334L19.9993 19.875L16.041 22.8334ZM10.166 38.3334V25.6667C8.91602 24.3612 8.02018 22.9306 7.47852 21.375C6.93685 19.8195 6.66602 18.25 6.66602 16.6667C6.66602 12.8889 7.94379 9.72226 10.4993 7.16671C13.0549 4.61115 16.2216 3.33337 19.9993 3.33337C23.7771 3.33337 26.9438 4.61115 29.4993 7.16671C32.0549 9.72226 33.3327 12.8889 33.3327 16.6667C33.3327 18.25 33.0618 19.8195 32.5202 21.375C31.9785 22.9306 31.0827 24.3612 29.8327 25.6667V38.3334L19.9993 35.0417L10.166 38.3334ZM19.9993 27.5C23.0271 27.5 25.5896 26.4514 27.6868 24.3542C29.7841 22.257 30.8327 19.6945 30.8327 16.6667C30.8327 13.6389 29.7841 11.0764 27.6868 8.97921C25.5896 6.88199 23.0271 5.83337 19.9993 5.83337C16.9716 5.83337 14.4091 6.88199 12.3118 8.97921C10.2146 11.0764 9.16602 13.6389 9.16602 16.6667C9.16602 19.6945 10.2146 22.257 12.3118 24.3542C14.4091 26.4514 16.9716 27.5 19.9993 27.5ZM12.666 34.8334L19.9993 32.5417L27.3327 34.8334V27.7084C26.2216 28.5139 25.0271 29.0973 23.7493 29.4584C22.4716 29.8195 21.2216 30 19.9993 30C18.7771 30 17.5271 29.8195 16.2493 29.4584C14.9716 29.0973 13.7771 28.5139 12.666 27.7084V34.8334Z" fill="#006A63" />
                            </svg>
                            <div class="text-title-large">
Got Any Questions?                            </div>
                        </div>
                        <div class="text-body-medium mt-6">
                            If you have any questions, please email support@naturalhypnosis.com or reach out to us directly.
                        </div>
                    </div>
                    
                    
                 
                    
                    
               
                    
<div class="buttonflex-container mt-12 lg:mt-20">
    <div class="flex flex-wrap">
        <div class="basis-full md:basis-8/12 lg:basis-1/2 mx-auto">
            <div class="">
                <div class="text-title-large lg:text-headline-large text-center mb-6 lg:mb-10">Weight Management Hypnotherapy</div>
                
                     <div class="mt-6 lg:mt-10 max-w-[552px] mx-auto lg:mr-0">
                        <div class="rounded shadow overflow-hidden">
                            <div class="bg-primary-95 p-4">
                                
                            <div class="bg-white p-4 space-y-4">
                                
                                Explore our hypnotherapy weight loss program to uncover transformative insights and strategies designed to enhance your relationship with food. Let this session guide you toward a healthier, more mindful approach to eating. </br>
                              <strong>  Remember to listen to each session at least three times for the best results. Enjoy a fun and empowering journey to better health!</strong>
                            </div>
                          
                            </div>
                        </div>
                    </div>
                
                <h2 class="text-title-large lg:text-headline-large text-center"></h2>
                <div class="space-y-4 mt-6 lg:mt-10 max-w-[552px] mx-auto lg:mr-0">
                    <a href="https://download.naturalhypnosis.com/52cdcce0606fe616c8d9cc8c72f246721075378c3a15543bb182795fe6ddb580/Weight Loss - Natural Hypnosis.mp3" class="buttonflex-button"><span class="music-note">🎵</span>Download Weight Loss - Natural Hypnosis.mp3</a>
                    <a href="https://download.naturalhypnosis.com/812028b5af03296064f016c5d69f15808fbf94869cafbc06e5c82ee1fa13b48c/Think Yourself Thin - Natural Hypnosis.mp3" class="buttonflex-button"><span class="music-note">🎵</span>Download Think Yourself Thin - Natural Hypnosis.mp3</a>
                    <a href="https://download.naturalhypnosis.com/59dcd66a06e286bc6f5964e05db317e0f43cb3f6c54dacf73b6cd0b5b6ef1c97/Motivation to Exercise - Natural Hypnosis.mp3" class="buttonflex-button"><span class="music-note">🎵</span>Download Motivation to Exercise - Natural Hypnosis.mp3</a>
                    <a href="https://download.naturalhypnosis.com/334bd1eeca95905f77768987bbd26686cf1a1c802a15c9cc1ab16de3a34bc928/Increase Metabolism - Natural Hypnosis.mp3" class="buttonflex-button"><span class="music-note">🎵</span>Download Increase Metabolism - Natural Hypnosis.mp3</a>
                    <a href="https://download.naturalhypnosis.com/28e27c75bfa99099dd833ce3021bac16013cb0f6d479d29d215a9ee106dbcfca/Diet Motivation - Natural Hypnosis.mp3" class="buttonflex-button"><span class="music-note">🎵</span>Download Diet Motivation - Natural Hypnosis.mp3</a>
                    <a href="https://download.naturalhypnosis.com/e26de5b06db4caf771b349550bd910dbd63999b40cb0661e62508f1541fb9320/Stop Comfort Eating - Natural Hypnosis.mp3" class="buttonflex-button"><span class="music-note">🎵</span>Download Stop Comfort Eating - Natural Hypnosis.mp3></a>
                    <a href="https://download.naturalhypnosis.com/d331c34e5c510b6b7f708633963a72b9353f9ae214db0faf57642ba2d5f76328/Develop Healthy Eating Habits - Natural Hypnosis.mp3" class="buttonflex-button"><span class="music-note">🎵</span>Download Develop Healthy Eating Habits - Natural Hypnosis.mp3></a>
                </div>
                
               </br> <h2 class="text-title-large lg:text-headline-large text-center">Gastric Band Hypnosis</h2>
                
                
            <div class="mt-6 lg:mt-10 max-w-[552px] mx-auto lg:mr-0">
                        <div class="rounded shadow overflow-hidden">
                            <div class="bg-primary-95 p-4">
                                
                            <div class="bg-white p-4 space-y-4">
                                

                             The hypno gastric band is a therapeutic technique that uses hypnosis to mimic the effects of gastric band surgery without any actual surgical procedure. In traditional surgery, a gastric band is implanted to create a sense of fullness with smaller food portions. </br> Similarly, the hypno gastric band process employs hypnotherapy to simulate this effect, influencing the individual's perception and behavior around food. This non-invasive approach aims to help individuals experience the benefits of a gastric band through the power of the mind.</br>
                              <strong>  Remember to listen to each session at least three times for the best results. Enjoy a fun and empowering journey to better health!</strong>
                            </div>
                          
                            </div>
                        </div>
                    </div>
                    
                    
                    
                    
                    
                <div class="space-y-4 mt-6 lg:mt-10 max-w-[552px] mx-auto lg:mr-0">
                    <a href="https://download.naturalhypnosis.com/596068645f03ad8dff7dcd3be00625d2cfdb84edde12de0e5e6ca9c95503bb68/Food and Nutrition Guide.pdf" class="buttonflex-button"><span class="music-note">🎵</span>Download Food and Nutrition Guide.pdf</a>
                    <a href="https://download.naturalhypnosis.com/62f704d8782eab39ffa624ea3f8c5d2bf1de86ed0ddc814c2569b7bcb6da36d7/Gastric Band Session 1 - Depth Conditioning.mp3" class="buttonflex-button"><span class="music-note">🎵</span>Download Gastric Band Session 1 - Depth Conditioning.mp3</a>
                    <a href="https://download.naturalhypnosis.com/f110ec056d1089ce404d8bc404b36752eaa4d3cb14540d2e1a3b12be0c91d181/Gastric Band Session 2 - Healthy Habit Anchors.mp3" class="buttonflex-button"><span class="music-note">🎵</span>Download Gastric Band Session 2 - Healthy Habit Anchors.mp3</a>
                    <a href="https://download.naturalhypnosis.com/67e23c3fa7ed099d2e12dc811c80a349dc4f2e3ba046df461de0166d06a0d370/Gastric Band Session 3 - Gastric Band Surgery.mp3" class="buttonflex-button"><span class="music-note">🎵</span>Download Gastric Band Session 3 - Gastric Band Surgery.mp3</a>
                    <a href="https://download.naturalhypnosis.com/7db79ffaf8a1accfff1313c1cd4a725c13daef834e71027c94ef73fc290d07ce/Gastric Band Session 4 - Fulfillment and Fuel.mp3" class="buttonflex-button"><span class="music-note">🎵</span>Download Gastric Band Session 4 - Fulfillment and Fuel.mp3</a>
                    <a href="https://download.naturalhypnosis.com/9a6674189de8bfc26b0c3ac62fbf116a7d9cbab175e72c7c3b8fbb18f1198f09/Gastric Band Session 5 - Confidence and Commitment.mp3" class="buttonflex-button"><span class="music-note">🎵</span>Download Gastric Band Session 5 - Confidence and Commitment.mp3</a>
                    <a href="https://download.naturalhypnosis.com/e4cf34abc2c10d798bc43f695c6ccf800916687382c127bd390fec74f879ea47/Gastric Band Session 6 - Releasing Resistance.mp3" class="buttonflex-button"><span class="music-note">🎵</span>Download Gastric Band Session 6 - Releasing Resistance.mp3</a>
                    <a href="https://download.naturalhypnosis.com/1a3168ba333995865b476c6c7ff32ba1430825927c48d9d9ccfc1b083aa6c816/Gastric Band Session 7 - Release Stress, Tighten Band.mp3" class="buttonflex-button"><span class="music-note">🎵</span>Download Gastric Band Session 7 - Release Stress, Tighten Band.mp3</a>
                    <a href="https://download.naturalhypnosis.com/ed3122829250e8e393450916ad2dd7ed61edbf3c3f3459f69eb910e33acdecd0/Gastric Band Surgery Mindset.pdf" class="buttonflex-button"><span class="music-note">🎵</span>Download Gastric Band Surgery Mindset.pdf</a>
                    <a href="https://download.naturalhypnosis.com/39b285bf9ee19d9e59689b4e9f3f131f2ee124cfe9d57755ab69a5dab74eab48/Life After Gastric Band Surgery.pdf" class="buttonflex-button"><span class="music-note">🎵</span>Download Life After Gastric Band Surgery.pdf</a>
                </div>
                  </br>
                <h2 class="text-title-large lg:text-headline-large text-center">The Ultimate Confidence Super Package</h2>
                
                
            <div class="mt-6 lg:mt-10 max-w-[552px] mx-auto lg:mr-0">
                        <div class="rounded shadow overflow-hidden">
                            <div class="bg-primary-95 p-4">
                                
                            <div class="bg-white p-4 space-y-4">
                                

                          If you really want it, if you are ready to transform your mindset internally and to push yourself externally then you really could begin this change and move towards lasting, natural confidence with help from our unique self confidence hypnosis sessions
                                </br>
                              <strong>  Remember to listen to each session at least three times for the best results. Enjoy a fun and empowering journey to better health!</strong>
                            </div>
                          
                            </div>
                        </div>
                    </div>
                    
                    
                    
                    
                    
                <div class="space-y-4 mt-6 lg:mt-10 max-w-[552px] mx-auto lg:mr-0">
                    <a href="https://download.naturalhypnosis.com/32b8f30e82d94dc11fd7cff948427f2675d4f38e7de722cdbeb1e1ed49712679/Stop Caring What Others Think - Natural Hypnosis.mp3" class="buttonflex-button"><span class="music-note">🎵</span>Download Stop Caring What Others Think - Natural Hypnosis.mp3</a>
                    <a href="https://download.naturalhypnosis.com/fc121ac450e7cd93c0e3a29bcd2c4a2d9fe27668532dfc164381bd68ecb80504/Improve Confidence - Natural Hypnosis.mp3" class="buttonflex-button"><span class="music-note">🎵</span>Download Improve Confidence - Natural Hypnosis.mp3</a>
                    <a href="https://download.naturalhypnosis.com/0798e619d1721f2b115ce4c59e214a657fbd42c658c2921a2eb2abbb3c31cceb/Improve Self Esteem - Natural Hypnosis.mp3" class="buttonflex-button"><span class="music-note">🎵</span>Download Improve Self Esteem - Natural Hypnosis.mp3</a>
                    <a href="https://download.naturalhypnosis.com/1a71983c71bb0073809266f211f32c9fa2e7cff476a8d5aa1e7f0af84316acc5/Love Yourself - Natural Hypnosis.mp3" class="buttonflex-button"><span class="music-note">🎵</span>Download Love Yourself - Natural Hypnosis.mp3</a>
                    <a href="https://download.naturalhypnosis.com/b7b31bd12fbe028db4088facc8d673f0dc12d2f29f9e4c18755bdaee4894369e/Extrovert Personality - Natural Hypnosis.mp3" class="buttonflex-button"><span class="music-note">🎵</span>Download Extrovert Personality - Natural Hypnosis.mp3</a>
                    <a href="https://download.naturalhypnosis.com/f6d4a911c2da537aebc07329983e47495d6d9d6cf9fa1debf9df3d767cffb39e/Develop Charisma - Natural Hypnosis.mp3" class="buttonflex-button"><span class="music-note">🎵</span>Download Develop Charisma - Natural Hypnosis.mp3</a>
                    <a href="https://download.naturalhypnosis.com/a66dbe674428b3882b48a3befebe8af260f9ce9bd736c541a1d135e26c702662/Self Belief - Natural Hypnosis.mp3" class="buttonflex-button"><span class="music-note">🎵</span>Download Self Belief - Natural Hypnosis.mp3</a>
                    <a href="https://download.naturalhypnosis.com/7da73f0df738c2e0c36bf41eb9a1bfeb88d8473cf15d3dfbc1f90503b884bcc1/Improve Voice Projection - Natural Hypnosis.mp3" class="buttonflex-button"><span class="music-note">🎵</span>Download Improve Voice Projection - Natural Hypnosis.mp3</a>
                    <a href="https://download.naturalhypnosis.com/918753e84d1496a2baf42bf391e30d5128648872e25d7afc7786acd53bac077f/Be More Assertive - Natural Hypnosis.mp3" class="buttonflex-button"><span class="music-note">🎵</span>Download Be More Assertive - Natural Hypnosis.mp3</a>
                </div>
                
            </div>
        </div>
    </div>
</div>




                    



                    <div class="text-title-large lg:text-headline-large text-center mt-12 lg:mt-20">
                        FAQ
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
        <div x-show="open" class="text-body-medium mt-4"> Brennan Smith writes and records all of the albums.</br>Brennan’s love of science and the brain led him to complete a Bachelor’s Degree from the University of Kansas in Cellular Biology (with an emphasis on Neurophysiology).</br>He then completed a 1-year certification in therapeutic hypnosis from the Hypnosis Motivation Institute, where he graduated with Honors and eventually became a member of the teaching staff.</br>Brennan is also a member of the American Hypnosis Association, and received the most rigorous certification available in the US; the Clinical Hypnotherapist Certification from the Hypnotherapists’ Union. He was later invited to serve on their Executive Board, which he did gratefully for 4 years. </br>In addition to traditional hypnosis techniques, Brennan uses a full range of Neuro-Linguistic Programming (NLP) and guided imagery techniques to help clients awaken the full potential of their minds.</br>He is a full time hypnotherapist based in the USA (Beverly Hills, CA), where he has practiced full time since 2004. Through his private practice, phone sessions around the world, group presentations to various organizations and of course his hypnosis recordings Brennan has helped thousands of people change their lives.</br>“I have seen so many people make amazing changes in their lives, and I know for a fact now that anything is possible. In my own life, hypnosis has helped me overcome procrastination, improve my relationship with my wife, and get over a phobia of spiders. Hypnosis is natural, it’s safe, and it really works.” - Brennan Smith</div>
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
    <div x-data="{ open: false }" x-on:click="open = !open" class="p-4 rounded shadow-2 bg-white">
        <div class="flex justify-between">
            <div class="text-body-medium lg:text-body-large font-semibold text-inherit">
                What is the best way to listen?
            </div>
            <div>
                <svg x-bind:class="open ? 'rotate-180' : ''" width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.9752 14.475L8.80017 11.3C8.56684 11.0667 8.51267 10.7959 8.63767 10.4875C8.76267 10.1792 8.99184 10.025 9.32517 10.025H15.6752C16.0085 10.025 16.2377 10.1792 16.3627 10.4875C16.4877 10.7959 16.4335 11.0667 16.2002 11.3L13.0252 14.475C12.9418 14.5584 12.8585 14.6167 12.7752 14.65C12.6918 14.6834 12.6002 14.7 12.5002 14.7C12.4002 14.7 12.3085 14.6834 12.2252 14.65C12.1418 14.6167 12.0585 14.5584 11.9752 14.475Z" fill="#1B1B1F" />
                </svg>
            </div>
        </div>
        <div x-show="open" class="text-body-medium mt-4">All you need is a comfortable seat, or somewhere you can lie down for 30 minutes without being interrupted. Get comfortable and play the album - using our albums is no more complicated than that, but please do not listen while you are driving or while your attention is required elsewhere.</div>
    </div>
    <div x-data="{ open: false }" x-on:click="open = !open" class="p-4 rounded shadow-2 bg-white">
        <div class="flex justify-between">
            <div class="text

-body-medium lg:text-body-large font-semibold text-inherit">
                How often can I / should I listen to the album?
            </div>
            <div>
                <svg x-bind:class="open ? 'rotate-180' : ''" width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.9752 14.475L8.80017 11.3C8.56684 11.0667 8.51267 10.7959 8.63767 10.4875C8.76267 10.1792 8.99184 10.025 9.32517 10.025H15.6752C16.0085 10.025 16.2377 10.1792 16.3627 10.4875C16.4877 10.7959 16.4335 11.0667 16.2002 11.3L13.0252 14.475C12.9418 14.5584 12.8585 14.6167 12.7752 14.65C12.6918 14.6834 12.6002 14.7 12.5002 14.7C12.4002 14.7 12.3085 14.6834 12.2252 14.65C12.1418 14.6167 12.0585 14.5584 11.9752 14.475Z" fill="#1B1B1F" />
                </svg>
            </div>
        </div>
        <div x-show="open" class="text-body-medium mt-4">We recommend listening once per day - especially for the first week. Everyone experiences hypnosis differently and some people don't need to listen as much as others, however, if you are new to hypnosis then listening to the album just once per day should give you a good insight into how you react and how much you need to use the albums personally. Listening to an album more than once a day will never do you any harm, but it is not needed. In fact, it's useful to have the time between sessions to process and integrate the new patterns you're choosing. Then repeat the session the next day, and the benefits will continue to grow stronger!</div>
    </div>
    <div x-data="{ open: false }" x-on:click="open = !open" class="p-4 rounded shadow-2 bg-white">
        <div class="flex justify-between">
            <div class="text-body-medium lg:text-body-large font-semibold text-inherit">
                How long does hypnosis take to work?
            </div>
            <div>
                <svg x-bind:class="open ? 'rotate-180' : ''" width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.9752 14.475L8.80017 11.3C8.56684 11.0667 8.51267 10.7959 8.63767 10.4875C8.76267 10.1792 8.99184 10.025 9.32517 10.025H15.6752C16.0085 10.025 16.2377 10.1792 16.3627 10.4875C16.4877 10.7959 16.4335 11.0667 16.2002 11.3L13.0252 14.475C12.9418 14.5584 12.8585 14.6167 12.7752 14.65C12.6918 14.6834 12.6002 14.7 12.5002 14.7C12.4002 14.7 12.3085 14.6834 12.2252 14.65C12.1418 14.6167 12.0585 14.5584 11.9752 14.475Z" fill="#1B1B1F" />
                </svg>
            </div>
        </div>
        <div x-show="open" class="text-body-medium mt-4">With all of our albums you will experience some benefits upon listening for the very first time. However, all of our albums have a longer term, more permanent effect - if you keep using the album. We recommend listening once per day for a week in order to really start to notice the changes building. After a few days and you will be receiving more and more benefit from the album - the more you listen the more the hypnotic commands and suggestions get accepted by your mind and simply become part of who you are - changing your thoughts and behaviour on a deeper level. One to two weeks may be enough to get most of the benefit and experience a lasting change in your life, but if it is an area which you have struggled with for many years, or perhaps an emotionally challenging area of change then continued use of the album is advised. For some this might be 2 weeks, for others a month or more. You will be able to tell when you have most or all of the benefit from the album, but even then many people will listen as a “top up”, or if they know they've got a particularly tough situation coming in the near future, to strengthen the new positive ideas that are helping them move easily through it.</div>
    </div>
    <div x-data="{ open: false }" x-on:click="open = !open" class="p-4 rounded shadow-2 bg-white">
        <div class="flex justify-between">
            <div class="text-body-medium lg:text-body-large font-semibold text-inherit">
                Can I listen to multiple albums?
            </div>
            <div>
                <svg x-bind:class="open ? 'rotate-180' : ''" width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.9752 14.475L8.80017 11.3C8.56684 11.0667 8.51267 10.7959 8.63767 10.4875C8.76267 10.1792 8.99184 10.025 9.32517 10.025H15.6752C16.0085 10.025 16.2377 10.1792 16.3627 10.4875C16.4877 10.7959 16.4335 11.0667 16.2002 11.3L13.0252 14.475C12.9418 14.5584 12.8585 14.6167 12.7752 14.65C12.6918 14.6834 12.6002 14.7 12.5002 14.7C12.4002 14.7 12.3085 14.6834 12.2252 14.65C12.1418 14.6167 12.0585 14.5584 11.9752 14.475Z" fill="#1B1B1F" />
                </svg>
            </div>
        </div>
        <div x-show="open" class="text-body-medium mt-4">Yes, it is possible to listen to multiple albums, it just depends on your preferences and circumstances: If you are brand new to hypnosis then we would recommend just listening to one album for a week, seeing how you feel and how it works for you before moving onto the next or adding another. Each album takes 25-40 minutes to listen to, so there is a limit on how many you can listen to in a single day because of this. Once you have some familiarity then you will know personally how you react, how you change, experience growth and how long you need to listen for approximately - this is a subjective question and a little experimentation is required to find what works for YOU personally.</div>
    </div>
    <div x-data="{ open: false }" x-on:click="open = !open" class="p-4 rounded shadow-2 bg-white">
        <div class="flex justify-between">
            <div class="text-body-medium lg:text-body-large font-semibold text-inherit">
                Are the results permanent?
            </div>
            <div>
                <svg x-bind:class="open ? 'rotate-180' : ''" width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.9752 14.475L8.80017 11.3C8.56684 11.0667 8.51267 10.7959 8.63767 10.4875C8.76267 10.1792 8.99184 10.025 9.32517 10.025H15.6752C16.0085 10.025 16.2377 10.1792 16.3627 10.4875C16

.4877 10.7959 16.4335 11.0667 16.2002 11.3L13.0252 14.475C12.9418 14.5584 12.8585 14.6167 12.7752 14.65C12.6918 14.6834 12.6002 14.7 12.5002 14.7C12.4002 14.7 12.3085 14.6834 12.2252 14.65C12.1418 14.6167 12.0585 14.5584 11.9752 14.475Z" fill="#1B1B1F" />
                </svg>
            </div>
        </div>
        <div x-show="open" class="text-body-medium mt-4">Yes, the changes you experience because of hypnosis can and will last with you forever! Often people are skeptical because a problem is such a big part of their life - they can’t imagine being fully free from it. Lets take the example of a fear of heights. If you suffer from this phobia it can be very consuming and really influence your quality of life. People often don’t believe that something like hypnosis could cure them of this massive issue in such a small space of time, and that the change could last... Look at it from the other way around - often a phobia like this is acquired in a short space of time, perhaps due to very brief, but traumatic event. So just as this one traumatic event just happened to stimulate the right area of your mind to make a lasting (negative) impression on your life, hypnosis works to target your mind to make a quick, and equally lasting positive impact on your life!</div>
    </div>
    <div x-data="{ open: false }" x-on:click="open = !open" class="p-4 rounded shadow-2 bg-white">
        <div class="flex justify-between">
            <div class="text-body-medium lg:text-body-large font-semibold text-inherit">
                Am I falling asleep?
            </div>
            <div>
                <svg x-bind:class="open ? 'rotate-180' : ''" width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.9752 14.475L8.80017 11.3C8.56684 11.0667 8.51267 10.7959 8.63767 10.4875C8.76267 10.1792 8.99184 10.025 9.32517 10.025H15.6752C16.0085 10.025 16.2377 10.1792 16.3627 10.4875C16.4877 10.7959 16.4335 11.0667 16.2002 11.3L13.0252 14.475C12.9418 14.5584 12.8585 14.6167 12.7752 14.65C12.6918 14.6834 12.6002 14.7 12.5002 14.7C12.4002 14.7 12.3085 14.6834 12.2252 14.65C12.1418 14.6167 12.0585 14.5584 11.9752 14.475Z" fill="#1B1B1F" />
                </svg>
            </div>
        </div>
        <div x-show="open" class="text-body-medium mt-4">Many people think they have fallen asleep when they go into deep hypnosis, and it’s easy to figure out whether you did. Just answer this question: at the end of the session, did you hear Brennan count from 1 back up to 5? If so, then you were definitely listening on a very deep level, which is excellent. If not then you were asleep. If you are falling asleep then there are three simple adjustments you can make to prevent this in the future: 
            <ul class="list-disc pl-5">
                <li>Sit up more erect, potentially even sitting all the way up, and then get comfortable in that position and continue the hypnosis. You will feel much more awake and will probably hear the whole recording.. then you can gradually adjust to a position where you enter a trance but don't fall asleep.</li>
                <li>Let your hand grip onto something that will keep that arm elevated (e.g., drape the arm over the back of the sofa, hold onto the frame of your headboard, etc). You will be able to relax and enter a trance like this with a little practice, but you won't fall asleep.</li>
                <li>Take a pen, pinch it between your thumb and forefinger, then rest it at an angle on top of your leg in such a way that if you drift too far off and your fingers fully relax, you’ll feel the pen drop onto the top of your leg and you’ll be reminded to pick it up again and continue.</li>
            </ul>
        </div>
    </div>
    <div x-data="{ open: false }" x-on:click="open = !open" class="p-4 rounded shadow-2 bg-white">
        <div class="flex justify-between">
            <div class="text-body-medium lg:text-body-large font-semibold text-inherit">
                Will I lose control during hypnosis?
            </div>
            <div>
                <svg x-bind:class="open ? 'rotate-180' : ''" width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.9752 14.475L8.80017 11.3C8.56684 11.0667 8.51267 10.7959 8.63767 10.4875C8.76267 10.1792 8.99184 10.025 9.32517 10.025H15.6752C16.0085 10.025 16.2377 10.1792 16.3627 10.4875C16.4877 10.7959 16.4335 11.0667 16.2002 11.3L13.0252 14.475C12.9418 14.5584 12.8585 14.6167 12.7752 14.65C12.6918 14.6834 12.6002 14.7 12.5002 14.7C12.4002 14.7 12.3085 14.6834 12.2252 14.65C12.1418 14.6167 12.0585 14.5584 11.9752 14.475Z" fill="#1B1B1F" />
                </svg>
            </div>
        </div>
        <div x-show="open" class="text-body-medium mt-4">Hypnosis is completely safe, and no, you will never “lose control”. You will never experience any negative effects from being in hypnosis and you retain complete control over your experience. You can never be hypnotised against your will and it is not possible to be made to do anything you do not wish to do. Hypnosis can be an extremely powerful tool, but it does require openness; your willingness to experience it and that you really want to make a change. For example, if you give a hypnosis album for weight loss to a friend who has no interest in changing their ways then it will not work. However, if you use it for yourself and you do consciously want to make a change in your life then hypnosis will be a powerful ally, it will strengthen your mind, boost your willpower, and make you much more likely to successfully lose weight.</div>
    </div>
    <div x-data="{ open: false }" x-on:click="open = !open" class="p-4 rounded shadow-2 bg-white">
        <div class="flex justify-between">
            <div class="text-body-medium lg:text-body-large font-semibold text-inherit">
                Can I get stuck in a trance?
            </div>
            <div>
                <svg x-bind:class="open ? 'rotate-180' : ''" width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.9752 14.475L8.80017 11.3C8.56684 11.0667 8.51267 10.7959 8.63767 10.4875C8.76267 10.1792 8.99184 10.025 9.32517 10.025H15.6752C16.0085 10.025 16.2377 10.1792 16.3627 10.4875C16.4877 10.7959 16.4335 11.0667 16.2002 11.3L13.0252 14.475C12

.9418 14.5584 12.8585 14.6167 12.7752 14.65C12.6918 14.6834 12.6002 14.7 12.5002 14.7C12.4002 14.7 12.3085 14.6834 12.2252 14.65C12.1418 14.6167 12.0585 14.5584 11.9752 14.475Z" fill="#1B1B1F" />
                </svg>
            </div>
        </div>
        <div x-show="open" class="text-body-medium mt-4">No. You cannot get stuck in a hypnotic trance! You drift into hypnosis every night on your way into sleep, every morning as you drift from sleeping to alertness, every time you daydream, and every time you watch a movie. At any time during your hypnosis experience, if you want to bring yourself out of trance, you simply open your eyes and stand up and stretch – just like waking up in the morning.</div>
    </div>
    <div x-data="{ open: false }" x-on:click="open = !open" class="p-4 rounded shadow-2 bg-white">
        <div class="flex justify-between">
            <div class="text-body-medium lg:text-body-large font-semibold text-inherit">
                Can I listen while driving?
            </div>
            <div>
                <svg x-bind:class="open ? 'rotate-180' : ''" width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.9752 14.475L8.80017 11.3C8.56684 11.0667 8.51267 10.7959 8.63767 10.4875C8.76267 10.1792 8.99184 10.025 9.32517 10.025H15.6752C16.0085 10.025 16.2377 10.1792 16.3627 10.4875C16.4877 10.7959 16.4335 11.0667 16.2002 11.3L13.0252 14.475C12.9418 14.5584 12.8585 14.6167 12.7752 14.65C12.6918 14.6834 12.6002 14.7 12.5002 14.7C12.4002 14.7 12.3085 14.6834 12.2252 14.65C12.1418 14.6167 12.0585 14.5584 11.9752 14.475Z" fill="#1B1B1F" />
                </svg>
            </div>
        </div>
        <div x-show="open" class="text-body-medium mt-4">No, do not listen to our hypnosis albums while you are driving or in any situation where your attention is required elsewhere. Hypnosis is relaxing, you may enter a trance and not be aware of everything which is said to you, and because of this it would be dangerous to use whilst driving.</div>
    </div>
    <div x-data="{ open: false }" x-on:click="open = !open" class="p-4 rounded shadow-2 bg-white">
        <div class="flex justify-between">
            <div class="text-body-medium lg:text-body-large font-semibold text-inherit">
                Can someone be hypnotised against their will?
            </div>
            <div>
                <svg x-bind:class="open ? 'rotate-180' : ''" width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.9752 14.475L8.80017 11.3C8.56684 11.0667 8.51267 10.7959 8.63767 10.4875C8.76267 10.1792 8.99184 10.025 9.32517 10.025H15.6752C16.0085 10.025 16.2377 10.1792 16.3627 10.4875C16.4877 10.7959 16.4335 11.0667 16.2002 11.3L13.0252 14.475C12.9418 14.5584 12.8585 14.6167 12.7752 14.65C12.6918 14.6834 12.6002 14.7 12.5002 14.7C12.4002 14.7 12.3085 14.6834 12.2252 14.65C12.1418 14.6167 12.0585 14.5584 11.9752 14.475Z" fill="#1B1B1F" />
                </svg>
            </div>
        </div>
        <div x-show="open" class="text-body-medium mt-4">No, you can not hypnotise someone against their will. Hypnosis is a tool which requires personal choice. It can be an amazing personal development tool and influence the human mind in powerful ways, but it requires that you are open to the experience. You have to give permission to be hypnotised, and then relax and listen and follow along. If someone is not open to the experience, and resists against hypnosis then they will not be able to be hypnotised and they will not receive any benefit.</div>
    </div>
    <div x-data="{ open: false }" x-on:click="open = !open" class="p-4 rounded shadow-2 bg-white">
        <div class="flex justify-between">
            <div class="text-body-medium lg:text-body-large font-semibold text-inherit">
                Will hypnosis interfere with my religious / spiritual beliefs?
            </div>
            <div>
                <svg x-bind:class="open ? 'rotate-180' : ''" width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.9752 14.475L8.80017 11.3C8.56684 11.0667 8.51267 10.7959 8.63767 10.4875C8.76267 10.1792 8.99184 10.025 9.32517 10.025H15.6752C16.0085 10.025 16.2377 10.1792 16.3627 10.4875C16.4877 10.7959 16.4335 11.0667 16.2002 11.3L13.0252 14.475C12.9418 14.5584 12.8585 14.6167 12.7752 14.65C12.6918 14.6834 12.6002 14.7 12.5002 14.7C12.4002 14.7 12.3085 14.6834 12.2252 14.65C12.1418 14.6167 12.0585 14.5584 11.9752 14.475Z" fill="#1B1B1F" />
                </svg>
            </div>
        </div>
        <div x-show="open" class="text-body-medium mt-4">None of our albums use any religious language, or are designed to influence or alter your religious beliefs in any way. Sometimes it is thought that under hypnosis you give up your control to the hypnotherapist, but that's a common myth about hypnosis. Whether by God, Intelligent Design, or evolution, we have a mind that is capable of relaxing into a state of accelerated learning by listening to positive suggestions. There is no loss of control in the least (see the questions above). You can not be made to do anything you do not want to do. Note: for the reasons listed above, Seventh-day Adventists and some Christian Scientist groups do not approve of the use of hypnosis. If you are in any doubt, please check with the senior people within your religion first.</div>
    </div>
    <div x-data="{ open: false }" x-on:click="open = !open" class="p-4 rounded shadow-2 bg-white">
        <div class="flex justify-between">
            <div class="text-body-medium lg:text-body-large font-semibold text-inherit">
                Do I need headphones?
            </div>
            <div>
                <svg x-bind:class="open ? 'rotate-180' : ''" width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.9752 14.475L8.80017 11.3C8

.56684 11.0667 8.51267 10.7959 8.63767 10.4875C8.76267 10.1792 8.99184 10.025 9.32517 10.025H15.6752C16.0085 10.025 16.2377 10.1792 16.3627 10.4875C16.4877 10.7959 16.4335 11.0667 16.2002 11.3L13.0252 14.475C12.9418 14.5584 12.8585 14.6167 12.7752 14.65C12.6918 14.6834 12.6002 14.7 12.5002 14.7C12.4002 14.7 12.3085 14.6834 12.2252 14.65C12.1418 14.6167 12.0585 14.5584 11.9752 14.475Z" fill="#1B1B1F" />
                </svg>
            </div>
        </div>
        <div x-show="open" class="text-body-medium mt-4">Headphones are ideal as they will help to block out other outside sounds, but they are not essential and you can listen to the albums on a stereo system, or even from your computer. The important thing is that you can listen without being disturbed for 30 minutes.</div>
    </div>
    <div x-data="{ open: false }" x-on:click="open = !open" class="p-4 rounded shadow-2 bg-white">
        <div class="flex justify-between">
            <div class="text-body-medium lg:text-body-large font-semibold text-inherit">
                What is hypnosis?
            </div>
            <div>
                <svg x-bind:class="open ? 'rotate-180' : ''" width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.9752 14.475L8.80017 11.3C8.56684 11.0667 8.51267 10.7959 8.63767 10.4875C8.76267 10.1792 8.99184 10.025 9.32517 10.025H15.6752C16.0085 10.025 16.2377 10.1792 16.3627 10.4875C16.4877 10.7959 16.4335 11.0667 16.2002 11.3L13.0252 14.475C12.9418 14.5584 12.8585 14.6167 12.7752 14.65C12.6918 14.6834 12.6002 14.7 12.5002 14.7C12.4002 14.7 12.3085 14.6834 12.2252 14.65C12.1418 14.6167 12.0585 14.5584 11.9752 14.475Z" fill="#1B1B1F" />
                </svg>
            </div>
        </div>
        <div x-show="open" class="text-body-medium mt-4">Hypnosis is a term which is often mystified, mis-understood, or simply over complicated. It is used to describe a trance like state, however, in reality we all go in and out of mild “trances” every day; those moments when our minds wander and we daydream, when we focus intently on something and block everything else out, or when we “zone out” either in front of the television, or with a book. These are all examples of trance like states, and they are all safe and natural. All hypnosis does is put you into one of these mild “trance” states purposefully - with the aim of sending beneficial hypnotic suggestions directly into your subconscious mind. Far from being asleep or unaware, hypnosis is a wakeful state where you are both deeply relaxed yet have a heightened level of suggestibility as well as a focused awareness. It is because of this this heightened state of mind that you can use hypnosis to make changes to your self beliefs, and patterns of thinking safely and naturally.</div>
    </div>
    <div x-data="{ open: false }" x-on:click="open = !open" class="p-4 rounded shadow-2 bg-white">
        <div class="flex justify-between">
            <div class="text-body-medium lg:text-body-large font-semibold text-inherit">
                How does hypnosis work?
            </div>
            <div>
                <svg x-bind:class="open ? 'rotate-180' : ''" width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.9752 14.475L8.80017 11.3C8.56684 11.0667 8.51267 10.7959 8.63767 10.4875C8.76267 10.1792 8.99184 10.025 9.32517 10.025H15.6752C16.0085 10.025 16.2377 10.1792 16.3627 10.4875C16.4877 10.7959 16.4335 11.0667 16.2002 11.3L13.0252 14.475C12.9418 14.5584 12.8585 14.6167 12.7752 14.65C12.6918 14.6834 12.6002 14.7 12.5002 14.7C12.4002 14.7 12.3085 14.6834 12.2252 14.65C12.1418 14.6167 12.0585 14.5584 11.9752 14.475Z" fill="#1B1B1F" />
                </svg>
            </div>
        </div>
        <div x-show="open" class="text-body-medium mt-4">Hypnosis works by relaxing you into a state where your brain shifts its activity. In fact, on a brain scan, a person in hypnosis shows the brainwave activity as we experience in the early years of our lives when our minds were able to sponge up information and immediately integrate it. This same accelerated learning occurs in hypnosis, bypassing your conscious mind so that your unconscious beliefs and perspectives change quickly and naturally (and it was in your unconscious mind that old limitations and worries were causing you to experience the challenges and discomforts that you're here to change!) The hypnotist causes this trance formation by using subtle hypnotic commands to put you into a mild trance, a state where your conscious mind is largely in-active, direct access to your subconscious mind can be gained, and positive suggestions can be planted. Because of this there is no conscious resistance from you, and so changes can be made to long-held belief systems. Often those belief systems were not beneficial, yet they may have been so familiar to us that we would hang onto them and become “logically” defensive of them. For example you might have had a low self image and want to change it, but your fear of the unknown, and relative level of “comfort” at thinking in this way made you resist against change. However with the power of hypnosis, this logical, conscious thinking function is bypassed and changes are made from within - positive changes which alter your beliefs, how you feel about yourself, and in this example, ultimately your levels of self esteem improve.</div>
    </div>
    <div x-data="{ open: false }" x-on:click="open = !open" class="p-4 rounded shadow-2 bg-white">
        <div class="flex justify-between">
            <div class="text-body-medium lg:text-body-large font-semibold text-inherit">
                Which style of hypnosis do you use?
            </div>
            <div>
                <svg x-bind:class="open ? 'rotate-180' : ''" width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.9752 14.475L8.80017 11.3C8.56684 11.0667 8.51267 10.7959 8.63767 10.4875C8.76267 10.1792 8.99184 10.025 9.32517 10.025H15.6752C16.0085 10.025 16.2377 10.1792 16.3627 10.4875C16.4877 10.7959 16.4335 11.0667 16.2002 11.3L13.0252 14.475C12.9418 14.5584 12.8585 14.6167 12.7752

 14.65C12.6918 14.6834 12.6002 14.7 12.5002 14.7C12.4002 14.7 12.3085 14.6834 12.2252 14.65C12.1418 14.6167 12.0585 14.5584 11.9752 14.475Z" fill="#1B1B1F" />
                </svg>
            </div>
        </div>
        <div x-show="open" class="text-body-medium mt-4">We use a blend of Ericksonian hypnosis, traditional suggestion, visualization, and neuro-linguistic programming (NLP) techniques. For the most part, it's a very indirect form of hypnosis. This means that listening to our albums feels like you are just having a conversation with Brennan, your hypnotist. There are subtle hypnotic commands embedded in the conversation, and these commands gradually and naturally put you into a trance like state. Since you'll hear Brennan throughout the audio, you may or may not even be aware of the way you're gradually drifting deeper and deeper into hypnosis – it's just so natural. This indirect, modern approach to hypnosis is safe, effective, and most importantly it ensures that anyone can be hypnotised (more on that in the next paragraph).</div>
    </div>
    <div x-data="{ open: false }" x-on:click="open = !open" class="p-4 rounded shadow-2 bg-white">
        <div class="flex justify-between">
            <div class="text-body-medium lg:text-body-large font-semibold text-inherit">
                Can anyone be hypnotised?
            </div>
            <div>
                <svg x-bind:class="open ? 'rotate-180' : ''" width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.9752 14.475L8.80017 11.3C8.56684 11.0667 8.51267 10.7959 8.63767 10.4875C8.76267 10.1792 8.99184 10.025 9.32517 10.025H15.6752C16.0085 10.025 16.2377 10.1792 16.3627 10.4875C16.4877 10.7959 16.4335 11.0667 16.2002 11.3L13.0252 14.475C12.9418 14.5584 12.8585 14.6167 12.7752 14.65C12.6918 14.6834 12.6002 14.7 12.5002 14.7C12.4002 14.7 12.3085 14.6834 12.2252 14.65C12.1418 14.6167 12.0585 14.5584 11.9752 14.475Z" fill="#1B1B1F" />
                </svg>
            </div>
        </div>
        <div x-show="open" class="text-body-medium mt-4">
            Yes. There are 2 important things to understand about this:
            <ul class="list-disc pl-5">
                <li>Many of the myths about some people being “susceptible” to hypnosis and other people being un-hypnotizable came from back when hypnotists were trying to do hypnosis the same way every time for every person, regardless of their personality type and learning preference. Since the mid-1900's, though, research has shown us many things about how to adjust the hypnosis approach to fit the mental “template” of the listener, so that everyone can be hypnotised.</li>
                <li>Another reason there was a myth that some people couldn't be hypnotised is due to the stage hypnotists / TV hypnotists / movie hypnotists. That form of hypnosis requires a very deep trance, and only about 7% of the population have the right processing style to experience that kind of hypnosis. As a result, the other 93% of people seemed like they weren't hypnotizable.</li>
            </ul>
            Hypnosis is actually just one natural state of consciousness, and one which we all enter mild forms of everyday - when we concentrate or focus, when we are reading, learning, or just engrossed in the television. These are all forms of hypnosis, our albums simply put you into a similar state of mind where you are suggestible to new information.
        </div>
    </div>
    <div x-data="{ open: false }" x-on:click="open = !open" class="p-4 rounded shadow-2 bg-white">
        <div class="flex justify-between">
            <div class="text-body-medium lg:text-body-large font-semibold text-inherit">
                What does hypnosis feel like?
            </div>
            <div>
                <svg x-bind:class="open ? 'rotate-180' : ''" width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.9752 14.475L8.80017 11.3C8.56684 11.0667 8.51267 10.7959 8.63767 10.4875C8.76267 10.1792 8.99184 10.025 9.32517 10.025H15.6752C16.0085 10.025 16.2377 10.1792 16.3627 10.4875C16.4877 10.7959 16.4335 11.0667 16.2002 11.3L13.0252 14.475C12.9418 14.5584 12.8585 14.6167 12.7752 14.65C12.6918 14.6834 12.6002 14.7 12.5002 14.7C12.4002 14.7 12.3085 14.6834 12.2252 14.65C12.1418 14.6167 12.0585 14.5584 11.9752 14.475Z" fill="#1B1B1F" />
                </svg>
            </div>
        </div>
        <div x-show="open" class="text-body-medium mt-4">Everyone experiences hypnosis differently, and even from session to session you will have slightly different experiences as sometimes you will “go deeper” than others. Typically you will feel deeply relaxed and comfortable while under hypnosis, and as the session continues you may or may not remember all of what is said to you. This is partly because some people are more susceptible to hypnosis and will enter a deeper trance straight away, but also because the more you use our albums the more you will get used to it, the more often you will go into a “deeper trance” where you won’t remember everything, and the more benefit you will receive - essentially you are training your mind to be hypnotised every time you listen. At the end of the session you will return to being your fully alert normal self, you will feel refreshed and energized.</div>
    </div>
    <div x-data="{ open: false }" x-on:click="open = !open" class="p-4 rounded shadow-2 bg-white">
        <div class="flex justify-between">
            <div class="text-body-medium lg:text-body-large font-semibold text-inherit">
                Is it better to enter a deep trance?
            </div>
            <div>
                <svg x-bind:class="open ? 'rotate-180' : ''" width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.9752 14.475L8.80017 11.3C8.56684 11.0667 8.51267 10.7959 8.63767 10.4875C8.76267 10.1792 8.99184 10.025 9.32517 10.025H15.6752C16.0085 10.025 16.2377 10.1792 16.3627 10.4875C16.4877 10.7959 16.4335 11.0667 16.2002 11.3L13.0252 14.475C12.9418 14.5584 12.8585 14.6167 12.7752 14.65C12.6918 14.6834 12.6002 14.7 12.5002 14.7C12.4002 14.7 12.3085 14.6834 12.2252 14.65C12.1418 14.6167 12.0585 14.5584 11.9752 14.475Z" fill="#1B1B1F" />
                </svg>
            </div>
        </div

>
        <div x-show="open" class="text-body-medium mt-4">Whether you go into a deep hypnotic trance and don’t remember much of the session, or you are alert throughout and are aware of everything being said makes no difference to the powerful benefits you receive from the hypnosis. Everyone is different, some people enter a deep trance most of the time, some people rarely do. Generally the more you use hypnosis the easier you will find it to enter a trance, but every session will be different and sometimes you will “go deeper” than others. The important thing is to trust your unconscious to take care of this for you. Your unconscious is excellent at trance formation and hypnosis, naturally. Just relax, and enjoy the experience of hypnosis either way and you will receive powerful benefits.</div>
    </div>
</div>


        
    </div>
  
                    <div class="bg-[#FAFFFD] rounded shadow-2 p-4 mt-12 lg:mt-20">
                        <div class="flex items-center">
                            <svg class="shrink-0" width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.041 22.8334L17.541 18.0417L13.5827 14.9584H18.416L19.9993 10L21.541 14.9584H26.416L22.4577 18.0417L23.916 22.8334L19.9993 19.875L16.041 22.8334ZM10.166 38.3334V25.6667C8.91602 24.3612 8.02018 22.9306 7.47852 21.375C6.93685 19.8195 6.66602 18.25 6.66602 16.6667C6.66602 12.8889 7.94379 9.72226 10.4993 7.16671C13.0549 4.61115 16.2216 3.33337 19.9993 3.33337C23.7771 3.33337 26.9438 4.61115 29.4993 7.16671C32.0549 9.72226 33.3327 12.8889 33.3327 16.6667C33.3327 18.25 33.0618 19.8195 32.5202 21.375C31.9785 22.9306 31.0827 24.3612 29.8327 25.6667V38.3334L19.9993 35.0417L10.166 38.3334ZM19.9993 27.5C23.0271 27.5 25.5896 26.4514 27.6868 24.3542C29.7841 22.257 30.8327 19.6945 30.8327 16.6667C30.8327 13.6389 29.7841 11.0764 27.6868 8.97921C25.5896 6.88199 23.0271 5.83337 19.9993 5.83337C16.9716 5.83337 14.4091 6.88199 12.3118 8.97921C10.2146 11.0764 9.16602 13.6389 9.16602 16.6667C9.16602 19.6945 10.2146 22.257 12.3118 24.3542C14.4091 26.4514 16.9716 27.5 19.9993 27.5ZM12.666 34.8334L19.9993 32.5417L27.3327 34.8334V27.7084C26.2216 28.5139 25.0271 29.0973 23.7493 29.4584C22.4716 29.8195 21.2216 30 19.9993 30C18.7771 30 17.5271 29.8195 16.2493 29.4584C14.9716 29.0973 13.7771 28.5139 12.666 27.7084V34.8334Z" fill="#006A63" />
                            </svg>
                            
                            
                            <div class="text-title-large">
Got Any Questions?                            </div>
                        </div>
                        <div class="text-body-medium mt-6">
                            If you have any questions, please email support@naturalhypnosis.com or reach out to us directly.
                        </div>
                    </div>
                </div>
                 
                 
            </div>
        </div>
    </div>
    </br>

<div class="lg:order-1 mt-6 lg:mt-0 text-center text-body-small md:text-body-medium">
                    <?= date('Y') ?> © All rights reserved.
                </div>

</body>


</html>
<?php
session_start();

require_once __DIR__ . '/../utils/functions.php';
require_once __DIR__ . '/../utils/db.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $requestData = $_POST;

    $requestData = $_POST;

    $gender = getGender($_GET['g']);
    $cid = $_GET['cid'] ?? '';
    $sid = $_GET['sid'] ?? '';

    $data = [];

    // Decode answers if exists
    $answers = isset($requestData['answers']) ? json_decode($requestData['answers'], true) : [];

    // Organizing the answers
    foreach ($answers as $index => $answer) {
        if ($index == 21) break;
        $questionNumber = $index + 1;

        $data["answer_{$questionNumber}"] = isset($answer['answerText'])
            ? array_keys($answer)[0]
            : implode(", ", array_keys($answer));
    }

    $email = $requestData['email'];
    $data['email'] = $email;
    $data['gender'] = $gender;
    $data['cid'] = $cid;
    $data['sid'] = $sid;

    // Setting necessary data to show on checkout and summary page
    $_SESSION['AGE_RANGE'] = $data['answer_2'];
    $_SESSION['TIME_ON_ADDICTION'] = $data['answer_3'];
    $_SESSION['ADDICTION_FREQUENCY'] = $data['answer_9'];
    $_SESSION['PRIMARY_GOAL'] = $data['answer_18'];
    $_SESSION['SEVERITY'] = $data['answer_4'];

    $user = null;

    // Create or update the user of quiz
    $user = updateOrCreate(
        'users',
        ['email' => $email],
        ['email' => $email, 'gender' => $gender]
    );

    // Create or update the quiz sumbission for the user
    if (isset($user)) {
        $data['user_id'] = $user['id'];
        $quizSubmission = updateOrCreate('alcohol_quiz_submissions', ['email' => $email], $data);

        if (isset($quizSubmission)) {
            $convertKitApiKey = env('CONVERTKIT_API_KEY');
            $formId = env('CONVERTKIT_QUIZ_FORM_ID');

            // Set ConvertKit API URL
            $convertKitApiUrl = "https://api.convertkit.com/v3/forms/$formId/subscribe";

            // Set data to be sent in the request body
            $data = [
                'api_key' => $convertKitApiKey,
                'email' => $email,
                'fields' => [
                    'cid' => $cid,
                    'sid' => $sid,
                ],
            ];

            // Initialize cURL session
            $ch = curl_init();

            // Set cURL options
            curl_setopt_array($ch, [
                CURLOPT_URL => $convertKitApiUrl,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => json_encode($data),
                CURLOPT_HTTPHEADER => [
                    'Content-Type: application/json',
                ],
            ]);

            // Execute cURL request
            $response = curl_exec($ch);

            // Close cURL session
            curl_close($ch);

            header("Location: /alcohol-hypnotherapy/summary.php");
            exit();
        }
    }

    // Redirect user back to the quiz if submission wasn't saved
    $currentUri = $_SERVER['REQUEST_URI'];
    header("Location: $currentUri");

    exit();
}
?>

<!DOCTYPE html>
<html lang="en" class="overscroll-none">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <link rel="icon" type="image/x-icon" href="../assets/favicon/favicon.svg">
    <title>Hypnozio | Hypnozio Quiz Alcohol Addiction</title>

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
    <link rel="modulepreload" href="../assets/build/hypnozio-quiz-53c70ae5.js" />
    <link rel="modulepreload" href="../assets/build/circle-progress-e0904202.js" />
    <link rel="modulepreload" href="../assets/js/module.esm-958008ac.js" />
    <link rel="modulepreload" href="../assets/js/module.esm-3f6ffe0c.js" />
    <link rel="modulepreload" href="../assets/js/jquery-2c3981e2.js" />
    <link rel="modulepreload" href="../assets/build/million-verifier-5f829d6b.js" />
    <link rel="modulepreload" href="../assets/js/jquery-68c15ecd.js" />
    <link rel="modulepreload" href="../assets/js/_commonjsHelpers-de833af9.js" />
    <script type="module" src="../assets/build/hypnozio-quiz-53c70ae5.js" data-navigate-track="reload"></script>
    <link rel="modulepreload" href="../assets/js/gtm-tags-e2664de5.js" />
    <script type="module" src="../assets/js/gtm-tags-e2664de5.js" data-navigate-track="reload"></script>
    <link rel="modulepreload" href="../assets/js/input-validation-36ee9ab8.js" />
    <script type="module" src="../assets/js/input-validation-36ee9ab8.js" data-navigate-track="reload"></script>
</head>

<body class="antialiased bg-surface text-onSurface scroll-auto">
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
                <img src="../assets/hypnozio/logo.svg" class="w-[110px] md:w-[108px]" alt="Hypnozio">
                <div class="flex items-center space-x-4">
                </div>
            </div>
        </div>
    </nav>

    <div class="pb-8 md:pb-10 lg:pb-16">
        <div>
            <div id="quiz-wrapper">
                <div x-data="hypnozioQuiz(
                [{&quot;type&quot;:&quot;info_box&quot;,&quot;text1&quot;:&quot;Hypnozio is designed to redefine your relationship with addictive behaviors by addressing and rectifying the dysfunction in your brain&#039;s reward and control mechanisms.&quot;,&quot;text3&quot;:&quot;Let\u2019s begin by understanding more about you, so we can evaluate if Hypnozio is the right fit to support your journey.&quot;,&quot;image&quot;:&quot;https:\/\/hypnozio.com\/hypnozio\/quiz\/glowing-nerve-cells.jpg&quot;},{&quot;type&quot;:&quot;radio_group&quot;,&quot;question&quot;:&quot;What is your age group?&quot;,&quot;answers&quot;:[{&quot;text&quot;:&quot;18-21&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;22-30&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;31-40&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;41-50&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;51-60&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;61-70&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;70+&quot;,&quot;value&quot;:0}]},{&quot;type&quot;:&quot;radio_group&quot;,&quot;question&quot;:&quot;How long have you been struggling with alcohol addiction?&quot;,&quot;answers&quot;:[{&quot;text&quot;:&quot;Less than a year&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;1-3 years&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;3-5 years&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;Over 5 years&quot;,&quot;value&quot;:0}]},{&quot;type&quot;:&quot;radio_group&quot;,&quot;question&quot;:&quot;On a scale of 1-10, how would you rate the severity of your addiction?&quot;,&quot;description&quot;:&quot;1 (Least Severe) to 10 (Most Severe)&quot;,&quot;answers&quot;:[{&quot;text&quot;:&quot;1&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;2&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;3&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;4&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;5&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;6&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;7&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;8&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;9&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;10&quot;,&quot;value&quot;:0}]},{&quot;type&quot;:&quot;radio_group&quot;,&quot;question&quot;:&quot;What do you believe led to the start of your addiction?&quot;,&quot;answers&quot;:[{&quot;text&quot;:&quot;Peer pressure&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;Stress or emotional trauma&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;Curiosity or experimentation&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;Medicinal reasons&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;Other&quot;,&quot;value&quot;:0}]},{&quot;type&quot;:&quot;select&quot;,&quot;question&quot;:&quot;Which situations intensify your cravings or behavior?&quot;,&quot;description&quot;:&quot;You can select as many as you want.&quot;,&quot;answers&quot;:[{&quot;text&quot;:&quot;Social events or peer gatherings&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;Emotional distress or sadness&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;Boredom&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;Specific locations or environments&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;Certain times of the day&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;Other&quot;,&quot;value&quot;:0}]},{&quot;type&quot;:&quot;radio_group&quot;,&quot;text&quot;:&quot;A growing number of psychologists are recommending Hypnozio.&quot;,&quot;question&quot;:&quot;Were you recommended by a psychologist?&quot;,&quot;answers&quot;:[{&quot;text&quot;:&quot;Yes&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;No&quot;,&quot;value&quot;:0}]},{&quot;type&quot;:&quot;info_box&quot;,&quot;text1&quot;:&quot;While people have different reasons for struggling with addiction, one of the main factors is the dysfunction in the brain&#039;s reward and control mechanisms.&quot;,&quot;text3&quot;:&quot;If you&#039;ve ever experienced &#039;cravings&#039; even when you know the substance or behavior is harmful, then you have felt the effects of this dysfunction.&quot;,&quot;text4&quot;:&quot;Understanding this dysfunction can help you select lifestyle choices and develop coping strategies to improve both physical and mental health.&quot;,&quot;image&quot;:&quot;https:\/\/hypnozio.com\/hypnozio\/quiz\/woman-with-headphones.jpg&quot;},{&quot;type&quot;:&quot;radio_group&quot;,&quot;question&quot;:&quot;How often do you engage in the addictive behavior or substance use?&quot;,&quot;answers&quot;:[{&quot;text&quot;:&quot;Daily&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;Weekly&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;Monthly&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;Rarely but intensely&quot;,&quot;value&quot;:0}]},{&quot;type&quot;:&quot;radio_group&quot;,&quot;question&quot;:&quot;Have you tried to stop or reduce alcohol addiction before?&quot;,&quot;answers&quot;:[{&quot;text&quot;:&quot;Never tried&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;Tried once&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;Tried multiple times without success&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;Successfully reduced but relapsed&quot;,&quot;value&quot;:0}]},{&quot;type&quot;:&quot;radio_group&quot;,&quot;question&quot;:&quot;Do you have friends or family aware of your addiction who support your recovery?&quot;,&quot;answers&quot;:[{&quot;text&quot;:&quot;Yes, many&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;Just a few&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;No one knows&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;They know but don&#039;t support&quot;,&quot;value&quot;:0}]},{&quot;type&quot;:&quot;radio_group&quot;,&quot;question&quot;:&quot;Have you noticed any adverse health effects due to your addiction?&quot;,&quot;answers&quot;:[{&quot;text&quot;:&quot;Physical health deterioration&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;Mental health challenges&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;Both physical and mental health impacts&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;None \/ not sure&quot;,&quot;value&quot;:0}]},{&quot;type&quot;:&quot;info_box&quot;,&quot;text1&quot;:&quot;Most addiction solutions focus on managing the symptoms or the external triggers without addressing the underlying cause, which is the dysfunction in the brain&#039;s reward and control mechanisms.&quot;,&quot;text2&quot;:&quot;Hypnotherapy is different.&quot;,&quot;text3&quot;:&quot;According to clinical studies, hypnotherapy has been found to address and resolve this fundamental dysfunction.&quot;,&quot;image&quot;:&quot;https:\/\/hypnozio.com\/hypnozio\/quiz\/senior-woman-with-headphones.jpg&quot;},{&quot;type&quot;:&quot;radio_group&quot;,&quot;question&quot;:&quot;Have you ever sought professional help or treatment before?&quot;,&quot;answers&quot;:[{&quot;text&quot;:&quot;Yes, inpatient treatment&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;Yes, outpatient therapy&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;No, never sought treatment&quot;,&quot;value&quot;:0}]},{&quot;type&quot;:&quot;select&quot;,&quot;question&quot;:&quot;Do you have any diagnosed mental health conditions?&quot;,&quot;description&quot;:&quot;You can select as many as you want.&quot;,&quot;answers&quot;:[{&quot;text&quot;:&quot;Depression&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;Anxiety&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;Bipolar Disorder&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;PTSD&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;Other&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;None&quot;,&quot;value&quot;:0}]},{&quot;type&quot;:&quot;radio_group&quot;,&quot;question&quot;:&quot;How ready do you feel to change your addictive behavior?&quot;,&quot;answers&quot;:[{&quot;text&quot;:&quot;Very ready and motivated&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;Somewhat ready but nervous&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;Unsure&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;Not ready but seeking information&quot;,&quot;value&quot;:0}]},{&quot;type&quot;:&quot;info_box&quot;,&quot;text1&quot;:&quot;Traditional approaches often fail to produce long-term recovery results due to underlying mental issues such as negative self-image, emotional triggers, and fear of failure.&quot;,&quot;text2&quot;:&quot;Hypnotherapy can effectively address these issues by changing the individual&#039;s mindset, providing the motivation and mental clarity needed for successful recovery from addiction.&quot;,&quot;image&quot;:&quot;https:\/\/hypnozio.com\/hypnozio\/quiz\/smiley-older-woman.jpg&quot;},{&quot;type&quot;:&quot;radio_group&quot;,&quot;question&quot;:&quot;What is your primary goal for seeking help?&quot;,&quot;answers&quot;:[{&quot;text&quot;:&quot;Complete abstinence&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;Reduce usage or behavior&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;Learn coping mechanisms&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;Support and understanding&quot;,&quot;value&quot;:0}]},{&quot;type&quot;:&quot;radio_group&quot;,&quot;question&quot;:&quot;How often does your addiction impact your daily routines and responsibilities?&quot;,&quot;answers&quot;:[{&quot;text&quot;:&quot;Severely, it dominates my day&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;Moderately, it affects important tasks&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;Minimally, I can manage most tasks&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;Rarely\/not at all&quot;,&quot;value&quot;:0}]},{&quot;type&quot;:&quot;info_box&quot;,&quot;text1&quot;:&quot;Hypnozio can help you manage your addiction problems in just 20 minutes a day. You will receive a personalized hypnotherapy program created by our leading hypnotherapist Rachel Moffett with the goal of improving your mindset and reaching your desired state of recovery.&quot;,&quot;text3&quot;:&quot;The best part is that you don&#039;t need to take any drastic action, such as going to in-person therapy sessions or joining support groups if you&#039;re not ready.&quot;,&quot;text4&quot;:&quot;You just need to relax and listen to your hypnotherapy sessions in the comfort of your home.&quot;,&quot;image&quot;:&quot;https:\/\/hypnozio.com\/hypnozio\/quiz\/rachel-moffett.jpg&quot;},{&quot;type&quot;:&quot;radio_group&quot;,&quot;question&quot;:&quot;What is the best time in your day to listen to Hypnozio?&quot;,&quot;answers&quot;:[{&quot;text&quot;:&quot;When I first wake up&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;In the morning&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;At lunchtime&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;In the afternoon \/ evening&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;Before I fall asleep&quot;,&quot;value&quot;:0}]},{&quot;type&quot;:&quot;end_card&quot;,&quot;question&quot;:&quot;One last step!&quot;,&quot;description&quot;:&quot;Enter your details to find out if addiction recovery directed hypnotherapy can help you achieve your goals.&quot;}],
                {&quot;required&quot;:&quot;The email field is required.&quot;,&quot;incorrect&quot;:&quot;The email must be a valid email address&quot;,&quot;heaviest_person_fact&quot;:&quot;Jon Brower Minnoch is known for being the heaviest person ever recorded. His weight was :EXAMPLEMAXWEIGHT. Just in case, we put a cap on max weight at :MAXWEIGHT.&quot;,&quot;lightest_person_fact&quot;:&quot;Luc\u00eda Zar\u00e1te is known for being the lightest person ever recorded. Her weight was only :EXAMPLEMINWEIGHT. Just in case, we put a cap on min weight at :MINWEIGHT.&quot;,&quot;smallest_person_fact&quot;:&quot;Gul Mohammed holds the record for being the smallest person ever recorded. His height was :EXAMPLEMINHEIGHT. Just in case, we put a cap on min height at :MINHEIGHT.&quot;,&quot;tallest_person_fact&quot;:&quot;Robert Wadlow holds the record for being the tallest person ever recorded. His height was :EXAMPLEMAXHEIGHT. Just in case, we put a cap on max height at :MAXHEIGHT.&quot;},
                {&quot;not_sure&quot;:&quot;Not sure&quot;,&quot;none&quot;:&quot;None&quot;,&quot;none_of_above&quot;:&quot;None of the above&quot;},
                'https://hypnozio.com/verify/email',
                false)
            " :key="'test-' + questionKey">
                    <form action="<?= $_SERVER['REQUEST_URI'] ?>" novalidate method="post" class="" x-data="{ metricSystem: 'metric', bmi }" x-on:submit.prevent="submitForm($event.target, metricSystem, false, true, false, false)" x-ref="form">
                        <input type="hidden" name="score" x-bind:value="data.encodedScore">
                        <input type="hidden" name="answers" x-bind:value="data.encodedAnswers">
                        <div class="w-full bg-neutral-95 h-2">
                            <div class="bg-primary-70 h-2 rounded-r" x-bind:style="`width: ${questionIndex/totalQuestions*100}%; transition: width 0.5s;`">&nbsp;
                            </div>
                        </div>
                        <div class="container">
                            <div class="max-w-[360px] mx-auto mt-4 lg:mt-9">
                                <div class="flex justify-between items-center text-center mb-6 lg:mb-10">
                                    <div class="flex -ml-2.5" x-on:click="previousQuestion()" x-data="{ isOrganicFlow: !true }" x-bind:class="{
                                    'pointer-events-none cursor-pointer-none text-neutral-70': questionIndex === 1 && !isOrganicFlow,
                                    'invisible': questionIndex === 1 && isOrganicFlow,
                                    'text-onSurface hover:text-primary cursor-pointer': questionIndex !== 1
                                }">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_659_10734)">
                                                <path d="M10.828 12L15.778 16.95L14.364 18.364L8 12L14.364 5.636L15.778 7.05L10.828 12Z" fill="currentColor" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_659_10734">
                                                    <rect width="24" height="24" fill="currentColor" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                        <div class="text-label-large font-medium ml-2">Back</div>
                                    </div>
                                    <div class="flex items-center">
                                        <div class="font-semibold text-headline-medium" x-text="questionIndex"></div>
                                        <div class="text-headline-medium mx-2">/</div>
                                        <div class="text-title-large" x-text="totalQuestions"></div>
                                    </div>
                                </div>
                                <div x-show="question.type === 'end_card'" x-cloak class="bg-surface">
                                    <h1 class="text-title-large mb-6" x-text="question.question"></h1>
                                    <div class="text-body-large mb-6" x-text="question.description"></div>
                                    <div class="relative z-0 w-full group bg-inherit input-text">
                                        <input class="peer  bg-surface" id="email" name="email" type="text" value="" maxlength="100" size="" inputmode="" pattern="" x-model="data.email" x-bind:value="data.email" placeholder=" " x-ref="input_email" />
                                        <label for="email" class="bg-inherit px-1
               peer-focus:bg-inherit
                peer-focus:left-0
                peer-focus:text-primary
                peer-autofill:scale-75
                peer-autofill:-translate-y-7
                peer-autofill:bg-inherit
                peer-placeholder-shown:scale-100
                peer-placeholder-shown:translate-y-0
                peer-focus:scale-75
                peer-focus:px-1
                peer-focus:-translate-y-7 " x-on:click="$refs.input_email.focus()">
                                            Email address
                                        </label>
                                    </div>
                                    <div class="flex items-center mt-6">
                                        <div class="mr-2">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12 22C9.66667 21.4167 7.75 20.0625 6.25 17.9375C4.75 15.8125 4 13.4833 4 10.95V5L12 2L20 5V10.95C20 13.4833 19.25 15.8125 17.75 17.9375C16.25 20.0625 14.3333 21.4167 12 22ZM12 20.45C13.7667 19.8667 15.2292 18.7958 16.3875 17.2375C17.5458 15.6792 18.225 13.9333 18.425 12H12V3.625L5.5 6.05V10.95C5.5 11.15 5.50417 11.3208 5.5125 11.4625C5.52083 11.6042 5.54167 11.7833 5.575 12H12V20.45Z" fill="#404040" />
                                            </svg>
                                        </div>
                                        <div class="text-body-small text-neutralVariant">
                                            Your personal data is safe with us. We don’t send spam or share email addresses with third parties.
                                        </div>
                                    </div>
                                    <div class="flex justify-center mt-6">
                                        <button type="submit" class="w-full" x-bind:disabled="question.type !== 'end_card'" x-bind:class="data.email.length > 0 ? 'btn' : 'btn btn-disabled'" x-on:click="
                                            sendHypnozioQuizAnswerClickedEvent(question.question.split('. ')[1], data.email);
                                            answerQuestion(question.question, data.email);
                                        ">
                                            Continue
                                        </button>
                                    </div>
                                </div>
                                <div x-show="question.type === 'info_box'" x-cloak>
                                    <div class="pb-20 lg:pb-16">
                                        <div x-show="question.title" x-cloak>
                                            <div class="text-title-large mb-6" x-text="question.title"></div>
                                        </div>
                                        <div x-show="question.text1" x-cloak>
                                            <div class="text-body-large" x-text="question.text1"></div>
                                        </div>
                                        <div x-show="question.text2" x-cloak>
                                            <div class="text-body-large mt-4" x-text="question.text2"></div>
                                        </div>
                                        <div x-show="question.image" x-cloak>
                                            <img class="my-4 rounded-tl-[64px] rounded-br-[64px]" x-bind:src="question.image" alt="">
                                        </div>
                                        <div x-show="question.text3" x-cloak>
                                            <div class="text-body-large" x-text="question.text3"></div>
                                        </div>
                                        <div x-show="question.text4" x-cloak>
                                            <div class="text-body-large mt-4" x-text="question.text4"></div>
                                        </div>
                                    </div>
                                    <div class="fixed bottom-0 left-0 w-full drop-shadow-[0_1px_15px_rgba(0,0,0,0.1)] border border-primary-95">
                                        <div class="py-3 md:py-4 bg-surface">
                                            <div class="max-w-[360px] mx-auto">
                                                <div class="flex justify-center">
                                                    <button class="btn h-14" type="button" x-on:click="nextQuestion();">
                                                        Next
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div x-show="question.type === 'trauma_graph'" x-cloak>
                                    <div x-data="{ traumaScore: null }" x-init="$watch('data.score', value => traumaScore = Object.values(data.score).reduce((a, b) => a + b, 0))">
                                        <div class="text-title-large text-center">
                                            Your trauma score is
                                        </div>
                                        <div class="text-title-large font-semibold text-center">
                                            <span x-text="traumaScore < 11 ? 11 : traumaScore"></span>
                                            <span class="-ml-1">/100</span>
                                            <span x-text="traumaScore >= 77 ? '(Severe)' : (traumaScore >= 44 ? '(Moderate)' : '(Mild)')" x-bind:class="traumaScore >= 77 ? 'text-accent' : (traumaScore >= 44 ? 'text-[#F4B000]' : 'text-primary-60')"></span>
                                        </div>
                                        <img class="my-6" x-bind:src="traumaScore >= 77 ? 'https://hypnozio.com/hypnozio/quiz/trauma-score-high.png' :
                                    (traumaScore >= 44 ? 'https://hypnozio.com/hypnozio/quiz/trauma-score-mid.png' : 'https://hypnozio.com/hypnozio/quiz/trauma-score-low.png')" alt="Childhood Trauma Score" />
                                        <button class="btn h-14" type="button" x-on:click="nextQuestion();">
                                            Continue
                                        </button>
                                        <div class="text-body-medium text-neutral-50 space-y-2 mt-6">
                                            <div>Hypnotherapy helps modify the way someone thinks to help change their behaviors.</div>
                                            <div>This trauma score is intended for informational purposes only. It does not constitute a clinical diagnosis nor is it a substitute for a professional evaluation.</div>
                                        </div>
                                    </div>
                                </div>
                                <div x-show="question.type === 'graph_box'" x-cloak>
                                    <div class="pb-20 lg:pb-16">
                                        <div class="text-body-large" x-text="question.text1"></div>
                                        <div class="text-body-large mt-4" x-text="question.text2"></div>
                                        <div class="bg-white rounded-3xl shadow-2 pt-2.5 pb-4 px-4 max-w-[343px] sm:max-w-[558px] mx-auto my-4">
                                            <h1 class="text-body-large font-semibold text-center">Expected weight loss journey</h1>
                                            <div class="relative">
                                                <img src="../assets/hypnozio/quiz/graph2.png" alt="" />
                                                <div class="absolute top-[13px] sm:top-[15px] left-2 sm:left-[9px]">
                                                    <div class="py-1 px-2 bg-black text-white text-[8px] leading-[9px] font-medium rounded-[4px] w-max">
                                                        Beginning of program
                                                    </div>
                                                    <svg class="ml-2" width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M5.04647 6L9.63842 0H0.454517L5.04647 6Z" fill="black" />
                                                    </svg>
                                                </div>
                                                <div class="absolute bottom-[22px] right-2 sm:bottom-6 sm:right-[11px]">
                                                    <div class="py-1 px-2 bg-black text-white text-[8px] leading-[9px] font-medium rounded-[4px] w-[92px] text-center">
                                                        Your weight loss goal
                                                    </div>
                                                    <svg class="ml-9" width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M5.04647 6L9.63842 0H0.454517L5.04647 6Z" fill="black" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="flex justify-between">
                                                <div class="text-body-small mt-[6px]">
                                                    1 mo
                                                </div>
                                                <div class="text-body-small mt-[6px]">
                                                    2 mos
                                                </div>
                                                <div class="text-body-small mt-[6px]">
                                                    3 mos
                                                </div>
                                            </div>
                                            <div class="text-body-small text-neutralVariant-60 mt-4">
                                                <div class="flex items-center">
                                                    <svg width="52" height="5" viewBox="0 0 52 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <line x1="2.70947" y1="2.5" x2="49.4071" y2="2.5" stroke="#36D000" stroke-width="5" stroke-linecap="round" />
                                                    </svg>
                                                    <div class="ml-2">Weight loss journey with Hypnozio</div>
                                                </div>
                                                <div class="flex items-center mt-2">
                                                    <svg width="52" height="5" viewBox="0 0 52 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <line x1="2.70947" y1="2.5" x2="49.4071" y2="2.5" stroke="#BA1A1A" stroke-width="5" stroke-linecap="round" stroke-dasharray="7 7" />
                                                    </svg>
                                                    <div class="ml-2">Usual weight loss journey</div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="text-body-large" x-text="question.text3"></div>
                                    </div>
                                    <div class="fixed bottom-0 left-0 w-full drop-shadow-[0_1px_15px_rgba(0,0,0,0.1)] border border-primary-95">
                                        <div class="py-3 md:py-4 bg-surface">
                                            <div class="max-w-[360px] mx-auto">
                                                <div class="flex justify-center">
                                                    <button class="btn h-14" type="button" x-on:click="nextQuestion();">
                                                        Next
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div x-show="question.type === 'graph_box_gain_muscle'" x-cloak>
                                    <div class="pb-20 lg:pb-16">
                                        <div class="text-body-large" x-text="question.text1"></div>
                                        <div class="text-body-large mt-4" x-text="question.text2"></div>
                                        <div class="bg-white rounded-3xl shadow-2 pt-2.5 pb-4 px-4 max-w-[343px] sm:max-w-[558px] mx-auto my-4">
                                            <h1 class="text-body-large font-semibold text-center">Expected muscle gain journey</h1>
                                            <div class="relative">
                                                <img src="../assets/hypnozio/quiz/gain-graph.png" alt="" />
                                                <div class="absolute bottom-6 sm:bottom-[26px] left-2">
                                                    <div class="py-1 px-2 bg-black text-white text-[8px] leading-[9px] font-medium rounded-[4px] w-[94px] text-center">
                                                        Beginning of program
                                                    </div>
                                                    <svg class="ml-[41px] sm:ml-11" width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M5.04647 6L9.63842 0H0.454517L5.04647 6Z" fill="black" />
                                                    </svg>
                                                </div>
                                                <div class="absolute top-[5px] right-0">
                                                    <div class="py-1 px-2 bg-black text-white text-[8px] leading-[9px] font-medium rounded-[4px] w-[92px] text-center">
                                                        Your muscle gain goal
                                                    </div>
                                                    <svg class="ml-[62px] sm:ml-[60px]" width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M5.04647 6L9.63842 0H0.454517L5.04647 6Z" fill="black" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="flex justify-between">
                                                <div class="text-body-small mt-[6px]">
                                                    1 mo
                                                </div>
                                                <div class="text-body-small mt-[6px]">
                                                    2 mos
                                                </div>
                                                <div class="text-body-small mt-[6px]">
                                                    3 mos
                                                </div>
                                            </div>
                                            <div class="text-body-small text-neutralVariant-60 mt-4">
                                                <div class="flex items-center">
                                                    <svg width="52" height="5" viewBox="0 0 52 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <line x1="2.70947" y1="2.5" x2="49.4071" y2="2.5" stroke="#36D000" stroke-width="5" stroke-linecap="round" />
                                                    </svg>
                                                    <div class="ml-2">Muscle gain journey with Hypnozio</div>
                                                </div>
                                                <div class="flex items-center mt-2">
                                                    <svg width="52" height="5" viewBox="0 0 52 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <line x1="2.70947" y1="2.5" x2="49.4071" y2="2.5" stroke="#BA1A1A" stroke-width="5" stroke-linecap="round" stroke-dasharray="7 7" />
                                                    </svg>
                                                    <div class="ml-2">Usual muscle gain journey</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-body-large" x-text="question.text3"></div>
                                    </div>
                                    <div class="fixed bottom-0 left-0 w-full drop-shadow-[0_1px_15px_rgba(0,0,0,0.1)] border border-primary-95">
                                        <div class="py-3 md:py-4 bg-surface">
                                            <div class="max-w-[360px] mx-auto">
                                                <div class="flex justify-center">
                                                    <button class="btn h-14" type="button" x-on:click="nextQuestion();">
                                                        Next
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div x-show="question.type === 'select'" x-cloak>
                                    <div x-show="question.question" x-cloak>
                                        <h1 class="text-title-large mb-6" x-text="question.question"></h1>
                                    </div>
                                    <div x-show="question.statement" x-cloak>
                                        <div class="text-body-large mb-6" x-text="question.statement"></div>
                                    </div>
                                    <div x-show="question.statement2" x-cloak>
                                        <div class="text-title-large mb-6" x-text="question.statement2"></div>
                                    </div>
                                    <div class="text-body-large font-normal" x-text="question.description"></div>
                                    <div class="flex flex-col justify-center pb-20 lg:pb-16">
                                        <template x-data="{ answers: question.answers }" x-init="$watch('question', () => {if (question.answers) { answers = question.answers.filter(answer => {
                                    if (answer.conditionalAnswerToExclude) {
                                        if (Object.values(answer.conditionalAnswerToExclude.answersToExclude).includes(data.answers[answer.conditionalAnswerToExclude.questionIndex].answerText)) {
                                            return false;
                                        }
                                    }
                                    return true;
                                }) }})" x-for="(answer, index) in answers" :key="questionKey + '-' + index">
                                            <div class="space-y-4">
                                                <input class="hidden peer" type="checkbox" x-bind:value="answer.value" x-bind:id="questionKey + '-' + index" x-bind:name="questionKey" x-bind:data-text="answer.text">
                                                <label class="btn-quiz mx-auto" x-bind:for="questionKey + '-' + index" x-on:click="sendHypnozioQuizAnswerClickedEvent(question.question, answer.text); answerQuestion(answer.text, answer.value)">
                                                    <div x-text="answer.text"></div>
                                                </label>
                                            </div>
                                        </template>
                                    </div>
                                    <div class="fixed bottom-0 left-0 w-full drop-shadow-[0_1px_15px_rgba(0,0,0,0.1)] border border-primary-95">
                                        <div class="py-3 md:py-4 bg-surface">
                                            <div class="max-w-[360px] mx-auto">
                                                <div class="flex justify-center">
                                                    <button class="h-14" type="button" x-bind:id="questionKey + '-question-button'" x-bind:class="data.score[questionKey] !== undefined ? 'btn' : 'btn btn-disabled'" x-on:click="nextQuestion();">
                                                        Next
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div x-show="question.type === 'radio_group'" x-cloak class="space-y-6">
                                    <div x-show="question.text" x-cloak>
                                        <div class="text-body-large" x-text="question.text"></div>
                                    </div>
                                    <h1 class="text-title-large" x-text="question.question"></h1>
                                    <div x-show="question.image" x-cloak>
                                        <img class="my-6 rounded-tl-[64px] rounded-br-[64px]" x-bind:src="question.image" alt="">
                                    </div>
                                    <div x-show="question.statement" x-cloak>
                                        <div class="text-body-large" x-text="question.statement"></div>
                                    </div>
                                    <div x-show="question.description" x-cloak>
                                        <div class="mt-4 text-body-large font-normal" x-text="question.description"></div>
                                    </div>
                                    <div class="flex flex-col justify-center">
                                        <template x-for="(answer, index) in question.answers" :key="questionKey + '-' + index">
                                            <div class="mb-4 last:mb-0">
                                                <input class="hidden peer" type="radio" x-bind:value="answer.value" x-bind:id="questionKey + '-' + index" x-bind:name="questionKey" x-bind:data-text="answer.text">
                                                <label class="btn-quiz flex" x-bind:for="questionKey + '-' + index" x-on:click="sendHypnozioQuizAnswerClickedEvent(question.question, answer.text);answerQuestion(answer.text, answer.value)">
                                                    <div x-text="answer.text"></div>
                                                </label>
                                            </div>
                                        </template>
                                    </div>
                                </div>
                                <div x-show="question.type === 'metrics_form'" x-cloak>
                                    <div x-data="{ open: false, checked: metricSystem  }">
                                        <h1 class="text-title-large mb-6" x-cloak x-text="question.question">
                                        </h1>
                                        <div id="weight-equal-error-card-imperial" class="hidden mb-6" x-bind:class="metricSystem === 'metric' ? 'hidden' : ''">
                                            <div class="p-4 bg-accent-99 rounded border border-danger text-danger-10 text-body-medium">
                                                Your desired weight must be different from your current weight.
                                            </div>
                                        </div>
                                        <div id="weight-equal-error-card-metrics" class="hidden mb-6" x-bind:class="metricSystem === 'imperial' ? 'hidden' : ''">
                                            <div class="p-4 bg-accent-99 rounded border border-danger text-danger-10 text-body-medium">
                                                Your desired weight must be different from your current weight.
                                            </div>
                                        </div>
                                        <div id="weight-error-card-imperial" class="hidden mb-6" x-bind:class="metricSystem === 'metric' ? 'hidden' : ''">
                                            <div class="p-4 bg-accent-99 rounded border border-danger text-danger-10 text-body-medium">
                                                Our program is designed for individuals who wish to lose weight. Please enter a weight lower than your current weight
                                            </div>
                                        </div>
                                        <div id="weight-error-card-metrics" class="hidden mb-6" x-bind:class="metricSystem === 'imperial' ? 'hidden' : ''">
                                            <div class="p-4 bg-accent-99 rounded border border-danger text-danger-10 text-body-medium">
                                                Our program is designed for individuals who wish to lose weight. Please enter a weight lower than your current weight
                                            </div>
                                        </div>
                                        <div id="bmi-error-card-imperial" class="hidden mb-6" x-bind:class="metricSystem === 'metric' ? 'hidden' : ''">
                                            <div class="p-4 bg-accent-99 rounded border border-danger text-danger-10 text-body-medium">
                                                Your target weight is considered unhealthy. Your BMI (Body mass index) should not be below 18.5. Please consult your doctor before starting any diets or adjust your desired weight.
                                            </div>
                                        </div>
                                        <div id="bmi-error-card-metric" class="hidden mb-6" x-bind:class="metricSystem === 'imperial' ? 'hidden' : ''">
                                            <div class="p-4 bg-accent-99 rounded border border-danger text-danger-10 text-body-medium">
                                                Your target weight is considered unhealthy. Your BMI (Body mass index) should not be below 18.5. Please consult your doctor before starting any diets or adjust your desired weight.
                                            </div>
                                        </div>
                                        <div class="flex mb-6">
                                            <div>
                                                <input class="hidden peer" type="radio" id="imperial" name="metric-system" x-bind:checked="metricSystem === 'imperial'">
                                                <label class="chip rounded-l-[100px]" x-on:click="metricSystem = 'imperial'; $nextTick(() => { $refs.imperialHeight.focus(); });" for="imperial">
                                                    <div class="flex items-center justify-between">
                                                        <div x-bind:class="metricSystem === 'imperial' ? 'mr-2' : 'hidden'">
                                                            <svg width="14" height="11" viewBox="0 0 14 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M4.75012 8.1275L1.62262 5L0.557617 6.05751L4.75012 10.25L13.7501 1.25L12.6926 0.192505L4.75012 8.1275Z" fill="#00201D" />
                                                            </svg>
                                                        </div>
                                                        <div class="text-label-medium">Imperial</div>
                                                    </div>
                                                </label>
                                            </div>
                                            <div>
                                                <input class="hidden peer" type="radio" id="metric" name="metric-system" x-bind:checked="metricSystem === 'metric'">
                                                <label class="chip -ml-px rounded-r-[100px]" x-on:click="metricSystem = 'metric'; $nextTick(() => { $refs.metricsHeight.focus(); });" for="metric">
                                                    <div class="flex items-center justify-between">
                                                        <div x-bind:class="metricSystem === 'metric' ? 'mr-2' : 'hidden' ">
                                                            <svg width="14" height="11" viewBox="0 0 14 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M4.75012 8.1275L1.62262 5L0.557617 6.05751L4.75012 10.25L13.7501 1.25L12.6926 0.192505L4.75012 8.1275Z" fill="#00201D" />
                                                            </svg>
                                                        </div>
                                                        <div class="text-label-medium">Metric</div>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                        <template x-if="metricSystem === 'imperial'">
                                            <div class="flex flex-col justify-center bg-surface">
                                                <div id="imperial_height_wrapper" class="flex justify-between space-x-4 bg-inherit">
                                                    <div class="relative z-0 w-full group bg-inherit input-text">
                                                        <input class="peer" id="imperial_height_feet" name="metrics[imperial_height_feet]" type="text" value="" maxlength="" size="" inputmode="numeric" pattern="[0-9]*" x-mask="99" x-model="data['metrics']['imperial_height_feet']" x-init="(data['metrics']['imperial_height_feet'] === '' && metricSystem == 'imperial') ? $refs.input_imperial_height_feet.focus() : ''" x-on:keyup="validateOnKeyUp(metricSystem, $event.target)" x-ref="imperialHeight" placeholder=" " x-ref="input_imperial_height_feet" />
                                                        <label for="metrics[imperial_height_feet]" class="bg-inherit px-1
               peer-focus:bg-inherit
                peer-focus:left-0
                peer-focus:text-primary
                peer-autofill:scale-75
                peer-autofill:-translate-y-7
                peer-autofill:bg-inherit
                peer-placeholder-shown:scale-100
                peer-placeholder-shown:translate-y-0
                peer-focus:scale-75
                peer-focus:px-1
                peer-focus:-translate-y-7 " x-on:click="$refs.input_imperial_height_feet.focus()">
                                                            Feet
                                                        </label>
                                                        <div class="absolute right-4 top-4">
                                                            ft
                                                        </div>
                                                    </div>
                                                    <div class="relative z-0 w-full group bg-inherit input-text">
                                                        <input class="peer" id="imperial_height_inches" name="metrics[imperial_height_inches]" type="text" value="" maxlength="" size="" inputmode="numeric" pattern="[0-9]*" x-mask="99" x-model="data['metrics']['imperial_height_inches']" x-on:keyup="validateOnKeyUp(metricSystem, $event.target)" placeholder=" " x-ref="input_imperial_height_inches" />
                                                        <label for="metrics[imperial_height_inches]" class="bg-inherit px-1
               peer-focus:bg-inherit
                peer-focus:left-0
                peer-focus:text-primary
                peer-autofill:scale-75
                peer-autofill:-translate-y-7
                peer-autofill:bg-inherit
                peer-placeholder-shown:scale-100
                peer-placeholder-shown:translate-y-0
                peer-focus:scale-75
                peer-focus:px-1
                peer-focus:-translate-y-7 " x-on:click="$refs.input_imperial_height_inches.focus()">
                                                            Inches
                                                        </label>
                                                        <div class="absolute right-4 top-4">
                                                            in
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="my-6 bg-surface">
                                                    <div class="relative z-0 w-full group bg-inherit input-text">
                                                        <input class="peer" id="imperial_weight" name="metrics[imperial_weight]" type="text" value="" maxlength="" size="" inputmode="numeric" pattern="[0-9]*" x-mask="9999" x-model="data['metrics']['imperial_weight']" x-on:keyup="validateOnKeyUp(metricSystem, $event.target)" placeholder=" " x-ref="input_imperial_weight" />
                                                        <label for="metrics[imperial_weight]" class="bg-inherit px-1
               peer-focus:bg-inherit
                peer-focus:left-0
                peer-focus:text-primary
                peer-autofill:scale-75
                peer-autofill:-translate-y-7
                peer-autofill:bg-inherit
                peer-placeholder-shown:scale-100
                peer-placeholder-shown:translate-y-0
                peer-focus:scale-75
                peer-focus:px-1
                peer-focus:-translate-y-7 " x-on:click="$refs.input_imperial_weight.focus()">
                                                            Weight
                                                        </label>
                                                        <div class="absolute right-4 top-4">
                                                            lb
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="relative z-0 w-full group bg-inherit input-text">
                                                    <input class="peer" id="imperial_desired_weight" name="metrics[imperial_desired_weight]" type="text" value="" maxlength="" size="" inputmode="numeric" pattern="[0-9]*" x-mask="9999" x-model="data['metrics']['imperial_desired_weight']" x-on:keyup="validateOnKeyUp(metricSystem, $event.target)" placeholder=" " x-ref="input_imperial_desired_weight" />
                                                    <label for="metrics[imperial_desired_weight]" class="bg-inherit px-1
               peer-focus:bg-inherit
                peer-focus:left-0
                peer-focus:text-primary
                peer-autofill:scale-75
                peer-autofill:-translate-y-7
                peer-autofill:bg-inherit
                peer-placeholder-shown:scale-100
                peer-placeholder-shown:translate-y-0
                peer-focus:scale-75
                peer-focus:px-1
                peer-focus:-translate-y-7 " x-on:click="$refs.input_imperial_desired_weight.focus()">
                                                        Desired weight
                                                    </label>
                                                    <div class="absolute right-4 top-4">
                                                        lb
                                                    </div>
                                                </div>
                                            </div>
                                        </template>
                                        <template x-if="metricSystem === 'metric'">
                                            <div class="flex flex-col justify-center space-y-6 bg-surface">
                                                <div class="relative z-0 w-full group bg-inherit input-text">
                                                    <input class="peer" id="metric_height" name="metrics[metric_height]" type="text" value="" maxlength="" size="" inputmode="numeric" pattern="[0-9]*" x-mask="999" x-model="data['metrics']['metric_height']" x-init="(data['metrics']['metric_height'] === '' && metricSystem == 'metric') ? $refs.input_metric_height.focus() : ''" x-on:keyup="validateOnKeyUp(metricSystem, $event.target)" x-ref="metricsHeight" placeholder=" " x-ref="input_metric_height" />
                                                    <label for="metrics[metric_height]" class="bg-inherit px-1
               peer-focus:bg-inherit
                peer-focus:left-0
                peer-focus:text-primary
                peer-autofill:scale-75
                peer-autofill:-translate-y-7
                peer-autofill:bg-inherit
                peer-placeholder-shown:scale-100
                peer-placeholder-shown:translate-y-0
                peer-focus:scale-75
                peer-focus:px-1
                peer-focus:-translate-y-7 " x-on:click="$refs.input_metric_height.focus()">
                                                        Height
                                                    </label>
                                                    <div class="absolute right-4 top-4">
                                                        cm
                                                    </div>
                                                </div>
                                                <div class="relative z-0 w-full group bg-inherit input-text">
                                                    <input class="peer" id="metric_weight" name="metrics[metric_weight]" type="text" value="" maxlength="" size="" inputmode="numeric" pattern="[0-9]*" x-mask="999" x-model="data['metrics']['metric_weight']" x-on:keyup="validateOnKeyUp(metricSystem, $event.target)" placeholder=" " x-ref="input_metric_weight" />
                                                    <label for="metrics[metric_weight]" class="bg-inherit px-1
               peer-focus:bg-inherit
                peer-focus:left-0
                peer-focus:text-primary
                peer-autofill:scale-75
                peer-autofill:-translate-y-7
                peer-autofill:bg-inherit
                peer-placeholder-shown:scale-100
                peer-placeholder-shown:translate-y-0
                peer-focus:scale-75
                peer-focus:px-1
                peer-focus:-translate-y-7 " x-on:click="$refs.input_metric_weight.focus()">
                                                        Weight
                                                    </label>
                                                    <div class="absolute right-4 top-4">
                                                        kg
                                                    </div>
                                                </div>
                                                <div class="relative z-0 w-full group bg-inherit input-text">
                                                    <input class="peer" id="metric_desired_weight" name="metrics[metric_desired_weight]" type="text" value="" maxlength="" size="" inputmode="numeric" pattern="[0-9]*" x-mask="999" x-model="data['metrics']['metric_desired_weight']" x-on:keyup="validateOnKeyUp(metricSystem, $event.target)" placeholder=" " x-ref="input_metric_desired_weight" />
                                                    <label for="metrics[metric_desired_weight]" class="bg-inherit px-1
               peer-focus:bg-inherit
                peer-focus:left-0
                peer-focus:text-primary
                peer-autofill:scale-75
                peer-autofill:-translate-y-7
                peer-autofill:bg-inherit
                peer-placeholder-shown:scale-100
                peer-placeholder-shown:translate-y-0
                peer-focus:scale-75
                peer-focus:px-1
                peer-focus:-translate-y-7 " x-on:click="$refs.input_metric_desired_weight.focus()">
                                                        Desired weight
                                                    </label>
                                                    <div class="absolute right-4 top-4">
                                                        kg
                                                    </div>
                                                </div>
                                            </div>
                                        </template>
                                        <div class="flex items-center mt-6">
                                            <div class="mr-2">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M12 22C9.66667 21.4167 7.75 20.0625 6.25 17.9375C4.75 15.8125 4 13.4833 4 10.95V5L12 2L20 5V10.95C20 13.4833 19.25 15.8125 17.75 17.9375C16.25 20.0625 14.3333 21.4167 12 22ZM12 20.45C13.7667 19.8667 15.2292 18.7958 16.3875 17.2375C17.5458 15.6792 18.225 13.9333 18.425 12H12V3.625L5.5 6.05V10.95C5.5 11.15 5.50417 11.3208 5.5125 11.4625C5.52083 11.6042 5.54167 11.7833 5.575 12H12V20.45Z" fill="#404040" />
                                                </svg>
                                            </div>
                                            <div class="text-body-small text-neutralVariant">
                                                Your personal details, are encrypted for security and will always remain private — we guarantee no third-party sharing
                                            </div>
                                        </div>
                                        <button class="h-14 mt-6" type="button" x-bind:id="questionKey + '-question-button'" x-bind:class="
                                            (metricSystem === 'imperial' && data['metrics']['imperial_desired_weight'].length > 0 &&
                                            data['metrics']['imperial_height_feet'].length > 0 &&
                                            data['metrics']['imperial_weight'].length > 0 &&
                                            (
                                                (fitnessMotivationFlow && Number(data['metrics']['imperial_desired_weight']) !== Number(data['metrics']['imperial_weight']) &&
                                                Number(data['metrics']['imperial_desired_weight']) <= 1433) ||
                                                (!fitnessMotivationFlow && Number(data['metrics']['imperial_desired_weight']) < Number(data['metrics']['imperial_weight']))
                                            ) &&
                                            bmi > 18.5) ||
                                            (metricSystem === 'metric' && data['metrics']['metric_desired_weight'].length > 0 &&
                                            data['metrics']['metric_height'].length > 0 &&
                                            data['metrics']['metric_weight'].length > 0 &&
                                            (
                                                (fitnessMotivationFlow && Number(data['metrics']['metric_desired_weight']) !== Number(data['metrics']['metric_weight']) &&
                                                Number(data['metrics']['metric_desired_weight']) <= 650) ||
                                                (!fitnessMotivationFlow && Number(data['metrics']['metric_desired_weight']) < Number(data['metrics']['metric_weight']))
                                            ) &&
                                            bmi > 18.5) ? 'btn' : 'btn btn-disabled'
                                        " x-on:click="nextQuestion();">
                                            Next
                                        </button>
                                    </div>
                                </div>
                                <div x-show="question.type === 'text_input'" x-cloak class="bg-surface">
                                    <h1 class="text-title-large mb-6" x-text="question.question"></h1>
                                    <div class="text-body-large mb-6" x-text="question.description"></div>
                                    <div class="relative z-0 w-full group bg-inherit input-text">
                                        <input class="peer  bg-surface" id="activity" name="activity" type="text" value="" maxlength="100" size="" inputmode="" pattern="" x-model="data.activity" x-bind:value="data.activity" placeholder=" " x-ref="input_activity" />
                                        <label for="activity" class="bg-inherit px-1
               peer-focus:bg-inherit
                peer-focus:left-0
                peer-focus:text-primary
                peer-autofill:scale-75
                peer-autofill:-translate-y-7
                peer-autofill:bg-inherit
                peer-placeholder-shown:scale-100
                peer-placeholder-shown:translate-y-0
                peer-focus:scale-75
                peer-focus:px-1
                peer-focus:-translate-y-7 " x-on:click="$refs.input_activity.focus()">
                                            Enter your physical activity
                                        </label>
                                    </div>
                                    <div class="flex justify-center mt-6">
                                        <button type="submit" class="w-full" x-bind:disabled="question.type !== 'text_input'" x-bind:class="data.activity.length > 0 ? 'btn' : 'btn btn-disabled'" x-on:click="
                                            sendHypnozioQuizAnswerClickedEvent(question.question.split('. ')[1], data.activity);
                                            answerQuestion(question.question, data.activity);
                                        ">
                                            Next
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div id="quiz-progress-wrapper" class="hidden container mt-6 lg:mt-16">
                <div class="m-auto shadow rounded min-w-[343px] max-w-[360px] bg-white p-6">
                    <div class="text-title-large">We are analysing your answers...</div>
                    <div class="relative flex justify-center items-center mt-4">
                        <div class="round relative" data-value="1" data-size="200" data-thickness="20">
                            <div class="percentage absolute top-1/2 left-1/2 -translate-x-1/2 -mt-[41px] text-primary text-[54px] font-medium"></div>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <div class="flex justify-between items-center border-b border-neutral-90 last:border-none mt-6 py-2 last:pb-0">
                            <div class="color-change text-body-large">Symptoms</div>
                            <svg class="shrink-0 hidden svg-class" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="1" y="1" width="18" height="18" rx="4" fill="#27BFB3" />
                                <path d="M6.28033 9.77488C5.98744 9.48199 5.51256 9.48199 5.21967 9.77488C4.92678 10.0678 4.92678 10.5426 5.21967 10.8355L7.94202 13.5579C8.23492 13.8508 8.70979 13.8508 9.00268 13.5579L15.447 7.11358C15.7399 6.82069 15.7399 6.34582 15.447 6.05292C15.1541 5.76003 14.6792 5.76003 14.3863 6.05292L8.47235 11.9669L6.28033 9.77488Z" fill="white" />
                            </svg>
                        </div>
                        <div class="flex justify-between items-center border-b border-neutral-90 last:border-none mt-6 py-2 last:pb-0">
                            <div class="color-change text-body-large">Root cause</div>
                            <svg class="shrink-0 hidden svg-class" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="1" y="1" width="18" height="18" rx="4" fill="#27BFB3" />
                                <path d="M6.28033 9.77488C5.98744 9.48199 5.51256 9.48199 5.21967 9.77488C4.92678 10.0678 4.92678 10.5426 5.21967 10.8355L7.94202 13.5579C8.23492 13.8508 8.70979 13.8508 9.00268 13.5579L15.447 7.11358C15.7399 6.82069 15.7399 6.34582 15.447 6.05292C15.1541 5.76003 14.6792 5.76003 14.3863 6.05292L8.47235 11.9669L6.28033 9.77488Z" fill="white" />
                            </svg>
                        </div>
                        <div class="flex justify-between items-center border-b border-neutral-90 last:border-none mt-6 py-2 last:pb-0">
                            <div class="color-change text-body-large">Goals</div>
                            <svg class="shrink-0 hidden svg-class" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="1" y="1" width="18" height="18" rx="4" fill="#27BFB3" />
                                <path d="M6.28033 9.77488C5.98744 9.48199 5.51256 9.48199 5.21967 9.77488C4.92678 10.0678 4.92678 10.5426 5.21967 10.8355L7.94202 13.5579C8.23492 13.8508 8.70979 13.8508 9.00268 13.5579L15.447 7.11358C15.7399 6.82069 15.7399 6.34582 15.447 6.05292C15.1541 5.76003 14.6792 5.76003 14.3863 6.05292L8.47235 11.9669L6.28033 9.77488Z" fill="white" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</body>

</html>
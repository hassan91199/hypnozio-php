<?php
session_start();



require_once __DIR__ . '/utils/functions.php';
require_once __DIR__ . '/utils/db.php';

unset($_SESSION['PREVIOUS_DISCOUNT']);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $requestData = $_POST;

    $gender = "";
    $cid = $_GET['cid'] ?? '';
    $sid = $_GET['sid'] ?? '';

    switch ($_GET['g']) {
        case 'm':
            $gender = "male";
            break;
        case 'f':
            $gender = "female";
            break;
        case 'o':
            $gender = "other";
            break;

        default:
            break;
    }

    $data = [];
    $summary = [];
    $bmi = null;

    // Handle metric data
    if (!empty($requestData['metrics'])) {
        $metrics = $requestData['metrics'];
        if (isset($metrics['metric_height'])) {
            $data['height'] = "{$metrics['metric_height']}cm";
            $data['weight'] = "{$metrics['metric_weight']}Kg";
            $data['desired_weight'] = "{$metrics['metric_desired_weight']}Kg";

            $diff = $metrics['metric_weight'] - $metrics['metric_desired_weight'];

            $summary['diff_weight'] = "{$diff}Kg";

            $bmi = calculateBmi(
                [
                    'value' => $metrics['metric_weight'],
                    'unit' => 'kg',
                ],
                [
                    'value' => $metrics['metric_height'],
                    'unit' => 'cm',
                ],
            );
        } elseif (isset($metrics['imperial_height_feet'])) {
            $data['height'] = "{$metrics['imperial_height_feet']}ft {$metrics['imperial_height_inches']}inch";
            $data['weight'] = "{$metrics['imperial_weight']}lb";
            $data['desired_weight'] = "{$metrics['imperial_desired_weight']}lb";

            $diff = $metrics['imperial_weight'] - $metrics['imperial_desired_weight'];

            $summary['diff_weight'] = "{$diff}lb";

            $bmi = calculateBmi(
                [
                    'value' => $metrics['imperial_weight'],
                    'unit' => 'inch',
                ],
                [
                    'value' => ($metrics['imperial_height_feet'] * 12) + $metrics['imperial_height_inches'],
                    'unit' => 'inch',
                ],
            );
        }

        $summary['weight'] = $data['weight'];
        $summary['desired_weight'] = $data['desired_weight'];

        $_SESSION['summary'] = $summary;
        $_SESSION['bmi'] = $bmi ?? 0;
    }

    // Decode answers if exists
    $answers = isset($requestData['answers']) ? json_decode($requestData['answers'], true) : [];

    // Organizing the answers
    foreach ($answers as $index => $answer) {
        if ($index == 22) break;
        $questionNumber = $index + 1;

        $data["answer_{$questionNumber}"] = isset($answer['answerText'])
            ? array_keys($answer)[0]
            : implode(", ", array_keys($answer));
    }

    // Calculate and set the metabolic age
    $ageRange = $data['answer_1'];
    list($lower, $metabolicAge) = explode('-', $ageRange);
    $metabolicAge = (int)$metabolicAge;
    $metabolicAge += env('METABOLIC_AGE_INCREMENT');
    $_SESSION['metabolic_age'] = $metabolicAge;

    $email = $requestData['email'];
    $data['email'] = $email;
    $data['gender'] = $gender;
    $data['cid'] = $cid;
    $data['sid'] = $sid;

    // Setting necessary data to show on checkout and summary page
    $_SESSION['AGE_RANGE'] = $data['answer_1'];
    $_SESSION['OVERWEIGHT_REASON'] = $data['answer_6'];

    // Setting the email in the session to use it while checking out
    $_SESSION['EMAIL'] = $email;

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
        $quizSubmission = updateOrCreate('quiz_submissions', ['email' => $email], $data);

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

            header("Location: /summary.php");
            exit();
        }
    }

    // Redirect user back to the quiz if submission wasn't saved
    $currentUri = $_SERVER['REQUEST_URI'];
    header("Location: $currentUri");

    exit();
}
?>

<?php
$siteName = 'Natural Neuro Hypnosis'

?>

<!DOCTYPE html>
<html lang="en" class="">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <link rel="icon" type="image/x-icon" href="assets/favicon/favicon.svg">

    <title><?= $siteName ?> | Find &amp; fix root cause of overweight using self-hypnosis</title>

    <link rel="stylesheet" href="assets/css/app.css" data-navigate-track="reload" />
    <script type="module" src="assets/js/nh-quiz-1f23fa02.js" data-navigate-track="reload"></script>
    <script type="module" src="assets/js/gtm-tags-e2664de5.js" data-navigate-track="reload"></script>
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
                <img src="assets/icons/logo.svg" class="" alt="<?= $siteName ?>">
                <div class="flex items-center space-x-4">
                </div>
            </div>
        </div>
    </nav>

    <div class="pb-8 md:pb-10 lg:pb-16">
        <div>
            <div id="quiz-wrapper">
                <div x-data="hypnozioQuiz(
                [{&quot;type&quot;:&quot;radio_group&quot;,&quot;question&quot;:&quot;What is your age?&quot;,&quot;answers&quot;:[{&quot;text&quot;:&quot;18-21&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;22-30&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;31-40&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;41-50&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;51-60&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;61-70&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;70+&quot;,&quot;value&quot;:0}]},{&quot;type&quot;:&quot;select&quot;,&quot;question&quot;:&quot;Do you have any health issues?&quot;,&quot;description&quot;:&quot;You can select as many as you want.&quot;,&quot;answers&quot;:[{&quot;text&quot;:&quot;Anxiety \/ Stress&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;Depression&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;Smoking&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;Chronic pain&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;Sleep problems&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;Skin issues&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;Other&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;None&quot;,&quot;value&quot;:0}]},{&quot;type&quot;:&quot;info_box&quot;,&quot;text1&quot;:&quot;<?= $siteName ?> helps to manage your relationship with food by \u201cfixing\u201d miscommunication between your brain and stomach.&quot;,&quot;text3&quot;:&quot;Let\u2019s start by learning more about you, so we can assess whether <?= $siteName ?> might help you too.&quot;,&quot;image&quot;:&quot;http:\/\/nh-special.com\/assets\/quiz\/brain-and-stomach.png&quot;},{&quot;type&quot;:&quot;radio_group&quot;,&quot;text&quot;:&quot;A growing number of nutritionists are recommending <?= $siteName ?>.&quot;,&quot;question&quot;:&quot;Were you recommended by a nutritionist?&quot;,&quot;answers&quot;:[{&quot;text&quot;:&quot;Yes&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;No&quot;,&quot;value&quot;:0}]},{&quot;type&quot;:&quot;radio_group&quot;,&quot;question&quot;:&quot;How long have you been struggling with nutrition problems, such as being overweight or binge eating?&quot;,&quot;answers&quot;:[{&quot;text&quot;:&quot;0 - 6 months&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;6 - 12 months&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;1 - 5 year&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;5+ years&quot;,&quot;value&quot;:0}]},{&quot;type&quot;:&quot;select&quot;,&quot;question&quot;:&quot;We know everyone\u2019s overweight reasons are unique. What are yours?&quot;,&quot;description&quot;:&quot;You can select as many as you want.&quot;,&quot;answers&quot;:[{&quot;text&quot;:&quot;Emotional eating&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;Binge eating&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;Chronic dieting&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;Poor digestion&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;Lack of willpower&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;Not sure&quot;,&quot;value&quot;:0}]},{&quot;type&quot;:&quot;info_box&quot;,&quot;text1&quot;:&quot;Although people have different reasons for being overweight, one of the main causes is miscommunication between the stomach and the brain.&quot;,&quot;text2&quot;:&quot;Miscommunication between the stomach and the brain is a significant factor in causing overweight. Understanding this connection can help inform lifestyle and dietary choices to improve physical and mental health.&quot;,&quot;text3&quot;:&quot;If you\u2019ve ever experienced butterflies in your stomach when nervous, then you have felt the effects of the stomach-brain connection.&quot;,&quot;image&quot;:&quot;http:\/\/nh-special.com\/assets\/quiz\/woman-bellyache.png&quot;},{&quot;type&quot;:&quot;select&quot;,&quot;question&quot;:&quot;What physical symptoms do you normally experience?&quot;,&quot;description&quot;:&quot;You can select as many as you want.&quot;,&quot;answers&quot;:[{&quot;text&quot;:&quot;Shortness of breath&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;Sweating more than usual&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;Snoring&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;Trouble sleeping&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;Skin problems&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;Fatigue&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;Back and joints pain&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;Not sure&quot;,&quot;value&quot;:0}]},{&quot;type&quot;:&quot;select&quot;,&quot;question&quot;:&quot;How do these symptoms impact your life?&quot;,&quot;description&quot;:&quot;You can select as many as you want.&quot;,&quot;answers&quot;:[{&quot;text&quot;:&quot;Physically uncomfortable&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;Nervous to socialize&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;Worrying about travel&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;Struggle with work&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;Negative self-esteem&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;Not sure&quot;,&quot;value&quot;:0}]},{&quot;type&quot;:&quot;radio_group&quot;,&quot;question&quot;:&quot;How often does this happen?&quot;,&quot;answers&quot;:[{&quot;text&quot;:&quot;Multiple times a day&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;Daily&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;Multiple times a week&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;Weekly&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;Monthly&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;Not sure&quot;,&quot;value&quot;:0}]},{&quot;type&quot;:&quot;select&quot;,&quot;question&quot;:&quot;What financial costs have you had to deal with?&quot;,&quot;description&quot;:&quot;You can select as many as you want.&quot;,&quot;answers&quot;:[{&quot;text&quot;:&quot;Many doctors visits&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;Expensive food\/diet&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;Missing work&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;Ineffective supplements&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;Not sure&quot;,&quot;value&quot;:0}]},{&quot;type&quot;:&quot;graph_box&quot;,&quot;text1&quot;:&quot;Most weight loss solutions don\u2019t target real cause of overweight, such as miscommunication between brain and stomach.&quot;,&quot;text2&quot;:&quot;Hypnotherapy is different.&quot;,&quot;text3&quot;:&quot;According to clinical studies, hypnotherapy has been found to address and resolve this miscommunication.&quot;},{&quot;type&quot;:&quot;radio_group&quot;,&quot;question&quot;:&quot;Many people fail to lose weight. Do you know why this happens?&quot;,&quot;answers&quot;:[{&quot;text&quot;:&quot;Yes&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;Somewhat&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;No&quot;,&quot;value&quot;:0}]},{&quot;type&quot;:&quot;info_box&quot;,&quot;text1&quot;:&quot;Diets and workout plans often fail to produce weight loss results due to underlying mental issues such as negative self-image, emotional eating, and fear of failure.&quot;,&quot;text2&quot;:&quot;Hypnotherapy can effectively address these issues by changing the individual&#039;s mindset, providing the motivation and mental clarity needed for successful weight loss.&quot;,&quot;image&quot;:&quot;http:\/\/nh-special.com\/assets\/quiz\/female-with-headphones.png&quot;},{&quot;type&quot;:&quot;select&quot;,&quot;statement&quot;:&quot;Great - now we know a little bit about your current experience with food and how it impacts your life.&quot;,&quot;statement2&quot;:&quot;Imagine yourself in 6 week time, how would you like to feel?&quot;,&quot;description&quot;:&quot;You can select as many as you want.&quot;,&quot;answers&quot;:[{&quot;text&quot;:&quot;Physically comfortable&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;In control of  my weight&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;Healthier in my body&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;Confident in myself&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;Not sure&quot;,&quot;value&quot;:0}]},{&quot;type&quot;:&quot;metrics_form&quot;,&quot;question&quot;:&quot;Enter your measurements&quot;,&quot;answers&quot;:[]},{&quot;type&quot;:&quot;select&quot;,&quot;question&quot;:&quot;What would you want to do if you were at your desired weight?&quot;,&quot;description&quot;:&quot;You can select as many as you want.&quot;,&quot;answers&quot;:[{&quot;text&quot;:&quot;Enjoy social life \/ relationships&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;Sleep better&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;Travel with confidence&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;Play my favourite sport&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;Be more present at work&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;Not sure&quot;,&quot;value&quot;:0}]},{&quot;type&quot;:&quot;radio_group&quot;,&quot;question&quot;:&quot;How confident are you in achieving this with your current approach?&quot;,&quot;answers&quot;:[{&quot;text&quot;:&quot;Confident&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;Somewhat confident&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;Not at all&quot;,&quot;value&quot;:0}]},{&quot;type&quot;:&quot;radio_group&quot;,&quot;question&quot;:&quot;How important is achieving this to you?&quot;,&quot;answers&quot;:[{&quot;text&quot;:&quot;Very important&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;Important&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;Not important&quot;,&quot;value&quot;:0}]},{&quot;type&quot;:&quot;radio_group&quot;,&quot;question&quot;:&quot;How much time could you commit each day to managing your weight loss problems?&quot;,&quot;answers&quot;:[{&quot;text&quot;:&quot;15 minutes&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;15-30 minutes&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;30-60 minutes&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;More than 1 hour&quot;,&quot;value&quot;:0}]},{&quot;type&quot;:&quot;info_box&quot;,&quot;text1&quot;:&quot;<?= $siteName ?> can help you manage your weight problems in just 15 minutes a day. You will receive a personalized hypnotherapy program created by Edward Miller with the goal of improving your relationship with food and reaching your desired weight.&quot;,&quot;text3&quot;:&quot;The best part is that you don&#039;t need to take any action, such as starting a diet, working out, or giving up food you like.&quot;,&quot;text4&quot;:&quot;You just need to relax and listen to your hypnotherapy sessions in the comfort of your home.&quot;,&quot;image&quot;:&quot;http:\/\/nh-special.com\/assets\/quiz\/edward-miller.png&quot;},{&quot;type&quot;:&quot;radio_group&quot;,&quot;question&quot;:&quot;What is the best time in your day to listen to <?= $siteName ?>?&quot;,&quot;answers&quot;:[{&quot;text&quot;:&quot;When I first wake up&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;In the morning&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;At lunchtime&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;In the afternoon \/ evening&quot;,&quot;value&quot;:0},{&quot;text&quot;:&quot;Before I fall asleep&quot;,&quot;value&quot;:0}]},{&quot;type&quot;:&quot;end_card&quot;,&quot;question&quot;:&quot;One last step!&quot;,&quot;description&quot;:&quot;Enter your details to find out if weight loss directed hypnotherapy can help you achieve your goals.&quot;}],
                {&quot;required&quot;:&quot;The email field is required.&quot;,&quot;incorrect&quot;:&quot;The email must be a valid email address&quot;,&quot;heaviest_person_fact&quot;:&quot;Jon Brower Minnoch is known for being the heaviest person ever recorded. His weight was :EXAMPLEMAXWEIGHT. Just in case, we put a cap on max weight at :MAXWEIGHT.&quot;,&quot;lightest_person_fact&quot;:&quot;Luc\u00eda Zar\u00e1te is known for being the lightest person ever recorded. Her weight was only :EXAMPLEMINWEIGHT. Just in case, we put a cap on min weight at :MINWEIGHT.&quot;,&quot;smallest_person_fact&quot;:&quot;Gul Mohammed holds the record for being the smallest person ever recorded. His height was :EXAMPLEMINHEIGHT. Just in case, we put a cap on min height at :MINHEIGHT.&quot;,&quot;tallest_person_fact&quot;:&quot;Robert Wadlow holds the record for being the tallest person ever recorded. His height was :EXAMPLEMAXHEIGHT. Just in case, we put a cap on max height at :MAXHEIGHT.&quot;},
                {&quot;not_sure&quot;:&quot;Not sure&quot;,&quot;none&quot;:&quot;None&quot;,&quot;none_of_above&quot;:&quot;None of the above&quot;},
                'https://nh-special.com/verify/email',
                false)
            " :key="'test-' + questionKey">
                    <form action="<?= $_SERVER['REQUEST_URI'] ?>" novalidate method="post" class="" x-data="{ metricSystem: 'metric', bmi }" x-on:submit.prevent="submitForm($event.target, metricSystem, false, false, false, false)" x-ref="form">
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
                                        <img class="my-6" x-bind:src="traumaScore >= 77 ? 'https://nh.com/nh/quiz/trauma-score-high.png' :
                                    (traumaScore >= 44 ? 'https://nh.com/ng/quiz/trauma-score-mid.png' : 'https://nh.com/ng/quiz/trauma-score-low.png')" alt="Childhood Trauma Score" />
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
                                                <img src="assets/images/graph2.png" alt="" />
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
                                                    <div class="ml-2">Weight loss journey with <?= $siteName ?></div>
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
                                                <img src="assets/images/gain-graph.png" alt="" />
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
                                                    <div class="ml-2">Muscle gain journey with <?= $siteName ?></div>
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
                                        <template x-data="{ answers: []}" x-init="$watch('question', () => {if (question.answers) { answers = question.answers.filter(answer => {
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
                                                        Kg
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
                                                        Kg
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
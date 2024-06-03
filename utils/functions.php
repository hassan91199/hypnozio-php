<?php

/**
 * Calculates the Body Mass Index (BMI) based on the provided weight and height.
 *
 * @param array $weight An associative array with the following keys:
 *                      - 'value': The weight value.
 *                      - 'unit': The unit of the weight, either 'kg' (kilograms) or 'lb' (pounds).
 * @param array $height An associative array with the following keys:
 *                      - 'value': The height value.
 *                      - 'unit': The unit of the height, either 'inch' (inches) or 'cm' (centimeters).
 *
 * @return int|null The calculated BMI as an integer, or null if an invalid unit is provided.
 */
function calculateBmi($weight, $height)
{
    $weightInKg = null;
    $heightInMeters = null;

    // Convert weight to kilograms
    switch ($weight['unit']) {
        case 'kg':
            $weightInKg = $weight['value'];
            break;
        case 'lb':
            $weightInKg = $weight['value'] * 0.453592;
            break;
        default:
            return null;
    }

    // Convert height to meters
    switch ($height['unit']) {
        case 'inch':
            $heightInMeters = $height['value'] * 0.0254;
            break;
        case 'cm':
            $heightInMeters = $height['value'] * 0.01;
            break;
        default:
            return null;
    }

    // Calculate and return BMI as an integer
    return (int)round($weightInKg / ($heightInMeters ** 2));
}

/**
 * Determines the gender based on the first letter of a given string.
 *
 * @param string $firstLetter The first letter indicating gender:
 *                            - 'm' for male
 *                            - 'f' for female
 *                            - 'o' for other
 *
 * @return string|null Returns "male", "female", or "other" based on the input letter.
 *                     Returns null if the input letter does not match any known gender.
 */
function getGender($firstLetter)
{
    // Switch case to determine gender based on the first letter
    switch ($firstLetter) {
        case 'm':
            // If the first letter is 'm', return "male"
            return "male";
        case 'f':
            // If the first letter is 'f', return "female"
            return "female";
        case 'o':
            // If the first letter is 'o', return "other"
            return "other";
        default:
            // If the first letter does not match any case, return null
            return null;
    }
}

/**
 * Retrieves a specific environment configuration value or the entire configuration.
 *
 * This function loads the environment configuration from the `env.php` file
 * located one directory above the current script's directory. It returns the
 * value of the specified key from the configuration or the entire configuration
 * if no key is specified.
 *
 * @param string|null $key The key of the configuration value to retrieve. If null,
 *                         the entire configuration array is returned.
 * @return mixed The value of the specified configuration key, the entire configuration array,
 *               or null if the key does not exist or the `env.php` file does not return an array.
 */
function env($key = null)
{
    // Include the environment configuration file and store the result in $env
    $env = require_once __DIR__ . '/../env.php';

    // If a key is specified, return the value associated with the key, or null if it does not exist
    if ($key !== null) {
        return $env[$key] ?? null;
    }

    // If no key is specified, return the entire environment configuration array
    return $env ?? [];
}

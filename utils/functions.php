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

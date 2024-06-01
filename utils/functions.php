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

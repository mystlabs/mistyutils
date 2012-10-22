<?php

namespace MistyUtils;

class RandomUtil
{
    /**
     * Generate a random integer
     *
     * @param int $min Minimum value, inclusive
     * @param int $max Maximum value, inclusive
     * @return int
     */
    public static function generateInteger($min, $max)
    {
        $randomInteger = mt_rand(0, $max - $min);

        return $min + $randomInteger;
    }

    /**
     * Generate a random string
     *
     * @param $minLength
     * @param $maxLength
     * @param bool $useUpper
     * @param bool $useLower
     * @param bool $useNumbers
     * @return string
     */
    public static function generateString($minLength, $maxLength, $useUpper = true, $useLower = true, $useNumbers = true)
    {
        $randomString = '';
        $chars = '';

        if ($useLower) {
            $chars .= 'abcdefghijklmnopqrstuvwxyz';
        }

        if ($useUpper) {
            $chars .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        }

        if ($useNumbers) {
            $chars .= '0123456789';
        }

        if ($minLength !== $maxLength) {
            $length = self::generateInteger($minLength, $maxLength);
        } else {
            $length = $maxLength;
        }

        $numberOfChars = strlen($chars) - 1;
        for ($i = 0; $i < $maxLength; $i++) {
            $randomIndex = self::generateInteger(0, $numberOfChars);
            $randomString .= $chars[$randomIndex];
        }

        return $randomString;
    }
}
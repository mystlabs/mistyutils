<?php

namespace MistyUtils;

class StringUtil
{
	/**
	 * Check if a string is null or empty
	 */
	public static function isBlack( $string )
	{
		return $string === null || $string === '';
	}

	/**
	 * Check is a character/string is uppercase
	 */
	public static function isUpperCase( $string )
	{
		foreach(str_split($string) as $char)
		{
			if( ord( $char ) <= 64 || ord( $char ) >= 91 )
			{
				return false;
			}
		}

		return true;
	}

	/**
	 * Check if the string starts with the given token
	 */
	public static function startsWith( $haystack, $needle )
	{
		return (substr($haystack, 0, strlen($needle)) === $needle);
	}

	/**
	 * Check if the string ends with the given token
	 */
	public static function endsWith( $haystack, $needle )
	{
		return $needle === '' || (substr($haystack, strlen($needle) * -1) === $needle);
	}

	/**
	 * Find the N-th occurence of a token in a string
	 *
	 * @param string $haystack The complete string
	 * @param string $needle The string/char to be searched
	 * @return int|null Return the index of the n-th occurence, or null if not found
	 */
	public static function findNthOccurence($haystack, $needle, $occurence)
	{
		$matches = array();
		$pattern = '/' . preg_quote($needle, '/') . '/';
		preg_match_all($pattern, $haystack, $matches, PREG_OFFSET_CAPTURE);

		if (isset($matches[0]) && isset($matches[0][$occurence-1])) {
			return $matches[0][$occurence-1][1];
		}

		return null;
	}
}

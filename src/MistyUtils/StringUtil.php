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
}
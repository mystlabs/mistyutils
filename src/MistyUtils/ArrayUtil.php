<?php

namespace MistyUtils;

class ArrayUtil
{
	/**
	 * Remove all null and empty values from an array
	 */
	public static function removeBlankElements( array $array )
	{
		foreach( $array as $key => $element )
		{
			if( $element === null || $element === '' )
			{
				unset( $array[$key]);
			}
		}

		return $array;
	}

	/**
	 * Remove an element from an array and returns it
	 */
	public static function getAndRemove( array &$array, $key, $default=null )
	{
		if( isset( $array[$key] ) )
		{
			$value = $array[$key];
			unset( $array[$key] );
			return $value;
		}

		return $default;
	}

	/**
	 * Return an element without removing it from the array
	 */
	public static function get( array $array, $key, $default=null )
	{
		return isset( $array[$key] ) ? $array[$key] : $default;
	}

	/**
	 * Check if a value exists and if it's not blank
	 */
	public static function issetAndNotBlank( array $array, $index )
	{
		return isset( $array[$index] ) && !StringUtil::isBlack($array[$index]);
	}
}
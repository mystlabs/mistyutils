<?php

namespace MistyUtils;

use Mist\AutoLoader;

class Validate
{
	public static function isTrue( $var, $errorMessage='Expected a true variable', $exceptionType='\Exception' )
	{
		if( !$var )
		{
			throw new $exceptionType( $errorMessage );
		}

		return $var;
	}

	public static function isFalse( $var, $errorMessage='Expected a null/false variable', $exceptionType='\Exception' )
	{
		if( $var )
		{
			throw new $exceptionType( $errorMessage );
		}

		return $var;
	}

	public static function notNull( $var, $errorMessage='Expected a non null variable', $exceptionType='\Exception' )
	{
		if( $var === null )
		{
			throw new $exceptionType( $errorMessage );
		}

		return $var;
	}

	public static function isNull( $var, $errorMessage='Expected non null variable', $exceptionType='\Exception' )
	{
		if( $var !== null )
		{
			throw new $exceptionType( $errorMessage );
		}

		return $var;
	}

	public static function isInstanceOf( $object, $class, $errorMessage='Object is of the wrong type', $exceptionType='\Exception' )
	{
		if( !$object instanceof $class )
		{
			throw new $exceptionType( $errorMessage . ". Expected $class, found: " .get_class($object) );
		}

		return $object;
	}

	public static function equals( $a, $b, $errorMessage='The two values are different', $exceptionType='\Exception' )
	{
		if( $a !== $b )
		{
			throw new $exceptionType( $errorMessage . ". Expected '$a', was '$b'" );
		}
	}

	public static function notEquals( $a, $b, $errorMessage='The two values are equals', $exceptionType='\Exception' )
	{
		if( $a === $b )
		{
			throw new $exceptionType( $errorMessage . ". Expected two different values, got '$a' instead" );
		}
	}

	public static function notEmpty( $var, $errorMessage='Found an empty variable, expected it to be non empty', $exceptionType='\Exception' )
	{
		if( is_array( $var ) )
		{
			if( empty( $var ) )
			{
				throw new $exceptionType( $errorMessage );
			}
		}
		else
		{
			if( !$var || strlen( $var ) <= 0 )
			{
				throw new $exceptionType( $errorMessage );
			}
		}

		return $var;
	}

	public static function minLength( $var, $min, $errorMessage='The input string was too short', $exceptionType='\Exception' )
	{
		if( strlen( $var ) < $min )
		{
			throw new $exceptionType( $errorMessage );
		}

		return $var;
	}

	public static function classExist( $class, $errorMessage='Could not find the class %s1', $exceptionType='\Exception' )
	{
		if( AutoLoader::classExists( $class ) )
		{
			return true;
		}

		throw new $exceptionType( str_replace( "%s1", $class, $errorMessage ) );
	}

	public static function methodExist( $class, $method, $errorMessage='Could not find the method %s1 in the class %s2', $exceptionType='\Exception' )
	{
		if( AutoLoader::methodExists( $class, $method ) )
		{
			return true;
		}

		$errorMessage = str_replace( "%s1", $method, $errorMessage );
		$errorMessage = str_replace( "%s2", $class, $errorMessage );
		throw new $exceptionType( $errorMessage );
	}
}
<?php

namespace MistyUtils;

class ArrayValidate
{
	public static function __callStatic( $method, $args )
	{
		$array = array_shift($args);
		$index = array_shift($args);

		$value = isset($array[$index]) ? $array[$index] : null;

		return call_user_func_array(
            array('MistyUtils\Validate', $method),
            array_merge(array($value), $args)
        );
	}
}

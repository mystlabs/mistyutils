<?php

use MistyUtils\ArrayValidate;

class ArrayValidateTest extends MistyTesting\Unit
{
	/**
	 * @expectedException MistyUtils\Exception\ValidationException
	 */
	public function testNotEmpty()
	{
		ArrayValidate::notEmpty(array(), 'index');
	}
}

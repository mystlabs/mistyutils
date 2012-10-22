<?php

use MistyUtils\ArrayValidate;

class ArrayValidateTest extends MistyTesting\UnitTest
{
	/**
	 * @expectedException MistyUtils\Exception\ValidationException
	 */
	public function testNotEmpty()
	{
		ArrayValidate::notEmpty(array(), 'index');
	}
}

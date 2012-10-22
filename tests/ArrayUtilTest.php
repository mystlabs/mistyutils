<?php

use MistyUtils\ArrayUtil;

class ArrayUtilTest extends MistyTesting\UnitTest
{
	public function testRemoveBlankElements()
	{
		$input = array(1, 2, null, 'test', '', 2);
		$output = ArrayUtil::removeBlankElements($input);

		$this->assertEquals(4, count($output));
		$this->assertEquals(1, $output[0]);
		$this->assertEquals(2, $output[1]);
		$this->assertEquals('test', $output[3]);
		$this->assertEquals(2, $output[5]);
	}

	public function testGetAndRemove_checkIsRemoved()
	{
		$input = array(
			'a' => 'A',
			'b' => 'B',
			'c' => 'C'
		);
		$value = ArrayUtil::getAndRemove($input, 'b', 'notfound');

		$this->assertEquals('B', $value);
		$this->assertEquals(2, count($input));
		$this->assertFalse(isset($input['b']));
	}

	public function testGetAndRemove_testNotFound()
	{
		$input = array(
			'a' => 'A',
			'b' => 'B',
			'c' => 'C'
		);
		$value = ArrayUtil::getAndRemove($input, 'd', 'notfound');

		$this->assertEquals('notfound', $value);
		$this->assertEquals(3, count($input));
	}

	public function testGet_checkNotRemoved()
	{
		$input = array(
			'a' => 'A',
			'b' => 'B',
			'c' => 'C'
		);
		$value = ArrayUtil::get($input, 'b', 'notfound');

		$this->assertEquals('B', $value);
		$this->assertEquals(3, count($input));
		$this->assertTrue(isset($input['b']));
	}

	public function testGet_testNotFound()
	{
		$input = array(
			'a' => 'A',
			'b' => 'B',
			'c' => 'C'
		);
		$value = ArrayUtil::get($input, 'd', 'notfound');

		$this->assertEquals('notfound', $value);
		$this->assertEquals(3, count($input));
	}

	public function testIssetAndNotBlank()
	{
		$input = array(
			'a' => '',
			'b' => null,
			'c' => false,
			'd' => true,
			'e' => 'value'
		);

		$this->assertFalse(ArrayUtil::issetAndNotBlank($input, 'a'));
		$this->assertFalse(ArrayUtil::issetAndNotBlank($input, 'b'));
		$this->assertTrue(ArrayUtil::issetAndNotBlank($input, 'c'));
		$this->assertTrue(ArrayUtil::issetAndNotBlank($input, 'd'));
		$this->assertTrue(ArrayUtil::issetAndNotBlank($input, 'e'));
	}

}
<?php

use MistyUtils\StringUtil;

class StringUtilTest extends MistyTesting\Unit
{
	public function testIsBlank()
	{
		$this->assertTrue(StringUtil::isBlack(null));
		$this->assertTrue(StringUtil::isBlack(''));
		$this->assertFalse(StringUtil::isBlack(' '));
		$this->assertFalse(StringUtil::isBlack(false));
		$this->assertFalse(StringUtil::isBlack(true));
		$this->assertFalse(StringUtil::isBlack(1));
	}

	public function testIsUpperCase()
	{
		$this->assertTrue(StringUtil::isUpperCase('A'));
		$this->assertTrue(StringUtil::isUpperCase('AA'));
		$this->assertFalse(StringUtil::isUpperCase(''));
		$this->assertFalse(StringUtil::isUpperCase('a'));
		$this->assertFalse(StringUtil::isUpperCase('aA'));
		$this->assertFalse(StringUtil::isUpperCase('Aa'));
		$this->assertFalse(StringUtil::isUpperCase(1));
		$this->assertFalse(StringUtil::isUpperCase(false));
		$this->assertFalse(StringUtil::isUpperCase(true));
	}

	public function testStartsWith()
	{
		$string = 'ah !';
		$this->assertTrue(StringUtil::startsWith($string, ''));
		$this->assertTrue(StringUtil::startsWith($string, 'a'));
		$this->assertTrue(StringUtil::startsWith($string, 'ah'));
		$this->assertTrue(StringUtil::startsWith($string, 'ah '));
		$this->assertTrue(StringUtil::startsWith($string, 'ah !'));

		$this->assertFalse(StringUtil::startsWith($string, ' '));
		$this->assertFalse(StringUtil::startsWith($string, 'h !'));
		$this->assertFalse(StringUtil::startsWith($string, false));
		$this->assertFalse(StringUtil::startsWith($string, true));
	}

	public function testEndsWith()
	{
		$string = 'ah !';
		$this->assertTrue(StringUtil::endsWith($string, ''));
		$this->assertTrue(StringUtil::endsWith($string, '!'));
		$this->assertTrue(StringUtil::endsWith($string, ' !'));
		$this->assertTrue(StringUtil::endsWith($string, 'h !'));
		$this->assertTrue(StringUtil::endsWith($string, 'ah !'));

		$this->assertFalse(StringUtil::endsWith($string, ' '));
		$this->assertFalse(StringUtil::endsWith($string, 'ah '));
		$this->assertFalse(StringUtil::endsWith($string, false));
		$this->assertFalse(StringUtil::endsWith($string, true));
	}
}
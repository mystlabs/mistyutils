<?php

use MistyUtils\ClassUtil;

class ClassUtilTest extends MistyTesting\UnitTest
{
	public function testExtractClassesFromText()
	{
		$text = file_get_contents(__DIR__ . '/classes.txt');
		$classes = ClassUtil::extractClassesFromText( $text );

		$this->assertEquals(array(
			'ClassName',
			'ClassName2',
			'ClassName3',
			'ClassName4',
			'ClassName5',
			'Class_Name',
			'Name\Space\Namespaced',
			'Name\Space\ClassName',
			'Name\Space2\Namespaced',
		), $classes);
	}
}

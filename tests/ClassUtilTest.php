<?php

use MistyUtils\ClassUtil;

class ClassUtilTest extends MistyTesting\Unit
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
			'ClassName6',
			'Namespace\Folder\Class',
			'Class_Name',
		), $classes);
	}
}

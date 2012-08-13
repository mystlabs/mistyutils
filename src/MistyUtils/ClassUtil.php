<?php

namespace MistyUtils;

class ClassUtil
{
	public static function extractClassesFromText( $text )
	{
		$space = '[\s]';
		$classKeyword = 'class';
		$legalClassNameChars = '[a-zA-Z0-9_\\\\]';
		$allowedCharsAfterClassName = '[ei{]';

		$regexp = sprintf(
			'/%s+%s%s+(%s+)%s+%s/',
			$space,
			$classKeyword,
			$space,
			$legalClassNameChars,
			$space,
			$allowedCharsAfterClassName
		);

		$matches = array();
		preg_match_all( $regexp, $text, $matches );

		return $matches[1];
	}
}


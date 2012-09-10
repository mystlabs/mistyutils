<?php

namespace MistyUtils;

class ClassUtil
{
	public static function extractClassesFromText($text)
	{
		$space = '\s';
		$classKeyword = 'class';
		$legalClassNameChars = 'a-zA-Z0-9_\\\\';
		$allowedCharsAfterClassName = 'ei{';

		$regexp = sprintf(
			'/[%s]+class[%s]+([%s]+)[%s]+[%s]/',
			$space,
			$space,
			$legalClassNameChars,
			$space,
			$allowedCharsAfterClassName
		);

		$namespaces = self::extractNamespacesFromText($text, true);
		$matches = array();
		preg_match_all( $regexp, $text, $matches, PREG_OFFSET_CAPTURE );

		return array_map(function($match) use ($namespaces){

			$classDeclarationLine = $match[1];
			foreach (array_reverse($namespaces) as $namespace) {
				$namespaceDeclarationLine = $namespace[1];
				if ($namespaceDeclarationLine < $classDeclarationLine) {
					return $namespace[0] . '\\' . $match[0];
				}
			}

			return $match[0];
		}, $matches[1]);
	}

	public static function extractNamespacesFromText($text, $includeIndexes = false)
	{
		$space = '\s';
		$legalNamespaceChars = 'a-zA-Z0-9_\\\\';
		$allowedCharsAfterClassName = '[ei{]';

		$regexp = sprintf(
			'/[%s]+namespace[%s]+([%s]+)[%s]*;/',
			$space,
			$space,
			$legalNamespaceChars,
			$space
		);

		$matches = array();
		preg_match_all( $regexp, $text, $matches, $includeIndexes ? PREG_OFFSET_CAPTURE : null );

		return $matches[1];
	}
}


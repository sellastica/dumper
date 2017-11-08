<?php
if (!function_exists('f')) {
	/**
	 * @param mixed $value
	 * @param string $title
	 */
	function f($value, $title = null)
	{
		\Sellastica\Dumper\Dumper::dump($value, $title);
	}
}

if (!function_exists('g')) {
	/**
	 * @param mixed $value
	 * @param string $title
	 */
	function g($value, $title = null)
	{
		\Sellastica\Dumper\Dumper::dump($value, $title);
		exit;
	}
}
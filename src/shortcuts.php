<?php
if (!function_exists('can_display_debugger')) {
	/**
	 * @return bool
	 */
	function can_display_debugger(): bool
	{
		if (!defined('APP_DIR')) {
			return false;
		}

		$neon = \Nette\Neon\Neon::decode(file_get_contents(APP_DIR . '/config/config.neon'));
		return in_array($_SERVER['REMOTE_ADDR'], $neon['parameters']['dumper']['ip_addresses']);
	}
}

if (!function_exists('f')) {
	/**
	 * @param mixed $value
	 * @param string $title
	 */
	function f($value, $title = null)
	{
		if (can_display_debugger()) {
			\Sellastica\Dumper\Dumper::dump($value, $title);
		}
	}
}

if (!function_exists('fh')) {
	/**
	 * @param mixed $value
	 * @param string $title
	 */
	function fh($value, $title = null)
	{
		if (can_display_debugger()) {
			\Sellastica\Dumper\Dumper::dump($value, $title, true);
		}
	}
}

if (!function_exists('g')) {
	/**
	 * @param mixed $value
	 * @param string $title
	 */
	function g($value, $title = null)
	{
		if (can_display_debugger()) {
			\Sellastica\Dumper\Dumper::dump($value, $title);
			exit;
		}
	}
}

if (!function_exists('gh')) {
	/**
	 * @param mixed $value
	 * @param string $title
	 */
	function gh($value, $title = null)
	{
		if (can_display_debugger()) {
			\Sellastica\Dumper\Dumper::dump($value, $title, true);
			exit;
		}
	}
}
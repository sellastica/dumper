<?php
/**
 * @param mixed $value
 * @param string $title
 */
function f($value, $title = null)
{
	\Sellastica\Dumper\Dumper::dump($value, $title);
}

/**
 * @param mixed $value
 * @param string $title
 */
function g($value, $title = null)
{
	\Sellastica\Dumper\Dumper::dump($value, $title);
	exit;
}
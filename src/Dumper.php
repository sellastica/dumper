<?php
namespace Sellastica\Dumper;

class Dumper
{
	/**
	 * Print variable into formated area
	 * For development only
	 *
	 * @param mixed $value
	 * @param string $title
	 * @param bool $escape
	 */
	public static function dump($value, string $title = null, bool $escape = false)
	{
		$isAjax = isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest';
		if (!$isAjax) {
			echo '
		<style>
			.dump { background: #fff !important; border: solid 1px black; overflow: auto }
			.dump * { font-family: Verdana, sans-serif !important; font-size: 10px !important }
			.dump .dump-title { background-color: #ffbb3f; font-family: monospace; padding: 0.2em 1em; border-bottom: solid 1px #777; font-weight: bold }
			.dump .dump-content { padding: 0 1em }
		</style>
	';
			echo '<div class="dump">';

			//title
			if (!is_null($title)) {
				echo '<div class="dump-title">' . $title . '</div>';
			}

			echo '<pre class="dump-content">';
			print_r($escape ? htmlspecialchars($value) : $value);
			echo '</pre></div>';
		} else {
			if (null !== $title) {
				echo $title . ':::';
			}

			print_r($value);
			echo "\n";
		}
	}
}
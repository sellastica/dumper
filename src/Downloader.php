<?php
namespace Sellastica\Downloader;

class Downloader
{
	/** @var array */
	public static $allowedExtensions = [
		'avi',
		'bmp',
		'csv',
		'doc',
		'docx',
		'gif',
		'jpg',
		'jpeg',
		'key',
		'mpeg',
		'mpg',
		'mp3',
		'mp4',
		'pdf',
		'png',
		'rar',
		'txt',
		'xls',
		'xlsx',
		'zip',
	];


	/**
	 * @param string $file
	 * @throws \InvalidArgumentException
	 */
	public static function downloadRemoteFile(string $file): void
	{
		$origin = $file;
		if (!is_file($file)
			&& !\Nette\Utils\Validators::isUrl($file)) {
			throw new \InvalidArgumentException(sprintf('Invalid file URL "%s"', $origin));
		}

		self::downloadByContent(pathinfo($file, PATHINFO_BASENAME), file_get_contents($file));
	}

	/**
	 * @param string $filename
	 * @param string $content
	 */
	public static function downloadByContent(string $filename, string $content): void
	{
		$extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
		if (!in_array($extension, self::$allowedExtensions)) {
			throw new \InvalidArgumentException(
				sprintf('Invalid file type "%s". Allowed file types are %s', $filename, implode(', ', self::$allowedExtensions))
			);
		}

		$filename = pathinfo($filename, PATHINFO_BASENAME);
		header('Content-Type: application/octet-stream');
		header('Content-Transfer-Encoding: Binary');
		header('Content-disposition: attachment; filename="' . $filename . '"');
		echo $content;
		exit;
	}

	/**
	 * @param string $extension
	 * @return bool
	 */
	public static function isExtensionAllowed(string $extension): bool
	{
		return in_array($extension, self::$allowedExtensions);
	}

	/**
	 * @param string $file
	 * @return bool
	 */
	public static function isFileAllowed(string $file): bool
	{
		$extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
		return self::isExtensionAllowed($extension);
	}
}
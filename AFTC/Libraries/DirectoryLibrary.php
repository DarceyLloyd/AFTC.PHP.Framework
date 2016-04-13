<?php
/**
 * Author: Darcey@AllForTheCode.co.uk
 * Date: 23/03/2016
 */

namespace AFTC\Framework\App\Libraries;


use AFTC\Framework\Config;

class DirectoryLibrary
{
	
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	private $article_path;
	private $secure_article_path;
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	
	
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	public function __construct()
	{
		$this->article_path = Config::$server_root_path . Config::$root_absolute_path . "/data/articles/";
		$this->secure_article_path = Config::$server_root_path . Config::$root_absolute_path . "/../secure_files/articles/";
	}
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	
	
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	public function newArticle($article_id)
	{
		//vd($this->article_path);
		//vd($this->secure_article_path);

		$folder1 = $this->article_path . $article_id;
		$folder2 = $this->secure_article_path . $article_id;

		$this->create($folder1);
		$this->create($folder2);
	}
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -



	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	public function create($folder)
	{
		//vd($folder);
		if (!is_dir($folder)) {
			/*
			if (mkdir($folder)) {

			}
			*/
			mkdir($folder);
		}
	}
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -


	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	public function delete($article_id)
	{
		$folder1 = $this->article_path . "/" . $article_id;
		$folder2 = $this->secure_article_path . "/" . $article_id;

		$this->recursiveDelete($folder1);
		$this->recursiveDelete($folder2);
	}
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -


	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	public function recursiveDelete($folder)
	{
		$dir_handle = false;

		if (is_dir($folder)) {
			$dir_handle = opendir($folder);
		} else {
			echo("recursiveDelete(): Error");
			return;
		}

		if (!$dir_handle) {
			return;
		} else {
			while ($file = readdir($dir_handle)) {
				if ($file != "." && $file != "..") {
					if (!is_dir($folder . "/" . $file)) {
						unlink($folder . "/" . $file);
					} else {
						$this->delete($folder . '/' . $file);
					}
				}
			}
		}
		closedir($dir_handle);
		rmdir($folder);
	}
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

}
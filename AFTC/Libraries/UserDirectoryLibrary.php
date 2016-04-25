<?php
/**
 * Author: Darcey@AllForTheCode.co.uk
 * Date: 01/03/2016
 *
 * Designed to generate managable large scale directory structures based on user_id
 * limit of 1000 will create
 * data/users/1-1000/1
 * data/users/1-1000/2
 * data/users/1-1000/3
 * data/users/1-1000/etc
 * data/users/1001-2000/1001
 * data/users/1001-2000/1002
 * data/users/1001-2000/1003
 * data/users/1001-2000/etc
 * For 1,000,000 users this will create 1,000 folders in its path root
 *
 * limit of 5000 will create
 * data/users/1-5000/1
 * data/users/1-5000/2
 * data/users/1-5000/etc
 * data/users/5001-10000/5001
 * data/users/5001-10000/5002
 * data/users/5001-10000/etc
 * data/users/10001-15000/10001
 * data/users/10001-15000/10002
 * data/users/10001-15000/etc
 * For 1,000,000 user this will create 200 folders in its path root
 *
 * Limit of 2000 For 1,000,000 user this will create 500 folders in its path root
 * Limit of 2000 For 5,000,000 user this will create 2500 folders in its path root
 */

namespace AFTC\Framework\App\Libraries;


use AFTC\Framework\Config;

class UserDirectoryLibrary
{
	
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	public $path = "";
	public $limit = 2000;
	private $subdirs = [
		"gallery",
		"aftc_jobs",
		"cv_jobs",
		"messages",
		"jobs",
	];
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	
	
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	public function __construct()
	{
		$this->path = Config::$server_root_path . Config::$root_absolute_path . "data/users/";
	}
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	
	
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	public function create($user_id)
	{
		$error = 0;

		//trace($this->path);
		$new_dir = $this->path . $user_id;
		//trace($new_dir);

		if (!is_dir($new_dir)) {
			if (!mkdir($new_dir)){
				$error++;
				Log::error("UserFolderManager->create()","An error occured trying to create root folder for user_id " . $user_id);
			}
		} else {
			//trace("DIRECTORY ALREADY EXISTS [" . $new_dir . "]");
			$error++;
			Log::error("UserFolderManager->create()","An error occured trying to create root folder for user_id " . $user_id);
		}

		if ($error == 0) {
			foreach ($this->subdirs as $key => $value) {
				$sub_dir = $new_dir . "/" . $value;

				if (!is_dir($sub_dir)) {
					if (!mkdir($sub_dir)){
						$error++;
						Log::error("UserFolderManager->create()","An error occured trying to create root folder for user_id " . $user_id);
					}
				} else {
					//trace("DIRECTORY ALREADY EXISTS [" . $sub_dir . "]");
					$error++;
					Log::error("UserFolderManager->create()","An error occured trying to create sub folder for user_id " . $user_id);
				}
			}
		}
	}
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -


	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	public function delete($user_id)
	{
		$dirname = $this->path . $user_id;
		$dir_handle = false;

		if (is_dir($dirname)) {
			$dir_handle = opendir($dirname);
		} else {
			Log::error("UserFolderManager->delete()","An error occured trying to delete a sub folder for user_id " . $user_id);
			return;
		}

		if (!$dir_handle) {
			return;
		} else {
			while ($file = readdir($dir_handle)) {
				if ($file != "." && $file != "..") {
					if (!is_dir($dirname . "/" . $file)) {
						unlink($dirname . "/" . $file);
					} else {
						$this->delete($dirname . '/' . $file);
					}
				}
			}
		}
		closedir($dir_handle);
		rmdir($dirname);
	}
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	
}
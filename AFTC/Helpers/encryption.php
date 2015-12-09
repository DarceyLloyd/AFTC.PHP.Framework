<?php
/**
 * Author: Darcey@AllForTheCode.co.uk
 * Date: 02/12/2015
 */

use AFTC\Framework\Core\Helper as Helper;

use AFTC\Framework\Config as Config;
use AFTC\Framework\Utilities as Utils;
use Defuse\Crypto\Crypto;
use Defuse\Crypto\Exception;


class Encryption extends Helper
{
	// NOTE: Defuse encryption rotates so it cant be used for session / cookie keys etc, use ecbEncrypt and ecbDecrypt

	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	private $init = false;

	private $key_file1 = ""; // Key file path for Defuse Crypto Key storage
	private $key1 = ""; // Key for use with Defuse Crypto, NOT with the AFTC Encrptor

	private $key_file2 = ""; // Key file path for Defuse Crypto Key storage
	private $key2 = ""; // Key for use with Defuse Crypto, NOT with the AFTC Encrptor
	private $iv_size;
	private $iv;
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -


	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	public function __construct($argControllerHelpers)
	{
		$this->helpers = $argControllerHelpers;
		//$this->addDependency("encryption");
		//$this->dependencyCheck();
		$this->init();
	}
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -


	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	private function init($regenerateKeys = false)
	{
		// KEYS & Var ini
		$this->init = true;
		$this->key_file1 = Config::$server_root_path . Config::$root_absolute_path . "/AFTC/key1";
		$this->key_file2 = Config::$server_root_path . Config::$root_absolute_path . "/AFTC/key2";

		if ($regenerateKeys){
			// Regenerate encryption key for Defuse
			$this->key1 = Crypto::CreateNewRandomKey();
			file_put_contents($this->key_file1, $this->key1);

			// Regenerate encryption key for AFTC ECB Encryption
			$this->key2 = Utils::generateRandomString(32);
			$this->key2 = hash('sha256',$this->key2,true);
			file_put_contents($this->key_file2, $this->key2);
		} else {
			// Generate encryption key for Defuse
			clearstatcache();
			if (file_exists($this->key_file1)) {
				$this->key1 = file_get_contents($this->key_file1);
			} else {
				$this->key1 = Crypto::CreateNewRandomKey();
				file_put_contents($this->key_file1, $this->key1);
			}

			// Generate encryption key for AFTC ECB Encryption
			if (file_exists($this->key_file2)) {
				$this->key2 = file_get_contents($this->key_file2);
			} else {
				$this->key2 = Utils::generateRandomString(32);
				$this->key2 = hash('sha256',$this->key2,true);
				file_put_contents($this->key_file2, $this->key2);
			}
		}

		// ECB setup
		$this->iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
		$this->iv = mcrypt_create_iv($this->iv_size, MCRYPT_RAND);
	}
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -


	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	public function regenerateKeys()
	{
		$this->init(true);
	}
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	
	


	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	public function encrypt($str)
	{
		if (!$this->init){
			$this->init();
		}

		return Crypto::encrypt($str,$this->key1);
	}
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -


	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	public function decrypt($str)
	{
		if (!$this->init){
			$this->init();
		}

		return Crypto::decrypt($str,$this->key1);
	}
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -


	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	public function ecbEncrypt($input)
	{
		if (!$this->init){
			$this->init();
		}

		$str = base64_encode( mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $this->key2, $input, MCRYPT_MODE_ECB, $this->iv_size) );
		return $str;
	}
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -


	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	public function ecbDecrypt($input)
	{
		if (!$this->init){
			$this->init();
		}

		$str = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $this->key2, base64_decode($input), MCRYPT_MODE_ECB, $this->iv_size);
		return $str;
	}
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -




}
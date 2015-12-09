<?php
/**
 * Author: Darcey@AllForTheCode.co.uk
 * Date: 02/12/2015
 */

use AFTC\Framework\Core\Helper as Helper;


class Session extends Helper
{

	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	public function __construct($argControllerHelpers)
	{
		$this->helpers = $argControllerHelpers;
		$this->addDependency("encryption");
		$this->dependencyCheck();
	}
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -


	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	public function set($key,$value)
	{
		$EncryptedKey = $this->helpers["encryption"]->ecbEncrypt($key);
		$EncryptedValue = $this->helpers["encryption"]->encrypt($value);
		$_SESSION[$EncryptedKey] = $EncryptedValue;
	}
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -


	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	public function get($key)
	{
		$EencryptedKey = $this->helpers["encryption"]->ecbEncrypt($key);
		$DecryptedValue = "";

		if (isset($_SESSION[$EencryptedKey])){
			$EncryptedValue = $_SESSION[$EencryptedKey];
			$DecryptedValue = $this->helpers["encryption"]->decrypt($EncryptedValue);
		}

		return $DecryptedValue;
	}
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -


	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	public function sessionDestroy()
	{
		if (sizeOf($_SESSION) > 0) {
			foreach ($_SESSION as $key => $value) {
				$_SESSION[$key] = null;
			}
		}

		session_start();
		session_unset();
		session_destroy();
		session_write_close();
		setcookie(session_name(),'',0,'/');
		session_regenerate_id(true);
	}
	public function destroySession(){ $this->sessionDestroy(); }
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
}
<?php
/**
 * Author: Darcey@AllForTheCode.co.uk
 * Date: 26/02/2016
 */

namespace AFTC\Framework\App\Libraries;


use AFTC\Framework\Config;

class LogLibrary
{
	
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	public static function error($ClassFunction,$message)
	{
		$file = Config::$server_root_path . Config::$root_absolute_path . "../../ErrorLog.txt";
		$dte = date('d-m-Y h:i:s');
		$output = "";

		if (is_array($message)){
			$output = $dte . ": " . $ClassFunction . ": \n";
			//foreach (array_keys($message) as $k => $v) {
			foreach ($message as $k => $v) {
				$output .= "\t\t" . $k . " = " . $v . "\n";
			}
		} else {
			$output = $dte . ": " . $ClassFunction . ": \n" . $message . "\n";
		}

		$output .= "\n";

		file_put_contents($file, $output, FILE_APPEND);
	}
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	
}
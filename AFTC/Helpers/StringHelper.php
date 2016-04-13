<?php
/**
 * Author: Darcey@AllForTheCode.co.uk
 * Date: 24/03/2016
 */

namespace AFTC\Framework\App\Helpers;

class StringHelper {
	
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	public static function getSafeUrlString($input)
	{
		$output = strtolower($input);

		$character_to_remove = array(
			"`",
			"'",
			"\\",
			"/",
			"!",
			"#",
			"?",
			"!",
			"@",
			"\"",
			"+",
			";",
			"¬",
			"{",
			"}",
			"[",
			"]",
			"~",
			"#",
			"=",
			"+",
			":",
			"£",
			"$",
			"^",
			"*",
			"(",
			")",
			"%",
		);
		$character_to_replace_with_dash = array(
			" ",
			".",
			",",
			"<",
			">",
			"_"
		);
		$output = str_replace($character_to_remove,"",$output);
		$output = str_replace($character_to_replace_with_dash,"-",$output);
		$output = str_replace("&","and",$output);
		$output = str_replace("--","-",$output);
		$output = str_replace("--","-",$output);
		//$output = filter_var($output, FILTER_SANITIZE_SPECIAL_CHARS);
		//$output = preg_replace('/^[a-zA-Z0-9-.\-]+$/i', $output);
		//$output = preg_replace("/[^ \w]+/", "", $output);
		$output = utf8_decode($output);
		return $output;
	}
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	
}
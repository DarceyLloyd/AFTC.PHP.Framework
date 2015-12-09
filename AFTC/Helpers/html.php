<?php

/**
 * Author: Darcey@AllForTheCode.co.uk
 * Date: 03/12/2015
 */
class HTML
{
	
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	
	
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	public function __construct()
	{
		
	}
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	
	
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	public function init()
	{
		
	}
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -



	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	public function parseViewTags($html)
	{
		/*
		 * [[domain]] = Config::$domain_live
		 * [[root url]] = Config::$root_url
		 * [[root relative path]] = Config::$root_relative_path
		 * [[root absolute path]] = Config::$root_absolute_path
		 * [[root path]] || [[root]] = [[root absolute path]]  || [[root relative path]]
		 */

		$html = str_replace("[[domain]]", Config::$domain, $html);
		$html = str_replace("[[root url]]", Config::$root_url, $html);
		$html = str_replace("[[root relative path]]", Config::$root_relative_path, $html);
		$html = str_replace("[[root absolute path]]", Config::$root_absolute_path, $html);

		$search = [
				"[[root path]]",
				"[[root]]"
		];
		if (Config::$path_method == "relative") {
			$html = str_replace($search, Config::$root_relative_path, $html);
		} else if (Config::$root_path_method == "absolute") {
			$html = str_replace($search, Config::$root_absolute_path, $html);
		}

		return $html;

	}
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -


	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	private function parseCSSJSTags($html)
	{
		/*
		 * [[css includes]]
		 * [[js includes]]
		 */

		// process view/page specific css includes
		$css_html = "\n";
		if (sizeof($this->css_files) > 0) {
			foreach ($this->css_files as $value) {
				$css_html .= "\t<link type=\"text/css\" rel=\"stylesheet\" href=\"[[root]]/" . $value . "\"/>\n";
			}
		}
		$html = str_replace("[[css includes]]", $css_html, $html);

		// process view/page specific js includes
		$js_html = "\n";
		if (sizeof($this->js_files) > 0) {
			foreach ($this->js_files as $value) {
				$js_html .= "\t<script type=\"application/javascript\" src=\"[[root]]/" . $value . "\"></script>\n";
			}
		}
		$html = str_replace("[[js includes]]", $js_html, $html);

		$css_html = "";
		$js_html = "";

		return $html;
	}

	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	protected function addCSSInclude($file)
	{
		array_push($this->css_files,$file);
	}
	protected function addJSInclude($file)
	{
		array_push($this->js_files,$file);
	}
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	
}
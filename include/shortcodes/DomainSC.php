<?php 

/**
* 
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

class DomainSC extends shortcodes\library\Shortcode{
	
	function __construct(){
		$this->add("domain");
	}

	public function domain(){

		return "http://" . $_SERVER['SERVER_NAME'];
	}
}
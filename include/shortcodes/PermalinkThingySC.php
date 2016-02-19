<?php 

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

class PermalinkThingySC extends shortcodes\library\Shortcode{

	function __construct(){
		
		$this->add("product_info");
	}

	public function product_info($atts){

		extract(shortcode_atts(array('id' => 1, 'text' => ""), $atts));
    
	    if ($text) {
	        $url = get_permalink($id);
	        return "<a href='$url'>$text</a>";
	    } else {
		   return get_permalink($id);
		}
	}
}
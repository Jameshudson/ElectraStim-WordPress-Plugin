<?php

/**
* 
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

class ContentSC extends shortcodes\library\Shortcode{
	
	function __construct(){

		$this->add("product_info");
		$this->add("content_by_country");
	}

	public function product_info($atts=null){

		global  $woocommerce;
		
		$atts = shortcode_atts(array('id' => '', 
		                       'price' => '',
		                       'link' => '',
		                       'name' => ''), $atts);
		
		if($atts['id'] != ''){

			$product = wc_get_product($atts['id']);
				
			if($atts['price'] != ''){//displays the price of the product.

				return get_woocommerce_currency_symbol() . $product->get_price();
			}

			if($atts['link'] != ''){//gets the address to the product.

				return get_permalink($atts['id']);
			}

			if($atts['name'] != ''){//displays the products name.

				return $product->get_title();
			}
		}
	}

	public function content_by_country($atts=null){
		
		$country = get_option( 'woocommerce_default_country' );

		$atts = shortcode_atts(array('country' => ''), $atts);

		if($atts['country'] != null){

			if($atts['country'] == $country){
				return '<div>' . $content . '</div>';
			}else{
				return '<div class="hide">' . $content . "</div>";
			}
		}
	}
}
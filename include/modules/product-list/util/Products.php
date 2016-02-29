<?php 

namespace modules\product_list\util;

/**
* 
*/
class Products{

	private $args = array('post_type' => array('product', 
	                                   'product_variation', 
	                                   'product_bundles'), 
	'posts_per_page' => -1);
	
	public function getAllProducts($value=''){

		$results = array();
		
		$loop = new \WP_Query( $this->args );

		while ( $loop->have_posts() ) : $loop->the_post();

        	global $product;

        	$meta_id = '_' . 'wcj_' . 'price_by_country' . '_regular_price_' . 'local' . '_' . 1;

            $rowUK = $product->get_price();
            $rowUKSell = $product->get_sale_price();

            //names and sku
            $results["title"] = $product->get_title();
            $results["sku"] = $product->get_sku();

            //prices
            $results["uk"] = ($rowUK) !== "" ? $rowUK : "0";
            $results["uk_sales"] = ($rowUKSell) !== "" ? $rowUKSell : "0";

            $USraw = get_post_meta($product->id, '_' . 'wcj_' . 'price_by_country' . '_regular_price_' . 'local' . '_' . 1)[0];

            $USSalesRaw = get_post_meta($product->id, '_' . 'wcj_' . 'price_by_country' . '_sale_price_' . 'local' . '_' . 1)[0];

            //US prices
            $results["us"] = ($USraw !== "") ? $USraw : "0";
            $results["us_sales"] = ($USSalesRaw !== "") ? $USSalesRaw : "0";

            $EuroRaw = get_post_meta($product->id, '_' . 'wcj_' . 'price_by_country' . '_regular_price_' . 'local' . '_' . 2)[0];

            $EuroSalesRaw = get_post_meta($product->id, '_' . 'wcj_' . 'price_by_country' . '_sale_price_' . 'local' . '_' . 2)[0];

            //EUOR prices
            $results["euro"] = ($EuroRaw !== "") ? $EuroRaw : "0";
            $results["euro_sales"] = ($EuroSalesRaw !== "") ? $EuroSalesRaw : "0";

            $AUDraw = get_post_meta($product->id, '_' . 'wcj_' . 'price_by_country' . '_regular_price_' . 'local' . '_' . 3)[0];

            $AUDSalesRaw = get_post_meta($product->id, '_' . 'wcj_' . 'price_by_country' . '_sale_price_' . 'local' . '_' . 3)[0];

            //AUD prices
            $results["aud"] = ($AUDraw !== "") ? $AUDraw : "0";
            $results["aud_sales"] = ($AUDSalesRaw !== "") ? $AUDSalesRaw : "0";

            $CADRaw = get_post_meta($product->id, '_' . 'wcj_' . 'price_by_country' . '_regular_price_' . 'local' . '_' . 4)[0];

            $CADSalesRaw = get_post_meta($product->id, '_' . 'wcj_' . 'price_by_country' . '_sale_price_' . 'local' . '_' . 4)[0];

            //CAD prices
            $results["cad"] = ($CADRaw !== "") ? $CADRaw : "0";
            $results["cad_sales"] = ($CADSalesRaw !== "") ? $CADSalesRaw : "0";

        endwhile;

        return $results;
	}
}

?>
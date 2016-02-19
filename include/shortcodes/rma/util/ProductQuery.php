<?php
/**
 * Created by IntelliJ IDEA.
 * User: Cyrex
 * Date: 12/02/2016
 * Time: 15:25
 */

namespace shortcodes\rma\util;


class ProductQuery{

    /*
     * returns an array of product names and ids. Used for HTML dropbox.
     */
    public function getProducts(){

        $results = array();

        //args to get all products.
        $args = array('post_type' => array('product', 'product_variation', 'product_bundles'), 'posts_per_page' => -1);

        //get all products.
        $loop = new \WP_Query( $args );

        //loop over the products and get the name and id.
        while ( $loop->have_posts() ) : $loop->the_post();

            global $product;

            if(get_post_meta($product->id, \shortcode\rma\RMAFormSC::RETURNABLE)[0] === 'yes'){

                $results[] = array( "name" => $product->get_formatted_name(), "id" => $product->id);
            }


        endwhile;

        return $results;
    }

    public function getProductInfo($products, $id){

        foreach($products as $product){

            if($products["id"] == $id){
                return $product;
            }
        }
    }

}
<?php
/**
 * Created by IntelliJ IDEA.
 * User: Cyrex
 * Date: 19/01/2016
 * Time: 11:10
 */

namespace modules\rma;

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

class RMAHandler{

    const RETURNABLE = "returnable";    //meta tag for returnable products const.

    private $postId = "";   //current post id.

    public function __construct(){

        //removes default fields from the edit page.
//        $this->add("do_meta_boxes", "removeDefaultCustomFields", 10, 3 );

        //adds the new fields to the admin edit RMA page.
//        $this->add("admin_menu", "editBlocks");
    }

    /*
     * Runs first time on actvation.
     *
     * Loops over all the product's and add an extra bit of meta data to the product call "returnable" and set it to "yes"
    */
    public function initActivation(){

        //the query to get all woocommerce products from the database.
        $args = array('post_type' => array('product', 'product_variation', 'product_bundles'), 'posts_per_page' => -1);
        $loop = new \WP_Query( $args );

        //looping over the products and adding the extra post meta data.
        while ( $loop->have_posts() ) : $loop->the_post();

            global $product;

            //adding "returnable" to the product and setting it to "yes".
            add_post_meta($product->id, $this::RETURNABLE, "yes");

        endwhile;
    }

    /*
     *
     */
//    public function editBlocks(){
//
//        $customFields = array(
//            array(
//                "name"          => "block-of-text",
//                "title"         => "A block of text",
//                "description"   => "",
//                "type"          => "textarea",
//                "scope"         =>   array( "page" ),
//                "capability"    => "edit_pages"
//            ),
//            array(
//                "name"          => "short-text",
//                "title"         => "A short bit of text",
//                "description"   => "",
//                "type"          =>   "text",
//                "scope"         =>   array( "post" ),
//                "capability"    => "edit_posts"
//            ),
//            array(
//                "name"          => "checkbox",
//                "title"         => "Checkbox",
//                "description"   => "",
//                "type"          => "checkbox",
//                "scope"         =>   array( "post", "page" ),
//                "capability"    => "manage_options"
//            )
//        );
//
//
//        add_meta_box( 'RMA Description', 'Description', array($this, 'RMADescription' ), "RMA", 'normal', 'high' );
//    }
//
//    public function RMADescription(){
//
//        //if the post id is set then get data on that post.
//        if($this->postId !== ""){
//
//            //reason for return.
//            $reasonForReturn = get_metadata($this->postId, "reason");
//        }
//
//        echo $reasonForReturn;
//
//
//<!---->
//<!--            <textarea autocomplete="off"></textarea>-->
//<!---->
//<!--        -->
//    }

//    public function removeDefaultCustomFields( $type, $context, $post ) {
//        foreach ( array( 'normal', 'advanced', 'side' ) as $context ) {
//            foreach ( $this->postTypes as $postType ) {
//                remove_meta_box( 'postcustom', $postType, $context );
//            }
//        }
//    }
}
?>
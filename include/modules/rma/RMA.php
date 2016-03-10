<?php
/**
 * Created by IntelliJ IDEA.
 * User: Cyrex
 * Date: 05/02/2016
 * Time: 12:46
 */

namespace modules\rma;

class RMA{

    private $rmaHandler;

    public function __construct(){

        $setting = new Setting();
        add_action("admin_init", array($setting, "init"));

        //setting plugin name.

        //creating url handler.
        $this->rmaHandler = new \modules\rma\RMAHandler();

        //adds the custom post type.
        add_action("init", array( $this, "customPostType"));

        if(is_admin()){

            //gets the current RMA's post id.
            add_action("init", array( $this, "getDetails"));
        }

        //runs the method "initActivation" when the plugin is activated.
        register_activation_hook( __FILE__, array($this->rmaHandler, "initActivation"));
    }

    /*
     * Creates the custom post type called "RMA"
     */
    public function customPostType(){

        register_post_type( 'RMA',
            array(
                'labels' => array(
                    'name' => __( 'RMA' ),
                    'singular_name' => __( 'RMA' )
                ),
                'public' => true,
                'has_archive' => true,
                'rewrite' => array('slug' => 'returns'),
                'supports' => array('title', 'editor', 'thumbnail'),
                'show_ui' => true
            )
        );
    }

    /*
     * Gets the URL parameters and stores them in class vars.
     */
    public function getDetails(){

        //checks if the post id param is there.
        if(isset($_GET["post"])){

            //gets the post id and stores it in the class var call "postId".
            $this->postId = $_GET["post"];
        }
    }
}
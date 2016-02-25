<?php
/**
 * Created by IntelliJ IDEA.
 * User: Cyrex
 * Date: 05/02/2016
 * Time: 15:44
 */

namespace modules\util;

class ClientScriptsStyles{

    public function __construct(){

        add_action("wp_enqueue_scripts", array($this, "wp_register_style"));
        add_action("admin_enqueue_scripts", array($this, "admin_register_style"));
    }

    public function admin_register_style(){

        //admin css.
        wp_register_style( 'electrastim-plugi-admin-css', plugins_url( 'electrastim/res/admin-main.css' ) );

        //admin js.
        wp_register_script( "electrastim-plugin-admin-js", plugins_url( 'electrastim/res/admin-main.js' ), NULL, NULL, true );

        //checking if backend.
        if(is_admin()){

            //adding styles and scripts to the backend.
            wp_enqueue_style( 'electrastim-plugi-admin-css' );
            wp_enqueue_script("electrastim-plugin-admin-js");
        }
    }

    public function wp_register_style(){

        //importing css.
        wp_register_style( 'electrastim-plugin-css', plugins_url( 'electrastim/res/main.css' ) );

        //importing javasrcipt.
        wp_register_script( "electrastim-plugin-js", plugins_url( 'electrastim/res/main.js' ), NULL, NULL, true );

        //adding styles and scripts.
        wp_enqueue_style( 'electrastim-plugin-css' );
        wp_enqueue_script("electrastim-plugin-js");
    }
}
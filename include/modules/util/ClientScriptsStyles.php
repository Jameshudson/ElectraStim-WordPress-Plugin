<?php
/**
 * Created by IntelliJ IDEA.
 * User: Cyrex
 * Date: 05/02/2016
 * Time: 15:44
 */

namespace modules\util;

class ClientScriptsStyles{

    private $styles = array();
    private $adminStyles = array();

    private $mobileStyles = array();
    private $desktopStyles = array();

    private $scripts = array();
    private $adminScripts = array();

    public function __construct(){

        add_action("wp_enqueue_scripts", array($this, "wp_register_style"));
        add_action("admin_enqueue_scripts", array($this, "admin_register_style"));
    }

    public function admin_register_style(){

        //admin css.
        foreach ($this->adminStyles as $key => $value) {
            wp_enqueue_style($key, $value['loc'], $value['dep']);
            //checking if backend.
            if(is_admin()){

                wp_enqueue_script($key);
            }
        }

        //admin js.
        foreach ($this->adminScripts as $key => $value) {
            wp_register_script( $key, $value, NULL, NULL, true );

            //checking if backend.
            if(is_admin()){

                wp_enqueue_script($key);
            }
        }
    }

    public function wp_register_style(){

        //importing css.
        foreach ($this->styles as $key => $value) {
            wp_register_style( $key, $value['loc'], $value['dep'] );
            wp_enqueue_style( $key );
        }

        //importing mobile css.
        foreach ($this->mobileStyles as $key => $value) {

            wp_register_style( $key, $value['loc'], $value['dep']);

            if(wp_is_mobile()){

                wp_enqueue_style( $key );
            }
        }

        //importing desktop css.
        foreach ($this->desktopStyles as $key => $value) {

            wp_register_style( $key, $value['loc'], $value['dep']);

            if(wp_is_mobile()==false){

                wp_enqueue_style( $key );
            }
        }

        //importing javasrcipt.
        foreach ($this->scripts as $key => $value) {
            wp_register_script( $key, $value, NULL, NULL, true );
            wp_enqueue_script($key);
        }
    }

    public function addMobileStyle($name, $loc, $dep= array()){
        $this->mobileStyles[$name] = array('loc' => $loc, 'dep' => $dep);
    }

    public function addDesktopStyle($name, $loc, $dep= array()){
        $this->desktopStyles[$name] = array('loc' => $loc, 'dep' => $dep);
    }

    public function addStyles($name, $loc, $dep= array()){
        $this->styles[$name] = array('loc' => $loc, 'dep' => $dep);
    }

    public function addAdminStyles($name, $loc, $dep= array()){
        $this->adminStyles[$name] = array('loc' => $loc, 'dep' => $dep);
    }

    public function addScript($name, $loc){
        $this->scripts[$name] = $loc;
    }

    public function addAdminScript($name, $loc){
        $this->addScript[$name] = $loc;
    }
}
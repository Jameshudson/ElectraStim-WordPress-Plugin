<?php
/**
 * Created by IntelliJ IDEA.
 * User: Cyrex
 * Date: 11/02/2016
 * Time: 13:36
 */

namespace modules\util;

$settings_has_run = true;
$setting_sub_menu = true;

class AdminSetting{

    const ELECTRASTIM_SETTING_GROUP = "electrastim_setting_group";

    private $plugin;
    private $settingsName;

    public function __construct($plugin){

        $this->plugin = $plugin;

        //adding the sub menu to wordpress
        add_action('admin_menu', array($this, "admin_menu"));

        add_action( 'admin_init', array($this, "setting"));
    }

    public function admin_menu(){

        global $setting_sub_menu;

        if ( $setting_sub_menu !== false ){

            add_options_page(
                'ElectraStim',
                'ElectraStim Web Tools',
                'manage_options',
                'electrastim',
                array($this, "setting"));

            $setting_sub_menu = false;
        }
    }

    public function setting(){


    }
}
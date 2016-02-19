<?php

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

class AccountSC extends shortcodes\library\Shortcode{

    function __construct(){
        
        $this->add("my_orders");
        $this->add("my_addresses");
        $this->add("edit_account");
    }

    public function my_orders($atts){

        extract( shortcode_atts( array('order_count' => -1), $atts ) );

        ob_start();
        wc_get_template( 'myaccount/my-orders.php', array(
            'current_user'  => get_user_by( 'id', get_current_user_id() ),
            'order_count'   => $order_count
        ) );
        return ob_get_clean();
    }

    public function my_addresses($atts){

        extract( shortcode_atts( array('my_address' => -1), $atts ) );

        ob_start();
        wc_get_template( 'myaccount/my-address.php', array(
            'current_user'  => get_user_by( 'id', get_current_user_id() ),
            'order_count'   => $order_count
        ));
        return ob_get_clean();
    }
    
    public function edit_account($atts){

        extract( shortcode_atts( array('edit_account' => -1), $atts ) );

        ob_start();
        wc_get_template( 'myaccount/form-edit-account.php', array(
            'current_user'  => get_user_by( 'id', get_current_user_id() ),
            'order_count'   => $order_count) );
        return ob_get_clean();
    }
}
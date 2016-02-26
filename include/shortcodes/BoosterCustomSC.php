<?php

/**
 * Created by IntelliJ IDEA.
 * User: Cyrex
 * Date: 05/02/2016
 * Time: 12:13
 */
class BoosterCustomSC extends shortcodes\library\Shortcode {

    private $order;

    public function __construct(){

        $this->add("wcj_order_items_email", "wcj_order_items_email");
//        $this->add("wcj_order_total_tax","wcj_order_total_tax");

        add_action("init", array($this, "init_order"));
    }

    public function init_order(){

        //removing old Booster Plugin shortcodes
        remove_shortcode("wcj_order_total_tax");
        remove_shortcode("wcj_order_total_excl_tax");

        //manaly adding shortcodes
        add_shortcode("wcj_order_total_tax",array($this, "wcj_order_total_tax"));
        add_shortcode("wcj_order_total_excl_tax", array($this, "wcj_order_total_excl_tax"));

        if(isset($_GET['post_type']) && isset($_GET['order_id'])){

            $this->order = new WC_Order(( 'shop_order' === get_post_type( $_GET['order_id'] ) ) ? wc_get_order( $_GET['order_id'] ) : null);
        }
    }

    public function wcj_order_items_email(){

        return $this->order->billing_email;
    }

    public function wcj_order_total_tax( $atts ) {

        $tax = new \modules\util\TaxPriceFormatter();

        $country = get_post_meta($this->order->id,'_billing_country',true);

        $order_total_tax = apply_filters( 'wcj_order_total_tax', $this->order->get_total_tax(), $this->order );
        return $tax->formatPrice($this->order->get_total_tax(), $country, true);
    }

    public function wcj_order_total_excl_tax(){

        $order_total = "";

        $tax = new \modules\util\TaxPriceFormatter();
        $taxable = $tax->checkTaxable(get_post_meta($this->order->id,'_billing_country',true));

        $order_total_tax = $this->order->get_total_tax();

        if($taxable == true){

            $order_total = $this->order->get_total() - $order_total_tax;
        }

        $order_total = apply_filters( 'wcj_order_total_excl_tax', $order_total, $this->order );
        return $tax->formatPrice( $order_total, get_post_meta($this->order->id,'_billing_country',true), true);
    }
}
<?php
/**
 * Created by IntelliJ IDEA.
 * User: Cyrex
 * Date: 12/02/2016
 * Time: 13:46
 */

namespace modules\payment_tracker\order;


use modules\payment_tracker\order;

class OrderQuery{

    private $query = array(
        'post_type' => 'shop_order',
        'post_status' => array( 'wc-completed' ),
        'meta_key' => '_customer_user',
        'posts_per_page' => '-1');

    public function getOSFromOrders(){

        $loop = new \WP_Query($this->query);

        $counter = array();

        $util = new \modules\payment_tracker\util\Util();

        while($loop->have_posts()){

            $loop->the_post();
            $order = new \WC_Order($loop->post->ID);

            $user_agent = get_post_meta( $order->id, \modules\payment_tracker\PaymentTracker::DEVICE, true );

            $os = $util->getOS($user_agent);

            if(!array_key_exists($os, $counter)){

                $counter[$os] = 0;
            }else{

                $counter[$os]++;
            }
        }

        return $counter;
    }

    public function getAllOrders(){

        $loop = new WP_Query($this->query);

        $orders = array();

        while($loop->have_posts()){

            $loop->the_post();
            $orders[] = new WC_Order($loop->post->ID);
        }

        return $orders;
    }

}
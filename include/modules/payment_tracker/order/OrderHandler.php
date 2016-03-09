<?php
/**
 * Created by IntelliJ IDEA.
 * User: Cyrex
 * Date: 12/02/2016
 * Time: 12:58
 */

namespace modules\payment_tracker\order;

class OrderHandler{

    private $user_agent = "Unknown";

    public function tracker($order_id=''){

        $this->user_agent = $_SERVER['HTTP_USER_AGENT'];

        if(wp_is_mobile()){//The payment WAS made on a mobile device.

            update_post_meta( $order_id, 'device_type', 'Mobile');
        }else{//The payment WAS NOT made on a mobile device.

            update_post_meta( $order_id, 'device_type', 'Desktop');
        }

        update_post_meta($order_id, 'device', $this->user_agent);
    }

}
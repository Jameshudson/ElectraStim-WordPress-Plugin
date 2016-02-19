<?php
/**
 * Created by IntelliJ IDEA.
 * User: Cyrex
 * Date: 12/02/2016
 * Time: 08:46
 */

namespace modules\braintree_gateway_fee;


class BraintreeGatewayFee{

    public function __construct(){

        $setting = new Setting();
        add_action("admin_init", $setting);

        add_action('woocommerce_admin_order_totals_after_total', array($this, 'test'),10,1);
    }

    public function test($order){

        $order = new WC_Order($order);

        $gateway_fees = $this->get_gateway_fees($order->payment_method);

        $orderTotal = $order->get_total();

        $this->dump_html($this->cal_total_gateway_fee($orderTotal, $gateway_fees), $this->cal_order_total_with_gateway_fee($order->get_total(), $gateway_fees));
    }

    public function get_gateway_fees($gateway=''){

        if($gateway == 'credit card'){//braintree payments


        }else if($gateway == 'paypal'){//paypal

            return array('gateway_fee' => 3.4,
                'gateway_fixed_fee' => 0.20);
        }else{//no gateway found

            return array('gateway_fee' => 2.4,
                'gateway_fixed_fee' => 0.20);
        }
    }

    public function cal_order_total_with_gateway_fee( $total,$gateway_fees=null){

        if($gateway_fees != null){

            return $total - cal_total_gateway_fee($total, $gateway_fees);
        }
    }

    public function cal_total_gateway_fee($total,$gateway_fees=null){

        if($gateway_fees != null){

            return (($gateway_fees['gateway_fee'] / 100) * $total) + $gateway_fees['gateway_fixed_fee'];
        }
    }

    public function dump_html($totalFee=0,$orderTotal=0){


        $c = get_woocommerce_currency_symbol();

        ?>
        <tr>
            <td class="label">Payment Gateway fee:</td>
            <td class="total"><?php print($c . number_format((float)$totalFee, 2, '.', '')); ?></td>
            <td width="1%"></td>
        </tr>

        <tr>
            <td class="label"><b>Order Total Including Payment Gateway fee:</b></td>
            <td class="total"><b><?php print($c . number_format((float)$orderTotal, 2, '.', '')); ?></b></td>
            <td width="1%"></td>
        </tr>

        <?php
    }

}
<?php
/**
 * Created by IntelliJ IDEA.
 * User: Cyrex
 * Date: 12/02/2016
 * Time: 15:23
 */

namespace shortcodes\rma\util;


class HTTP{

    /*
     * Puts all needed url params in an array.
     */
    public function getURLParams(){

        $param = array();

        $param["first_name"] = isset($_GET['first_name']) ? $_GET['first_name'] : "";
        $param["last_name"] = isset($_GET['last_name']) ? $_GET['last_name'] : "";

        $param["email"] = isset($_GET['email']) ? $_GET['email'] : "";
        $param["phone_number"] = isset($_GET['phone_number']) ? $_GET['phone_number'] : "";

        $param["address_line1"] = isset($_GET['address_line1']) ? $_GET['address_line1'] : "";
        $param["address_line2"] = isset($_GET['address_line2']) ? $_GET['address_line2'] : "";
        $param["town"] = isset($_GET['town']) ? $_GET['town'] : "";
        $param["county"] = isset($_GET['county']) ? $_GET['county'] : "";
        $param["postcode"] = isset($_GET['postcode']) ? $_GET['postcode'] : "";

        $param["date_purchase"] = isset($_GET['date_purchase']) ? $_GET['date_purchase'] : "";
        $param["product-return"] = isset($_GET['product-return']) ? $_GET['product-return'] : "";

        $param["serial"] = isset($_GET['serial']) ? $_GET['serial'] : "";
        $param["reason"] = isset($_GET['reason']) ? $_GET['reason'] : "";
        $param["additional"] = isset($_GET['additional']) ? $_GET['additional'] : "";

        return $param;
    }

    /*
     * validate the form to check all details that are require are entered.
     */
    public function validate($params){

        //check all required param are good.
        if($this->checkParams()){

            if($params["first_name"] !== ""
                && $params["last_name"] !== ""
                && $params["email"] !== ""
                && $params["phone_number"] !== ""
                && $params["address_line1"] !== ""
                && $params["address_line2"] !== ""
                && $params["town"] !== ""
                && $params["county"] !== ""
                && $params["postcode"] !== ""
                && $params["date_purchase"] !== ""
                && $params["product-return"] !== ""
                && $params["reason"] !== ""){

                return turn;
            }
        }

        return false;
    }

    public function checkParams(){

        if(strpos($_SERVER['REQUEST_URI'], '?')){
            return true;
        }

        return false;
    }

    /*
     * Check to see if the
     */
    public function checkParam($param=""){

        if($param !== ""){

            return 'value="' . $param . '""';
        }else{

            if($this->checkParams()){

                return 'class="rma_form_error"';
            }
        }

        return "";
    }
}
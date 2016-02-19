<?php

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

/**
 * @param $county Country the order was placed in.
 * @return bool If the order should have tax appled.
 */
function checkTaxable($county){

    if($county === get_option(GBP_COUNTRIES) || in_array($county, get_option(EURO_COUNTRIES))){

        return true;
    }

    return false;
}

/**
 * @param $price The Raw price before any currency symbols.
 * @param $county The Billing country the order was placed in.
 * @return string Formatted Price with currency symbols.
 */
function format_price($price, $county, $tax=false){

    $total = "";

    $currenyMapping = new modules\util\CurrencyMapping();

    if(in_array($county, $currenyMapping->getGBPCountries()) !== false){//UK

        $total = wc_price($price, array('currency' => 'GBP'));
    }else if(in_array($county, $currenyMapping->getEUROCountries()) !== false){//EURO

        $total = wc_price($price, array('currency' => 'EUR'));
    }else if(in_array($county, $currenyMapping->getUSDCountries()) !== false){//US Doller

        if($tax == true){

            $total = wc_price("00.00", array('currency' => 'USD'));
        }else{

            $total = wc_price($price, array('currency' => 'USD'));
        }

    }else if(in_array($county, $currenyMapping->getAUDCountries())){// AU Doller

        if($tax == true){

            $total = wc_price("00.00", array('currency' => 'AUD'));
        }else {

            $total = wc_price($price, array('currency' => 'AUD'));
        }
    }else if(in_array($county, $currenyMapping->getCADCountries())){// CA Doller

        if($tax == true){

            $total = wc_price("00.00", array('currency' => 'CAD'));
        }else{

            $total = wc_price($price, array('currency' => 'CAD'));
        }

    }

    return $total;
}

/**
 * @param $phone A Phone number that needs to be confirmed.
 * @return bool If the number was a vailded phone nubmer then true.
 */
function is_phone_number($phone){

    if(preg_match("/^[0-9]{3}-[0-9]{4}-[0-9]{4}$/", $phone)) {
        return true;
    }

    return false;
}
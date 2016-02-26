<?php 

namespace modules\util;

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

class TaxPriceFormatter{

	public function checkTaxable($county){

    	$cMap = new CurrencyMapping();

	    if(in_array($county, $cMap->getUSDCountries()) || in_array($county, $cMap->getUSDCountries())){

	        return true;
	    }

    	return false;
	}

	public function formatPrice($price, $county, $tax=false){

	    $total = "";

	    $currenyMapping = new CurrencyMapping();

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
}

?>
<?php
/*
Plugin Name:Do Not Deactivate
Plugin URI: https://www.electrastim.com
Version: 1.5
Author: James Hudson
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

require_once ("vendor/autoload.php");

new \modules\page_resrict\PageResrict();
new \modules\comment_handler\CommentHandler();
new \modules\email_tax_statmant\EmailTaxStatment();
//new braintree();
new \modules\rma\RMA();
new \modules\product_list\ProductsList();
new \modules\user_register\UserRegister();

new \modules\util\ClientScriptsStyles();


//shortcodes
$shortcodes = array();

$shortcodes[] = new ContentSC();
$shortcodes[] = new DomainSC();
$shortcodes[] = new AccountSC();
$shortcodes[] = new BoosterCustomSC();
$shortcodes[] = new \shortcode\rma\RMAFormSC();

for ($i=0; $i < count($shortcodes); $i++) { 
    $shortcodes[$i]->init();
}
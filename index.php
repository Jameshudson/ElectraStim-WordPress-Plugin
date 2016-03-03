<?php
/*
Plugin Name:Do Not Deactivate
Plugin URI: https://www.electrastim.com
Version: 1.5
Author: James Hudson
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

require_once ("vendor/autoload.php");

use modules\library\wrappers\menu\AdminMenu as AdminMenu;

//adding admin menu item.
$menuTest = new AdminMenu();

$menuTest->setTitle("ElectraStim");
$menuTest->setMenuTitle("ElectraStim");
$menuTest->setCapability("manage_options");
$menuTest->setMenuSlug("electrastim");
$menuTest->setIcon("");
$menuTest->setPosition(6);

new \modules\page_resrict\PageResrict();
new \modules\email_tax_statmant\EmailTaxStatment();
new \modules\rma\RMA();
new \modules\payment_tracker\PaymentTracker($menuTest);
new \modules\product_list\ProductsList();
new \modules\user_register\UserRegister();

new \modules\email_preview\EmailPreview();

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
<?php

namespace modules\product_list{

    class ProductsList{

        private $products;

        public function __construct() {

            $setting = new Setting();
            add_action("admin_init", array($setting, "init"));

            //setting plugin name.
            $setting->setName("Product list");
            $setting->setId("PRODUCT-LIST");

            if($setting->getEnabled() == false){

                add_action( 'admin_menu', array( $this, "adminMenu"));
            }
        }

        public function adminMenu(){

            $page = new \modules\product_list\html\Page();

            add_menu_page( 
            'Product List', //(Required) The text to be displayed in the title tags of the page when the menu is selected.
            'Product List', //(Required) The text to be used for the menu.
            'manage_options', //(Required) The capability required for this menu to be displayed to the user.
            'product-list', //(Required) The slug name to refer to this menu by (should be unique for this menu).
            array($page, "handler"), //(Optional) The function to be called to output the content for this page.
            '', //(Optional) icon.
            6); //(Optional) The position in the menu order this one should appear.
        }
    }
}
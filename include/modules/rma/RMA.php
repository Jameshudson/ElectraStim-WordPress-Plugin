<?php
/**
 * Created by IntelliJ IDEA.
 * User: Cyrex
 * Date: 05/02/2016
 * Time: 12:46
 */

namespace modules\rma;

class RMA{

    private $rmaHandler;

    public function __construct(){

        $setting = new Setting();
        add_action("admin_init", array($setting, "init"));

        //setting plugin name.
        $setting->setName("RMA form");
        $setting->setId("RMA");

        //creating url handler.
        $this->rmaHandler = new \modules\rma\RMAHandler();

        if(is_admin()){

            //gets the current RMA's post id.
            add_action("init", array( $this, "getDetails"));
        }

        //runs the method "initActivation" when the plugin is activated.
        register_activation_hook( __FILE__, array($this->rmaHandler, "initActivation"));

        $RMAType = new \modules\library\wrappers\post\CustomPostType();

        $RMAType->setName('RMA');

        //creating Post type object.
        $RMALabel = new \modules\library\wrappers\post\CustomPostLabel();

        //creating Label object.
        $RMALabel->setName('RMA');
        $RMALabel->getSingelarName("RMA");

        //adding the Label object to the post type.
        $RMAType->setLabel($RMALabel);

        $RMAType->setPublic(true);
        $RMAType->setHasArchive(true);
        $RMAType->setShowUi(true);

        //adding rewrite rules.
        $rewrite = new \modules\library\wrappers\post\CustomPostRewrite();
        $rewrite->setSlug('returns');

        //adding the rewrite rules to the post type.
        $RMAType->setRewrite($rewrite);

        $RMAType->setSupport(array('title', 'editor'));
    }

    /*
     * Gets the URL parameters and stores them in class vars.
     */
    public function getDetails(){

        //checks if the post id param is there.
        if(isset($_GET["post"])){

            //gets the post id and stores it in the class var call "postId".
            $this->postId = $_GET["post"];
        }
    }
}
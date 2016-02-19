<?php
/**
 * Created by IntelliJ IDEA.
 * User: Cyrex
 * Date: 19/01/2016
 * Time: 11:45
 */

namespace shortcode\rma;

use shortcodes\library\Shortcode;
use shortcodes\rma\form\RMAForm;
use shortcodes\rma\util\HTTP;

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

class RMAFormSC extends Shortcode{

    const RETURNABLE = "returnable";

    private $params = array();

    public function __construct(){

        //adds form shortcode
        $this->add("RMA_form");
    }

    public function RMA_form($error){

        $rmaForm = new RMAForm();

        echo "Form " . $rmaForm->valid();

        if($rmaForm->valid()){
            //form completed.

            //create the RMA form and enter it into the database.
            $id = $rmaForm->complete();
            $rmaPost = new modules\rma\util\RMAPost($id);

            //send email to the customer what info about to how to handle RMA progress.
            $this->sendEmail($rmaPost);

            //show a message to the customer with the RMA id.
            $this->completeMessage($rmaPost);

        }else {

            $rmaForm->getForm();
        }
    }
}
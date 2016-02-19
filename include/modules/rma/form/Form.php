<?php
/**
 * Created by IntelliJ IDEA.
 * User: Cyrex
 * Date: 12/02/2016
 * Time: 15:29
 */

namespace modules\rma\form;


class Form{


    public function completed($param){


    }

    private function completeMessage($rmaId=NULL){

        if($rmaId !== ""){

            echo "<p>" . $rmaId . "</p>";

            echo "<p>" . do_shortcode("address") . "</p>";
        }
    }

}
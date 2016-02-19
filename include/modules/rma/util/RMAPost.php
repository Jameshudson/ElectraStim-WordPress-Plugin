<?php
/**
 * Created by IntelliJ IDEA.
 * User: Cyrex
 * Date: 02/02/2016
 * Time: 15:10
 */

namespace modules\rma\util;

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

class RMAPost{

    //const.
    //contact information.
    const FIRST_NAME = "first_name";
    const LAST_NAME = "last_name";

    const EMAIL = "email";
    const PHONE_NUMBER = "phone_number";

    //address information.
    const ADDRESS_LINE = "address_line1";
    const ADDRESS_LINE2 = "address_line2";
    const TOWN = "town";
    const COUNTY = "county";
    const POSTCODE = "postcode";

    //product information.
    const DATE_PURCHASE = "date_purchase";
    const PRODUCT = "product-return";
    const SERIAL = "serial";

    const REASON = "reason";
    const ADDITIONAL = "additional";


    //post information.
    private $id;

    //contact information.
    private $firstName;
    private $lastName;

    private $email;
    private $phoneNumber;

    //address information.
    private $addressLine;
    private $addressLine2;
    private $town;
    private $county;
    private $postcode;

    //product information.
    private $datePurchase;
    private $productReturn;
    private $serial;

    private $reason;
    private $additional;

    public function __construct($id=""){

        if(!empty($id)){

            $this->getPostData($id);
        }
    }

    public function commit(){

        //check to see if the post has already been created.
        if(FALSE === get_post_status( $this->id )){

            wp_insert_post(array(
                'post_type' => 'RMA',
                'post_title' => $this->firstName . " " . $this->lastName,
                'post_content' => $this->reason,
                'ping_status' => "closed",));

//            add_post_meta($this->id, "first_name" , $this->firstName);
//            add_post_meta($this->id, "last_name" , $this->lastName);

            add_post_meta($this->id, "email" , $this->email);
            add_post_meta($this->id, "phone_number" , $this->phoneNumber);

            add_post_meta($this->id, "address_line1" , $this->addressLine);
            add_post_meta($this->id, "address_line2" , $this->addressLine2);
            add_post_meta($this->id, "town" , $this->town);
            add_post_meta($this->id, "county" , $this->county);
            add_post_meta($this->id, "postcode" , $this->postcode);

            add_post_meta($this->id, "date_purchase" , $this->datePurchase);
            add_post_meta($this->id, "product-return" , $this->productReturn);

            add_post_meta($this->id, "serial" , $this->serial);
//            add_post_meta($this->id, "reason" , $this->reason);
            add_post_meta($this->id, "additional" , $this->additional);
        }else{

            update_post_meta($this->id, "first_name" , $this->firstName);
            update_post_meta($this->id, "last_name" , $this->lastName);

            update_post_meta($this->id, "email" , $this->email);
            update_post_meta($this->id, "phone_number" , $this->phoneNumber);

            update_post_meta($this->id, "address_line1" , $this->addressLine);
            update_post_meta($this->id, "address_line2" , $this->addressLine2);
            update_post_meta($this->id, "town" , $this->town);
            update_post_meta($this->id, "county" , $this->county);
            update_post_meta($this->id, "postcode" , $this->postcode);

            update_post_meta($this->id, "date_purchase" , $this->datePurchase);
            update_post_meta($this->id, "product-return" , $this->productReturn);

            update_post_meta($this->id, "serial" , $this->serial);
            update_post_meta($this->id, "reason" , $this->reason);
            update_post_meta($this->id, "additional" , $this->additional);
        }
    }

    //getters and setters.
    public function setPostId($id=""){

        if(!empty($id)){

            $this->getPostData($id);
        }
    }

    public function getID(){
        return $this->id;
    }

    public function getFirstName(){
        return $this->firstName;
    }

    public function setFirstName($name=""){

        if(!empty($name)) {

            $this->firstName = $name;
        }
    }

    public function getLastName(){
        return $this->lastName;
    }

    public function setLastName($name=""){

        if(!empty($name)) {

            $this->lastName = $name;
        }
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email=""){

        if(!empty($email) && is_email($email)) {

            $this->email = $email;
            return true;
        }

        return false;
    }

    public function getPhoneNumber(){
        return $this->phoneNumber;
    }

    public function setPhoneNumber($PhoneNumber=0){

        if(!empty($PhoneNumber) && id_phone_number($PhoneNumber)) {

            $this->phoneNumber = $PhoneNumber;
        }
    }

    public function getAddressLine(){
        return $this->addressLine;
    }

    public function setAddressLine($address=""){

        if(!empty($address)) {

            $this->addressLine = $address;
        }
    }

    public function getAddressLine2(){
        return $this->addressLine2;
    }

    public function setAddressLine2($address=""){

        if(!empty($address)) {

            $this->addressLine2 = $address;
        }
    }

    public function getTown(){
        return $this->town;
    }

    public function setTown($town=""){

        if(!empty($town)) {

            $this->addressLine = $town;
        }
    }

    public function getCounty(){
        return $this->county;
    }

    public function setCounty($county=""){

        if(!empty($county)) {

            $this->county = $county;
        }
    }

    public function getPostcode(){
        return $this->postcode;
    }

    public function setPostcode($postcode=""){

        if(!empty($postcode)) {

            $this->postcode = $postcode;
        }
    }

    public function getDatePurchase(){
        return $this->datePurchase;
    }

    public function setDatePurchase($datePurchase=""){

        if(!empty($datePurchase)) {

            $this->datePurchase = $datePurchase;
        }
    }

    public function getProduct(){
        return $this->productReturn;
    }

    public function setProduct($product=""){

        if(!empty($product)) {

            $this->productReturn = $product;
        }
    }

    public function getProductSerial(){
        return $this->serial;
    }

    public function setProductSerial($product=""){

        if(!empty($product)) {

            $this->serial = $product;
        }
    }

    public function getReasonForReturn(){
        return $this->reason;
    }

    public function setReasonForReturn($reason=""){

        if(!empty($reason)) {

            $this->reason = $reason;
        }
    }

    public function getAdditional(){
        return $this->additional;
    }

    public function setAdditional($additional=""){

        if(!empty($additional)) {

            $this->additional = $additional;
        }
    }

    private function getPostData($id=""){

        if(!empty($id) && FALSE === get_post_status( $this->id )){

            //post information.
            $this->id = $id;

            //contact information.
            $this->firstName = get_metadata("RMA", $this::FIRST_NAME, true);
            $this->lastName = get_metadata("RMA", $this::LAST_NAME, true);

            $this->email = get_metadata("RMA", $this::EMAIL, true);
            $this->phoneNumber = get_metadata("RMA", $this::PHONE_NUMBER, true);

            //address information.
            $this->addressLine = get_metadata("RMA", $this::ADDRESS_LINE, true);
            $this->addressLine2 = get_metadata("RMA", $this::ADDRESS_LINE2, true);
            $this->town = get_metadata("RMA", $this::TOWN, true);
            $this->county = get_metadata("RMA", $this::COUNTY, true);
            $this->postcode = get_metadata("RMA", $this::POSTCODE, true);

            //product information.
            $this->datePurchase = get_metadata("RMA", $this::DATE_PURCHASE, true);
            $this->productReturn = get_metadata("RMA", $this::PRODUCT, true);
            $this->serial = get_metadata("RMA", $this::SERIAL, true);

            $this->reason = get_metadata("RMA", $this::REASON, true);
            $this->additional = get_metadata("RMA", $this::ADDITIONAL, true);
        }
    }
}
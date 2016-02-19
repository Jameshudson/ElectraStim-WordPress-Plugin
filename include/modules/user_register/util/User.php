<?php
/**
 * Created by IntelliJ IDEA.
 * User: Cyrex
 * Date: 12/02/2016
 * Time: 14:28
 */

namespace modules\user_register\util;


use modules\user_register\Setting;
use modules\user_register\UserRegister;

class User{

    private $setting;

    public function __construct(){

        $this->setting = new Setting();
        $this->setting->setId("UESR-RESISTER");
//        $setting->setName("User Register");
    }

    public function checkEmail(){

        if(isset($_POST[UserRegister::EMAIL]) && !email_exists($_POST[UserRegister::EMAIL])){

            return true;
        }

        return false;
    }

    public function checkFirstName(){

        if(isset($_POST[UserRegister::FIRST_NAME])){

            return true;
        }

        return false;
    }

    public function checkLastName(){

        if(isset($_POST[UserRegister::LAST_NAME])){

            return true;
        }

        return false;
    }

    public function checkCaptcha(){

        $response = null;

        $reCaptcha = new ReCaptcha($this->setting->getSecretRecaptchaKey());

        if ($_POST[$this::RECAPTCHA]) {

            $response = $reCaptcha->verifyResponse(
                $_SERVER["REMOTE_ADDR"],
                $_POST["g-recaptcha-response"]
            );
        }

        if ($response != null && $response->success) {

            return true;
        }else{

            return false;
        }
    }

    public function validUser($username='', $email='', $validation_errors){

        if($this->check_captcha() == false){

            $validation_errors->add('captcha_checked_failed', __( 'Captcha.', 'woocommerce' ));
        }

        if($this->check_first_name() == false){

            $validation_errors->add('first_name_failed', __( 'First name required.', 'woocommerce' ));
        }

        if($this->check_last_name() == false){

            $validation_errors->add('last_name_failed', __( 'Last name required.', 'woocommerce' ));
        }
    }

    public function saveUser($customer_id=''){

        if($customer_id != ''){
            $user = new WP_User($customer_id);
        }

        if(isset($_POST[UserRegister::FIRST_NAME])){
            wp_update_user( array( 'ID' => $user->ID, UserRegister::FIRST_NAME => $_POST[UserRegister::FIRST_NAME] ));
        }

        if(isset($_POST[UserRegister::LAST_NAME])){
            wp_update_user( array( 'ID' => $user->ID, UserRegister::LAST_NAME => $_POST[UserRegister::LAST_NAME] ));
        }

        if(isset($_POST[PERSON_TITLE])){
            update_user_meta($user->ID, UserRegister::PERSON_TITLE, $_POST[UserRegister::PERSON_TITLE]);
        }
    }
}
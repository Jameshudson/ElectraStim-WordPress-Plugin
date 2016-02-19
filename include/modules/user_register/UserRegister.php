<?php
/**
 * Created by IntelliJ IDEA.
 * User: Cyrex
 * Date: 12/02/2016
 * Time: 08:51
 */

namespace modules\user_register;


class UserRegister{

    const PERSON_TITLE = "person_title";

    const FIRST_NAME = "first_name";
    const LAST_NAME = "last_name";

    const EMAIL = "email";

    const RECAPTCHA = "g-recaptcha-response";

    public function __construct(){

        $setting = new Setting();
        add_action("admin_init", array($setting, "init"));

        //setting plugin name.
        $setting->setName("User Register");
        $setting->setId("UESR-RESISTER");

        $form = new Form();

        //errors.
        add_action('registration_errors', array($form, 'captchaFailedError'));

        //add forms.
        add_action('woocommerce_register_form_start', array($form, 'addRegForm'));

        $user = new util\User();

        //new users.
        add_action('woocommerce_register_post', array($user, 'validUser'), 10, 3);
        add_action('woocommerce_created_customer', array( $user, 'saveUser'), 10, 1);

        //captcha form.
        add_action('woocommerce_register_form_end', array( $form, 'captchaCode'));

        //adding checkout check.
        add_action('woocommerce_after_checkout_registration_form', array( $form, 'checkoutSignup'));
    }
}
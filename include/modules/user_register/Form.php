<?php
/**
 * Created by IntelliJ IDEA.
 * User: Cyrex
 * Date: 12/02/2016
 * Time: 14:50
 */

namespace modules\user_register;


class Form{

    public function addRegForm(){

        ?>

        <select class="form-control" name="title" id="login-user-title">
            <option value="Mr">Mr</option>
            <option value="Ms">Ms</option>
            <option value="Mrs">Mrs</option>
            <option value="Miss">Miss</option>
        </select>

        <p class="form-row form-row-wide form-group">
            <input type="name" class="input-text form-control" name="first_name" id="reg_first_name" value="<?php if ( ! empty( $_POST[$this::FIRST_NAME] ) ) echo esc_attr( $_POST[$this::FIRST_NAME] ); ?>" placeholder="<?php _e( 'First Name', 'woocommerce' ); ?> *" />
        </p>

        <p class="form-row form-row-wide form-group">
            <input type="name" class="input-text form-control" name="last_name" id="reg_last_name" value="<?php if ( ! empty( $_POST[$this::LAST_NAME] ) ) echo esc_attr( $_POST[$this::LAST_NAME] ); ?>" placeholder="<?php _e( 'Last Name', 'woocommerce' ); ?> *" />
        </p>

        <?php
    }

    public function captchaCode(){

        echo "<script src='https://www.google.com/recaptcha/api.js'></script>";
        echo '<div class="g-recaptcha" data-sitekey="6LfnpBETAAAAAAuNwzARik_xQyeuaHJ6nyJbrulN"></div>';
    }

    public function captchaFailedError(){

    }

    public function checkoutSignup(){

        // captcha_code();
    }
}
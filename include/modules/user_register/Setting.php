<?php
/**
 * Created by IntelliJ IDEA.
 * User: Cyrex
 * Date: 12/02/2016
 * Time: 12:06
 */

namespace modules\user_register;


use modules\library\PluginSettings;

class Setting extends PluginSettings{

    private $groupId = "UserRegister";

    public function init(){

       $this->superInit();

        //Public key setting.
        add_settings_field(
            $this->getId() . "-public",
            "Recaptcha key public",
            array($this, "publicFieldSettings"),
            $this::PAGE,
            $this->getId());

        register_setting(
            $this->getId(),
            $this->getId() . "-public"
        );

        //secret key setting.
        add_settings_field(
            $this->getId() . "-secret",
            "Recaptcha key secret",
            array($this, "secretFieldSettings"),
            $this::PAGE,
            $this->getId());

        register_setting(
            $this->getId(),
            $this->getId() . "-secret"
        );
    }

    public function secretFieldSettings(){

        echo '<input type="text" id="' . $this->getName() . '-secret" name="' . $this->getName() . '-secret" value="1" ' . get_option($this->getName() . "-secret") . '/>';
        echo '<label for="' . $this->getName() . "-secret" .'"> '  . "Secret key " . '</label>';
    }

    public function publicFieldSettings(){

        echo '<input type="text" id="' . $this->getName() . '-public" name="' . $this->getName() . '-public" value="1" ' . get_option($this->getName() . "-public") . '/>';
        echo '<label for="' . $this->getName() . "-public" .'"> '  . "Public key " . '</label>';
    }

    //getter and setters
    public function getSecretRecaptchaKey(){
        return get_option($this->getId() . "-secret");
    }

    public function getPublicRecaptchaKey(){
        return get_option($this->getId() . "-public");
    }

}
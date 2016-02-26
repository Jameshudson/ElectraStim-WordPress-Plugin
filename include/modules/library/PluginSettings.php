<?php
/**
 * Created by IntelliJ IDEA.
 * User: Cyrex
 * Date: 11/02/2016
 * Time: 10:49
 */

namespace modules\library;


abstract class PluginSettings{

    const ENABLED = "enabled";
    const PAGE = "general";

    private $id;
    private $htmlName;
    private $name;

    public abstract function init();

    public function getName(){
        return $this->name;
    }

    public function setName($name=""){
        $this->name = $name;
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id=""){
        $this->id = $id;
    }

    public function getEnabled(){
        return get_option($this->htmlName, false);
    }

    public function superInit(){

        $this->htmlName = $this->getId() . "-enable";

        add_settings_section(
            $this->getId(), 
            $this->getName(), 
            array($this , "doSetting"), 
            $this::PAGE);

        add_settings_field(
            $this->htmlName, 
            $this->getName() . " enable", 
            array($this, "enablePlugin"), 
            $this::PAGE, 
            $this->getId(), 
            array("Check this option to enable " . $this->getName()));


        add_action("admin_init", array($this , "register"));
    }

    public function register(){

        register_setting($this::PAGE, $this->htmlName);
    }

    public function doSetting(){

        // settings_fields( $this->getId() );
        // do_settings_sections( $this->getId() );
    }

    public function enablePlugin($args){

        // echo "<p>option </p>" . get_option($this->htmlName);

        // Note the ID and the name attribute of the element match that of the ID in the call to add_settings_field
        echo '<input type="checkbox" id="'. $this->htmlName .'" name="'. $this->htmlName .'" value="1" ' . checked(1, get_option($this->htmlName), false) . '/>'; 
         
        echo'<label for="'. $this->htmlName .'"> '  . $args[0] . '</label>'; 
    }
}
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
        return get_option($this->id . "-enable");
    }

    public function superInit(){

        add_settings_section(
            $this->id,
            $this->name,
            array($this, "renderSettings"),
            $this::PAGE);

        //enable button.
        add_settings_field(
            $this->id . "-enable",
            $this->name . " enable",
            array($this, "customFieldSettings"),
            $this::PAGE,
            $this->id);

        register_setting(
            $this->id,
            $this->name . "-enable"
        );

        add_action("admin_menu", array($this, "doSetting"));
    }

    public function doSetting(){

        settings_fields($this->id . "-enable");
        do_settings_sections($this->id);
    }

    public function renderSettings($args){

    }

    public function customFieldSettings(){

        echo '<input type="checkbox" id="' . $this->name . '-enable" name="' . $this->name . '-enable" value="1" ' . checked(1, get_option($this->id . "-enable"), false) . '/>';
        echo '<label for="' . $this->name . "-enable" .'"> '  . "Enable " . $this->name . '</label>';
    }
}
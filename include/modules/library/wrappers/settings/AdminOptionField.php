<?php  

namespace modules\library\wrappers\settings;

class AdminOptionField{
	
	private $id = "";
	private $title = "";
	private $callback = "";
	private $page = "";
	private $section = "";

	private $sanitizeCallback = "";

	private $args = array();

	public function init(){

		add_settings_field($this->id, $this->title, $this->callback, $this->page, $this->page, $this->section, $this->args);
		register_setting($this->section, $this->id, $this->sanitizeCallback);
	}

	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getTitle(){
		return $this->title;
	}

	public function setTitle($title){
		$this->title = $title;
	}

	public function getCallback(){
		return $this->callback;
	}

	public function setCallback($callback){
		$this->callback = $callback;
	}

	public function getSanitizeCallback(){
		return $this->sanitizeCallback;
	}

	public function setSanitizeCallback($sanitizeCallback){
		$this->sanitizeCallback = $sanitizeCallback;
	}

	public function getPage(){
		return $this->page;
	}

	public function setPage($page){
		$this->page = $page;
	}

	public function getSection(){
		return $this->section;
	}

	public function setSection($section){
		$this->section = $section;
	}

	public function addMessage($message){
		$this->args[] = $message;
	}

}

?>
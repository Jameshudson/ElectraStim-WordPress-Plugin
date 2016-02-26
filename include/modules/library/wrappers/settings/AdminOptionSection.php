<?php  

namespace modules\library\wrappers\settings;

class AdminOptionSection{

	private $id = "";
	private $title = "";
	private $callback = "";
	private $page = "";

	private $optionFields = array();

	public function init(){
		
		add_settings_section($this->id, $this->title, $this->callback, $this->page);

		foreach ($this->optionFields as $option) {
			$option->setPage($this->page);
			$option->setSection($this->id);
			$option->init();
		}
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

	public function getPage(){
		return $this->page;
	}

	public function setPage($page){
		$this->page = $page;
	}

	public function addOptionField($optionFields){
		$this->optionFields[] = $optionFields;
	}
}

?>
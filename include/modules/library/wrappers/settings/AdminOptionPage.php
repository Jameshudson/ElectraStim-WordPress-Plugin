<?php 

namespace modules\library\wrappers\settings;

class AdminOptionPage{

	private $pageTitle = "";
	private $MenuTitle = "";
	private $capability = "";
	private $menuSlug = "";
	private $callback = "";

	private $optionSections = array();
	
	function __construct(){
		
		add_action("admin_menu", array($this, "init"));
	}

	public function init(){

		//adding the page.
		add_options_page($this->pageTitle,$this->MenuTitle,$this->capability,$this->menuSlug,$this->callback);

		foreach ($this->optionSections as $section) {
			$section->setPage($this->menuSlug);
			$section->init();
		}
	}

	//getters and setters
	public function getPageTitle(){
		return $this->pageTitle;
	}

	public function setPageTitle($pageTitle){
		$this->pageTitle = $pageTitle;
	}

	public function getMenuTitle(){
		return $this->menuTitle;
	}

	public function setMenuTitle($menuTitle){
		$this->menuTitle = $menuTitle;
	}

	public function getCapability(){
		return $this->pageTitle;
	}

	public function setCapability($capability){
		$this->capability = $capability;
	}

	public function getMenuSlug(){
		return $this->menuSlug;
	}

	public function setMenuSlug($menuSlug){
		$this->menuSlug = $menuSlug;
	}

	public function getCallback(){
		return $this->callback;
	}

	public function setCallback($callback){
		$this->callback = $callback;
	}

	public function addOptionSection($newOptionSection){
		$this->optionSections[] = $newOptionSection;
	}
}
?>
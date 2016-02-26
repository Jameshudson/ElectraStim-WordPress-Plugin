<?php 


namespace modules\library\wrappers\menu;

class AdminSubMenu{

	private $parentSlug;
	private $pageTitle;
	private $menuTitle;
	private $capability;
	private $menuSlug;
	private $callback;

	public function init(){

		add_submenu_page($this->parentSlug,
		                 $this->pageTitle,
		                 $this->menuTitle,
		                 $this->capability,
		                 $this->menuSlug,
		                 $this->callback);
	}

	//getters and setters
	public function getParentSlug(){
		return $this->parentSlug;
	}

	public function setParentSlug($parentSlug){
		$this->parentSlug = $parentSlug;
	}

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
		return $this->capability;
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

	public function getCallBack(){
		return $this->callback;
	}

	public function setCallBack($callback){
		$this->callback = $callback;
	}
}

?>
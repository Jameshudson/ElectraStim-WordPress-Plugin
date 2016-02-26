<?php  

namespace modules\library\wrappers\menu;

class AdminMenu {

	private $title = "";
	private $menuTitle = "";
	private $capability = "";
	private $menuSlug = "";
	private $callback = "";
	private $icon = "";
	private $position = 0;

	private $subMenus = array();
	
	function __construct(){
		
		add_action("admin_menu", array($this, "init"));
	}

	public function init(){

		add_menu_page ($this->title, $this->menuTitle, $this->capability, $this->menuSlug, $this->callback, $this->icon, $this->position);

		foreach ($this->subMenus as $subMenu) {
			$subMenu->setParentSlug($this->menuSlug);
			$subMenu->init();
		}
	}

	//getters and setters
	public function getTitle(){
		return $this->title;
	}

	public function setTitle($title){
		$this->title = $title;
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

	public function getIcon(){
		return $this->icon;
	}

	public function setIcon($icon){
		$this->icon = $icon;
	}

	public function getPosition(){
		return $this->position;
	}

	public function setPosition($position){
		$this->position = $position;
	}

	public function getSubMenu(){
		return $this->subMenus;
	}

	public function addSubMenu($menu){

		if($menu instanceof AdminSubMenu){

			$this->subMenus[] = $menu;
		}
	}
}

?>
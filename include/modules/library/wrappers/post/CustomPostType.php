<?php  

namespace modules\library\wrappers\post;

class CustomPostType{

	private $name = "";

	private $public = false;
	private $hasArchive = false;
	private $showUi = false;

	private $support = array();

	private $rewrite = null;//CustomPostRewrite
	private $label = null;//CustomPostLabel
	
	function __construct(){

		$this->rewrite = new CustomPostLabel();
		$this->label = new CustomPostRewrite();
		
		add_action("init", array( $this, "init"));
	}

	public function init(){

		register_post_type(
			$this->name, 
			array(
			    'labels' => $this->label->getLabels(),
				'public' =>$this->public,
				'has_archive' => $this->hasArchive,
				'rewrite' => $this->rewrite->getLabels(),
				'show_ui' => $this->showUi,
				'supports' => $this->support));
	}

	//getters and setters.
	public function setName($name){
		$this->name = $name;
	}

	public function getName(){
		return $this->name;
	}

	public function getPublic(){
		return $this->public;
	}

	public function setPublic($isPublic=false){
		$this->public = $isPublic;
	}

	public function getHasArchive(){
		return $this->hasArchive;
	}

	public function setHasArchive($hasArchive=false){
		$this->hasArchive = $hasArchive;
	}

	public function addLabel($label=null){
		$this->label = $label;
	}

	public function getShowUi(){
		return $this->showUi;
	}

	public function setShowUi($showUi=false){
		$this->showUi = $showUi;
	}

	public function setSupport($support=array()){
		$this->support = $support;
	}

	public function getSupport(){
		return $this->support;
	}

	public function setRewrite($rewrite){
		$this->rewrite = $rewrite;
	}

	public function getRewrite(){
		return $this->rewrite;
	}

	public function setLabel($label){
		$this->label = $label;
	}

	public function getLabel(){
		return $this->label;
	}
}
?>
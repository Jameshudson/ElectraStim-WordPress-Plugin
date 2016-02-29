<?php  

namespace modules\library\wrappers\post;

class CustomPostLabel{

	private $name = "";
	private $singularName = "";

	//getters and setters
	public function getLabels(){

		$results = array();

		if($this->name !== ""){

			$results["name"] = $this->name;
		}

		if($this->singularName !== ""){

			$results['singular_name'] = $this->singularName;
		}
		
		return $results;
	}

	public getName(){
		return $this->name;
	}

	public setName($name=""){
		$this->name = $name;
	}

	public getSingelarName(){
		return $this->singularName;
	}

	public setSingularName($singularName=""){
		$this->singularName = $singularName;
	}
}
?>
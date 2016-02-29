<?php  

namespace modules\library\wrappers\post;

class CustomPostRewrite{

	private $slug;
	
	public function getLabels(){
		
		$results = array();

		if($this->slug !== ""){

			$results["slug"] = $this->slug;
		}
		
		return $results;
	}
}

?>
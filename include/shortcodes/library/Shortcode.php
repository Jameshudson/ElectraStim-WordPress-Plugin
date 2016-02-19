<?php 

/**
* 
*/

namespace shortcodes\library {

	defined('ABSPATH') or die('No script kiddies please!');

	class Shortcode{

		private $shortcodes = array();
		private $prefix;

		public function init($prefix = '')
		{
			$this->prefix = $prefix;

			foreach ($this->shortcodes as $key => $value) {
				add_shortcode($key, array($this, $value));
			}
		}

		public function add($name = '')
		{
			$this->shortcodes[$name] = $this->prefix . $name;
		}
	}
}

?>
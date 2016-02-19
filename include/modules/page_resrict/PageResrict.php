<?php  

/**
* 
*/

namespace modules\page_resrict{

	defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

	use modules\library\PluginSettings;

	class PageResrict{

		function __construct(){

			//adding settings.
			$setting = new Setting();
			add_action("admin_init", array($setting, "init"));

			//setting plugin name.
			$setting->setName("Page Resrict");
			$setting->setId("PAGE-RESRICT");

			//adding actions.
//			add_action("init", array($this, "page_restrict"));
		}

		public function page_restrict($value=''){

			$current_url = "https://".$_SERVER[HTTP_HOST].$_SERVER[REQUEST_URI];

			$redir_to = get_page_link(1783,false,false);//HOME

			$list_pages = array(get_page_link(124,false,false),//my account
				get_page_link(1752,false,false));//orders

			foreach ($list_pages as $url) {

				if($current_url == $url && is_user_logged_in() == false){

					wp_redirect( $redir_to );
					exit;
				}
			}
		}
	}
}

?>
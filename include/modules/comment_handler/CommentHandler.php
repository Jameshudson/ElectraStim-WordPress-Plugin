<?php

/**
* 
*/

namespace modules\comment_handler{

    defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

    class CommentHandler{

        function __construct(){

            $setting = new Setting();
            add_action("admin_init", array($setting, "init"));

            //setting plugin name.
            $setting->setName("Commant Handler");
            $setting->setId("COMMANT_HANDLER");

            //adding actions.
            add_action("comment_form_defaults", array($this, "default_comment_handler"));
        }

        public function default_comment_handler($fields){

            $url = get_page_link(124, false, false);

            $fields['must_log_in'] = sprintf(
                __( '<p class="must-log-in">
                 You must <a href="'. $url .'">Register</a> or
                 <a href="'. $url .'">Login</a> to post a comment.</p>'
                ),
                wp_registration_url(),
                wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
            );
            return $fields;
        }
    }
}

?>
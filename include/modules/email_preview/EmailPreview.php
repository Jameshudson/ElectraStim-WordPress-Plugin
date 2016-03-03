<?php

namespace modules\email_preview;

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

/**
* 
*/
class EmailPreview{
	
	function __construct(){
		
		 add_action('wp_ajax_previewemail', 'previewEmail');
	}

	function previewEmail() {

    if (is_admin()) {

        $default_path = WC()->plugin_path() . '/templates/';

        $files = scandir($default_path . 'emails');
        $exclude = array( '.', '..', 'email-header.php', 'email-footer.php','plain' );
        $list = array_diff($files,$exclude);

        ?>

        <form method="get" action="<?php echo site_url(); ?>/wp-admin/admin-ajax.php">
            <input type="hidden" name="order" value="<?php echo (isset($_GET["order"])) ? $_GET["order"] : ''; ?>">
            <input type="hidden" name="action" value="previewemail">
            <select name="file">
        <?php
        	foreach( $list as $item ){ ?>
            	<option value="<?php echo $item; ?>"><?php echo str_replace('.php', '', $item); ?></option>
        <?php } ?>
            </select><input type="submit" value="Go"></form>

        <?php

        global $order;
        $order = new WC_Order($_GET['order']);
        wc_get_template( 'emails/email-header.php', array( 'order' => $order ) );


        wc_get_template( 'emails/'.$_GET['file'], array( 'order' => $order ) );
        wc_get_template( 'emails/email-footer.php', array( 'order' => $order ) );

	    }
	    return null; 
	}
}

?>
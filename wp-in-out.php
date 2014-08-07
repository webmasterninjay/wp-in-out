<?php
/**
 * Plugin Name: WP In or Out
 * Plugin URI: http://webmasterninja.wordpress.com/
 * Description: Display certain content for logged and logged out user.
 * Version: 1.0.1
 * Author: Jayson Antipuesto
 * Author URI: http://webmasterninja.wordpress.com/
 */


// For logged in user 
add_shortcode('user','wp_io_user');
function wp_io_user( $att, $content = null ) {

 	global $post;

 	 if ( is_user_logged_in() ) {

 	 	$output = '<div class="wp_io_user">'. $content . '</div>';

 	 	return $output;
 	 }
}


// For not log out user or guest
add_shortcode('guest','wp_io_guest');
function wp_io_guest( $atts, $content ) {

	if ( !is_user_logged_in() ) {

 	 	$output = '<div class="wp_io_guest">'. $content . '</div>';

 	 	return $output;
	}
}


// HTML editor quicktags for shortcodes.
function wp_io_add_quicktags() {
    if (wp_script_is('quicktags')){
?>
    <script type="text/javascript">
    QTags.addButton( 'wp_io_user', 'wp io user', '[user]', '[/user]', 'wp io user', 'User tag' );
    QTags.addButton( 'wp_io_guest', 'wp io guest', '[guest]', '[/guest]', 'wp io guest', 'Guest tag');
    </script>
<?php
    }
}
add_action( 'admin_print_footer_scripts', 'wp_io_add_quicktags' );

?>
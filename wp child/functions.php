<?php

// be sure to call the parent css file too
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );
function enqueue_parent_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}

// custom admin login logo
function custom_login_logo() {
	echo '<style type="text/css">
	h1 a { background-image: url(http://clark.webdesignboise.us/wp-content/uploads/2014/12/ClarkDevelopemtnLogo.jpg.jpeg) !important; }
	</style>';
}
add_action('login_head', 'custom_login_logo');

// footer info
function remove_footer_admin() {
	echo ' | &copy;2015 - Web Design Idaho |';
}

add_filter('admin_footer_text', 'remove_footer_admin');

// dashboard widgets
function wpc_dashboard_widget_function() {
	echo "<ul><li>Release Date: April 15, 2015</li><li>Developer: Richard Tuttle</li><li>Provider: Northwind Computers, Inc.</li></ul><p>Need help? <a href='https://northwind.us/support/'>GET SUPPORT</a>";
}

function wpc_add_dashboard_widgets() {
	wp_add_dashboard_widget('wp_dashboard_widget', 'Technical Information', 'wpc_dashboard_widget_function');
}
add_action('wp_dashboard_setup', 'wpc_add_dashboard_widgets');

add_action('wp_dashboard_setup', 'wpc_dashboard_widgets');
function wpc_dashboard_widgets() {
	global $wp_meta_boxes;
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
}

?>
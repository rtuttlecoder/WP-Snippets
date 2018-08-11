// custom admin login header logo
function my_custom_login_logo() {
	echo '';
}

add_action('login_head', 'my_custom_login_logo');


// custom admin login logo link
function change_wp_login_url() {
	echo bloginfo('url'); // or echo own url
}

add_filter('login_headerurl', 'change_wp_login_url');

// custom admin login logo and alt text
function change_wp_login_title() {
	echo get_option('blogname'); // or echo own alt text
}

add_filter('login_headertitle', 'change_wp_login_text');

// remove meta boxes from dashboard for all users
function example_remove_dashboard_widgets() {
	$wp_meta_boxes;
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
}

add_action('wp_dashboard_setup', 'example_remove_dashboard_widgets');


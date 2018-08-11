<?php
/**
 * Auto create pages and insert content upon theme activation
 *
 */

 wp_register_theme_activation_hook('twentyten', 'wpse_25885_theme_activate');
wp_register_theme_deactivation_hook('twentyten', 'wpse_25885_theme_deactivate');

/**
 *
 * @desc registers a theme activation hook
 * @param string $code : Code of the theme. This can be the base folder of your theme. Eg if your theme is in folder 'mytheme' then code will be 'mytheme'
 * @param callback $function : Function to call when theme gets activated.
 */
function wp_register_theme_activation_hook($code, $function) {
    $optionKey="theme_is_activated_" . $code;
    if(!get_option($optionKey)) {
        call_user_func($function);
        update_option($optionKey , 1);
    }
}

/**
 * @desc registers deactivation hook
 * @param string $code : Code of the theme. This must match the value you provided in wp_register_theme_activation_hook function as $code
 * @param callback $function : Function to call when theme gets deactivated.
 */
function wp_register_theme_deactivation_hook($code, $function)
{
    // store function in code specific global
    $GLOBALS["wp_register_theme_deactivation_hook_function" . $code]=$function;

    // create a runtime function which will delete the option set while activation of this theme and will call deactivation function provided in $function
    $fn=create_function('$theme', ' call_user_func($GLOBALS["wp_register_theme_deactivation_hook_function' . $code . '"]); delete_option("theme_is_activated_' . $code. '");');

    // add above created function to switch_theme action hook. This hook gets called when admin changes the theme.
    // Due to wordpress core implementation this hook can only be received by currently active theme (which is going to be deactivated as admin has chosen another one.
    // Your theme can perceive this hook as a deactivation hook.)
    add_action("switch_theme", $fn);
}

function wpse_25885_theme_activate()
{
    $default_pages = array(
        array(
            'title' => 'Home',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum consequat, orci ac laoreet cursus, dolor sem luctus lorem, eget consequat magna felis a magna. Aliquam scelerisque condimentum ante, eget facilisis tortor lobortis in. In interdum venenatis justo eget consequat. Morbi commodo rhoncus mi nec pharetra. Aliquam erat volutpat. Mauris non lorem eu dolor hendrerit dapibus. Mauris mollis nisl quis sapien posuere consectetur. Nullam in sapien at nisi ornare bibendum at ut lectus. Pellentesque ut magna mauris. Nam viverra suscipit ligula, sed accumsan enim placerat nec. Cras vitae metus vel dolor ultrices sagittis.'
            ),
        array(
            'title' => 'Contact',
            'content' => 'Duis venenatis augue sed risus laoreet congue ac ac leo. Donec fermentum accumsan libero sit amet iaculis. Duis tristique dictum enim, ac fringilla risus bibendum in. Nunc ornare, quam sit amet ultricies gravida, tortor mi malesuada urna, quis commodo dui nibh in lacus. Nunc vel tortor mi. Pellentesque vel urna a arcu adipiscing imperdiet vitae sit amet neque. Integer eu lectus et nunc dictum sagittis. Curabitur commodo vulputate fringilla. Sed eleifend, arcu convallis adipiscing congue, dui turpis commodo magna, et vehicula sapien turpis sit amet nisi.'
            )
    );
    $existing_pages = get_pages();
    $existing_titles = array();

    foreach ($existing_pages as $page) 
    {
        $existing_titles[] = $page->post_title;
    }

    foreach ($default_pages as $new_page) 
    {
        if( !in_array( $new_page['title'], $existing_titles ) )
        {
            // create post object
            $add_default_pages = array(
                'post_title' => $new_page['title'],
                'post_content' => $new_page['content'],
                'post_status' => 'publish',
                'post_type' => 'page'
              );

            // insert the post into the database
            $result = wp_insert_post($add_default_pages);   
        }
    }
}

function wpse_25885_theme_deactivate() 
{
   // code to execute on theme deactivation
}
?>
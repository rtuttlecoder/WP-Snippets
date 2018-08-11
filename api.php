<?php

// FILEDS - individual options that appear on menu pages, a value stored in WP db
add_settings_field function
	// ID ... is used to save/retrieve value
	// TITLE ... gives field a title on admin page
	// CALLBACK ... name of the function used to render interface element
	// PAGE ... identifies which page the option should reside
	// SECTION ... references to section created with the add_settings_function (optional)
	// ARGUMENTS ... an array that is passed to the callback function (optional)

// SECTIONS - grouping of fields
add_settings_section function
	// ID ... a unique identifier for the section
	// TITLE ... displayed at the top of the page in WP Dashboard
	// CALLBACK ... the name of the function that will render text to the screen for the function
	// PAGE ... value tells WP on which page the options will be displayed

// SETTINGS - registered after defining fields and sections, combo of the field to section it belongs
register_setting function
	// OPTION GOURP ... the name of the group of options, either existing or an ID we specify when creating the section
	// OPTION NAME ... the ID of the field we're registering
	// CALLBACK ... the name of the function that we be called prior to saving the data (optional)

// retrives value from WP database
get_option function
	// OPTION ID ... the ID of the field for the value trying to retrieve
	// DEFAULT OPTION ... the value returned is function returns an empty value (optional)

// creates menu page in WP Dashboard
add_menu_page function
	// PAGE TITLE ... text that appears at the top of the browser window
	// MENU TITLE ... text appears in the actual menu
	// CAPABILITY ... which users have access to the menu
	// MENU SLUG ... a unique identifier in context of WP and refers to the page that displays the options associated with the menu
	// CALLBACK ... the function that defines the content displayed on the page for the menu
	// ICON URL ... path to the icon displayed next to the menu item in WP menu
	// POSITION ... defines the position where menu will reside in the list of WP menu items

// creates a sub-menu page off of parent menu
add_submenu_page function
	// PARENT SLUG ... the ID of the parent menu item
	// PAGE TITLE ... browser title rendered
	// MENU TITLE ... text of actual menu title 
	// CAPABILITY .... user role allowed to access
	// MENU SLUG ... unique identifier for the menu item
	// CALLBACK ... function used to render the menu's page to the screen

// allows inclusion of options in existing WP menus, adds directly to Plugins menu
add_plugins_page function
	// PAGE TITLE ... browser title text
	// MENU TITLE ... text of actual menu title
	// CAPABILITY .. user role allowed to access
	// MENU SLUG ... unique identifier for the menu item
	// CALLBACK ... the function used to render the menu's page to screen

// allows inclusion of options in WP Appearance menu
add_theme_page function
	// PAGE TITLE
	// MENU TITLE
	// CAPABILITY
	// MENU SLUG
	// CALLBACK


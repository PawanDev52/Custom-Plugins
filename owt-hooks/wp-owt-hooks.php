<?php

/**
 * Plugin Name: OWT WP HOOKS
 * Description: This plugin is for demonstration of WP Hooks
 * Author: Pawan Sharma
 * Author URI: https://github.com/PawanDev52
 */

 /*

 function owt_wp_init(){

    $args = array(
        'public' => true,
        'label' => 'OWT Hooks'
    );
    register_post_type('owt_hook', $args);
 }

//  add_action("init", "owt_wp_init");


// action hook - widgets_init
function owt_register_sidebar(){
    register_sidebar(array(
        'name' => __('OWT sidebar'),
        'id' => 'owt-sidebar-1',
        'description' => __('This is trial for widgets_init action hook'),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>'
    ));
}
// we are using this sidebar in the footer so check the code in the footer.php file also before uncommenting this action hook
// add_action("widgets_init", "owt_register_sidebar");


// action hook = admin_menu
function owt_custom_menu(){
    add_menu_page("OWT Playlist", "OWT playlist", "manage_options", "owt-playlist", "owt_plylist_fn");
    add_submenu_page("owt-playlist", "Submenu 1", "Submenu 1", "manage_options", "submenu-1", "owt_submenu_1_fn");
}

function owt_plylist_fn(){
    echo "This is our admin menu page";
}

function owt_submenu_1_fn(){
    echo "This is our first submenu page";
}

// add_action("admin_menu", "owt_custom_menu");


// action hook - admin_enqueue_scripts & wp_enqueue_scripts
function owt_attach_assets_to_admin(){
    // functions for adding css and js files
    wp_enqueue_style("owt-css", plugin_dir_url(__FILE__) . "assets/css/owt-admin.css"); 
    wp_enqueue_script("owt-js", plugin_dir_url(__FILE__) . "assets/js/owt-admin.js"); 
}

// add_action("admin_enqueue_scripts", "owt_attach_assets_to_admin");

function owt_attach_assets_to_front(){
    // functions for adding css and js files
    wp_enqueue_style("owt-css", plugin_dir_url(__FILE__) . "assets/css/owt-front.css"); 
    wp_enqueue_script("owt-js", plugin_dir_url(__FILE__) . "assets/js/owt-front.js"); 
}

// add_action("wp_enqueue_scripts", "owt_attach_assets_to_front");

*/
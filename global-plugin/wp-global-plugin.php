<?php

/**
 * Plugin name: Global Plugin
 * Author: Pawan
 * Description: This is a custom plugin for global variables
 */

// commenting all code

// function wp_global_attach_menu()
// {

//     add_menu_page("Global OWT", "Global OWT", "manage_options", "global-menu", "wpl_fn_global_menu");
// }

// function wpl_fn_global_menu()
// {
//     // echo "<h2>Welcome here!</h2>";
//     // global $wpdb, $wp_locale, $wp_roles, $wp_registered_sidebars;
//     // echo "<pre>";
//     // print_r($wp_registered_sidebars);

//     // $wpdb global parameter
//     global $wpdb;

//     // get_var()
//     /* $post_title = $wpdb->get_var(
//         "SELECT post_title from wp_posts where ID = 2"
//     );

//     echo "Post title for ID 2 is " . $post_title; */

//     // get_row()
//     /* $post_row = $wpdb->get_row(
//         // "SELECT * from wp_posts where ID = 2"
//         $wpdb->prepare(
//             "SELECT * from wp_posts where ID = %d", 2
//         ), ARRAY_A
//     );
//     echo "<pre>";
//     print_r($post_row); */

//     // get_results()
//     /* $post_arrays = $wpdb->get_results(
//         "SELECT * from wp_posts where ID IN (2,3,4)", ARRAY_A
//     );
//     echo "<pre>";
//     print_r($post_arrays); */

//     // $pagenow
//     global $pagenow, $submenu, $current_user;

//     // echo "<h2>Current php file: " . $pagenow . "</h2>";
//     echo "<pre>";
//     // print_r($submenu);
//     print_r($current_user);
//     // echo $current_user->data->user_email;
// }

// add_action("admin_menu", "wp_global_attach_menu");


?>
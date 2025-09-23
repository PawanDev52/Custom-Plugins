<?php

/**
 * Plugin Name: Hello World
 * Description: This is a plugin which creates information widgets and admin notices in the admin dashboard.
 * Author: Pawan Sharma
 * Version: 1.0
 * Author URI: https://github.com/PawanDev52
 * Plugin URI: https://github.com/PawanDev52/Custom-Plugins
 */

/*
//  Admin Dashboard Notices
add_action("admin_notices", "hw_info_message");

function hw_show_message()
{
    echo '<div class="notice notice-success is-dismissible"><p>This is a success message</p></div>';
}

function hw_warning_message()
{
    echo '<div class="notice notice-warning is-dismissible"><p>This is a warning message</p></div>';
}

function hw_error_message()
{
    echo '<div class="notice notice-error is-dismissible"><p>This is an error message</p></div>';
}

function hw_info_message()
{
    echo '<div class="notice notice-info is-dismissible"><p>This is an information message</p></div>';
}


// Admin Dashboard Widgets
add_action("wp_dashboard_setup", "hw_dashboard_widget");

function hw_dashboard_widget()
{
    wp_add_dashboard_widget("hw_dashboard_widget", "Hw - Dashboard Widget", "hw_custom_widget");
}

function hw_custom_widget()
{
    echo 'This is a custom admin dashboard widget!';
}
*/
?>
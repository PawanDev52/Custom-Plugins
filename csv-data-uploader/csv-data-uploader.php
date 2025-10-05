<?php

/**
 * Plugin Name: CSV Data Uploader
 * Description: This is a plugin which upload CSV data to DB table
 * Author: Pawan Sharma
 * Version: 1.0
 * Author URI: https://github.com/PawanDev52
 * Plugin URI: https://github.com/PawanDev52/Custom-Plugins
 */

// define("CDU_PLUGIN_DIR_PATH", plugin_dir_path(__FILE__));

// add_shortcode("csv-data-uploader", "csv_uploader_form");

// function csv_uploader_form()
// {
//     // start buffer
//     ob_start();
//     include_once CDU_PLUGIN_DIR_PATH . "./template/cdu_form.php";

//     // get buffer content
//     $template = ob_get_contents();

//     // end buffer
//     ob_end_clean();

//     return $template;
// }

// DB table creation on plugin activation
// register_activation_hook(__FILE__, "cdu_create_table");

// function cdu_create_table()
// {
//     global $wpdb;
//     $table_prefix = $wpdb->prefix;
//     $table_name = $table_prefix . "students_data";

//     $table_collate = $wpdb->get_charset_collate();

//     $sql_command = "
//         CREATE TABLE " . $table_name . " (
//             `id` int(11) NOT NULL AUTO_INCREMENT,
//             `name` varchar(50) DEFAULT NULL,
//             `email` varchar(50) DEFAULT NULL,
//             `age` int(5) DEFAULT NULL,
//             `phone` varchar(30) DEFAULT NULL,
//             `photo` varchar(120) DEFAULT NULL,
//             PRIMARY KEY (`id`)
//         ) " . $table_collate . " 
//     ";

//     require_once(ABSPATH . "/wp-admin/includes/upgrade.php");
// }

?>
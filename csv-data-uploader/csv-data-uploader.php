<?php

/**
 * Plugin Name: CSV Data Uploader
 * Description: This plugin will upload CSV data to DB table
 * Author: Pawan Sharma
 * Plugin URI: https://example.com/csv-data-uploader
 * Author URI: https://example.com
 */

//  define('CDU_PLUGIN_DIR_PATH', plugin_dir_path(__FILE__)); // define is used to define a constant

//  add_shortcode("csv-data-uploader", "cdu_display_uploader_form");
 
//  function cdu_display_uploader_form(){
//      // start PHP buffer
//      ob_start();
 
//      include_once CDU_PLUGIN_DIR_PATH . "/template/cdu_form.php"; // Put all contents into buffer
 
//      // read buffer
//      $template = ob_get_contents();
 
//      // clean buffer
//      ob_end_clean();
 
//      return $template;
//  }

// DB Table on Plugin Activation
// register_activation_hook(__FILE__, "cdu_create_table");

// function cdu_create_table(){
//     global $wpdb;
//     $table_prefix = $wpdb->prefix;
//     $table_name = $table_prefix . "students_data";

//     $table_collate = $wpdb->get_charset_collate();

//     $sql_command = "
//     CREATE TABLE `wp_students_data` (
//   `id` int(11) NOT NULL AUTO_INCREMENT,
//   `name` varchar(50) DEFAULT NULL,
//   `email` varchar(50) DEFAULT NULL,
//   `age` int(5) DEFAULT NULL,
//   `phone` varchar(30) DEFAULT NULL,
//   `photo` varchar(120) DEFAULT NULL,
//   PRIMARY KEY (`id`)
// ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci
//     ";
// }


?>
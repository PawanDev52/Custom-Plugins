<?php

/**
 * Plugin Name: Shortcode Plugin
 * Description: This is a plugin for creating shortcode
 * Author: Pawan Sharma
 * Version: 1.0
 * Author URI: https://github.com/PawanDev52
 * Plugin URI: https://github.com/PawanDev52/Custom-Plugins
 */

/*
commenting all the code as i am pushing it on github

// ShortCode with static data
add_shortcode("message", "sc_static_message"); // shortcode - [message]

function sc_static_message()
{
    return "<h4 style='color:orange; font-size:20px;'>Hello this is a static message using shortcode</h4>";
}

// ShortCode with parameters
// [student name="peter" email="peter@test.com"]

add_shortcode("student", "sc_student_parameter");

function sc_student_parameter($attributes)
{
    $attributes = shortcode_atts(array(
        "name" => "dummy name",
        "email" => "dummy email"
    ), $attributes, "student");

    return "<p style='color:blue;'><b>Student Data: </b> Name - " . $attributes['name'] . " , Email - " . $attributes['email'] . "</p>";
}

// shortcode with db operations
add_shortcode("list-posts", "sp_handle_list_posts_wp_query_class");

function sp_handle_list_posts()
{
    global $wpdb; // this is a global database object

    $table_prefix = $wpdb->prefix; // wp_
    $table_name = $table_prefix . "posts"; // wp_posts
    // $table_name = "wp_posts";

    // get post where post_type = post and post_status = publish

    $posts = $wpdb->get_results(
        "select post_title from {$table_name} where post_type='post' AND post_status='publish'"
    );

    if (count($posts) > 0) {
        $outerHtml = "<ul>";

        foreach ($posts as $post) {
            $outerHtml .= "<li>" . $post->post_title . "</li>";
        }

        $outerHtml .= "</ul>";

        return $outerHtml;
    }

    return "No post found";
}

function sp_handle_list_posts_wp_query_class($attributes)
{
    $attributes = shortcode_atts(array(
        "number" => 5
    ), $attributes, "list-posts");

    $query = new WP_Query(array(
        "posts_per_page" => $attributes['number'],
        "post_status" => "publish"
    ));

    if ($query->have_posts()) {

        $outerHtml = '<ul>';
        while ($query->have_posts()) {
            $query->the_post();
            $outerHtml .= '<li class="my_class"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></li>';
        }
        $outerHtml .= '</ul>';

        return $outerHtml;
    }

    return "No post found";
}
*/
?>
<?php

/**
 * Plugin Name: Shortcode Plugin
 * Description: This is a plugin for giving us idea about shortcode basics
 * Version: 1.0
 * Author: Pawan Sharma
 * Plugin URI: https://example.com/shortcode-plugin
 * Author URI: https://example.com/me
 */

/*
commenting all the code as i am pushing it on github

//  Basic shortcode
add_shortcode("message", "sp_show_static_message");

function sp_show_static_message()
{
    return "<p style='color:orange;font-size:28px;font-weight:700;text-align:center;'>Hello i am a simple short code message</p>"; // we have to use return here can't use echo here
}


// shortcode with parameters
add_shortcode("student", "sp_handle_student");

function sp_handle_student($attributes)
{
    $attributes = shortcode_atts(array(
        "name" => "Default Student",
        "email" => "Default Email"
    ), $attributes, "student");

    return "<h3 style='color:blue;'>Student Data: Name - " . $attributes['name'] . ", Email - " . $attributes['email'] . "</h3>";
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
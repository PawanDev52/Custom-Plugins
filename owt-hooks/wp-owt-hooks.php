<?php

/**
 * Plugin Name: OWT WP HOOKS
 * Description: This plugin is for demonstration of WP Hooks
 * Author: Pawan Sharma
 * Author URI: https://github.com/PawanDev52
 */

 /*

function owt_wp_init()
{

    $args = array(
        'public' => true,
        'label' => 'OWT Hooks'
    );
    register_post_type('owt_hook', $args);
}

//  add_action("init", "owt_wp_init");


// action hook - widgets_init
function owt_register_sidebar()
{
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
function owt_custom_menu()
{
    add_menu_page("OWT Playlist", "OWT playlist", "manage_options", "owt-playlist", "owt_plylist_fn");
    add_submenu_page("owt-playlist", "Submenu 1", "Submenu 1", "manage_options", "submenu-1", "owt_submenu_1_fn");
}

function owt_plylist_fn()
{
    echo "This is our admin menu page";
}

function owt_submenu_1_fn()
{
    echo "This is our first submenu page";
}

// add_action("admin_menu", "owt_custom_menu");


// action hook - admin_enqueue_scripts & wp_enqueue_scripts
function owt_attach_assets_to_admin()
{
    // functions for adding css and js files
    wp_enqueue_style("owt-css", plugin_dir_url(__FILE__) . "assets/css/owt-admin.css");
    wp_enqueue_script("owt-js", plugin_dir_url(__FILE__) . "assets/js/owt-admin.js");
}

// add_action("admin_enqueue_scripts", "owt_attach_assets_to_admin");

function owt_attach_assets_to_front()
{
    // functions for adding css and js files
    wp_enqueue_style("owt-css", plugin_dir_url(__FILE__) . "assets/css/owt-front.css");
    wp_enqueue_script("owt-js", plugin_dir_url(__FILE__) . "assets/js/owt-front.js");
}

// add_action("wp_enqueue_scripts", "owt_attach_assets_to_front");


// action hook - admin_bar_menu
function owt_custom_bar_menu($wp_admin_bar)
{
    // for adding menu and sub menu in the dashboard admin bar
    $args = array(
        "id" => "owt-blog",
        "title" => "Custom bar menu",
        "href" => "https://github.com/PawanDev52",
        "meta" => array(
            "class" => "owt-custom-blog",
            "target" => "_blank"
        )
    );

    $wp_admin_bar->add_node($args);

    $submenu1 = array(
        "id" => "owt-submenu1",
        "title" => "Google",
        "href" => "https:www.google.com",
        "parent" => "owt-blog"
    );

    $wp_admin_bar->add_node($submenu1);

    $submenu2 = array(
        "id" => "owt-submenu2",
        "title" => "Youtube",
        "href" => "https:www.youtube.com",
        "parent" => "owt-blog",
        "meta" => array(
            "target" => "_blank"
        )
    );

    $wp_admin_bar->add_node($submenu2);
}

// add_action("admin_bar_menu", "owt_custom_bar_menu", 999);


// action hook - admin_notices
function owt_admin_notice()
{
?>
    <div class="notice notice-error is-dismissible">
        <p>This is an error message</p>
    </div>
<?php
}

// add_action("admin_notices", "owt_admin_notice");


// action hook - add_meta_boxes
function owt_make_mbx()
{

    add_meta_box(
        'owt-mbx',
        'OWT Custom Box',
        'owt_mbx_fn',
        'post',
        'side',
        'high'
    );
}

function owt_mbx_fn($post)
{
    echo "This is a custom meta box";
?>
    <div>
        <label>Name</label>
        <input type="text" value="<?php echo get_post_meta($post->ID, "owt_mx_value", true); ?>" name="owt_mbx_name" placeholder="Enter Name">
    </div>
<?php
}

// add_action("add_meta_boxes", "owt_make_mbx");


// action hook - save_post  this hook is working with the above hook add_meta_boxes because it saves the data from that meta box input field
// add_action("save_post", "owt_save_mbx_value");

function owt_save_mbx_value($post_id)
{

    $owt_mbx_name = isset($_REQUEST['owt_mbx_name']) ? trim($_REQUEST['owt_mbx_name']) : "";

    if (!empty($owt_mbx_name)) {

        update_post_meta($post_id, "owt_mx_value", $owt_mbx_name);
    }
}


// action hook - login_enqueue_scripts
function owt_attach_assets_to_login_page()
{
    // functions for adding css and js files
    wp_enqueue_style("owt-css1", plugin_dir_url(__FILE__) . "assets/css/owt-login.css");
    wp_enqueue_script("owt-js1", plugin_dir_url(__FILE__) . "assets/js/owt-login.js");
}

// add_action("login_enqueue_scripts", "owt_attach_assets_to_login_page");


// action hook - wp_head & wp_footer
function owt_head_file_css()
{

    echo '<link rel="stylesheet" href="' . plugin_dir_url(__FILE__) . 'assets/css/header_owt.css" />';
}

// add_action("wp_head", "owt_head_file_css");

function owt_footer_file_js()
{

    echo '<script src="' . plugin_dir_url(__FILE__) . 'assets/js/footer_owt.js"></script>';
}

// add_action("wp_footer", "owt_footer_file_js");


// action hook - login_form
function owt_login_input_form()
{
    $txtname = isset($_POST['txtName']) ? $_POST['txtName'] : "";
    $txtphone = isset($_POST['txtPhone']) ? $_POST['txtPhone'] : "";
?>
    <p>
        <label for="txtName">Name</label>
        <input type="text" name="txtName" class="input" size="25" value="<?php echo $txtname; ?>" />
    </p>
    <p>
        <label for="textPhone">Phone No</label>
        <input type="text" name="txtPhone" class="input" size="25" value="<?php echo $txtphone; ?>" />
    </p>
<?php
}

add_action("login_form", "owt_login_input_form");


// action hook - login_head  -- this hook is working with the above hook
function owt_extra_fields_error_messages()
{

    global $error;

    if (empty($_POST['txtName'])) {
        $error = "Name should not be empty";
    }

    if (empty($_POST['txtPhone'])) {
        $error .= "<br>Phone no. should not be empty";
    }
}

add_action("login_head", "owt_extra_fields_error_messages");


// action hook - wp_login -- this hook also works with the above 2 hooks
function owt_fetch_all_login_data()
{

    print_r($_REQUEST);
    die;
}

// add_action("wp_login", "owt_fetch_all_login_data");


// filter hooks - the_title
function owt_filter_title($title)
{

    return "owt-updated-" . $title;
}

// add_filter("the_title", "owt_filter_title");


// filter hook - the_content
function owt_filter_content($content)
{

    return "The content is - " . $content . " here it ends.";
}

add_filter("the_content", "owt_filter_content");


// filter hook - login_headerurl, login_headertitle, login_url
function owt_update_login_logo_url($url)
{
    return "https://www.google.com";
}

// add_filter("login_headerurl", "owt_update_login_logo_url");


function owt_update_login_logo_title()
{
    return "Master Custom Themes";
}

// add_filter("login_headertitle", "owt_update_login_logo_title");


function owt_update_login_url($login_url, $redirect)
{

    return home_url("/custom-login-page/?redirect_to=" . $redirect);
}

// add_filter("login_url", "owt_update_login_url", 10, 2);

// echo wp_login_url(); // used to return the wp login page url


// filter hook - logout_url & lostpassword_url
function owt_update_logout_url($logout_url, $redirect)
{
    return home_url("/custom-logout-page/?redirect_to=" . $redirect);
}

// add_filter("logout_url", "owt_update_logout_url", 10, 2);

function owt_update_lost_url($lostpassword_url, $redirect)
{

    return home_url("/custom-lostpassword_url/?redirect_to=" . $redirect);
}

// add_filter("lostpassword_url", "owt_update_lost_url", 10, 2);

function owt_get_links()
{

    echo '<a href="' . wp_logout_url(get_permalink()) . '">Logout URL</a>';
    echo "<br>";
    echo '<a href="' . wp_lostpassword_url() . '">Lost Password URL</a>';
}
// wp_lostpassword_url() this function is used to return the lost password url
// wp_logout_url this function is used to return the logout url

// this action hook is also working with the above 2 filter hooks 
// add_action("init", "owt_get_links");


// filter hook - manage_{post_type}_posts_columns
function codex_custom_init()
{
    $args = array(
        'public' => true,
        'label' => 'Books'
    );
    register_post_type('book', $args);
}

add_action('init', 'codex_custom_init');
// in the above action hook we have created a custom post type

*/
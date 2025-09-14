<?php

/**
 * Plugin Name: PBD WP HOOKS
 * Description: This plugin is for demonstration of WP Hooks
 * Author: Pawan Sharma
 * Author URI: https://github.com/PawanDev52
 */

// commenting all code as pushing it on github

/*
error_reporting(E_ALL);
ini_set('display_errors', 1);

define("OWT_HOOK_PLUGIN_BASENAME", plugin_basename(__FILE__));


// 1. action hook - init
function pbd_wp_init()
{
    $args = array(
        'public' => true,
        'label' => 'PBD Hooks'
    );
    register_post_type('pbd_hook', $args);
}

// add_action("init", "pbd_wp_init");

// with the above function and action we are registering a custom post type
// init fired a function when wordpress initialize


// 2. action hook - widgets_init
// widgets_init hook is used to register widgets
// we are using this sidebar in the footer so check the code in the footer.php file also before uncommenting this action hook

function pbd_register_sidebar(){
    register_sidebar(array(
        'name' => __('PBD sidebar'),
        'id' => 'pbd-sidebar-1',
        'description' => __('This is trial for widgets_init action hook'),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>'
    ));
}

// add_action("widgets_init", "pbd_register_sidebar");


// 3. action hook = admin_menu
// with this action hook we can create admin menu page and sub menu pages which we can see in the dashboard panel
function pbd_custom_menu()
{
    add_menu_page("PBD Playlist", "PBD playlist", "manage_options", "pbd-playlist", "pbd_plylist_fn");
    add_submenu_page("pbd-playlist", "Submenu 1", "Submenu 1", "manage_options", "submenu-1", "pbd_submenu_1_fn");
}

function pbd_plylist_fn()
{
    echo "This is our admin menu page";
}

function pbd_submenu_1_fn()
{
    echo "This is our first submenu page";
}

// add_action("admin_menu", "pbd_custom_menu");


// 4. action hook - admin_enqueue_scripts & wp_enqueue_scripts
// admin_enqueue_scripts - this action hook is used for adding css and js files at the admin section
// wp_enqueue_scripts - this action hook is used for adding css and js files to the front end view

// function pbd_attach_assets_to_admin()
// {
//     // functions for adding css and js files
//     wp_enqueue_style("pbd-css", plugin_dir_url(__FILE__) . "assets/css/pbd-admin.css");
//     wp_enqueue_script("pbd-js", plugin_dir_url(__FILE__) . "assets/js/pbd-admin.js");
// }

// add_action("admin_enqueue_scripts", "pbd_attach_assets_to_admin");

// for adding css and js files to the front end view
// function pbd_attach_assets_to_front()
// {
//     // functions for adding css and js files
//     wp_enqueue_style("pbd-css", plugin_dir_url(__FILE__) . "assets/css/pbd-front.css");
//     wp_enqueue_script("pbd-js", plugin_dir_url(__FILE__) . "assets/js/pbd-front.js");
// }

// add_action("wp_enqueue_scripts", "pbd_attach_assets_to_front");


// 5. action hook - admin_bar_menu
// this action hook is used for adding menu and sub menu in the top of dashboard admin bar
function pbd_custom_bar_menu($wp_admin_bar)
{
    $args = array(
        "id" => "pbd-blog",
        "title" => "Custom bar menu",
        "href" => "https://github.com/PawanDev52",
        "meta" => array(
            "class" => "pbd-custom-blog",
            "target" => "_blank"
        )
    );

    $wp_admin_bar->add_node($args);

    $submenu1 = array(
        "id" => "pbd-submenu1",
        "title" => "Google",
        "href" => "https:www.google.com",
        "parent" => "pbd-blog"
    );

    $wp_admin_bar->add_node($submenu1);

    $submenu2 = array(
        "id" => "pbd-submenu2",
        "title" => "Youtube",
        "href" => "https:www.youtube.com",
        "parent" => "pbd-blog",
        "meta" => array(
            "target" => "_blank"
        )
    );

    $wp_admin_bar->add_node($submenu2);
}

// add_action("admin_bar_menu", "pbd_custom_bar_menu", 999);


// 6. action hook - admin_notices
// this action hook is used for showing notices in the admin dashboard
function pbd_admin_notice()
{
?>
    <div class="notice notice-error is-dismissible">
        <p>This is an error message</p>
    </div>
<?php
}

// add_action("admin_notices", "pbd_admin_notice");


// 7. action hook - add_meta_boxes
// this action hook is used for adding custom meta boxes, when you edit a post then at the right side you can see meta boxes
function pbd_make_mbx()
{

    add_meta_box(
        'pbd-mbx',
        'PBD Custom Box',
        'pbd_mbx_fn',
        'post',
        'side',
        'high'
    );
}

function pbd_mbx_fn($post)
{
    echo "This is a custom meta box";
?>
    <div>
        <label>Name</label>
        <input type="text" value="<?php echo get_post_meta($post->ID, "pbd_mx_value", true); ?>" name="pbd_mbx_name" placeholder="Enter Name">
    </div>
<?php
}

// add_action("add_meta_boxes", "pbd_make_mbx");


// 8. action hook - save_post
// this hook is working with the above hook add_meta_boxes because it saves the data from that meta box input field
// add_action("save_post", "pbd_save_mbx_value");

function pbd_save_mbx_value($post_id)
{

    $pbd_mbx_name = isset($_REQUEST['pbd_mbx_name']) ? trim($_REQUEST['pbd_mbx_name']) : "";

    if (!empty($pbd_mbx_name)) {

        update_post_meta($post_id, "pbd_mx_value", $pbd_mbx_name);
    }
}


// 9. action hook - login_enqueue_scripts
// this action hook is used for loading css and js on the login page
function pbd_attach_assets_to_login_page()
{
    // functions for adding css and js files
    wp_enqueue_style("pbd-css1", plugin_dir_url(__FILE__) . "assets/css/pbd-login.css");
    wp_enqueue_script("pbd-js1", plugin_dir_url(__FILE__) . "assets/js/pbd-login.js");
}

// add_action("login_enqueue_scripts", "pbd_attach_assets_to_login_page");


// 10. action hook - wp_head & wp_footer
// this action hook is used for adding files inside the head tag
function pbd_head_file_css()
{

    echo '<link rel="stylesheet" href="' . plugin_dir_url(__FILE__) . 'assets/css/header_pbd.css" />';
}

// add_action("wp_head", "pbd_head_file_css");

// this action hook is used for adding files inside the footer
function pbd_footer_file_js()
{

    echo '<script src="' . plugin_dir_url(__FILE__) . 'assets/js/footer_pbd.js"></script>';
}

// add_action("wp_footer", "pbd_footer_file_js");


// 11. action hook - login_form
// this action hook is used for adding custom input fields to the login page form
function pbd_login_input_form()
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

// add_action("login_form", "pbd_login_input_form");


// 12. action hook - login_head  -- this hook is working with the above hook
// this action hooks runs before the login form processed completely
function pbd_extra_fields_error_messages()
{

    global $error;

    if (empty($_POST['txtName'])) {
        $error = "Name should not be empty";
    }

    if (empty($_POST['txtPhone'])) {
        $error .= "<br>Phone no. should not be empty";
    }
}

// add_action("login_head", "pbd_extra_fields_error_messages");


// 13. action hook - wp_login -- this hook also works with the above 2 hooks
// this action hooks run when used logged in successfully
function pbd_fetch_all_login_data()
{

    print_r($_REQUEST);
    die;
}

// add_action("wp_login", "pbd_fetch_all_login_data");


// 14. filter hooks - the_title
// this filter hook is used for the title before showing, now updating the title on all pages
function pbd_filter_title($title)
{

    return "pbd-updated-" . $title;
}

// add_filter("the_title", "pbd_filter_title");


// 15. filter hook - the_content
function pbd_filter_content($content)
{

    return "The content is - " . $content . " here it ends.";
}

// add_filter("the_content", "pbd_filter_content");


// 16. filter hook - login_headerurl, login_headertitle, login_url
// these filter hooks are used for updating the logo url and the title text and change the login page url
function pbd_update_login_logo_url($url)
{
    return "https://www.google.com";
}

// add_filter("login_headerurl", "pbd_update_login_logo_url");


function pbd_update_login_logo_title()
{
    return "Master Custom Themes";
}

// add_filter("login_headertitle", "pbd_update_login_logo_title");


function pbd_update_login_url($login_url, $redirect)
{

    return home_url("/custom-login-page/?redirect_to=" . $redirect);
}

// add_filter("login_url", "pbd_update_login_url", 10, 2);

// echo wp_login_url(); // used to return the wp login page url


// 17. filter hook - logout_url & lostpassword_url
// these filter hooks are used for modifying the urls of logout and lostpassword
function pbd_update_logout_url($logout_url, $redirect)
{
    return home_url("/custom-logout-page/?redirect_to=" . $redirect);
}

// add_filter("logout_url", "pbd_update_logout_url", 10, 2);

function pbd_update_lost_url($lostpassword_url, $redirect)
{

    return home_url("/custom-lostpassword_url/?redirect_to=" . $redirect);
}

// add_filter("lostpassword_url", "pbd_update_lost_url", 10, 2);

function pbd_get_links()
{

    echo '<a href="' . wp_logout_url(get_permalink()) . '">Logout URL</a>';
    echo "<br>";
    echo '<a href="' . wp_lostpassword_url() . '">Lost Password URL</a>';
}
// wp_lostpassword_url() this function is used to return the lost password url
// wp_logout_url this function is used to return the logout url

// this action hook is also working with the above 2 filter hooks 
// add_action("init", "pbd_get_links");


// 18. filter hook - manage_{post_type}_posts_columns
// first we have created a custom post type then with the filter hook we have made custom columns for custom post types
function codex_custom_init()
{
    $args = array(
        'public' => true,
        'label' => 'Books'
    );
    register_post_type('book', $args);
}

// add_action('init', 'codex_custom_init');
// in the above action hook we have created a custom post type

function pbd_add_custom_clmns_book($columns)
{

    // add custom columns to book custom post type

    $columns = array(
        "cb" => "<input type='checkbox'>",
        "title" => "Book Title",
        "author" => "Book author",
        "amount" => "Book amount",
        "book_email" => "Book email",
        "date" => "Created date"
    );

    return $columns;
}
// syntax - add_filter("manage_{post_type}_posts_columns", "callback");
// add_filter("manage_book_posts_columns", "pbd_add_custom_clmns_book");

// action hook - manage_{post_type}_posts_custom_column
// adding values to the custom post type fields
function pbd_cpt_book_data($column_name, $post_id)
{

    // supply data for custom post type book
    switch ($column_name) {
        // case 'cb':
        //     echo '<input type="checkbox" name="book_row[]" />';
        //     break;
        // case 'title':
        //     echo 'Sample Title';
        //     break;
        // case 'author':
        //     echo 'Master Custom';
        //     break;
        case 'amount':
            echo 40;
            break;
        case 'book_email':
            echo 'example@gmail.com';
            break;
            // case 'date':
            //     echo date("Y-m-d");
            //     break;

            // i have commented few cases because wordpress provide by default from few of them
    }
}
// this action hook is working with the above filter hook
// syntax - add_action("manage_{post_type}_posts_custom_column", "callback", priority, arguments);
// add_action("manage_book_posts_custom_column", "pbd_cpt_book_data", 10, 2);


// 19. filter hook - "plugin_action_links_" . plugin_basename(__FILE__)
// ṭhis hook is used for adding action links like edit, activate, delete, setting in your plugin in the installed plugins
function pbd_add_other_plugin_links($links)
{

    // $list_table_plugin_url = admin_url("options-writing.php#classic-editor-options"); // i have added my own url here

    // $first_link = '<a href="' . $list_table_plugin_url . '">List Table Plugin</a>';

    $settings_link = admin_url("options-general.php?page=hook-settings-panel");

    $settings_anchor = '<a href="' . $settings_link . '">Settings</a>';

    array_push($links, $settings_anchor);

    // array_push($links, $first_link);

    return $links;
}

// add_filter("plugin_action_links_" . PBD_HOOK_PLUGIN_BASENAME, "pbd_add_other_plugin_links");

function pbd_register_settings_panel()
{

    add_submenu_page(
        "options-general.php",
        "Hook Settings",
        "Hook Settings",
        "manage_options",
        "hook-settings-panel",
        "pbd_hook_settings_panel_fn"
    );
}
// adding sub menu in the settings
// adding custom setting page for the plugin in the settings tab
// add_action("admin_menu", "pbd_register_settings_panel");

function pbd_hook_settings_panel_fn()
{
    echo "<h1>This is settings page of PBD hook plugin</h1>";
}


// 20. filter hook - template_include
// this filter hook is used for overriding default page templates
function pbd_include_portfolio_page($template)
{

    if (is_page("portfolio")) {
        $new_template = locate_template(array("portfolio-page-template.php"));

        if (!empty($new_template)) {
            return $new_template;
        }
    }

    if (is_page("services")) {
        $new_template = locate_template(array("service-page-template.php"));

        if (!empty($new_template)) {
            return $new_template;
        }
    }
}

// add_filter("template_include", "pbd_include_portfolio_page", 99);

*/
?>
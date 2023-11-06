<?php 

//Adding theme support
function gt_init(){
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'html5',
    array('comment-list','comment-form','search-form')
);

}
add_action('after_setup_theme','gt_init');

//custom pos type home content 


function custom_home_post_type() {
    $labels = array(
        'name' => 'Banner',
        'singular_name' => 'Banner',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Banner',
        'edit_item' => 'Edit Banner',
        'new_item' => 'New Home Content',
        'all_items' => 'All Banner',
        'view_item' => 'View Banner',
        'search_items' => 'Search Banner',
        'not_found' => 'No Banner found',
        'not_found_in_trash' => 'No Bannerfound in Trash',
        'menu_name' => 'Banner'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'supports' => array('title', '', ''),
        'capability_type' => 'post',
        'rewrite' => array('slug' => 'banner'),
        'menu_icon' => 'dashicons-flag',
    );

    register_post_type('home_content', $args);
}
add_action('init', 'custom_home_post_type');





//custom post type for message from director 
function create_message_post_type() {
    register_post_type('message', array(
        'labels' => array(
            'name' => 'Statement',
            'singular_name' => 'statement',
            'all_items' => 'Statements',
        ),
        'public' => true,
        'has_archive' => false,
        'supports' => array('title', ''),
        'menu_icon' => 'dashicons-format-status',
    ));
}
add_action('init', 'create_message_post_type');




//custom service 
function create_services_post_type() {
    register_post_type('services',
        array(
            'labels' => array(
                'name' => __('Services'),
                'singular_name' => __('Service'),
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array('title', 'editor', 'thumbnail','excerpt'),
            'menu_icon'=>'dashicons-block-default'
        )
    );
}
add_action('init', 'create_services_post_type');




// For Photo Gallery

function custom_image_post_type() {
    register_post_type('custom_images', array(
        'labels' => array(
            'name' => 'Gallery',
            'singular_name' => 'Custom Image',
        ),
        'public' => true,
        'has_archive' => false,
        'menu_icon' => 'dashicons-format-gallery',
        'supports' => array('title', 'thumbnail'),
    ));
}
add_action('init', 'custom_image_post_type');




if (!defined('CMB2_LOADED')) {
    require_once get_template_directory() . '/cmb2/init.php';
}

function custom_images_metaboxes() {
    $prefix = 'custom_images_gallery_';

    $cmb = new_cmb2_box(array(
        'id'           => 'custom_images_gallery_metabox',
        'title'        => 'Image Gallery',
        'object_types' => array('custom_images'),
    ));

    $cmb->add_field(array(
        'name' => 'Gallery Images',
        'id'   => $prefix . 'images',
        'type' => 'file_list',
        
    ));
}

add_action('cmb2_admin_init', 'custom_images_metaboxes');


//custom post type pricing




function create_pricing_post_type() {
    register_post_type('pricing',
        array(
            'labels' => array(
                'name' => __('Pricing'),
                'singular_name' => __('Pricing'),
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'pricing-plans'),
            'supports' => array('title',  'custom-fields'),
            'menu_icon'=>'dashicons-tag'
        )
    );
}
add_action('init', 'create_pricing_post_type');







//custom post type videos


function create_video_custom_post_type() {
    register_post_type('videos', array(
        'labels' => array(
            'name' => 'Videos',
            'singular_name' => 'Video',
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', ''),
        'menu_icon'=>'dashicons-video-alt3'
    ));
}
add_action('init', 'create_video_custom_post_type');






//custom team member post type 

function custom_team_post_type() {
    $labels = array(
        'name' => 'Teams',
        'singular_name' => 'Team Member',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Team Member',
        'edit_item' => 'Edit Team Member',
        'new_item' => 'New Team Member',
        'all_items' => 'All Team Members',
        'view_item' => 'View Team Member',
        'search_items' => 'Search Team Members',
        'not_found' => 'No team members found',
        'not_found_in_trash' => 'No team members found in Trash',
        'menu_name' => 'Teams'
    );
    
    $args = array(
        'labels' => $labels,
        'public' => true,
        'supports' => array('title'),
        'capability_type' => 'post',
        'rewrite' => array('slug' => 'team-members'),
        'menu_icon' => 'dashicons-groups',
    );
    
    register_post_type('team_member', $args);
}
add_action('init', 'custom_team_post_type');



//custom post type site inormation


// Register Custom Post Type
function custom_site_information_post_type() {
    $labels = array(
        'name' => 'Site Information',
        'singular_name' => 'Site Information',
        'menu_name' => 'Site Information',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Site Information',
        'edit_item' => 'Edit Site Information',
        'new_item' => 'New Site Information',
        'view_item' => 'View Site Information',
        'search_items' => 'Search Site Information',
        'not_found' => 'No Site Information found',
        'not_found_in_trash' => 'No Site Information found in Trash',
    );
    $args = array(
        'label' => 'Site Information',
        'description' => 'Site Information Description',
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-admin-site',
        'capability_type' => 'post',
        'hierarchical' => false,
        'supports' => array('title', '', ''),
        'has_archive' => true,
        'rewrite' => array('slug' => 'site-information'),
    );
    register_post_type('site_information', $args);
}
add_action('init', 'custom_site_information_post_type');







?>
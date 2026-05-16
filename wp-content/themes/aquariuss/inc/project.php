<?php
function theme_setup() {
    add_theme_support('title-tag');
}
add_action('after_setup_theme', 'theme_setup');

// https://developer.wordpress.org/resource/dashicons/#leftright
function create_project_post_type() {
    $labels = array(
        'name'                  => 'Project',
        'singular_name'         => 'Project',
        'menu_name'             => 'Project',
        'name_admin_bar'        => 'Project',
        'add_new'               => 'Add New',
        'add_new_item'          => 'Add New Project',
        'new_item'              => 'New Project',
        'edit_item'             => 'Edit Project',
        'view_item'             => 'View Project',
        'all_items'             => 'All Project',
        'search_items'          => 'Search Project',
        'not_found'             => 'No Project found.',
    );
  
    $args = array(
        'labels'                => $labels,
        'public'                => true,
        'publicly_queryable'    => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'query_var'             => true,
        'rewrite'               => array('slug' => 'project'),
        'capability_type'       => 'post',
        'has_archive'           => true,
        'hierarchical'          => false,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-store',  // Set icon cho CPT Project
        'supports'              => array('title', 'editor', 'thumbnail', 'excerpt'),
        // 'taxonomies'            => array('category'), // Thêm category vào CPT
    );
    register_post_type('project', $args);
}
add_action('init', 'create_project_post_type');

function create_project_taxonomy() {
    $labels = array(
        'name'              => 'Project Categories',
        'singular_name'     => 'Project Category',
        'search_items'      => 'Search Project Categories',
        'all_items'         => 'All Project Categories',
        'parent_item'       => 'Parent Category',
        'parent_item_colon' => 'Parent Category:',
        'edit_item'         => 'Edit Project Category',
        'update_item'       => 'Update Project Category',
        'add_new_item'      => 'Add New Project Category',
        'new_item_name'     => 'New Project Category Name',
        'menu_name'         => 'Project Categories',
    );
    
    $args = array(
        'hierarchical'      => true, // Phân cấp như category
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'project-category'),
    );
  
    register_taxonomy('project_category', array('project'), $args);
}
add_action('init', 'create_project_taxonomy', 0);
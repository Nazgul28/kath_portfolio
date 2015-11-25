<?php
/**
 * POST TYPES
 *
 * @link  http://codex.wordpress.org/Function_Reference/register_post_type
 */

 /**
  * Create "Product" post type
  */
 function kath_portfolio_register_project_post_type() {

   $slug = 'project';
   $name = 'Projects';
   $singular_name = 'Project';

   $labels = array(
     'name'                => $name, 'Post Type General Name',
     'singular_name'       => $singular_name, 'Post Type Singular Name',
     'menu_name'           => $name,
     'parent_item_colon'   => sprintf( 'Parent %s:', $singular_name ),
     'all_items'           => 'All ' . $name,
     'view_item'           => 'View ' . $singular_name,
     'add_new_item'        => 'Add New ' . $singular_name,
     'add_new'             => 'New ' . $singular_name,
     'edit_item'           => 'Edit ' . $singular_name,
     'update_item'         => 'Update ' . $singular_name,
     'search_items'        => 'Search ' . strtolower( $name ),
     'not_found'           => sprintf( 'No %s found', strtolower( $name ) ),
     'not_found_in_trash'  => sprintf( 'No %s found in Trash', strtolower( $name ) ),
   );

   $args = array(
     'description'         => 'UX designer porfolio projects',
     'labels'              => $labels,
     'supports'            => array( 'title', 'editor', 'author', 'thumbnail', 'revisions', ),
     'hierarchical'        => false,
     'public'              => true,
     'show_ui'             => true,
     'show_in_menu'        => true,
     'show_in_nav_menus'   => true,
     'show_in_admin_bar'   => true,
     'menu_position'       => 5,
     'menu_icon'           => 'dashicons-format-gallery',
     'can_export'          => true,
     'has_archive'         => 'work',
     'exclude_from_search' => false,
     'publicly_queryable'  => true,
     'capability_type'     => 'post',
   );

   register_post_type( $slug, $args );
 }
 add_action( 'init', 'kath_portfolio_register_project_post_type' );


<?php
/**
 * TAXONOMIES
 *
 * @link  http://codex.wordpress.org/Function_Reference/register_taxonomy
 */

 /**
  * Create "Product Type" Taxonomy
  */
 function kath_portfolio_register_project_type_taxonomy() {

   $slug = 'project-type';
   $name = 'Project Types';
   $singular_name = 'Project Type';

   $labels = array(
     'name'                       => $name, 'Taxonomy General Name',
     'singular_name'              => $singular_name, 'Taxonomy Singular Name',
     'menu_name'                  => $name,
     'all_items'                  => 'All ' . $name,
     'parent_item'                => 'Parent ' . $singular_name,
     'parent_item_colon'          => sprintf( 'Parent %s:', $singular_name ),
     'new_item_name'              => sprintf( 'New %s Name', $singular_name ),
     'add_new_item'               => 'Add New ' . $singular_name,
     'edit_item'                  => 'Edit ' . $singular_name,
     'update_item'                => 'Update ' . $singular_name,
     'separate_items_with_commas' => sprintf( 'Separate %s with commas', strtolower( $name ) ),
     'search_items'               => 'Search ' . strtolower( $name ),
     'add_or_remove_items'        => 'Add or remove ' . strtolower( $name ),
     'choose_from_most_used'      => 'Choose from the most used ' . strtolower( $name ),
   );

   $args = array(
     'labels'                     => $labels,
     'hierarchical'               => true,
     'public'                     => true,
     'query_var'                  => true,
     'show_ui'                    => true,
     'show_in_nav_menus'          => true,
     'show_admin_column'          => true,
   );

   register_taxonomy( $slug, array( 'project' ), $args );
 }

 add_action( 'init', 'kath_portfolio_register_project_type_taxonomy', 0 );

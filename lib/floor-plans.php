<?php
// Register Custom Post Type
function add_floor_plans() {

	$labels = array(
		'name'                  => _x( 'Floor Plans', 'Post Type General Name', 'ray' ),
		'singular_name'         => _x( 'Floor Plan', 'Post Type Singular Name', 'ray' ),
		'menu_name'             => __( 'Floor Plans', 'ray' ),
		'name_admin_bar'        => __( 'Floor Plan', 'ray' ),
		'archives'              => __( 'Item Archives', 'ray' ),
		'attributes'            => __( 'Item Attributes', 'ray' ),
		'parent_item_colon'     => __( 'Parent Item:', 'ray' ),
		'all_items'             => __( 'All Items', 'ray' ),
		'add_new_item'          => __( 'Add New Item', 'ray' ),
		'add_new'               => __( 'Add New', 'ray' ),
		'new_item'              => __( 'New Item', 'ray' ),
		'edit_item'             => __( 'Edit Item', 'ray' ),
		'update_item'           => __( 'Update Item', 'ray' ),
		'view_item'             => __( 'View Item', 'ray' ),
		'view_items'            => __( 'View Items', 'ray' ),
		'search_items'          => __( 'Search Item', 'ray' ),
		'not_found'             => __( 'Not found', 'ray' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'ray' ),
		'featured_image'        => __( 'Featured Image', 'ray' ),
		'set_featured_image'    => __( 'Set featured image', 'ray' ),
		'remove_featured_image' => __( 'Remove featured image', 'ray' ),
		'use_featured_image'    => __( 'Use as featured image', 'ray' ),
		'insert_into_item'      => __( 'Insert into item', 'ray' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'ray' ),
		'items_list'            => __( 'Items list', 'ray' ),
		'items_list_navigation' => __( 'Items list navigation', 'ray' ),
		'filter_items_list'     => __( 'Filter items list', 'ray' ),
	);
	$args = array(
		'label'                 => __( 'Floor Plan', 'ray' ),
		'description'           => __( 'Building floor plans', 'ray' ),
		'labels'                => $labels,
		'supports'              => array( 'title', ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 20,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'floor_plans', $args );

}
add_action( 'init', 'add_floor_plans', 0 );

// Register Custom Taxonomy
function add_floor_plan_type() {

	$labels = array(
		'name'                       => _x( 'Floor Plan Types', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Floor Plan Type', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Floor Plan Type', 'text_domain' ),
		'all_items'                  => __( 'All Items', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Item Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Item', 'text_domain' ),
		'edit_item'                  => __( 'Edit Item', 'text_domain' ),
		'update_item'                => __( 'Update Item', 'text_domain' ),
		'view_item'                  => __( 'View Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Search Items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No items', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'floor_plan_type', array( 'floor_plans' ), $args );

}
add_action( 'init', 'add_floor_plan_type', 0 );

?>

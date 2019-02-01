<?php
function create_post_type() {
  register_post_type('community',
    array(
      'labels' => array(
        'name' => __('Communities'),
        'singular_name' => __('Community'),
        'not_found' => __('No Community found.', 'community'),
        'view_item' => __('View Community', 'community'),
        'add_new_item' => __( 'Add New Community', 'community' ),
        'add_new' => __( 'Add New Community', 'community' ),
        'edit_item' => __( 'Edit Community', 'community' ),
        'new_item' => __( 'New Community', 'community' ),
        'menu_name' => _x( 'Communities', 'community' ),
      ),
      'public'      => true,
      'has_archive' => false,
      'show_ui'     => true,
      'menu_icon'   => 'dashicons-groups',
      'query_var'   => true,
      'position'      => 20,
      'supports'    => array('title', 'thumbnail', 'editor'),
      'rewrite'    => array('slug' => 'community', 'with_front' => false),
      'show_in_nav_menus' => true,
      'hierarchical'  => false,
    )
  );

  register_post_type('signatories',
    array(
      'labels' => array(
        'name' => __('Signatories'),
        'singular_name' => __('Signatory'),
        'not_found' => __('No Signatory found.', 'signatories'),
        'view_item' => __('View Signatory', 'signatories'),
        'add_new_item' => __( 'Add New Signatory', 'signatories' ),
        'add_new' => __( 'Add New Signatory', 'signatories' ),
        'edit_item' => __( 'Edit Signatory', 'signatories' ),
        'new_item' => __( 'New Signatory', 'signatories' ),
        'menu_name' => _x( 'Signatories', 'signatories' ),
      ),
      'public'      => false,
      'show_ui'     => true,
      'has_archive' => false,
      'menu_icon'   => 'dashicons-thumbs-up',
      'query_var'   => true,
      'position'    => 20,
      'supports'    => array('title'),
      'rewrite'     => array('slug' => 'signatories'),
      'show_in_nav_menus' => true,
    )
  );

  register_post_type('team',
    array(
      'labels' => array(
        'name' => __('Team'),
        'singular_name' => __('Team'),
        'not_found' => __('No Team found.', 'team'),
        'view_item' => __('View Team', 'team'),
        'add_new_item' => __( 'Add New Team', 'team' ),
        'add_new' => __( 'Add New Team', 'team' ),
        'edit_item' => __( 'Edit Team', 'team' ),
        'new_item' => __( 'New Team', 'team' ),
        'menu_name' => _x( 'Teams', 'team' ),
      ),
      'public'      => false,
      'show_ui'     => true,
      'has_archive' => false,
      'menu_icon'   => 'dashicons-id-alt',
      'query_var'   => true,
      'position'    => 30,
      'supports'    => array('title', 'thumbnail'),
      'rewrite'     => array('slug' => 'team'),
      'show_in_nav_menus' => true,
    )
  );

  register_post_type('events',
    array(
      'labels' => array(
        'name' => __('Events'),
        'singular_name' => __('Event'),
        'not_found' => __('No Event found.', 'events'),
        'view_item' => __('View Event', 'events'),
        'add_new_item' => __( 'Add New Event', 'events' ),
        'add_new' => __( 'Add New Event', 'events' ),
        'edit_item' => __( 'Edit Event', 'events' ),
        'new_item' => __( 'New Event', 'events' ),
        'menu_name' => _x( 'Events', 'events' ),
      ),
      'public'      => true,
      'show_ui'     => true,
      'has_archive' => false,
      'menu_icon'   => 'dashicons-megaphone',
      'query_var'   => true,
      'position'    => 40,
      'supports'    => array('title', 'thumbnail', 'editor'),
      'rewrite'     => array('slug' => 'events', 'with_front' => false),
      'show_in_nav_menus' => true,
    )
  );

  register_post_type('companies',
    array(
      'labels' => array(
        'name' => __('Companies'),
        'singular_name' => __('Company'),
        'not_found' => __('No Company found.', 'companies'),
        'view_item' => __('View Company', 'companies'),
        'add_new_item' => __( 'Add New Company', 'companies' ),
        'add_new' => __( 'Add New Company', 'companies' ),
        'edit_item' => __( 'Edit Company', 'companies' ),
        'new_item' => __( 'New Company', 'companies' ),
        'menu_name' => _x( 'Supporters & Partners', 'companies' ),
      ),
      'public'      => false,
      'show_ui'     => true,
      'has_archive' => false,
      'menu_icon'   => 'dashicons-building',
      'query_var'   => true,
      'position'    => 60,
      'supports'    => array('title', 'thumbnail'),
      'rewrite'     => array('slug' => 'companies'),
      'show_in_nav_menus' => true,
    )
  );

  register_post_type('resources',
    array(
      'labels' => array(
        'name' => __('Resources'),
        'singular_name' => __('Resource'),
        'not_found' => __('No Resource found.', 'resources'),
        'view_item' => __('View Resource', 'resources'),
        'add_new_item' => __( 'Add New Resource', 'resources' ),
        'add_new' => __( 'Add New Resource', 'resources' ),
        'edit_item' => __( 'Edit Resource', 'resources' ),
        'new_item' => __( 'New Resource', 'resources' ),
        'menu_name' => _x( 'Resources', 'resources' ),
      ),
      'public'      => true,
      'show_ui'     => true,
      'has_archive' => false,
      'menu_icon'   => 'dashicons-portfolio',
      'query_var'   => true,
      'position'    => 42,
      'supports'    => array('title', 'thumbnail', 'editor'),
      'rewrite'     => array('slug' => 'resources', 'with_front' => false),
      'show_in_nav_menus' => true,
    )
  );

  register_post_type('date',
    array(
      'labels' => array(
        'name' => __('Date'),
        'singular_name' => __('Date'),
        'not_found' => __('No Date found.', 'date'),
        'view_item' => __('View Date', 'date'),
        'add_new_item' => __( 'Add New Date', 'date' ),
        'add_new' => __( 'Add New Date', 'date' ),
        'edit_item' => __( 'Edit Date', 'date' ),
        'new_item' => __( 'New Date', 'date' ),
        'menu_name' => _x( 'Awareness Date', 'date' ),
      ),
      'public'      => false,
      'show_ui'     => true,
      'has_archive' => false,
      'menu_icon'   => 'dashicons-calendar',
      'query_var'   => true,
      'position'    => 30,
      'supports'    => array('title'),
      'rewrite'     => array('slug' => 'date'),
      'show_in_nav_menus' => true,
    )
  );
}
add_action('init', 'create_post_type', 0);

register_taxonomy(
'resources_type',
'resources',  // this is the custom post type(s) I want to use this taxonomy for
  array(
    'hierarchical' => true,
    'label' => 'Resources Types',
    'query_var' => true,
    'rewrite' => array('slug' => 'resources_type'),
    'capabilities' => array(
      'manage_terms' => 'manage_categories',
      'assign_terms' => 'edit_posts',
    ),
  )
);

register_taxonomy_for_object_type('resources_type', 'resources');

register_taxonomy(
'team_communities',
'team',  // this is the custom post type(s) I want to use this taxonomy for
  array(
    'hierarchical' => true,
    'label' => 'Team Communities',
    'query_var' => true,
    'rewrite' => array('slug' => 'team_communities'),
    'capabilities' => array(
      'manage_terms' => 'manage_categories',
      'assign_terms' => 'edit_posts',
    ),
  )
);

register_taxonomy_for_object_type('team_communities', 'team');

register_taxonomy(
'events_communities',
'events',  // this is the custom post type(s) I want to use this taxonomy for
  array(
    'hierarchical' => true,
    'label' => 'Events Communities',
    'query_var' => true,
    'rewrite' => array('slug' => 'events_communities'),
    'capabilities' => array(
      'manage_terms' => 'manage_categories',
      'assign_terms' => 'edit_posts',
    ),
  )
);

register_taxonomy_for_object_type('events_communities', 'events');

register_taxonomy(
'signatories_category',
'signatories',  // this is the custom post type(s) I want to use this taxonomy for
  array(
    'hierarchical' => true,
    'label' => 'Signatories Category',
    'query_var' => true,
    'rewrite' => array('slug' => 'signatories_category'),
    'capabilities' => array(
      'manage_terms' => 'manage_categories',
      'assign_terms' => 'edit_posts',
    ),
  )
);

register_taxonomy_for_object_type('signatories_category', 'signatories');

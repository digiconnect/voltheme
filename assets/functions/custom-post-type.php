<?php
/* joints Custom Post Type Example
This page walks you through creating 
a custom post type and taxonomies. You
can edit this one or copy the following code 
to create another one. 

I put this in a separate file so as to 
keep it organized. I find it easier to edit
and change things if they are concentrated
in their own file.

*/

//taxonomies, see http://wordpress.stackexchange.com/questions/57493/custom-taxonomy-specific-to-a-custom-post-type

//jobs categories
function jobs_taxonomy() {  
    register_taxonomy(  
        'jobs_categories',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces). 
        'job',        //post type name
        array(  
            'hierarchical' => true,  
            'label' => 'Job Categories',  //Display name
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'job', // This controls the base slug that will display before each term
                'with_front' => false // Don't display the category base before 
            )
        )  
    );  
}  
add_action( 'init', 'jobs_taxonomy');

function filter_post_type_link_job($link, $post)
{
    if ($post->post_type != 'job')
        return $link;

    if ($cats = get_the_terms($post->ID, 'jobs_categories'))
        $link = str_replace('%jobs_categories%', array_pop($cats)->slug, $link);
    return $link;
}
add_filter('post_type_link', 'filter_post_type_link_job', 10, 2);

function default_taxonomy_term_job( $post_id, $post ) {
    if ( 'publish' === $post->post_status ) {
        $defaults = array(
            'jobs_categories' => array( 'other'),   //

            );
        $taxonomies = get_object_taxonomies( $post->post_type );
        foreach ( (array) $taxonomies as $taxonomy ) {
            $terms = wp_get_post_terms( $post_id, $taxonomy );
            if ( empty( $terms ) && array_key_exists( $taxonomy, $defaults ) ) {
                wp_set_object_terms( $post_id, $defaults[$taxonomy], $taxonomy );
            }
        }
    }
}
add_action( 'save_post', 'default_taxonomy_term_job', 100, 2 );

//places categories
function places_taxonomy() {  
    register_taxonomy(  
        'places_categories',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces). 
        'place',        //post type name
        array(  
            'hierarchical' => true,  
            'label' => 'Place Categories',  //Display name
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'place', // This controls the base slug that will display before each term
                'with_front' => false // Don't display the category base before 
            )
        )  
    );  
}  
add_action( 'init', 'places_taxonomy');

function filter_post_type_link_place($link, $post)
{
    if ($post->post_type != 'place')
        return $link;

    if ($cats = get_the_terms($post->ID, 'places_categories'))
        $link = str_replace('%places_categories%', array_pop($cats)->slug, $link);
    return $link;
}
add_filter('post_type_link', 'filter_post_type_link_place', 10, 2);

function default_taxonomy_term_place( $post_id, $post ) {
    if ( 'publish' === $post->post_status ) {
        $defaults = array(
            'places_categories' => array( 'other'),   //

            );
        $taxonomies = get_object_taxonomies( $post->post_type );
        foreach ( (array) $taxonomies as $taxonomy ) {
            $terms = wp_get_post_terms( $post_id, $taxonomy );
            if ( empty( $terms ) && array_key_exists( $taxonomy, $defaults ) ) {
                wp_set_object_terms( $post_id, $defaults[$taxonomy], $taxonomy );
            }
        }
    }
}
add_action( 'save_post', 'default_taxonomy_term_place', 100, 2 );


//events categories
function events_taxonomy() {  
    register_taxonomy(  
        'events_categories',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces). 
        'event',        //post type name
        array(  
            'hierarchical' => true,  
            'label' => 'Event Categories',  //Display name
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'event', // This controls the base slug that will display before each term
                'with_front' => false // Don't display the category base before 
            )
        )  
    );  
}  
add_action( 'init', 'events_taxonomy');

function filter_post_type_link_event($link, $post)
{
    if ($post->post_type != 'event')
        return $link;

    if ($cats = get_the_terms($post->ID, 'events_categories'))
        $link = str_replace('%events_categories%', array_pop($cats)->slug, $link);
    return $link;
}
add_filter('post_type_link', 'filter_post_type_link_event', 10, 2);

function default_taxonomy_term_event( $post_id, $post ) {
    if ( 'publish' === $post->post_status ) {
        $defaults = array(
            'events_categories' => array( 'other'),   //

            );
        $taxonomies = get_object_taxonomies( $post->post_type );
        foreach ( (array) $taxonomies as $taxonomy ) {
            $terms = wp_get_post_terms( $post_id, $taxonomy );
            if ( empty( $terms ) && array_key_exists( $taxonomy, $defaults ) ) {
                wp_set_object_terms( $post_id, $defaults[$taxonomy], $taxonomy );
            }
        }
    }
}
add_action( 'save_post', 'default_taxonomy_term_event', 100, 2 );

//opportunities categories
function opportunities_taxonomy() {  
    register_taxonomy(  
        'opportunities_categories',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces). 
        'opportunity',        //post type name
        array(  
            'hierarchical' => true,  
            'label' => 'Opportunity Categories',  //Display name
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'opportunity', // This controls the base slug that will display before each term
                'with_front' => false // Don't display the category base before 
            )
        )  
    );  
}  
add_action( 'init', 'opportunities_taxonomy');

function filter_post_type_link($link, $post)
{
    if ($post->post_type != 'opportunity')
        return $link;

    if ($cats = get_the_terms($post->ID, 'opportunities_categories'))
        $link = str_replace('%opportunities_categories%', array_pop($cats)->slug, $link);
    return $link;
}
add_filter('post_type_link', 'filter_post_type_link', 10, 2);

function default_taxonomy_term_opportunity( $post_id, $post ) {
    if ( 'publish' === $post->post_status ) {
        $defaults = array(
            'opportunities_categories' => array( 'other'),   //

            );
        $taxonomies = get_object_taxonomies( $post->post_type );
        foreach ( (array) $taxonomies as $taxonomy ) {
            $terms = wp_get_post_terms( $post_id, $taxonomy );
            if ( empty( $terms ) && array_key_exists( $taxonomy, $defaults ) ) {
                wp_set_object_terms( $post_id, $defaults[$taxonomy], $taxonomy );
            }
        }
    }
}
add_action( 'save_post', 'default_taxonomy_term_opportunity', 100, 2 );

//organizations categories
function organizations_taxonomy() {  
    register_taxonomy(  
        'organizations_categories',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces). 
        'organization',        //post type name
        array(  
            'hierarchical' => true,  
            'label' => 'Organization Categories',  //Display name
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'organization', // This controls the base slug that will display before each term
                'with_front' => false // Don't display the category base before 
            )
        )  
    );  
}  
add_action( 'init', 'organizations_taxonomy');

function filter_post_type_link_organizations($link, $post)
{
    if ($post->post_type != 'organization')
        return $link;

    if ($cats = get_the_terms($post->ID, 'organizations_categories'))
        $link = str_replace('%organizations_categories%', array_pop($cats)->slug, $link);
    return $link;
}
add_filter('post_type_link', 'filter_post_type_link_organizations', 10, 2);

function default_taxonomy_term_organization( $post_id, $post ) {
    if ( 'publish' === $post->post_status ) {
        $defaults = array(
            'organizations_categories' => array( 'other'),   //

            );
        $taxonomies = get_object_taxonomies( $post->post_type );
        foreach ( (array) $taxonomies as $taxonomy ) {
            $terms = wp_get_post_terms( $post_id, $taxonomy );
            if ( empty( $terms ) && array_key_exists( $taxonomy, $defaults ) ) {
                wp_set_object_terms( $post_id, $defaults[$taxonomy], $taxonomy );
            }
        }
    }
}
add_action( 'save_post', 'default_taxonomy_term_organization', 100, 2 );

// let's create the function for the custom type
function custom_post_voltheme() { 
	// creating (registering) the custom type 
	register_post_type( 'organization', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// let's now add all the options for this post type
		array('labels' => array(
			'name' => __('Organizations', 'jointstheme'), /* This is the Title of the Group */
			'singular_name' => __('Organization', 'jointstheme'), /* This is the individual type */
			'all_items' => __('All Organizations', 'jointstheme'), /* the all items menu item */
			'add_new' => __('Add New', 'jointstheme'), /* The add new menu item */
			'add_new_item' => __('Add New Organization', 'jointstheme'), /* Add New Display Title */
			'edit' => __( 'Edit', 'jointstheme' ), /* Edit Dialog */
			'edit_item' => __('Edit Post Types', 'jointstheme'), /* Edit Display Title */
			'new_item' => __('New Post Type', 'jointstheme'), /* New Display Title */
			'view_item' => __('View Post Type', 'jointstheme'), /* View Display Title */
			'search_items' => __('Search Post Type', 'jointstheme'), /* Search Custom Type Title */ 
			'not_found' =>  __('Nothing found in the Database.', 'jointstheme'), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __('Nothing found in Trash', 'jointstheme'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'Nonprofit organizations...', 'jointstheme' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 10, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => get_stylesheet_directory_uri() . '/assets/images/custom-post-icon.png', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'nonprofit-organization', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'nonprofit-organization', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky')
	 	) /* end of options */
	); /* end of register post type */	
	// creating (registering) the custom type 
	register_post_type( 'opportunity', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// let's now add all the options for this post type
		array('labels' => array(
			'name' => __('Opportunities', 'jointstheme'), /* This is the Title of the Group */
			'singular_name' => __('Opportunity', 'jointstheme'), /* This is the individual type */
			'all_items' => __('All Opportunities', 'jointstheme'), /* the all items menu item */
			'add_new' => __('Add New', 'jointstheme'), /* The add new menu item */
			'add_new_item' => __('Add New Opp', 'jointstheme'), /* Add New Display Title */
			'edit' => __( 'Edit', 'jointstheme' ), /* Edit Dialog */
			'edit_item' => __('Edit Post Types', 'jointstheme'), /* Edit Display Title */
			'new_item' => __('New Post Type', 'jointstheme'), /* New Display Title */
			'view_item' => __('View Post Type', 'jointstheme'), /* View Display Title */
			'search_items' => __('Search Post Type', 'jointstheme'), /* Search Custom Type Title */ 
			'not_found' =>  __('Nothing found in the Database.', 'jointstheme'), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __('Nothing found in Trash', 'jointstheme'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'Volunteer opportunities...', 'jointstheme' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 10, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => get_stylesheet_directory_uri() . '/assets/images/custom-post-icon.png', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'volunteer-opportunity', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'volunteer-opportunity', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky')
	 	) /* end of options */
	); /* end of register post type */
	
	register_post_type( 'event', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// let's now add all the options for this post type
		array('labels' => array(
			'name' => __('Events', 'jointstheme'), /* This is the Title of the Group */
			'singular_name' => __('Event', 'jointstheme'), /* This is the individual type */
			'all_items' => __('All Events', 'jointstheme'), /* the all items menu item */
			'add_new' => __('Add New', 'jointstheme'), /* The add new menu item */
			'add_new_item' => __('Add New Event', 'jointstheme'), /* Add New Display Title */
			'edit' => __( 'Edit', 'jointstheme' ), /* Edit Dialog */
			'edit_item' => __('Edit Post Types', 'jointstheme'), /* Edit Display Title */
			'new_item' => __('New Post Type', 'jointstheme'), /* New Display Title */
			'view_item' => __('View Post Type', 'jointstheme'), /* View Display Title */
			'search_items' => __('Search Post Type', 'jointstheme'), /* Search Custom Type Title */ 
			'not_found' =>  __('Nothing found in the Database.', 'jointstheme'), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __('Nothing found in Trash', 'jointstheme'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'Events...', 'jointstheme' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 10, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => get_stylesheet_directory_uri() . '/assets/images/custom-post-icon.png', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'event', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'event', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky')
	 	) /* end of options */
	); /* end of register post type */
	
	register_post_type( 'place', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// let's now add all the options for this post type
		array('labels' => array(
			'name' => __('Places', 'jointstheme'), /* This is the Title of the Group */
			'singular_name' => __('Place', 'jointstheme'), /* This is the individual type */
			'all_items' => __('All Places', 'jointstheme'), /* the all items menu item */
			'add_new' => __('Add New', 'jointstheme'), /* The add new menu item */
			'add_new_item' => __('Add New Event', 'jointstheme'), /* Add New Display Title */
			'edit' => __( 'Edit', 'jointstheme' ), /* Edit Dialog */
			'edit_item' => __('Edit Post Types', 'jointstheme'), /* Edit Display Title */
			'new_item' => __('New Post Type', 'jointstheme'), /* New Display Title */
			'view_item' => __('View Post Type', 'jointstheme'), /* View Display Title */
			'search_items' => __('Search Post Type', 'jointstheme'), /* Search Custom Type Title */ 
			'not_found' =>  __('Nothing found in the Database.', 'jointstheme'), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __('Nothing found in Trash', 'jointstheme'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'Places...', 'jointstheme' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 10, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => get_stylesheet_directory_uri() . '/assets/images/custom-post-icon.png', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'place', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'place', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky')
	 	) /* end of options */
	); /* end of register post type */
	register_post_type( 'job', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// let's now add all the options for this post type
		array('labels' => array(
			'name' => __('Jobs', 'jointstheme'), /* This is the Title of the Group */
			'singular_name' => __('Job', 'jointstheme'), /* This is the individual type */
			'all_items' => __('All Jobs', 'jointstheme'), /* the all items menu item */
			'add_new' => __('Add New', 'jointstheme'), /* The add new menu item */
			'add_new_item' => __('Add New Event', 'jointstheme'), /* Add New Display Title */
			'edit' => __( 'Edit', 'jointstheme' ), /* Edit Dialog */
			'edit_item' => __('Edit Post Types', 'jointstheme'), /* Edit Display Title */
			'new_item' => __('New Post Type', 'jointstheme'), /* New Display Title */
			'view_item' => __('View Post Type', 'jointstheme'), /* View Display Title */
			'search_items' => __('Search Post Type', 'jointstheme'), /* Search Custom Type Title */ 
			'not_found' =>  __('Nothing found in the Database.', 'jointstheme'), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __('Nothing found in Trash', 'jointstheme'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'Jobs...', 'jointstheme' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 10, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => get_stylesheet_directory_uri() . '/assets/images/custom-post-icon.png', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'job', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'job', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky')
	 	) /* end of options */
	); /* end of register post type */
	flush_rewrite_rules(false);
} 
	// adding the function to the Wordpress init
	add_action( 'init', 'custom_post_voltheme');
	
	// create taxonomies for volunteer opportunities after theme activation
	
	function create_my_opportunities_cats (){
	$parent_term = term_exists( 'Administration, Clerical & Office', 'opportunities_categories' ); // array is returned if taxonomy is given
	if($parent_term !== 0 && $parent_term !== null){
	}
	else{
	$parent_term_id = $$parent_term['term_id']; // get numeric term id
	wp_insert_term(
	  'Administration, Clerical & Office', // the term 
	  'opportunities_categories', // the taxonomy
	  array(
	    'description'=> 'Administration, Clerical & Office',
	    'slug' => 'administration-clerical-office',
	    'parent'=> $parent_term_id
	  )
	);}
	$parent_term = term_exists( 'Animal Care', 'opportunities_categories' ); // array is returned if taxonomy is given
	if($parent_term !== 0 && $parent_term !== null){
	}
	else{
	$parent_term_id = $$parent_term['term_id']; // get numeric term id
	wp_insert_term(
	  'Animal Care', // the term 
	  'opportunities_categories', // the taxonomy
	  array(
	    'description'=> 'Animal Care',
	    'slug' => 'animal-care',
	    'parent'=> $parent_term_id
	  )
	);}
	
	$parent_term = term_exists( 'Boards, Committees & Leadership', 'opportunities_categories' ); // array is returned if taxonomy is given
	if($parent_term !== 0 && $parent_term !== null){
	}
	else{
	$parent_term_id = $$parent_term['term_id']; // get numeric term id
	wp_insert_term(
	  'Boards, Committees & Leadership', // the term 
	  'opportunities_categories', // the taxonomy
	  array(
	    'description'=> 'Boards, Committees & Leadership',
	    'slug' => 'boards-committees',
	    'parent'=> $parent_term_id
	  )
	);}
	
	$parent_term = term_exists( 'Children & Youth', 'opportunities_categories' ); // array is returned if taxonomy is given
	if($parent_term !== 0 && $parent_term !== null){
	}
	else{
	$parent_term_id = $$parent_term['term_id']; // get numeric term id
	wp_insert_term(
	  'Children & Youth', // the term 
	  'opportunities_categories', // the taxonomy
	  array(
	    'description'=> 'Children & Youth',
	    'slug' => 'children-youth',
	    'parent'=> $parent_term_id
	  )
	);}
	
	$parent_term = term_exists( 'Communications, Marketing & Media', 'opportunities_categories' ); // array is returned if taxonomy is given
	if($parent_term !== 0 && $parent_term !== null){
	}
	else{
	$parent_term_id = $$parent_term['term_id']; // get numeric term id
	wp_insert_term(
	  'Communications, Marketing & Media', // the term 
	  'opportunities_categories', // the taxonomy
	  array(
	    'description'=> 'Communications, Marketing & Media',
	    'slug' => 'communication-marketing',
	    'parent'=> $parent_term_id
	  )
	);}
	
	$parent_term = term_exists( 'Computers, Technology & IT', 'opportunities_categories' ); // array is returned if taxonomy is given
	if($parent_term !== 0 && $parent_term !== null){
	}
	else{
	$parent_term_id = $$parent_term['term_id']; // get numeric term id
	wp_insert_term(
	  'Computers, Technology & IT', // the term 
	  'opportunities_categories', // the taxonomy
	  array(
	    'description'=> 'Computers, Technology & IT',
	    'slug' => 'computers-technology',
	    'parent'=> $parent_term_id
	  )
	);}
	
	$parent_term = term_exists( 'Counselling, Support & Mentoring', 'opportunities_categories' ); // array is returned if taxonomy is given
	if($parent_term !== 0 && $parent_term !== null){
	}
	else{
	$parent_term_id = $$parent_term['term_id']; // get numeric term id
	wp_insert_term(
	  'Counselling, Support & Mentoring', // the term 
	  'opportunities_categories', // the taxonomy
	  array(
	    'description'=> 'Counselling, Support & Mentoring',
	    'slug' => 'counselling-support',
	    'parent'=> $parent_term_id
	  )
	);}
	
	$parent_term = term_exists( 'Driving & Transportation', 'opportunities_categories' ); // array is returned if taxonomy is given
	if($parent_term !== 0 && $parent_term !== null){
	}
	else{
	$parent_term_id = $$parent_term['term_id']; // get numeric term id
	wp_insert_term(
	  'Driving & Transportation', // the term 
	  'opportunities_categories', // the taxonomy
	  array(
	    'description'=> 'Driving & Transportation',
	    'slug' => 'driving-transportation',
	    'parent'=> $parent_term_id
	  )
	);}
	
	$parent_term = term_exists( 'Education, Training & Teaching', 'opportunities_categories' ); // array is returned if taxonomy is given
	if($parent_term !== 0 && $parent_term !== null){
	}
	else{
	$parent_term_id = $$parent_term['term_id']; // get numeric term id
	wp_insert_term(
	  'Education, Training & Teaching', // the term 
	  'opportunities_categories', // the taxonomy
	  array(
	    'description'=> 'Education, Training & Teaching',
	    'slug' => 'education',
	    'parent'=> $parent_term_id
	  )
	);}
	
	$parent_term = term_exists( 'Environment & Improvement', 'opportunities_categories' ); // array is returned if taxonomy is given
	if($parent_term !== 0 && $parent_term !== null){
	}
	else{
	$parent_term_id = $$parent_term['term_id']; // get numeric term id
	wp_insert_term(
	  'Environment & Improvement', // the term 
	  'opportunities_categories', // the taxonomy
	  array(
	    'description'=> 'Environment & Improvement',
	    'slug' => 'environment',
	    'parent'=> $parent_term_id
	  )
	);}
	
	$parent_term = term_exists( 'Fundraising & Sponsorship', 'opportunities_categories' ); // array is returned if taxonomy is given
	if($parent_term !== 0 && $parent_term !== null){
	}
	else{
	$parent_term_id = $$parent_term['term_id']; // get numeric term id
	wp_insert_term(
	  'Fundraising & Sponsorship', // the term 
	  'opportunities_categories', // the taxonomy
	  array(
	    'description'=> 'Fundraising & Sponsorship',
	    'slug' => 'fundraising',
	    'parent'=> $parent_term_id
	  )
	);}
	
	$parent_term = term_exists( 'Health & Medical', 'opportunities_categories' ); // array is returned if taxonomy is given
	if($parent_term !== 0 && $parent_term !== null){
	}
	else{
	$parent_term_id = $$parent_term['term_id']; // get numeric term id
	wp_insert_term(
	  'Health & Medical', // the term 
	  'opportunities_categories', // the taxonomy
	  array(
	    'description'=> 'Health & Medical',
	    'slug' => 'health-medical',
	    'parent'=> $parent_term_id
	  )
	);}
	
	$parent_term = term_exists( 'Heritage & Museums', 'opportunities_categories' ); // array is returned if taxonomy is given
	if($parent_term !== 0 && $parent_term !== null){
	}
	else{
	$parent_term_id = $$parent_term['term_id']; // get numeric term id
	wp_insert_term(
	  'Heritage & Museums', // the term 
	  'opportunities_categories', // the taxonomy
	  array(
	    'description'=> 'Heritage & Museums',
	    'slug' => 'heritage-museums',
	    'parent'=> $parent_term_id
	  )
	);}
	
	$parent_term = term_exists( 'Language', 'opportunities_categories' ); // array is returned if taxonomy is given
	if($parent_term !== 0 && $parent_term !== null){
	}
	else{
	$parent_term_id = $$parent_term['term_id']; // get numeric term id
	wp_insert_term(
	  'Language', // the term 
	  'opportunities_categories', // the taxonomy
	  array(
	    'description'=> 'Language',
	    'slug' => 'language',
	    'parent'=> $parent_term_id
	  )
	);}
	
	$parent_term = term_exists( 'Other', 'opportunities_categories' ); // array is returned if taxonomy is given
	if($parent_term !== 0 && $parent_term !== null){
	}
	else{
	$parent_term_id = $$parent_term['term_id']; // get numeric term id
	wp_insert_term(
	  'Other', // the term 
	  'opportunities_categories', // the taxonomy
	  array(
	    'description'=> 'Other',
	    'slug' => 'other',
	    'parent'=> $parent_term_id
	  )
	);}
	
	$parent_term = term_exists( 'Professional Opportunities', 'opportunities_categories' ); // array is returned if taxonomy is given
	if($parent_term !== 0 && $parent_term !== null){
	}
	else{
	$parent_term_id = $$parent_term['term_id']; // get numeric term id
	wp_insert_term(
	  'Professional Opportunities', // the term 
	  'opportunities_categories', // the taxonomy
	  array(
	    'description'=> 'Professional Opportunities',
	    'slug' => 'professional',
	    'parent'=> $parent_term_id
	  )
	);}
	
	$parent_term = term_exists( 'Research', 'opportunities_categories' ); // array is returned if taxonomy is given
	if($parent_term !== 0 && $parent_term !== null){
	}
	else{
	$parent_term_id = $$parent_term['term_id']; // get numeric term id
	wp_insert_term(
	  'Research', // the term 
	  'opportunities_categories', // the taxonomy
	  array(
	    'description'=> 'Research',
	    'slug' => 'research',
	    'parent'=> $parent_term_id
	  )
	);}
	
	$parent_term = term_exists( 'Social & Community Services', 'opportunities_categories' ); // array is returned if taxonomy is given
	if($parent_term !== 0 && $parent_term !== null){
	}
	else{
	$parent_term_id = $$parent_term['term_id']; // get numeric term id
	wp_insert_term(
	  'Social & Community Services', // the term 
	  'opportunities_categories', // the taxonomy
	  array(
	    'description'=> 'Social & Community Services',
	    'slug' => 'social-community',
	    'parent'=> $parent_term_id
	  )
	);}
	
	$parent_term = term_exists( 'Special Events & Festivals', 'opportunities_categories' ); // array is returned if taxonomy is given
	if($parent_term !== 0 && $parent_term !== null){
	}
	else{
	$parent_term_id = $$parent_term['term_id']; // get numeric term id
	wp_insert_term(
	  'Special Events & Festivals', // the term 
	  'opportunities_categories', // the taxonomy
	  array(
	    'description'=> 'Special Events & Festivals',
	    'slug' => 'events-festivals',
	    'parent'=> $parent_term_id
	  )
	);}
	
	$parent_term = term_exists( 'Sports & Recreation', 'opportunities_categories' ); // array is returned if taxonomy is given
	if($parent_term !== 0 && $parent_term !== null){
	}
	else{
	$parent_term_id = $$parent_term['term_id']; // get numeric term id
	wp_insert_term(
	  'Sports & Recreation', // the term 
	  'opportunities_categories', // the taxonomy
	  array(
	    'description'=> 'Sports & Recreation',
	    'slug' => 'sports-recreation',
	    'parent'=> $parent_term_id
	  )
	);}
}
add_action ( 'after_switch_theme', 'create_my_opportunities_cats' );
	
	// create taxonomies for organizations after theme activation
	
function create_my_organizations_cats (){
	$parent_term = term_exists( 'Advocacy, Law & Politics', 'organizations_categories' ); // array is returned if taxonomy is given
	if($parent_term !== 0 && $parent_term !== null){
	}
	else{
	$parent_term_id = $$parent_term['term_id']; // get numeric term id
	wp_insert_term(
	  'Advocacy, Law & Politics', // the term 
	  'organizations_categories', // the taxonomy
	  array(
	    'description'=> 'Advocacy, Law & Politics',
	    'slug' => 'advocacy-law-politics',
	    'parent'=> $parent_term_id
	  )
	);}
	$parent_term = term_exists( 'Animals & Environment', 'organizations_categories' ); // array is returned if taxonomy is given
	if($parent_term !== 0 && $parent_term !== null){
	}
	else{
	$parent_term_id = $$parent_term['term_id']; // get numeric term id
	wp_insert_term(
	  'Animals & Environment', // the term 
	  'organizations_categories', // the taxonomy
	  array(
	    'description'=> 'Animals & Environment',
	    'slug' => 'animals-environment',
	    'parent'=> $parent_term_id
	  )
	);}
	
	$parent_term = term_exists( 'Arts, Culture & Heritage', 'organizations_categories' ); // array is returned if taxonomy is given
	if($parent_term !== 0 && $parent_term !== null){
	}
	else{
	$parent_term_id = $$parent_term['term_id']; // get numeric term id
	wp_insert_term(
	  'Arts, Culture & Heritage', // the term 
	  'organizations_categories', // the taxonomy
	  array(
	    'description'=> 'Arts, Culture & Heritage',
	    'slug' => 'arts-culture-heritage',
	    'parent'=> $parent_term_id
	  )
	);}
	
	$parent_term = term_exists( 'Development & Housing', 'organizations_categories' ); // array is returned if taxonomy is given
	if($parent_term !== 0 && $parent_term !== null){
	}
	else{
	$parent_term_id = $$parent_term['term_id']; // get numeric term id
	wp_insert_term(
	  'Development & Housing', // the term 
	  'organizations_categories', // the taxonomy
	  array(
	    'description'=> 'Development & Housing',
	    'slug' => 'development-housing',
	    'parent'=> $parent_term_id
	  )
	);}
	
	$parent_term = term_exists( 'Education & Schools', 'organizations_categories' ); // array is returned if taxonomy is given
	if($parent_term !== 0 && $parent_term !== null){
	}
	else{
	$parent_term_id = $$parent_term['term_id']; // get numeric term id
	wp_insert_term(
	  'Education & Schools', // the term 
	  'organizations_categories', // the taxonomy
	  array(
	    'description'=> 'Education & Schools',
	    'slug' => 'education',
	    'parent'=> $parent_term_id
	  )
	);}
	
	$parent_term = term_exists( 'Fundraising, Grant Making & Foundations', 'organizations_categories' ); // array is returned if taxonomy is given
	if($parent_term !== 0 && $parent_term !== null){
	}
	else{
	$parent_term_id = $$parent_term['term_id']; // get numeric term id
	wp_insert_term(
	  'Fundraising, Grant Making & Foundations', // the term 
	  'organizations_categories', // the taxonomy
	  array(
	    'description'=> 'Fundraising, Grant Making & Foundations',
	    'slug' => 'fundraising-grants-foundations',
	    'parent'=> $parent_term_id
	  )
	);}
	
	$parent_term = term_exists( 'Health & Medical', 'organizations_categories' ); // array is returned if taxonomy is given
	if($parent_term !== 0 && $parent_term !== null){
	}
	else{
	$parent_term_id = $$parent_term['term_id']; // get numeric term id
	wp_insert_term(
	  'Health & Medical', // the term 
	  'organizations_categories', // the taxonomy
	  array(
	    'description'=> 'Health & Medical',
	    'slug' => 'health-medical',
	    'parent'=> $parent_term_id
	  )
	);}
	
	$parent_term = term_exists( 'International', 'organizations_categories' ); // array is returned if taxonomy is given
	if($parent_term !== 0 && $parent_term !== null){
	}
	else{
	$parent_term_id = $$parent_term['term_id']; // get numeric term id
	wp_insert_term(
	  'International', // the term 
	  'organizations_categories', // the taxonomy
	  array(
	    'description'=> 'International',
	    'slug' => 'international',
	    'parent'=> $parent_term_id
	  )
	);}
	
	$parent_term = term_exists( 'Religion', 'organizations_categories' ); // array is returned if taxonomy is given
	if($parent_term !== 0 && $parent_term !== null){
	}
	else{
	$parent_term_id = $$parent_term['term_id']; // get numeric term id
	wp_insert_term(
	  'Religion', // the term 
	  'organizations_categories', // the taxonomy
	  array(
	    'description'=> 'Religion',
	    'slug' => 'religion',
	    'parent'=> $parent_term_id
	  )
	);}
	
	$parent_term = term_exists( 'Sports & Recreation', 'organizations_categories' ); // array is returned if taxonomy is given
	if($parent_term !== 0 && $parent_term !== null){
	}
	else{
	$parent_term_id = $$parent_term['term_id']; // get numeric term id
	wp_insert_term(
	  'Sports & Recreation', // the term 
	  'organizations_categories', // the taxonomy
	  array(
	    'description'=> 'Sports & Recreation',
	    'slug' => 'sports-recreation',
	    'parent'=> $parent_term_id
	  )
	);}
	
	$parent_term = term_exists( 'Social & Community Services', 'organizations_categories' ); // array is returned if taxonomy is given
	if($parent_term !== 0 && $parent_term !== null){
	}
	else{
	$parent_term_id = $$parent_term['term_id']; // get numeric term id
	wp_insert_term(
	  'Social & Community Services', // the term 
	  'organizations_categories', // the taxonomy
	  array(
	    'description'=> 'Social & Community Services',
	    'slug' => 'social-community',
	    'parent'=> $parent_term_id
	  )
	);}
	
	$parent_term = term_exists( 'Other', 'organizations_categories' ); // array is returned if taxonomy is given
	if($parent_term !== 0 && $parent_term !== null){
	}
	else{
	$parent_term_id = $$parent_term['term_id']; // get numeric term id
	wp_insert_term(
	  'Other', // the term 
	  'organizations_categories', // the taxonomy
	  array(
	    'description'=> 'Other',
	    'slug' => 'other',
	    'parent'=> $parent_term_id
	  )
	);}
	
	
}
add_action ( 'after_switch_theme', 'create_my_organizations_cats' );

// create taxonomies for events after theme activation
	
function create_my_events_cats (){
	$parent_term = term_exists( 'Arts & Entertainment', 'events_categories' ); // array is returned if taxonomy is given
	if($parent_term !== 0 && $parent_term !== null){
	}
	else{
	$parent_term_id = $$parent_term['term_id']; // get numeric term id
	wp_insert_term(
	  'Arts & Entertainment', // the term 
	  'events_categories', // the taxonomy
	  array(
	    'description'=> 'Arts & Entertainment',
	    'slug' => 'arts-entertainment',
	    'parent'=> $parent_term_id
	  )
	);}
	$parent_term = term_exists( 'Bar & Drink', 'events_categories' ); // array is returned if taxonomy is given
	if($parent_term !== 0 && $parent_term !== null){
	}
	else{
	$parent_term_id = $$parent_term['term_id']; // get numeric term id
	wp_insert_term(
	  'Bar & Drink', // the term 
	  'events_categories', // the taxonomy
	  array(
	    'description'=> 'Bar & Drink',
	    'slug' => 'bar-drink',
	    'parent'=> $parent_term_id
	  )
	);}
	
	$parent_term = term_exists( 'Craft Fairs', 'events_categories' ); // array is returned if taxonomy is given
	if($parent_term !== 0 && $parent_term !== null){
	}
	else{
	$parent_term_id = $$parent_term['term_id']; // get numeric term id
	wp_insert_term(
	  'Craft Fairs', // the term 
	  'events_categories', // the taxonomy
	  array(
	    'description'=> 'Craft Fairs',
	    'slug' => 'craft-fairs',
	    'parent'=> $parent_term_id
	  )
	);}
	
	$parent_term = term_exists( 'Festivals', 'events_categories' ); // array is returned if taxonomy is given
	if($parent_term !== 0 && $parent_term !== null){
	}
	else{
	$parent_term_id = $$parent_term['term_id']; // get numeric term id
	wp_insert_term(
	  'Festivals', // the term 
	  'events_categories', // the taxonomy
	  array(
	    'description'=> 'Festivals',
	    'slug' => 'festivals',
	    'parent'=> $parent_term_id
	  )
	);}
	
	$parent_term = term_exists( 'Food & Drink', 'events_categories' ); // array is returned if taxonomy is given
	if($parent_term !== 0 && $parent_term !== null){
	}
	else{
	$parent_term_id = $$parent_term['term_id']; // get numeric term id
	wp_insert_term(
	  'Food & Drink', // the term 
	  'events_categories', // the taxonomy
	  array(
	    'description'=> 'Food & Drink',
	    'slug' => 'food-drink',
	    'parent'=> $parent_term_id
	  )
	);}
	
	$parent_term = term_exists( 'Fundraisers & Volunteer', 'events_categories' ); // array is returned if taxonomy is given
	if($parent_term !== 0 && $parent_term !== null){
	}
	else{
	$parent_term_id = $$parent_term['term_id']; // get numeric term id
	wp_insert_term(
	  'Fundraisers & Volunteer', // the term 
	  'events_categories', // the taxonomy
	  array(
	    'description'=> 'Fundraisers & Volunteer',
	    'slug' => 'fundraising-volunteer',
	    'parent'=> $parent_term_id
	  )
	);}
	
	$parent_term = term_exists( 'Job Fairs & Recruitment Events', 'events_categories' ); // array is returned if taxonomy is given
	if($parent_term !== 0 && $parent_term !== null){
	}
	else{
	$parent_term_id = $$parent_term['term_id']; // get numeric term id
	wp_insert_term(
	  'Job Fairs & Recruitment Events', // the term 
	  'events_categories', // the taxonomy
	  array(
	    'description'=> 'Job Fairs & Recruitment Events',
	    'slug' => 'job-fairs',
	    'parent'=> $parent_term_id
	  )
	);}
	
	$parent_term = term_exists( 'Live Music', 'events_categories' ); // array is returned if taxonomy is given
	if($parent_term !== 0 && $parent_term !== null){
	}
	else{
	$parent_term_id = $$parent_term['term_id']; // get numeric term id
	wp_insert_term(
	  'Live Music', // the term 
	  'events_categories', // the taxonomy
	  array(
	    'description'=> 'Live Music',
	    'slug' => 'live-music',
	    'parent'=> $parent_term_id
	  )
	);}
	
	$parent_term = term_exists( 'Meetings, Conferences & Workshops', 'events_categories' ); // array is returned if taxonomy is given
	if($parent_term !== 0 && $parent_term !== null){
	}
	else{
	$parent_term_id = $$parent_term['term_id']; // get numeric term id
	wp_insert_term(
	  'Meetings, Conferences & Workshops', // the term 
	  'events_categories', // the taxonomy
	  array(
	    'description'=> 'Meetings, Conferences & Workshops',
	    'slug' => 'meetings-conferences-workshops',
	    'parent'=> $parent_term_id
	  )
	);}
	
	$parent_term = term_exists( 'Open House & Real Estate', 'events_categories' ); // array is returned if taxonomy is given
	if($parent_term !== 0 && $parent_term !== null){
	}
	else{
	$parent_term_id = $$parent_term['term_id']; // get numeric term id
	wp_insert_term(
	  'Open House & Real Estate', // the term 
	  'events_categories', // the taxonomy
	  array(
	    'description'=> 'Open House & Real Estate',
	    'slug' => 'open-house',
	    'parent'=> $parent_term_id
	  )
	);}
	
	$parent_term = term_exists( 'Other', 'events_categories' ); // array is returned if taxonomy is given
	if($parent_term !== 0 && $parent_term !== null){
	}
	else{
	$parent_term_id = $$parent_term['term_id']; // get numeric term id
	wp_insert_term(
	  'Other', // the term 
	  'events_categories', // the taxonomy
	  array(
	    'description'=> 'Other',
	    'slug' => 'other',
	    'parent'=> $parent_term_id
	  )
	);}
	
	$parent_term = term_exists( 'Yard & Garage Sales', 'events_categories' ); // array is returned if taxonomy is given
	if($parent_term !== 0 && $parent_term !== null){
	}
	else{
	$parent_term_id = $$parent_term['term_id']; // get numeric term id
	wp_insert_term(
	  'Yard & Garage Sales', // the term 
	  'events_categories', // the taxonomy
	  array(
	    'description'=> 'Yard & Garage Sales',
	    'slug' => 'yard-garage-sales',
	    'parent'=> $parent_term_id
	  )
	);}
	
	$parent_term = term_exists( 'Shopping & Retail', 'events_categories' ); // array is returned if taxonomy is given
	if($parent_term !== 0 && $parent_term !== null){
	}
	else{
	$parent_term_id = $$parent_term['term_id']; // get numeric term id
	wp_insert_term(
	  'Shopping & Retail', // the term 
	  'events_categories', // the taxonomy
	  array(
	    'description'=> 'Shopping & Retail',
	    'slug' => 'shopping-retail',
	    'parent'=> $parent_term_id
	  )
	);}
	
	$parent_term = term_exists( 'Sports & Fitness', 'events_categories' ); // array is returned if taxonomy is given
	if($parent_term !== 0 && $parent_term !== null){
	}
	else{
	$parent_term_id = $$parent_term['term_id']; // get numeric term id
	wp_insert_term(
	  'Sports & Fitness', // the term 
	  'events_categories', // the taxonomy
	  array(
	    'description'=> 'Sports & Fitness',
	    'slug' => 'sports-fitness',
	    'parent'=> $parent_term_id
	  )
	);}
	
	
}
add_action ( 'after_switch_theme', 'create_my_events_cats' );

// create taxonomies for places after theme activation
	
function create_my_places_cats (){
	$parent_term = term_exists( 'Automotive', 'places_categories' ); // array is returned if taxonomy is given
	if($parent_term !== 0 && $parent_term !== null){
	}
	else{
	$parent_term_id = $$parent_term['term_id']; // get numeric term id
	wp_insert_term(
	  'Automotive', // the term 
	  'places_categories', // the taxonomy
	  array(
	    'description'=> 'Automotive',
	    'slug' => 'automotive',
	    'parent'=> $parent_term_id
	  )
	);}
	$parent_term = term_exists( 'Community and Government', 'places_categories' ); // array is returned if taxonomy is given
	if($parent_term !== 0 && $parent_term !== null){
	}
	else{
	$parent_term_id = $$parent_term['term_id']; // get numeric term id
	wp_insert_term(
	  'Community and Government', // the term 
	  'places_categories', // the taxonomy
	  array(
	    'description'=> 'Community and Government',
	    'slug' => 'community-government',
	    'parent'=> $parent_term_id
	  )
	);}
	
	$parent_term = term_exists( 'Healthcare', 'places_categories' ); // array is returned if taxonomy is given
	if($parent_term !== 0 && $parent_term !== null){
	}
	else{
	$parent_term_id = $$parent_term['term_id']; // get numeric term id
	wp_insert_term(
	  'Healthcare', // the term 
	  'places_categories', // the taxonomy
	  array(
	    'description'=> 'Healthcare',
	    'slug' => 'healthcare ',
	    'parent'=> $parent_term_id
	  )
	);}
	
	$parent_term = term_exists( 'Landmarks', 'places_categories' ); // array is returned if taxonomy is given
	if($parent_term !== 0 && $parent_term !== null){
	}
	else{
	$parent_term_id = $$parent_term['term_id']; // get numeric term id
	wp_insert_term(
	  'Landmarks', // the term 
	  'places_categories', // the taxonomy
	  array(
	    'description'=> 'Landmarks',
	    'slug' => 'landmarks',
	    'parent'=> $parent_term_id
	  )
	);}
	
	$parent_term = term_exists( 'Retail', 'places_categories' ); // array is returned if taxonomy is given
	if($parent_term !== 0 && $parent_term !== null){
	}
	else{
	$parent_term_id = $$parent_term['term_id']; // get numeric term id
	wp_insert_term(
	  'Retail', // the term 
	  'places_categories', // the taxonomy
	  array(
	    'description'=> 'Retail',
	    'slug' => 'retail',
	    'parent'=> $parent_term_id
	  )
	);}
	
	$parent_term = term_exists( 'Businesses and Services', 'places_categories' ); // array is returned if taxonomy is given
	if($parent_term !== 0 && $parent_term !== null){
	}
	else{
	$parent_term_id = $$parent_term['term_id']; // get numeric term id
	wp_insert_term(
	  'Businesses and Services', // the term 
	  'places_categories', // the taxonomy
	  array(
	    'description'=> 'Businesses and Services',
	    'slug' => 'businesses-services',
	    'parent'=> $parent_term_id
	  )
	);}
	
	$parent_term = term_exists( 'Social', 'places_categories' ); // array is returned if taxonomy is given
	if($parent_term !== 0 && $parent_term !== null){
	}
	else{
	$parent_term_id = $$parent_term['term_id']; // get numeric term id
	wp_insert_term(
	  'Social', // the term 
	  'places_categories', // the taxonomy
	  array(
	    'description'=> 'Social',
	    'slug' => 'social',
	    'parent'=> $parent_term_id
	  )
	);}
	
	$parent_term = term_exists( 'Sports and Recreation', 'places_categories' ); // array is returned if taxonomy is given
	if($parent_term !== 0 && $parent_term !== null){
	}
	else{
	$parent_term_id = $$parent_term['term_id']; // get numeric term id
	wp_insert_term(
	  'Sports and Recreation', // the term 
	  'places_categories', // the taxonomy
	  array(
	    'description'=> 'Sports and Recreation',
	    'slug' => 'sports-recreation',
	    'parent'=> $parent_term_id
	  )
	);}
	
	$parent_term = term_exists( 'Transportation', 'places_categories' ); // array is returned if taxonomy is given
	if($parent_term !== 0 && $parent_term !== null){
	}
	else{
	$parent_term_id = $$parent_term['term_id']; // get numeric term id
	wp_insert_term(
	  'Transportation', // the term 
	  'places_categories', // the taxonomy
	  array(
	    'description'=> 'Transportation',
	    'slug' => 'transportation',
	    'parent'=> $parent_term_id
	  )
	);}
	
	$parent_term = term_exists( 'Travel', 'places_categories' ); // array is returned if taxonomy is given
	if($parent_term !== 0 && $parent_term !== null){
	}
	else{
	$parent_term_id = $$parent_term['term_id']; // get numeric term id
	wp_insert_term(
	  'Travel', // the term 
	  'places_categories', // the taxonomy
	  array(
	    'description'=> 'Travel',
	    'slug' => 'travel',
	    'parent'=> $parent_term_id
	  )
	);}
	
	// child #1 for place categories
	
$parent_term = term_exists('Automotive','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Automotive"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Car Appraisers', // the term
'places_categories',//the taxonomy
array(
'description'=>'Car Appraisers',
'slug'=>'car-appraisers',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Automotive','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Automotive"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Car Dealers and Leasing', // the term
'places_categories',//the taxonomy
array(
'description'=>'Car Dealers and Leasing',
'slug'=>'car-dealers-and-leasing',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Automotive','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Automotive"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Car Parts and Accessories', // the term
'places_categories',//the taxonomy
array(
'description'=>'Car Parts and Accessories',
'slug'=>'car-parts-and-accessories',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Automotive','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Automotive"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Car Wash and Detail', // the term
'places_categories',//the taxonomy
array(
'description'=>'Car Wash and Detail',
'slug'=>'car-wash-and-detail',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Automotive','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Automotive"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Classic and Antique Car', // the term
'places_categories',//the taxonomy
array(
'description'=>'Classic and Antique Car',
'slug'=>'classic-and-antique-car',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Automotive','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Automotive"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Maintenance and Repair', // the term
'places_categories',//the taxonomy
array(
'description'=>'Maintenance and Repair',
'slug'=>'maintenance-and-repair',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Automotive','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Automotive"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Motorcycles, Mopeds and Scooters', // the term
'places_categories',//the taxonomy
array(
'description'=>'Motorcycles, Mopeds and Scooters',
'slug'=>'motorcycles,-mopeds-and-scooters',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Automotive','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Automotive"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'RVs and Motor Homes', // the term
'places_categories',//the taxonomy
array(
'description'=>'RVs and Motor Homes',
'slug'=>'rvs-and-motor-homes',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Automotive','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Automotive"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Salvage Yards', // the term
'places_categories',//the taxonomy
array(
'description'=>'Salvage Yards',
'slug'=>'salvage-yards',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Automotive','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Automotive"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Towing', // the term
'places_categories',//the taxonomy
array(
'description'=>'Towing',
'slug'=>'towing',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Businesses and Services','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Businesses and Services"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Advertising and Marketing', // the term
'places_categories',//the taxonomy
array(
'description'=>'Advertising and Marketing',
'slug'=>'advertising-and-marketing',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Businesses and Services','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Businesses and Services"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Agriculture and Forestry', // the term
'places_categories',//the taxonomy
array(
'description'=>'Agriculture and Forestry',
'slug'=>'agriculture-and-forestry',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Businesses and Services','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Businesses and Services"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Art Restoration', // the term
'places_categories',//the taxonomy
array(
'description'=>'Art Restoration',
'slug'=>'art-restoration',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Businesses and Services','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Businesses and Services"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Audiovisual', // the term
'places_categories',//the taxonomy
array(
'description'=>'Audiovisual',
'slug'=>'audiovisual',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Businesses and Services','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Businesses and Services"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Automation and Control Systems', // the term
'places_categories',//the taxonomy
array(
'description'=>'Automation and Control Systems',
'slug'=>'automation-and-control-systems',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Businesses and Services','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Businesses and Services"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Business and Strategy Consulting', // the term
'places_categories',//the taxonomy
array(
'description'=>'Business and Strategy Consulting',
'slug'=>'business-and-strategy-consulting',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Businesses and Services','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Businesses and Services"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Career Counseling', // the term
'places_categories',//the taxonomy
array(
'description'=>'Career Counseling',
'slug'=>'career-counseling',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Businesses and Services','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Businesses and Services"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Chemicals and Gasses', // the term
'places_categories',//the taxonomy
array(
'description'=>'Chemicals and Gasses',
'slug'=>'chemicals-and-gasses',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Businesses and Services','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Businesses and Services"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Computers', // the term
'places_categories',//the taxonomy
array(
'description'=>'Computers',
'slug'=>'computers',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Businesses and Services','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Businesses and Services"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Construction', // the term
'places_categories',//the taxonomy
array(
'description'=>'Construction',
'slug'=>'construction',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Businesses and Services','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Businesses and Services"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Corporate HQ', // the term
'places_categories',//the taxonomy
array(
'description'=>'Corporate HQ',
'slug'=>'corporate-hq',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Businesses and Services','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Businesses and Services"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Electrical Equipment', // the term
'places_categories',//the taxonomy
array(
'description'=>'Electrical Equipment',
'slug'=>'electrical-equipment',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Businesses and Services','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Businesses and Services"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Employment Agencies', // the term
'places_categories',//the taxonomy
array(
'description'=>'Employment Agencies',
'slug'=>'employment-agencies',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Businesses and Services','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Businesses and Services"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Engineering', // the term
'places_categories',//the taxonomy
array(
'description'=>'Engineering',
'slug'=>'engineering',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Businesses and Services','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Businesses and Services"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Entertainment', // the term
'places_categories',//the taxonomy
array(
'description'=>'Entertainment',
'slug'=>'entertainment',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Businesses and Services','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Businesses and Services"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Equipment Rental', // the term
'places_categories',//the taxonomy
array(
'description'=>'Equipment Rental',
'slug'=>'equipment-rental',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Businesses and Services','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Businesses and Services"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Events and Event Planning', // the term
'places_categories',//the taxonomy
array(
'description'=>'Events and Event Planning',
'slug'=>'events-and-event-planning',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Businesses and Services','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Businesses and Services"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Financial', // the term
'places_categories',//the taxonomy
array(
'description'=>'Financial',
'slug'=>'financial',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Businesses and Services','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Businesses and Services"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Food and Beverage', // the term
'places_categories',//the taxonomy
array(
'description'=>'Food and Beverage',
'slug'=>'food-and-beverage',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Businesses and Services','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Businesses and Services"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Funeral Services', // the term
'places_categories',//the taxonomy
array(
'description'=>'Funeral Services',
'slug'=>'funeral-services',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Businesses and Services','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Businesses and Services"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Geological', // the term
'places_categories',//the taxonomy
array(
'description'=>'Geological',
'slug'=>'geological',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Businesses and Services','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Businesses and Services"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Home Improvement', // the term
'places_categories',//the taxonomy
array(
'description'=>'Home Improvement',
'slug'=>'home-improvement',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Businesses and Services','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Businesses and Services"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Human Resources', // the term
'places_categories',//the taxonomy
array(
'description'=>'Human Resources',
'slug'=>'human-resources',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Businesses and Services','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Businesses and Services"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Import and Export', // the term
'places_categories',//the taxonomy
array(
'description'=>'Import and Export',
'slug'=>'import-and-export',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Businesses and Services','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Businesses and Services"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Industrial Machinery and Vehicles', // the term
'places_categories',//the taxonomy
array(
'description'=>'Industrial Machinery and Vehicles',
'slug'=>'industrial-machinery-and-vehicles',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Businesses and Services','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Businesses and Services"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Insurance', // the term
'places_categories',//the taxonomy
array(
'description'=>'Insurance',
'slug'=>'insurance',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Businesses and Services','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Businesses and Services"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Leather', // the term
'places_categories',//the taxonomy
array(
'description'=>'Leather',
'slug'=>'leather',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Businesses and Services','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Businesses and Services"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Legal', // the term
'places_categories',//the taxonomy
array(
'description'=>'Legal',
'slug'=>'legal',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Businesses and Services','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Businesses and Services"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Logging and Sawmills', // the term
'places_categories',//the taxonomy
array(
'description'=>'Logging and Sawmills',
'slug'=>'logging-and-sawmills',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Businesses and Services','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Businesses and Services"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Machine Shops', // the term
'places_categories',//the taxonomy
array(
'description'=>'Machine Shops',
'slug'=>'machine-shops',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Businesses and Services','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Businesses and Services"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Management', // the term
'places_categories',//the taxonomy
array(
'description'=>'Management',
'slug'=>'management',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Businesses and Services','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Businesses and Services"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Manufacturing', // the term
'places_categories',//the taxonomy
array(
'description'=>'Manufacturing',
'slug'=>'manufacturing',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Businesses and Services','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Businesses and Services"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Metals', // the term
'places_categories',//the taxonomy
array(
'description'=>'Metals',
'slug'=>'metals',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Businesses and Services','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Businesses and Services"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Packaging', // the term
'places_categories',//the taxonomy
array(
'description'=>'Packaging',
'slug'=>'packaging',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Businesses and Services','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Businesses and Services"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Paper', // the term
'places_categories',//the taxonomy
array(
'description'=>'Paper',
'slug'=>'paper',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Businesses and Services','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Businesses and Services"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Personal Care', // the term
'places_categories',//the taxonomy
array(
'description'=>'Personal Care',
'slug'=>'personal-care',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Businesses and Services','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Businesses and Services"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Petroleum', // the term
'places_categories',//the taxonomy
array(
'description'=>'Petroleum',
'slug'=>'petroleum',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Businesses and Services','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Businesses and Services"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Photography', // the term
'places_categories',//the taxonomy
array(
'description'=>'Photography',
'slug'=>'photography',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Businesses and Services','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Businesses and Services"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Plastics', // the term
'places_categories',//the taxonomy
array(
'description'=>'Plastics',
'slug'=>'plastics',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Businesses and Services','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Businesses and Services"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Printing, Copying and Signage', // the term
'places_categories',//the taxonomy
array(
'description'=>'Printing, Copying and Signage',
'slug'=>'printing,-copying-and-signage',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Businesses and Services','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Businesses and Services"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Professional Cleaning', // the term
'places_categories',//the taxonomy
array(
'description'=>'Professional Cleaning',
'slug'=>'professional-cleaning',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Businesses and Services','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Businesses and Services"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Publishing', // the term
'places_categories',//the taxonomy
array(
'description'=>'Publishing',
'slug'=>'publishing',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Businesses and Services','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Businesses and Services"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Real Estate', // the term
'places_categories',//the taxonomy
array(
'description'=>'Real Estate',
'slug'=>'real-estate',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Businesses and Services','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Businesses and Services"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Refrigeration and Ice', // the term
'places_categories',//the taxonomy
array(
'description'=>'Refrigeration and Ice',
'slug'=>'refrigeration-and-ice',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Businesses and Services','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Businesses and Services"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Renewable Energy', // the term
'places_categories',//the taxonomy
array(
'description'=>'Renewable Energy',
'slug'=>'renewable-energy',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Businesses and Services','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Businesses and Services"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Repair Services', // the term
'places_categories',//the taxonomy
array(
'description'=>'Repair Services',
'slug'=>'repair-services',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Businesses and Services','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Businesses and Services"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Rubber', // the term
'places_categories',//the taxonomy
array(
'description'=>'Rubber',
'slug'=>'rubber',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Businesses and Services','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Businesses and Services"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Scientific', // the term
'places_categories',//the taxonomy
array(
'description'=>'Scientific',
'slug'=>'scientific',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Businesses and Services','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Businesses and Services"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Security and Safety', // the term
'places_categories',//the taxonomy
array(
'description'=>'Security and Safety',
'slug'=>'security-and-safety',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Businesses and Services','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Businesses and Services"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Shipping, Freight, and Material Transportation', // the term
'places_categories',//the taxonomy
array(
'description'=>'Shipping, Freight, and Material Transportation',
'slug'=>'shipping,-freight,-and-material-transportation',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Businesses and Services','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Businesses and Services"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Storage', // the term
'places_categories',//the taxonomy
array(
'description'=>'Storage',
'slug'=>'storage',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Businesses and Services','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Businesses and Services"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Tailors', // the term
'places_categories',//the taxonomy
array(
'description'=>'Tailors',
'slug'=>'tailors',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Businesses and Services','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Businesses and Services"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Technology', // the term
'places_categories',//the taxonomy
array(
'description'=>'Technology',
'slug'=>'technology',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Businesses and Services','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Businesses and Services"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Telecommunication Services', // the term
'places_categories',//the taxonomy
array(
'description'=>'Telecommunication Services',
'slug'=>'telecommunication-services',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Businesses and Services','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Businesses and Services"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Textiles', // the term
'places_categories',//the taxonomy
array(
'description'=>'Textiles',
'slug'=>'textiles',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Businesses and Services','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Businesses and Services"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Translation Services', // the term
'places_categories',//the taxonomy
array(
'description'=>'Translation Services',
'slug'=>'translation-services',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Businesses and Services','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Businesses and Services"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Veterinarians', // the term
'places_categories',//the taxonomy
array(
'description'=>'Veterinarians',
'slug'=>'veterinarians',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Businesses and Services','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Businesses and Services"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Water and Waste Management', // the term
'places_categories',//the taxonomy
array(
'description'=>'Water and Waste Management',
'slug'=>'water-and-waste-management',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Businesses and Services','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Businesses and Services"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Welding', // the term
'places_categories',//the taxonomy
array(
'description'=>'Welding',
'slug'=>'welding',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Businesses and Services','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Businesses and Services"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Wholesale', // the term
'places_categories',//the taxonomy
array(
'description'=>'Wholesale',
'slug'=>'wholesale',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Community and Government','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Community and Government"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Animal Shelters and Humane Societies', // the term
'places_categories',//the taxonomy
array(
'description'=>'Animal Shelters and Humane Societies',
'slug'=>'animal-shelters-and-humane-societies',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Community and Government','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Community and Government"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Cemeteries', // the term
'places_categories',//the taxonomy
array(
'description'=>'Cemeteries',
'slug'=>'cemeteries',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Community and Government','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Community and Government"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Day Care and Preschools', // the term
'places_categories',//the taxonomy
array(
'description'=>'Day Care and Preschools',
'slug'=>'day-care-and-preschools',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Community and Government','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Community and Government"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Disabled Persons Services', // the term
'places_categories',//the taxonomy
array(
'description'=>'Disabled Persons Services',
'slug'=>'disabled-persons-services',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Community and Government','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Community and Government"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Drug and Alcohol Services', // the term
'places_categories',//the taxonomy
array(
'description'=>'Drug and Alcohol Services',
'slug'=>'drug-and-alcohol-services',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Community and Government','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Community and Government"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Education', // the term
'places_categories',//the taxonomy
array(
'description'=>'Education',
'slug'=>'education',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Community and Government','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Community and Government"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Government Departments and Agencies', // the term
'places_categories',//the taxonomy
array(
'description'=>'Government Departments and Agencies',
'slug'=>'government-departments-and-agencies',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Community and Government','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Community and Government"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Government Lobbyists', // the term
'places_categories',//the taxonomy
array(
'description'=>'Government Lobbyists',
'slug'=>'government-lobbyists',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Community and Government','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Community and Government"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Housing Assistance and Shelters', // the term
'places_categories',//the taxonomy
array(
'description'=>'Housing Assistance and Shelters',
'slug'=>'housing-assistance-and-shelters',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Community and Government','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Community and Government"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Law Enforcement and Public Safety', // the term
'places_categories',//the taxonomy
array(
'description'=>'Law Enforcement and Public Safety',
'slug'=>'law-enforcement-and-public-safety',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Community and Government','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Community and Government"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Libraries', // the term
'places_categories',//the taxonomy
array(
'description'=>'Libraries',
'slug'=>'libraries',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Community and Government','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Community and Government"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Military', // the term
'places_categories',//the taxonomy
array(
'description'=>'Military',
'slug'=>'military',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Community and Government','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Community and Government"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Organizations and Associations', // the term
'places_categories',//the taxonomy
array(
'description'=>'Organizations and Associations',
'slug'=>'organizations-and-associations',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Community and Government','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Community and Government"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Post Offices', // the term
'places_categories',//the taxonomy
array(
'description'=>'Post Offices',
'slug'=>'post-offices',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Community and Government','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Community and Government"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Public and Social Services', // the term
'places_categories',//the taxonomy
array(
'description'=>'Public and Social Services',
'slug'=>'public-and-social-services',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Community and Government','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Community and Government"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Religious', // the term
'places_categories',//the taxonomy
array(
'description'=>'Religious',
'slug'=>'religious',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Community and Government','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Community and Government"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Senior Citizen Services', // the term
'places_categories',//the taxonomy
array(
'description'=>'Senior Citizen Services',
'slug'=>'senior-citizen-services',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Community and Government','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Community and Government"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Utility Companies', // the term
'places_categories',//the taxonomy
array(
'description'=>'Utility Companies',
'slug'=>'utility-companies',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Healthcare','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Healthcare"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'AIDS Resources', // the term
'places_categories',//the taxonomy
array(
'description'=>'AIDS Resources',
'slug'=>'aids-resources',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Healthcare','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Healthcare"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Assisted Living Services', // the term
'places_categories',//the taxonomy
array(
'description'=>'Assisted Living Services',
'slug'=>'assisted-living-services',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Healthcare','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Healthcare"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Blood Banks and Centers', // the term
'places_categories',//the taxonomy
array(
'description'=>'Blood Banks and Centers',
'slug'=>'blood-banks-and-centers',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Healthcare','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Healthcare"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Chiropractors', // the term
'places_categories',//the taxonomy
array(
'description'=>'Chiropractors',
'slug'=>'chiropractors',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Healthcare','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Healthcare"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Dentists', // the term
'places_categories',//the taxonomy
array(
'description'=>'Dentists',
'slug'=>'dentists',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Healthcare','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Healthcare"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Emergency Services', // the term
'places_categories',//the taxonomy
array(
'description'=>'Emergency Services',
'slug'=>'emergency-services',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Healthcare','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Healthcare"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Holistic, Alternative and Naturopathic Medicine', // the term
'places_categories',//the taxonomy
array(
'description'=>'Holistic, Alternative and Naturopathic Medicine',
'slug'=>'holistic,-alternative-and-naturopathic-medicine',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Healthcare','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Healthcare"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Home Health Care Services', // the term
'places_categories',//the taxonomy
array(
'description'=>'Home Health Care Services',
'slug'=>'home-health-care-services',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Healthcare','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Healthcare"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Hospitals, Clinics and Medical Centers', // the term
'places_categories',//the taxonomy
array(
'description'=>'Hospitals, Clinics and Medical Centers',
'slug'=>'hospitals,-clinics-and-medical-centers',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Healthcare','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Healthcare"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Medical Supplies and Labs', // the term
'places_categories',//the taxonomy
array(
'description'=>'Medical Supplies and Labs',
'slug'=>'medical-supplies-and-labs',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Healthcare','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Healthcare"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Mental Health', // the term
'places_categories',//the taxonomy
array(
'description'=>'Mental Health',
'slug'=>'mental-health',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Healthcare','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Healthcare"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Nurses', // the term
'places_categories',//the taxonomy
array(
'description'=>'Nurses',
'slug'=>'nurses',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Healthcare','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Healthcare"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Optometrist', // the term
'places_categories',//the taxonomy
array(
'description'=>'Optometrist',
'slug'=>'optometrist',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Healthcare','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Healthcare"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Pharmacies', // the term
'places_categories',//the taxonomy
array(
'description'=>'Pharmacies',
'slug'=>'pharmacies',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Healthcare','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Healthcare"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Physical Therapy and Rehabilitation', // the term
'places_categories',//the taxonomy
array(
'description'=>'Physical Therapy and Rehabilitation',
'slug'=>'physical-therapy-and-rehabilitation',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Healthcare','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Healthcare"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Physicians', // the term
'places_categories',//the taxonomy
array(
'description'=>'Physicians',
'slug'=>'physicians',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Healthcare','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Healthcare"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Podiatrists', // the term
'places_categories',//the taxonomy
array(
'description'=>'Podiatrists',
'slug'=>'podiatrists',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Healthcare','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Healthcare"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Pregnancy and Sexual Health', // the term
'places_categories',//the taxonomy
array(
'description'=>'Pregnancy and Sexual Health',
'slug'=>'pregnancy-and-sexual-health',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Healthcare','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Healthcare"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Weight Loss and Nutritionists', // the term
'places_categories',//the taxonomy
array(
'description'=>'Weight Loss and Nutritionists',
'slug'=>'weight-loss-and-nutritionists',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Landmarks','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Landmarks"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Buildings and Structures', // the term
'places_categories',//the taxonomy
array(
'description'=>'Buildings and Structures',
'slug'=>'buildings-and-structures',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Landmarks','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Landmarks"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Gardens', // the term
'places_categories',//the taxonomy
array(
'description'=>'Gardens',
'slug'=>'gardens',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Landmarks','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Landmarks"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Historic and Protected Sites', // the term
'places_categories',//the taxonomy
array(
'description'=>'Historic and Protected Sites',
'slug'=>'historic-and-protected-sites',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Landmarks','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Landmarks"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Monuments and Memorials', // the term
'places_categories',//the taxonomy
array(
'description'=>'Monuments and Memorials',
'slug'=>'monuments-and-memorials',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Landmarks','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Landmarks"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Natural', // the term
'places_categories',//the taxonomy
array(
'description'=>'Natural',
'slug'=>'natural',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Landmarks','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Landmarks"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Parks', // the term
'places_categories',//the taxonomy
array(
'description'=>'Parks',
'slug'=>'parks',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Retail','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Retail"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Adult', // the term
'places_categories',//the taxonomy
array(
'description'=>'Adult',
'slug'=>'adult',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Retail','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Retail"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Antiques', // the term
'places_categories',//the taxonomy
array(
'description'=>'Antiques',
'slug'=>'antiques',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Retail','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Retail"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Arts and Crafts', // the term
'places_categories',//the taxonomy
array(
'description'=>'Arts and Crafts',
'slug'=>'arts-and-crafts',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Retail','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Retail"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Auctions', // the term
'places_categories',//the taxonomy
array(
'description'=>'Auctions',
'slug'=>'auctions',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Retail','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Retail"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Beauty Products', // the term
'places_categories',//the taxonomy
array(
'description'=>'Beauty Products',
'slug'=>'beauty-products',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Retail','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Retail"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Bicycles', // the term
'places_categories',//the taxonomy
array(
'description'=>'Bicycles',
'slug'=>'bicycles',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Retail','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Retail"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Bookstores', // the term
'places_categories',//the taxonomy
array(
'description'=>'Bookstores',
'slug'=>'bookstores',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Retail','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Retail"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Cards and Stationery', // the term
'places_categories',//the taxonomy
array(
'description'=>'Cards and Stationery',
'slug'=>'cards-and-stationery',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Retail','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Retail"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Children', // the term
'places_categories',//the taxonomy
array(
'description'=>'Children',
'slug'=>'children',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Retail','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Retail"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Computers and Electronics', // the term
'places_categories',//the taxonomy
array(
'description'=>'Computers and Electronics',
'slug'=>'computers-and-electronics',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Retail','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Retail"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Construction Supplies', // the term
'places_categories',//the taxonomy
array(
'description'=>'Construction Supplies',
'slug'=>'construction-supplies',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Retail','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Retail"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Convenience Stores', // the term
'places_categories',//the taxonomy
array(
'description'=>'Convenience Stores',
'slug'=>'convenience-stores',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Retail','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Retail"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Costumes', // the term
'places_categories',//the taxonomy
array(
'description'=>'Costumes',
'slug'=>'costumes',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Retail','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Retail"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Dance and Music', // the term
'places_categories',//the taxonomy
array(
'description'=>'Dance and Music',
'slug'=>'dance-and-music',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Retail','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Retail"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Department Stores', // the term
'places_categories',//the taxonomy
array(
'description'=>'Department Stores',
'slug'=>'department-stores',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Retail','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Retail"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Discount Stores', // the term
'places_categories',//the taxonomy
array(
'description'=>'Discount Stores',
'slug'=>'discount-stores',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Retail','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Retail"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Fashion', // the term
'places_categories',//the taxonomy
array(
'description'=>'Fashion',
'slug'=>'fashion',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Retail','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Retail"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Flea Markets', // the term
'places_categories',//the taxonomy
array(
'description'=>'Flea Markets',
'slug'=>'flea-markets',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Retail','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Retail"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Florists', // the term
'places_categories',//the taxonomy
array(
'description'=>'Florists',
'slug'=>'florists',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Retail','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Retail"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Food and Beverage', // the term
'places_categories',//the taxonomy
array(
'description'=>'Food and Beverage',
'slug'=>'food-and-beverage',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Retail','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Retail"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Furniture and Decor', // the term
'places_categories',//the taxonomy
array(
'description'=>'Furniture and Decor',
'slug'=>'furniture-and-decor',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Retail','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Retail"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Gift and Novelty', // the term
'places_categories',//the taxonomy
array(
'description'=>'Gift and Novelty',
'slug'=>'gift-and-novelty',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Retail','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Retail"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Glasses', // the term
'places_categories',//the taxonomy
array(
'description'=>'Glasses',
'slug'=>'glasses',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Retail','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Retail"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Hobby and Collectibles', // the term
'places_categories',//the taxonomy
array(
'description'=>'Hobby and Collectibles',
'slug'=>'hobby-and-collectibles',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Retail','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Retail"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Home Appliances', // the term
'places_categories',//the taxonomy
array(
'description'=>'Home Appliances',
'slug'=>'home-appliances',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Retail','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Retail"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Housewares', // the term
'places_categories',//the taxonomy
array(
'description'=>'Housewares',
'slug'=>'housewares',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Retail','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Retail"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Luggage', // the term
'places_categories',//the taxonomy
array(
'description'=>'Luggage',
'slug'=>'luggage',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Retail','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Retail"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Music, Video and DVD', // the term
'places_categories',//the taxonomy
array(
'description'=>'Music, Video and DVD',
'slug'=>'music,-video-and-dvd',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Retail','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Retail"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Newsstands', // the term
'places_categories',//the taxonomy
array(
'description'=>'Newsstands',
'slug'=>'newsstands',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Retail','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Retail"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Nurseries and Garden Centers', // the term
'places_categories',//the taxonomy
array(
'description'=>'Nurseries and Garden Centers',
'slug'=>'nurseries-and-garden-centers',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Retail','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Retail"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Office Supplies', // the term
'places_categories',//the taxonomy
array(
'description'=>'Office Supplies',
'slug'=>'office-supplies',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Retail','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Retail"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Outlet', // the term
'places_categories',//the taxonomy
array(
'description'=>'Outlet',
'slug'=>'outlet',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Retail','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Retail"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Party Supplies', // the term
'places_categories',//the taxonomy
array(
'description'=>'Party Supplies',
'slug'=>'party-supplies',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Retail','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Retail"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Pawn Shops', // the term
'places_categories',//the taxonomy
array(
'description'=>'Pawn Shops',
'slug'=>'pawn-shops',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Retail','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Retail"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Pets', // the term
'places_categories',//the taxonomy
array(
'description'=>'Pets',
'slug'=>'pets',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Retail','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Retail"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Photos and Frames', // the term
'places_categories',//the taxonomy
array(
'description'=>'Photos and Frames',
'slug'=>'photos-and-frames',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Retail','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Retail"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Shopping Centers and Malls', // the term
'places_categories',//the taxonomy
array(
'description'=>'Shopping Centers and Malls',
'slug'=>'shopping-centers-and-malls',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Retail','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Retail"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Sporting Goods', // the term
'places_categories',//the taxonomy
array(
'description'=>'Sporting Goods',
'slug'=>'sporting-goods',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Retail','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Retail"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Supermarkets and Groceries', // the term
'places_categories',//the taxonomy
array(
'description'=>'Supermarkets and Groceries',
'slug'=>'supermarkets-and-groceries',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Retail','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Retail"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Tobacco', // the term
'places_categories',//the taxonomy
array(
'description'=>'Tobacco',
'slug'=>'tobacco',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Retail','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Retail"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Toys', // the term
'places_categories',//the taxonomy
array(
'description'=>'Toys',
'slug'=>'toys',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Retail','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Retail"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Vintage and Thrift', // the term
'places_categories',//the taxonomy
array(
'description'=>'Vintage and Thrift',
'slug'=>'vintage-and-thrift',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Retail','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Retail"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Warehouses and Wholesale Stores', // the term
'places_categories',//the taxonomy
array(
'description'=>'Warehouses and Wholesale Stores',
'slug'=>'warehouses-and-wholesale-stores',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Retail','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Retail"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Wedding and Bridal', // the term
'places_categories',//the taxonomy
array(
'description'=>'Wedding and Bridal',
'slug'=>'wedding-and-bridal',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Social','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Social"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Arts', // the term
'places_categories',//the taxonomy
array(
'description'=>'Arts',
'slug'=>'arts',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Social','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Social"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Bars', // the term
'places_categories',//the taxonomy
array(
'description'=>'Bars',
'slug'=>'bars',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Social','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Social"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Country Clubs', // the term
'places_categories',//the taxonomy
array(
'description'=>'Country Clubs',
'slug'=>'country-clubs',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Social','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Social"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Entertainment', // the term
'places_categories',//the taxonomy
array(
'description'=>'Entertainment',
'slug'=>'entertainment',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Social','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Social"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Food and Dining', // the term
'places_categories',//the taxonomy
array(
'description'=>'Food and Dining',
'slug'=>'food-and-dining',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Social','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Social"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Wineries and Vineyards', // the term
'places_categories',//the taxonomy
array(
'description'=>'Wineries and Vineyards',
'slug'=>'wineries-and-vineyards',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Social','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Social"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Zoos, Aquariums and Wildlife Sanctuaries', // the term
'places_categories',//the taxonomy
array(
'description'=>'Zoos, Aquariums and Wildlife Sanctuaries',
'slug'=>'zoos,-aquariums-and-wildlife-sanctuaries',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Sports and Recreation','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Sports and Recreation"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Athletic Fields', // the term
'places_categories',//the taxonomy
array(
'description'=>'Athletic Fields',
'slug'=>'athletic-fields',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Sports and Recreation','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Sports and Recreation"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Baseball', // the term
'places_categories',//the taxonomy
array(
'description'=>'Baseball',
'slug'=>'baseball',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Sports and Recreation','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Sports and Recreation"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Basketball', // the term
'places_categories',//the taxonomy
array(
'description'=>'Basketball',
'slug'=>'basketball',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Sports and Recreation','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Sports and Recreation"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Combat Sports', // the term
'places_categories',//the taxonomy
array(
'description'=>'Combat Sports',
'slug'=>'combat-sports',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Sports and Recreation','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Sports and Recreation"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Cycling', // the term
'places_categories',//the taxonomy
array(
'description'=>'Cycling',
'slug'=>'cycling',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Sports and Recreation','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Sports and Recreation"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Dance', // the term
'places_categories',//the taxonomy
array(
'description'=>'Dance',
'slug'=>'dance',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Sports and Recreation','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Sports and Recreation"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Equestrian', // the term
'places_categories',//the taxonomy
array(
'description'=>'Equestrian',
'slug'=>'equestrian',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Sports and Recreation','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Sports and Recreation"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Football', // the term
'places_categories',//the taxonomy
array(
'description'=>'Football',
'slug'=>'football',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Sports and Recreation','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Sports and Recreation"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Golf', // the term
'places_categories',//the taxonomy
array(
'description'=>'Golf',
'slug'=>'golf',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Sports and Recreation','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Sports and Recreation"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Gun Ranges', // the term
'places_categories',//the taxonomy
array(
'description'=>'Gun Ranges',
'slug'=>'gun-ranges',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Sports and Recreation','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Sports and Recreation"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Gymnastics', // the term
'places_categories',//the taxonomy
array(
'description'=>'Gymnastics',
'slug'=>'gymnastics',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Sports and Recreation','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Sports and Recreation"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Gyms and Fitness Centers', // the term
'places_categories',//the taxonomy
array(
'description'=>'Gyms and Fitness Centers',
'slug'=>'gyms-and-fitness-centers',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Sports and Recreation','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Sports and Recreation"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Hockey', // the term
'places_categories',//the taxonomy
array(
'description'=>'Hockey',
'slug'=>'hockey',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Sports and Recreation','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Sports and Recreation"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Outdoors', // the term
'places_categories',//the taxonomy
array(
'description'=>'Outdoors',
'slug'=>'outdoors',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Sports and Recreation','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Sports and Recreation"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Paintball', // the term
'places_categories',//the taxonomy
array(
'description'=>'Paintball',
'slug'=>'paintball',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Sports and Recreation','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Sports and Recreation"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Personal Trainers', // the term
'places_categories',//the taxonomy
array(
'description'=>'Personal Trainers',
'slug'=>'personal-trainers',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Sports and Recreation','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Sports and Recreation"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Race Tracks', // the term
'places_categories',//the taxonomy
array(
'description'=>'Race Tracks',
'slug'=>'race-tracks',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Sports and Recreation','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Sports and Recreation"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Racquet Sports', // the term
'places_categories',//the taxonomy
array(
'description'=>'Racquet Sports',
'slug'=>'racquet-sports',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Sports and Recreation','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Sports and Recreation"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Recreation Centers', // the term
'places_categories',//the taxonomy
array(
'description'=>'Recreation Centers',
'slug'=>'recreation-centers',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Sports and Recreation','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Sports and Recreation"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Running', // the term
'places_categories',//the taxonomy
array(
'description'=>'Running',
'slug'=>'running',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Sports and Recreation','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Sports and Recreation"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Skating', // the term
'places_categories',//the taxonomy
array(
'description'=>'Skating',
'slug'=>'skating',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Sports and Recreation','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Sports and Recreation"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Snow Sports', // the term
'places_categories',//the taxonomy
array(
'description'=>'Snow Sports',
'slug'=>'snow-sports',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Sports and Recreation','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Sports and Recreation"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Soccer', // the term
'places_categories',//the taxonomy
array(
'description'=>'Soccer',
'slug'=>'soccer',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Sports and Recreation','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Sports and Recreation"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Sports Clubs', // the term
'places_categories',//the taxonomy
array(
'description'=>'Sports Clubs',
'slug'=>'sports-clubs',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Sports and Recreation','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Sports and Recreation"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Stadiums and Arenas', // the term
'places_categories',//the taxonomy
array(
'description'=>'Stadiums and Arenas',
'slug'=>'stadiums-and-arenas',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Sports and Recreation','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Sports and Recreation"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Swimming Pools', // the term
'places_categories',//the taxonomy
array(
'description'=>'Swimming Pools',
'slug'=>'swimming-pools',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Sports and Recreation','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Sports and Recreation"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Water Sports', // the term
'places_categories',//the taxonomy
array(
'description'=>'Water Sports',
'slug'=>'water-sports',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Sports and Recreation','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Sports and Recreation"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Yoga and Pilates', // the term
'places_categories',//the taxonomy
array(
'description'=>'Yoga and Pilates',
'slug'=>'yoga-and-pilates',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Transportation','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Transportation"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Airlines and Aviation Services', // the term
'places_categories',//the taxonomy
array(
'description'=>'Airlines and Aviation Services',
'slug'=>'airlines-and-aviation-services',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Transportation','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Transportation"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Gas Stations', // the term
'places_categories',//the taxonomy
array(
'description'=>'Gas Stations',
'slug'=>'gas-stations',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Transportation','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Transportation"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Parking', // the term
'places_categories',//the taxonomy
array(
'description'=>'Parking',
'slug'=>'parking',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Transportation','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Transportation"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Public Transportation Services', // the term
'places_categories',//the taxonomy
array(
'description'=>'Public Transportation Services',
'slug'=>'public-transportation-services',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Transportation','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Transportation"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Rest Areas', // the term
'places_categories',//the taxonomy
array(
'description'=>'Rest Areas',
'slug'=>'rest-areas',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Transportation','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Transportation"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Taxi and Car Services', // the term
'places_categories',//the taxonomy
array(
'description'=>'Taxi and Car Services',
'slug'=>'taxi-and-car-services',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Transportation','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Transportation"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Transport Hubs', // the term
'places_categories',//the taxonomy
array(
'description'=>'Transport Hubs',
'slug'=>'transport-hubs',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Travel','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Travel"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Cruises', // the term
'places_categories',//the taxonomy
array(
'description'=>'Cruises',
'slug'=>'cruises',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Travel','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Travel"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Lodging', // the term
'places_categories',//the taxonomy
array(
'description'=>'Lodging',
'slug'=>'lodging',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Travel','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Travel"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Tourist Information and Services', // the term
'places_categories',//the taxonomy
array(
'description'=>'Tourist Information and Services',
'slug'=>'tourist-information-and-services',
'parent'=>$parent_term_id
)
);}
$parent_term = term_exists('Travel','places_categories'); // array is returned if taxonomy is given
if($parent_term !== 0 && $parent_term !== null && $parent_term['term_id']=="Travel"){
}
else{
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
'Travel Agents and Tour Operators', // the term
'places_categories',//the taxonomy
array(
'description'=>'Travel Agents and Tour Operators',
'slug'=>'travel-agents-and-tour-operators',
'parent'=>$parent_term_id
)
);}
        
}
add_action ( 'after_switch_theme', 'create_my_places_cats' );
?>
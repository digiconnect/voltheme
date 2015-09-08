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

//opportunities categories
function opportunities_taxonomy() {  
    register_taxonomy(  
        'opportunities_categories',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces). 
        'opportunity',        //post type name
        array(  
            'hierarchical' => true,  
            'label' => 'Categories',  //Display name
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
            'label' => 'Categories',  //Display name
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
			'rewrite'	=> array( 'slug' => 'event', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'place', /* you can rename the slug here */
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
	$parent_term_id = $parent_term['term_id']; // get numeric term id
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
	$parent_term_id = $parent_term['term_id']; // get numeric term id
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
	$parent_term_id = $parent_term['term_id']; // get numeric term id
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
	$parent_term_id = $parent_term['term_id']; // get numeric term id
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
	$parent_term_id = $parent_term['term_id']; // get numeric term id
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
	$parent_term_id = $parent_term['term_id']; // get numeric term id
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
	$parent_term_id = $parent_term['term_id']; // get numeric term id
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
	$parent_term_id = $parent_term['term_id']; // get numeric term id
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
	$parent_term_id = $parent_term['term_id']; // get numeric term id
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
	$parent_term_id = $parent_term['term_id']; // get numeric term id
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
	$parent_term_id = $parent_term['term_id']; // get numeric term id
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
	$parent_term_id = $parent_term['term_id']; // get numeric term id
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
	$parent_term_id = $parent_term['term_id']; // get numeric term id
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
	$parent_term_id = $parent_term['term_id']; // get numeric term id
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
	$parent_term_id = $parent_term['term_id']; // get numeric term id
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
	$parent_term_id = $parent_term['term_id']; // get numeric term id
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
	$parent_term_id = $parent_term['term_id']; // get numeric term id
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
	$parent_term_id = $parent_term['term_id']; // get numeric term id
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
	$parent_term_id = $parent_term['term_id']; // get numeric term id
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
	$parent_term_id = $parent_term['term_id']; // get numeric term id
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
	$parent_term_id = $parent_term['term_id']; // get numeric term id
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
	$parent_term_id = $parent_term['term_id']; // get numeric term id
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
	$parent_term_id = $parent_term['term_id']; // get numeric term id
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
	$parent_term_id = $parent_term['term_id']; // get numeric term id
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
	$parent_term_id = $parent_term['term_id']; // get numeric term id
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
	$parent_term_id = $parent_term['term_id']; // get numeric term id
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
	$parent_term_id = $parent_term['term_id']; // get numeric term id
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
	$parent_term_id = $parent_term['term_id']; // get numeric term id
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
	$parent_term_id = $parent_term['term_id']; // get numeric term id
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
	$parent_term_id = $parent_term['term_id']; // get numeric term id
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
	$parent_term_id = $parent_term['term_id']; // get numeric term id
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
	$parent_term_id = $parent_term['term_id']; // get numeric term id
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
?>
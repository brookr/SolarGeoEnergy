<?php

/*-----------------------------------------------------------------------------------*/
/*	Create a new post type called slides
/*-----------------------------------------------------------------------------------*/

function tz_create_post_type_slides() 
{
	$labels = array(
		'name' => __( 'Slides'),
		'singular_name' => __( 'Slide' ),
		'add_new' => _x('Add New', 'slide'),
		'add_new_item' => __('Add New Slide'),
		'edit_item' => __('Edit Slide'),
		'new_item' => __('New Slide'),
		'view_item' => __('View Slide'),
		'search_items' => __('Search Slides'),
		'not_found' =>  __('No slides found'),
		'not_found_in_trash' => __('No slides found in Trash'), 
		'parent_item_colon' => ''
	  );
	  
	  $args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'query_var' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'rewrite' => array('slug' => __( 'slide' )),
		'supports' => array('title','editor','thumbnail','custom-fields')
	  ); 
	  
	  register_post_type(__( 'slide' ),$args);
}


/*-----------------------------------------------------------------------------------*/
/*	Create a new post type called portfolio
/*-----------------------------------------------------------------------------------*/

function tz_create_post_type_portfolios() 
{
	$labels = array(
		'name' => __( 'Portfolio'),
		'singular_name' => __( 'Portfolio' ),
		'add_new' => _x('Add New', 'slide'),
		'add_new_item' => __('Add New Portfolio'),
		'edit_item' => __('Edit Portfolio'),
		'new_item' => __('New Portfolio'),
		'view_item' => __('View Portfolio'),
		'search_items' => __('Search Portfolio'),
		'not_found' =>  __('No portfolios found'),
		'not_found_in_trash' => __('No portfolios found in Trash'), 
		'parent_item_colon' => ''
	  );
	  
	  $args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'query_var' => true,
		'rewrite' => array('slug' => __( 'portfolio' )),
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','editor','thumbnail','custom-fields','excerpt')
	  ); 
	  
	  register_post_type(__( 'portfolio' ),$args);
}


/*-----------------------------------------------------------------------------------*/
/*	Create custom taxonomies for the portfolio post type
/*-----------------------------------------------------------------------------------*/

function tz_build_taxonomies(){
	register_taxonomy(__( "skill-type" ), array(__( "portfolio" )), array("hierarchical" => true, "label" => __( "Skill Types" ), "singular_label" => __( "Skill Type" ), "rewrite" => array('slug' => 'skill-type', 'hierarchical' => true))); 
}
  
function tz_slide_edit_columns($columns){  

        $columns = array(  
            "cb" => "<input type=\"checkbox\" />",  
            "title" => __( 'Slide Title' )
        );  
  
        return $columns;  
}  
 

/*-----------------------------------------------------------------------------------*/
/*	Edit the portfolio columns
/*-----------------------------------------------------------------------------------*/

function tz_portfolio_edit_columns($columns){  

        $columns = array(  
            "cb" => "<input type=\"checkbox\" />",  
            "title" => __( 'Portfolio Item Title' ),
            "type" => __( 'type' )
        );  
  
        return $columns;  
}  

/*-----------------------------------------------------------------------------------*/
/*	Show the taxonomies within the columns
/*-----------------------------------------------------------------------------------*/

function tz_portfolio_custom_columns($column){  
        global $post;  
        switch ($column)  
        {    
            case __( 'type' ):  
                echo get_the_term_list($post->ID, __( 'skill-type' ), '', ', ','');  
                break;
        }  
}  

add_action( 'init', 'tz_create_post_type_slides' );
add_action( 'init', 'tz_create_post_type_portfolios' );
add_action( 'init', 'tz_build_taxonomies', 0 );
add_filter("manage_edit-slide_columns", "tz_slide_edit_columns");  
add_filter("manage_edit-portfolio_columns", "tz_portfolio_edit_columns");  
add_action("manage_posts_custom_column",  "tz_portfolio_custom_columns");  
?>
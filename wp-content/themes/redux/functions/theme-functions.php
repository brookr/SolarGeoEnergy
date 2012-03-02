<?php

/* These are functions specific to the included option settings and this theme */


/*-----------------------------------------------------------------------------------*/
/* Output Custom CSS from theme options
/*-----------------------------------------------------------------------------------*/

function tz_head_css() {

		$shortname =  get_option('tz_shortname'); 
		$output = '';
		
		$custom_css = get_option('tz_custom_css');
		
		if ($custom_css <> '') {
			$output .= $custom_css . "\n";
		}
		
		// Output styles
		if ($output <> '') {
			$output = "<!-- Custom Styling -->\n<style type=\"text/css\">\n" . $output . "</style>\n";
			echo $output;
		}
	
}

add_action('wp_head', 'tz_head_css');


/*-----------------------------------------------------------------------------------*/
/* Add Body Classes for Layout
/*-----------------------------------------------------------------------------------*/

add_filter('body_class','tz_body_class');
 
function tz_body_class($classes) {
	$shortname = get_option('tz_shortname');
	$layout = get_option($shortname .'_layout');
	if ($layout == '') {
		$layout = 'layout-2cr';
	}
	$classes[] = $layout;
	return $classes;
}


/*-----------------------------------------------------------------------------------*/
/* Add Favicon
/*-----------------------------------------------------------------------------------*/

function tz_favicon() {
	$shortname = get_option('tz_shortname');
	if (get_option($shortname . '_custom_favicon') != '') {
	echo '<link rel="shortcut icon" href="'. get_option('tz_custom_favicon') .'"/>'."\n";
	}
	else { ?>
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri() ?>/admin/images/favicon.ico" />
	<?php }
}

add_action('wp_head', 'tz_favicon');


/*-----------------------------------------------------------------------------------*/
/* Show analytics code in footer */
/*-----------------------------------------------------------------------------------*/

function tz_analytics(){
	$shortname =  get_option('tz_shortname');
	$output = get_option($shortname . '_google_analytics');
	if ( $output <> "" ) 
		echo stripslashes($output) . "\n";
}
add_action('wp_footer','tz_analytics');


/*-----------------------------------------------------------------------------------*/
/*	Helpful function to see if a number is a multiple of another number
/*-----------------------------------------------------------------------------------*/

function is_multiple($number, $multiple) 
{ 
    return ($number % $multiple) == 0; 
}

/*-----------------------------------------------------------------------------------*/
/*	Get related posts by taxonomy
/*-----------------------------------------------------------------------------------*/

function get_posts_related_by_taxonomy($post_id, $taxonomy, $args=array()) {
  $query = new WP_Query();
  $terms = wp_get_object_terms($post_id, $taxonomy);
  if (count($terms)) {
    // Assumes only one term for per post in this taxonomy
    $post_ids = get_objects_in_term($terms[0]->term_id,$taxonomy);
    $post = get_post($post_id);
    $args = wp_parse_args($args,array(
      'post_type' => $post->post_type, // The assumes the post types match
      'post__in' => $post_ids,
      'taxonomy' => $taxonomy,
      'term' => $terms[0]->slug,
	  'posts_per_page' => get_option('tz_related_portfolio_number')
    ));
    $query = new WP_Query($args);
  }
  return $query;
}

/*-----------------------------------------------------------------------------------*/
/* Show Slider JS if enabled from options
/*-----------------------------------------------------------------------------------*/

function tz_home_js() {
	
	if (is_page_template('template-home.php') ) {
		
		$autoplay = get_option('tz_slider_autoplay');
	
		?>
		
		<script type="text/javascript">

			jQuery(document).ready(function() {
					
				if (jQuery().slides) {
			
					jQuery('#slider').css({ display : 'block' });
						
					jQuery("#slider").slides({
						<?php if($autoplay != '') : ?>
						play: <?php echo $autoplay; ?>,
						<?php endif; ?>
						width: 940,
						generatePagination: false,
						autoHeight: true
					});	
					
				}
				
			});
	
		</script>
		
	<?php
	}
}

add_action('wp_head', 'tz_home_js');


/*-----------------------------------------------------------------------------------*/
/* Show Slider JS on Portfolio pages if enabled
/*-----------------------------------------------------------------------------------*/

function tz_portfolio_js() {
	
	if (get_post_type() == 'portfolio' ) { 
	
		$autoplay = get_option('tz_portfolio_slider_autoplay');
	
	?>
    	
        <script type="text/javascript">

			jQuery(document).ready(function() {
					
				if (jQuery().slides) {
			
					jQuery('#portfolio-slider').css({ display : 'block' });
						
					jQuery("#portfolio-slider").slides({
						width: 696,
						height: 500,
						<?php if($autoplay != '') : ?>
						play: <?php echo $autoplay; ?>,
						<?php endif; ?>
						generatePagination: false,
						autoHeight: true
					});
					
					jQuery('#left_arrow a, #right_arrow a').hover( 
		
						function() {
							jQuery(this).stop().animate({opacity: 1}, 200, 'jswing');	
						}, 
						function() {
							jQuery(this).stop().animate({opacity: 0.6}, 200, 'jswing');	
						}
					);

				}
				
			});
    
    	</script>
        
    <?php
	}
}

add_action('wp_head', 'tz_portfolio_js');

/*-----------------------------------------------------------------------------------*/
/*  Check video url functions
/*-----------------------------------------------------------------------------------*/

function tz_video($postid) {
	
	$video_url = get_post_meta($postid, 'tz_video_url', true);
	$height = get_post_meta($postid, 'tz_video_height', true);
	$embeded_code = get_post_meta($postid, 'tz_embed_code', true);
	
	if($height == '')
		$height = 500;

	if(trim($embeded_code) == '') 
	{
		
		if(preg_match('/youtube/', $video_url)) 
		{
			
			if(preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $video_url, $matches))
			{
				$output = '<iframe title="YouTube video player" class="youtube-player" type="text/html" width="696" height="'.$height.'" src="http://www.youtube.com/embed/'.$matches[1].'" frameborder="0" allowFullScreen></iframe>';
			}
			else 
			{
				$output = __('Sorry that seems to be an invalid <strong>YouTube</strong> URL. Please check it again.', 'framework');
			}
			
		}
		elseif(preg_match('/vimeo/', $video_url)) 
		{
			
			if(preg_match('~^http://(?:www\.)?vimeo\.com/(?:clip:)?(\d+)~', $video_url, $matches))
			{
				$output = '<iframe src="http://player.vimeo.com/video/'.$matches[1].'" width="696" height="'.$height.'" frameborder="0"></iframe>';
			}
			else 
			{
				$output = __('Sorry that seems to be an invalid <strong>Vimeo</strong> URL. Please check it again. Make sure there is a string of numbers at the end.', 'framework');
			}
			
		}
		else 
		{
			$output = __('Sorry that is an invalid YouTube or Vimeo URL.', 'framework');
		}
		
		echo $output;
		
	}
	else
	{
		echo stripslashes(htmlspecialchars_decode($embeded_code));
	}
	
}


/*-----------------------------------------------------------------------------------*/
/* Use the correct link if lightbox is on/off and include video if needed
/*-----------------------------------------------------------------------------------*/

function tz_lightbox($postid, $related = FALSE) {
	
	$lightbox = get_option('tz_lightbox');
	$link = get_post_meta($postid, 'tz_upload_image', true);
	$video = get_post_meta($postid, 'tz_video_url', true);
	$height = get_post_meta($postid, 'tz_video_height', true);
	$embed = trim(get_post_meta($postid, 'tz_embed_code', true));
	
	$lightbox_height = $height + 20;
	
	if(is_page_template('template-portfolio.php'))
	$thumb = get_the_post_thumbnail($postid, 'portfolio-one-col');
	
	if(is_page_template('template-portfolio-two-columns.php'))
	$thumb = get_the_post_thumbnail($postid, 'portfolio-two-col');
	
	if(is_page_template('template-portfolio-three-columns.php'))
	$thumb = get_the_post_thumbnail($postid, 'portfolio-three-col');
	
	if($related == TRUE)
	$thumb = get_the_post_thumbnail($postid, 'portfolio-three-col');
	
	if($thumb == '')
	{
		$thumb = '<img src="'.$thumb.'" alt="'.get_the_title().'" />';
	}
	
	if($lightbox == 'true')
	{
		$output = '<div class="plus"><span>&nbsp;</span></div>';
		
		if($embed != '')
		{
			$output .= '<a rel="prettyPhoto[gallery]" title="'.get_the_title($postid).'" href="'.get_template_directory_uri().'/includes/portfolio-video.php?id='.$postid.'&amp;iframe=true&amp;width=710&amp;height='. $lightbox_height .'">'.$thumb.'</a>';
		}
		elseif($video != '' && $embed == '') 
		{
			$output .= '<a rel="prettyPhoto[gallery]" title="'.get_the_title($postid).'" href="'.$video.'">'.$thumb.'</a>';
		}
		else
		{
			$output .= '<a rel="prettyPhoto[gallery]" title="'.get_the_title($postid).'" href="'.$link.'">'.$thumb.'</a>';
		}
		
	}
	else
	{	
		$output = '<a title="'.get_the_title($postid).'" href="'.get_permalink($postid).'">'.$thumb.'</a>';
	}
	
	echo $output;
}

/*-----------------------------------------------------------------------------------*/
/*	New menu walker for the page menu
/*-----------------------------------------------------------------------------------*/

class new_page_menu extends Walker {
	var $tree_type = 'page';
	var $db_fields = array ('parent' => 'post_parent', 'id' => 'ID'); //TODO: decouple this

	function start_lvl($output, $depth) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul>\n";
		return $output;
	}

	function end_lvl($output, $depth) {
		$indent = str_repeat("\t", $depth);
		$output .= "$indent</ul>\n";
		return $output;
	}

	function start_el($output, $page, $depth, $current_page, $args) {
		if ( $depth )
			$indent = str_repeat("\t", $depth);
		$css_class = 'page_item';
		$_current_page = get_page( $current_page );
		if ( $page->ID == $current_page )
			$css_class .= ' current_page_item';
		elseif ( $_current_page && $page->ID == $_current_page->post_parent )
			$css_class .= ' current_page_parent';

		$output .= $indent . '<li class="' . $css_class . '"><a href="' . get_page_link($page->ID) . '" title="' . esc_attr(apply_filters('the_title', $page->post_title)) . '"><span>' . apply_filters('the_title', $page->post_title) . '</span></a>';

		if ( !empty($show_date) ) {
			if ( 'modified' == $show_date )
				$time = $page->post_modified;
			else
				$time = $page->post_date;

			$output .= " " . mysql2date($date_format, $time);
		}

		return $output;
	}

	function end_el($output, $page, $depth) {
		$output .= "</li>\n";

		return $output;
	}

}

/*-----------------------------------------------------------------------------------*/
/*	New menu walker for the nav_menu menu
/*-----------------------------------------------------------------------------------*/

class menu_walker extends Walker_Nav_Menu
{
      function start_el(&$output, $item, $depth, $args)
      {
           global $wp_query;
           $indent = ( $depth ) ? str_repeat( "", $depth ) : '';

           $class_names = $value = '';

           $classes = empty( $item->classes ) ? array() : (array) $item->classes;

           $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
           $class_names = ' class="'. esc_attr( $class_names ) . '"';

           $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

           $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
           $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
           $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
           $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

           $prepend = '';
           $append = '';
           $description  = ! empty( $item->description ) ? '<span>'.esc_attr( $item->description ).'</span>' : '';

           if($depth != 0)
           {
                     $description = $append = $prepend = "";
           }

            $item_output = $args->before;
            $item_output .= '<a'. $attributes .'><span>';
            $item_output .= $args->link_before .$prepend.apply_filters( 'the_title', $item->title, $item->ID ).$append;
            $item_output .= '</span></a>';
            $item_output .= $args->after;

            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
            }
}

/*-----------------------------------------------------------------------------------*/
/*	New category walker for portfolio filter
/*-----------------------------------------------------------------------------------*/

class Walker_Category_Filter extends Walker_Category {
   function start_el(&$output, $category, $depth, $args) {
      extract($args);
      $cat_name = esc_attr( $category->name);
      $cat_name = apply_filters( 'list_cats', $cat_name, $category );
	  $link = '<a href="#" data-value="term-'.$category->term_id.'" ';
      if ( $use_desc_for_title == 0 || empty($category->description) )
         $link .= 'title="' . sprintf(__( 'View all items filed under %s' ), $cat_name) . '"';
      else
         $link .= 'title="' . esc_attr( strip_tags( apply_filters( 'category_description', $category->description, $category ) ) ) . '"';
      $link .= '>';
      // $link .= $cat_name . '</a>';
      $link .= $cat_name;
      if(!empty($category->description)) {
         $link .= ' <span>'.$category->description.'</span>';
      }
      $link .= '</a>';
      if ( (! empty($feed_image)) || (! empty($feed)) ) {
         $link .= ' ';
         if ( empty($feed_image) )
            $link .= '(';
         $link .= '<a href="' . get_category_feed_link($category->term_id, $feed_type) . '"';
         if ( empty($feed) )
            $alt = ' alt="' . sprintf(__( 'Feed for all posts filed under %s' ), $cat_name ) . '"';
         else {
            $title = ' title="' . $feed . '"';
            $alt = ' alt="' . $feed . '"';
            $name = $feed;
            $link .= $title;
         }
         $link .= '>';
         if ( empty($feed_image) )
            $link .= $name;
         else
            $link .= "<img src='$feed_image'$alt$title" . ' />';
         $link .= '</a>';
         if ( empty($feed_image) )
            $link .= ')';
      }
      if ( isset($show_count) && $show_count )
         $link .= ' (' . intval($category->count) . ')';
      if ( isset($show_date) && $show_date ) {
         $link .= ' ' . gmdate('Y-m-d', $category->last_update_timestamp);
      }
      if ( isset($current_category) && $current_category )
         $_current_category = get_category( $current_category );
      if ( 'list' == $args['style'] ) {
          $output .= '<li class="segment-'.rand(2, 99).'"';
          $class = 'cat-item cat-item-'.$category->term_id;
          if ( isset($current_category) && $current_category && ($category->term_id == $current_category) )
             $class .=  ' current-cat';
          elseif ( isset($_current_category) && $_current_category && ($category->term_id == $_current_category->parent) )
             $class .=  ' current-cat-parent';
          $output .=  '';
          $output .= ">$link\n";
       } else {
          $output .= "\t$link<br />\n";
       }
   }
}


?>

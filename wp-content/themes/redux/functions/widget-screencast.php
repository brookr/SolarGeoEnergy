<?php

/*-----------------------------------------------------------------------------------

	Plugin Name: Screencast
	Plugin URI: http://www.premiumpixels.com
	Description: A widget that allows the display of a single screencast in a lightbox.
	Version: 1.0
	Author: Orman Clark
	Author URI: http://www.premiumpixels.com

-----------------------------------------------------------------------------------*/

/*
 * Add function to widgets_init that'll load our widget.
 */
add_action( 'widgets_init', 'tz_screencast_widgets' );

/*
 * Register widget.
 */
function tz_screencast_widgets() {
	register_widget( 'TZ_Screencast_Widget' );
}

/*
 * Widget class.
 */
class tz_screencast_widget extends WP_Widget {


/*-----------------------------------------------------------------------------------*/
/*	Widget Setup
/*-----------------------------------------------------------------------------------*/
	
	function TZ_Screencast_Widget() {
	
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'tz_screencast_widget', 'description' => __('A widget that displays a screencast within a lightbox.', 'framework') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'tz_screencast_widget' );

		/* Create the widget. */
		$this->WP_Widget( 'tz_screencast_widget', __('Custom Screencast Widget', 'framework'), $widget_ops, $control_ops );
	}


/*-----------------------------------------------------------------------------------*/
/*	Display Widget
/*-----------------------------------------------------------------------------------*/
	
	function widget( $args, $instance ) {
		extract( $args );
		
		$title = apply_filters('widget_title', $instance['title'] );

		/* Our variables from the widget settings. */
		$desc = $instance['desc'];
		$link = $instance['link'];
		$image = $instance['image'];
		$caption = $instance['caption'];

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display Widget */
		?> 
        <?php /* Display the widget title if one was input (before and after defined by themes). */
				if ( $title )
					echo $before_title . $title . $after_title;
				?>
			<div class="tz-screencast">
                        
                <ul class="clearfix">
                
                    <li class="clearfix">
                        
                        <p><?php echo $desc; ?></p>

                        <div class="post-thumb">
                        	<div class="plus"><span>&nbsp;</span></div>
                            <a href="<?php echo $link; ?>" rel="prettyPhoto[gallery]">
                                <img src="<?php echo $image; ?>" alt="<?php echo $title; ?>" />
                            </a>
                        </div><!--image-->
                        
                        <p class="caption"><?php echo $caption; ?></p>
                        
                    </li>
                    
                </ul>
                 
            </div><!--screencast-->
		
		<?php

		/* After widget (defined by themes). */
		echo $after_widget;
	}


/*-----------------------------------------------------------------------------------*/
/*	Update Widget
/*-----------------------------------------------------------------------------------*/
	
	function update( $new_instance, $old_instance ) {
		
		$instance = $old_instance;
		
		/* Strip tags to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['desc'] = stripslashes( $new_instance['desc'] );
		$instance['link'] = strip_tags( $new_instance['link'] );
		$instance['image'] = strip_tags( $new_instance['image'] );
		$instance['caption'] = stripslashes( $new_instance['caption'] );

		/* No need to strip tags for.. */

		return $instance;
	}
	

/*-----------------------------------------------------------------------------------*/
/*	Widget Settings
/*-----------------------------------------------------------------------------------*/
	
	/**
	 * Displays the widget settings controls on the widget panel.
	 * Make use of the get_field_id() and get_field_name() function
	 * when creating your form elements. This handles the confusing stuff.
	 */
	 
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array(
		'title' => '',
		
		'desc' => '',
		'link' => '',
		'image' => '',
		'caption' => ''
		
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
		
        <!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'framework') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
        
		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'desc' ); ?>"><?php _e('Description:', 'framework') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'desc' ); ?>" name="<?php echo $this->get_field_name( 'desc' ); ?>" value="<?php echo stripslashes(htmlspecialchars(( $instance['desc'] ), ENT_QUOTES)); ?>" />
		</p>

		<!-- Description: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'link' ); ?>"><?php _e('Video Link:', 'framework') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'link' ); ?>" name="<?php echo $this->get_field_name( 'link' ); ?>" value="<?php echo $instance['link']; ?>" />
		</p>
        
        <p>
			<label for="<?php echo $this->get_field_id( 'image' ); ?>"><?php _e('Image (290 x any):', 'framework') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'image' ); ?>" name="<?php echo $this->get_field_name( 'image' ); ?>" value="<?php echo $instance['image']; ?>" />
		</p>
        
        <p>
			<label for="<?php echo $this->get_field_id( 'caption' ); ?>"><?php _e('Image Caption:', 'framework') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'caption' ); ?>" name="<?php echo $this->get_field_name( 'caption' ); ?>" value="<?php echo stripslashes(htmlspecialchars(( $instance['caption'] ), ENT_QUOTES)); ?>" />
		</p>
	
	<?php
	}
}
?>
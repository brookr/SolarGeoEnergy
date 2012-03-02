<?php

/*-----------------------------------------------------------------------------------

	Plugin Name: Testimonials
	Plugin URI: http://www.premiumpixels.com
	Description: A widget that allows the display of two testimonials.
	Version: 1.0
	Author: Orman Clark
	Author URI: http://www.premiumpixels.com

-----------------------------------------------------------------------------------*/

// Add function to widgets_init that'll load our widget.
add_action( 'widgets_init', 'tz_testimonials_widgets' );

// Register widget.
function tz_testimonials_widgets() {
	register_widget( 'TZ_Testimonials_Widget' );
}

// Widget class.
class tz_testimonials_widget extends WP_Widget {


/*-----------------------------------------------------------------------------------*/
/*	Widget Setup
/*-----------------------------------------------------------------------------------*/
	
	function TZ_Testimonials_Widget() {
	
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'tz_testimonials_widget', 'description' => __('A widget that displays two testimonials.', 'framework') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'tz_testimonials_widget' );

		/* Create the widget. */
		$this->WP_Widget( 'tz_testimonials_widget', __('Custom Testimonials Widget', 'framework'), $widget_ops, $control_ops );
	}


/*-----------------------------------------------------------------------------------*/
/*	Display Widget 
/*-----------------------------------------------------------------------------------*/
	
	function widget( $args, $instance ) {
		extract( $args );
		
		$title = apply_filters('widget_title', $instance['title'] );

		/* Our variables from the widget settings. */
		$link = $instance['link'] ;
		$name = $instance['name'];
		$role = $instance['role'];
		$image = $instance['image'];
		$desc = $instance['desc'];
		
		$link2 = $instance['link2']; 
		$name2 = $instance['name2'];
		$role2 = $instance['role2'];
		$image2 = $instance['image2'];
		$desc2 = $instance['desc2'];

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display Widget */
		?> 
        <?php /* Display the widget title if one was input (before and after defined by themes). */
				if ( $title )
					echo $before_title . $title . $after_title;
				?>
			<div class="tz-testimonials">
                        
                <ul class="clearfix">
                
                    <li class="clearfix">
                    
                        <div class="post-thumb"><img src="<?php echo $image; ?>" alt="<?php echo $title; ?>"></div><!--image-->
                        
                        <div class="entry-meta">
                        
                            <span class="name"><?php echo $name; ?></span>
                            <span class="role"><?php echo $role; ?></span>
                            <span class="site"><?php echo $link; ?></span>

                        </div>
                        
                        <p>"<?php echo $desc; ?>"</p>
                        
                    </li>
                    
                    <?php if($name2 != '') : ?>
                    <li class="clearfix">
                    
                        <div class="post-thumb"><img src="<?php echo $image2; ?>" alt="<?php echo $title; ?>"></div><!--image-->
                        
                        <div class="entry-meta">
                        
                            <span class="name"><?php echo $name2; ?></span>
                            <span class="role"><?php echo $role2; ?></span>
                            <span class="site"><?php echo $link2; ?></span>

                        </div>
                        
                        <p>"<?php echo $desc2; ?>"</p>
                        
                    </li>
                    <?php endif; ?>
                
                </ul>
            
            </div><!--testimonials_wodget-->
		
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
		
		$instance['link'] = strip_tags( $new_instance['link'] );
		$instance['name'] = strip_tags( $new_instance['name'] );
		$instance['role'] = strip_tags( $new_instance['role'] );
		$instance['image'] = strip_tags( $new_instance['image'] );
		$instance['desc'] = stripslashes( $new_instance['desc'] );
		
		$instance['link2'] = strip_tags( $new_instance['link2'] );
		$instance['name2'] = strip_tags( $new_instance['name2'] );
		$instance['role2'] = strip_tags( $new_instance['role2'] );
		$instance['image2'] = strip_tags( $new_instance['image2'] );
		$instance['desc2'] = stripslashes( $new_instance['desc2'] );

		/* No need to strip tags for.. */

		return $instance;
	}
	

/*-----------------------------------------------------------------------------------*/
/*	Widget Settings
/*-----------------------------------------------------------------------------------*/
	 
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array(
		'title' => '',
		
		'link' => '',
		'name' => '',
		'role' => '',
		'image' => '',
		'desc' => '',
		
		'link2' => '',
		'name2' => '',
		'role2' => '',
		'image2' => '',
		'desc2' => '',
		
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
		
        <!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'framework') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
        
        <hr>
        
		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'link' ); ?>"><?php _e('URL:', 'framework') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'link' ); ?>" name="<?php echo $this->get_field_name( 'link' ); ?>" value="<?php echo $instance['link']; ?>" />
		</p>
        
        <p>
			<label for="<?php echo $this->get_field_id( 'name' ); ?>"><?php _e('Name:', 'framework') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'name' ); ?>" name="<?php echo $this->get_field_name( 'name' ); ?>" value="<?php echo $instance['name']; ?>" />
		</p>
        
        <p>
			<label for="<?php echo $this->get_field_id( 'role' ); ?>"><?php _e('Role:', 'framework') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'role' ); ?>" name="<?php echo $this->get_field_name( 'role' ); ?>" value="<?php echo $instance['role']; ?>" />
		</p>
        
        <p>
			<label for="<?php echo $this->get_field_id( 'image' ); ?>"><?php _e('Image URL (55 x 55 px):', 'framework') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'image' ); ?>" name="<?php echo $this->get_field_name( 'image' ); ?>" value="<?php echo $instance['image']; ?>" />
		</p>
        
        <p>
			<label for="<?php echo $this->get_field_id( 'desc' ); ?>"><?php _e('Text:', 'framework') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'desc' ); ?>" name="<?php echo $this->get_field_name( 'desc' ); ?>" value="<?php echo $instance['desc']; ?>" />
		</p>
        
       	<hr>
        
        <p>
			<label for="<?php echo $this->get_field_id( 'link2' ); ?>"><?php _e('URL:', 'framework') ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'link2' ); ?>" name="<?php echo $this->get_field_name( 'link2' ); ?>" value="<?php echo $instance['link2']; ?>" />
		</p>
        
        <p>
			<label for="<?php echo $this->get_field_id( 'name2' ); ?>"><?php _e('Name:', 'framework') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'name2' ); ?>" name="<?php echo $this->get_field_name( 'name2' ); ?>" value="<?php echo $instance['name2']; ?>" />
		</p>
        
        <p>
			<label for="<?php echo $this->get_field_id( 'role2' ); ?>"><?php _e('Role:', 'framework') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'role2' ); ?>" name="<?php echo $this->get_field_name( 'role2' ); ?>" value="<?php echo $instance['role2']; ?>" />
		</p>
        
        <p>
			<label for="<?php echo $this->get_field_id( 'image2' ); ?>"><?php _e('Image URL:', 'framework') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'image2' ); ?>" name="<?php echo $this->get_field_name( 'image2' ); ?>" value="<?php echo $instance['image2']; ?>" />
		</p>
        
        <p>
			<label for="<?php echo $this->get_field_id( 'desc2' ); ?>"><?php _e('Text:', 'framework') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'desc2' ); ?>" name="<?php echo $this->get_field_name( 'desc2' ); ?>" value="<?php echo $instance['desc2']; ?>" />
		</p>
	
	<?php
	}
}
?>
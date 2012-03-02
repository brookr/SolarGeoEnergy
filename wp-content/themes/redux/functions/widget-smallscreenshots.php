<?php

/*-----------------------------------------------------------------------------------

	Plugin Name: Small Screenshot Widget
	Plugin URI: http://www.premiumpixels.com
	Description: A widget that allows the display of a series of screenshots using small thumbnails.
	Version: 1.0
	Author: Orman Clark
	Author URI: http://www.premiumpixels.com

-----------------------------------------------------------------------------------*/

// Add function to widgets_init that'll load our widget.
add_action( 'widgets_init', 'tz_smallscreenshots_widgets' );


// Register widget.
function tz_smallscreenshots_widgets() {
	register_widget( 'TZ_Smallscreenshots_Widget' );
}


// Widget class.
class tz_smallscreenshots_widget extends WP_Widget {


/*-----------------------------------------------------------------------------------*/
/*	Widget Setup
/*-----------------------------------------------------------------------------------*/
	
	function TZ_Smallscreenshots_Widget() {
	
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'tz_smallscreenshots_widget', 'description' => __('A widget that displays small thumbnails with lightbox.', 'framework') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'tz_smallscreenshots_widget' );

		/* Create the widget. */
		$this->WP_Widget( 'tz_smallscreenshots_widget', __('Custom Small Screenshots Widget', 'framework'), $widget_ops, $control_ops );
	}

/*-----------------------------------------------------------------------------------*/
/*	Display Widget
/*-----------------------------------------------------------------------------------*/
	
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$image_title = $instance['image_title'];
		$image_title2 = $instance['image_title2'];
		$image_title3 = $instance['image_title3'];
		$image_title4 = $instance['image_title4'];
		
		$image_thumb = $instance['image_thumb'];
		$image_thumb2 = $instance['image_thumb2'];
		$image_thumb3 = $instance['image_thumb3'];
		$image_thumb4 = $instance['image_thumb4'];
		
		$image_full = $instance['image_full'];
		$image_full2 = $instance['image_full2'];
		$image_full3 = $instance['image_full3'];
		$image_full4 = $instance['image_full4'];
		
		$desc  = $instance['desc'];
		$desc2 = $instance['desc2'];
		$desc3 = $instance['desc3'];
		$desc4 = $instance['desc4'];

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display Widget */
		?> 
                
			<div class="tz-small-screenshot">
     	
                <ul class="cleafix">
                	
                    <?php if($image_title != '') : ?>
                    
                    <li>
                    
                        <div class="post-thumb">
                        	<div class="plus"><span>&nbsp;</span></div>
                            <a href="<?php echo $image_full; ?>" rel="prettyPhoto[gallery]">
                                <img src="<?php echo $image_thumb; ?>" alt="<?php echo $image_title; ?>"/>
                            </a>
                        </div><!--image-->
                        
                        <div class="post-meta">
                        
                            <h3><?php echo $image_title; ?></h3>
                            <p><?php echo $desc; ?></p>
                        
                        </div><!--detail-->
                        
                    </li><!--item-->
                    
                    <?php endif; ?>
                    
                    <?php if($image_title2 != '') : ?>
                    
                    <li>
                    
                        <div class="post-thumb">
                        	<div class="plus"><span>&nbsp;</span></div>
                            <a href="<?php echo $image_full2; ?>" rel="prettyPhoto[gallery]">
                                <img src="<?php echo $image_thumb2; ?>" alt="<?php echo $image_title2; ?>"/>
                            </a>
                        </div><!--image-->
                        
                        <div class="post-meta">
                        
                            <h3><?php echo $image_title2; ?></h3>
                            <p><?php echo $desc2; ?></p>
                        
                        </div><!--detail-->
                        
                    </li><!--item-->
                    
                    <?php endif; ?>
                    
                    <?php if($image_title3 != '') : ?>
                    
                    <li>
                    
                        <div class="post-thumb">
                        	<div class="plus"><span>&nbsp;</span></div>
                            <a href="<?php echo $image_full3; ?>" rel="prettyPhoto[gallery]">
                                <img src="<?php echo $image_thumb3; ?>" alt="<?php echo $image_title3; ?>"/>
                            </a>
                        </div><!--image-->
                        
                        <div class="post-meta">
                        
                            <h3><?php echo $image_title3; ?></h3>
                            <p><?php echo $desc3; ?></p>
                        
                        </div><!--detail-->
                        
                    </li><!--item-->
                    
                    <?php endif; ?>
                    
                    <?php if($image_title4 != '') : ?>
                    
                    <li>
                    
                        <div class="post-thumb">
                        	<div class="plus"><span>&nbsp;</span></div>
                            <a href="<?php echo $image_full4; ?>" rel="prettyPhoto[gallery]">
                                <img src="<?php echo $image_thumb4; ?>" alt="<?php echo $image_title4; ?>"/>
                            </a>
                        </div><!--image-->
                        
                        <div class="post-meta">
                        
                            <h3><?php echo $image_title4; ?></h3>
                            <p><?php echo $desc4; ?></p>
                        
                        </div><!--detail-->
                        
                    </li><!--item-->
                    
                    <?php endif; ?>
                    
                 </ul>
            
            </div><!--widget-->
		
		<?php

		/* After widget (defined by themes). */
		echo $after_widget;
	}

/*-----------------------------------------------------------------------------------*/
/*	Update Widget
/*-----------------------------------------------------------------------------------*/
	
	function update( $new_instance, $old_instance ) {
		
		$instance = $old_instance;
		

		$instance['image_title']  = strip_tags( $new_instance['image_title'] );
		$instance['image_title2'] = strip_tags( $new_instance['image_title2'] );
		$instance['image_title3'] = strip_tags( $new_instance['image_title3'] );
		$instance['image_title4'] = strip_tags( $new_instance['image_title4'] );
				
		$instance['image_thumb'] = strip_tags( $new_instance['image_thumb'] );
		$instance['image_thumb2'] = strip_tags( $new_instance['image_thumb2'] );
		$instance['image_thumb3'] = strip_tags( $new_instance['image_thumb3'] );
		$instance['image_thumb4'] = strip_tags( $new_instance['image_thumb4'] );
				
		$instance['image_full'] = strip_tags( $new_instance['image_full'] );
		$instance['image_full2'] = strip_tags( $new_instance['image_full2'] );
		$instance['image_full3'] = strip_tags( $new_instance['image_full3'] );
		$instance['image_full4'] = strip_tags( $new_instance['image_full4'] );
				
		$instance['desc'] = stripslashes( $new_instance['desc'] );
		$instance['desc2'] = stripslashes( $new_instance['desc2'] );
		$instance['desc3'] = stripslashes( $new_instance['desc3'] );
		$instance['desc4'] = stripslashes( $new_instance['desc4'] );

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
		
		'image_title' => '',
		'desc' => '',
		'image_thumb' => '',
		'image_full' => '',
		
		'image_title2' => '',
		'desc2' => '',
		'image_thumb2' => '',
		'image_full2' => '',
		
		'image_title3' => '',
		'desc3' => '',
		'image_thumb3' => '',
		'image_full3' => '',
		
		'image_title4' => '',
		'desc4' => '',
		'image_thumb4' => '',
		'image_full4' => ''
		
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>


		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'image_title' ); ?>"><?php _e('Image Title:', 'framework') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'image_title' ); ?>" name="<?php echo $this->get_field_name( 'image_title' ); ?>" value="<?php echo $instance['image_title']; ?>" />
		</p>

		<!-- Description: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'desc' ); ?>"><?php _e('Short Description:', 'framework') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'desc' ); ?>" name="<?php echo $this->get_field_name( 'desc' ); ?>" value="<?php echo stripslashes(htmlspecialchars(( $instance['desc'] ), ENT_QUOTES)); ?>" />
		</p>
        
        <p>
			<label for="<?php echo $this->get_field_id( 'image_thumb' ); ?>"><?php _e('Thumbnail (55 x 55px):', 'framework') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'image_thumb' ); ?>" name="<?php echo $this->get_field_name( 'image_thumb' ); ?>" value="<?php echo $instance['image_thumb']; ?>" />
		</p>
        
        <p>
			<label for="<?php echo $this->get_field_id( 'image_full' ); ?>"><?php _e('Fullsize Image:', 'framework') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'image_full' ); ?>" name="<?php echo $this->get_field_name( 'image_full' ); ?>" value="<?php echo $instance['image_full']; ?>" />
		</p>
        
        <hr>
        
        
        
        
        <p>
			<label for="<?php echo $this->get_field_id( 'image_title2' ); ?>"><?php _e('Image Title:', 'framework') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'image_title2' ); ?>" name="<?php echo $this->get_field_name( 'image_title2' ); ?>" value="<?php echo $instance['image_title2']; ?>" />
		</p>

		<!-- Description: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'desc2' ); ?>"><?php _e('Short Description:', 'framework') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'desc2' ); ?>" name="<?php echo $this->get_field_name( 'desc2' ); ?>" value="<?php echo stripslashes(htmlspecialchars(( $instance['desc2'] ), ENT_QUOTES)); ?>" />
		</p>
        
        <p>
			<label for="<?php echo $this->get_field_id( 'image_thumb2' ); ?>"><?php _e('Thumbnail (55 x 55px):', 'framework') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'image_thumb2' ); ?>" name="<?php echo $this->get_field_name( 'image_thumb2' ); ?>" value="<?php echo $instance['image_thumb2']; ?>" />
		</p>
        
        <p>
			<label for="<?php echo $this->get_field_id( 'image_full2' ); ?>"><?php _e('Fullsize Image:', 'framework') ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'image_full2' ); ?>" name="<?php echo $this->get_field_name( 'image_full2' ); ?>" value="<?php echo $instance['image_full2']; ?>" />
		</p>
        
        <hr>
        
        
        
        <p>
			<label for="<?php echo $this->get_field_id( 'image_title3' ); ?>"><?php _e('Image Title:', 'framework') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'image_title3' ); ?>" name="<?php echo $this->get_field_name( 'image_title3' ); ?>" value="<?php echo $instance['image_title3']; ?>" />
		</p>

		<!-- Description: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'desc3' ); ?>"><?php _e('Short Description:', 'framework') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'desc3' ); ?>" name="<?php echo $this->get_field_name( 'desc3' ); ?>" value="<?php echo stripslashes(htmlspecialchars(( $instance['desc3'] ), ENT_QUOTES)); ?>" />
		</p>
        
        <p>
			<label for="<?php echo $this->get_field_id( 'image_thumb3' ); ?>"><?php _e('Thumbnail (55 x 55px):', 'framework') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'image_thumb3' ); ?>" name="<?php echo $this->get_field_name( 'image_thumb3' ); ?>" value="<?php echo $instance['image_thumb3']; ?>" />
		</p>
        
        <p>
			<label for="<?php echo $this->get_field_id( 'image_full3' ); ?>"><?php _e('Fullsize Image:', 'framework') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'image_full3' ); ?>" name="<?php echo $this->get_field_name( 'image_full3' ); ?>" value="<?php echo $instance['image_full3']; ?>" />
		</p>
        
        <hr>
        
        
        <p>
			<label for="<?php echo $this->get_field_id( 'image_title4' ); ?>"><?php _e('Image Title:', 'framework') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'image_title4' ); ?>" name="<?php echo $this->get_field_name( 'image_title4' ); ?>" value="<?php echo $instance['image_title4']; ?>" />
		</p>

		<!-- Description: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'desc4' ); ?>"><?php _e('Short Description:', 'framework') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'desc4' ); ?>" name="<?php echo $this->get_field_name( 'desc4' ); ?>" value="<?php echo stripslashes(htmlspecialchars(( $instance['desc4'] ), ENT_QUOTES)); ?>" />
		</p>
        
        <p>
			<label for="<?php echo $this->get_field_id( 'image_thumb4' ); ?>"><?php _e('Thumbnail (55 x 55px):', 'framework') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'image_thumb4' ); ?>" name="<?php echo $this->get_field_name( 'image_thumb4' ); ?>" value="<?php echo $instance['image_thumb4']; ?>" />
		</p>
        
        <p>
			<label for="<?php echo $this->get_field_id( 'image_full4' ); ?>"><?php _e('Fullsize Image:', 'framework') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'image_full4' ); ?>" name="<?php echo $this->get_field_name( 'image_full4' ); ?>" value="<?php echo $instance['image_full4']; ?>" />
		</p>
        
        <hr>
	
	<?php
	}
}
?>
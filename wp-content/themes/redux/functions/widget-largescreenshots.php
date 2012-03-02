<?php

/*-----------------------------------------------------------------------------------

	Plugin Name: Large Screenshot Widget
	Plugin URI: http://www.premiumpixels.com
	Description: A widget that allows the display screenshots with a large thumbnail.
	Version: 1.0
	Author: Orman Clark
	Author URI: http://www.premiumpixels.com

-----------------------------------------------------------------------------------*/


// Add function to widgets_init that'll load our widget.
add_action( 'widgets_init', 'tz_largescreenshots_widgets' );


// Register widget.
function tz_largescreenshots_widgets() {
	register_widget( 'TZ_Largescreenshots_Widget' );
}

// Widget class.
class tz_largescreenshots_widget extends WP_Widget {


/*-----------------------------------------------------------------------------------*/
/*	Widget Setup
/*-----------------------------------------------------------------------------------*/
	
	function TZ_Largescreenshots_Widget() {
	
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'tz_largescreenshots_widget', 'description' => __('A widget that displays large thumbnails with lightbox.', 'framework') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'tz_largescreenshots_widget' );

		/* Create the widget. */
		$this->WP_Widget( 'tz_largescreenshots_widget', __('Custom Large Screenshots Widget', 'framework'), $widget_ops, $control_ops );
	}


/*-----------------------------------------------------------------------------------*/
/*	Display Widget
/*-----------------------------------------------------------------------------------*/
	
	function widget( $args, $instance ) {
		extract( $args );
		
		$title = apply_filters('widget_title', $instance['title'] );

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
		
		$caption  = $instance['caption'];
		$caption2 = $instance['caption2'];
		$caption3 = $instance['caption3'];
		$caption4 = $instance['caption4'];

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display Widget */
		?> 
        <?php /* Display the widget title if one was input (before and after defined by themes). */
				if ( $title )
					echo $before_title . $title . $after_title;
				?>
			<div class="tz-large-screenshot">  	
                <ul class="clearfix">
                	
                    <?php if($image_title != '') : ?>
                    
                    <li class="clearfix">
                    
                        <div class="post-thumb">
                        	<span class="plus"><span>&nbsp;</span></span>
                            <a href="<?php echo $image_full; ?>" rel="prettyPhoto[gallery]">
                                <img src="<?php echo $image_thumb; ?>" alt="<?php echo $image_title; ?>"/>
                            </a>
                        </div><!--post-thumb-->
                        
                        <p class="caption"><?php echo $caption; ?></p>
                        
                    </li><!--item-->
                    
                    <?php endif; ?>
                    
                    <?php if($image_title2 != '') : ?>
                    
                    <li class="clearfix">
                    
                        <div class="post-thumb">
                        	<span class="plus"><span>&nbsp;</span></span>
                            <a href="<?php echo $image_full2; ?>" rel="prettyPhoto[gallery]">
                                <img src="<?php echo $image_thumb2; ?>" alt="<?php echo $image_title2; ?>"/>
                            </a>
                        </div><!--image-->
                        
                        <p class="caption"><?php echo $caption2; ?></p>
                        
                    </li><!--item-->
                    
                    <?php endif; ?>
                    
                    <?php if($image_title3 != '') : ?>
                    
                    <li class="clearfix">
                    
                        <div class="post-thumb">
                        	<span class="plus"><span>&nbsp;</span></span>
                            <a href="<?php echo $image_full3; ?>" rel="prettyPhoto[gallery]">
                                <img src="<?php echo $image_thumb3; ?>" alt="<?php echo $image_title3; ?>"/>
                            </a>
                        </div><!--image-->
                        
                        <p class="caption"><?php echo $caption3; ?></p>
                        
                    </li><!--item-->
                    
                    <?php endif; ?>
                    
                    <?php if($image_title4 != '') : ?>
                    
                    <li class="clearfix">
                    
                        <div class="post-thumb">
                        	<span class="plus"><span>&nbsp;</span></span>
                            <a href="<?php echo $image_full4; ?>" rel="prettyPhoto[gallery]">
                                <img src="<?php echo $image_thumb4; ?>" alt="<?php echo $image_title4; ?>"/>
                            </a>
                        </div><!--post-thumb-->
                        
                        <p class="caption"><?php echo $caption4; ?></p>
                        
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
		
		/* Strip tags to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );
		
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
				
		$instance['caption'] = stripslashes( $new_instance['caption'] );
		$instance['caption2'] = stripslashes( $new_instance['caption2'] );
		$instance['caption3'] = stripslashes( $new_instance['caption3'] );
		$instance['caption4'] = stripslashes( $new_instance['caption4'] );

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
		
		'image_title' => '',
		'caption' => '',
		'image_thumb' => '',
		'image_full' => '',
		
		'image_title2' => '',
		'caption2' => '',
		'image_thumb2' => '',
		'image_full2' => '',
		
		'image_title3' => '',
		'caption3' => '',
		'image_thumb3' => '',
		'image_full3' => '',
		
		'image_title4' => '',
		'caption4' => '',
		'image_thumb4' => '',
		'image_full4' => ''
		
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
			<label for="<?php echo $this->get_field_id( 'image_title' ); ?>"><?php _e('Image Title:', 'framework') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'image_title' ); ?>" name="<?php echo $this->get_field_name( 'image_title' ); ?>" value="<?php echo $instance['image_title']; ?>" />
		</p>

		<!-- Description: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'caption' ); ?>"><?php _e('Short Description:', 'framework') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'caption' ); ?>" name="<?php echo $this->get_field_name( 'caption' ); ?>" value="<?php echo stripslashes(htmlspecialchars(( $instance['caption'] ), ENT_QUOTES)); ?>" />
		</p>
        
        <p>
			<label for="<?php echo $this->get_field_id( 'image_thumb' ); ?>"><?php _e('Thumbnail (290px wide):', 'framework') ?></label>
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
			<label for="<?php echo $this->get_field_id( 'caption2' ); ?>"><?php _e('Short Description:', 'framework') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'caption2' ); ?>" name="<?php echo $this->get_field_name( 'caption2' ); ?>" value="<?php echo stripslashes(htmlspecialchars(( $instance['caption2'] ), ENT_QUOTES)); ?>" />
		</p>
        
        <p>
			<label for="<?php echo $this->get_field_id( 'image_thumb2' ); ?>"><?php _e('Thumbnail (290px wide):', 'framework') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'image_thumb2' ); ?>" name="<?php echo $this->get_field_name( 'image_thumb2' ); ?>" value="<?php echo $instance['image_thumb2']; ?>" />
		</p>
        
        <p>
			<label for="<?php echo $this->get_field_id( 'image_full2' ); ?>"><?php _e('Fullsize Image:', 'framework') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'image_full2' ); ?>" name="<?php echo $this->get_field_name( 'image_full2' ); ?>" value="<?php echo $instance['image_full2']; ?>" />
		</p>
        
        <hr>
        
        
        
        <p>
			<label for="<?php echo $this->get_field_id( 'image_title3' ); ?>"><?php _e('Image Title:', 'framework') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'image_title3' ); ?>" name="<?php echo $this->get_field_name( 'image_title3' ); ?>" value="<?php echo $instance['image_title3']; ?>" />
		</p>

		<!-- Description: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'caption3' ); ?>"><?php _e('Short Description:', 'framework') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'caption3' ); ?>" name="<?php echo $this->get_field_name( 'caption3' ); ?>" value="<?php echo stripslashes(htmlspecialchars(( $instance['caption3'] ), ENT_QUOTES)); ?>" />
		</p>
        
        <p>
			<label for="<?php echo $this->get_field_id( 'image_thumb3' ); ?>"><?php _e('Thumbnail (290px wide):', 'framework') ?></label>
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
			<label for="<?php echo $this->get_field_id( 'caption4' ); ?>"><?php _e('Short Description:', 'framework') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'caption4' ); ?>" name="<?php echo $this->get_field_name( 'caption4' ); ?>" value="<?php echo stripslashes(htmlspecialchars(( $instance['caption4'] ), ENT_QUOTES)); ?>" />
		</p>
        
        <p>
			<label for="<?php echo $this->get_field_id( 'image_thumb4' ); ?>"><?php _e('Thumbnail (290px wide):', 'framework') ?></label>
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
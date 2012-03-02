<?php

/*-----------------------------------------------------------------------------------

	Plugin Name: Email Subscriber
	Plugin URI: http://www.premiumpixels.com
	Description: A widget that allows users to subscribe via email.
	Version: 1.0
	Author: Orman Clark
	Author URI: http://www.premiumpixels.com

-----------------------------------------------------------------------------------*/


// Add function to widgets_init that'll load our widget.
add_action( 'widgets_init', 'tz_subscribe_widgets' );


// Register widget.
function tz_subscribe_widgets() {
	register_widget( 'TZ_Subscribe_Widget' );
}

// Widget class.
class tz_subscribe_widget extends WP_Widget {


/*-----------------------------------------------------------------------------------*/
/*	Widget Setup
/*-----------------------------------------------------------------------------------*/
	
	function TZ_Subscribe_Widget() {
	
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'tz_subscribe_widget', 'description' => __('A widget that gathers email addresses.', 'framework') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'tz_subscribe_widget' );

		/* Create the widget. */
		$this->WP_Widget( 'tz_subscribe_widget', __('Custom Subscribe Widget', 'framework'), $widget_ops, $control_ops );
	}


/*-----------------------------------------------------------------------------------*/
/*	Display Widget
/*-----------------------------------------------------------------------------------*/
	
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$desc = $instance['desc'];

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display Widget */
		?>
        	<script type="text/javascript">
			jQuery(document).ready(function() {
				
				jQuery("#newsletterForm").submit(function() {
					
					jQuery('#newsletterForm .loader').html('<img src="<?php echo get_template_directory_uri(); ?>/images/ajax-loader.gif" alt="Loading..." />');
					jQuery('.result').load('<?php echo get_template_directory_uri(); ?>/functions/subscribe_save.php', {email: jQuery('#tz_subscribe').val()},
					function() {
						jQuery(this).fadeIn(200);
						jQuery('#newsletterForm .loader').html('');
					});

					return false;

				});
				
			});
			
			</script>
			<div class="tz-subscribe">
                
                <?php /* Display the widget title if one was input (before and after defined by themes). */
				if ( $title )
					echo $before_title . $title . $after_title;
				?>
                
                <p><?php echo $desc; ?></p>

                <form id="newsletterForm" action="#" method="post">
                    
                    <div class="input_bg">
                        <span class="input_bg_left">
                            <input onfocus="if(this.value=='<?php _e("enter your email address", "framework"); ?>')this.value='';" 
onblur="if(this.value=='')this.value='<?php _e("enter your email address", "framework"); ?>';" value="<?php _e("enter your email address", "framework"); ?>" type="text" class="email" name="tz_subscribe" id="tz_subscribe" />
							<span class="loader"></span>
                            <span class="right"><button type="submit" name="newsletter_submit" class="inside"><?php _e("subscribe", "framework"); ?></button></span>
                        </span>
                    </div><!--input_bg-->
                	
                    
                    
                </form>

                <div class="result"></div>
                
            </div><!--subscribe_widget-->
		
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
		
		/* Stripslashes for html inputs */
		$instance['desc'] = stripslashes( $new_instance['desc']);

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
		'desc' => '',
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'framework') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>

		<!-- Description: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'desc' ); ?>"><?php _e('Short Description:', 'framework') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'desc' ); ?>" name="<?php echo $this->get_field_name( 'desc' ); ?>" value="<?php echo stripslashes(htmlspecialchars(( $instance['desc'] ), ENT_QUOTES)); ?>" />
		</p>
		
	<?php
	}
}
?>
<?php
/*
Template Name: Home
*/
?>

<?php get_header(); ?>
	
    <!--BEGIN #home-top .clearfix-->
	<div id="home-top" class="clearfix">
    	
    	<!--BEGIN .home-column-->
        <div class="home-column">
            <?php	/* Widgetised Area */	if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Homepage Middle Left') ) ?>
        <!--END .home-column-->   
        </div>
        
        <!--BEGIN .home-column-->
        <div class="home-column">
            <?php	/* Widgetised Area */	if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Homepage Middle Center') ) ?>
        <!--END .home-column-->   
        </div>
        
        <!--BEGIN .home-column-->
        <div class="home-column">
            <?php	/* Widgetised Area */	if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Homepage Middle Right') ) ?>
        <!--END .home-column-->   
        </div>
    
    <!--END #home-top .clearfix-->
    </div>
    
    <?php if(get_option('tz_enable_callout') == 'true') : //if the callout box is enabled ?>
    
    <!--BEGIN #home-callout -->
	<div id="home-callout">
    
    	<div class="call_out">
            	
            <div class="wrap clearfix">
                
                <div class="detail">
                    <h5><?php echo stripslashes(get_option('tz_callout_title')); ?></h5>
                    <p><?php echo stripslashes(get_option('tz_callout_caption')); ?></p>
                </div>
                
                <?php $show_button = get_option('tz_callout_button'); ?>
                
                <?php if($show_button != '') : ?>
                <div class="right">
                    <a href="<?php echo get_option('tz_callout_link'); ?>" class="alt_btn right"><span><?php echo stripslashes($show_button); ?></span></a>
                </div>
                <?php endif; ?>
            
            </div><!--wrap-->
        
        </div><!--call_out-->
    
    <!--END #home-callout .clearfix-->
    </div>
    
    <?php endif; // end if callout box is true ?>
    
    <!--BEGIN #home-bottom .clearfix-->
	<div id="home-bottom" class="clearfix">
    	
    	<!--BEGIN .home-column-->
        <div class="home-column">
            <?php	/* Widgetised Area */	if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Homepage Bottom Left') ) ?>
        <!--END .home-column-->   
        </div>
        
        <!--BEGIN .home-column-->
        <div class="home-column">
            <?php	/* Widgetised Area */	if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Homepage Bottom Center') ) ?>
        <!--END .home-column-->   
        </div>
        
        <!--BEGIN .home-column-->
        <div class="home-column">
            <?php	/* Widgetised Area */	if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Homepage Bottom Right') ) ?>
        <!--END .home-column-->   
        </div>
        
    <!--END #home-bottom .clearfix-->
    </div>


<?php get_footer(); ?>
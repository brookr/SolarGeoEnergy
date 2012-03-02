<!DOCTYPE html>

<!-- BEGIN html -->
<html <?php language_attributes(); ?>>
<!-- An Orman Clark design (http://www.premiumpixels.com) - Proudly powered by WordPress (http://wordpress.org) -->

<!-- BEGIN head -->
<head>

	<!-- Meta Tags -->
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=1075, maximum-scale=1.5" />
	
	<!-- Title -->
	<title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
	
	<!-- Stylesheets -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/admin/css/prettyPhoto.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/<?php echo get_option('tz_alt_stylesheet'); ?>" type="text/css" media="screen" />
	
	<!-- RSS & Pingbacks -->
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?> RSS Feed" href="<?php if (get_option('tz_feedburner')) { echo get_option('tz_feedburner'); } else { bloginfo( 'rss2_url' ); } ?>" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    
    <!--[if lte IE 7]>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/ie/ie7.css" type="text/css" media="screen" />
    <![endif]-->
    
	<?php wp_head(); ?>
 
<!-- END head -->
</head>

<!-- BEGIN body -->
<body <?php body_class(); ?>>

	<!-- BEGIN #container -->
	<div id="container">
	
		<!-- BEGIN #header -->
		<div id="header">
        	
            <!-- BEGIN #header-inner -->
        	<div id="header-inner" class="clearfix">
            	
                <!-- BEGIN #header-top .clearfix -->
            	<div id="header-top" class="clearfix">
			
                    <!-- BEGIN #logo -->
                    <div id="logo">
                        <?php /*
                        If "plain text logo" is set in theme options then use text
                        if a logo url has been set in theme options then use that
                        if none of the above then use the default logo.png */
                        if (get_option('tz_plain_logo') == 'true') { ?>
                        <a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a>
                        <p id="tagline"><?php bloginfo( 'description' ); ?></p>
                        <?php } elseif (get_option('tz_logo')) { ?>
                        <a href="<?php echo home_url(); ?>"><img src="<?php echo get_option('tz_logo'); ?>" alt="<?php bloginfo( 'name' ); ?>"/></a>
                        <?php } else { ?>
                        <a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="<?php bloginfo( 'name' ); ?>" width="225" height="30" /></a>
                        <?php } ?>
                    <!-- END #logo -->
                    </div>
                    
                    <!-- BEGIN #primary-nav -->
                    <div id="primary-nav">
                        <?php if ( has_nav_menu( 'primary-menu' ) ) { /* if menu location 'primary-menu' exists then use custom menu */ ?>
                        
                        <?php wp_nav_menu( array( 'theme_location' => 'primary-menu', 'menu_class' => 'sf-menu', 'container' => '', 'walker' => new menu_walker() ) ); ?>
                        <?php } else { /* else use wp_list_pages */?>
                        <ul class="sf-menu">
                            <?php wp_list_pages( array( 'exclude' => get_option('tz_primary_nav_exclude'), 'title_li' => '', 'sort_column' => get_option('tz_primary_nav_order'), 'walker' => new new_page_menu() )); ?>
                        </ul>
                        <?php } ?>
                    <!-- END #primary-nav -->
                    </div>
                
                <!-- END #header-top .clearfix -->
                </div>
            
				<?php if(is_page_template('template-home.php')) : // if using the home template ?>
                
                <?php include 'includes/header-slider.php'; // include the slider ?>
                
                <?php else: // else if not home template ?>
                
                <!-- BEGIN #header-title-wrap .clearfix -->
                <div id="header-title-wrap" class="clearfix">
                	<?php include 'includes/header-title.php'; ?>
                <!-- END #header-title-wrap .clearfix -->
				</div>
				<?php endif; ?>
                
            <!-- END #header-inner -->
            </div>
			
		<!--END #header-->
		</div>
        
        <div class="line-effect">&nbsp;</div>
        
        <?php if(is_page_template('template-home.php')) : // if using the home template  ?>
        
        <?php include 'includes/home-featured.php'; // include the featured widget area ?>
        
        <?php else: ?>

        <!--BEGIN .cotton-area-->
        <div id="featured-area" class="cotton-area clearfix">
        
            <div class="cotton-top">&nbsp;</div>
                
            <!--BEGIN .cotton-inner-->
            <div class="cotton-inner clearfix">
                
                <?php if ( function_exists('yoast_breadcrumb') ) : // if yoast breadcrumb plugin activated ?> 
                <!--BEGIN #breadcrumb-->
                <div id="breadcrumb">
                    <p><?php yoast_breadcrumb(); ?></p>
                <!--END #breadcrumb-->
                </div>
                <?php endif; ?>
                
                <?php if(get_option('tz_global_tagline') != '') : // if the global tagline is not empty ?>
                <!--BEGIN #global-tagline-->
                <div id="global-tagline">
                    <p><?php echo stripslashes(get_option('tz_global_tagline')); ?></p>
                <!--END #global-tagline-->
                </div>
                <?php endif; ?>
            
            <!--END .cotton-inner-->
            </div>
            
            <div class="cotton-bottom">&nbsp;</div>
            
        <!--END .cotton-area-->
        </div>
        
        <?php endif; // end if template home ?>
        
        <div id="body-detail">&nbsp;</div>

		<!--BEGIN #content -->
		<div id="content" class="clearfix">
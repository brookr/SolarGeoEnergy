		<!--BEGIN #sidebar .aside-->
		<div id="sidebar" class="aside">
            
            <?php if (is_page()) : ?>
            <?php /* Widgetised Area */ if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Page Sidebar') ) ?>
            <?php else: ?>
            <?php /* Widgetised Area */ if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar() ) ?>
            
            <!--BEGIN #sidebar-narrow-left-->
            <div id="sidebar-narrow-left">
            <?php /* Widgetised Area */ if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Sidebar Narrow Left') ) ?>
            <!--END #sidebar-narrow-left-->
            </div>
            
            <!--BEGIN #sidebar-narrow-right-->
            <div id="sidebar-narrow-right">
            <?php /* Widgetised Area */ if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Sidebar Narrow Right') ) ?>
            <!--END #sidebar-narrow-right-->
            </div>
            <?php endif; ?>
		
		<!--END #sidebar .aside-->
		</div>
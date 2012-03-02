
		<!-- END #content -->
		</div>
        
        <div id="body-detail-bottom"></div>
        
        <!--BEGIN #footer-->
        <div id="footer">
        	
            <!--BEGIN .cotton-area-->
        	<div class="cotton-area">
            
            	<div class="cotton-top">&nbsp;</div>
                	
                <!--BEGIN .cotton-inner-->
                <div class="cotton-inner clearfix">
                    
                    <!--BEGIN #footer-column-left .cotton-column-->
                    <div id="footer-column-left" class="cotton-column">
                        <?php	/* Widgetised Area */	if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Footer Left') ) ?>
                    <!--END #footer-column-left .cotton-column-->   
                    </div>
                    
                    <!--BEGIN #footer-column-right .cotton-column-->
                    <div id="footer-column-right" class="cotton-column">
                        <?php	/* Widgetised Area */	if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Footer Right') ) ?>
                    <!--END #footer-column-right .cotton-column-->   
                    </div>
                
                <!--END .cotton-inner-->
                </div>
                
                <div class="cotton-bottom">&nbsp;</div>
                
            <!--END .cotton-area-->
            </div>
            
            <!-- BEGIN #footer-bottom -->
            <div id="footer-bottom">
            	
                <!-- BEGIN #footer-inner -->
                <div id="footer-inner">
            		
                    <p class="copyright">&copy; <?php echo date( 'Y' ); ?> <a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a>. <?php _e('All Rights Reserved.', 'framework') ?></p>
                    
                    <p class="credit"><?php _e('Powered by', 'framework') ?> <a href="http://wordpress.org/">WordPress</a>. <a href="http://www.premiumpixels.com/redux">Redux Theme</a> by <a href="http://www.premiumpixels.com">Orman Clark</a></p>
                <!-- END #footer-inner -->
                </div>
            
            <!-- END #footer-bottom -->
            </div>
        
        <!--END #footer-->
        </div>
		
	<!-- END #container -->
	</div> 
		
	<!-- Theme Hook -->
	<?php wp_footer(); ?>
			
<!--END body-->
</body>
<!--END html-->
</html>
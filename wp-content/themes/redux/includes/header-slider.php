				<?php 
				$query = new WP_Query();
				$query->query('post_type='.__( 'slide' ).'&posts_per_page=-1');
				$post_count = $query->post_count;
				$count = 1;
				?>
                
            	<!-- BEGIN #slider -->
                <div id="slider">
                
                	<!--BEGIN .slides_container -->
                	<div class="slides_container">
                    	
                        <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
                        
                        <!--BEGIN #count-NUM -->
                        <div id="count-<?php echo $count; ?>">
                        
                            <!--BEGIN .hentry -->
                            <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">	
                            
                                <!--BEGIN .entry-content -->
                                <div class="entry-content">
                                    <?php the_content(); ?>
                                <!--END .entry-content -->
                                </div>
                            
                            <!--END .hentry -->
                            </div>
                        
                        <!--BEGIN #count-NUM -->
                        </div>
                        
                        <?php $count++; ?>
                        
                        <?php endwhile;  endif; // end loop ?>
                    
                    <!--END .slides_container -->
                    </div>
                    
                    <?php if($post_count > 1) : // if there is more then one slide, show the slides navigation arrows. ?>
                    <!--BEGIN .slides-nav --> 
                    <div class="slides-nav"> 
                    
                        <div class="arrow-left"><a href="#" class="prev">Previous Slide</a></div> 
                        <div class="arrow-right"><a href="#" class="next">Next Slide</a></div>
                    
                    <!--END .slides-nav --> 
                    </div> 
                    <?php endif; //end post count ?>
                 
                <!-- END #slider -->
                </div>

                <?php wp_reset_query(); ?>
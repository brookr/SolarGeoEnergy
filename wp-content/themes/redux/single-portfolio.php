<?php get_header(); ?>

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            
            <?php 
			$image1 = get_post_meta(get_the_ID(), 'tz_upload_image', true);
			$image2 = get_post_meta(get_the_ID(), 'tz_upload_image2', true);
			$image3 = get_post_meta(get_the_ID(), 'tz_upload_image3', true);
			$image4 = get_post_meta(get_the_ID(), 'tz_upload_image4', true);
			$image5 = get_post_meta(get_the_ID(), 'tz_upload_image5', true);
			$image6 = get_post_meta(get_the_ID(), 'tz_upload_image6', true);
			$image7 = get_post_meta(get_the_ID(), 'tz_upload_image7', true);
			$image8 = get_post_meta(get_the_ID(), 'tz_upload_image8', true);
			$image9 = get_post_meta(get_the_ID(), 'tz_upload_image9', true);
			$image10 = get_post_meta(get_the_ID(), 'tz_upload_image10', true);
			?>
            
            <!--BEGIN #portfolio-post-wrap -->
            <div id="portfolio-post-wrap" class="clearfix">
            
                <!--BEGIN .portfolio-sidebar -->
                <div class="portfolio-sidebar">
                    
                    <h2 class="entry-title"><?php the_title(); ?></h2>
                    
                    <!--BEGIN .entry-content -->
                    <div class="entry-content">
                        <?php the_content(); ?>
                    <!--END .entry-content -->
                    </div>
                    
                    <h5><strong><?php _e('Work Involved:', 'framework'); ?></strong></h5>
                    
                    <?php $terms = get_the_terms( get_the_ID(), 'skill-type' ); ?>
                    
                    <ul class="tax-list clearfix">
                        <?php foreach ($terms as $term) :  ?>
                        <li><span><?php echo $term->name; ?></span></li>
                        <?php endforeach; ?>
                    </ul>
    
                <!--END .portfolio-sidebar -->
                </div>
                
                <!--BEGIN #portfolio-wrap -->
                <div id="portfolio-wrap">
    
                        <!--BEGIN .hentry -->
                        <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
                            
                            <?php 
                            $add_info = get_post_meta(get_the_ID(), 'tz_additional_info', true); 
                            $video_url = get_post_meta(get_the_ID(), 'tz_video_url', true);
                            $embeded_code = get_post_meta(get_the_ID(), 'tz_embed_code', true);
                            ?>
                            
                            <?php if($video_url !='' || $embeded_code != '') : ?>
                            
                            <!--BEGIN .video_slide -->
                            <div class="video_slide">
    
                                <?php if($add_info != '') : ?>
                                <!--BEGIN .video_info -->
                                <div class="video_info">
                                    <?php echo stripslashes(htmlspecialchars_decode($add_info)); ?>
                                </div>
                                <!--END .video_info -->
                                <?php endif; ?> 
    
                                
                                <!--BEGIN .post_video -->
                                <div class="post_video">
                                
                                    <?php tz_video(get_the_ID()); ?>
                                
                                <!--END .post_video -->
                                </div>
                            
                            <!--END .video_slide -->
                            </div>
                            
                            <?php endif; ?>
                            
                            <?php if(get_post_meta(get_the_ID(), 'tz_portfolio_enable_slider', true) == 'yes') : ?>
                            
                            <!--BEGIN #portfolio-slider .clearfix -->
                            <div id="portfolio-slider" class="clearfix">
                                
                                <!--BEGIN .slides_container -->
                                <div class="slides_container">
                                
                                    <?php 
                                    if($image1 != '') :
                                    
                                        $height = get_post_meta(get_the_ID(), 'tz_image1_height', true);
                                        
                                        if($height == '') :
                                        
                                            $height = getimagesize($image1);
                                            $height = $height[1];
                                        
                                        endif;
                                        
                                    endif;
                                    ?>
                                    <div><img width="696" height="<?php echo $height; ?>" src="<?php echo $image1; ?>" alt="<?php the_title(); ?>"></div>
                                    <?php if($image2 != '') : ?>
                                    <div><img width="696" src="<?php echo $image2; ?>" alt="<?php the_title(); ?>"></div>
                                    <?php endif; ?>
                                    <?php if($image3 != '') : ?>
                                    <div><img width="696" src="<?php echo $image3; ?>" alt="<?php the_title(); ?>"></div>
                                    <?php endif; ?>
                                    <?php if($image4 != '') : ?>
                                    <div><img width="696" src="<?php echo $image4; ?>" alt="<?php the_title(); ?>"></div>
                                    <?php endif; ?>
                                    <?php if($image5 != '') : ?>
                                    <div><img width="696" src="<?php echo $image5; ?>" alt="<?php the_title(); ?>"></div>
                                    <?php endif; ?>
                                    <?php if($image6 != '') : ?>
                                    <div><img width="696" src="<?php echo $image6; ?>" alt="<?php the_title(); ?>"></div>
                                    <?php endif; ?>
                                    <?php if($image7 != '') : ?>
                                    <div><img width="696" src="<?php echo $image7; ?>" alt="<?php the_title(); ?>"></div>
                                    <?php endif; ?>
                                    <?php if($image8 != '') : ?>
                                    <div><img width="696" src="<?php echo $image8; ?>" alt="<?php the_title(); ?>"></div>
                                    <?php endif; ?>
                                    <?php if($image9 != '') : ?>
                                    <div><img width="696" src="<?php echo $image9; ?>" alt="<?php the_title(); ?>"></div>
                                    <?php endif; ?>
                                    <?php if($image10 != '') : ?>
                                    <div><img width="696" src="<?php echo $image10; ?>" alt="<?php the_title(); ?>"></div>
                                    <?php endif; ?>
                                
                                <!--END .slides_container -->
                                </div>
                                
                                <?php if($image2 != '' && get_post_meta(get_the_ID(), 'tz_portfolio_enable_slider', true) == 'yes') : ?>
                                
                                <div id="line_wrap">
                                    <div id="line"></div>
                                </div><!--line_wrap-->
                                
                                <div id="portfolio_nav">
                
                                    <div id="circles">
                                        
                                        <!--BEGIN .pagination -->
                                        <ul class="pagination">
                                            
                                            <?php if($image2 != '') : ?>
                                            <li><a href="#"></a></li>
                                            <li><a href="#"></a></li>
                                            <?php endif; ?>
                                            <?php if($image3 != '') : ?>
                                            <li><a href="#"></a></li>
                                            <?php endif; ?>
                                            <?php if($image4 != '') : ?>
                                            <li><a href="#"></a></li>
                                            <?php endif; ?>
                                            <?php if($image5 != '') : ?>
                                            <li><a href="#"></a></li>
                                            <?php endif; ?>
                                            <?php if($image6 != '') : ?>
                                            <li><a href="#"></a></li>
                                            <?php endif; ?>
                                            <?php if($image7 != '') : ?>
                                            <li><a href="#"></a></li>
                                            <?php endif; ?>
                                            <?php if($image8 != '') : ?>
                                            <li><a href="#"></a></li>
                                            <?php endif; ?>
											<?php if($image9 != '') : ?>
                                            <li><a href="#"></a></li>
                                            <?php endif; ?>
											<?php if($image10 != '') : ?>
                                            <li><a href="#"></a></li>
                                            <?php endif; ?>
                                            
                                        <!--END .pagination -->
                                        </ul>
                                        
                                    </div><!--circles-->
                                    
                                    <div id="arrows">
                                        
                                        <div id="left_arrow"><a class="prev" href="#">previous</a></div>
                                        
                                        <div id="right_arrow"><a class="next" href="#">next</a></div>
                                        
                                    </div><!--arrows-->
                                    
                                </div><!--portfolio_nav-->
                                <?php endif; ?>
                                                                
                            <!--END #portfolio-slider -->
                            </div>
                            <?php else: ?>
                            
                            <?php 
                            if($image1 != '') : ?>
                            <div><img width="696" src="<?php echo $image1; ?>" alt="<?php the_title(); ?>"></div>
                            <?php endif; ?>
                            <?php if($image2 != '') : ?>
                            <div><img width="696" src="<?php echo $image2; ?>" alt="<?php the_title(); ?>"></div>
                            <?php endif; ?>
                            <?php if($image3 != '') : ?>
                            <div><img width="696" src="<?php echo $image3; ?>" alt="<?php the_title(); ?>"></div>
                            <?php endif; ?>
                            <?php if($image4 != '') : ?>
                            <div><img width="696" src="<?php echo $image4; ?>" alt="<?php the_title(); ?>"></div>
                            <?php endif; ?>
                            <?php if($image5 != '') : ?>
                            <div><img width="696" src="<?php echo $image5; ?>" alt="<?php the_title(); ?>"></div>
                            <?php endif; ?>
                            <?php if($image6 != '') : ?>
                            <div><img width="696" src="<?php echo $image6; ?>" alt="<?php the_title(); ?>"></div>
                            <?php endif; ?>
                            <?php if($image7 != '') : ?>
                            <div><img width="696" src="<?php echo $image7; ?>" alt="<?php the_title(); ?>"></div>
                            <?php endif; ?>
                            <?php if($image8 != '') : ?>
                            <div><img width="696" src="<?php echo $image8; ?>" alt="<?php the_title(); ?>"></div>
                            <?php endif; ?>
							<?php if($image9 != '') : ?>
                            <div><img width="696" src="<?php echo $image9; ?>" alt="<?php the_title(); ?>"></div>
                            <?php endif; ?>
							<?php if($image20 != '') : ?>
                            <div><img width="696" src="<?php echo $image10; ?>" alt="<?php the_title(); ?>"></div>
                            <?php endif; ?>
                            
                            <?php endif; ?>
                        
                        <!--END .hentry-->  
                        </div>
                    
                <!--END #portfolio-wrap-->
                </div>
            
            <!--END #portfolio-post-wrap -->
            </div>
            
            <hr>
            
            <!--BEGIN .portfolio-related -->
            <div id="portfolio-related" class="clearfix">
            
                <!--BEGIN .portfolio-sidebar -->
                <div class="portfolio-sidebar">
                    
                    <h2 class="entry-title"><?php echo stripslashes(get_option('tz_related_portfolio_title')); ?></h2>
                    
                    <!--BEGIN .entry-content -->
                    <div class="entry-content">
                        <?php echo stripslashes(get_option('tz_related_portfolio_description')); ?>
                    <!--END .entry-content -->
                    </div>
    
                <!--END .portfolio-sidebar -->
                </div>
                
                <!--BEGIN #related-wrap -->
				<div id="related-wrap">
                
                    <!--BEGIN #columns-wrap-->
                    <ul id="columns-wrap" class="image-grid-three">
                        
                        <?php global $post; 
							  $postId = $post->ID;
							  $query = get_posts_related_by_taxonomy($post->ID, 'skill-type');?>
                        
                        
                        <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
                              $terms = get_the_terms( get_the_ID(), 'skill-type' );  ?> 
                              
                        <?php if(get_the_ID() != $postId) : ?>
                        
                        <li>
                        
                            <!--BEGIN .hentry -->
                            <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">	
                            
                                <?php /* if the post has a WP 2.9+ Thumbnail */
                                if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) { ?>
                                <div class="post-thumb">
                                    <?php tz_lightbox(get_the_ID(), TRUE); ?>
                                </div>
                                <?php } ?>
                                            
                                <h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'framework'), get_the_title()); ?>"> <?php the_title(); ?></a> <?php edit_post_link( __('edit', 'framework'), '<span class="edit-post">[', ']</span>' ); ?></h2>
                                
                                <!--BEGIN .entry-content -->
                                <div class="entry-content">
                                
                                    <?php the_excerpt(); ?>
                                    <a href="<?php the_permalink(); ?>" class="more-link"><?php _e('Read more...', 'framework'); ?></a>
                                    
                                <!--END .entry-content -->
                                </div>
            
                            <!--END .hentry-->  
                            </div>
                        
                        </li>
                        <?php endif; ?>
                        
                        <?php endwhile; endif; ?>
                    
                    <!--END #columns-wrap-->  
                    </ul>
                
                <!--END #related-wrap -->
            	</div>
            
            <!--END #portfolio-related -->
            </div>
            
            <?php endwhile; endif; ?>
            
<?php get_footer(); ?>
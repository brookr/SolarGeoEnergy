			
            <!--BEGIN #blog-related-wrap -->
            <div id="blog-related-wrap" class="clearfix">
            
            	<h4 class="related-title"><?php _e('Related Posts.', 'framework'); ?></h4>
                                    
                <ul>
                
                	<?php if(get_option('tz_related_type') == 'tags') : ?>
							
						<?php
                        global $post;
                        $tags = wp_get_post_tags($post->ID);
                        if ($tags) :
                            $tag_ids = array();
                            foreach($tags as $individual_tag){ $tag_ids[] = $individual_tag->term_id;}
                        
                            $args=array(
                                'tag__in' => $tag_ids,
                                'post__not_in' => array($post->ID),
                                'posts_per_page'=> get_option('tz_related_number'), // Number of related posts that will be shown.
                                'ignore_sticky_posts'=> 1,
                            );
                            $my_query = new wp_query($args);
                            $post_count = $my_query->post_count;
                            
                        ?>
    
                        <?php endif; ?>
                    
                    <?php else : ?>
                    
						<?php
                        global $post;
                        $cats = get_the_category($post->ID);
                        if ($cats) :
                            $cat_ids = array();
                            foreach($cats as $individual_cat){ $cat_ids[] = $individual_cat->cat_ID;}
                        
                            $args=array(
                                'category__in' => $cat_ids,
                                'post__not_in' => array($post->ID),
                                'posts_per_page'=> get_option('tz_related_number'), // Number of related posts that will be shown.
                                'ignore_sticky_posts'=> 1
                            );
                            $my_query = new wp_query($args);
                            $post_count = $my_query->post_count;
                            
                            endif;
                        ?>
                        
                    <?php endif; ?>
                    
                    <?php if( $my_query->have_posts() ) :
							while ($my_query->have_posts()) :
								$my_query->the_post();  ?>
                    
                    <li>
                    
                    	<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) : /* if post has post thumbnail */ ?>
                    	<div class="post-thumb">
                        	<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('blog-related'); ?></a>
                        </div>
                        <?php endif; ?>
                        
                        <h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        
                    </li>
                    
                    <?php endwhile; endif;  ?>
                    
                    <?php wp_reset_query(); ?>

                </ul>
                
            <!--END #blog-related-wrap -->
            </div>
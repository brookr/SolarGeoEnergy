
<?php
/*
Template Name: Portfolio Three Columns
*/
?>

<?php get_header(); ?>

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <!--BEGIN .portfolio-sidebar -->
			<div class="portfolio-sidebar">
            	
                <!--BEGIN .entry-content -->
                <div class="entry-content">
                    <?php the_content(); ?>
                <!--END .entry-content -->
                </div>
                
                <!--BEGIN #taxs -->
                <div id="taxs">
                
                	<h5><strong><?php _e('Filter:', 'framework'); ?></strong></h5>
                
                	<ul id="portfolio-filter" class="clearfix">
                    	<li class="segment-1"><a class="active all" data-value="all" href="#"><?php _e('All', 'framework'); ?></a></li>
                    	<?php wp_list_categories(array('title_li' => '', 'taxonomy' => 'skill-type', 'walker' => new Walker_Category_Filter())); ?>
                    </ul>
                    
                <!--END #taxs -->
                </div>
                
            <!--END .portfolio-sidebar -->
            </div>
            <?php endwhile; endif; ?>
            
            <?php  $query = new WP_Query(); 
				   $query->query('post_type=portfolio&posts_per_page=-1'); ?>
            
            <!--BEGIN #portfolio-wrap -->
			<div id="portfolio-wrap">
            	
                <!--BEGIN #columns-wrap-->
            	<ul id="columns-wrap" class="image-grid-three">
                
                	<?php $count = 1; ?>
                	<?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
                    	  $terms = get_the_terms( get_the_ID(), 'skill-type' );  ?> 
                	
                    <li data-id="id-<?php echo $count; ?>" class="<?php if($terms) : foreach ($terms as $term) { echo 'term-'.$term->term_id.' '; } endif; ?>">
                    
                        <!--BEGIN .hentry -->
                        <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">	
                        
                            <?php /* if the post has a WP 2.9+ Thumbnail */
                            if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) { ?>
                            <div class="post-thumb">
                                <?php tz_lightbox(get_the_ID()); ?>
                            </div>
                            <?php } ?>
                            
                            <div class="count hidden"><?php echo $count; ?></div>
                            
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
                    <?php $count++; ?>
                    <?php endwhile; endif; ?>
                    
                    <?php wp_reset_query(); ?>
                
                <!--END #one-columns-->  
                </ul>
                
			<!--END #portfolio-wrap-->
			</div>
            
<?php get_footer(); ?>




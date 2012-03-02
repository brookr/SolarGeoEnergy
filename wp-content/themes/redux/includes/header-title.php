				<?php /* Get author data */
				
				if(get_query_var('author_name')) :
					$curauth = get_userdatabylogin(get_query_var('author_name'));
				else :
					$curauth = get_userdata(get_query_var('author'));
				endif;
				
				$global_heading = get_option('tz_global_heading');
				$blogid = get_page_by_title(get_option('tz_blog_page'));
				?>
				
				<?php /* If this is a category archive */ if (is_category()) { ?>
				<h1 class="page-title"><?php echo single_cat_title('',false); ?></h1>
					
				<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
				<h1 class="page-title"><?php printf(__('All posts tagged %s', 'framework'), single_tag_title('',false)); ?></h1>
                
                <?php /* If this is a search */ } elseif( is_search() ) { ?>
				<h1 class="page-title"><?php _e('Search Results for', 'framework'); ?> "<?php echo htmlspecialchars($_GET['s']); ?>"</h1>
					
				<?php /* If this is a tag archive */ } elseif( is_page() || get_post_type() == 'portfolio' ) { ?>
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<h1 class="page-title">
				<?php if(get_post_meta(get_the_ID(), 'heading_value', true) == '') : 
					the_title(); 
					else: 
					echo get_post_meta(get_the_ID(), 'heading_value', true); endif; ?>
				</h1>
				<?php endwhile; endif; ?>
					
				<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
				<h1 class="page-title"><?php _e('Archive for', 'framework') ?> <?php the_time('F jS, Y'); ?></h1>
					
				 <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
				<h1 class="page-title"><?php _e('Archive for', 'framework') ?> <?php the_time('F, Y'); ?></h1>
					
				<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
				<h1 class="page-title"><?php _e('Archive for', 'framework') ?> <?php the_time('Y'); ?></h1>
					
				<?php /* If this is an author archive */ } elseif (is_author()) { ?>
				<h1 class="page-title"><?php echo $curauth->display_name; ?></h1>
					
				<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
				<h1 class="page-title"><?php _e('Blog Archives', 'framework') ?></h1>
				<?php } else { ?>
				<h1 class="page-title"><?php echo get_post_meta($blogid->ID, 'heading_value', true); ?></h1>
				<?php } ?>
				
				<?php if(is_category() || is_page() || get_post_type() == 'portfolio') : ?>
				<div class="page-tagline">
				
				<?php if(is_category()) : ?>
                
                <p><span>//</span> <?php if(category_description() == '') : echo $global_heading; else: echo category_description(); endif; ?></p>
                
                <?php elseif(is_page() || get_post_type() == 'portfolio') : ?>
                
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                
				<?php if(get_post_meta(get_the_ID(), 'tagline_value', true) != ''): ?>
                <p><span>//</span> <?php echo get_post_meta(get_the_ID(), 'tagline_value', true); ?></p>
                <?php elseif($global_heading != ''): ?>
                <p><span>//</span> <?php echo stripslashes($global_heading); ?></p>
                <?php endif; ?>
                    
                <?php endwhile; endif; ?>
                
                <?php endif; ?>
					
				</div><!--desc-->
                
                <?php elseif(is_search()): ?>
				
				<?php else: ?>
				
				<div class="page-tagline"><p><span>//</span> <?php if(get_post_meta($blogid->ID, 'tagline_value', true) == '') : echo $global_heading; else: echo get_post_meta($blogid->ID, 'tagline_value', true); endif; ?></p></div>
						
				<?php endif; ?>
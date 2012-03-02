<?php get_header(); ?>

			<!--BEGIN #primary .hfeed-->
			<div id="primary" class="hfeed">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				
				<!--BEGIN .hentry -->
				<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
					<h1 class="entry-title"><?php the_title(); ?></h1>
					
					<!--BEGIN .entry-meta .entry-header-->
					<div class="entry-meta entry-header">
						<span class="author"><?php _e('Written by', 'framework') ?> <?php the_author_posts_link(); ?></span>
						<span class="published"><?php _e('on', 'framework') ?> <?php the_time( get_option('date_format') ); ?></span>
						<span class="meta-sep">&mdash;</span>
						<span class="comment-count"><?php comments_popup_link(__('No Comments', 'framework'), __('1 Comment', 'framework'), __('% Comments', 'framework')); ?></span>
						<?php edit_post_link( __('edit', 'framework'), '<span class="edit-post">[', ']</span>' ); ?>
					<!--END .entry-meta entry-header -->
					</div>
					
					<?php /* if show post image is checked */
					if (get_option('tz_post_img') == "true") { ?>
					<?php /* if the post has a WP 2.9+ Thumbnail */
					if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
					<div class="post-thumb">
						<?php the_post_thumbnail('blog'); /* post thumbnail settings configured in functions.php */ ?>
					</div>
					<?php } } ?>
					
					<!--BEGIN .entry-content -->
					<div class="entry-content">
						<?php the_content(__('Read more...', 'framework')); ?>
						<?php wp_link_pages(array('before' => '<p><strong>'.__('Pages:', 'framework').'</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
					<!--END .entry-content -->
					</div>
                    
                    <hr>
					
					<?php /* if the author bio is checked */
					if (get_option('tz_author_bio') == "true") : ?>
					<!--BEGIN .author-bio-->
					<div class="author-bio clearfix">
						<div class="author-title"><?php _e('About the author', 'framework') ?></div>
                        <?php echo get_avatar( get_the_author_meta('email'), '80' ); ?>
						<div class="author-description"><?php the_author_meta("description"); ?></div>
					<!--END .author-bio-->
					</div>
					<?php endif; ?>
                    
                    <?php /* if the related posts is checked */
					if (get_option('tz_show_related') == "true") : ?>
                    
                    <?php include 'includes/single-related.php'; ?>
					
					<?php endif; ?>
                
                <!--END .hentry-->  
				</div>

				<?php comments_template('', true); ?>

				<?php endwhile; else: ?>

				<!--BEGIN #post-0-->
				<div id="post-0" <?php post_class() ?>>
				
					<h1 class="entry-title"><?php _e('Error 404 - Not Found', 'framework') ?></h1>
				
					<!--BEGIN .entry-content-->
					<div class="entry-content">
						<p><?php _e("Sorry, but you are looking for something that isn't here.", "framework") ?></p>
					<!--END .entry-content-->
					</div>
				
				<!--END #post-0-->
				</div>

			<?php endif; ?>
			<!--END #primary .hfeed-->
			</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
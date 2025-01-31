<?php 
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit; ?>
 <div class="wprpswr-post-slides">
	<div class="wprpswr-post-list">
		<div class="-wprpswr-post-list-content">
		<?php if (!empty($feat_image)) { ?>
			<div class="wp-medium-5 wprpswrcolumns">
				<div class="wprpswr-post-image-bg">
					<a href="<?php the_permalink(); ?>"><img src="<?php echo $feat_image; ?>" alt="<?php the_title(); ?>" /></a>
				</div>			
			</div>
		<?php } ?>	
			<div class="<?php if (!empty($feat_image)) { ?> wp-medium-7 <?php } else { ?> wp-medium-12 <?php } ?> wprpswrcolumns">
			<?php if($showCategory) { ?>
						<div class="wprpswr-post-categories">		
								<?php echo $cat_list; ?>
							</div>
						<?php } ?>
			  <h2 class="wprpswr-post-title">
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			</h2>
				<?php if($showDate || $showAuthor)    {  ?>	
			<div class="wprpswr-post-date">		
				<?php  if($showAuthor) { ?> <span><?php  esc_html_e( 'By', 'wp-recent-post-slider-with-responsive' ); ?> <?php the_author(); ?></span><?php } ?>
				<?php echo ($showAuthor && $showDate) ? '&nbsp;/&nbsp;' : '' ?>
				<?php if($showDate) { echo get_the_date(); } ?>
				</div>
				<?php }   ?>
					<?php if($showContent) {  ?>	
				<div class="wprpswr-post-content">
					<?php
					$customExcerpt = get_the_excerpt();				
					if (has_excerpt($post->ID))  { ?>
						<div class="wprpswr-sub-content"><?php echo $customExcerpt ; ?></div> 
					<?php } else {
						$excerpt = strip_shortcodes(strip_tags(get_the_content())); ?>
					<div class="wprpswr-sub-content"><?php echo wprpswr_limit_words($excerpt,$words_limit); ?></div>					
					<?php } ?>
					
					<?php if($showreadmore) { ?>
						<a class="wprpswr-readmore" href="<?php the_permalink(); ?>"><?php _e('Read More', 'wp-recent-post-slider-with-responsive'); ?></a>
					<?php } ?>
					
				</div>
				<?php } ?>
				
				</div>
		</div>
		</div>
		
	</div>
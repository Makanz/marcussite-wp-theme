	<?php /* LOAD CONTENT */ ?>
	<div id="content" class="row-fluid">
		<div class="span12">
		<?php
		$args=array(
		  'post__not_in' => array($post->ID),
		  'post_type' => 'post',
		  'post_status' => 'publish',
		  'posts_per_page' => 15,
		  'cat' => $cat
		);
		$content_query = null;
		$content_query = new WP_Query($args);
		
		if( $content_query->have_posts() ) {
		?>
		
		<?php 
		  while ($content_query->have_posts()) : $content_query->the_post(); ?>
			  	<div class="news-item">
			  		<?php generateIcon(); ?>	
					<?php if(has_post_thumbnail()){ ?>
						<a href="<?php the_permalink() ?>">
							<?php the_post_thumbnail('item-thumb'); ?>
						</a>
					<?php } ?>
					<div class="container-fluid">
						<div class="row-fluid">
							<div class="span12">
								<h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
								<span class="date-style"><?php the_time('j F, Y'); ?></span>
								<?php echo '<p>'.excerpt(20).'</p>'; ?>
								<?php 
								$comments_img_link= ' ';
								comments_popup_link($comments_img_link .'0 Kommentarer', $comments_img_link .'1 Kommentar', $comments_img_link . '% Kommentarer'); 
								?>
							</div>
						</div>
					</div>
			    </div>
		    <?php
		  endwhile;
		}
		wp_reset_query();  // Restore global post data stomped by the_post().
		?>
		</div>
	</div>
	<?php /* LOAD CONTENT */ ?>
	<div id="content" class="row">
		<?php
		$content_query = new WP_Query(array(
			'post__not_in' => array($post->ID),
			'post_type' => 'post',
			'post_status' => 'publish',
			'posts_per_page' => 6,
			'cat' => $cat
		));

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
					<div class="col-md-12">
						<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
						<span class="date-style"><?php the_time('j F, Y'); ?></span>
						<?php echo '<p>'.excerpt(20).'</p>'; ?>
						<?php
						$comments_img_link= ' ';
						comments_popup_link($comments_img_link .'0 Kommentarer', $comments_img_link .'1 Kommentar', $comments_img_link . '% Kommentarer');
						?>
					</div>
			    </div>
		    <?php
		  endwhile;
		}
		wp_reset_postdata();  // Restore global post data stomped by the_post().
		?>
	</div>
<?php get_header(); ?>

<?php query_posts('showposts=1&cat='.$cat);?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div class="row top-item">
		<div class="col-md-4">
			<div class="row">
				<div class="col-md-12">
					<h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
					<span class="date-style"><?php the_time('j F, Y'); ?></span>
					<?php echo '<p>'.excerpt(50).'</p>'; ?>

					<?php
					/*
					$comments_img_link= ' ';
					comments_popup_link($comments_img_link .'0 Kommentarer', $comments_img_link .'1 Kommentar', $comments_img_link . '% Kommentarer');
					*/
					?>
				</div>
			</div>
		</div>
		<div class="col-md-8">
			<?php generateIcon(); ?>
			<?php if(has_post_thumbnail()){ ?> <a href="<?php the_permalink() ?>"> <?php the_post_thumbnail(); ?> </a > <?php } ?>
		</div>
	</div>
	<?php endwhile; else: ?>
		 
		<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
	
	<?php endif; ?>
	
	<?php get_template_part('content'); ?>
		
<?php get_footer(); ?>


<?php

// style="background: url('<?php $postThumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full'); echo $postThumbnail[0];

?>
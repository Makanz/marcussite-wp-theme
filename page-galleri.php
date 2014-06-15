<?php get_header(); ?>

	<?php

		$listImage = new wp_query( array(
			'posts_per_page' => 36,
			'post_type'      => 'attachment',
			'post_mime_type' => 'image'
		));
	?>
	<div id="galleri">
		<?php while ( $listImage->have_posts() ) : $listImage->the_post(); ?>
			<?php the_post_thumbnail('thumbnail'); ?>
		<?php endwhile; ?>
	</div>

<?php get_footer(); ?>
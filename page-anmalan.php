<?php get_header(); ?>
	
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="row-fluid top-item">
			<div class="row-fluid">
				<div class="span6">
					<div class="container-fluid">
						<div class="row-fluid">
							<h1><?php the_title(); ?></h1>
							<?php echo getColumn(1); ?>
						</div>
					</div>
				</div>
				<div class="span6">
					<div class="container-fluid">
						<div class="row-fluid">
							<?php echo getColumn(2); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endwhile; else: ?>
		 
		<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>

	<?php endif; ?>

<?php get_footer(); ?>
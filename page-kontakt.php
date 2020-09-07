<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="row-fluid top-item">
			<?php if(has_post_thumbnail()){ ?>
			<div class="row-fluid">
				<div class="col-md-12" style="text-align: center;">
					 <?php the_post_thumbnail(); ?>
				</div>
			</div>
			<?php } ?>
			<div class="row-fluid">
				<div class="col-md-12">
					<div class="container-fluid">
						<div class="row-fluid">
							<h1><?php the_title(); ?></h1>
							<?php the_content(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endwhile; else: ?>
		 
		<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>

	<?php endif; ?>

<?php get_footer(); ?>
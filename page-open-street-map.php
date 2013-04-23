<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div class="row-fluid top-item">
		<div class="row-fluid">
			<div class="span8">
				
				<div class="container-fluid">
					<div class="row-fluid">
						<div class="span12">
							<h1><?php the_title(); ?></h1>
							<?php the_content(); ?>
						</div>
					</div>
				</div>
				
			</div>
			
			<div class="span4">
				 <?php the_post_thumbnail(); ?>
			</div>
			
		</div>
	</div>
	
	<div class="row-fluid">
		<div class="span8" style="background: #FFF;">
			
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span12">
						<?php comments_template(); ?>
					</div>
				</div>
			</div>
			
		</div>
		<div class="span4" style="background: #FFF;">
			
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span12">
						<?php get_template_part( 'comment_form' ); ?>
					</div>
				</div>
			</div>
			
		</div>
	</div>
	<?php endwhile; else: ?>
		 
		<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>

	<?php endif; ?>

<?php get_footer(); ?>
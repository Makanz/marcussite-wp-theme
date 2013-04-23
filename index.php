<?php get_header(); ?>

<?php query_posts('showposts=1&cat='.$cat);?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div class="row-fluid top-item">
		<div class="span4">
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span12">
						<h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
						<span class="date-style"><?php the_time('j F, Y'); ?></span>
						<?php echo '<p>'.excerpt(50).'</p>'; ?>
						
						<?php 
						$comments_img_link= ' ';
						comments_popup_link($comments_img_link .'0 Kommentarer', $comments_img_link .'1 Kommentar', $comments_img_link . '% Kommentarer'); 
						?>
					</div>
				</div>
			</div>
		</div>
		<div class="span8" style="position: relative;">
			<?php generateIcon(); ?>
			<?php if(has_post_thumbnail()){ the_post_thumbnail(); } ?>
		</div>
	</div>
	<?php endwhile; else: ?>
		 
		<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
	
	<?php endif; ?>
	
	<?php get_template_part('content'); ?>
		
<?php get_footer(); ?>
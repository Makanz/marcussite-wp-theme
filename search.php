<?php get_header(); ?>

<div class="row-fluid">
	<div class="span12">
		<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
			<div>
				<h1>Söker efter: "<?php the_search_query();  ?>"</h1>
				<input type="text" value="" name="s" id="s" placeholder="Sök" />
				<input type="submit" id="searchsubmit" value="Search" />
			</div>
		</form>
	</div>
</div>

<div id="content" class="row-fluid">
	<div class="span12">
	
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
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
				
	<?php endwhile; else: ?>
		 
		<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>

	<?php endif; ?>
	
	</div>
</div>
	

<?php get_footer(); ?>
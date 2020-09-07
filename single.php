<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div class="row top-item single">
		<div class="col-md-8" style="background: #FFF;">

			<?php generateIcon(); ?>
			<?php the_post_thumbnail(); ?>

			<div class="col-md-12 content">
				<h1><?php the_title(); ?></h1>
				<span class="date-style"><?php the_time('j F, Y'); ?></span>
				<?php the_content(); ?>
			</div>
			
		</div>

		<div class="col-md-4" style="background: #FFF;">

			<?php get_sidebar(); ?>
			
		</div>
	</div>
		
	<div class="row">
		<div class="col-md-12" style="background: #FFF;">

			<div class="row">
				<div class="col-md-12">
					<div style="width: 728px; margin: 0 auto;">
						<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
						<!-- OSM - Banner 728x90 -->
						<ins class="adsbygoogle"
							 style="display:inline-block;width:728px;height:90px"
							 data-ad-client="ca-pub-5109391773804450"
							 data-ad-slot="8225338925"></ins>
						<script>
						(adsbygoogle = window.adsbygoogle || []).push({});
						</script>
					</div>
				</div>
			</div>
			
		</div>
		
	</div>
	
	<div class="row">

		<div class="col-md-12" style="background: #FFF;">
				<div class="row">
					<div class="col-md-12">
						<a name="respond"></a>
						<?php comments_template(); ?>
					</div>
				</div>
		</div>

	</div>
	<?php endwhile; else: ?>
		 
		<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>

	<?php endif; ?>
	<div style="width: 100%; height: 20px;"></div>
	<?php get_template_part('content'); ?>

<?php get_footer(); ?>
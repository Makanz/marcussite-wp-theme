<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div class="row top-item">
			<div class="col-md-8">
				
				<div class="container-fluid">
					<div class="row-fluid">
						<div class="col-md-12">
							<h1><?php the_title(); ?></h1>
							<?php the_content(); ?>
						</div>
					</div>
				</div>
				
			</div>
			
			<div class="col-md-4">
				 <?php the_post_thumbnail(); ?>
			</div>

	</div>
	
	<?php endwhile; else: ?>
		 
		<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>

	<?php endif; ?>

		<div class="row">
		<div class="col-md-12" style="background: #FFF;">
			
			<div class="container">
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
		
	</div>

<?php get_footer(); ?>


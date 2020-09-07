<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div class="top-item">

		<div class="row">
			<div class="container top-image">
				<?php echo wp_get_attachment_image( get_field('cover_image'), 'full'); ?>
			</div>
		</div>

		<div class="row">
			<div class="container ">

				<div class="col-md-7">
					<h1><?php the_title(); ?></h1>
					<?php the_content(); ?>

					<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
						<input type="hidden" name="cmd" value="_s-xclick">
						<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----
	">
						<input type="image" src="https://www.paypalobjects.com/sv_SE/SE/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal – ett tryggt och smidigt sätt att betala på nätet med.">
						<img alt="" border="0" src="https://www.paypalobjects.com/sv_SE/i/scr/pixel.gif" width="1" height="1" style="width: 1px; height: 1px;">
					</form>

				</div>

				<div class="col-md-5">
					<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
					<!-- OSM - Responsiv -->
					<ins class="adsbygoogle"
					     style="display:block"
					     data-ad-client="ca-pub-5109391773804450"
					     data-ad-slot="6296847726"
					     data-ad-format="auto"></ins>
					<script>
						(adsbygoogle = window.adsbygoogle || []).push({});
					</script>
				</div>

			</div>
		</div>

		<div class="row">
			<div class="container">
				<div class="col-md-12">
					<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
					<!-- OSM - Responsiv -->
					<ins class="adsbygoogle"
					     style="display:block"
					     data-ad-client="ca-pub-5109391773804450"
					     data-ad-slot="6296847726"
					     data-ad-format="auto"></ins>
					<script>
						(adsbygoogle = window.adsbygoogle || []).push({});
					</script>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="container">
				<div class="col-md-6">
					<?php the_field('download_info_col1'); ?>
				</div>
				<div class="col-md-6">
					<?php the_field('download_info_col2'); ?>
				</div>
			</div>
		</div>

	</div>


	<div class="row">
		<div class="container">
			<div class="col-md-12 comments">
				<?php comments_template(); ?>
			</div>
		</div>
	</div>


	<?php endwhile; else: ?>
		 
		<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>

	<?php endif; ?>

<?php get_footer(); ?>
<!DOCTYPE html>
<html> 
<head>
	<meta charset="utf-8">
	
	<title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>
	
	<?php 
		// Add the blog description for the home/front page
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			echo " | $site_description";
	?>
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="google-site-verification" content="1lG_efYZvRzi_jpvO4mHMnWcDH4wNMBbLG7Gt_wuWAo" />

	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> Feed" href="<?php echo home_url(); ?>/feed/">
	<?php wp_head(); ?>
</head>
<body>
<div class="container-fluid" style="max-width: 960px; margin: 0 auto;">
	<div class="row-fluid">
		<div class="span4" style="background: #8dc63f; line-height: 40px; text-align: center; font-size: 24px; font-family: 'Sanchez';">
			<a href="<?php bloginfo("url"); ?>" style="text-decoration: none; color: #FFF;">marcussite.se</a>
		</div>
		<div class="span4 offset4">
			<div id="menu">
				<ul>
					<li class="general"><a href="<?php bloginfo("url"); ?>/category/allman/">Allmänt</a></li>
					<li class="travel"><a href="<?php bloginfo("url"); ?>/category/semester/">Resa</a></li>
					<li class="tech"><a href="<?php bloginfo("url"); ?>/category/teknik/">Teknik</a></li>
					<li class="news"><a href="<?php bloginfo("url"); ?>/category/nyheter/">Nyheter</a></li>
					<li class="photo"><a href="<?php bloginfo("url"); ?>/category/foto/">Foto</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<div id="wrapper" class="container-fluid" style="max-width: 960px; margin: 0 auto; padding-top: 60px;">
<!DOCTYPE html>
<html> 
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title><?php wp_title(); ?></title>
	
	<?php 
		// Add the blog description for the home/front page
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			echo " | $site_description";
	?>

	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> Feed" href="<?php echo home_url(); ?>/feed/">

	<script type="text/javascript">
		var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
	</script>

	<?php wp_head(); ?>
</head>
<body>

<header class="container">
	<div class="row">
		<div class="col-md-4 logo">
			<a href="<?php bloginfo("url"); ?>">marcussite.se</a>
		</div>
		<div class="col-md-4 menu-categories">
			<div id="menu">
				<ul>
					<li class="general"><a href="<?php bloginfo("url"); ?>/kategori/allman/">Allmänt</a></li>
					<li class="travel"><a href="<?php bloginfo("url"); ?>/kategori/semester/">Resa</a></li>
					<li class="tech"><a href="<?php bloginfo("url"); ?>/kategori/teknik/">Teknik</a></li>
					<li class="news"><a href="<?php bloginfo("url"); ?>/kategori/nyheter/">Nyheter</a></li>
					<li class="photo"><a href="<?php bloginfo("url"); ?>/kategori/foto/">Foto</a></li>
				</ul>
			</div>
		</div>
	</div>
</header>

<?php $wrapper_class = (is_front_page() || is_home()) ? " index" : ""; ?>
<?php $wrapper_class = (is_category()) ? " category" : $wrapper_class; ?>
<?php $wrapper_class = (!is_category() && !is_front_page() && !is_home()) ? " subpage" : $wrapper_class; ?>
<div id="wrapper" class="container<?php echo $wrapper_class ?>">
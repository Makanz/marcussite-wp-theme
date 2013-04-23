<?php
	
	add_action('wp_enqueue_scripts', 'loadScripts');
	
	// Load jQuery:
	function loadScripts(){
		
		// Register style:
		wp_register_style('bootstrap', get_bloginfo('stylesheet_directory').'/includes/style/bootstrap.min.css');
		wp_register_style('bootstrap_responsive', get_bloginfo('stylesheet_directory').'/includes/style/bootstrap-responsive.min.css');
		wp_register_style('themestyle', get_bloginfo('stylesheet_url'));
		wp_register_style('mainstyle', get_bloginfo('stylesheet_directory').'/includes/style/main.css');
		
		// Register scripts:
		wp_register_script('jquery', get_bloginfo('stylesheet_directory').'/includes/scripts/jquery-1.9.1.min.js', array('jquery'));
		wp_register_script('bootstrap', get_bloginfo('stylesheet_directory').'/includes/scripts/bootstrap.min.js', array('jquery'));
		wp_register_script('masonry', get_bloginfo('stylesheet_directory').'/includes/scripts/jquery.masonry.min.js', array('jquery'));
		wp_register_script('themescript', get_bloginfo('stylesheet_directory').'/includes/scripts/theme_scripts.js', array('jquery'));
		
		// Styles:
		wp_enqueue_style('bootstrap');
		wp_enqueue_style('bootstrap_responsive');
		wp_enqueue_style('themestyle');
		wp_enqueue_style('mainstyle');

		// Scripts:
		wp_enqueue_script('jquery');
		wp_enqueue_script('bootstrap');
		wp_enqueue_script('masonry');
		wp_enqueue_script('themescript');
		
	}
	/*
	add_action('init', 'register_custom_menu');
	
	function register_custom_menu() {
		register_nav_menu('custom_menu', __('Huvudmeny'));
	}
	
	if ( function_exists('register_sidebar') )
		register_sidebar(array(
			'name' => 'Right sidebar',
			'description' => 'Widgets in this area will be shown on the right-hand side.',
			'before_widget' => '',
			'after_widget' => '',
			'before_title' => '<h2>',
			'after_title' => '</h2>',
	));
	
	if ( function_exists('register_sidebar') )
		register_sidebar(array(
			'name' => 'Footer',
			'description' => 'Widgets in this area will be shown in the footer.',
			'before_widget' => '',
			'after_widget' => '',
			'before_title' => '<h2>',
			'after_title' => '</h2>',
	));
	*/
	
	if ( function_exists( 'add_theme_support' ) ) {
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 660, 350, true ); // 660x350px Cropped 
	}
	
	if ( function_exists( 'add_image_size' ) ) { 
		add_image_size( 'item-thumb', 300, 9999 ); // Item Thumbnail Width 304px
		add_image_size( 'fullsize', 1280, 720, true ); // 1280x720 Cropped 
	}
	
	add_shortcode( 'fileDateEdit', 'fileDateEdit_func' );
	
	// [fileDateEdit filename="value"]
	function fileDateEdit_func( $atts ) {
		extract( shortcode_atts( array(
			'filename' => 'something',
		), $atts ) );
		
		$filename = "/var/www/marcussite/wp-content/uploads/downloads/garmin/{$filename}";
		if (file_exists($filename)) {
			return date("Y-m-d H:i:s", filemtime($filename)+3600)."<br/>Storlek: ".round((filesize($filename)/1048576))." mb";
		}
	}
	add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10, 3 );
	
	function remove_thumbnail_dimensions( $html, $post_id, $post_image_id ) {
		$html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
		return $html;
	}
	
	// Functions
	
	function excerpt($limit) {
		
		$excerpt = explode(' ', get_the_excerpt(), $limit);
		if (count($excerpt)>=$limit) {
			array_pop($excerpt);
			$excerpt = implode(" ",$excerpt).'...';
			$excerpt .= '<p><a href="'.get_permalink($post->ID).'">Läs mer</a></p>';
		} else {
			$excerpt = implode(" ",$excerpt);
		}
		$excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
		
		return $excerpt;
	}
	
	function get_excerpt(){
		$excerpt = get_the_content();
		$excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
		$excerpt = strip_shortcodes($excerpt);
		$excerpt = strip_tags($excerpt);
		$excerpt = substr($excerpt, 0, 40);
		$excerpt = substr($excerpt, 0, strripos($excerpt, " "));
		$excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
		$excerpt = $excerpt.'... <br/><a href="'.$permalink.'">Läs mer</a>';
		return $excerpt;
	}
	
	function generateIcon() {
		$categories = get_the_category($post->ID);
		$catArray = array(
			1 => "general",
			6 => "travel",
			1204 => "tech",
			4 => "news",
			1179 => "photo"
		);
		
		echo '<div class="catIcon '.$catArray[$categories[0]->cat_ID].'"><a href="'.get_bloginfo("url").'/category/'.$categories[0]->slug.'"></a></div>';
	}
	
?>
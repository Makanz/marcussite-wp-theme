<?php
	
	add_action('wp_enqueue_scripts', 'loadScripts');
	
	// Load jQuery:
	function loadScripts(){
		
		// Register style:
		wp_register_style('bootstrap', get_bloginfo('stylesheet_directory').'/includes/style/bootstrap.min.css');
		wp_register_style('mainstyle', get_bloginfo('stylesheet_directory').'/includes/style/main.css');

		// Register scripts:
		wp_register_script('masonry', '//cdnjs.cloudflare.com/ajax/libs/masonry/2.1.08/jquery.masonry.min.js', array('jquery'));
		wp_register_script('imagesloaded', '//cdnjs.cloudflare.com/ajax/libs/jquery.imagesloaded/3.0.4/jquery.imagesloaded.min.js', array('jquery'));
		wp_register_script('themescript', get_bloginfo('stylesheet_directory').'/includes/scripts/theme_scripts.js', array('jquery'));
		
		// Styles:
		wp_enqueue_style('bootstrap');
		wp_enqueue_style('mainstyle');

		// Scripts:
		wp_enqueue_script('masonry');
		wp_enqueue_script('imagesloaded');
		wp_enqueue_script('themescript');
		
	}
	
	if ( function_exists( 'add_theme_support' ) ) {
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 660, 350, true ); // 660x350px Cropped 
	}
	
	if ( function_exists( 'add_image_size' ) ) { 
		add_image_size( 'old-size_one', 390, 390 ); // Old image size
		//add_image_size( 'old-size_two', 390, 390 ); // Old image size

		add_image_size( 'item-thumb', 300, 9999 ); // Item Thumbnail Width 300px
		add_image_size( 'fullsize', 1280, 720, true ); // 1280x720 Cropped
	}
	
	add_shortcode( 'fileDateEdit', 'fileDateEdit_func' );
	
	// [fileDateEdit filename="value"]
	function fileDateEdit_func( $atts ) {
		extract( shortcode_atts( array(
			'filename' => 'something',
		), $atts ) );
		
		$filename = "/home/u/u1409896/www/wp-content/uploads/downloads/garmin/{$filename}";
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
			$excerpt .= '<br/><a href="'.get_permalink($post->ID).'">Läs mer!</a>';
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
		
		echo '<div class="catIcon '.$catArray[$categories[0]->cat_ID].'"><a href="'.get_bloginfo("url").'/kategori/'.$categories[0]->slug.'"></a></div>';
	}

	function LoadMorePosts(){

		//echo "PostID: ".$_POST['postID'];
		$currentCategorie = $categories = get_the_category($_POST['postID']);
		//echo $currentCategorie[0]->cat_ID;
		//$display_count = 6;
		//$offset = ( $page - 1 ) * $display_count;

		$content_query = new WP_Query(array(
			'post__not_in' => array($_POST['postID']),
			'post_type' => 'post',
			'post_status' => 'publish',
			'posts_per_page' => 7,
			'paged' => $_POST["currentPage"],
			'cat' => $currentCategorie[0]->cat_ID
		));

		if( $content_query->have_posts() ) {
		?>
			<?php
			while ($content_query->have_posts()) : $content_query->the_post(); ?>
				<div class="news-item fade">
					<?php generateIcon(); ?>
					<?php if(has_post_thumbnail()){ ?>
						<a href="<?php the_permalink() ?>">
							<?php the_post_thumbnail('item-thumb'); ?>
						</a>
					<?php } ?>
					<div class="col-md-12">
						<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
						<span class="date-style"><?php the_time('j F, Y'); ?></span>
						<?php echo '<p>'.excerpt(20).'</p>'; ?>
						<?php
						$comments_img_link= ' ';
						comments_popup_link($comments_img_link .'0 Kommentarer', $comments_img_link .'1 Kommentar', $comments_img_link . '% Kommentarer');
						?>
					</div>
				</div>
			<?php
			endwhile;
		}
		wp_reset_postdata();  // Restore global post data stomped by the_post().


		// Return the String
		die($results);
	}
	// creating Ajax call for WordPress
	add_action( 'wp_ajax_nopriv_LoadMorePosts', 'LoadMorePosts' );
	add_action( 'wp_ajax_LoadMorePosts', 'LoadMorePosts' );

?>
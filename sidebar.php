	<div id="sidebar">
		<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
			<div>
				<input type="text" value="" name="s" id="s" placeholder="Sök" />
				<input type="submit" id="searchsubmit" value="Sök" />
			</div>
		</form>

		<h3>Senaste inläggen</h3>
		<ul>
		<?php
			$args = array( 'numberposts' => '5', 'post_status' => 'publish' );
			$recent_posts = wp_get_recent_posts( $args );
			foreach( $recent_posts as $recent ){
				echo '<li><a href="' . get_permalink($recent["ID"]) . '" title="Look '.esc_attr($recent["post_title"]).'" >' .   $recent["post_title"].'</a> </li> ';
			}
		?>
		</ul>

		<h3><?php _e('Archives'); ?></h3>
		<ul>
			<?php wp_get_archives( array( 'type' => 'monthly', 'limit' => 12, 'show_post_count' => 'true' ) ); ?>
		</ul>
	</div>

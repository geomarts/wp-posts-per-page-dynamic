<?php
$default_posts_per_page = get_option( 'posts_per_page' );
$posts_to_show          = array( $default_posts_per_page, $default_posts_per_page * 2, $default_posts_per_page * 3, $default_posts_per_page * 4 );
?>

<select class="posts-per-page">
	<?php
	foreach ( $posts_to_show as $number ) :
		$selected = isset( $_GET['posts_to_show'] ) && intval( $_GET['posts_to_show'] ) === $number ? 'selected' : '';
		?>
		<option value="<?php echo esc_url( add_query_arg( 'posts_to_show', $number ) ); ?>" <?php echo $selected; ?>>
			<?php echo $number; ?>
		</option>
	<?php endforeach; ?>							
</select>

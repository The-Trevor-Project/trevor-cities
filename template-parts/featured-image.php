<?php

if ( is_singular( 'event' ) ) {
	$city_id = get_field( 'city' );
	$hero_background = get_field( 'hero_background', $city_id );
	$title = get_field( 'event_title' );
} else {
	$hero_background = get_field( 'hero_background' );
	$title = get_the_title();
}

?>

<div id="hero-image" style="background-image: url('<?php echo $hero_background; ?>');">
	<div id="hero-filter">
		<div class="row">
			<div class="small-12 medium-10 medium-centered columns text-center">
				<h1><?php echo $title ?></h1>
				<?php if ( $hero_intro = get_field( 'hero_intro' ) ): ?>
					<?php echo $hero_intro; ?>
				<?php endif; ?>
			</div>
		</div>
		<?php if( !is_singular( 'event' ) ): ?>
		<div id="star">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/trevor-star.png" alt="Trevor Star">
		</div>
		<?php endif; ?>
	</div>
</div>
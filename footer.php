<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "off-canvas-wrap" div and all content after.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */


$city_facebook_url = get_field( 'city_facebook_url' );
$city_twitter_url  = get_field( 'city_twitter_url' );
$email             = get_field( 'trevor_youtube', 'option' );
$linkedin          = get_field( 'trevor_tumblr', 'option' );

if( $city_facebook_url ) {
	$facebook_url = $city_facebook_url;
} else {
	$facebook_url = get_field( 'trevor_facebook', 'option' );
}

if( $city_twitter_url ) {
	$twitter = $city_twitter_url;
} else {
	$twitter = get_field( 'trevor_twitter', 'option' );
}
?>

		</section>
		<div id="footer-container">
			<footer id="footer">
				<div class="small-12 large-6 columns">
					<p id="copyright">&copy; <?php echo date("Y"); ?> The Trevor Project. All rights reserved. <a href="<?php the_field( 'privacy_policy', 'option' ); ?>" target="_blank">Privacy Policy</a></p>
				</div>
				<div class="small-12 large-6 columns">
					<div class="right">

						<?php if( $facebook_url || $twitter || $linkedin || $email ) : ?>

							<ul id="footer-social" class="social-media">

								<?php if( $facebook_url ): ?>
									<li><a href="<?php echo $facebook_url; ?>" target="blank"><i class="fa fa-facebook"></i></a></li>
								<?php endif; ?>

								<?php if( $twitter ): ?>
									<li><a href="<?php echo $twitter; ?>" target="blank"><i class="fa fa-twitter"></i></a></li>
								<?php endif; ?>

								<?php if( $linkedin ): ?>
									<li><a href="<?php echo $linkedin; ?>" target="blank"><i class="fa fa-tumblr"></i></a></li>
								<?php endif; ?>

								<?php if( $email ): ?>
									<li><a href="<?php echo $email; ?>" target="blank"><i class="fa fa-youtube"></i></a></li>
								<?php endif; ?>

							</ul>

						<?php endif; ?>

					</div>
					<div class="right">
						<a href="<?php the_field( 'trevor_website_url', 'option' ); ?>" class="button secondary">Trevor Main Site</a>
					</div>
				</div>
			</footer>
		</div>

		<?php do_action( 'foundationpress_layout_end' ); ?>

<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) == 'offcanvas' ) : ?>
		</div><!-- Close off-canvas wrapper inner -->
	</div><!-- Close off-canvas wrapper -->
</div><!-- Close off-canvas content wrapper -->
<?php endif; ?>


<?php wp_footer(); ?>
<?php do_action( 'foundationpress_before_closing_body' ); ?>
</body>
</html>

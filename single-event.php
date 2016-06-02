<?php

get_header();
$city_id = get_field( 'city' );

// Event Information
$event_date = get_field( 'event_date' );
$month_int  = date( 'm', strtotime( $event_date ) );
$month      = date( 'M' , strtotime( $event_date ) );
$day        = date ( 'd', strtotime( $event_date ) );
$year       = date( 'Y', strtotime( $event_date ) );

$event_location = get_field( 'event_location' );
$eid = get_field( 'classy_eid' );

$tickets_description = get_field( 'tickets_description' );

$donation_form_id = get_field( 'donation_form_id' );

$hide_silent_auction = get_field( 'hide_silent_auction' );

get_template_part( 'template-parts/featured-image' ); ?>

	<div id="page-full-width" role="main">


		<!-- Event Overview -->
		<section id="event-overview" style="background-image: url('<?php the_field( 'event_overview_background_image' ); ?>');">
			<div class="filter">
				<?php if( !empty( $event_date ) ) : ?>
				<!-- Countdown -->
				<div id="countdown" class="hide-for-small-only">
					<div class="row" data-equalizer>
						<div class="small-12 medium-9 columns">
							<div class="countdown-description" data-equalizer-watch>
								<p class="heading">Days Until <?php the_field( 'event_title' ); ?></p>
								<p class="sub-heading"><?php if( $event_date ) : echo $month . ' ' . (int) $day . ', ' . $year . ', '; endif; echo $event_location; ?></p>
							</div>
						</div>
						<div class="small-12 medium-3 columns text-center">
							<div class="countdown-days" data-equalizer-watch>
								<div class="wrapper-table">
									<div class="wrapper-cell">
										<?php daysRemaining( $month_int, $day, $year ); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div><!-- /Countdown -->
				<?php endif; ?>

				<div class="content-panel">
					<div class="row">
						<div class="medium-10 large-8 medium-centered large-centered columns text-center">
							<h2>Event Overview</h2>
							<?php the_field( 'overview_description' ); ?>
							<?php if( $presented_by_logo = get_field( 'presented_by_logo' ) || have_rows( 'presenting_sponsors_repeater' ) ) :?>
								<h3 id="presented-by">Presented By:</h3>

								<?php
								if( $presenting_sponsors_repeater = get_field( 'presenting_sponsors_repeater' ) ) :

									$counter = 0;
									$presenting_sponsors_count = count( $presenting_sponsors_repeater );

									echo '<div class="row">';

									while( have_rows( 'presenting_sponsors_repeater' ) ) : the_row();

										$sponsor_logo = get_sub_field( 'sponsor_logo' );
										$sponsor_url = get_sub_field( 'sponsor_url' );

										?>
										<div class="medium-3 <?php
										if( $presenting_sponsors_count == 1 || ($counter == $presenting_sponsors_count - 1 && $presenting_sponsors_count % 4 == 1 ) ) {
											echo 'small-centered medium-centered';
										}
										if( $presenting_sponsors_count == 2 && $counter == 0 || ($counter == $presenting_sponsors_count - 2 && $presenting_sponsors_count % 4 == 2 ) ) {
											echo 'medium-offset-3';
										}
										if( $presenting_sponsors_count == 3 && $counter == 0 || ($counter == $presenting_sponsors_count - 3 && $presenting_sponsors_count % 4 == 3 )  ) {
											echo 'medium-offset-1-5';
										}
										?> columns text-center <?php /* Will add "end" class if it's the last item in the array */ if( $presenting_sponsors_count == $counter + 1 && $counter > 1 ) { echo ' end';} ?>">
											<div class="wrapper">

												<?php if( $sponsor_url ) : ?>
												<a href="<?php echo $sponsor_url; ?>" target="_blank">
													<img src="<?php echo $sponsor_logo; ?>" alt="Presented By">
												</a>
												<?php else: ?>
													<img src="<?php echo $sponsor_logo; ?>" alt="Presented By">
												<?php endif; ?>


											</div>
										</div>

										<?php
										$counter ++;
										?>
									<?php endwhile;

								echo '</div>';

								else : ?>

								<?php endif; ?>

							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>

		</section><!-- /Event Overview -->


		<!-- Special Guests -->
		<section id="special-guests" class="content-panel">
			<div class="row">
				<div class="column text-center">
					<h2><?php the_field( 'special_guests_heading' ); ?></h2>
				</div>
			</div>

			<div class="row guests" data-equalizer>
				<?php
				if( $guests = get_field( 'guests_repeater' ) ) : ?>
					<?php
					$counter = 0;
					$guests_count = count( $guests );
					while( have_rows( 'guests_repeater' ) ): the_row();

						// Guest Variables
						$guest_name = get_sub_field( 'guest_name' );
						$guest_title = get_sub_field( 'title' );
						$guest_subheading = get_sub_field( 'guest_subheading' );
						?>
						<div class="small-6 medium-3
						<?php
						if( $guests_count == 1 || ($counter == $guests_count - 1 && $guests_count % 4 == 1 ) ) {
							echo 'small-centered medium-centered';
						}
						if( $guests_count == 2 && $counter == 0 || ($counter == $guests_count - 2 && $guests_count % 4 == 2 ) ) {
							echo 'medium-offset-3';
						}
						if( $guests_count == 3 && $counter == 0 || ( $counter == $guests_count - 3 && $guests_count % 4 == 3 )  ) {
							echo 'medium-offset-1-5';
						}
						?> columns text-center guest <?php /* Will add "end" class if it's the last item in the array */ if($guests_count == $counter + 1 && $guests_count > 1) { echo ' end';} ?>" data-equalizer-watch>
							<div class="wrapper">
								<div class="image-wrapper">
									<img src="<?php the_sub_field( 'guest_photo' ); ?>" alt="<?php the_sub_field( 'guest_name' ) ?>">
								</div>
								<div class="text-wrapper">
									<h3><?php echo $guest_name; ?></h3>
									<?php if( $guest_title ) : ?>
										<p class="title"><?php echo $guest_title; ?></p>
									<?php endif; ?>
									<?php if( $guest_subheading ) : ?>
									<p class="type"><?php echo $guest_subheading; ?></p>
									<?php endif; ?>
								</div>
							</div>
						</div>
					<?php 
					$counter ++;
					endwhile; ?>
				<?php else : ?>
					<div class="row small-12 columns text-center more-information">
						<p>More information coming soon!</p>
					</div>
				<?php endif; ?>
			</div>

		</section>
		<!-- /Special Guests-->

		<?php if( $hide_silent_auction != 1 ) : ?>
		<!-- Silent Auction -->
		<section id="silent-auction" style="background-image: url('<?php the_field( 'silent_auction_background_image' ) ?>')">
			<div class="filter">
				<div class="content-panel">
					<div class="row">
						<div class="medium-10 medium-centered columns text-center">
							<h2>Silent Auction</h2>
							<?php if( $auction_description = get_field( 'auction_description' ) ): ?>

								<?php echo $auction_description; ?>

							<?php endif; ?>
						</div>
					</div>
					<?php
					$auction_items       = get_field( 'auction_items' );
					$auction_items_count = count( $auction_items );
					$mobile_auction_url  = get_field( 'mobile_auction_url' );

					if( $auction_items ) : ?>

							<?php
							$counter = 0;
							while( have_rows( 'auction_items' ) ): the_row();
								if( $counter % 4 == 0 ) {
									echo '<div class="row auction-items" data-equalizer>';
								}
								?>
								<div class="small-6 medium-3 columns text-center auction-item <?php if( $auction_items_count == $counter + 1 ):?>end<?php endif; ?>" data-equalizer-watch>
									<div class="wrapper">
										<div class="image-wrapper">
											<span class="value">Value: <?php if( is_numeric( $item_value = get_sub_field( 'item_value' ) ) ):?>$<?php endif;?><?php echo $item_value; ?></span>
											<span data-tooltip aria-haspopup="true" class="has-tip" data-disable-hover='false' tabindex=1 title="<?php the_sub_field( 'item_description' ); ?>"><img src="<?php the_sub_field( 'item_image' ); ?>" alt="<?php the_sub_field( 'item_heading' ); ?>"></span>
										</div>
										<div class="text-wrapper">
											<h3>
												<?php the_sub_field( 'item_heading' ); ?>
											</h3>
											<p>
												<?php the_sub_field( 'business_name' ); ?>
											</p>
										</div>
									</div>
								</div>
							<?php
							$counter ++;
							if ( $counter == $auction_items_count ) {
								echo '</div>';
							} elseif ( $counter % 4 == 0 ) {
								echo '</div>';
							}
							endwhile; ?>
						</div>
					<?php else: ?>
						<div class="row small-12 columns text-center more-information">

							<?php if( empty( $auction_description ) && empty( $mobile_auction_url ) ) : ?>
							<p>More information coming soon!</p>
							<?php endif; ?>

							<?php if( $mobile_auction_url ) : ?>
								<a href="<?php echo $mobile_auction_url; ?>" class="button primary">Start Bidding, Register Today!</a>
							<?php endif; ?>

							<?php if( $enable_silent_auction = ( get_field( 'enable_donation_form' ) ) == 1 ): ?>
								<button class="toggle button primary">Donate to the Silent Auction</button> <?php if( $post->ID == 357 ): ?><a href="http://cities.thetrevorproject.org/wp-content/uploads/2016/03/DC-Ambassadors_Night-out-For-Trevor_Silent-Auction-Donation-Form.pdf" class="button primary show-for-medium-up" target="_blank">Offline Form</a><?php endif; ?>
							<?php endif; ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</section><!-- /Silent Auction -->
		<?php endif; ?>

		<!-- Silent Auction Donation -->

		<?php if( $enable_silent_auction == 1 ): ?>

		<section id="silent-auction-form">
			<div class="content-panel">
				<div class="row">
					<div class="small-12 columns text-center">
						<h3>Donate to the Silent Auction</h3>
					</div>
				</div>
				<?php
					echo '<div class="silent-auction-form"><div class="row"><div class="small-12 columns">';
					gravity_form( $donation_form_id, false, false, false, '', false );
					echo '</div></div>'
		        ?>
			</div>
		</section>

		<?php endif; ?><!-- /Silent Auction Donation -->

		<!-- Tickets -->
		<?php if( have_rows( 'tickets_repeater' ) ):
		$tickets_description = get_field( 'tickets_description' );
		?>

		<section id="tickets">
			<div class="content-panel<?php if( $hide_silent_auction == 1 ) : ?> no-top-padding<?php endif; ?>">
				<div class="row">
					<div class="medium-10 columns medium-centered text-center">
						<h2 <?php if( empty( $tickets_description ) ):?>class="no-description"<?php endif; ?>><?php the_field( 'tickets_heading' ); ?></h2>
						<?php if( $tickets_description ): ?>
							<div class="description">
								<?php echo $tickets_description; ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
				<div class="row">
					<div class="medium-10 medium-centered columns">
						<?php
						echo '<ul class="accordion" data-accordion data-multi-expand="true" data-allow-all-closed="true">';
						$counter = 0;
						while ( have_rows( 'tickets_repeater' ) ): the_row();

							$ticket_name = get_sub_field( 'ticket_name' );
							$ticket_description = get_sub_field( 'ticket_description' );
							$classy_id = get_sub_field( 'classy_id' );
							$cost = get_sub_field( 'ticket_price' );
							$ticket_type = get_sub_field( 'type' );
							$sold_out_mode = get_sub_field( 'ticket_sold_out' );
							?>

							<?php if( $sold_out_mode != 1 ): ?>
								<li class="accordion-navigation" data-accordion-item>
									<a href="#ticket<?php echo $counter; ?>" class="accordion-title"><?php echo $ticket_name; ?></a>
									<div id="ticket<?php echo $counter; ?>" class="accordion-content" data-tab-content>
										<div class="row">
											<div class="small-12 medium-8 columns">
												<?php echo $ticket_description; ?>
											</div>
											<?php if( $sold_out_mode == 0 ): ?>
												<?php if( $ticket_type == 'table' ): ?>
													<div class="medium-3 columns text-center">
														<p class="price">Price: $<?php echo number_format( $cost ); ?></p>
														<form action="https://give.thetrevorproject.org/checkout/load-cart" method="POST">
															<input type="hidden" name="eid" value="<?php echo $eid; ?>">
															<input type="hidden" name="ticket_<?php echo $classy_id; ?>" value="1">
															<input type="submit" value="Buy Now" class="button secondary">
														</form>
													</div>
												<?php else: ?>
													<div class="medium-3 columns text-center">
														<p class="price">Price: $<?php echo number_format( $cost ); ?></p>
														<form action="https://give.thetrevorproject.org/checkout/load-cart" method="POST">
															<input type="hidden" name="eid" value="<?php echo $eid; ?>">
															<select name="ticket_<?php echo $classy_id; ?>">
																<?php if( $classy_id == 34358 ): ?>
																<option value="1">1</option>
																<option value="2">2</option>
																<?php else: ?>
																<option value="1">1</option>
																<option value="2">2</option>
																<option value="3">3</option>
																<option value="4">4</option>
																<option value="5">5</option>
																<option value="6">6</option>
																<option value="7">7</option>
																<option value="8">8</option>
																<option value="9">9</option>
																<option value="10">10</option>
																<?php endif; ?>
															</select>
															<input type="submit" value="Buy Now" class="button secondary">
														</form>
													</div>
												<?php endif; ?>
											<?php endif; ?>
										</div>
									</div>
								</li>
							<?php endif; ?>


							<?php
							$counter++;


						endwhile;
						echo '</ul>';

						?>
						<a href="https://give.thetrevorproject.org/checkout/donation?eid=<?php echo $eid; ?>" class="secondary button large" target="_blank">Can't make it to the event? Donate to the cause</a>

					</div>
				</div>
			</div>

		</section>
	<?php endif; ?>
		<!-- /Tickets -->

		<!-- Event Location -->

		<section id="event-location" style="background-image: url( '<?php the_field( 'event_location_background_image' ); ?>' );">
			<div class="filter content-panel">
				<div class="row">
					<div class="column text-center">
						<h2><?php the_field( 'event_location_heading' ); ?></h2>
					</div>
				</div>
				<div class="row">
					<div class="medium-7 columns location-map">
						<?php

						$location = get_field('map');

						if( !empty($location) ):
							?>
							<div class="acf-map">
								<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
							</div>
						<?php endif; ?>
					</div>
					<div class="medium-5 large-4 columns location-text">
						<?php the_field( 'event_location_text' ); ?>
					</div>
				</div>
			</div>
		</section><!-- /Event Location -->


		<!-- Sponsors -->
		<section id="sponsors">
			<div class="content-panel">
				<div class="row">
					<div class="column text-center">
						<h2>Sponsors</h2>
						<p>Interested in becoming a sponsor? Check out our sponsorship deck!</p>
						<p><a href="http://cities.thetrevorproject.org/wp-content/uploads/2016/02/A-Night-Out-For-Trevor-Sponsorship-Deck.pdf" target="_blank" class="button">Download Now</a></p>
					</div>
				</div>
				<?php

				if( have_rows( 'event_sponsors_repeater' ) ) :

					while( have_rows( 'event_sponsors_repeater' ) ) : the_row();

						$sponsor_group_heading = get_sub_field( 'sponsor_group_heading' );
						$event_sponsors = get_sub_field( 'event_sponsors' );
						$event_sponsors_count = count( $event_sponsors );

						echo '<div class="column row text-center"><h3>' . $sponsor_group_heading . '</h3></div>';

						$counter = 0;

						foreach ( $event_sponsors as $post ) :

							if ($counter % 6 == 0) {

								// Don't use 'sponsor' in the public class name or it will be blocked by Ad-blockers
								echo '<div class="row partners">';
							}

							setup_postdata( $post );
							$sponsor_name = get_the_title();
							$sponsor_logo = get_field( 'sponsor_logo' );
							$sponsor_website_url = get_field( 'sponsor_website_url' );

							/**
							 *
							 * LOGO COLUMN CLASSES
							 * Requires: $counter variable set to 0 outside of the foreach loop
							 * Requires: $event_sponsors_count variable set to the total number of sponsors that will be looped through
							 * Returns $sponsor_column_classes
							 *
							 */


							// If there is only 1 sponsor OR after a full row of 6 sponsors, there is 1 sponsor remaining
							if ( $event_sponsors_count == 1 || ( $event_sponsors_count % 6 == 1 ) && $counter != 0 ) {
								$sponsor_column_classes = NULL;
								$sponsor_column_classes = 'small-centered';
							}

							// If there are 2 sponsors OR after a full row of 6 sponsors, there are 2 sponsors remaining
							if( $event_sponsors_count == 2 || ( $counter > 5 && $event_sponsors_count % 6 == 2 ) ) {
								$sponsor_column_classes = NULL;
								$sponsor_column_classes = 'medium-offset-4';
							}

							// If there are 3 sponsors OR after a full row of 6 sponsors, there are 3 remaining
							if( $event_sponsors_count == 3 || $event_sponsors_count % 6 == 3 ) {
								$sponsor_column_classes = NULL;
								$sponsor_column_classes = 'medium-offset-3';
							}

							// If there are 4 sponsors OR after a full row of 6 sponsors, there are 4 remaining
							if ( $event_sponsors_count == 4 || $event_sponsors_count % 6 == 4 ) {
								$sponsor_column_classes = NULL;
								$sponsor_column_classes = 'medium-offset-2';
							}

							// If there are 5 sponsors OR after a full row of 6 sponsors, there are 4 remaining
							if ( $event_sponsors_count == 5 || $event_sponsors_count % 6 == 5 ) {
								$sponsor_column_classes = NULL;
								$sponsor_column_classes = 'medium-offset-1';
							}

							// Only add the $sponsor_column_classes if there is 1 item OR its the beginning of a new row
							if ( $counter == 0 || $counter % 6 == 0 ) {
								$column_classes = 'small-4 medium-2 ' . $sponsor_column_classes;
							} else {
								$column_classes = 'small-4 medium-2';
							}

							if ( $counter + 1 == $event_sponsors_count && $event_sponsors_count > 1 && $event_sponsors_count % 6 != 1) {
								$column_classes .= ' end';
							}

							?>
							<div class="<?php echo $column_classes; ?> columns partner">
								<a href="<?php echo $sponsor_website_url; ?>" target="_blank">
									<img src="<?php echo $sponsor_logo; ?>" alt="<?php echo $sponsor_name; ?>">
								</a>
							</div>
							<?php

							// Increase the $counter variable by 1 each time we complete the loop
							$counter++;


							if ( $counter == $event_sponsors_count ) {
								echo '</div>';
							} elseif ($counter % 6 == 0) {
								echo '</div>';
							}

							// Reset $sponsor_column_classes
							$sponsor_column_classes = NULL;

						endforeach;

						wp_reset_postdata();

					endwhile;

				endif;

				?>
			</div>
		</section>
		<!-- /Sponsors -->


		<!-- Section: About Trevor -->
		<section id="about-trevor" style="background-image: url( '<?php the_field( 'about_background_image', 'option' ); ?>' );">

			<div class="filter content-panel">

				<?php if( $initiatives_heading = get_field( 'about_trevor_heading', 'option' ) ): ?>
					<div class="row">
						<div class="medium-10 medium-centered large-8 large-centered columns text-center">
							<h2><?php echo $initiatives_heading; ?></h2>
							<?php the_field( 'about_trevor_description', 'option' ); ?>
							<a href="<?php if ( $city_donate_url = get_field( 'donate_url' ) ) { echo $city_donate_url; } elseif ( $default_donate_url = get_field( 'donate_url', 'option' ) ) { echo $default_donate_url; } else { } ?>" class="button secondary medium" target="_blank"><?php the_field( 'default_donate_text', 'option' ); ?></a>
						</div>
					</div>
				<?php endif; ?>

			</div>

		</section><!-- /About Trevor -->


	</div>

<?php get_footer(); ?>
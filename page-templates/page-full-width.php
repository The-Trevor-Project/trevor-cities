<?php
/*
Template Name: City
*/
get_header(); ?>

<?php get_template_part( 'template-parts/featured-image' ); ?>

<div id="page-full-width" role="main">


    <!-- Section: About City -->
    <section class="content-panel" id="city-intro">
        <div class="row">
            <div class="medium-6 columns">
                <?php if( $about_city_heading = get_field( 'about_city_heading' ) ): ?>
                    <?php echo '<h2>' . $about_city_heading . '</h2>'; ?>
                <?php endif; ?>

                <?php if( $about_city_overview = get_field( 'about_city_overview' ) ): ?>
                    <?php echo $about_city_overview; ?>
                <?php endif; ?>

                <a href="#get-involved" class="button secondary small">GET INVOLVED</a>
            </div>
            <div class="medium-6 columns">
                <div class="local-photos owl-carousel">
                    <?php

                    $about_city_photos = get_field('about_city_photos');

                    if( $about_city_photos ): ?>
	                    <?php foreach( $about_city_photos as $image ): ?>
		                    <div class="local-photo">
			                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
		                    </div>
	                    <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>

    </section><!-- /About City-- >


    <!-- Section: Upcoming Events -->
	<?php if( have_rows( 'events_repeater' ) ): ?>
	<section id="upcoming-events" style="background-image: url( '<?php the_field('events_background_image'); ?>' );">
		<div class="filter content-panel">
			<?php if( $upcoming_events_heading = get_field( 'upcoming_events_heading' ) ): ?>
				<div class="row">
					<div class="column text-center">
						<h2><?php echo $upcoming_events_heading; ?></h2>
					</div>
				</div>
			<?php endif; ?>

			<?php if( have_rows( 'events_repeater' ) ) :
				$event_rows = get_field( 'events_repeater' );
				$event_count = count( $event_rows );
				$counter = 1;
				?>

				<div class="row events <?php if( $counter > 3 ): ?>events-init<?php endif; ?>">

					<?php while( have_rows( 'events_repeater' ) ): the_row(); ?>
					<div class="<?php if( $counter <= 2 ): ?>medium-4 columns <?php endif; ?><?php if( $counter == $event_count && $event_count < 4 && $event_count != 1 ): ?>end<?php endif; ?> <?php if( $event_count == 1 || ($counter == $event_count - 1 && $event_count % 4 == 1 ) ) { echo 'medium-centered'; }?> event text-center">
						<div class="wrapper">

							<?php if( $event_date = get_sub_field( 'event_date' ) ): ?>
								<p class="date"><?php echo $event_date; ?></p>
							<?php endif; ?>

							<?php if( $event_title = get_sub_field( 'event_title' ) ): ?>
								<h3><?php echo $event_title; ?></h3>
							<?php endif; ?>

							<?php if( $event_description = get_sub_field( 'event_description' ) ): ?>
								<p class="description"><?php echo $event_description; ?></p>
							<?php endif; ?>

							<?php if( $event_button_text = get_sub_field( 'event_button_text' ) ): ?>
								<a href="<?php the_sub_field( 'event_button_url' ); ?>" class="button secondary small"><?php echo $event_button_text; ?></a>
							<?php endif; ?>

						</div>
					</div>
					<?php
					$counter ++;
					endwhile; ?>

				</div>

			<?php endif; ?>
		</div>
	</section>
	<?php endif; ?><!-- /Upcoming Events -->


	<!-- Section: Initiatives -->
	<?php if( have_rows( 'initiatives_repeater' ) ): ?>
	<section id="initiatives" class="content-panel">

		<?php if( $initiatives_heading = get_field( 'initiatives_heading' ) ): ?>
			<div class="row">
				<div class="column text-center">
					<h2><?php echo $initiatives_heading; ?></h2>
				</div>
			</div>
		<?php endif; ?>

		<?php if( have_rows( 'initiatives_repeater' ) ) :
			$initiative_rows = get_field( 'initiatives_repeater' );
			$initiative_count = count( $initiative_rows );
			$counter = 1;
			?>

			<div class="row">
				<div class="column">
					<div class="row">
						<div class="small-9 small-centered medium-10 medium-centered columns">

							<div class="initiatives owl-carousel">

								<?php while( have_rows( 'initiatives_repeater' ) ): the_row(); ?>
									<div class="initiative text-center">
										<div class="wrapper">

											<?php if( $initiative_name = get_sub_field( 'initiative_name' ) ): ?>
												<h3><?php echo $initiative_name; ?></h3>
											<?php endif; ?>

											<?php if( $initiative_description = get_sub_field( 'initiative_description' ) ): ?>
												<?php echo $initiative_description; ?>
											<?php endif; ?>

											<?php if( $initiative_button_text = get_sub_field( 'initiative_button_text' ) ): ?>
												<a href="<?php the_field( 'initiative_button_url' ); ?>" class="button secondary small"><?php echo $initiative_button_text; ?></a>
											<?php endif; ?>

										</div>
									</div>
								<?php endwhile; ?>

							</div>

						</div>
					</div>
				</div>
			</div>

		<?php endif; ?>


	</section>
	<?php endif; ?><!-- /Initiatives -->


	<!-- Section: Committee -->
	<?php if( have_rows( 'committee_members_repeater' ) ): ?>
	<section id="committee" style="background-image: url( '<?php the_field('committee_background_image'); ?>' );">

		<div class="filter content-panel">
			<?php if( $initiatives_heading = get_field( 'committee_heading' ) ): ?>
				<div class="row">
					<div class="column text-center">
						<h2><?php echo $initiatives_heading; ?></h2>
					</div>
				</div>
			<?php endif; ?>

			<?php if( have_rows( 'committee_members_repeater' ) ) : ?>

				<div class="row small-up-2 medium-up-3 committee-members">

					<?php while( have_rows( 'committee_members_repeater' ) ): the_row();
						$twitter  = get_sub_field( 'twitter' );
						$facebook = get_sub_field( 'facebook' );
						$linkedin = get_sub_field( 'linkedin' );
						$email    = get_sub_field( 'email' );
						?>
						<div class="column committee-member text-center" itemscope itemtype="http://schema.org/Person">

							<?php if( $name = get_sub_field( 'name' ) ): ?>
								<h3 itemprop="name"><?php echo $name; ?></h3>
							<?php endif; ?>

							<?php if( $title = get_sub_field( 'title' ) ): ?>
								<p class="member-title" itemprop="jobTitle"><?php echo $title; ?></p>
							<?php endif; ?>

							<?php if ( $twitter || $facebook || $linkedin || $email ): ?>
								<ul class="social-media">
									<?php if( $facebook ): ?>
										<li><a href="<?php echo $facebook; ?>" target="blank" itemprop="url"><i class="fa fa-facebook"></i></a></li>
									<?php endif; ?>

									<?php if( $twitter ): ?>
										<li><a href="<?php echo $twitter; ?>" target="blank" itemprop="url"><i class="fa fa-twitter"></i></a></li>
									<?php endif; ?>

									<?php if( $linkedin ): ?>
										<li><a href="<?php echo $linkedin; ?>" target="blank" itemprop="url"><i class="fa fa-tumblr"></i></a></li>
									<?php endif; ?>

									<?php if( $email ): ?>
										<li><a href="mailto:<?php echo $email; ?>" target="blank" itemprop="email"><i class="fa fa-envelope-o"></i></a></li>
									<?php endif; ?>
								</ul>
							<?php endif; ?>

						</div>
						
					<?php endwhile; ?>

				</div>

			<?php endif; ?>
		</div>

	</section>
	<?php endif; ?><!-- /Committee -->


	<!-- Section: Get Involved -->
	<section id="get-involved" class="content-panel">

		<?php if( $get_involved_heading = get_field( 'get_involved_heading' ) ): ?>
			<div class="row">
				<div class="column text-center">
					<h2><?php echo $get_involved_heading; ?></h2>
				</div>
			</div>
		<?php endif; ?>

		<?php if ( $get_involved_description = get_field( 'get_involved_description' ) ): ?>
		<div class="row">
			<div class="small-12 medium-10 medium-centered columns text-center">
				<?php echo $get_involved_description; ?>
			</div>
		</div>
		<?php endif; ?>

		<?php if( $get_involved_form_id = get_field( 'get_involved_form_id' ) ): ?>
		<div class="row">
			<div class="column">
				<?php gravity_form( $get_involved_form_id, $display_title = false, $display_description = false, $display_inactive = false, $field_values = null, $ajax = true ); ?>
			</div>
		</div>
		<?php endif; ?>

	</section><!-- /Get Involved -->


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
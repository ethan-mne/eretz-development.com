<?php

/**
 * Template Name: Fullpage Slider
 * @author: VLThemes
 * @version: 1.0.5
 */

get_header();

$loop_top = mikael_get_field( 'slider_loop_top' );
$loop_bottom = mikael_get_field( 'slider_loop_bottom' );
$speed = mikael_get_field( 'slider_speed' );
$progress_bar = mikael_get_field( 'slider_progress_bar' );
$numbers = mikael_get_field( 'slider_numbers' );

// prepend query
$args = array(
	'post_type' => 'slide',
	'posts_per_page' => -1,
	'post_status' => 'publish',
	'orderby' => 'date',
	'order' => 'ASC',
);

$new_query = new WP_Query( $args );

$slide_IDs = [];

?>

<main class="vlt-main">

	<div class="vlt-fullpage-slider" data-loop-top="<?php echo esc_attr( $loop_top ); ?>" data-loop-bottom="<?php echo esc_attr( $loop_bottom ); ?>" data-speed="<?php echo esc_attr( $speed ); ?>">

		<?php

			if ( $new_query->have_posts() ) : while ( $new_query->have_posts() ) : $new_query->the_post();

				$slide_ID = get_the_title();
				$slide_IDs[] = $slide_ID;

				// slide settings
				$section_brightness = mikael_get_field( 'section_brightness' );
				$section_background_color = mikael_get_field( 'section_background_color' );
				$section_background_image = mikael_get_field( 'section_background_image' );

				// video background
				$video_background = mikael_get_field( 'video_background' );

				// ken burn
				$ken_burn_background_image = mikael_get_field( 'ken_burn_background_image' );

				$section_style = '';

				if ( $section_background_color ) {
					$section_style .= ' background-color: ' . $section_background_color . ';';
				}

				if ( $section_background_image ) {
					$section_style .= ' background-image: url(' . wp_get_attachment_image_src( $section_background_image[ 'id' ], 'mikael-1920x1080_crop' )[0] . ');';
				}

				?>

				<div class="vlt-section pp-scrollable" data-anchor="<?php echo esc_attr( $slide_ID ); ?>" data-brightness="<?php echo esc_attr( $section_brightness ); ?>" style="<?php echo mikael_sanitize_style( $section_style ); ?>">

					<div class="vlt-section__vertical-align">

						<div class="vlt-section__content">

							<?php if ( $ken_burn_background_image ) : ?>

								<div class="vlt-section__ken-burn-background">
									<img src="<?php echo esc_url( wp_get_attachment_image_src( $ken_burn_background_image[ 'id' ], 'mikael-1920x1080_crop' )[0] ); ?>" alt="background" loading="lazy">
								</div>
								<!-- /.vlt-section__ken-burn-background -->

							<?php endif; ?>

							<?php if ( $video_background ) : ?>

								<div class="vlt-section__video jarallax" data-jarallax-video="<?php echo esc_url( $video_background ); ?>"></div>

							<?php endif; ?>

							<?php if ( have_rows( 'section_particles' ) ) : ?>

								<div class="vlt-section__particles">

									<?php

										while ( have_rows( 'section_particles' ) ) : the_row();

											$particle_image = get_sub_field( 'particle_image' );

											$particle_class = 'vlt-particle';
											$particle_class .= ' ' . get_sub_field( 'particle_custom_class' );
											$particle_class .= ' ' . get_sub_field( 'particle_animation_name' );

											$particle_style = '';

											if ( $particle_image ) {
												$particle_style .= ' background-image: url(' . esc_url( wp_get_attachment_image_src( $particle_image[ 'id' ], 'full' )[0] ) . ');';
											}

											if ( get_sub_field( 'particle_transition_duration' ) ) {
												$particle_style .= ' transition-duration: ' . get_sub_field( 'particle_transition_duration' ) . 's;';
											}

											if ( get_sub_field( 'particle_transition_delay' ) ) {
												$particle_style .= ' transition-delay: ' . get_sub_field( 'particle_transition_delay' ) . 's;';
											}

											echo '<div class="' . mikael_sanitize_class( $particle_class ) . '" style="' . mikael_sanitize_style( $particle_style ) . '"></div>';

										endwhile;

									?>

								</div>
								<!-- /.vlt-section__particles -->

							<?php endif; ?>

							<div class="vlt-section__elementor">

								<?php the_content(); ?>

							</div>
							<!-- /.container -->

						</div>
						<!-- /.vlt-section__content -->

					</div>
					<!-- /.vlt-section__vertical-align -->

				</div>
				<!-- /.vlt-section -->

			<?php

			endwhile; endif;
			wp_reset_postdata();

			// show progress bar
			if ( $progress_bar ) {
				echo '<div class="vlt-fullpage-slider-progress-bar">';
				echo '<span></span>';
				echo '</div>';
			}

			// show numbers
			if ( $numbers ) {
				echo '<div class="vlt-fixed-action-block vlt-fixed-action-block--slider-numbers"></div>';
			}

		?>

	</div>

</main>
<!-- /.vlt-main -->

<?php get_footer(); ?>
<?php
/**
 * Testimonial Slider Block Template.
 *
 * @param  array  $block  The block settings and attributes.
 * @param  string  $content  The block inner HTML (empty).
 * @param  bool  $is_preview  True during AJAX preview.
 * @param  (int|string)  $post_id  The post ID this block is saved to.
 */

$id = 'eqd-testimonial-slider-' . esc_attr( $block['id'] );

if ( ! empty( $block['anchor'] ) ) {
	$id = esc_attr( $block['anchor'] );
}

$className = 'eqd-testimonial-slider';
if ( ! empty( $block['className'] ) ) {
	$className .= ' ' . esc_attr( $block['className'] );
}

?>

<?php if ( have_rows( 'testimonial_slider' ) ) : ?>
    <div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $className ); ?>" role="region" aria-label="carousel">
        <div class="super-container">
            <div class="testimonial-slider-swiper container">
                <div class="swiper-wrapper slider">
					<?php
					while ( have_rows( 'testimonial_slider' ) ) : the_row();
						$testimonial_headline = get_sub_field( 'headline' );
						$testimonial_image = get_sub_field( 'image' );
						$testimonial_name = get_sub_field( 'name' );
						$testimonial_text = get_sub_field( 'text' );
						$testimonial_image_alt = ! empty( $testimonial_image['alt'] ) ? esc_attr( $testimonial_image['alt'] ) : esc_attr( $testimonial_name . "'s photo" );
						?>

                        <div class="swiper-slide slide">
                            <h2 class="slide-headline">"<?php echo esc_html( $testimonial_headline ); ?>"</h2>
                            <div class="slide-content">
                                <div class="slide-details">
                                    <img src="<?php echo esc_url( $testimonial_image['sizes']['large'] ); ?>"
                                         alt="<?php echo esc_attr( $testimonial_image_alt ); ?>"/>
                                    <h3 class="name"><?php echo esc_html( $testimonial_name ); ?></h3>
                                    <button class="eqd-slide-button-control" aria-pressed="false">
                                        <span class="screen-reader-text">Pause</span>
                                        <span class="dashicons dashicons-controls-pause"></span>
                                    </button>
                                    <div class="slide-ctrl play">
                                        <div class="icon" width="120" height="120">
                                            <div class="side left" x="0" y="0" width="120" height="120"
                                                 fill="#fff"></div>
                                            <div class="side right" x="0" y="0" width="120" height="120"
                                                 fill="#fff"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="slide-text">
                                    <p><?php echo wp_kses_post( $testimonial_text ); ?></p>
                                </div>
                            </div>
                        </div>

					<?php endwhile; ?>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
<?php endif; ?>
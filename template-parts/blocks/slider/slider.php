<?php
$block_id = 'slider-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$block_id = $block['anchor'];
}
$class_name = 'swiper hl-slider';
if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$class_name .= ' align' . $block['align'];
}

if ( have_rows( 'hl_slider' ) ) :
	?>
<div id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $class_name ); ?>">
  <div class="swiper-wrapper">
    <?php
    while ( have_rows( 'hl_slider' ) ) :
        the_row();
        $slide_image_id = get_sub_field( 'hl_slide_image' );
        $slide_image_url = wp_get_attachment_image_src( $slide_image_id, 'full' )[0];
        $slide_image_alt = get_post_meta( $slide_image_id, '_wp_attachment_image_alt', true );
        $slide_image_caption = get_post( $slide_image_id )->post_excerpt;
        ?>
        <div class="swiper-slide">
            <img src="<?php echo esc_url( $slide_image_url ); ?>" alt="<?php echo esc_attr( $slide_image_alt ); ?>">
            <?php
            if ( $slide_image_caption ) :
                ?>
                <div class="carousel-caption">
                    <p class="lead"><?php echo esc_html( $slide_image_caption ); ?></p>
                </div>
                <?php
            endif;
            ?>
            <div class="slide-caption">
                <h2 class="heading"><?php the_sub_field( 'hl_slide_heading' ); ?></h2>
                <p class="lead"><?php the_sub_field( 'hl_slide_text' ); ?></p>
                <?php if ( get_sub_field( 'hl_button_link' ) ) : ?>
                    <a class="button" href="<?php the_sub_field( 'hl_button_link' ); ?>" role="button"><?php the_sub_field( 'hl_button_text' ); ?></a>
                <?php endif; ?>
            </div>
        </div>
    <?php
    endwhile;
    ?>
    </div><!-- /.swiper-wrapper -->
    <div class="swiper-pagination"></div>
    <button class="hl-button-control pause">
        <span class="screen-reader-text"><?php esc_html_e( 'Pause', 'mstar' ); ?></span>
        <span class="dashicons dashicons-controls-pause"></span>
    </button>
    <button class="hl-button-control play">
        <span class="screen-reader-text"><?php esc_html_e( 'Play', 'mstar' ); ?></span>
        <span class="dashicons dashicons-controls-play"></span>
    </button>
</div><!-- /.swiper -->
<?php
endif;

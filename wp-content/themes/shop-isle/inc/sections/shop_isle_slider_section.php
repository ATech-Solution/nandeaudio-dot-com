<?php
/**
 * Front page Slider Section
 *
 * @package WordPress
 * @subpackage Shop Isle
 */

$shop_isle_slider_hide = get_theme_mod( 'shop_isle_slider_hide', false );
if ( ! empty( $shop_isle_slider_hide ) && (bool) $shop_isle_slider_hide === true ) {
	return;
}
$shop_isle_homepage_slider_shortcode = get_theme_mod( 'shop_isle_homepage_slider_shortcode' );

echo '<section id="home" class="home-section home-parallax home-fade ' . ( empty( $shop_isle_homepage_slider_shortcode ) ? ' home-full-height' : ' home-slider-plugin' ) . '">';

if ( ! empty( $shop_isle_homepage_slider_shortcode ) ) {
	echo do_shortcode( $shop_isle_homepage_slider_shortcode );
} else {

	$shop_isle_slider = get_theme_mod( 'shop_isle_slider', json_encode( array(
		array(
			'image_url' => get_template_directory_uri() . '/assets/images/slide1.jpg',
			'link'      => '#',
			'text'      => __( 'Shop Isle', 'shop-isle' ),
			'subtext'   => __( 'WooCommerce Theme', 'shop-isle' ),
			'label'     => __( 'Read more', 'shop-isle' ),
		),
		array(
			'image_url' => get_template_directory_uri() . '/assets/images/slide2.jpg',
			'link'      => '#',
			'text'      => __( 'Shop Isle', 'shop-isle' ),
			'subtext'   => __( 'WooCommerce Theme', 'shop-isle' ),
			'label'     => __( 'Read more', 'shop-isle' ),
		),
		array(
			'image_url' => get_template_directory_uri() . '/assets/images/slide3.jpg',
			'link'      => '#',
			'text'      => __( 'Shop Isle', 'shop-isle' ),
			'subtext'   => __( 'WooCommerce Theme', 'shop-isle' ),
			'label'     => __( 'Read more', 'shop-isle' ),
		),
	) ) );

	if ( ! empty( $shop_isle_slider ) ) {

		$shop_isle_slider_decoded = json_decode( $shop_isle_slider );

		if ( ! empty( $shop_isle_slider_decoded ) ) {

			echo '<style scoped> .bgPicture { background-image: url("/wp-content/uploads/2017/03/Home_MD_02-1024x533.png"); } 
			@media screen and (max-width: 767px) and (min-width: 480px) { .bgPicture { background-image: url("/wp-content/uploads/2017/03/Home_Slider_Mobile(cropped).jpg");} }
			@media screen and (min-width: 768px) { .bgPicture { background-image: url("/wp-content/uploads/2017/03/Home2_Top_Banner-1024x535_optimized_size.png");}}</style>';

			echo '<div class="hero-slider">';

			echo '<ul class="slides">';

			foreach ( $shop_isle_slider_decoded as $shop_isle_slide ) {

				if ( ! empty( $shop_isle_slide->image_url ) ) {

					if ( function_exists( 'icl_t' ) && ! empty( $shop_isle_slide->id ) ) {
						$shop_isle_slider_image_url = icl_t( 'Slide ' . $shop_isle_slide->id, 'Slide image', $shop_isle_slide->image_url );
						echo '<li class="bg-dark-30 bg-dark bgPicture" style="background-image:url(' . esc_url( $shop_isle_slider_image_url ) . ')">';
					} else {
						echo '<li class="bg-dark-30 bg-dark bgPicture" >';
					}

					echo '<div class="hs-caption">';
					echo '<div class="caption-content">';

					if ( ! empty( $shop_isle_slide->text ) ) {
						if ( function_exists( 'icl_t' ) && ! empty( $shop_isle_slide->id ) ) {
							$shop_isle_slider_text = icl_t( 'Slide ' . $shop_isle_slide->id, 'Slide text', $shop_isle_slide->text );
							echo '<div class="hs-title-size-4 font-alt mb-30">' . $shop_isle_slider_text . '</div>';
						} else {
							echo '<div class="hs-title-size-4 font-alt mb-30">' . $shop_isle_slide->text . '</div>';
						}
					}

					if ( ! empty( $shop_isle_slide->subtext ) ) {
						if ( function_exists( 'icl_t' ) && ! empty( $shop_isle_slide->id ) ) {
							$shop_isle_slider_subtext = icl_t( 'Slide ' . $shop_isle_slide->id, 'Slide subtext', $shop_isle_slide->subtext );
							echo '<div class="hs-title-size-1 font-alt mb-40">' . $shop_isle_slider_subtext . '</div>';
						} else {
							echo '<div class="hs-title-size-1 font-alt mb-40">' . $shop_isle_slide->subtext . '</div>';
						}
					}

					if ( ! empty( $shop_isle_slide->link ) && ! empty( $shop_isle_slide->label ) ) {
						if ( function_exists( 'icl_t' ) && ! empty( $shop_isle_slide->id ) ) {
							$shop_isle_slider_link  = icl_t( 'Slide ' . $shop_isle_slide->id, 'Slide button link', $shop_isle_slide->link );
							$shop_isle_slider_label = icl_t( 'Slide ' . $shop_isle_slide->id, 'Slide button label', $shop_isle_slide->label );
							echo '<a href="' . esc_url( $shop_isle_slider_link ) . '" class="section-scroll btn btn-border-w btn-round">' . $shop_isle_slider_label . '</a>';
						} else {
							echo '<a href="/shop/" class="section-scroll btn btn-border-w btn-round">' .  '??????' . '<br/>'. 'Shop Now' . '</a>';
						}
					}
					echo '</div>';
					echo '</div>';
					echo '</li>';

				}
			}

			echo '</ul>';

			echo '</div>';

		}
	}
}

echo '</section >';




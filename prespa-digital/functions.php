<?php
/**
 * Prespa Digital functions and definitions
 *
 * @since 1.0.0
 */

/**
 * Register child theme's styles
 */
function prespa_digital_enqueue_theme_styles() {
	wp_enqueue_style( 'prespa-digital-styles', get_stylesheet_directory_uri() . '/style.css', array(), wp_get_theme()->get( 'Version' ) );
}

add_action( 'wp_enqueue_scripts', 'prespa_digital_enqueue_theme_styles' );

/**
 * Registers block patterns categories, and type.
 */
function prespa_digital_register_block_patterns() {
	$block_pattern_categories = array(
		'prespa-digital' => array( 'label' => esc_html__( 'Prespa Digital', 'prespa-digital' ) ),
	);

	$block_pattern_categories = apply_filters( 'prespa_digital_block_pattern_categories', $block_pattern_categories );

	foreach ( $block_pattern_categories as $name => $properties ) {
		if ( ! WP_Block_Pattern_Categories_Registry::get_instance()->is_registered( $name ) ) {
			register_block_pattern_category( $name, $properties );
		}
	}
}

add_action( 'init', 'prespa_digital_register_block_patterns', 9 );

// Change theme customizer defaults
function prespa_digital_customize_register( $wp_customize ) {
	$primary_accent_color_setting = $wp_customize->get_setting( 'primary_accent_color' );

	if ( $primary_accent_color_setting ) {
		$primary_accent_color_setting->default = '#0029e0';
	}
}

add_action( 'customize_register', 'prespa_digital_customize_register', 999, 1 );

// Overwrite parent theme color scheme
function prespa_customize_colors_css() {

	$body_text_color          = get_theme_mod( 'body_text_color' );
	$headings_text_color      = get_theme_mod( 'headings_text_color', '#101011' );
	$link_headings_text_color = get_theme_mod( 'link_headings_text_color', '#101011' );
	$links_text_color         = get_theme_mod( 'links_text_color' );
	$buttons_bgr_color        = get_theme_mod( 'buttons_bgr_color' );
	$primary_accent_color     = get_theme_mod( 'primary_accent_color', '#0029e0' );
	$secondary_accent_color   = get_theme_mod( 'secondary_accent_color', '#ebeefc' );

	?>
	
	<style>
	body:not(.dark-mode) {
	<?php if ( $links_text_color ) : ?>
	--wp--preset--color--links: <?php echo esc_attr( $links_text_color ); ?>;
	<?php endif; ?>
	<?php if ( $link_headings_text_color ) : ?>
	--wp--preset--color--link-headings: <?php echo esc_attr( $link_headings_text_color ); ?>;
	<?php endif; ?>
	}

	<?php if ( $body_text_color ) : ?> 
	body {
		color: <?php echo esc_attr( $body_text_color ); ?>;
	}
	<?php endif; ?>
	h1, h2, h3, h4, h5, h6 {
		color: <?php echo esc_attr( $headings_text_color ); ?>;
	}

	body:not(.dark-mode) input[type="button"], 
	body:not(.dark-mode) input[type="reset"], 
	body:not(.dark-mode) [type="submit"]:not(.header-search-form button),
	.wp-block-button > .slider-button,
	.wp-block-button .wp-block-button__link,
	.prespa-featured-products-wrapper .button {
		background-color: <?php echo $buttons_bgr_color ? esc_attr( $buttons_bgr_color ) : esc_attr( $primary_accent_color ); ?>;
	}

	<?php if ( $buttons_bgr_color ) : ?>
	.wp-element-button, .wp-block-button__link {
		background-color: <?php echo esc_attr( $buttons_bgr_color ); ?>;
	}
	<?php endif; ?>
	.back-to-top,
	.dark-mode .back-to-top,
	.navigation .page-numbers:hover,
	.navigation .page-numbers.current  {
		background-color: <?php echo $buttons_bgr_color ? esc_attr( prespa_brightness( $buttons_bgr_color, -50 ) ) : esc_attr( $primary_accent_color ); ?>
	}
	.fallback-svg {
		background: <?php echo esc_attr( prespa_hex_to_rgba( $primary_accent_color, .1 ) ); ?>;
	}
	.preloader .bounce1, .preloader .bounce2, .preloader .bounce3 {
		background-color: <?php echo esc_attr( prespa_brightness( $primary_accent_color, -25 ) ); // WPCS: XSS ok. ?>;
	}

	.top-meta a:nth-of-type(3n+1),
	.recent-posts-pattern .taxonomy-category a:nth-of-type(3n+1) {
		background-color:  <?php echo esc_attr( $primary_accent_color ); ?>;
		z-index: 1;
	}

	.top-meta a:nth-of-type(3n+1):hover,
	.recent-posts-pattern .taxonomy-category a:nth-of-type(3n+1):hover {
		background-color: <?php echo esc_attr( prespa_brightness( $primary_accent_color, -25 ) ); // WPCS: XSS ok. ?>;
	}

	.top-meta a:nth-of-type(3n+2) {
		background-color: <?php echo esc_attr( $secondary_accent_color ); ?>;
	}

	.top-meta a:nth-of-type(3n+2):hover {
		background-color: <?php echo esc_attr( prespa_brightness( $secondary_accent_color, -25 ) ); // WPCS: XSS ok. ?>;
	}

	.call-to-action.wp-block-button .wp-block-button__link {
		background-color: transparent;
		border: 1px solid #fff;
	}

	@media(min-width:54rem){
		body:not(.dark-mode):not(.has-transparent-header) .call-to-action.wp-block-button .wp-block-button__link {
			background-color:  <?php echo esc_attr( $secondary_accent_color ); ?>;
			color: var(--wp--preset--color--links);
			font-weight: bold;
		}
	}

	body:not(.dark-mode) .call-to-action.wp-block-button .wp-block-button__link:hover {
		background-color: <?php echo esc_attr( $primary_accent_color ); ?>;
		color: var(--wp--preset--color--white);
	}

	.categories-section .category-meta {
		background-color: <?php echo esc_attr( prespa_hex_to_rgba( $primary_accent_color, .6 ) ); ?>;
		z-index: 1;
	}

	.categories-section .category-meta:hover {
		background-color: <?php echo esc_attr( prespa_hex_to_rgba( $primary_accent_color, .75 ) ); ?>;
		z-index: 1;
	}

	.section-features figure::before {
		background: <?php echo esc_attr( $primary_accent_color ); ?>;
		opacity: .85;
	}

	@media (max-width: 54em) {
		.slide-menu, .site-menu.toggled > .menu-toggle {
			background-color:  <?php echo esc_attr( $primary_accent_color ); ?>;
		}
	}

	@media (min-width:54em){
		#secondary .tagcloud a:hover {
			background-color: <?php echo esc_attr( $secondary_accent_color ); ?>;
		}
	}
	</style>
	
	<?php
}

/**
 * starter content
 */
require get_theme_file_path() . '/starter-content/init.php';

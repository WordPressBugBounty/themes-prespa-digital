<?php
/**
 * Right Sidebar starter content.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$default_content = sprintf(
	'
	<!-- wp:group {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|medium"}}},"textColor":"silver-blue","layout":{"type":"constrained","wideSize":"","contentSize":"300px"}} -->
	<div class="wp-block-group has-silver-blue-color has-text-color" style="margin-bottom:var(--wp--preset--spacing--medium);"><!-- wp:columns {"style":{"border":{"radius":"10px"},"spacing":{"padding":{"right":"0","left":"0"}}}} -->
	<div class="wp-block-columns" style="border-radius:10px;padding-right:0;padding-left:0"><!-- wp:column {"width":"300px"} -->
	<div class="wp-block-column" style="flex-basis:300px"><!-- wp:image {"id":2089,"width":"100px","height":"100px","sizeSlug":"large","linkDestination":"none","style":{"border":{"radius":"50px"}}} -->
	<figure class="wp-block-image size-large is-resized has-custom-border"><img src="%1$s" alt="" class="wp-image-2089" style="border-radius:50px;width:100px;height:100px"/></figure>
	<!-- /wp:image -->
	
	<!-- wp:heading {,"style":{"typography":{"fontStyle":"normal","fontWeight":"700"}},"textColor":"black","fontSize":"medium"} -->
	<h2 class="wp-block-heading has-black-color has-text-color has-medium-font-size" style="font-style:normal;font-weight:700">%3$s</h2>
	<!-- /wp:heading -->
	
	<!-- wp:paragraph {"textColor":"text-primary","fontSize":"small"} -->
	<p class="has-text-primary-color has-text-color has-small-font-size">%2$s</p>
	<!-- /wp:paragraph --></div>
	<!-- /wp:column --></div>
	<!-- /wp:columns --></div>
	<!-- /wp:group -->
    ',
	esc_url( get_stylesheet_directory_uri() . '/assets/img/pd-patterns/team-members/team-member-02.jpg' ),
	esc_html( 'Anne Defour is a freelance writer and journalist, formerly assistant editor of the Digital Handbook. Her latest book, A History of the Mind - a time travel series through ice and fire, is out now.', 'prespa-digital' ),
	esc_html( 'Anne Defour', 'prespa-digital'),
);

return array(
	'search',
	'prespa_digital_author'    => array(
		'text',
		array(
			'title' => esc_html_x( 'Biography', 'Theme starter content', 'prespa-digital' ),
			'text'  => $default_content,
		),
	),
    'categories',
	'archives',
	'meta'
);

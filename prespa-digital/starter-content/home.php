<?php
/**
 * Home starter content.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$default_page_content = '
<!-- wp:pattern {"slug":"prespa-digital/hero-image"} /-->
<!-- wp:pattern {"slug":"prespa-digital/partners"} /-->
<!-- wp:pattern {"slug":"prespa-digital/features"} /-->
<!-- wp:pattern {"slug":"prespa-digital/case-study-one"} /-->
<!-- wp:pattern {"slug":"prespa-digital/case-study-two"} /-->
<!-- wp:pattern {"slug":"prespa-digital/recent-projects"} /-->
<!-- wp:pattern {"slug":"prespa-digital/team-members"} /-->
<!-- wp:pattern {"slug":"prespa-digital/testimonials"} /-->
';

return array(
	'post_type'    => 'page',
	'post_title'   => _x( 'Home', 'Theme starter content', 'prespa-digital' ),
	'post_content' => $default_page_content,
);
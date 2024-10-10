<?php

function prespa_starter_content_setup() {

    add_theme_support(
        'starter-content',
        array(

            'posts'     => array(
                'home'     => require __DIR__ . '/home.php',
                'blog',
            ),

            'widgets'   => array(
                'sidebar-1' => require __DIR__ . '/sidebar-1.php',
                'sidebar-2' => require __DIR__ . '/footer-1.php',
                'sidebar-3' => require __DIR__ . '/footer-2.php',
                'sidebar-4' => require __DIR__ . '/footer-3.php',
                'sidebar-5' => require __DIR__ . '/footer-4.php',
            ),

            'options'   => array(
                'show_on_front'  => 'page',
                'page_on_front'  => '{{home}}',
                'page_for_posts' => '{{blog}}',
            ),

            'nav_menus' => array(
                'menu-1' => array(
                    'name'  => __( 'Primary', 'prespa-digital' ),
                    'items' => array(
                        'page_home',
                        'page_blog',
                    ),
                ),
            ),
        )
    );
}
<?php

add_action( 'init', 'register_acf_blocks' );
function register_acf_blocks() {
    register_block_type( __DIR__ . '/block/header-block' );
    register_block_type( __DIR__ . '/block/values-block' );
    register_block_type( __DIR__ . '/block/about-block' );
    register_block_type( __DIR__ . '/block/btn-block' );
    register_block_type( __DIR__ . '/block/section-right-block' );
    register_block_type( __DIR__ . '/block/contact-block' );
    register_block_type( __DIR__ . '/block/map-block' );
    register_block_type( __DIR__ . '/block/breadcrumbs-block' );
}
?>
<?php

// Useful global constants.
define( 'THEME_VERSION', '0.1.0' );
define( 'THEME_TEMPLATE_URL', get_template_directory_uri() );
define( 'THEME_PATH', get_template_directory() . '/' );
//define( 'TENUP_THEME_DIST_PATH', TENUP_THEME_PATH . 'dist/' );
//define( 'TENUP_THEME_DIST_URL', TENUP_THEME_TEMPLATE_URL . '/dist/' );
define( 'THEME_INC', THEME_PATH . 'includes/' );
//define( 'TENUP_THEME_BLOCK_DIR', TENUP_THEME_INC . 'blocks/' );
//define( 'TENUP_THEME_BLOCK_DIST_DIR', TENUP_THEME_PATH . 'dist/blocks/' );


// Include factory files and build
require_once THEME_INC . 'factory-loader.php';
factoryLoader();
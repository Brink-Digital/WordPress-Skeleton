<?php

require_once get_template_directory() . '/includes/FactoryLoader.php';

use BDSkeleton\Factories\FactoryLoader;

// Load and register all factories on init
add_action('init', [ FactoryLoader::class, 'loadFactories' ]) ;

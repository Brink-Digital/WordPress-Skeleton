<?php
/**
 * Loads the various factory classes
 */

function factoryLoader() {
    $factoriesToLoad = [
        'PostType',
        'Rest',
        'Overrides',
    ];

    foreach ( $factoriesToLoad as $factory ) {
        $fileName = THEME_INC . $factory . 'Factory.php';
        require_once $fileName;
    }
    

    // For each factory, call the register method
    foreach ( $factoriesToLoad as $factory ) {
        $factory = $factory . 'Factory';
        $factory::register();
    }
}
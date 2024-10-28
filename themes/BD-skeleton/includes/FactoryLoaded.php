<?php
namespace BDSkeleton\Factories;

/**
 * FactoryLoader class to autoload factory classes.
 */
class FactoryLoader {
    /**
     * Array of directories to load factories from.
     * 
     * @var array
     */
    protected static $directories = [
        'PostType' => 'BDSkeleton\PostTypes\PostTypeFactory',
        'Taxonomy' => 'BDSkeleton\Taxonomies\TaxonomyFactory',
        'MetaBox'  => 'BDSkeleton\MetaBoxes\MetaBoxFactory'
    ];

    /**
     * Load all factories.
     * 
     * @return void
     */
    public static function loadFactories() {
        foreach (self::$directories as $subDir => $factoryClass) {
            $path = get_template_directory() . "/includes/$subDir";
            
            // Load each factory class if it exists
            if (file_exists("$path/$factoryClass.php")) {
                require_once "$path/$factoryClass.php";
                
                // Call register method on each factory
                if (class_exists($factoryClass)) {
                    call_user_func([$factoryClass, 'register']);
                } else {
                    error_log("Factory class $factoryClass does not exist.");
                }
            }
        }
    }
}

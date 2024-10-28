<?php

namespace BDSkeleton\PostTypes\PostTypes;

/**
 * PostTypeFactory class for registering CPTs
 */
class PostTypeFactory {
    protected static $postTypes = [
        // CustomPostTypeExample::class,
    ];

    /**
     * Register post types
     * 
     * return void
     */
    public static function registerPostTypes() {
        foreach ( self::$postTypes as $postTypeClass ) {
            if ( class_exists( $postTypeClass ) ) {
                new $postTypeClass();
            } else {
                error_log( "Class $postTypeClass does not exist." );
            }
        }
    }
}

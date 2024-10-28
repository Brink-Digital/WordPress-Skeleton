<?php

namespace BDSkeleton\PostTypes;

abstract class AbstractPostType {
	/**
	 * Should CPT support Gutenberg editor.
	 *
	 * @var bool $gutenberg_support
	 */
	protected $gutenberg_support = true;

	/**
	 * Should CPT support revision.
	 *
	 * @var bool $revision_support
	 */
	protected $revision_support = true;

	/**
	 * Should CPT support thumbnails.
	 *
	 * @var bool $revision_support
	 */
	protected $thumbnail_support = true;

	/**
	 * Should the CPT be Public?
	 *
	 * @var bool $is_public
	 */
	protected $is_public = true;

	/**
	 * Has archive?
	 *
	 * @var mixed $has_archive
	 */
	protected $has_archive = true;

	/**
	 * Post type slug
	 *
	 * @var string $post_type
	 */
	protected $post_type;

	/**
	 * Icon for the post type menu
	 *
	 * @var string $menu_icon
	 */
	protected $menu_icon;

	/**
	 * Final constructor to set up post type registration.
	 */
	final public function __construct() {
		$this->post_type = $this->get_name();
		$this->menu_icon = $this->get_menu_icon();
		add_action( 'init', [ $this, 'register' ] );
	}

	/**
	 * Get the post type name.
	 *
	 * @return string
	 */
	abstract public function get_name(): string;

	/**
	 * Get the singular post type label.
	 *
	 * @return string
	 */
	abstract public function get_singular_label(): string;

	/**
	 * Get the plural post type label.
	 *
	 * @return string
	 */
	abstract public function get_plural_label(): string;

	/**
	 * Get the menu icon for the post type.
	 *
	 * @return string
	 */
	protected function get_menu_icon(): string {
		return 'dashicons-admin-post';
	}

	/**
	 * Get editor supports options.
	 *
	 * @return array
	 */
	protected function get_editor_supports(): array {
		$supports = [ 'title', 'editor', 'thumbnails' ];
		if ( $this->gutenberg_support ) {
			$supports[] = 'editor';
		}
		if ( $this->revision_support ) {
			$supports[] = 'revisions';
		}
		return $supports;
	}

	/**
	 * Get the labels for the post type.
	 *
	 * @return array
	 */
	protected function get_labels(): array {
		$plural_label = $this->get_plural_label();
		$singular_label = $this->get_singular_label();

		return [
			'name'                     => $plural_label,
			'singular_name'            => $singular_label,
			'all_items'                => sprintf( __( 'All %s', 'bd-skeleton' ), $plural_label ),
			'add_new_item'             => sprintf( __( 'Add New %s', 'bd-skeleton' ), $singular_label ),
			'edit_item'                => sprintf( __( 'Edit %s', 'bd-skeleton' ), $singular_label ),
			'new_item'                 => sprintf( __( 'New %s', 'bd-skeleton' ), $singular_label ),
			'view_item'                => sprintf( __( 'View %s', 'bd-skeleton' ), $singular_label ),
			'search_items'             => sprintf( __( 'Search %s', 'bd-skeleton' ), $plural_label ),
			'not_found'                => sprintf( __( 'No %s found.', 'bd-skeleton' ), strtolower( $plural_label ) ),
			'not_found_in_trash'       => sprintf( __( 'No %s found in Trash.', 'bd-skeleton' ), strtolower( $plural_label ) ),
			'menu_name'                => $plural_label,
		];
	}

	/**
	 * Get the options for the post type.
	 *
	 * @return array
	 */
	protected function get_options(): array {
		return [
			'labels'              => $this->get_labels(),
			'exclude_from_search' => false,
			'public'              => $this->is_public,
			'has_archive'         => $this->has_archive,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_rest'        => true,
			'menu_icon'           => $this->menu_icon,
			'supports'            => $this->get_editor_supports(),
		];
	}

	/**
	 * Register the custom post type.
	 */
	public function register() {
		register_post_type( $this->post_type, $this->get_options() );
	}
}

<?php
/**
 * Role Editor
 *
 * @package ChoctawNation
 */

namespace ChoctawNation;

/**
 * Role Editor
 */
class Role_Editor {
	/**
	 * Current role and capability schema version.
	 *
	 * @var string
	 */
	const VERSION = '1.0.0';

	/**
	 * Constructor
	 */
	public function __construct() {
		add_action( 'after_switch_theme', array( $this, 'create_custom_roles' ) );
		add_action( 'admin_init', array( $this, 'maybe_sync_roles_and_capabilities' ) );
	}

	/**
	 * Maybe sync roles and capabilities based on stored version.
	 *
	 * Ensures that updates to the role/capability schema are applied even when
	 * the theme is updated in place (without triggering after_switch_theme).
	 */
	public function maybe_sync_roles_and_capabilities() {
		$stored_version = get_option( 'choctaw_role_editor_version' );

		if ( self::VERSION === $stored_version ) {
			return;
		}

		$this->create_custom_roles();

		update_option( 'choctaw_role_editor_version', self::VERSION );
	}

	/**
	 * Create custom roles and add capabilities for the Block Editor
	 */
	public function create_custom_roles() {
		$this->create_cno_roles_for_gutenberg();
		$this->add_custom_capabilities();
	}

	/**
	 * Add custom capabilities to roles
	 */
	private function add_custom_capabilities() {
		$capability = 'can_unlock_blocks';
		$roles      = array( 'administrator', 'front-end' );
		foreach ( $roles as $role ) {
			$role_obj = get_role( $role );
			if ( $role_obj && ! $role_obj->has_cap( $capability ) ) {
				$role_obj->add_cap( $capability );
			}
		}
	}

	/**
	 * Create Front-End and Content roles with editor capabilities
	 */
	private function create_cno_roles_for_gutenberg() {
		$editor = get_role( 'editor' );
		if ( ! $editor ) {
			return;
		}

		$custom_roles = array(
			'front-end'      => 'Front End Developer',
			'content-editor' => 'Content Editor',
		);

		foreach ( $custom_roles as $role => $display_name ) {
			if ( ! get_role( $role ) ) {
				add_role( $role, $display_name, $editor->capabilities );
			}
			$role_obj = get_role( $role );
			if ( $role_obj ) {
				$role_obj->add_cap( 'gform_full_access' );
				$role_obj->add_cap( 'manage_options' );
				// Remove 'unfiltered_html' capability if present
				if ( $role_obj->has_cap( 'unfiltered_html' ) ) {
					$role_obj->remove_cap( 'unfiltered_html' );
				}
			}
		}
	}
}

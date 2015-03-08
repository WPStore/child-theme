<?php
/**
 * @author    WP-Store.io <code@wp-store.io>
 * @copyright Copyright (c) 2015, WP-Store.io
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GPL-2.0+
 * @package   WPStore\ChildThemeName
 * @version   0.0.1
 */

namespace WPStore\Themes;

class ChildThemeName {

	public static function init() {

		add_action( 'after_setup_theme',  array( __CLASS__, 'setup'   ) );
		add_action( 'wp_enqueue_scripts', array( __CLASS__, 'enqueue' ) );

	} // END init()

	public function setup() {

		load_theme_textdomain( 'child-theme-slug', get_template_directory() . '/languages' );

	} // END setup()

	public function enqueue() {

		$version        = wp_get_theme()->Version;
		$parent_version = wp_get_theme()->parent()->Version;

		/**
		 * Load the Parent Themes (editor-)style.css
		 * @see https://kovshenin.com/2014/child-themes-import/
		 */
		wp_enqueue_style( 'parent-theme-css',        get_template_directory_uri() . '/style.css',        array(), $parent_version );
		wp_enqueue_style( 'parent-theme-editor-css', get_template_directory_uri() . '/editor-style.css', array(), $parent_version );

		// Custom JS
		wp_enqueue_script( 'custom-js', get_stylesheet_directory_uri() . '/assets/js/custom.js', array( 'jquery' ), $version, true );

	} // END enqueue()

} // END class ChildThemeName

\WPStore\Themes\ChildThemeName::init();

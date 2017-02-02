<?php
/**
 * Taxonomy Handler
 *
 * @package     SB2Media\Module\FAQ\Custom
 * @since       1.0.0
 * @author      sbarry50
 * @link        https://sb2media.com
 * @license     GNU General Public License 2.0+
 */

namespace SB2Media\Module\FAQ\Custom;

add_action( 'init', __NAMESPACE__ . '\register_custom_taxonomy' );
/**
 * Register the taxonomy.
 *
 * @since 1.0.0
 *
 * @return void
 */
function register_custom_taxonomy() {

	$args = array(
		'label'             => __( 'Topics', FAQ_MODULE_TEXT_DOMAIN ),
		'labels'            => get_taxonomy_labels_config( 'Topic', 'Topics', FAQ_MODULE_TEXT_DOMAIN ),
		'hierarchical'      => true,
		'show_admin_column' => true,
	);
	register_taxonomy( 'topic', array( 'faq' ), $args );
}

/**
 * Get the post type label configuration
 * @since  1.0.0
 * @param  string    $post_type
 * @param  string    $singular_label
 * @param  string    $plural_label
 * @return array
 */
function get_taxonomy_labels_config( $singular_label, $plural_label, $text_domain, $menu_label = '') {

	if( !$menu_label ) {
		$menu_label = $plural_label;
	}

    return array(
		'name'                       => _x( $plural_label, 'taxonomy general name', $text_domain ),
		'singular_name'              => _x( $singular_label, 'taxonomy singular name', $text_domain ),
		'search_items'               => __( 'Search ' . $plural_label, $text_domain ),
		'popular_items'              => __( 'Popular ' . $plural_label, $text_domain ),
		'all_items'                  => __( 'All ' . $plural_label, $text_domain ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit ' . $singular_label, $text_domain ),
		'view_item'                  => __( 'View ' . $singular_label, $text_domain ),
		'update_item'                => __( 'Update ' . $singular_label, $text_domain ),
		'add_new_item'               => __( 'Add New ' . $singular_label, $text_domain ),
		'new_item_name'              => __( 'New ' . $singular_label . ' Name', $text_domain ),
		'separate_items_with_commas' => __( 'Separate ' . strtolower($plural_label) . ' with commas', $text_domain ),
		'add_or_remove_items'        => __( 'Add or remove ' . strtolower($plural_label), $text_domain ),
		'choose_from_most_used'      => __( 'Choose from the most used ' . strtolower($plural_label), $text_domain ),
		'not_found'                  => __( 'No ' . strtolower($plural_label) . ' found.', $text_domain ),
		'menu_name'                  => $menu_label,
	);
}

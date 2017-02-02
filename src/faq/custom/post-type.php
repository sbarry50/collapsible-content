<?php
/**
 * Description
 *
 * @package     SB2Media\Module\FAQ\Custom
 * @since       1.0.0
 * @author      sbarry50
 * @link        https://sb2media.com
 * @license     GNU General Public License 2.0+
 */

namespace SB2Media\Module\FAQ\Custom;

add_action('init', __NAMESPACE__ . '\register_faq_custom_post_type');
/**
 * Register the custom post type.
 *
 * @since 1.0.0
 *
 * @return void
 */
function register_faq_custom_post_type() {
    $features = get_all_post_type_features('post', array(
        'excerpt',
        'comments',
        'trackbacks',
        'custom-fields',
    ));

    $features[] = 'page-attributes';

    $post_type = 'faq';
    $args = array(
        'description'   => 'Frequently Asked Questions (FAQ)',
        'label'         => __('FAQs', FAQ_MODULE_TEXT_DOMAIN),
        'labels'        => get_post_type_labels_config($post_type, 'FAQ', 'FAQs', FAQ_MODULE_TEXT_DOMAIN),
        'public'        => true,
        'supports'      => $features,
        'menu_icon'     => 'dashicons-editor-help',
        'has_archive'   => true,
    );
    register_post_type($post_type, $args);
}

/**
 * Get the post type label configuration
 * @since  1.0.0
 * @param  string    $post_type
 * @param  string    $singular_label
 * @param  string    $plural_label
 * @return array
 */
function get_post_type_labels_config($post_type, $singular_label, $plural_label, $text_domain) {
    return array(
        'name'               => _x($plural_label, 'post type general name', $text_domain),
        'singular_name'      => _x($singular_label, 'post type singular name', $text_domain),
        'menu_name'          => _x($plural_label, 'admin menu', $text_domain),
        'name_admin_bar'     => _x($singular_label, 'add new on admin bar', $text_domain),
        'add_new'            => _x('Add New', $post_type, $text_domain),
        'add_new_item'       => __('Add New ' . $singular_label, $text_domain),
        'new_item'           => __('New ' . $singular_label, $text_domain),
        'edit_item'          => __('Edit ' . $singular_label, $text_domain),
        'view_item'          => __('View ' . $singular_label, $text_domain),
        'all_items'          => __('All ' . $plural_label, $text_domain),
        'search_items'       => __('Search ' . $plural_label, $text_domain),
        'parent_item_colon'  => __('Parent ' . $plural_label . ':', $text_domain),
        'not_found'          => __('No ' . $plural_label . ' found.', $text_domain),
        'not_found_in_trash' => __('No ' . $plural_label . 'found in Trash.', $text_domain)
    );
}

/**
 * Get all the post type features for the given post type.
 *
 * @since 1.0.0
 *
 * @param string $post_type Given post type
 * @param array $exclude_features Array of features to exclude
 *
 * @return array
 */
function get_all_post_type_features($post_type = 'post', $exclude_features = array()) {
    $configured_features = get_all_post_type_supports($post_type);
    if (! $exclude_features) {
        return array_keys($configured_features);
    }
    $features = array();
    foreach ($configured_features as $feature => $value) {
        if (in_array($feature, $exclude_features)) {
            continue;
        }
        $features[] = $feature;
    }
    return $features;
}

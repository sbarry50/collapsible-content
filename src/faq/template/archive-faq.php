<?php
/**
 * FAQ Archive Template
 *
 * @package     SB2Media\Module\FAQ\Template
 * @since       1.0.0
 * @author      sbarry50
 * @link        https://sb2media.com
 * @license     GNU General Public License 2.0+
 */

namespace SB2Media\Module\FAQ\Template;

remove_action( 'genesis_loop', 'genesis_do_loop' );
add_action( 'genesis_loop', __NAMESPACE__ . '\do_faq_archive_loop' );
/**
 * Do the FAQ Archive Loop and render out the HTML.
 *
 * @since  1.0.0
 * @return void
 */
function do_faq_archive_loop() {
    $records = get_posts_grouped_by_term( 'faq', 'topic' );

    if( ! $records ) {
        echo '<p>Sorry, there are no FAQs.</p>';
    }

    foreach( $records as $record ) {
        include( __DIR__ . '/views/container.php' );
    }
}

function loop_and_render_faqs( array $faqs ) {
    $attributes = array(
        'show_icon' => 'dashicons dashicons-arrow-down-alt2',
        'hide_icon' => 'dashicons dashicons-arrow-up-alt2',
    );

    foreach( $faqs as $faq ) {
        $hidden_content = do_shortcode( $faq['post_content'] );

        include( __DIR__ . '/views/faq.php' );
    }

}

genesis();

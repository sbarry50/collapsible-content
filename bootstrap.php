<?php
/**
 * Collapsible Content plugin
 *
 * @package         SB2Media\CollapsibleContent
 * @author          sbarry50
 * @license         GPL-2.0+
 * @link            https://SB2Media.com
 *
 * @wordpress-plugin
 * Plugin Name:     Collapsible Content
 * Plugin URI:      _
 * Description:     Collapsible Content is a WordPress Plugin that shows and hides hidden content.  Practical examples include Q&As, FAQs, hints, marketing teasers, and more.  Click the icon to open and reveal the content. Click again to close and hide it.
 * Version:         1.0.0
 * Author:          sbarry50
 * Author URI:      https://SB2Media.com
 * License:         GPL2
 * License URI:     https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:     collapsible_content
 * Domain Path:     /languages
 * Requires WP:     4.7
 * Requires PHP:    5.5
 */

namespace SB2Media\CollapsibleContent;

if( ! defined( 'ABSPATH' ) ) {
    exit( "There's nothing to see here.");
}


define( 'COLLAPSIBLE_CONTENT_PLUGIN', __FILE__ );
define( 'COLLAPSIBLE_CONTENT_DIR', plugin_dir_path( __FILE__ ) );
$plugin_url = plugin_dir_url( __FILE__ );
if ( is_ssl() ) {
	$plugin_url = str_replace( 'http://', 'https://', $plugin_url );
}
define( 'COLLAPSIBLE_CONTENT_URL', $plugin_url );
define( 'COLLAPSIBLE_CONTENT_TEXT_DOMAIN', 'collapsible_content' );

include( __DIR__ . '/src/plugin.php' );

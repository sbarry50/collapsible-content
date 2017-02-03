<?php
namespace SB2Media\Module\FAQ\Shortcode;
?>
<dl class="collapsible-content--container faq faq-topic--<?php esc_attr_e( $attributes['topic'] ); ?>">
    <?php loop_and_render_faqs_by_topic( $query, $attributes, $config ); ?>
</dl>

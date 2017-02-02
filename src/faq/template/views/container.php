<?php
namespace SB2Media\Module\FAQ\Template;
?>

<div class="collapsible-content--container faq faq-topic--<?php esc_attr_e( $record['term_slug'] ); ?>">
    <h2><?php esc_html_e( $record['term_name'] ); ?></h2>
    <dl class="collapsible-content--wrap faq">
        <?php loop_and_render_faqs( $record['posts'] ); ?>
    </dl>
</div>

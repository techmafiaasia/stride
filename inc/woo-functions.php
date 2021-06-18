<?php
/**
 * Remove woocommerce sidebar
 */
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

/**
 * Number of columns for the shop page
 */
function strideotc_loop_columns() {
    return 3; // 3 products per row
}
add_filter( 'loop_shop_columns', 'strideotc_loop_columns', 999 );


/**
 * Remove Shop page hooks
 */
// remove breadcrumb
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
// remove archive description
remove_action( 'woocommerce_archive_description', 'woocommerce_taxonomy_archive_description', 10 );
remove_action( 'woocommerce_archive_description', 'woocommerce_product_archive_description', 10 );
// remove result count
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
// remove catlog
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
// remove att to cart
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
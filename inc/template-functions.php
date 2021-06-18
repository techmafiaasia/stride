<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package strideOTC
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function strideotc_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'strideotc_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function strideotc_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'strideotc_pingback_header' );

/**
 * Remove the autop in the homepage content.
 * as the content is the banner tile.
 */
function strideotc_remove_autop_on_homepage() {
	if ( is_front_page() && !is_home() ) {
		remove_filter( 'the_content', 'wpautop' );
		remove_filter( 'the_excerpt', 'wpautop' );
	}
}
add_action( 'wp_head', 'strideotc_remove_autop_on_homepage' );

function strideotc_get_the_link( $link_type, $link ) {
	// get the link type
	$link_type = get_sub_field( $link_type );

	if( $link_type ) {
		// if the link is shop page link
		$link_url 		= wc_get_page_permalink( 'shop' );
		$link_target 	= '_self'; // target self
		$link_title 	= __( 'Shop now', 'strideotc' ); // link title
		?>
		<div class="btn-wrap text-center">
		    <a class="btn-stride" 
		    	href="<?php echo esc_url( $link_url ); ?>" 
		    	target="<?php echo esc_attr( $link_target ); ?>">
		    	<?php echo esc_html( $link_title ); ?>
		    </a>
		</div>
		<?php
	} else {
		// if the link is custom link
		$link = get_field( $link );
		if ( $link ) {
		    $link_url 		= $link['url']; // link url
		    $link_title 	= $link['title']; // link title
		    $link_target 	= $link['target'] ? $link['target'] : '_self';
		    ?>
		    <div class="btn-wrap text-center">
			    <a class="btn-stride" 
			    	href="<?php echo esc_url( $link_url ); ?>" 
			    	target="<?php echo esc_attr( $link_target ); ?>">
			    	<?php echo esc_html( $link_title ); ?>
			    </a>
			</div>
			<?php 
		}
	}

}


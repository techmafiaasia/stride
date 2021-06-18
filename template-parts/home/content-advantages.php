<?php
// Check rows exists.
if ( have_rows( '_group_advantages' ) ) {
	?>
	<section class="adv-wrap">
		<?php
	    // Loop through rows.
	    while ( have_rows( '_group_advantages' ) ) { the_row();
	    	$image = get_sub_field( '_ga_background_image' ); // section background image
	    	if ( !empty( $image ) ) { 
	    		$style = 'style="background-image: url(\''. $image['url'] .'\')"'; 
	    	}
	    	else {
			    $style = '';
			}

	    	?>
	    	<div class="adv-wrap-inner" <?php echo $style; // background inline style?>>
				<div class="container">
					<div class="row">
						<div class="offset-lg-4 col-lg-8">
							<?php echo get_sub_field( '_ga_advantages_description' );// auto tags are returned?>
						</div><!-- offset-lg-4 col-lg-8 -->
					</div><!-- row -->
				</div><!-- container -->
			</div><!-- adv-wrap-inner -->

			<div class="cta-wrap">
				<div class="container">
					<h4><?php echo get_sub_field( '_ga_advantages_cta' ); // cta title ?></h4>
					<?php
					// link         
					$cta_link = get_sub_field( '_ga_advantages_cta_link' );
					if ( $cta_link ) {
					    $cta_link_url 		= $cta_link['url']; // cta_link url
					    $cta_link_title 	= $cta_link['title']; // cta_link title
					    $cta_link_target 	= $cta_link['target'] ? $cta_link['target'] : '_self';
					    ?>
					    <a class="arr-link" 
					    	href="<?php echo esc_url( $cta_link_url ); ?>" 
					    	target="<?php echo esc_attr( $cta_link_target ); ?>">
					    	<?php echo esc_html( $cta_link_title ); ?><img src="<?php echo get_template_directory_uri(); ?>/images/arr.svg" alt="arrow">
					    </a>
						<?php 
					}
					?>
				</div><!-- container -->
			</div><!-- cta-wrap -->
	    	<?php
	    // End loop.
	    } // endwhile _group_advantages
	    ?>
	</section>
    <?php
} // endif _group_advantages
?>
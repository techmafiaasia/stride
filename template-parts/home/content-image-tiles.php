<?php
// Check rows exists.
if ( have_rows( '_group_image_tiles' ) ) {
	?>
	<section class="shop-now-wrap">
		<div class="container">
			<?php
		    // Loop through rows.
		    while ( have_rows( '_group_image_tiles' ) ) { the_row();
		    	?>
		    	<div class="section-title">
					<h3><?php echo get_sub_field( '_git_title' ); // title ?></h3>
				</div>

				<?php
				// Individual Image tiles
				// Check rows exists.
				if ( have_rows( '_git_tiles' ) ) {
					?>
					<div class="row">
						<?php
					    // Loop through rows.
					    while ( have_rows( '_git_tiles' ) ) { the_row();
					    	?>
					    	<div class="col-md-4">
								<div class="link-wrap text-center wow animate__animated animate__fadeIn">
									<a href="#">
										<?php
										 // the tile image
										$tile_image = get_sub_field( '_git_tile_image' );
										if ( !empty( $tile_image ) ) { ?>
											<div class="img-wrap">
										    	<img src="<?php echo esc_url( $tile_image['url'] ); ?>" 
										    		 alt="<?php echo esc_attr( $tile_image['alt'] ); ?>" />
										    </div>
											<?php 
											} 
										?>
										<h4>
											<?php echo get_sub_field( '_git_tile_name' ); // tile tile ?>
										</h4>
									</a>
								</div>
							</div>
					    	<?php
					    // End loop.
					    } // endwhile _git_tiles
					    ?>
					</div><!-- row -->
				    <?php
				} // endif _git_tiles
				
				// link
				// link type = _git_link_type
				// link = _git_link
				strideotc_get_the_link( '_git_link_type', '_git_link' );
				
		    // End loop.
		    } // endwhile _group_image_tiles
		    ?>
		</div>
	</section>
    <?php
} // endif _group_image_tiles
?>
<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package strideOTC
 */

get_header();
?>
	<main id="primary" class="site-main">

        <?php get_template_part( 'template-parts/home/content', 'banner' ); ?>

		<section class="sticky-head">
			<div class="container-fluid">
				<div class="row align-items-center">
					<div class="col-6 col-lg-3">
						<div class="site-logo">
							<?php the_custom_logo(); ?>
						</div>
					</div>
					<div class="col-6 col-lg-9">
						<div class="sticky-right d-flex align-items-center justify-content-end">
							<a href="#" class="btn-stride blue">
								CHECK OUT OUR PRODUCTS
							</a>
							<div class="cart-icon">
								<a href="#">
									<img src="<?php echo get_template_directory_uri();?>/images/cart.svg" class="svg" alt="">
									<span class="count">
										1
									</span>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<?php get_template_part( 'template-parts/home/content', 'image-tiles' ); ?>
		
		<?php get_template_part( 'template-parts/home/content', 'advantages' ); ?>

		<section class="top-seller">
			<div class="container">
				<div class="section-title">
					<h3>Our Top Seller</h3>
					<p>
						STRIDE Foot Peel and Foot Cream contain ingredients that provide long-lasting smoothness and softness on your feet. The combination of ingredients exfoliates and moisturizes the skin on your feet at the same time for fantastic results.
					</p>
				</div><!-- section-title -->
				<div class="row">
					<div class="col-md-4 ">
						<a href="#!">
							<div class="product-card">
								<div class="product-img">
									<img src="<?php echo home_url(); ?>/wp-content/uploads/2021/05/product-one-img.jpg">
								</div><!-- product-img -->
								<h5 class="product-title">STRIDE FOOT PEEL</h5>
								<span class="price">$25</span>

							</div><!-- product-card -->
						</a>
					</div><!-- col-md-4 -->
					<div class="col-md-4 ">
						<a href="#!">
							<div class="product-card">
								<div class="product-img">
									<img src="<?php echo home_url(); ?>/wp-content/uploads/2021/05/product-one-img.jpg">
								</div><!-- product-img -->
								<h5 class="product-title">STRIDE FOOT CREAM</h5>
								<span class="price">$25</span>

							</div><!-- product-card -->
						</a>
					</div><!-- col-md-4 -->
					<div class="col-md-4 ">
						<a href="#!">
							<div class="product-card">
								<div class="product-img">
									<img src="<?php echo home_url(); ?>/wp-content/uploads/2021/05/product-one-img.jpg">
								</div><!-- product-img -->
								<h5 class="product-title">STRIDE BIOTIN SUPPLEMENT</h5>
								<span class="price">$30</span>

							</div><!-- product-card -->
						</a>
					</div><!-- col-md-4 -->
				</div>
			</div><!-- container -->
		</section><!-- top-seller -->
		<section class="moneyback-guarantee">
			<div class="container">
				<div class="block-wrap">
					<h4>We’re confident you’ll love your feet. But if you’re not satisfied, we offer a</h4>
					<h3>money-back guarantee.</h3>
					<h4>What’s Holding you back from having beatiful feet?<br> There’s no risk. Order today!</h4>
					<div class="btn-wrap text-center">
					    <a class="btn-stride" href="#!" target="_self">Shop now</a>
					</div>
				</div><!-- block-wrap -->
			</div>
		</section><!-- moneyback-guarantee -->
		<section class="bg-image-text" style="background-image: url('<?php echo home_url(); ?>/wp-content/uploads/2021/05/image-background-shop.jpg');">
			<div class="content-wrap">
				<div class="content-inner">
					<h4>If your feet are rough, dry, cracked, and peeling... If going barefoot or wearing sandals scares you...</h4>
					<h3>It’s time for sTRIDE.</h3>
					<div class="btn-wrap">
					    <a class="btn-stride" href="#!" target="_self">Shop now</a>
					</div><!-- btn-wrap -->
				</div><!-- content-inner -->
			</div><!-- content-wrap -->
		</section><!-- bg-image-text -->

	</main><!-- #main -->

<?php
get_footer();

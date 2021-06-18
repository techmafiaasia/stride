<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package strideOTC
 */

?>

<footer id="colophon" class="site-footer">
		<div class="site-info">
			<div class="container">
				<div class="row">
					<div class="col-sm-6 col-md-4 col-lg-3">
						<a href="http://fortressbeta.com/stride/">
							<?php the_custom_logo(); ?>
						</a>
						<ul class="social-icons">
							<li>
								<a href="">
									<img src="http://fortressbeta.com/stride/wp-content/uploads/2021/05/fb-1.svg" alt="">
								</a>
							</li>
																										<li>
								<a href="">
									<img src="http://fortressbeta.com/stride/wp-content/uploads/2021/05/insta-1.svg" alt="">
								</a>
							</li>
																										<li>
								<a href="">
									<img src="http://fortressbeta.com/stride/wp-content/uploads/2021/05/twitter-1.svg" alt="">
								</a>
							</li>
						</ul>
					</div>
					<div class="col-sm-6 col-md-4 col-lg-3 site-map-main-wrapper">
						<div class="site-map-wrap">
							<ul>
								<li><a href="#">our products</a></li>									
								<li><a href="#">about stride</a></li>									
								<li><a href="#">contact us</a></li>	
							</ul>
						</div><!-- site-map-wrap -->
					</div>
					<div class="col-sm-6 col-md-4 col-lg-3 legal-main-wrapper">
						<div class="legal-wrap">
							<ul>
								<li><a href="#">TERMS & CONDITIONS</a></li>								
								<li><a href="#">PRIVACY POLICY</a></li>									
								<li><a href="#">faq</a></li>		
							</ul>
						</div><!-- legal-wrap -->
					</div>
					<div class="col-sm-6 col-md-6 col-lg-3 d-g">
						<div class="fortress-wrap">
							<p>
								BUILT WITH 
								<a href="https://www.gofortress.com/" target="_blank">
									FORTRESS	
									</a>
							</p>								
						</div>
						<p class="copyright">
							© 2021 Distinct Dermatology, Inc. <br>STRIDE is a registered trademark of Distinct Dermatology, Inc.</p>
					</div>
				</div>
			</div>
		</div><!-- .site-info -->
		<div id="bk-tp" class="back-top">
			<span>
			</span>
		</div>
	</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

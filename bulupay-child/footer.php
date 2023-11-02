<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<!-- Footer -->
<footer class="text-center text-lg-start bg-light text-muted">
  <!-- Section: Social media -->
  <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
    <!-- Left -->
    <div class="me-5 d-none d-lg-block">
      <span><?php echo get_theme_mod( 'mj_bulupay_site_footer_social_text' ) ?> </span>
    </div>
    <!-- Left -->

    <!-- Right -->
    <div>
      <a href="<?php echo get_theme_mod( 'mj_bulupay_site_footer_facebook' ) ?>" class="me-4 text-reset">
        <i class="fa fa-facebook-f"></i>
      </a>
      <a href="<?php echo get_theme_mod( 'mj_bulupay_site_footer_twitter' ) ?>" class="me-4 text-reset">
        <i class="fa fa-twitter"></i>
      </a>
      <a href="<?php echo get_theme_mod( 'mj_bulupay_site_footer_google' ) ?>" class="me-4 text-reset">
        <i class="fa fa-google"></i>
      </a>
      <a href="<?php echo get_theme_mod( 'mj_bulupay_site_footer_instagram' ) ?>" class="me-4 text-reset">
        <i class="fa fa-instagram"></i>
      </a>
      <a href="<?php echo get_theme_mod( 'mj_bulupay_site_footer_linkedin' ) ?>" class="me-4 text-reset">
        <i class="fa fa-linkedin"></i>
      </a>
      <a href="<?php echo get_theme_mod( 'mj_bulupay_site_footer_youtube' ) ?>" class="me-4 text-reset">
        <i class="fa fa-youtube"></i>
      </a>
    </div>
    <!-- Right -->
  </section>
  <!-- Section: Social media -->

  <!-- Section: Links  -->
  <section class="">
    <div class="container text-center text-md-start mt-5">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <!-- Content -->
          <h6 class="text-uppercase fw-bold mb-4">
            <i class="fa fa-gem me-3"></i> <?php echo get_theme_mod( 'mj_bulupay_site_footer_website_title' ) ?>
          </h6>
          <p>
           <?php mj_bulupay_add_site_info() ?>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Products
          </h6>
		  <?php if ( has_nav_menu( 'footer' ) ) : ?>
			<nav aria-label="<?php esc_attr_e( 'Secondary menu', 'twentytwentyone' ); ?>" class="footer-navigation">
				<ul class="footer-navigation-wrapper">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'footer',
							'items_wrap'     => '%3$s',
							'container'      => false,
							'depth'          => 1,
							'link_before'    => '<span>',
							'link_after'     => '</span>',
							'fallback_cb'    => false,
						)
					);
					?>
				</ul><!-- .footer-navigation-wrapper -->
			</nav><!-- .footer-navigation -->
		<?php endif; ?>
          
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Useful links
          </h6>
          <?php if ( has_nav_menu( 'footer-2' ) ) : ?>
			<nav aria-label="<?php esc_attr_e( 'Secondary menu', 'twentytwentyone' ); ?>" class="footer-navigation">
				<ul class="footer-navigation-wrapper">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'footer',
							'items_wrap'     => '%3$s',
							'container'      => false,
							'depth'          => 1,
							'link_before'    => '<span>',
							'link_after'     => '</span>',
							'fallback_cb'    => false,
						)
					);
					?>
				</ul><!-- .footer-navigation-wrapper -->
			</nav><!-- .footer-navigation -->
		<?php endif; ?>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
          <p><i class="fa fa-home me-3"></i>

              <?php echo get_theme_mod( 'mj_bulupay_site_footer_address' ) ?></p>
          <p>
            <i class="fa fa-envelope me-3"></i>
              <?php echo get_theme_mod( 'mj_bulupay_site_footer_email' ) ?>
          </p>

            <?php

            $nex= get_theme_mod( 'mj_bulupay_site_footer_tel1' );
            ?>
          <p><i class="fa fa-phone me-3"></i> <?php echo get_theme_mod( 'mj_bulupay_site_footer_tel1' ) ?></p>
          <p><i class="fa fa-print me-3"></i><?php echo get_theme_mod( 'mj_bulupay_site_footer_tel2' ) ?></p>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->

  <!-- Copyright -->
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
   <?php understrap_site_info(); ?>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->


<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>


<?php // Closing div#page from header.php. ?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>


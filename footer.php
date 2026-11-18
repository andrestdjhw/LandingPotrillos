    <footer class="lp-footer">
      <div class="lp-footer__inner">
        <span>&copy; <?php echo esc_html( wp_date( 'Y' ) ); ?> Los Potrillos. All rights reserved.</span>
        <ul class="lp-footer__links">
          <?php if ( ! is_front_page() ) : ?>
            <li><a class="lp-footer__home" href="<?php echo esc_url( home_url( '/' ) ); ?>"><span aria-hidden="true">&larr;</span> Back to Home</a></li>
          <?php endif; ?>
          <li><a href="<?php echo esc_url( los_potrillos_legal_url( 'privacy-policy' ) ); ?>">Privacy Policy</a></li>
          <li><a href="<?php echo esc_url( los_potrillos_legal_url( 'terms-and-conditions' ) ); ?>">Terms &amp; Conditions</a></li>
          <li><a href="<?php echo esc_url( los_potrillos_legal_url( 'privacy-policy' ) ); ?>#cookies" data-cookie-action="open" role="button">Cookie Settings</a></li>
        </ul>
      </div>
    </footer>

    <?php get_template_part( 'template-parts/cookie-consent' ); ?>

<?php wp_footer(); ?>
</body>
</html>

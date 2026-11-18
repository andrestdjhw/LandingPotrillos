<?php
/**
 * Cookie consent: banner (first visit) + preferences modal.
 * Behavior lives in assets/js/cookie-consent.js.
 */
?>
<div class="lp-cookie-banner" id="lp-cookie-banner" role="region" aria-label="Cookie consent" hidden>
  <div class="lp-cookie-banner__text">
    <p class="lp-cookie-banner__title">We use cookies</p>
    <p>
      We use essential cookies to make this site work. With your permission, we'd also like to use optional cookies to understand how the site is used and improve it.
      <a href="<?php echo esc_url( los_potrillos_legal_url( 'privacy-policy' ) ); ?>#cookies">Learn more</a>
    </p>
  </div>
  <div class="lp-cookie-banner__actions">
    <button type="button" class="lp-cookie-btn lp-cookie-btn--link" data-cookie-action="customize">Customize</button>
    <button type="button" class="lp-cookie-btn lp-cookie-btn--outline" data-cookie-action="reject">Reject all</button>
    <button type="button" class="lp-cookie-btn" data-cookie-action="accept">Accept all</button>
  </div>
</div>

<dialog class="lp-cookie-modal" id="lp-cookie-modal" aria-labelledby="lp-cookie-modal-title">
  <form method="dialog" class="lp-cookie-modal__inner">
    <header class="lp-cookie-modal__header">
      <h2 id="lp-cookie-modal-title">Cookie settings</h2>
      <button type="button" class="lp-cookie-modal__close" data-cookie-action="close" aria-label="Close cookie settings">&times;</button>
    </header>

    <p class="lp-cookie-modal__intro">
      Choose which cookies you allow. You can change your choice at any time from the "Cookie Settings" link at the bottom of the page.
      Read our <a href="<?php echo esc_url( los_potrillos_legal_url( 'privacy-policy' ) ); ?>#cookies">Privacy Policy</a> for details.
    </p>

    <ul class="lp-cookie-modal__list">
      <li class="lp-cookie-cat">
        <div class="lp-cookie-cat__head">
          <span class="lp-cookie-cat__name" id="lp-cat-necessary">Strictly necessary</span>
          <span class="lp-cookie-cat__always">Always on</span>
        </div>
        <p>Required for the site to work, such as remembering your cookie choice. They can't be turned off.</p>
      </li>
      <li class="lp-cookie-cat">
        <div class="lp-cookie-cat__head">
          <label class="lp-cookie-cat__name" for="lp-cat-analytics">Analytics</label>
          <input type="checkbox" class="lp-switch" id="lp-cat-analytics" name="analytics" role="switch">
        </div>
        <p>Help us understand how visitors use the site, such as which pages are viewed, so we can improve it.</p>
      </li>
      <li class="lp-cookie-cat">
        <div class="lp-cookie-cat__head">
          <label class="lp-cookie-cat__name" for="lp-cat-marketing">Marketing</label>
          <input type="checkbox" class="lp-switch" id="lp-cat-marketing" name="marketing" role="switch">
        </div>
        <p>Used to measure our ads and show you more relevant offers on other sites and social media.</p>
      </li>
    </ul>

    <footer class="lp-cookie-modal__actions">
      <button type="button" class="lp-cookie-btn lp-cookie-btn--outline" data-cookie-action="reject">Reject all</button>
      <button type="button" class="lp-cookie-btn lp-cookie-btn--outline" data-cookie-action="save">Save preferences</button>
      <button type="button" class="lp-cookie-btn" data-cookie-action="accept">Accept all</button>
    </footer>
  </form>
</dialog>

<?php
// Inline (not enqueued) so blockers that match "cookie-consent.js" by URL can't stop it.
$los_potrillos_consent_js = get_theme_file_path( '/assets/js/cookie-consent.js' );
if ( file_exists( $los_potrillos_consent_js ) ) {
  // Escape "</script" / "<!--" so older WordPress versions (which don't escape inline JS) can't break out of the tag.
  $los_potrillos_consent_code = str_ireplace( array( '</script', '<!--' ), array( '<\/script', '<\!--' ), file_get_contents( $los_potrillos_consent_js ) );
  wp_print_inline_script_tag( $los_potrillos_consent_code, array( 'id' => 'lp-consent-js' ) );
}

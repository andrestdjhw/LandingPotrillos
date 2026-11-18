/**
 * Los Potrillos — cookie consent.
 *
 * Stores the visitor's choice in the `lp_cookie_consent` cookie for 180 days.
 *
 * To load a third-party script only after consent, give its tag
 *   type="text/plain" data-cookie-category="analytics"
 * Categories: "analytics", "marketing".
 *
 * NOTE: this file is printed inline in the page. Never write a closing
 * script tag anywhere in it (not even in comments): it would end the
 * inline script early and print the rest as text.
 *
 * Other code can listen for changes:
 *   document.addEventListener('lp:cookie-consent', e => console.log(e.detail))
 * or read the current choice with window.LPCookieConsent.get().
 */
(function () {
  'use strict';

  var COOKIE_NAME = 'lp_cookie_consent';
  var VERSION = 1;
  var MAX_AGE_DAYS = 180;
  var CATEGORIES = ['analytics', 'marketing'];

  var banner = document.getElementById('lp-cookie-banner');
  var modal = document.getElementById('lp-cookie-modal');
  if (!banner || !modal) return;

  function readConsent() {
    var match = document.cookie.match(new RegExp('(?:^|; )' + COOKIE_NAME + '=([^;]*)'));
    if (!match) return null;
    try {
      var data = JSON.parse(decodeURIComponent(match[1]));
      return data && data.v === VERSION ? data : null;
    } catch (e) {
      return null;
    }
  }

  function writeConsent(choices) {
    var data = { v: VERSION, necessary: true, ts: new Date().toISOString() };
    CATEGORIES.forEach(function (cat) { data[cat] = !!choices[cat]; });

    var cookie = COOKIE_NAME + '=' + encodeURIComponent(JSON.stringify(data)) +
      '; Max-Age=' + MAX_AGE_DAYS * 24 * 60 * 60 + '; Path=/; SameSite=Lax';
    if (location.protocol === 'https:') cookie += '; Secure';
    document.cookie = cookie;
    return data;
  }

  // Turn blocked (type="text/plain" data-cookie-category="...") tags into real scripts.
  function activateScripts(consent) {
    var blocked = document.querySelectorAll('script[type="text/plain"][data-cookie-category]');
    Array.prototype.forEach.call(blocked, function (el) {
      if (!consent[el.getAttribute('data-cookie-category')]) return;
      var script = document.createElement('script');
      Array.prototype.forEach.call(el.attributes, function (attr) {
        if (attr.name !== 'type') script.setAttribute(attr.name, attr.value);
      });
      script.removeAttribute('data-cookie-category');
      script.text = el.text;
      el.parentNode.replaceChild(script, el);
    });
  }

  function apply(consent) {
    activateScripts(consent);
    document.dispatchEvent(new CustomEvent('lp:cookie-consent', { detail: consent }));
  }

  function showBanner() { banner.hidden = false; }
  function hideBanner() { banner.hidden = true; }

  function openModal() {
    var current = readConsent() || {};
    CATEGORIES.forEach(function (cat) {
      var input = modal.querySelector('[name="' + cat + '"]');
      if (input) input.checked = !!current[cat];
    });
    if (typeof modal.showModal === 'function') modal.showModal();
    else modal.setAttribute('open', '');
  }

  function closeModal() {
    if (typeof modal.close === 'function') modal.close();
    else modal.removeAttribute('open');
  }

  function save(choices) {
    var consent = writeConsent(choices);
    hideBanner();
    closeModal();
    apply(consent);
  }

  function allChoices(value) {
    var choices = {};
    CATEGORIES.forEach(function (cat) { choices[cat] = value; });
    return choices;
  }

  function modalChoices() {
    var choices = {};
    CATEGORIES.forEach(function (cat) {
      var input = modal.querySelector('[name="' + cat + '"]');
      choices[cat] = !!(input && input.checked);
    });
    return choices;
  }

  document.addEventListener('click', function (e) {
    var trigger = e.target.closest('[data-cookie-action]');
    if (!trigger) return;

    switch (trigger.getAttribute('data-cookie-action')) {
      case 'accept': save(allChoices(true)); break;
      case 'reject': save(allChoices(false)); break;
      case 'save': save(modalChoices()); break;
      case 'customize':
      case 'open':
        e.preventDefault();
        openModal();
        break;
      case 'close': closeModal(); break;
    }
  });

  // Click on the backdrop closes the modal.
  modal.addEventListener('click', function (e) {
    if (e.target === modal) closeModal();
  });

  window.LPCookieConsent = { get: readConsent, open: openModal };

  var existing = readConsent();
  if (existing) apply(existing);
  else showBanner();
})();

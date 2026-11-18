<?php
/* Template Name: Home */

// ── Media Library video URLs ──────────────────────────────
$video_restaurant = get_site_url() . '/wp-content/uploads/2026/05/RestaurantHeroLanding.mp4';
$video_foodtruck  = get_site_url() . '/wp-content/uploads/2026/05/FoodtruckHeroLanding.mp4';
// ─────────────────────────────────────────────────────────

get_header(); ?>

<style>
  /* ── Hero: headline + two location cards ── */
  .hero-wrap {
    position: relative;
    display: flex;
    flex-direction: column;
    min-height: calc(100vh - var(--lp-footer-h, 0px));
    min-height: calc(100svh - var(--lp-footer-h, 0px));
    padding: clamp(1rem, 2.5vh, 2rem) clamp(1rem, 4vw, 4rem) clamp(1rem, 3vh, 2.5rem);
    box-sizing: border-box;
    background: linear-gradient(135deg, var(--lp-cream) 0%, var(--lp-cream-2) 50%, var(--lp-cream-3) 100%);
    overflow: hidden;
  }

  /* ── Corner watermarks ── */
  .hero-watermark {
    position: absolute;
    width: clamp(180px, 20vw, 340px);
    height: auto;
    opacity: 0.07;
    pointer-events: none;
    z-index: 0;
    filter: grayscale(1) brightness(0.35);
  }
  .hero-watermark--tl { top: clamp(-40px, -3vw, -20px); left: clamp(-40px, -3vw, -20px); transform: rotate(-10deg); }
  .hero-watermark--tr { top: clamp(-40px, -3vw, -20px); right: clamp(-40px, -3vw, -20px); transform: rotate(10deg) scaleX(-1); }
  .hero-watermark--bl { bottom: clamp(-40px, -3vw, -20px); left: clamp(-40px, -3vw, -20px); transform: rotate(10deg); }
  .hero-watermark--br { bottom: clamp(-40px, -3vw, -20px); right: clamp(-40px, -3vw, -20px); transform: rotate(-10deg) scaleX(-1); }

  @media (max-width: 760px) {
    .hero-watermark { width: clamp(120px, 40vw, 220px); }
  }

  .hero-headline {
    position: relative;
    z-index: 1;
    max-width: 1280px;
    width: 100%;
    margin: 0 auto clamp(0.75rem, 2vh, 1.5rem);
    display: flex;
    justify-content: center;
    text-align: center;
  }

  .hero-headline-card { max-width: 46rem; }
  .hero-headline .lp-eyebrow { display: block; margin-bottom: 0.75rem; }

  .hero-headline h1 {
    font-family: 'Oswald', sans-serif;
    font-size: clamp(2.2rem, min(5vw, 9vh), 5rem);
    font-weight: 700;
    text-transform: uppercase;
    color: var(--lp-brown);
    line-height: 0.98;
    margin: 0 0 0.6rem;
  }
  .hero-headline h1 em { font-style: normal; color: var(--lp-red); display: block; }

  .hero-headline p {
    font-size: clamp(0.95rem, 1.15vw, 1.1rem);
    font-weight: 500;
    color: #4a3a32;
    margin: 0 auto;
    line-height: 1.5;
    max-width: 34rem;
  }

  .hero-grid {
    position: relative;
    z-index: 1;
    flex: 1;
    min-height: 0;
    width: 100%;
    max-width: 1280px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: clamp(1rem, 2vw, 2rem);
  }

  /* Card = media on top, white info panel below */
  .hero-half {
    display: flex;
    flex-direction: column;
    background: #fff;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 14px 40px rgba(43,26,19,0.18);
    transition: transform 0.35s ease, box-shadow 0.35s ease;
  }
  .hero-half:hover { transform: translateY(-6px); box-shadow: 0 22px 54px rgba(43,26,19,0.26); }

  .hero-media {
    position: relative;
    flex: 1;
    min-height: 200px;
    overflow: hidden;
    background: var(--lp-brown);
  }
  .hero-media::after {
    content: "";
    position: absolute;
    inset-inline: 0;
    bottom: 0;
    height: 5px;
    background: var(--lp-red);
  }

  .hero-video {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.6s ease;
  }
  .hero-half:hover .hero-video { transform: scale(1.05); }

  .hero-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(180deg, rgba(43,26,19,0) 55%, rgba(43,26,19,0.35));
  }

  .hero-content {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    gap: 1rem;
    padding: clamp(1rem, 2vh, 1.5rem) clamp(1.25rem, 2vw, 2rem);
  }

  /* ── Address block ── */
  .hero-address { display: flex; flex-direction: column; align-items: center; gap: 0.85rem; width: 100%; }

  .hero-address-label {
    font-family: 'Oswald', sans-serif;
    font-size: clamp(1.2rem, 1.7vw, 1.7rem);
    font-weight: 700;
    letter-spacing: 0.03em;
    text-transform: uppercase;
    color: var(--lp-brown);
    padding-bottom: 0.5rem;
    border-bottom: 1px solid rgba(43,26,19,0.15);
  }

  .hero-address-body {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 0.85rem;
  }

  .hero-address-row { display: flex; align-items: flex-start; gap: 0.6rem; }
  .hero-address-row svg { flex-shrink: 0; margin-top: 3px; stroke: var(--lp-red); }

  .hero-address-text {
    font-size: clamp(0.95rem, 1.1vw, 1.15rem);
    font-weight: 600;
    color: var(--lp-brown);
    line-height: 1.5;
    cursor: pointer;
    text-decoration: underline;
    text-decoration-color: rgba(43,26,19,0.3);
    text-underline-offset: 3px;
    transition: color 0.2s ease;
  }
  .hero-address-text:hover { color: var(--lp-red); text-decoration-color: var(--lp-red); }

  /* ── Squircle dock ── */
  .hero-dock {
    position: relative;
  }

  .hero-dock-inner {
    position: absolute;
    inset: 0;
    background: var(--lp-cream-2);
    border-radius: 14px;
    border: 1px solid rgba(43,26,19,0.08);
  }

  .hero-dock-items {
    position: relative;
    display: flex;
    align-items: flex-end;
    gap: clamp(0.4rem, 0.8vw, 0.6rem);
    padding: clamp(0.4rem, 0.6vw, 0.6rem);
  }

  .dock-icon {
    clip-path: url(#squircleClip);
    width: clamp(42px, 4vw, 64px);
    height: clamp(42px, 4vw, 64px);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transform: translateY(0) scale(1);
    transition: transform 300ms cubic-bezier(0.34, 1.56, 0.64, 1), box-shadow 300ms ease;
    text-decoration: none;
    border: 1px solid rgba(255,255,255,0.15);
    box-shadow: 0 4px 12px rgba(0,0,0,0.3);
  }

  .dock-icon:hover {
    transform: scale(1.15) translateY(-8px);
    box-shadow: 0 12px 28px rgba(0,0,0,0.4);
  }

  .dock-icon svg {
    width: clamp(22px, 2.2vw, 34px);
    height: clamp(22px, 2.2vw, 34px);
  }

  .dock-menufy    { background: linear-gradient(135deg, #FF9012, #E8730B); }
  .dock-grubhub   { background: linear-gradient(135deg, #F63440, #c0392b); }
  .dock-ubereats  { background: linear-gradient(135deg, #06C167, #04a052); }
  .dock-doordash  { background: linear-gradient(135deg, #FF3008, #c0290a); }

  /* ── Button wrapper ── */
  .hero-btn-wrap {
    pointer-events: auto;
  }

  /* ── Mobile ── */
  @media (max-width: 860px) {
    .hero-wrap { min-height: 0; }
    .hero-grid { grid-template-columns: 1fr; }
    .hero-media { flex: none; aspect-ratio: 16 / 10; }
  }
</style>

<!-- Squircle clip path -->
<svg width="0" height="0" style="position:absolute;">
  <defs>
    <clipPath id="squircleClip" clipPathUnits="objectBoundingBox">
      <path d="M 0,0.5 C 0,0 0,0 0.5,0 S 1,0 1,0.5 1,1 0.5,1 0,1 0,0.5"></path>
    </clipPath>
  </defs>
</svg>

<section class="hero-wrap" id="locations">

  <!-- Corner watermarks -->
  <img
    class="hero-watermark hero-watermark--tl"
    src="<?php echo esc_url( get_site_url() . '/wp-content/uploads/2026/05/Horses-_WB-Photoroom.png' ); ?>"
    alt=""
    aria-hidden="true"
  >
  <img
    class="hero-watermark hero-watermark--tr"
    src="<?php echo esc_url( get_site_url() . '/wp-content/uploads/2026/05/Horses-_WB-Photoroom.png' ); ?>"
    alt=""
    aria-hidden="true"
  >
  <img
    class="hero-watermark hero-watermark--bl"
    src="<?php echo esc_url( get_site_url() . '/wp-content/uploads/2026/05/Horses-_WB-Photoroom.png' ); ?>"
    alt=""
    aria-hidden="true"
  >
  <img
    class="hero-watermark hero-watermark--br"
    src="<?php echo esc_url( get_site_url() . '/wp-content/uploads/2026/05/Horses-_WB-Photoroom.png' ); ?>"
    alt=""
    aria-hidden="true"
  >

  <!-- Headline card -->
  <div class="hero-headline">
    <div class="hero-headline-card">
      <span class="lp-eyebrow">Authentic Puebla-style Mexican food</span>
      <h1>Puebla flavor. <em>Made in Philly.</em></h1>
      <p>Choose how you want to enjoy Los Potrillos, whether dining in or bringing bold taste directly to your event.</p>
    </div>
  </div>

  <div class="hero-grid">

  <!-- Left: Restaurant -->
  <div class="hero-half hero-half--restaurant">
    <div class="hero-media">
    <video class="hero-video" autoplay muted loop playsinline>
      <source src="<?php echo esc_url( $video_restaurant ); ?>">
    </video>
    <div class="hero-overlay"></div>
    </div>
    <div class="hero-content">
      <div class="hero-address">
        <span class="hero-address-label">Visit Our Restaurant</span>
        <div class="hero-address-body">
          <div class="hero-address-row">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M20 10c0 6-8 12-8 12S4 16 4 10a8 8 0 1 1 16 0Z"/><circle cx="12" cy="10" r="3"/>
            </svg>
            <span class="hero-address-text" onclick="window.open('https://maps.app.goo.gl/uMSnemyj73JfEq5u9', '_blank');">
              2617 E Venango St,<br>Philadelphia, PA 19134
            </span>
          </div>
          <!-- Delivery dock -->
          <div class="hero-dock">
            <div class="hero-dock-inner"></div>
            <div class="hero-dock-items">
              <a href="https://fromtherestaurant.com/los-potrillos-restaurant/locations/" target="_blank" rel="noopener noreferrer" class="dock-icon dock-grubhub" title="Menú">
                <svg viewBox="0 0 64 64" fill="white" xmlns="http://www.w3.org/2000/svg" style="width:clamp(22px,2.2vw,34px);height:clamp(22px,2.2vw,34px);">
                  <rect x="16.8" y="8" width="2.6" height="13" rx="1.3"/>
                  <rect x="20.7" y="8" width="2.6" height="13" rx="1.3"/>
                  <rect x="24.6" y="8" width="2.6" height="13" rx="1.3"/>
                  <rect x="16.8" y="19" width="10.4" height="5" rx="2.5"/>
                  <rect x="20" y="23" width="4" height="33" rx="2"/>
                  <path d="M45 33 L45 12 Q45 8 42 8 Q40 11 40 21 L40 33 Z"/>
                  <rect x="40" y="31" width="5" height="25" rx="2.5"/>
                </svg>
              </a>
              <a href="https://share.google/ZJrutDPtyilmuAzQX" target="_blank" rel="noopener noreferrer" class="dock-icon dock-menufy" title="Ordenar en línea">
                <svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg" style="width:clamp(22px,2.2vw,34px);height:clamp(22px,2.2vw,34px);">
                  <rect x="16" y="8" width="32" height="48" rx="4" stroke="white" stroke-width="3.5"/>
                  <line x1="23" y1="21" x2="41" y2="21" stroke="white" stroke-width="3.5" stroke-linecap="round"/>
                  <line x1="23" y1="31" x2="41" y2="31" stroke="white" stroke-width="3.5" stroke-linecap="round"/>
                  <line x1="23" y1="41" x2="34" y2="41" stroke="white" stroke-width="3.5" stroke-linecap="round"/>
                </svg>
              </a>
              <a href="https://www.grubhub.com/restaurant/los-potrillos-restaurant-2617-e-venango-st-philadelphia/1939231/reviews" target="_blank" rel="noopener noreferrer" class="dock-icon dock-grubhub" title="Grubhub">
                <svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" style="width:clamp(22px,2.2vw,34px);height:clamp(22px,2.2vw,34px);">
                  <path d="M13.79 7.3c-4.267 0-7.86 1.422-10.232 4.03C.95 13.937 0 17.73 0 22.274V42.03c0 4.267.95 8.298 3.556 10.943 2.607 2.607 6.163 4.03 10.232 4.03 4.267 0 7.86-1.422 10.232-4.03 2.607-2.607 3.556-6.4 3.556-10.943V31.125a1.03 1.03 0 0 0-.949-.949H14.5a1.03 1.03 0 0 0-.949.949v8.1a1.03 1.03 0 0 0 .949.949h3.12v1.896c0 1.66-.472 3.122-1.185 4.03-.71.95-1.66 1.185-2.845 1.185-1.07.001-2.094-.425-2.845-1.185-.71-.95-1.185-2.37-1.185-4.03V22.53c0-1.66.472-3.12 1.185-4.03.71-.95 1.66-1.185 2.845-1.185 1.07-.001 2.094.425 2.845 1.185.71.95 1.185 2.37 1.185 4.03v1.896c0 .472.472.71.71.71h8.298c.472 0 .71-.215.71-.71V22.53c0-4.267-.95-8.298-3.556-10.943-2.135-2.884-5.966-4.306-9.996-4.306m49.506.966H54.99c-.472 0-.71.472-.71.71V27.01h-8.298V8.955c0-.472-.472-.71-.71-.71h-8.298c-.472 0-.71.472-.71.71v46.34c0 .472.472.71.71.71h8.298c.472 0 .71-.472.71-.71V36.764h8.298v18.532c0 .472.472.71.71.71h8.298c.472 0 .71-.472.71-.71V8.955c0-.215-.215-.71-.71-.71" fill="white"/>
                </svg>
              </a>
              <a href="https://www.ubereats.com/store/los-potrillos-restaurant/8f90E8-GRHOnsfKh0Y7SQQ" target="_blank" rel="noopener noreferrer" class="dock-icon dock-ubereats" title="Uber Eats">
                <img src="https://cdn.simpleicons.org/ubereats/white" alt="Uber Eats" style="width:clamp(22px,2.2vw,34px);height:clamp(22px,2.2vw,34px);">
              </a>
              <a href="https://www.doordash.com/store/los-potrillos-restaurant-philadelphia-520750/691091/?utm_source=mx_share" target="_blank" rel="noopener noreferrer" class="dock-icon dock-doordash" title="DoorDash">
                <img src="https://cdn.simpleicons.org/doordash/white" alt="DoorDash" style="width:clamp(22px,2.2vw,34px);height:clamp(22px,2.2vw,34px);">
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="hero-btn-wrap">
        <a href="https://restaurant.restaurantpotrillos.com" class="lp-btn">
          Go to Restaurant <span aria-hidden="true">→</span>
        </a>
      </div>
    </div>
  </div>

  <!-- Right: Food Truck -->
  <div class="hero-half hero-half--foodtruck">
    <div class="hero-media">
    <video class="hero-video" autoplay muted loop playsinline>
      <source src="<?php echo esc_url( $video_foodtruck ); ?>">
    </video>
    <div class="hero-overlay"></div>
    </div>
    <div class="hero-content">
      <div class="hero-address">
        <span class="hero-address-label">Visit Our Food Truck</span>
        <div class="hero-address-body">
          <div class="hero-address-row">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M20 10c0 6-8 12-8 12S4 16 4 10a8 8 0 1 1 16 0Z"/><circle cx="12" cy="10" r="3"/>
            </svg>
            <span class="hero-address-text" onclick="window.open('https://maps.app.goo.gl/JwvzJ9QGCqqTcsX4A', '_blank');">
              4200 G St,<br>Philadelphia, PA 19124
            </span>
          </div>
          <!-- Delivery dock -->
          <div class="hero-dock">
            <div class="hero-dock-inner"></div>
            <div class="hero-dock-items">
              <a href="https://fromtherestaurant.com/los-potrillos-restaurant/locations/" target="_blank" rel="noopener noreferrer" class="dock-icon dock-grubhub" title="Menú">
                <svg viewBox="0 0 64 64" fill="white" xmlns="http://www.w3.org/2000/svg" style="width:clamp(22px,2.2vw,34px);height:clamp(22px,2.2vw,34px);">
                  <rect x="16.8" y="8" width="2.6" height="13" rx="1.3"/>
                  <rect x="20.7" y="8" width="2.6" height="13" rx="1.3"/>
                  <rect x="24.6" y="8" width="2.6" height="13" rx="1.3"/>
                  <rect x="16.8" y="19" width="10.4" height="5" rx="2.5"/>
                  <rect x="20" y="23" width="4" height="33" rx="2"/>
                  <path d="M45 33 L45 12 Q45 8 42 8 Q40 11 40 21 L40 33 Z"/>
                  <rect x="40" y="31" width="5" height="25" rx="2.5"/>
                </svg>
              </a>
              <a href="https://share.google/ZJrutDPtyilmuAzQX" target="_blank" rel="noopener noreferrer" class="dock-icon dock-menufy" title="Ordenar en línea">
                <svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg" style="width:clamp(22px,2.2vw,34px);height:clamp(22px,2.2vw,34px);">
                  <rect x="16" y="8" width="32" height="48" rx="4" stroke="white" stroke-width="3.5"/>
                  <line x1="23" y1="21" x2="41" y2="21" stroke="white" stroke-width="3.5" stroke-linecap="round"/>
                  <line x1="23" y1="31" x2="41" y2="31" stroke="white" stroke-width="3.5" stroke-linecap="round"/>
                  <line x1="23" y1="41" x2="34" y2="41" stroke="white" stroke-width="3.5" stroke-linecap="round"/>
                </svg>
              </a>
              <a href="https://www.ubereats.com/store/los-potrillos-food-truck/fB6ez1DxQW6AytoOpy1fKg?diningMode=PICKUP&pl=JTdCJTIyYWRkcmVzcyUyMiUzQSUyMjQlMjBWZW50dXJlJTIyJTJDJTIycmVmZXJlbmNlJTIyJTNBJTIyYWQ1MDJkMmQtMzdmMC0xYzlkLWJhODgtY2UxMzY5ZmI5MzM3JTIyJTJDJTIycmVmZXJlbmNlVHlwZSUyMiUzQSUyMnViZXJfcGxhY2VzJTIyJTJDJTIybGF0aXR1ZGUlMjIlM0EzMy42NTkwODIlMkMlMjJsb25naXR1ZGUlMjIlM0EtMTE3Ljc1MjQyNiU3RA%3D%3D&rwg_token=AFd1xnFfG_3axEf4FxmOgsDRDyDS_i7oXyfc_dkZ90M2bHzovEv9Tp1gk6vZqE9rQghtZ-D5E5LC6Ls4uDEVYB7vzlycEU46Ew%3D%3D&utm_campaign=CM2508147-search-free-nonbrand-google-pas_e_all_acq_Global&utm_medium=search-free-nonbrand&utm_source=google-pas" target="_blank" rel="noopener noreferrer" class="dock-icon dock-ubereats" title="Uber Eats">
                <img src="https://cdn.simpleicons.org/ubereats/white" alt="Uber Eats" style="width:clamp(22px,2.2vw,34px);height:clamp(22px,2.2vw,34px);">
              </a>
              <a href="https://www.doordash.com/store/los-potrillos-restaurant-food-truck-philadelphia-842516/1198297/?pickup=true&rwg_token=AFd1xnGuYRY_WjUsJ07zPTnXscCUAo2l-cSGhnRjDckfvWBvDiYrl-I3uTuXFn_Eky7PmjKMLQ7BLEYv8ZfrwsVfgCUGS5FnZw==&utm_campaign=gpa" target="_blank" rel="noopener noreferrer" class="dock-icon dock-doordash" title="DoorDash">
                <img src="https://cdn.simpleicons.org/doordash/white" alt="DoorDash" style="width:clamp(22px,2.2vw,34px);height:clamp(22px,2.2vw,34px);">
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="hero-btn-wrap">
        <a href="https://foodtruck.restaurantpotrillos.com/" class="lp-btn">
          Go to Foodtruck <span aria-hidden="true">→</span>
        </a>
      </div>
    </div>
  </div>
  </div>

</section>

<?php get_footer(); ?>
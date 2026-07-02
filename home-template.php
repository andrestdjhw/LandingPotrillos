<?php
/* Template Name: Home */

// ── Media Library video URLs ──────────────────────────────
$video_restaurant = get_site_url() . '/wp-content/uploads/2026/05/RestaurantHeroLanding.mp4';
$video_foodtruck  = get_site_url() . '/wp-content/uploads/2026/05/FoodtruckHeroLanding.mp4';
// ─────────────────────────────────────────────────────────

get_header(); ?>

<style>
  @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;0,800;1,700&family=Raleway:wght@400;600;700&family=Rubik:wght@700&display=swap');

  .hero-wrap {
    position: relative;
    display: flex;
    height: calc(100vh - 36px);
    min-height: calc(600px - 36px);
    overflow: hidden;
  }

  /* ── Headline card ── */
  .hero-headline {
    position: absolute;
    inset-inline: 0;
    top: 0;
    z-index: 20;
    display: flex;
    justify-content: center;
    padding: 2rem 2rem 0;
    pointer-events: none;
  }

  .hero-headline-card {
    background: rgba(255, 255, 255, 0.12);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    border: 1px solid rgba(255, 255, 255, 0.25);
    border-radius: 18px;
    padding: 1rem 2rem 0.85rem;
    text-align: center;
    max-width: clamp(600px, 50vw, 1000px);
    width: 100%;
  }

  .hero-headline-logo {
    width: clamp(70px, 7vw, 140px);
    height: auto;
    margin: 0 auto 0.85rem;
    display: block;
    filter: drop-shadow(0 2px 10px rgba(0,0,0,0.5));
  }

  .hero-headline h1 {
    font-family: 'Playfair Display', serif;
    font-size: clamp(1.4rem, 3vw, 3.5rem);
    font-weight: 800;
    font-style: italic;
    color: #D4AF37;
    letter-spacing: 0.01em;
    line-height: 1.15;
    margin: 0 0 0.4rem;
    text-shadow: 0 2px 16px rgba(0,0,0,0.5);
  }

  .hero-headline p {
    font-family: 'Raleway', sans-serif;
    font-size: clamp(0.85rem, 1.2vw, 1.3rem);
    font-weight: 400;
    color: rgba(255,255,255,0.85);
    margin: 0;
    line-height: 1.6;
    text-shadow: 0 1px 6px rgba(0,0,0,0.5);
  }

  .hero-divider {
    position: absolute;
    inset-block: 0;
    left: 50%;
    width: 3px;
    background: rgba(255,255,255,0.35);
    z-index: 15;
    transform: translateX(-50%);
    transition: opacity 0.4s ease;
  }

  .hero-half {
    flex: 1;
    position: relative;
    overflow: hidden;
    cursor: pointer;
    transition: flex 0.65s cubic-bezier(0.77, 0, 0.175, 1);
    display: block;
  }

  .hero-wrap:has(.hero-half:hover) .hero-half { flex: 0.55; }
  .hero-wrap .hero-half:hover                 { flex: 1.45; }
  .hero-wrap:has(.hero-half:hover) .hero-divider { opacity: 0; }

  .hero-video {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
    transition: transform 0.65s cubic-bezier(0.77, 0, 0.175, 1);
  }

  .hero-half:hover .hero-video { transform: scale(1.06); }

  .hero-overlay {
    position: absolute;
    inset: 0;
    background: rgba(0,0,0,0.48);
    transition: background 0.45s ease;
  }

  .hero-half:hover .hero-overlay { background: rgba(0,0,0,0.28); }

  .hero-content {
    position: absolute;
    inset: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: flex-end;
    padding-bottom: clamp(2.5rem, 6vh, 5rem);
    gap: 1.25rem;
  }

  /* ── Address card ── */
  .hero-address {
    display: flex;
    flex-direction: column;
    gap: 1rem;
    background: rgba(255, 255, 255, 0.12);
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.25);
    border-radius: 16px;
    padding: clamp(1.75rem, 3vh, 3rem) clamp(1.5rem, 2.5vw, 3rem);
    width: clamp(340px, 42vw, 760px);
    text-align: left;
  }

  .hero-address-label {
    font-family: 'Playfair Display', serif;
    font-size: clamp(1.25rem, 1.8vw, 2rem);
    font-weight: 700;
    color: #fff;
    text-shadow: 0 1px 6px rgba(0,0,0,0.4);
    padding-bottom: 0.65rem;
    border-bottom: 1px solid rgba(255,255,255,0.2);
  }

  /* Address + dock side by side */
  .hero-address-body {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 1rem;
    flex-wrap: wrap;
  }

  .hero-address-row {
    display: flex;
    align-items: flex-start;
    gap: 0.6rem;
  }

  .hero-address-row svg {
    flex-shrink: 0;
    margin-top: 2px;
    opacity: 0.9;
  }

  .hero-address-text {
    font-family: 'Raleway', sans-serif;
    font-size: clamp(0.9rem, 1.1vw, 1.35rem);
    font-weight: 600;
    color: rgba(255,255,255,0.9);
    line-height: 1.5;
    cursor: pointer;
    text-decoration: underline;
    text-decoration-color: rgba(255,255,255,0.4);
    text-underline-offset: 3px;
    transition: color 0.2s ease;
  }

  .hero-address-text:hover {
    color: #e53e3e;
    text-decoration-color: #e53e3e;
  }

  /* ── Squircle dock ── */
  .hero-dock {
    position: relative;
  }

  .hero-dock-inner {
    position: absolute;
    inset: 0;
    background: rgba(0,0,0,0.2);
    backdrop-filter: blur(16px);
    -webkit-backdrop-filter: blur(16px);
    border-radius: 14px;
    border: 1px solid rgba(255,255,255,0.1);
    box-shadow: 0 8px 32px rgba(0,0,0,0.3);
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

  /* ── Uiverse button — red variant ── */
  .button {
    --stone-50: #fafaf9;
    --stone-800: #292524;
    --accent: #e53e3e;
    font-size: clamp(1rem, 1.1vw, 1.4rem);
    cursor: pointer;
    position: relative;
    font-family: "Rubik", sans-serif;
    font-weight: bold;
    line-height: 1;
    padding: 1px;
    transform: translate(-4px, -4px);
    outline: 2px solid transparent;
    outline-offset: 5px;
    border-radius: 9999px;
    background-color: var(--stone-800);
    color: var(--stone-800);
    transition: transform 150ms ease, box-shadow 150ms ease;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    box-shadow:
      0.5px 0.5px 0 0 var(--stone-800), 1px 1px 0 0 var(--stone-800),
      1.5px 1.5px 0 0 var(--stone-800), 2px 2px 0 0 var(--stone-800),
      2.5px 2.5px 0 0 var(--stone-800), 3px 3px 0 0 var(--stone-800),
      0 0 0 2px var(--stone-50), 0.5px 0.5px 0 2px var(--stone-50),
      1px 1px 0 2px var(--stone-50), 1.5px 1.5px 0 2px var(--stone-50),
      2px 2px 0 2px var(--stone-50), 2.5px 2.5px 0 2px var(--stone-50),
      3px 3px 0 2px var(--stone-50), 3.5px 3.5px 0 2px var(--stone-50),
      4px 4px 0 2px var(--stone-50);
    &:hover {
      transform: translate(0, 0);
      box-shadow: 0 0 0 2px var(--stone-50);
    }
    &:active, &:focus-visible { outline-color: var(--accent); }
    &:focus-visible { outline-style: dashed; }
    & > div {
      position: relative;
      pointer-events: none;
      background-color: var(--accent);
      border: 2px solid rgba(255, 255, 255, 0.3);
      border-radius: 9999px;
      &::before {
        content: "";
        position: absolute;
        inset: 0;
        border-radius: 9999px;
        opacity: 0.5;
        background-image:
          radial-gradient(rgb(255 255 255 / 80%) 20%, transparent 20%),
          radial-gradient(rgb(255 255 255 / 100%) 20%, transparent 20%);
        background-position: 0 0, 4px 4px;
        background-size: 8px 8px;
        mix-blend-mode: hard-light;
        animation: dots 0.5s infinite linear;
      }
      & > span {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0.75rem 1.5rem;
        gap: 0.25rem;
        color: #fff;
        filter: drop-shadow(0 -1px 0 rgba(0, 0, 0, 0.25));
        &:active { transform: translateY(2px); }
      }
    }
  }

  @keyframes dots {
    0%   { background-position: 0 0, 4px 4px; }
    100% { background-position: 8px 0, 12px 4px; }
  }

  /* ── Mobile ── */
  @media (max-width: 640px) {
    .hero-wrap { flex-direction: column; height: auto; }
    .hero-half,
    .hero-wrap:has(.hero-half:hover) .hero-half,
    .hero-wrap .hero-half:hover { flex: none; height: 50vh; min-height: 280px; }
    .hero-divider { inset-block: auto; left: 0; right: 0; top: 50%; width: 100%; height: 3px; transform: translateY(-50%); }
    .hero-headline { position: static; background: #111; padding: 2rem 1.5rem; }
    .hero-headline-card { border-radius: 0; border: none; background: transparent; backdrop-filter: none; }
    .hero-address-body { flex-direction: column; }
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

<div class="hero-wrap">

  <!-- Headline card -->
  <div class="hero-headline">
    <div class="hero-headline-card">
      <img
        src="<?php echo esc_url( get_site_url() . '/wp-content/uploads/2026/05/Horses-_WB-Photoroom.png' ); ?>"
        alt="Los Potrillos"
        class="hero-headline-logo"
      >
      <h1>Welcome to Los Potrillos Mexican Restaurant</h1>
      <p>Experience authentic Mexican flavor made fresh daily. Choose how you want to enjoy Los Potrillos whether dining in or bringing bold taste directly to your event.</p>
    </div>
  </div>

  <!-- Divider -->
  <div class="hero-divider"></div>

  <!-- Left: Restaurant -->
  <div class="hero-half hero-half--restaurant">
    <video class="hero-video" autoplay muted loop playsinline>
      <source src="<?php echo esc_url( $video_restaurant ); ?>">
    </video>
    <div class="hero-overlay"></div>
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
        <a href="https://restaurant.restaurantpotrillos.com" class="button">
          <div><span>Go to Restaurant</span></div>
        </a>
      </div>
    </div>
  </div>

  <!-- Right: Food Truck -->
  <div class="hero-half hero-half--foodtruck">
    <video class="hero-video" autoplay muted loop playsinline>
      <source src="<?php echo esc_url( $video_foodtruck ); ?>">
    </video>
    <div class="hero-overlay"></div>
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
        <a href="https://foodtruck.restaurantpotrillos.com/" class="button">
          <div><span>Go to Foodtruck</span></div>
        </a>
      </div>
    </div>
  </div>

</div>

<?php get_footer(); ?>
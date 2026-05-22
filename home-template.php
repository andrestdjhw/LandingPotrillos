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
              <a href="https://www.grubhub.com/restaurant/los-potrillos-restaurant-2617-e-venango-st-philadelphia/1939231/reviews" target="_blank" rel="noopener noreferrer" class="dock-icon dock-grubhub" title="Grubhub">
                <svg viewBox="0 0 64 64" fill="white" xmlns="http://www.w3.org/2000/svg" style="width:clamp(22px,2.2vw,34px);height:clamp(22px,2.2vw,34px);">
                  <!-- Fork left tine -->
                  <rect x="10" y="6" width="5" height="22" rx="2.5"/>
                  <!-- Fork middle tine -->
                  <rect x="20" y="6" width="5" height="22" rx="2.5"/>
                  <!-- Fork right tine -->
                  <rect x="30" y="6" width="5" height="22" rx="2.5"/>
                  <!-- Fork handle neck -->
                  <rect x="18" y="28" width="9" height="6" rx="1"/>
                  <!-- Fork handle -->
                  <rect x="19.5" y="34" width="6" height="24" rx="3"/>
                  <!-- G letter -->
                  <path d="M44 14 A14 14 0 1 0 58 28 L58 28 L48 28 L48 32 L54 32 A8 8 0 1 1 46 20" stroke="white" stroke-width="4" fill="none" stroke-linecap="round"/>
                </svg>
              </a>
              <a href="https://www.ubereats.com/store/los-potrillos-restaurant/8f90E8-GRHOnsfKh0Y7SQQ" target="_blank" rel="noopener noreferrer" class="dock-icon dock-ubereats" title="Uber Eats">
                <img src="https://cdn.simpleicons.org/ubereats/white" alt="Uber Eats" style="width:clamp(22px,2.2vw,34px);height:clamp(22px,2.2vw,34px);">
              </a>
              <a href="https://www.doordash.com/store/los-potrillos-restaurant-food-truck-philadelphia-842516/1198297/" target="_blank" rel="noopener noreferrer" class="dock-icon dock-doordash" title="DoorDash">
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
              <a href="https://www.grubhub.com/restaurant/los-potrillos-restaurant-2617-e-venango-st-philadelphia/1939231/reviews" target="_blank" rel="noopener noreferrer" class="dock-icon dock-grubhub" title="Grubhub">
                <svg viewBox="0 0 64 64" fill="white" xmlns="http://www.w3.org/2000/svg" style="width:clamp(22px,2.2vw,34px);height:clamp(22px,2.2vw,34px);">
                  <!-- Fork left tine -->
                  <rect x="10" y="6" width="5" height="22" rx="2.5"/>
                  <!-- Fork middle tine -->
                  <rect x="20" y="6" width="5" height="22" rx="2.5"/>
                  <!-- Fork right tine -->
                  <rect x="30" y="6" width="5" height="22" rx="2.5"/>
                  <!-- Fork handle neck -->
                  <rect x="18" y="28" width="9" height="6" rx="1"/>
                  <!-- Fork handle -->
                  <rect x="19.5" y="34" width="6" height="24" rx="3"/>
                  <!-- G letter -->
                  <path d="M44 14 A14 14 0 1 0 58 28 L58 28 L48 28 L48 32 L54 32 A8 8 0 1 1 46 20" stroke="white" stroke-width="4" fill="none" stroke-linecap="round"/>
                </svg>
              </a>
              <a href="https://www.ubereats.com/store/los-potrillos-restaurant/8f90E8-GRHOnsfKh0Y7SQQ" target="_blank" rel="noopener noreferrer" class="dock-icon dock-ubereats" title="Uber Eats">
                <img src="https://cdn.simpleicons.org/ubereats/white" alt="Uber Eats" style="width:clamp(22px,2.2vw,34px);height:clamp(22px,2.2vw,34px);">
              </a>
              <a href="https://www.doordash.com/store/los-potrillos-restaurant-food-truck-philadelphia-842516/1198297/" target="_blank" rel="noopener noreferrer" class="dock-icon dock-doordash" title="DoorDash">
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
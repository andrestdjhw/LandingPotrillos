<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?> style="margin:0; padding:0;">

    <style>
      @import url('https://fonts.googleapis.com/css2?family=Oswald:wght@500;600;700&family=Playfair+Display:ital,wght@0,700;0,800;1,700&family=Raleway:wght@400;600;700&family=Yellowtail&display=swap');

      :root {
        --lp-cream: #f6f1e7;
        --lp-cream-2: #efe6d3;
        --lp-cream-3: #e8dcc0;
        --lp-red: #a81c1c;
        --lp-red-dark: #7d1212;
        --lp-brown: #2b1a13;
        --lp-brown-2: #4a2a1c;
        --lp-gold: #b8862b;
        --lp-ink: #1d1512;
      }

      body { background: var(--lp-cream); font-family: 'Raleway', sans-serif; color: var(--lp-ink); }

      /* ── Shared buttons ── */
      .lp-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.6rem;
        padding: 0.85rem 1.5rem;
        border-radius: 6px;
        border: 2px solid var(--lp-red);
        background: var(--lp-red);
        color: #fff;
        font-family: 'Oswald', sans-serif;
        font-weight: 600;
        font-size: 0.95rem;
        letter-spacing: 0.06em;
        text-transform: uppercase;
        text-decoration: none;
        cursor: pointer;
        transition: background 0.2s ease, transform 0.2s ease, border-color 0.2s ease;
      }
      .lp-btn:hover { background: var(--lp-red-dark); border-color: var(--lp-red-dark); transform: translateY(-2px); }
      .lp-btn--ghost { background: transparent; color: var(--lp-red); }
      .lp-btn--ghost:hover { color: #fff; }
      .lp-btn--light { background: #fff; color: var(--lp-red); border-color: #fff; }
      .lp-btn--light:hover { background: var(--lp-cream-2); border-color: var(--lp-cream-2); }

      .lp-eyebrow {
        font-family: 'Raleway', sans-serif;
        font-size: 0.75rem;
        font-weight: 700;
        letter-spacing: 0.3em;
        text-transform: uppercase;
        color: var(--lp-red);
      }
      .lp-script { font-family: 'Yellowtail', cursive; font-weight: 400; }
    </style>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?> style="margin:0; padding:0;">

    <style>
      /* From Uiverse.io by catraco */
      .stripe-bg {
        width: 100%;
        height: 18px;
        display: block;
        background: repeating-linear-gradient(
            -45deg,
            crimson,
            darkred 10px,
            orange 10px,
            darkred 20px
          )
          crimson;
        background-blend-mode: screen;
      }
    </style>

    <div class="stripe-bg"></div>
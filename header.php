<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?> style="margin:0; padding:0;">

    <style>
      .stripe-bg {
        width: 100%;
        height: 18px;
        display: block;
        background: linear-gradient(
          90deg,
          #7B5A00,
          #C8960C,
          #F5D16A,
          #D4AF37,
          #F5D16A,
          #C8960C,
          #7B5A00
        );
      }
    </style>

    <div class="stripe-bg"></div>
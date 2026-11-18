<?php

get_header();

while ( have_posts() ) :
  the_post();
  $slug         = get_post_field( 'post_name' );
  $legal_part   = 'template-parts/legal/' . $slug . '.php';
  $use_fallback = trim( get_the_content() ) === '' && locate_template( $legal_part );
  ?>
  <main class="lp-legal">
    <div class="lp-legal__inner">
      <a class="lp-legal__back" href="<?php echo esc_url( home_url( '/' ) ); ?>"><span aria-hidden="true">&larr;</span> Back to Los Potrillos</a>
      <h1><?php the_title(); ?></h1>
      <p class="lp-legal__updated">Last updated: <?php echo esc_html( $use_fallback ? 'November 17, 2026' : get_the_modified_date( 'F j, Y' ) ); ?></p>
      <div class="lp-legal__content">
        <?php
        if ( $use_fallback ) {
          get_template_part( 'template-parts/legal/' . $slug );
        } else {
          the_content();
        }
        ?>
      </div>
    </div>
  </main>
  <?php
endwhile;

get_footer();

<?php

function los_potrillos_asset_version($path) {
  $file = get_theme_file_path($path);
  return file_exists($file) ? filemtime($file) : null;
}

function los_potrillos_load_assets() {
  wp_enqueue_style('los-potrillos-main', get_theme_file_uri('/build/index.css'), array(), los_potrillos_asset_version('/build/index.css'));
  wp_enqueue_style('los-potrillos-site', get_theme_file_uri('/assets/css/site.css'), array('los-potrillos-main'), los_potrillos_asset_version('/assets/css/site.css'));
  // The cookie consent script is printed inline by template-parts/cookie-consent.php
  // so ad/cookie-notice blockers can't block it by URL.
}

add_action('wp_enqueue_scripts', 'los_potrillos_load_assets');

function los_potrillos_add_support() {
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'los_potrillos_add_support');

/**
 * Legal pages. Their default text lives in template-parts/legal/{slug}.php
 * and is shown while the page content in WP Admin is empty.
 */
function los_potrillos_legal_pages() {
  return array(
    'privacy-policy'       => 'Privacy Policy',
    'terms-and-conditions' => 'Terms and Conditions',
  );
}

function los_potrillos_legal_url($slug) {
  $page = get_page_by_path($slug);
  return $page ? get_permalink($page) : home_url('/' . $slug . '/');
}

// Create the legal pages once if they don't exist (e.g. after deploying to a new site).
function los_potrillos_ensure_legal_pages() {
  $version = 1;
  if ((int) get_option('los_potrillos_legal_pages_version') >= $version) {
    return;
  }

  foreach (los_potrillos_legal_pages() as $slug => $title) {
    $page = get_page_by_path($slug, OBJECT, 'page');
    if (!$page) {
      $page_id = wp_insert_post(array(
        'post_type'   => 'page',
        'post_status' => 'publish',
        'post_title'  => $title,
        'post_name'   => $slug,
      ));
    } else {
      $page_id = $page->ID;
      if ($page->post_status !== 'publish') {
        wp_update_post(array('ID' => $page_id, 'post_status' => 'publish'));
      }
    }

    if ($slug === 'privacy-policy' && $page_id && !is_wp_error($page_id)) {
      update_option('wp_page_for_privacy_policy', $page_id);
    }
  }

  update_option('los_potrillos_legal_pages_version', $version);
}

add_action('init', 'los_potrillos_ensure_legal_pages');

// UpdraftPlus: leave node_modules (dev dependencies) out of the "Themes" backup.
// The free version has no UI for theme exclusions, only this filter.
// For themes, Updraft matches paths that start with the themes folder name, e.g. "themes/los_potrillos_landing/node_modules".
function los_potrillos_updraft_exclude_node_modules($exclude) {
  $exclude   = is_array($exclude) ? $exclude : array();
  $exclude[] = basename(get_theme_root()) . '/' . get_stylesheet() . '/node_modules';
  return $exclude;
}

add_filter('updraftplus_include_themes_exclude', 'los_potrillos_updraft_exclude_node_modules');

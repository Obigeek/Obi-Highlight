<?php
/*
Plugin Name: Obi-Highlight
Author: Joe Izzard
Version: 1.0.0
Description: Obi-Highlight adds shortcodes allowing you to easily highlight text in your blog posts
*/

$obiHighlight_version = '1.0.0';
$obiHighlight_minified = true;

// Worker Function
function obiHighlight_worker($theme, $content) {
  $output = '<span class="highlight-' . $theme . '">';
  $output .= do_shortcode($content);
  $output .= '</span>';

  return $output;
}

// Handler functions
function obiHighlight_blue($atts, $content = null) {
  return obihighlight_worker('blue', $content);
}

function obiHighlight_deepBlue($atts, $content = null) {
  return obihighlight_worker('deepBlue', $content);
}

function obiHighlight_green($atts, $content = null) {
  return obihighlight_worker('green', $content);
}

function obiHighlight_mauve($atts, $content = null) {
  return obihighlight_worker('mauve', $content);
}

function obiHighlight_purple($atts, $content = null) {
  return obihighlight_worker('purple', $content);
}

function obiHighlight_orange($atts, $content = null) {
  return obihighlight_worker('orange', $content);
}

function obiHighlight_pink($atts, $content = null) {
  return obihighlight_worker('pink', $content);
}

function obiHighlight_red($atts, $content = null) {
  return obihighlight_worker('red', $content);
}

function obiHighlight_yellow($atts, $content = null) {
  return obihighlight_worker('yellow', $content);
}

function obiHighlight_grey($atts, $content = null) {
  return obihighlight_worker('grey', $content);
}

function obiHighlight_nulled_blue($atts, $content = null) {
  return obihighlight_worker('nulled-blue', $content);
}

function obiHighlight_nulled_green($atts, $content = null) {
  return obihighlight_worker('nulled-green', $content);
}

function obiHighlight_nulled_orange($atts, $content = null) {
  return obihighlight_worker('nulled-orange', $content);
}

function obiHighlight_nulled_red($atts, $content = null) {
  return obihighlight_worker('nulled-red', $content);
}

function obiHighlight_nulled_mauve($atts, $content = null) {
  return obihighlight_worker('nulled-mauve', $content);
}

function obiHighlight_general($atts, $content=null) {
  extract(shortcode_atts(array(
    'col' => 'yellow'
  ), $atts));

  return obihighlight_worker($col, $content);
}

// Register Shortcodes
function obiHighlight_registerShortcodes() {
  add_shortcode('highlight_blue', 'obiHighlight_blue');
  add_shortcode('highlight_deepBlue', 'obiHighlight_deepBlue');
  add_shortcode('highlight_deepblue', 'obiHighlight_deepBlue');
  add_shortcode('highlight_green', 'obiHighlight_green');
  add_shortcode('highlight_mauve', 'obiHighlight_mauve');
  add_shortcode('highlight_purple', 'obiHighlight_purple');
  add_shortcode('highlight_orange', 'obiHighlight_orange');
  add_shortcode('highlight_pink', 'obiHighlight_pink');
  add_shortcode('highlight_red', 'obiHighlight_red');
  add_shortcode('highlight_yellow', 'obiHighlight_yellow');
  add_shortcode('highlight_grey', 'obiHighlight_grey');
  add_shortcode('highlight', 'obiHighlight_general');
  add_shortcode('highlight_nblue', 'obiHighlight_nulled_blue');
  add_shortcode('highlight_ngreen', 'obiHighlight_nulled_green');
  add_shortcode('highlight_norange', 'obiHighlight_nulled_orange');
  add_shortcode('highlight_nred', 'obiHighlight_nulled_red');
  add_shortcode('highlight_nmauve', 'obiHighlight_nulled_mauve');
  add_shortcode('highlight_nulled_blue', 'obiHighlight_nulled_blue');
  add_shortcode('highlight_nulled_green', 'obiHighlight_nulled_green');
  add_shortcode('highlight_nulled_orange', 'obiHighlight_nulled_orange');
  add_shortcode('highlight_nulled_red', 'obiHighlight_nulled_red');
  add_shortcode('highlight_nulled_mauve', 'obiHighlight_nulled_mauve');
}
add_action('init', 'obiHighlight_registerShortcodes');

// Add style
function obiHighlight_registerStyles() {
  global $obiHighlight_version, $obiHighlight_minified;
  if ($obiHighlight_minified) { $style = 'style_min'; } else { $style = 'style'; }
  wp_register_style('obihighlight', plugins_url($style . '.css', __FILE__), array(), $obiHighlight_version);
  wp_enqueue_style('obihighlight');
}
add_action('wp_enqueue_scripts', 'obiHighlight_registerStyles');

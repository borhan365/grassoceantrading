<?php
// File: sidebar-utils.php

function wpb_widgets_init() {

  // Header mobile logo area
  register_sidebar( array(
      'name' => __( 'Mobile Logo', 'wpb' ),
      'id' => 'mobile-header-logo',
      'description' => __( 'Here you mobile logo', 'wpb' ),
      'before_widget' => '<div class="mobile-header-logo">',
      'after_widget' => '</div>',
      'before_title' => '<h3 class="widget-title">',
      'after_title' => '</h3>',
  ) );
  
  // Desktop Header logo area
  register_sidebar( array(
      'name' => __( 'Header Logo', 'wpb' ),
      'id' => 'header-logo',
      'description' => __( 'Add desktop header logo', 'wpb' ),
      'before_widget' => '<div>',
      'after_widget' => '</div>',
      'before_title' => '<h3>',
      'after_title' => '</h3>',
  ) );
  
//   =====================================================

  // Sidebar area
  register_sidebar( array(
      'name' =>__( 'Global Sidebar Ads', 'wpb'),
      'id' => 'global-sidebar-ads',
      'description' => __( 'Simple sidebar ads', 'wpb' ),
      'before_widget' => '<div id="%1$s">',
      'after_widget' => '</div>',
      'before_title' => '<h3>',
      'after_title' => '</h3>',
  ) );

//   ===============================================

  // Single article bottom ads
  register_sidebar( array(
      'name' =>__( 'Single Article Top Ads', 'wpb'),
      'id' => 'single-article-ads-top',
      'description' => __( 'Single post article top ads size must be: ( 900x100px )', 'wpb' ),
      'before_widget' => '<div id="%1$s" class="single-article-ads">',
      'after_widget' => '</div>',
      'before_title' => '<h3 class="widget-title">',
      'after_title' => '</h3>',
  ) );

  // Single article bottom ads
  register_sidebar( array(
      'name' =>__( 'Single Article Bottom Ads', 'wpb'),
      'id' => 'single-article-ads-bottom',
      'description' => __( 'Single post article top ads size must be: ( 900x100px )', 'wpb' ),
      'before_widget' => '<div id="%1$s" class="single-article-ads">',
      'after_widget' => '</div>',
      'before_title' => '<h3 class="widget-title">',
      'after_title' => '</h3>',
  ) );

  // Desktop footer logo
  register_sidebar( array(
      'name' => __( 'Desktop Footer Logo', 'wpb' ),
      'id' => 'footer-logo',
      'description' => __( 'Simply add footer logo here', 'wpb' ),
      'before_widget' => '<div class="footer-logo">',
      'after_widget' => '</div>',
      'before_title' => '<h3 class="widget-title">',
      'after_title' => '</h3>',
  ) );  

  // Footer bio
  register_sidebar( array(
      'name' =>__( 'Footer bio', 'wpb'),
      'id' => 'footer-bio',
      'description' => __( 'Footer bio', 'wpb' ),
      'before_widget' => '<div id="%1$s" class="footer-bio">',
      'after_widget' => '</div>',
      'before_title' => '<h3 class="widget-title">',
      'after_title' => '</h3>',
  ) );

    // Footer columns 1 - 8 
    for ($i = 1; $i <= 8; $i++) {
        register_sidebar(array(
            'name' => __('Footer ' . $i, 'wpb'),
            'id' => 'footer-' . $i,
            'description' => __('Footer ' . $i, 'wpb'),
            'before_widget' => '<div id="%1$s" class="footer-column-group">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ));
    }    
    
    // Footer bottom columns 1 - 2
    for ($i = 1; $i <= 3; $i++) {
        register_sidebar(array(
            'name' => __('Footer Bottom' . $i, 'wpb'),
            'id' => 'footer-bottom' . $i,
            'description' => __('Footer Bottom' . $i, 'wpb'),
            'before_widget' => '<div id="%1$s" class="footer-item">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ));
    }

    // Home page content - Hero content
    // ################################################
    register_sidebar( array(
        'name' =>__( 'Home - Hero Description Content', 'wpb'),
        'id' => 'home-hero-content',
        'description' => __( 'Home - Hero Description Content', 'wpb' ),
        'before_widget' => '<div id="%1$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ) );
}
add_action( 'widgets_init', 'wpb_widgets_init' );

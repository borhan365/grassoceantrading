<?php global $BorhanTheme; ?>
<?php get_header(); ?>

<!doctype html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.png" type="image/png" sizes="16x16">
    <title>
      <?php
      if (is_home() || is_front_page()) {
        bloginfo('name');
        echo ' | ';
        echo 'Premium Flooring Solutions in UAE';
      } else {
        wp_title('');
        echo ' | ';
        bloginfo('name');
      }
      ?>
    </title>
    <meta name="description" content="Grass Ocean Trading: Premium flooring solutions in UAE. Explore our wide range of carpets, rugs, and flooring options imported from India, Turkey, China, and Europe.">
    <meta name="keywords" content="Grass Ocean Trading, flooring, carpets, rugs, UAE, Dubai, wholesale, retail, export, India, Turkey, China, Europe, premium flooring, interior design">
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <!-- Desktop Header -->
    <header class="bg-white shadow-sm border-b border-gray-100 py-2">
      <nav class="container mx-auto px-4">
        <div class="flex justify-between items-center min-h-[65px] max-h-[70px]">
          <!-- Logo -->
          <div class="flex-shrink-0 header-logo-wrap">
            <a href="<?php echo site_url(); ?>">
            <?php if ( is_active_sidebar( 'header-logo' ) ) : ?>
              <?php dynamic_sidebar( 'header-logo' ); ?>
            </a>
            <?php else: ?>
              <a href="<?php echo site_url(); ?>" class="flex items-center">
                <span class="text-2xl font-bold text-green-700">Grass Ocean Trading</span>
              </a>  
            <?php endif; ?>
          </div>

          <!-- Desktop Navigation -->
          <div class="hidden lg:flex lg:items-center lg:space-x-8">
            <?php 
            wp_nav_menu(array(
                'theme_location' => 'primary_menu',
                'container' => false,
                'menu_class' => 'flex space-x-8',
                'walker' => new Tailwind_Nav_Walker()
            ));
            ?>
          </div>

          <!-- Desktop Right Section -->
          <div class="hidden lg:flex lg:items-center lg:space-x-4">
            <button id="search" class="p-2 text-gray-500 hover:text-green-700 transition-colors duration-200">
              <span class="sr-only">Search</span>
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
              </svg>
            </button>
            <a href="<?php echo site_url('/contact-us'); ?>" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-full text-white bg-green-700 hover:bg-green-800 transition-colors duration-200 shadow-sm hover:shadow-md">
              Get a Free Quote
            </a>
          </div>

          <!-- Mobile Menu Button -->
          <div class="lg:hidden">
            <button id="mobileMenuBtn" aria-label="Open menu" class="p-2 text-gray-500 hover:text-green-700 transition-colors duration-200">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
              </svg>
            </button>
          </div>
        </div>
      </nav>

      <?php get_search_form(); ?>
    </header>

    <!-- Mobile Sidebar -->
    <div class="fixed inset-0 bg-black bg-opacity-50 z-40 transition-opacity duration-300 opacity-0 pointer-events-none" id="mobileSidebarOverlay"></div>
    <aside class="fixed inset-y-0 left-0 z-50 w-72 bg-white shadow-xl transform -translate-x-full transition-all duration-300 ease-in-out" id="LeftSidebar">
      <div class="h-full flex flex-col">
        <!-- Mobile Sidebar Header -->
        <div class="flex items-center justify-between p-4 border-b border-gray-100">
          <?php if ( is_active_sidebar( 'mobile-header-logo' ) ) : ?> 
            <a href="<?php echo site_url(); ?>">
              <?php dynamic_sidebar( 'mobile-header-logo' ); ?>  
            </a>  
          <?php else: ?>
            <a href="<?php echo site_url(); ?>" class="text-xl font-bold text-green-700">
              Grass Ocean Trading
            </a>
          <?php endif; ?> 
          <button id="cross" aria-label="Close menu" class="p-2 text-gray-500 hover:text-green-700 transition-colors duration-200">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>

        <!-- Mobile Navigation -->
        <nav class="flex-1 overflow-y-auto py-4">
          <?php 
            wp_nav_menu( array(
              'theme_location' => 'sidebar_menu',
              'container_class' => 'w-full',
              'menu_class' => 'space-y-2 px-4',
              'walker' => new Tailwind_Nav_Walker()
            ) );
          ?>
        </nav>

        <!-- Mobile Sidebar Footer -->
        <div class="p-4 border-t border-gray-100">
          <a href="<?php echo site_url('/contact-us'); ?>" class="w-full flex justify-center items-center px-6 py-3 border border-transparent text-base font-medium rounded-full text-white bg-green-700 hover:bg-green-800 transition-colors duration-200">
            Get a Free Quote
          </a>
          <div class="mt-6">
            <h4 class="text-sm font-semibold text-gray-900 mb-3">Connect with us</h4>
            <div class="flex space-x-6">
              <a href="#" class="text-blue-600 hover:text-blue-800 transition-colors duration-200">
                <i class="fab fa-facebook text-xl"></i>
              </a>
              <a href="#" class="text-pink-600 hover:text-pink-800 transition-colors duration-200">
                <i class="fab fa-instagram text-xl"></i>
              </a>
              <a href="#" class="text-blue-500 hover:text-blue-700 transition-colors duration-200">
                <i class="fab fa-linkedin text-xl"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </aside>

    <script>
      document.addEventListener('DOMContentLoaded', function() {
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const cross = document.getElementById('cross');
        const sidebar = document.getElementById('LeftSidebar');
        const overlay = document.getElementById('mobileSidebarOverlay');

        function openSidebar() {
          sidebar.classList.remove('-translate-x-full');
          overlay.classList.remove('opacity-0', 'pointer-events-none');
          document.body.style.overflow = 'hidden';
        }

        function closeSidebar() {
          sidebar.classList.add('-translate-x-full');
          overlay.classList.add('opacity-0', 'pointer-events-none');
          document.body.style.overflow = '';
        }

        mobileMenuBtn.addEventListener('click', openSidebar);
        cross.addEventListener('click', closeSidebar);
        overlay.addEventListener('click', closeSidebar);
      });
    </script>

    <main id="main-content" tabindex="-1">
      <!-- Main content will be here -->
    </main>

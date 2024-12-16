<section class="py-16">
  <div class="container mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-left mb-10">
      <h2 class="text-sm font-semibold text-green-600 tracking-wide uppercase">Our Products</h2>
      <p class="mt-2 text-4xl font-extrabold text-gray-900 sm:text-5xl sm:tracking-tight lg:text-5xl">
        Premium Flooring Solutions
      </p>
      <p class="mt-5 text-xl text-gray-500">
        Discover our wide range of high-quality flooring solutions for your home and business.
      </p>
    </div>
    
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
      <?php
      $args = array(
        'post_type' => 'products',
        'posts_per_page' => 8
      );
      $products_query = new WP_Query($args);

      if ($products_query->have_posts()) :
        while ($products_query->have_posts()) : $products_query->the_post();
          $product_image = get_the_post_thumbnail_url(get_the_ID(), 'large');
          if (!$product_image) {
            $product_image = get_template_directory_uri() . '/assets/images/products/placeholder.webp';
          }
      ?>
        <div class="group bg-white rounded-lg shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden">
          <div class="relative overflow-hidden">
            <img 
              src="<?php echo esc_url($product_image); ?>" 
              alt="<?php the_title_attribute(); ?>" 
              class="w-full h-48 object-cover transform group-hover:scale-105 transition-transform duration-300"
            >
            <?php if (get_field('product_tag')) : ?>
              <div class="absolute top-4 right-4 bg-green-600 text-white text-sm font-medium px-3 py-1 rounded-full">
                <?php echo esc_html(get_field('product_tag')); ?>
              </div>
            <?php endif; ?>
          </div>
          <div class="p-6">
            <a href="<?php the_permalink(); ?>" class="block">
              <h3 class="text-lg font-semibold text-gray-900 group-hover:text-green-700 transition-colors duration-300 mb-3">
                <?php the_title(); ?>
              </h3>
            </a>
            <p class="text-gray-600 text-sm mb-4 line-clamp-2">
              <?php echo wp_trim_words(get_the_excerpt(), 15); ?>
            </p>
            <a href="<?php the_permalink(); ?>" class="inline-flex items-center text-green-600 font-medium hover:text-green-800 transition-colors duration-300">
              Learn More
              <svg class="w-4 h-4 ml-2" stroke="currentColor" fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
              </svg>
            </a>
          </div>
        </div>
      <?php
        endwhile;
        wp_reset_postdata();
      else :
      ?>
        <div class="col-span-full text-center py-8">
          <p class="text-gray-600">No products found.</p>
        </div>
      <?php endif; ?>
    </div>
    
    <!-- View All Products -->
    <div class="!mt-10 text-right">
      <a href="<?php echo site_url('/products'); ?>" class="group inline-flex items-center px-6 py-3 border border-transparent text-lg font-medium rounded-full text-white bg-green-700 hover:bg-green-800 transition-bg duration-300 shadow hover:shadow-lg">
        View All Products
        <svg width="1em" height="1em" class="w-4 h-4 ml-2 group-hover:ml-3 transition-all duration-300" viewBox="0 0 22 22" preserveAspectRatio="xMidYMid meet" fill="none" role="presentation" xmlns="http://www.w3.org/2000/svg" class="rtl"><g><path fill-opacity=".01" fill="#000" d="M0 0h22v22H0z"></path><path fill="#fff" d="M20.513 11.351a.5.5 0 0 0 0-.702l-8.224-8.347a.5.5 0 0 0-.707-.005l-.92.906a.5.5 0 0 0-.005.707l5.856 5.944H2.333a.5.5 0 0 0-.5.5v1.292a.5.5 0 0 0 .5.5h14.18l-5.856 5.944a.5.5 0 0 0 .005.707l.92.906a.5.5 0 0 0 .707-.005l8.224-8.347Z"></path></g></svg>
      </a>
    </div>
  </div>
</section>
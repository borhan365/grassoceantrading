<section class="py-16">
  <div class="container mx-auto">
    <div class="text-left mb-10">
      <h2 class="text-sm font-semibold text-green-600 tracking-wide uppercase">Services</h2>
      <p class="mt-2 text-4xl font-extrabold text-gray-900 sm:text-5xl sm:tracking-tight lg:text-5xl">
        More Flooring Solutions
      </p>
      <p class="mt-5 text-xl text-gray-500">
        Discover our wide range of high-quality flooring solutions for your home and business.
      </p>
    </div>
    
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
      <?php
      $args = array(
        'post_type' => 'services',
        'posts_per_page' => 8
      );
      $services_query = new WP_Query($args);
      if ($services_query->have_posts()) :
        while ($services_query->have_posts()) : $services_query->the_post();
          $common_fields = get_field('common_fields');
          $excerpt = isset($common_fields['excerpt']) ? $common_fields['excerpt'] : '';
      ?>
        <div class="group bg-white rounded-lg shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden">
          <?php if (has_post_thumbnail()) : ?>
            <div class="relative overflow-hidden">
              <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('medium', array('class' => 'w-full h-48 object-cover transform group-hover:scale-105 transition-transform duration-300')); ?>
              </a>
              <div class="absolute inset-0 bg-black bg-opacity-10 group-hover:bg-opacity-20 transition-all duration-300"></div>
            </div>
          <?php endif; ?>
          <div class="p-6">
            <a href="<?php the_permalink(); ?>" class="block">
              <h3 class="text-lg font-semibold text-gray-900 group-hover:text-green-700 transition-colors duration-300 mb-2"><?php the_title(); ?></h3>
            </a>
            <!-- <p class="text-gray-600 text-sm mb-4 line-clamp-2"></p> -->
            <?php echo $excerpt; ?>
            <a href="<?php the_permalink(); ?>" class="inline-flex items-center text-green-600 font-medium hover:text-green-800 transition-colors duration-300 mt-1">
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
          <p class="text-gray-600">No services found.</p>
        </div>
      <?php endif; ?>
    </div>
          <!-- View All Services -->
          <div class="!mt-10 text-right w-full flex justify-end items-center">
            <a href="<?php echo site_url('/services'); ?>" class="group inline-flex items-center border border-transparent text-lg font-medium rounded-full text-green-700 hover:text-green-800 transition-bg duration-300">
              View All Services
              <svg width="1em" height="1em" class="w-4 h-4 text-green-600 ml-2 group-hover:ml-3 transition-all duration-300" viewBox="0 0 22 22" preserveAspectRatio="xMidYMid meet" fill="#34C759" role="presentation" xmlns="http://www.w3.org/2000/svg" class="rtl">
                <g>
                  <path fill-opacity=".01" fill="#000" d="M0 0h22v22H0z"></path>
                  <path fill="#15803d" d="M20.513 11.351a.5.5 0 0 0 0-.702l-8.224-8.347a.5.5 0 0 0-.707-.005l-.92.906a.5.5 0 0 0-.005.707l5.856 5.944H2.333a.5.5 0 0 0-.5.5v1.292a.5.5 0 0 0 .5.5h14.18l-5.856 5.944a.5.5 0 0 0 .005.707l.92.906a.5.5 0 0 0 .707-.005l8.224-8.347Z"></path>
                </g>
              </svg>
            </a>
          </div>
    
    </div>
  </div>
</section>
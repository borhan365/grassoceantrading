<section class="bg-gradient-to-br from-blue-50 to-indigo-100 py-16">
  <div class="container mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-12">
      <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
        What Our Clients Say
      </h2>
      <p class="mt-4 text-xl text-gray-600">
        Hear from our satisfied customers about their experiences.
      </p>
    </div>

    <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-4">
      <?php
      // Define query parameters
      $args = array(
        'post_type' => 'testimonials', // Ensure 'testimonials' is the correct post type slug
        'posts_per_page' => 4 // Adjust as needed
      );

      // Create a new query for testimonials
      $testimonials_query = new WP_Query($args);

      // Start the loop
      if ($testimonials_query->have_posts()) :
        while ($testimonials_query->have_posts()) : $testimonials_query->the_post();

          // Get custom fields (make sure this function exists and returns correct fields)
          $common_fields = get_field('common_fields');
          $image = isset($common_fields['logo']) ? $common_fields['logo'] : '';
      ?>
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
          <div class="p-8 relative">
            <?php
            // Check if common_fields and logo are available
            if ($common_fields && !empty($common_fields['logo']['url'])) :
            ?>
              <img title="Review Source" src="<?php echo esc_url($common_fields['logo']['url']); ?>" alt="Source" class="absolute bottom-8 right-10 w-4 h-4 opacity-80 object-contain">
            <?php
            endif;
            ?>

            <div class="flex items-center mb-4">
              <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('thumbnail', array('class' => 'h-12 w-12 rounded-full object-cover')); ?>
              <?php endif; ?>

              <div class="ml-4">
                <h3 class="text-lg font-semibold text-gray-900"><?php the_title(); ?></h3>
                <?php if (!empty($common_fields['custom_title'])) : ?>
                  <p class="text-gray-600"><?php echo esc_html($common_fields['custom_title']); ?></p>
                <?php endif; ?>
              </div>
            </div>

            <p class="text-gray-700 leading-relaxed mb-4">
              <?php the_content(); ?>
            </p>

            <div class="flex items-center mt-4">
              <?php for ($i = 0; $i < 5; $i++) : ?>
                <svg class="h-5 w-5 text-orange-500" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                </svg>
              <?php endfor; ?>
            </div>
          </div>
        </div>
      <?php
        endwhile;
        wp_reset_postdata();
      else :
        echo '<p class="text-center text-gray-600">No testimonials found.</p>';
      endif;
      ?>
    </div>
  </div>
</section>

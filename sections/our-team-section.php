<section class="bg-gray-50 py-16">
  <div class="container mx-auto px-4 sm:px-6 lg:px-8 text-center">
    <h2 class="text-green-600 text-lg font-semibold mb-2">Meet Our Expert Team</h2>
    <h3 class="text-4xl font-bold text-gray-900 mb-12"> Serving You Better Everytime</h3>
    
    <div class="grid grid-cols-1 gap-8 md:grid-cols-4 lg:grid-cols-5">
      <?php
      // Define query parameters
      $args = array(
        'post_type' => 'teams', // Custom post type for teams
        'posts_per_page' => 5 // Adjust as needed
      );

      // Create a new query for teams
      $teams_query = new WP_Query($args);

      // Start the loop
      if ($teams_query->have_posts()) :
        while ($teams_query->have_posts()) : $teams_query->the_post();

          // Get custom fields (make sure this function exists and returns correct fields)
          $team_fields = get_field('common_fields');
          $position = isset($team_fields['custom_title']) ? $team_fields['custom_title'] : '';
      ?>
        <div class="flex flex-col items-center">
          <div class="relative w-48 h-48 mb-4">
            <?php if (has_post_thumbnail()) : ?>
              <?php the_post_thumbnail('thumbnail', array('class' => 'w-full h-full object-cover rounded-full border-4 border-white shadow-lg')); ?>
            <?php endif; ?>
            <div class="absolute bottom-4 right-4 bg-orange-500 text-white p-2 rounded-full cursor-pointer hover:bg-orange-600 transition-colors duration-300">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-share-2"><circle cx="18" cy="5" r="3"></circle><circle cx="6" cy="12" r="3"></circle><circle cx="18" cy="19" r="3"></circle><line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line><line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line></svg>
            </div>
          </div>
          <h4 class="text-xl font-semibold text-gray-900"><?php the_title(); ?></h4>
          <?php if (!empty($position)) : ?>
            <p class="text-gray-600"><?php echo esc_html($position); ?></p>
          <?php endif; ?>
        </div>
      <?php
        endwhile;
        wp_reset_postdata();
      else :
        echo '<p class="text-center text-gray-600">No team members found.</p>';
      endif;
      ?>
    </div>
  </div>
</section>
<!-- project-related-post-section -->

<section class="py-16 bg-white">
  <div class="container mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-left mb-12">
      <h2 class="text-4xl font-bold text-gray-800 mb-4">Our Featured Projects</h2>
      <p class="text-base text-gray-600 max-w-2xl">
        Explore our handpicked selection of outstanding projects that showcase our expertise and innovation.
      </p>
    </div>
    
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
      <?php
      $args = array(
        'post_type' => 'projects',
        'posts_per_page' => 8,
        'orderby' => 'date',
        'order' => 'DESC',
        'meta_query' => array(
          array(
            'key' => 'common_fields_is_featured',
            'value' => 'yes',
            'compare' => '='
          )
        )
      );
      $projects_query = new WP_Query($args);

      if ($projects_query->have_posts()) :
        $category_colors = array(
          'bg-blue-500 text-white',
          'bg-green-500 text-white',
          'bg-yellow-500 text-white',
          'bg-red-500 text-white',
          'bg-purple-500 text-white',
          'bg-pink-500 text-white',
          'bg-indigo-500 text-white',
          'bg-teal-500 text-white'
        );
        $color_index = 0;

        while ($projects_query->have_posts()) : $projects_query->the_post();
          $project_id = get_the_ID();
          $categories = get_the_terms($project_id, 'project-categories');
          $category = $categories ? $categories[0] : null;
          
          // Get project details
          $project_details = get_common_fields($project_id, 'projects');
         
      ?>
        <div class="group relative overflow-hidden rounded-lg shadow-lg">
          <?php if (get_the_post_thumbnail_url($project_id, 'large')) : ?>
            <img src="<?php echo get_the_post_thumbnail_url($project_id, 'large');  ?>" alt="<?php the_title_attribute(); ?>" class="w-full h-96 object-cover transition-transform duration-300 group-hover:scale-110">
          <?php endif; ?>
          <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
          <div class="absolute bottom-0 left-0 right-0 p-8">
            <?php if ($category) : 
              $category_color = $category_colors[$color_index % count($category_colors)];
              $color_index++;
            ?>
              <span class="text-xs font-semibold <?php echo esc_attr($category_color); ?> px-2 py-1 rounded-full mb-2 inline-block"><?php echo esc_html($category->name); ?></span>
            <?php endif; ?>
            <a href="<?php the_permalink(); ?>" class="text-xl font-bold text-white">
              <h3 class="text-[22px] font-bold text-white"><?php the_title(); ?></h3>
            </a>
          </div>
        </div>
      <?php
        endwhile;
        wp_reset_postdata();
      else :
        echo '<p>No featured projects found.</p>';
      endif;
      ?>
    </div>
    <div class="mt-8 text-right">
      <a href="<?php echo site_url('/projects'); ?>" class="inline-flex items-center px-6 py-3 border border-transparent text-lg font-medium rounded-full text-white bg-green-700 hover:bg-green-800 transition-bg duration-300 shadow hover:shadow-lg">
        View All Projects
        <svg class="w-4 h-4 ml-2" stroke="currentColor" fill="none" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
        </svg>
      </a>
    </div>
  </div>
</section>
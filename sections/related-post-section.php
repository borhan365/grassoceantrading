<section class="bg-white">
  <div class="container mx-auto px-4">
    <div class="text-left mb-12">
      <h2 class="text-4xl font-bold mb-2">Related Blog Posts</h2>
      <p class="text-gray-600">
        Stay updated with the latest trends and insights in the flooring industry.
      </p>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-4 gap-8">
      <?php
      $args = array(
        'post_type' => 'post',
        'posts_per_page' => 8,
        'taxonomy' => 'category',
        'orderby' => 'date',
        'order' => 'DESC'
      );
      $latest_posts = new WP_Query($args);
      
      if ($latest_posts->have_posts()) :
        while ($latest_posts->have_posts()) : $latest_posts->the_post();
      ?>
        <article class="bg-white rounded-lg shadow-md overflow-hidden transition-shadow duration-300 hover:shadow-xl">
          <?php if (has_post_thumbnail()) : ?>
            <a href="<?php the_permalink(); ?>" class="block">
              <img src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php the_title_attribute(); ?>" class="w-full h-60 object-cover">
            </a>
          <?php endif; ?>
          <div class="p-6">
            <div class="mb-4">
              <?php
              $categories = get_the_category();
              if (!empty($categories)) {
                echo '<a href="' . esc_url(get_category_link($categories[0]->term_id)) . '" class="inline-block bg-emerald-100 text-emerald-800 text-xs font-semibold px-2.5 py-0.5 rounded">' . esc_html($categories[0]->name) . '</a>';
              }
              ?>
            </div>
            <a href="<?php the_permalink(); ?>">
              <h3 class="text-xl font-semibold mb-2"><?php the_title(); ?></h3>
            </a>
            <p class="text-gray-600 mb-4"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
            <a href="<?php the_permalink(); ?>" class="inline-flex items-center text-emerald-600 font-semibold hover:underline">
              Read More
              <svg class="ml-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
              </svg>
            </a>
          </div>
        </article>
      <?php
        endwhile;
        wp_reset_postdata();
      endif;
      ?>
    </div>
    
    <div class="mt-4 text-end">
      <a href="<?php echo home_url('/blogs'); ?>" class="text-green-600 px-8 py-3 text-lg font-semibold hover:text-green-700 transition-colors duration-300 flex items-center gap-2 justify-end pr-0 group">
        <span> View All Blog </span>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 group-hover:ml-3 transition-all duration-300" viewBox="0 0 20 20" fill="currentColor">
          <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
        </svg>
      </a>
    </div>
  </div>
</section>
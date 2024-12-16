<section class="py-16 bg-gray-50">
  <div class="container mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-12">
      <h2 class="text-4xl font-bold text-gray-800 mb-4">Frequently Asked Questions</h2>
      <p class="text-base text-gray-600 max-w-2xl mx-auto">
        Find answers to common questions about our flooring products and services.
      </p>
    </div>
    <div class="max-w-3xl mx-auto space-y-4">
      <?php
      $args = array(
        'post_type' => 'faqs',
        'posts_per_page' => 5,
        'orderby' => 'menu_order',
        'order' => 'ASC',
      );
      $faqs_query = new WP_Query($args);

      if ($faqs_query->have_posts()) :
        while ($faqs_query->have_posts()) : $faqs_query->the_post();
      ?>
        <div class="group border-b border-gray-200 bg-white rounded-lg shadow-sm mb-4">
          <div class="flex justify-between items-center cursor-pointer p-5" onclick="toggleItem(<?php echo get_the_ID(); ?>)">
            <span class="text-lg font-medium text-gray-900"><?php the_title(); ?></span>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 text-gray-500 transition-transform duration-300" id="chevron-<?php echo get_the_ID(); ?>">
              <polyline points="6 9 12 15 18 9"></polyline>
            </svg>
          </div>
          <div class="overflow-hidden transition-all duration-300 max-h-0" id="answer-<?php echo get_the_ID(); ?>">
            <div class="px-5 pb-5 text-gray-600"><?php the_content(); ?></div>
          </div>
        </div>
      <?php
        endwhile;
        wp_reset_postdata();
      else :
      ?>
        <p class="text-center text-gray-600">No FAQs found.</p>
      <?php endif; ?>

      <!-- View All FAQs -->
      <div class="!mt-10 text-center">
        <a href="<?php echo site_url('/faqs'); ?>" class="group inline-flex items-center px-6 py-3 border border-transparent text-lg font-medium rounded-full text-white bg-green-700 hover:bg-green-800 transition-bg duration-300 shadow hover:shadow-lg">
          View All FAQs
          <svg width="1em" height="1em" class="w-4 h-4 ml-2 group-hover:ml-3 transition-all duration-300" viewBox="0 0 22 22" preserveAspectRatio="xMidYMid meet" fill="none" role="presentation" xmlns="http://www.w3.org/2000/svg" class="rtl"><g><path fill-opacity=".01" fill="#000" d="M0 0h22v22H0z"></path><path fill="#fff" d="M20.513 11.351a.5.5 0 0 0 0-.702l-8.224-8.347a.5.5 0 0 0-.707-.005l-.92.906a.5.5 0 0 0-.005.707l5.856 5.944H2.333a.5.5 0 0 0-.5.5v1.292a.5.5 0 0 0 .5.5h14.18l-5.856 5.944a.5.5 0 0 0 .005.707l.92.906a.5.5 0 0 0 .707-.005l8.224-8.347Z"></path></g></svg>
        </a>
      </div>
    </div>
  </div>
</section>

<script>
  function toggleItem(id) {
    const answerElement = document.getElementById(`answer-${id}`);
    const chevronElement = document.getElementById(`chevron-${id}`);
    
    if (answerElement.style.maxHeight) {
      answerElement.style.maxHeight = null;
      chevronElement.style.transform = 'rotate(0deg)';
    } else {
      answerElement.style.maxHeight = answerElement.scrollHeight + "px";
      chevronElement.style.transform = 'rotate(180deg)';
    }
  }
</script>
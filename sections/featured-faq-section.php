<!-- Featured FAQ Section -->
<section class="call-to-action-section">
  <div class="container">
    <div class="featured-city-title-wrapper">
      <h2>
        <span class="review-title-badge"> Frequently Asked Questions</span>
      </h2>
      <!-- <p>
        Our MBBS doctors team write exclusive reviews for every products cleirity
      </p> -->
      <div class="underline"></div>
    </div>
    <div class="faq-wrapper">
      <div id="accordion">
        <?php
        $faq_query = new WP_Query(array(
            'post_type' => 'faqs',
            'posts_per_page' => 5,
            'tax_query' => array(
                array(
                    'taxonomy' => 'faq-categories',
                    'field' => 'slug',
                    'terms' => 'general', // Replace with your desired term slug or remove this part if you don't want to filter by taxonomy
                ),
            ),
        ));

        if ($faq_query->have_posts()) :
            while ($faq_query->have_posts()) : $faq_query->the_post();
        ?>
            <div class="faq-title">
              <h3>
                <span><?php the_title(); ?></span>
                <i class="fas fa-chevron-down"></i>
              </h3>
            </div>
            <div class="faq-content single-content-area">
              <?php the_content(); ?>
            </div>
        <?php
            endwhile;
            wp_reset_postdata();
        else :
            echo '<p>No FAQs found.</p>';
        endif;
        ?>
      </div>
    </div>
    <div class="ambulance-item">
      <a href="<?php echo site_url(); ?>/faqs/" previewlistener="true">
        <button class="book-ambulance-button">More FAQs</button>
      </a>
    </div>
  </div>
</section>
<!-- Featured FAQ Section -->

<script>
  jQuery(document).ready(function($) {
      $("#accordion").accordion({
          collapsible: true,
          active: false,
          heightStyle: "content",
          header: ".faq-title",
          icons: false // Disable default icons
      });

      // Add custom icons
      $("#accordion").on("accordionbeforeactivate", function(event, ui) {
          ui.oldHeader.find("i").removeClass("fa-chevron-up").addClass("fa-chevron-down");
          ui.newHeader.find("i").removeClass("fa-chevron-down").addClass("fa-chevron-up");
      });
  });
</script>

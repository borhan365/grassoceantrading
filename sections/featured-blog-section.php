<!-- Blog section -->
<section class="home-blog-section">
  <div class="container">
    <div class="blog-list-wrapper">
      <div class="specialist-title-wrapper">
        <div class="featured-right"> 
            <!-- description -->
            <?php if ( is_active_sidebar( 'home-blog-content' ) ) : ?>
                <?php dynamic_sidebar( 'home-blog-content' ); ?>
            <?php endif; ?>
        </div>
      </div>
      <div class="featured-city-wrapper single-city-wrapper">
        <?php
        // Query 3 most recent blog posts
        $args = array(
          'post_type' => 'post',
          'posts_per_page' => 4,
          'orderby' => 'date',
          'order' => 'DESC'
        );
        $recent_posts = new WP_Query($args);

        if ($recent_posts->have_posts()) {
          while ($recent_posts->have_posts()) {
            $recent_posts->the_post();
            ?>
            <!-- item -->
            <div class="featured-city-item single-district-item">
              <div class="featured-city-thumb">
                <?php
                if (has_post_thumbnail()) {
                  the_post_thumbnail('thumbnail');
                } else {
                  echo '<img src="' . get_template_directory_uri() . '/assets/images/not-found.png" alt="featured blog" />';
                }
                ?>
              </div>
              <div class="featured-city-content discover-more-content">
                <a href="<?php the_permalink(); ?>">
                  <h2><?php the_title(); ?></h2>
                </a>
              </div>
            </div>
            <!-- end item -->
            <?php
          }
          wp_reset_postdata(); // Restore original post data
        } else {
          echo 'No blog posts found.';
        }
        ?>
      </div>
    </div>
            <!-- see more -->
            <div class="see-more">
            <a href="<?php echo site_url(); ?>/blog">See all articles</a>
            <i class="fas fa-long-arrow-alt-right"></i>
        </div>
  </div>
</section>
<!-- Blog section -->

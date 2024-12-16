<?php
/* Template Name: Teams */
?>

<?php get_header(); ?>

<section class="author-list-section">
  <div class="container">
    <ul class="author-list-wrapper">
      <?php
      // Query to retrieve users with the editor role
      $editors = new WP_User_Query(array(
          'role' => 'editor' // Specify the role as 'editor'
      ));
      
      // Check if editors are found
      if (!empty($editors->results)) {
          // Loop through each editor
          foreach ($editors->results as $editor) {
              $author_info = get_userdata($editor->ID); // Get user data
              
              // Check if user data is available
              if ($author_info) {
                  ?>
                  <li>
                      <figure class="author-list-avatar">
                        <?php echo get_avatar($author_info->ID, 32); // Display avatar ?>
                      </figure>
                      <div>
                          <a href="<?php echo get_author_posts_url($author_info->ID); ?>">
                              <?php echo esc_html($author_info->display_name); // Display display name ?>
                          </a>
                          (<?php echo count_user_posts($author_info->ID); // Display post count ?>)
                          <?php if (!empty($author_info->description)) : ?>
                              <p><?php echo esc_html($author_info->description); ?></p> <!-- Display author description -->
                          <?php endif; ?>
                      </div>
                  </li>
                  <?php
              }
          }
      } else {
          echo '<li>No editors found.</li>';
      }
      ?>
  </ul>
  </div>
</section>

<?php get_footer(); ?>

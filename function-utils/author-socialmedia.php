<?php 


function add_custom_social_media_fields($user) {
  ?>
  <h3><?php _e("Social Media Profiles", "textdomain"); ?></h3>

  <table class="form-table">
      <tr>
          <th><label for="website"><?php _e("Website"); ?></label></th>
          <td>
              <input type="text" name="website" id="website" value="<?php echo esc_attr(get_the_author_meta('website', $user->ID)); ?>" class="regular-text" /><br />
              <span class="description"><?php _e("Please enter your Website URL."); ?></span>
          </td>
      </tr>
      <tr>
          <th><label for="facebook"><?php _e("Facebook"); ?></label></th>
          <td>
              <input type="text" name="facebook" id="facebook" value="<?php echo esc_attr(get_the_author_meta('facebook', $user->ID)); ?>" class="regular-text" /><br />
              <span class="description"><?php _e("Please enter your Facebook URL."); ?></span>
          </td>
      </tr>
      <tr>
          <th><label for="twitter"><?php _e("Twitter"); ?></label></th>
          <td>
              <input type="text" name="twitter" id="twitter" value="<?php echo esc_attr(get_the_author_meta('twitter', $user->ID)); ?>" class="regular-text" /><br />
              <span class="description"><?php _e("Please enter your Twitter URL."); ?></span>
          </td>
      </tr>
      <tr>
          <th><label for="linkedin"><?php _e("LinkedIn"); ?></label></th>
          <td>
              <input type="text" name="linkedin" id="linkedin" value="<?php echo esc_attr(get_the_author_meta('linkedin', $user->ID)); ?>" class="regular-text" /><br />
              <span class="description"><?php _e("Please enter your LinkedIn URL."); ?></span>
          </td>
      </tr>
      <tr>
          <th><label for="youtube"><?php _e("YouTube"); ?></label></th>
          <td>
              <input type="text" name="youtube" id="youtube" value="<?php echo esc_attr(get_the_author_meta('youtube', $user->ID)); ?>" class="regular-text" /><br />
              <span class="description"><?php _e("Please enter your YouTube channel URL."); ?></span>
          </td>
      </tr>
  </table>
  <?php
}

add_action('show_user_profile', 'add_custom_social_media_fields');
add_action('edit_user_profile', 'add_custom_social_media_fields');

function save_custom_social_media_fields($user_id) {
  if (!current_user_can('edit_user', $user_id)) {
      return false;
  }

  update_user_meta($user_id, 'website', $_POST['website']);
  update_user_meta($user_id, 'facebook', $_POST['facebook']);
  update_user_meta($user_id, 'twitter', $_POST['twitter']);
  update_user_meta($user_id, 'linkedin', $_POST['linkedin']);
  update_user_meta($user_id, 'youtube', $_POST['youtube']);
}

add_action('personal_options_update', 'save_custom_social_media_fields');
add_action('edit_user_profile_update', 'save_custom_social_media_fields');

?>

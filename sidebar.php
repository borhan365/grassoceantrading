
<div class="sidebar-wrapper">
<div class="hospital-sidebar-info">
              <h2>Contact Details</h2>
              <ul>
              <?php 
                    $common_fields = get_field('hospital_common_fields');
                    if (!empty($common_fields['hospital_address'])) : 
                ?>
                <li class="label-value-wrap">
                    <p> <i class="fas fa-map-marked-alt"></i> <?php echo $common_fields['hospital_address']; ?></p>
                </li>
              <?php endif; ?>
                <!-- emails -->
                  <?php
                    $common_email = get_field('email_group');
                    if( $common_email ): ?>
                        <div id="common_email">
                            <li> <?php echo $common_email['email_one'] ?> </li>
                            <li> <?php echo $common_email['email_two'] ?> </li>
                            <li> <?php echo $common_email['email_three'] ?> </li>
                      </div>
                  <?php endif; ?>
                  <!-- phone numbers -->
                  <?php
                    $common_phone = get_field('phone_number_group');
                    if( $common_phone ): ?>
                        <div id="common_phone">
                            <li> <?php echo $common_phone['phone_number_one'] ?> </li>
                            <li> <?php echo $common_phone['phone_number_two'] ?> </li>
                            <li> <?php echo $common_phone['phone_number_three'] ?> </li>
                      </div>
                  <?php endif; ?>

                   <!-- Social Media -->
                    <?php
                    $social_media = get_field('social_media');
                    if ($social_media) : ?>
                        <div class="social_media">
                            <?php if ($social_media['facebook']) : ?>
                                <li><a href="<?php echo $social_media['facebook']; ?>"><i class="fab fa-facebook-f"></i></a></li>
                            <?php endif; ?>
                            <?php if ($social_media['twitter']) : ?>
                                <li><a href="<?php echo $social_media['twitter']; ?>"><i class="fab fa-twitter"></i></a></li>
                            <?php endif; ?>
                            <?php if ($social_media['instagram']) : ?>
                                <li><a href="<?php echo $social_media['instagram']; ?>"><i class="fab fa-instagram"></i></a></li>
                            <?php endif; ?>
                            <?php if ($social_media['youtube']) : ?>
                                <li><a href="<?php echo $social_media['youtube']; ?>"><i class="fab fa-youtube"></i></a></li>
                            <?php endif; ?>
                            <?php if ($social_media['linkedin']) : ?>
                                <li><a href="<?php echo $social_media['linkedin']; ?>"><i class="fab fa-linkedin"></i></a></li>
                            <?php endif; ?>
                            <?php /* Add more social media icons as needed */ ?>
                        </div>
                    <?php endif; ?>
              </ul>
              <div class="sidebar-call-to-action-button">
                    <?php
                        $common_fields = get_field('hospital_common_fields');
                        // Assuming $website holds the URL you want to link to.
                        if (isset($common_fields['hospital_website_link']) && !empty($common_fields['hospital_website_link'])) {
                            echo '<button class="call-now"><a href="' . esc_url($common_fields['hospital_website_link']) . '" target="_blank">Visit Website</a></button>';
                        }
                    ?>
                  
              </div>
          </div>
</div>

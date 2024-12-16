<div class="taxonomy-sidebar quick-link-sidebar group-block">
    <ul>
        <?php
        $current_term_id = get_queried_object_id(); // Get the current term ID to compare and set 'active' class
        $terms = get_terms([
            'taxonomy' => 'website-categories',
            'hide_empty' => false,
            'number' => 0, // Fetch all terms initially to filter based on 'is_featured'
        ]);

        $featured_terms = [];
        foreach ($terms as $term) {
            $logo_icon_flag_excerpt_descriptions = get_field('taxonomy_fields', $term->taxonomy . '_' . $term->term_id);
            if (is_array($logo_icon_flag_excerpt_descriptions) && isset($logo_icon_flag_excerpt_descriptions['is_featured']) && $logo_icon_flag_excerpt_descriptions['is_featured'] === 'yes') {
                $featured_terms[] = $term;
                if (count($featured_terms) >= 20) {
                    break; // Limit the number of featured terms to 20
                }
            }
        }

        if (!empty($featured_terms)) {
            foreach ($featured_terms as $term) {
                $term_link = get_term_link($term);
                if (!is_wp_error($term_link)) {
                    $active_class = ($term->term_id == $current_term_id) ? 'active' : '';
                    ?>
                    <li class="quick-link-item <?php echo $active_class; ?>">
                        <a href="<?php echo esc_url($term_link); ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" id="trend-up">
                                <rect width="256" height="256" fill="none"></rect>
                                <polyline fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="24" points="232.002 56 136.002 152 96.002 112 24.002 184"></polyline>
                                <polyline fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="24" points="232.002 120 232.002 56 168.002 56"></polyline>
                            </svg>
                            <?php echo esc_html($term->name); ?>
                        </a>
                    </li>
                    <?php
                }
            }
        } else {
            echo '<li>No featured website categories found.</li>';
        }
        ?>
    </ul>
</div>

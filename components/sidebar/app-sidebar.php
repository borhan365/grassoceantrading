<div>
    <!-- App Types Sidebar -->
    <div class="taxonomy-sidebar quick-link-sidebar group-block">
        <ul>
            <?php
            $tax_args = [
                'taxonomy' => 'app-types',
                'hide_empty' => false,
                'number' => 20, // Limit initially fetched terms for efficiency
            ];

            $all_terms = get_terms($tax_args);
            $featured_count = 0;
            $current_term_id = get_queried_object_id(); // Adjust as needed to get the current term ID.

            if (!empty($all_terms) && !is_wp_error($all_terms)) {
                foreach ($all_terms as $term) {
                    $is_featured = get_field('taxonomy_fields', $term->taxonomy . '_' . $term->term_id);
                    $active_class = ($term->term_id == $current_term_id) ? 'active' : '';

                    if ($is_featured && isset($is_featured['is_featured']) && $is_featured['is_featured'] === 'yes') {
                        echo '<li class="quick-link-item ' . $active_class . '"><a href="' . get_term_link($term) . '">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" id="trend-up">
                                <rect width="256" height="256" fill="none"></rect>
                                <polyline fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="24" points="232.002 56 136.002 152 96.002 112 24.002 184"></polyline>
                                <polyline fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="24" points="232.002 120 232.002 56 168.002 56"></polyline>
                            </svg>
                            Best health apps for ' . $term->name . '</a></li>';
                        $featured_count++;
                    }

                    if ($featured_count >= 20) {
                        break;
                    }
                }
            }

            if ($featured_count === 0) {
                echo '<li>No apps types found.</li>';
            }
            ?>
        </ul>
    </div>

    <!-- App Categories Sidebar -->
    <div class="taxonomy-sidebar quick-link-sidebar group-block">
        <ul>
            <?php
            $tax_args = [
                'taxonomy' => 'app-categories',
                'hide_empty' => false,
                'number' => 20, // Limit initially fetched terms for efficiency
            ];

            $all_terms = get_terms($tax_args);
            $featured_count = 0;

            if (!empty($all_terms) && !is_wp_error($all_terms)) {
                foreach ($all_terms as $term) {
                    $is_featured = get_field('taxonomy_fields', $term->taxonomy . '_' . $term->term_id);
                    $active_class = ($term->term_id == $current_term_id) ? 'active' : '';

                    if ($is_featured && isset($is_featured['is_featured']) && $is_featured['is_featured'] === 'yes') {
                        echo '<li class="quick-link-item ' . $active_class . '"><a href="' . get_term_link($term) . '">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" id="trend-up">
                                <rect width="256" height="256" fill="none"></rect>
                                <polyline fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="24" points="232.002 56 136.002 152 96.002 112 24.002 184"></polyline>
                                <polyline fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="24" points="232.002 120 232.002 56 168.002 56"></polyline>
                            </svg>
                            Best health apps for ' . $term->name . '</a></li>';
                        $featured_count++;
                    }

                    if ($featured_count >= 20) {
                        break;
                    }
                }
            }

            if ($featured_count === 0) {
                echo '<li>No featured app categories found.</li>';
            }
            ?>
        </ul>
    </div>
</div>

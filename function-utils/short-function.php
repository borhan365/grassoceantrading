
<?php 
// functions.php or your custom functions file

// Function to display taxonomy terms with a maximum limit
function display_taxonomy_terms($terms, $max_terms = 2) {
    if ($terms && !is_wp_error($terms)) {
        echo '<div class="line-wrap">';
        // echo '<strong>Department: </strong>';
        $terms_count = count($terms);
        $index = 0;
        
        foreach ($terms as $term_item) {
            $location_link = get_term_link($term_item);
            echo '<a class="job-type-badge" href="' . esc_url($location_link) . '">' . esc_html($term_item->name);
            
            // Append comma after each item except the last one
            if (++$index !== $terms_count) {
                echo ', ';
            }
            
            echo '</a>';
        }
        echo '</div>';
    }
}

// Function to display location terms with a maximum limit
function display_location_terms($terms, $max_terms = 2) {
    if ($terms && !is_wp_error($terms)) {
        echo '<div class="label-value-wrap country-li-wrap">';
        $count = 0;
        foreach ($terms as $location_term) {
            if ($count >= $max_terms) {
                break; // Limit reached, stop looping
            }

            $location_link = get_term_link($location_term);
            echo '<div class="line-wrap">';                                   

            // Get location information
            $location_information = get_location_image($location_term->term_id);

            if ($location_information && isset($location_information['logo'])) {
                $logo = $location_information['logo'];

                // Display the image if available
                if ($logo) {
                    echo '<img class="img-icon" src="' . esc_url($logo['url']) . '" alt="Additional Image" />';
                }
            }

            // Display linkable category name
            echo '<a href="' . esc_url($location_link) . '"><i class="fas fa-map-marker-alt"></i> <span>' . esc_html($location_term->name) . '</span></a>';


            if ($location_term->parent !== 0) {
                // For subcategory, show parent category name as well
                $parent_term = get_term($location_term->parent, 'doctor-locations');
                echo ', <a href="' . esc_url(get_term_link($parent_term)) . '">' . esc_html($parent_term->name) . '</a>';
            }

            echo '</div>';
            $count++;
        }
        echo '</div>';
    }
}


// Get the taxonomy custom fields
if (!function_exists('get_taxonomy_fields')) {
    function get_taxonomy_fields($term_id, $taxonomy) {
        $fields = get_field('taxonomy_fields', $taxonomy . '_' . $term_id);
        $details = [
            'excerpt' => '',
            'secondary_excerpt' => '',
            'logo' => '',
            'full_description' => '',
            'featured_image' => '',
            'featured_description' => '',
            'overview' => '',
            'custom_title' => '',
            'is_featured' => '',
        ];

        if ($fields) {
            $details = array_merge($details, array_intersect_key($fields, $details));
        }

        return $details;
    }
}

// Get the taxonomy total post count
if (!function_exists('get_term_post_count')) {
    function get_term_post_count($term_id, $taxonomy) {
        $term = get_term($term_id, $taxonomy);

        if (is_wp_error($term)) {
            return 0; // Return 0 if there's an error
        }

        $count = $term->count;

        $child_terms = get_terms([
            'taxonomy' => $taxonomy,
            'parent' => $term_id,
            'hide_empty' => false,
        ]);

        if (is_wp_error($child_terms) || !is_array($child_terms)) {
            return $count;
        }

        foreach ($child_terms as $child) {
            $count += get_term_post_count($child->term_id, $taxonomy);
        }

        return $count;
    }
}

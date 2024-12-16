<?php

/**
 * Enqueue scripts and styles
 */
function theme_enqueue_assets() {
    // Enqueue Slick Slider CSS
    wp_enqueue_style('slick-css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', array(), '1.8.1');
    wp_enqueue_style('slick-theme-css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css', array(), '1.8.1');

    // Enqueue jQuery (if not already enqueued by WordPress)
    wp_enqueue_script('jquery');

    // Enqueue Slick Slider JS
    wp_enqueue_script('slick-js', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), '1.8.1', true);

    // Enqueue custom scripts
    wp_enqueue_script('custom', get_template_directory_uri() . '/assets/js/app.js', array('jquery', 'slick-js'), '1.0.0', true);

    // Enqueue and localize scripts
    wp_enqueue_script('hero-search-ajax', get_template_directory_uri() . '/assets/js/hero-search.js', array('jquery'), null, true);
    wp_localize_script('hero-search-ajax', 'heroSearch', array('ajaxurl' => admin_url('admin-ajax.php')));

    // Enqueue styles
    wp_enqueue_style('borhantheme-swiperjs', get_template_directory_uri() . '/assets/css/swiper-bundle.min.css', array(), '1.0.0', 'all');
    wp_enqueue_style('borhantheme-grass-ocean-trading', get_template_directory_uri() . '/assets/css/grass-ocean.css', array(), '1.0.0', 'all');
    wp_enqueue_style('borhantheme-satoshi', get_template_directory_uri() . '/assets/css/satoshi.css', array(), '1.0.0', 'all');
    // wp_enqueue_style('borhantheme-medical-hero', get_template_directory_uri() . '/assets/css/medical-hero.css', array(), '1.0.0', 'all');
    // wp_enqueue_style('borhantheme-medical-hero-responsive', get_template_directory_uri() . '/assets/css/responsive-mh.css', array(), '1.0.0', 'all');
    // wp_enqueue_style('borhantheme-mobile', get_template_directory_uri() . '/assets/css/responsive.css', array(), '1.0.0', 'all');
    
    // Enqueue Font Awesome from a CDN
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css', array(), '5.15.4', 'all');

    // Enqueue jQuery UI for accordion
    wp_enqueue_script('jquery-ui-accordion');
    wp_enqueue_style('jquery-ui-css', 'https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css');
}
add_action('wp_enqueue_scripts', 'theme_enqueue_assets');

/**
 * Enqueue Tailwind CSS
 */
function enqueue_tailwindcss() {
    wp_enqueue_style('tailwind', get_template_directory_uri() . '/assets/css/style.css', array(), null);
}
add_action('wp_enqueue_scripts', 'enqueue_tailwindcss');

/**
 * Theme setup
 */
function borhantheme_setup() {
    add_theme_support('automatic-feed-links');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'script', 'style'));
    add_theme_support('post-formats', array('aside', 'excerpt', 'image', 'video', 'quote', 'link', 'gallery'));
    add_theme_support('title-tag');

    // Register menus
    register_nav_menus(array(
        'primary_menu' => __('Primary Menu', 'borhantheme'),
        'footer_menu' => __('Footer Menu', 'borhantheme'),
        'footer_one' => __('Footer One', 'borhantheme'),
        'footer_two' => __('Footer Two', 'borhantheme'),
        'sidebar_menu' => __('Sidebar Menu', 'borhantheme')
    ));
}
add_action('after_setup_theme', 'borhantheme_setup');

/**
 * Enqueue filter scripts
 */
function enqueue_filter_scripts() {
    wp_enqueue_script('jquery');
    wp_enqueue_script('medicine-pagination', get_template_directory_uri() . '/assets/js/medicine-pagination.js', array('jquery'), null, true);
    wp_localize_script('medicine-pagination', 'ajaxpagination', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'siteurl' => site_url()
    ));
}
add_action('wp_enqueue_scripts', 'enqueue_filter_scripts');

/**
 * Allow SVG uploads
 */
function borhantheme_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'borhantheme_mime_types');

/**
 * Modify the document title for the home page
 */
function borhantheme_document_title($title) {
    if (empty($title) && (is_home() || is_front_page())) {
        $title = get_bloginfo('name') . ' | ' . get_bloginfo('description');
    }
    return $title;
}
add_filter('pre_get_document_title', 'borhantheme_document_title');

/**
 * Display post thumbnail caption
 */
function borhantheme_post_thumbnail_caption() {
    if (has_post_thumbnail()) {
        $thumbnail_id = get_post_thumbnail_id();
        $thumbnail_post = get_post($thumbnail_id);
        if ($thumbnail_post && $thumbnail_post->post_excerpt) {
            echo '<div class="front-caption">' . esc_html($thumbnail_post->post_excerpt) . '</div>';
        }
    }
}

/**
 * Customize search query
 */
function custom_search_query($query) {
    if (!is_admin() && $query->is_main_query()) {
        if ($query->is_search) {
            $query->set('post_type', array('doctors', 'hospitals'));
        }
    }
    return $query;
}
add_action('pre_get_posts', 'custom_search_query');

// Include sidebar utilities
require_once 'function-utils/sidebar-utils.php';

// Include author avatar functions
require_once 'function-utils/author-avatar.php';

// Include author social media fields
require_once 'function-utils/author-socialmedia.php';

/**
 * Set posts per page for author and hospital archives
 */
add_action('pre_get_posts', function ($query) {
    if (!is_admin() && $query->is_main_query()) {
        if ($query->is_author() || ($query->is_post_type_archive('hospitals'))) {
            $query->set('posts_per_page', 10);
        }
    }
});

/**
 * Get taxonomy custom icon
 */
function get_texonomy_custom_icon($term_id) {
    $location_information = get_field('taxonomy_fields', 'dosage-forms_' . $term_id);

    if (!$location_information && $term_id !== 0) {
        $parent_term = get_term($term_id, 'dosage-forms');
        if ($parent_term instanceof WP_Term) {
            return get_texonomy_custom_icon($parent_term->parent);
        }
        return null;
    }

    return $location_information;
}

/**
 * Get location image
 */
function get_location_image($term_id) {
    $location_information = get_field('taxonomy_fields', 'hospital-locations_' . $term_id);

    if (!$location_information && $term_id !== 0) {
        $parent_term = get_term($term_id, 'hospital-locations');
        if ($parent_term instanceof WP_Term) {
            return get_location_image($parent_term->parent);
        }
        return null;
    }

    return $location_information;
}

/**
 * Format experience from date
 */
function formatExperienceFromDate($dateString) {
    $experienceDate = DateTime::createFromFormat('d/m/Y', $dateString);
    $currentDate = new DateTime('now');
    $interval = $experienceDate->diff($currentDate);
    
    $years = $interval->y;
    $months = $interval->m;
    $experienceString = '';

    if ($years > 0) {
        $experienceString .= $years . ' Year' . ($years > 1 ? 's' : '') . ' Experience ';
    }
    if ($months > 0 && $years == 0) {
        $experienceString .= $months . ' Month' . ($months > 1 ? 's' : '') . ' Experience ';
    } elseif ($months > 0) {
        $experienceString .= 'and ' . $months . ' Month' . ($months > 1 ? 's' : '') . ' ';
    }

    $experienceString .= 'Overall';

    return $experienceString;
}

/**
 * Display settings taxonomy data
 */
function display_settings_taxonomy_data($term_slug) {
    $data = [];
    $terms = get_terms([
        'taxonomy' => 'settings',
        'hide_empty' => false,
    ]);

    if (!empty($terms) && !is_wp_error($terms)) {
        foreach ($terms as $term) {
            if ($term->slug == $term_slug) {
                $group_values = get_field('taxonomy_fields', 'settings_' . $term->term_id);
                if ($group_values) {
                    $data['excerpt_info'] = isset($group_values['excerpt']) ? $group_values['excerpt'] : '';
                    $data['logo'] = isset($group_values['logo']) ? $group_values['logo'] : '';
                    $data['full_description'] = isset($group_values['full_description']) ? $group_values['full_description'] : '';
                    $data['suggest_articles'] = isset($group_values['suggest_articles']) ? $group_values['suggest_articles'] : '';
                    $data['suggest_doctors'] = isset($group_values['suggest_doctors']) ? $group_values['suggest_doctors'] : '';
                    $data['suggest_hospitals'] = isset($group_values['suggest_hospitals']) ? $group_values['suggest_hospitals'] : '';
                    $data['suggest_specialists'] = isset($group_values['suggest_specialists']) ? $group_values['suggest_specialists'] : '';
                    return $data;
                }
            }
        }
    }
    return false;
}

/**
 * Get taxonomy fields for template
 */
function get_taxonomy_fields_for_template() {
    $taxonomy_fields = get_field('taxonomy_fields');
    return array(
        'excerpt' => isset($taxonomy_fields['excerpt']) ? $taxonomy_fields['excerpt'] : '',
        'image' => isset($taxonomy_fields['logo']) ? $taxonomy_fields['logo'] : '',
        'featured_description' => isset($taxonomy_fields['featured_description']) ? $taxonomy_fields['featured_description'] : '',
        'secondary_excerpt' => isset($taxonomy_fields['secondary_excerpt']) ? $taxonomy_fields['secondary_excerpt'] : '',
        'custom_title' => isset($taxonomy_fields['custom_title']) ? $taxonomy_fields['custom_title'] : '',
        'is_featured' => isset($taxonomy_fields['is_featured']) ? $taxonomy_fields['is_featured'] : '',
        'overview' => isset($taxonomy_fields['overview']) ? $taxonomy_fields['overview'] : '',
    );
}

/**
 * Get taxonomy term details
 */
function get_taxonomy_term_details($term_id, $taxonomy) {
    $term_fields = get_field('taxonomy_fields', $taxonomy . '_' . $term_id);
    $details = [
        'custom_title' => '',
        'excerpt' => '',
        'secondary_excerpt' => '',
        'logo' => '',
        'featured_image' => '',
        'overview' => '',
        'full_description' => '',
        'is_featured' => '',
    ];

    if ($term_fields) {
        $details['logo'] = isset($term_fields['logo']) ? $term_fields['logo'] : '';
        $details['featured_image'] = isset($term_fields['featured_image']) ? $term_fields['featured_image'] : '';
        $details['full_description'] = isset($term_fields['full_description']) ? $term_fields['full_description'] : '';
        $details['custom_title'] = isset($term_fields['custom_title']) ? $term_fields['custom_title'] : '';
        $details['excerpt'] = isset($term_fields['excerpt']) ? $term_fields['excerpt'] : '';
        $details['secondary_excerpt'] = isset($term_fields['secondary_excerpt']) ? $term_fields['secondary_excerpt'] : '';
        $details['overview'] = isset($term_fields['overview']) ? $term_fields['overview'] : '';
        $details['is_featured'] = isset($term_fields['is_featured']) ? $term_fields['is_featured'] : '';
    }

    return $details;
}

/**
 * Get common fields
 */
function get_common_fields() {
    $common_fields = get_field('common_fields');
    return array(
        'excerpt' => isset($common_fields['excerpt']) ? $common_fields['excerpt'] : '',
        'image' => isset($common_fields['logo']) ? $common_fields['logo'] : '',
        'custom_title' => isset($common_fields['custom_title']) ? $common_fields['custom_title'] : '',
        'is_featured' => isset($common_fields['is_featured']) ? $common_fields['is_featured'] : '',
    );
}

/**
 * Get slider fields
 */
function get_slider_fields() {
    $slider_fields = get_field('slider_fields');
    return array(
        'button_label' => isset($slider_fields['button_label']) ? $slider_fields['button_label'] : '',
        'button_url' => isset($slider_fields['button_url']) ? $slider_fields['button_url'] : '',
        'button_class_name' => isset($slider_fields['button_class_name']) ? $slider_fields['button_class_name'] : '',
    );
}

/**
 * Custom breadcrumbs
 */
function my_custom_breadcrumbs($slug, $label) {
    if (empty($slug) || empty($label)) {
        return;
    }

    $home_link = site_url();
    $breadcrumb = '<div class="category-breadcrumb single-item-breadcrumb"><span class="breadcumb"><a class="link" href="' . esc_url($home_link) . '"> Home /</a></span>';
    $breadcrumb .= '<span><a class="link" href="' . esc_url($home_link . '/' . $slug) . '"> ' . esc_html($label) . ' /</a></span>';
    if (!is_front_page() && !is_home()) {
        $breadcrumb .= '<span> ' . get_the_title() . ' </span>';
    }
    $breadcrumb .= '</div>';

    echo $breadcrumb;
}

/**
 * Add menu link class
 */
function add_menu_link_class($atts, $item, $args) {
    if (isset($args->link_class)) {
        $atts['class'] = $args->link_class;
    }
    return $atts;
}
add_filter('nav_menu_link_attributes', 'add_menu_link_class', 1, 3);

/**
 * Add menu link active class
 */
function add_menu_link_active_class($classes, $item, $args) {
    if (isset($args->link_active_class)) {
        if (in_array('current-menu-item', $classes)) {
            $classes[] = $args->link_active_class;
        }
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_menu_link_active_class', 10, 3);

// Include Tailwind Nav Walker
require_once get_template_directory() . '/class-tailwind-nav-walker.php';

/**
 * Add lazy loading to images
 */
function add_lazy_loading_attribute($content) {
    return preg_replace('/<img(.*?)>/', '<img$1 loading="lazy">', $content);
}
add_filter('the_content', 'add_lazy_loading_attribute');

/**
 * Add structured data
 */
function add_structured_data() {
    if (is_singular('product')) {
        global $post;
        $product = wc_get_product($post->ID);
        
        $structured_data = [
            '@context' => 'https://schema.org/',
            '@type' => 'Product',
            'name' => $product->get_name(),
            'description' => $product->get_short_description(),
            'sku' => $product->get_sku(),
            'price' => $product->get_price(),
            'priceCurrency' => get_woocommerce_currency(),
        ];
        
        echo '<script type="application/ld+json">' . json_encode($structured_data) . '</script>';
    }
}
add_action('wp_head', 'add_structured_data');

/**
 * Sanitize user input
 */
function grass_ocean_sanitize_input($input) {
    return sanitize_text_field($input);
}

/**
 * Process form
 */
function grass_ocean_process_form() {
    if (isset($_POST['user_input'])) {
        $safe_input = grass_ocean_sanitize_input($_POST['user_input']);
        // Process $safe_input
        echo esc_html($safe_input);
    }
}
add_action('init', 'grass_ocean_process_form');

// Post count
// Get the taxonomy total post count
if (!function_exists('get_term_post_count')) {
    function get_term_post_count($term_id, $taxonomy) {
        $term = get_term($term_id, $taxonomy);

        if (is_wp_error($term) || is_null($term)) {
            return 0; // Return 0 if the term doesn't exist or there's an error
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

wp_enqueue_script('grass-ocean-app', get_template_directory_uri() . '/assets/js/app.js', array('jquery'), '1.0', true);

// Add this code to remove CPT slug from URLs
function remove_cpt_slug($post_link, $post) {
    if ('services' === $post->post_type || 'products' === $post->post_type || 'projects' === $post->post_type) {
        $post_link = str_replace('/' . $post->post_type . '/', '/', $post_link);
    }
    return $post_link;
}
add_filter('post_type_link', 'remove_cpt_slug', 10, 2);

// Add this code to handle the URL rewrites
function parse_request_custom($query) {
    if (!$query->is_main_query() || 2 != count($query->query) || !isset($query->query['page'])) {
        return;
    }

    if (!empty($query->query['name'])) {
        $query->set('post_type', array('post', 'services', 'products', 'projects', 'page'));
    }
}
add_action('pre_get_posts', 'parse_request_custom');


<?php
/* Template Name: Services Template */

get_header();

$custom_fields = get_common_fields();
$excerpt = isset($custom_fields['excerpt']) ? $custom_fields['excerpt'] : '';
$featured_description = isset($custom_fields['featured_description']) ? $custom_fields['featured_description'] : '';
$custom_title = isset($custom_fields['custom_title']) ? $custom_fields['custom_title'] : '';
?>

<section class="bg-gray-100 py-8 bg-gradient-to-b from-gray-50 to-green-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex mb-4" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="text-gray-700 hover:text-emerald-600">Home</a>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-4 h-4 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        <span class="ml-1 text-gray-500 md:ml-2">Services</span>
                    </div>
                </li>
            </ol>
        </nav>

        <h1 class="text-3xl font-bold mb-4"><?php echo ($custom_title) ? esc_html($custom_title) : esc_html(get_the_title()); ?></h1>

        <?php if (!empty($excerpt)): ?>
            <div class="text-gray-600 mb-4 excerpts"><?php echo wp_kses_post($excerpt); ?></div>
        <?php endif; ?>
    </div>
</section>

<section class="py-16">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="">
            <!-- Services -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-5">
                <?php
                $args = array(
                    'post_type' => 'services',
                    'posts_per_page' => -1,
                    'orderby' => 'date',
                    'order' => 'DESC',
                );
                $services_query = new WP_Query($args);

                if ($services_query->have_posts()) :
                    $category_colors = array(
                        'bg-blue-500 text-white',
                        'bg-green-500 text-white',
                        'bg-yellow-500 text-white',
                        'bg-red-500 text-white',
                        'bg-purple-500 text-white',
                        'bg-pink-500 text-white',
                        'bg-indigo-500 text-white',
                        'bg-teal-500 text-white'
                    );
                    $color_index = 0;

                    while ($services_query->have_posts()) : $services_query->the_post();
                        $service_id = get_the_ID();
                        $categories = get_the_terms($service_id, 'service-categories');
                        $category = $categories ? $categories[0] : null;
                        
                        // Get project details (adjust this function as per ACF/SCF fields)
                        $service_details = get_field('common_fields', $service_id);
                        ?>
                        <div class="group relative overflow-hidden rounded-lg shadow-lg">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('large', array('class' => 'w-full h-90 object-cover transition-transform duration-300 group-hover:scale-110')); ?>
                            <?php endif; ?>
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                            <div class="absolute bottom-0 left-0 right-0 p-6">
                                <!-- <?php if ($category) : 
                                    $category_color = $category_colors[$color_index % count($category_colors)];
                                    $color_index++;
                                ?>
                                    <span class="text-xs font-semibold <?php echo esc_attr($category_color); ?> px-2 py-1 rounded-full mb-2 inline-block"><?php echo esc_html($category->name); ?></span>
                                <?php endif; ?> -->
                                <a href="<?php the_permalink(); ?>" class="text-xl font-bold text-white">
                                    <h3 class="text-xl font-bold text-white"><?php the_title(); ?></h3>
                                </a>
                            </div>
                        </div>
                    <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    echo '<p>No services found.</p>';
                endif;
                ?>
            </div>

            <?php 
            if (have_posts()) : 
                while (have_posts()) : the_post(); 
                    ?>
                    <div class="mt-12 descriptions">
                        <?php the_content(); ?>
                    </div>
                    <?php 
                endwhile; 
            endif; 
            ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>

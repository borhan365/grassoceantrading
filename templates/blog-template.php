<?php
/* Template Name: Blog Template */

get_header();

$taxonomy_data = get_taxonomy_fields_for_template();
$excerpt = isset($taxonomy_data['excerpt']) ? $taxonomy_data['excerpt'] : '';
$featured_description = isset($taxonomy_data['featured_description']) ? $taxonomy_data['featured_description'] : '';
$custom_title = isset($taxonomy_data['custom_title']) ? $taxonomy_data['custom_title'] : '';
?>

<section class="bg-gray-50 py-4 px-4">
    <div class="container mx-auto px-4">
        <nav class="text-sm mb-4" aria-label="Breadcrumb">
            <ol class="list-none p-0 flex items-center gap-2 justify-start">
                <li class="flex items-center gap-2 justify-start">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="text-green-600 hover:text-green-800 font-medium">Home</a>
                    <svg class="w-4 h-4 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </li>
                <li>
                    <span class="text-gray-500" aria-current="page">Blog</span>
                </li>
            </ol>
        </nav>

        <h1 class="text-3xl font-bold mb-4"><?php echo ($custom_title) ? esc_html($custom_title) : esc_html(get_the_title()); ?></h1>
        
        <?php if (!empty($excerpt)): ?>
            <p class="text-gray-600 text-lg mb-6"><?php echo $excerpt; ?></p>
        <?php endif; ?>

        <div class="flex flex-wrap -mx-2 mb-8">
            <?php 
            $tax_args = [
                'taxonomy' => 'category',
                'hide_empty' => false,
                'number' => 10,
            ];

            $all_categories = get_terms($tax_args);

            foreach ($all_categories as $category):
                $is_featured = get_field('taxonomy_fields', $category->taxonomy . '_' . $category->term_id);
                if ($is_featured && isset($is_featured['is_featured']) && $is_featured['is_featured'] === 'yes'):
            ?>
                <div class="px-2 mb-2">
                    <a href="<?php echo esc_url(get_term_link($category)); ?>" class="inline-block bg-green-100 text-green-800 text-sm font-semibold px-3 py-1 rounded-full hover:bg-green-200 transition duration-300">
                        <?php echo esc_html($category->name); ?>
                    </a>
                </div>
            <?php
                endif;
            endforeach;

            if (empty($all_categories) || is_wp_error($all_categories)):
                echo '<p class="text-gray-500">No categories found.</p>';
            endif;
            ?>
        </div>
    </div>
</section>

<section class="py-12">
    <div class="container mx-auto px-4">
        <div class="flex flex-wrap -mx-4">
            <div class="w-full lg:w-2/3 px-4">
                <?php if ($featured_description): ?>
                    <div class="bg-white shadow-md rounded-lg p-6 mb-8">
                        <?php echo $featured_description; ?>
                    </div>
                <?php endif; ?>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <?php
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => 10,
                        'paged' => $paged,
                        'orderby' => 'date',
                        'order' => 'DESC'
                    );
                    $recent_posts = new WP_Query($args);

                    if ($recent_posts->have_posts()):
                        while ($recent_posts->have_posts()):
                            $recent_posts->the_post();
                    ?>
                        <article class="bg-white rounded-lg shadow-md overflow-hidden transition-shadow duration-300 hover:shadow-xl">
                            <?php if (has_post_thumbnail()): ?>
                                <a href="<?php the_permalink(); ?>" class="block">
                                    <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title_attribute(); ?>" class="w-full h-48 object-cover">
                                </a>
                            <?php endif; ?>
                            <div class="p-6">
                                <h2 class="text-xl font-semibold mb-2">
                                    <a href="<?php the_permalink(); ?>" class="text-gray-900 hover:text-green-600"><?php the_title(); ?></a>
                                </h2>
                                <p class="text-gray-600 mb-4"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                                <a href="<?php the_permalink(); ?>" class="inline-flex items-center text-green-600 font-semibold hover:underline">
                                    Read More
                                    <svg class="ml-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                </a>
                            </div>
                        </article>
                    <?php
                        endwhile;
                        wp_reset_postdata();
                    else:
                        echo '<p class="col-span-3 text-center text-gray-600">No blog posts found.</p>';
                    endif;
                    ?>
                </div>

                <div class="mt-8 flex justify-center">
                    <?php
                    $big = 999999999; // need an unlikely integer
                    echo paginate_links(array(
                        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                        'format' => '?paged=%#%',
                        'current' => max(1, get_query_var('paged')),
                        'total' => $recent_posts->max_num_pages,
                        'prev_text' => __('&laquo; Previous'),
                        'next_text' => __('Next &raquo;'),
                        'type' => 'list',
                        'end_size' => 3,
                        'mid_size' => 3
                    ));
                    ?>
                </div>

                <?php if (have_posts()): while (have_posts()): the_post(); ?>
                    <div class="bg-white rounded-lg mt-8 p-6">
                        <?php the_content(); ?>
                    </div>
                <?php endwhile; endif; ?>
            </div>
            <div class="w-full lg:w-1/3 px-4 mt-8 lg:mt-0">
                <?php get_template_part('ads/global-sidebar-ads'); ?>
                <?php get_template_part('doctors/doctor-sidebar-ads'); ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>

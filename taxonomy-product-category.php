<?php
// taxonomy-product-category.php

get_header();
// Get the current taxonomy term
$current_term = get_queried_object();
$details = get_taxonomy_term_details($current_term->term_id, 'product-category');
// Use the function to get total post count for the current term and its descendants
$product_count = get_term_post_count($current_term->term_id, 'product-category');
?>

<section class="bg-gray-100 py-16">
    <div class="container mx-auto px-4">
        <div class="mb-8">
            <nav class="flex mb-4" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="text-gray-700 hover:text-emerald-600">Home</a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                            <a href="<?php echo esc_url(home_url('/product-category')); ?>" class="ml-1 text-gray-700 hover:text-emerald-600 md:ml-2">product-category</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                            <span class="ml-1 text-gray-500 md:ml-2"><?php echo esc_html($current_term->name); ?></span>
                        </div>
                    </li>
                </ol>
            </nav>

            <?php if ($current_term) : ?>
                <h1 class="text-3xl font-bold mb-4">
                    <span class="text-emerald-600"><?php echo esc_html($product_count); ?>+</span> 
                    <span><?php echo ($details['custom_title']) ? esc_html($details['custom_title']) : esc_html(single_term_title('', false)); ?></span> 
                </h1>

                <?php if (!empty($details['excerpt'])) : ?>
                    <div class="text-gray-600 mb-6">
                        <?php echo $details['excerpt']; ?>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
            <!-- show featured menu list -->
            <?php display_featured_menus('product-category', 10, ''); ?>
        </div>
    </div>
</section>

<section class="py-16">
    <div class="container mx-auto px-4">
        <?php if ($current_term) : ?>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <div class="lg:col-span-2">
                    <?php if (!empty($details['featured_description'])) : ?>
                        <div class="mb-8">
                            <?php echo $details['featured_description']; ?>
                        </div>
                    <?php endif; ?>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <?php
                        $args = [
                            'post_type' => 'products',
                            'posts_per_page' => 40,
                            'tax_query' => [
                                [
                                    'taxonomy' => 'product-category',
                                    'field' => 'slug',
                                    'terms' => $current_term->slug,
                                ],
                            ],
                        ];

                        $query = new WP_Query($args);

                        if ($query->have_posts()) : 
                            while ($query->have_posts()) : $query->the_post();
                                get_template_part('components/card/product-list-card');
                            endwhile;
                        else : ?>
                            <p class="text-gray-600">No product found.</p>
                        <?php endif;

                        wp_reset_postdata(); ?>
                    </div>
                    
                    <?php if (!empty($details['overview'])) : ?>
                        <div class="mt-12 bg-gray-100 p-6 rounded-lg">
                            <?php echo $details['overview']; ?>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($details['full_description'])) : ?>
                        <div class="mt-12">
                            <?php echo $details['full_description']; ?>
                        </div>
                    <?php endif; ?>

                </div>
                <div class="lg:col-span-1">
                    <?php get_template_part('ads/global-sidebar-ads'); ?>
                </div>
            </div>
        <?php else : ?>
            <p class="text-gray-600">Nothing found.</p>
        <?php endif; ?>
    </div>
</section>

<?php
get_footer();
?>

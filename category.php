<?php
// category.php

get_header();

// Get the current category term
$current_term = get_queried_object();
$details = get_taxonomy_term_details($current_term->term_id, 'category');
$post_count = get_term_post_count($current_term->term_id, 'category');
?>

<section class="bg-gray-50 py-8">
    <div class="container mx-auto px-4">
        <div class="mb-8">
            <nav class="text-sm mb-4" aria-label="Breadcrumb">
                <ol class="list-none p-0 flex justify-start items-center gap-3">
                    <li class="flex items-center gap-2">
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="text-green-600 hover:text-green-800">Home</a>
                        <svg class="w-4 h-4 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </li>
                    <li class="flex items-center gap-2">
                        <a href="<?php echo esc_url(home_url('/blogs')); ?>" class="text-green-600 hover:text-green-800">Blogs</a>
                        <svg class="w-4 h-4 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </li>
                    <li>
                        <span class="text-gray-500" aria-current="page"><?php echo esc_html($current_term->name); ?></span>
                    </li>
                </ol>
            </nav>

            <?php if ($current_term) : ?>
                <h1 class="text-3xl font-bold mb-4">
                    <span class="text-green-600"><?php echo esc_html($post_count); ?>+</span> 
                    <span><?php echo ($details['custom_title']) ? esc_html($details['custom_title']) : esc_html(single_term_title('', false)); ?></span> 
                </h1>

                <?php if (!empty($details['excerpt'])) : ?>
                    <div class="text-gray-600 text-lg">
                        <?php echo $details['excerpt']; ?>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<section class="py-12">
    <div class="container mx-auto px-4">
        <?php if ($current_term) : ?>
            <div class="flex flex-wrap -mx-4">
                <div class="w-full lg:w-2/3 px-4">
                    <?php if (!empty($details['featured_description'])) : ?>
                        <div class="bg-white shadow-md rounded-lg p-6 mb-8">
                            <?php echo $details['featured_description']; ?>
                        </div>
                    <?php endif; ?>

                    <div class="space-y-8">
                        <?php if (have_posts()) : ?>
                            <?php while (have_posts()) : the_post(); ?>
                                <?php get_template_part('components/card/blog-list-card'); ?>
                            <?php endwhile; ?>

                            <?php if (wp_count_posts()->publish > 10) : ?>
                                <div class="mt-8">
                                    <?php
                                    echo paginate_links(array(
                                        'prev_text' => __('&laquo; Previous'),
                                        'next_text' => __('Next &raquo;'),
                                        'class' => 'inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50'
                                    ));
                                    ?>
                                </div>
                            <?php endif; ?>

                        <?php else : ?>
                            <div class="text-center py-12">
                                <h2 class="text-2xl font-bold mb-4">Sorry! Not Found!</h2>
                                <p class="text-gray-600 mb-8">The page you're looking for isn't here. Please return to the homepage to explore more.</p>
                                <a href="<?php echo site_url() ?>" class="bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-2 px-4 rounded">
                                    Back to home
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>

                    <?php if (!empty($details['overview'])) : ?>
                        <div class="bg-white rounded-lg mt-8 descriptions">
                            <?php echo $details['overview']; ?>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($details['full_description'])) : ?>
                        <div class="bg-white rounded-lg mt-8 descriptions">
                            <?php echo $details['full_description']; ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="w-full lg:w-1/3 px-4 mt-8 lg:mt-0">
                    <?php get_template_part('ads/global-sidebar-ads'); ?>
                </div>
            </div>
        <?php else : ?>
            <p class="text-center text-gray-600">No location found.</p>
        <?php endif; ?>
    </div>
</section>

<?php
get_footer();
?>

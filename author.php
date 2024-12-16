<?php get_header(); ?>

<section class="bg-gray-50 py-8">
    <div class="container mx-auto px-4">
        <div class="mb-8">
            <nav class="text-sm mb-4" aria-label="Breadcrumb">
                <ol class="list-none p-0 flex justify-start items-center gap-3">
                    <li class="flex items-center gap-2">
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="text-green-600 hover:text-green-800">Home</a>
                        <svg class="w-4 h-4 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </li>
                    <!-- <li class="flex items-center gap-2">
                        <a href="<?php echo esc_url(home_url('/blogs')); ?>" class="text-green-600 hover:text-green-800">Blogs</a>
                        <svg class="w-4 h-4 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </li> -->
                    <li>
                        <span class="text-gray-500" aria-current="page"><?php echo get_the_author_meta('display_name', get_queried_object()->ID); ?></span>
                    </li>
                </ol>
            </nav>

            <?php $queried_author = get_queried_object(); ?>
            <div class="bg-white rounded-lg shadow-sm p-6">
                <div class="flex flex-col md:flex-row items-start gap-6">
                    <div class="author-avatar flex-shrink-0">
                        <?php echo get_avatar($queried_author->ID, 120, '', '', array('class' => 'rounded-lg')); ?>
                    </div>
                    <div class="flex-grow">
                        <h1 class="text-3xl font-bold mb-2"><?php echo get_the_author_meta('display_name', $queried_author->ID); ?></h1>
                        <p class="text-gray-600 text-lg mb-4"><?php echo get_the_author_meta('description', $queried_author->ID); ?></p>
                        
                        <div class="flex gap-4">
                            <?php
                            $social_media_fields = [
                                'website'  => ['fas fa-globe', 'Website'],
                                'facebook' => ['fab fa-facebook-f', 'Facebook'],
                                'twitter'  => ['fab fa-twitter', 'Twitter'],
                                'linkedin' => ['fab fa-linkedin-in', 'LinkedIn'],
                                'youtube'  => ['fab fa-youtube', 'YouTube'],
                            ];
                            foreach ($social_media_fields as $field => $data) {
                                $social_link = get_the_author_meta($field, $queried_author->ID);
                                if ($social_link) {
                                    echo "<a href='" . esc_url($social_link) . "' target='_blank' rel='noopener noreferrer' class='text-gray-600 hover:text-green-600 transition-colors' title='" . $data[1] . "'><i class='" . $data[0] . "'></i></a>";
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-12">
    <div class="container mx-auto px-4">
        <div class="flex flex-wrap -mx-4">
            <div class="w-full lg:w-2/3 px-4">
                <div class="space-y-8">
                    <?php 
                    $author_posts = new WP_Query(array(
                        'author' => $queried_author->ID,
                        'post_type' => 'post',
                        'post_status' => 'publish',
                        'posts_per_page' => get_option('posts_per_page'),
                        'paged' => get_query_var('paged') ? get_query_var('paged') : 1
                    ));

                    if ($author_posts->have_posts()) : 
                        while ($author_posts->have_posts()) : $author_posts->the_post(); 
                            get_template_part('components/card/blog-list-card');
                        endwhile;
                        wp_reset_postdata();

                        if ($author_posts->max_num_pages > 1) : ?>
                            <div class="mt-8">
                                <?php
                                echo paginate_links(array(
                                    'base' => get_pagenum_link(1) . '%_%',
                                    'format' => '/page/%#%',
                                    'current' => max(1, get_query_var('paged')),
                                    'total' => $author_posts->max_num_pages,
                                    'prev_text' => __('&laquo; Previous'),
                                    'next_text' => __('Next &raquo;'),
                                    'class' => 'inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50'
                                ));
                                ?>
                            </div>
                        <?php endif;

                    else : ?>
                        <div class="text-center py-12">
                            <h2 class="text-2xl font-bold mb-4">No posts found by this author</h2>
                            <p class="text-gray-600 mb-8">The author hasn't published any posts yet.</p>
                            <a href="<?php echo site_url() ?>" class="inline-flex items-center px-6 py-3 border border-transparent text-lg font-medium rounded-full text-white bg-green-700 hover:bg-green-800 transition-bg duration-300 shadow hover:shadow-lg">
                                Back to home
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="w-full lg:w-1/3 px-4 mt-8 lg:mt-0">
                <?php get_template_part('ads/global-sidebar-ads'); ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>

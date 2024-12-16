<?php get_header(); ?>

<main class="bg-white">
    <section class="py-10 sm:py-8 md:py-6 lg:py-10 xl:py-10">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-[6fr_3fr] gap-10">
                <div class="">

                    <!-- Categories -->
                    <?php
                    $categories = get_the_category();
                    if (!empty($categories)) {
                        echo '<div class="mb-4">';
                        for ($i = 0; $i < 2 && $i < count($categories); $i++) {
                            $category = $categories[$i];
                            echo '<a href="' . esc_url(get_category_link($category->term_id)) . '" class="inline-block bg-emerald-100 text-emerald-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded">' . esc_html($category->name) . '</a>';
                        }
                        echo '</div>';
                    }
                    ?>

                    <!-- Breadcrumb -->
                    <nav class="flex mb-4" aria-label="Breadcrumb">
                        <ol class="inline-flex items-center space-x-1 md:space-x-3">
                            <li class="inline-flex items-center">
                                <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-emerald-600">
                                    <?php esc_html_e('Home', 'grassocean'); ?>
                                </a>
                            </li>
                            <li>
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                    <a href="<?php echo esc_url(home_url('/' . (get_post_type() === 'post' ? 'blogs' : get_post_type()))); ?>" class="ml-1 text-sm font-medium text-gray-700 hover:text-emerald-600 md:ml-2">
                                        <?php 
                                        $post_type = get_post_type();
                                        if ($post_type === 'post') {
                                            esc_html_e('Blogs', 'grassocean');
                                        } elseif ($post_type === 'services') {
                                            esc_html_e('Services', 'grassocean');
                                        } elseif ($post_type === 'projects') {
                                            esc_html_e('Projects', 'grassocean');
                                        } else {
                                            echo esc_html(ucfirst($post_type));
                                        }
                                        ?>
                                    </a>
                                </div>
                            </li>
                            <li aria-current="page">
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                    <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2"><?php the_title(); ?></span>
                                </div>
                            </li>
                        </ol>
                    </nav>

                    <h1 class="mb-4 text-4xl font-extrabold text-gray-900 sm:text-5xl sm:tracking-tight lg:text-5xl"><?php the_title(); ?></h1>

                    <div class="flex items-center mb-4">
                        <?php
                        $author_id = get_the_author_meta('ID');
                        if ($author_id) {
                            $author = get_userdata($author_id);
                        ?>
                            <div class="hidden md:flex items-center mr-4">
                                <?php echo get_avatar($author_id, 40, '', '', array('class' => 'rounded-full mr-2')); ?>
                                <div>
                                    <p class="text-sm text-gray-600"><?php esc_html_e('Written by', 'grassocean'); ?></p>
                                    <a href="<?php echo esc_url(get_author_posts_url($author_id)); ?>" class="text-sm font-medium text-emerald-600 hover:underline">
                                        <?php echo esc_html($author->display_name); ?>
                                    </a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>

                    <?php if (has_post_thumbnail()): ?>
                        <div class="mb-6">
                            <?php the_post_thumbnail('large', array('class' => 'w-full max-h-[450px] rounded-lg object-cover')); ?>
                            <?php if (get_the_post_thumbnail_caption()): ?>
                                <p class="text-sm text-gray-600 mt-2"><?php the_post_thumbnail_caption(); ?></p>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <div class="text-sm text-gray-600">
                        <svg class="w-4 h-4 inline-block mr-1" stroke="currentColor" fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <?php esc_html_e('Updated on:', 'grassocean'); ?> <?php echo get_the_modified_time("l, F j, Y"); ?>
                    </div>

                    <?php dynamic_sidebar('single-article-ads-top'); ?>

                    <div class="prose max-w-none mb-8 descriptions">
                        <?php the_content(); ?>
                    </div>

                    <?php dynamic_sidebar('single-article-ads-bottom'); ?>

                </div>

                <div class="hidden sm:block">
                    <?php if (is_active_sidebar('global-sidebar-ads')) : ?>
                        <div class="mb-8">
                            <a href="<?php echo esc_url(home_url('/')); ?>">
                                <?php dynamic_sidebar('global-sidebar-ads'); ?>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <?php
        $post_type = get_post_type();

        if ($post_type === 'post') {
            include get_template_directory() . '/sections/related-post-section.php';
        } elseif ($post_type === 'services') {
            include get_template_directory() . '/sections/service-related-post-section.php';
        } elseif ($post_type === 'projects') {
            include get_template_directory() . '/sections/project-related-post-section.php';

        } elseif ($post_type === 'products') {
            include get_template_directory() . '/sections/product-related-post-section.php';
        }
    ?>
</main>

<?php get_footer(); ?>

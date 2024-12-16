<?php
$post_id = get_the_ID();
$categories = get_the_category();
$author_id = get_the_author_meta('ID');
$author_name = get_the_author();
$author_avatar = get_avatar_url($author_id, ['size' => 96]);
$post_date = get_the_date('M j, Y');
?>

<article class="bg-gray-50 rounded-lg shadow overflow-hidden transition-shadow duration-300 hover:shadow-xl mb-8">
    <div class="md:flex">
        <div class="md:flex-shrink-0">
            <?php if (has_post_thumbnail()) : ?>
                <a href="<?php the_permalink(); ?>" class="block">
                    <img class="h-52 w-64 object-cover md:w-64" src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title_attribute(); ?>">
                </a>
            <?php endif; ?>
        </div>
        <div class="p-6">
            <div class="flex items-center mb-2">
                <?php if (!empty($categories)) : ?>
                    <a href="<?php echo esc_url(get_category_link($categories[0]->term_id)); ?>" class="inline-block bg-emerald-100 text-emerald-800 text-xs font-semibold px-2.5 py-0.5 rounded">
                        <?php echo esc_html($categories[0]->name); ?>
                    </a>
                <?php endif; ?>
                <!-- <span class="text-gray-500 text-sm ml-2"><?php echo $post_date; ?> • <?php echo $read_time; ?> min read</span> -->
            </div>
            <a href="<?php the_permalink(); ?>" class="block mt-2">
                <h3 class="text-xl font-semibold text-gray-900 hover:text-emerald-600 transition-colors duration-300">
                    <?php the_title(); ?>
                </h3>
            </a>
            <p class="mt-3 text-gray-600">
                <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
            </p>
            <div class="mt-4">
                <a href="<?php the_permalink(); ?>" class="inline-flex items-center text-emerald-600 font-semibold hover:underline">
                    Read More
                    <svg class="ml-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</article>


<?php get_header(); ?>

<main class="py-8">
    <section class="mb-20">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row">
                <div class="w-full md:w-2/3 md:pr-8">
                    <?php if ( have_posts() ) : ?>
                        <div class="mb-8 flex items-center">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/search.svg" alt="" class="w-6 h-6 mr-2">
                            <h1 class="text-2xl font-bold">You searched for: <span class="text-blue-600"><?php echo get_search_query(); ?></span></h1>
                        </div>

                        <div class="grid gap-8 md:grid-cols-2">
                            <?php while ( have_posts() ) : the_post(); ?>
                                <article class="bg-white shadow-md rounded-lg overflow-hidden">
                                    <a href="<?php the_permalink() ?>" class="block">
                                        <?php if ( has_post_thumbnail() ) : ?>
                                            <?php the_post_thumbnail('medium', ['class' => 'w-full h-48 object-cover']); ?>
                                        <?php endif; ?>
                                    </a>
                                    <div class="p-4">
                                        <h2 class="text-xl font-semibold mb-2">
                                            <a href="<?php the_permalink() ?>" class="text-gray-900 hover:text-blue-600"><?php the_title() ?></a>
                                        </h2>
                                        <p class="text-gray-600">
                                            <?php echo wp_trim_words( get_the_excerpt(), 20, '...' ); ?>
                                        </p>
                                        <a href="<?php the_permalink() ?>" class="inline-block mt-4 text-blue-600 hover:text-blue-800">Read more</a>
                                    </div>
                                </article>
                            <?php endwhile; ?>
                        </div>

                    <?php else : ?>
                        <div class="mb-8 flex items-center">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/search.svg" alt="" class="w-6 h-6 mr-2">
                            <h1 class="text-2xl font-bold">You searched for: <span class="text-blue-600"><?php echo get_search_query(); ?></span></h1>
                        </div>
                        <div class="text-center py-16">
                            <h1 class="text-4xl font-bold mb-4">Sorry! Nothing found!</h1>
                            <p class="text-xl mb-8">Please try a different search term</p>
                            <a href="<?php echo site_url() ?>" class="bg-blue-600 text-white py-2 px-6 rounded-lg hover:bg-blue-700 transition duration-300">
                                Go Back Home
                            </a>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="w-full md:w-1/3 mt-8 md:mt-0">
                    <?php get_sidebar() ?>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
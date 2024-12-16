<?php get_header(); ?>

<main class="bg-white">
    <section class="py-16">
        <div class="container mx-auto px-4 max-w-6xl">
            <h1 class="text-4xl font-bold mb-8 text-center text-gray-800"><?php the_title(); ?></h1>

            <?php if(has_post_thumbnail()): ?>
                <div class="mb-10">
                    <?php the_post_thumbnail('large', array('class' => 'w-full h-auto rounded-lg shadow-lg')); ?>
                    <?php if(get_the_post_thumbnail_caption()): ?>
                        <p class="text-sm text-gray-600 mt-2 text-center italic"><?php the_post_thumbnail_caption(); ?></p>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <div class="prose max-w-none mb-12 bg-white descriptions">
                <?php the_content(); ?>
            </div>

            <?php
            if (comments_open() || get_comments_number()) :
                comments_template();
            endif;
            ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>
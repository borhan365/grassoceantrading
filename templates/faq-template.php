<?php
/* Template Name: FAQ Template */
?>

<?php get_header(); ?>

<?php
// Fetch taxonomy fields
$taxonomy_data = get_taxonomy_fields_for_template();
$excerpt = $taxonomy_data['excerpt'];
$custom_title = $taxonomy_data['custom_title'];

// Get the count of 'faqs' posts
$post_counts = wp_count_posts('faqs');
$total_posts_count = isset($post_counts->publish) ? $post_counts->publish : 0;
?>

<main>
    <section class="py-20 bg-gradient-to-b from-blue-50 to-green-50">
        <div class="container mx-auto px-4 md:px-6 max-w-6xl">
            <div class="flex flex-col items-center justify-center space-y-4 text-center">
                <h2 class="text-4xl font-bold tracking-tighter sm:text-5xl text-gray-800">
                    <?php echo $custom_title ? esc_html($custom_title) : 'Frequently Asked Questions'; ?>
                </h2>
                <?php if ($excerpt) : ?>
                    <div class="max-w-[800px] text-gray-600 !text-lg">
                        <?php echo $excerpt; ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Display FAQs -->
            <div class="mx-auto mt-12">

                <!-- Loop through FAQ categories -->
                <?php
                $terms = get_terms(array(
                    'taxonomy'   => 'faq-categories',
                    'hide_empty' => true,
                ));

                if (!empty($terms) && !is_wp_error($terms)) :
                    foreach ($terms as $term) :
                        ?>
                        <div class="taxonomy-group faq-taxonomy-group mb-8">
                            <h3 class="text-2xl font-bold mb-4 text-gray-800"><?php echo esc_html($term->name); ?> FAQs</h3>
                            <?php
                            $args = array(
                                'post_type'      => 'faqs',
                                'tax_query'      => array(
                                    array(
                                        'taxonomy' => 'faq-categories',
                                        'field'    => 'term_id',
                                        'terms'    => $term->term_id,
                                    ),
                                ),
                            );
                            $query = new WP_Query($args);

                            if ($query->have_posts()) :
                                while ($query->have_posts()) : $query->the_post();
                                    ?>
                                    <div class="faq-item group border-b border-gray-200 bg-white rounded-lg shadow-sm mb-4">
                                        <div class="faq-question flex justify-between items-center cursor-pointer p-5">
                                            <span class="text-xl font-medium text-gray-900"><?php the_title(); ?></span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="faq-chevron w-5 h-5 text-gray-500 transition-transform duration-300">
                                                <polyline points="6 9 12 15 18 9"></polyline>
                                            </svg>
                                        </div>
                                        <div class="faq-answer overflow-hidden transition-all duration-300 max-h-0">
                                            <div class="px-5 pb-5 text-gray-600 text-lg"><?php the_content(); ?></div>
                                        </div>
                                    </div>
                                <?php
                                endwhile;
                            else :
                                echo '<p class="text-gray-600">No FAQs found for ' . esc_html($term->name) . '.</p>';
                            endif;
                            wp_reset_postdata();
                            ?>
                        </div>
                        <?php
                    endforeach;
                else :
                    echo '<p class="text-gray-600">No FAQ categories found.</p>';
                endif;
                ?>

                <!-- Additional content -->
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <div class="mt-8 descriptions">
                        <?php the_content(); ?>
                    </div>
                <?php endwhile; endif; ?>
            </div>
        </div>
    </section>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const faqItems = document.querySelectorAll('.faq-item');
    
    faqItems.forEach(item => {
        const question = item.querySelector('.faq-question');
        const answer = item.querySelector('.faq-answer');
        const chevron = item.querySelector('.faq-chevron');
        
        question.addEventListener('click', () => {
            const isOpen = answer.style.maxHeight;
            
            // Close all other FAQs
            faqItems.forEach(otherItem => {
                if (otherItem !== item) {
                    const otherAnswer = otherItem.querySelector('.faq-answer');
                    const otherChevron = otherItem.querySelector('.faq-chevron');
                    otherAnswer.style.maxHeight = null;
                    otherChevron.style.transform = 'rotate(0deg)';
                }
            });
            
            // Toggle current FAQ
            if (isOpen) {
                answer.style.maxHeight = null;
                chevron.style.transform = 'rotate(0deg)';
            } else {
                answer.style.maxHeight = answer.scrollHeight + "px";
                chevron.style.transform = 'rotate(180deg)';
            }
        });
    });
});
</script>

<?php get_footer(); ?>

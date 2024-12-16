<?php
// taxonomy-port.php

get_header();
// Get the current taxonomy term
$current_term = get_queried_object();
$term_id = $current_term->term_id;
$taxonomy = $current_term->taxonomy;
$details = get_field('taxonomy_fields', $taxonomy . '_' . $term_id);
// Use the function to get total post count for the current term and its descendants
$product_count = get_term_post_count($current_term->term_id, 'services');
?>

<section class="bg-gray-50 py-8">
    <div class="container mx-auto px-4">
        <div class="mb-8">
            <nav class="flex mb-4" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="text-gray-700 hover:text-emerald-600">Home</a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-4 h-4 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            <a href="<?php echo esc_url(home_url('/services')); ?>" class="ml-1 text-gray-700 hover:text-emerald-600 md:ml-2">Services</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-4 h-4 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            <span class="ml-1 text-gray-500 md:ml-2"><?php echo esc_html($current_term->name); ?></span>
                        </div>
                    </li>
                </ol>
            </nav>

            <?php if ($current_term) : ?>
                <h1 class="text-3xl font-bold mb-4">
                    <span><?php echo (!empty($details['custom_title'])) ? esc_html($details['custom_title']) : esc_html(single_term_title('', false)); ?></span> 
                </h1>

                <?php if (!empty($details['excerpt'])) : ?>
                    <div class="text-gray-600 mb-6 text-lg">
                        <?php echo $details['excerpt']; ?>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<section class="py-4 pt-0">
    <div class="container mx-auto px-4">
        <?php if ($current_term) : ?>
            <div class="grid grid-cols-[5fr_2fr] gap-8">
                <div class="">
                    <?php if (!empty($details['overview'])) : ?>
                        <div class="descriptions">
                            <?php echo $details['overview']; ?>
                        </div>
                    <?php endif; ?>

                    <div class="relative mb-8">
                        <!-- featured image -->
                        <?php if (!empty($details['featured_image']['url'])) : ?>
                            <div class="relative">
                                <img src="<?php echo esc_url($details['featured_image']['url']); ?>" alt="<?php echo esc_attr($current_term->name); ?>" class="w-full h-[500px] object-cover rounded-lg cursor-pointer" onclick="openFullscreen(this)">
                            </div>
                        <?php endif; ?>

                        <!-- logo -->
                        <?php if (!empty($details['logo']['url'])) : ?>
                            <div class="absolute -bottom-5 -right-5">
                                <img src="<?php echo esc_url($details['logo']['url']); ?>" alt="<?php echo esc_attr($current_term->name); ?> Logo" class="w-[150px] h-[150px] object-cover rounded-lg shadow-lg cursor-pointer" onclick="openFullscreen(this)">
                            </div>
                        <?php endif; ?>
                    </div>

                    
                    <?php if (!empty($details['overview'])) : ?>
                        <div class="bg-gray-100 p-6 rounded-lg descriptions">
                            <?php echo $details['overview']; ?>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($details['full_description'])) : ?>
                        <div class="descriptions">
                            <?php echo $details['full_description']; ?>
                        </div>
                    <?php endif; ?>

                </div>
                <div class="">
                    <?php get_template_part('ads/global-sidebar-ads'); ?>
                </div>
            </div>
        <?php else : ?>
            <p class="text-gray-600">Nothing found.</p>
        <?php endif; ?>
    </div>
</section>

<!-- Fullscreen image overlay -->
<div id="fullscreen-overlay" class="fixed inset-0 bg-black bg-opacity-75 hidden z-50 flex items-center justify-center">
    <div class="relative">
        <img id="fullscreen-image" src="" alt="Fullscreen Image" class="max-w-full max-h-full rounded-lg">
        <button onclick="closeFullscreen()" class="absolute top-4 right-4 text-white text-3xl">&times;</button>
    </div>
</div>

<?php
$current_term_id = $current_term->term_id;
$related_services = get_terms([
    'taxonomy' => 'services',
    'hide_empty' => false,
    'exclude' => $current_term_id,
    'number' => 6,
]);

if (!empty($related_services) && !is_wp_error($related_services)) : 
?>
<!-- related services -->
<section>
    <div class="container mx-auto px-4 mb-12">
        <h2 class="text-2xl font-bold mb-4">Related Others Services</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6">
            <?php
            foreach ($related_services as $service) :
                $term_fields = get_field('taxonomy_fields', 'services_' . $service->term_id);
                $logo = isset($term_fields['logo']) ? $term_fields['logo'] : '';
                $secondary_excerpt = isset($term_fields['secondary_excerpt']) ? $term_fields['secondary_excerpt'] : '';
                $featured_image = isset($term_fields['featured_image']) ? $term_fields['featured_image'] : '';
                ?>
                <?php get_template_part('components/card/default-card', null, array(
                    'service' => $service,
                    'secondary_excerpt' => $secondary_excerpt,
                    'logo' => $logo,
                    'featured_image' => $featured_image
                )); ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<script>
function openFullscreen(img) {
    document.getElementById('fullscreen-image').src = img.src;
    document.getElementById('fullscreen-overlay').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function closeFullscreen() {
    document.getElementById('fullscreen-overlay').classList.add('hidden');
    document.body.style.overflow = 'auto';
}
</script>

<?php
get_footer();
?>

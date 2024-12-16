<?php
$service = $args['service'];
$featured_image = $args['featured_image'];
$logo = $args['logo'];
$secondary_excerpt = $args['secondary_excerpt'];
?>

<div class="bg-white rounded-lg shadow-lg overflow-hidden transition-transform duration-300 hover:shadow-xl group">
    <div class="relative w-full h-52">
        <?php if ($featured_image) : ?>
            <img src="<?php echo esc_url($featured_image['url']); ?>" alt="<?php echo esc_attr($service->name); ?>" class="w-full h-full object-cover relative group-hover:opacity-0 transition-opacity duration-300">
        <?php endif; ?>
        <?php if ($logo) : ?>
            <img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($service->name); ?> Logo" class="w-full h-full object-cover absolute top-0 left-0 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
        <?php endif; ?>
    </div>
    <!-- content -->
    <div class="p-6">
        <a href="<?php echo esc_url(get_term_link($service)); ?>">
            <h3 class="text-xl font-semibold text-gray-900 mb-2 hover:text-green-600 transition-colors duration-300"><?php echo esc_html($service->name); ?></h3>
        </a>
        <?php if ($secondary_excerpt) : ?>
            <p class="text-gray-600 mb-4"><?php echo wp_trim_words($secondary_excerpt, 20); ?></p>
        <?php endif; ?>
        <a href="<?php echo esc_url(get_term_link($service)); ?>" class="text-green-600 font-medium hover:text-green-800 transition-colors duration-300">Learn More → </a>
    </div>
</div>

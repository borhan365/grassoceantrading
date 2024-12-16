<?php
// Debug output
?>
<main>
    <section class="relative h-[600px] overflow-hidden">
        <div class="absolute inset-0 w-full h-full">
            <div class="slick-slider w-full h-full">
                <?php
                $args = array(
                    'post_type' => 'sliders',
                    'posts_per_page' => -1,
                    'orderby' => 'date',
                    'order' => 'DESC',
                );
                $sliders_query = new WP_Query($args);

                if ($sliders_query->have_posts()) :
                    while ($sliders_query->have_posts()) : $sliders_query->the_post();
                        $slider_image = get_the_post_thumbnail_url(get_the_ID(), 'full');
                        $slider_title = get_the_title();
                        
                        // Get custom fields using get_slider_fields() function
                        $slider_fields = get_slider_fields();
                        $button_label = $slider_fields['button_label'] ?? '';
                        $button_url = $slider_fields['button_url'] ?? '';
                        $button_class_name = $slider_fields['button_class_name'] ?? '';
                ?>
                    <div class="slide h-[400px] md:h-[600px] bg-cover bg-center" style="background-image: url('<?php echo esc_url($slider_image); ?>');">
                        <div class="slide-content bg-black bg-opacity-50 p-8 rounded-lg">
                            <h2 class="text-4xl md:text-5xl font-bold mb-4"><?php echo esc_html($slider_title); ?></h2>
                            <div class="text-1xl md:text-2xl"><?php echo the_content(); ?></div>
                            <?php if ($button_label && $button_url) : ?>
                                <a href="<?php echo esc_url($button_url); ?>" class="mt-6 inline-block bg-green-700 hover:bg-green-800 <?php echo esc_attr($button_class_name); ?> text-white font-bold py-4 px-8 rounded-full transition duration-300"><?php echo esc_html($button_label); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    echo '<p>No sliders found.</p>';
                endif;
                ?>
            </div>
        </div>
    </section>
</main>

<script>
jQuery(document).ready(function($) {
    $('.slick-slider').slick({
        dots: true,
        infinite: true,
        speed: 800,
        fade: true,
        cssEase: 'linear',
        autoplay: true,
        autoplaySpeed: 5000,
        arrows: true,
        prevArrow: '<button type="button" class="slick-prev"></button>',
        nextArrow: '<button type="button" class="slick-next"></button>'
    });
});
</script>

<style>
.slick-slider {
    position: relative;
    height: 600px;
}

.slick-slide {
    height: 600px;
    position: relative;
}

.slide-content {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: left;
    color: white;
    z-index: 2;
    width: 90%;
    max-width: 90%;
    padding: 1rem;
}

@media (min-width: 640px) {
    .slide-content {
        left: 40%;
        width: 80%;
        max-width: 80%;
        padding: 1.5rem;
    }
}

@media (min-width: 768px) {
    .slide-content {
        left: 40%;
        width: 60%;
        max-width: 60%;
        padding: 2rem;
    }
}

@media (min-width: 1024px) {
    .slide-content {
        left: 30%;
        width: 50%;
        max-width: 50%;
    }
}

.slick-prev,
.slick-next {
    position: absolute;
    z-index: 1;
    background-color: rgba(255, 255, 255, 0.2);
    border: none;
    border-radius: 50%;
    width: 50px;
    height: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: background-color 0.3s ease;
    font-size: 24px;
    color: white;
}

.slick-prev:hover,
.slick-next:hover {
    background-color: rgba(255, 255, 255, 0.4);
}

.slick-prev {
    left: 20px;
}

.slick-next {
    right: 20px;
}

.slick-prev::before,
.slick-next::before {
    font-family: 'Font Awesome 5 Free';
    font-weight: 900;
    font-size: 24px;
}

.slick-prev::before {
    content: '\f104';
}

.slick-next::before {
    content: '\f105';
}

.slick-dots {
    position: absolute !important;
    bottom: 35px;
    left: 50%;
    transform: translateX(-50%);
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    justify-content: center;
    align-items: center;
}

.slick-dots li {
    margin: 0 8px;
}

.slick-dots li button {
    font-size: 0;
    line-height: 0;
    display: block;
    width: 22px;
    height: 22px;
    padding: 0;
    cursor: pointer;
    color: transparent;
    border: 3px solid white;
    outline: none;
    background: transparent;
    border-radius: 50%;
    transition: all 0.3s ease;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
}

.slick-dots li.slick-active {
    
}

.slick-dots li.slick-active button {
    background: green;
    transform: scale(1.2);
}
.slick-dots li button:before {
    content: '' !important;
}

.slick-dots li button:hover {
    background: rgba(255, 255, 255, 0.5);
}
</style>

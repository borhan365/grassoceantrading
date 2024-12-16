<!-- Footer.php Section -->
<footer class="bg-gray-100">
    <!-- footer contact section -->
    <?php get_template_part('sections/call-to-action-section', 'sections'); ?>

    <!-- footer widgets section -->
    <?php
    // Check if any sidebar is active
    $sidebar_exists = false;
    for ($i = 1; $i <= 8; $i++) {
        if (is_active_sidebar('footer-' . $i)) {
            $sidebar_exists = true;
            break;
        }
    }
    ?>

    <?php if ($sidebar_exists): ?>
    <section class="py-8 border-b border-gray-200">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <?php
                // Loop through each footer column
                for ($i = 1; $i <= 8; $i++) {
                    if (is_active_sidebar('footer-' . $i)) {
                        echo '<div class="footer-widget">';
                        dynamic_sidebar('footer-' . $i);
                        echo '</div>';
                    }
                }
                ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <section class="py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 lg:grid-cols-4 gap-8">
                <div class="footer-info">
                    <?php if (is_active_sidebar('footer-logo')): ?>
                        <?php dynamic_sidebar('footer-logo'); ?>
                    <?php endif; ?>

                    <div class="mt-4">
                        <?php
                        if (is_active_sidebar('footer-bio')) {
                            dynamic_sidebar('footer-bio');
                        } else {
                            echo 'Bio not found!';
                        }
                        ?>
                    </div>

                    <ul class="flex gap-3 mt-6">
                        <li><a href="https://facebook.com/grassoceantrading/" class="text-blue-600 hover:text-blue-800"><i class="fab fa-facebook-f size-5"></i></a></li>
                        <li><a href="https://twitter.com/grassoceantrading/" class="text-blue-400 hover:text-blue-600"><i class="fab fa-twitter size-5"></i></a></li>
                        <li><a href="https://www.instagram.com/grassoceantrading/" class="text-pink-600 hover:text-pink-800"><i class="fab fa-instagram size-5"></i></a></li>
                        <li><a href="https://www.pinterest.com/grassoceantrading/" class="text-red-600 hover:text-red-800"><i class="fab fa-pinterest-p size-5"></i></a></li>
                        <li><a href="https://www.youtube.com/grassoceantrading/" class="text-red-600 hover:text-red-800"><i class="fab fa-youtube size-5"></i></a></li>
                        <li><a href="https://www.linkedin.com/company/grassoceantrading/" class="text-blue-800 hover:text-blue-900"><i class="fab fa-linkedin-in size-5"></i></a></li>
                    </ul>
                </div>

                <?php
                // Loop through each footer bottom column
                for ($i = 1; $i <= 3; $i++) {
                    if (is_active_sidebar('footer-bottom' . $i)) {
                        echo '<div class="footer-menu-widget">';
                        dynamic_sidebar('footer-bottom' . $i);
                        echo '</div>';
                    }
                }
                ?>
            </div>
        </div>
    </section>

    <section class="py-4 bg-gray-200">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="text-sm text-gray-600">
                    &copy; <?php echo date('Y'); ?> All Rights Reserved.
                </div>
                <div class="text-sm text-gray-600 mt-2 md:mt-0">
                    Website crafted by <a href="<?php echo site_url(); ?>" class="text-green-700 hover:text-green-800">💚 Spark Technify</a>
                </div>
            </div>
        </div>
    </section>
</footer>

<?php wp_footer(); ?>
</body>
</html>

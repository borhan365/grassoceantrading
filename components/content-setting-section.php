<section class="taxonomy-description-section">
    <div class="container">
        <?php 
        // Full Description
        if (!empty($details['full_description'])) {
            echo '<div class="single-content-area">';
            echo $details['full_description'];
            echo '</div>';
        }

        // Articles
        if (!empty($details['suggest_articles'])) {
            echo '<div class="single-content-area">';
            echo $details['suggest_articles'];
            echo '</div>';
        }

        // Hospitals
        if (!empty($details['suggest_hospitals'])) {
            echo '<div class="single-content-area">';
            echo $details['suggest_hospitals'];
            echo '</div>';
        }

        // Doctors
        if (!empty($details['suggest_doctors'])) {
            echo '<div class="single-content-area">';
            echo $details['suggest_doctors'];
            echo '</div>';
        }

        // Specialists
        if (!empty($details['suggest_specialists'])) {
            echo '<div class="single-content-area">';
            echo $details['suggest_specialists'];
            echo '</div>';
        }
        ?>
    </div>
</section>
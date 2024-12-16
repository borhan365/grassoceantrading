<?php
/* Template Name: About Us Template */
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
        <section class="py-16 px-4 bg-gray-50">
          <div class="container mx-auto">
              <div class="flex flex-col lg:flex-row items-center justify-between">
              <div class="lg:w-1/2 mb-8 lg:mb-0">
                  <h5 class="text-green-700 font-medium mb-2">ABOUT US</h5>
                  <h2 class="mb-4 text-3xl font-extrabold text-gray-900 sm:text-4xl lg:text-5xl !leading-tight">
                      Helping businesses succeed through the power of video.
                  </h2>
                  <p class="text-gray-600 mb-8 max-w-xl text-lg">
                  Flooring is the foundation of any space in this design-focused world. Grass Ocean Trading uses quality flooring to change the way companies and individuals connect with their environments. We help organizations of all sizes humanize their spaces and personalize their customer experiences.
                  </p>
                  <a href="<?php echo site_url('/contact-us'); ?>" class="inline-flex items-center px-6 py-3 border border-transparent text-lg font-medium rounded-full text-white bg-green-700 hover:bg-green-800 transition-bg duration-300 shadow hover:shadow-lg">
                  Get Free Consultation
                  <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                  </svg>
                  </a>
              </div>
              <div class="lg:w-1/2 relative">
                  <div class="relative z-10">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/slider/flooring.jpeg" alt="About Us" class="rounded-lg shadow-xl">
                  </div>
                  <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-full h-full bg-green-700 rounded-full opacity-10 z-0"></div>
                  <div class="absolute -bottom-10 -left-10 w-40 h-40 bg-yellow-200 rounded-full opacity-20 z-0"></div>
                  <div class="absolute -top-10 -right-10 w-40 h-40 bg-blue-200 rounded-full opacity-20 z-0"></div>
              </div>
              </div>
          </div>
        </section>

            <!-- company history section -->
    <?php include(get_template_directory() . '/sections/about-us-section.php'); ?>

        <section class="py-16 px-4 bg-white">
        <div class="container mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold text-center text-gray-800 mb-12">Our Core Values</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-8">
            <?php
            $core_values = [
                ['icon' => 'M13 10V3L4 14h7v7l9-11h-7z', 'title' => 'Innovation', 'description' => 'We constantly seek new and better flooring solutions.', 'bg_color' => 'bg-green-100', 'text_color' => 'text-green-600'],

                ['icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z', 'title' => 'Customer Focus', 'description' => 'We prioritize our customers\' needs and satisfaction.', 'bg_color' => 'bg-yellow-100', 'text_color' => 'text-yellow-500'],

                ['icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z', 'title' => 'Quality', 'description' => 'We deliver top-notch flooring products and services.', 'bg_color' => 'bg-indigo-100', 'text_color' => 'text-indigo-500'],
            ];

            foreach ($core_values as $value) :
            ?>
                <div class="flex flex-col items-center text-center p-6 border border-gray-200 rounded-lg transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                <div class="w-16 h-16 <?php echo $value['bg_color']; ?> rounded-full flex items-center justify-center mb-4">
                    <svg class="w-8 h-8 <?php echo $value['text_color']; ?>" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="<?php echo $value['icon']; ?>"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2"><?php echo $value['title']; ?></h3>
                <p class="text-gray-600"><?php echo $value['description']; ?></p>
                </div>
            <?php endforeach; ?>
            </div>
        </div>
        </section>

        <!-- Benefits Section -->
        <section class="bg-gradient-to-b from-blue-50 to-green-50 py-16">
          <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row items-start gap-12">

              <!-- Right Section -->
              <div class="lg:w-1/3 mt-12 lg:mt-0">
                <div class="bg-gray-800 text-white p-8 py-12 rounded-lg shadow-xl">
                  <h4 class="text-green-500 font-semibold text-xl mb-4">WHY CHOOSE US?</h4>
                  <h2 class="text-3xl font-bold mb-6 leading-tight">Why Prefer Us for Turf in Doha?</h2>
                  <p class="mb-8 text-lg leading-relaxed">We are the most popular grass carpet suppliers in Doha and have served a wide range of home and business owners. Our artificial turf will provide you with the most soothing and attractive decors.</p>
                  <a href="<?php echo site_url(); ?>/contact-us" class="inline-block bg-green-600 text-white font-semibold py-3 px-6 rounded-lg transition-colors duration-300 hover:bg-green-700 flex items-center gap-2 justify-center w-fit">
                    Get a Free Quote
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                    </svg>
                    </a>
                  </div>
              </div>

              <!-- Left Section -->
              <div class="lg:w-2/3">
                <h2 class="text-2xl md:text-3xl font-bold mb-2 text-gray-800 leading-tight">
                  We Provide Value-For-Money Synthetic Lawn Services in Doha
                </h2>
                <p class="text-gray-600 text-lg mb-2 leading-relaxed">
                  Our artificial turf treatments are extremely cost-effective and will continue to beautify your home and office floors and walls for years to come.
                </p>
                
                <!-- Benefits Section -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-4 md:gap-6 xl:gap-8 sm:mt-6">
                  <div class="bg-white rounded-lg shadow-md p-6">
                    <div class="flex items-center mb-4">
                      <div class="bg-green-600 rounded-full p-3 mr-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                      </div>
                      <h3 class="text-xl font-semibold text-gray-800">Cost-Effective Maintenance</h3>
                    </div>
                    <p class="text-gray-600">No expensive maintenance materials or professional services required</p>
                  </div>
                  
                  <div class="bg-white rounded-lg shadow-md p-6">
                    <div class="flex items-center mb-4">
                      <div class="bg-green-600 rounded-full p-3 mr-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                      </div>
                      <h3 class="text-xl font-semibold text-gray-800">Energy-Efficient</h3>
                    </div>
                    <p class="text-gray-600">Helps save water and contributes to lower energy bills</p>
                  </div>
                  
                  <div class="bg-white rounded-lg shadow-md p-6">
                    <div class="flex items-center mb-4">
                      <div class="bg-green-600 rounded-full p-3 mr-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                      </div>
                      <h3 class="text-xl font-semibold text-gray-800">Enhanced Comfort</h3>
                    </div>
                    <p class="text-gray-600">Extraordinarily comfortable underfoot and anti-slip</p>
                  </div>
                  
                  <div class="bg-white rounded-lg shadow-md p-6">
                    <div class="flex items-center mb-4">
                      <div class="bg-green-600 rounded-full p-3 mr-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                      </div>
                      <h3 class="text-xl font-semibold text-gray-800">Mold and Mildew Free</h3>
                    </div>
                    <p class="text-gray-600">No pests, mold, or mildew growth</p>
                  </div>
                </div>
              </div>
              

            </div>
          </div>
        </section>

        </div>
    </section>


    <!-- brand section -->
    <?php include(get_template_directory() . '/sections/our-brand-section.php'); ?>

    <!-- our team section -->
    <?php // include(get_template_directory() . '/sections/our-team-section.php'); ?>

    <!-- faq section -->
    <?php include(get_template_directory() . '/sections/faq-section.php'); ?>
</main>


<?php get_footer(); ?>

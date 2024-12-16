<?php
/* Template Name: Contact Us Template */
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

<main class="px-4 sm:px-6 lg:px-8 bg-gradient-to-tr from-gray-50 to-green-100">
  <div class="container mx-auto max-w-7xl pb-16">
    <div class="text-center mb-16 space-y-4 pt-16">
      <h1 class="text-4xl font-bold text-gray-900">Contact Us</h1>
      <p class="text-lg text-gray-700 max-w-3xl mx-auto">We're here to help transform your space. Reach out to our flooring experts for personalized advice and support.</p>
    </div>
    
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
      <div class="grid grid-cols-1 md:grid-cols-2">
        <!-- Contact Form -->
        <div class="p-8 flex flex-col justify-center">
          <h2 class="text-2xl font-bold text-gray-700 mb-6">Send Us a Message</h2>
          <form class="space-y-6">
            <div>
              <label for="name" class="block text-gray-700 mb-2">Full Name</label>
              <input type="text" id="name" name="name" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-600">
            </div>
            <div>
              <label for="email" class="block text-gray-700 mb-2">Email Address</label>
              <input type="email" id="email" name="email" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-600">
            </div>
            <div>
              <label for="message" class="block text-gray-700 mb-2">Your Message</label>
              <textarea id="message" name="message" rows="4" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-600"></textarea>
            </div>
            <div>
              <button type="submit" class="inline-flex items-center px-6 py-3 border border-transparent text-lg font-medium rounded-full text-white bg-green-700 hover:bg-green-800 transition-bg duration-300 shadow hover:shadow-lg">
                Send Message
                <svg class="w-4 h-4 ml-2 text-white" stroke="currentColor" fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
              </button>
            </div>
          </form>
        </div>
        
        <!-- Contact Information -->
        <div class="text-white flex justify-center items-center">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/contact-us/contact-us.webp" alt="Grass Ocean Trading Logo">
        </div>
      </div>
    </div>
  </div>
</main>
<!-- faq section -->
<?php include(get_template_directory() . '/sections/faq-section.php'); ?>

<?php get_footer(); ?>

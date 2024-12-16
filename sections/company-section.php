
<section class="relative overflow-hidden bg-gradient-to-br from-white to-green-50 py-8 sm:py-12 md:py-16 px-4 sm:px-6 lg:px-8">
  <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNTAwIiBoZWlnaHQ9IjUwMCIgdmlld0JveD0iMCAwIDUwMCA1MDAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CiAgPGRlZnM+CiAgICA8cGF0dGVybiBpZD0iYnViYmxlcyIgeD0iMCIgeT0iMCIgd2lkdGg9IjQwIiBoZWlnaHQ9IjQwIiBwYXR0ZXJuVW5pdHM9InVzZXJTcGFjZU9uVXNlIj4KICAgICAgPGNpcmNsZSBjeD0iMjAiIGN5PSIyMCIgcj0iMTUiIGZpbGw9IiMzNEQzOTkiIGZpbGwtb3BhY2l0eT0iMC4xIiAvPgogICAgPC9wYXR0ZXJuPgogIDwvZGVmcz4KICA8cmVjdCB4PSIwIiB5PSIwIiB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSJ1cmwoI2J1YmJsZXMpIiAvPgo8L3N2Zz4=')] opacity-50"></div>
  <div class="max-w-7xl mx-auto relative z-10">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-center">
      <div class="relative">
        <div class="absolute -top-4 -left-4 w-12 h-12 bg-green-500 rounded-full flex items-center justify-center z-10">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
          </svg>
        </div>
        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/bg/grass1.jpg'); ?>" alt="Workers installing synthetic grass" class="w-full h-auto rounded-lg shadow-lg" />
      </div>
      <div class="space-y-6 sm:space-y-8 px-4 sm:px-0">
        <div>
          <h3 class="text-green-600 font-semibold text-base sm:text-lg mb-2">ECO-FRIENDLY SOLUTION</h3>
          <h2 class="text-3xl sm:text-4xl font-bold text-gray-800 leading-tight">Our Synthetic Grass: The Ideal Health-Friendly Choice</h2>
        </div>
        <p class="text-gray-600 text-base sm:text-lg">Our grass is low-VOC and odorless, making it the perfect choice for individuals with allergies or breathing issues. It enhances indoor air quality and is fully biodegradable.</p>
        <div class="flex items-center space-x-4 sm:space-x-6">
          <span class="text-4xl sm:text-5xl font-bold text-green-600">15+</span>
          <p class="text-sm sm:text-base text-gray-700">Years of Experience<br />in the Industry</p>
        </div>
        <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4 sm:gap-6">
          <div>
            <p class="text-green-600 font-semibold text-sm sm:text-base mb-1">GET A FREE QUOTE</p>
            <p class="text-xl sm:text-2xl font-bold text-gray-800">+971 56 414 4014</p>
          </div>
          <button class="w-full sm:w-auto bg-green-600 text-white px-4 sm:px-6 py-2 sm:py-3 rounded-lg text-base sm:text-lg font-semibold hover:bg-green-700 transition duration-300 shadow-md">
            Order Now
          </button>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="py-8 sm:py-12 md:py-16 bg-gradient-to-tr from-green-100 to-white">
  <div class="container mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center max-w-3xl mx-auto mb-8 sm:mb-12">
      <h2 class="text-3xl sm:text-4xl font-bold text-gray-800 mb-3 sm:mb-4">Applications of Our Premium Synthetic Grass</h2>
      <p class="text-base sm:text-lg text-gray-600">Transform any space with our high-quality artificial grass solutions. Perfect for both residential and commercial applications.</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-6 gap-4 mb-8 sm:mb-12">
      <?php
      $app_list = array(
        array(
          'icon' => 'M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z',
          'title' => 'Lawns & Gardens',
          'description' => 'Create lush, maintenance-free outdoor spaces'
        ),
        array(
          'icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6',
          'title' => 'Decks & Patios',
          'description' => 'Perfect for balconies and rooftop gardens'
        ),
        array(
          'icon' => 'M13 10V3L4 14h7v7l9-11h-7z',
          'title' => 'Event Decors',
          'description' => 'Ideal for temporary installations'
        ),
        array(
          'icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6',
          'title' => 'Roof Covering',
          'description' => 'Transform rooftop recreational areas'
        ),
        array(
          'icon' => 'M14.121 14.121L19 19m-7-7l7-7m-7 7l-2.879 2.879M12 12L9.121 9.121m0 5.758a3 3 0 10-4.243 4.243 3 3 0 004.243-4.243zm0-5.758a3 3 0 10-4.243-4.243 3 3 0 004.243 4.243z',
          'title' => 'Pet Spaces',
          'description' => 'Create pet-friendly easy-clean areas'
        ),
        array(
          'icon' => 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4',
          'title' => 'Reception Areas',
          'description' => 'Enhance commercial spaces elegantly'
        )
      );

      foreach ($app_list as $app) : ?>
        <div class="cursor-pointer bg-white p-4 rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 group">
          <div class="bg-green-50 group-hover:bg-green-600 transition-colors duration-300 rounded-lg w-12 sm:w-14 h-12 sm:h-14 flex items-center justify-center mb-4 sm:mb-6">
            <svg class="w-6 sm:w-7 h-6 sm:h-7 text-green-600 group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="<?php echo $app['icon']; ?>"></path>
            </svg>
          </div>
          <h3 class="text-lg sm:text-xl font-bold text-gray-800 mb-2 sm:mb-3"><?php echo $app['title']; ?></h3>
          <p class="text-sm sm:text-base text-gray-600"><?php echo $app['description']; ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="py-8 sm:py-12 md:py-16 bg-gradient-to-tr from-green-100 to-white">
  <div class="container mx-auto">
  <div class="bg-gray-800 rounded-lg p-6 sm:p-8 md:p-12">
      <div class="max-w-3xl mx-auto text-center">
        <span class="text-green-500 font-medium text-base sm:text-lg block mb-2 sm:mb-3">GET STARTED TODAY</span>
        <h3 class="text-2xl sm:text-3xl md:text-4xl font-bold text-white mb-4 sm:mb-6">Ready to Transform Your Space?</h3>
        <p class="text-base sm:text-lg text-gray-300 mb-6 sm:mb-8">Get a personalized quote for your project and join our satisfied customers across UAE</p>
        <div class="flex flex-col sm:flex-row justify-center items-center gap-4">
          <a href="https://wa.me/971564144014" class="w-full sm:w-auto inline-flex items-center justify-center px-4 sm:px-6 py-2 sm:py-3 border border-transparent text-base sm:text-lg font-medium rounded-full text-white bg-green-700 hover:bg-green-800 transition-bg duration-300 shadow hover:shadow-lg gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" class="w-6 h-6 sm:w-7 sm:h-7">
              <path fill="#fff" d="M16 0C7.164 0 0 7.164 0 16c0 2.838.736 5.515 2.123 7.877L0 32l8.123-2.123C10.484 31.264 13.161 32 16 32c8.836 0 16-7.164 16-16S24.836 0 16 0zm0 29c-2.574 0-5.064-.672-7.241-1.947l-.519-.308-4.836 1.267 1.268-4.837-.308-.519C3.672 21.065 3 18.575 3 16 3 8.82 8.82 3 16 3s13 5.82 13 13-5.82 13-13 13zm7.107-9.427c-.385-.193-2.28-1.125-2.635-1.258-.355-.131-.615-.194-.875.193-.26.387-1.005 1.258-1.233 1.512-.227.255-.452.29-.837.097-.385-.193-1.62-.597-3.088-1.905-1.141-1.019-1.914-2.28-2.138-2.665-.224-.387-.024-.597.17-.79.176-.175.385-.453.577-.68.19-.228.255-.387.385-.643.13-.258.065-.482-.032-.675-.097-.193-.876-2.11-1.199-2.886-.316-.761-.637-.66-.875-.673-.227-.014-.487-.017-.75-.017s-.675.097-1.03.482c-.355.386-1.351 1.32-1.351 3.213s1.383 3.725 1.575 3.982c.193.258 2.721 4.118 6.594 5.776.923.398 1.643.636 2.204.814.925.294 1.769.253 2.43.153.74-.111 2.28-.935 2.605-1.837.323-.901.323-1.675.226-1.837-.097-.161-.352-.258-.736-.453z"/>
            </svg>
            +971 56 414 4014
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="py-12 sm:py-16 md:py-20">
    <div class="container mx-auto">
        <div class="flex flex-col md:flex-row items-center gap-8 md:gap-12">
            <div class="w-full md:w-1/2 h-[300px] sm:h-[400px] md:h-[500px] relative">
                <div class="bg-green-200 rounded-xl absolute inset-0 transform -rotate-6"></div>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/bg/grass3.jpg" alt="House with artificial grass" class="rounded-md relative shadow-xl z-10 w-full h-full object-cover" />
            </div>
            <div class="w-full md:w-1/2 space-y-6 sm:space-y-8 mt-8 md:mt-0">
                <p class="text-green-500 font-semibold text-lg sm:text-xl">Top-Rated Synthetic Grass Suppliers in Doha</p>
                <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold text-gray-800 leading-tight">Meet The Best Artificial Grass Installers</h1>
                <p class="text-gray-600 text-base sm:text-lg">At @.cursorrules, we provide the most luxurious and durable fake grass products and treatments, helping you transform your interior and exterior spaces.</p>
                <ul class="space-y-3 sm:space-y-4">
                    <?php
                    $service_list = array(
                        'Faux grass laying and fitting',
                        'Fake Grass repair and replacement',
                        'Astro Turf maintenance and cleaning'
                    );
                    
                    foreach ($service_list as $service) : ?>
                        <li class="flex items-center text-base sm:text-lg">
                            <div class="bg-green-50 w-7 h-7 sm:w-8 sm:h-8 rounded-full justify-center flex items-center mr-3 p-[6px]">
                              <svg class="text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            </div>
                            <?php echo $service; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4 sm:gap-6">
                    <div>
                        <p class="text-green-500 font-semibold text-base sm:text-lg">GET A FREE QUOTE</p>
                        <p class="text-2xl sm:text-3xl font-bold text-gray-800">+971 56 414 4014</p>
                    </div>
                    <button class="w-full sm:w-auto bg-gray-800 text-white px-6 sm:px-8 py-2 sm:py-3 rounded-lg text-base sm:text-lg font-semibold hover:bg-gray-700 transition duration-300">Contact Us</button>
                </div>
            </div>
        </div>
    </div>
</section>

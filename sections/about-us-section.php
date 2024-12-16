<section class="relative bg-cover bg-center bg-opacity-20 py-12 sm:py-16 md:py-20 bg-gradient-to-b from-white to-blue-50">
    <div class="absolute inset-0"></div>
    <div class="relative z-10 container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
        <div class="text-center mb-8 sm:mb-12">
            <h2 class="text-green-500 font-semibold text-sm sm:text-base mb-2 rounded-full bg-green-50 px-3 py-1 sm:px-4 sm:py-2 w-fit mx-auto">Our Story</h2>
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-800">Welcome To Grass Ocean Trading</h2>
        </div>
        
        <div class="grid sm:grid-cols-1 md:grid-cols-2 gap-8 md:gap-10 xl:gap-14 items-center">
            <div class="relative order-2 md:order-1">
                <!-- Main image -->
                <img 
                    src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/cards/2.webp'); ?>" 
                    alt="Woman cleaning carpet" 
                    class="rounded-lg shadow-lg w-full h-[250px] sm:h-[300px] md:h-[400px] object-cover"
                >
                
                <!-- Floating image - hidden on mobile -->
                <img 
                    src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/cards/3.webp'); ?>" 
                    alt="Person vacuuming" 
                    class="hidden sm:block absolute -bottom-10 -left-10 rounded-lg shadow-lg w-1/3 h-[150px] md:h-[200px] object-cover"
                >
                
                <!-- Floating logo -->
                <div class="absolute -top-5 -right-5 bg-white p-2 rounded-full shadow-lg hidden sm:block">
                    <img 
                        src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/cards/2.webp'); ?>" 
                        alt="Logo" 
                        class="w-16 h-16 md:w-20 md:h-20 object-cover rounded-full"
                    >
                </div>
            </div>
            
            <div class="sm:p-6 order-1 md:order-2">
                <div class="flex items-center mb-4">
                    <h2 class="text-xl sm:text-2xl font-semibold text-gray-800">Best Artificial Grass Supplier in Qatar Since 2010</h2>
                </div>
                
                <p class="text-gray-600 text-sm sm:text-base mb-4">
                    Grass Ocean Trading began as a small shop in 2010 and rapidly expanded to provide customers with easy access to our multiple stores across the UAE. We offer a wide range of high-quality floorings, including our in-house brand, catering to the entire retail market of the United Arab Emirates.
                </p>
                
                <p class="text-gray-600 text-sm sm:text-base mb-6 sm:mb-8">
                    As a leading Carpet Company in Dubai, we import premium products from countries such as India, Turkey, China, and Europe, all adhering to strict international quality protocols. Our commitment to excellence has enabled us to expand beyond retail, and we now export our products to Oman, Saudi Arabia, Africa, and the rest of the GCC.
                </p>
                
                <div class="py-4 flex flex-col sm:flex-row items-center sm:items-start gap-4 sm:gap-0">
                    <div class="bg-green-600 rounded-full shadow-md p-2 sm:p-3 sm:mr-4">
                        <img 
                            src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/icons/support-icon.webp'); ?>" 
                            alt="Check" 
                            class="w-10 h-10 sm:w-12 sm:h-12"
                        >
                    </div>
                    <div class="text-center sm:text-left">
                        <p class="text-base sm:text-lg font-semibold text-gray-800 mb-1">Get a Free Quote Today</p>
                        <a href="tel:+971526666666" class="text-green-600 font-bold text-xl sm:text-2xl hover:text-green-700 transition-colors">+971 52 666 6666</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
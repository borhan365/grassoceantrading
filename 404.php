<?php get_header(); ?>

<main class="bg-gradient-to-b from-blue-50 to-white py-16">
    <div class="container mx-auto px-4 max-w-2xl text-center h-[70vh] flex flex-col justify-center items-center">
        <h1 class="text-5xl font-bold mb-6 text-gray-800">404</h1>
        <h2 class="text-3xl font-semibold mb-4 text-gray-700">Page Not Found</h2>
        <p class="text-xl mb-8 text-gray-600">The page you are looking for doesn't exist or has been moved.</p>
        <a href="<?php echo home_url(); ?>" class="inline-block bg-green-700 hover:bg-green-800 text-white font-bold py-3 px-6 rounded transition duration-300">
            Return to Homepage
        </a>
    </div>
</main>

<?php get_footer(); ?>
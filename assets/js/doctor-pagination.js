jQuery(document).ready(function($) {
    var page = 1;

    $('#doctor-load-more').on('click', function() {
        var $button = $(this);
        $button.prop('disabled', true);  // Disable the button
        $button.text('Loading...');      // Change the button text to "Loading..."
        page++;

        $.ajax({
            url: ajaxpagination.ajaxurl,
            type: 'post',
            data: {
                action: 'load_doctors',
                page: page
            },
            success: function(response) {
                if (response.trim() === 'no_more_posts') {
                    // Change the button text to indicate no more posts
                    $button.text('No More Medicines Available');
                    $button.hide();
                    if (!$('.you-have-reached').length) {  // Check if the message already exists
                        $('.doctor-list-grid').after('<p class="you-have-reached">You\'ve viewed all available doctors. If you haven\'t found your desired specialist, please be patient. Our team is actively adding more doctors. For any questions or specific requests, please don\'t hesitate to <a href="' + ajaxpagination.siteurl + '/contact-us">Contact us</a>.</p>');
                    }
                } else {
                    $('.doctor-list-grid').append(response);
                    $button.prop('disabled', false);  // Re-enable the button
                    $button.text('See More Doctors');  // Reset the button text
                }
            },
            error: function() {
                // If there's an error, re-enable the button
                $button.prop('disabled', false);
                $button.text('See More Doctors'); // Reset the button text
            }
        });
    });
});

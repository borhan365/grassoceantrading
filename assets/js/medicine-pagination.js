jQuery(document).ready(function($) {
    // Load more button click event
    $(document).on('click', '#medicine-load-more', function(e) {
        e.preventDefault();
        var paged = $(this).data('paged');
        filter_medicines(paged);
    });

    // Function to filter medicines
    function filter_medicines(paged = 1, params = {}) {
        var search = params.search || $('#medicine-search').val();
        var pharmaceutical = params.pharmaceutical || $('#pharmaceuticals').val();
        var dosage = params.dosage || $('#dosage-forms').val();
        var generic = params.generic || $('#generics').val();

        // Show skeleton loader
        $('.medicine-skeleton-wrapper').show();
        $('.medicine-list-wrapper').hide(); // Hide the current list to show the skeleton

        $.ajax({
            url: ajax_params.ajax_url,
            type: 'POST',
            data: {
                action: 'filter_medicines',
                search: search,
                pharmaceutical: pharmaceutical,
                dosage: dosage,
                generic: generic,
                paged: paged,
            },
            success: function(response) {
                response = JSON.parse(response);

                // Hide skeleton loader and show the medicine list
                $('.medicine-skeleton-wrapper').hide();
                $('.medicine-list-wrapper').show();

                if (paged == 1) {
                    $('.medicine-list-wrapper').html(response.html);  // Update the medicine list
                } else {
                    $('.medicine-list-wrapper').append(response.html);  // Append new results to the medicine list
                }

                if (response.total > paged * 2) {  // Assuming 20 posts per page
                    $('#medicine-load-more').data('paged', paged + 1).show();
                } else {
                    $('#medicine-load-more').hide();
                }
            }
        });
    }
});

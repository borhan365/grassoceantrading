jQuery(document).ready(function($) {
    // Function to get URL parameters
    function getUrlParams(url) {
        let params = {};
        let parser = document.createElement('a');
        parser.href = url;
        let query = parser.search.substring(1);
        let vars = query.split('&');
        for (let i = 0; i < vars.length; i++) {
            let pair = vars[i].split('=');
            params[decodeURIComponent(pair[0])] = decodeURIComponent(pair[1]);
        }
        return params;
    }

    // Function to update URL with search parameters
    function updateUrl(params) {
        let url = new URL(window.location.href);
        for (let key in params) {
            if (params[key]) {
                url.searchParams.set(key, params[key]);
            } else {
                url.searchParams.delete(key);
            }
        }
        window.history.pushState({}, '', url);
    }

    // Populate filters based on URL parameters
    let params = getUrlParams(window.location.href);
    if (params.search) $('#medicine-search').val(params.search);
    if (params.pharmaceutical) $('#pharmaceuticals').val(params.pharmaceutical);
    if (params.dosage) $('#dosage-forms').val(params.dosage);
    if (params.generic) $('#generics').val(params.generic);

    // Initial filter on page load with URL parameters
    filter_medicines(1, params);

    // Search and Reset button click events
    $('#search-medicines').on('click', function(e) {
        e.preventDefault();
        let search = $('#medicine-search').val();
        let pharmaceutical = $('#pharmaceuticals').val();
        let dosage = $('#dosage-forms').val();
        let generic = $('#generics').val();

        // Update URL with search parameters
        let params = {
            search: search,
            pharmaceutical: pharmaceutical,
            dosage: dosage,
            generic: generic,
        };
        updateUrl(params);

        filter_medicines(1, params);
    });

    $('#reset-medicine-filter').on('click', function(e) {
        e.preventDefault();
        $('#medicine-search').val('');
        $('#pharmaceuticals').prop('selectedIndex', 0);
        $('#dosage-forms').prop('selectedIndex', 0);
        $('#generics').prop('selectedIndex', 0);

        // Remove URL parameters
        updateUrl({search: '', pharmaceutical: '', dosage: '', generic: ''});

        filter_medicines();
    });

    // Initial filter on page load
    filter_medicines();

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

                if (response.total > paged * 30) {  // Assuming 20 posts per page
                    $('#medicine-load-more').data('paged', paged + 1).show();
                } else {
                    $('#medicine-load-more').hide();
                }
            }
        });
    }

    // Reset filter button click event
    $('#reset-medicine-filter').on('click', function(e) {
        e.preventDefault();
        $('#medicine-search').val('');
        $('#pharmaceuticals').prop('selectedIndex', 0);
        $('#dosage-forms').prop('selectedIndex', 0);
        $('#generics').prop('selectedIndex', 0);
        filter_medicines(); // Trigger filter after reset
    });

    // Ensure the load more button is visible initially
    $('#medicine-load-more').css('display', 'block');
});

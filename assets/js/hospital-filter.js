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
    if (params.search) $('#hospital-search').val(params.search);
    if (params.hospital_location) $('#hospital-locations').val(params.hospital_location);
    if (params.hospital_type) $('#hospital-types').val(params.hospital_type);

    // Initial filter on page load with URL parameters
    filter_hospitals(1, params);

    // Search button click event
    $('#search-hospitals').on('click', function(e) {
        e.preventDefault();
        let search = $('#hospital-search').val();
        let hospital_location = $('#hospital-locations').val();
        let hospital_type = $('#hospital-types').val();

        // Update URL with search parameters
        let params = {
            search: search,
            hospital_location: hospital_location,
            hospital_type: hospital_type,
        };
        updateUrl(params);

        filter_hospitals(1, params);
    });

    // Reset button click event
    $('#reset-hospital-filter').on('click', function(e) {
        e.preventDefault();
        $('#hospital-search').val('');
        $('#hospital-locations').prop('selectedIndex', 0);
        $('#hospital-types').prop('selectedIndex', 0);

        // Remove URL parameters
        updateUrl({ search: '', hospital_location: '', hospital_type: '' });

        filter_hospitals(1, { search: '', hospital_location: '', hospital_type: '' });
    });

    // Load more button click event
    $(document).on('click', '#hospital-load-more', function(e) {
        e.preventDefault();
        var paged = $(this).data('paged');
        filter_hospitals(paged, getUrlParams(window.location.href));
    });

    // Function to filter hospitals
    function filter_hospitals(paged = 1, params = {}) {
        var search = params.search || $('#hospital-search').val();
        var hospital_location = params.hospital_location || $('#hospital-locations').val();
        var hospital_type = params.hospital_type || $('#hospital-types').val();

        // Show skeleton loader
        $('.skeleton-wrapper').show();
        $('.hospital-list-wrapper').hide(); // Hide the current list to show the skeleton

        $.ajax({
            url: ajax_params.ajax_url,
            type: 'POST',
            data: {
                action: 'filter_hospitals',
                search: search,
                hospital_location: hospital_location,
                hospital_type: hospital_type,
                paged: paged,
            },
            success: function(response) {
                response = JSON.parse(response);

                // Hide skeleton loader and show the hospital list
                $('.skeleton-wrapper').hide();
                $('.hospital-list-wrapper').show();

                if (paged == 1) {
                    $('.hospital-list-wrapper').html(response.html);  // Update the hospital list
                } else {
                    $('.hospital-list-wrapper').append(response.html);  // Append new results to the hospital list
                }

                if (response.total > paged * 12) {  // Assuming 12 posts per page
                    $('#hospital-load-more').data('paged', paged + 1).show();
                } else {
                    $('#hospital-load-more').hide();
                }
            }
        });
    }

    // Ensure the load more button is visible initially
    $('#hospital-load-more').css('display', 'block');
});

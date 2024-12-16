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
    if (params.search) $('#doctor-search').val(params.search);
    if (params.location) $('#doctor-locations').val(params.location);
    if (params.hospital) $('#hospital').val(params.hospital);
    if (params.specialist) $('#specialist-doctors').val(params.specialist);
    if (params.day) $('#available-doctors').val(params.day);
    if (params.time) $('#time-slots').val(params.time);

    // Initial filter on page load with URL parameters
    filter_doctors(1, params);

    // Search and Reset button click events
    $('#search-doctors').on('click', function(e) {
        e.preventDefault();
        let search = $('#doctor-search').val();
        let location = $('#doctor-locations').val();
        let hospital = $('#hospital').val();
        let specialist = $('#specialist-doctors').val();
        let day = $('#available-doctors').val();
        let time = $('#time-slots').val();

        // Update URL with search parameters
        let params = {
            search: search,
            location: location,
            hospital: hospital,
            specialist: specialist,
            day: day,
            time: time
        };
        updateUrl(params);

        filter_doctors(1, params);
    });

    $('#reset-doctor-filter').on('click', function(e) {
        e.preventDefault();
        $('#doctor-search').val('');
        $('#doctor-locations').prop('selectedIndex', 0);
        $('#hospital').prop('selectedIndex', 0);
        $('#specialist-doctors').prop('selectedIndex', 0);
        $('#available-doctors').prop('selectedIndex', 0);
        $('#time-slots').prop('selectedIndex', 0);

        // Remove URL parameters
        updateUrl({search: '', location: '', hospital: '', specialist: '', day: '', time: ''});

        filter_doctors();
    });

    // Function to filter doctors
    function filter_doctors(paged = 1, urlParams = {}) {
        var search = urlParams.search || $('#doctor-search').val();
        var location = urlParams.location || $('#doctor-locations').val();
        var hospital = urlParams.hospital || $('#hospital').val();
        var specialty = urlParams.specialist || $('#specialist-doctors').val();
        var available = urlParams.day || $('#available-doctors').val();
        var time = urlParams.time || $('#time-slots').val();

        // Remove the "You've viewed all available doctors" message
        $('.you-have-reached').remove();

        // Show loading filter and skeleton loader
        $('.loading-filter').show();
        $('.doctor-skeleton-wrapper').show();
        $('.doctor-list-grid').hide(); // Hide the current list to show the skeleton

        $.ajax({
            url: ajax_params.ajax_url,
            type: 'POST',
            data: {
                action: 'filter_doctors',
                search: search,
                location: location,
                hospital: hospital,
                specialty: specialty,
                available: available,
                time: time,
                paged: paged,
            },
            success: function(response) {
                response = JSON.parse(response);

                // Hide loading filter and skeleton loader
                $('.loading-filter').hide();
                $('.doctor-skeleton-wrapper').hide();
                $('.doctor-list-grid').show();

                if (paged == 1) {
                    $('.doctor-list-grid').html(response.html);  // Update the doctor list
                } else {
                    $('.doctor-list-grid').append(response.html);  // Append new results to the doctor list
                }

                if (response.total > paged * 20) {  // Assuming 20 posts per page
                    $('#doctor-load-more').data('paged', paged + 1).show();
                } else {
                    $('#doctor-load-more').hide();
                    if (!$('.you-have-reached').length) {  // Check if the message already exists
                        $('.doctor-list-grid').after('<p class="you-have-reached">You\'ve viewed all available doctors. If you haven\'t found your desired specialist, please be patient. Our team is actively adding more doctors. For any questions or specific requests, please don\'t hesitate to <a href="' + ajaxpagination.siteurl + '/contact-us">Contact us</a>.</p>');
                    }
                }
            }
        });
    }
});



jQuery(document).ready(function($) {
  $('.hero-search-btn').click(function(e) {
      e.preventDefault(); // Prevent default form submission if your search button is a submit button

      var searchQuery = $('.hero-search input[type="text"]').val().trim();

      if (searchQuery.length === 0) {
          // Focus on the input if the search query is empty
          $('.hero-search input[type="text"]').focus();
      } else {
          // Make the AJAX call if there is a search query
          $.ajax({
              type: 'POST',
              url: heroSearch.ajaxurl, // This variable should be defined in your PHP file where you localized the script
              data: {
                  'action': 'search_hero_section', // The action hook for the AJAX in your functions.php
                  'query': searchQuery
              },
              beforeSend: function() {
                  // Optional: Display a loading message or spinner
                  $('.hero-search-results').html('<p class="searching-message">Searching...</p>').show();
              },
              success: function(response) {
                  // Check if the response is empty and display a message or show the results
                  if (response.trim().length === 0) {
                      $('.hero-search-results').html('<p class="no-results-message">No results found.</p>');
                  } else {
                      $('.hero-search-results').html(response);
                  }
              },
              error: function() {
                  // Handle any errors that occur during the AJAX call
                  $('.hero-search-results').html('<p class="error-message">There was an error processing your request.</p>');
              }
          });
      }
  });
});


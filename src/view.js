/* eslint-disable no-console */
console.log( 'Testing GT trigger)' );
/* eslint-enable no-console */

jQuery(document).ready(function($) {
	
     // Add an ID to the input if it doesn't already have one
    var inputButton = $('.learndash_mark_complete_button');
    if (!inputButton.attr('id')) {
        inputButton.attr('id', 'submitBtn');
    }

    // Create a new label element with the specified class and text, then insert it before the input
    var label = $('<label/>', {
        'for': 'submitBtn', // Ensure this matches the ID of the input
        'class': 'next-step', // Add the class "next-step" to the label
        text: 'Go to Next Step' // Set the text for the label
    });

    label.insertBefore(inputButton);
	
	// Hide buttons
	 $(".learndash_mark_complete_button").hide();
	 $('label.next-step').hide();
	//$(".ld-content-action").hide();
	
	jQuery(window).on("finished", function () {
  		console.log('Testing WP 2');
		$('label.next-step').show();

	})
});

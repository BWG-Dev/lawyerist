

( function( $ ) {
    /* Accordions */
    // Clicking on the accordion header title
	$(".accordions").on("click", ".accordions_title", function() {
	// will (slide) toggle the related panel.
	$(this).toggleClass("active").next().slideToggle();
	});

    /* Show Status Buttons */
    $(".unlock-button").on("change", ".switch", function() {
        $(this).parents(".unlock-button").next().toggleClass('hidden');
    });

})( jQuery );


    
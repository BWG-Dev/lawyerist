/*------------------------------
Labster Portal
------------------------------*/
( function( $ ) {
  /* Accordions */
  // Clicking on the accordion header title
	$(".accordions").on("click", ".accordions_title", function() {
	// will (slide) toggle the related panel.
	$(this).toggleClass("active").next().slideToggle();
	});

  // Clicking on the box, shows the form
  $(".interact-box").on("click", ".cta-icons .step-one", function() {
    $(this).parents(".interact-box").next().slideToggle();
  });

  $(".interact-box").on("click", ".cta-titles .step-one", function() {
    console.log('click works');
    $(this).parents(".interact-box").next().slideToggle();
  });

  // Clicking on restart, brings the form & "Submit" back
  $(".interact-box").on("click", ".cta-titles .restart-step-one", function() {
    $(this).parents(".interact-box").next().slideToggle();
    $(this).prev().replaceWith(
      '<span class="cta-link step-one">Submit</span>'
    );
    $(this).css("display", "none");
    // Update .cta-titles siblings
    $(this).parents(".interact-box").find(".cta-icons .step-three").replaceWith(
      '<span class="icon step-one">&nbsp;</span>'
    );
    $(this).parents(".interact-box").find(".cta-progress .three-dots").replaceWith(
      '<div class="three-dots"><span class="dot step-one current">&nbsp;</span><span class="dot step-two">&nbsp;</span><span class="dot step-three">&nbsp;</span></div>'
    );
    $(this).parents(".interact-box").find(".cta-progress .cta-label").replaceWith(
      '<div class="cta-label"><span class="label step-one">To-Do</span></div>'
    );
    $(this).parents(".lp-card").removeClass('make-it-blue');
  });

  // Add a class to update card color on step three
  $( document ).ready( function() {
    $( '.cta-titles .step-three' ).parents('.lp-card').addClass('make-it-blue');
  });

})( jQuery );


    
<?php /* Template Name: Lab Portal */ ?>

<?php get_header(); ?>

<div <?php post_class(); ?>>
    
    <?php // Get the Loop.
        get_template_part( 'template-parts/loop', 'lab-portal' );
	?>

</div>

<script>
jQuery(document).ready(function($) {
   // find the unique id of the clicked form
   /*$('.dot-holder').on('click', '.update-status-form', function() {
      event.preventDefault();

      let this_form = $(this).id;
      console.log(this_form);
      
      update_user(this_form);
   });*/

   $('.update-status-form').submit(function() {
      console.log('line 13 working');
      let data = {
         action: 'do_status_update'
      };

      $.post(ajaxurl, data, function(response) {
         //$('#update-status').
         $('.echo-test').html(response);
         
         //alert(response);
      });

      return false;
   });

});
/*------------------------------
Accordions
------------------------------*/

( function( $ ) {
  // Clicking on the accordion header title
	$("body").on("click", ".accordions .accordions_title", function() {
    // will (slide) toggle the related panel.
    $(this).toggleClass("active").next().slideToggle();
	});
})( jQuery );

// End Accordions

/*------------------------------
Lab Portal 
------------------------------*/
( function( $ ) {

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


</script>

<?php get_footer(); ?>
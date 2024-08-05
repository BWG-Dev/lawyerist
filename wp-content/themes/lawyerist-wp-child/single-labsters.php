<?php /* Template Name: Labster Single */ 

get_header(); ?>

<div <?php post_class(); ?>>
    
    <?php // Get the Loop.
        get_template_part( 'template-parts/loop', 'lab-portal' );
	?>

</div>

<script>
jQuery(document).ready(function($) {
   $('.update-status-form').submit(function() {
      console.log('line 13 working');
      let data = {
         action: 'do_status_update'
      };

      $.post(ajaxurl, data, function(response) {
         $('.echo-test').html(response);
      });

      return false;
   });
});

( function( $ ) { // Accordions
	$("body").on("click", ".accordions .accordions_title", function() {
    $(this).toggleClass("active").next().slideToggle();
	});
})( jQuery );

( function( $ ) { // Lab Portal
  $(".interact-box").on("click", ".cta-icons .step-one", function() {
    $(this).parents(".interact-box").next().slideToggle();
  });

  $(".interact-box").on("click", ".cta-titles .step-one", function() {
    console.log('click works');
    $(this).parents(".interact-box").next().slideToggle();
  });

  $(".interact-box").on("click", ".cta-titles .restart-step-one", function() {
    $(this).parents(".interact-box").next().slideToggle();
    $(this).prev().replaceWith(
      '<span class="cta-link step-one">Submit</span>'
    );
    $(this).css("display", "none");
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

  $( document ).ready( function() {
    $( '.cta-titles .step-three' ).parents('.lp-card').addClass('make-it-blue');
  });
})( jQuery );
</script>

<?php get_footer(); ?>
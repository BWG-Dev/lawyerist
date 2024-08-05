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
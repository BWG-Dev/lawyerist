jQuery( function ( $ ) {
    $( document ).ready( function() {
        // Add functional class to input buttons
        $('#product-recommender .ginput_container ul li input').addClass('field-button');
        $('#product-recommender .ginput_container ul li label').addClass('field-button');
        
        setTimeout( function(){
            $('.prw-animate').css("display", "none");
        },4000);
    });

    // Add "active" class on click
    $('#product-recommender .ginput_container ul').on('click', '.field-button', function() {
        $(this).parent('li').addClass('active');
        $(this).addClass('clicked');
    }); 

    // Remove "active" class on click
    $('#product-recommender .ginput_container ul').on('click', '.field-button.clicked', function() {
        $(this).parent('li').removeClass('active');
        $(this).removeClass('clicked');
    });
    
});

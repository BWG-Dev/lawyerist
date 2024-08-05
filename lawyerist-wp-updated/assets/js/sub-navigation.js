jQuery( function ( $ ) {
	"use strict";
	
    var sections = $('.start-content');
    var nav = $('.fixed-secondary-nav ul li');
    //var nav_height = nav.outerHeight();

    $(window).on('scroll', function () {
        var cur_pos = $(this).scrollTop();
        
        sections.each(function() {
            var top = $(this).offset().top;
            var bottom = top + $(this).outerHeight();

            var bannerTop = $('#review-banner').offset().top;
            var bannerBottom = bannerTop + $(this).outerHeight();
            
            if (cur_pos >= top && cur_pos <= bottom) {
                var sectionID = $(this).attr('id');
                var sectionX = sectionID + 'X';

                var currentNav = nav.find('a[href="#'+$(this).attr('id')+'"]').parent();
                var navID = currentNav.attr('id');

                if ( ( sectionX == navID ) || ( cur_pos < bannerBottom ) ) {
                    nav.removeClass('active');
                    sections.removeClass('active');
                    
                    //$(this).addClass('active');

                    nav.find('a[href="#'+$(this).attr('id')+'"]').parent().addClass('active');
                } 
            }
        });
    });

    /*nav.find('a').on('click', function () {
        var $el = $(this);
        var id = $el.attr('href');
        
        $('html, body').animate({
            scrollTop: $(id).offset().top - nav_height
        }, 500);
        
        return false;
    });*/

});

/*function isScrolledIntoView(elem, cont) {
    var contTop = $(cont).offset().top;
    var contBottom = contTop + $(cont).height();

    var elemTop = $(elem).offset().top;
    var elemBottom = elemTop + $(elem).height();

    return ((elemBottom <= contBottom) && (elemTop >= contTop));
}*/

/*$(window).scroll(function(){
    // This is then function used to detect if the element is scrolled into view
    function elementScrolled(elem)
    {
        var docViewTop = $(window).scrollTop();
        var docViewBottom = docViewTop + $(window).height();
        var elemTop = $(elem).offset().top;
        return ((elemTop <= docViewBottom) && (elemTop >= docViewTop));
    }
     
    // This is where we use the function to detect if ".box2" is scrolled into view, and when it is add the class ".animated" to the <p> child element
    if(elementScrolled('.post-link')) {
        var els = $('.sidebar-links'),
            i = 0,
            f = function () {
                $(els[i++]).addClass('fade-out');
                if(i < els.length) setTimeout(f, 400);
            };
        f();
    } else {
        $(".sidebar-links").removeClass("fade-out");
    }
});*/

/*$(document).ready(function() {
        var OnPageNavPosition = $('.mobile-sidebar-links').position().top;
        $(window).scroll(function() {
        if($(window).scrollTop() > (OnPageNavPosition - 75)) {
            $('.mobile-sidebar-links').addClass('stick');
            $('.offset').addClass('active');
        } else {
            $('.mobile-sidebar-links').removeClass('stick');
            $('.offset').removeClass('active');
        }
        });
    }); 

    $(function() {
		$(".expand").on( "click", function() {
			$(this).next().slideToggle(200);
			$('.icon-expand').toggleClass('clicked');
		});
	});

    $('.links > a').click(function() {
		$('.detail').slideToggle(200);
	});

});*/
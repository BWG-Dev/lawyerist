/**
 * JS File
 *
 * @package Postali Child
 * @author Postali LLC
 */


/*------------------------------

Index
–––
  Sign-Up Wall
  Product Filters
  Responsive Menu
  Mobile Menu
  Accordions
  Page Banner
  Lawyerist Log-In/Register
  Expander – .expand-this
  WooCommerce Select/Drop-Down
  Platinum Sponsors Widget
  Dismissible Call to Action

------------------------------*/



/*------------------------------
Sign-Up Wall
------------------------------*/
( function( $ ) {

  notice = document.querySelector( '#article-counter' );

  if ( !notice ) { return; }

  let date, thisMonth, thisArticle, articlesRead, articlesCount, articleCounter;

  articleCounter  = $( '#article-counter' );

  date          = new Date();
  thisMonth     = date.getMonth();
  thisArticle   = articleCounter.data( 'post_id' );

  articlesRead = JSON.parse( localStorage.getItem( 'lawyeristArticlesRead' ) );

  if ( articlesRead == null || articlesRead[ 'month' ] != thisMonth ) {
    articlesRead = {
      'month': thisMonth,
      'articles': [],
    };
    articleCount = 0;
  } else {
    articleCount = articlesRead[ 'articles' ].length;
  }

  // Adds the current page ID to the array of articles if there are fewer than 6.
  if ( articleCount < 6 && articlesRead[ 'articles' ].indexOf( thisArticle ) == -1 ) {
    articlesRead[ 'articles' ].push( thisArticle );
  }

  // Reset the article count.
  articleCount = articlesRead[ 'articles' ].length;

  // Output the current article count, a notice that the viewer has read all
  // their alotted articles, or block the page by replacing the post content.
  if ( articleCount == 1 ) {

    articleCounter.html( 'This is your first of five free articles this month! We\'d love to unlock more for free. All you have to do is <a class="login-link" href="/account/">log in or register</a>.' );

  } else if ( articleCount < 5 ) {

    articleCounter.html( 'You have viewed ' + articleCount + ' of 5 free articles this month. We\'d love to unlock more for free. All you have to do is <a class="login-link" href="/account/">log in or register</a>.' );

  } else if ( articleCount == 5 ) {

    articleCounter.html( 'This is the last of your five free articles this month. To keep reading, <a class="login-link" href="/account/">log in or register</a>.' );

  } else if ( articleCount > 5 ) {
    console.log('5+ articles');
    //$( '.post_body' ).html( '<p class="article-counter-login-notice">You have read all five of your free articles this month. To read this article, <a class="login-link" href="/account/">log in or register</a>.</p>' );
    console.log('after .html');
    articleCounter.hide();
    $( '#lawyerist-login-article-count' ).show( 145 );
    $( '#lawyerist-login-screen' ).show();
    $( 'body' ).addClass('article-limit-screen');

  }
  localStorage.setItem( 'lawyeristArticlesRead', JSON.stringify( articlesRead ) );

})( jQuery );
// End Signup Wall


/*------------------------------
Product Filters
------------------------------*/
( function( $ ) {
  $(".filter-clk").on("click", function() {
    $(this).toggleClass('toggle-btn');
    $( ".filter-options" ).toggle();
    $(".reset-filter-el").toggleClass('hidden');
  });

  $(".button-clk").on("click", function() {
    $(this).toggleClass('toggle-btn');
    $( ".sort-options" ).toggle();
  });

  if ( $( '.product-filters' ).length > 0 ) {

    let filter        = $( '.product-filters .filter' );
    let filterLabels  = [];
    let featureClass  = [];
    let noResults     = $( '#no-results-placeholder' );
    let productList   = $( '.product-pages-list li' );

    $( '.product-filters .show-all.reset-filter' ).click( function() {
      filter.removeClass( 'on' );
      productList.removeClass( 'show' ).show();
      noResults.hide();
      filterLabels = [];
    });


    filter.click( function() {
      if ( $(this).hasClass('show-all') ) {
        $(this).addClass('on').removeClass('off');
        productList.removeClass( 'show' ).show();
        noResults.hide();
        filterLabels = [];
      } else if ( $(this).hasClass('single-select') ) {
        $(this).addClass('on').removeClass('off');
        $(this).siblings().addClass('off').removeClass('on');
        $(this).parent().toggle();
      } else {
        featureClass = $( this ).data( 'acf_label' );

        if ( $( this ).hasClass( 'on' ) ) {

          $( this ).removeClass( 'on' );

          var index = filterLabels.indexOf( featureClass );
          if ( index > -1 ) {
            filterLabels.splice( index, 1 );
          }

        } else {

          $( this ).addClass( 'on' );

          filterLabels.push( featureClass );

        }

        products = document.getElementsByClassName( 'product-card' );
        let productCount = products.length;

        Array.prototype.forEach.call( products, function( product ) {

          let classList = product.className.split( ' ' );
          let match = true;

          filterLabels.forEach( function( label ) {

            if ( classList.indexOf( label ) == -1 ) {
              match = false;
            }

          });

          if ( match == false ) {
            $( product ).removeClass( 'show' ).hide();
            productCount--;
          } else {
            $( product ).addClass( 'show' ).show();
          }

          if ( productCount == 0 ) {
            noResults.show();
          } else {
            noResults.hide();
          }

        });
      }

    });

  }
})( jQuery );
  
function sortOut() {
  var filterBtn = document.querySelector('[data-acf_label="fc_lpms_rating"]');
  if(!filterBtn.classList.contains('on') && filterBtn.classList.contains('high')) {
	  var classname = document.getElementsByClassName('fc_lpms_rating');
	  var divs = [];
	  for (var i = 0; i < classname.length; ++i) {
		  divs.push(classname[i]);
	  }
	  divs.sort(function(a, b) {
		  return +b.dataset.val - +a.dataset.val;
	  });

	  var br = document.querySelector(".spans");

	  let parentDiv = document.querySelector(".product-p-listx");

	  divs.forEach(function(el) {
		  parentDiv.insertBefore(el, br);
	  });
  } else {
	  var classname = document.getElementsByClassName('fc_lpms_rating');
	  var divs = [];
	  for (var i = 0; i < classname.length; ++i) {
		  divs.push(classname[i]);
	  }
	  divs.sort((a, b) => a.id.localeCompare(b.id))
	  var br = document.querySelector(".spans");

	  let parentDiv = document.querySelector(".product-p-listx");

	  divs.forEach(function(el) {
		  parentDiv.insertBefore(el, br);
	  });
  }

}



// End Product Filters


/*------------------------------
Responsive Menu
------------------------------*/
( function( $ ) {
  // Desktop menu:
  // Opens and closes second-level+ sub-menus.
  // The .not in this function excludes the Products & Services and
  // Join the Lawyerist Community sub menus.
  $( document ).ready( function() {
    $( '#menu-main-menu > .menu-item-has-children > .sub-menu > .menu-item-has-children > .sub-menu' ).addClass('menu-hide');
    //$( '#menu-main-menu > .menu-item-has-children > .sub-menu > .menu-item-has-children > a' ).addClass('closed');
  });

  $( '#menu-main-menu > .menu-item-has-children > .sub-menu > .menu-item-has-children > a' ).not( '#menu-item-305888 > a, #menu-item-270912 > a' ).click( function() {
    $( this ).toggleClass( 'open' ).next( '.sub-menu' ).toggleClass('menu-hide').toggle();
  });

  /*// Opens second-level sub-menus
  $( '#menu-main-menu > .menu-item-has-children > .sub-menu > .menu-item-has-children > a.closed' ).not( '#menu-item-305888 > a, #menu-item-270912 > a' ).click( function() {
    $( this ).removeClass( 'closed' ).addClass( 'open' ).next( '.sub-menu' ).toggleClass('menu-hide').slideDown( '400', 'swing' );
  });

  // Closes second-level sub-menus
  $( '#menu-main-menu > .menu-item-has-children > .sub-menu > .menu-item-has-children > a.open' ).not( '#menu-item-305888 > a, #menu-item-270912 > a' ).click( function() {
    $( this ).removeClass( 'open' ).addClass( 'closed' ).next( '.sub-menu' ).toggleClass('menu-hide');
  });*/

  // Adds class to Join button
  $( document ).ready( function() {
    $( '#menu-item-1375008 a' ).addClass('join-btn');
  });

  // Updates search field value
  $( document ).ready( function() {
    $( 'input.search-submit' ).val('\u26B2');
    $( 'input.search-submit' ).attr('name', 'Submit');
    $( 'input#search-field' ).attr('placeholder', '');
  });

  // Closes all menus when anything outside the menu is clicked.
  $( document ).on( 'click', function() {
    $( '#menu-main-menu > .menu-item-has-children > .sub-menu > .menu-item-has-children > a' ).removeClass( 'open' ).next( '.sub-menu' ).slideUp( 200 );
  });

  $( '#menu-main-menu *' ).on( 'click', function( e ) {
      e.stopPropagation();
  });

})( jQuery );
// End Responsive Menu



/*------------------------------
Mobile Menu
------------------------------*/
( function( $  ) {
  //Hamburger animation
	$('#menu-icon').click(function() {
		$(this).toggleClass('active');
		return false;
	});

	//Toggle mobile menu & search
	$('.toggle-nav').click(function() {
		$('#menu-main-menu').slideToggle(300);
  });
	 
	//Close navigation on anchor tap
	$('.toggle-nav.active').click(function() {	
		$('#menu-main-menu').slideUp(300);
	});	

  // Secondary Mobile Nav– Hamburger animation
	$('#menu-icon-secondary').click(function() {
		$(this).toggleClass('active');
		return false;
	});

  // Secondary Mobile Nav – Toggle mobile menu & search
	$('.toggle-second-nav#menu-icon-secondary').click(function() {
    $(this).toggleClass('open');
		$('.fixed-mobile-secondary-nav').slideToggle(300);
  });
	 
	// Secondary Mobile Nav – Close navigation on anchor tap
	$('.toggle-second-nav#menu-icon-secondary.active').click(function() {
    $(this).removeClass('open');
		$('.fixed-mobile-secondary-nav').slideUp(300);
	});	

  //Mobile menu accordion toggle for sub pages
	$('#menu-main-menu > li.menu-item-has-children > a').not('#menu-main-menu > li.menu-item-has-children > a.login-link').after('<div class="accordion-toggle"><span class="icon-form-dropdown-icon"></span></div>');

  $('#menu-main-menu > li.menu-item-has-children').addClass('control-menu');

  $('#menu-main-menu > li.menu-item-has-children.control-menu').click(function() {
	  $(this).toggleClass("open");
    $(this).children('.sub-menu').slideToggle(200, 'linear');
    $(this).children('.icon-form-dropdown-icon').toggleClass('toggle-rotate');
  });
  
  $('#menu-main-menu > li.menu-item-has-children.control-menu > a').click(function() {
    event.preventDefault();
	  $(this).parent().toggleClass("open");
    $(this).parent().children('.sub-menu').slideToggle(200, 'linear');
    $(this).parent().children('.icon-form-dropdown-icon').toggleClass('toggle-rotate');
  });
})( jQuery );

/*function tooogleX() {
    var x = document.querySelector(".fixed-mobile-secondary-nav");
    if (x.style.display === "block") {
        x.style.display = "none";
    } else {
        x.style.display = "block";
    }
}*/

/*------------------------------
Accordions
------------------------------*/
( function( $ ) {
  // Clicking on the accordion header title
	$(".accordions").on("click", ".accordions_title", function() {
	// will (slide) toggle the related panel.
	$(this).toggleClass("active").next().slideToggle();
	});
})( jQuery );

// End Accordions



/*------------------------------
Page Banner
------------------------------*/
( function( $ ) {
  // Is this a new session?
    // Check for cookies
		let $banner = Cookies.get('banner');

    if ( ($banner == 'yes') ) { // not a new session & the banner has been closed
        $('#page-cta-container').css("display", "none");
    } else { // yes a new session
      $( window ).one("scroll", function() {
        $('#page-cta-container').removeClass('hidden').fadeIn(2000);
      });

      $("#page-cta-container").on("click", ".close-btn", function() {
        $(this).parent().addClass("closed");
      });
    }

  // Make the cookies go away after a while	
    // Set cookie expiration
		setTimeout( function(){
			Cookies.set('banner', 'yes');
		},8000);
})( jQuery );



/*------------------------------
Lawyerist Log-In/Register
------------------------------*/
( function( $ ) {

  let allLoginRegisterLinks = $( '.login-link, a[ href*="wp-login.php" ], .register-link, #join-popup' );
  let loginModal            = $( '#lawyerist-login' );
  let loginLinks            = $( '.login-link, a[ href*="wp-login.php" ]' );
  let loginForm             = $( '#lawyerist-login #login' );
  let registerLinks         = $( '.register-link, #join-popup' );
  let registerForm          = $( '#lawyerist-login #register, #join-popup' );
  let dismissButton         = $( '#lawyerist-login .dismiss-button' );
  let menuControl           = $( '.menu-main-menu-container #menu-main-menu' );
  let menuIcon              = $( '#header-top_mobile #menu-icon' );

  // Prevents login links from activating.
  allLoginRegisterLinks.click( function( e ) {
    e.preventDefault();
  });

  // Switches to the correct form (even while hidden) for the link.
  loginLinks.click( function() {
    loginForm.show();
    registerForm.hide();
    menuControl.hide();
    menuIcon.toggleClass('active');
  });

  registerLinks.click( function() {
    loginForm.hide();
    registerForm.show();
  });


  // Controls the modal pop-up and close actions.
  allLoginRegisterLinks.click( function() {
    loginModal.show( 145 );
    //loginScreen.show();
  });

  dismissButton.click( function() {
    loginModal.hide( 95 );
    //loginScreen.hide();
  });


  // Controls navigation within #lawyerist-login.
  $( '#lawyerist-login .link-to-register' ).click( function() {
    loginForm.hide( 95 );
    registerForm.show( 145 );
  });

  $( '#lawyerist-login .back-to-login' ).click( function() {
    loginForm.show( 145 );
    registerForm.hide( 95 );
  });


  // Changes/removes stuff when the confirmation wrapper is visible.
  $( document ).on( 'gform_confirmation_loaded', function() {
    dismissButton.hide();
    $( '#lawyerist-login #register h2' ).html( 'Welcome to the Lawyerist Insider Community!' );
    $( '#lawyerist-login #register p.remove_bottom' ).hide();
  });

})( jQuery );
// End Lawyerist Login/Register


/*------------------------------
Expander – Opens & closes things with the .expand-this class
------------------------------*/
( function( $ ) {

  let hideStuff_two = $( '.expandthis-hide-no-slide' );
  let showStuff_two = $( '.expandthis-click-no-slide' );

  hideStuff_two.hide();

  showStuff_two.click( function() {
    $( this ).toggleClass( 'open' ).next( '.expandthis-hide-no-slide' ).toggle();
    $( '.open' ).not( this ).toggleClass( 'open' ).next( '.expandthis-hide-no-slide' ).toggle();
  });

  let hideStuff = $( '.expandthis-hide' );
  let showStuff = $( '.expandthis-click' );

  hideStuff.hide();

  showStuff.click( function() {
    $( this ).toggleClass( 'open' ).next( '.expandthis-hide' ).slideToggle( 145 );
    $( '.open' ).not( this ).toggleClass( 'open' ).next( '.expandthis-hide' ).slideToggle( 95 );
  });

})( jQuery );


/*------------------------------
WooCommerce Select/Drop-Down
------------------------------*/
( function( $ ) {

	// Frontend Chosen selects
	if ( $().select2 ) {
		$( 'select.checkout_chosen_select:not(.old_chosen), .form-row .select:not(.old_chosen)' ).filter( ':not(.enhanced)' ).each( function() {
			$( this ).select2( {
				minimumResultsForSearch: 10,
				allowClear:  true,
				placeholder: $( this ).data( 'placeholder' )
			} ).addClass( 'enhanced' );
		});
	}

})( jQuery );
// End WooCommerce Select Drop-Downs


/*------------------------------
Platinum Sponsors Widget
------------------------------*/
( function( $ ) {

  let sidebar = $( '#sidebar_column' );
  let widget  = $( '#platinum-sponsors-widget' );

  function stickyWidget() {

    // Checks to see if #sidebar_column is visible.
    if ( sidebar.is( ':visible' ) && widget.length > 0 ) {

      var windowTop     = $( window ).scrollTop() + $( '#wpadminbar' ).outerHeight();
      var contentTop    = $( '#column_container' ).offset().top - 30;

      if ( windowTop > contentTop ) {
        widget.addClass( 'stick' );
      }

      if ( windowTop < contentTop ) {
        widget.removeClass( 'stick' );
      }

    }

  }

  $( window ).scroll( stickyWidget );
  stickyWidget();

  function noSidebar() {

    let showPlatInContent = $( 'body.show-plat-in-content' );

    if ( sidebar.is( ':hidden' ) && $( '.post_body' ).not( widget ) && showPlatInContent.length > 0 ) {

      let postBodyChildren    = $( '.post_body' ).children().length;
      let contentColChildren  = $( '#content_column' ).children().length;

      widget.removeClass( 'stick' );
      widget.addClass( 'card' );

      if ( $( 'body.home' ).length > 0 ) {

        widget.insertAfter( '#fp-recent-pages' );

      } else if ( $( 'body.archive' ).length > 0 && contentColChildren > 6 ) {

        let insertionPoint = Math.round( contentColChildren / 3 );

        widget.insertAfter( '#content_column > *:nth-child( ' + insertionPoint + ' )' );

      } else if ( postBodyChildren > 6 ) {

        let insertionPoint = Math.round( postBodyChildren / 3 );

        widget.insertAfter( 'main .post_body > *:nth-child( ' + insertionPoint + ' )' );

      } else if ( $( '.post_body .postmeta' ).length > 0 ) {

        widget.insertBefore( 'main .post_body .postmeta' );

      } else {

        widget.insertAfter( '#content_column > *:last-child' );

      }

    } else {

      widget.removeClass( 'card' );
      widget.appendTo( sidebar );

    }

  }

  $( window ).resize( noSidebar );
  noSidebar();

})( jQuery );
// End Platinum Sponsors Widget


/*------------------------------
Dismissible Call to Action
------------------------------*/
( function() {

    var notice, noticeId, storedNoticeId, dismissButton;

    notice = document.querySelector( '.dismissible-notice' );

    if ( !notice ) { return; }

    dismissButton   = document.querySelector( '#cta .dismiss-button' );
    noticeId        = notice.getAttribute( 'data-id' );
    storedNoticeId  = localStorage.getItem( 'lawyeristNotices' );

    if ( noticeId !== storedNoticeId ) {
  		notice.style.display = 'block';
  	}

    dismissButton.addEventListener( 'click', function() {
  		notice.style.display = 'none';
      localStorage.setItem( 'lawyeristNotices', noticeId );
    });

})( jQuery );
// End Dismissible Call to Action

//suppress query error message on comment error page
( function($) {
  setTimeout(function() {
    if( $('.page-comment-error').length ) {
      $('#query-monitor').css('display', 'none');
    }
  }, 500)

})( jQuery );

/**
 * JS File
 *
 * @package lawyerist-wp-child
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
// Test
( function( $ ) {
  $("h1.headline").click(function() {
    console.log('h1 click');
  });
})( jQuery );

/*------------------------------
Product Filters
------------------------------*/
( function( $ ) {

  if ( $( '.product-filters' ).length > 0 ) {

    let filter        = $( '.product-filters .filter' );
    let filterLabels  = [];
    let featureClass  = [];
    let noResults     = $( '#no-results-placeholder' );
    let productList   = $( '.product-pages-list li' );

    $( '.product-filters .show-all' ).click( function() {
      filter.removeClass( 'on' );
      productList.removeClass( 'show' ).show();
      noResults.hide();
      filterLabels = [];
    });

    filter.click( function() {

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

    });

  }
})( jQuery );

// End Product Filters


/*------------------------------
Responsive Menu
------------------------------*/
  // Desktop menu:
  // Opens and closes second-level+ sub-menus.
  // The .not in this function excludes the Products & Services and
  // Join the Lawyerist Community sub menus.
( function( $ ) {

  $( document ).ready( function() {
    $( '#menu-main-menu > .menu-item-has-children > .sub-menu > .menu-item-has-children > .sub-menu' ).addClass('menu-hide');
    //$( '#menu-main-menu > .menu-item-has-children > .sub-menu > .menu-item-has-children > a' ).addClass('closed');
  });

  $( '#menu-main-menu > .menu-item-has-children > .sub-menu > .menu-item-has-children > a' ).not( '#menu-item-305888 > a, #menu-item-270912 > a' ).click( function() {
    $( this ).toggleClass( 'open' ).next( '.sub-menu' ).toggleClass('menu-hide').toggle();
  });

  // Adds class to Join button
  $( document ).ready( function() {
    $( '.menu-item-account a' ).addClass('account-btn');
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
( function( $ ) {

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



/*------------------------------
Accordions
------------------------------*/

/*( function( $ ) {
  // Clicking on the accordion header title
	$("body").on("click", ".accordions .accordions_title", function() {
    // will (slide) toggle the related panel.
    $(this).toggleClass("active").next().slideToggle();
	});
})( jQuery );*/

// End Accordions

/*------------------------------
Lab Portal 
------------------------------*/
/*( function( $ ) {

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
})( jQuery );*/


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


  let allLoginRegisterLinks = $( '.login-link, a[ href*="wp-login.php" ], .register-link, #join-popup, #db-login' );
  let loginModal            = $( '#lawyerist-login' );
  let loginLinks            = $( '.login-link, a[ href*="wp-login.php" ], #db-login' );
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
})( jQuery );

// End Lawyerist Login/Register


/*------------------------------
Expander – Opens & closes things with the .expand-this class
------------------------------*/
( function( $ ) {

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
( function( $ ) {

    var notice, noticeId, storedNoticeId, dismissButtonTwo;

    notice = document.querySelector( '.dismissible-notice' );

    if ( !notice ) { return; }

    dismissButtonTwo   = document.querySelector( '#cta .dismiss-button' );
    noticeId        = notice.getAttribute( 'data-id' );
    storedNoticeId  = localStorage.getItem( 'lawyeristNotices' );

    if ( noticeId !== storedNoticeId ) {
  		notice.style.display = 'block';
  	}

    dismissButtonTwo.addEventListener( 'click', function() {
  		notice.style.display = 'none';
      localStorage.setItem( 'lawyeristNotices', noticeId );
    });
})( jQuery );

// End Dismissible Call to Action

/*------------------------------
Add Lightbox Class to Product Page Images
------------------------------*/
( function( $ ) {
  $( document ).ready( function() {
    $( '.single-product .woocommerce-product-gallery__image a').attr('data-lity','');
  });
})( jQuery );

/*------------------------------
Set max filesize for user profile picture
------------------------------*/
setTimeout(function(){
  var uploadField = document.getElementById("user-profile-pic");
  uploadField.onchange = function() {
      if(this.files[0].size > 50000){
          alert("Notice! Max file size is 50KB. Please choose a smaller image.");
          this.value = "";
      };
  };
}, 500)
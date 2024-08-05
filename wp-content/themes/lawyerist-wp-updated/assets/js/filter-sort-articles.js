( function( $ ) {
  if ( ! $('#articles.news-archive').length > 0 ) { return; }
  let selects       = $('#sort-articles .placeholder, #filter-articles .placeholder');
  let sortOptions   = $('#sort-articles li');
  let filterOptions = $('#filter-articles li.filter');
  let resetBtn      = $('.filters .reset');
  let pageLinks     = $('.page-links a');

  selects.click(function(e){
    $(this).toggleClass('menu-open');
    $(this).next().toggleClass('show-menu');
  });

  sortOptions.click(function(e){
    $(this).addClass('selected');
    sortOptions.not($(this)).removeClass('selected');
    $('#sort-articles ul').removeClass('show-menu');
    articles_ajax(e);
  });

  filterOptions.click(function(e){
    $(this).toggleClass('selected');
    if ($('#filter-articles .selected')) {
      resetBtn.show();
    } else {
      resetBtn.hide();
    }
    articles_ajax(e);
  });

  resetBtn.click(function(e){
    e.preventDefault();
    filterOptions.each(function(){
      $(this).removeClass('selected');
    });
    resetBtn.hide();
    $('#filter-articles ul').removeClass('show-menu');
    articles_ajax();
  });

  pageLinks.click(function(e){
    e.preventDefault();
    articles_ajax(e);
  });

  function stored_articles_ajax() {

    // create our object with cookie data
    let storedData = {
      'orderBy'     : Cookies.get('orderby'),
      'order'       : Cookies.get('order'),
      'cat'         : Cookies.get('cat'),
      'pageSetting' : Cookies.get('target_page')
    };
    // checks to see if cookie data has been set
    if( storedData.orderBy || storedData.order || storedData.cat || storedData.pageSetting ) {
      var catArray = storedData.cat.replace('[', '').replace(']', '').split(',');
      var orderString = storedData.orderBy + ',' + storedData.order;
      // make our ajax call with stored cookie data
      articles_ajax(null, storedData);

      //leave sortby selected if still active after page reload
      if( orderString.length > 0) {
        $('#sort-articles li').each(function(index, item) {
          if( orderString == $(item).data('sort_selection')) {
            $(item).addClass('selected');
          } else {
            $(item).removeClass('selected');
          }
        });
      }

      // leave filters selected if still active after page reload
      if( catArray.length > 0) {
        $('#filter-articles .filter').each(function(index, item) {
          $(catArray).each(function(indexCat, itemCat) {
            if( itemCat == $(item).data('cat_id') ) {
              $(item).addClass('selected');
              resetBtn.show();
            }
          })
        });
      }
    }
  }
  // check for filter cookies on load
  $(document).ready(stored_articles_ajax);

  function articles_ajax(e, storedFilterData) {
    let sortBy  = $('#sort-articles .selected').data('sort_selection').split( ',' );
    let catIds  = [];
    $('#filter-articles .selected').each(function(){
      catIds.push($( this ).data('cat_id'));
    });
    let currentPage   = $('.page-numbers.current').html();
    let targetPage    = 0;

    if ( e && e.target.tagName == 'A' ) {
      let urlSegments = $(e.target).attr('href').split('/');
      targetPage  = urlSegments.pop() || urlSegments.pop();
    }
    // set our data to pass in ajax call -note update to use storedFilterData if it exists
    let data = {
        action: 'sort_filter_articles',
        nonce: $('#articles').attr( 'data-nonce' ),
        query_vars: vars.query_vars,
        orderby: storedFilterData !== undefined && storedFilterData.orderBy !== undefined ? storedFilterData.orderBy : sortBy[ 0 ],
        order: storedFilterData !== undefined && storedFilterData.order !== undefined ? storedFilterData.order : sortBy[ 1 ],
        cat: storedFilterData !== undefined && storedFilterData.cat !== undefined ? storedFilterData.cat : (catIds ? catIds : null),
        target_page: storedFilterData !== undefined && storedFilterData.pageSetting !== undefined ? storedFilterData.pageSetting : (targetPage ? targetPage : currentPage)
    }
    //perform ajax call to update posts
    $.ajax({
      type: "post",
      url: vars.ajaxurl,
      data: data,
      beforeSend: function() {      
        $( '#all-articles *' ).remove();
        $( '#all-articles' ).scrollTop();
        $( '#all-articles' ).append( '<p class="loader">Loading posts &hellip;</p>' );
      },
      success: function( response ) {
        Cookies.set('orderby', sortBy[0] );
        Cookies.set('order', sortBy[1] );
        Cookies.set('cat', catIds ? catIds : null );
        Cookies.set('target_page', targetPage ? targetPage : currentPage );
        $( '#all-articles *' ).remove();
        $( '#all-articles' ).append( response );
      },
      failure: function() {
        $( '#all-articles' ).append( '<p class="error-message">Couldn\'t load posts.</p>' );
      }
    });
  }

  $(document).ajaxComplete(function(){
    pageLinks = $('.page-links a');
    pageLinks.click(function(e){
      e.preventDefault();
      articles_ajax(e);
    });
  });

})( jQuery );

( function( $ ) {
  if ( ! $('#articles.podcasts').length > 0 ) { return; }

  let sort          = $('#sort-podcasts .placeholder, #filter-podcasts .placeholder');
  let sortOptions   = $('#sort-podcasts li');
  let filterOptions = $('#filter-podcasts li.filter');
  let resetBtn      = $('.filters .reset');
  let pageLinks     = $('.page-links a');

  sort.click(function(e){
    $(this).toggleClass('menu-open');
    $(this).next().toggleClass('show-menu');
  });

  sortOptions.click(function(e){
    $(this).addClass('selected');
    sortOptions.not($(this)).removeClass('selected');
    $('#sort-podcasts ul').removeClass('show-menu');
    podcasts_ajax(e);
  });

  filterOptions.click(function(e){
    $(this).toggleClass('selected');
    if ($('#filter-podcasts .selected')) {
      resetBtn.show();
    } else {
      resetBtn.hide();
    }
    podcasts_ajax(e);
  });

  resetBtn.click(function(e){
    e.preventDefault();
    filterOptions.each(function(){
      $(this).removeClass('selected');
    });
    resetBtn.hide();
    $('#filter-podcasts ul').removeClass('show-menu');
    podcasts_ajax();
  });

  pageLinks.click(function(e){
    e.preventDefault();
    podcasts_ajax(e);
  });

  function stored_podcasts_ajax() {

    // create our object with cookie data
    let storedPodcastData = {
      'orderBy'     : Cookies.get('pod-orderby'),
      'order'       : Cookies.get('pod-order'),
      'tag'         : Cookies.get('pod-tag'),
      'pageSetting' : Cookies.get('pod-target_page')
    };
    
    // checks to see if cookie data has been set
    if( storedPodcastData.orderBy || storedPodcastData.order || storedPodcastData.tag || storedPodcastData.pageSetting ) {
      var tagArray = storedPodcastData.tag.replace('[', '').replace(']', '').split(',');
      if( storedPodcastData.tag !== "[]") {
        storedPodcastData.tag = tagArray;   
      }
      
      var orderString = storedPodcastData.orderBy + ',' + storedPodcastData.order;
      // make our ajax call with stored cookie data
      podcasts_ajax(null, storedPodcastData);

      //leave sortby selected if still active after page reload
      if( orderString.length > 0) {
        $('#sort-podcasts li').each(function(index, item) {
          if( orderString == $(item).data('sort_selection')) {
            $(item).addClass('selected');
          } else {
            $(item).removeClass('selected');
          }
        });
      }

      // leave tags selected if still active after page reload
      if( tagArray.length > 0) {
        $('#filter-podcasts .filter').each(function(index, item) {
          $(tagArray).each(function(indexTag, itemTag) {
            if( itemTag == $(item).data('sort-tag-id') ) {
              $(item).addClass('selected');
              resetBtn.show();
            }
          })
        });
      }
    }
  }
  // check for filter cookies on load
  $(document).ready(stored_podcasts_ajax);
  
  function podcasts_ajax(e, storedFilterData) {
    let sortBy  = $('#sort-podcasts .selected').data('sort_selection').split( ',' );
    let tagIds  = [];

      $('#filter-podcasts .selected').each(function(){
        tagIds.push($( this ).data('sort-tag-id'));
      });
    
    let currentPage   = $('.page-numbers.current').html();
    let targetPage    = 0;

    if ( e && e.target.tagName == 'A' ) {
      let urlSegments = $(e.target).attr('href').split('/');
      targetPage  = urlSegments.pop() || urlSegments.pop();
    }

    Cookies.set('pod-orderby', sortBy[0] );
    Cookies.set('pod-order', sortBy[1] );
    Cookies.set('pod-tag', tagIds ? tagIds : null );
    Cookies.set('pod-target_page', targetPage ? targetPage : currentPage );

    // set our data to pass in ajax call -note update to use storedFilterData if it exists
    let data = {
      action: 'sort_podcasts',
      nonce: $('#articles').attr( 'data-nonce' ),
      query_vars: 'podcasts',
      orderby: storedFilterData !== undefined && storedFilterData.orderBy !== undefined ? storedFilterData.orderBy : sortBy[ 0 ],
      order: storedFilterData !== undefined && storedFilterData.order !== undefined ? storedFilterData.order : sortBy[ 1 ],
      tag: storedFilterData !== undefined && storedFilterData.tag !== undefined ? storedFilterData.tag : (tagIds ? tagIds : null),
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
        $( '#all-articles' ).append( '<p class="loader">Loading episodes &hellip;</p>' );
      },
      success: function( response ) {
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
      podcasts_ajax(e);
    });
  });
})( jQuery );

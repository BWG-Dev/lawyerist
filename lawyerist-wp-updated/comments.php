<?php
function add_partner_responses() {
    // Get partner company from user meta
    $user_ID = get_current_user_id();
    $partner_meta = "lpd_partner";
    $partner_url = get_user_meta( $user_ID, 'lpd_partner_product');
    $partner_page = get_user_meta( $user_ID, $partner_meta );
    $partner_title = $partner_page[0];
    $partner_id = url_to_postid( $partner_url[0] );
    $current_id = get_the_ID();
    
    // Add class if current page is partner's product page
    // Class controls visibility, only visible if class exists
    if ( $partner_id == $current_id ) { ?>
        <script>
            console.log('partners page');
            ( function( $ ) {
                $( document ).ready( function() {
                    $('div.reply').addClass('is-page-partner');
                });
            })( jQuery );
        </script>
        <?php
    }
}

function load_comments() { ?>
    <script>
        ( function( $ ) {
            $("#comments_container").on("click", "#add-more-comments .comments_loadmore", function() {
                event.preventDefault();
                $(this).parent().prevAll(".wp_review_comment").addClass("show-all");
                $(this).parent().addClass("comments-loaded");
            });
        })( jQuery );
    </script>
<?php }

// Display comments
$comment_args = array( 
    'reverse_top_level' => true
);
wp_list_comments( $comment_args ); 
// Control inline commenting visibility
add_partner_responses(); 
?>
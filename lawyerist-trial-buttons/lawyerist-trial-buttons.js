// vars used in multiple fns
let tb_filter;
let tb_filter_val;
let tb_last_sort;
let tb_timer;

if ( typeof( acf ) == 'object' ) {

    acf.add_action('ready', function( $el ){

        /**
         * JS for trial button form on edit post
         */

        // set placeholder button text to global default
        let tb_text = $el.find('#acf-field_5ae89c85f1002');
        tb_text.attr('placeholder', trial_buttons_data.default_text);

        // display the global utm parameters if they are in use
        if ( trial_buttons_data.utm != '' ) {
            let tb_url = $el.find('div.acf-field-5ae89c67f1001 .acf-input-wrap');
            tb_url.append('<p style="margin-bottom:0;">' + trial_buttons_data.utm + '</p>');
        }

        // display click statistics markup
        let tb_box = $el.find('#acf-group_5ae89b7bb2a12 .acf-fields');
        tb_box.append(
            '<div class="acf-field">' +
                '<div class="acf-label"><p style="margin:0 0 3px;font-weight:bold;">Click Stats</p></div>' +
                '<div class="acf-input">' +
                    '<div id="tb-click-stats" class="acf-input-wrap">' +
                        '<div id="tb-report-loading"><span>Loading...</span></div>' +
                    '</div>' +
                '</div>' +
            '</div>'
        );

        /**
         * JS for report on options page
         */

        let filter_box = $el.find('div.acf-field-5af4517d350fc');
        filter_box.append(
            '<div id="tb-report-loading"><span>Loading...</span></div>' +
            '<div id="tb-report"></div>'
        );

    });


    acf.add_action('load', function( $el ) {

        /**
         * JS for trial button form on edit post
         */

        // make ajax request for click stats
        let stats_request_data = {
            'action': 'trial_button_click_stats',
        };
        jQuery.extend(stats_request_data, stats_request_data, trial_buttons_data);
        jQuery.post(trial_buttons_data.ajax_url, stats_request_data, function(response) {
            jQuery('#tb-click-stats').html( response );
            jQuery( document.body ).trigger( 'post-load' );
        });

        /**
         * JS for report on options page
         */

        // filter field
        tb_filter = $el.find('#acf-field_5af4517d350fc');
        // disable js confirm on field change, as it does so even with a new field
        tb_filter.append(
            '<script type="text/javascript">acf.unload.active = false;</script>' +
            '<input type="hidden" id="tb_sort" name="tb_sort" value="Title">' +
            '<input type="hidden" id="tb_sort_dir" name="tb_sort_dir" value="asc">'
        );
        tb_filter.focus();
        tb_filter.on('keyup',function(){
            tb_timed_load_report();
        });

        // initial load
        tb_options_publish_button();
        tb_load_report();
    });


    // actions to run on showing fields
    acf.add_action('show_field', function( $field, context ){
        // show/hide publish button when tabs are used to toggle fields
        if (context == 'tab') {
            tb_options_publish_button();
        }
    });

}


function tb_load_report() {
    jQuery('#tb-report-loading').css('opacity','1');
    // make ajax request for click report with current filter and sort data
    tb_filter_val = tb_filter.val();
    let tb_sort = jQuery('#tb_sort').val();
    tb_last_sort = tb_sort;
    let tb_sort_dir = jQuery('#tb_sort_dir').val();
    let report_request_data = {
        'action': 'trial_button_click_report',
        'filter': tb_filter_val,
        'sort': tb_sort,
        'sort_dir': tb_sort_dir,
    };
    jQuery.extend(report_request_data, report_request_data, trial_buttons_data);
    jQuery.post(trial_buttons_data.ajax_url, report_request_data, function(response) {
        jQuery('#tb-report').html( response );
        jQuery('#tb-report-loading').css('opacity','0');

        // handle sorting on column headers click
        jQuery('#tb-report th span').on('click',function(){
            // set new sort column to form
            let sort_data = jQuery(this).data();
            jQuery('#tb_sort').val(sort_data.sort);
            if ( tb_last_sort == sort_data.sort ) {
                // current col was clicked; flip the sort order
                if (tb_sort_dir == 'desc') {
                    jQuery('#tb_sort_dir').val('asc');
                } else {
                    jQuery('#tb_sort_dir').val('desc');
                }
            }
            tb_load_report();
        });

        jQuery( document.body ).trigger( 'post-load' );
    });
}


function tb_timed_load_report() {
    // prevent loads in quick succession
    if (typeof tb_timer !== "undefined") {
        clearTimeout(tb_timer);
    }
    // load report if filter changed
    if (tb_filter.val() != tb_filter_val) {
        jQuery('#tb-report-loading').css('opacity','1');
        tb_timer = setTimeout('tb_load_report();', 200);
    }
}


function tb_options_publish_button() {
    let tab_report = jQuery('#acf-group_5ae892e2546b9 .acf-tab-group li:first-child');
    let publish_box = jQuery('#postbox-container-1');
    let post_body = jQuery('#poststuff #post-body.columns-2');
    // toggle based on report tab being active or not
    if (tab_report.hasClass('active')) {
        publish_box.css('display','none');
        post_body.css('margin-right','0');
    } else {
        publish_box.css('display','block');
        post_body.css('margin-right','300px');
    }
}
<?php

// Labster Portal Functionality

function do_labster_portal() {

add_action( 'gravityflow_pre_restart_workflow', 'sh_gravityflow_pre_restart_workflow', 10, 2);
    function sh_gravityflow_pre_restart_workflow($entry, $form) {

        unset($entries, $entry_id, $entry, $api, $workflow, $meta_key, $upload_link, $complete_status);
        $reset = "download";
        $pending = "pending";
        $approved = "approved";
        $workflow = "download";
        
    }

    // Check if user is logged in
    if ( is_user_logged_in() ) {
        $user_id = get_current_user_id(); 
    } else {
        $user_id = 0;
        return false;
    }

    // Create progress bar count data 
    $steps_completed = 'lab_steps_completed';
    $step_count = 0;
    $total_steps = 0;
    add_user_meta( $user_id, $steps_completed, $step_count );

    $sfs_meta = 'lp_start_scorecard';
    $sfs_start = 'Start Step';
    add_user_meta( $user_id, $sfs_meta, $sfs_start );

    $cv_meta = 'lp_start_corevalues';
    $cv_start = 'Start Step';
    add_user_meta( $user_id, $cv_meta, $cv_start );

    $vis_meta = 'lp_start_vision';
    $vis_start = 'Start Step';
    add_user_meta( $user_id, $vis_meta, $vis_start );

    ?>
<div class="column-holder">
    <div class="lp-upper">
        <div class="lab-portal-top">
            <?php // Assign post variables.
            $page_title = the_title( '', '', FALSE );

            // Breadcrumbs
            if ( function_exists( 'yoast_breadcrumb' ) ) {
                yoast_breadcrumb( '<div class="breadcrumbs">', '</div>' );
            }

            ?>
        </div>
        <div class="lab-portal-hero">
            <div id="column_container">
                <div id="content_column" class="lab-portal-hero_inner">    
                    <div class="lab-categories"> <!-- Main container -->
                        <span class="dashboard-intro"><?php the_field('dashboard_intro'); ?></span>
                        <?php if ( have_rows( 'category', 'option' ) ): 
                            while ( have_rows( 'category', 'option' ) ) : the_row();
                                $title = get_sub_field( 'category_title', 'option'  );
                                $intro = get_sub_field( 'category_intro', 'option'  );
                        ?>
                        <div class="accordions">
                            <div class="accordions_title">
                                <div class="accordions_title_cta">
                                    <div class="heart-container">
                                    <div class="heart">
                                        <svg class="radial-progress" data-percentage="82" viewBox="0 0 80 80">
                                            <circle class="incomplete" cx="40" cy="40" r="35"></circle>
                                            <circle class="complete" cx="40" cy="40" r="35" style="stroke-dashoffset: 39.58406743523136;"></circle>
                                        </svg>
                                    </div>
                                <span class="counter"></span>
                                          
                                <script>
                                    console.log('first working');
                                    $('svg.radial-progress').each(function( index, value ) { 
                                        $(this).find($('circle.complete')).removeAttr( 'style' );
                                    });

                                    $('svg.radial-progress').each(function( index, value ) { 
                                        console.log('second working');
                                        // Get percentage of progress
                                        percent = document.cookie;
                                        console.log(percent);
                                        // Get radius of the svg's circle.complete
                                        radius = $(this).find($('circle.complete')).attr('r');
                                        // Get circumference (2πr)
                                        circumference = 2 * Math.PI * radius;
                                        // Get stroke-dashoffset value based on the percentage of the circumference
                                        strokeDashOffset = circumference - ((percent * circumference) / 100);
                                        // Transition progress for 1.25 seconds
                                        $(this).find($('circle.complete')).animate({'stroke-dashoffset': strokeDashOffset}, 1250);
                                    });

                                </script>
                                </div>
                                    <h2>Healthy <?php echo $title; ?></h2>
                                    <span class="plus"></span>
                                </div>
                            </div>

                            <?php if ( have_rows( 'category_cards', 'option'  ) ): 
                                $card_count = 0;
                                $complete_card_count = 0;
                            ?>
                            <div class="accordions_content">
                                <span class="accordions_title_desc"><?php echo $intro; ?></span>
                                <div class="cards-container">
                                <?php while ( have_rows( 'category_cards', 'option'  ) ) : the_row(); 
                                    $total_steps++;
                                // ACF Variables
                                    $title_link = get_sub_field( 'card_link', 'option'  );
                                    $desc = get_sub_field( 'card_desc', 'option'  );
                                    $form = get_sub_field( 'card_form', 'option'  );
                                    $form_id = get_sub_field( 'card_id', 'option'  );
                                    $start_meta = get_sub_field( 'card_meta_start', 'option' );
                                    $upload_meta = get_sub_field( 'card_meta_upload', 'option' );
                                    $complete_meta = get_sub_field( 'card_meta_complete', 'option' );
                                    $sfs = ( $title_link['title'] == "Small Firm Scorecard");    // Small Firm Scorecard
                                    $cv = ( $title_link['title'] == "Core Values" );     // Core Values
                                    $vis = ( $title_link['title'] == "Vision" );    // Vision
                                
                                // Gravity Form Workflow steps
                                    $total_count = 1;

                                    $search_criteria[ 'field_filters' ][] = array(
                                        'key'		=> 'created_by',
                                        'value' => $user_id,
                                    );

                                    $sorting = array(
                                        'key'			=> 'date_created',
                                        'direction'		=> 'DESC',
                                    );

                                    $entries = GFAPI::get_entries( $form_id, $sorting, $search_criteria, $total_count );
                                    $entry_id = $entries[0]['id'];

                                    $entry = GFAPI::get_entry( $entry_id );
                                    $form_user = intval($entry["created_by"]);

                                    $api = new Gravity_Flow_API( $form_id );
                                    $workflow = $api->get_status( $entry );

                                    // User Meta
                                    $upload_link = get_user_meta( $user_id, $upload_meta );
                                    $complete_status = get_user_meta( $user_id, $complete_meta, $single = true );
                                    $is_complete = 'Step Completed';
                                    
                                    $start_step = "Start Step";

                              
                                    $card_count++; // count every card regardless of status
                                 ?>
                                    <div class="lp-card" id="card-count">
                                        <a class="title-link" href="<?php echo esc_url( $title_link['url'] ); ?>" title="<?php echo esc_attr( $title_link['title'] ); ?>"><?php echo esc_html( $title_link['title'] ); ?></a>
                                        <span class="card-desc"><?php echo $desc; ?></span>
                                        <div class="interact-box">
                                            <?php  if ( empty($form_id) ) { // Show step one for non-form CTAs ?>
                                                <div class="cta-icons">
                                                    <span class="icon step-one">&nbsp;</span>
                                                </div>
                                                <div class="cta-titles">
                                                    <span class="cta-link step-one">Action Needed</span>
                                                </div>
                                                <div class="cta-progress">
                                                    <div class="three-dots">
                                                        <span class="dot step-one current">&nbsp;</span>
                                                        <span class="dot step-two">&nbsp;</span>
                                                        <span class="dot step-three">&nbsp;</span>
                                                    </div>
                                                    <div class="cta-label">
                                                        <span class="label step-one">Incomplete</span>
                                                    </div>
                                                </div>
                                            <?php } else if ( ( $form_user !== $user_id ) || ( $workflow == "rejected" ) ) { // Show step one ?>
                                                <div class="cta-icons">
                                                    <span class="icon step-one">&nbsp;</span>
                                                </div>
                                                <div class="cta-titles">
                                                    <span class="cta-link step-one show-form">Submit</span>
                                                </div>
                                                <div class="cta-progress">
                                                    <div class="three-dots">
                                                        <span class="dot step-one current">&nbsp;</span>
                                                        <span class="dot step-two">&nbsp;</span>
                                                        <span class="dot step-three">&nbsp;</span>
                                                    </div>
                                                    <div class="cta-label">
                                                        <span class="label step-one">Incomplete</span>
                                                    </div>
                                                </div>
                                            <?php } else if ( ( $form_user == $user_id ) && ( ( $workflow == "pending" ) || ( $cv_pending == "pending" ) ) ) { // Show step two ?>
                                                <div class="cta-icons">
                                                    <span class="icon step-two">&nbsp;</span>
                                                </div>
                                                <div class="cta-titles">
                                                    <span class="cta-link step-two">Pending</span>
                                                </div>
                                                <div class="cta-progress">
                                                    <div class="three-dots">
                                                        <span class="dot step-one">&nbsp;</span>
                                                        <span class="dot step-two current">&nbsp;</span>
                                                        <span class="dot step-three">&nbsp;</span> 
                                                    </div>
                                                    <div class="cta-label">
                                                        <span class="label step-two">Active</span>
                                                    </div>
                                                </div>
                                            <?php } else if ( ( $form_user == $user_id ) && ( $complete_status == $is_complete ) ) { // Show step three ?>
                                                <?php // Add to the progress bar 
                                                    $step_count++; // main bar
                                                    update_user_meta( $user_id, $steps_completed, $step_count );
                            
                                                    $complete_card_count++; // section heart
                                                    update_user_meta( $user_id, $sub_steps_completed, $complete_card_count );
                                                ?>
                                                <div class="cta-icons">
                                                    <span class="icon step-three">&nbsp;</span>
                                                </div>
                                                <div class="cta-titles">
                                                    <a class="cta-link step-three" href="<?php echo esc_url( $upload_link[0] ); ?>" title="View Approved Submission" target="_blank">View</a>
                                                    <!--<span class="cta-link restart-step-one">Restart?</span>-->
                                                </div>
                                                <div class="cta-progress">
                                                    <div class="three-dots">
                                                        <span class="dot step-one">&nbsp;</span>
                                                        <span class="dot step-two">&nbsp;</span>
                                                        <span class="dot step-three current">&nbsp;</span> 
                                                    </div>
                                                    <div class="cta-label">
                                                        <span class="label step-three">Completed</span>
                                                    </div>
                                                </div>
                                            <?php } ?>    
                                        </div>
                                        <div class="cta-form hidden-form" id="<?php echo $form_id; ?>">
                                            <?php echo $form; ?>
                                        </div>
                                    </div>
                                    <?php $card_count++; // count every card regardless of status
                                        $complete_card_count;
                                    ?>
                                <?php endwhile; ?>
                                </div>
                            </div>
                            <?php                                 
                                $sub_progress_count = intval( ( $complete_card_count / $card_count ) * 100 ); 
                                
                                // Initialize cookie name 
                                $cookie_name = "heart-progress"; 
                                $cookie_value = $complete_card_count; 
                                
                                // Set cookie 
                                setcookie($cookie_name, $cookie_value); 
                            ?>
                            <?php endif; ?><!-- end cards -->
                        </div>
                        <?php endwhile;
                        endif;  ?> <!-- end category -->
                    </div>
                </div>
            </div>
        </div>
        <?php // calculate progress bar width 
            $progress_count = intval( ( $step_count / $total_steps ) * 100 );
        

        ?>
        <div class="lab-portal-top_container">
            <h1 class="headline entry-title">Welcome to Your <?php echo $page_title; ?>!</h1>
            <div class="progress-holder">
                <span class="progress-holder_label">You're <?php echo $progress_count; ?>% of the way along your Small Firm Roadmap</span>
                <div class="progress-holder_container">
                    <div class="progress-bar" style="width: <?php if ( $progress_count > 6 ) { echo $progress_count . "%"; } else { echo "20px"; } ?>"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }


add_shortcode( 'labster_portal', 'do_labster_portal' );



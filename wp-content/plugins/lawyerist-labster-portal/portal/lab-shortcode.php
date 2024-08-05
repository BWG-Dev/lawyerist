<?php /* Shortcode to add user link to labster page */

function make_lab_portal_work() {

    if ( is_user_logged_in() ) {
        $user_id = get_current_user_id(); 
    } else {
        $user_id = 0;
        return false;
    }

    $search_criteria[ 'field_filters' ][] = array(
        'key'		=> 'created_by',
        'value' => $user_id,
    );

    $sorting = array(
        'key'			=> 'date_created',
        'direction'		=> 'DESC',
    );

    // Create progress bar count data 
    $steps_completed = 'lab_steps_completed';
    $step_count = 0;
    $total_steps = 0;
    add_user_meta( $user_id, $steps_completed, $step_count );


    function card_is_active($this_form) {
        $form_id = $this_form;
        ?>
            <div class="cta-icons">
                <span class="icon step-one">&nbsp;</span>
            </div>
            <?php if ( !empty( $form_id ) ) { ?>
                <div class="cta-titles">
                    <span class="cta-link step-one interact-link">Submit</span>
                </div>
            <?php } else { ?>
                <div class="cta-titles">
                    <span class="cta-link step-one">Action Needed</span>
                </div>
            <?php } ?>
            <div class="cta-progress">
                <div class="three-dots">
                    <span class="dot step-one current">&nbsp;</span>
                    <span class="dot step-two">&nbsp;</span>
                    <span class="dot step-three">&nbsp;</span>
                </div>
                <div class="cta-label">
                    <span class="label step-one">To-Do</span>
                </div>
            </div>
        <?php
    }

    /*function card_is_pending() {
        ?>
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
        <?php
    }*/

    function card_is_complete($this_form) {
        $form_id = $this_form;
        ?>
            <div class="cta-icons">
                    <span class="icon step-three">&nbsp;</span>
            </div>
            <div class="cta-titles">
                <span class="cta-link step-three">Complete</span>
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
        <?php
    }

    function card_is_complete_download($this_form, $meta_term, $user_id) {
        $form_id = $this_form;
        $download_meta = $meta_term;
        $download_link = get_user_meta( $user_id, $download_meta );

        ?>
            <div class="cta-icons">
                    <span class="icon step-three">&nbsp;</span>
            </div>
            <?php if ( !empty( $form_id ) ) { ?>
                <div class="cta-titles">
                    <a class="cta-link step-three interact-link" href="<?php echo esc_url( $download_link[0] ); ?>" title="View Approved Submission" target="_blank">View</a>
                    <!--<span class="cta-link restart-step-one">Restart?</span>-->
                </div>
            <?php } ?>
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
        <?php
    }

?>

<div class="column-holder">
    <div class="lp-upper">
        <div class="lab-portal-hero">
            <div id="column_container">
                <div id="content_column" class="lab-portal-hero_inner">    
                    <div class="lab-categories"> <!-- Main container -->
                        <span class="dashboard-intro"><?php the_field('dashboard_intro, option'); ?></span>

                        <div class="accordions"> <!-- Firm -->
                            <div class="accordions_title">
                                <div class="accordions_title_cta">
                                    <div class="heart-container">
                                        <div class="heart">
                                          <?php // Progress circle variables
                                          
                                            $firm_cat_steps = 1;
                                            $sfs_status        =   get_field( 'sfs-card_status' );
                                            $complete = "Complete";
                                            $firm_complete = 0;
                                            $firm_steps = array(
                                              $sfs_status,
                                            );
                                            foreach ($firm_steps as $firm_step) {
                                              if ( $firm_step == $complete ) {
                                                $firm_complete++;
                                              }
                                            }
                                            $firm_percent = intval(( $firm_complete / $firm_cat_steps ) * 100);
                                            $firm_class = 'p' . $firm_percent;
                                            ?>
                                            <div class="progress-circle <?php echo $firm_class; ?> <?php if ($firm_percent >= 50) { echo 'over50'; } ?> ">
                                                <span><?php echo $firm_percent; ?>%</span>
                                                <div class="left-half-clipper">
                                                    <div class="first50-bar"></div>
                                                    <div class="value-bar"></div>
                                                </div>
                                            </div>
                                           
                                        </div>
                                    </div>
                                    <h2>Healthy <?php the_field('firm-category_title', 'option'); ?></h2>
                                    <span class="plus"></span>
                                </div>
                            </div>

                            <?php if ( have_rows( 'firm-category_cards', 'option'  ) ): 
                                $card_count = 0;
                                $complete_card_count = 0;
                            ?>
                            <div class="accordions_content"> <!-- Small Firm Scorecard -->
                                <span class="accordions_title_desc"><?php the_field('firm-category_intro', 'option'); ?></span>
                                <div class="cards-container">
                                    <?php while ( have_rows( 'firm-category_cards', 'option'  ) ) : the_row(); 
                                        $total_steps++;
                                    // ACF Variables: Small Firm Scorecard
                                        $sfs_title_link     =   get_sub_field( 'sfs-card_title', 'option'  );
                                        $sfs_desc           =   get_sub_field( 'sfs-card_description', 'option' );
                                        $sfs_formid         =   get_sub_field( 'sfs-card_form_id', 'option' );
                                        $sfs_form           =   get_sub_field( 'sfs-card_form', 'option' );
                                        $sfs_status         =   get_field( 'sfs-card_status' );
                                        $total_count        =   1;

                                    ?>
                                    <?php 
                                        $card_count++; // count every card regardless of status
                                    ?>
                                        <div class="lp-card" id="card-count">
                                            <a class="title-link" href="<?php echo esc_url( $sfs_title_link['url'] ); ?>" title="<?php echo esc_attr( $sfs_title_link['title'] ); ?>"><?php echo esc_html( $sfs_title_link['title'] ); ?></a>
                                            <span class="card-desc"><?php echo $sfs_desc; ?></span>
                                            <div class="interact-box">
                                                <?php if ( ( $sfs_status === "Complete" ) ) { // Show step three ?>
                                                    <?php // Add to the progress bar 
                                                        $step_count++; // main bar
                                                        update_user_meta( $user_id, $steps_completed, $step_count );
                                
                                                        $complete_card_count++; // section heart
                                                        update_user_meta( $user_id, $sub_steps_completed, $complete_card_count );
                                                    
                                                        card_is_complete($sfs_formid);
                                                } else { // Card is  active 
                                                    card_is_active($sfs_formid);
                                                }    ?>    
                                            </div>
                                            <?php if ( !empty( $sfs_formid ) ) { ?>
                                                <div class="cta-form hidden-form" id="<?php echo $sfs_formid; ?>">
                                                    <?php echo $sfs_form; ?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    <?php 
                                        $card_count++; // count every card regardless of status
                                        $complete_card_count;
                                    endwhile; ?>
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
                        
                        
                        <div class="accordions"> <!-- Strategy -->
                            <div class="accordions_title">
                                <div class="accordions_title_cta">
                                    <div class="heart-container">
                                       <div class="heart">
                                          <?php // Progress circle variables
                                          
                                            $strat_cat_steps = 5;
                                            $cv_status         =   get_field( 'cv-card_status' );
                                            $vis_status         =   get_field( 'vis-card_status' );
                                            $bus_status         =   get_field( 'bus-card_status' );
                                            $tyt_status         =   get_field( 'tyt-card_status' );
                                            $oyr_status         =   get_field( 'oyr-card_status' );
                                            $complete = "Complete";
                                            $strat_complete = 0;
                                            $strat_steps = array(
                                                $cv_status,
                                                $vis_status,
                                                $bus_status,
                                                $tyt_status,
                                                $oyr_status
                                            );
                                            foreach ($strat_steps as $strat_step) {
                                              if ( $strat_step == $complete ) {
                                                $strat_complete++;
                                              }
                                            }
                                            $strat_percent = intval(( $strat_complete / $strat_cat_steps ) * 100);
                                            $strat_class = 'p' . $strat_percent;
                                            ?>
                                            <div class="progress-circle <?php echo $strat_class; ?> <?php if ($strat_percent >= 50) { echo 'over50'; } ?> ">
                                                <span><?php echo $strat_percent; ?>%</span>
                                                <div class="left-half-clipper">
                                                    <div class="first50-bar"></div>
                                                    <div class="value-bar"></div>
                                                </div>
                                            </div>
                                           
                                        </div>
                                    </div>
                                    <h2>Healthy <?php the_field('strategy-category_title', 'option'); ?></h2>
                                    <span class="plus"></span>
                                </div>
                            </div>

                            <?php if ( have_rows( 'strategy-category_cards', 'option'  ) ): 
                                $card_count = 0;
                                $complete_card_count = 0;
                            ?>
                            <div class="accordions_content">
                                <span class="accordions_title_desc"><?php the_field('strategy-category_intro', 'option'); ?></span>
                                <div class="cards-container">
                                    <?php while ( have_rows( 'strategy-category_cards', 'option'  ) ) : the_row(); 
                                        $total_steps++;
                                    // ACF Variables: Core Values - Use Form
                                        $cv_title_link     =   get_sub_field( 'cv-card_title', 'option'  );
                                        $cv_desc           =   get_sub_field( 'cv-card_description', 'option' );
                                        $cv_formid         =   get_sub_field( 'cv-card_form_id', 'option' );
                                        $cv_form           =   get_sub_field( 'cv-card_form', 'option' );
                                        $cv_status         =   get_field( 'cv-card_status' );
                                        $total_count        =   1;

                                        $cv_meta = 'lp_upload_corevalues';

                                        // Gravity Form Workflow steps

                                        $cv_entries = GFAPI::get_entries( $cv_formid, $sorting, $search_criteria, $total_count );
                                        $cv_entry_id = $cv_entries[0]['id'];

                                        $cv_entry = GFAPI::get_entry( $cv_entry_id );

                                    ?>
                                    <?php 
                                        $card_count++; // count every card regardless of status
                                    ?>
                                        <div class="lp-card" id="card-count">
                                            <a class="title-link" href="<?php echo esc_url( $cv_title_link['url'] ); ?>" title="<?php echo esc_attr( $cv_title_link['title'] ); ?>"><?php echo esc_html( $cv_title_link['title'] ); ?></a>
                                            <span class="card-desc"><?php echo $cv_desc; ?></span>
                                            
                                            <div class="interact-box">
                                                <?php if ( ( $cv_status === "Complete" )  ) { // Show step three
                                                    card_is_complete_download($cv_formid, $cv_meta, $user_id);
                                                    
                                                    // Add to the progress bar 
                                                    $step_count++; // main bar
                                                    update_user_meta( $user_id, $steps_completed, $step_count );
                            
                                                    $complete_card_count++; // section heart
                                                    update_user_meta( $user_id, $sub_steps_completed, $complete_card_count );
                                                } else { // Card is active 
                                                    card_is_active($cv_formid);
                                                } ?>    
                                            </div>
                                            <?php if ( !empty( $cv_formid ) ) { ?>
                                                <div class="cta-form hidden-form" id="<?php echo $cv_formid; ?>">
                                                    <?php echo $cv_form; ?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    <?php 
                                        $card_count++; // count every card regardless of status
                                        $complete_card_count;
                                    
                                    endwhile; ?>
                                    <?php while ( have_rows( 'strategy-category_cards', 'option'  ) ) : the_row(); 
                                        $total_steps++;
                                    // ACF Variables: Vision - Use Form
                                        $vis_title_link     =   get_sub_field( 'vis-card_title', 'option'  );
                                        $vis_desc           =   get_sub_field( 'vis-card_description', 'option' );
                                        $vis_formid         =   get_sub_field( 'vis-card_form_id', 'option' );
                                        $vis_form           =   get_sub_field( 'vis-card_form', 'option' );
                                        $vis_status         =   get_field( 'vis-card_status' );
                                        $total_count        =   1;

                                        $vis_meta = 'lp_upload_vision';

                                        // Gravity Form Workflow steps

                                        $vis_entries = GFAPI::get_entries( $vis_formid, $sorting, $search_criteria, $total_count );
                                        $vis_entry_id = $vis_entries[0]['id'];

                                        $vis_entry = GFAPI::get_entry( $vis_entry_id );
                                    ?>
                                    <?php 
                                        $card_count++; // count every card regardless of status
                                    ?>
                                        <div class="lp-card" id="card-count">
                                            <a class="title-link" href="<?php echo esc_url( $vis_title_link['url'] ); ?>" title="<?php echo esc_attr( $vis_title_link['title'] ); ?>"><?php echo esc_html( $vis_title_link['title'] ); ?></a>
                                            <span class="card-desc"><?php echo $vis_desc; ?></span>
                                            <div class="interact-box">
                                                <?php 
                                                if ( ( $vis_status === "Complete" ) ) { // Show step three 
                                                    card_is_complete_download($vis_formid, $vis_meta, $user_id);
                                                    // Add to the progress bar 
                                                    $step_count++; // main bar
                                                    update_user_meta( $user_id, $steps_completed, $step_count );
                            
                                                    $complete_card_count++; // section heart
                                                    update_user_meta( $user_id, $sub_steps_completed, $complete_card_count );
                                                } else { // Card is  active 
                                                    card_is_active($vis_formid);
                                                } ?>    
                                            </div>

                                            <?php if ( !empty( $vis_formid ) ) { ?>
                                                <div class="cta-form hidden-form" id="<?php echo $vis_formid; ?>">
                                                    <?php echo $vis_form; ?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    <?php 
                                        $card_count++; // count every card regardless of status
                                        $complete_card_count;
                                        
                                    endwhile; ?>
                                    <?php while ( have_rows( 'strategy-category_cards', 'option'  ) ) : the_row(); 
                                        $total_steps++;
                                    // ACF Variables: Business Model - Use Form
                                        $bus_title_link     =   get_sub_field( 'bus-card_title', 'option'  );
                                        $bus_desc           =   get_sub_field( 'bus-card_description', 'option' );
                                        $bus_formid         =   get_sub_field( 'bus-card_form_id', 'option' );
                                        $bus_form           =   get_sub_field( 'bus-card_form', 'option' );
                                        $bus_status         =   get_field( 'bus-card_status' );
                                        $total_count        =   1;

                                        $bus_meta = 'lp_upload_busmodel';

                                        // Gravity Form Workflow steps

                                        $bus_entries = GFAPI::get_entries( $bus_formid, $sorting, $search_criteria, $total_count );
                                        $bus_entry_id = $bus_entries[0]['id'];

                                        $bus_entry = GFAPI::get_entry( $bus_entry_id );
                                    ?>
                                    <?php 
                                        $card_count++; // count every card regardless of status
                                    ?>
                                        <div class="lp-card" id="card-count">
                                            <a class="title-link" href="<?php echo esc_url( $bus_title_link['url'] ); ?>" title="<?php echo esc_attr( $bus_title_link['title'] ); ?>"><?php echo esc_html( $bus_title_link['title'] ); ?></a>
                                            <span class="card-desc"><?php echo $bus_desc; ?></span>

                                            <div class="interact-box">
                                                <?php if ( ( $bus_status === "Complete" )  ) { // Show step three
                                                    card_is_complete_download($bus_formid, $bus_meta, $user_id);
                                                    
                                                    // Add to the progress bar 
                                                    $step_count++; // main bar
                                                    update_user_meta( $user_id, $steps_completed, $step_count );
                            
                                                    $complete_card_count++; // section heart
                                                    update_user_meta( $user_id, $sub_steps_completed, $complete_card_count );
                                                } else { // Card is active 
                                                    card_is_active($bus_formid); 
                                                } ?>    
                                            </div>
                                            <?php if ( !empty( $bus_formid ) ) { ?>
                                                <div class="cta-form hidden-form" id="<?php echo $bus_formid; ?>">
                                                    <?php echo $bus_form; ?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    <?php 
                                        $card_count++; // count every card regardless of status
                                        $complete_card_count;
                                        
                                    endwhile; ?>
                                    <?php while ( have_rows( 'strategy-category_cards', 'option'  ) ) : the_row(); 
                                        $total_steps++;
                                    // ACF Variables: 3 Year Targets - Use Form
                                        $tyt_title_link     =   get_sub_field( 'tyt-card_title', 'option'  );
                                        $tyt_desc           =   get_sub_field( 'tyt-card_description', 'option' );
                                        $tyt_formid         =   get_sub_field( 'tyt-card_form_id', 'option' );
                                        $tyt_form           =   get_sub_field( 'tyt-card_form', 'option' );
                                        $tyt_status         =   get_field( 'tyt-card_status' );
                                        $total_count        =   1;

                                        $tyt_meta = 'lp_upload_3ytarget';

                                        // Gravity Form Workflow steps

                                        $tyt_entries = GFAPI::get_entries( $tyt_formid, $sorting, $search_criteria, $total_count );
                                        $tyt_entry_id = $tyt_entries[0]['id'];

                                        $tyt_entry = GFAPI::get_entry( $tyt_entry_id );

                                    ?>
                                    <?php 
                                        $card_count++; // count every card regardless of status
                                    ?>
                                        <div class="lp-card" id="card-count">
                                            <a class="title-link" href="<?php echo esc_url( $tyt_title_link['url'] ); ?>" title="<?php echo esc_attr( $tyt_title_link['title'] ); ?>"><?php echo esc_html( $tyt_title_link['title'] ); ?></a>
                                            <span class="card-desc"><?php echo $tyt_desc; ?></span>
                                            <div class="interact-box">
                                                <?php if ( ( $tyt_status === "Complete" )  ) { // Show step three
                                                    card_is_complete_download($tyt_formid, $tyt_meta, $user_id);
                                                    
                                                    // Add to the progress bar 
                                                    $step_count++; // main bar
                                                    update_user_meta( $user_id, $steps_completed, $step_count );
                            
                                                    $complete_card_count++; // section heart
                                                    update_user_meta( $user_id, $sub_steps_completed, $complete_card_count );
                                                } else { // Card is active 
                                                    card_is_active($tyt_formid);
                                                } ?>    
                                            </div>
                                            <?php if ( !empty( $tyt_formid ) ) { ?>
                                                <div class="cta-form hidden-form" id="<?php echo $tyt_formid; ?>">
                                                    <?php echo $tyt_form; ?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    <?php 
                                        $card_count++; // count every card regardless of status
                                        $complete_card_count;
                                        
                                    endwhile; ?>
                                    <?php while ( have_rows( 'strategy-category_cards', 'option'  ) ) : the_row(); 
                                        $total_steps++;
                                    // ACF Variables: 1 Year Rocks
                                        $oyr_title_link     =   get_sub_field( 'oyr-card_title', 'option'  );
                                        $oyr_desc           =   get_sub_field( 'oyr-card_description', 'option' );
                                        $oyr_formid         =   get_sub_field( 'oyr-card_form_id', 'option' );
                                        $oyr_form           =   get_sub_field( 'oyr-card_form', 'option' );
                                        $oyr_status         =   get_field( 'oyr-card_status' );
                                        $total_count        =   1;

                                    ?>
                                    <?php 
                                        $card_count++; // count every card regardless of status
                                    ?>
                                        <div class="lp-card" id="card-count">
                                            <a class="title-link" href="<?php echo esc_url( $oyr_title_link['url'] ); ?>" title="<?php echo esc_attr( $oyr_title_link['title'] ); ?>"><?php echo esc_html( $oyr_title_link['title'] ); ?></a>
                                            <span class="card-desc"><?php echo $oyr_desc; ?></span>
                                            <div class="interact-box">
                                                <?php if ( ( $oyr_status === "Complete" ) ) { // Show step three  
                                                    // Add to the progress bar 
                                                    $step_count++; // main bar
                                                    update_user_meta( $user_id, $steps_completed, $step_count );
                            
                                                    $complete_card_count++; // section heart
                                                    update_user_meta( $user_id, $sub_steps_completed, $complete_card_count );
                                                
                                                    card_is_complete($oyr_formid);
                                                } else { // Card is  active 
                                                    card_is_active($oyr_formid);
                                                } ?>    
                                            </div>
                                            <?php if ( !empty( $oyr_formid ) ) { ?>
                                                <div class="cta-form hidden-form" id="<?php echo $oyr_formid; ?>">
                                                    <?php echo $oyr_form; ?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    <?php 
                                        $card_count++; // count every card regardless of status
                                        $complete_card_count;
                                        
                                    endwhile; ?>
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

                        <div class="accordions"> <!-- Team -->
                            <div class="accordions_title">
                                <div class="accordions_title_cta">
                                     <div class="heart-container">
                                       <div class="heart">
                                          <?php // Progress circle variables
                                          
                                            $team_cat_steps = 5;
                                            $act_status         =   get_field( 'act-card_status' );
                                            $hms_status         =   get_field( 'hms-card_status' );
                                            $omrs_status         =   get_field( 'omrs-card_status' );
                                            $oyfs_status         =   get_field( 'oyfs-card_status' );
                                            $okpi_status         =   get_field( 'okpi-card_status' );
                                            
                                            $complete = "Complete";
                                            $team_complete = 0;
                                            $team_steps = array(
                                                $act_status,
                                                $hms_status,
                                                $omrs_status,
                                                $oyfs_status,
                                                $okpi_status
                                            );
                                            foreach ($team_steps as $team_step) {
                                              if ( $team_step == $complete ) {
                                                $team_complete++;
                                              }
                                            }
                                            $team_percent = intval(( $team_complete / $team_cat_steps ) * 100);
                                            $team_class = 'p' . $team_percent;
                                            ?>
                                            <div class="progress-circle <?php echo $team_class; ?> <?php if ($team_percent >= 50) { echo 'over50'; } ?> ">
                                                <span><?php echo $team_percent; ?>%</span>
                                                <div class="left-half-clipper">
                                                    <div class="first50-bar"></div>
                                                    <div class="value-bar"></div>
                                                </div>
                                            </div>
                                           
                                        </div>
                                    </div>
                                    <h2>Healthy <?php the_field('team-category_title', 'option'); ?></h2>
                                    <span class="plus"></span>
                                </div>
                            </div>

                            <?php if ( have_rows( 'team-category_cards', 'option'  ) ): 
                                $card_count = 0;
                                $complete_card_count = 0;
                            ?>
                            <div class="accordions_content">
                                <span class="accordions_title_desc"><?php the_field('team-category_intro', 'option'); ?></span>
                                <div class="cards-container">
                                    <?php while ( have_rows( 'team-category_cards', 'option'  ) ) : the_row(); 
                                        $total_steps++;
                                    // ACF Variables: Accountability Chart - Use Form
                                        $act_title_link     =   get_sub_field( 'act-card_title', 'option'  );
                                        $act_desc           =   get_sub_field( 'act-card_description', 'option' );
                                        $act_formid         =   get_sub_field( 'act-card_form_id', 'option' );
                                        $act_form           =   get_sub_field( 'act-card_form', 'option' );
                                        $act_status         =   get_field( 'act-card_status' );
                                        $total_count        =   1;

                                        $act_meta = 'lp_upload_accountability';

                                        // Gravity Form Workflow steps

                                        $act_entries = GFAPI::get_entries( $act_formid, $sorting, $search_criteria, $total_count );
                                        $act_entry_id = $act_entries[0]['id'];

                                        $act_entry = GFAPI::get_entry( $act_entry_id );

                                    ?>
                                    <?php 
                                        $card_count++; // count every card regardless of status
                                    ?>
                                        <div class="lp-card" id="card-count">
                                            <a class="title-link" href="<?php echo esc_url( $act_title_link['url'] ); ?>" title="<?php echo esc_attr( $act_title_link['title'] ); ?>"><?php echo esc_html( $act_title_link['title'] ); ?></a>
                                            <span class="card-desc"><?php echo $act_desc; ?></span>
                                            <div class="interact-box">
                                                <?php if ( ( $act_status === "Complete" )  ) { // Show step three
                                                    card_is_complete_download($act_formid, $act_meta, $user_id);
                                                    
                                                    // Add to the progress bar 
                                                    $step_count++; // main bar
                                                    update_user_meta( $user_id, $steps_completed, $step_count );
                            
                                                    $complete_card_count++; // section heart
                                                    update_user_meta( $user_id, $sub_steps_completed, $complete_card_count );
                                                } else { // Card is active 
                                                    card_is_active($act_formid);
                                                } ?>    
                                            </div>
                                            <?php if ( !empty( $act_formid ) ) { ?>
                                                <div class="cta-form hidden-form" id="<?php echo $act_formid; ?>">
                                                    <?php echo $act_form; ?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    <?php 
                                        $card_count++; // count every card regardless of status
                                        $complete_card_count;
                                        
                                    endwhile; ?>
                                    <?php while ( have_rows( 'team-category_cards', 'option'  ) ) : the_row(); 
                                        $total_steps++;
                                    // ACF Variables: Hiring & Management - Use Form
                                        $hms_title_link     =   get_sub_field( 'hms-card_title', 'option'  );
                                        $hms_desc           =   get_sub_field( 'hms-card_description', 'option' );
                                        $hms_formid         =   get_sub_field( 'hms-card_form_id', 'option' );
                                        $hms_form           =   get_sub_field( 'hms-card_form', 'option' );
                                        $hms_status         =   get_field( 'hms-card_status' );
                                        $total_count        =   1;

                                        $hms_meta = 'lp_upload_hiringmngmt';

                                        // Gravity Form Workflow steps

                                        $hms_entries = GFAPI::get_entries( $hms_formid, $sorting, $search_criteria, $total_count );
                                        $hms_entry_id = $hms_entries[0]['id'];

                                        $hms_entry = GFAPI::get_entry( $hms_entry_id );

                                    ?>
                                    <?php 
                                        $card_count++; // count every card regardless of status
                                    ?>
                                        <div class="lp-card" id="card-count">
                                            <a class="title-link" href="<?php echo esc_url( $hms_title_link['url'] ); ?>" title="<?php echo esc_attr( $hms_title_link['title'] ); ?>"><?php echo esc_html( $hms_title_link['title'] ); ?></a>
                                            <span class="card-desc"><?php echo $hms_desc; ?></span>
                                            <div class="interact-box">
                                                <?php if ( ( $hms_status === "Complete" )  ) { // Show step three
                                                    card_is_complete_download($hms_formid, $hms_meta, $user_id);
                                                    
                                                    // Add to the progress bar 
                                                    $step_count++; // main bar
                                                    update_user_meta( $user_id, $steps_completed, $step_count );
                            
                                                    $complete_card_count++; // section heart
                                                    update_user_meta( $user_id, $sub_steps_completed, $complete_card_count );
                                                } else { // Card is active 
                                                    card_is_active($hms_formid);
                                                } ?>    
                                            </div>
                                            <?php if ( !empty( $hms_formid ) ) { ?>
                                                <div class="cta-form hidden-form" id="<?php echo $hms_formid; ?>">
                                                    <?php echo $hms_form; ?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    <?php 
                                        $card_count++; // count every card regardless of status
                                        $complete_card_count;
                                        
                                    endwhile; ?>
                                    <?php while ( have_rows( 'team-category_cards', 'option'  ) ) : the_row(); 
                                        $total_steps++;
                                    // ACF Variables: 1 Year Market Rate Salaries
                                        $omrs_title_link     =   get_sub_field( 'omrs-card_title', 'option'  );
                                        $omrs_desc           =   get_sub_field( 'omrs-card_description', 'option' );
                                        $omrs_formid         =   get_sub_field( 'omrs-card_form_id', 'option' );
                                        $omrs_form           =   get_sub_field( 'omrs-card_form', 'option' );
                                        $omrs_status         =   get_field( 'omrs-card_status' );
                                        $total_count        =   1;

                                    ?>
                                    <?php 
                                        $card_count++; // count every card regardless of status
                                    ?>
                                        <div class="lp-card" id="card-count">
                                            <a class="title-link" href="<?php echo esc_url( $omrs_title_link['url'] ); ?>" title="<?php echo esc_attr( $omrs_title_link['title'] ); ?>"><?php echo esc_html( $omrs_title_link['title'] ); ?></a>
                                            <span class="card-desc"><?php echo $omrs_desc; ?></span>
                                            <div class="interact-box">
                                                <?php if ( ( $omrs_status === "Complete" ) ) { // Show step three ?>
                                                    <?php // Add to the progress bar 
                                                        $step_count++; // main bar
                                                        update_user_meta( $user_id, $steps_completed, $step_count );
                                
                                                        $complete_card_count++; // section heart
                                                        update_user_meta( $user_id, $sub_steps_completed, $complete_card_count );
                                                    
                                                        card_is_complete($omrs_formid);
                                                } else { // Card is  active 
                                                    card_is_active($omrs_formid);
                                                } ?>    
                                            </div>
                                            <?php if ( !empty( $omrs_formid ) ) { ?>
                                                <div class="cta-form hidden-form" id="<?php echo $omrs_formid; ?>">
                                                    <?php echo $omrs_form; ?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    <?php 
                                        $card_count++; // count every card regardless of status
                                        $complete_card_count;
                                        
                                    endwhile; ?>
                                    <?php while ( have_rows( 'team-category_cards', 'option'  ) ) : the_row(); 
                                        $total_steps++;
                                    // ACF Variables: 1 Year Fully Staffed
                                        $oyfs_title_link     =   get_sub_field( 'oyfs-card_title', 'option'  );
                                        $oyfs_desc           =   get_sub_field( 'oyfs-card_description', 'option' );
                                        $oyfs_formid         =   get_sub_field( 'oyfs-card_form_id', 'option' );
                                        $oyfs_form           =   get_sub_field( 'oyfs-card_form', 'option' );
                                        $oyfs_status         =   get_field( 'oyfs-card_status' );
                                        $total_count        =   1;

                                    ?>
                                    <?php 
                                        $card_count++; // count every card regardless of status
                                    ?>
                                        <div class="lp-card" id="card-count">
                                            <a class="title-link" href="<?php echo esc_url( $oyfs_title_link['url'] ); ?>" title="<?php echo esc_attr( $oyfs_title_link['title'] ); ?>"><?php echo esc_html( $oyfs_title_link['title'] ); ?></a>
                                            <span class="card-desc"><?php echo $oyfs_desc; ?></span>
                                            <div class="interact-box">
                                                <?php if ( ( $oyfs_status === "Complete" ) ) { // Show step three ?>
                                                    <?php // Add to the progress bar 
                                                        $step_count++; // main bar
                                                        update_user_meta( $user_id, $steps_completed, $step_count );
                                
                                                        $complete_card_count++; // section heart
                                                        update_user_meta( $user_id, $sub_steps_completed, $complete_card_count );
                                                    
                                                        card_is_complete($oyfs_formid);
                                                } else { // Card is  active 
                                                    card_is_active($oyfs_formid);
                                                } ?>    
                                            </div>
                                            <?php if ( !empty( $oyfs_formid ) ) { ?>
                                                <div class="cta-form hidden-form" id="<?php echo $oyfs_formid; ?>">
                                                    <?php echo $oyfs_form; ?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    <?php 
                                        $card_count++; // count every card regardless of status
                                        $complete_card_count;
                                        
                                    endwhile; ?>
                                    <?php while ( have_rows( 'team-category_cards', 'option'  ) ) : the_row(); 
                                        $total_steps++;
                                    // ACF Variables: 1 Year Tracked KPI
                                        $okpi_title_link     =   get_sub_field( 'okpi-card_title', 'option'  );
                                        $okpi_desc           =   get_sub_field( 'okpi-card_description', 'option' );
                                        $okpi_formid         =   get_sub_field( 'okpi-card_form_id', 'option' );
                                        $okpi_form           =   get_sub_field( 'okpi-card_form', 'option' );
                                        $okpi_status         =   get_field( 'okpi-card_status' );
                                        $total_count        =   1;

                                    ?>
                                    <?php 
                                        $card_count++; // count every card regardless of status
                                    ?>
                                        <div class="lp-card" id="card-count">
                                            <a class="title-link" href="<?php echo esc_url( $okpi_title_link['url'] ); ?>" title="<?php echo esc_attr( $okpi_title_link['title'] ); ?>"><?php echo esc_html( $okpi_title_link['title'] ); ?></a>
                                            <span class="card-desc"><?php echo $okpi_desc; ?></span>
                                            <div class="interact-box">
                                                <?php if ( ( $okpi_status === "Complete" ) ) { // Show step three ?>
                                                    <?php // Add to the progress bar 
                                                        $step_count++; // main bar
                                                        update_user_meta( $user_id, $steps_completed, $step_count );
                                
                                                        $complete_card_count++; // section heart
                                                        update_user_meta( $user_id, $sub_steps_completed, $complete_card_count );
                                                    
                                                        card_is_complete($okpi_formid);
                                                } else { // Card is  active 
                                                    card_is_active($okpi_formid);
                                                }  ?>    
                                            </div>
                                            <?php if ( !empty( $okpi_formid ) ) { ?>
                                                <div class="cta-form hidden-form" id="<?php echo $okpi_formid; ?>">
                                                    <?php echo $okpi_form; ?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    <?php 
                                        $card_count++; // count every card regardless of status
                                        $complete_card_count;
                                        
                                    endwhile; ?>
                                    </div>
                                </div>
                            <?php                                 
                                $sub_progress_count = intval( ( $complete_card_count / $card_count ) * 100 ); 
                            ?>
                            <?php endif; ?><!-- end cards -->
                        </div>

                        <div class="accordions"> <!-- Clients -->
                            <div class="accordions_title">
                                <div class="accordions_title_cta">
                                    <div class="heart-container">
                                       <div class="heart">
                                          <?php // Progress circle variables
                                          
                                            $cli_cat_steps = 4;
                                            $idc_status         =   get_field( 'idc-card_status' );
                                            $mks_status         =   get_field( 'mks-card_status' );
                                            $wsa_status         =   get_field( 'wsa-card_status' );
                                            $cep_status         =   get_field( 'cep-card_status' );
                                            
                                            $complete = "Complete";
                                            $cli_complete = 0;
                                            $cli_steps = array(
                                                $idc_status,
                                                $mks_status,
                                                $wsa_status,
                                                $cep_status,
                                            );
                                            foreach ($cli_steps as $cli_step) {
                                              if ( $cli_step == $complete ) {
                                                $cli_complete++;
                                              }
                                            }
                                            $cli_percent = intval(( $cli_complete / $cli_cat_steps ) * 100);
                                            $cli_class = 'p' . $cli_percent;
                                            ?>
                                            <div class="progress-circle <?php echo $cli_class; ?> <?php if ($cli_percent >= 50) { echo 'over50'; } ?> ">
                                                <span><?php echo $cli_percent; ?>%</span>
                                                <div class="left-half-clipper">
                                                    <div class="first50-bar"></div>
                                                    <div class="value-bar"></div>
                                                </div>
                                            </div>
                                           
                                        </div>
                                    </div>
                                    <h2>Healthy <?php the_field('clients-category_title', 'option'); ?></h2>
                                    <span class="plus"></span>
                                </div>
                            </div>

                            <?php if ( have_rows( 'clients-category_cards', 'option'  ) ): 
                                $card_count = 0;
                                $complete_card_count = 0;
                            ?>
                            <div class="accordions_content">
                                <span class="accordions_title_desc"><?php the_field('clients-category_intro', 'option'); ?></span>
                                <div class="cards-container">
                                    <?php while ( have_rows( 'clients-category_cards', 'option'  ) ) : the_row(); 
                                        $total_steps++;
                                    // ACF Variables: Ideal Client - Use Form
                                        $idc_title_link     =   get_sub_field( 'idc-card_title', 'option'  );
                                        $idc_desc           =   get_sub_field( 'idc-card_description', 'option' );
                                        $idc_formid         =   get_sub_field( 'idc-card_form_id', 'option' );
                                        $idc_form           =   get_sub_field( 'idc-card_form', 'option' );
                                        $idc_status         =   get_field( 'idc-card_status' );
                                        $total_count        =   1;

                                        $idc_meta = 'lp_upload_idealclient';

                                        // Gravity Form Workflow steps

                                        $idc_entries = GFAPI::get_entries( $idc_formid, $sorting, $search_criteria, $total_count );
                                        $idc_entry_id = $idc_entries[0]['id'];

                                        $idc_entry = GFAPI::get_entry( $idc_entry_id );

                                    ?>
                                    <?php 
                                        $card_count++; // count every card regardless of status
                                    ?>
                                        <div class="lp-card" id="card-count">
                                            <a class="title-link" href="<?php echo esc_url( $idc_title_link['url'] ); ?>" title="<?php echo esc_attr( $idc_title_link['title'] ); ?>"><?php echo esc_html( $idc_title_link['title'] ); ?></a>
                                            <span class="card-desc"><?php echo $idc_desc; ?></span>
                                            <div class="interact-box">
                                                <?php if ( ( $idc_status === "Complete" )  ) { // Show step three
                                                    card_is_complete_download($idc_formid, $idc_meta, $user_id);
                                                    
                                                    // Add to the progress bar 
                                                    $step_count++; // main bar
                                                    update_user_meta( $user_id, $steps_completed, $step_count );
                            
                                                    $complete_card_count++; // section heart
                                                    update_user_meta( $user_id, $sub_steps_completed, $complete_card_count );
                                                } else { // Card is active 
                                                    card_is_active($idc_formid);
                                                } ?>    
                                            </div>
                                            <?php if ( !empty( $idc_formid ) ) { ?>
                                                <div class="cta-form hidden-form" id="<?php echo $idc_formid; ?>">
                                                    <?php echo $idc_form; ?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    <?php 
                                        $card_count++; // count every card regardless of status
                                        $complete_card_count;
                                        
                                    endwhile; ?>
                                    <?php while ( have_rows( 'clients-category_cards', 'option'  ) ) : the_row(); 
                                        $total_steps++;
                                    // ACF Variables: Marketing Strategy - Use Form
                                        $mks_title_link     =   get_sub_field( 'mks-card_title', 'option'  );
                                        $mks_desc           =   get_sub_field( 'mks-card_description', 'option' );
                                        $mks_formid         =   get_sub_field( 'mks-card_form_id', 'option' );
                                        $mks_form           =   get_sub_field( 'mks-card_form', 'option' );
                                        $mks_status         =   get_field( 'mks-card_status' );
                                        $total_count        =   1;

                                        $mks_meta = 'lp_upload_mrktstrat';

                                        // Gravity Form Workflow steps

                                        $mks_entries = GFAPI::get_entries( $mks_formid, $sorting, $search_criteria, $total_count );
                                        $mks_entry_id = $mks_entries[0]['id'];

                                        $mks_entry = GFAPI::get_entry( $mks_entry_id );

                                    ?>
                                    <?php 
                                        $card_count++; // count every card regardless of status
                                    ?>
                                        <div class="lp-card" id="card-count">
                                            <a class="title-link" href="<?php echo esc_url( $mks_title_link['url'] ); ?>" title="<?php echo esc_attr( $mks_title_link['title'] ); ?>"><?php echo esc_html( $mks_title_link['title'] ); ?></a>
                                            <span class="card-desc"><?php echo $mks_desc; ?></span>
                                            <div class="interact-box">
                                                <?php if ( ( $mks_status === "Complete" )  ) { // Show step three
                                                    card_is_complete_download($mks_formid, $mks_meta, $user_id);
                                                    
                                                    // Add to the progress bar 
                                                    $step_count++; // main bar
                                                    update_user_meta( $user_id, $steps_completed, $step_count );
                            
                                                    $complete_card_count++; // section heart
                                                    update_user_meta( $user_id, $sub_steps_completed, $complete_card_count );
                                                } else { // Card is active 
                                                    card_is_active($mks_formid);
                                                } ?>    
                                            </div>
                                            <?php if ( !empty( $mks_formid ) ) { ?>
                                                <div class="cta-form hidden-form" id="<?php echo $mks_formid; ?>">
                                                    <?php echo $mks_form; ?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    <?php 
                                        $card_count++; // count every card regardless of status
                                        $complete_card_count;
                                        
                                    endwhile; ?>
                                    <?php while ( have_rows( 'clients-category_cards', 'option'  ) ) : the_row(); 
                                        $total_steps++;
                                    // ACF Variables: Website Audit
                                        $wsa_title_link     =   get_sub_field( 'wsa-card_title', 'option'  );
                                        $wsa_desc           =   get_sub_field( 'wsa-card_description', 'option' );
                                        $wsa_formid         =   get_sub_field( 'wsa-card_form_id', 'option' );
                                        $wsa_form           =   get_sub_field( 'wsa-card_form', 'option' );
                                        $wsa_status         =   get_field( 'wsa-card_status' );
                                        $total_count        =   1;

                                    ?>
                                    <?php 
                                        $card_count++; // count every card regardless of status
                                    ?>
                                        <div class="lp-card" id="card-count">
                                            <a class="title-link" href="<?php echo esc_url( $wsa_title_link['url'] ); ?>" title="<?php echo esc_attr( $wsa_title_link['title'] ); ?>"><?php echo esc_html( $wsa_title_link['title'] ); ?></a>
                                            <span class="card-desc"><?php echo $wsa_desc; ?></span>
                                            <div class="interact-box">
                                                <?php if ( ( $wsa_status === "Complete" ) ) { // Show step three ?>
                                                    <?php // Add to the progress bar 
                                                        $step_count++; // main bar
                                                        update_user_meta( $user_id, $steps_completed, $step_count );
                                
                                                        $complete_card_count++; // section heart
                                                        update_user_meta( $user_id, $sub_steps_completed, $complete_card_count );
                                                    
                                                        card_is_complete($wsa_formid);
                                                } else { // Card is  active 
                                                    card_is_active($wsa_formid);
                                                } ?>    
                                            </div>
                                            <?php if ( !empty( $wsa_formid ) ) { ?>
                                                <div class="cta-form hidden-form" id="<?php echo $wsa_formid; ?>">
                                                    <?php echo $wsa_form; ?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    <?php 
                                        $card_count++; // count every card regardless of status
                                        $complete_card_count;
                                        
                                    endwhile; ?>
                                    <?php while ( have_rows( 'clients-category_cards', 'option'  ) ) : the_row(); 
                                        $total_steps++;
                                    // ACF Variables: Client Experience Plan - Use Form
                                        $cep_title_link     =   get_sub_field( 'cep-card_title', 'option'  );
                                        $cep_desc           =   get_sub_field( 'cep-card_description', 'option' );
                                        $cep_formid         =   get_sub_field( 'cep-card_form_id', 'option' );
                                        $cep_form           =   get_sub_field( 'cep-card_form', 'option' );
                                        $cep_status         =   get_field( 'cep-card_status' );
                                        $total_count        =   1;

                                        $cep_meta = 'lp_upload_clientexp';

                                        // Gravity Form Workflow steps

                                        $cep_entries = GFAPI::get_entries( $cep_formid, $sorting, $search_criteria, $total_count );
                                        $cep_entry_id = $cep_entries[0]['id'];

                                        $cep_entry = GFAPI::get_entry( $cep_entry_id );
                                    ?>
                                    <?php 
                                        $card_count++; // count every card regardless of status
                                    ?>
                                        <div class="lp-card" id="card-count">
                                            <a class="title-link" href="<?php echo esc_url( $cep_title_link['url'] ); ?>" title="<?php echo esc_attr( $cep_title_link['title'] ); ?>"><?php echo esc_html( $cep_title_link['title'] ); ?></a>
                                            <span class="card-desc"><?php echo $cep_desc; ?></span>
                                            <div class="interact-box">
                                                <?php if ( ( $cep_status === "Complete" )  ) { // Show step three
                                                    card_is_complete_download($cep_formid, $cep_meta, $user_id);
                                                    
                                                    // Add to the progress bar 
                                                    $step_count++; // main bar
                                                    update_user_meta( $user_id, $steps_completed, $step_count );
                            
                                                    $complete_card_count++; // section heart
                                                    update_user_meta( $user_id, $sub_steps_completed, $complete_card_count );
                                                } else { // Card is active 
                                                    card_is_active($cep_formid);
                                                } ?>    
                                            </div>
                                            <?php if ( !empty( $cep_formid ) ) { ?>
                                                <div class="cta-form hidden-form" id="<?php echo $cep_formid; ?>">
                                                    <?php echo $cep_form; ?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    <?php 
                                        $card_count++; // count every card regardless of status
                                        $complete_card_count;
                                        
                                    endwhile; ?>
                                  </div>
                                </div>
                            <?php                                 
                                $sub_progress_count = intval( ( $complete_card_count / $card_count ) * 100 ); 
                            ?>
                            <?php endif; ?><!-- end cards -->
                        </div>

                        <div class="accordions"> <!-- Profits -->
                            <div class="accordions_title">
                                <div class="accordions_title_cta">
                                    <div class="heart-container">
                                       <div class="heart">
                                          <?php // Progress circle variables
                                          
                                            $prof_cat_steps = 4;
                                            $fns_status         =   get_field( 'fns-card_status' );
                                            $tyrg_status         =   get_field( 'tyrg-card_status' );
                                            $typg_status         =   get_field( 'typg-card_status' );
                                            $ofkpi_status         =   get_field( 'ofkpi-card_status' );
                                            
                                            $complete = "Complete";
                                            $prof_complete = 0;
                                            $prof_steps = array(
                                                $fns_status,
                                                $tyrg_status,
                                                $typg_status,
                                                $ofkpi_status,
                                            );
                                            foreach ($prof_steps as $prof_step) {
                                              if ( $prof_step == $complete ) {
                                                $prof_complete++;
                                              }
                                            }
                                            $prof_percent = intval(( $prof_complete / $prof_cat_steps ) * 100);
                                            $prof_class = 'p' . $prof_percent;
                                            ?>
                                            <div class="progress-circle <?php echo $prof_class; ?> <?php if ($prof_percent >= 50) { echo 'over50'; } ?> ">
                                                <span><?php echo $prof_percent; ?>%</span>
                                                <div class="left-half-clipper">
                                                    <div class="first50-bar"></div>
                                                    <div class="value-bar"></div>
                                                </div>
                                            </div>
                                           
                                        </div>
                                    </div>
                                    <h2>Healthy <?php the_field('profits-category_title', 'option'); ?></h2>
                                    <span class="plus"></span>
                                </div>
                            </div>

                            <?php if ( have_rows( 'profits-category_cards', 'option'  ) ): 
                                $card_count = 0;
                                $complete_card_count = 0;
                            ?>
                            <div class="accordions_content">
                                <span class="accordions_title_desc"><?php the_field('profits-category_intro', 'option'); ?></span>
                                <div class="cards-container">
                                    <?php while ( have_rows( 'profits-category_cards', 'option'  ) ) : the_row(); 
                                        $total_steps++;
                                    // ACF Variables: Financial Strategy - Use Form
                                        $fns_title_link     =   get_sub_field( 'fns-card_title', 'option'  );
                                        $fns_desc           =   get_sub_field( 'fns-card_description', 'option' );
                                        $fns_formid         =   get_sub_field( 'fns-card_form_id', 'option' );
                                        $fns_form           =   get_sub_field( 'fns-card_form', 'option' );
                                        $fns_status         =   get_field( 'fns-card_status' );
                                        $total_count        =   1;


                                        $fns_meta = 'lp_upload_finstrat';

                                        // Gravity Form Workflow steps

                                        $fns_entries = GFAPI::get_entries( $fns_formid, $sorting, $search_criteria, $total_count );
                                        $fns_entry_id = $fns_entries[0]['id'];

                                        $fns_entry = GFAPI::get_entry( $fns_entry_id );

                                    ?>
                                    <?php 
                                        $card_count++; // count every card regardless of status
                                    ?>
                                        <div class="lp-card" id="card-count">
                                            <a class="title-link" href="<?php echo esc_url( $fns_title_link['url'] ); ?>" title="<?php echo esc_attr( $fns_title_link['title'] ); ?>"><?php echo esc_html( $fns_title_link['title'] ); ?></a>
                                            <span class="card-desc"><?php echo $fns_desc; ?></span>
                                            <div class="interact-box">
                                                <?php if ( ( $fns_status === "Complete" )  ) { // Show step three
                                                    card_is_complete_download($fns_formid, $fns_meta, $user_id);
                                                    
                                                    // Add to the progress bar 
                                                    $step_count++; // main bar
                                                    update_user_meta( $user_id, $steps_completed, $step_count );
                            
                                                    $complete_card_count++; // section heart
                                                    update_user_meta( $user_id, $sub_steps_completed, $complete_card_count );
                                                } else { // Card is active 
                                                    card_is_active($fns_formid);
                                                } ?>    
                                            </div>
                                            <?php if ( !empty( $fns_formid ) ) { ?>
                                                <div class="cta-form hidden-form" id="<?php echo $fns_formid; ?>">
                                                    <?php echo $fns_form; ?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    <?php 
                                        $card_count++; // count every card regardless of status
                                        $complete_card_count;
                                        
                                    endwhile; ?>
                                    <?php while ( have_rows( 'profits-category_cards', 'option'  ) ) : the_row(); 
                                        $total_steps++;
                                    // ACF Variables: 2 Year Revenue Growth
                                        $tyrg_title_link     =   get_sub_field( 'tyrg-card_title', 'option'  );
                                        $tyrg_desc           =   get_sub_field( 'tyrg-card_description', 'option' );
                                        $tyrg_formid         =   get_sub_field( 'tyrg-card_form_id', 'option' );
                                        $tyrg_form           =   get_sub_field( 'tyrg-card_form', 'option' );
                                        $tyrg_status         =   get_field( 'tyrg-card_status' );
                                        $total_count        =   1;

                                    ?>
                                    <?php 
                                        $card_count++; // count every card regardless of status
                                    ?>
                                        <div class="lp-card" id="card-count">
                                            <a class="title-link" href="<?php echo esc_url( $tyrg_title_link['url'] ); ?>" title="<?php echo esc_attr( $tyrg_title_link['title'] ); ?>"><?php echo esc_html( $tyrg_title_link['title'] ); ?></a>
                                            <span class="card-desc"><?php echo $tyrg_desc; ?></span>
                                            <div class="interact-box">
                                                <?php if ( ( $tyrg_status === "Complete" ) ) { // Show step three ?>
                                                    <?php // Add to the progress bar 
                                                        $step_count++; // main bar
                                                        update_user_meta( $user_id, $steps_completed, $step_count );
                                
                                                        $complete_card_count++; // section heart
                                                        update_user_meta( $user_id, $sub_steps_completed, $complete_card_count );
                                                    
                                                        card_is_complete($tyrg_formid);
                                                } else { // Card is  active 
                                                    card_is_active($tyrg_formid);
                                                }  ?>    
                                            </div>
                                            <?php if ( !empty( $tyrg_formid ) ) { ?>
                                                <div class="cta-form hidden-form" id="<?php echo $tyrg_formid; ?>">
                                                    <?php echo $tyrg_form; ?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    <?php 
                                        $card_count++; // count every card regardless of status
                                        $complete_card_count;
                                        
                                    endwhile; ?>
                                    <?php while ( have_rows( 'profits-category_cards', 'option'  ) ) : the_row(); 
                                        $total_steps++;
                                    // ACF Variables: 2 Year Profit Growth
                                        $typg_title_link     =   get_sub_field( 'typg-card_title', 'option'  );
                                        $typg_desc           =   get_sub_field( 'typg-card_description', 'option' );
                                        $typg_formid         =   get_sub_field( 'typg-card_form_id', 'option' );
                                        $typg_form           =   get_sub_field( 'typg-card_form', 'option' );
                                        $typg_status         =   get_field( 'typg-card_status' );
                                        $total_count        =   1;

                                    ?>
                                    <?php 
                                        $card_count++; // count every card regardless of status
                                    ?>
                                        <div class="lp-card" id="card-count">
                                            <a class="title-link" href="<?php echo esc_url( $typg_title_link['url'] ); ?>" title="<?php echo esc_attr( $typg_title_link['title'] ); ?>"><?php echo esc_html( $typg_title_link['title'] ); ?></a>
                                            <span class="card-desc"><?php echo $typg_desc; ?></span>
                                            <div class="interact-box">
                                                <?php if ( ( $typg_status === "Complete" ) ) { // Show step three ?>
                                                    <?php // Add to the progress bar 
                                                        $step_count++; // main bar
                                                        update_user_meta( $user_id, $steps_completed, $step_count );
                                
                                                        $complete_card_count++; // section heart
                                                        update_user_meta( $user_id, $sub_steps_completed, $complete_card_count );
                                                    
                                                        card_is_complete($typg_formid);
                                                } else { // Card is  active 
                                                    card_is_active($typg_formid);
                                                }  ?>    
                                            </div>
                                            <?php if ( !empty( $typg_formid ) ) { ?>
                                                <div class="cta-form hidden-form" id="<?php echo $typg_formid; ?>">
                                                    <?php echo $typg_form; ?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    <?php 
                                        $card_count++; // count every card regardless of status
                                        $complete_card_count;
                                        
                                    endwhile; ?>
                                    <?php while ( have_rows( 'profits-category_cards', 'option'  ) ) : the_row(); 
                                        $total_steps++;
                                    // ACF Variables: 1 Year Using Financial KPI Tool
                                        $ofkpi_title_link     =   get_sub_field( 'ofkpi-card_title', 'option'  );
                                        $ofkpi_desc           =   get_sub_field( 'ofkpi-card_description', 'option' );
                                        $ofkpi_formid         =   get_sub_field( 'ofkpi-card_form_id', 'option' );
                                        $ofkpi_form           =   get_sub_field( 'ofkpi-card_form', 'option' );
                                        $ofkpi_status         =   get_field( 'ofkpi-card_status' );
                                        $total_count        =   1;

                                    ?>
                                    <?php 
                                        $card_count++; // count every card regardless of status
                                    ?>
                                        <div class="lp-card" id="card-count">
                                            <a class="title-link" href="<?php echo esc_url( $ofkpi_title_link['url'] ); ?>" title="<?php echo esc_attr( $ofkpi_title_link['title'] ); ?>"><?php echo esc_html( $ofkpi_title_link['title'] ); ?></a>
                                            <span class="card-desc"><?php echo $ofkpi_desc; ?></span>
                                            <div class="interact-box">
                                                <?php if ( ( $ofkpi_status === "Complete" ) ) { // Show step three ?>
                                                    <?php // Add to the progress bar 
                                                        $step_count++; // main bar
                                                        update_user_meta( $user_id, $steps_completed, $step_count );
                                
                                                        $complete_card_count++; // section heart
                                                        update_user_meta( $user_id, $sub_steps_completed, $complete_card_count );
                                                    
                                                        card_is_complete($ofkpi_formid);
                                                } else { // Card is  active 
                                                    card_is_active($ofkpi_formid);
                                                }  ?>    
                                            </div>
                                            <?php if ( !empty( $ofkpi_formid ) ) { ?>
                                                <div class="cta-form hidden-form" id="<?php echo $ofkpi_formid; ?>">
                                                    <?php echo $ofkpi_form; ?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    <?php
                                        $card_count++; // count every card regardless of status
                                        $complete_card_count;
                                        
                                    endwhile; ?>
                                  </div>
                                </div>
                            <?php                                 
                                $sub_progress_count = intval( ( $complete_card_count / $card_count ) * 100 ); 
                            ?>
                            <?php endif; ?><!-- end cards -->
                        </div>

                        <div class="accordions"> <!-- Systems -->
                            <div class="accordions_title">
                                <div class="accordions_title_cta">
                                    <div class="heart-container">
                                       <div class="heart">
                                          <?php // Progress circle variables
                                          
                                            $sys_cat_steps = 3;
                                            $dsta_status         =   get_field( 'dsta-card_status' );
                                            $tsa_status         =   get_field( 'tsa-card_status' );
                                            $prm_status         =   get_field( 'prm-card_status' );
                                            
                                            $complete = "Complete";
                                            $sys_complete = 0;
                                            $sys_steps = array(
                                                $dsta_status,
                                                $tsa_status,
                                                $prm_status,
                                            );
                                            foreach ($sys_steps as $sys_step) {
                                              if ( $sys_step == $complete ) {
                                                $sys_complete++;
                                              }
                                            }
                                            $sys_percent = intval(( $sys_complete / $sys_cat_steps ) * 100);
                                            $sys_class = 'p' . $sys_percent;
                                            ?>
                                            <div class="progress-circle <?php echo $sys_class; ?> <?php if ($sys_percent >= 50) { echo 'over50'; } ?> ">
                                                <span><?php echo $sys_percent; ?>%</span>
                                                <div class="left-half-clipper">
                                                    <div class="first50-bar"></div>
                                                    <div class="value-bar"></div>
                                                </div>
                                            </div>
                                           
                                        </div>
                                    </div>
                                    <h2>Healthy <?php the_field('systems-category_title', 'option'); ?></h2>
                                    <span class="plus"></span>
                                </div>
                            </div>

                            <?php if ( have_rows( 'systems-category_cards', 'option'  ) ): 
                                $card_count = 0;
                                $complete_card_count = 0;
                            ?>
                            <div class="accordions_content">
                                <span class="accordions_title_desc"><?php the_field('systems-category_intro', 'option'); ?></span>
                                <div class="cards-container">
                                    <?php while ( have_rows( 'systems-category_cards', 'option'  ) ) : the_row(); 
                                        $total_steps++;
                                    // ACF Variables: Data Security Threat Assessment
                                        $dsta_title_link     =   get_sub_field( 'dsta-card_title', 'option'  );
                                        $dsta_desc           =   get_sub_field( 'dsta-card_description', 'option' );
                                        $dsta_formid         =   get_sub_field( 'dsta-card_form_id', 'option' );
                                        $dsta_form           =   get_sub_field( 'dsta-card_form', 'option' );
                                        $dsta_status         =   get_field( 'dsta-card_status' );
                                        $total_count        =   1;

                                    ?>
                                    <?php 
                                        $card_count++; // count every card regardless of status
                                    ?>
                                        <div class="lp-card" id="card-count">
                                            <a class="title-link" href="<?php echo esc_url( $dsta_title_link['url'] ); ?>" title="<?php echo esc_attr( $dsta_title_link['title'] ); ?>"><?php echo esc_html( $dsta_title_link['title'] ); ?></a>
                                            <span class="card-desc"><?php echo $dsta_desc; ?></span>
                                            <div class="interact-box">
                                                <?php if ( ( $dsta_status === "Complete" ) ) { // Show step three ?>
                                                    <?php // Add to the progress bar 
                                                        $step_count++; // main bar
                                                        update_user_meta( $user_id, $steps_completed, $step_count );
                                
                                                        $complete_card_count++; // section heart
                                                        update_user_meta( $user_id, $sub_steps_completed, $complete_card_count );
                                                    
                                                        card_is_complete($dsta_formid);
                                                } else { // Card is  active 
                                                    card_is_active($dsta_formid);
                                                } ?>    
                                            </div>
                                            <?php if ( !empty( $dsta_formid ) ) { ?>
                                                <div class="cta-form hidden-form" id="<?php echo $dsta_formid; ?>">
                                                    <?php echo $dsta_form; ?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    <?php 
                                        $card_count++; // count every card regardless of status
                                        $complete_card_count;
                                       
                                    endwhile; ?>
                                    <?php while ( have_rows( 'systems-category_cards', 'option'  ) ) : the_row(); 
                                        $total_steps++;
                                    // ACF Variables: Tech Stack Audit
                                        $tsa_title_link     =   get_sub_field( 'tsa-card_title', 'option'  );
                                        $tsa_desc           =   get_sub_field( 'tsa-card_description', 'option' );
                                        $tsa_formid         =   get_sub_field( 'tsa-card_form_id', 'option' );
                                        $tsa_form           =   get_sub_field( 'tsa-card_form', 'option' );
                                        $tsa_status         =   get_field( 'tsa-card_status' );
                                        $total_count        =   1;

                                    ?>
                                    <?php 
                                        $card_count++; // count every card regardless of status
                                    ?>
                                        <div class="lp-card" id="card-count">
                                            <a class="title-link" href="<?php echo esc_url( $tsa_title_link['url'] ); ?>" title="<?php echo esc_attr( $tsa_title_link['title'] ); ?>"><?php echo esc_html( $tsa_title_link['title'] ); ?></a>
                                            <span class="card-desc"><?php echo $tsa_desc; ?></span>
                                            <div class="interact-box">
                                                <?php if ( ( $tsa_status === "Complete" ) ) { // Show step three ?>
                                                    <?php // Add to the progress bar 
                                                        $step_count++; // main bar
                                                        update_user_meta( $user_id, $steps_completed, $step_count );
                                
                                                        $complete_card_count++; // section heart
                                                        update_user_meta( $user_id, $sub_steps_completed, $complete_card_count );
                                                    
                                                        card_is_complete($tsa_formid);
                                                } else { // Card is  active 
                                                    card_is_active($tsa_formid);
                                                }  ?>    
                                            </div>
                                            <?php if ( !empty( $tsa_formid ) ) { ?>
                                                <div class="cta-form hidden-form" id="<?php echo $tsa_formid; ?>">
                                                    <?php echo $tsa_form; ?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    <?php 
                                        $card_count++; // count every card regardless of status
                                        $complete_card_count;
                                        
                                    endwhile; ?>
                                    <?php while ( have_rows( 'systems-category_cards', 'option'  ) ) : the_row(); 
                                        $total_steps++;
                                    // ACF Variables: Procedures Manual - Use Form
                                        $prm_title_link     =   get_sub_field( 'prm-card_title', 'option'  );
                                        $prm_desc           =   get_sub_field( 'prm-card_description', 'option' );
                                        $prm_formid         =   get_sub_field( 'prm-card_form_id', 'option' );
                                        $prm_form           =   get_sub_field( 'prm-card_form', 'option' );
                                        $prm_status         =   get_field( 'prm-card_status' );
                                        $total_count        =   1;

                                        $prm_meta = 'lp_upload_procman';

                                        // Gravity Form Workflow steps

                                        $prm_entries = GFAPI::get_entries( $prm_formid, $sorting, $search_criteria, $total_count );
                                        $prm_entry_id = $prm_entries[0]['id'];

                                        $prm_entry = GFAPI::get_entry( $prm_entry_id );

                                    ?>
                                    <?php 
                                        $card_count++; // count every card regardless of status
                                    ?>
                                        <div class="lp-card" id="card-count">
                                            <a class="title-link" href="<?php echo esc_url( $prm_title_link['url'] ); ?>" title="<?php echo esc_attr( $prm_title_link['title'] ); ?>"><?php echo esc_html( $prm_title_link['title'] ); ?></a>
                                            <span class="card-desc"><?php echo $prm_desc; ?></span>
                                            <div class="interact-box">
                                                <?php if ( ( $prm_status === "Complete" )  ) { // Show step three
                                                    card_is_complete_download($prm_formid, $prm_meta, $user_id);
                                                    
                                                    // Add to the progress bar 
                                                    $step_count++; // main bar
                                                    update_user_meta( $user_id, $steps_completed, $step_count );
                            
                                                    $complete_card_count++; // section heart
                                                    update_user_meta( $user_id, $sub_steps_completed, $complete_card_count );
                                                } else { // Card is active 
                                                    card_is_active($prm_formid);
                                                } ?>    
                                            </div>
                                            <?php if ( !empty( $prm_formid ) ) { ?>
                                                <div class="cta-form hidden-form" id="<?php echo $prm_formid; ?>">
                                                    <?php echo $prm_form; ?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    <?php 
                                        $card_count++; // count every card regardless of status
                                        $complete_card_count;
                                        
                                    endwhile; ?>
                                  </div>
                                </div>
                            <?php                                 
                                $sub_progress_count = intval( ( $complete_card_count / $card_count ) * 100 ); 
                                
                            ?>
                            <?php endif; ?><!-- end cards -->
                        </div>

                        <div class="accordions"> <!-- Owner -->
                            <div class="accordions_title">
                                <div class="accordions_title_cta">
                                    <div class="heart-container">
                                       <div class="heart">
                                          <?php // Progress circle variables
                                          
                                            $own_cat_steps = 3;
                                            $bag_status         =   get_field( 'bag-card_status' );
                                            $rhw_status         =   get_field( 'rhw-card_status' );
                                            $ocp_status         =   get_field( 'ocp-card_status' );
                                            
                                            $complete = "Complete";
                                            $own_complete = 0;
                                            $own_steps = array(
                                                $bag_status,
                                                $rhw_status,
                                                $ocp_status,
                                            );
                                            foreach ($own_steps as $own_step) {
                                              if ( $own_step == $complete ) {
                                                $own_complete++;
                                              }
                                            }
                                            $own_percent = intval(( $own_complete / $own_cat_steps ) * 100);
                                            $own_class = 'p' . $own_percent;
                                            ?>
                                            <div class="progress-circle <?php echo $own_class; ?> <?php if ($own_percent >= 50) { echo 'over50'; } ?> ">
                                                <span><?php echo $own_percent; ?>%</span>
                                                <div class="left-half-clipper">
                                                    <div class="first50-bar"></div>
                                                    <div class="value-bar"></div>
                                                </div>
                                            </div>
                                           
                                        </div>
                                    </div>
                                    <h2>Healthy <?php the_field('owner-category_title', 'option'); ?></h2>
                                    <span class="plus"></span>
                                </div>
                            </div>

                            <?php if ( have_rows( 'owner-category_cards', 'option'  ) ): 
                                $card_count = 0;
                                $complete_card_count = 0;
                            ?>
                            <div class="accordions_content">
                                <span class="accordions_title_desc"><?php the_field('owner-category_intro', 'option'); ?></span>
                                <div class="cards-container">
                                    <?php while ( have_rows( 'owner-category_cards', 'option'  ) ) : the_row(); 
                                        $total_steps++;
                                    // ACF Variables: Business Alignment with Goals
                                        $bag_title_link     =   get_sub_field( 'bag-card_title', 'option'  );
                                        $bag_desc           =   get_sub_field( 'bag-card_description', 'option' );
                                        $bag_formid         =   get_sub_field( 'bag-card_form_id', 'option' );
                                        $bag_form           =   get_sub_field( 'bag-card_form', 'option' );
                                        $bag_status         =   get_field( 'bag-card_status' );
                                        $total_count        =   1;

                                    ?>
                                    <?php 
                                        $card_count++; // count every card regardless of status
                                    ?>
                                        <div class="lp-card" id="card-count">
                                            <a class="title-link" href="<?php echo esc_url( $bag_title_link['url'] ); ?>" title="<?php echo esc_attr( $bag_title_link['title'] ); ?>"><?php echo esc_html( $bag_title_link['title'] ); ?></a>
                                            <span class="card-desc"><?php echo $bag_desc; ?></span>
                                            <div class="interact-box">
                                                <?php if ( ( $bag_status === "Complete" ) ) { // Show step three ?>
                                                    <?php // Add to the progress bar 
                                                        $step_count++; // main bar
                                                        update_user_meta( $user_id, $steps_completed, $step_count );
                                
                                                        $complete_card_count++; // section heart
                                                        update_user_meta( $user_id, $sub_steps_completed, $complete_card_count );
                                                    
                                                        card_is_complete($bag_formid);
                                                } else { // Card is  active 
                                                    card_is_active($bag_formid);
                                                } ?>    
                                            </div>
                                            <?php if ( !empty( $bag_formid ) ) { ?>
                                                <div class="cta-form hidden-form" id="<?php echo $bag_formid; ?>">
                                                    <?php echo $bag_form; ?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    <?php 
                                        $card_count++; // count every card regardless of status
                                        $complete_card_count;
                                        
                                    endwhile; ?>
                                    <?php while ( have_rows( 'owner-category_cards', 'option'  ) ) : the_row(); 
                                        $total_steps++;
                                    // ACF Variables: Reasonable Hours Worked
                                        $rhw_title_link     =   get_sub_field( 'rhw-card_title', 'option'  );
                                        $rhw_desc           =   get_sub_field( 'rhw-card_description', 'option' );
                                        $rhw_formid         =   get_sub_field( 'rhw-card_form_id', 'option' );
                                        $rhw_form           =   get_sub_field( 'rhw-card_form', 'option' );
                                        $rhw_status         =   get_field( 'rhw-card_status' );
                                        $total_count        =   1;

                                    ?>
                                    <?php 
                                        $card_count++; // count every card regardless of status
                                    ?>
                                        <div class="lp-card" id="card-count">
                                            <a class="title-link" href="<?php echo esc_url( $rhw_title_link['url'] ); ?>" title="<?php echo esc_attr( $rhw_title_link['title'] ); ?>"><?php echo esc_html( $rhw_title_link['title'] ); ?></a>
                                            <span class="card-desc"><?php echo $rhw_desc; ?></span>
                                            <div class="interact-box">
                                                <?php if ( ( $rhw_status === "Complete" ) ) { // Show step three ?>
                                                    <?php // Add to the progress bar 
                                                        $step_count++; // main bar
                                                        update_user_meta( $user_id, $steps_completed, $step_count );
                                
                                                        $complete_card_count++; // section heart
                                                        update_user_meta( $user_id, $sub_steps_completed, $complete_card_count );
                                                    
                                                        card_is_complete($rhw_formid);
                                                } else { // Card is  active 
                                                    card_is_active($rhw_formid);
                                                }  ?>    
                                            </div>
                                            <?php if ( !empty( $rhw_formid ) ) { ?>
                                                <div class="cta-form hidden-form" id="<?php echo $rhw_formid; ?>">
                                                    <?php echo $rhw_form; ?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    <?php 
                                        $card_count++; // count every card regardless of status
                                        $complete_card_count;
                                        
                                    endwhile; ?>
                                    <?php while ( have_rows( 'owner-category_cards', 'option'  ) ) : the_row(); 
                                        $total_steps++;
                                    // ACF Variables: Owners Compensation
                                        $ocp_title_link     =   get_sub_field( 'ocp-card_title', 'option'  );
                                        $ocp_desc           =   get_sub_field( 'ocp-card_description', 'option' );
                                        $ocp_formid         =   get_sub_field( 'ocp-card_form_id', 'option' );
                                        $ocp_form           =   get_sub_field( 'ocp-card_form', 'option' );
                                        $ocp_status         =   get_field( 'ocp-card_status' );
                                        $total_count        =   1;

                                    ?>
                                    <?php 
                                        $card_count++; // count every card regardless of status
                                    ?>
                                        <div class="lp-card" id="card-count">
                                            <a class="title-link" href="<?php echo esc_url( $ocp_title_link['url'] ); ?>" title="<?php echo esc_attr( $ocp_title_link['title'] ); ?>"><?php echo esc_html( $ocp_title_link['title'] ); ?></a>
                                            <span class="card-desc"><?php echo $ocp_desc; ?></span>
                                            <div class="interact-box">
                                                <?php if ( ( $ocp_status === "Complete" ) ) { // Show step three ?>
                                                    <?php // Add to the progress bar 
                                                        $step_count++; // main bar
                                                        update_user_meta( $user_id, $steps_completed, $step_count );
                                
                                                        $complete_card_count++; // section heart
                                                        update_user_meta( $user_id, $sub_steps_completed, $complete_card_count );
                                                    
                                                        card_is_complete($ocp_formid);
                                                } else { // Card is  active 
                                                    card_is_active($ocp_formid);
                                                } ?>    
                                            </div>
                                            <?php if ( !empty( $ocp_formid ) ) { ?>
                                                <div class="cta-form hidden-form" id="<?php echo $ocp_formid; ?>">
                                                    <?php echo $ocp_form; ?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    <?php 
                                        $card_count++; // count every card regardless of status
                                        $complete_card_count;
                                        
                                    endwhile; ?>
                                  </div>
                                </div>
                            <?php                                 
                                $sub_progress_count = intval( ( $complete_card_count / $card_count ) * 100 ); 
                                
                            ?>
                            <?php endif; ?><!-- end cards -->
                        </div>
                    </div>
                </div>

            </div>    
        <?php // calculate progress bar width 
            $progress_count = intval( ( $step_count / $total_steps ) * 100 );
    
        ?>
        </div>
        <div class="lab-portal-top">
            <?php // Assign post variables.
            $page_title = 'Lab Portal';

            // Breadcrumbs
            if ( function_exists( 'yoast_breadcrumb' ) ) {
                yoast_breadcrumb( '<div class="breadcrumbs">', '</div>' );
            }

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
</div>
<?php }



function do_labster_portal_upper() {
    // Check if user is logged in
    if ( is_user_logged_in() ) {
        $user_id = get_current_user_id(); 
    } else {
        $user_id = 0;
        return false;
    }

    $user_info = get_userdata($user_id);

    $first_name = $user_info->first_name;
    $last_name = $user_info->last_name;

    $link_name = $first_name . '-' . $last_name;

    $rel_url = '/' . 'labsters' . '/' . $last_name . '/';

    $post_args = array(
        'post_type'		    => 'labsters',
        'post_status'       => 'publish',
        'name'              =>  $link_name,
        'posts_per_page'	=>  -1,
    );

    $post_query = new WP_Query( $post_args );

    if ( $post_query->have_posts() ) :
        while ( $post_query->have_posts() ) : $post_query->the_post();
            make_lab_portal_work();
        endwhile;
    endif;
    wp_reset_postdata();
}    
add_shortcode( 'labster_portal_upper', 'do_labster_portal_upper' );

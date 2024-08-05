<?php

// Product Recommendation Wizard Functionality

/** TABLE OF CONTENTS
 * 
 * MARKETING & SEO
 *      - shortcode: do_product_rec_seo
 * 
 * LAW PRACTICE MANAGEMENT SOFTWARE
 *      - shortcode: do_product_rec_lpms
 * 
 * VIRTUAL RECEPTIONIST
 *      - shortcode: do_product_rec_vr
 */


/* MARKETING & SEO */

function do_product_rec_results_seo( $atts ) {
    
    ?>
    <span class="results-intro">The service providers below are the best fit for your firm. We encourage you to reach out to the providers and start a conversation.</span>
    
    <div class="product-rec-container">
    <?php

    $atts = shortcode_atts( array(
        'form_id'   => null,
        'total_count' => null,
    ), $atts );

    if ( !$atts[ 'form_id' ] ) {
        return '<p>The form ID is missing.</p>';
    }

	if ( !is_plugin_active( 'gravityforms/gravityforms.php' ) ) { return; }
    
	$user_id = get_current_user_id(); 
    $form_id = $atts['form_id'];
    $total_count = $atts['total_count'];


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

    // Must Match Questions
    $submission[ 'goals_web' ]          = $entry[ '1.1' ];
    $submission[ 'goals_seo' ]          = $entry[ '1.2'];
    $submission[ 'goals_other' ]        = $entry['1.3'];
    $submission[ 'goals' ]              = array( $submission['goals_web'], $submission['goals_seo'], $submission['goals_other'] );
    $submission[ 'up_front_budget' ]    = $entry[ '3' ];
    $submission[ 'monthly_budget' ]     = $entry[ '4' ];

    // Bonus Questions
    $submission[ 'preferences_one' ]    = $entry[ '15.1' ];
    $submission[ 'preferences_two' ]    = $entry[ '15.2'];
    $submission[ 'preferences' ]        = array( $submission['preferences_one'], $submission['preferences_two'] );
    
    $submission[ 'website_one' ]        = $entry[ '16.1' ];
    $submission[ 'website_two' ]        = $entry[ '16.2'];
    $submission[ 'website_three' ]      = $entry[ '16.3'];
    $submission[ 'website_four' ]       = $entry[ '16.4'];
    $submission[ 'website_five' ]       = $entry[ '16.5'];
    $submission[ 'website' ]            = array( $submission[ 'website_one' ], $submission[ 'website_two' ], $submission[ 'website_three' ], $submission[ 'website_four' ], $submission[ 'website_five' ] );

    $submission[ 'seo_one' ]        = $entry[ '17.1' ];
    $submission[ 'seo_two' ]        = $entry[ '17.2'];
    $submission[ 'seo_three' ]      = $entry[ '17.3'];
    $submission[ 'seo_four' ]       = $entry[ '17.4'];
    $submission[ 'seo_five' ]       = $entry[ '17.5'];
    $submission[ 'seo' ]            = array( $submission[ 'seo_one' ], $submission[ 'seo_two' ], $submission[ 'seo_three' ], $submission[ 'seo_four' ], $submission[ 'seo_five' ] );

    $submission[ 'other_one' ]        = $entry[ '18.1' ];
    $submission[ 'other_two' ]        = $entry[ '18.2'];
    $submission[ 'other_three' ]      = $entry[ '18.3'];
    $submission[ 'other_four' ]       = $entry[ '18.4'];
    $submission[ 'other_five' ]       = $entry[ '18.5'];
    $submission[ 'other_six' ]        = $entry[ '18.6'];
    $submission[ 'other_seven' ]      = $entry[ '18.7'];
    $submission[ 'other_eight' ]      = $entry[ '18.8'];
    $submission[ 'other' ]            = array( $submission[ 'other_one' ], $submission[ 'other_two' ], $submission[ 'other_three' ], $submission[ 'other_four' ], $submission[ 'other_five' ], $submission[ 'other_six' ], $submission[ 'other_seven' ], $submission[ 'other_eight' ] );


    $meta_query_args = array(
        'relation'  => 'OR',
        array(
        'key'     => 'prw_seo_budget_up_front',
        'value'   => $submission[ 'up_front_budget' ],
        ),
        array(
        'key'     => 'prw_seo_budget_monthly',
        'value'   => $submission[ 'monthly_budget' ],
        ),
    );

    foreach ( $submission['goals'] as $service ) {

        $meta_query_args = array(
        'key'           => 'prw_seo_goals',
        'value'         => $submission[ 'up_front_budget' ],
        'meta_compare'  => 'IN',
        );

    }

    $args = array(
        'fields'          => 'ids',
        'meta_query'      => $meta_query_args,
        'posts_per_page'  => -1,
        'post_status'     => 'publish',
        'post_type'       => 'page',
        'post_parent'     => 226192,
    );

    $products = new WP_Query( $args );
    
    if ( $products->have_posts() ):

        $results = array();

        while ( $products->have_posts() ): $products->the_post();

        $product_id = get_the_ID();
        $services   =  get_field( 'prw_seo_goals', $product_id );
        $match = null;
        $bonus      = 0;
        $goal_match = null;
        $up_front_match = null;
        $monthly_match = null;

        $goals = $submission['goals'];

        foreach ( $goals as $service ) {
            if ( in_array( $service, $services ) ) {
            $goal_match = true;
            }
        }

        $up_front_budget = get_field( 'prw_seo_budget_up_front', $product_id );
        if ( in_array( $submission[ 'up_front_budget' ],  $up_front_budget ) ) {
            //$matches++;
            $up_front_match = true;
        }

        $monthly_budget = get_field( 'prw_seo_budget_monthly', $product_id );
        if ( in_array( $submission[ 'monthly_budget' ], $monthly_budget) ) {
            //$matches++;
            $monthly_match = true;
        }

        // See if all of the must-match criteria are met
        if ( ($goal_match == true) && ($up_front_match == true) && ($monthly_match == true)  ) {
            $match = true;
        }

        //gf entry 
        $preferences = $submission['preferences'];
        //product data 
        $preferences_entry = get_field( 'prw_seo_preferences', $product_id );
        $bonus1 = 0;
        if ( !empty( $preferences_entry ) ) {
            foreach ( $preferences_entry as $preference ) {
                if ( in_array( $preference, $preferences ) ) {
                $bonus1++;
                }
            }
        } else {
            $bonus1 = 0;
        }

        // gf entry
        $websites = $submission['website'];
        // product data
        $websites_entry = get_field( 'prw_seo_design_hosting_services', $product_id );
        $bonus2 = 0;
        if ( !empty( $websites_entry ) ) {
            foreach ( $websites_entry as $website ) {
                if ( in_array( $website, $websites ) ) {
                $bonus2++;
                }
            }
        } else {
            $bonus2 = 0;
        }

        // gf entry
        $seos = $submission['seo'];
        // product data
        $seos_entry = get_field( 'prw_seo_seo_services', $product_id );
        $bonus3 = 0;
        if ( !empty( $seos_entry ) ) {
            foreach ( $seos_entry as $seo ) {
                if ( in_array( $seo, $seos ) ) {
                $bonus3++;
                }
            }
        } else {
            $bonus3 = 0;
        }

        //gf entry 
        $others = $submission['other'];
        //product data 
        $others_entry = get_field( 'prw_seo_additional_services', $product_id );
        $bonus4 = 0;
        if ( !empty( $others_entry ) ) {
            foreach ( $others_entry as $other ) {
                if ( in_array( $other, $others ) ) {
                $bonus4++;
                }
            }
        } else {
            $bonus4 = 0;
        }

        $bonus = $bonus1 + $bonus2 + $bonus3 + $bonus4;

        // Filter by only those that meet all three must-match criteria
        if ( $match == true ) {

            if ( has_term( 'affinity-partner', 'page_type', $product_id ) && get_field( 'affinity_active' ) == true ) {
            $affinity_partner = true;
            } else {
            $affinity_partner = false;
            }

            // Check for a rating.
            if ( comments_open() && function_exists( 'wp_review_show_total' ) ) {
                $star_rating = lwyrst_product_rating();
                $rating_type = null;
                    switch ($rating_type) {
                        case 'our_rating':
                            $rating = lwyrst_get_our_rating();
                            $rating_count = 1;
                            break;
                        case 'community_rating':
                            $rating = lwyrst_get_community_rating();
                            $rating_count = lwyrst_get_community_review_count();
                            break;
                        default:
                            $rating = lwyrst_get_composite_rating();
                            $our_rating = lwyrst_get_our_rating();

                            if (!empty($our_rating)) {
                                $rating_count = intval(lwyrst_get_community_review_count()) + 1;
                            } else {
                                $rating_count = intval(lwyrst_get_community_review_count());
                            }
                            break;
                    }
                    $aggr_rating = intval($rating * 10);
            } else {
            $star_rating = false;
            $aggr_rating = false;
            }

            //$total_score = $match_score + $bonus_score;
            //$total_score = $bonus_score;

            $results[] = array(
            'id'                => $product_id,
            'title'             => the_title( '', '', FALSE ),
            'url'               => get_permalink(),
            'affinity_partner'  => $affinity_partner,
            'services'          => $services,
            'rating'       => $star_rating,
            'aggr_rating'       => $aggr_rating,
            'rating_count'      => $rating_count,
            'score'             => $total_score,
            'excerpt'           => get_the_excerpt()
            );

            $title              =   $results['title'];
            $url                =   $results['url'];
            $star_rating        =   $results[ 'star_rating' ];
            $aggr_rating        =   $results[ 'aggr_rating' ];
            $count_rating       =   $results[ 'rating_count' ];
            $id                 =   $results[ 'id' ];
            $affinity_partner   =   $results['affinity_partner'];
            $score              =   $results['score'];      

        }  
        
        endwhile;

        usort( $results, function( $a, $b ) {
            if ( $b[ 'score' ] === $a[ 'score' ] ) {
                if ( $b[ 'aggr_rating' ] === $a[ 'aggr_rating' ] ) {
                    return $b[ 'rating_count' ] <=> $a[ 'rating_count' ];
                } else {
                    return $b[ 'aggr_rating' ] <=> $a[ 'aggr_rating' ];
                }
            } else {
            return $b[ 'score' ] <=> $a[ 'score' ];
            }
        });
        
        foreach ($results as $result) { ?>

            <div class="product-rec-list" id="<?php echo $result['score']; ?>">
                <div class="card">
                    <div class="card_upper recommender-result">
                    <?php if ( has_post_thumbnail( $result[ 'id' ] ) ) { ?>

                        <a class="image" href="<?php echo $result['url']; ?>">

                            <?php if ( $result['affinity_partner'] ) { ?>

                                <?php $theme_dir = get_template_directory_uri(); ?>

                                    <img class="affinity-partner-badge" alt="Lawyerist affinity partner badge." src="<?php echo $theme_dir; ?>/images/affinity-partner-logo.svg" height="64" width="75" />

                                <?php } ?>

                            <?php echo get_the_post_thumbnail( $result['id'], 'thumbnail' ); ?>

                        </a>

                    <?php } else { ?>
                        <div class="img-placeholder"></div>
                    <?php }  ?>

                    <div class="title_container">

                        <a class="title" href="<?php echo $result['url']; ?>"><?php echo $result['title']; ?></a>

                        <?php if ( $result['rating'] ) { ?><div class="user-rating"><?php echo $result['rating']; ?></div><?php } ?>

                        <span class="excerpt"><?php echo $result['excerpt']; ?></span>

                        <a class="button arrow-btn" href="<?php echo $result['url']; ?>">Visit Website</a>

                    </div>
                </div>
            </div>
        </div>
<?php  } endif; ?>
    
    </div>
    <?php $previous = "javascript:history.go(-1)";
    if(isset($_SERVER['HTTP_REFERER'])) {
        $previous = $_SERVER['HTTP_REFERER'];
    } 

        $preference_list = implode(" ", $goals) . ', ' . implode(" ", $up_front_budget) . ' ' . implode(" ", $monthly_budget) . ', ' . implode(" ", $preferences) . implode(" ", $websites) . implode(" ", $seos) . implode(" ", $others);
    ?>

        <div class="preference-container">
            <span class="preference-title">Your preferences:</span>
            <p><?php echo $preference_list; ?></p>
        </div>

        <a class="go-back" href="<?= $previous ?>">Edit Preferences</a>

    <?php 
}

add_shortcode( 'do_product_rec_seo', 'do_product_rec_results_seo' );


/* LAW PRACTICE MANAGEMENT SOFTWARE – UPDATED */
function do_product_rec_results_lpms( $atts ) {
    
    ?>
    <span class="results-intro">The service providers below are the best fit for your firm. We encourage you to reach out to the providers and start a conversation.</span>
    
    <div class="product-rec-container">
    <?php

    $atts = shortcode_atts( array(
        'form_id'   => null,
        'total_count' => null,
    ), $atts );

    if ( !$atts[ 'form_id' ] ) {
        return '<p>The form ID is missing.</p>';
    }

	if ( !is_plugin_active( 'gravityforms/gravityforms.php' ) ) { return; }
    
	$user_id = get_current_user_id(); 
    $form_id = $atts['form_id'];
    $total_count = $atts['total_count'];


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
    
    // Q1
    $submission[ 'size' ] = $entry[ '1' ];
    // Q2
    $submission[ 'litigation' ] = $entry[ '2' ];

    // Q3
    $submission[ 'accounting' ] = $entry[ '3' ];

    // Q4
    $submission[ 'portal' ]   = $entry[ '5' ];

    // Q5
    $submission[ 'workflow' ]   = $entry[ '4' ];

    // Q6
    $submission[ 'integrations' ]   = $entry[ '6' ];

    $meta_query_args = array(
        'relation'  => 'OR',
        array(
        'key'     => 'prw_lpms_accounting',
        'value'   => $submission[ 'accounting' ],
        ),
        array(
        'key'     => 'prw_lpms_litigation',
        'value'   => $submission[ 'litigation' ],
        ),
    );

    foreach ( $submission[ 'size' ] as $service ) {

        $meta_query_args = array(
        'key'           => 'prw_lpms_size',
        'value'         => $submission[ 'size' ],
        'meta_compare'  => 'IN',
        );

    }

    $args = array(
        'fields'          => 'ids',
        'meta_query'      => $meta_query_args,
        'posts_per_page'  => -1,
        'post_status'     => 'publish',
        'post_type'       => 'page',
        'post_parent'     => 121024,
    );
    
    $products = new WP_Query( $args );
    
    if ( $products->have_posts() ):

        $results = array();

        while ( $products->have_posts() ): $products->the_post();

        $product_id = get_the_ID();
        $match_score = 0;
        $total_score = 0;
        $eliminate_one = null;
        $eliminate_two = null;
        $eliminate_three = null;
        $eliminate_five = null;
        $eliminate_six = null;
        $match = null;
        $product = get_the_title();

        // Q1
        $size =  $submission[ 'size' ];
        $size_entry = get_field( 'prw_lpms_size', $product_id );
        if ( in_array($size, $size_entry) ) {
            $q1= 1;
        } else {
            $q1 = 0;
        } 

        // Q2
        $litigation = $submission[ 'litigation' ];
        $litigation_entry = get_field( 'prw_lpms_litigation', $product_id );
        if ( $litigation == $litigation_entry ) {
           $q2 = 1;
        } else {
            $q2 = 0;
        }    

        // Q3
        $lpms_accounting = $submission[ 'accounting' ];
        $lpms_accounting_entry = get_field( 'prw_lpms_accounting', $product_id );
        if ( in_array($lpms_accounting, $lpms_accounting_entry) ) {
            $q3 = 1;
        } else {
            $q3 = 0;
        }

        // Q4
        $portal = $submission[ 'portal' ];
        $portal_entry = get_field( 'prw_lpms_portal', $product_id );
        if ( in_array($portal, $portal_entry) ) {
            $q4 = 1;
        } else {
            $q4 = 0;
        }

        // Q5
        $workflow = $submission[ 'workflow' ];
        $workflow_entry = get_field( 'prw_lpms_workflow', $product_id );
        if ( in_array($workflow, $workflow_entry) ) {
            $q5 = 1;
        } else {
            $q5 = 0;
        }

        // Q6
        $integrations = $submission[ 'integrations' ];
        $integrations_entry = get_field( 'prw_lpms_integrations', $product_id );
        if ( in_array($integrations, $integrations_entry) ) {
            $q6 = 1;
        } else {
            $q6 = 0;
        }

        $total_score = ( $q1 + $q2 + $q3 + $q4 + $q5 + $q6 );
        // Eliminate Q1
        $eliminate_size = get_field('prw_lpms_size_eliminate');
        $choice_size = '1-3 users';
        // Check if eliminate option has been selected
        if (  $submission[ 'size' ] == $choice_size ) {
            $check_one = true;
        }
        
        // Check if product should be eliminated if option is selected
        if ( ($check_one == true) && ($eliminate_size == true) ) {
            $eliminate_one = true;
        }

        // Eliminate Q2
        $eliminate_lit = get_field('prw_lpms_lit_eliminate');
        $choice_lit = 'No';
        // Check if eliminate option has been selected
        if (  $submission[ 'litigation' ] == $choice_lit ) {
            $check_two = true;
        }
        // Check if product should be eliminated if option is selected
        if ( ( $check_two == true ) && ( $eliminate_lit == true ) ) {
            $eliminate_two = true;
        }

        // Eliminate Q3
        $eliminate_accounting = get_field('prw_lpms_accounting_eliminate');
        $choice_accounting = 'Connects to accounting software';
        // Check if eliminate option has been selected
        if (  $submission[ 'accounting' ] == $choice_accounting ) {
            $check_three = true;
        }
        // Check if product should be eliminated if option is selected
        if ( ( $check_three == true ) && ( $eliminate_accounting == true ) ) {
            $eliminate_three = true;
        }

        // Eliminate Q5
        $eliminate_workflow = get_field('prw_lpms_workflow_eliminate');
        $choice_workflow = 'Easy';
        // Check if eliminate option has been selected
        if (  $submission[ 'workflow' ] == $choice_workflow ) {
            $check_five = true;
        }
        // Check if product should be eliminated if option is selected
        if ( ( $check_five == true ) && ( $eliminate_workflow == true ) ) {
            $eliminate_five = true;
        }

        // Eliminate Q6
        $eliminate_integrations = get_field('prw_lpms_integrations_eliminate');
        $choice_integrations = 'Very important. We need our law practice management software to integrate with a variety of other tools.';
        // Check if eliminate option has been selected
        if (  $submission[ 'integrations' ] == $choice_integrations ) {
            $check_six = true;
        }
        // Check if product should be eliminated if option is selected
        if ( ( $check_six == true ) && ( $eliminate_integrations == true ) ) {
            $eliminate_six = true;
        }


        // Check if any products should be eliminated & removed those products
        if (    ( $eliminate_two == true ) || 
                ( $eliminate_one == true ) || 
                ( $eliminate_three == true ) ||
                ( $eliminate_five == true ) ||
                ( $eliminate_six == true )
        ) {
            $match = false;
        } else {
            $match = true;
        }
        
        // Filter by only those that meet all three must-match criteria
        if ( $match == true ) {

            if ( has_term( 'affinity-partner', 'page_type', $product_id ) && get_field( 'affinity_active' ) == true ) {
            $affinity_partner = true;
            } else {
            $affinity_partner = false;
            }

            // Check for a rating.
            if ( comments_open() && function_exists( 'wp_review_show_total' ) ) {
                $star_rating = lwyrst_product_rating();
                $rating_type = null;
                    switch ($rating_type) {
                        case 'our_rating':
                            $rating = lwyrst_get_our_rating();
                            $rating_count = 1;
                            break;
                        case 'community_rating':
                            $rating = lwyrst_get_community_rating();
                            $rating_count = lwyrst_get_community_review_count();
                            break;
                        default:
                            $rating = lwyrst_get_composite_rating();
                            $our_rating = lwyrst_get_our_rating();

                            if (!empty($our_rating)) {
                                $rating_count = intval(lwyrst_get_community_review_count()) + 1;
                            } else {
                                $rating_count = intval(lwyrst_get_community_review_count());
                            }
                            break;
                    }
                    $aggr_rating = intval($rating * 10);
            } else {
            $star_rating = false;
            $aggr_rating = false;
            }

            $results[] = array(
            'id'                => $product_id,
            'title'             => the_title( '', '', FALSE ),
            'url'               => get_permalink(),
            'affinity_partner'  => $affinity_partner,
            'services'          => $services,
            'rating'            => $star_rating,
            'aggr_rating'       => $aggr_rating,
            'rating_count'      => $rating_count,
            'score'             => $total_score,
            'excerpt'           => get_the_excerpt()
            );

            $title              =   $results['title'];
            $url                =   $results['url'];
            $star_rating        =   $results[ 'star_rating' ];
            $aggr_rating        =   $results[ 'aggr_rating' ];
            $count_rating       =   $results[ 'rating_count' ];
            $id                 =   $results[ 'id' ];
            $affinity_partner   =   $results['affinity_partner'];
            $score              =   $results['score'];      

        } 
        endwhile;

        usort( $results, function( $a, $b ) {
            if ( $b[ 'score' ] === $a[ 'score' ] ) {
                if ( $b[ 'aggr_rating' ] === $a[ 'aggr_rating' ] ) {
                    return $b[ 'rating_count' ] <=> $a[ 'rating_count' ];
                } else {
                    return $b[ 'aggr_rating' ] <=> $a[ 'aggr_rating' ];
                }
            } else {
            return $b[ 'score' ] <=> $a[ 'score' ];
            }
        });
        
        foreach ($results as $result) { ?>
            
            <div class="product-rec-list alt-order" id="<?php echo $result['score']; ?>">
                <div class="card">
                    <div class="card_upper recommender-result">
                    <?php if ( has_post_thumbnail( $result[ 'id' ] ) ) { ?>

                        <a class="image" href="<?php echo $result['url']; ?>">

                            <?php if ( $result['affinity_partner'] ) { ?>

                                <?php $theme_dir = get_template_directory_uri(); ?>

                                    <img class="affinity-partner-badge" alt="Lawyerist affinity partner badge." src="<?php echo $theme_dir; ?>/images/affinity-partner-logo.svg" height="64" width="75" />

                                <?php } ?>

                            <?php echo get_the_post_thumbnail( $result['id'], 'thumbnail' ); ?>

                        </a>

                    <?php } else { ?>
                        <div class="img-placeholder"></div>
                    <?php }  ?>

                    <div class="title_container">

                        <a class="title" href="<?php echo $result['url']; ?>"><?php echo $result['title']; ?></a>

                        <?php if ( $result['rating'] ) { ?><div class="user-rating"><?php echo $result['rating']; ?></div><?php } ?>

                        <span class="excerpt"><?php echo $result['excerpt']; ?></span>

                        <a class="button arrow-btn" href="<?php echo $result['url']; ?>">Visit Website</a>

                    </div>
                </div>
            </div>
        </div>
<?php  } endif; ?>
    
    </div>
    <?php $previous = "javascript:history.go(-1)";
    if(isset($_SERVER['HTTP_REFERER'])) {
        $previous = $_SERVER['HTTP_REFERER'];
    } 

        $preference_list = $size . ', ' . $litigation . ', ' . $lpms_accounting . ', ' . $portal . ', ' . $workflow . ', ' . $integrations;
    ?>

        <div class="preference-container">
            <span class="preference-title">Your preferences:</span>
            <p><?php echo $preference_list; ?></p>
        </div>

        <a class="go-back" href="<?= $previous ?>">Edit Preferences</a>

    <?php
}

add_shortcode( 'do_product_rec_lpms', 'do_product_rec_results_lpms' );
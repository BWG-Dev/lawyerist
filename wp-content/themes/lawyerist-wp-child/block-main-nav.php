<?php // get ACF info from the primary site 
    switch_to_blog(1); // Switch to primary site
?>

<div id="header-top" class="menu-container-update">
  <header>
    <nav class="menu-container">
        <div class="flex-container">
            <?php if (is_front_page()) { ?>
            <div class="title-box">
                <div style="overflow:hidden;height:100%;background: #fff;display: flex;align-items: center;padding-right: 13px;padding-left: 12px;">
                    <div id="title">
                        <a href="<?php echo home_url(); ?>" title="Visit Lawyerist Homepage">
                            <img data-skip-lazy="" width="282" height="65" src="/wp-content/uploads/2020/11/lawyerist-logo-tagline.svg" class="custom-logo skip-lazy" alt="Lawyerist">
                        </a>
                    </div>
                </div>
            </div>

            <?php } else { ?>

            <div class="title-box">
                <div style="overflow:hidden;height:100%;background: #fff;display: flex;align-items: center;padding-right: 13px;padding-left: 12px;">
                    <p id="title"><a href="<?php echo home_url(); ?>" title="Visit Lawyerist Homepage"><?php the_custom_logo(); ?></a></p>
                </div>
            </div>

            <?php } ?>

            <div class="nav-options-container d-navigation">
                <ul class="menu-list" id="menu-list">
                <?php if( have_rows( 'nav_group_one', 'option' ) ): ?>
                <?php
                    while( have_rows( 'nav_group_one', 'option' ) ): the_row();
                        $parent_one = get_sub_field('parent_link');
                        $parent_one_link = $parent_one['url'];
                        $parent_one_title = $parent_one['title'];

                        $feat_one = get_sub_field( 'option_featured_link' );
                        $feat_one_link = $feat_one['url'];
                        $feat_one_title = $feat_one['title'];

                        $feat_one_desc = get_sub_field( 'option_featured_description' );

                        $feat_one_cta = get_sub_field( 'option_featured_cta' );
                        $feat_one_cta_link = $feat_one_cta['url'];
                        $feat_one_cta_title = $feat_one_cta['title'];
                    ?>

                    <li class="nav-pin first-option">
                    
                        <a href="<?php echo esc_url($feat_one_link); ?>" class="a-hover" title="<?php echo esc_attr($feat_one_title); ?>"><?php echo esc_attr($feat_one_title); ?></a>
                        <div class="submenu-container">
                            <div class="col-1">
                                <div class="featured-label">
                                    <a href="<?php  echo esc_url($feat_one_link); ?>" class="link" title="<?php echo esc_attr($feat_one_title); ?>"><?php echo esc_attr($feat_one_title); ?></a>
                                    <p><?php echo $feat_one_desc; ?></p>
                                    <div class="orange-btn">
                                        <a href="<?php echo esc_url($feat_one_cta_link); ?>" title="<?php echo esc_attr($feat_one_cta_title); ?>"><?php echo esc_attr($feat_one_cta_title); ?></a>
                                    </div>
                                </div>
                            </div>
                            <?php if ( have_rows( 'simple_links' ) ): ?>
                                <div class="col-3">
                                    <ul class="menu-sublist pad">
                                        <?php while( have_rows( 'simple_links' ) ): the_row();
                                            $link = get_sub_field('link_item');
                                            $link_url = $link['url'];
                                            $link_title = $link['title'];
                                        ?>
                                        <li>
                                            <a href="<?php echo esc_url($link_url); ?>" title="<?php echo esc_attr($link_title); ?>">
                                                <span><?php echo esc_attr($link_title); ?></span>
                                            </a>
                                        </li>
                                        <?php endwhile; ?>
                                    </ul>
                                </div>
                            <?php endif; ?>
                        </div>
                    </li>

                    <?php endwhile; ?>
                <?php endif; ?>

                    <li class="nav-pin second-option">
                        <?php if( have_rows( 'nav_group_two', 'option' ) ):
                        while( have_rows( 'nav_group_two', 'option' ) ): the_row();
                            $parent_two = get_sub_field('parent_link');
                            $parent_two_link = $parent_two['url'];
                            $parent_two_title = $parent_two['title'];

                            $feat_two = get_sub_field( 'option_featured_link' );
                            $feat_two_link = $feat_two['url'];
                            $feat_two_title = $feat_two['title'];

                            $feat_two_desc = get_sub_field( 'option_featured_description' );

                            $feat_two_cta = get_sub_field( 'option_featured_cta' );
                            $feat_two_cta_link = $feat_two_cta['url'];
                            $feat_two_cta_title = $feat_two_cta['title'];

                        ?>
                            <a href="<?php echo esc_url($parent_two_link); ?>" class="a-hover" title="<?php echo esc_attr($parent_two_title); ?>"><?php echo esc_attr($parent_two_title); ?></a>
                            <div class="submenu-container">
                                <div class="col-3 featured">
                                    <div class="featured-label">
                                        <a href="<?php  echo esc_url($feat_two_link); ?>" class="link" title="<?php echo esc_attr($feat_two_title); ?>"><?php echo esc_attr($feat_two_title); ?></a>
                                        <p><?php echo $feat_two_desc; ?></p>
                                        <div class="orange-btn">
                                            <a href="<?php echo esc_url($feat_two_cta_link); ?>" title="<?php echo esc_attr($feat_two_cta_title); ?>"><?php echo esc_attr($feat_two_cta_title); ?></a>
                                        </div>
                                    </div>
                                </div>
                                
                                <?php if ( have_rows( 'descriptive_links' ) ): ?>
                                    <div class="col-3">
                                        <ul class="menu-sublist pad">
                                            <?php while( have_rows( 'descriptive_links' ) ): the_row();
                                                $link = get_sub_field('link_item');
                                                $link_url = $link['url'];
                                                $link_title = $link['title'];
                                                $link_desc = get_sub_field('link_description');
                                            ?>
                                            <li>
                                                <a href="<?php echo esc_url($link_url); ?>" title="<?php echo esc_attr($link_title); ?>"  <?php if ( !empty($link_desc) ) { ?>class="desc-grid"<?php } ?>>
                                                    <div>
                                                        <span><?php echo esc_attr($link_title); ?></span>
                                                        <?php if ( !empty($link_desc) ) { ?>
                                                            <p><?php echo $link_desc; ?></p>
                                                        <?php } ?>
                                                    </div>
                                                </a>
                                            </li>
                                            <?php endwhile; ?>
                                        </ul>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </li>

                    <li class="nav-pin third-option">
                        <?php if( have_rows( 'nav_group_three', 'option' ) ): ?>
                            <?php
                            while( have_rows( 'nav_group_three', 'option' ) ): the_row();
                                $parent_three = get_sub_field('group_3_link');
                                $parent_three_link = $parent_three['url'];
                                $parent_three_title = $parent_three['title'];

                                $feat_col_title = get_sub_field('featured_column_title');

                                $feat_three = get_sub_field('group_3_feat_link');
                                $feat_three_link = $feat_three['url'];
                                $feat_three_title = $feat_three['title'];

                                $feat_three_desc = get_sub_field( 'group_3_feat_description' );

                                $feat_three_cta = get_sub_field( 'group_3_feat_cta' );
                                $feat_three_cta_link = $feat_three_cta['url'];
                                $feat_three_cta_title = $feat_three_cta['title'];

                            ?>
                            <a href="<?php echo esc_url($parent_three_link); ?>" class="a-hover" title="<?php echo esc_attr($parent_three_title); ?>"><?php echo esc_attr($parent_three_title); ?></a>
                            <div class="submenu-container">
                                <div class="col-3 featured">
                                    <p class="title"><?php echo $feat_col_title; ?></p>
                                    <div class="spacer-10"></div>
                                    <div class="featured-label">
                                        <a href="<?php  echo esc_url($feat_three_link); ?>" class="link" title="<?php echo esc_attr($feat_three_title); ?>"><?php echo esc_attr($feat_three_title); ?></a>
                                        <p><?php echo $feat_three_desc; ?></p>
                                        <div class="orange-btn">
                                            <a href="<?php echo esc_url($feat_three_cta_link); ?>" title="<?php echo esc_attr($feat_three_cta_title); ?>"><?php echo esc_attr($feat_three_cta_title); ?></a>
                                        </div>
                                    </div>
                                </div>
                                <?php if ( have_rows( 'group_3_columns' ) ): 
                                    while ( have_rows( 'group_3_columns' ) ): the_row(); 
                                        $title = get_sub_field('column_title');
                                        $desc = get_sub_field('column_description');
                                    ?>
                                        <div class="col-3">
                                            <p class="title"><?php echo $title; ?></p>
                                            <div class="spacer-10"></div>
                                            <?php if ( have_rows( 'simple_links' ) ): ?>
                                                <ul class="menu-sublist pad">
                                                    <?php while( have_rows( 'simple_links' ) ): the_row();
                                                        $link = get_sub_field('link_item');
                                                        $link_url = $link['url'];
                                                        $link_title = $link['title'];
                                                    ?>
                                                    <li>
                                                        <a href="<?php echo esc_url($link_url); ?>" title="<?php echo esc_attr($link_title); ?>">
                                                            <span><?php echo esc_attr($link_title); ?></span>
                                                        </a>
                                                    </li>
                                                    <?php endwhile; ?>
                                                </ul>
                                            <?php endif; ?>
                                        </div>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </li>

                    <li class="fourth-option">
                    <?php if( have_rows( 'nav_group_four', 'option' ) ): ?>
                        <?php
                        while( have_rows( 'nav_group_four', 'option' ) ): the_row();
                            $parent_four = get_sub_field('group_4_single');
                            $parent_four_link = $parent_four['url'];
                            $parent_four_title = $parent_four['title'];
                        ?>
                            <a href="<?php echo esc_url($parent_four_link); ?>" class="a-hover" title="<?php echo esc_attr($parent_four_title); ?>"><?php echo esc_attr($parent_four_title); ?></a>
                        <?php endwhile; ?>
                    <?php endif; ?>
                    </li>


                    <li class="nav-pin fifth-option">
                        <?php if( have_rows( 'nav_group_five', 'option' ) ): ?>
                            <?php while( have_rows( 'nav_group_five', 'option' ) ): the_row();
                                $parent_five = get_sub_field('group_5_parent_link');
                                $parent_five_link = $parent_five['url'];
                                $parent_five_title = $parent_five['title'];

                            ?>
                            <a href="<?php echo esc_url($parent_five_link); ?>" class="a-hover" title="<?php echo esc_attr($parent_five_title); ?>"><?php echo esc_attr($parent_five_title); ?></a>
                            <div class="submenu-container">
                                <?php if ( have_rows( 'group_5_simple_links' ) ): ?>
                                    <div class="col-3">
                                        <ul class="menu-sublist pad">
                                            <?php while( have_rows( 'group_5_simple_links' ) ): the_row();
                                                $link = get_sub_field('link_item');
                                                $link_url = $link['url'];
                                                $link_title = $link['title'];
                                            ?>
                                            <li>
                                                <a href="<?php echo esc_url($link_url); ?>" title="<?php echo esc_attr($link_title); ?>">
                                                    <span><?php echo esc_attr($link_title); ?></span>
                                                </a>
                                            </li>
                                            <?php endwhile; ?>
                                        </ul>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <?php endwhile; ?>
                        <?php endif; ?>
                    </li>

                    <li class="sixth-option"><a href="/subscribe/" class="a-hover-single" title="Subscribe">Subscribe</a></li>

                    <?php
                    $user_ID = get_current_user_id();
                    $user = wp_get_current_user(); // getting & setting the current user

                    ob_start();
                    ?>

                    <li class="nav-pin seventh-option account">
                        <a href="/account/" class="a-hover" title="Account">Account</a>
                        <div class="submenu-container">
                            <div class="col-3">
                                <ul class="menu-sublist pad">
                                    <li class="menu-item">
                                        <a href="/account/" title="Account">
                                            <span>My Account</span>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="/scorecard/small-firm-scorecard/" title="Update My Scorecard">
                                            <span>Update My Scorecard</span>
                                        </a>
                                    </li>
                                
                                    <?php $customer_check = check_if_customer();
                                    if ( $customer_check == true ) { ?>
                                        <li class="b-round">
                                            <a href="/my-digital-products/" title="View My Purchases">
                                                <span>Courses & Downloads</span>
                                            </a>
                                        </li>
                                    <?php } ?>

                                    <?php $roles = ( array ) $user->roles;
                                        $labster = in_array( 'labster', $roles );
                                        $coach = in_array( 'lab_coach', $roles );
                                        $admin = in_array( 'administrator', $roles );
                                        if ( ( $labster == true ) || ( $coach == true ) || ( $admin == true ) ) { ?>
                                            <li class="menu-item">
                                                <a href="https://portal.lawyerist.com/" target="_blank" title="Visit Your Lab Portal">
                                                    <span>Lab Portal</span>
                                                </a>
                                            </li>
                                        <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </li>

                    <li class="eight-option"><span class="search-toggler">⚲</span><div class="search-toggle"><?php get_search_form(); ?></div></li>
                </ul>
            </div>
        </div>

        <div class="menu-toggler" id="menu-toggler">
            <div class="hamburger"></div>
        </div>

            <!-- start -->
            <ul class="menu-list mobile-show mobile-wrapper open" id="menu-list" style="background:#424B54;">
            <?php if( have_rows( 'nav_group_one', 'option' ) ): ?>
                <?php
                    while( have_rows( 'nav_group_one', 'option' ) ): the_row();
                        $parent_one = get_sub_field('parent_link');
                        $parent_one_link = $parent_one['url'];
                        $parent_one_title = $parent_one['title'];

                        $feat_one = get_sub_field( 'option_featured_link' );
                        $feat_one_link = $feat_one['url'];
                        $feat_one_title = $feat_one['title'];

                        $feat_one_desc = get_sub_field( 'option_featured_description' );

                        $feat_one_cta = get_sub_field( 'option_featured_cta' );
                        $feat_one_cta_link = $feat_one_cta['url'];
                        $feat_one_cta_title = $feat_one_cta['title'];
                    ?>
                    <li class="nav-pin">
                        <div class="link-wrapper-x">
                            <a href="<?php echo esc_url($feat_one_link); ?>" class="no-event mobile-a" title="<?php echo esc_attr($feat_one_title); ?>"><?php echo esc_attr($feat_one_title); ?></a>
                        </div>
                        <div class="submenu-container">
                            <div class="col-list m-bx featured">
                                <div class="featured-label">
                                    <a href="<?php  echo esc_url($feat_one_link); ?>" class="link" title="<?php echo esc_attr($feat_one_title); ?>"><?php echo esc_attr($feat_one_title); ?></a>
                                    <p><?php echo $feat_one_desc; ?></p>
                                    <div class="orange-btn">
                                        <a href="<?php echo esc_url($feat_one_cta_link); ?>" title="<?php echo esc_attr($feat_one_cta_title); ?>"><?php echo esc_attr($feat_one_cta_title); ?></a>
                                    </div>
                                </div>
                            </div>
                            <?php if ( have_rows( 'simple_links' ) ): ?>
                                <div class="col-list">
                                    <ul class="menu-sublist">
                                        <?php while( have_rows( 'simple_links' ) ): the_row();
                                            $link = get_sub_field('link_item');
                                            $link_url = $link['url'];
                                            $link_title = $link['title'];
                                        ?>
                                        <li class="b-round">
                                            <a href="<?php echo esc_url($link_url); ?>" title="<?php echo esc_attr($link_title); ?>">
                                                <span><?php echo esc_attr($link_title); ?></span>
                                            </a>
                                        </li>
                                        <?php endwhile; ?>
                                    </ul>
                                </div>
                            <?php endif; ?>
                        </div>
                    </li>
                    <?php endwhile; ?>
                <?php endif; ?>


                <li class="nav-pin">
                    <div class="link-wrapper-x">
                        <?php if( have_rows( 'nav_group_two', 'option' ) ): 
                            while( have_rows( 'nav_group_two', 'option' ) ):the_row();
                                $parent_two = get_sub_field('parent_link');
                                $parent_two_link = $parent_two['url'];
                                $parent_two_title = $parent_two['title'];
                        ?>
                                <a href="<?php echo esc_url($parent_two_link); ?>" class="no-event mobile-a" title="<?php echo esc_attr($parent_two_title); ?>"><?php echo esc_attr($parent_two_title); ?></a>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>

                    <?php if( have_rows( 'nav_group_two', 'option' ) ): ?>
                        <?php
                        while( have_rows( 'nav_group_two', 'option' ) ):
                        the_row();

                            $option_one_text = get_sub_field( 'option_one_text' );
                            $option_one_link = get_sub_field( 'option_one_link' );
                            $option_one_description = get_sub_field( 'option_one_description' );

                            $options_two_text = get_sub_field( 'options_two_text' );
                            $option_two_link = get_sub_field( 'option_two_link' );
                            $option_two_description = get_sub_field( 'option_two_description' );

                            $option_three_text = get_sub_field( 'option_three_text' );
                            $option_three_link = get_sub_field( 'option_three_link' );
                            $option_three_description = get_sub_field( 'option_three_description' );

                            $option_four_text = get_sub_field( 'option_four_text' );
                            $option_four_link = get_sub_field( 'option_four_link' );

                            $option_five_text = get_sub_field( 'option_five_text' );
                            $option_five_link = get_sub_field( 'option_five_link' );

                        ?>
                    <div class="submenu-container">
                        <div class="col-list m-bx featured">
                            <div class="featured-label">
                                <a href="<?php  echo esc_url($feat_two_link); ?>" class="link" title="<?php echo esc_attr($feat_two_title); ?>"><?php echo esc_attr($feat_two_title); ?></a>
                                <p><?php echo $feat_two_desc; ?></p>
                                <div class="orange-btn">
                                    <a href="<?php echo esc_url($feat_two_cta_link); ?>" title="<?php echo esc_attr($feat_two_cta_title); ?>"><?php echo esc_attr($feat_two_cta_title); ?></a>
                                </div>
                            </div>
                        </div>
                        <?php if ( have_rows( 'descriptive_links' ) ): ?>
                            <div class="col-list">
                                <ul class="menu-sublist">
                                    <?php while( have_rows( 'descriptive_links' ) ): the_row();
                                        $link = get_sub_field('link_item');
                                        $link_url = $link['url'];
                                        $link_title = $link['title'];
                                        $link_desc = get_sub_field('link_description');
                                    ?>
                                    <li class="b-round">
                                        <a href="<?php echo esc_url($link_url); ?>" title="<?php echo esc_attr($link_title); ?>"  <?php if ( !empty($link_desc) ) { ?>class="desc-grid"<?php } ?>>
                                            <span><?php echo esc_attr($link_title); ?></span>
                                            <?php if ( !empty($link_desc) ) { ?>
                                                <p><?php echo $link_desc; ?></p>
                                            <?php } ?>
                                        </a>
                                    </li>
                                    <?php endwhile; ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                    </div>
                    <?php endwhile; ?>
                <?php endif; ?>
                </li>

                <li class="nav-pin">
                    <div class="link-wrapper-x">
                        <?php if( have_rows( 'nav_group_three', 'option' ) ):
                            while( have_rows( 'nav_group_three', 'option' ) ): the_row();
                                $parent_three = get_sub_field('group_3_link');
                                $parent_three_link = $parent_three['url'];
                                $parent_three_title = $parent_three['title'];

                                $feat_col_title = get_sub_field('featured_column_title');
                                $feat_col_desc = get_sub_field('featured_column_description');

                                $feat_three = get_sub_field('group_3_feat_link');
                                $feat_three_link = $feat_three['url'];
                                $feat_three_title = $feat_three['title'];

                                $feat_three_desc = get_sub_field( 'group_3_feat_description' );

                                $feat_three_cta = get_sub_field( 'group_3_feat_cta' );
                                $feat_three_cta_link = $feat_three_cta['url'];
                                $feat_three_cta_title = $feat_three_cta['title'];
                            ?>
                                <a href="<?php echo esc_url($parent_three_link); ?>" class="no-event mobile-a" title="<?php echo esc_attr($parent_three_title); ?>"><?php echo esc_attr($parent_three_title); ?></a>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                    <?php if( have_rows( 'nav_group_three', 'option' ) ):
                        while( have_rows( 'nav_group_three', 'option' ) ): the_row(); ?>
                            <div class="submenu-container">
                                <div class="col-list m-bx featured">
                                    <p class="title"><?php echo $feat_col_title; ?></p>
                                    <p class="sub-text"><?php echo $feat_col_desc; ?></p>
                                    <div class="featured-label">
                                        <a href="<?php  echo esc_url($feat_three_link); ?>" class="link" title="<?php echo esc_attr($feat_three_title); ?>"><?php echo esc_attr($feat_three_title); ?></a>
                                        <p><?php echo $feat_three_desc; ?></p>
                                        <div class="orange-btn">
                                            <a href="<?php echo esc_url($feat_three_cta_link); ?>" title="<?php echo esc_attr($feat_three_cta_title); ?>"><?php echo esc_attr($feat_three_cta_title); ?></a>
                                        </div>
                                    </div>
                                </div>
                                <?php if ( have_rows( 'group_3_columns' ) ): ?>
                                    <div class="col-list m-bx">
                                        <?php while ( have_rows( 'group_3_columns' ) ): the_row(); 
                                            $title = get_sub_field('column_title');
                                            $desc = get_sub_field('column_description');
                                        ?>
                                            <p class="title"><?php echo $title; ?></p>
                                            <p class="sub-text"><?php echo $description; ?></p>
                                            <?php if ( have_rows( 'simple_links' ) ): ?>
                                                <ul class="menu-sublist pad">
                                                    <?php while( have_rows( 'simple_links' ) ): the_row();
                                                        $link = get_sub_field('link_item');
                                                        $link_url = $link['url'];
                                                        $link_title = $link['title'];
                                                    ?>
                                                    <li class="b-round">
                                                        <a href="<?php echo esc_url($link_url); ?>" title="<?php echo esc_attr($link_title); ?>">
                                                            <span><?php echo esc_attr($link_title); ?></span>
                                                        </a>
                                                    </li>
                                                    <?php endwhile; ?>
                                                </ul>
                                            <?php endif; ?>
                                        <?php endwhile; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </li>
                <li class="nav-pin">
                    <div class="link-wrapper-x">

                    <?php if( have_rows( 'nav_group_four', 'option' ) ):
                        while( have_rows( 'nav_group_four', 'option' ) ): the_row();
                            $parent_four = get_sub_field('group_4_single');
                            $parent_four_link = $parent_four['url'];
                            $parent_four_title = $parent_four['title'];
                        ?>
                            <a href="<?php echo esc_url($parent_four_link); ?>" class="mobile-a none-after" title="<?php echo esc_attr($parent_four_title); ?>"><?php echo esc_attr($parent_four_title); ?></a>
                        <?php endwhile; ?>
                    <?php endif; ?>
                    </div>
                </li>

                <li class="nav-pin">
                    <div class="link-wrapper-x">

                        <?php if( have_rows( 'nav_group_five', 'option' ) ):
                            while( have_rows( 'nav_group_five', 'option' ) ): the_row();
                                $parent_five = get_sub_field('group_5_parent_link');
                                $parent_five_link = $parent_five['url'];
                                $parent_five_title = $parent_five['title'];

                            ?>
                                <a href="<?php echo esc_url($parent_five_link); ?>" class="no-event mobile-a" title="<?php echo esc_attr($parent_five_title); ?>"><?php echo esc_attr($parent_five_title); ?></a>
                            <?php endwhile; ?>
                        <?php endif; ?>

                    </div>

                    <?php if( have_rows( 'nav_group_five', 'option' ) ):
                        while( have_rows( 'nav_group_five', 'option' ) ): the_row(); ?>
                            <div class="submenu-container">
                                <?php if ( have_rows( 'group_5_simple_links' ) ): ?>
                                    <div class="col-list">
                                        <ul class="menu-sublist pad">
                                            <?php while( have_rows( 'group_5_simple_links' ) ): the_row();
                                                $link = get_sub_field('link_item');
                                                $link_url = $link['url'];
                                                $link_title = $link['title'];
                                            ?>
                                            <li class="b-round">
                                                <a href="<?php echo esc_url($link_url); ?>" title="<?php echo esc_attr($link_title); ?>">
                                                    <span><?php echo esc_attr($link_title); ?></span>
                                                </a>
                                            </li>
                                            <?php endwhile; ?>
                                        </ul>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </li>

                <li class="nav-pin" style="border-bottom: none;">
                    <div class="link-wrapper-x">
                        <a href="/subscribe/" class="mobile-a" title="Join">
                            <div class="join-cta">Join</div>
                        </a>
                    </div>
                </li>

                <li class="nav-pin search-pin black" style="border-bottom: none;" title="Search the site">
                    <?php get_search_form(); ?>
                </li>

                <?php
                    $user_ID = get_current_user_id();
                    $user = wp_get_current_user(); // getting & setting the current user
                    ob_start();
                ?>

                <li class="nav-pin">
                    <div class="link-wrapper-x" style="padding-bottom: 1rem;">
                        <a href="/account/" class="no-event mobile-a" title="Account">
                            <div class="center-text">
                                Account
                            </div>
                        </a>
                    </div>
                    <div class="submenu-container">
                        <div class="col-list">
                            <ul class="menu-sublist">
                                <li class="b-round">
                                    <a href="/account/" title="My Account">
                                        <span>My Account</span>
                                    </a>
                                <li class="b-round">
                                    <a href="/scorecard/small-firm-scorecard/" title="Update My Scorecard">
                                        <span>Update My Scorecard</span>
                                    </a>
                                </li>
                                
                                <?php if ( check_if_customer() == true ) { ?>
                                    <li class="b-round">
                                        <a href="/my-digital-products/" title="View My Purchases">
                                            <span>Courses & Downloads</span>
                                        </a>
                                    </li>
                                <?php } ?>

                                <?php $roles = ( array ) $user->roles;
                                $labster = in_array( 'labster', $roles );
                                $coach = in_array( 'lab_coach', $roles );
                                $admin = in_array( 'administrator', $roles );
                                if ( ( $labster == true ) || ( $coach == true ) || ( $admin == true ) ) { ?>
                                    <li class="b-round">
                                        <a href="https://portal.lawyerist.com/" target="_blank" title="Visit Your Lab Portal">
                                            <span>Lab Portal</span>
                                        </a>
                                    </li>
                                <?php } ?>

                            </ul>
                        </div>
                    </div>
                </li>
            </ul>

        <!-- End -->
    </nav>

  </header>
</div>

<?php restore_current_blog(); ?>

<script>
        const toggler = document.getElementById("menu-toggler");
        const subMen = document.querySelector(".submenu-container");

        toggler.addEventListener("click", function() {
            toggler.classList.toggle("open");

            var a = [];
            jQuery(".submenu-container").each(function(index) {
                a[index] = jQuery(this);
                a[index].removeClass('open');
            });
            var a = [];
            jQuery(".link-wrapper-x a").each(function(index) {
                a[index] = jQuery(this);
                a[index].removeClass('arrow-rotater');
            });
        });

    window.onclick = e => {
        if (e.target = 'link-wrapper-x') {
            if ( e.target.nextElementSibling.classList.contains('submenu-container') ) {
                e.target.nextElementSibling ? e.target.nextElementSibling.classList.toggle("open") : null;
            }

            if ( e.target.firstElementChild ) {

              e.target.firstElementChild.classList.toggle("arrow-rotater");
            }
        }
    }

    const searchBar = document.querySelector(".search-toggle");
    const btn = document.querySelector(".search-toggler");
    btn.onclick = function () {
        if ( btn.classList.contains('search-toggler-exit')) {
            btn.classList.toggle("search-toggler-exit");
            btn.textContent = "⚲";
        } else {
            btn.classList.toggle("search-toggler-exit");
            btn.textContent = "X";
    
        }
        
        if (searchBar.style.display !== "block") {
            searchBar.style.display = "block";
        } else {
            searchBar.style.display = "none";
        }
    };

</script>
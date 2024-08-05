<?php
    $banner_image = get_field('banner_image');
    $header = get_field('header');
    $description_one = get_field('description_one');
    $bold = get_field('bold');
    $description_two = get_field('description_two');
?>

<div class="banner">
    <div class="container">
        <div class="col-1">
            <?php if( !empty( $banner_image ) ): ?>
                <img src="<?php echo do_shortcode(esc_url($banner_image['url'])); ?>" alt="<?php echo do_shortcode(esc_attr($banner_image['alt'])); ?>" />
            <?php endif; ?>
        </div>
        <div class="col-1">
            <h1><?php echo $header; ?></h1>
            <p class="description"><?php echo $description_one; ?></p>
            <p class="bold"><?php echo $bold; ?></p>
            <p class="description"><?php echo $description_two; ?></p>
        </div>
    </div>
</div>

<div class="members">
    <div class="container">
        <div class="section-label">
            <p>LAWYERIST TEAM</p>
            <div class="divider"></div>
        </div>

        <div class="dropdown">
        <button onclick="toggleShowOptions()" id="dropbtn-target" class="dropbtn">Filter By...</button>
        <div id="myDropdown" class="dropdown-content">
            <div class="flx">
                <span onclick="filterSelection('all')">All</span>
                <span onclick="filterSelection('speakers')">Speakers</span>
                <span onclick="filterSelection('lab-coaches')">Lab Coaches</span>
            </div>
        </div>
        </div>
        <!-- Portfolio Gallery Grid -->

        <?php if ( have_rows( 'team' ) ): ?>
            <div class='team-members'>
            <?php while ( have_rows( 'team' ) ): the_row();
                $image = get_sub_field('image');
                $name = get_sub_field('name');
                $first_name = substr($name, 0, strpos($name, " "));
                $label = get_sub_field('label');
                $link = get_sub_field('link'); 
                $speaker = get_sub_field('speaker');
                $speaker_class = 'speakers';
                $coach = get_sub_field('coach');
                $coach_class = 'lab-coaches';
            ?>
                <div class="column <?php if ( $speaker == true ) { echo $speaker_class; } ?> <?php if ( $coach == true ) { echo $coach_class; } ?>">
                    <a href="<?php echo $link; ?>"title="Meet <?php echo $name; ?>">
                        <div class="content" id="<?php echo $first_name; ?>">
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" style="width:100%">
                            <span class="member-name"><?php echo $name; ?></span>
                            <p class="member-label"><?php echo $label; ?></p>
                        </div>
                    </a>
                </div>
            <?php endwhile; ?>
            </div>
        <?php endif; ?>
    
    </div>
</div>
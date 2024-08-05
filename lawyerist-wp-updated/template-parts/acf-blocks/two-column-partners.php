<?php 
    // (Block) Frontpage Banner
    $anchor = get_field( 'anchor' );
    $heading = get_field( 'heading' );
    $sub_text = get_field( 'sub_text' );
    $description = get_field( 'description' );
    $simple_text = get_field( 'simple_text' );
    $partners = get_field('partner_widget_shortcode');
    $partner_shortcode = "'[" . $partners . "]'";
    $logo_one = get_field( 'logo_one' );
    $logo_two = get_field( 'logo_two' );
    $logo_three = get_field( 'logo_three' );
    $logo_four = get_field('logo_four');
    $logo_five = get_field('logo_five');
    $logo_six = get_field('logo_six');
    $logo_seven = get_field('logo_seven');
    $logo_eight = get_field('logo_eight');

    $logo_one_url = get_field('logo_one_url');
    $logo_two_url = get_field('logo_two_url');
    $logo_three_url = get_field('logo_three_url');
    $logo_four_url = get_field('logo_four_url');
    $logo_five_url = get_field('logo_five_url');
    $logo_six_url = get_field('logo_six_url');
    $logo_seven_url = get_field('logo_seven_url');
    $logo_eight_url = get_field('logo_eight_url');
    
?>

<div id="<?php echo $anchor; ?>" class="two-column-partners">
    <div class="wrapper">

        <div class="col-1">
            <div class="content">
                <h2><?php echo $heading; ?></h2>
                <p class="sub-text"><?php echo $sub_text; ?></p>
                <?php echo $description; ?>
                <?php echo $simple_text; ?>
            </div>
        </div>
        <div class="col-2">
            <?php echo do_shortcode( '[platinum_partners]' ); ?>
        </div>
    </div>
</div>
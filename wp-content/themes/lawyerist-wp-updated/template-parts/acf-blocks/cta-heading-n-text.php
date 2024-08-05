<?php 
    // (Block) Frontpage Banner
    $anchor = get_field( 'anchor' );
    $heading = get_field( 'heading' );
    $sub_text = get_field( 'sub_text' );
    $button_text = get_field( 'button_text' );
    $button_link = get_field( 'button_link' );
?>

<div id="<?php echo $anchor; ?>" class="cta-heading-n-text">
    <div class="wrapper">
        <h2><?php echo $heading; ?></h2>
        <p><?php echo $sub_text; ?></p>
        <a href="<?php echo $button_link; ?>">
            <div class="orange-btn">
                <span><?php echo $button_text; ?></span>
            </div>
        </a>
    </div>
    
    <div class="line-pin">
        <svg xmlns="http://www.w3.org/2000/svg" width="323.782" height="630.527" viewBox="0 0 323.782 630.527">
            <g id="coaching-dotten-line-1" transform="translate(-849.218 -730.497)">
                <path id="Path_859" data-name="Path 859" d="M-5026.926,685.926s16.131,133.345,80.158,295.086,203.592,288.6,203.592,288.6" transform="translate(5877.137 44.691)" fill="none" stroke="#88a2aa" stroke-width="2" stroke-dasharray="7"/>
                <g id="Group_2477" data-name="Group 2477" transform="translate(0 9.024)">
                <circle id="Ellipse_179" data-name="Ellipse 179" cx="18.5" cy="18.5" r="18.5" transform="translate(1121 1300)" fill="#ff7062" opacity="0.313"/>
                <g id="Ellipse_178" data-name="Ellipse 178" transform="translate(1129 1308)" fill="#ff7062" stroke="#fff" stroke-width="3">
                    <circle cx="10.5" cy="10.5" r="10.5" stroke="none"/>
                    <circle cx="10.5" cy="10.5" r="9" fill="none"/>
                </g>
                </g>
            </g>
        </svg>
    </div>
</div>
<?php
    $heading = get_field('heading');
    $quote = get_field('quote');
    $col_one_title = get_field('col_one_title');
    $col_one_description = get_field('col_one_description');
    $col_two_title = get_field('col_two_title');
    $col_two_description = get_field('col_two_description');
?>


<div class="our-business">
    <div class="container">
        <div class="inner-contain">
            <h2><?php echo $heading; ?></h2>
            <div class="quote">
                <p><?php echo $quote; ?></p>
            </div>
            <div class="steps">
                <div class="col-1 one">
                    <p class="title"><?php echo $col_one_title; ?></p>
                    <p class="description"><?php echo $col_one_description; ?></p>
                </div>
                <div class="col-1 two">
                <p class="title"><?php echo $col_two_title; ?></p>
                    <p class="description"><?php echo $col_two_description; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    @media all and (min-width: 768px) {
        .one {
            padding-right: 25px;
        }
    }
</style>
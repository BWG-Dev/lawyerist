<?php 

    $header = get_field('header');
    $description = get_field('description');

?>

<div class="speaking-events">
    <div class="container">
        <div class="heading">
            <div class="header"><?php echo $header; ?></div>
            <div class="description"><?php echo $description; ?></div>
        </div>

        <div class="events-list">
            <div class="container">
                <div class="titlz" id="events-label">
                    <p class="text" style="color:#424B54 !important;">Subject</p>
                    <p class="text" style="color:#424B54 !important;">Topics</p>
                </div>
                <div class="flex">

                <?php if( have_rows('speaking_events') ): 
                    $i = 1;
                    while( have_rows('speaking_events') ): the_row(); 
                        $number = get_sub_field('number');
                        $title = get_sub_field('title');
                        $lawline = get_sub_field('lawline');
                        ?>
                        
                    <div class="content">
                        <div class="flex-content">
                            <div class="titlm">
                                <div class="number"><?php echo $number; ?></div>
                                <div class="title"><?php echo $title; ?></div>
                            </div>
                            <div class="details">
                                <p class="text"><?php echo $lawline; ?></p>
                            </div>
                        </div>
                    </div>
                        
                    <?php $i++;
                    endwhile; ?>
                    
                <?php endif; ?>

                </div>
                <?php if ( $i >= 6 ): ?>
                    <a href="#" id="loadMore">View More Speaking Appearances</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
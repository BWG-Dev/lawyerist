<?php  
    $anchor = get_field( 'anchor' );
    $avatar = get_field( 'avatar' );
    $author = get_field( 'author' );
    $author_label = get_field( 'author_label' );
    $quote = get_field( 'quote' );
    $description = get_field( 'description' );
?>

<!-- Section 1 -->
<div id="<?php if( !empty(  $anchor ) ): ?><?php echo $anchor; ?><?php endif; ?>" class="<?php if( !empty( $anchor ) ): ?><?php echo $anchor; ?><?php endif; ?> about-footer-cta-fw">
    <div class="container">
        <div class="col-1">
            <div class="details">
                <div class="user">
                    <div class="avatar" style="background-image:url('<?php echo $avatar; ?>');"></div>
                    <div class="user-details">
                        <p class="username"><?php echo $author; ?></p>
                        <p class="user-label"><?php echo $author_label; ?></p>
                    </div>
                </div>
                <div class="quote">
                    <?php echo $quote; ?>
                    <p class="description"><?php echo $description; ?></p>
                </div>
            </div>
        </div>
        <div class="col-2">
            <div class="ft-form">
                <h2 class="header">Request a Speaker</h2>
                <p class="description">Fill out the form below to invite Lawyerist to speak at your next virtual or in-person event.</p>

                <?php echo do_shortcode('[gravityform id="97"]'); ?>
            </div>
        </div>
    </div>
</div>
<!-- End section 1 -->

<script>

    var ignoreClickOnFirstName = document.querySelector('input#input_97_1');

    document.addEventListener('click', function(event) {
        var isClickInsideElement = ignoreClickOnFirstName.contains(event.target);
        if (!isClickInsideElement) {
            // Do something click is outside specified element
            var myInput = document.querySelector("input#input_97_1");
            if (myInput && myInput.value) {
                myInput.setAttribute("style", "background-position: 200% 50% !important;");
            } else {
                myInput.setAttribute("style", "background-position: 19% 50% !important;")
            }
        }
    });
    var ignoreClickOnLastName = document.querySelector('input#input_97_2');

    document.addEventListener('click', function(event) {
        var isClickInsideElement = ignoreClickOnLastName.contains(event.target);
        if (!isClickInsideElement) {
            // Do something click is outside specified element
            var myInput = document.querySelector("input#input_97_2");
            if (myInput && myInput.value) {
                myInput.setAttribute("style", "background-position: 200% 50% !important;");
            } else {
                myInput.setAttribute("style", "background-position: 18% 50% !important;")
            }
        }
    });
    var ignoreClickOnEmail = document.querySelector('input#input_97_3');

    document.addEventListener('click', function(event) {
        var isClickInsideElement = ignoreClickOnEmail.contains(event.target);
        if (!isClickInsideElement) {
            // Do something click is outside specified element
            var myInput = document.querySelector("input#input_97_3");
            if (myInput && myInput.value) {
                myInput.setAttribute("style", "background-position: 200% 50% !important;");
            } else {
                myInput.setAttribute("style", "background-position: 11% 50% !important;")
            }
        }
    });
    var ignoreClickOnMessage = document.querySelector('textarea#input_97_4');

    document.addEventListener('click', function(event) {
        var isClickInsideElement = ignoreClickOnMessage.contains(event.target);
        if (!isClickInsideElement && isClickInsideElement) {
            // Do something click is outside specified element
            var myInput = document.querySelector("textarea#input_97_4");
            if (myInput && myInput.value) {
                myInput.setAttribute("style", "background-position: 200% 50% !important;");
            } else {
                myInput.setAttribute("style", "background-position: 200px 15px !important;");
            }
        }
    });

</script>
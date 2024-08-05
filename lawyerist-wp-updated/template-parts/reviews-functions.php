<?php /* Functions for Review Pages */ 

function build_features_chart($spec_id, $prod_category) {
    global $post;
    $url = get_field('website');

	$specifications_group_id = $spec_id; // Post ID of the specifications field group.
	$specifications_fields = array();
	$fields = acf_get_fields( $specifications_group_id );
	foreach ( $fields as $field ) {
		$field_value = get_field( $field['name'] );
        $specifications_fields[$field['name']] = $field;
        $specifications_fields[$field['name']]['value'] = $field_value;
	} ?>

    <div id="product-details">
        <div class="details-wrapper">
            <div class="title">
                <h3>Product Details</h3>
            </div>
            <div class="details">
            
            <?php foreach ( $specifications_fields as $spec_field ) { // add details
                $type = $spec_field['type'];
                $label = $spec_field['label'];
                $value = $spec_field['value'];
                $message = $spec_field['message'];
                ?>
                
                <?php if ( $type == 'url' )  { 
                    $url = get_field('website');
                    $utm_pos = strpos($url, '?');
                    if ( $utm_pos != false ) {
                        $url_trimmed = substr( $url, 0, $utm_pos );
                        ?> 
                        <div class="flex b-bottom">
                            <div class="detail-title"><?php echo $label; ?></div>
                            <div class="url"><a href="<?php echo esc_url($url); ?>" title="Visit Website" target="_blank"><?php echo $url_trimmed; ?></a></div>
                        </div>
                    <?php } else { ?>
                        <div class="flex b-bottom">
                            <div class="detail-title"><?php echo $label; ?></div>
                            <div class="url"><a href="<?php echo esc_url($url); ?>" title="Visit Website" target="_blank"><?php echo $url; ?></a></div>
                        </div>
                    <?php } 
                } else if ( ( $type == 'checkbox' ) && ( $value[0] == 'None' ) && ( $label == 'Software Integrations' ) ) {
                    continue;
                } else if ( $type == 'checkbox' ) { ?>
                    <div class="flex b-bottom">
                        <div class="detail-title"><?php echo $label; ?></div>
                        <ul>
                            <?php foreach ( $value as $value_item ) { ?>
                                <li><?php echo $value_item; ?></li>
                            <?php } ?>
                        </ul>
                    </div>
                <?php }
            } ?>
            </div> <!-- close details -->
        </div> <!-- close details-wrapper -->
    </div> <!-- close #product-details -->

    <?php // Sponsored Testimonial
    $testimonial = get_field('sas_testimonial');
    $testimonial_source = get_field('sas_testimonial_source');
    if ( !empty($testimonial) ) { 
        $testimonial_array = explode(' ', $testimonial);
        $testimonial_first_raw = array_slice($testimonial_array, 0, 12);
        $testimonial_first = implode(' ', $testimonial_first_raw);
        $testimonial_second_raw = array_slice($testimonial_array, 12);
        $testimonial_second = implode(' ', $testimonial_second_raw);

        $source_separator = strpos($testimonial_source, ',');
        $source_name = substr( $testimonial_source, 0, $source_separator );
        $source_title_raw = substr( $testimonial_source, $source_separator );
        $source_title = substr($source_title_raw, 2);
    ?>
        <div id="sponsored-testimonial">
            <div class="sp-testimonial">
                <div class="sp-testimonial_upper">
                    <span class="source"><?php echo $source_name; ?></span>
                    <span class="cred"><?php echo $source_title; ?></span>
                </div>
                <div class="sp-testimonial_divider">&nbsp;</div>
                <div class="sp-testimonial_lower">
                    <span class="testimonial big"><?php echo $testimonial_first; ?></span>
                    <span class="testimonial small"><?php echo $testimonial_second; ?></span>
                </div>
            </div>
        </div>
        <div class="spacer-60 anchor"></div>
    <?php } ?>


    <div id="core-features">
        <div class="features-wrapper">
            <div class="title">
                <h3>Core Features</h3>
                <p>For <?php echo $prod_category; ?>, the following are essential features, and you should therefore expect to see a check in every box in this section.</p>
            </div>

            <div class="tbl">
                <div class="row top">
                    <div class="cell"> </div>
                    <div class="cell six"> Yes </div>
                    <div class="cell span2-5 six"> No </div>
                </div>

                <?php 
                foreach ( $specifications_fields as $spec_field ) { // add details
                    $type = $spec_field['type'];
                    $label = $spec_field['label'];
                    $value = $spec_field['value'];
                    $message = $spec_field['message'];
                    $name = $spec_field['_name'];
                    $truefalse = get_field($name);
                    ?>
                    
                    <?php if ( ( $type == 'true_false' ) && ( $value == true ) ) { ?>
                        <div class="row bottom">
                            <div class="cell desktop-w">
                                <h3 class="title"><?php echo $label; ?></h3>
                                <p class="description"><?php echo $message; ?></p>
                            </div>
                            <div class="cell flex"><form><input id="1" type="radio" name="radio" checked /></form></div>
                            <div class="cell span2-5 flex"><input type="radio" name="radio" onclick="this.checked=false;"/></div>
                        </div>
                    <?php } else if ( ( $type == 'true_false' ) && ( $value !== true ) ) { ?>
                        <div class="row bottom">
                            <div class="cell desktop-w">
                                <h3 class="title"><?php echo $label; ?></h3>
                                <p class="description"><?php echo $message; ?></p>
                            </div>
                            <div class="cell span2-5 flex"><form><input id="1" type="radio" name="radio" onclick="this.checked=false;"/></form></div>
                            <div class="cell flex"><form><input id="2" type="radio" name="radio" checked /></form></div>
                        </div>
                    <?php }
                } ?>
            </div>
        </div>
    </div>
    <?php wp_reset_postdata(); 
}
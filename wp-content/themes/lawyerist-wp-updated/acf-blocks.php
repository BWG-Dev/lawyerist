<?php

// Check if function exists and hook into setup.
if ( function_exists( 'acf_register_block_type' ) ) {
  add_action( 'acf/init', 'register_acf_block_types' );
}


function register_acf_block_types() {

  // Call to Action
  acf_register_block_type(
    array(
      'name'              => 'cta',
      'title'             => __( 'Call to Action' ),
      'render_template'   => 'template-parts/acf-blocks/cta.php',
      'category'          => 'common',
      'icon'							=> 'button',
      'keywords'          => array( 'call to action', 'cta' ),

    )
  );

  // Current Podcast
  acf_register_block_type(
    array(
      'name'              => 'podcast',
      'title'             => __( 'Current Podcast' ),
      'render_template'   => 'template-parts/acf-blocks/current-podcast.php',
      'category'          => 'common',
      'icon'							=> 'microphone',
      'keywords'          => array( 'podcast' ),
    )
  );

  // Featured Pages
  acf_register_block_type(
    array(
      'name'              => 'featured-pages',
      'title'             => __( 'Featured Pages' ),
      'render_template'   => 'template-parts/acf-blocks/featured-pages.php',
      'category'          => 'common',
      'icon'							=> 'screenoptions',
      'keywords'          => array( 'blog posts', 'recent' ),
    )
  );

  // Front-Page Message
  acf_register_block_type(
    array(
      'name'              => 'message',
      'title'             => __( 'Message' ),
      'render_template'   => 'template-parts/acf-blocks/message.php',
      'category'          => 'common',
      'icon'							=> 'format-quote',
      'keywords'          => array( 'message' ),
    )
  );

  // Partner Updates
  acf_register_block_type(
    array(
      'name'              => 'partner-updates',
      'title'             => __( 'Partner Updates' ),
      'render_template'   => 'template-parts/acf-blocks/partner-updates.php',
      'category'          => 'common',
      'icon'							=> 'excerpt-view',
      'keywords'          => array( 'partner updates', 'product spotlights', 'sponsored' ),
    )
  );

  // Recent Blog Posts
  acf_register_block_type(
    array(
      'name'              => 'recent-blog-posts',
      'title'             => __( 'Recent News Articles' ),
      'render_template'   => 'template-parts/acf-blocks/recent-blog-posts.php',
      'category'          => 'common',
      'icon'							=> 'excerpt-view',
      'keywords'          => array( 'blog posts', 'recent' ),
    )
  );

  // Table of Contents
  acf_register_block_type(
    array(
      'name'              => 'table-of-contents',
      'title'             => __( 'Table of Contents' ),
      'render_template'   => 'template-parts/acf-blocks/table-of-contents.php',
      'category'          => 'common',
      'icon'							=> 'editor-ul',
      'keywords'          => array( 'table of contents', 'toc', 'index' ),
      'mode'              => 'preview',
    )
  );

  // Table of Contents
  acf_register_block_type(
    array(
      'name'              => 'in-page-ad',
      'title'             => __( 'In-Page Ad' ),
      'render_template'   => 'template-parts/acf-blocks/in-page-ad.php',
      'category'          => 'common',
      'icon'							=> 'editor-ul',
      'keywords'          => array( 'table of contents', 'toc', 'index' ),
      'mode'              => 'preview',
    )
  );

  // Footer Next Single
  acf_register_block_type(
    array(
      'name'              => 'footer-next-single',
      'title'             => __( 'Footer Next Single' ),
      'render_template'   => 'template-parts/acf-blocks/footer-next-single.php',
      'category'          => 'commonsx',
      'icon'							=> 'editor-ul',
      'keywords'          => array( 'step', 'footer', 'next' ),
      'mode'              => 'preview',
    )
  );

  // Full Width Comment Image
  acf_register_block_type(
    array(
      'name'              => 'full-width-comment-image',
      'title'             => __( 'Full Width - Comment + Image' ),
      'render_template'   => 'template-parts/acf-blocks/full-width-comment-image.php',
      'category'          => 'common',
      'icon'							=> 'editor-ul',
      'keywords'          => array( 'full width', 'full', 'comment', 'image', 'comment and image' ),
      'mode'              => 'preview',
    )
  );

  // Full Width Two Column Text and Image
  acf_register_block_type(
    array(
      'name'              => 'full-width-two-column-text-and-image',
      'title'             => __( 'Full Width Two Column Text + Image' ),
      'render_template'   => 'template-parts/acf-blocks/full-width-two-column-text-and-image.php',
      'category'          => 'common',
      'icon'							=> 'editor-ul',
      'keywords'          => array( 'full width', 'two column', 'full', 'comment', 'image', 'text and image' ),
      'mode'              => 'preview',
    )
  );

  // Header and Paragraph
  acf_register_block_type(
    array(
      'name'              => 'header-and-paragraph',
      'title'             => __( 'Header and Paragraph' ),
      'render_template'   => 'template-parts/acf-blocks/header-and-paragraph.php',
      'category'          => 'common',
      'icon'							=> 'editor-ul',
      'keywords'          => array( 'header', 'paragraph' ),
      'mode'              => 'preview',
    )
  );

  // Heading Left Margin
  acf_register_block_type(
    array(
      'name'              => 'heading-left-margin',
      'title'             => __( 'Heading Left Margin' ),
      'render_template'   => 'template-parts/acf-blocks/heading-left-margin.php',
      'category'          => 'common',
      'icon'							=> 'editor-ul',
      'keywords'          => array( 'heading', 'left margin', 'margin', 'left align', 'align left' ),
      'mode'              => 'preview',
    )
  );

  // Landing Page Banner
  acf_register_block_type(
    array(
      'name'              => 'landing-banner',
      'title'             => __( 'Landing Page Banner' ),
      'render_template'   => 'template-parts/acf-blocks/landing-banner.php',
      'category'          => 'common',
      'icon'							=> 'editor-ul',
      'keywords'          => array( 'landing page banner', 'banner', 'landing page', 'landing', 'header' ),
      'mode'              => 'preview',
    )
  );

  // Large Quote
  acf_register_block_type(
    array(
      'name'              => 'large-quote',
      'title'             => __( 'Large Quote' ),
      'render_template'   => 'template-parts/acf-blocks/large-quote.php',
      'category'          => 'common',
      'icon'							=> 'editor-ul',
      'keywords'          => array( 'large quote', 'quote' ),
      'mode'              => 'preview',
    )
  );

  // Large Quote With Author
  acf_register_block_type(
    array(
      'name'              => 'quote-large-wt-author',
      'title'             => __( 'Large Quote with Author' ),
      'render_template'   => 'template-parts/acf-blocks/quote-large-wt-author.php',
      'category'          => 'common',
      'icon'							=> 'editor-ul',
      'keywords'          => array( 'large quote', 'quote', 'author' ),
      'mode'              => 'preview',
    )
  );

  // Orange Button
  acf_register_block_type(
    array(
      'name'              => 'orange-button',
      'title'             => __( 'Orange Button' ),
      'render_template'   => 'template-parts/acf-blocks/orange-button.php',
      'category'          => 'common',
      'icon'							=> 'editor-ul',
      'keywords'          => array( 'orange button', 'button', 'cta', 'orange' ),
      'mode'              => 'preview',
    )
  );

  // Plain Image vertical line and text
  acf_register_block_type(
    array(
      'name'              => 'plain-image-vline-and-text',
      'title'             => __( 'Plaing Image vLine + Text' ),
      'render_template'   => 'template-parts/acf-blocks/plain-image-vline-and-text.php',
      'category'          => 'common',
      'icon'							=> 'editor-ul',
      'keywords'          => array( 'vertical line', 'orange line', 'healthy verticle line' ),
      'mode'              => 'preview',
    )
  );

  // Plain vLine And Text
  acf_register_block_type(
    array(
      'name'              => 'plain-vline-and-text',
      'title'             => __( 'Plain vLine And Text' ),
      'render_template'   => 'template-parts/acf-blocks/plain-vline-and-text.php',
      'category'          => 'common',
      'icon'							=> 'editor-ul',
      'keywords'          => array( 'vertical', 'vertical line', 'vLine', 'plain text', 'text' ),
      'mode'              => 'preview',
    )
  );

  // Podcast CTA whtBG
  acf_register_block_type(
    array(
      'name'              => 'podcast-cta-whtbg',
      'title'             => __( 'Podcast CTA whtBG' ),
      'render_template'   => 'template-parts/acf-blocks/podcast-cta-whtbg.php',
      'category'          => 'common',
      'icon'							=> 'editor-ul',
      'keywords'          => array( 'podcast', 'cta', 'white background', 'background', 'white' ),
      'mode'              => 'preview',
    )
  );

  // Quote Full Width
  acf_register_block_type(
    array(
      'name'              => 'quote-full-width',
      'title'             => __( 'Quote Full Width' ),
      'render_template'   => 'template-parts/acf-blocks/quote-full-width.php',
      'category'          => 'common',
      'icon'							=> 'editor-ul',
      'keywords'          => array( 'full width quote', 'quote', 'full width' ),
      'mode'              => 'preview',
    )
  );

  // Single Page Banner
  acf_register_block_type(
    array(
      'name'              => 'single-banner',
      'title'             => __( 'Single Page Banner' ),
      'render_template'   => 'template-parts/acf-blocks/single-banner.php',
      'category'          => 'common',
      'icon'							=> 'editor-ul',
      'keywords'          => array( 'single page banner', 'single banner', 'banner', 'single', 'header' ),
      'mode'              => 'preview',
    )
  );

  // Text Area
  acf_register_block_type(
    array(
      'name'              => 'text-area',
      'title'             => __( 'Text + Area' ),
      'render_template'   => 'template-parts/acf-blocks/text-area.php',
      'category'          => 'common',
      'icon'							=> 'editor-ul',
      'keywords'          => array( 'Text Area', 'Text', 'Area' ),
      'mode'              => 'preview',
    )
  );

  // Two Column Image Quote
  acf_register_block_type(
    array(
      'name'              => 'two-column-image-quote',
      'title'             => __( 'Two Column Image Quote' ),
      'render_template'   => 'template-parts/acf-blocks/two-column-image-quote.php',
      'category'          => 'common',
      'icon'							=> 'editor-ul',
      'keywords'          => array( 'two column', 'image quote', 'quote', 'image' ),
      'mode'              => 'preview',
    )
  );

  // Two Column Review and Text
  acf_register_block_type(
    array(
      'name'              => 'two-column-review-and-text',
      'title'             => __( 'Two Column Review and Text' ),
      'render_template'   => 'template-parts/acf-blocks/two-column-review-and-text.php',
      'category'          => 'common',
      'icon'							=> 'editor-ul',
      'keywords'          => array( 'two column', 'review text', 'review', 'review and text', 'text', 'two' ),
      'mode'              => 'preview',
    )
  );

  // Two Column Text Element
  acf_register_block_type(
    array(
      'name'              => 'two-column-text-element',
      'title'             => __( 'Two Column Text Element' ),
      'render_template'   => 'template-parts/acf-blocks/two-column-text-element.php',
      'category'          => 'common',
      'icon'							=> 'editor-ul',
      'keywords'          => array( 'two column', 'text element', 'element', 'element and text', 'text', 'two' ),
      'mode'              => 'preview',
    )
  );

  // UL / LI (White BG)
  acf_register_block_type(
    array(
      'name'              => 'ul-li-white-bg',
      'title'             => __( 'UL / LI + White BG' ),
      'render_template'   => 'template-parts/acf-blocks/ul-li-white-bg.php',
      'category'          => 'common',
      'icon'							=> 'editor-ul',
      'keywords'          => array( 'ul', 'li', 'ul li', 'white background', 'white bg'),
      'mode'              => 'preview',
    )
  );

  ///----

  // Front Page Banner
  acf_register_block_type(
    array(
      'name'              => 'frontpage-banner',
      'title'             => __( 'Front Page Banner' ),
      'render_template'   => 'template-parts/acf-blocks/frontpage-banner.php',
      'category'          => 'common',
      'icon'							=> 'editor-ul',
      'keywords'          => array( 'Frontpage', 'Banner', 'Front'),
      'mode'              => 'preview',
    )
  );

  // Heading Text
  acf_register_block_type(
    array(
      'name'              => 'heading-text',
      'title'             => __( 'Heading Text' ),
      'render_template'   => 'template-parts/acf-blocks/heading-text.php',
      'category'          => 'common',
      'icon'							=> 'editor-ul',
      'keywords'          => array( 'Frontpage', 'Heading Text', 'Front', 'Heading'),
      'mode'              => 'preview',
    )
  );

  // Two Column Partners with Logos
  acf_register_block_type(
    array(
      'name'              => 'two-column-partners',
      'title'             => __( 'Two Column Partners & Logos' ),
      'render_template'   => 'template-parts/acf-blocks/two-column-partners.php',
      'category'          => 'common',
      'icon'							=> 'editor-ul',
      'keywords'          => array( 'Frontpage', 'Two Column', 'Two Column Partners', 'Partners'),
      'mode'              => 'preview',
    )
  );

  // CTA Heading & Text
  acf_register_block_type(
    array(
      'name'              => 'cta-heading-n-text',
      'title'             => __( 'CTA Heading & Text' ),
      'render_template'   => 'template-parts/acf-blocks/cta-heading-n-text.php',
      'category'          => 'common',
      'icon'							=> 'editor-ul',
      'keywords'          => array( 'Frontpage', 'Home CTA Button', 'Heading & Button', 'CTA Button'),
      'mode'              => 'preview',
    )
  );

  // Home Review Slider
  acf_register_block_type(
    array(
      'name'              => 'full-width-review-slider',
      'title'             => __( 'Frontpage Review Slider' ),
      'render_template'   => 'template-parts/acf-blocks/full-width-review-slider.php',
      'category'          => 'common',
      'icon'							=> 'editor-ul',
      'keywords'          => array( 'Frontpage', 'Home Slider', 'Slider', 'Frontpage Slider'),
      'mode'              => 'preview',
    )
  );

  // Home Review Slider
  acf_register_block_type(
    array(
      'name'              => 'two-column-limage-r-text',
      'title'             => __( 'Two Column Left Image + Right Text' ),
      'render_template'   => 'template-parts/acf-blocks/two-column-limage-r-text.php',
      'category'          => 'common',
      'icon'							=> 'editor-ul',
      'keywords'          => array( 'Frontpage', 'Two Column', 'Left Image', 'Right Text'),
      'mode'              => 'preview',
    )
  );

  // Home Steps Slider
  acf_register_block_type(
    array(
      'name'              => 'steps-slider', 
      'title'             => __( 'Steps Slider' ),
      'render_template'   => 'template-parts/acf-blocks/steps-slider.php',
      'category'          => 'common',
      'icon'							=> 'editor-ul',
      'keywords'          => array( 'Frontpage', 'Steps Slider', 'Slider', 'Steps'),
      'mode'              => 'preview',
    )
  );

  // Coaching Banner
  acf_register_block_type(
    array(
      'name'              => 'coaching-banner', 
      'title'             => __( 'Coaching Banner' ),
      'render_template'   => 'template-parts/acf-blocks/coaching-banner.php',
      'category'          => 'common',
      'icon'							=> 'editor-ul',
      'keywords'          => array( 'Coaching Banner', 'Banner', 'Coaching', 'Above The Fold'),
      'mode'              => 'preview',
    )
  );

  // Coaching - Coin One
  acf_register_block_type(
    array(
      'name'              => 'coaching-count-one', 
      'title'             => __( 'Coaching Count One' ),
      'render_template'   => 'template-parts/acf-blocks/coaching-count-one.php',
      'category'          => 'common',
      'icon'							=> 'editor-ul',
      'keywords'          => array( 'Coaching One', 'Count One', 'Section One', 'Step One'),
      'mode'              => 'preview',
    )
  );

  // Coaching - Coin Two
  acf_register_block_type(
    array(
      'name'              => 'coaching-count-two', 
      'title'             => __( 'Coaching Count Two' ),
      'render_template'   => 'template-parts/acf-blocks/coaching-count-two.php',
      'category'          => 'common',
      'icon'							=> 'editor-ul',
      'keywords'          => array( 'Coaching Two', 'Count Two', 'Section Two', 'Step Two'),
      'mode'              => 'preview',
    )
  );

  // Coaching - Coin Three
  acf_register_block_type(
    array(
      'name'              => 'coaching-count-three', 
      'title'             => __( 'Coaching Count Three' ),
      'render_template'   => 'template-parts/acf-blocks/coaching-count-three.php',
      'category'          => 'common',
      'icon'							=> 'editor-ul',
      'keywords'          => array( 'Coaching Three', 'Count Three', 'Section Three', 'Step Three'),
      'mode'              => 'preview',
    )
  );

  // Coaching - Pre-Footer
  acf_register_block_type(
    array(
      'name'              => 'apply-to-lab', 
      'title'             => __( 'Apply To Lab' ),
      'render_template'   => 'template-parts/acf-blocks/apply-to-lab.php',
      'category'          => 'common',
      'icon'							=> 'editor-ul',
      'keywords'          => array( 'Coaching Apply Lab', 'Apply Lab', 'Section Apply Lab', 'Step Lab'),
      'mode'              => 'preview',
    )
  );

  // About Child Banner
  acf_register_block_type(
    array(
      'name'              => 'about-child-banner', 
      'title'             => __( 'About Child Banner' ),
      'render_template'   => 'template-parts/acf-blocks/about-child-banner.php',
      'category'          => 'common',
      'icon'							=> 'editor-ul',
      'keywords'          => array( 'About Child Banner', 'Banner', 'Child'),
      'mode'              => 'preview',
    )
  );

  // About - Member Block One Full Width
  acf_register_block_type(
    array(
      'name'              => 'member-block-one-fw', 
      'title'             => __( 'About - Member Block One Full Width' ),
      'render_template'   => 'template-parts/acf-blocks/member-block-one-fw.php',
      'category'          => 'common',
      'icon'							=> 'editor-ul',
      'keywords'          => array( 'About Member Block One', 'Full Width'),
      'mode'              => 'preview',
    )
  );

  // About - Member Block Two Full Width
  acf_register_block_type(
    array(
      'name'              => 'member-block-two-fw', 
      'title'             => __( 'About - Member Block Two Full Width' ),
      'render_template'   => 'template-parts/acf-blocks/member-block-two-fw.php',
      'category'          => 'common',
      'icon'							=> 'editor-ul',
      'keywords'          => array( 'About Member Block Two', 'Full Width'),
      'mode'              => 'preview',
    )
  );

  // About - Footer Form
  acf_register_block_type(
    array(
      'name'              => 'about-footer-cta-fw', 
      'title'             => __( 'About - About Footer CTA' ),
      'render_template'   => 'template-parts/acf-blocks/about-footer-cta-fw.php',
      'category'          => 'common',
      'icon'							=> 'editor-ul',
      'keywords'          => array( 'About Footer CTA', 'Full Width'),
      'mode'              => 'preview',
    )
  );

  // About - Footer Form Non Quote
  acf_register_block_type(
    array(
      'name'              => 'footer-cta-fw', 
      'title'             => __( 'Footer CTA No Quote' ),
      'render_template'   => 'template-parts/acf-blocks/footer-cta-fw.php',
      'category'          => 'common',
      'icon'							=> 'editor-ul',
      'keywords'          => array( 'Footer CTA No Quote', 'Full Width'),
      'mode'              => 'preview',
    )
  );

  // About - Speaking Events
  acf_register_block_type(
    array(
      'name'              => 'speaking-events', 
      'title'             => __( 'About - Speaking Events' ),
      'render_template'   => 'template-parts/acf-blocks/speaking-events.php',
      'category'          => 'common',
      'icon'							=> 'editor-ul',
      'keywords'          => array( 'About Speaking Events', 'Speaking Events', 'Events'),
    )
  );

  // About - Speaking Events
  acf_register_block_type(
    array(
      'name'              => 'speakers-no-load', 
      'title'             => __( 'Speaking Events No Loading' ),
      'render_template'   => 'template-parts/acf-blocks/speakers-no-load.php',
      'category'          => 'common',
      'icon'							=> 'editor-ul',
      'keywords'          => array( 'About Speaking Events No Loading', 'Speaking Events', 'Events'),
    )
  );

  // About - Page Banner
  acf_register_block_type(
    array(
      'name'              => 'about-banner', 
      'title'             => __( 'About - Banner & Team' ),
      'render_template'   => 'template-parts/acf-blocks/about-banner-team.php',
      'category'          => 'common',
      'icon'							=> 'editor-ul',
      'keywords'          => array( 'About Banner', 'Page Banner', 'Banner', 'Team'),
      'mode'              => 'preview',
    )
  );

  // About - Members Filter & Grid
  acf_register_block_type(
    array(
      'name'              => 'about-members', 
      'title'             => __( 'About - Members' ),
      'render_template'   => 'template-parts/acf-blocks/about-members.php',
      'category'          => 'common',
      'icon'							=> 'editor-ul',
      'keywords'          => array( 'About Members', 'Page Members', 'Members'),
      'mode'              => 'preview',
    )
  );

  // About - Members Filter & Grid
  acf_register_block_type(
    array(
      'name'              => 'our-business', 
      'title'             => __( 'About - Our Business' ),
      'render_template'   => 'template-parts/acf-blocks/our-business.php',
      'category'          => 'common',
      'icon'							=> 'editor-ul',
      'keywords'          => array( 'About Our Business', 'Page Our Business', 'Our Business'),
      'mode'              => 'preview',
    )
  );

  // About - Core Values
  acf_register_block_type(
    array(
      'name'              => 'our-core-values', 
      'title'             => __( 'About - Our Core Values' ),
      'render_template'   => 'template-parts/acf-blocks/our-core-values.php',
      'category'          => 'common',
      'icon'							=> 'editor-ul',
      'keywords'          => array( 'About Our Core Values', 'Page Our Core Values', 'Our Core Values'),
      'mode'              => 'preview',
    )
  );

  // About - Working With Lawyerist
  acf_register_block_type(
    array(
      'name'              => 'working-with-lawyerist', 
      'title'             => __( 'About - Working With Lawyerist' ),
      'render_template'   => 'template-parts/acf-blocks/working-with-lawyerist.php',
      'category'          => 'common',
      'icon'							=> 'editor-ul',
      'keywords'          => array( 'About - Working With Lawyerist', 'Page Working With Lawyerist', 'Working With Lawyerist'),
      'mode'              => 'preview',
    )
  );

  // About - Authors Quote Desc
  acf_register_block_type(
    array(
      'name'              => 'quote-wt-authors-quote-description', 
      'title'             => __( 'About - Authors Quote Desc' ),
      'render_template'   => 'template-parts/acf-blocks/quote-wt-authors-quote-description.php',
      'category'          => 'common',
      'icon'							=> 'editor-ul',
      'keywords'          => array( 'About - Authors Quote Desc', 'Page Authors Quote Desc', 'Authors Quote Desc'),
      'mode'              => 'preview',
    )
  );


  // Speakers - Slider with map
  acf_register_block_type(
    array(
      'name'              => 'full-width-slider-wt-col-txt', 
      'title'             => __( 'Speakers - Slider with map' ),
      'render_template'   => 'template-parts/acf-blocks/full-width-slider-wt-col-txt.php',
      'category'          => 'common',
      'icon'							=> 'editor-ul',
      'keywords'          => array( 'Speakers - Slider with map', 'Speakers slider', 'Slider with map'),
      'mode'              => 'preview',
    )
  );


  // Guides - Banner
  acf_register_block_type(
    array(
      'name'              => 'guides-banner', 
      'title'             => __( 'Guides - Banner' ),
      'render_template'   => 'template-parts/acf-blocks/guides-banner.php',
      'category'          => 'common',
      'icon'							=> 'editor-ul',
      'keywords'          => array( 'Guides - Banner', 'Banner', 'Guides'),
      'mode'              => 'preview',
    )
  );

  // Guides - Chapters
  acf_register_block_type(
    array(
      'name'              => 'guides-chapters', 
      'title'             => __( 'Guides - Chapters' ),
      'render_template'   => 'template-parts/acf-blocks/guides-chapters.php',
      'category'          => 'common',
      'icon'							=> 'editor-ul',
      'keywords'          => array( 'Guides - Chapters', 'Chapters'),
      'mode'              => 'preview',
    )
  );

  // Guides - Footer CTA
  acf_register_block_type(
    array(
      'name'              => 'guides-footer-cta', 
      'title'             => __( 'Guides - Footer CTA' ),
      'render_template'   => 'template-parts/acf-blocks/guides-footer-cta.php',
      'category'          => 'common',
      'icon'							=> 'editor-ul',
      'keywords'          => array( 'Guides - Footer CTA', 'Footer CTA', 'CTA', 'Footer'),
      'mode'              => 'preview',
    )
  );

  // Guides - Child Banner
  acf_register_block_type(
    array(
      'name'              => 'guides-child-banner', 
      'title'             => __( 'Guides - Child Banner' ),
      'render_template'   => 'template-parts/acf-blocks/guides-child-banner.php',
      'category'          => 'common',
      'icon'							=> 'editor-ul',
      'keywords'          => array( 'Guides - Child Banner', 'Child Banner', 'Banner', 'Child'),
      'mode'              => 'preview',
    )
  );

  // Guides - Icon BTN
  acf_register_block_type(
    array(
      'name'              => 'guides-icon-btn', 
      'title'             => __( 'Guides - Icon BTN' ),
      'render_template'   => 'template-parts/acf-blocks/guides-icon-btn.php',
      'category'          => 'common',
      'icon'							=> 'editor-ul',
      'keywords'          => array( 'Guides - Icon BTN', 'Icon BTN'),
      'mode'              => 'preview',
    )
  );


  // Guides - Full Width Image
  acf_register_block_type(
    array(
      'name'              => 'guides-full-width-image', 
      'title'             => __( 'Guides - Full Width Image' ),
      'render_template'   => 'template-parts/acf-blocks/guides-full-width-image.php',
      'category'          => 'common',
      'icon'							=> 'editor-ul',
      'keywords'          => array( 'Guides - Full Width Image', 'Full Width Image', 'Image', 'Full Width'),
      'mode'              => 'preview',
    )
  );

  // Guides - Navigation (Prev-Next)
  acf_register_block_type(
    array(
      'name'              => 'guides-chapter-nav', 
      'title'             => __( 'Guides - Navigation Prev & Next' ),
      'render_template'   => 'template-parts/acf-blocks/guides-chapter-nav.php',
      'category'          => 'common',
      'icon'							=> 'editor-ul',
      'keywords'          => array( 'Guides - Navigation', 'Prev', 'Next'),
      'mode'              => 'preview',
    )
  );

  // Resources - Banner
  acf_register_block_type(
    array(
      'name'              => 'resources-banner', 
      'title'             => __( 'Resources - Baner' ),
      'render_template'   => 'template-parts/acf-blocks/resources-banner.php',
      'category'          => 'common',
      'icon'							=> 'editor-ul',
      'keywords'          => array( 'Resources - Banner', 'Banner'),
      'mode'              => 'preview',
    )
  );


  // Resources - Section One
  acf_register_block_type(
    array(
      'name'              => 'resources-section-one', 
      'title'             => __( 'Resources - Section One' ),
      'render_template'   => 'template-parts/acf-blocks/resources-section-one.php',
      'category'          => 'common',
      'icon'							=> 'editor-ul',
      'keywords'          => array( 'Resources - Section One', 'Section One', 'Count'),
      'mode'              => 'preview',
    )
  );

  // Resources - Section Two
  acf_register_block_type(
    array(
      'name'              => 'resources-section-two', 
      'title'             => __( 'Resources - Section Two' ),
      'render_template'   => 'template-parts/acf-blocks/resources-section-two.php',
      'category'          => 'common',
      'icon'							=> 'editor-ul',
      'keywords'          => array( 'Resources - Section Two', 'Section Two', 'Count'),
      'mode'              => 'preview',
    )
  );

  // Resources - Section Three
  acf_register_block_type(
    array(
      'name'              => 'resources-section-three', 
      'title'             => __( 'Resources - Section Three' ),
      'render_template'   => 'template-parts/acf-blocks/resources-section-three.php',
      'category'          => 'common',
      'icon'							=> 'editor-ul',
      'keywords'          => array( 'Resources - Section Three', 'Section Three', 'Count'),
      'mode'              => 'preview',
    )
  );

  // Resources - Section Four
  acf_register_block_type(
    array(
      'name'              => 'resources-section-four', 
      'title'             => __( 'Resources - Section Four' ),
      'render_template'   => 'template-parts/acf-blocks/resources-section-four.php',
      'category'          => 'common',
      'icon'							=> 'editor-ul',
      'keywords'          => array( 'Resources - Section Four', 'Section Four', 'Count'),
      'mode'              => 'preview',
    )
  );

  // Resources - Section Five
  acf_register_block_type(
    array(
      'name'              => 'resources-section-five', 
      'title'             => __( 'Resources - Section Five' ),
      'render_template'   => 'template-parts/acf-blocks/resources-section-five.php',
      'category'          => 'common',
      'icon'							=> 'editor-ul',
      'keywords'          => array( 'Resources - Section Five', 'Section Five', 'Count'),
      'mode'              => 'preview',
    )
  );

  // Resources - Box Guides
  acf_register_block_type(
    array(
      'name'              => 'resources-box-guides', 
      'title'             => __( 'Resources - Box Guides' ),
      'render_template'   => 'template-parts/acf-blocks/resources-box-guides.php',
      'category'          => 'common',
      'icon'							=> 'editor-ul',
      'keywords'          => array( 'Resources - Box Guides', 'Box Guides', 'Box', 'Guides'),
      'mode'              => 'preview',
    )
  );

  // Resources - Box Pod Casts
  acf_register_block_type(
    array(
      'name'              => 'resources-box-pod-casts', 
      'title'             => __( 'Resources - Box Pod Casts' ),
      'render_template'   => 'template-parts/acf-blocks/resources-box-pod-casts.php',
      'category'          => 'common',
      'icon'							=> 'editor-ul',
      'keywords'          => array( 'Resources - Box Pod Casts', 'Box Pod Casts', 'Box', 'Casts'),
      'mode'              => 'preview',
    )
  );

  // Resources - Box Posts
  acf_register_block_type(
    array(
      'name'              => 'resources-box-posts', 
      'title'             => __( 'Resources - Box Posts' ),
      'render_template'   => 'template-parts/acf-blocks/resources-box-posts.php',
      'category'          => 'common',
      'icon'							=> 'editor-ul',
      'keywords'          => array( 'Resources - Box Posts', 'Box Posts', 'Posts'),
      'mode'              => 'preview',
    )
  );

  // Speakers - Banner
  acf_register_block_type(
    array(
      'name'              => 'speakers-banner', 
      'title'             => __( 'Speakers - Banner' ),
      'render_template'   => 'template-parts/acf-blocks/speakers-banner.php',
      'category'          => 'common',
      'icon'							=> 'editor-ul',
      'keywords'          => array( 'Speakers - Banner', 'Banner', 'Speakers'),
      'mode'              => 'preview',
    )
  );

  // Speakers - Members
  acf_register_block_type(
    array(
      'name'              => 'speakers-members', 
      'title'             => __( 'Speakers - Members' ),
      'render_template'   => 'template-parts/acf-blocks/speakers-members.php',
      'category'          => 'common',
      'icon'							=> 'editor-ul',
      'keywords'          => array( 'Speakers - Members', 'Members'),
      'mode'              => 'preview',
    )
  );

  // Field Guide
  acf_register_block_type(
    array(
      'name'              => 'field-guide', 
      'title'             => __( 'Field Guide' ),
      'render_template'   => 'template-parts/acf-blocks/field-guide.php',
      'category'          => 'common',
      'icon'							=> 'editor-ul',
      'keywords'          => array( 'Field Guide', 'Guide'),
      'mode'              => 'preview',
    )
  );
}
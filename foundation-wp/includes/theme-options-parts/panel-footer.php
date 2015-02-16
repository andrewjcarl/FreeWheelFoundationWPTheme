<?php $options = get_option( 'bootstrap_theme_options' ); ?>

<h1>Footer Options</h1>
<hr>

<section>

  <div class="row">
    <div class="col-md-2"><h3 class="option-title">Text & Typography</h3></div>
    <div class="col-md-10">
      <?php echo theme_text_input('footer_headline', 'Footer Headline', 'Sample Placeholder'); ?>

      <?php echo theme_text_input('footer_tagline', 'Footer Tagline', 'Something short and sweet. This will go directly underneath the headline'); ?>

      <?php echo theme_text_input('footer_subhead', 'Footer Subheader', ''); ?>
    </div>
  </div>

  <div class="row">
    <div class="col-md-2"><h3 class="option-title">Donation Link</h3></div>

      <?php echo theme_checkbox_input('footer_show_donate', 'Show Donation Button'); ?>

    <div class="col-md-10">
    </div>
  </div>

</section>

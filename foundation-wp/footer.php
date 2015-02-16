<?php $theme_options = get_option( 'bootstrap_theme_options' ); ?>

 <!-- Bottom Footer Section
  ================================================== -->
<div class="bottom_footer_section">
  <div class="container">
  <div class="sixteen columns bottom_line_dev"> 
    
    <?php if ($theme_options["footer_headline"] != "") : ?>
      <div class="footerlogo">
        <?php echo $theme_options["footer_headline"]; ?>
      </div>
    <?php endif; ?>

    <?php if ($theme_options["footer_tagline"] != "") : ?>
      <div class="footer_tagline">
        <?php echo $theme_options["footer_tagline"]; ?>
      </div>
    <?php endif; ?>

    <?php if ($theme_options["footer_subhead"] != "") : ?>
      <div class="footer_text">
        <?php echo $theme_options["footer_subhead"]; ?>
      </div>
    <?php endif; ?>


    <div class="footer_buttom">
        <a href="cause.html">Make a Donation Now</a>
    </div>
    <div class="clearfix"></div>
    <?php if ( has_nav_menu( 'footer' ) ) : ?>
      <nav>
        <ul class="footer_nav">
          <?php wp_nav_menu( array( 'theme_location' => 'footer', 'items_wrap' => '%3$s', 'container' => '' ) ); ?>
        </ul>
      </nav>
    <?php endif; ?>
    <div class="social_footer">
      <a href="#" class="footer_social facebook-c"></a>
      <a href="#" class="footer_social twitter-c"></a>
    </div>


    </div>  
  </div>  
</div>  

<!-- end body -->
<?php wp_footer(); ?>

<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
<script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/platform.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>

</body>
</html>
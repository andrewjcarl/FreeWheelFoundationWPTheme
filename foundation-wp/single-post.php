<?php get_header(); ?>
<!-- #wrapper -->

<!-- page #content -->
<?php if( have_posts() ) : while ( have_posts() ) : the_post(); // begin loop ?>  

      <!-- Blog Section
      ================================================== -->

      <div class="home_blog_section">
        <div class="container">

          <div class="eight columns alpha">

            <?php if ( has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('thumbnail', array('class' => 'home_blog_img post_image')); ?>
                      </a>
              <?php endif; ?>

            <div class="thumb thumb2 thumb3">
              <a href="content_images/untitled-1-recovered.png" class="lightbox">
                <img class="home_blog_img post_image" src="content_images/untitled-1-recovered.png" alt="">
              </a>
              <div class="info pattern">
                <a href="#" class="button-fullsize"></a>
              </div>
            </div>
          </div>

          <div class="eight columns omega">
            <div class="post_title">
              <?php the_title(); ?>
            </div>
            <div class="post_info">

              <span class="post_info_item">
                <span class="blue_text bold_text">Date:</span>
                <?php the_date("Y/m/d"); ?>
              </span>

              <span class="post_info_item">
                <span class="blue_text bold_text">Author:</span>
                <?php the_author(); ?>
              </span>

              <?php echo get_the_tag_list('<span class="post_info_item"><span class="blue_text bold_text">Tags:</span> ',', ','</span>'); ?>

            </div>
            <div class="post_text">
              <?php the_content(); // post content ?>
            </div>
            <div class="clearfix"></div>
            <div class="social_span2">
              <!-- <a  href="https://twitter.com/share" class="twitter-share-button social_padding" data-via="pixfort" data-count="none">Tweet</a> -->
              <!-- Place this tag where you want the +1 button to render. -->
              <div class="g-plusone social_padding" data-size="medium" data-annotation="none"></div>

              <!-- Place this tag after the last +1 button tag. -->
              <span class="social_padding">
                <iframe src="https://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fthemeforest.net%2Fuser%2FPixFort&amp;width&amp;layout=button&amp;action=like&amp;show_faces=false&amp;share=false&amp;height=35&amp;appId=445119778844521" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:20px;width:50px;" allowTransparency="true"></iframe>
              </span>
            </div>
            <div class="clearfix social_div"></div>
          </div>


          <div class="clearfix"></div>
        </div>  
      </div>

    <?php endwhile; else: ?>
    
    <p>Sorry, no posts matched your criteria.</p>
    
  <?php endif; // end loop ?>

  <!-- end #wrapper -->
  <?php get_footer(); ?>
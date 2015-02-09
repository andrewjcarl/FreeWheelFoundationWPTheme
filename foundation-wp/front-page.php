<?php get_header(); ?>
<!-- #wrapper -->


	<div class="header_background">
		<div class="header_image">
			<div class="header_background_warper">
				<div class="header_title">
					<ul id="tick">
						<li>
							Everyone needs us to help
						</li>
						<li>
							We Can Help the world !

						</li>
						<li>
							join us now and make it easy
						</li>
					</ul>
					
				</div>
				<p class="header_text">
					Featuring the best design on the web Best of Blog Corporate CSS Design 
becoming like this is one of your goals here are some general pointers.
				</p>
				<div class="clearfix"></div>
				<br>
				<div class="big_button_warper">
					<a href="cause.html" class="big_button">
						Make a Donation Now
					</a>
				</div>
				<div class="clearfix"></div>
				<div class="header_social_tagline">
					Help us by sharing this cause
				</div>
					<div class="social_span">
					<!-- <a  href="https://twitter.com/share" class="twitter-share-button social_padding" data-via="pixfort" data-count="none">Tweet</a> -->



<!-- Place this tag where you want the +1 button to render. -->
<div class="g-plusone social_padding" data-size="medium" data-annotation="none"></div>

<!-- Place this tag after the last +1 button tag. -->


<span class="social_padding">
<iframe src="https://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fthemeforest.net%2Fuser%2FPixFort&amp;width&amp;layout=button&amp;action=like&amp;show_faces=false&amp;share=false&amp;height=35&amp;appId=445119778844521"  style="border:none; overflow:hidden; height:20px;width:50px;" ></iframe>
</span>

				</div>
				<div class="clearfix"></div>	
			</div>
		</div>

	</div>


    <!-- page #content -->
    <?php if( have_posts() ) : while ( have_posts() ) : the_post(); // begin loop ?>  
        <?php the_content(); // post content ?>
    <?php endwhile; else: ?>
    
      <p>Sorry, no posts matched your criteria.</p>
    
    <?php endif; // end loop ?>




<!-- end #wrapper -->
<?php get_footer(); ?>
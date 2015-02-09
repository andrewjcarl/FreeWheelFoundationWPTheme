<?php get_header(); ?>
<!-- #wrapper -->

    <!-- page #content -->
    <?php if( have_posts() ) : while ( have_posts() ) : the_post(); // begin loop 
    	global $post;

    	$post_meta  = maybe_unserialize(get_post_meta($post->ID, 'post_meta', FALSE))[0];

    	?>  

    	<!-- Services  Section
			================================================== -->
			<div class="container">
				<div class="sixteen columns services_div">
					<div class="Services_1_title_div">
						<h3>
						<?php the_title(); ?>
						</h3>
					</div>
					<div class="clearfix"></div>
					<p class="services_tagline">
						<?php the_content(); // post content ?>
					</p>
				</div>
				<div class="clearfix"></div>
				<div class="contact_form_div cause_div">
						<div class="eight columns alpha">
							<div class="thumb thumb2 thumb4">
								<!-- <a href="content_images/donate-image.png" class="lightbox" id="main_image_lb"> -->
								<?php 
									if ( has_post_thumbnail() ) { 
										the_post_thumbnail(
											'full', array('class'=>'home_blog_img post_image'));
									} 
								?><!-- 
								<img class="home_blog_img post_image" src="content_images/donate-image.png" alt=""> -->
								<!-- </a>
								<div class="info pattern">
									<a href="#" class="button-fullsize"></a>
								</div> -->
							</div>

						</div>
						<div class="eight columns omega cause_text_div">
							<div class="post_title">
								<?php echo $post_meta["title"]; ?>
							</div>
							<div class="post_info">
								<span class="post_info_item"><span class="blue_text bold_text">Date:</span> 20/08/2014   </span>
							</div>
							<div class="post_text">
								<?php echo $post_meta["description"]; ?><br><br>

								<span class="big_cause_text"><span class="dark_text">Total amount: </span><span class="blue_text">$20,000</span></span><br>
								voluptate velit esse cillum dolore eu fugiat nulla pariatur.<br>
								<span class="big_cause_text"><span class="dark_text">We have: </span><span class="blue_text">$14,623</span></span><br>
								sunt in culpa qui officia deserunt mollit anim id est laborum.<br>
								<span class="big_cause_text"><span class="dark_text">We need: </span><span class="blue_text">$5,377</span></span><br>
								incididunt ut labore et dolore magna aliqua.<br>
								<br>
								<span class="dark_text">Support us now:</span><br>
								<div class="clearfix"></div>
								<div class="cause_buttom">
										<a href="<?php echo $post_meta["donation_link"]; ?>">Make a Donation Now</a>
								</div>
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="clearfix"></div>
				</div>
			
				<div class="clearfix"></div>
			</div>	
    
    <?php endwhile; else: ?>
    
      <p>Sorry, no posts matched your criteria.</p>
    
    <?php endif; // end loop ?>

<!-- end #wrapper -->
<?php get_footer(); ?>
<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Archive Template
 *
 *
 * @file           archive.php
 */

get_header(); ?>

<div class="home_blog_section">
<div class="container">
	<div class="sixteen columns ">
		<div class="Services_1_title_div">
			<h3>
				We Need You to Keep Helping
			</h3>
		</div>
		<div class="clearfix"></div>
		<p class="services_tagline">
			Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
		</p>
	</div>
	
	<div class="blog_items">


	<?php if (have_posts()) : ?>
       
    <?php while (have_posts()) : the_post(); ?>
        
        <div class="eight columns alpha blog_item">
				
				<div class="four columns alpha">
						<div class="thumb thumb2">
							<?php if ( has_post_thumbnail()) : ?>
								<?php the_post_thumbnail('thumbnail', array('class' => 'home_blog_img')); ?>
							        </a>
							<?php endif; ?>
							<div class="info pattern">
								<a href="#" class="button-fullsize"></a>
							</div>
						</div>
				</div>
				<div class="four columns omega">
					<div class="blog_item_title"> 
						<?php the_title(); ?>
					</div>
					<div class="blog_item_text">
						<?php the_excerpt(); ?>
					</div>
					<a href="<?php the_permalink(); ?>" class="blog_item_more">
						Continue Reading
					</a>
				</div>
				
			</div>
    
			</div><!-- end of #post-<?php the_ID(); ?> -->      
            
      <?php endwhile; else : endif; ?>  
      
</div><!-- end of #content-archive -->

<?php get_footer(); ?>

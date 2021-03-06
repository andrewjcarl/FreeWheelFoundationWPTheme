<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/*
**	Default Page Template
**
**  Template Name: Contact Us Page Template
*/
get_header(); ?>
<!-- #wrapper -->

    <!-- page #content -->
    <?php if( have_posts() ) : while ( have_posts() ) : the_post(); // begin loop ?>  
    	<div class="container">
        <?php the_content(); // post content ?>
      </div>
    
    <?php endwhile; else: ?>
    
      <p>Sorry, no posts matched your criteria.</p>
    
    <?php endif; // end loop ?>

<!-- end #wrapper -->
<?php get_footer(); ?>
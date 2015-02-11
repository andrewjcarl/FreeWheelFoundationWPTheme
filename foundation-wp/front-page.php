<?php get_header(); ?>
<!-- #wrapper -->

    <!-- page #content -->
    <?php if( have_posts() ) : while ( have_posts() ) : the_post(); // begin loop ?>  

        <?php the_content(); // post content ?>
        
    <?php endwhile; else: ?>
    
      <p>Sorry, no posts matched your criteria.</p>
    
    <?php endif; // end loop ?>

<!-- end #wrapper -->
<?php get_footer(); ?>
<?php get_header(); ?>
<!-- #wrapper -->

	<!-- #container -->
	<div class="page">

		<!-- page #content -->
		<?php if( have_posts() ) : while ( have_posts() ) : the_post(); // begin loop ?>	
		
			<section class="bg-opaque padding-1">
				<?php the_content(); // post content ?>
			</section>
		
		<?php endwhile; else: ?>
		
			<p>Sorry, no posts matched your criteria.</p>
		
		<?php endif; // end loop ?>
		<!-- end #content -->

	</div>
	<!-- end #container -->

<!-- end #wrapper -->
<?php get_footer(); ?>
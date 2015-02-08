<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/*
**	Default Page Template
**
**  Template Name: Default Page Template
*/
get_header(); ?>

<div id="wrapper">
	<!-- #container -->
	<section id="container" class="layout-978 <?php echo implode( ' ', page_classes() ); ?>">
        
	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

			<h1 id="page-title"><?php the_title(); ?></h1>

			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>       
			
                <div class="post-entry">
                    <?php the_content(__('Read more &#8250;', 'elegant')); ?>
				</div><!-- end of .post-entry -->

			</div><!-- end of #post-<?php the_ID(); ?> -->       
            
        <?php 
		endwhile; 
	endif; 
	?>  
      
</div><!-- end of #container -->

<?php get_footer(); ?>
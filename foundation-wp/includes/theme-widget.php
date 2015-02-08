<?php
//
//
//	WOOCOMMERCE FEATURED PRODUCT WIDGET

add_action( 'widgets_init', 'woo_featured_widget' );

function woo_featured_widget() {
	register_widget('Woo_Featured');
}

class Woo_Featured extends WP_Widget {

	function Woo_Featured() {
		
		// Settings
		$widget_ops = array('classname' => 'woo-featured-responsive', 'description' => 'Display Featured Products from a Product Category');
		
		// Control Settings
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'woo-featured-responsive'	);
		
		// Create //
		$this->WP_Widget('woo-featured-responsive','WooCommerce Featured for Responsive', $widget_ops, $control_ops );
	}
	
	function widget( $args, $instance ) {
		extract( $args );
		
		// User selected options
		$title	= apply_filters('widget_title', $instance['title'] );
		$number	= $instance['number'];
		$cat	= $instance['cat'];
		
		// Set Category value to equal Category slug		
		$category = get_term_by('name', $cat, 'product_cat');
		$cat_slug = $category->slug;
		
		// Before Widget (defined by theme)
		
		echo $before_widget;
		
		// Title of Widget
		
		if ($title)
		
			echo $before_title . $title . $after_title;
		
		// Call the woo_featured function
		
			echo "<article class=\"widget woo-featured ";

			echo "\">";

			woo_featured( $number, $cat_slug );
			
			echo "</article>";
		
		
		echo $after_widget;
	
	}
	
	function update( $new_instance, $old_instance ) {
	
		$instance = $old_instance;
		
		// Strip tags and update widget settings
		$instance['title']	= strip_tags( $new_instance['title'] );
		$instance['number'] = strip_tags( $new_instance['number'] );
		$instance['cat']	= strip_tags( $new_instance['cat'] );
		
		return $instance;
	}
	
	function form( $instance ) {
		
		$defaults	= array( 'title' => 'Featured Products', 'category' => '', 'number' => 4 );
		$instance	= wp_parse_args( (array) $instance, $defaults ); ?>
		
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
			<input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="widget:100%" />
		</p>	
		
		<p>
			<label for="<?php echo $this->get_field_id('number'); ?>">Number of Products:</label>
			<input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" value="<?php echo $instance['number']; ?>" style="widget:100%" />
		</p>	

		<p>
			<label for="<?php echo $this->get_field_id('cat'); ?>">Category:</label>
			<select id="<?php echo $this->get_field_id('cat'); ?>" name="<?php echo $this->get_field_name( 'cat' ); ?>" class="widefat" style="widget:100%">
				<?php
					$args =array(
					'orderby' => 'name',
					'order' => 'ASC',
					'taxonomy' => 'product_cat'
					);
				$dropdown = get_categories( $args );
				foreach ( $dropdown as $cat ) {
					echo 	'<option ';
					if ( $cat->name == $instance['cat'] ) 
						echo 'selected="selected"';
					echo '>' . $cat->name . '</option>';
				}
				?>
			</select>
		</p>	
	<?php
	
	}
}


//
//	Display a number of featured product posts

function woo_featured( $number, $category ) {
	global $woocommerce;
	
	// set default input values
	if (!isset($number)) 	
		$number = 4; 
	if (!$category) 		
		$category = ''; 
		
	// build WP_Query array
	$args = array(
			'post_status' => 'publish',	
			'post_type' => 'product',
			'posts_per_page' => $number,
			'product_cat' => $category
	);
	

	// WP_Query
	$r = new WP_Query($args);
	
	if ($r->have_posts()) { while ($r->have_posts()) : $r->the_post(); 
		global $product, $post; 
		echo 	'<aside class="featured-entry">';
		echo 	woo_image();
		echo	'<span class="title">' . $post->post_title . '</span>';
		echo 	'<span class="price">' . woocommerce_get_template( 'loop/price.php' ) . '</span>';
		echo 	'<span class="add-to-cart">';
		echo 	woocommerce_get_template( 'loop/add-to-cart.php' );
		echo 	'</span>';
		echo 	'</aside>';
		endwhile; } else { }
		wp_reset_query();
		wp_reset_postdata();
	}


//
// @woo_image function for displaying a single image when used inside of a loop
//

function woo_image() {
	
	if ( has_post_thumbnail() ) {
		$image       		= get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ) );
		$image_title 		= esc_attr( get_the_title( get_post_thumbnail_id() ) );
		$image_link  		= wp_get_attachment_url( get_post_thumbnail_id() );
		$prod_link 			= get_permalink( $post->ID );
		
		echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<header><a href="' . $prod_link . '" itemprop="image" class="woocommerce-main-image zoom" title="%s"  rel="prettyPhoto' . $gallery . '"><img src="' . $image_link . '" alt="' . $image_title . '"/></a></header>', $image_link, $image_title, $image, $prod_link ), $post->ID );
		
	} else {
	
		echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<img src="%s" alt="Placeholder" />', woocommerce_placeholder_img_src() ), $post->ID );
	}

}


//
//	WOOCOMMERCE SIDEBAR MENU

add_action( 'widgets_init', 'woo_sidebar_menu' );

function woo_sidebar_menu() {
	register_widget('Woo_Sidebar_Menu');
}

class Woo_Sidebar_Menu extends WP_Widget {

	function Woo_Sidebar_Menu() {
		
		// Settings
		$widget_ops = array('classname' => 'woo-sidebar-menu', 'description' => 'Automatically Add Menu Entires for the Chosen Category');
		
		// Control Settings
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'woo-sidebar-menu'	);
		
		// Create //
		$this->WP_Widget('woo-sidebar-menu','WooCommerce Category Menu Items for Responsive', $widget_ops, $control_ops );
	}
	
	function widget( $args, $instance ) {
		extract( $args );
		
		// User selected options
		$title	= apply_filters('widget_title', $instance['title'] );
		$cat	= $instance['cat'];
		
		// Set Category value to equal Category slug		
		$category = get_term_by('name', $cat, 'product_cat');
		$cat_slug = $category->slug;
		$cat_id = $category->term_id;
		
		// Before Widget (defined by theme)
		
		echo $before_widget;
		
		// Title of Widget
		
		if ($title)
		
			echo $before_title . $title . $after_title;
		
		// Call the woo_featured function
		
			$args = array(
				'taxonomy' 	=>	'product_cat',
				'parent'	=>	$cat_id,
			);
			
			$list = get_categories( $args );
			
			$r = '<ul>';
			
			foreach ( $list as $a ) 
				$r .= '<li><a href="' . get_bloginfo('url') . '/shop/category/' . $a->slug . '">' . $a->name . '</a></li>';
						
			$r .= '</ul>';
			
			echo $r;
		
		
		echo $after_widget;
	
	}
	
	function update( $new_instance, $old_instance ) {
	
		$instance = $old_instance;
		
		// Strip tags and update widget settings
		$instance['title']	= strip_tags( $new_instance['title'] );
		$instance['cat']	= strip_tags( $new_instance['cat'] );
		
		return $instance;
	}
	
	function form( $instance ) {
		
		$defaults	= array( 'title' => 'Featured Products', 'category' => '', 'number' => 4 );
		$instance	= wp_parse_args( (array) $instance, $defaults ); ?>
		
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
			<input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="widget:100%" />
		</p>	

		<p>
			<label for="<?php echo $this->get_field_id('cat'); ?>">Category:</label>
			<select id="<?php echo $this->get_field_id('cat'); ?>" name="<?php echo $this->get_field_name( 'cat' ); ?>" class="widefat" style="widget:100%">
				<?php
					$args =array(
					'orderby' => 'name',
					'order' => 'ASC',
					'taxonomy' => 'product_cat',
					'parent'	=> 0
					);
				$dropdown = get_categories( $args );
				foreach ( $dropdown as $cat ) {
					echo 	'<option ';
					if ( $cat->name == $instance['cat'] ) 
						echo 'selected="selected"';
					echo '>' . $cat->name . '</option>';
				}
				?>
			</select>
		</p>	

		
	<?php
	
	}
}

?>
<?php

/**
 * Enqueue Child Theme Styles
 */
add_action('wp_enqueue_scripts', 'hello_elementor_child_enqueue_styles');
function hello_elementor_child_enqueue_styles()
{
	// Enqueue parent theme CSS
	wp_enqueue_style(
		'hello-elementor-parent-style',
		get_template_directory_uri() . '/style.css'
	);

	// Enqueue child theme CSS
	wp_enqueue_style(
		'hello-elementor-child-style',
		get_stylesheet_directory_uri() . '/style.css',
		array('hello-elementor-parent-style')
	);

	wp_enqueue_style(
		'hello-elementor-child-main-style',
		get_stylesheet_directory_uri() . '/css/main.css'
	);

	// Enqueue Slick Slider
	wp_enqueue_style('slick-css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css');
	wp_enqueue_style('slick-theme-css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css');
	wp_enqueue_script('slick-js', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), '1.8.1', true);

	// Enqueue Custom Slider JS
	wp_enqueue_script('child-testimonial-slider', get_stylesheet_directory_uri() . '/js/testimonial-slider.js', array('slick-js'), '1.0.0', true);
}

function wp_learning_testimonial_slider_shortcode($atts)
{
	ob_start();
	?>
	<div class="testimonial-slider-wrapper">
		<div class="testimonial-slider">
			<div class="testimonial-slide">
				<div class="testimonial-content">
					<p>"This service is absolutely amazing! It changed the way I work properly."</p>
					<h4>- Jane Doe</h4>
				</div>
			</div>
			<div class="testimonial-slide">
				<div class="testimonial-content">
					<p>"Simple, clean, and exacty what I needed. Highly recommended."</p>
					<h4>- John Smith</h4>
				</div>
			</div>
			<div class="testimonial-slide">
				<div class="testimonial-content">
					<p>"Great support and a fantastic design. Will use again."</p>
					<h4>- Alice Johnson</h4>
				</div>
			</div>
		</div>
	</div>
	<?php
	return ob_get_clean();
}
add_shortcode('customer_testimonials', 'wp_learning_testimonial_slider_shortcode');


<?php
/**
 * EWA Elementor Heading Widget.
 *
 * Elementor widget that inserts heading into the page
 *
 * @since 1.0.0
 */
class Elementor_Reviews_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve heading  widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'reviews-user';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve heading widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Reviews User', 'elementor-team' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve heading  widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-user-circle-o';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the heading widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'bd-calling-cat' ];
	}

	/**
	 * Register heading widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {
		
		// start of the Content tab section
	   $this->start_controls_section(
	       'content-section_reviews',
		    [
		        'label' => esc_html__('Content','elementor-team'),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
		   
		    ]
	    );
		$this->add_control(
			'review_banner_des',
			[
				'label' => esc_html__( 'Banner Short Description', 'elementor-hello-world' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Rossport by the Sea is a pretty special place, we like to say its magical by nature and a little slice of Heaven on Earth.', 'elementor-hello-world' ),
				'placeholder' => esc_html__( 'Rossport by the Sea is a pretty special place, we like to say its magical by nature and a little slice of Heaven on Earth.', 'elementor-hello-world' ),
			]
		);
		
		
		
		
	

		$this->end_controls_section();
		// End of Style tab section

	}

	/**
	 * Render heading  widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		// get our input from the widget settings.
		$settings = $this->get_settings_for_display();	
		
		?>


<!-- Reviews Hero section start -->
<section class="reviews_hero" style="background-image:url(linear-gradient(180deg, rgba(2, 18, 24, 0.8), rgba(2, 18, 24, 0.8)),<?php the_post_thumbnail_url(); ?>);">
            <div class="container">
                <div class="content_wrapper">
                    <div class="row page_title_row">
                        <h1><?php the_title();?></h1>
                        <p><?php echo $settings['review_banner_des']; ?></p>
                    </div>
                </div>
            </div>
        </section>
		<section class="testimonial">
				<div class="container">

				<?php

				$args = array(
					'post_type' => 'reviews',
					'posts_per_page' => 3,
					);

				$query = new \WP_Query($args);?>

				<?php 
				$postcount=1;
				
				while($query->have_posts()) :        
					if( ($postcount % 2) == 0 ) $post_class = 'testimonial_flex_left';
					else $post_class = 'testimonial_flex_right'; ?>

				<div class="row testimonial_row <?php echo $post_class; ?>">
                    <div class="col-md-6 testimonial_left">
					<?php $query->the_post(); ?>
                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                            <div class="carousel-inner">
								<?php the_post_thumbnail(); ?>
                            </div>
                        </div>
                        <div class="quot_img">
                            <img src="<?php echo get_template_directory_uri()?>/assets/img/reviews/Shape.png" alt="">
                        </div>
                    </div>
                    <div class="col-md-6 testimonial_right">
                        <div class="test_desp">
                        <?php the_content(); ?>

                        </div>
                       
                        <h1 class="test_title"><?php the_title();?></h1>
                        <p class="test__sub_desp"><?php the_field('cotes_name'); ?></p>
                    </div>
                </div>


			<?php 
					$postcount++;
				endwhile; 
			?>
			
			</div>
        </section>
					








        <!-- Testimonial Section start-->
      
        <!-- Testimonial section end -->

        <!-- Contact section start -->

        <section class="contact_us">
            <div class="container">
                <div class="contact_us_wrapper">
                    <div class="row">
                        <div class="col-md-3">

                        </div>
                        <div class="col-md-6 width">
                            <h1 class="contact_us_title">You can also share your best moments</h1>
                            <p class="contact_us_desp">Lorem ipsum dolor sit amet consectetur. Enim pellentesque tortor purus neque rhoncus in molestie luctus. At diam at vel hac aliquam lectus. Venenatis aliquam cursus morbi lobortis est id quis habitasse.</p>
                        </div>
                        <div class="col-md-3">

                        </div>
                    </div>
                 
            <?php echo do_shortcode('[contact-form-7 id="193" title="Review"]'); ?>
                </div>
            </div>
        </section>

        <!-- Contact section end -->


        <!-- Google Map section end -->

        <section class="google_map">
            <div class="container">
                <div class="google_map_wrapper">
                    <div class="row">
                        <div class="col-md-3">

                        </div>
                        <div class="col-md-6 width">
                            <h1 class="google_map_title">Explore our all property</h1>
                            <p class="google_map_desp">Rossport by the Sea is a pretty special place, we like to say its magical by nature and a little slice of Heaven on Earth.</p>
                        </div>
                        <div class="col-md-3">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2824.829383736767!2d-67.03608748424637!3d44.926805077160225!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ca8bb4d1d071469%3A0x841f543fb19467d4!2sRossport%20by%20the%20Sea%20Lodging%2C%20Retreat%20and%20Farm!5e0!3m2!1sen!2sbd!4v1670750751940!5m2!1sen!2sbd"
                                width="100%" height="731px" style="border-radius:8px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- Google Map section end -->
  










		
		<?php


	}
}
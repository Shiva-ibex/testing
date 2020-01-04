<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.


class Widget_ProgressionElementsPostSlider extends Widget_Base {

	public function get_name() {
		return 'progression-slider';
	}

	public function get_title() {
		return esc_html__( 'Pro - Post Slider', 'progression-elements-viseo' );
	}

	public function get_icon() {
		return 'fa fa-film progression-studios-viseo-pe';
	}

   public function get_categories() {
		return [ 'progression-studios-viseo' ];
	}
	
	function Widget_ProgressionElementsPostSlider($widget_instance){
		
	}
	
	protected function _register_controls() {

		
  		$this->start_controls_section(
  			'section_title_global_options',
  			[
  				'label' => esc_html__( 'Slider Settings', 'progression-elements-viseo' )
  			]
  		);
		
		$this->add_control(
			'progression_main_post_count',
			[
				'label' => esc_html__( 'Post Count', 'progression-elements-viseo' ),
				'type' => Controls_Manager::NUMBER,
				'default' => '3',
			]
		);
		
		
		$this->add_control(
			'progression_slider_tags',
			[
				'label' => esc_html__( 'Narrow by Filtering Tags', 'progression-elements-viseo' ),
				'description' => esc_html__( 'Enter filtering tags to display posts with a specific tag. Add-in multiple filtering tags seperated by a comma to use multiple tags. ', 'progression-elements-viseo' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
			]
		);
		
		
		$this->add_control(
			'progression_post_category',
			[
				'label' => esc_html__( 'Narrow by Post Category', 'progression-elements-viseo' ),
				'description' => esc_html__( 'Enter category slugs to display a specific category. Add-in multiple category slugs seperated by a comma to use multiple categories. ', 'progression-elements-viseo' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
			]
		);
		
		

		
		
		$this->add_control(
			'progression_elements_post_order_sorting',
			[
				'label' => esc_html__( 'Order By', 'progression-elements-viseo' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'date',
				'options' => [
					'date' => esc_html__( 'Default - Date', 'progression-elements-viseo' ),
					'post_views' => esc_html__( 'Views - All Time', 'progression-elements-viseo' ),
					'post_views_year' => esc_html__( 'Views - Per Year', 'progression-elements-viseo' ),
					'post_views_month' => esc_html__( 'Views - Per Month', 'progression-elements-viseo' ),
					'post_views_day' => esc_html__( 'Views - Per Day', 'progression-elements-viseo' ),
					'title' => esc_html__( 'Post Title', 'progression-elements-viseo' ),
					'menu_order' => esc_html__( 'Menu Order', 'progression-elements-viseo' ),
					'modified' => esc_html__( 'Last Modified', 'progression-elements-viseo' ),
					'comment_count' => esc_html__( 'Comment Count', 'progression-elements-viseo' ),
					'rand' => esc_html__( 'Random', 'progression-elements-viseo' ),
				],
			]
		);
		
		
		$this->add_control(
			'progression_elements_post_order',
			[
				'label' => esc_html__( 'Order', 'progression-elements-viseo' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'DESC',
				'options' => [
					'ASC' => esc_html__( 'Ascending', 'progression-elements-viseo' ),
					'DESC' => esc_html__( 'Descending', 'progression-elements-viseo' ),
				],
			]
		);
		
		$this->add_control(
			'progression_main_offset_count',
			[
				'label' => esc_html__( 'Offset Count', 'progression-elements-viseo' ),
				'type' => Controls_Manager::NUMBER,
				'default' => '0',
				'description' => esc_html__( 'Use this to skip over posts (Example: 3 would skip the first 3 posts.)', 'progression-elements-viseo' ),
			]
		);
		
		

		
		$this->end_controls_section();

		
		
  		$this->start_controls_section(
  			'section_title_boosted_slider_options',
  			[
  				'label' => esc_html__( 'Slider Options', 'progression-elements-viseo' )
  			]
  		);
		
		$this->add_responsive_control(
			'progression_elements_slider_main_height',
			[
				'label' => esc_html__( 'Slider Height', 'progression-elements-viseo' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 700,
					'unit' => 'px',
				],
				'range' => [
					'px' => [
						'min' => 100,
						'max' => 1500,
					],
					'vh' => [
						'min' => 10,
						'max' => 150,
					],
				],
				'size_units' => [ 'px', 'vh', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .progression-elements-slider-background' => 'height:{{SIZE}}{{UNIT}};',
				],
			]
		);
		
		$this->add_control(
			'progression_elements_slider_transition',
			[
				'label' => esc_html__( 'Slide Transition', 'progression-elements-viseo' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'fade',
				'options' => [
					'fade' => esc_html__( 'Fade', 'progression-elements-viseo' ),
					'slide' => esc_html__( 'Slide', 'progression-elements-viseo' ),
				],
			]
		);
		
		$this->add_control(
			'progression_elements_slide_transition_speed',
			[
				'label' => esc_html__( 'Transition Speed', 'progression-elements-viseo' ),
				'type' => Controls_Manager::NUMBER,
				'default' => '500',
			]
		);
		
		$this->add_control(
			'progression_elements_slider_css3_animation',
			[
				'label' => esc_html__( 'Text Animation', 'progression-elements-viseo' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'progression_animate_up',
				'options' => [
					'progression_animate_none' => esc_html__( 'No Animation', 'progression-elements-viseo' ),
					'progression_animate_in' => esc_html__( 'Zoom in', 'progression-elements-viseo' ),
					'progression_animate_out' => esc_html__( 'Zoom Out', 'progression-elements-viseo' ),
					'progression_animate_down' => esc_html__( 'Fade Down', 'progression-elements-viseo' ),
					'progression_animate_up' => esc_html__( 'Fade Up', 'progression-elements-viseo' ),
					'progression_animate_right' => esc_html__( 'Fade Right', 'progression-elements-viseo' ),
					'progression_animate_left' => esc_html__( 'Fade Left', 'progression-elements-viseo' ),
				],
			]
		);
		
		$this->add_control(
			'progression_elements_autoplay',
			[
				'label' => esc_html__( 'Autoplay', 'progression-elements-viseo' ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		
		$this->add_control(
			'progression_elements_play_number_speed',
			[
				'label' => esc_html__( 'Autoplay Speed', 'progression-elements-viseo' ),
				'type' => Controls_Manager::NUMBER,
				'default' => '7000'
			]
		);
		
		
		$this->add_control(
			'progression_elements_slider_pause_hover',
			[
				'label' => esc_html__( 'Pause on Hover', 'progression-elements-viseo' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);
		
		$this->add_control(
			'progression_elements_slider_arrow_visiblity',
			[
				'label' => esc_html__( 'Slide Arrows', 'progression-elements-viseo' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'progression_elements_slider_arrow_visiblity_hidden',
				'options' => [
					'progression_elements_slider_arrow_visiblity_visible' => esc_html__( 'Always Visible', 'progression-elements-viseo' ),
					'progression_elements_slider_arrow_visiblity_hover' => esc_html__( 'Visible on Hover', 'progression-elements-viseo' ),
					'progression_elements_slider_arrow_visiblity_hidden' => esc_html__( 'Hidden', 'progression-elements-viseo' ),
				],
			]
		);
		
		$this->add_control(
			'progression_elements_slider_bullets_visiblity',
			[
				'label' => esc_html__( 'Slide Bullets', 'progression-elements-viseo' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'progression_elements_slider_dots_visiblity_visible',
				'options' => [
					'progression_elements_slider_dots_visiblity_visible' => esc_html__( 'Always Visible', 'progression-elements-viseo' ),
					'progression_elements_slider_dots_visiblity_hover' => esc_html__( 'Visible on Hover', 'progression-elements-viseo' ),
					'progression_elements_slider_dots_visiblity_hidden' => esc_html__( 'Hidden', 'progression-elements-viseo' ),
				],
			]
		);
		

		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'boosted_elements_section_main_styles',
			[
				'label' => esc_html__( 'Main Styles', 'progression-elements-viseo' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		
		$this->add_responsive_control(
			'boosted_elements_content_width',
			[
				'label' => esc_html__( 'Content Width', 'progression-elements-viseo' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'size_units' => [ '%', 'px' ],
				'default' => [
					'size' => '90',
					'unit' => '%',
				],
				'selectors' => [
					'{{WRAPPER}} .slider-content-max-width' => 'max-width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		
		
		$this->add_responsive_control(
			'boosted_elements_content_padding',
			[
				'label' => esc_html__( 'Content Padding', 'progression-elements-viseo' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .slider-content-margins' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'boosted_elements_content_align',
			[
				'label' => esc_html__( 'Align', 'progression-elements-viseo' ),
				'type' => Controls_Manager::CHOOSE,
				'label_block' => false,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'progression-elements-viseo' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'progression-elements-viseo' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'progression-elements-viseo' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'left',
				'selectors' => [
					'{{WRAPPER}} .slider-content-align-ment' => 'text-align: {{VALUE}}',
				],
			]
		);
	
		$this->add_responsive_control(
			'boosted_elements_vertical_position',
			[
				'label' => esc_html__( 'Vertical Position', 'progression-elements-viseo' ),
				'type' => Controls_Manager::CHOOSE,
				'label_block' => false,
				'default' => 'middle',
				'options' => [
					'top' => [
						'title' => esc_html__( 'Top', 'progression-elements-viseo' ),
						'icon' => 'eicon-v-align-top',
					],
					'middle' => [
						'title' => esc_html__( 'Middle', 'progression-elements-viseo' ),
						'icon' => 'eicon-v-align-middle',
					],
					'bottom' => [
						'title' => esc_html__( 'Bottom', 'progression-elements-viseo' ),
						'icon' => 'eicon-v-align-bottom',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .slider-text-floating-container' => '{{VALUE}}',
				],
				'selectors_dictionary' => [
					'top' => 'display:block;',
					'middle' => 'display:table-cell; vertical-align:middle;',
					'bottom' => 'position:absolute; bottom:0px;',
				],
			]
		);
		
		$this->add_control(
			'progression_elements_slider_play_button',
			[
				'label' => esc_html__( 'Display Play Button', 'progression-elements-viseo' ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		
		$this->add_control(
			'boosted_elements_background_color',
			[
				'label' => esc_html__( 'Slider Background Color', 'progression-elements-viseo' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .progression-elements-slider-background' => 'background-color: {{VALUE}}',

				],
			]
		);
		
		
		$this->add_control(
			'boosted_elements_slider_overlay_color',
			[
				'label' => esc_html__( 'Slider Overlay Color', 'progression-elements-viseo' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider-background-overlay-color' => 'background-color: {{VALUE}}',

				],
			]
		);

		$this->end_controls_section();
		
		$this->start_controls_section(
			'boosted_elements_section_video_styles',
			[
				'label' => esc_html__( 'Video Styles', 'progression-elements-viseo' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		
		$this->add_responsive_control(
			'boosted_elements_video_width',
			[
				'label' => esc_html__( 'Video Width', 'progression-elements-viseo' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'size_units' => [ '%', 'px' ],
				'default' => [
					'size' => '40',
					'unit' => '%',
				],
				'selectors' => [
					'{{WRAPPER}} .progression-studios-slider-video-embed' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		
		
		$this->add_responsive_control(
			'boosted_elements_video_padding',
			[
				'label' => esc_html__( 'Video Marins', 'progression-elements-viseo' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .progression-studios-slider-video-embed' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->end_controls_section();
		
		
		$this->start_controls_section(
			'boosted_elements_section_category_styles',
			[
				'label' => esc_html__( 'Category Styles', 'progression-elements-viseo' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_control(
			'boosted_elements_category_color',
			[
				'label' => esc_html__( 'Category Color', 'progression-elements-viseo' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider-category-list span' => 'color: {{VALUE}}',

				],
			]
		);
		
		$this->add_control(
			'boosted_elements_category_border_color',
			[
				'label' => esc_html__( 'Category Border Color', 'progression-elements-viseo' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider-category-list span' => 'border-color: {{VALUE}}',

				],
			]
		);
		
		$this->add_responsive_control(
			'boosted_elements_category_spacing',
			[
				'label' => esc_html__( 'Margin Bottom', 'progression-elements-viseo' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .slider-category-list span' => 'margin-bottom: {{SIZE}}px',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'boosted_elements_content_typography',
				'label' => esc_html__( 'Typography', 'progression-elements-viseo' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .slider-category-list span',
			]
		);
		

		
		$this->end_controls_section();
		
		
		$this->start_controls_section(
			'boosted_elements_section_title_styles',
			[
				'label' => esc_html__( 'Title Styles', 'progression-elements-viseo' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		
		
		$this->add_control(
			'boosted_elements_title_color',
			[
				'label' => esc_html__( 'Title Color', 'progression-elements-viseo' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} h2.progression-blog-slider-title' => 'color: {{VALUE}}',

				],
			]
		);
		
		$this->add_responsive_control(
			'boosted_elements_title_spacing',
			[
				'label' => esc_html__( 'Margin Bottom', 'progression-elements-viseo' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} h2.progression-blog-slider-title' => 'margin-bottom: {{SIZE}}px',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'boosted_elements_title_typography',
				'label' => esc_html__( 'Typography', 'progression-elements-viseo' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} h2.progression-blog-slider-title',
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'boosted_elements_section_sub_title_styles',
			[
				'label' => esc_html__( 'Sub-Title Styles', 'progression-elements-viseo' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		
		
		$this->add_control(
			'boosted_elements_sub_title_color',
			[
				'label' => esc_html__( 'Sub-Title Color', 'progression-elements-viseo' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} h4.progression-blog-slider-sub-title' => 'color: {{VALUE}}',

				],
			]
		);
		
		$this->add_responsive_control(
			'boosted_elements_sub_title_spacing',
			[
				'label' => esc_html__( 'Margin Bottom', 'progression-elements-viseo' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} h4.progression-blog-slider-sub-title' => 'margin-bottom: {{SIZE}}px',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'boosted_elements_sub_title_typography',
				'label' => esc_html__( 'Typography', 'progression-elements-viseo' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} h4.progression-blog-slider-sub-title',
			]
		);
		

		$this->end_controls_section();
		
		
		$this->start_controls_section(
			'boosted_elements_section_additional_title_styles',
			[
				'label' => esc_html__( 'Additional Title Styles', 'progression-elements-viseo' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		
		
		$this->add_control(
			'boosted_elements_additional_title_color',
			[
				'label' => esc_html__( 'Additional Title Color', 'progression-elements-viseo' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} h6.progression-blog-slider-smallest-title' => 'color: {{VALUE}}',

				],
			]
		);
		
		$this->add_responsive_control(
			'boosted_elements_additional_title_spacing',
			[
				'label' => esc_html__( 'Margin Bottom', 'progression-elements-viseo' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} h4.progression-blog-slider-sub-title' => 'margin-bottom: {{SIZE}}px',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'boosted_elements_additional_title_typography',
				'label' => esc_html__( 'Typography', 'progression-elements-viseo' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} h6.progression-blog-slider-smallest-title',
			]
		);
		

		$this->end_controls_section();
		
	}
	

	protected function render( ) {
		
      $settings = $this->get_settings();
		
	?>
	
	<?php	
	global $blogloop;
	global $post;

	
	$post_per_page = $settings['progression_main_post_count'];
	$offset_new = $settings['progression_main_offset_count'];
	
	if ( ! empty( $settings['progression_post_category'] ) ) {
	 	$catpostIds = $settings['progression_post_category']; // get custom field value
	     $catarrayIds = explode(',', $catpostIds); // explode value into an array of ids
	     if(count($catarrayIds) <= 1) // if array contains one element or less, there's spaces after comma's, or you only entered one id
	     {
	         if( strpos($catarrayIds[0], ',') !== false )// if the first array value has commas, there were spaces after ids entered
	         {
	             $catarrayIds = array(); // reset array
	             $catarrayIds = explode(', ', $catpostIds); // explode ids with space after comma's
	         }
	 	 }
		 $operatorcat = 'IN';
 	} else {

	 		$catarrayIds = '';
			$operatorcat = 'NOT IN';					
 	}
	
	if ( ! empty( $settings['progression_slider_tags'] ) ) {
	 	$postIds = $settings['progression_slider_tags']; // get custom field value
	     $sliderarrayIds = explode(',', $postIds); // explode value into an array of ids
	     if(count($sliderarrayIds) <= 1) // if array contains one element or less, there's spaces after comma's, or you only entered one id
	     {
	         if( strpos($sliderarrayIds[0], ',') !== false )// if the first array value has commas, there were spaces after ids entered
	         {
	             $sliderarrayIds = array(); // reset array
	             $sliderarrayIds = explode(', ', $postIds); // explode ids with space after comma's
	         }
	 	 }
		 $operator = 'IN';
 	} else {

	 		$sliderarrayIds = '';
			$operator = 'NOT IN';
 	}
	
	
	
	
	if ( $settings['progression_elements_post_order_sorting'] == 'post_views_year' ) {
		
		
	 	$args = array(
	 	        'post_type'         => 'post',
				  'orderby'         => 'post_views',
				  'order'         => $settings['progression_elements_post_order'],
				  'ignore_sticky_posts' => 1,
				  'posts_per_page'     =>  $post_per_page,
				  
				  'offset' => $offset_new,
				  'views_query'		=> array(
					  'year'	=> date( 'Y' ), // this year
				  ),
				  'tax_query' => array(
					  'relation' => 'AND',
			        array(
			            'taxonomy' => 'category',
			            'field'    => 'slug',
			            'terms'    => $catarrayIds,
							'operator' => $operatorcat
			        ),
			        array(
			            'taxonomy' => 'slider-tags',
			            'field'    => 'slug',
			            'terms'    => $sliderarrayIds,
							'operator' => $operator
			        )
				  ),
	 	);
		
	} else {
		
		if ( $settings['progression_elements_post_order_sorting'] == 'post_views_month' ) {

			
		 	$args = array(
		 	        'post_type'         => 'post',
					  'orderby'         => 'post_views',
					  'order'         => $settings['progression_elements_post_order'],
					  'ignore_sticky_posts' => 1,
					  'posts_per_page'     =>  $post_per_page,
					  
					  'offset' => $offset_new,
					  'views_query'		=> array(
						  'month' => date( 'm' ), // this month
					  ),
					  'tax_query' => array(
						  'relation' => 'AND',
 				        array(
 				            'taxonomy' => 'category',
 				            'field'    => 'slug',
 				            'terms'    => $catarrayIds,
								'operator' => $operatorcat
 				        ),
 				        array(
 				            'taxonomy' => 'slider-tags',
 				            'field'    => 'slug',
 				            'terms'    => $sliderarrayIds,
								'operator' => $operator
 				        )
					  ),
		 	);
		
		} else {
			
			if ( $settings['progression_elements_post_order_sorting'] == 'post_views_day' ) {
				
			 	$args = array(
			 	        'post_type'         => 'post',
						  'orderby'         => 'post_views',
						  'order'         => $settings['progression_elements_post_order'],
						  'ignore_sticky_posts' => 1,
						  'posts_per_page'     =>  $post_per_page,
						  
						  'offset' => $offset_new,
						  'views_query'		=> array(
							  'day'	=> date( 'd' ), // this day
						  ),
						  'tax_query' => array(
							  'relation' => 'AND',
	 				        array(
	 				            'taxonomy' => 'category',
	 				            'field'    => 'slug',
	 				            'terms'    => $catarrayIds,
									'operator' => $operatorcat
	 				        ),
	 				        array(
	 				            'taxonomy' => 'slider-tags',
	 				            'field'    => 'slug',
	 				            'terms'    => $sliderarrayIds,
									'operator' => $operator
	 				        )
						  ),
			 	);
		
			} else {
			
			 	$args = array(
			 	        'post_type'         => 'post',
						  'orderby'         => $settings['progression_elements_post_order_sorting'],
						  'order'         => $settings['progression_elements_post_order'],
						  'ignore_sticky_posts' => 1,
						  'posts_per_page'     =>  $post_per_page,
						  'offset' => $offset_new,
						  'tax_query' => array(
							  'relation' => 'AND',
	 				        array(
	 				            'taxonomy' => 'category',
	 				            'field'    => 'slug',
	 				            'terms'    => $catarrayIds,
									'operator' => $operatorcat
	 				        ),
	 				        array(
	 				            'taxonomy' => 'slider-tags',
	 				            'field'    => 'slug',
	 				            'terms'    => $sliderarrayIds,
									'operator' => $operator
	 				        )
						  ),
			 	);
		
			}
		}
	}
	
	$blogloop = new \WP_Query( $args );
	
	?>
	

	<div class="progression-studios-post-slider-main <?php echo esc_attr($settings['progression_elements_slider_arrow_visiblity'] ); ?> <?php echo esc_attr($settings['progression_elements_slider_bullets_visiblity'] ); ?>">
		<div id="progression-elements-progression-flexslider-<?php echo esc_attr($this->get_id()); ?>" class="flexslider">
			<ul class="slides">
				<?php while($blogloop->have_posts()): $blogloop->the_post();?>
				<li class="<?php echo esc_attr($settings['progression_elements_slider_css3_animation'] ); ?>">
					<?php include(locate_template('template-parts/content-slider.php')); ?>
				</li>
				<?php  endwhile; // end of the loop. ?>
			</ul>
		</div><!-- #-elements-progression-flexslider-<?php echo esc_attr($this->get_id()); ?> -->
	</div><!-- close .progression-studios-post-slider-main -->
	
	
	<?php wp_reset_postdata();?>
	
	<script type="text/javascript"> 
	jQuery(document).ready(function($) {
		'use strict';
		
      $('#progression-elements-progression-flexslider-<?php echo esc_attr($this->get_id()); ?>').flexslider({
			prevText: "",
			nextText: "",
			slideshow:<?php if ( ! empty( $settings['progression_elements_autoplay'] ) ) : ?>true<?php else: ?>false<?php endif; ?>,
			slideshowSpeed: <?php echo esc_attr($settings['progression_elements_play_number_speed'] ); ?>,
			animation: "<?php echo esc_attr($settings['progression_elements_slider_transition'] ); ?>",
			animationSpeed: <?php echo esc_attr($settings['progression_elements_slide_transition_speed'] ); ?>,
			pauseOnHover: <?php if ( ! empty( $settings['progression_elements_slider_pause_hover'] ) ) : ?>true<?php else: ?>false<?php endif; ?>,
			before: function(){
			        var active_rel = $( '#progression-elements-progression-flexslider-<?php echo esc_attr($this->get_id()); ?> iframe' ).attr( 'src', function ( i, val ) { return val; });
			        //do something
			    },
      });
		

	});
	</script>
	

	<?php
	
	}

	protected function content_template() {
		
		?>

		<?php
	}
}


Plugin::instance()->widgets_manager->register_widget_type( new Widget_ProgressionElementsPostSlider() );
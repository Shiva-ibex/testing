<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.


class Widget_ProgressionElementsPostList extends Widget_Base {

	public function get_name() {
		return 'progression-post-list';
	}

	public function get_title() {
		return esc_html__( 'Pro - Post List', 'progression-elements-viseo' );
	}

	public function get_icon() {
		return 'fa fa-file-text progression-studios-viseo-pe';
	}

   public function get_categories() {
		return [ 'progression-studios-viseo' ];
	}
	
	
	function Widget_ProgressionElementsPostList($widget_instance){
		
	}
	
	protected function _register_controls() {

		
  		$this->start_controls_section(
  			'section_title_global_options',
  			[
  				'label' => esc_html__( 'Post List Settings', 'progression-elements-viseo' )
  			]
  		);
		
		
		$this->add_control(
			'progression_elements_post_layout',
			[
				'label' => esc_html__( 'Post Layout', 'progression-elements-viseo' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'default',
				'options' => [
					'default' => esc_html__( 'Default', 'progression-elements-viseo' ),
					'overlay' => esc_html__( 'Overlay', 'progression-elements-viseo' ),
				],
			]
		);
		
		$this->add_control(
			'progression_main_post_count',
			[
				'label' => esc_html__( 'Post Count', 'progression-elements-viseo' ),
				'type' => Controls_Manager::NUMBER,
				'default' => '6',
			]
		);
		
		$this->add_responsive_control(
			'progression_elements_image_grid_column_count',
			[
  				'label' => esc_html__( 'Columns', 'progression-elements-viseo' ),
				'label_block' => true,
				'type' => Controls_Manager::SELECT,				
				'desktop_default' => '33.330%',
				'tablet_default' => '50%',
				'mobile_default' => '100%',
				'options' => [
					'100%' => esc_html__( '1 Column', 'progression-elements-viseo' ),
					'50%' => esc_html__( '2 Column', 'progression-elements-viseo' ),
					'33.330%' => esc_html__( '3 Columns', 'progression-elements-viseo' ),
					'25%' => esc_html__( '4 Columns', 'progression-elements-viseo' ),
					'20%' => esc_html__( '5 Columns', 'progression-elements-viseo' ),
					'16.67%' => esc_html__( '6 Columns', 'progression-elements-viseo' ),
				],
				'selectors' => [
					'{{WRAPPER}} .progression-masonry-item' => 'width: {{VALUE}};',
				],
				'render_type' => 'template'
			]
		);
		
		
  		$this->add_responsive_control(
  			'progression_elements_image_grid_margin',
  			[
  				'label' => esc_html__( 'Margin', 'progression-elements-viseo' ),
  				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 20,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .progression-masonry-margins' => 'margin-left:-{{SIZE}}px; margin-right:-{{SIZE}}px;',
					'{{WRAPPER}} .progression-masonry-padding-blog' => 'padding: {{SIZE}}px;',
				],
				'render_type' => 'template'
  			]
  		);
		
		
		
		
		
		
		$this->add_control(
			'progression_elements_posts_masonry',
			[
				'label' => esc_html__( 'Masonry Layout', 'progression-elements-viseo' ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		
		
		$this->add_control(
			'progression_elements_post_list_pagination',
			[
				'label' => esc_html__( 'Post Pagination', 'progression-elements-viseo' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'no-pagination',
				'options' => [
					'no-pagination' => esc_html__( 'No Pagination', 'progression-elements-viseo' ),
					'default' => esc_html__( 'Default Pagination', 'progression-elements-viseo' ),
					'load-more' => esc_html__( 'Load More Posts', 'progression-elements-viseo' ),
					'infinite-scroll' => esc_html__( 'Inifinite Scroll', 'progression-elements-viseo' ),
				],
			]
		);
		
		$this->add_control(
			'progression_main_post_load_more',
			[
				'label' => esc_html__( 'Load More Text', 'progression-elements-viseo' ),
				'type' => Controls_Manager::TEXT,
				'default' => 'Load More',
				'condition' => [
					'progression_elements_post_list_pagination' => 'load-more',
				],
			]
		);

		
		
		$this->end_controls_section();
		
		
  		$this->start_controls_section(
  			'section_title_layout_options',
  			[
  				'label' => esc_html__( 'Post Layout', 'progression-elements-viseo' )
  			]
  		);
		
		
		$this->add_control(
			'progression_elements_post_image_transition',
			[
				'label' => esc_html__( 'Image Hover Effect', 'progression-elements-viseo' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'progression-studios-blog-image-no-effect',
				'options' => [
					'progression-studios-blog-image-scale' => esc_html__( 'Zoom', 'viseo-progression' ),
					'progression-studios-blog-image-zoom-grey' => esc_html__( 'Greyscale', 'viseo-progression' ),
					'progression-studios-blog-image-zoom-sepia' => esc_html__( 'Sepia', 'viseo-progression' ),
					'progression-studios-blog-image-zoom-saturate' => esc_html__( 'Saturate', 'viseo-progression' ),
					'progression-studios-blog-image-zoom-shine' => esc_html__( 'Shine', 'viseo-progression' ),
					'progression-studios-blog-image-no-effect' => esc_html__( 'No Effect', 'viseo-progression' ),
				],
			]
		);
		
		$this->add_control(
			'progression_elements_image_transparency_hover',
			[
				'label' => esc_html__( 'Image Transparency on Hover	', 'boosted-elements-progression' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1,
						'step' => 0.01,
					],
				],
				'default' => [
					'size' => '1',
				],
				'selectors' => [
					'{{WRAPPER}} .progression-studios-default-blog-overlay:hover a img' => 'opacity: {{SIZE}};',
					'{{WRAPPER}} .progression-studios-feaured-image:hover a img' => 'opacity: {{SIZE}};',
				],
			]
		);
		
		$this->add_control(
			'progression_elements_image_background_color',
			[
				'label' => esc_html__( 'Post Image Background Color', 'progression-elements-viseo' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .progression-studios-feaured-image' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .progression-studios-default-blog-overlay' => 'background-color: {{VALUE}}',
				],
			]
		);
		
		
		
		
		$this->add_control(
			'progression_elements_post_list_cat',
			[
				'label' => esc_html__( 'Category Display', 'progression-elements-viseo' ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		
		$this->add_control(
			'progression_elements_post_list_author',
			[
				'label' => esc_html__( 'Author Display', 'progression-elements-viseo' ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		
		$this->add_control(
			'progression_elements_post_list_date',
			[
				'label' => esc_html__( 'Date Display', 'progression-elements-viseo' ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		
		$this->add_control(
			'progression_elements_post_list_comment',
			[
				'label' => esc_html__( 'Comment Display', 'progression-elements-viseo' ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		
		$this->add_control(
			'progression_elements_post_list_view_count',
			[
				'label' => esc_html__( 'View Count Display', 'progression-elements-viseo' ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		
		$this->add_control(
			'progression_elements_post_list_video_play',
			[
				'label' => esc_html__( 'Video Play Button', 'progression-elements-viseo' ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		
		$this->add_control(
			'progression_elements_post_list_excerpt',
			[
				'label' => esc_html__( 'Exerpt Display', 'progression-elements-viseo' ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		
		

		
		$this->end_controls_section();
		
		
  		$this->start_controls_section(
  			'section_title_secondary_options',
  			[
  				'label' => esc_html__( 'Post Query', 'progression-elements-viseo' )
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
		
		
		$this->add_control(
			'progression_elements_slider_sorting_on',
			[
				'label' => esc_html__( 'Filtering Sorting', 'progression-elements-viseo' ),
				'description' => esc_html__( 'Sort by Filtering Tags', 'progression-elements-viseo' ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
			]
		);
		
		$this->add_control(
			'progression_elements_category_sorting_on',
			[
				'label' => esc_html__( 'Category Sorting', 'progression-elements-viseo' ),
				'description' => esc_html__( 'Sort by Post Caregories', 'progression-elements-viseo' ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
			]
		);
		
		$this->add_control(
			'progression_elements_category_sorting_text',
			[
				'label' => esc_html__( 'Sorting Text for All Posts', 'progression-elements-viseo' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'All', 'progression-elements-viseo' ),
			]
		);
		
		$this->end_controls_section();
		
		
		$this->start_controls_section(
			'progression_elements_section_main_styles',
			[
				'label' => esc_html__( 'Main Styles', 'progression-elements-viseo' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		
		$this->add_control(
			'progression_elements_main_bg_color',
			[
				'label' => esc_html__( 'Main Background Color', 'progression-elements-viseo' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .progression-blog-content' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .overlay-blog-gradient' => 'background-color: {{VALUE}}',
				],
			]
		);
		
		
		$this->add_control(
			'progression_elements_main_border_color',
			[
				'label' => esc_html__( 'Main Border Color', 'progression-elements-viseo' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .progression-blog-content' => 'border-color: {{VALUE}}',
				],
			]
		);
		
		$this->add_responsive_control(
			'progression_elements_content_padding',
			[
				'label' => esc_html__( 'Content Padding', 'progression-elements-viseo' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .progression-blog-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .overlay-progression-blog-content-padding' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		
		$this->end_controls_section();
		
		
  		
		$this->start_controls_section(
			'section_styles_category_styles',
			[
				'label' => esc_html__( 'Category Styles', 'progression-elements-viseo' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		
		$this->add_control(
			'progression_elements_category_styles_color',
			[
				'label' => esc_html__( 'Category Color', 'progression-elements-viseo' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .overlay-blog-meta-category-list span' => 'color: {{VALUE}}',
					'{{WRAPPER}} .blog-meta-category-list a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .blog-meta-category-list a:hover' => 'color: {{VALUE}}',
				],
			]
		);
		
		$this->add_control(
			'progression_elements_category_styles_border',
			[
				'label' => esc_html__( 'Category Border', 'progression-elements-viseo' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .overlay-blog-meta-category-list span' => 'border-color: {{VALUE}}',
					'{{WRAPPER}} .blog-meta-category-list a' => 'border-color: {{VALUE}}',
				],
			]
		);
		
		
		$this->add_responsive_control(
			'progression_elements_category_margin',
			[
				'label' => esc_html__( 'Category Margin', 'progression-elements-viseo' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .overlay-blog-meta-category-list' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .blog-meta-category-list' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'progression_elements_category_typography',
				'label' => esc_html__( 'Typography', 'progression-elements-viseo' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .overlay-blog-meta-category-list span, {{WRAPPER}} .blog-meta-category-list a',
			]
		);
		
		
		$this->end_controls_section();
		
		
		$this->start_controls_section(
			'section_styles_title_styles',
			[
				'label' => esc_html__( 'Title Styles', 'progression-elements-viseo' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		
		$this->add_control(
			'progression_elements_title_styles_color',
			[
				'label' => esc_html__( 'Title Color', 'progression-elements-viseo' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} h2.overlay-progression-blog-title' => 'color: {{VALUE}}',
					'{{WRAPPER}} h2.progression-blog-title' => 'color: {{VALUE}}',
					'{{WRAPPER}} h2.progression-blog-title a' => 'color: {{VALUE}}',
				],
			]
		);
		
		$this->add_control(
			'progression_elements_title_styles_hover_color',
			[
				'label' => esc_html__( 'Title Hover Color', 'progression-elements-viseo' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} h2.progression-blog-title a:hover' => 'color: {{VALUE}}',
				],
			]
		);
		

		
		$this->add_responsive_control(
			'progression_elements_title_margin',
			[
				'label' => esc_html__( 'Title Margin', 'progression-elements-viseo' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} h2.overlay-progression-blog-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} h2.progression-blog-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'progression_elements_title_typography',
				'label' => esc_html__( 'Typography', 'progression-elements-viseo' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} h2.progression-blog-title, {{WRAPPER}} h2.overlay-progression-blog-title',
			]
		);
		
		
		$this->end_controls_section();
		
		
		$this->start_controls_section(
			'section_styles_author_styles',
			[
				'label' => esc_html__( 'Author/Date Styles', 'progression-elements-viseo' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		
		$this->add_control(
			'progression_elements_author_styles_color',
			[
				'label' => esc_html__( 'Author/Date Color', 'progression-elements-viseo' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .progression-post-meta' => 'color: {{VALUE}}',
					'{{WRAPPER}} .progression-post-meta a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .progression-post-meta a:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .progression-studios-default-blog-overlay .progression-post-meta' => 'color: {{VALUE}}',
				],
			]
		);
		
		$this->add_responsive_control(
			'progression_elements_author_margin',
			[
				'label' => esc_html__( 'Author/Date Margin', 'progression-elements-viseo' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .progression-post-meta' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'progression_elements_author_typography',
				'label' => esc_html__( 'Typography', 'progression-elements-viseo' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .progression-post-meta',
			]
		);
		
		
		$this->end_controls_section();
		
		
		$this->start_controls_section(
			'section_styles_comment_styles',
			[
				'label' => esc_html__( 'Excerpt Styles', 'progression-elements-viseo' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		
		$this->add_control(
			'progression_elements_comment_styles_color',
			[
				'label' => esc_html__( 'Excerpt Color', 'progression-elements-viseo' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .progression-studios-blog-excerpt' => 'color: {{VALUE}}',
					'{{WRAPPER}} .progression-studios-blog-excerpt a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .overlay-blog-floating-comments-viewcount' => 'color: {{VALUE}}',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'progression_elements_comment_typography',
				'label' => esc_html__( 'Typography', 'progression-elements-viseo' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .progression-studios-blog-excerpt',
			]
		);
		
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_styles_load_more_styles',
			[
				'label' => esc_html__( 'Load More Styles', 'progression-elements-viseo' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_control(
			'section_styles_load_more_icon',
			[
				'type' => Controls_Manager::ICON,
				'label_block' => true,
				'default' => 'fa-arrow-circle-down',
			]
		);
		
		$this->add_control(
			'section_styles_load_more_icon_indent',
			[
				'label' => esc_html__( 'Icon Spacing', 'progression-elements-viseo' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .infinite-nav-pro a span i' => 'margin-left: {{SIZE}}px;',
				],
			]
		);
		
		
		$this->add_responsive_control(
			'progression_elements_load_more_padding',
			[
				'label' => esc_html__( 'Padding', 'progression-elements-viseo' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .infinite-nav-pro a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'progression_elements_load_moretypography',
				'label' => esc_html__( 'Typography', 'progression-elements-viseo' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .infinite-nav-pro a',
			]
		);
		
		
		
		
		$this->start_controls_tabs( 'boosted_elements_button_tabs' );

		$this->start_controls_tab( 'normal', [ 'label' => esc_html__( 'Normal', 'progression-elements-viseo' ) ] );

		$this->add_control(
			'boosted_elements_button_text_color',
			[
				'label' => esc_html__( 'Text Color', 'progression-elements-viseo' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .infinite-nav-pro a' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'boosted_elements_button_background_color',
			[
				'label' => esc_html__( 'Background Color', 'progression-elements-viseo' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .infinite-nav-pro a' => 'background-color: {{VALUE}};',
				],
			]
		);

		
		$this->end_controls_tab();

		$this->start_controls_tab( 'boosted_elements_hover', [ 'label' => esc_html__( 'Hover', 'progression-elements-viseo' ) ] );

		$this->add_control(
			'boosted_elements_button_hover_text_color',
			[
				'label' => esc_html__( 'Text Color', 'progression-elements-viseo' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .infinite-nav-pro a:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'boosted_elements_button_hover_background_color',
			[
				'label' => esc_html__( 'Background Color', 'progression-elements-viseo' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .infinite-nav-pro a:hover' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();
		
		$this->end_controls_tabs();
		
		
		
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_styles_filter_styles',
			[
				'label' => esc_html__( 'Filtering Styles', 'progression-elements-viseo' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		
		$this->add_control(
			'progression_elements_filter_border_color',
			[
				'label' => esc_html__( 'Container Border', 'progression-elements-viseo' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} ul.progression-filter-button-group' => 'border-color: {{VALUE}}',
				],
			]
		);
		
		
		$this->add_control(
			'progression_elements_filter_font_color',
			[
				'label' => esc_html__( 'Color', 'progression-elements-viseo' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} ul.progression-filter-button-group li' => 'color: {{VALUE}}',
				],
			]
		);
		
		$this->add_control(
			'progression_elements_filter_font_selected_color',
			[
				'label' => esc_html__( 'Selected Color', 'progression-elements-viseo' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} ul.progression-filter-button-group li.pro-checked' => 'color: {{VALUE}}',
					'{{WRAPPER}} ul.progression-filter-button-group li:hover' => 'color: {{VALUE}}',
				],
			]
		);
		
		$this->add_control(
			'progression_elements_filter_font_selected_border_color',
			[
				'label' => esc_html__( 'Selected Border', 'progression-elements-viseo' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} ul.progression-filter-button-group li.pro-checked' => 'border-color: {{VALUE}}',
					'{{WRAPPER}} ul.progression-filter-button-group li:hover' => 'border-color: {{VALUE}}',
				],
			]
		);
		
		
		$this->add_responsive_control(
			'progression_elements_fliltering_margin',
			[
				'label' => esc_html__( 'Padding', 'progression-elements-viseo' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} ul.progression-filter-button-group li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'progression_elements_filtering_typography',
				'label' => esc_html__( 'Typography', 'progression-elements-viseo' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} ul.progression-filter-button-group li',
			]
		);
		
		$this->end_controls_section();
		
		
	}
	

	protected function render( ) {
		
      $settings = $this->get_settings();


	global $blogloop;
	global $post;
	
	
	if ( get_query_var('paged') ) { $paged = get_query_var('paged'); } else if ( get_query_var('page') ) {   $paged = get_query_var('page'); } else {  $paged = 1; }
	

	$post_per_page = $settings['progression_main_post_count'];
	$offset = $settings['progression_main_offset_count'];
	$offset_new = $offset + (( $paged - 1 ) * $post_per_page);
	
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
				  'paged' => $paged,
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
					  'paged' => $paged,
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
						  'paged' => $paged,
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
						  'paged' => $paged,
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
	


	<div class="progression-studios-post-list-main">

		<?php if($settings['progression_elements_category_sorting_on'] == 'yes' ): ?>
			
			<ul class="progression-filter-button-group progression-filter-group-<?php echo esc_attr($this->get_id()); ?>">
				<?php if($settings['progression_post_category']): ?>
				<?php
					$i = 0;
					$args = array(
					    'hide_empty'             => '0',
					    'slug'              => $catarrayIds,
					); 
					$terms = get_terms( 'category', $args );
					if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
						echo '<li class="pro-checked" data-filter="*">' . $settings['progression_elements_category_sorting_text'] .'</li> ';	
				
						foreach ( $terms as $term ) { 
						if ($i == 0) {
						echo '<li data-filter=".'.$term->slug.'">' .$term->name .'</li> ';	
						} else if ($i > 0)  {
						echo '<li data-filter=".'.$term->slug.'">' .$term->name .'</li> ';	
						}
						$i++;
						}
					}	
				?>
				<?php else : ?>
					<?php
						$i = 0;
						$terms = get_terms( 'category', 'hide_empty=0' );
						if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
							echo '<li class="pro-checked" data-filter="*">' . $settings['progression_elements_category_sorting_text'] .'</li> ';	
				
							foreach ( $terms as $term ) { 
							if ($i == 0) {
							echo '<li data-filter=".'.$term->slug.'">' .$term->name .'</li> ';	
							} else if ($i > 0)  {
							echo '<li data-filter=".'.$term->slug.'">' .$term->name .'</li> ';	
							}
							$i++;
							}
						}	
					?>
				<?php endif ?>
			</ul>
			
			<div class="clearfix-pro"></div>
		<?php else : ?>
			<?php if($settings['progression_elements_slider_sorting_on'] == 'yes' ): ?>
				<ul class="progression-filter-button-group progression-filter-group-<?php echo esc_attr($this->get_id()); ?>">
					<?php if($settings['progression_slider_tags']): ?>
						<?php
							$i = 0;
							$args = array(
							    'hide_empty'             => '0',
							    'slug'              => $sliderarrayIds,
							); 
							$terms = get_terms( 'slider-tags', $args );
							if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
								echo '<li class="pro-checked" data-filter="*">' . $settings['progression_elements_category_sorting_text'] .'</li> ';	
			
								foreach ( $terms as $term ) { 
								if ($i == 0) {
								echo '<li data-filter=".'.$term->slug.'">' .$term->name .'</li> ';	
								} else if ($i > 0)  {
								echo '<li data-filter=".'.$term->slug.'">' .$term->name .'</li> ';	
								}
								$i++;
								}
							}	
						?>
					<?php else : ?>
						<?php
							$i = 0;
							$terms = get_terms( 'slider-tags', 'hide_empty=0' );
							if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
								echo '<li class="pro-checked" data-filter="*">' . $settings['progression_elements_category_sorting_text'] .'</li> ';	
				
								foreach ( $terms as $term ) { 
								if ($i == 0) {
								echo '<li data-filter=".'.$term->slug.'">' .$term->name .'</li> ';	
								} else if ($i > 0)  {
								echo '<li data-filter=".'.$term->slug.'">' .$term->name .'</li> ';	
								}
								$i++;
								}
							}	
						?>
					<?php endif ?>
				</ul>
			
				<div class="clearfix-pro"></div>
			<?php endif ?>
		<?php endif ?>

		
		<div class="progression-masonry-margins">
			<div id="progression-blog-index-masonry-<?php echo esc_attr($this->get_id()); ?>">
				
				<?php while($blogloop->have_posts()): $blogloop->the_post();?>
				<div class="progression-masonry-item <?php if($settings['progression_elements_slider_sorting_on'] == 'yes' ): ?><?php  $terms = get_the_terms( $post->ID , 'slider-tags' );  if ( !empty( $terms ) ) : 	foreach ( $terms as $term ) { 	$term_link = get_term_link( $term, 'slider-tags' ); if( is_wp_error( $term_link ) ) continue; echo " ". $term->slug ; }  endif; ?><?php endif ?><?php if($settings['progression_elements_category_sorting_on'] == 'yes' ): ?><?php  $terms = get_the_terms( $post->ID , 'category' );  if ( !empty( $terms ) ) : 	foreach ( $terms as $term ) { 	$term_link = get_term_link( $term, 'category' ); if( is_wp_error( $term_link ) ) continue; echo " ". $term->slug ; }  endif; ?><?php endif ?>">
					<div class="progression-masonry-padding-blog <?php if($settings['progression_elements_post_list_cat'] != 'yes' ): ?> progression_elements_post_list_cat<?php endif ?><?php if($settings['progression_elements_post_list_author'] != 'yes' ): ?> progression_elements_post_list_author<?php endif ?><?php if($settings['progression_elements_post_list_date'] != 'yes' ): ?> progression_elements_post_list_date<?php endif ?><?php if($settings['progression_elements_post_list_comment'] != 'yes' ): ?> progression_elements_post_list_comment<?php endif ?><?php if($settings['progression_elements_post_list_view_count'] != 'yes' ): ?> progression_elements_post_list_view_count<?php endif ?><?php if($settings['progression_elements_post_list_video_play'] != 'yes' ): ?> progression_elements_post_list_video_play<?php endif ?><?php if($settings['progression_elements_post_list_excerpt'] != 'yes' ): ?> progression_elements_post_list_excerpt<?php endif ?>">
						<div class="progression-studios-isotope-animation">
							
							<?php if ( $settings['progression_elements_post_layout'] == 'default' ) : ?>
								<?php include(locate_template('template-parts/elementor/content.php')); ?>
							<?php else : ?>
								<?php include(locate_template('template-parts/elementor/content-overlay.php')); ?>
							<?php endif; ?>
						</div><!-- close .progression-studios-isotope-animation -->
					</div><!-- close .progression-masonry-padding-blog -->
				</div><!-- close .progression-masonry-item -->
				<?php  endwhile; // end of the loop. ?>
				
				
			</div><!-- close #progression-blog-index-masonry-<?php echo esc_attr($this->get_id()); ?>  -->
		</div><!-- close .progression-masonry-margins -->
				
		
		
		<div class="clearfix-pro"></div>
		
	
		<?php if ( $settings['progression_elements_post_list_pagination'] == 'default' ) : ?>
			<?php
			
			$page_tot = ceil(($blogloop->found_posts - $offset) / $post_per_page);
			
			if ( $page_tot > 1 ) {
			$big        = 999999999;
	      echo paginate_links( array(
	              'base'      => str_replace( $big, '%#%',get_pagenum_link( 999999999, false ) ), // need an unlikely integer cause the url can contains a number
	              'format'    => '?paged=%#%',
	              'current'   => max( 1, $paged ),
	              'total'     => ceil(($blogloop->found_posts - $offset) / $post_per_page),
	              'prev_next' => true,
	  				'prev_text'    => esc_html__('&lsaquo; Previous', 'progression-elements-viseo'),
	  				'next_text'    => esc_html__('Next &rsaquo;', 'progression-elements-viseo'),
	              'end_size'  => 1,
	              'mid_size'  => 2,
	              'type'      => 'list'
	          )
	      );
			}
			?>
		<?php endif; ?>

		<?php if ( $settings['progression_elements_post_list_pagination'] == 'load-more' ) : ?>
			
			<?php $page_tot = ceil(($blogloop->found_posts - $offset) / $post_per_page); if ( $page_tot > 1 ) : ?>
				<div id="progression-load-more-manual">
				<div id="infinite-nav-pro-<?php echo esc_attr($this->get_id()); ?>" class="infinite-nav-pro"><div class="nav-previous"><?php next_posts_link( $settings['progression_main_post_load_more']
. '<span><i class="fa ' . $settings['section_styles_load_more_icon'] . '"></i></span>', $blogloop->max_num_pages ); ?></div></div>
				</div>
			<?php endif ?>
		<?php endif; ?>
	
		<?php if ( $settings['progression_elements_post_list_pagination'] == 'infinite-scroll' ) : ?>
			<?php $page_tot = ceil(($blogloop->found_posts - $offset) / $post_per_page); if ( $page_tot > 1 ) : ?><div id="infinite-nav-pro-<?php echo esc_attr($this->get_id()); ?>" class="infinite-nav-pro"><div class="nav-previous"><?php next_posts_link( 'Next', $blogloop->max_num_pages ); ?></div></div><?php endif ?>
		<?php endif; ?>
	
		
		
	</div><!-- close .progression-studios-post-list-main -->
	
	<script type="text/javascript"> 
	jQuery(document).ready(function($) {
		'use strict';
		/* Default Isotope Load Code */
		var $container<?php echo esc_attr($this->get_id()); ?> = $("#progression-blog-index-masonry-<?php echo esc_attr($this->get_id()); ?>").isotope();
		$container<?php echo esc_attr($this->get_id()); ?>.imagesLoaded( function() {
			$(".progression-masonry-item").addClass("opacity-progression");
			$container<?php echo esc_attr($this->get_id()); ?>.isotope({
				itemSelector: "#progression-blog-index-masonry-<?php echo esc_attr($this->get_id()); ?> .progression-masonry-item",				
				percentPosition: true,
				layoutMode: <?php if ( ! empty( $settings['progression_elements_posts_masonry'] ) ) : ?>"masonry"<?php else: ?>"fitRows" <?php endif; ?> 
	 		});
		});
		/* END Default Isotope Code */
		
		<?php if($settings['progression_elements_category_sorting_on'] == 'yes' || $settings['progression_elements_slider_sorting_on'] == 'yes'): ?>
		$('.progression-filter-group-<?php echo esc_attr($this->get_id()); ?>').on( 'click', 'li', function() {
		  var filterValue = $(this).attr('data-filter');
		  $container<?php echo esc_attr($this->get_id()); ?>.isotope({ filter: filterValue });
		});
		
    	  $('.progression-filter-group-<?php echo esc_attr($this->get_id()); ?>').each( function( i, buttonGroup ) {
    		var $buttonGroup = $( buttonGroup );
    		$buttonGroup.on( 'click', 'li', function() {
    		  $buttonGroup.find('.pro-checked').removeClass('pro-checked');
    		  $( this ).addClass('pro-checked');
    		});
    	  });
		<?php endif ?>
		
		
		<?php if ( $settings['progression_elements_post_list_pagination'] == 'infinite-scroll' || $settings['progression_elements_post_list_pagination'] == 'load-more' ) : ?>
		
		/* Begin Infinite Scroll */
		$container<?php echo esc_attr($this->get_id()); ?>.infinitescroll({
		errorCallback: function(){  $("#infinite-nav-pro-<?php echo esc_attr($this->get_id()); ?>").delay(500).fadeOut(500, function(){ $(this).remove(); }); },
		  navSelector  : "#infinite-nav-pro-<?php echo esc_attr($this->get_id()); ?>",  
		  nextSelector : "#infinite-nav-pro-<?php echo esc_attr($this->get_id()); ?> .nav-previous a", 
		  itemSelector : "#progression-blog-index-masonry-<?php echo esc_attr($this->get_id()); ?> .progression-masonry-item", 
	   		loading: {
	   		 	img: "<?php echo esc_url( get_template_directory_uri() );?>/images/loader.gif",
	   			 msgText: "",
	   		 	finishedMsg: "<div id='no-more-posts'><?php esc_html_e( "No more posts", "viseo-progression" ); ?></div>",
	   		 	speed: 0, }
		  },
		  // trigger Isotope as a callback
		  function( newElements ) {
			  
			  !function(a, b) {
			      function c() {
			          function a() {
			              "undefined" != typeof _wpmejsSettings && (c = b.extend(!0, {}, _wpmejsSettings)), c.success = c.success || function(a) {
			                  var b,
			                      c;
			                  "flash" === a.pluginType && (b = a.attributes.autoplay && "false" !== a.attributes.autoplay, c = a.attributes.loop && "false" !== a.attributes.loop, b && a.addEventListener("canplay", function() {
			                      a.play()
			                  }, !1), c && a.addEventListener("ended", function() {
			                      a.play()
			                  }, !1))
			              }, b(".wp-audio-shortcode, .wp-video-shortcode").not(".mejs-container").filter(function() {
			                  return !b(this).parent().hasClass(".mejs-mediaelement")
			              }).mediaelementplayer(c)
			          }
			          var c = {};
			          return {
			              initialize: a
			          }
			      }
			      a.wp = a.wp || {}, mejs.plugins.silverlight[0].types.push("video/x-ms-wmv"), mejs.plugins.silverlight[0].types.push("audio/x-ms-wma"), a.wp.mediaelement = new c, b(a.wp.mediaelement.initialize)
			  }(window, jQuery);


		     $(".progression-studios-gallery").flexslider({
		 		animation: "fade",      
		 		slideDirection: "horizontal", 
		 		slideshow: false,   
		 		smoothHeight: false,
		 		slideshowSpeed: 7000,  
		 		animationSpeed: 1000,        
		 		directionNav: true,             
		 		controlNav: true,
		 		prevText: "",   
		 		nextText: "",
		     });
			  
		    	$(".progression-studios-default-blog-overlay a[data-rel^=\'prettyPhoto\'], .progression-studios-feaured-image a[data-rel^=\'prettyPhoto\']").prettyPhoto({
		  			theme: "pp_default",
		    			hook: "data-rel",
		  			opacity: 0.7,
		    			show_title: false, 
		    			deeplinking: false,
		    			overlay_gallery: false,
		    			custom_markup: "",
		  			default_width: 1100,
		  			default_height: 619,
		    		social_tools:""
		    	});
				
				$(".progression-studios-default-blog-overlay, .progression-studios-default-blog-index").fitVids();

		    var $newElems = $( newElements );
 	
				$newElems.imagesLoaded(function(){
					
				$container<?php echo esc_attr($this->get_id()); ?>.isotope( "appended", $newElems );
				$(".progression-masonry-item").addClass("opacity-progression");
				
			});

		  }
		);
	    /* END Infinite Scroll */
		<?php endif; ?>
		
		
		<?php if ( $settings['progression_elements_post_list_pagination'] == 'load-more' ) : ?>
		/* PAUSE FOR LOAD MORE */
		$(window).unbind(".infscr");
		// Resume Infinite Scroll
		$("#infinite-nav-pro-<?php echo esc_attr($this->get_id()); ?> .nav-previous a").click(function(){
			$container<?php echo esc_attr($this->get_id()); ?>.infinitescroll("retrieve");
			return false;
		});
		/* End Infinite Scroll */
		<?php endif; ?>
		
	});
	</script>
	


	<?php wp_reset_postdata();?>
	

	<?php
	
	}

	protected function content_template() {
		
		?>

		<?php
	}
}


Plugin::instance()->widgets_manager->register_widget_type( new Widget_ProgressionElementsPostList() );
<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.


class Widget_ProgressionElementsCategoryList extends Widget_Base {

	public function get_name() {
		return 'progression-category-list';
	}

	public function get_title() {
		return esc_html__( 'Pro - Category List', 'progression-elements-viseo' );
	}

	public function get_icon() {
		return 'fa fa-folder-open-o progression-studios-viseo-pe';
	}

   public function get_categories() {
		return [ 'progression-studios-viseo' ];
	}
	
	
	function Widget_ProgressionElementsCategoryList($widget_instance){
		
	}
	
	protected function _register_controls() {

		
  		$this->start_controls_section(
  			'section_title_global_options',
  			[
  				'label' => esc_html__( 'Main Settings', 'progression-elements-viseo' )
  			]
  		);

		$this->add_responsive_control(
			'progression_main_cat_columns',
			[
  				'label' => esc_html__( 'Columns', 'progression-elements-viseo' ),
				'label_block' => true,
				'type' => Controls_Manager::SELECT,				
				'desktop_default' => '23%',
				'tablet_default' => '31.330%',
				'mobile_default' => '100%',
				'options' => [
					'100%' => esc_html__( '1 Column', 'progression-elements-viseo' ),
					'48%' => esc_html__( '2 Column', 'progression-elements-viseo' ),
					'31.330%' => esc_html__( '3 Columns', 'progression-elements-viseo' ),
					'23%' => esc_html__( '4 Columns', 'progression-elements-viseo' ),
					'18%' => esc_html__( '5 Columns', 'progression-elements-viseo' ),
					'14.6%' => esc_html__( '6 Columns', 'progression-elements-viseo' ),
				],
				'selectors' => [
					'{{WRAPPER}} ul.progression-studios-category-list li' => 'width: {{VALUE}};',
				],
				'render_type' => 'template'
			]
		);
		
		
		$this->add_control(
			'progression_main_cat_count',
			[
				'label' => esc_html__( 'Category Count', 'progression-elements-viseo' ),
				'type' => Controls_Manager::NUMBER,
				'default' => '30',
			]
		);
		
		
		$this->add_control(
			'progression_elements_post_count',
			[
				'label' => esc_html__( 'Display Post Count', 'progression-elements-viseo' ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		
		
		$this->add_control(
			'progression_elements_empty_category',
			[
				'label' => esc_html__( 'Display Empty Cats', 'progression-elements-viseo' ),
				'description' => esc_html__( 'Check to display categories with no posts', 'progression-elements-viseo' ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
			]
		);
		
		$this->add_control(
			'progression_elements_parent_category',
			[
				'label' => esc_html__( 'Display Child Cats', 'progression-elements-viseo' ),
				'description' => esc_html__( 'Check to display child categories', 'progression-elements-viseo' ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
			]
		);
		

		
		$this->add_control(
			'progression_elements_post_order',
			[
				'label' => esc_html__( 'Order', 'progression-elements-viseo' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'ASC',
				'options' => [
					'ASC' => esc_html__( 'Ascending', 'progression-elements-viseo' ),
					'DESC' => esc_html__( 'Descending', 'progression-elements-viseo' ),
				],
			]
		);
		
		
		$this->add_control(
			'progression_category_exclude',
			[
				'label' => esc_html__( 'Exclude Post Category by ID', 'progression-elements-viseo' ),
				'description' => esc_html__( 'Enter category id to exclude a specific category. Add-in multiple category ids seperated by a comma to exclude multiple categories. ', 'progression-elements-viseo' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
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
		
		
		
		
		$this->start_controls_tabs( 'boosted_elements_button_tabs' );

		$this->start_controls_tab( 'normal', [ 'label' => esc_html__( 'Normal', 'progression-elements-viseo' ) ] );

		$this->add_control(
			'boosted_elements_button_text_color',
			[
				'label' => esc_html__( 'Text Color', 'progression-elements-viseo' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} ul.progression-studios-category-list li a' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'boosted_elements_button_background_color',
			[
				'label' => esc_html__( 'Background Color', 'progression-elements-viseo' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} ul.progression-studios-category-list li a' => 'background-color: {{VALUE}};',
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
					'{{WRAPPER}} ul.progression-studios-category-list li a:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'boosted_elements_button_hover_background_color',
			[
				'label' => esc_html__( 'Background Color', 'progression-elements-viseo' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} ul.progression-studios-category-list li a:hover' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();
		
		$this->end_controls_tabs();
		
		
		
		
		$this->add_responsive_control(
			'progression_elements_content_padding',
			[
				'label' => esc_html__( 'Category Padding', 'progression-elements-viseo' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} ul.progression-studios-category-list li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'progression_elements_content_margin_bottom',
			[
				'label' => esc_html__( 'Category Margin', 'progression-elements-viseo' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} ul.progression-studios-category-list li a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'progression_elements_category_typography',
				'label' => esc_html__( 'Typography', 'progression-elements-viseo' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} ul.progression-studios-category-list li a',
			]
		);
		
		
		$this->end_controls_section();
		
		
	}
	

	protected function render( ) {
		
      $settings = $this->get_settings();
		
		
		if ( ! empty( $settings['progression_category_exclude'] ) ) {
		 	$catpostIds = $settings['progression_category_exclude']; // get custom field value
		     $catarrayIds = explode(',', $catpostIds); // explode value into an array of ids
		     if(count($catarrayIds) <= 1) // if array contains one element or less, there's spaces after comma's, or you only entered one id
		     {
		         if( strpos($catarrayIds[0], ',') !== false )// if the first array value has commas, there were spaces after ids entered
		         {
		             $catarrayIds = array(); // reset array
		             $catarrayIds = explode(', ', $catpostIds); // explode ids with space after comma's
		         }
		 	 }
	 	} else {
				$catarrayIds = '555555555555';					
	 	}
	
	
	
		
		if ( $settings['progression_elements_empty_category'] == 'yes' ) {
			$hide = 0;
		} else {
			$hide = 1;
		}
		
		if ( $settings['progression_elements_parent_category'] == 'yes' ) {
			$cat_args = array(
				'orderby' => 'name',
				 'order'         => $settings['progression_elements_post_order'],
				'number'            => $settings['progression_main_cat_count'], // count
				'exclude'           => $catarrayIds,
				'hide_empty' => $hide // hiding empty categories
			);
		} else {
			$cat_args = array(
				'orderby' => 'name',
				 'order'         => $settings['progression_elements_post_order'],
				'number'            => $settings['progression_main_cat_count'], // count
				'exclude'           => $catarrayIds,
				'parent' => 0,  // no depth
				'hide_empty' => $hide // hiding empty categories
			);
		}
		
		
		
		 $procategories = get_categories($cat_args);
	?>
	
	
	<ul class="progression-studios-category-list">
		
		<?php foreach ( $procategories as $category ) :  ?>
			<li><a href="<?php echo esc_url(get_category_link( $category->term_id )) ;?>"><?php echo esc_attr($category->cat_name);?><?php if($settings['progression_elements_post_count'] == 'yes' ): ?><span><?php echo esc_attr($category->count);?></span><?php endif ?></a></li>
		<?php endforeach; ?>
		
	</ul><!-- close .progression-studios-category-list -->
	<div class="clearfix-pro"></div>
	

	<?php
	
	}

	protected function content_template() {
		
		?>

		<?php
	}
}


Plugin::instance()->widgets_manager->register_widget_type( new Widget_ProgressionElementsCategoryList() );
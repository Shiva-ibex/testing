<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.


class Widget_BoostedElementsImageGrid extends Widget_Base {

	public function get_name() {
		return 'boosted-elements-image-grid';
	}

	public function get_title() {
		return esc_html__( 'Image Grid - Boosted', 'boosted-elements-progression' );
	}

	public function get_icon() {
		return 'fa fa-th boosted-elements-progression-icon';
	}

   public function get_categories() {
		return [ 'boosted-elements-progression' ];
	}

	protected function _register_controls() {

		
  		$this->start_controls_section(
  			'section_title_boosted_global_options',
  			[
  				'label' => esc_html__( 'Image Grid Options', 'boosted-elements-progression' )
  			]
  		);
		
		$this->add_control(
			'boosted_elements_image_gallery',
			[
				'label' => esc_html__( 'Images', 'boosted-elements-progression' ),
				'type' => Controls_Manager::GALLERY,
			]
		);
		
		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name' => 'thumbnail',
			]
		);
		
	
		
		$this->add_responsive_control(
			'boosted_elements_image_grid_column_count',
			[
  				'label' => esc_html__( 'Columns', 'boosted-elements-progression' ),
				'label_block' => true,
				'type' => Controls_Manager::SELECT,				
				'desktop_default' => '33.330%',
				'tablet_default' => '50%',
				'mobile_default' => '100%',
				'options' => [
					'100%' => esc_html__( '1 Column', 'boosted-elements-progression' ),
					'50%' => esc_html__( '2 Column', 'boosted-elements-progression' ),
					'33.330%' => esc_html__( '3 Columns', 'boosted-elements-progression' ),
					'25%' => esc_html__( '4 Columns', 'boosted-elements-progression' ),
					'20%' => esc_html__( '5 Columns', 'boosted-elements-progression' ),
					'16.67%' => esc_html__( '6 Columns', 'boosted-elements-progression' ),
				],
				'selectors' => [
					'{{WRAPPER}} .boosted-elements-progression-masonry-column' => 'width: {{VALUE}};',
				],
				'render_type' => 'template'
			]
		);
		
		
  		$this->add_responsive_control(
  			'boosted_elements_image_grid_margin',
  			[
  				'label' => esc_html__( 'Margin', 'boosted-elements-progression' ),
  				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 10,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .boosted-elements-masonry-margins' => 'margin-top:-{{SIZE}}px; margin-left:-{{SIZE}}px; margin-right:-{{SIZE}}px;',
					'{{WRAPPER}} .boosted-elements-progression-image-masonry-padding' => 'padding: {{SIZE}}px;',
				],
				'render_type' => 'template'
  			]
  		);

		
		$this->add_control(
			'boosted_elements_image_grid_lightbox',
			[
				'label' => esc_html__( 'Open Images in Lightbox', 'boosted-elements-progression' ),
				'type' => Controls_Manager::SWITCHER,
			]
		);
		
		$this->add_control(
			'boosted_elements_gallery_captions',
			[
				'label' => esc_html__( 'Image Captions', 'boosted-elements-progression' ),
				'type' => Controls_Manager::SWITCHER,
			]
		);
		
		
  		$this->end_controls_section();
		
		
		$this->start_controls_section(
			'section_boosted_elements_title_style',
			[
				'label' => esc_html__( 'Caption Styles', 'boosted-elements-progression' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);
		
		$this->add_control(
			'styles_boosted_elements_title_color',
			[
				'label' => esc_html__( 'Caption Color', 'boosted-elements-progression' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .progression-studios-grid-caption' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'styles_boosted_elements_background_content_color',
			[
				'label' => esc_html__( 'Caption Background', 'boosted-elements-progression' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .progression-studios-grid-caption' => 'background: {{VALUE}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'boosted_elements_caption_main_padding',
			[
				'label' => esc_html__( 'Caption Padding', 'boosted-elements-progression' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .progression-studios-grid-caption' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
             'name' => 'typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .progression-studios-grid-caption',
			]
		);
		
		$this->add_control(
			'boosted_elements_caption_alignment',
			[
				'label' => esc_html__( 'Alignment', 'boosted-elements-progression' ),
				'type' => Controls_Manager::CHOOSE,
				'label_block' => false,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'elementor-pro' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'elementor-pro' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'elementor-pro' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'left',
				'selectors' => [
					'{{WRAPPER}} .progression-studios-grid-caption' => 'text-align: {{VALUE}}',
				],
			]
		);

       $this->end_controls_section();
		 
		
 		$this->start_controls_section(
 			'section_boosted_elements_image_styles',
 			[
 				'label' => esc_html__( 'Image Styles', 'boosted-elements-progression' ),
 				'tab' => Controls_Manager::TAB_STYLE
 			]
 		);
		
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'boosted_elements_image_border_main',
				'label' => esc_html__( 'Border', 'boosted-elements-progression' ),
				'selector' => '{{WRAPPER}} img.boosted-elements-progression-image',
			]
		);

		$this->add_control(
			'boosted_elements_image_main_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'boosted-elements-progression' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} img.boosted-elements-progression-image' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
				],
			]
		);
		
		$this->add_control(
			'boosted_elements_imagealignment',
			[
				'label' => esc_html__( 'Alignment', 'boosted-elements-progression' ),
				'type' => Controls_Manager::CHOOSE,
				'label_block' => false,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'elementor-pro' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'elementor-pro' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'elementor-pro' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .boosted-elements-progression-image-grid-container' => 'text-align: {{VALUE}}',
				],
			]
		);
		
		$this->end_controls_section();

	}
	

	protected function render( ) {
		
      $settings = $this->get_settings();
		
		if ( empty( $settings['boosted_elements_image_gallery'] ) ) {
			return;
		}

	?>


	<div class="boosted-elements-progression-image-grid-container">
		<div class="boosted-elements-masonry-margins">
			<div class="boosted-elements-grid-masonry<?php echo esc_attr($this->get_id()); ?>">
				
				<?php  $pro_images_gallery = $this->get_settings( 'boosted_elements_image_gallery' ); foreach ( $pro_images_gallery as $image ) : ?>
		
					<div class="boosted-elements-progression-masonry-item boosted-elements-progression-masonry-column">
						<div class="boosted-elements-progression-image-masonry-padding">
							<div class="boosted-elements-progression-isotope-animation">
								<?php $image_lightbox = wp_get_attachment_image_src($image['id'], 'large'); ?>
								<?php  $image_url = Group_Control_Image_Size::get_attachment_image_src( $image['id'], 'thumbnail', $settings ); ?>
								
								
								<?php if ( ! empty( $settings['boosted_elements_image_grid_lightbox'] ) ) : ?>
								<a href="<?php echo esc_attr($image_lightbox[0]);?>" class="boosted-elements-lightbox-js" data-rel="prettyPhoto[boosted-elements-gallery-<?php echo esc_attr($this->get_id()); ?>]" <?php if ( ! empty( $settings['boosted_elements_gallery_captions'] ) ) : ?><?php $get_description = get_post($image['id'])->post_excerpt; if(!empty($get_description)){  echo 'title="' . esc_attr($get_description) . '"'; }  ?><?php endif; ?>>
								<?php endif; ?>

								<img src="<?php echo esc_attr($image_url);?>" alt="<?php echo esc_html__( 'Grid', 'boosted-elements-progression' ) ?>" class="boosted-elements-progression-image">

								<?php if ( ! empty( $settings['boosted_elements_image_grid_lightbox'] ) ) : ?></a><?php endif; ?>
									
									<?php if ( ! empty( $settings['boosted_elements_gallery_captions'] ) ) : ?>
									<?php $get_description = get_post($image['id'])->post_excerpt; if(!empty($get_description)){ 
										echo '<div class="progression-studios-grid-caption">' . esc_attr($get_description) . '</div>'; } 
									?>
									<?php endif; ?>
								
							</div><!-- close .boosted-elements-progression-isotope-animation -->
						</div><!-- close .boosted-elements-progression-image-masonry-padding -->
					</div><!-- close .boosted-elements-progression-masonry-item progression-masonry-col -->

		<?php endforeach; ?>
		</div><!-- close .boosted-elements-grid-masonry<?php echo esc_attr($this->get_id()); ?>  -->
		</div><!-- close .boosted-elements-masonry-margins-->
	
	</div><!-- close .boosted-elements-progression-image-grid-container -->
	
	<script type="text/javascript">
	jQuery(document).ready(function($) { 'use strict';	
		/* Default Isotope Load Code */
		var $container = $('.boosted-elements-grid-masonry<?php echo esc_attr($this->get_id()); ?>').isotope();
		$container.imagesLoaded( function() {
			
			$(".boosted-elements-progression-masonry-item").addClass("boosted-elements-isotope-animation-start");
			
			$container.isotope({
				itemSelector: '.boosted-elements-progression-masonry-item',				
				percentPosition: true
	 		});
		});
		/* END Default Isotope Code */
	});
	</script>
	
	<div class="clearfix-boosted-elements"></div>
	
	<?php
	
	}

	protected function content_template() {
		
		?>

		<?php
	}
}


Plugin::instance()->widgets_manager->register_widget_type( new Widget_BoostedElementsImageGrid() );
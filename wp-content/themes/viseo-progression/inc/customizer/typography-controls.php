<?php
/**
 * progression Theme Customizer
 *
 * @package progression
 */

function progression_studios_add_tab_to_panel( $tabs ) {
	
   $tabs['progression-studios-navigation-font'] = array(
       'name'        => 'progression-studios-navigation-font',
       'panel'       => 'progression_studios_header_panel',
       'title'       => esc_html__('Navigation', 'viseo-progression'),
       'description' => '',
       'sections'    => array(),
   );
	
   $tabs['progression-studios-sub-navigation-font'] = array(
       'name'        => 'progression-studios-sub-navigation-font',
       'panel'       => 'progression_studios_header_panel',
       'title'       => esc_html__('Sub-Navigation', 'viseo-progression'),
       'description' => '',
       'sections'    => array(),
   );
	
	
   $tabs['progression-studios-top-header-font'] = array(
       'name'        => 'progression-studios-top-header-font',
       'panel'       => 'progression_studios_header_panel',
       'title'       => esc_html__('Top Header Options', 'viseo-progression'),
       'description' => '',
       'sections'    => array(),
   );
	
	
   $tabs['progression-studios-body-font'] = array(
       'name'        => 'progression-studios-body-font',
       'panel'       => 'progression_studios_body_panel',
       'title'       => esc_html__('Body Main', 'viseo-progression'),
       'description' => '',
       'sections'    => array(),
   );
	
	
   $tabs['progression-studios-page-title'] = array(
       'name'        => 'progression-studios-page-title',
       'panel'       => 'progression_studios_body_panel',
       'title'       => esc_html__('Page Title', 'viseo-progression'),
       'description' => '',
       'sections'    => array(),
   );
	
   $tabs['progression-studios-widgets-font'] = array(
       'name'        => 'progression-studios-widgets-font',
       'panel'       => 'progression_studios_footer_panel',
       'title'       => esc_html__('Footer Main', 'viseo-progression'),
       'description' => '',
       'sections'    => array(),
   );
	
   $tabs['progression-studios-copyright-font'] = array(
       'name'        => 'progression-studios-copyright-font',
       'panel'       => 'progression_studios_footer_panel',
       'title'       => esc_html__('Copyright Text', 'viseo-progression'),
       'description' => '',
       'sections'    => array(),
   );
	

   $tabs['progression-studios-footer-nav-font'] = array(
       'name'        => 'progression-studios-footer-nav-font',
       'panel'       => 'progression_studios_footer_panel',
       'title'       => esc_html__('Footer Navigation', 'viseo-progression'),
       'description' => '',
       'sections'    => array(),
   );
	
	
	
	
   $tabs['progression-studios-default-headings'] = array(
       'name'        => 'progression-studios-default-headings',
       'panel'       => 'progression_studios_body_panel',
       'title'       => esc_html__('H1-H6 Headings', 'viseo-progression'),
       'description' => '',
       'sections'    => array(),
   );
	
	
  
	
   $tabs['progression-studios-sidebar-headings'] = array(
       'name'        => 'progression-studios-sidebar-headings',
       'panel'       => 'progression_studios_body_panel',
       'title'       => esc_html__('Sidebar Options', 'viseo-progression'),
       'description' => '',
       'sections'    => array(),
   );
	
   $tabs['progression-studios-button-typography'] = array(
       'name'        => 'progression-studios-button-typography',
       'panel'       => 'progression_studios_body_panel',
       'title'       => esc_html__('Button Styles', 'viseo-progression'),
       'description' => '',
       'sections'    => array(),
   );
	


	
   $tabs['progression-studios-blog-headings'] = array(
       'name'        => 'progression-studios-blog-headings',
       'panel'       => 'progression_studios_blog_panel',
       'title'       => esc_html__('Blog Archive Styles', 'viseo-progression'),
       'description' => '',
       'sections'    => array(),
   );
	
   $tabs['progression-studios-blog-post-options'] = array(
       'name'        => 'progression-studios-blog-post-options',
       'panel'       => 'progression_studios_blog_panel',
       'title'       => esc_html__('Blog Post Options', 'viseo-progression'),
       'description' => '',
       'sections'    => array(),
   );
	
   $tabs['progression-studios-blog-post-styles'] = array(
       'name'        => 'progression-studios-blog-post-styles',
       'panel'       => 'progression_studios_blog_panel',
       'title'       => esc_html__('Blog Post Styles', 'viseo-progression'),
       'description' => '',
       'sections'    => array(),
   );
	
	
   $tabs['progression-studios-shop-headings'] = array(
       'name'        => 'progression-studios-shop-headings',
       'panel'       => 'progression_studios_shop_panel',
       'title'       => esc_html__('Shop Typography', 'viseo-progression'),
       'description' => '',
       'sections'    => array(),
   );

	
    // Return the tabs.
    return $tabs;
}
add_filter( 'tt_font_get_settings_page_tabs', 'progression_studios_add_tab_to_panel' );

/**
 * How to add a font control to your tab
 *
 * @see  parse_font_control_array() - in class EGF_Register_Options
 *       in includes/class-egf-register-options.php to see the full
 *       properties you can add for each font control.
 *
 *
 * @param   array $controls - Existing Controls.
 * @return  array $controls - Controls with controls added/removed.
 *
 * @since 1.0
 * @version 1.0
 *
 */
function progression_studios_add_control_to_tab( $controls ) {

    /**
     * 1. Removing default styles because we add-in our own
     */
    unset( $controls['tt_default_body'] );
    unset( $controls['tt_default_heading_1'] );
    unset( $controls['tt_default_heading_2'] );
    unset( $controls['tt_default_heading_3'] );
    unset( $controls['tt_default_heading_4'] );
    unset( $controls['tt_default_heading_5'] );
    unset( $controls['tt_default_heading_6'] );
	 
	 
    /**
     * 2. Now custom examples that are theme specific
     */
	 
	 
	 
    $controls['progression_studios_body_font_family'] = array(
        'name'       => 'progression_studios_body_font_family',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Body Font', 'viseo-progression'),
        'tab'        => 'progression-studios-body-font',
        'properties' => array( 'selector'   => 'body,  body input, body textarea, select' ),
 		 'default' => array(
 			'subset'                     => 'latin',
 			'font_id'                    => 'arimo',
 			'font_name'                  => 'Arimo',
 			'font_weight_style'          => 'regular',
 			'font_color'                 => '#555555',
 		),
    );
	 
    $controls['progression_studios_top_header_default'] = array(
        'name'       => 'progression_studios_top_header_default',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Top Header Font', 'viseo-progression'),
        'tab'        => 'progression-studios-top-header-font',
        'properties' => array( 'selector'   => '#viseo-progression-header-top' ),
 		 'default' => array(
 			'subset'                     => 'latin',
 		),
    );
	 
	 
    $controls['progression_studios_nav_font_family'] = array(
        'name'       => 'progression_studios_nav_font_family',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Navigation Font Family', 'viseo-progression'),
        'tab'        => 'progression-studios-navigation-font',
        'properties' => array( 'selector'   => 'nav#site-navigation, nav#progression-studios-right-navigation' ),
 		 'default' => array(
 			'subset'                     => 'latin',
 			'font_id'                    => 'fira_sans_condensed',
 			'font_name'                  => 'Fira Sans Condensed',
 			'font_weight_style'          => '400',
 		),
    );
	 
	 
    $controls['progression_studios_sub_nav_font_family'] = array(
        'name'       => 'progression_studios_sub_nav_font_family',
 	'type'        => 'font',
        'title'      =>  esc_html__('Sub-Navigation Font Family', 'viseo-progression'),
        'tab'        => 'progression-studios-sub-navigation-font',
        'properties' => array( 'selector'   => '.sf-menu ul, #main-nav-mobile' ),
 	'default' => array(
 			'subset'                     => 'latin',
 		),
    );
	 
	 
    $controls['progression_studios_sub_nav_megamenu'] = array(
        'name'       => 'progression_studios_sub_nav_megamenu',
 	'type'        => 'font',
        'title'      =>  esc_html__('Mega Menu Heading', 'viseo-progression'),
        'tab'        => 'progression-studios-sub-navigation-font',
        'properties' => array( 'selector'   => 'ul.mobile-menu-pro .sf-mega h2.mega-menu-heading a, ul.mobile-menu-pro .sf-mega h2.mega-menu-heading, .sf-mega h2.mega-menu-heading, body #progression-sticky-header header .sf-mega h2.mega-menu-heading a, body header .sf-mega h2.mega-menu-heading a' ),
 	'default' => array(
 			'subset'                     => 'latin',
 			'font_color'                 => '#ffffff',
 		),
    );
	 
	 
    $controls['progression_studios_page_title_font_family'] = array(
        'name'       => 'progression_studios_page_title_font_family',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Page Title Font', 'viseo-progression'),
        'tab'        => 'progression-studios-page-title',
        'properties' => array( 'selector'   => '#page-title-pro h1' ),
 		 'default' => array(
 			'subset'                     => 'latin',
 		),
    );
	 
	 
    $controls['progression_studios_page_sub_title_font_family'] = array(
        'name'       => 'progression_studios_page_sub_title_font_family',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Page Sub-Title Font', 'viseo-progression'),
        'tab'        => 'progression-studios-page-title',
        'properties' => array( 'selector'   => '#page-title-pro h4' ),
 		 'default' => array(
 			'subset'                     => 'latin',
 		),
    );
	 
	 
	 
    $controls['progression_studios_heading_h1'] = array(
        'name'       => 'progression_studios_heading_h1',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Heading 1', 'viseo-progression'),
        'tab'        => 'progression-studios-default-headings',
        'properties' => array( 'selector'   => 'h1' ),
 		 'default' => array(
 	 			'subset'                     => 'latin',
 	 			'text_decoration'            => 'none',
 			),
    );
	
    $controls['progression_studios_heading_h2'] = array(
        'name'       => 'progression_studios_heading_h2',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Heading 2', 'viseo-progression'),
        'tab'        => 'progression-studios-default-headings',
        'properties' => array( 'selector'   => 'h2' ),
 		 'default' => array(
 	 			'subset'                     => 'latin',
 	 			'text_decoration'            => 'none',
 			),
    );
	
    $controls['progression_studios_heading_h3'] = array(
        'name'       => 'progression_studios_heading_h3',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Heading 3', 'viseo-progression'),
        'tab'        => 'progression-studios-default-headings',
        'properties' => array( 'selector'   => 'h3' ),
 		 'default' => array(
 	 			'subset'                     => 'latin',
 	 			'text_decoration'            => 'none',
 			),
    );
	
    $controls['progression_studios_heading_h4'] = array(
        'name'       => 'progression_studios_heading_h4',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Heading 4', 'viseo-progression'),
        'tab'        => 'progression-studios-default-headings',
        'properties' => array( 'selector'   => 'h4' ),
 		 'default' => array(
 	 			'subset'                     => 'latin',
 	 			'text_decoration'            => 'none',
 			),
    );
	 
    $controls['progression_studios_heading_h5'] = array(
        'name'       => 'progression_studios_heading_h5',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Heading 5', 'viseo-progression'),
        'tab'        => 'progression-studios-default-headings',
        'properties' => array( 'selector'   => 'h5' ),
 		 'default' => array(
 	 			'subset'                     => 'latin',
 	 			'text_decoration'            => 'none',
 			),
    );
	 
    $controls['progression_studios_heading_h6'] = array(
        'name'       => 'progression_studios_heading_h6',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Heading 6', 'viseo-progression'),
        'tab'        => 'progression-studios-default-headings',
        'properties' => array( 'selector'   => 'h6' ),
 		 'default' => array(
 	 			'subset'                     => 'latin',
 	 			'text_decoration'            => 'none',
 			),
    );
	 
	 
	 
    $controls['progression_studios_widget_font_family'] = array(
        'name'       => 'progression_studios_widget_font_family',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Footer Main Font', 'viseo-progression'),
        'tab'        => 'progression-studios-widgets-font',
        'properties' => array( 'selector'   => 'footer#site-footer' ),
 		 'default' => array(
 			'subset'                     => 'latin',
 		),
    );
	 
    $controls['progression_studios_widget_font_link'] = array(
        'name'       => 'progression_studios_widget_font_link',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Footer Link', 'viseo-progression'),
        'tab'        => 'progression-studios-widgets-font',
        'properties' => array( 'selector'   => 'footer#site-footer a' ),
 		 'default' => array(
 			'subset'                     => 'latin',
 		),
    );
	 
	 
    $controls['progression_studios_widget_font_link_hover'] = array(
        'name'       => 'progression_studios_widget_font_link_hover',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Footer Link Hover', 'viseo-progression'),
        'tab'        => 'progression-studios-widgets-font',
        'properties' => array( 'selector'   => 'footer#site-footer a:hover' ),
 		 'default' => array(
 			'subset'                     => 'latin',
 		),
    );
	 
	 
    $controls['progression_studios_copyright_font_family'] = array(
        'name'       => 'progression_studios_copyright_font_family',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Copyright Font', 'viseo-progression'),
        'tab'        => 'progression-studios-copyright-font',
        'properties' => array( 'selector'   => '#copyright-text' ),
 		 'default' => array(
 			'subset'                     => 'latin',
 		),
    );
	 
	 
    $controls['progression_studios_footer_nav_link'] = array(
        'name'       => 'progression_studios_footer_nav_link',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Footer Navigation', 'viseo-progression'),
        'tab'        => 'progression-studios-footer-nav-font',
        'properties' => array( 'selector'   => 'footer#site-footer #progression-studios-copyright ul.progression-studios-footer-nav-container-class a, footer#site-footer ul.progression-studios-footer-nav-container-class a' ),
 		 'default' => array(
 			'subset'                     => 'latin',
 		),
    );
	 
    $controls['progression_studios_footer_nav_link_hover'] = array(
        'name'       => 'progression_studios_footer_nav_link_hover',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Footer Navigation Hover', 'viseo-progression'),
        'tab'        => 'progression-studios-footer-nav-font',
        'properties' => array( 'selector'   => 'footer#site-footer #progression-studios-copyright ul.progression-studios-footer-nav-container-class li.current-menu-item a, footer#site-footer  #progression-studios-copyright ul.progression-studios-footer-nav-container-class a:hover, footer#site-footer ul.progression-studios-footer-nav-container-class li.current-menu-item a, footer#site-footer ul.progression-studios-footer-nav-container-class a:hover' ),
 		 'default' => array(
 			'subset'                     => 'latin',
 		),
    );
	 
	 
    $controls['progression_studios_widget_font_heading'] = array(
        'name'       => 'progression_studios_widget_font_heading',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Footer Widget Heading', 'viseo-progression'),
        'tab'        => 'progression-studios-widgets-font',
        'properties' => array( 'selector'   => 'footer#site-footer h4.widget-title' ),
 		 'default' => array(
 			'subset'                     => 'latin',
 		),
    );
	 

	 
    $controls['progression_studios_button_font_family'] = array(
        'name'       => 'progression_studios_button_font_family',
 	'type'        => 'font',
        'title'      =>  esc_html__('Button Font Family', 'viseo-progression'),
        'tab'        => 'progression-studios-button-typography',
        'properties' => array( 'selector'   => '#boxed-layout-pro .woocommerce-checkout-payment input.button, #boxed-layout-pro button.button, #boxed-layout-pro a.button, #infinite-nav-pro a, .post-password-form input[type=submit], #respond input#submit, .wpcf7-form input.wpcf7-submit' ),
 	'default' => array(
		'subset'                     => 'latin',
		'text_decoration'            => 'none',
 		),
    );
	 
	 
    $controls['progression_studios_blog_category_font'] = array(
        'name'       => 'progression_studios_blog_category_font',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Category', 'viseo-progression'),
        'tab'        => 'progression-studios-blog-headings',
        'properties' => array( 'selector'   => '.overlay-blog-meta-category-list span, .blog-meta-category-list a, .blog-meta-category-list a:hover' ),
 		 'default' => array(
 			'subset'                     => 'latin',
 		),
    );
	 
	 
    $controls['progression_studios_blog_title_font'] = array(
        'name'       => 'progression_studios_blog_title_font',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Title', 'viseo-progression'),
        'tab'        => 'progression-studios-blog-headings',
        'properties' => array( 'selector'   => 'h2.overlay-progression-blog-title, h2.progression-blog-title' ),
 		 'default' => array(
 			'subset'                     => 'latin',
 		),
    );
	 
	 
    $controls['progression_studios_blog_byline_font'] = array(
        'name'       => 'progression_studios_blog_byline_font',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Byline and Date', 'viseo-progression'),
        'tab'        => 'progression-studios-blog-headings',
        'properties' => array( 'selector'   => '.progression-post-meta' ),
 		 'default' => array(
 			'subset'                     => 'latin',
 		),
    );
	 
    $controls['progression_studios_blog_byline_link_font'] = array(
        'name'       => 'progression_studios_blog_byline_link_font',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Byline Link', 'viseo-progression'),
        'tab'        => 'progression-studios-blog-headings',
        'properties' => array( 'selector'   => '.progression-post-meta a:hover, .progression-post-meta a' ),
 		 'default' => array(
 			'subset'                     => 'latin',
 		),
    );
	 
	 
	 
	 
    $controls['progression_studios_blog_post_category'] = array(
        'name'       => 'progression_studios_blog_post_category',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Post Category', 'viseo-progression'),
        'tab'        => 'progression-studios-blog-post-styles',
        'properties' => array( 'selector'   => '.single-blog-meta-category-list a, .single-blog-meta-category-list a:hover' ),
 		 'default' => array(
 			'subset'                     => 'latin',
 		),
    );
	 
    $controls['progression_studios_blog_post_title'] = array(
        'name'       => 'progression_studios_blog_post_title',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Post Title', 'viseo-progression'),
        'tab'        => 'progression-studios-blog-post-styles',
        'properties' => array( 'selector'   => 'h1.blog-page-title' ),
 		 'default' => array(
 			'subset'                     => 'latin',
 		),
    );
	 
    $controls['progression_studios_blog_post_meta'] = array(
        'name'       => 'progression_studios_blog_post_meta',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Post Meta', 'viseo-progression'),
        'tab'        => 'progression-studios-blog-post-styles',
        'properties' => array( 'selector'   => '.single-progression-post-meta, .single-progression-post-meta a, .single-progression-post-meta a:hover' ),
 		 'default' => array(
 			'subset'                     => 'latin',
 		),
    );
	 
	 
    $controls['progression_studios_blog_post_view_count'] = array(
        'name'       => 'progression_studios_blog_post_view_count',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Post View/Comment Count', 'viseo-progression'),
        'tab'        => 'progression-studios-blog-post-styles',
        'properties' => array( 'selector'   => '.blog-single-comments-viewcount, .blog-single-comments-viewcount a, .blog-single-comments-viewcount a:hover' ),
 		 'default' => array(
 			'subset'                     => 'latin',
 		),
    );
	 
	 
	 
    $controls['progression_studios_shop_index_heading'] = array(
        'name'       => 'progression_studios_shop_index_heading',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Shop Index Heading', 'viseo-progression'),
        'tab'        => 'progression-studios-shop-headings',
        'properties' => array( 'selector'   => 'ul.products li.product .progression-studios-shop-index-content h2.woocommerce-loop-product__title,  ul.products li.product .progression-studios-shop-index-content h2.woocommerce-loop-category__title' ),
 		 'default' => array(
 	 			'subset'                     => 'latin',
 	 			'text_decoration'            => 'none',
 			),
    );
 
 	
    $controls['progression_studios_shop_index_price'] = array(
        'name'       => 'progression_studios_shop_index_price',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Shop Index Price', 'viseo-progression'),
        'tab'        => 'progression-studios-shop-headings',
        'properties' => array( 'selector'   => 'ul.products li.product .progression-studios-shop-index-content span.price del span.woocommerce-Price-amount, ul.products li.product .progression-studios-shop-index-content span.price ins span.woocommerce-Price-amount, ul.products li.product .progression-studios-shop-index-content span.price span.woocommerce-Price-amount' ),
 		 'default' => array(
 	 			'subset'                     => 'latin',
 	 			'text_decoration'            => 'none',
 			),
    );
	 
    $controls['progression_studios_shop_post_heading'] = array(
        'name'       => 'progression_studios_shop_post_heading',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Shop Post Heading', 'viseo-progression'),
        'tab'        => 'progression-studios-shop-headings',
        'properties' => array( 'selector'   => '.woocommerce-shop-single h1' ),
 		 'default' => array(
 	 			'subset'                     => 'latin',
 	 			'text_decoration'            => 'none',
 			),
    );
	 
    $controls['progression_studios_shop_post_price'] = array(
        'name'       => 'progression_studios_shop_post_price',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Shop Post Price', 'viseo-progression'),
        'tab'        => 'progression-studios-shop-headings',
        'properties' => array( 'selector'   => '.woocommerce-shop-single p.price span.woocommerce-Price-amount' ),
 		 'default' => array(
 	 			'subset'                     => 'latin',
 	 			'text_decoration'            => 'none',
 			),
    );
	 
	 
	 
    $controls['progression_studios_sidebar_default'] = array(
        'name'       => 'progression_studios_sidebar_default',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Sidebar Default Text', 'viseo-progression'),
        'tab'        => 'progression-studios-sidebar-headings',
        'properties' => array( 'selector'   => '.sidebar' ),
 		 'default' => array(
 	 			'subset'                     => 'latin',
 	 			'text_decoration'            => 'none',
 			),
    );
	 
	 
    $controls['progression_studios_sidebar_heading'] = array(
        'name'       => 'progression_studios_sidebar_heading',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Sidebar Heading', 'viseo-progression'),
        'tab'        => 'progression-studios-sidebar-headings',
        'properties' => array( 'selector'   => '.sidebar h4.widget-title' ),
 		 'default' => array(
 	 			'subset'                     => 'latin',
 	 			'text_decoration'            => 'none',
 			),
    );
	 
    $controls['progression_studios_sidebar_link'] = array(
        'name'       => 'progression_studios_sidebar_link',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Sidebar Default Link', 'viseo-progression'),
        'tab'        => 'progression-studios-sidebar-headings',
        'properties' => array( 'selector'   => '.sidebar a' ),
 		 'default' => array(
 	 			'subset'                     => 'latin',
 	 			'text_decoration'            => 'none',
 			),
    );
	 
    $controls['progression_studios_sidebar_link_hover'] = array(
        'name'       => 'progression_studios_sidebar_link_hover',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Sidebar Link Hover', 'viseo-progression'),
        'tab'        => 'progression-studios-sidebar-headings',
        'properties' => array( 'selector'   => '.sidebar ul li.current-cat, .sidebar ul li.current-cat a, .sidebar a:hover' ),
 		 'default' => array(
 	 			'subset'                     => 'latin',
 	 			'text_decoration'            => 'none',
 			),
    );
	 
	 
	// Return the controls.
    return $controls;
}
add_filter( 'tt_font_get_option_parameters', 'progression_studios_add_control_to_tab' );
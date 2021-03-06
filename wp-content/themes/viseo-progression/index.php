<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package pro
 */

get_header(); ?>


	<?php if( get_option( 'page_for_posts' ) ) : $cover_page = get_page( get_option( 'page_for_posts' ) ); ?>
		
		<?php if(!get_post_meta($cover_page->ID, 'progression_studios_disable_page_title', true)): ?>
		<div id="page-title-pro">
			<div class="width-container-pro">
				<div id="progression-studios-page-title-container">
					<h1 class="page-title"><?php echo get_the_title($cover_page); ?></h1>
					<?php if(get_post_meta($cover_page->ID, 'progression_studios_sub_title', true)): ?><h4 class="progression-sub-title"><?php echo wp_kses( get_post_meta($cover_page->ID, 'progression_studios_sub_title', true) , true); ?></h4><?php endif; ?>
				</div><!-- #progression-studios-page-title-container -->
				<div class="clearfix-pro"></div>
			</div><!-- close .width-container-pro -->
		</div><!-- #page-title-pro -->
		<?php endif; ?>
		
	<?php else: ?>
		<div id="page-title-pro">
			<div class="width-container-pro">
				<div id="progression-studios-page-title-container">
					<h1 class="page-title"><?php esc_html_e( 'Latest News', 'viseo-progression' ); ?></h1>
				</div><!-- #progression-studios-page-title-container -->
				<div class="clearfix-pro"></div>
			</div><!-- close .width-container-pro -->
		</div><!-- #page-title-pro -->
	<?php endif; ?>
	

	
	<div id="content-pro" class="site-content">
		<div class="width-container-pro<?php if( get_option( 'page_for_posts' ) ) : $cover_page = get_page( get_option( 'page_for_posts' ) ); ?><?php if(get_post_meta($cover_page->ID, 'progression_studios_page_sidebar', true) == 'left-sidebar' ) : ?> left-sidebar-pro<?php endif; ?><?php endif; ?>">
				
				<?php if( get_option( 'page_for_posts' ) ) : $cover_page = get_page( get_option( 'page_for_posts' ) ); ?><?php if(get_post_meta($cover_page->ID, 'progression_studios_page_sidebar', true) == 'right-sidebar' || get_post_meta($cover_page->ID, 'progression_studios_page_sidebar', true) == 'left-sidebar' ) : ?><div id="main-container-pro"><?php endif; ?><?php endif; ?>
				
				
				<?php if ( have_posts() ) : ?>
					<div class="progression-studios-blog-index">
						
						<div class="progression-masonry-margins"  style="margin-top:-<?php echo esc_attr(get_theme_mod('progression_studios_blog_index_gap', '20')); ?>px; margin-left:-<?php echo esc_attr(get_theme_mod('progression_studios_blog_index_gap', '20')); ?>px; margin-right:-<?php echo esc_attr(get_theme_mod('progression_studios_blog_index_gap', '20')); ?>px;">
							<div class="progression-blog-index-masonry">
								<?php while ( have_posts() ) : the_post(); ?>
									<div class="progression-masonry-item progression-masonry-col-<?php echo esc_attr(get_theme_mod( 'progression_studios_blog_columns', '2')); ?>">
										<div class="progression-masonry-padding-blog" style="padding:<?php echo esc_attr(get_theme_mod('progression_studios_blog_index_gap', '20')); ?>px;">
											<div class="progression-studios-isotope-animation">
												<?php if (get_theme_mod( 'progression_studios_blog_index_layout', 'default') == 'default') : ?>
													<?php get_template_part( 'template-parts/content', get_post_format() ); ?>
												<?php else : ?>
													<?php get_template_part( 'template-parts/content', 'overlay' ); ?>
												<?php endif; ?>
											</div>
											
										</div>
									</div>
								<?php endwhile; ?>								
								</div><!-- close .progression-blog-index-masonry -->
							</div><!-- close .progression-masonry-margins -->
							
					</div><!-- close .progression-studios-blog-index -->
					<div class="clearfix-pro"></div>
					
					<?php if (get_theme_mod( 'progression_studios_blog_pagination', 'default' ) == 'default') : ?>
						<?php progression_studios_show_pagination_links_pro(); ?>
					<?php endif; ?>
				
					<?php if (get_theme_mod( 'progression_studios_blog_pagination') == 'load-more') : ?>
						<div id="progression-load-more-manual"><?php progression_studios_infinite_content_nav_pro( 'nav-below' ); ?></div>
					<?php endif; ?>
				
					<?php if (get_theme_mod( 'progression_studios_blog_pagination') == 'infinite-scroll') : ?>
						<?php progression_studios_infinite_content_nav_pro( 'nav-below' ); ?>
					<?php endif; ?>
					
					<div class="clearfix-pro"></div>
					
				<?php else : ?>
					
					<div class="progression-studios-blog-index">
						<?php get_template_part( 'template-parts/content', 'none' ); ?>
					</div><!-- close .progression-masonry-margins -->
					
				<?php endif; ?>
			
				
				<?php if( get_option( 'page_for_posts' ) ) : $cover_page = get_page( get_option( 'page_for_posts' ) ); ?><?php if(get_post_meta($cover_page->ID, 'progression_studios_page_sidebar', true) == 'right-sidebar' || get_post_meta($cover_page->ID, 'progression_studios_page_sidebar', true) == 'left-sidebar' ) : ?></div><!-- close #main-container-pro --><?php get_sidebar(); ?><?php endif; ?><?php endif; ?>
				
		<div class="clearfix-pro"></div>
		</div><!-- close .width-container-pro -->
	</div><!-- #content-pro -->
<?php get_footer(); ?>
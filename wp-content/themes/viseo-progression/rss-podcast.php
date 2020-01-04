<?php
/**
 * Template Name: Custom RSS Template - Episodes
 */
header('Content-Type: '.feed_content_type('rss-http').'; charset='.get_option('blog_charset'), true);
echo '<?xml version="1.0" encoding="'.get_option('blog_charset').'"?'.'>';
?>


<rss version="2.0"
	xmlns:content="http://purl.org/rss/1.0/modules/content/"
	xmlns:wfw="http://wellformedweb.org/CommentAPI/"
	xmlns:dc="http://purl.org/dc/elements/1.1/"
	xmlns:atom="http://www.w3.org/2005/Atom"
	xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
	xmlns:slash="http://purl.org/rss/1.0/modules/slash/"
	<?php if(function_exists( 'powerpress_content' )){} else {echo'xmlns:itunes="http://www.itunes.com/dtds/podcast-1.0.dtd" xmlns:googleplay="http://www.google.com/schemas/play-podcasts/1.0/play-podcasts.xsd"';}; ?>
	<?php do_action( 'rss2_ns' ); ?>
>

	<channel>
		<title><?php echo esc_attr(get_theme_mod( 'podcast_feed_title', 'Viseo Podcast Feed')); ?></title>
		<atom:link href="<?php esc_url( self_link() ); ?>" rel="self" type="application/rss+xml" />
		<link><?php esc_url( self_link() ); ?></link>
		<description><?php echo esc_attr(get_theme_mod( 'podcast_feed_description_pro', '')); ?></description>
		<lastBuildDate><?php echo esc_html( mysql2date( 'D, d M Y H:i:s +0000', get_lastpostmodified( 'GMT' ), false ) ); ?></lastBuildDate>
		<language><?php echo get_locale(); ?></language>
		<copyright><?php echo esc_attr(get_theme_mod( 'podcast_feed_copy', 'ProgressioinStudios')); ?></copyright>
		<itunes:subtitle><?php echo esc_attr(get_theme_mod( 'podcast_feed_subtitle', 'Viseo Premium Podcasting WordPress Theme')); ?></itunes:subtitle>
		<itunes:author><?php echo esc_attr(get_theme_mod( 'podcast_feed_author', 'ProgressionStudios')); ?></itunes:author>
		<googleplay:author><?php echo esc_attr(get_theme_mod( 'podcast_feed_author', 'ProgressionStudios')); ?></googleplay:author>
		<googleplay:email><?php echo esc_attr(get_theme_mod( 'podcast_feed_author_mail', '')); ?></googleplay:email>
		<itunes:summary><?php echo esc_attr(get_theme_mod( 'podcast_feed_summary', 'Viseo Premium Podcasting WordPress Theme')); ?></itunes:summary>
		<googleplay:description><?php echo esc_attr(get_theme_mod( 'podcast_feed_summary', 'Viseo Premium Podcasting WordPress Theme')); ?></googleplay:description>
		<itunes:explicit><?php if (get_theme_mod( 'progression_explicit_episode', 'No') == 'No') { echo 'clean'; } elseif (get_theme_mod( 'progression_explicit_episode', 'No') == 'Yes') { echo 'Yes'; }; ?></itunes:explicit>
		<googleplay:explicit><?php echo esc_attr(get_theme_mod( 'progression_explicit_episode', 'No')); ?></googleplay:explicit>
		<?php if ( get_theme_mod( 'progression_rss_img', '' ) != '' ) : ?>		
		<itunes:image href="<?php echo esc_url( get_theme_mod( 'progression_rss_img', '' ) ); ?>"></itunes:image>
		<googleplay:image href="<?php echo esc_url( get_theme_mod( 'progression_rss_img', '' ) ); ?>"></googleplay:image>
		<image>
			<url><?php echo esc_url( get_theme_mod( 'progression_rss_img', '' ) ); ?></url>
			<title><?php echo esc_attr(get_theme_mod( 'podcast_feed_author', 'Viseo Podcast Feed')); ?></title>
			<link><?php esc_url( self_link() ); ?></link>
		</image>	
		<?php endif;?>
		<itunes:owner>
			<itunes:name><?php echo esc_attr(get_theme_mod( 'podcast_feed_author', 'ProgressionStudios')); ?></itunes:name>
			<itunes:email><?php echo esc_attr(get_theme_mod( 'podcast_feed_author_mail', '')); ?></itunes:email>
		</itunes:owner>
		
		<?php if (get_theme_mod( 'pro_episode_rss_category', '' ) != '') : ?>
		<itunes:category text="<?php echo esc_attr( get_theme_mod( 'pro_episode_rss_category', '' ) ); ?>">
			<?php if (get_theme_mod( 'pro_episode_rss_sub_category', '' ) != '') : ?><itunes:category text="<?php echo esc_attr( get_theme_mod( 'pro_episode_rss_sub_category', '' ) ); ?>"> </itunes:category> <?php endif;?>
		</itunes:category>
		<?php endif;?>
		
		<?php if (get_theme_mod( 'pro_episode_rss_category2', '' ) != '') : ?>
		<itunes:category text="<?php echo esc_attr( get_theme_mod( 'pro_episode_rss_category2', '' ) ); ?>">
			<?php if (get_theme_mod( 'pro_episode_rss_sub_category2', '' ) != '') : ?><itunes:category text="<?php echo esc_attr( get_theme_mod( 'pro_episode_rss_sub_category2', '' ) ); ?>"> </itunes:category> <?php endif;?>
		</itunes:category>
		<?php endif;?>
	
		
		
		
	<?php 

		// Prevent WP core from outputting an <image> element
		remove_action( 'rss2_head', 'rss2_site_icon' );

		// Add RSS2 headers
		do_action( 'rss2_head' );	
		
		$args = array(
			'post_type' => 'post',
			'ignore_sticky_posts' => 1,
			'orderby'	=> 'date',
			'order'     => 'DESC',
			'posts_per_page' => 999999,
		);				
		$qry = new WP_Query( $args );

		if ( $qry->have_posts() ) {
			while ( $qry->have_posts()) {
				$qry->the_post();




		?>
		
		<?php if ( get_theme_mod( 'progression_episode_meta_fields_only', 'yes' ) == 'yes' ) : ?>
			<?php if (get_post_meta($post->ID, 'progression_studios_rss_sub_title', true) || get_post_meta($post->ID, 'progression_studios_short_description', true) || get_post_meta($post->ID, 'progression_studios_duration_int', true)  ) : ?>
				<item>
					<title><?php esc_html( the_title_rss() ); ?></title>
					<link><?php esc_url( the_permalink_rss() ); ?></link>
					<pubDate><?php echo esc_html( mysql2date( 'D, d M Y H:i:s +0000', get_post_time( 'Y-m-d H:i:s', true ), false ) ); ?></pubDate>
					<dc:creator><?php echo get_the_author(); ?></dc:creator>
					<guid isPermaLink="false"><?php esc_html( the_guid() ); ?></guid>
			
					<?php if (get_post_meta($post->ID, 'progression_studios_short_description', true) ) : ?><description><![CDATA[<?php echo esc_html(get_post_meta($post->ID, 'progression_studios_short_description', true)); ?>]]></description><?php endif;?>
					<?php if (get_post_meta($post->ID, 'progression_studios_rss_sub_title', true) ) : ?><itunes:subtitle><![CDATA[<?php echo esc_html(get_post_meta($post->ID, 'progression_studios_rss_sub_title', true)); ?>]]></itunes:subtitle><?php endif;?>
					<?php if (get_post_meta($post->ID, 'progression_studios_short_description', true) ) : ?><content:encoded><![CDATA[<?php echo esc_html(get_post_meta($post->ID, 'progression_studios_short_description', true)); ?>]]></content:encoded><?php endif;?>
					<?php if (get_post_meta($post->ID, 'progression_studios_short_description', true) ) : ?><itunes:summary><![CDATA[<?php echo esc_html(get_post_meta($post->ID, 'progression_studios_short_description', true)); ?>]]></itunes:summary><?php endif;?>
					<?php if (get_post_meta($post->ID, 'progression_studios_short_description', true) ) : ?><googleplay:description><![CDATA[<?php echo esc_html(get_post_meta($post->ID, 'progression_studios_short_description', true)); ?>]]></googleplay:description><?php endif;?>
			
		
					<?php if(has_post_thumbnail()): ?><?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large'); ?>
					<itunes:image href="<?php echo esc_url($image[0]);?>"></itunes:image>
					<googleplay:image href="<?php echo esc_url($image[0]);?>"></googleplay:image>
					<?php endif;?>
			
					<?php if (get_post_meta($post->ID, 'progression_studios_external_rss_file_link', true) ) : ?>
					<enclosure url="<?php echo esc_url(get_post_meta($post->ID, 'progression_studios_external_rss_file_link', true)); ?>" <?php if (get_post_meta($post->ID, 'progression_studios_filesize', true) ) : ?>length="<?php echo esc_html(get_post_meta($post->ID, 'progression_studios_filesize', true)); ?>"<?php endif;?> type="audio/mpeg"></enclosure>
						<?php else: ?>
							<?php if (get_post_meta($post->ID, 'progression_studios_video_post', true) ) : ?>
							<enclosure url="<?php echo esc_url(get_post_meta($post->ID, 'progression_studios_video_post', true)); ?>" <?php if (get_post_meta($post->ID, 'progression_studios_filesize', true) ) : ?>length="<?php echo esc_html(get_post_meta($post->ID, 'progression_studios_filesize', true)); ?>"<?php endif;?> type="audio/mpeg"></enclosure>
							<?php endif;?>
					<?php endif;?>

					<?php if (get_post_meta($post->ID, 'progression_studios_duration_int', true) ) : ?>
					<itunes:duration><?php echo esc_html(get_post_meta($post->ID, 'progression_studios_duration_int', true)); ?></itunes:duration>
					<?php endif;?>
			
					<itunes:author><?php echo get_the_author(); ?></itunes:author>
				</item>
			<?php endif;?>
		<?php else: ?>
			<item>
				<title><?php esc_html( the_title_rss() ); ?></title>
				<link><?php esc_url( the_permalink_rss() ); ?></link>
				<pubDate><?php echo esc_html( mysql2date( 'D, d M Y H:i:s +0000', get_post_time( 'Y-m-d H:i:s', true ), false ) ); ?></pubDate>
				<dc:creator><?php echo get_the_author(); ?></dc:creator>
				<guid isPermaLink="false"><?php esc_html( the_guid() ); ?></guid>
			
				<?php if (get_post_meta($post->ID, 'progression_studios_short_description', true) ) : ?><description><![CDATA[<?php echo esc_html(get_post_meta($post->ID, 'progression_studios_short_description', true)); ?>]]></description><?php endif;?>
				<?php if (get_post_meta($post->ID, 'progression_studios_rss_sub_title', true) ) : ?><itunes:subtitle><![CDATA[<?php echo esc_html(get_post_meta($post->ID, 'progression_studios_rss_sub_title', true)); ?>]]></itunes:subtitle><?php endif;?>
				<?php if (get_post_meta($post->ID, 'progression_studios_short_description', true) ) : ?><content:encoded><![CDATA[<?php echo esc_html(get_post_meta($post->ID, 'progression_studios_short_description', true)); ?>]]></content:encoded><?php endif;?>
				<?php if (get_post_meta($post->ID, 'progression_studios_short_description', true) ) : ?><itunes:summary><![CDATA[<?php echo esc_html(get_post_meta($post->ID, 'progression_studios_short_description', true)); ?>]]></itunes:summary><?php endif;?>
				<?php if (get_post_meta($post->ID, 'progression_studios_short_description', true) ) : ?><googleplay:description><![CDATA[<?php echo esc_html(get_post_meta($post->ID, 'progression_studios_short_description', true)); ?>]]></googleplay:description><?php endif;?>
			
		
				<?php if(has_post_thumbnail()): ?><?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large'); ?>
				<itunes:image href="<?php echo esc_url($image[0]);?>"></itunes:image>
				<googleplay:image href="<?php echo esc_url($image[0]);?>"></googleplay:image>
				<?php endif;?>
			
				<?php if (get_post_meta($post->ID, 'progression_studios_external_rss_file_link', true) ) : ?>
				<enclosure url="<?php echo esc_url(get_post_meta($post->ID, 'progression_studios_external_rss_file_link', true)); ?>" <?php if (get_post_meta($post->ID, 'progression_studios_filesize', true) ) : ?>length="<?php echo esc_html(get_post_meta($post->ID, 'progression_studios_filesize', true)); ?>"<?php endif;?> type="audio/mpeg"></enclosure>
					<?php else: ?>
						<?php if (get_post_meta($post->ID, 'progression_studios_video_post', true) ) : ?>
						<enclosure url="<?php echo esc_url(get_post_meta($post->ID, 'progression_studios_video_post', true)); ?>" <?php if (get_post_meta($post->ID, 'progression_studios_filesize', true) ) : ?>length="<?php echo esc_html(get_post_meta($post->ID, 'progression_studios_filesize', true)); ?>"<?php endif;?> type="audio/mpeg"></enclosure>
						<?php endif;?>
				<?php endif;?>

				<?php if (get_post_meta($post->ID, 'progression_studios_duration_int', true) ) : ?>
				<itunes:duration><?php echo esc_html(get_post_meta($post->ID, 'progression_studios_duration_int', true)); ?></itunes:duration>
				<?php endif;?>
			
				<itunes:author><?php echo get_the_author(); ?></itunes:author>
			</item>
		<?php endif;?>
<?php }
} ?>
	</channel>
</rss>
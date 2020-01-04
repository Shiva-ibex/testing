<?php


/* Front-end form shortcode */
/**
 *  Renders form to create a new property when user is logged-in. 
 *
 *  @return  string
 */
function progression_studios_new_video_post_form() {

	global $post;

	if ( ! is_user_logged_in() ) {

		
		$notify_text 	= wp_kses( __( 'Please <a href="%s">log in</a> or <a href="%s">register for a new account</a> in order to submit a post.' , 'progression-elements-viseo'), TRUE);
		$login_url 		= wp_login_url( apply_filters( 'the_permalink', get_permalink()));
		$register_url 	= wp_registration_url();
		
		$html = '<div class="progression-studios-notify"><i class="fa fa-lock"></i> ' . sprintf( $notify_text, $login_url, $register_url) . '</div>';
		return apply_filters( 'progression_studios_new_video_post_form_login_message', $html, $post );
	}
	$args = array(
		'post_id' 		=> 'new',
		'field_groups' 	=> array( 'group_552033a9a46bc' ),
		'return' 		=> '%post_url%',
		'submit_value' 	=> esc_html__( 'Save your post', 'progression-elements-viseo' ),
	);

	ob_start();
	
	echo "<div id='progression-studios-frontend-form'>";
	acf_form( apply_filters( 'avlar_acf_form_args', $args ) ); 
	echo "</div>";
	
	return ob_get_clean();
	
}
add_shortcode( 'video-front-end-form', 'progression_studios_new_video_post_form' );


add_action('after_setup_theme', 'progression_studios_remove_admin_bar');

function progression_studios_remove_admin_bar() {
	if (!current_user_can('administrator') && !is_admin()) {
	  show_admin_bar(false);
	}
}
<?php
function tml_edit_user_profile_update( $user_id ) {
     if ( current_user_can('edit_user',$user_id) ) {
           update_user_meta( $user_id, 'progression_user_sub_headline', $_POST['progression_user_sub_headline'] );

           update_user_meta( $user_id, 'progression_facebookurl', $_POST['progression_facebookurl'] );
			  
			  
			  update_user_meta( $user_id, 'progression_dribbbleurleurl', $_POST['progression_dribbbleurleurl'] );
			  
			  update_user_meta( $user_id, 'progression_pinteresturl', $_POST['progression_pinteresturl'] );
			  
			  update_user_meta( $user_id, 'progression_vimeourl', $_POST['progression_vimeourl'] );
			  
			  update_user_meta( $user_id, 'progression_soundcloudurl', $_POST['progression_soundcloudurl'] );
			
           update_user_meta( $user_id, 'progression_twitterurl', $_POST['progression_twitterurl'] );
			
           update_user_meta( $user_id, 'progression_googleplusurl', $_POST['progression_googleplusurl'] );
			
           update_user_meta( $user_id, 'progression_linkedinurl', $_POST['progression_linkedinurl'] );
			
           update_user_meta( $user_id, 'progression_houzzurl', $_POST['progression_houzzurl'] );
			
			
           update_user_meta( $user_id, 'progression_instagramurl', $_POST['progression_instagramurl'] );
			
           update_user_meta( $user_id, 'progression_youtubeurl', $_POST['progression_youtubeurl'] );
			
           update_user_meta( $user_id, 'progression_emailmailto', $_POST['progression_emailmailto'] );
			
			
     }
 }
add_action('personal_options_update', 'tml_edit_user_profile_update');
add_action('edit_user_profile_update', 'tml_edit_user_profile_update');





if (!class_exists('acf')) {
	return;
}

/**
 *  Define a custom file location to save ACF field groups. 
 *  Allows saving the field groups outside the database within version control. 
 *
 *  @param   string  $path
 *
 *  @return  string
 */
function progression_studios_acf_json_save_point( $path ) {
    
    // update path
    $path = get_stylesheet_directory() . '/inc/acf-json/';
    
    // return
    return $path;
    
}
add_filter( 'acf/settings/save_json', 'progression_studios_acf_json_save_point' );


/**
 *  Define a custom file location to save ACF field groups. 
 *  Allows saving the field groups outside the database within version control. 
 *
 *  @param   array  $paths
 *
 *  @return  array
 */
function progression_studios_acf_json_load_point( $paths ) {    	

    // remove original path (optional)
    unset($paths[0]);
    
    // append path
    $paths[] = get_stylesheet_directory() . '/inc/acf-json/';
    
    // return
    return $paths;

}
add_filter( 'acf/settings/load_json', 'progression_studios_acf_json_load_point' );


/**
 *  Calls acf_form_head() on pages that contain the [video-front-end-form] shortcode 
 *  before get_header() is been called.
 *
 *  @return  void
 */
function progression_studios_init_acf_form_head() {
	global $post;
	if ( is_a( $post, 'WP_Post' ) && has_shortcode( $post->post_content, 'video-front-end-form') ) {
		acf_form_head();
	}
	
	if ( is_a( $post, 'WP_Post' ) && has_shortcode( $post->post_content, 'theme-my-login') ) {
		acf_form_head();
	}
}
add_action( 'wp', 'progression_studios_init_acf_form_head' );



/**
 *  Runs after new post form has been sent. 
 *
 *  @param   int  $post_id
 *  @param   array  $form
 *
 *  @return  int
 */
function progression_studios_pre_save_post( $post_id, $form ) {
    
    // check if this is to be a new post
    if ( $post_id != 'new' ) {
        return $post_id;
    }

    // map field keys to existing local field names
    $input = array();
    $fields = acf_get_local_fields( current($form['field_groups']));
    
    if ( ! empty( $fields ) ) {
    	foreach ( $fields as $field ) {
	    	if ( array_key_exists( $field['key'], $_POST['acf'] ) ) {
	    		$input[$field['name']] = $_POST['acf'][$field['key']];
	    	}
	    }
    }

    // Create a new post
    $post = array(
        'post_status'  	=> current_user_can( 'publish_posts' ) ? 'publish' : 'private',
        'post_title'  	=> $input['post_title'],
        'post_content' 	=> $input['post_content'],
        'post_type'  	=> 'post'
    );

    // insert the post
    $post_id = wp_insert_post( apply_filters( 'progression_studios_new_post_args', $post ) ); 

    if ( ! is_wp_error( $post_id ) ) {

    	do_action( 'progression_studios_new_post', $post_id, $input );
		
		// add post thumbnail
		if ( ! empty( $input['post_thumbnail'] )) {
			update_post_meta( $post_id, '_thumbnail_id', $input['post_thumbnail'] );
			wp_update_post( array( 'ID' => $input['post_thumbnail'], 'post_parent' => $post_id ) );
		}

		if ( ! empty( $input['post_attachments'] ) ) {
			foreach ( $input['post_attachments'] as $attachment ) {
				wp_update_post( array( 'ID' => $attachment, 'post_parent' => $post_id ) );
			}
		}

		// update $_POST['return']
    	//$_POST['return'] = add_query_arg( array( 'post_id' => $post_id ), $_POST['return'] ); 
    } 

    // return the new ID
    return $post_id;
}
add_filter( 'acf/pre_save_post', 'progression_studios_pre_save_post', 10, 2 );


/**
 *  Notify admin of new property to be moderated
 *
 *  @param   int  $post_id
 *
 *  @return  bool
 */
function progression_studios_new_post_notify( $post_id ) {

	$post    = get_post( $post_id );
	$author  = get_userdata( $post->post_author );

	// No need to notify admin when post has already been published
	if ( 'publish' == $post->post_status ) {
		return false;
	}

	// Who to notify? By default, just the blog admin, but others can be added.
	$emails = apply_filters( 'progression_studios_new_post_notification_emails', array( get_option( 'admin_email' ) ), $post_id );
	$emails = array_filter( $emails );

	// If there are no addresses to send the email to, bail.
	if ( ! count( $emails ) ) {
		return false;
	}

	// The blogname option is escaped with esc_html on the way into the database in sanitize_option
	// we want to reverse this for the plain text arena of emails.
	$blogname = wp_specialchars_decode( get_option('blogname'), ENT_QUOTES );

	$notify_message  = esc_html__( 'A new post has been created by a user and is waiting to be published.', 'viseo-progression'  ) . "\r\n\r\n";
	
	$notify_message .= sprintf( esc_html__( 'Author : %1$s', 'viseo-progression' ), $author->display_name ) . "\r\n";
	$notify_message .= sprintf( esc_html__( 'E-mail : %s', 'viseo-progression' ), $author->user_email ) . "\r\n";
	$notify_message .= sprintf( esc_html__( 'Title : %s', 'viseo-progression' ), $post->post_title ) . "\r\n\r\n";

	$notify_message .= esc_html__( 'Edit the post: ', 'viseo-progression' ) . "\r\n";
	$notify_message .= get_edit_post_link( $post_id, 'email' ) . "\r\n\r\n";

	$notify_message .= sprintf( esc_html__( 'Permalink: %s', 'viseo-progression' ), get_permalink( $post_id ) ) . "\r\n";
	
	/* translators: 1: blog name, 2: post title */
	$subject = sprintf( esc_html__( '[%1$s] New Post: "%2$s"', 'viseo-progression' ), $blogname, $post->post_title );

	$wp_email = 'wordpress@' . preg_replace( '#^www\.#', '', strtolower( $_SERVER['SERVER_NAME'] ));

	if ( '' == $author->display_name ) {
		$from = "From: \"$blogname\" <$wp_email>";
		if ( '' != $author->user_email )
			$reply_to = "Reply-To: $author->user_email";
	} else {
		$from = "From: \"$author->display_name\" <$wp_email>";
		if ( '' != $author->user_email )
			$reply_to = "Reply-To: \"$author->user_email\" <$author->user_email>";
	}

	$message_headers = "$from\n"
		. "Content-Type: text/plain; charset=\"" . get_option( 'blog_charset' ) . "\"\n";

	if ( isset( $reply_to ) )
		$message_headers .= $reply_to . "\n";

	$notify_message = apply_filters( 'progression_studios_new_post_notification__text', $notify_message, $post_id );
	$subject = apply_filters( 'progression_studios_new_post_notification__subject', $subject, $post_id );
	$message_headers = apply_filters( 'progression_studios_new_post_notification__headers', $message_headers, $post_id );

	foreach ( $emails as $email ) {
		@wp_mail( $email, wp_specialchars_decode( $subject ), $notify_message, $message_headers );
	}

	return true;

}
add_action( 'progression_studios_new_post', 'progression_studios_new_post_notify' );





/**
 *  Overwrites location matching for property edit screen 
 * 
 *  @param  boolean $match 
 *  @param  array $rule
 *  @param  array $options
 * 
 *  @return boolean $match
 */
function progression_studios_rule_match_post_type( $match, $rule, $options ) {

	$post_type = $options['post_type'];
	
	// find post type for current post
	if( ! $post_type ) {
		if( ! $options['post_id'] ) {
			return false;
		}
		$post_type = get_post_type( $options['post_id'] );
	}

	if ( $post_type === 'post' && is_admin() ) {
		return false;
	}

	return $match;

}
add_filter( 'acf/location/rule_match/post_type', 'progression_studios_rule_match_post_type', 20, 3 );


/**
 *  Create a custom toolbar for the wysiwyg editor of the post form
 *
 *  @param   array  $toolbars
 *
 *  @return  array
 */
function progression_studios_toolbars( $toolbars ){

	$toolbars['Very simple' ] = array();
	$toolbars['Very simple' ][1] = array('bold', 'italic', 'bullist', 'numlist', 'fullscreen', 'pastetext', 'charmap', 'wp_help' );

	return $toolbars;
}
add_filter( 'acf/fields/wysiwyg/toolbars' , 'progression_studios_toolbars' );

/**
 * Filter on the current_user_can() function.
 * This function is used to explicitly allow authors to edit contributors and other
 * authors posts if they are published or pending.
 *
 * @param array $allcaps All the capabilities of the user
 * @param array $cap     [0] Required capability
 * @param array $args    [0] Requested capability
 *                       [1] User ID
 *                       [2] Associated object ID
 * @return array
 */
function progression_studios_give_permissions( $allcaps, $cap, $args ) {
	
	// Bail out if we're not asking about a post:
	if ( 'upload_files' != $args[0] )
		return $allcaps;

	// Let everyone upload from the media-form
	$allcaps[$cap[0]] = true;


	return $allcaps;
}
add_filter( 'user_has_cap', 'progression_studios_give_permissions', 0, 3 );









<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://metabox.io/docs/registering-meta-boxes/
 */
add_filter( 'rwmb_meta_boxes', 'epz_register_meta_boxes' );
/**
 * Register meta boxes
 *
 * Remember to change "your_prefix" to actual prefix in your project
 *
 * @param array $meta_boxes List of meta boxes
 *
 * @return array
 */
function epz_register_meta_boxes( $meta_boxes )
{
	/**
	 * prefix of meta keys (optional)
	 * Use underscore (_) at the beginning to make keys hidden
	 * Alt.: You also can make prefix empty to disable it
	 */
	// Better has an underscore as last sign
	$prefix = 'epz_';

	// metabox for link post format
	$meta_boxes[] = array(
		'id'			=> 'linkmetabox',
		'title'			=> __('Link Format Post Options', 'epz'),
		'post_types'	=> array('post', 'page'),
		'context'		=> 'normal',
		'priority'		=> 'high',
		'autosave'		=> true,
		'fields' 		=> array(
			// Link text box
			array(
				'name'	=> __('URL', 'epz'),
				'id'	=> "{$prefix}url",
				'desc'	=> __('Paste the URL here, the post title will be link title', 'epz'),
				'type'	=> 'text',

			)
		)
	);
	
	// metabox for audio post format
	$meta_boxes[] = array(
		'id' 			=> 'audiometabox',
		'title' 		=> __( 'Audio Format Post Options', 'epz' ),
		'post_types'	=> array('post', 'page'),
		'context'		=> 'normal',
		'priority' 		=> 'high',
		'autosave' 		=> true,
		'fields' 		=> array(
			array(
				'name' 		=> __( 'Audio Embed Code', 'epz' ),
				'id'		=> "{$prefix}audio_embed_code",
				'type' 		=> 'oembed',
				'size' 		=> 30,
				'class' 	=> 'field-embed',
				'desc'	=> __('Paste the embed code here.', 'epz')
			)
		)
	);
	
	/*
	// metabox for audio post format
	$meta_boxes[] = array(
		'id' 			=> 'audiometabox',
		'title' 		=> __( 'Audio Format Post Options', 'epz' ),
		'post_types' 	=> array( 'post', 'page' ),
		'context' 		=> 'normal',
		'priority' 		=> 'high',
		'autosave' 		=> true,
		'fields' 		=> array(
			
			array(
				'name' 		=> __( 'Audio Host Type', 'epz' ),
				'id' 		=> "{$prefix}audio_host_type",
				'type' 		=> 'radio',
				'options' 	=> array(
					'em-1' 	=> __( 'Embed Code', 'epz' ),
					'selfhosted' => __( 'Self Hosted', 'epz' ),
				),
				'std' 		=> 'em-1',
			),
			array(
				'name' 	=> __( 'Audio Embed Code', 'epz' ),
				'id' 	=> "{$prefix}audio_embed_code",
				'type' 	=> 'oembed',
				'desc'	=> __('Paste the embed code here. If you want to use self hosted, you may leave it blank and choose self hosted option above.', 'epz'),
				'class' 	=> 'field-embed'
			),
			array(
				'name' 	=> __( 'Upload Audio File', 'epz' ),
				'id' 	=> "{$prefix}shvideo",
				'type' 	=> 'file_advanced',
				'class'	=> 'field-sh',
				'desc'	=> __( 'Upload or select your self hosted Audio. If you want to use embed code. you may leave it blank and choose embed code option above.', 'epz' ),
				'mime_type' 	=> 'audio', // Leave blank for all file types
			)
		
		)
	); */

	
	// metabox for video post format
	$meta_boxes[] = array(
		'id'			=> 'videometabox',
		'title'			=> __('Video Format Post Options', 'epz'),
		'post_types'	=> array('post', 'page'),
		'context'		=> 'normal',
		'priority'		=> 'high',
		'autosave'		=> true,
		'fields' 		=> array(

			array(
				'name'	=> __( 'Video Host Type', 'epz' ),
				'id'	=> "{$prefix}video_host_type",
				'type'	=> 'radio',
				'options' => array(
					'embeded' => __( 'Embed Code', 'epz' ),
					'selfhosted' => __( 'Self Hosted', 'epz' ),
				),
				'std'	=> 'embeded',
			),
			array(
				'name'	=> __('Video Embed Code', 'epz'),
				'id'	=> "{$prefix}video_embed_code",
				'desc'	=> __('Paste the embed code here. If you want to use self hosted, you may leave it blank and choose self hosted option above.', 'epz'),
				'type'	=> 'textarea',
				'class' => 'field-embed'
			),
			array(
				'name'	=> __( 'Upload Video File', 'epz' ),
				'id'	=> "{$prefix}shvideo",
				'type'	=> 'file_advanced',
				'class' => 'field-sh',
				'desc'	=> __( 'Upload or select your self hosted Video. If you want to use embed code. you may leave it blank and choose embed code option above.', 'epz' ),
				'max_file_uploads' => 1,
				'mime_type'	 => 'video', // Leave blank for all file types
			)
		)
	);

// metabox for quote post format
	$meta_boxes[] = array(
		'id'			=> 'quotemetabox',
		'title'			=> __('Quote Format Post Options', 'epz'),
		'post_types'	=> array('post', 'page'),
		'context'		=> 'normal',
		'priority'		=> 'high',
		'autosave'		=> true,
		'fields' 		=> array(

			array(
				'name'	=> __( 'Quote Content', 'epz' ),
				'id'	=> "{$prefix}quote_content",
				'type'	=> 'textarea',
				'desc'	=> __('Please type the text of your quote here.', 'futura'),
			),
			array(
				'name'	=> __( 'Quote Source Name', 'epz' ),
				'id'	=> "{$prefix}quote_source_name",
				'type'	=> 'text',
				'desc'	=> __('Type the author name / name of the quote source.', 'futura'),
			),
			array(
				'name'	=> __('Quote Source Link (URL)', 'epz'),
				'id'	=> "{$prefix}quote_source_link",
				'type'	=> 'text',
				'desc'	=> __('Paste the link of the quote source. The author name will be linked to this link.', 'futura')
			),
		)
	);

	// metabox for status post format
	$meta_boxes[] = array(
		'id'			=> 'statusmetabox',
		'title'			=> __('Status Format Post Options', 'epz'),
		'post_types'	=> array('post', 'page'),
		'context'		=> 'normal',
		'priority'		=> 'high',
		'autosave'		=> true,
		'fields' 		=> array(

			array(
				'name'	=> __( 'Status Type', 'epz' ),
				'id'	=> "{$prefix}status_type",
				'type'	=> 'radio',
				'options' => array(
					'twitter' => __( 'Twitter Status', 'epz' ),
					'facebook' => __( 'Facebook Status', 'epz' ),
				),
				'std'	=> 'twitter',
				'desc'	=> __('Choose the status type you want to post', 'epz')
			),
			array(
				'name'	=> __('Status link (URL)', 'epz'),
				'id'	=> "{$prefix}status_link",
				'desc'	=> __('Paste the Link of the status', 'epz'),
				'type'	=> 'text',
			),
		)
	);
	// metabox for gallery post format
	$meta_boxes[] = array(
		'id'			=> 'gallerymetabox',
		'title'			=> __('Gallery Format Post Options', 'futura'),
		'post_types'	=> array('post', 'page'),
		'context'		=> 'normal',
		'priority'		=> 'high',
		'autosave'		=> true,
		'fields' 		=> array(

			array(
				'name'	=> __( 'Gallery Type', 'epz' ),
				'id'	=> "{$prefix}gallery_type",
				'type'	=> 'radio',
				'options' => array(
					'slider' => __( 'Slider Gallery', 'epz' ),
					'tiled' => __( 'Tiled Gallery', 'epz' ),
				),
				'std'	=> 'slider',
				'desc'	=> __('Choose the Gallery type you want to display', 'epz')
			),
			array(
				'name'	=> __('Upload or Choose Images', 'epz'),
				'id'	=> "{$prefix}gallery_images",
				'desc'	=> __('Choose or upload images for this gallery', 'epz'),
				'type'	=> 'file_advanced',
				'mime_type'	 => 'image'
			),
		)
	);
	
	
	return $meta_boxes;
}
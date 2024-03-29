<?php
/**
 * Enqueue scripts
 *
 * @package Salient WordPress Theme
 * @subpackage helpers
 * @version 10.5
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 * Register/Enqueue frontend JS.
 *
 * @since 1.0
 */
function nectar_register_js() {

	global $nectar_options;
	global $post;
	global $nectar_get_template_directory_uri;
	
	$nectar_using_VC_front_end_editor = (isset($_GET['vc_editable'])) ? sanitize_text_field($_GET['vc_editable']) : '';
	$nectar_using_VC_front_end_editor = ($nectar_using_VC_front_end_editor == 'true') ? true : false;

	$nectar_theme_version = nectar_get_theme_version();

	if ( ! is_admin() ) {

		// Priority scripts.
		wp_register_script( 'jquery-easing', $nectar_get_template_directory_uri . '/js/third-party/jquery.easing.js', array( 'jquery' ), '1.3', true );
		wp_register_script( 'jquery-mousewheel', $nectar_get_template_directory_uri . '/js/third-party/jquery.mousewheel.js', array( 'jquery' ), '3.1.13', true );
		wp_register_script( 'nectar_priority', $nectar_get_template_directory_uri . '/js/priority.js', array( 'jquery', 'jquery-easing', 'jquery-mousewheel' ), $nectar_theme_version, true );
		
		// Third party scripts.
		wp_register_script( 'modernizer', $nectar_get_template_directory_uri . '/js/third-party/modernizr.js', array( 'jquery' ), '2.6.2', true );
		wp_register_script( 'imagesLoaded', $nectar_get_template_directory_uri . '/js/third-party/imagesLoaded.min.js', array( 'jquery' ), '4.1.4', true );
		wp_register_script( 'superfish', $nectar_get_template_directory_uri . '/js/third-party/superfish.js', array( 'jquery' ), '1.4.8', true );
		wp_register_script( 'hoverintent', $nectar_get_template_directory_uri . '/js/third-party/hoverintent.js', array( 'jquery' ), '1.9', true );
		wp_register_script( 'touchswipe', $nectar_get_template_directory_uri . '/js/third-party/touchswipe.min.js', array( 'jquery' ), '1.0', true );
		wp_register_script( 'flexslider', $nectar_get_template_directory_uri . '/js/third-party/flexslider.min.js', array( 'jquery', 'touchswipe' ), '2.1', true );
		wp_register_script( 'flickity', $nectar_get_template_directory_uri . '/js/third-party/flickity.min.js', array( 'jquery' ), '2.1.2', true );
		wp_register_script( 'magnific', $nectar_get_template_directory_uri . '/js/third-party/magnific.js', array( 'jquery' ), '7.0.1', true );
		wp_register_script( 'fancyBox', $nectar_get_template_directory_uri . '/js/third-party/jquery.fancybox.min.js', array( 'jquery' ), '7.0.1', true );
		wp_register_script( 'isotope', $nectar_get_template_directory_uri . '/js/third-party/isotope.min.js', array( 'jquery' ), '7.6', true );
		wp_register_script( 'select2', $nectar_get_template_directory_uri . '/js/third-party/select2.min.js', array( 'jquery' ), '3.5.2', true );
		wp_register_script( 'nectar-parallax', $nectar_get_template_directory_uri . '/js/third-party/parallax.js', array( 'jquery' ), '1.0', true );
		wp_register_script( 'nectar-transit', $nectar_get_template_directory_uri . '/js/third-party/transit.js', array( 'jquery' ), '0.9.9', true );
		wp_register_script( 'fullpage', $nectar_get_template_directory_uri . '/js/third-party/jquery.fullPage.min.js', array( 'jquery' ), $nectar_theme_version, true );
		wp_register_script( 'vivus', $nectar_get_template_directory_uri . '/js/third-party/vivus.min.js', array( 'jquery' ), '6.0.1', true );
		wp_register_script( 'caroufredsel', $nectar_get_template_directory_uri . '/js/third-party/caroufredsel.min.js', array( 'jquery', 'touchswipe' ), '7.0.1', true );
		wp_register_script( 'owl-carousel', $nectar_get_template_directory_uri . '/js/third-party/owl.carousel.min.js', array( 'jquery' ), '2.3.4', true );
		wp_register_script( 'leaflet', $nectar_get_template_directory_uri . '/js/third-party/leaflet.js', array( 'jquery' ), '1.3.1', true );
		wp_register_script( 'twentytwenty', $nectar_get_template_directory_uri . '/js/third-party/jquery.twentytwenty.js', array( 'jquery' ), '1.0', true );
		wp_register_script( 'infinite-scroll', $nectar_get_template_directory_uri . '/js/third-party/infinitescroll.js', array( 'jquery' ), '1.1', true );
		wp_register_script( 'stickykit', $nectar_get_template_directory_uri . '/js/third-party/stickkit.js', array( 'jquery' ), '1.0', true );
		wp_register_script( 'pixi', $nectar_get_template_directory_uri . '/js/third-party/pixi.min.js', array( 'jquery' ), '4.5.1', true );
		wp_register_script( 'anime', $nectar_get_template_directory_uri . '/js/third-party/anime.js', array( 'jquery' ), '4.5.1', true );
		wp_register_script( 'nectar-waypoints', $nectar_get_template_directory_uri . '/js/third-party/waypoints.js', array( 'jquery' ), '4.0.1', true );
		
		
		// Page option conditional scripts.
		wp_register_script( 'nectar-single-product', $nectar_get_template_directory_uri . '/js/nectar-single-product.js', array( 'jquery' ), $nectar_theme_version, true );
		wp_register_script( 'nectar-fullpage', $nectar_get_template_directory_uri . '/js/elements/nectar-full-page-rows.js', array( 'jquery', 'jquery-mousewheel' ), $nectar_theme_version, true );
		wp_register_script( 'nectar-box-roll', $nectar_get_template_directory_uri . '/js/nectar-box-roll.js', array( 'jquery', 'jquery-mousewheel', 'touchswipe' ), $nectar_theme_version, true );
		wp_register_script( 'nectar-particles', $nectar_get_template_directory_uri . '/js/nectar-particles.js', array( 'jquery', 'jquery-mousewheel' ), $nectar_theme_version, true );
		
		// Register Salient element scripts.
		wp_register_script( 'nectar-leaflet-map', $nectar_get_template_directory_uri . '/js/elements/nectar-leaflet-map.js', array( 'jquery' ), $nectar_theme_version, true );
		wp_register_script( 'nectar-masonry-blog', $nectar_get_template_directory_uri . '/js/elements/nectar-blog.js', array( 'jquery' ), $nectar_theme_version, true );
		wp_register_script( 'nectar-liquid-bgs', $nectar_get_template_directory_uri . '/js/elements/nectar-liquid.js', array( 'jquery' ), $nectar_theme_version, true );
		wp_register_script( 'nectar-testimonial-sliders', $nectar_get_template_directory_uri . '/js/elements/nectar-testimonial-slider.js', array( 'jquery' ), $nectar_theme_version, true );
		
		// Main Salient script.
		wp_register_script( 'nectar-frontend', $nectar_get_template_directory_uri . '/js/init.js', array( 'jquery', 'superfish', 'nectar-waypoints', 'nectar-transit' ), $nectar_theme_version, true );

		// Dequeue.
		$lightbox_script = ( ! empty( $nectar_options['lightbox_script'] ) ) ? $nectar_options['lightbox_script'] : 'magnific';
		if ( $lightbox_script === 'pretty_photo' ) {
			$lightbox_script = 'magnific'; 
		}

		// Enqueue.
		wp_enqueue_script( 'nectar_priority' );
		wp_enqueue_script( 'nectar-transit' );
		wp_enqueue_script( 'nectar-waypoints' );
		wp_enqueue_script( 'modernizer' );
		wp_enqueue_script( 'imagesLoaded' );
		wp_enqueue_script( 'hoverintent' );


		$post_content           = ( isset( $post->post_content ) ) ? $post->post_content : '';
		$nectar_box_roll 				= ( isset( $post->ID ) ) ? get_post_meta( $post->ID, '_nectar_header_box_roll', true ) : '';
		$page_full_screen_rows 	= ( isset( $post->ID ) ) ? get_post_meta( $post->ID, '_nectar_full_screen_rows', true ) : '';
		
		if ( ! empty( $nectar_options['portfolio_sidebar_follow'] ) && $nectar_options['portfolio_sidebar_follow'] === '1' && is_singular( 'portfolio' ) ) {
			wp_enqueue_script( 'stickykit' ); 
		}
		
		// Lightbox.
		if ( $lightbox_script === 'magnific' ) {
			wp_enqueue_script( 'magnific' );
		} elseif ( $lightbox_script === 'fancybox' ) {
			wp_enqueue_script( 'fancyBox' );
		}
		
		if( NectarElAssets::locate( array('nectar_portfolio', 'vc_gallery type="image_grid"', 'type="image_grid"') ) || 
		is_page_template( 'template-portfolio.php' ) || is_search() ) {
			 wp_enqueue_script( 'isotope' );
		}
		
		// Nectar Page Settings.
		if( $nectar_box_roll === 'on' ) {
			wp_enqueue_script( 'nectar-box-roll' );
		}
		
		if ( $page_full_screen_rows === 'on' ) {
			wp_enqueue_script( 'fullpage' );
			wp_enqueue_script( 'nectar-fullpage' );
		}
		
		// Carousels.
		if( NectarElAssets::locate(array('[recent_projects', '[carousel', 'carousel="true"', 'carousel="1"')) || is_page_template( 'template-home-1.php' ) ) {
			wp_enqueue_script( 'caroufredsel' );
		}
		if ( NectarElAssets::locate( array('script="owl_carousel"')) ) {
			wp_enqueue_script( 'owl-carousel' );
		}
		
		// Row/Column BG animation deps.
		if ( NectarElAssets::locate(array('bg_image_animation="displace-filter')) ) {
			wp_enqueue_script( 'pixi' );
			wp_enqueue_script( 'anime' );
			wp_enqueue_script( 'nectar-liquid-bgs' );
		}
		if ( NectarElAssets::locate(array('animation="slight-twist"')) ) {
			wp_enqueue_script( 'anime' );
		}
		
		// Testimonial Sliders.
		if ( NectarElAssets::locate(array('[testimonial_slider')) ) {
			wp_enqueue_script( 'nectar-testimonial-sliders' );
		}
		
		// Flickity.
		$nectar_flickity_els = array(
			'[vc_gallery type="flickity"', 
			'style="multiple_visible"', 
			'style="slider_multiple_visible"', 
			'script="flickity"', 
			'style="multiple_visible_minimal"', 
			'style="slider"'
		);
		
		if ( NectarElAssets::locate($nectar_flickity_els) ) {
			wp_enqueue_script( 'flickity' );
		}
		
		// Sticky sidebar.
		if ( NectarElAssets::locate(array('[nectar_blog')) && NectarElAssets::locate(array('enable_ss="true"')) ) {
			wp_enqueue_script( 'stickykit' );
		}
		
		// Main Salient Script.
		wp_enqueue_script( 'nectar-frontend' );

		
		// Load all when using WPBakery front end editor.
		if( $nectar_using_VC_front_end_editor ) {
			wp_enqueue_script('nectar-slider');
			wp_enqueue_script('nectar-waypoints');
			wp_enqueue_script('isotope');
			wp_enqueue_script('salient-portfolio-js');
			wp_enqueue_script('caroufredsel');	
			wp_enqueue_script('vivus'); 
			wp_enqueue_script('touchswipe');
			wp_enqueue_script('flickity');	
			wp_enqueue_script('flexslider');
			wp_enqueue_script('stickykit');	
			wp_enqueue_script('vivus'); 
			wp_enqueue_script('twentytwenty');
			wp_enqueue_script('owl-carousel');
			wp_enqueue_script('leaflet');
	    wp_enqueue_script('nectar-leaflet-map'); 
			wp_enqueue_script('nectar-testimonial-sliders');
			wp_enqueue_script('nectar-masonry-blog');
		}
		
	}
	
	
	// Disqus plugin.
	$disqus_comments = ( function_exists( 'dsq_is_installed' ) ) ? 'true' : 'false';
	
	wp_localize_script(
		'nectar-frontend',
		'nectarLove',
		array(
			'ajaxurl'        => esc_url( admin_url( 'admin-ajax.php' ) ),
			'postID'         => $post->ID,
			'rooturl'        => esc_url( home_url() ),
			'disqusComments' => $disqus_comments,
			'loveNonce'      => wp_create_nonce( 'nectar-love-nonce' ),
			'mapApiKey'      => ( ! empty( $nectar_options['google-maps-api-key'] ) ) ? $nectar_options['google-maps-api-key'] : '',
		)
	);
	
}

add_action( 'wp_enqueue_scripts', 'nectar_register_js' );



/**
 * Enqueue page specific JS.
 *
 * @since 1.0
 */
function nectar_page_specific_js() {

	global $post;
	global $nectar_options;
	global $nectar_get_template_directory_uri;

	if ( ! is_object( $post ) ) {
		$post = (object) array(
			'post_content' => ' ',
			'ID'           => ' ',
		);
	}
	$template_name = get_post_meta( $post->ID, '_wp_page_template', true );

	// Home.
	if ( is_page_template( 'template-home-1.php' ) || $template_name === 'salient/template-home-1.php' ||
		 is_page_template( 'template-home-2.php' ) || $template_name === 'salient/template-home-2.php' ||
		 is_page_template( 'template-home-3.php' ) || $template_name === 'salient/template-home-3.php' ||
		 is_page_template( 'template-home-4.php' ) || $template_name === 'salient/template-home-4.php' ) {
		wp_enqueue_script( 'orbit' );
		wp_enqueue_script( 'touchswipe' );
	}

	$post_content            = $post->post_content;
	$posttype                = get_post_type( $post );


	// Infinite scroll.
	if ( NectarElAssets::locate(array('pagination_type="infinite_scroll"')) ) {
		wp_enqueue_script( 'infinite-scroll' );
	}

	// Gallery slider scripts.
	if ( NectarElAssets::locate(array('[nectar_blog')) ) {
			wp_enqueue_script( 'flexslider' );
	}

	// Isotope.
	if ( NectarElAssets::locate(array('[nectar_blog')) && NectarElAssets::locate(array('layout="masonry')) ||
		NectarElAssets::locate(array('[nectar_blog')) && NectarElAssets::locate(array('layout="std-blog-')) && NectarElAssets::locate(array('blog_standard_style="classic')) ) {
		wp_enqueue_script( 'isotope' );
		wp_enqueue_script( 'nectar-masonry-blog' );
	}

	/*********for archive pages based on theme options*/
	$nectar_on_blog_archive_check      = ( is_archive() || is_author() || is_category() || is_home() || is_tag() ) && ( ! is_singular() );
	$nectar_on_portfolio_archive_check = ( is_archive() || is_category() || is_home() || is_tag() ) && ( 'portfolio' === $posttype && ! is_singular() );

	// Infinite scroll.
	if ( ( ! empty( $nectar_options['portfolio_pagination_type'] ) && $nectar_options['portfolio_pagination_type'] === 'infinite_scroll' ) && $nectar_on_portfolio_archive_check ||
			( ! empty( $nectar_options['portfolio_pagination_type'] ) && $nectar_options['portfolio_pagination_type'] === 'infinite_scroll' ) && is_page_template( 'template-portfolio.php' ) ||
			( ! empty( $nectar_options['blog_pagination_type'] ) && $nectar_options['blog_pagination_type'] === 'infinite_scroll' ) && $nectar_on_blog_archive_check ) {
			wp_enqueue_script( 'infinite-scroll' );

		if ( class_exists( 'WPBakeryVisualComposerAbstract' ) && defined( 'SALIENT_VC_ACTIVE' ) ) {
			wp_register_script( 'progressCircle', vc_asset_url( 'lib/bower/progress-circle/ProgressCircle.min.js' ) );
			wp_register_script( 'vc_pie', vc_asset_url( 'lib/vc_chart/jquery.vc_chart.min.js' ), array( 'jquery', 'progressCircle' ) );
		}
	}

	// Sticky sidebar.
	if ( ! empty( $nectar_options['blog_enable_ss'] ) && $nectar_options['blog_enable_ss'] === '1' && $nectar_on_blog_archive_check ) {
		wp_enqueue_script( 'stickykit' );
	}

	// Isotope.
	$nectar_blog_type          = ( ! empty( $nectar_options['blog_type'] ) ) ? $nectar_options['blog_type'] : 'masonry-blog-fullwidth';
	$nectar_blog_std_style     = ( ! empty( $nectar_options['blog_standard_type'] ) ) ? $nectar_options['blog_standard_type'] : 'featured_img_left';
	$nectar_blog_masonry_style = ( ! empty( $nectar_options['blog_masonry_type'] ) ) ? $nectar_options['blog_masonry_type'] : 'auto_meta_overlaid_spaced';

	if ( $nectar_blog_type != 'std-blog-sidebar' && $nectar_blog_type !== 'std-blog-fullwidth' ) {
		if ( $nectar_blog_masonry_style != 'auto_meta_overlaid_spaced' && $nectar_on_blog_archive_check ) {
			wp_enqueue_script( 'isotope' );
			wp_enqueue_script( 'nectar-masonry-blog' );
		}
	}

	if ( $nectar_on_portfolio_archive_check ) {
		wp_enqueue_script( 'isotope' ); 
		wp_enqueue_script( 'salient-portfolio-js' );
	}

	// Gallery slider scripts.
	if ( $nectar_on_blog_archive_check ) {

		if ( $nectar_blog_type === 'std-blog-sidebar' || $nectar_blog_type === 'std-blog-fullwidth' ) {
			
			// Standrad styles that could contain gallery sliders.
			if ( $nectar_blog_std_style === 'classic' || $nectar_blog_std_style === 'minimal' ) {
				wp_enqueue_script( 'flexslider' );
				wp_enqueue_script( 'isotope' );
				wp_enqueue_script( 'flickity' );
				wp_enqueue_script( 'nectar-testimonial-sliders' );
			}
		} else {
			// Masonry styles that could contain gallery sliders.
			if ( $nectar_blog_masonry_style !== 'auto_meta_overlaid_spaced' ) {
				wp_enqueue_script( 'flexslider' );
			}
		}
	}

	// Single post sticky sidebar.
	$enable_ss = ( ! empty( $nectar_options['blog_enable_ss'] ) ) ? $nectar_options['blog_enable_ss'] : 'false';

	if ( ( $enable_ss == '1' && is_single() && $posttype === 'post' ) || NectarElAssets::locate(array('[vc_widget_sidebar')) ) {
		  wp_enqueue_script( 'stickykit' );
	}

	// Nectar slider.
	if ( NectarElAssets::locate(array('[nectar_slider')) || NectarElAssets::locate(array('type="nectarslider_style"')) ) {
		wp_enqueue_script( 'nectar-slider' );
	}

	// Touch swipe.
	wp_enqueue_script( 'touchswipe' );


	// Fancy select.
	$fancy_rcs = ( ! empty( $nectar_options['form-fancy-select'] ) ) ? $nectar_options['form-fancy-select'] : 'default';
	if ( $fancy_rcs === '1' ) {
		wp_enqueue_script( 'select2' );
	}

	// svg icon animation
	if ( NectarElAssets::locate(array('.svg')) ) {
		wp_enqueue_script( 'vivus' );
	}

	// comments
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}

add_action( 'wp_enqueue_scripts', 'nectar_page_specific_js' );

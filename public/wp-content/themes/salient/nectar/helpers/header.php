<?php
/**
 * Header related helper functions
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
 * Return the variables needed for header/body
 *
 * @since 9.0.2
 */
function nectar_get_header_variables() {

	$nectar_options = get_nectar_theme_options();

	global $post;
	global $woocommerce;
	
	$nectar_using_VC_front_end_editor = (isset($_GET['vc_editable'])) ? sanitize_text_field($_GET['vc_editable']) : '';
	$nectar_using_VC_front_end_editor = ($nectar_using_VC_front_end_editor == 'true') ? true : false;
	
	$header_format = ( ! empty( $nectar_options['header_format'] ) ) ? $nectar_options['header_format'] : 'default';

	// Check if parallax nectar slider is being used (needed for raw shortcode outside page builder).
	$parallax_nectar_slider = using_nectar_slider();
	$force_effect           = get_post_meta( $post->ID, '_force_transparent_header', true );

	// Header transparent option.
	$transparency_markup              = null;
	$activate_transparency            = null;
	$nectar_transparency_color_class  = '';
	$nectar_transparency_color_forced = 'light';

	$using_page_header = nectar_using_page_header( $post->ID );
	$using_fw_slider   = $parallax_nectar_slider;
	$using_fw_slider   = ( ! empty( $nectar_options['transparent-header'] ) && $nectar_options['transparent-header'] == '1' ) ? $using_fw_slider : 0;
	if ( $force_effect === 'on' ) {
		$using_fw_slider = '1';
	}
	$disable_effect = get_post_meta( $post->ID, '_disable_transparent_header', true );
	
	if($woocommerce && is_shop() || $woocommerce && is_product_category() || $woocommerce && is_product_tag()) {
		$force_transparent_header_color = get_post_meta( wc_get_page_id('shop'), '_force_transparent_header_color', true );
	} else {
		$force_transparent_header_color = ( isset( $post->ID ) ) ? get_post_meta( $post->ID, '_force_transparent_header_color', true ) : '';
	}


	$theme_skin = ( ! empty( $nectar_options['theme-skin'] ) ) ? $nectar_options['theme-skin'] : 'original';
	if ( $header_format === 'centered-menu-bottom-bar' ) {
		$theme_skin = 'material'; 
	}

	if ( ! empty( $nectar_options['transparent-header'] ) && $nectar_options['transparent-header'] === '1' && $header_format != 'left-header' ) {

		$starting_color                  = ( empty( $nectar_options['header-starting-color'] ) ) ? '#ffffff' : $nectar_options['header-starting-color'];
		$activate_transparency           = $using_page_header;
		$remove_border                   = ( ! empty( $nectar_options['header-remove-border'] ) && $nectar_options['header-remove-border'] === '1' || $theme_skin === 'material' ) ? 'true' : 'false';
		$transparent_header_shadow       = ( ! empty( $nectar_options['transparent-header-shadow-helper'] ) && $nectar_options['transparent-header-shadow-helper'] === '1' ) ? 'true' : 'false';
		$nectar_transparency_color_class = ( $force_transparent_header_color === 'dark' ) ? ' dark-slide' : '';
		
		if ( $force_transparent_header_color === 'dark' ) {
			$nectar_transparency_color_forced = 'dark';
		}

		$transparency_markup = ( $activate_transparency == 'true' ) ? 'data-transparent-header="true" data-transparent-shadow-helper="' . esc_attr( $transparent_header_shadow ) . '" data-remove-border="' . esc_attr( $remove_border ) . '" class="transparent' . esc_attr( $nectar_transparency_color_class ) . '"' : null;

	}

	// header vars
	$logo_class           = ( ! empty( $nectar_options['use-logo'] ) && $nectar_options['use-logo'] === '1' ) ? null : 'class="no-image"';
	$using_mobile_logo    = ( ! empty( $nectar_options['use-logo'] ) && $nectar_options['use-logo'] === '1' && ! empty( $nectar_options['mobile-logo'] ) && ! empty( $nectar_options['mobile-logo']['url'] ) ) ? 'true' : 'false';
	$using_mobile_logo_s  = ( ! empty( $nectar_options['use-logo'] ) && $nectar_options['use-logo'] === '1' && ! empty( $nectar_options['header-starting-mobile-only-logo'] ) && ! empty( $nectar_options['header-starting-mobile-only-logo']['url'] ) ) ? 'true' : 'false';
	$using_mobile_logo_sd = ( ! empty( $nectar_options['use-logo'] ) && $nectar_options['use-logo'] === '1' && ! empty( $nectar_options['header-starting-mobile-only-logo-dark'] ) && ! empty( $nectar_options['header-starting-mobile-only-logo-dark']['url'] ) ) ? 'true' : 'false';
	$side_widget_area     = ( ! empty( $nectar_options['header-slide-out-widget-area'] ) && $header_format != 'left-header' ) ? $nectar_options['header-slide-out-widget-area'] : 'off';
	$side_widget_class    = ( ! empty( $nectar_options['header-slide-out-widget-area-style'] ) ) ? $nectar_options['header-slide-out-widget-area-style'] : 'slide-out-from-right';
	$header_search        = ( ! empty( $nectar_options['header-disable-search'] ) && $nectar_options['header-disable-search'] === '1' ) ? 'false' : 'true';
	$user_account_btn     = ( ! empty( $nectar_options['header-account-button'] ) && $nectar_options['header-account-button'] === '1' ) ? 'true' : 'false';
	$user_account_btn_url = ( ! empty( $nectar_options['header-account-button-url'] ) ) ? $nectar_options['header-account-button-url'] : '';
	$mobile_fixed         = ( ! empty( $nectar_options['header-mobile-fixed'] ) ) ? $nectar_options['header-mobile-fixed'] : 'false';
	$mobile_breakpoint    = ( ! empty( $nectar_options['header-menu-mobile-breakpoint'] ) ) ? $nectar_options['header-menu-mobile-breakpoint'] : 1000;
	$full_width_header    = ( ! empty( $nectar_options['header-fullwidth'] ) && $nectar_options['header-fullwidth'] === '1' ) ? 'true' : 'false';
	$header_color_scheme  = ( ! empty( $nectar_options['header-color'] ) ) ? $nectar_options['header-color'] : 'light';
	$user_set_bg          = ( ! empty( $nectar_options['header-background-color'] ) && $header_color_scheme === 'custom' ) ? $nectar_options['header-background-color'] : '#ffffff';
	$trans_header         = ( ! empty( $nectar_options['transparent-header'] ) && $nectar_options['transparent-header'] === '1' ) ? $nectar_options['transparent-header'] : 'false';
	if ( $header_format === 'left-header' ) {
		$trans_header = 'false';
	}
	$bg_header                 = ( ! empty( $post->ID ) && $post->ID != 0 ) ? $using_page_header : 0;
	$bg_header                 = ( $bg_header == 1 ) ? 'true' : 'false'; 
	$header_box_shadow         = ( ! empty( $nectar_options['header-box-shadow'] ) ) ? $nectar_options['header-box-shadow'] : 'small';
	$header_remove_stickiness  = ( ! empty( $nectar_options['header-remove-fixed'] ) ) ? $nectar_options['header-remove-fixed'] : '0';
	if( $nectar_using_VC_front_end_editor ) {
		$header_remove_stickiness = '1';
	}

	$condense_header_on_scroll = ( ! empty( $nectar_options['condense-header-on-scroll'] ) && $header_format === 'centered-menu-bottom-bar' && $header_remove_stickiness !== '1' && $nectar_options['condense-header-on-scroll'] === '1' ) ? 'true' : 'false';
	$perm_trans                = ( ! empty( $nectar_options['header-permanent-transparent'] ) && $trans_header != 'false' && $bg_header == 'true' && $header_format !== 'centered-menu-bottom-bar' ) ? $nectar_options['header-permanent-transparent'] : 'false';
	$header_link_hover_effect  = ( ! empty( $nectar_options['header-hover-effect'] ) ) ? $nectar_options['header-hover-effect'] : 'default';
	$hide_header_until_needed  = ( ! empty( $nectar_options['header-hide-until-needed'] ) && $header_format !== 'centered-menu-bottom-bar' ) ? $nectar_options['header-hide-until-needed'] : '0';
	
	if ( $header_format === 'centered-menu-bottom-bar' ) {
		$hide_header_until_needed = '0'; 
	}
	if ( $header_format === 'left-header' ) {
		$hide_header_until_needed = '0';
		$header_remove_stickiness = '0'; 
	}
	if ( $header_remove_stickiness === '1' ) {
		$hide_header_until_needed = '1';
	}
	$header_resize               = ( ! empty( $nectar_options['header-resize-on-scroll'] ) && $header_format !== 'centered-menu-bottom-bar' ) ? $nectar_options['header-resize-on-scroll'] : '0';
	$dropdown_style              = 'minimal';
	$page_transition_effect      = ( ! empty( $nectar_options['transition-effect'] ) ) ? $nectar_options['transition-effect'] : 'standard';
	$megamenuwidth               = ( ! empty( $nectar_options['header-megamenu-width'] ) && $header_format != 'left-header' ) ? $nectar_options['header-megamenu-width'] : 'contained';
	$megamenu_remove_transparent = ( ! empty( $nectar_options['header-megamenu-remove-transparent'] ) && $header_format != 'left-header' ) ? $nectar_options['header-megamenu-remove-transparent'] : '0';
	$body_border                 = ( ! empty( $nectar_options['body-border'] ) ) ? $nectar_options['body-border'] : 'off';
	
	if ( $hide_header_until_needed === '1' || $body_border === '1' || $header_format === 'left-header' || $header_remove_stickiness === '1' ) {
		$header_resize = '0';
	}
	
	$lightbox_script = ( ! empty( $nectar_options['lightbox_script'] ) ) ? $nectar_options['lightbox_script'] : 'magnific';
	if ( $lightbox_script === 'pretty_photo' ) {
		$lightbox_script = 'magnific'; 
	}
	
	$button_styling       = ( ! empty( $nectar_options['button-styling'] ) ) ? $nectar_options['button-styling'] : 'default';
	$form_style           = ( ! empty( $nectar_options['form-style'] ) ) ? $nectar_options['form-style'] : 'default';
	$fancy_rcs            = ( ! empty( $nectar_options['form-fancy-select'] ) ) ? $nectar_options['form-fancy-select'] : 'default';
	$footer_reveal        = ( ! empty( $nectar_options['footer-reveal'] ) ) ? $nectar_options['footer-reveal'] : 'false';
	$footer_reveal_shadow = ( ! empty( $nectar_options['footer-reveal-shadow'] ) && $footer_reveal === '1' ) ? $nectar_options['footer-reveal-shadow'] : 'none';

	$has_main_menu     = ( has_nav_menu( 'top_nav' ) ) ? 'true' : 'false';
	$animate_in_effect = ( ! empty( $nectar_options['header-animate-in-effect'] ) ) ? $nectar_options['header-animate-in-effect'] : 'none';
	
	if ( $header_color_scheme === 'dark' ) {
		$user_set_bg = '#1f1f1f'; 
	}
	
	$user_set_side_widget_area = $side_widget_area;
	
	if ( $has_main_menu === 'true' ) {
		$side_widget_area = '1'; 
	}
	
	if ( $header_format === 'centered-menu-under-logo' ) {
		if ( $side_widget_class === 'slide-out-from-right-hover' && $user_set_side_widget_area === '1' ) {
			$side_widget_class = 'slide-out-from-right';
		}
		$full_width_header = 'false';
	}
	if ( $side_widget_class === 'slide-out-from-right-hover' && $user_set_side_widget_area === '1' ) {
		$full_width_header = 'true';
	}
	
	$column_animation_easing   = ( ! empty( $nectar_options['column_animation_easing'] ) ) ? $nectar_options['column_animation_easing'] : 'linear';
	$column_animation_duration = ( ! empty( $nectar_options['column_animation_timing'] ) ) ? $nectar_options['column_animation_timing'] : '650';
	$prepend_top_nav_mobile    = ( ! empty( $nectar_options['header-slide-out-widget-area-top-nav-in-mobile'] ) && $user_set_side_widget_area === '1' ) ? $nectar_options['header-slide-out-widget-area-top-nav-in-mobile'] : 'false';
	$smooth_scrolling          = '0';
	$page_full_screen_rows 		 = ( isset( $post->ID ) ) ? get_post_meta( $post->ID, '_nectar_full_screen_rows', true ) : '';
	$form_submit_style         = ( ! empty( $nectar_options['form-submit-btn-style'] ) ) ? $nectar_options['form-submit-btn-style'] : 'default';
	$n_boxed_style             = ( ! empty( $nectar_options['boxed_layout'] ) && $nectar_options['boxed_layout'] === '1' && $header_format != 'left-header' ) ? true : false;
	$n_remove_mobile_parallax  = ( ! empty( $nectar_options['disable-mobile-parallax'] ) && $nectar_options['disable-mobile-parallax'] === '1' ) ? true : false;
	$n_remove_mobile_video_bgs = ( ! empty( $nectar_options['disable-mobile-video-bgs'] ) && $nectar_options['disable-mobile-video-bgs'] === '1' ) ? true : false;
	$using_secondary           = ( ! empty( $nectar_options['header_layout'] ) && $header_format != 'left-header' ) ? $nectar_options['header_layout'] : ' ';


	// using pr
	$using_pr_menu = 'false';
	if ( $header_format === 'menu-left-aligned' || $header_format === 'centered-menu' || $header_format === 'centered-logo-between-menu' ) {
		if ( has_nav_menu( 'top_nav_pull_right' ) ) {
			$using_pr_menu = 'true';
		}
	}

	$using_header_buttons 		= nectar_header_button_check();
	$header_transparency_bool = ( ! empty( $nectar_options['transparent-header'] ) && $nectar_options['transparent-header'] === '1' ) ? true : false;

	$nectar_header_options = array(
		'options'                          => $nectar_options,
		'theme_skin'                       => $theme_skin,
		'header_format'                    => $header_format,
		'disable_effect'                   => $disable_effect,
		'force_effect'                     => $force_effect,
		'using_fw_slider'                  => $using_fw_slider,
		'force_transparent_header_color'   => $force_transparent_header_color,
		'parallax_nectar_slider'           => $parallax_nectar_slider,
		'nectar_transparency_color_class'  => $nectar_transparency_color_class,
		'using_page_header'                => $using_page_header,
		'activate_transparency'            => $activate_transparency,
		'header_transparency_bool'         => $header_transparency_bool,
		'dropdown_style'                   => $dropdown_style,
		'n_remove_mobile_video_bgs'        => $n_remove_mobile_video_bgs,
		'n_remove_mobile_parallax'         => $n_remove_mobile_parallax,
		'n_boxed_style'                    => $n_boxed_style,
		'form_submit_style'                => $form_submit_style,
		'smooth_scrolling'                 => $smooth_scrolling,
		'prepend_top_nav_mobile'           => $prepend_top_nav_mobile,
		'column_animation_duration'        => $column_animation_duration,
		'column_animation_easing'          => $column_animation_easing,
		'full_width_header'                => $full_width_header,
		'side_widget_class'                => $side_widget_class,
		'side_widget_area'                 => $side_widget_area,
		'user_set_side_widget_area'        => $user_set_side_widget_area,
		'user_set_bg'                      => $user_set_bg,
		'animate_in_effect'                => $animate_in_effect,
		'has_main_menu'                    => $has_main_menu,
		'footer_reveal_shadow'             => $footer_reveal_shadow,
		'footer_reveal'                    => $footer_reveal,
		'fancy_rcs'                        => $fancy_rcs,
		'form_style'                       => $form_style,
		'button_styling'                   => $button_styling,
		'lightbox_script'                  => $lightbox_script,
		'header_resize'                    => $header_resize,
		'body_border'                      => $body_border,
		'megamenu_remove_transparent'      => $megamenu_remove_transparent,
		'megamenuwidth'                    => $megamenuwidth,
		'page_transition_effect'           => $page_transition_effect,
		'dropdown_style'                   => $dropdown_style,
		'hide_header_until_needed'         => $hide_header_until_needed,
		'header_remove_stickiness'         => $header_remove_stickiness,
		'header_link_hover_effect'         => $header_link_hover_effect,
		'perm_trans'                       => $perm_trans,
		'condense_header_on_scroll'        => $condense_header_on_scroll,
		'header_remove_stickiness'         => $header_remove_stickiness,
		'header_box_shadow'                => $header_box_shadow,
		'bg_header'                        => $bg_header,
		'trans_header'                     => $trans_header,
		'header_color_scheme'              => $header_color_scheme,
		'mobile_breakpoint'                => $mobile_breakpoint,
		'mobile_fixed'                     => $mobile_fixed,
		'user_account_btn_url'             => $user_account_btn_url,
		'user_account_btn'                 => $user_account_btn,
		'header_search'                    => $header_search,
		'using_mobile_logo'                => $using_mobile_logo,
		'using_mobile_logo_starting' 			 => $using_mobile_logo_s,
		'using_mobile_logo_starting_dark'	 => $using_mobile_logo_sd,
		'logo_class'                       => $logo_class,
		'transparency_markup'              => $transparency_markup,
		'nectar_transparency_color_forced' => $nectar_transparency_color_forced,
		'using_pr_menu'                    => $using_pr_menu,
		'using_header_buttons'             => $using_header_buttons,
		'using_secondary'                  => $using_secondary,
		'page_full_screen_rows'            => $page_full_screen_rows,
	);

	return $nectar_header_options;

} 





/**
 * Output the Salient specific body attributes
 *
 * @since 9.02
 */
function nectar_body_attributes() {

	global $woocommerce;
	global $nectar_options;
	
	$nectar_header_options = nectar_get_header_variables();
	extract( $nectar_header_options );

	echo 'data-footer-reveal="' . esc_attr( $footer_reveal ) . '" ';
	echo 'data-footer-reveal-shadow="' . esc_attr( $footer_reveal_shadow ) . '" ';
	echo 'data-header-format="' . esc_attr( $header_format ) . '" ';
	echo 'data-body-border="' . esc_attr( $body_border ) . '" ';
	echo 'data-boxed-style="' . esc_attr( $n_boxed_style ) . '" ';
	echo 'data-header-breakpoint="' . esc_attr( $mobile_breakpoint ) . '" ';

	echo 'data-dropdown-style="' . esc_attr( $dropdown_style ) . '" ';
	echo 'data-cae="' . esc_attr( $column_animation_easing ) . '" ';
	echo 'data-cad="' . esc_attr( $column_animation_duration ) . '" ';
	echo 'data-megamenu-width="' . esc_attr( $megamenuwidth ) . '" ';
	echo 'data-aie="' . esc_attr( $animate_in_effect ) . '" ';
	echo 'data-ls="' . esc_attr( $lightbox_script ) . '" ';
	echo 'data-apte="' . esc_attr( $page_transition_effect ) . '" ';
	echo 'data-hhun="' . esc_attr( $hide_header_until_needed ) . '" ';
	echo 'data-fancy-form-rcs="' . esc_attr( $fancy_rcs ) . '" ';
	echo 'data-form-style="' . esc_attr( $form_style ) . '" ';
	echo 'data-form-submit="' . esc_attr( $form_submit_style ) . '" ';
	echo 'data-is="minimal" ';
	echo 'data-button-style="' . esc_attr( $button_styling ) . '" ';
	echo 'data-user-account-button="' . esc_attr( $user_account_btn ) . '" ';
	
	if ( ! empty( $nectar_options['header-inherit-row-color'] ) && $nectar_options['header-inherit-row-color'] === '1' && $perm_trans !== '1' && $condense_header_on_scroll !== 'true' ) {
		echo 'data-header-inherit-rc="true" ';
	} else {
		echo 'data-header-inherit-rc="false" ';
	}

	echo 'data-header-search="' . esc_attr( $header_search ) . '" ';

	if ( ! empty( $nectar_options['one-page-scrolling'] ) && $nectar_options['one-page-scrolling'] === '1' ) {
		echo 'data-animated-anchors="true" ';
	} else {
		echo 'data-animated-anchors="false" ';
	}

	if ( ! empty( $nectar_options['ajax-page-loading'] ) && $nectar_options['ajax-page-loading'] === '1' ) {
		echo 'data-ajax-transitions="true" ';
	} else {
		echo 'data-ajax-transitions="false" ';
	}

	echo 'data-full-width-header="' . esc_attr( $full_width_header ) . '" ';
	if ( $side_widget_area === '1' ) {
		echo 'data-slide-out-widget-area="true" ';
	} else {
		echo 'data-slide-out-widget-area="false" ';
	}

	echo 'data-slide-out-widget-area-style="' . esc_attr( $side_widget_class ) . '" ';
	echo 'data-user-set-ocm="' . esc_attr( $user_set_side_widget_area ) . '" ';

	if ( ! empty( $nectar_options['loading-image-animation'] ) ) {
		echo 'data-loading-animation="' . esc_attr( $nectar_options['loading-image-animation'] ) . '" ';
	} else {
		echo 'data-loading-animation="none" ';
	}

	echo 'data-bg-header="' . esc_attr( $bg_header ) . '" ';

	if ( ! empty( $nectar_options['responsive'] ) && $nectar_options['responsive'] === '1' ) {
		echo 'data-responsive="1" ';
	} else {
		echo 'data-responsive="0" ';
	}

	if ( ! empty( $nectar_options['responsive'] ) && $nectar_options['responsive'] === '1' && ! empty( $nectar_options['ext_responsive'] ) && $nectar_options['ext_responsive'] === '1' ) {
		echo 'data-ext-responsive="true" ';
	} else {
		echo 'data-ext-responsive="false" ';
	}

	echo 'data-header-resize="' . esc_attr( $header_resize ) . '" ';

	if ( ! empty( $nectar_options['header-color'] ) ) {
		echo 'data-header-color="' . esc_attr( $nectar_options['header-color'] ) . '" ';
	} else {
		echo 'data-header-color="light" ';
	}

	if ( $header_transparency_bool == false ) {
		echo 'data-transparent-header="false" ';
	}

	if ( $woocommerce && ! empty( $nectar_options['enable-cart'] ) && $nectar_options['enable-cart'] === '1' ) {
		echo 'data-cart="true" ';
	} else {
		echo 'data-cart="false" ';
	}

	echo 'data-remove-m-parallax="' . esc_attr( $n_remove_mobile_parallax ) . '" ';
	echo 'data-remove-m-video-bgs="' . esc_attr( $n_remove_mobile_video_bgs ) . '" ';
	echo 'data-force-header-trans-color="' . esc_attr( $nectar_transparency_color_forced ) . '" ';
	echo 'data-smooth-scrolling="0" ';
	echo 'data-permanent-transparent="' . esc_attr( $perm_trans ) . '" ';


}



/**
 * Output the Salient header navigation attributes
 *
 * @since 9.0.2
 */
function nectar_header_nav_attributes() {

	global $woocommerce;
	global $nectar_options;
	
	$nectar_header_options = nectar_get_header_variables();
	extract( $nectar_header_options );

	echo 'data-has-menu="' . esc_attr( $has_main_menu ) . '" ';
	echo 'data-has-buttons="' . esc_attr( $using_header_buttons ) . '" ';
	echo 'data-using-pr-menu="' . esc_attr( $using_pr_menu ) . '" ';
	echo 'data-mobile-fixed="' . esc_attr( $mobile_fixed ) . '" ';
	echo 'data-ptnm="' . esc_attr( $prepend_top_nav_mobile ) . '" ';
	echo 'data-lhe="' . esc_attr( $header_link_hover_effect ) . '" ';
	echo 'data-user-set-bg="' . esc_attr( $user_set_bg ) . '" ';
	echo 'data-format="' . esc_attr( $header_format ) . '" ';
	echo 'data-permanent-transparent="' . esc_attr( $perm_trans ) . '" ';
	echo 'data-megamenu-rt="' . esc_attr( $megamenu_remove_transparent ) . '" ';
	echo 'data-remove-fixed="' . esc_attr( $header_remove_stickiness ) . '" ';
	echo 'data-header-resize="' . esc_attr( $header_resize ) . '" ';

	if ( $woocommerce && ! empty( $nectar_options['enable-cart'] ) && $nectar_options['enable-cart'] == '1' ) {
		echo 'data-cart="true" ';
	} else {
		echo 'data-cart="false" ';
	}

	if ( $disable_effect === 'on' ) {
		echo 'data-transparency-option="0" ';
	} else {
		echo 'data-transparency-option="' . esc_attr( $using_fw_slider ) . '" ';
	}

	echo 'data-box-shadow="' . esc_attr( $header_box_shadow ) . '" ';

	if ( ! empty( $nectar_options['header-resize-on-scroll-shrink-num'] ) ) {
		echo 'data-shrink-num="' . esc_attr( $nectar_options['header-resize-on-scroll-shrink-num'] ) . '" ';
	} else {
		echo 'data-shrink-num="6" ';
	}

	if ( $using_secondary === 'header_with_secondary' ) {
		echo 'data-using-secondary="1" ';
	} else {
		echo 'data-using-secondary="0" ';
	}

	if ( ! empty( $nectar_options['use-logo'] ) ) {
		echo 'data-using-logo="' . esc_attr( $nectar_options['use-logo'] ) . '" ';
	} else {
		echo 'data-using-logo="0" ';
	}

	if ( ! empty( $nectar_options['logo-height'] ) ) {
		echo 'data-logo-height="' . esc_attr( $nectar_options['logo-height'] ) . '" ';
	} else {
		echo 'data-logo-height="30" ';
	}

	if ( ! empty( $nectar_options['mobile-logo-height'] ) ) {
		echo 'data-m-logo-height="' . esc_attr( $nectar_options['mobile-logo-height'] ) . '" ';
	} else {
		echo 'data-m-logo-height="24" ';
	}

	if ( ! empty( $nectar_options['header-padding'] ) ) {
		echo 'data-padding="' . esc_attr( $nectar_options['header-padding'] ) . '" ';
	} else {
		echo 'data-padding="28" ';
	}
	
	echo 'data-full-width="' . esc_attr( $full_width_header ) . '" data-condense="' . esc_attr( $condense_header_on_scroll ) . '" ' . $transparency_markup;


}



/**
 * Header navigation logo output
 *
 * @since 8.0
 */
if ( ! function_exists( 'nectar_logo_output' ) ) {
	
	function nectar_logo_output( $activate_transparency = false, $off_canvas_style = 'slide-out-from-right', $using_mobile_logo = 'false' ) {

		global $nectar_options;
		global $post;

		$force_transparent_header_color = ( isset( $post->ID ) ) ? get_post_meta( $post->ID, '_force_transparent_header_color', true ) : '';

		if ( ! empty( $nectar_options['use-logo'] ) ) {

			$default_logo_class = ( ! empty( $nectar_options['retina-logo']['id'] ) || ! empty( $nectar_options['retina-logo']['url'] ) ) ? 'default-logo' : null;
			$dark_default_class = ( empty( $nectar_options['header-starting-logo-dark']['id'] ) && empty( $nectar_options['header-starting-logo-dark']['url'] ) ) ? ' dark-version' : null;
			
			$std_retina_srcset = null;
			if ( ! empty( $nectar_options['retina-logo']['id'] ) || ! empty( $nectar_options['retina-logo']['url'] ) ) {
				$std_retina_srcset = 'srcset="' . nectar_options_img( $nectar_options['logo'] ) . ' 1x, ' . nectar_options_img( $nectar_options['retina-logo'] ) . ' 2x"';
			}

			 echo '<img class="stnd ' . $default_logo_class . $dark_default_class . '" alt="' . get_bloginfo( 'name' ) . '" src="' . nectar_options_img( $nectar_options['logo'] ) . '" ' . $std_retina_srcset . ' />';

			 // Mobile only logo.
			if ( $using_mobile_logo === 'true' ) {
				 echo '<img class="mobile-only-logo" alt="' . get_bloginfo( 'name' ) . '" src="' . nectar_options_img( $nectar_options['mobile-logo'] ) . '" />';
			}

			 // Starting logo.
			if ( $activate_transparency == 'true' || $off_canvas_style === 'fullscreen-alt' || $force_transparent_header_color === 'dark' ) {
				
				// Starting mobile only. 
				if( $nectar_options['use-logo'] === '1' && ! empty( $nectar_options['header-starting-mobile-only-logo'] ) && ! empty( $nectar_options['header-starting-mobile-only-logo']['url'] ) ) {
					echo '<img class="starting-logo mobile-only-logo" alt="' . get_bloginfo( 'name' ) . '" src="' . nectar_options_img( $nectar_options['header-starting-mobile-only-logo'] ) . '" />';
				}
				if( $nectar_options['use-logo'] === '1' && ! empty( $nectar_options['header-starting-mobile-only-logo-dark'] ) && ! empty( $nectar_options['header-starting-mobile-only-logo-dark']['url'] ) ) {
					echo '<img class="starting-logo dark-version mobile-only-logo" alt="' . get_bloginfo( 'name' ) . '" src="' . nectar_options_img( $nectar_options['header-starting-mobile-only-logo-dark'] ) . '" />';
				}
				
				$starting_retina_srcset = null;
				if ( ! empty( $nectar_options['header-starting-retina-logo']['id'] ) || ! empty( $nectar_options['header-starting-retina-logo']['url'] ) ) {
					$starting_retina_srcset = 'srcset="' . nectar_options_img( $nectar_options['header-starting-logo'] ) . ' 1x, ' . nectar_options_img( $nectar_options['header-starting-retina-logo'] ) . ' 2x"';
				}

				if ( ! empty( $nectar_options['header-starting-logo']['id'] ) || ! empty( $nectar_options['header-starting-logo']['url'] ) ) {
					echo '<img class="starting-logo ' . $default_logo_class . '"  alt="' . get_bloginfo( 'name' ) . '" src="' . nectar_options_img( $nectar_options['header-starting-logo'] ) . '" ' . $starting_retina_srcset . ' />';
				}

				$starting_dark_retina_srcset = null;
				if ( ! empty( $nectar_options['header-starting-retina-logo-dark']['id'] ) || ! empty( $nectar_options['header-starting-retina-logo-dark']['url'] ) ) {
					$starting_dark_retina_srcset = 'srcset="' . nectar_options_img( $nectar_options['header-starting-logo-dark'] ) . ' 1x, ' . nectar_options_img( $nectar_options['header-starting-retina-logo-dark'] ) . ' 2x"';
				}

				if ( ! empty( $nectar_options['header-starting-logo-dark']['id'] ) || ! empty( $nectar_options['header-starting-logo-dark']['url'] ) ) {
					echo '<img class="starting-logo dark-version ' . $default_logo_class . '"  alt="' . get_bloginfo( 'name' ) . '" src="' . nectar_options_img( $nectar_options['header-starting-logo-dark'] ) . '" ' . $starting_dark_retina_srcset . ' />';
				}
			}
			
		} else {
			echo get_bloginfo( 'name' ); }
	}
}




if ( ! function_exists( 'nectar_logo_spacing' ) ) {
	function nectar_logo_spacing() {

		global $nectar_options;
		
		$logo_class = ( ! empty( $nectar_options['use-logo'] ) && $nectar_options['use-logo'] === '1' ) ? 'true' : 'false';
			
		echo '<div class="logo-spacing" data-using-image="'.esc_attr($logo_class).'">';
		if ( ! empty( $nectar_options['use-logo'] ) ) {

			 echo '<img class="hidden-logo" alt="' . get_bloginfo( 'name' ) . '" src="' . nectar_options_img( $nectar_options['logo'] ) . '" />';

		} else {
			echo get_bloginfo( 'name' ); }

		 echo '</div>';
	}
}




/**
 * Check whether JS is enabled ASAP
 *
 * @since 9.0
 */
add_action( 'wp_head', 'nectar_javascript_check' );
if ( ! function_exists( 'nectar_javascript_check' ) ) {
	function nectar_javascript_check() {
		 echo '<script type="text/javascript"> var root = document.getElementsByTagName( "html" )[0]; root.setAttribute( "class", "js" ); </script>';
	}
}


/**
 * Check whether user is on mobile device ASAP
 *
 * @since 9.0
 */
add_action( 'nectar_hook_after_body_open', 'nectar_mobile_browser_check', 1 );
if ( ! function_exists( 'nectar_mobile_browser_check' ) ) {
	function nectar_mobile_browser_check() {
		 echo '<script type="text/javascript"> if(navigator.userAgent.match(/(Android|iPod|iPhone|iPad|BlackBerry|IEMobile|Opera Mini)/)) { document.body.className += " using-mobile-browser "; } </script>';
	}
}




/**
 * Remove Open Sans from loading twice
 *
 * @since 7.0
 */
if ( ! function_exists( 'nectar_remove_wp_open_sans' ) ) {
	function nectar_remove_wp_open_sans() {
		wp_deregister_style( 'open-sans' );
		wp_register_style( 'open-sans', false );
	}
}
add_action( 'wp_enqueue_scripts', 'nectar_remove_wp_open_sans' );




/**
 * Adds custom JS from redux to head
 *
 * @since 10.1
 */
if ( ! function_exists( 'nectar_add_custom_js_to_head' ) ) {
	
	function nectar_add_custom_js_to_head() {
		
		global $nectar_options;
		
		$nectar_redux_custom_js = '';
		
		// Check if empty
		if ( ! empty( $nectar_options['google-analytics'] ) ) {
			$nectar_redux_custom_js .= $nectar_options['google-analytics'];
		}

		if( ! empty( $nectar_redux_custom_js ) ) {
			echo nectar_remove_p_tags( $nectar_redux_custom_js ); // WPCS: XSS ok.
		}

	}

}

add_action( 'wp_head', 'nectar_add_custom_js_to_head' );



/**
 * Page transition markup.
 *
 * @since 10.0
 */
if ( ! function_exists( 'nectar_page_trans_markup' ) ) {

	function nectar_page_trans_markup() {

		global $nectar_options;
		
		$nectar_using_VC_front_end_editor = (isset($_GET['vc_editable'])) ? sanitize_text_field($_GET['vc_editable']) : '';
		$nectar_using_VC_front_end_editor = ($nectar_using_VC_front_end_editor == 'true') ? true : false;
		
		$ajax_page_loading = ( ! empty( $nectar_options['ajax-page-loading'] ) && $nectar_options['ajax-page-loading'] === '1' ) ? true : false;
		
		if ( $ajax_page_loading === false || $nectar_using_VC_front_end_editor ) {
			return; 
		}

		$page_transition_effect = ( ! empty( $nectar_options['transition-effect'] ) ) ? $nectar_options['transition-effect'] : 'standard';

		$nectar_disable_fade_on_click         = ( ! empty( $nectar_options['disable-transition-fade-on-click'] ) ) ? $nectar_options['disable-transition-fade-on-click'] : '0';
		$nectar_loading_image_animation_class = ( ! empty( $nectar_options['loading-image-animation'] ) && ! empty( $nectar_options['loading-image'] ) ) ? esc_html( $nectar_options['loading-image-animation'] ) : null;
		$nectar_disable_transition_on_mobile  = ( ! empty( $nectar_options['disable-transition-on-mobile'] ) ) ? $nectar_options['disable-transition-on-mobile'] : '0';

		echo '<div id="ajax-loading-screen" data-disable-mobile="' . esc_attr( $nectar_disable_transition_on_mobile ) . '" data-disable-fade-on-click="' . esc_attr( $nectar_disable_fade_on_click ) . '" data-effect="' . esc_attr( $page_transition_effect ) . '" data-method="standard">';

		if ( $page_transition_effect === 'horizontal_swipe' || $page_transition_effect === 'horizontal_swipe_basic' ) {

				echo '<div class="reveal-1"></div>';
				echo '<div class="reveal-2"></div>';

		} elseif ( $page_transition_effect === 'center_mask_reveal' ) {

			 echo '<span class="mask-top"></span>';
			 echo '<span class="mask-right"></span>';
			 echo '<span class="mask-bottom"></span>';
			 echo '<span class="mask-left"></span>';

		} else {

			 echo '<div class="loading-icon ' . $nectar_loading_image_animation_class . '">';

			 $loading_icon = ( isset( $nectar_options['loading-icon'] ) ) ? $nectar_options['loading-icon'] : 'default';
			 $loading_img  = ( isset( $nectar_options['loading-image'] ) ) ? nectar_options_img( $nectar_options['loading-image'] ) : null;

			if ( empty( $loading_img ) ) {

				if ( $loading_icon === 'material' ) {

					echo '<div class="material-icon">
									 <div class="spinner">
										 <div class="right-side"><div class="bar"></div></div>
										 <div class="left-side"><div class="bar"></div></div>
									 </div>
									 <div class="spinner color-2">
										 <div class="right-side"><div class="bar"></div></div>
										 <div class="left-side"><div class="bar"></div></div>
									 </div>
								 </div>';

				} else {

					if ( ! empty( $nectar_options['theme-skin'] ) && $nectar_options['theme-skin'] === 'ascend' ) {
							echo '<span class="default-loading-icon spin"></span>';
					} else {
							echo '<span class="default-skin-loading-icon"></span>';
					}
				}
			} // empty loading img

				echo '</div>';

		} // not swipe or mask reveal

		echo '</div>';

	} // function end

}




global $nectar_options;

function nectar_page_transition_bg_fix() {
	$page_transition_bg     = ( ! empty( $nectar_options['transition-bg-color'] ) ) ? $nectar_options['transition-bg-color'] : '#ffffff';
	$page_transition_bg_2   = ( ! empty( $nectar_options['transition-bg-color-2'] ) ) ? $nectar_options['transition-bg-color-2'] : $page_transition_bg;
	$page_transition_effect = ( ! empty( $nectar_options['transition-effect'] ) ) ? $nectar_options['transition-effect'] : 'standard';

	// set html bg color to match preloading screen to avoid white flash in chrome
	if ( $page_transition_effect === 'horizontal_swipe' ) {
		$css = 'html:not(.page-trans-loaded) { background-color: ' . $page_transition_bg_2 . '; }';
	} else {
		$css = 'html:not(.page-trans-loaded) { background-color: ' . $page_transition_bg . '; }';
	}

	wp_add_inline_style( 'main-styles', $css );

}

if ( ! empty( $nectar_options['ajax-page-loading'] ) && $nectar_options['ajax-page-loading'] === '1' ) {
	add_action( 'wp_enqueue_scripts', 'nectar_page_transition_bg_fix' );
}




/**
 * Output social icons in header navigation.
 *
 * @since 6.0
 */
if ( ! function_exists( 'nectar_header_social_icons' ) ) {

	function nectar_header_social_icons( $location ) {
		global $nectar_options;

		$social_networks    = array(
			'twitter'       => 'fa fa-twitter',
			'facebook'      => 'fa fa-facebook',
			'vimeo'         => 'fa fa-vimeo',
			'pinterest'     => 'fa fa-pinterest',
			'linkedin'      => 'fa fa-linkedin',
			'youtube'       => 'fa fa-youtube-play',
			'tumblr'        => 'fa fa-tumblr',
			'dribbble'      => 'fa fa-dribbble',
			'rss'           => 'fa fa-rss',
			'github'        => 'fa fa-github-alt',
			'google-plus'   => 'fa fa-google-plus',
			'instagram'     => 'fa fa-instagram',
			'stackexchange' => 'fa fa-stackexchange',
			'soundcloud'    => 'fa fa-soundcloud',
			'flickr'        => 'fa fa-flickr',
			'spotify'       => 'icon-salient-spotify',
			'vk'            => 'fa fa-vk',
			'vine'          => 'fa fa-vine',
			'behance'       => 'fa fa-behance',
			'houzz'         => 'fa fa-houzz',
			'yelp'          => 'fa fa-yelp',
			'snapchat'      => 'fa fa-snapchat',
			'mixcloud'      => 'fa fa-mixcloud',
			'bandcamp'      => 'fa fa-bandcamp',
			'tripadvisor'   => 'fa fa-tripadvisor',
			'telegram'      => 'fa fa-telegram',
			'slack'         => 'fa fa-slack',
			'medium'        => 'fa fa-medium',
			'artstation'    => 'icon-salient-artstation',
			'discord'       => 'icon-salient-discord',
			'whatsapp'       => 'fa fa-whatsapp',
			'phone'         => 'fa fa-phone',
			'email'         => 'fa fa-envelope',
		);



		if ( $location === 'secondary-nav' ) {
			echo '<ul id="social">';
		}

		foreach ( $social_networks as $network_name => $icon_class ) {

			if ( $network_name === 'rss' ) {
				if ( ! empty( $nectar_options[ 'use-' . $network_name . '-icon-header' ] ) && $nectar_options[ 'use-' . $network_name . '-icon-header' ] === '1' ) {
					$nectar_rss_url_link = ( ! empty( $nectar_options['rss-url'] ) ) ? $nectar_options['rss-url'] : get_bloginfo( 'rss_url' );
					
					if( $location !== 'main-nav' ) { echo '<li>'; }
					echo '<a target="_blank" href="' . esc_url( $nectar_rss_url_link ) . '"><i class="' . esc_attr($icon_class) . '"></i> </a>';
					if( $location !== 'main-nav' ) { echo '</li>'; }
					
				}
			} else {
				$target_attr = ($network_name != 'email' && $network_name != 'phone') ? 'target="_blank"' : '';
				if ( ! empty( $nectar_options[ 'use-' . $network_name . '-icon-header' ] ) && $nectar_options[ 'use-' . $network_name . '-icon-header' ] === '1' ) {
					
					if( $location !== 'main-nav' ) { echo '<li>'; }
					if( isset($nectar_options[ $network_name . '-url' ]) ) {
						echo '<a '.$target_attr.' href="' . esc_url( $nectar_options[ $network_name . '-url' ] ) . '"><i class="' . esc_attr($icon_class) . '"></i> </a>';
					} else {
						echo '<a '.$target_attr.' href="#"><i class="' . esc_attr($icon_class) . '"></i> </a>';
					}
					if( $location !== 'main-nav' ) { echo '</li>'; }
					
				}
			}
		}

		if ( $location === 'secondary-nav' ) {
			echo '</ul>';
		}


	}
}




/**
 * Off canvas menu social icons.
 *
 * @since 1.0
 */
if ( ! function_exists( 'nectar_ocm_add_social' ) ) {
	function nectar_ocm_add_social() {
		
		global $nectar_options;
		
		$social_link_arr = array( 
			'twitter-url', 
			'facebook-url', 
			'vimeo-url', 
			'pinterest-url', 
			'linkedin-url', 
			'youtube-url', 
			'tumblr-url', 
			'dribbble-url', 
			'rss-url',
			'github-url', 
			'behance-url', 
			'google-plus-url', 
			'instagram-url', 
			'stackexchange-url', 
			'soundcloud-url', 
			'flickr-url', 
			'spotify-url', 
			'vk-url', 
			'vine-url', 
			'houzz-url', 
			'yelp-url', 
			'bandcamp-url', 
			'tripadvisor-url', 
			'mixcloud-url', 
			'snapchat-url', 
			'telegram-url', 
			'slack-url', 
			'medium-url', 
			'artstation-url', 
			'discord-url', 
			'whatsapp-url',
			'phone-url', 
			'email-url' 
		);
		$social_icon_arr = array( 
			'fa fa-twitter', 
			'fa fa-facebook', 
			'fa fa-vimeo', 
			'fa fa-pinterest', 
			'fa fa-linkedin', 
			'fa fa-youtube-play', 
			'fa fa-tumblr', 
			'fa fa-dribbble', 
			'fa fa-rss', 
			'fa fa-github-alt', 
			'fa fa-behance', 
			'fa fa-google-plus', 
			'fa fa-instagram', 
			'fa fa-stackexchange', 
			'fa fa-soundcloud', 
			'fa fa-flickr', 
			'icon-salient-spotify', 
			'fa fa-vk', 
			'fa-vine', 
			'fa-houzz', 
			'fa-yelp', 
			'fa-bandcamp', 
			'fa-tripadvisor', 
			'fa-mixcloud', 
			'fa fa-snapchat', 
			'fa fa-telegram', 
			'fa fa-slack', 
			'fa fa-medium', 
			'icon-salient-artstation', 
			'icon-salient-discord', 
			'fa fa-whatsapp', 
			'fa fa-phone', 
			'fa fa-envelope' );
		
		echo '<ul class="off-canvas-social-links">';
		
		for ( $i = 0; $i < count( $social_link_arr ); $i++ ) {
			
			if ( ! empty( $nectar_options[ $social_link_arr[ $i ] ] ) && strlen( $nectar_options[ $social_link_arr[ $i ] ] ) > 1 ) {
				echo '<li><a target="_blank" href="' . esc_url( $nectar_options[ $social_link_arr[ $i ] ] ) . '"><i class="' . esc_attr( $social_icon_arr[ $i ] ) . '"></i></a></li>';
			}
		}
		
		echo '</ul>';
		
	}
	
}



/**
 * Output Button links in navigation.
 *
 * @since 9.0
 */
if ( ! function_exists( 'nectar_header_button_items' ) ) {

	function nectar_header_button_items() {
		global $nectar_options;
		global $woocommerce;
		
		$side_widget_class    = ( ! empty( $nectar_options['header-slide-out-widget-area-style'] ) ) ? $nectar_options['header-slide-out-widget-area-style'] : 'slide-out-from-right';
		$header_search        = ( ! empty( $nectar_options['header-disable-search'] ) && $nectar_options['header-disable-search'] === '1' ) ? 'false' : 'true';
		$user_account_btn     = ( ! empty( $nectar_options['header-account-button'] ) && $nectar_options['header-account-button'] === '1' ) ? 'true' : 'false';
		$user_account_btn_url = ( ! empty( $nectar_options['header-account-button-url'] ) ) ? $nectar_options['header-account-button-url'] : '';
		$header_format        = ( ! empty( $nectar_options['header_format'] ) ) ? $nectar_options['header_format'] : 'default';

		$theme_skin = ( ! empty( $nectar_options['theme-skin'] ) ) ? $nectar_options['theme-skin'] : 'original';
		if ( $header_format === 'centered-menu-bottom-bar' ) {
			$theme_skin = 'material'; 
		}

		$side_widget_area = ( ! empty( $nectar_options['header-slide-out-widget-area'] ) && $header_format !== 'left-header' ) ? $nectar_options['header-slide-out-widget-area'] : 'off';

		if ( $header_search != 'false' ) {
			echo '<li id="search-btn"><div><a href="#searchbox"><span class="icon-salient-search" aria-hidden="true"></span></a></div> </li>';
		}

		if ( $user_account_btn != 'false' ) {
			echo '<li id="nectar-user-account"><div><a href="' . $user_account_btn_url . '"><span class="icon-salient-m-user" aria-hidden="true"></span></a></div> </li>';
		}

		if ( ! empty( $nectar_options['enable-cart'] ) && $nectar_options['enable-cart'] == '1' ) {
			if ( $woocommerce ) {
				echo '<li class="nectar-woo-cart">' . nectar_header_cart_output() . '</li>';
			}
		}

		if ( $side_widget_area === '1' && $side_widget_class !== 'simple' ) {
			echo '<li class="slide-out-widget-area-toggle" data-icon-animation="simple-transform">';
				echo '<div> <a href="#sidewidgetarea" class="closed"> <span> <i class="lines-button x2"> <i class="lines"></i> </i> </span> </a> </div>';
			echo '</li>';
		}

	}
}




/**
 * Check if any header buttons are in use.
 *
 * @since 9.0
 */
if ( ! function_exists( 'nectar_header_button_check' ) ) {
	function nectar_header_button_check() {

		global $nectar_options;
		global $woocommerce;

		$header_format     = ( ! empty( $nectar_options['header_format'] ) ) ? $nectar_options['header_format'] : 'default';
		$using_header_cart = ( $woocommerce && ! empty( $nectar_options['enable-cart'] ) && $nectar_options['enable-cart'] === '1' ) ? true : false;
		$user_account_btn  = ( ! empty( $nectar_options['header-account-button'] ) && $nectar_options['header-account-button'] === '1' ) ? true : false;
		$header_search     = ( ! empty( $nectar_options['header-disable-search'] ) && $nectar_options['header-disable-search'] === '1' ) ? false : true;
		$side_widget_area  = ( ! empty( $nectar_options['header-slide-out-widget-area'] ) && $header_format !== 'left-header' && $nectar_options['header-slide-out-widget-area'] === '1' ) ? true : false;

		$header_buttons_active = ( $using_header_cart || $user_account_btn || $header_search || $side_widget_area ) ? 'yes' : 'no';

		return $header_buttons_active;
	}
}



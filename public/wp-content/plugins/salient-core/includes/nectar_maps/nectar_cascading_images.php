<?php 

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$nectar_offset_vals_arr = array(
	"0%" => "0%",
	"5%" => "5%",
	"10%" => "10%",
	"15%" => "15%",	
	"20%" => "20%",
	"25%" => "25%",
	"30%" => "30%",
	"35%" => "35%",	
	"40%" => "40%",
	"45%" => "45%",	
	"50%" => "50%",
	"55%" => "55%",
	"60%" => "60%",
	"65%" => "65%",	
	"70%" => "70%",
	"75%" => "75%",	
	"80%" => "80%",
	"85%" => "85%",	
	"90%" => "90%",
	"95%" => "95%",	
	"100%" => "100%"
);

return array(
	"name" => esc_html__("Cascading Images", "salient-core"),
	"base" => "nectar_cascading_images",
	"icon" => "icon-wpb-images-stack",
	"category" => esc_html__('Nectar Elements', 'salient-core'),
	"description" => esc_html__('Animated overlapping images', 'salient-core'),
	"params" => array(
		
		array(
			"type" => "fws_image",
			"heading" => esc_html__("Image #1", "salient-core"),
			"param_name" => "image_1_url",
			"group" => 'Layer #1',
			"value" => "",
			"description" => esc_html__("Select image from media library.", "salient-core")
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"group" => 'Layer #1',
			"heading" => "Layer BG Color",
			"param_name" => "image_1_bg_color",
			"value" => "",
			"description" => "Use this to set a BG color for the layer"
		),
		array(
			"type" => "dropdown",
			"group" => 'Layer #1',
			"heading" => esc_html__("Offset X", "salient-core"),
			"param_name" => "image_1_offset_x_sign",
			"value" => array(
				"+" => "+",
				"-" => "-"
			),
			"edit_field_class" => "col-md-2",
			'save_always' => true
		),
		array(
			"type" => "dropdown",
			"group" => 'Layer #1',
			"heading" => esc_html__("Offset X", "salient-core"),
			"param_name" => "image_1_offset_x",
			"edit_field_class" => "col-md-4",
			"value" => $nectar_offset_vals_arr,
			'save_always' => true
		),
		array(
			"type" => "dropdown",
			"group" => 'Layer #1',
			"heading" => esc_html__("Offset Y", "salient-core"),
			"param_name" => "image_1_offset_y_sign",
			'edit_field_class' => 'offset-y-sign',
			"edit_field_class" => "col-md-2",
			"value" => array(
				"+" => "+",
				"-" => "-"
			),
			'save_always' => true
		),
		array(
			"type" => "dropdown",
			"group" => 'Layer #1',
			"heading" => esc_html__("Offset Y", "salient-core"),
			"param_name" => "image_1_offset_y",
			"value" => $nectar_offset_vals_arr,
			'edit_field_class' => 'offset-y',
			"edit_field_class" => "col-md-4",
			'save_always' => true
		),
		array(
			"type" => "dropdown",
			"group" => 'Layer #1',
			"heading" => esc_html__("Rotate", "salient-core"),
			"param_name" => "image_1_rotate_sign",
			"value" => array(
				"+" => "+",
				"-" => "-"
			),
			"edit_field_class" => "col-md-2",
			'save_always' => true
		),
		array(
			"type" => "dropdown",
			"group" => 'Layer #1',
			"heading" => esc_html__("Rotate", "salient-core"),
			"param_name" => "image_1_rotate",
			"edit_field_class" => "col-md-4",
			"value" => array(
				"None" => "none",
				"2.5°" => "2.5",
				"5°" => "5",
				"7.5°" => "7.5",	
				"10°" => "10",
				"12.5°" => "12.5",
				"15°" => "15",
				"17.5°" => "17.5",	
				"20°" => "20"
			),
			'save_always' => true
		),
		array(
			"type" => "dropdown",
			"heading" => esc_html__("CSS Animation", "salient-core"),
			"group" => 'Layer #1',
			"param_name" => "image_1_animation",
			"admin_label" => true,
			"value" => array(
				esc_html__("Fade In", "salient-core") => "Fade In", 
				esc_html__("Fade In From Left", "salient-core") => "Fade In From Left", 
				esc_html__("Fade In From Right", "salient-core") => "Fade In From Right", 
				esc_html__("Fade In From Bottom", "salient-core") => "Fade In From Bottom", 
				esc_html__("Grow In", "salient-core") => "Grow In",
				esc_html__("Flip In", "salient-core") => "Flip In",
				esc_html__("None", "salient-core") => "None"
			),
			'save_always' => true,
			"description" => esc_html__("Select animation type if you want this layer to be animated when it enters into the browsers viewport.", "salient-core")
		),
		array(
			"type" => "dropdown",
			"group" => 'Layer #1',
			"heading" => esc_html__("Box Shadow", "salient-core"),
			'save_always' => true,
			"param_name" => "image_1_box_shadow",
			"value" => array(esc_html__("None", "salient-core") => "none", esc_html__("Small Depth", "salient-core") => "small_depth", esc_html__("Medium Depth", "salient-core") => "medium_depth", esc_html__("Large Depth", "salient-core") => "large_depth", esc_html__("Very Large Depth", "salient-core") => "x_large_depth"),
			"description" => esc_html__("Select your desired image box shadow", "salient-core")
		),
		
		array(
			"type" => "fws_image",
			"group" => 'Layer #2',
			"heading" => esc_html__("Image #2", "salient-core"),
			"param_name" => "image_2_url",
			"value" => "",
			"description" => esc_html__("Select image from media library.", "salient-core")
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"group" => 'Layer #2',
			"heading" => "Layer BG Color",
			"param_name" => "image_2_bg_color",
			"value" => "",
			"description" => "Use this to set a BG color for the layer"
		),
		array(
			"type" => "dropdown",
			"group" => 'Layer #2',
			"heading" => esc_html__("Offset X", "salient-core"),
			"param_name" => "image_2_offset_x_sign",
			"value" => array(
				"+" => "+",
				"-" => "-"
			),
			"edit_field_class" => "col-md-2",
			'save_always' => true
		),
		array(
			"type" => "dropdown",
			"group" => 'Layer #2',
			"heading" => esc_html__("Offset X", "salient-core"),
			"param_name" => "image_2_offset_x",
			"edit_field_class" => "col-md-4",
			"value" => $nectar_offset_vals_arr,
			'save_always' => true
		),
		array(
			"type" => "dropdown",
			"group" => 'Layer #2',
			"heading" => esc_html__("Offset Y", "salient-core"),
			"param_name" => "image_2_offset_y_sign",
			'edit_field_class' => 'offset-y-sign',
			"edit_field_class" => "col-md-2",
			"value" => array(
				"+" => "+",
				"-" => "-"
			),
			'save_always' => true
		),
		array(
			"type" => "dropdown",
			"group" => 'Layer #2',
			"heading" => esc_html__("Offset Y", "salient-core"),
			"param_name" => "image_2_offset_y",
			"value" => $nectar_offset_vals_arr,
			'edit_field_class' => 'offset-y',
			"edit_field_class" => "col-md-4",
			'save_always' => true
		),
		array(
			"type" => "dropdown",
			"group" => 'Layer #2',
			"heading" => esc_html__("Rotate", "salient-core"),
			"param_name" => "image_2_rotate_sign",
			"value" => array(
				"+" => "+",
				"-" => "-"
			),
			"edit_field_class" => "col-md-2",
			'save_always' => true
		),
		array(
			"type" => "dropdown",
			"group" => 'Layer #2',
			"heading" => esc_html__("Rotate", "salient-core"),
			"param_name" => "image_2_rotate",
			"edit_field_class" => "col-md-4",
			"value" => array(
				"None" => "none",
				"2.5°" => "2.5",
				"5°" => "5",
				"7.5°" => "7.5",	
				"10°" => "10",
				"12.5°" => "12.5",
				"15°" => "15",
				"17.5°" => "17.5",	
				"20°" => "20"
			),
			'save_always' => true
		),
		array(
			"type" => "dropdown",
			"heading" => esc_html__("CSS Animation", "salient-core"),
			"group" => 'Layer #2',
			"param_name" => "image_2_animation",
			"value" => array(
				esc_html__("Fade In", "salient-core") => "Fade In", 
				esc_html__("Fade In From Left", "salient-core") => "Fade In From Left", 
				esc_html__("Fade In From Right", "salient-core") => "Fade In From Right", 
				esc_html__("Fade In From Bottom", "salient-core") => "Fade In From Bottom", 
				esc_html__("Grow In", "salient-core") => "Grow In",
				esc_html__("Flip In", "salient-core") => "Flip In",
				esc_html__("None", "salient-core") => "None"
			),
			'save_always' => true,
			"description" => esc_html__("Select animation type if you want this layer to be animated when it enters into the browsers viewport.", "salient-core")
		),
		array(
			"type" => "dropdown",
			"group" => 'Layer #2',
			"heading" => esc_html__("Box Shadow", "salient-core"),
			'save_always' => true,
			"param_name" => "image_2_box_shadow",
			"value" => array(esc_html__("None", "salient-core") => "none", esc_html__("Small Depth", "salient-core") => "small_depth", esc_html__("Medium Depth", "salient-core") => "medium_depth", esc_html__("Large Depth", "salient-core") => "large_depth", esc_html__("Very Large Depth", "salient-core") => "x_large_depth"),
			"description" => esc_html__("Select your desired image box shadow", "salient-core")
		),
		
		array(
			"type" => "fws_image",
			"group" => 'Layer #3',
			"heading" => esc_html__("Image #3", "salient-core"),
			"param_name" => "image_3_url",
			"value" => "",
			"description" => esc_html__("Select image from media library.", "salient-core")
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"group" => 'Layer #3',
			"heading" => "Layer BG Color",
			"param_name" => "image_3_bg_color",
			"value" => "",
			"description" => esc_html__("Use this to set a BG color for the layer", "salient-core")
		),
		array(
			"type" => "dropdown",
			"group" => 'Layer #3',
			"heading" => esc_html__("Offset X", "salient-core"),
			"param_name" => "image_3_offset_x_sign",
			"value" => array(
				"+" => "+",
				"-" => "-"
			),
			"edit_field_class" => "col-md-2",
			'save_always' => true
		),
		array(
			"type" => "dropdown",
			"group" => 'Layer #3',
			"heading" => esc_html__("Offset X", "salient-core"),
			"param_name" => "image_3_offset_x",
			"edit_field_class" => "col-md-4",
			"value" => $nectar_offset_vals_arr,
			'save_always' => true
		),
		array(
			"type" => "dropdown",
			"group" => 'Layer #3',
			"heading" => esc_html__("Offset Y", "salient-core"),
			"param_name" => "image_3_offset_y_sign",
			'edit_field_class' => 'offset-y-sign',
			"edit_field_class" => "col-md-2",
			"value" => array(
				"+" => "+",
				"-" => "-"
			),
			'save_always' => true
		),
		array(
			"type" => "dropdown",
			"group" => 'Layer #3',
			"heading" => esc_html__("Offset Y", "salient-core"),
			"param_name" => "image_3_offset_y",
			"value" => $nectar_offset_vals_arr,
			'edit_field_class' => 'offset-y',
			"edit_field_class" => "col-md-4",
			'save_always' => true
		),
		array(
			"type" => "dropdown",
			"group" => 'Layer #3',
			"heading" => esc_html__("Rotate", "salient-core"),
			"param_name" => "image_3_rotate_sign",
			"value" => array(
				"+" => "+",
				"-" => "-"
			),
			"edit_field_class" => "col-md-2",
			'save_always' => true
		),
		array(
			"type" => "dropdown",
			"group" => 'Layer #3',
			"heading" => esc_html__("Rotate", "salient-core"),
			"param_name" => "image_3_rotate",
			"edit_field_class" => "col-md-4",
			"value" => array(
				"None" => "none",
				"2.5°" => "2.5",
				"5°" => "5",
				"7.5°" => "7.5",	
				"10°" => "10",
				"12.5°" => "12.5",
				"15°" => "15",
				"17.5°" => "17.5",	
				"20°" => "20"
			),
			'save_always' => true
		),
		array(
			"type" => "dropdown",
			"heading" => esc_html__("CSS Animation", "salient-core"),
			"group" => 'Layer #3',
			"param_name" => "image_3_animation",
			"value" => array(
				esc_html__("Fade In", "salient-core") => "Fade In", 
				esc_html__("Fade In From Left", "salient-core") => "Fade In From Left", 
				esc_html__("Fade In From Right", "salient-core") => "Fade In From Right", 
				esc_html__("Fade In From Bottom", "salient-core") => "Fade In From Bottom", 
				esc_html__("Grow In", "salient-core") => "Grow In",
				esc_html__("Flip In", "salient-core") => "Flip In",
				esc_html__("None", "salient-core") => "None"
			),
			'save_always' => true,
			"description" => esc_html__("Select animation type if you want this layer to be animated when it enters into the browsers viewport.", "salient-core")
		),
		array(
			"type" => "dropdown",
			"group" => 'Layer #3',
			"heading" => esc_html__("Box Shadow", "salient-core"),
			'save_always' => true,
			"param_name" => "image_3_box_shadow",
			"value" => array(esc_html__("None", "salient-core") => "none", esc_html__("Small Depth", "salient-core") => "small_depth", esc_html__("Medium Depth", "salient-core") => "medium_depth", esc_html__("Large Depth", "salient-core") => "large_depth", esc_html__("Very Large Depth", "salient-core") => "x_large_depth"),
			"description" => esc_html__("Select your desired image box shadow", "salient-core")
		),
		
		array(
			"type" => "fws_image",
			"group" => 'Layer #4',
			"heading" => esc_html__("Image #4", "salient-core"),
			"param_name" => "image_4_url",
			"value" => "",
			"description" => esc_html__("Select image from media library.", "salient-core")
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"group" => 'Layer #4',
			"heading" => "Layer BG Color",
			"param_name" => "image_4_bg_color",
			"value" => "",
			"description" => esc_html__("Use this to set a BG color for the layer", "salient-core")
		),
		array(
			"type" => "dropdown",
			"group" => 'Layer #4',
			"heading" => esc_html__("Offset X", "salient-core"),
			"param_name" => "image_4_offset_x_sign",
			"value" => array(
				"+" => "+",
				"-" => "-"
			),
			"edit_field_class" => "col-md-2",
			'save_always' => true
		),
		array(
			"type" => "dropdown",
			"group" => 'Layer #4',
			"heading" => esc_html__("Offset X", "salient-core"),
			"param_name" => "image_4_offset_x",
			"edit_field_class" => "col-md-4",
			"value" => $nectar_offset_vals_arr,
			'save_always' => true
		),
		array(
			"type" => "dropdown",
			"group" => 'Layer #4',
			"heading" => esc_html__("Offset Y", "salient-core"),
			"param_name" => "image_4_offset_y_sign",
			'edit_field_class' => 'offset-y-sign',
			"edit_field_class" => "col-md-2",
			"value" => array(
				"+" => "+",
				"-" => "-"
			),
			'save_always' => true
		),
		array(
			"type" => "dropdown",
			"group" => 'Layer #4',
			"heading" => esc_html__("Offset Y", "salient-core"),
			"param_name" => "image_4_offset_y",
			"value" => $nectar_offset_vals_arr,
			'edit_field_class' => 'offset-y',
			"edit_field_class" => "col-md-4",
			'save_always' => true
		),
		array(
			"type" => "dropdown",
			"group" => 'Layer #4',
			"heading" => esc_html__("Rotate", "salient-core"),
			"param_name" => "image_4_rotate_sign",
			"value" => array(
				"+" => "+",
				"-" => "-"
			),
			"edit_field_class" => "col-md-2",
			'save_always' => true
		),
		array(
			"type" => "dropdown",
			"group" => 'Layer #4',
			"heading" => esc_html__("Rotate", "salient-core"),
			"param_name" => "image_4_rotate",
			"edit_field_class" => "col-md-4",
			"value" => array(
				"None" => "none",
				"2.5°" => "2.5",
				"5°" => "5",
				"7.5°" => "7.5",	
				"10°" => "10",
				"12.5°" => "12.5",
				"15°" => "15",
				"17.5°" => "17.5",	
				"20°" => "20"
			),
			'save_always' => true
		),
		array(
			"type" => "dropdown",
			"heading" => esc_html__("CSS Animation", "salient-core"),
			"group" => 'Layer #4',
			"param_name" => "image_4_animation",
			"value" => array(
				esc_html__("Fade In", "salient-core") => "Fade In", 
				esc_html__("Fade In From Left", "salient-core") => "Fade In From Left", 
				esc_html__("Fade In From Right", "salient-core") => "Fade In From Right", 
				esc_html__("Fade In From Bottom", "salient-core") => "Fade In From Bottom", 
				esc_html__("Grow In", "salient-core") => "Grow In",
				esc_html__("Flip In", "salient-core") => "Flip In",
				esc_html__("None", "salient-core") => "None"
			),
			'save_always' => true,
			"description" => esc_html__("Select animation type if you want this layer to be animated when it enters into the browsers viewport.", "salient-core")
		),
		array(
			"type" => "dropdown",
			"group" => 'Layer #4',
			"heading" => esc_html__("Box Shadow", "salient-core"),
			'save_always' => true,
			"param_name" => "image_4_box_shadow",
			"value" => array(esc_html__("None", "salient-core") => "none", esc_html__("Small Depth", "salient-core") => "small_depth", esc_html__("Medium Depth", "salient-core") => "medium_depth", esc_html__("Large Depth", "salient-core") => "large_depth", esc_html__("Very Large Depth", "salient-core") => "x_large_depth"),
			"description" => esc_html__("Select your desired image box shadow", "salient-core")
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Time Between Animations", "salient-core"),
			"param_name" => "animation_timing",
			"description" => esc_html__("Enter your desired time between animations in milliseconds, defaults to 200 if left blank", "salient-core")
		),
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Layer Border Radius", "salient-core"),
			'save_always' => true,
			"param_name" => "border_radius",
			"value" => array(
				esc_html__("0px", "salient-core") => "none",
				esc_html__("3px", "salient-core") => "3px",
				esc_html__("5px", "salient-core") => "5px", 
				esc_html__("10px", "salient-core") => "10px", 
				esc_html__("15px", "salient-core") => "15px", 
				esc_html__("20px", "salient-core") => "20px"),
			)
			
		)
		
	);
	
	?>
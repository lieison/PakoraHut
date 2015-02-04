<?php
$output = $el_class = '';
extract(shortcode_atts(array(
    'el_class' => '',
	'background_color' => '',
	'background_image' => '',
	'custom_background' => '',
	'min_height' => '',
	'parallax' => '',
    'bg_image'        => '',
    'bg_color'        => '',
    'bg_image_repeat' => '',
    'font_color'      => '',
    'padding'         => '',
    'margin_bottom'   => '',
	'css' => ''
), $atts));

// Scrape Background CSS
if(preg_match('/\bbackground\b/i', $css))
{
    $background_css = 'yes';
}

wp_enqueue_style( 'js_composer_front' );
wp_enqueue_script( 'wpb_composer_front_js' );
wp_enqueue_style('js_composer_custom_css');

$el_class = $this->getExtraClass($el_class);

$css_class =  apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'wpb_row '.get_row_css_class().$el_class, $this->settings['base']);

// Row background color / image ( themeva )

$background_style = $style = '';

// Convert existing data
if( !empty( $background_image ) && empty( $bg_image ) ) $bg_image = $background_image;
if( !empty( $background_color ) && empty( $bg_color ) ) $bg_color = $background_color;

if( $custom_background == 'custom' && ( !empty( $bg_image ) || !empty( $bg_color ) ) )
{	
	// Add Classes
	$css_class .= ' custom-row';
	if( !empty( $parallax ) ) 
	{
		$css_class .= ' parallax';
		wp_deregister_script('jquery-parallax');
		wp_register_script('jquery-parallax',get_template_directory_uri().'/js/jquery.parallax-1.1.3.js',false,array('jquery'),true);
		wp_enqueue_script('jquery-parallax');		 
	}
	
	if( !empty( $bg_image ) )
	{
		$get_image_src = wp_get_attachment_image_src( $bg_image, 'full' );
		$bg_image = $get_image_src[0];		
	}
			
	// Add CSS Style
	if( !empty( $bg_color ) ) $style .= 'background-color:'. $bg_color .';';
	if( !empty( $bg_image ) ) $style .= 'background-image: url('. $bg_image .');';
	
	$background_style = $this->buildStyle('', $bg_color, $bg_image_repeat, $font_color, $padding, $margin_bottom);	
	
	if( !empty( $style ) && !empty( $background_style ) )
	{
		$background_style = rtrim( $background_style, '"');	
		$background_style .= $style .'"';
	}
	elseif( !empty( $style ) && empty( $background_style ) )
	{
		$background_style = 'style="'. $style .'"';
	}
}
elseif( $custom_background == 'inherit' )
{
	$background_style = $this->buildStyle( '', '', '', $font_color, $padding, $margin_bottom );
	
	$css_class .= ' custom-row-inherit';	
}
else
{
	$background_style = $this->buildStyle( '', '', '', $font_color, $padding, $margin_bottom );	
}

$output .= '<div class="'.$css_class.'" '. $background_style .'>';

if( $custom_background == 'custom' )
{
	$output .= '<div class="parallax-wrap"><div class="parallax-content" '. ( !empty( $min_height ) ? 'style="height:'. $min_height .'px"' : '' ) .'>'. wpb_js_remove_wpautop($content) .'</div></div>';
}
else
{
	$output .= wpb_js_remove_wpautop($content);
}


$output .= '</div>'.$this->endBlockComment('row');

echo $output;
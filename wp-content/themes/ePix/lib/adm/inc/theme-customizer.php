<?php

	add_action( 'customize_register', 'epix_customize_register' );
	
	function customizer_options($skin)
	{
		// Font List
		global $nv_font;
		
		$font_list[''] = 'Select Font Family';

		foreach( $nv_font as $font => $value )
		{
			$font_list[$value] = $font;
		}		
		
		if( of_get_option("nv_font_type") != "disable" && of_get_option("nv_font_type") != "enable" )
		{
			global $themeva_googlefont;
			
			$google_fonts['-'] = '----- Google Fonts -----';
			
			foreach( $themeva_googlefont as $font => $value )
			{
				$google_fonts[$font] = $font;
			}
			
			$font_list = $heading_font_list = array_merge( $font_list , $google_fonts );
			
		}
		elseif( of_get_option("nv_font_type") == "enable" )
		{
			global $themeva_cufonfont;

			$cufon_fonts['-'] = '----- Cufon Fonts -----';
			
			foreach( $themeva_cufonfont as $font => $value )
			{
				$cufon_fonts[$value] = $font;
			}
			
			$heading_font_list = array_merge( $font_list , $cufon_fonts );			
		}
		else
		{
			$heading_font_list = $font_list;
		}
		
		// Patterns 
		
		$patterns = array(
			"" => "Select Pattern",
			"pattern-a" => "pattern-a",
			"pattern-b" => "pattern-b",
			"pattern-c" => "pattern-c",
			"pattern-d" => "pattern-d",
			"pattern-e" => "pattern-e",
			"pattern-f" => "pattern-f",
			"pattern-g" => "pattern-g",
			"pattern-h" => "pattern-h",
			"pattern-i" => "pattern-i",
			"pattern-j" => "pattern-j",
			"pattern-k" => "pattern-k",
			"pattern-l" => "pattern-l",
			"pattern-m" => "pattern-m",
			"pattern-n" => "pattern-n",
			"pattern-o" => "pattern-o",
			"pattern-p" => "pattern-p",
			"pattern-q" => "pattern-q",
			"pattern-r" => "pattern-r",
			"pattern-s" => "pattern-s",
			"pattern-t" => "pattern-t",
			"pattern-u" => "pattern-u",
		);		
		
		$options_array = array(	
	
			/* ------------------------------------
			:: GENERAL SECTION
			------------------------------------ */	
/*
			// Header Heading
			'global_header_heading'  => array(
				'name' 	  => 'global_header_heading',
				'label'   => __( 'Global Header Settings', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'heading',
				'section' => 'themeva_general',
				'priority' => 2
			),	

			// Header Height
			'header_height' => array(
				'name'	  => 'header_height',
				'label'   => __( 'Minimum Header Height', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'range',
				'max'	  => '500',
				'min'	  => '0',
				'section' => 'themeva_general',
				'css' 	  => '#header',
				'js'	  => 'css("min-height", to +"px")',
				'live'	  => 'yes',
				'priority' => 3
			),			

			// Branding Display
			'branding_disable'  => array(
				'name' 	  => 'branding_disable',
				'label'   => __( 'Branding Display', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'select',
				'choices' => array(
					'enable' => 'Enabled',
					'disable' => 'Disable',
				),
				'section' => 'themeva_general',
				'priority' => 4
			),

			// Branding Alignment
			'branding_alignment'  => array(
				'name' 	  => 'branding_alignment',
				'label'   => __( 'Branding Alignment', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'select',
				'choices' => array(
					'left' => 'Left',
					'center' => 'Center',
					'right' => 'Right',
				),
				'section' => 'themeva_general',
				'css' 	  => '#header-logo',
				'js'	  => 'removeClass("left right center").addClass( to )',
				'live'	  => 'yes',
				'priority' => 4
			),

			// Branding Margin
			'branding_margin' => array(
				'name'	  => 'branding_margin',
				'label'   => __( 'Branding Top Margin', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'range',
				'max'	  => '500',
				'min'	  => '-200',
				'default' => '',
				'section' => 'themeva_general',
				'css' 	  => '#primary-wrapper #header-logo',
				'js'	  => 'css("margin-top", to +"px")',
				'live'	  => 'yes',
				'priority' => 5
			),	

			// Menu Alignment
			'menu_alignment'  => array(
				'name' 	  => 'menu_alignment',
				'label'   => __( 'Menu Alignment', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'select',
				'choices' => array(
					'left' => 'Left',
					'center' => 'Center',
					'right' => 'Right',
				),
				'section' => 'themeva_general',
				'css' 	  => '#nv-tabs',
				'js'	  => 'removeClass("left right center").addClass( to )',
				'live'	  => 'yes',
				'priority' => 6
			),

			// Menu Margin
			'menu_margin' => array(
				'name'	  => 'menu_margin',
				'label'   => __( 'Menu Top Margin', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'range',
				'max'	  => '500',
				'min'	  => '-200',
				'default' => '',
				'section' => 'themeva_general',
				'css' 	  => '#nv-tabs',
				'js'	  => 'css("margin-top", to +"px")',
				'live'	  => 'yes',
				'priority' => 7
			),	

			/* ------------------------------------
			:: HEADER SECTION
			------------------------------------ */		

			// Branding Version
			'branding_ver'  => array(
				'name' 	  => 'skin_data_'. $skin .'[skin_id_branding_ver]',
				'label'   => __( 'Branding Version', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'select',
				'choices' => array(
					'primary' => 'Primary',
					'secondary' => 'Secondary',
				),
				'section' => 'themeva_header',
				'priority' => 8
			),				

			// Header Heading
			'header_heading'  => array(
				'name' 	  => 'header_heading',
				'label'   => __( 'Background', 'options_framework_themeva' ),
				'desc' => __('Menu Sidebar Background Color / Opacity + Border', 'options_framework_themeva'), 
				'type'	  => 'option',
				'control' => 'heading',
				'section' => 'themeva_header',
				'priority' => 9
			),	

			// Header Background Primary Color
			'header_pri_color' => array(
				'name'	  => 'skin_data_'. $skin .'[skin_id_layer_header_color]',
				'label'   => __( 'Background Color', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'color',
				'section' => 'themeva_header',
				'css' 	  => '#header-bg.skinset-header',
				'js'	  => 'attr("data-pri-color", to ).attr("data-sec-color", to )',
				'func'	  => 'gradient',
				'live'	  => 'yes',
				'priority' => 10
			),	

			// main Background Primary Opacity
			'layer_header_opac' => array(
				'name'	  => 'skin_data_'. $skin .'[skin_id_layer_header_opac]',
				'label'   => __( 'Opacity', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'range',
				'max'	  => '100',
				'min'	  => '0',
				'default' => '100',
				'section' => 'themeva_header',
				'css' 	  => '#header-bg.skinset-header',
				'js'	  => 'attr("data-pri-opac", to ).attr("data-sec-opac", to )',
				'func'	  => 'gradient',
				'live'	  => 'yes',
				'priority' => 11
			),	

			// Shaded Border Color
			'header_border_color' => array(
				'name'	  => 'skin_data_'. $skin .'[skin_id_header_border_color]',
				'label'   => __( 'Outer Border Color', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'color',
				'section' => 'themeva_header',
				'css' 	  => '#header-bg.skinset-header',
				'js'	  => 'css("border-color", to)',
				'live'	  => 'yes',
				'priority' => 12
			),					

			// Header Heading
			'header_shaded_heading'  => array(
				'name' 	  => 'header_shaded_heading',
				'label'   => __( 'Element Areas', 'options_framework_themeva' ),
				'desc' => __('Menu Icons, Search, Accordion, Tabs', 'options_framework_themeva'), 
				'type'	  => 'option',
				'control' => 'heading',
				'section' => 'themeva_header',
				'priority' => 13
			),				

			// Element Color
			'header_element_color' => array(
				'name'	  => 'skin_data_'. $skin .'[skin_id_header_element_color]',
				'label'   => __( 'Color', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'color',
				'section' => 'themeva_header',
				'css' 	  => '#header.skinset-header input[type=\"text\"],#header.skinset-header input[type=\"password\"],#header.skinset-header input[type=\"file\"],#header.skinset-header textarea,#header.skinset-header .dock-tab,#header.skinset-header .dock-tab a',
				'js'	  => 'css("color", to)',
				'live'	  => 'yes',
				'priority' => 14
			),	

			// Element Background Color
			'header_shaded_color' => array(
				'name'	  => 'skin_data_'. $skin .'[skin_id_header_shaded_color]',
				'label'   => __( 'Background Color', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'color',
				'section' => 'themeva_header',
				'css' 	  => '#header.skinset-header input[type=\"text\"],#header.skinset-header input[type=\"password\"],#header.skinset-header input[type=\"file\"],#header.skinset-header textarea,#header.skinset-header .dock-tab',
				'js'	  => 'css("background-color", to)',
				'live'	  => 'yes',
				'priority' => 15
			),	

			// Shaded Border Color
			'header_shaded_border_color' => array(
				'name'	  => 'skin_data_'. $skin .'[skin_id_header_shaded_border_color]',
				'label'   => __( 'Inner Border / Divider Color', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'color',
				'section' => 'themeva_header',
				'css' 	  => '.skinset-header .sub-header,.skinset-header #nv_selectmenu select,.skinset-header #content article.hentry,.skinset-header .frame .gridimg-wrap,.skinset-header .styledbox.general .boxcontent,.skinset-header .shop-cart .shopping-cart-wrapper,.skinset-header .nv-pricing-container,.skinset-header img.avatar,.skinset-header .tagcloud a,.skinset-header .widget ul,.skinset-header #respond,.skinset-header .hozbreak, .skinset-header hr,.skinset-header ul.dock-tab-wrapper,.skinset-header #lang_sel_list li,.skinset-header .commentlist .children li.comment,.skinset-header #comments-title,.skinset-header .commentlist > li.comment,.skinset-header #payment ul.payment_methods,.skinset-header table.shop_table td,.skinset-header table.shop_table tfoot td,.skinset-header table.shop_table,.skinset-header table.shop_table tfoot th,.skinset-header .cart-collaterals .cart_totals table,.skinset-header .cart-collaterals .cart_totals tr td,.skinset-header .cart-collaterals .cart_totals tr th,.skinset-header .woocommerce form.login,.skinset-header .woocommerce-page form.login,.skinset-header form.checkout_coupon,.skinset-header .woocommerce form.register,.skinset-header .woocommerce-page form.register,.skinset-header ul.product_list_widget li,.skinset-header .post-titles ul.post-metadata-wrap,.skinset-header #nv-tabs ul ul,.skinset-header li.dock-tab',
				'js'	  => 'css("border-color", to)',
				'live'	  => 'yes',
				'priority' => 15
			),						
			

			/* ------------------------------------
			:: HEADER FONT COLORS
			------------------------------------ */				
			
			// Header Heading
			'header_font_colors_heading'  => array(
				'name' 	  => 'header_font_colors_heading',
				'label'   => __( 'Font Colors', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'heading',
				'section' => 'themeva_header',
				'priority' => 35
			),			

			// Font Color
			'header_font_color' => array(
				'name'	  => 'skin_data_'. $skin .'[skin_id_header_font_color]',
				'label'   => __( 'Font Color', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'color',
				'section' => 'themeva_header',
				'css' 	  => '.skinset-header.nv-skin,.skinset-header.nv-skin span.menudesc',
				'js'	  => 'css("color", to )',
				'live'	  => 'yes',
				'priority' => 36
			),					

			// Link Color
			'header_link_color' => array(
				'name'	  => 'skin_data_'. $skin .'[skin_id_header_link_color]',
				'label'   => __( 'Link Color', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'color',
				'section' => 'themeva_header',
				'css' 	  => '.skinset-header.nv-skin a',
				'js'	  => 'css("color", to ).parents(".skinset-header.nv-skin").find(".nv-skin.highlight").css("background-color", to )',
				'live'	  => 'yes',
				'priority' => 37
			),	
			
			// Link Hover Color
			'header_linkhover_color' => array(
				'name'	  => 'skin_data_'. $skin .'[skin_id_header_linkhover_color]',
				'label'   => __( 'Link Hover Color', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'color',
				'section' => 'themeva_header',
				'css' 	  => '.skinset-header.nv-skin a:hover',
				'js'	  => 'css("color", to )',
				'live'	  => 'no',
				'priority' => 38
			),


			// Default H1 Color
			'header_h1_color' => array(
				'name'	  => 'skin_data_'. $skin .'[skin_id_header_h1_color]',
				'label'   => __( 'H1 Color', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'color',
				'section' => 'themeva_header',
				'css' 	  => '.skinset-header h1, .skinset-header h1 a',
				'js'	  => 'css("color", to )',
				'live'	  => 'yes',
				'priority' => 39
			),

			// Default H2 Color
			'header_h2_color' => array(
				'name'	  => 'skin_data_'. $skin .'[skin_id_header_h2_color]',
				'label'   => __( 'H2 Color', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'color',
				'section' => 'themeva_header',
				'css' 	  => '.skinset-header h2, .skinset-header h2 a',
				'js'	  => 'css("color", to )',
				'live'	  => 'yes',
				'priority' => 40
			),			

			// Default h3 Color
			'header_h3_color' => array(
				'name'	  => 'skin_data_'. $skin .'[skin_id_header_h3_color]',
				'label'   => __( 'h3 Color', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'color',
				'section' => 'themeva_header',
				'css' 	  => '.skinset-header h3, .skinset-header h3 a',
				'js'	  => 'css("color", to )',
				'live'	  => 'yes',
				'priority' => 41
			),

			// Default h4 Color
			'header_h4_color' => array(
				'name'	  => 'skin_data_'. $skin .'[skin_id_header_h4_color]',
				'label'   => __( 'h4, h5, h6 Color', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'color',
				'section' => 'themeva_header',
				'css' 	  => '.skinset-header h4, .skinset-header h4 a',
				'js'	  => 'css("color", to )',
				'live'	  => 'yes',
				'priority' => 42
			),			
			
			/* ------------------------------------
			:: BODY SETTINGS
			------------------------------------ */

			// Main Heading
			'main_heading'  => array(
				'name' 	  => 'main_heading',
				'label'   => __( 'Background', 'options_framework_themeva' ),
				'desc' => __('Body Background Color / Opacity + Border', 'options_framework_themeva'), 
				'type'	  => 'option',
				'control' => 'heading',
				'section' => 'themeva_frame',
				'priority' => 7
			),	

			// main Background Color
			'layer_main_color' => array(
				'name'	  => 'skin_data_'. $skin .'[skin_id_layer_main_color]',
				'label'   => __( 'Background Color', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'color',
				'section' => 'themeva_frame',
				'css' 	  => '.skinset-main',
				'js'	  => 'attr("data-pri-color", to ).attr("data-sec-color", to )',
				'func'	  => 'gradient',
				'live'	  => 'yes',
				'priority' => 8
			),

			// main Background Primary Opacity
			'layer_main_opac' => array(
				'name'	  => 'skin_data_'. $skin .'[skin_id_layer_main_opac]',
				'label'   => __( 'Opacity', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'range',
				'max'	  => '100',
				'min'	  => '0',
				'default' => '100',
				'section' => 'themeva_frame',
				'css' 	  => '.skinset-main',
				'js'	  => 'attr("data-pri-opac", to ).attr("data-sec-opac", to )',
				'func'	  => 'gradient',
				'live'	  => 'yes',
				'priority' => 9
			),

			// Border Color
			'main_border_color' => array(
				'name'	  => 'skin_data_'. $skin .'[skin_id_main_border_color]',
				'label'   => __( 'Outer Border Color', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'color',
				'section' => 'themeva_frame',
				'css' 	  => '.skinset-main.main-wrap,.skinset-main.slider-wrap,.skinset-main #footer',
				'js'	  => 'css("border-color", to)',
				'live'	  => 'yes',
				'priority' => 10
			),				

			// Main Heading
			'main_element_heading'  => array(
				'name' 	  => 'main_element_heading',
				'label'   => __( 'Element Areas', 'options_framework_themeva' ),
				'desc' => __('Accordion, Tabs, Search, Dividers', 'options_framework_themeva'), 
				'type'	  => 'option',
				'control' => 'heading',
				'section' => 'themeva_frame',
				'priority' => 12
			),				

			// Element Color
			'main_element_color' => array(
				'name'	  => 'skin_data_'. $skin .'[skin_id_main_element_color]',
				'label'   => __( 'Color', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'color',
				'section' => 'themeva_frame',
				'css' 	  => '.skinset-main .ui-tabs .ui-tabs-nav li a,.skinset-main .ui-accordion-header a,.skinset-main .ui-tabs .ui-tabs-nav li,.skinset-main .ui-accordion-header,.skinset-main pre,.skinset-main xmp,.skinset-main input[type=text],.skinset-main input[type=password],.skinset-main input[type=file],.skinset-main input[type=tel],.skinset-main input[type=url],.skinset-main input[type=email],.skinset-main textarea,.skinset-main select,.skinset-main #searchsubmit,.skinset-main #panelsearchsubmit,.skinset-main .author-info,.skinset-main .frame .gridimg-wrap,.skinset-main .splitter ul li.active,.skinset-main li.pagebutton,.skinset-main .page-numbers li,.skinset-main .styledbox.general.shaded .boxcontent,.skinset-main .nv-pricing-signup,.skinset-main .nv-pricing-content .even,.skinset-main .socialicons .dock-tab,.skinset-main .panelcontent.heading,.skinset-main div.item-list-tabs,.skinset-main .tab-wrap .trigger,.skinset-main .wrapper .intro-text,.skinset-main .vc_progress_bar .vc_single_bar,.skinset-main .zoomflow .controlsCon > .arrow-left,.skinset-main .zoomflow .controlsCon > .arrow-right,.skinset-main li.dock-tab a,.skinset-main #lang_sel_list li,.skinset-main .autototop a,.skinset-main .ui-state-active a,.skinset-main .gallery-wrap .slidernav a,.skinset-main #reviews #comments ol.commentlist li .comment-text,.skinset-main table.shop_table,.skinset-main .commentlist .comment-content',
				'js'	  => 'css("color", to)',
				'live'	  => 'yes',
				'priority' => 13
			),

			// Shaded Background Color
			'main_shaded_color' => array(
				'name'	  => 'skin_data_'. $skin .'[skin_id_main_shaded_color]',
				'label'   => __( 'Background / Border Color', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'color',
				'section' => 'themeva_frame',
				'css' 	  => '.skinset-main .ui-tabs .ui-tabs-nav li,.skinset-main .ui-accordion-header,.skinset-main pre,.skinset-main xmp,.skinset-main input[type=text],.skinset-main input[type=password],.skinset-main input[type=file],.skinset-main input[type=tel],.skinset-main input[type=url],.skinset-main input[type=email],.skinset-main input.input-text,.skinset-main textarea,.skinset-main select,.skinset-main .author-info,.skinset-main .frame .gridimg-wrap,.skinset-main .splitter ul li.active,.skinset-main li.pagebutton,.skinset-main .page-numbers li,.skinset-main .styledbox.general.shaded .boxcontent,.skinset-main .nv-pricing-signup,.skinset-main div.item-list-tabs,.skinset-main .wrapper .intro-text,.skinset-main .vc_progress_bar .vc_single_bar,.skinset-main .zoomflow .controlsCon > .arrow-left,.skinset-main .zoomflow .controlsCon > .arrow-right,.skinset-main #lang_sel_list li,.skinset-main .autototop a,.skinset-main .woocommerce-message,.skinset-main .woocommerce-error,.skinset-main .woocommerce-info,.skinset-main .woocommerce .payment_box,.skinset-main .woocommerce-tabs li,.skinset-main #reviews #comments ol.commentlist li .comment-text,.skinset-main .product-remove a,.skinset-main table.shop_table thead th,.skinset-main .cart_totals .cart-subtotal td,.skinset-main .cart_totals .cart-subtotal th,.skinset-main .cart_totals .total td,.skinset-main .cart_totals .total th,.skinset-main .commentlist .comment-content,.skinset-main .single_variation_wrap .single_variation,.skinset-main .row.custom-row-inherit',
				'js'	  => 'css("background-color", to)',
				'live'	  => 'yes',
				'priority' => 14
			),

			// Shaded Border Color
			'main_shaded_border_color' => array(
				'name'	  => 'skin_data_'. $skin .'[skin_id_main_shaded_border_color]',
				'label'   => __( 'Inner Border / Divider Color', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'color',
				'section' => 'themeva_frame',
				'css' 	  => '.skinset-main .sub-header,.skinset-main #nv_selectmenu select,.skinset-main #content article.hentry,.skinset-main .frame .gridimg-wrap,.skinset-main .styledbox.general .boxcontent,.skinset-main .shop-cart .shopping-cart-wrapper,.skinset-main .nv-pricing-container,.skinset-main img.avatar,.skinset-main .tagcloud a,.skinset-main .widget ul,.skinset-main #respond,.skinset-main .hozbreak, .skinset-main hr,.skinset-main ul.dock-tab-wrapper,.skinset-main #lang_sel_list li,.skinset-main .commentlist .children li.comment,.skinset-main #comments-title,.skinset-main .commentlist > li.comment,.skinset-main #payment ul.payment_methods,.skinset-main table.shop_table td,.skinset-main table.shop_table tfoot td,.skinset-main table.shop_table,.skinset-main table.shop_table tfoot th,.skinset-main .cart-collaterals .cart_totals table,.skinset-main .cart-collaterals .cart_totals tr td,.skinset-main .cart-collaterals .cart_totals tr th,.skinset-main .woocommerce form.login,.skinset-main .woocommerce-page form.login,.skinset-main form.checkout_coupon,.skinset-main .woocommerce form.register,.skinset-main .woocommerce-page form.register,.skinset-main ul.product_list_widget li,.skinset-main .post-titles ul.post-metadata-wrap,.skinset-main .splitter ul li.active,.skinset-main .vc_progress_bar .vc_single_bar,.skinset-main  .ui-tabs .ui-tabs-nav li,.skinset-main .ui-accordion-header, .skinset-main .splitter ul li.active, .skinset-main .row.custom-row-inherit,.skinset-main .styledbox.general.shaded',
				'js'	  => 'css("border-color", to)',
				'live'	  => 'yes',
				'priority' => 15
			),	
		

			/* ------------------------------------
			:: GENERAL FONT COLORS
			------------------------------------ */	

			// Header Heading
			'font_colors_heading'  => array(
				'name' 	  => 'font_colors_heading',
				'label'   => __( 'Font Colors', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'heading',
				'section' => 'themeva_frame',
				'priority' => 35
			),

			// Font Color
			'background_font_color' => array(
				'name'	  => 'skin_data_'. $skin .'[skin_id_background_font_color]',
				'label'   => __( 'Font Color', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'color',
				'section' => 'themeva_frame',
				'css' 	  => '.skinset-background.nv-skin',
				'js'	  => 'css("color", to )',
				'live'	  => 'yes',
				'priority' => 36
			),			

			// Link Color
			'background_link_color' => array(
				'name'	  => 'skin_data_'. $skin .'[skin_id_background_link_color]',
				'label'   => __( 'Link Color', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'color',
				'section' => 'themeva_frame',
				'css' 	  => '.skinset-background.nv-skin a',
				'js'	  => 'css("color", to ).parents(".skinset-background.nv-skin").find(".nv-skin.highlight,.header-infobar").css("background-color", to )',
				'live'	  => 'yes',
				'priority' => 37
			),			

			// Link Hover Color
			'background_linkhover_color' => array(
				'name'	  => 'skin_data_'. $skin .'[skin_id_background_linkhover_color]',
				'label'   => __( 'Link Hover Color', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'color',
				'section' => 'themeva_frame',
				'css' 	  => '.skinset-background.nv-skin a:hover',
				'js'	  => 'css("color", to )',
				'live'	  => 'no',
				'priority' => 38
			),				

			// Default H1 Color
			'background_h1_color' => array(
				'name'	  => 'skin_data_'. $skin .'[skin_id_background_h1_color]',
				'label'   => __( 'H1 Color', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'color',
				'section' => 'themeva_frame',
				'css' 	  => '.skinset-background h1, .skinset-background h1 a',
				'js'	  => 'css("color", to )',
				'live'	  => 'yes',
				'priority' => 39
			),

			// Default H2 Color
			'background_h2_color' => array(
				'name'	  => 'skin_data_'. $skin .'[skin_id_background_h2_color]',
				'label'   => __( 'H2 Color', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'color',
				'section' => 'themeva_frame',
				'css' 	  => '.skinset-background h2, .skinset-background h2 a',
				'js'	  => 'css("color", to )',
				'live'	  => 'yes',
				'priority' => 40
			),

			// Default h3 Color
			'background_h3_color' => array(
				'name'	  => 'skin_data_'. $skin .'[skin_id_background_h3_color]',
				'label'   => __( 'h3 Color', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'color',
				'section' => 'themeva_frame',
				'css' 	  => '.skinset-background h3, .skinset-background h3 a',
				'js'	  => 'css("color", to )',
				'live'	  => 'yes',
				'priority' => 41
			),	

			// Default h4,h5,h6 Color
			'background_h4_color' => array(
				'name'	  => 'skin_data_'. $skin .'[skin_id_background_h4_color]',
				'label'   => __( 'h4, h5, h6 Color', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'color',
				'section' => 'themeva_frame',
				'css' 	  => '.skinset-background h4, .skinset-background h4 a',
				'js'	  => 'css("color", to )',
				'live'	  => 'yes',
				'priority' => 42
			),				

			/* ------------------------------------
			:: SIDEBAR SECTION
			------------------------------------ */	

			// main Background Color
			/*'layer_sidebar_color' => array(
				'name'	  => 'skin_data_'. $skin .'[skin_id_layer_sidebar_color]',
				'label'   => __( 'Background Color', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'color',
				'section' => 'themeva_sidebar',
				'css' 	  => '.skinset-main .sidebar',
				'js'	  => 'css("background-color", to )',
				'live'	  => 'yes',
				'priority' => 8
			),

			/* ------------------------------------
			:: GENERAL FONT COLORS
			------------------------------------ */	

			// Header Heading
			'sidebar_font_colors_heading'  => array(
				'name' 	  => 'sidebar_font_colors_heading',
				'label'   => __( 'Sidebar Font Colors', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'heading',
				'section' => 'themeva_sidebar',
				'priority' => 35
			),

			// Font Color
			'sidebar_font_color' => array(
				'name'	  => 'skin_data_'. $skin .'[skin_id_sidebar_font_color]',
				'label'   => __( 'Font Color', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'color',
				'section' => 'themeva_sidebar',
				'css' 	  => '.skinset-background.nv-skin .sidebar',
				'js'	  => 'css("color", to )',
				'live'	  => 'yes',
				'priority' => 36
			),

			// Link Color
			'sidebar_link_color' => array(
				'name'	  => 'skin_data_'. $skin .'[skin_id_sidebar_link_color]',
				'label'   => __( 'Link Color', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'color',
				'section' => 'themeva_sidebar',
				'css' 	  => '.skinset-background.nv-skin .sidebar a',
				'js'	  => 'css("color", to ).parents(".skinset-background.nv-skin .sidebar").find(".nv-skin.highlight,.header-infobar").css("background-color", to )',
				'live'	  => 'yes',
				'priority' => 37
			),			

			// Link Hover Color
			'sidebar_linkhover_color' => array(
				'name'	  => 'skin_data_'. $skin .'[skin_id_sidebar_linkhover_color]',
				'label'   => __( 'Link Hover Color', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'color',
				'section' => 'themeva_sidebar',
				'css' 	  => '.skinset-background.nv-skin .sidebar a:hover',
				'js'	  => 'css("color", to )',
				'live'	  => 'no',
				'priority' => 38
			),				

			// Default H1 Color
			'sidebar_h1_color' => array(
				'name'	  => 'skin_data_'. $skin .'[skin_id_sidebar_h1_color]',
				'label'   => __( 'H1 Color', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'color',
				'section' => 'themeva_sidebar',
				'css' 	  => '.skinset-background .sidebar h1, .skinset-background .sidebar h1 a',
				'js'	  => 'css("color", to )',
				'live'	  => 'yes',
				'priority' => 39
			),

			// Default H2 Color
			'sidebar_h2_color' => array(
				'name'	  => 'skin_data_'. $skin .'[skin_id_sidebar_h2_color]',
				'label'   => __( 'H2 Color', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'color',
				'section' => 'themeva_sidebar',
				'css' 	  => '.skinset-background .sidebar h2, .skinset-background .sidebar h2 a',
				'js'	  => 'css("color", to )',
				'live'	  => 'yes',
				'priority' => 40
			),

			// Default h3 Color
			'sidebar_h3_color' => array(
				'name'	  => 'skin_data_'. $skin .'[skin_id_sidebar_h3_color]',
				'label'   => __( 'h3 Color', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'color',
				'section' => 'themeva_sidebar',
				'css' 	  => '.skinset-background .sidebar h3, .skinset-background .sidebar h3 a',
				'js'	  => 'css("color", to )',
				'live'	  => 'yes',
				'priority' => 41
			),	

			// Default h4,h5,h6 Color
			'sidebar_h4_color' => array(
				'name'	  => 'skin_data_'. $skin .'[skin_id_sidebar_h4_color]',
				'label'   => __( 'h4, h5, h6 Color', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'color',
				'section' => 'themeva_sidebar',
				'css' 	  => '.skinset-background .sidebar h4, .skinset-background .sidebar h4 a',
				'js'	  => 'css("color", to )',
				'live'	  => 'yes',
				'priority' => 42
			),				
								
			/* ------------------------------------
			:: FOOTER SECTION
			------------------------------------ */

			// footer Background Primary Color
			/*'footer_pri_color' => array(
				'name'	  => 'skin_data_'. $skin .'[skin_id_layer_footer_color]',
				'label'   => __( 'Background Color', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'color',
				'section' => 'themeva_footer',
				'css' 	  => '#footer',
				'js'	  => 'attr("data-pri-color", to ).attr("data-sec-color", to )',
				'func'	  => 'gradient',
				'live'	  => 'yes',
				'priority' => 10
			),	

			// main Background Primary Opacity
			'layer_footer_opac' => array(
				'name'	  => 'skin_data_'. $skin .'[skin_id_layer_footer_opac]',
				'label'   => __( 'Opacity', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'range',
				'max'	  => '100',
				'min'	  => '0',
				'default' => '100',
				'section' => 'themeva_footer',
				'css' 	  => '#footer.skinset-footer',
				'js'	  => 'attr("data-pri-opac", to ).attr("data-sec-opac", to )',
				'func'	  => 'gradient',
				'live'	  => 'yes',
				'priority' => 11
			),				

			/* ------------------------------------
			:: FOOTER FONT COLORS
			------------------------------------ */				

			// Footer Heading
			'footer_font_colors_heading'  => array(
				'name' 	  => 'footer_font_colors_heading',
				'label'   => __( 'Footer Font Colors', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'heading',
				'section' => 'themeva_footer',
				'priority' => 35
			),							
		
			// Font Color
			'footer_font_color' => array(
				'name'	  => 'skin_data_'. $skin .'[skin_id_footer_font_color]',
				'label'   => __( 'Font Color', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'color',
				'section' => 'themeva_footer',
				'css' 	  => '.skinset-footer.nv-skin',
				'js'	  => 'css("color", to )',
				'live'	  => 'yes',
				'priority' => 36
			),			

			// Link Color
			'footer_link_color' => array(
				'name'	  => 'skin_data_'. $skin .'[skin_id_footer_link_color]',
				'label'   => __( 'Link Color', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'color',
				'section' => 'themeva_footer',
				'css' 	  => '.skinset-footer.nv-skin a',
				'js'	  => 'css("color", to ).parents(".skinset-footer.nv-skin").find(".nv-skin.highlight").css("background-color", to )',
				'live'	  => 'yes',
				'priority' => 37
			),

			// Link Hover Color
			'footer_linkhover_color' => array(
				'name'	  => 'skin_data_'. $skin .'[skin_id_footer_linkhover_color]',
				'label'   => __( 'Link Hover Color', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'color',
				'section' => 'themeva_footer',
				'css' 	  => '.skinset-footer.nv-skin a:hover',
				'js'	  => 'css("color", to )',
				'live'	  => 'no',
				'priority' => 38
			),				

			// Footer H1 Color
			'footer_h1_color' => array(
				'name'	  => 'skin_data_'. $skin .'[skin_id_footer_h1_color]',
				'label'   => __( 'H1 Color', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'color',
				'section' => 'themeva_footer',
				'css' 	  => '.skinset-footer h1, .skinset-footer h1 a',
				'js'	  => 'css("color", to )',
				'live'	  => 'yes',
				'priority' => 39
			),

			// Footer H2 Color
			'footer_h2_color' => array(
				'name'	  => 'skin_data_'. $skin .'[skin_id_footer_h2_color]',
				'label'   => __( 'H2 Color', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'color',
				'section' => 'themeva_footer',
				'css' 	  => '.skinset-footer h2, .skinset-footer h2 a',
				'js'	  => 'css("color", to )',
				'live'	  => 'yes',
				'priority' => 40
			),

			// Footer h3 Color
			'footer_h3_color' => array(
				'name'	  => 'skin_data_'. $skin .'[skin_id_footer_h3_color]',
				'label'   => __( 'h3 Color', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'color',
				'section' => 'themeva_footer',
				'css' 	  => '.skinset-footer h3, .skinset-footer h3 a',
				'js'	  => 'css("color", to )',
				'live'	  => 'yes',
				'priority' => 41
			),		
	
			// Footer h4 Color
			'footer_h4_color' => array(
				'name'	  => 'skin_data_'. $skin .'[skin_id_footer_h4_color]',
				'label'   => __( 'h4, h5, h6 Color', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'color',
				'section' => 'themeva_footer',
				'css' 	  => '.skinset-footer h4, .skinset-footer h4 a, .skinset-footer h5, .skinset-footer h5 a,.skinset-footer h6, .skinset-footer h6 a',
				'js'	  => 'css("color", to )',
				'live'	  => 'yes',
				'priority' => 42
			),	


			/* ------------------------------------
			:: FONT SETTINGS
			------------------------------------ */	

			// Font Family
			'background_font'  => array(
				'name' 	  => 'skin_data_'. $skin .'[skin_id_background_font]',
				'label'   => __( 'Font Family', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'select',
				'choices' => $font_list,
				'section' => 'themeva_font_settings',
				'live'	  => 'no',
				'priority' => 2
			),

			// Font Size
			'background_font_size'  => array(
				'name' 	  => 'skin_data_'. $skin .'[skin_id_background_font_size]',
				'label'   => __( 'Font Size ( px )', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'text',
				'section' => 'themeva_font_settings',
				'live'	  => 'no',
				'priority' => 2
			),

			// Heading Font Family
			'background_heading_font'  => array(
				'name' 	  => 'skin_data_'. $skin .'[skin_id_background_heading_font]',
				'label'   => __( 'Headings Font Family', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'select',
				'choices' => $heading_font_list,
				'section' => 'themeva_font_settings',
				'live'	  => 'no',
				'priority' => 3
			),

			// Increase Heading Size
			'background_heading_size'  => array(
				'name' 	  => 'skin_data_'. $skin .'[skin_id_background_heading_size]',
				'label'   => __( 'Increase Heading Size By ( px )', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'text',
				'section' => 'themeva_font_settings',
				'live'	  => 'no',
				'priority' => 4
			),


			// Menu Font Family
			'header_font'  => array(
				'name' 	  => 'skin_data_'. $skin .'[skin_id_header_font]',
				'label'   => __( 'Menu Font Family', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'select',
				'choices' => $font_list,
				'section' => 'themeva_font_settings',
				'live'	  => 'no',
				'priority' => 5
			),	

			// Menu Font Size
			'header_font_size'  => array(
				'name' 	  => 'skin_data_'. $skin .'[skin_id_header_font_size]',
				'label'   => __( 'Menu Font Size ( px )', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'text',
				'section' => 'themeva_font_settings',
				'live'	  => 'no',
				'priority' => 6
			),
			


			/* ------------------------------------
			
			:: FONT COLORS SECTION
			
			------------------------------------ */	
			


			/* ------------------------------------
			:: SUB-MENU FONT COLORS
			------------------------------------ */				
			
			// Sub Menu Heading
			'submenu_font_colors_heading'  => array(
				'name' 	  => 'submenu_font_colors_heading',
				'label'   => __( 'Sub-Menu Font Colors', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'heading',
				'section' => 'themeva_font_colors',
				'priority' => 21
			),			

			// Font Color
			'submenu_font_color' => array(
				'name'	  => 'skin_data_'. $skin .'[skin_id_menu_font_color]',
				'label'   => __( 'Font Color', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'color',
				'section' => 'themeva_font_colors',
				'css' 	  => '#nv-tabs ul ul',
				'js'	  => 'css("color", to )',
				'live'	  => 'yes',
				'priority' => 22
			),					

			// Link Color
			'submenu_link_color' => array(
				'name'	  => 'skin_data_'. $skin .'[skin_id_menu_link_color]',
				'label'   => __( 'Link Color', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'color',
				'section' => 'themeva_font_colors',
				'css' 	  => '#nv-tabs ul ul a',
				'js'	  => 'css("color", to )',
				'live'	  => 'yes',
				'priority' => 23
			),	
			
			// Link Hover Color
			'submenu_linkhover_color' => array(
				'name'	  => 'skin_data_'. $skin .'[skin_id_menu_linkhover_color]',
				'label'   => __( 'Link Hover Color', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'color',
				'section' => 'themeva_font_colors',
				'live'	  => 'no',
				'priority' => 24
			),						

	
		);


		/* ------------------------------------
		
		:: BACKGROUND LAYERS SECTION
		
		------------------------------------ */		

		for ( $i=1; $i <= 1; $i++ )
		{

			// Data Sources
			$data_sources = array(
				'nodatasource-'. $i => 'Select',
				'layer'. $i .'-data-4' => 'Slide Set',
				'layer'. $i .'-data-1' => 'Attached Media',
				'layer'. $i .'-data-6' => 'Portfolio Categories',
				'layer'. $i .'-data-2' => 'Post Categories',
				'layer'. $i .'-data-8' => 'Page / Post ID',
			);
			

			// Products
			if( class_exists('WPSC_Query') || class_exists('Woocommerce') )
			{
				$data_sources['layer'. $i .'-data-5'] = 'Product Category / Tags';
			}
			
			// Flickr
			if( of_get_option('flickr_userid') !='' )
			{
				$data_sources['layer'. $i .'-data-3'] = 'Flickr Set';
			}
			

			// Selection
			$layers_array['layer'. $i .'_type'] = array(
				'name' 	  => 'skin_data_'. $skin .'[skin_id_layer'. $i .'_type]',
				'label'   => __( 'Select Background Type', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'select',
				'choices' => array(
					'' => 'Select Type',
					'layer'. $i .'_color' => 'Color',
					'layer'. $i .'_imagefull' => 'Image ( Deprecated )',
					'layer'. $i .'_image' => 'Image ( Full + Positioned )',
					'layer'. $i .'_video' => 'Video',
				),
				'section' => 'themeva_background_'. $i ,
				'live'	  => 'no',
				'priority' => 1
			);			
			
			// COLOR: Primary Color
			$layers_array['layer'. $i .'_color_opt_pri'] = array(
				'name'	  => 'skin_data_'. $skin .'[skin_id_layer'. $i .'_pri_color]',
				'label'   => __( 'Background Color', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'color',
				'section' => 'themeva_background_'. $i ,
				'css' 	  => '#custom-layer'. $i ,
				'js'	  => 'css("background", to )',
				'live'	  => 'yes',
				'priority' => 2
			);			

			// IMAGEFULL: Image
			$layers_array['layer'. $i .'_imagefull_opt'] = array(
				'name'	  => 'skin_data_'. $skin .'[skin_id_layer'. $i .'_imagefull]',
				'label'   => __( 'Image', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'media',
				'section' => 'themeva_background_'. $i ,
				'live'	  => 'no',
				'priority' => 6
			);				

			// IMAGEFULL: Color
			$layers_array['layer'. $i .'_imagefull_opt_color'] = array(
				'name'	  => 'skin_data_'. $skin .'[skin_id_layer'. $i .'_imagefull_color]',
				'label'   => __( 'Background Color', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'color',
				'section' => 'themeva_background_'. $i ,
				'css' 	  => '#custom-layer'. $i ,
				'js'	  => 'css("background-color", to )',
				'live'	  => 'yes',
				'priority' => 7
			);

			// IMAGEFULL: Opacity
			$layers_array['layer'. $i .'_imagefull_opt_opac'] = array(
				'name'	  => 'skin_data_'. $skin .'[skin_id_layer'. $i .'_imagefull_opac]',
				'label'   => __( 'Background Opacity', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'range',
				'max'	  => '100',
				'min'	  => '0',
				'default' => '100',
				'section' => 'themeva_background_'. $i ,
				'css' 	  => '#custom-layer'. $i .' img',
				'func'	  => 'background_opacity',
				'js'	  => 'attr("data-pri-opac", to )',
				'live'	  => 'yes',
				'priority' => 8
			);					

			// IMAGEFULL: Featured
			$layers_array['layer'. $i .'_imagefull_opt_imagefeatured'] = array(
				'name'	  => 'skin_data_'. $skin .'[skin_id_layer'. $i .'_imagefeatured]',
				'label'   => __( 'Use Page / Post Featured Image', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'checkbox',
				'section' => 'themeva_background_'. $i ,
				'live'	  => 'no',
				'priority' => 9
			);

			// IMAGEPOSITIONED: Image
			$layers_array['layer'. $i .'_image_opt'] = array(
				'name'	  => 'skin_data_'. $skin .'[skin_id_layer'. $i .'_image]',
				'label'   => __( 'Image', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'media',
				'section' => 'themeva_background_'. $i ,
				'live'	  => 'no',
				'priority' => 10
			);			

			// IMAGEFULL: Featured
			$layers_array['layer'. $i .'_image_opt_imagefeatured'] = array(
				'name'	  => 'skin_data_'. $skin .'[skin_id_layer'. $i .'_image_featured]',
				'label'   => __( 'Use Page / Post Featured Image', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'checkbox',
				'section' => 'themeva_background_'. $i ,
				'live'	  => 'no',
				'priority' => 9
			);				

			// IMAGEPOSITIONED: Color
			$layers_array['layer'. $i .'_image_opt_color'] = array(
				'name'	  => 'skin_data_'. $skin .'[skin_id_layer'. $i .'_image_color]',
				'label'   => __( 'Background Color', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'color',
				'section' => 'themeva_background_'. $i ,
				'css' 	  => '#custom-layer'. $i ,
				'js'	  => 'css("background-color", to )',
				'live'	  => 'yes',
				'priority' => 11
			);

			// IMAGEPOSITIONED: Opacity
			$layers_array['layer'. $i .'_image_opt_opac'] = array(
				'name'	  => 'skin_data_'. $skin .'[skin_id_layer'. $i .'_image_opac]',
				'label'   => __( 'Background Opacity', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'range',
				'max'	  => '100',
				'min'	  => '0',
				'default' => '100',
				'section' => 'themeva_background_'. $i ,
				'css' 	  => '#custom-layer'. $i,
				'func'	  => 'background_opacity',
				'js'	  => 'attr("data-pri-opac", to )',
				'live'	  => 'yes',
				'priority' => 12
			);

			// IMAGEPOSITIONED: Vertial Align
			$layers_array['layer'. $i .'_image_opt_valign'] = array(
				'name' 	  => 'skin_data_'. $skin .'[skin_id_layer'. $i .'_image_valign]',
				'label'   => __( 'Image Vertical Position', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'select',
				'choices' => array(
					'' => 'Select',
					'top' => 'Top',
					'bottom' => 'Bottom',
					'center' => 'Center',
				),
				'section' => 'themeva_background_'. $i ,
				'live'	  => 'no',
				'priority' => 13
			);	

			// IMAGEPOSITIONED: Horizontal Align
			$layers_array['layer'. $i .'_image_opt_halign'] = array(
				'name' 	  => 'skin_data_'. $skin .'[skin_id_layer'. $i .'_image_halign]',
				'label'   => __( 'Image Horizontal Position', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'select',
				'choices' => array(
					'' => 'Select',
					'left' => 'Left',
					'right' => 'Right',
					'center' => 'Center',
				),
				'section' => 'themeva_background_'. $i ,
				'live'	  => 'no',
				'priority' => 14
			);

			// IMAGEPOSITIONED: Horizontal Align
			$layers_array['layer'. $i .'_image_opt_repeat'] = array(
				'name' 	  => 'skin_data_'. $skin .'[skin_id_layer'. $i .'_image_repeat]',
				'label'   => __( 'Image Repeat', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'select',
				'choices' => array(
					'' => 'Select',
					'repeat' => 'Repeat',
					'repeat-x' => 'Repeat X',
					'repeat-y' => 'Repeat Y',
					'no-repeat' => 'No Repeat',
				),
				'section' => 'themeva_background_'. $i ,
				'live'	  => 'no',
				'priority' => 15
			);

			// IMAGEPOSITIONED: Image Size
			$layers_array['layer'. $i .'_image_opt_size'] = array(
				'name' 	  => 'skin_data_'. $skin .'[skin_id_layer'. $i .'_image_size]',
				'label'   => __( 'Image Size ( Modern Browsers )', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'select',
				'choices' => array(
					'' => 'Select',
					'cover' => 'cover',
					'contain' => 'contain',
					'100% auto' => '100% auto ( Landscape )',
					'auto 100%' => 'auto 100% ( Portrait )',
				),
				'section' => 'themeva_background_'. $i ,
				'live'	  => 'no',
				'priority' => 16
			);			

			// VIDEO: File
			$layers_array['layer'. $i .'_video_opt'] = array(
				'name'	  => 'skin_data_'. $skin .'[skin_id_layer'. $i .'_video]',
				'label'   => __( 'Media File', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'media',
				'section' => 'themeva_background_'. $i ,
				'live'	  => 'no',
				'priority' => 19
			);

			// VIDEO: Opacity
			$layers_array['layer'. $i .'_video_opt_opac'] = array(
				'name'	  => 'skin_data_'. $skin .'[skin_id_layer'. $i .'_video_opac]',
				'label'   => __( 'Opacity', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'range',
				'max'	  => '100',
				'min'	  => '0',
				'default' => '100',
				'section' => 'themeva_background_'. $i ,
				'css' 	  => '#custom-layer'. $i,
				'func'	  => 'background_opacity',
				'js'	  => 'attr("data-pri-opac", to )',
				'live'	  => 'yes',
				'priority' => 20
			);

			// VIDEO: Type
			$layers_array['layer'. $i .'_video_opt_type'] = array(
				'name' 	  => 'skin_data_'. $skin .'[skin_id_layer'. $i .'_video_type]',
				'label'   => __( 'Media Type', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'select',
				'choices' => array(
					'' => 'Select',
					'youtube' => 'YouTube',
					'vimeo' => 'Vimeo',
					'flash' => 'Flash',
					'jwplayer' => 'JW Player',
				),
				'section' => 'themeva_background_'. $i ,
				'live'	  => 'no',
				'priority' => 21
			);

			// VIDEO: Loop
			$layers_array['layer'. $i .'_video_opt_loop'] = array(
				'name' 	  => 'skin_data_'. $skin .'[skin_id_layer'. $i .'_video_loop]',
				'label'   => __( 'Video Loop', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'select',
				'choices' => array(
					'1' => 'Yes',
					'0' => 'No',
				),
				'section' => 'themeva_background_'. $i ,
				'live'	  => 'no',
				'priority' => 22
			);

			// CYCLE: Opacity
			$layers_array['layer'. $i .'_cycle_opt_opac'] = array(
				'name'	  => 'skin_data_'. $skin .'[skin_id_layer'. $i .'_cycle_opac]',
				'label'   => __( 'Opacity', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'range',
				'max'	  => '100',
				'min'	  => '0',
				'default' => '100',
				'section' => 'themeva_background_'. $i ,
				'css' 	  => '#custom-layer'. $i,
				'func'	  => 'background_opacity',
				'js'	  => 'attr("data-pri-opac", to )',
				'live'	  => 'yes',
				'priority' => 23
			);

			// CYCLE: Color
			$layers_array['layer'. $i .'_cycle_opt_color'] = array(
				'name'	  => 'skin_data_'. $skin .'[skin_id_layer'. $i .'_cycle_color]',
				'label'   => __( 'Background Color', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'color',
				'section' => 'themeva_background_'. $i ,
				'css' 	  => '#custom-layer'. $i ,
				'js'	  => 'css("background-color", to )',
				'live'	  => 'yes',
				'priority' => 24
			);

			// CYCLE: Timeout
			$layers_array['layer'. $i .'_cycle_opt_timeout'] = array(
				'name' 	  => 'skin_data_'. $skin .'[skin_id_layer'. $i .'_cycle_timeout]',
				'label'   => __( 'Slide Timeout ( Seconds )', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'text',
				'section' => 'themeva_background_'. $i ,
				'live'	  => 'no',
				'priority' => 25
			);

			// CYCLE: Datasource
			$layers_array['layer'. $i .'_cycle_opt_datasource'] = array(
				'name' 	  => 'skin_data_'. $skin .'[skin_id_layer'. $i .'_datasource]',
				'label'   => __( 'Data Source', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'select',
				'choices' => $data_sources,
				'section' => 'themeva_background_'. $i ,
				'live'	  => 'no',
				'priority' => 26
			);

			// CYCLE: Attached Media
			$layers_array['layer'. $i .'-data-1'] = array(
				'name' 	  => 'skin_data_'. $skin .'[skin_id_layer'. $i .'_cycle_attached]',
				'label'   => __( 'Attached ID ( Comma Separate )', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'text',
				'section' => 'themeva_background_'. $i ,
				'live'	  => 'no',
				'priority' => 27
			);			
			
			// CYCLE: Post Categories
			$layers_array['layer'. $i .'-data-2'] = array(
				'name' 	  => 'skin_data_'. $skin .'[skin_id_layer'. $i .'_cycle_cat]',
				'label'   => __( 'Post Categories ( Comma Separate )', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'text',
				'section' => 'themeva_background_'. $i ,
				'live'	  => 'no',
				'priority' => 28
			);

			// CYCLE: Gallery Media
			$layers_array['layer'. $i .'-data-6'] = array(
				'name' 	  => 'skin_data_'. $skin .'[skin_id_layer'. $i .'_cycle_mediacat]',
				'label'   => __( 'Gallery Media ( Comma Separate )', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'text',
				'section' => 'themeva_background_'. $i ,
				'live'	  => 'no',
				'priority' => 29
			);

			// CYCLE: Flickr
			$layers_array['layer'. $i .'-data-3'] = array(
				'name' 	  => 'skin_data_'. $skin .'[skin_id_layer'. $i .'_cycle_flickr]',
				'label'   => __( 'Flickr Set ( Comma Separate )', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'text',
				'section' => 'themeva_background_'. $i ,
				'live'	  => 'no',
				'priority' => 30
			);

			// CYCLE: SlideSet
			$layers_array['layer'. $i .'-data-4'] = array(
				'name' 	  => 'skin_data_'. $skin .'[skin_id_layer'. $i .'_cycle_slideset]',
				'label'   => __( 'SlideSet Set ( Comma Separate )', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'text',
				'section' => 'themeva_background_'. $i ,
				'live'	  => 'no',
				'priority' => 31
			);

			// CYCLE: Product Category
			$layers_array['layer'. $i .'-data-5'] = array(
				'name' 	  => 'skin_data_'. $skin .'[skin_id_layer'. $i .'_cycle_prodcat]',
				'label'   => __( 'Product Categories ( Comma Separate )', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'text',
				'section' => 'themeva_background_'. $i ,
				'live'	  => 'no',
				'priority' => 32
			);

			// CYCLE: Product Tags
			$layers_array['layer'. $i .'-data-5'] = array(
				'name' 	  => 'skin_data_'. $skin .'[skin_id_layer'. $i .'_cycle_prodtag]',
				'label'   => __( 'Product Tags ( Comma Separate )', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'text',
				'section' => 'themeva_background_'. $i ,
				'live'	  => 'no',
				'priority' => 33
			);			

			// CYCLE: Page / Post ID
			$layers_array['layer'. $i .'-data-8'] = array(
				'name' 	  => 'skin_data_'. $skin .'[skin_id_layer'. $i .'_cycle_pagepost_id]',
				'label'   => __( 'Page / Post ID ( Comma Separate )', 'options_framework_themeva' ),
				'type'	  => 'option',
				'control' => 'text',
				'section' => 'themeva_background_'. $i ,
				'live'	  => 'no',
				'priority' => 34
			);												
									
		}		
		
		$options_array = array_merge( $options_array, $layers_array );
		
		return $options_array;
	
	}
	
	function epix_customize_register($wp_customize)
	{
		// Custom Controls
		class Themeva_Customize_Range_Control extends WP_Customize_Control {
			public $type = 'range';
			public $min;
			public $max;
			public $default;
		 
			public function render_content() {
				
				$value = ( esc_attr( $this->value() ) != '' ) ? esc_attr( $this->value() ) : esc_attr( $this->default );
				$name  = ( isset( $name ) ) ? esc_attr( $name ) : '';
		
				?>
				<label>
					<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                    <input type="text" class="range-value"  id="<?php echo esc_attr( $this->id ); ?>" value="<?php echo $value; ?>" <?php $this->link(); ?> />
					<div class="range-slider" id="<?php echo esc_attr( $this->id ); ?>_slider" data-value="<?php echo $value; ?>" data-default="<?php echo esc_attr( $this->default ); ?>" data-min="<?php echo esc_attr( $this->min ); ?>" data-max="<?php echo esc_attr( $this->max ); ?>"><?php echo $name; ?></div>                    
                </label>
				<?php
			}
		}

		// Custom Controls
		class Themeva_Customize_Media_Control extends WP_Customize_Control {
			public $type = 'media';
		 
			public function render_content() {

				wp_enqueue_script( 'media-upload' );
				wp_enqueue_script( 'thickbox' );
				wp_enqueue_style( 'thickbox' );	
				
				?>
				<label>
					<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                    <input type="text" class="upload has-file"  id="<?php echo esc_attr( $this->id ); ?>" name="<?php echo esc_attr( $this->id ); ?>" value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); ?> />
                    <p><a href="#" id="<?php echo esc_attr( $this->id ); ?>_button" class="button-secondary media-upload"><?php _e( 'Add Media', 'options_framework_themeva' ); ?></a></p>    
                </label>
				<?php
			}
		}

		class Themeva_Customize_Hidden_Control extends WP_Customize_Control {
			public $type = 'hidden';
		 
			public function render_content() {
				?>
                <input type="hidden" value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); ?> />
				<?php
			}
		}	

		class Themeva_Customize_Heading_Control extends WP_Customize_Control {
			public $type = 'heading';
			public $desc;
		 
			public function render_content() {
				?>
                <h6 class="cmb_metabox_title"><?php echo esc_html( $this->label ); ?></h6>
                <?php if( isset( $this->desc ) ) echo '<p class="cmb_metabox_description left">'. esc_attr( $this->desc ) .'</p>';
			}
		}			

		/* ------------------------------------
		:: GET SKIN DATA
		------------------------------------ */	
		
		// New Skin
		if( !empty($_POST['new-skin-title']) ) 
		{
			update_option( 'preview_skin', $_POST['new-skin-title'] );
			update_option( 'skins_epix_ids', get_option('skins_epix_ids') . $_POST['new-skin-title'] . ',' ); 
		}
		// Duplicate Skin
		elseif( !empty($_POST['duplicate-skin-title']) )
		{
			$duplicate_skin = get_option('preview_skin');
			$duplicate_skin_data = get_option( 'skin_data_'. $duplicate_skin );
			
			update_option( 'skin_data_'. $_POST['duplicate-skin-title'] , $duplicate_skin_data );
			update_option( 'skins_epix_ids', get_option('skins_epix_ids' ) . $_POST['duplicate-skin-title'] . ',' ); 
			update_option( 'preview_skin', $_POST['duplicate-skin-title'] );
		}
		// Delete Skin
		elseif( isset($_POST['delete-skin-title']) )
		{
			$delete_skin = get_option( 'preview_skin' );
			
			if( !empty( $delete_skin ) && !empty( $_POST['delete-skin-title'] ) )
			{
				$skin_ids = str_replace( $delete_skin.',','', get_option( 'skins_epix_ids' ) );
				update_option( 'skins_epix_ids', $skin_ids );
				delete_option( 'skin_data_'. $delete_skin );
				delete_option( 'preview_skin' );
			}
		}
		// Load Skin
		elseif( !empty($_POST['skin_select']) )
		{
			update_option('preview_skin', $_POST['skin_select']);
		}
		
		if( get_option('preview_skin') ) $skin = get_option('preview_skin');
		
		print '<meta name="'. $skin .'" />'; // Fixes HEX color bug
	
		// Skin Select
		$wp_customize->add_setting( 'default_skin', array(
			'default'    => get_option('default_skin'),
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );

		$wp_customize->add_setting( 'skin_select', array(
			'default'        => $skin,
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );		
		
		$skin_ids = explode(',', rtrim( get_option('skins_epix_ids'), ',' ) );
		
		$skin_arr[''] = 'Select Skin';
		
		foreach( $skin_ids as $skin_id )
		{
			$skin_arr[$skin_id] = $skin_id;
		}
		
		/* ------------------------------------
		:: DEFAULT OPTIONS
		------------------------------------ */		

		$wp_customize->add_setting( 'skins_epix_ids', array(
			'default'    => get_option('skins_epix_ids'),
			'capability' => 'edit_theme_options',
			'type'    	 => 'hidden',	
		) );					

		$wp_customize->add_control( 'skin_select', array(
			'label'   => 'Select Skin to Edit:',
			'section' => 'themeva_skin',
			'type'    => 'select',
			'choices'    => $skin_arr
		) );

		$wp_customize->add_control( 'default_skin', array(
			'label'   => 'Set Default Skin:',
			'section' => 'themeva_skin',
			'type'    => 'select',
			'choices'    => $skin_arr
		) );		

		$wp_customize->add_control( new Themeva_Customize_Hidden_Control( $wp_customize, 'skins_epix_ids', array(
			'section'  => 'themeva_skin',
			'settings' => 'skins_epix_ids',
		) ) );

		$wp_customize->add_section( 'themeva_skin', array(
			'title'          => __( 'Select Skin', 'options_framework_themeva' ),
			'priority'       => 1,
		) );			


		/* ------------------------------------
		:: GET SKIN OPTIONS
		------------------------------------ */		
		
		
		if( !empty($skin) )
		{
			// Get Options				
			$options_array = customizer_options($skin);	
			
			foreach ( $options_array as $key => $option )
			{
				// Settings
				$wp_customize->add_setting( $option['name'] , array(
					'default'        => '',
					'type'           => $option['type'],
					'capability'     => 'edit_theme_options'
				) );
				
				// Reset
				$option['live'] = ( isset( $option['live'] ) ) ? $option['live'] : '';
				$option['choices'] = ( isset( $option['choices'] ) ) ? $option['choices'] : '';
				$option['default'] = ( isset( $option['default'] ) ) ? $option['default'] : '';
				$option['name'] = ( isset( $option['name'] ) ) ? $option['name'] : '';
				
				// Controls
				if( $option['control'] == 'color' )
				{
					$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $key, array(
						'label'    => $option['label'],
						'section'  => $option['section'],
						'settings' => $option['name'],
						'priority' => $option['priority']
					) ) );
				}
				elseif( $option['control'] == 'range' )
				{
					$wp_customize->add_control( new Themeva_Customize_Range_Control( $wp_customize, $key, array(
						'label'    => $option['label'],
						'section'  => $option['section'],
						'settings' => $option['name'],
						'min'	   => $option['min'],
						'max'	   => $option['max'],
						'default'  => $option['default'],
						'priority' => $option['priority']
					) ) );
				}
				elseif( $option['control'] == 'image' )
				{
					$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, $key, array(
						'label'    => $option['label'],
						'section'  => $option['section'],
						'settings' => $option['name'],
						'priority' => $option['priority']
					) ) );
					
				}
				elseif( $option['control'] == 'media' )
				{
					$wp_customize->add_control( new Themeva_Customize_Media_Control( $wp_customize, $key, array(
						'label'    => $option['label'],
						'section'  => $option['section'],
						'settings' => $option['name'],
						'priority' => $option['priority']
					) ) );
					
				}
				elseif( $option['control'] == 'heading' )
				{
					$wp_customize->add_control( new Themeva_Customize_Heading_Control( $wp_customize, $key, array(
						'label'    => $option['label'],
						'section'  => $option['section'],
						'settings' => $option['name'],
						'desc'	   => $option['desc'],
						'priority' => $option['priority']
					) ) );
					
				}											
				else
				{
					$wp_customize->add_control( $key, array(
						'label'    => $option['label'],
						'type'     => $option['control'],
						'choices'  => $option['choices'],
						'section'  => $option['section'],
						'settings' => $option['name'],
						'priority' => $option['priority']
					) );
				}
				
				// Transports				
				if( $option['live'] == 'yes' )
				{
					$wp_customize->get_setting( $option['name'] )->transport='postMessage';
				}

				$wp_customize->add_section( 'themeva_general', array(
					'title'          => __( 'General', 'options_framework_themeva' ),
					'priority'       => 100,
				) );					

				// Sections
				$wp_customize->add_section( 'themeva_header', array(
					'title'          => __( 'Menu Sidebar', 'options_framework_themeva' ),
					'priority'       => 101,
				) );				

				// Sections
				$wp_customize->add_section( 'themeva_frame', array(
					'title'          => __( 'Body', 'options_framework_themeva' ),
					'priority'       => 102,
				) );	

				// Sections
				$wp_customize->add_section( 'themeva_sidebar', array(
					'title'          => __( 'Sidebar', 'options_framework_themeva' ),
					'priority'       => 102,
				) );					

				$wp_customize->add_section( 'themeva_footer', array(
					'title'          => __( 'Footer', 'options_framework_themeva' ),
					'priority'       => 103,
				) );								

				$wp_customize->add_section( 'themeva_font_settings', array(
					'title'          => __( 'Font Settings', 'options_framework_themeva' ),
					'priority'       => 104,
				) );				

				$wp_customize->add_section( 'themeva_background_1', array(
					'title'          => __( 'Background', 'options_framework_themeva' ),
					'priority'       => 105,
				) );													
			
			}
		}
	}


	function themeva_customize_preview()
	{
		// Get Options
		$preview_skin = get_option('preview_skin');		
		$options_array = customizer_options($preview_skin);	
	
	?>		 
		
		<script type="text/javascript">
		
		( function( $ )
		{
			$(document).ready(function()
			{
				$('.ui-tabs').remove();
			});
						
			function hexToRgb(h)
			{
				var r = parseInt((cutHex(h)).substring(0,2),16),
					g = parseInt((cutHex(h)).substring(2,4),16),
					b = parseInt((cutHex(h)).substring(4,6),16);
				
				return r+','+g+','+b;
			}
			
			function cutHex(h)
			{
				return (h.charAt(0)=="#") ? h.substring(1,7):h
			}


			function rgbToHex(r,g,b)
			{
				var hexDigits = ["0","1","2","3","4","5","6","7","8","9","a","b","c","d","e","f"];
				
				function hex(x)
				{
					return isNaN(x) ? "00" : hexDigits[(x - x % 16) / 16] + hexDigits[x % 16];
				}
				
				return "#" + hex(r) + hex(g) + hex(b);
			}     	
			
			function gradient( element )
			{
				// Get Data Attribute Values
				var pri_color = $( element ).attr( 'data-pri-color' ),
					sec_color = $( element ).attr( 'data-sec-color' ),
					pri_opac  = $( element ).attr( 'data-pri-opac' ),
					sec_opac  = $( element ).attr( 'data-sec-opac' ),
					pri_rgb   = '',
					sec_rgb   = '',
					reg_exp	  = /rgb\((.*?)\)/g,
					curr_css  = $( element ).css('background-image').replace(/rgba/g,'rgb'),
					matches,
					rgb_array = [];

				while ( matches = reg_exp.exec(curr_css) )
				{
					rgb_array.push(decodeURIComponent(matches[1]));  
				}
					
				var count = rgb_array.length;

				// Tidy RGB Values
				if( count == 2 )
				{
					if( $.browser.mozilla )
					{
						pri_rgb = rgb_array[1].replace(/\(|\ /g, '').split(',');
						sec_rgb = rgb_array[0].replace(/\(|\ /g, '').split(','); 						
					}
					else
					{
						pri_rgb = rgb_array[0].replace(/\(|\ /g, '').split(',');
						sec_rgb = rgb_array[1].replace(/\(|\ /g, '').split(','); 						
					}
				}

						
				// Set Defaults
				if( ! pri_color ) pri_color = rgbToHex(pri_rgb[0], pri_rgb[1], pri_rgb[2]);
				if( ! sec_color ) sec_color = rgbToHex(sec_rgb[0], sec_rgb[1], sec_rgb[2]);
	
				
				// Primary Opacity
				if( !pri_opac && pri_rgb[3] != null)
				{
					pri_opac = Math.round(100*pri_rgb[3]);
				}
				else if( !pri_opac && pri_rgb[3] == null )
				{
					pri_opac = 100;
				}
	
				// Secondary Opacity
				if( !sec_opac && sec_rgb[3] != null)
				{
					sec_opac = Math.round(100*sec_rgb[3]);
				}
				else if( !sec_opac && sec_rgb[3] == null )
				{
					sec_opac = 100;
				}
		
				
				if( pri_opac == 100 || ! pri_opac ) pri_opac = '0.99'; else if( pri_opac == 0 ) pri_opac = '0'; else if( pri_opac < 10 ) pri_opac = '0.1' + pri_opac; else pri_opac = '0.' + pri_opac;
				if( sec_opac == 100 || ! sec_opac ) sec_opac = '0.99'; else if( sec_opac == 0 ) sec_opac = '0'; else if( sec_opac < 10 ) sec_opac = '0.1' + sec_opac; else sec_opac = '0.' + sec_opac;
	
				if( pri_color !='' && sec_color =='' ) sec_color = pri_color;
				
				// RGB Values
				var rgb_pri_color = hexToRgb( pri_color ),
					rgb_sec_color = hexToRgb( sec_color );

				if( $.browser.webkit )
				{
					$( element ).css( 'background', '-webkit-gradient(linear, 0% 0%, 0% 90%, from(rgba('+ rgb_pri_color +','+ pri_opac +')), to(rgba('+ rgb_sec_color +','+ sec_opac +')))' );
				}
				else if( $.browser.mozilla )
				{
					$( element ).css( 'background', '-moz-linear-gradient(top, rgba('+ rgb_pri_color +','+ pri_opac +'), rgba('+ rgb_sec_color +','+ sec_opac +'))' );
				}
				else if( $.browser.opera )
				{
					$( element ).css( 'background', '-o-linear-gradient(top, rgba('+ rgb_pri_color +','+ pri_opac +'), rgba('+ rgb_sec_color +','+ sec_opac +'))' );
				}
				else if( $.browser.msie )
				{
					$( element ).css( 'background', '-ms-linear-gradient(top, rgba('+ rgb_pri_color +','+ pri_opac +'), rgba('+ rgb_sec_color +','+ sec_opac +'))');
				}
			
			}
			
			function background_opacity( element, value )
			{
				if( value == 100 || ! value ) value = '0.99'; else if( value == 0 ) value = '0'; else if( value < 10 ) value = '0.0' + value; else value = '0.' + value;
				$( element ).css( 'opacity', value );
			}
						
			<?php
			
			foreach ( $options_array as $key => $option )
			{
				$live = ( isset( $option['live'] ) ) ? $option['live'] : '';
				
				if( $live == 'yes' )
				{
					echo 'wp.customize("'. $option['name'] .'",function( value ) {' . "\n";
					echo 'value.bind(function(to) {' . "\n";
					
					echo '$("'. $option['css'] .'").'. $option['js'] . ';' . "\n";
	
					if( !empty($option['func']) )
					{
						echo $option['func'] . '( "' . $option['css'] . '", to );';
					}
					
					echo '});' . "\n";
					echo '});' . "\n";	
				}
			}
			
			?>
			
		})( jQuery );	
		</script>
	
	<?php 
	}
	
	
	function themeva_customize_scripts()
	{
		// Javascript
		wp_deregister_script('themeva-customizer');	
		wp_register_script('themeva-customizer', get_template_directory_uri().'/lib/adm/js/themeva-customizer.js',false,array('jquery','customize-preview','media-upload','thickbox'),true);
		wp_enqueue_script('themeva-customizer');
		
		// Styles
		wp_enqueue_style('nv_theme_settings_css', get_template_directory_uri() . '/lib/adm/css/nv-theme-settings.css');
	}
	
	// Init Customizer Script
	if( isset($wp_customize) )
	{
		if ( $wp_customize->is_preview() && ! is_admin() )
			add_action( 'wp_print_footer_scripts', 'themeva_customize_preview', 21);
			add_action( 'customize_controls_init', 'themeva_customize_scripts', 21);
	}
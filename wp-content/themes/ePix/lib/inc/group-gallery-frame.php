<?php 

/* ------------------------------------

:: CONFIGURE SLIDE

------------------------------------*/

	if($NV_movieurl && $NV_videotype=="")
	{ 
		// Check if using JW Player -> Add Skin if enabled
		 $isplayer = strpos($NV_movieurl, "player.swf");
		 
		if ($isplayer !== false)
		{	
			if( $NV_videoautoplay=="1" )
			{
				$NV_movieurl .= "&amp;autostart=true";
			}
				
			if( of_get_option('jwplayer_skin') )
			{
				$NV_movieurl .="&amp;skin=".of_get_option('jwplayer_skin');
			}
				
			if( of_get_option('jwplayer_skinpos') )
			{
				$NV_movieurl .="&amp;controlbar.position=".of_get_option('jwplayer_skinpos');
			}				
		}
	}
	
	// Check if postformat enabled
	if( empty( $NV_gallery_postformat ) ) $NV_gallery_postformat = ''; 	

	$max_width = ( !empty( $NV_imgwidth ) ) ? 'style="max-width:'. $NV_imgwidth  .'px"' : '';
	

	if( $postcount == "1" )
	{ 
		$output .= '<div class="groupslides-wrap '.  $columnpadding .'"'. ( !empty( $NV_panelformat ) ? $NV_panelformat : '' ) .'>';
		$output .= '<div class="row groupslider-row">';
	}

	// Column Style + Position
	$col_position = $col_style = '';
	if( $postcount == $NV_slidercolumns ) $col_position = 'last';
	if( !empty( $NV_galleryheight ) ) $col_style = 'style="height:'.$NV_galleryheight.'px"';
			
    $output .= "\n\t". '<div class="panel block columns '. $NV_slidercolumns_text .'_column '. $col_position .'">';
    $output .= "\n\t\t". '<div  class="slide-break">';
    
		if( $NV_gallery_postformat == 'yes' )
		{
        	global	$NV_is_widget; 
			$NV_is_widget = true; // stop comments displaying within gallery
			
   			ob_start();
			get_template_part( 'content', get_post_format() );
			$output .= ob_get_contents();
			ob_end_clean();
    	}
		else
		{			
			// Media Type
			$mediatype = $blackwhite = '';
				
			if( !empty( $NV_videotype ) ) 
			{
				$mediatype = 'videotype';
				$NV_blackwhite = '';
			}
			else
			{
				$blackwhite = $NV_blackwhite;
			}				
             
			$output .= "\n\t\t\t". '<div class="container '. $mediatype .' '.$NV_imageeffect .' '.$NV_cssclasses .'">';
			$output .= "\n\t\t\t\t". '<div class="gridimg-wrap"  '.$max_width .'>';
			$output .= "\n\t\t\t\t\t". '<div class="title-wrap '. $blackwhite .'">';


			if( $NV_groupgridcontent != "text" )
			{
				if( !empty( $NV_videotype ) ) // Video
				{
					include(NV_FILES .'/inc/classes/video-class.php');
				}
				elseif( !empty( $NV_previewimgurl ) ) // Image
				{ 					
					$output .= '<img src="'. $NV_imagepath .'" alt="'. ( !empty( $NV_alt ) ? $NV_alt : $NV_posttitle ) .'" width="'. $NV_imgwidth .'" height="'. $NV_imgheight .'" />';
							
					// Product Price  
					if(class_exists('WPSC_Query') || class_exists('Woocommerce')   && $NV_datasource=='data-5')
					{ 
						if( !empty( $NV_productprice ) ) $output .= '<span class="productprice">'. $NV_productprice .'</span>';
					} 

					// Split Icon Space
					$split = '';
														
					if( $NV_lightbox == "yes" && $NV_disablegallink != 'yes' ) $split = 'split';
									
					// Set Link + Lightbox
					if( $NV_lightbox == "yes" )
					{ 
						$lightbox_url = $lightbox_type = $lightbox_iframe = '';

						// Lightbox iframe					
						if (strpos($NV_cssclasses, 'iframe_lightbox') !== FALSE)
						{
							$lightbox_iframe = 'data-fancybox-type="iframe"';
						}	
								
						if( !empty($NV_movieurl) )
						{
							$lightbox_url = $NV_movieurl;
							
							if( empty( $lightbox_iframe ) )
							{
								$lightbox_type = 'fa fa-play';
							}
							else
							{
								$lightbox_type = 'fa fa-expand';
							}
						}
						else
						{
							$lightbox_url = $NV_previewimgurl;
							$lightbox_type = 'fa fa-expand';
						}
										
						$output .= '<a href="'. $lightbox_url .'" title="'. $NV_posttitle .'" '. $lightbox_iframe .' data-fancybox-group="gallery'. $NV_shortcode_id .'" class="fancybox action-icons lightbox-icon '. $split .'"><i class="'. $lightbox_type .' fa-lg"></i></a>';
					}
		
					if( $NV_disablegallink != 'yes' )
					{ 
						$output .= '<a href="'. $NV_galexturl .'" class="action-icons link-icon '. $split .'"><i class="fa fa-link fa-lg"></i></a>';
					}
				}
			}						
                    
			if( $NV_groupgridcontent != "image" && ( !empty( $NV_posttitle ) || !empty( $NV_description ) ) )
			{ 
				// Caption Action
				if( $NV_groupgridcontent == "titleoverlay" || $NV_groupgridcontent == "titletextoverlay" ) $NV_cssclasses .= ' caption-hover';
				if( $NV_groupgridcontent == "titleimage" || $NV_groupgridcontent == "textimage" ) $NV_cssclasses .= ' caption-static';
						
				$output .= '<div class="caption-wrap '. $NV_cssclasses .'">';
				
					// Title
					if( !empty( $NV_posttitle ) )
					{					
						$output .= "\n\t". '<div class="title caption skinset-main nv-skin">';
						$output .= "\n\t\t". '<h3>'. $NV_posttitle .'</h3>';
						$output .= "\n\t". '</div>';
					}

					// Description
					if( !empty( $NV_description ) && ( $NV_groupgridcontent == "textimage" || $NV_groupgridcontent == "titletextoverlay" ) )
					{					
						$output .= "\n\t". '<div class="content caption skinset-main nv-skin">';
						$output .= "\n\t\t". do_shortcode( $NV_description );
						$output .= "\n\t". '</div>';
					}								
								
				$output .= '</div><!-- /caption-wrap -->';	
			}
					
			$output .= "\n\t\t\t\t\t". '</div>';
			$output .= "\n\t\t\t\t". '</div><!-- / gridimg-wrap -->';
			$output .= "\n\t\t\t". '</div><!-- / container -->';
		}  
		
	$output .= "\n\t\t". '</div><!--  / slide-break -->';
	$output .= "\n\t". '</div><!--  / panel -->';   

	if( empty( $total_count ) ) 
	{
		$total_count = 1;
	}
	else
	{
		$total_count++;
	}

	if( $postcount == $NV_slidercolumns || $total_count == $post_count )
	{ 
		$postcount = "0";
		
		$output .= '</div><!--  / row -->';
		$output .= '</div><!--  / groupslides-wrap -->';
	}
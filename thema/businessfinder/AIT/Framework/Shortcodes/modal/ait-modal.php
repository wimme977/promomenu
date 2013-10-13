<?php
/* **********************************************************
 * Modal window
 * **********************************************************/
function theme_modal_content( $params, $content = null) {
    extract( shortcode_atts( array(
    	'name' => '',
    	'width' => '',
    	'height' => '',
    	'buttontext' => ''
    ), $params ) );

	if($name == ""){
		$modalName = 'sc-modal-window';
	} else {
		$modalName = 'sc-modal-window-'.$name;
	}

	if($width != "" and $height != ""){
		$sizeStyle = ' style="position:relative; width:'.$width.'; height:'.$height.';"';
	}

	if (isset($GLOBALS['aitUsePrettyModalSortcode'])) {
		$result = '';
		$result .= '<div style="display: none;"><div id="'.$modalName.'" '.$sizeStyle.'><div class="sc-modal-content entry-content content-style">';
		$result .= do_shortcode( $content );
		$result .= '</div></div></div>';
	} else {
		$result = '';
		$result .= '<div style="display: none;"><div class="sc-modal-content entry-content content-style" id="'.$modalName.'"'.$sizeStyle.'>';
		$result .= do_shortcode( $content );
		$result .= '</div></div>';
	}

	if (isset($GLOBALS['aitUsePrettyModalSortcode'])) {
		$result .= '<script type="text/javascript">';
		$result .= '	jQuery(document).ready(function() {';
		$result .= '		jQuery("a.sc-modal-link").attr("rel", "prettyPhoto").prettyPhoto({social_tools:false, deeplinking: false});';
		$result .= '	});';
		$result .= '</script>';
	} else {
		$result .= '<script type="text/javascript">';
		$result .= '	jQuery(document).ready(function() {';
		$result .= '		jQuery("a.sc-modal-link").fancybox({ "hideOnContentClick": true });';
		$result .= '	});';
		$result .= '</script>';
	}
	
  	return $result;
}
add_shortcode( 'modal-content', 'theme_modal_content' );

/* **********************************************************
 * Modal link
 * **********************************************************/
function theme_modal_link( $params, $content = null) {
    extract( shortcode_atts( array(
    	'name' => '',
    ), $params ) );

	if($name == ""){
		$modalName = 'sc-modal-window';
	} else {
		$modalName = 'sc-modal-window-'.$name;
	}

	$result = '<a class="sc-modal-link" href="#'.$modalName.'">';
	$result .= do_shortcode( $content );
	$result .= '</a>';

  	return $result;
}
add_shortcode( 'modal-link', 'theme_modal_link' );
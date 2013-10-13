<?php

/**
 * AIT WordPress Theme
 *
 * Copyright (c) 2012, Affinity Information Technology, s.r.o. (http://ait-themes.com)
 */

// directory search
$latteParams['type'] = (isset($_GET['dir-search']) && isset($_GET['s'])) ? true : false;
if($latteParams['type']){
	// show all items on map
	if(isset($aitThemeOptions->search->searchShowMap)){
		$radius = array();
		if(isset($_GET['geo'])){
			$radius[] = $_GET['geo-radius'];
			$radius[] = $_GET['geo-lat'];
			$radius[] = $_GET['geo-lng'];
		}
		$latteParams['items'] = getItems(intval($_GET['categories']),intval($_GET['locations']),$GLOBALS['wp_query']->query_vars['s'],$radius);
	}

	$latteParams['posts'] = getDirItemsDetails($wp_query->posts);

} else {
	
	$latteParams['posts'] = WpLatte::createPostEntity($GLOBALS['wp_query']->posts);

	// if this is "Blog" page get the right template
	if($GLOBALS['wp_query']->is_home && $GLOBALS['wp_query']->is_posts_page){
		$template = get_page_template();
		if($template = apply_filters('template_include', $template)){
			if(substr($template, -8, 8) != 'page.php'){
				require_once $template;
				return; // ends executing this script
			}
		}
	}

	// no page was selected for "Posts page" from WP Admin in Settings->Reading
	$latteParams['isIndexPage'] = true;

	if(isset($GLOBALS['wp_query']->queried_object)){

		$latteParams['post'] = WpLatte::createPostEntity(
			$GLOBALS['wp_query']->queried_object,
			array(
				'meta' => $GLOBALS['pageOptions'],
		));

		$latteParams['isIndexPage'] = false;
	}

}

$latteParams['sidebarType'] = 'sidebar-1';

WPLatte::createTemplate(basename(__FILE__, '.php'), $latteParams)->render();
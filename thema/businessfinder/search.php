<?php

/**
 * AIT WordPress Theme
 *
 * Copyright (c) 2012, Affinity Information Technology, s.r.o. (http://ait-themes.com)
 */
$latteParams['type'] = (isset($_GET['dir-search'])) ? true : false;
if($latteParams['type']){
	$latteParams['isDirSearch'] = true;
	// show all items on map
	if(isset($aitThemeOptions->search->searchShowMap)){
		$radius = array();
		if(isset($_GET['geo'])){
			$radius[] = $_GET['geo-radius'];
			$radius[] = $_GET['geo-lat'];
			$radius[] = $_GET['geo-lng'];
		}
		$latteParams['items'] = getItems(intval($_GET['categories']),intval($_GET['locations']),$GLOBALS['wp_query']->query_vars['s'],$radius);

		if (empty($latteParams['items'])) {

			$latteParams['dirSearchNotFound'] = true;
		}
	}

	$posts = getDirItemsDetails($wp_query->posts);

} else {
	$posts = WpLatte::createPostEntity($wp_query->posts);
}
$latteParams['posts'] = $posts;

WPLatte::createTemplate(basename(__FILE__, '.php'), $latteParams)->render();
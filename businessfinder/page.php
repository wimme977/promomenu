<?php
$latteParams['post'] = WpLatte::createPostEntity(
	$GLOBALS['wp_query']->post,
	array(
		'meta' => $GLOBALS['pageOptions'],
	)
);

$latteParams['sidebarType'] = 'sidebar-1';

/**
 * Sections
 */
$secOptions = $latteParams['post']->options('sections');
$secOrder = get_post_meta($GLOBALS['wp_query']->post->ID,'_ait_sections_options',true);
if (empty($secOrder['sectionsOrder'])) {
	$secOrder = array(
		0 => 'specialOffers',
		1 => 'bestPlaces',
		2 => 'recentPlaces',
		3 => 'peopleRatings'
	);	
} else {
	$secOrder = $secOrder['sectionsOrder'];
}
$latteParams['secOrder'] = $secOrder;
$latteParams['specialOffers'] = (isset($secOptions->section1Count)) ? aitGetSpecialOffers($secOptions->section1Count) : aitGetSpecialOffers();
$latteParams['bestPlaces'] = (isset($secOptions->section2Count)) ? aitGetBestPlaces($secOptions->section2Count): aitGetBestPlaces();
$latteParams['recentPlaces'] = (isset($secOptions->section3Count)) ? aitGetRecentPlaces($secOptions->section3Count) : aitGetRecentPlaces();
$latteParams['peopleRatings'] = (isset($secOptions->section4Count)) ? aitGetPeopleRatings($secOptions->section4Count) : aitGetPeopleRatings();

/**
 * Fire!
 */
WPLatte::createTemplate(basename(__FILE__, '.php'), $latteParams)->render();
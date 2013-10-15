<?php //netteCache[01]000461a:2:{s:4:"time";s:21:"0.44206500 1381775845";s:9:"callbacks";a:3:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:72:"/var/www/promomenu/wp-content/themes/businessfinder/Templates/header.php";i:2;i:1380199520;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:30:"eee17d5 released on 2011-08-13";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:21:"WPLATTE_CACHE_VERSION";i:2;i:4;}}}?><?php

// source file: /var/www/promomenu/wp-content/themes/businessfinder/Templates/header.php

?><?php list($_l, $_g) = NCoreMacros::initRuntime($template, 'kfldvqm1hi')
;
// snippets support
if (!empty($control->snippetMode)) {
	return NUIMacros::renderSnippets($control, $_l, get_defined_vars());
}

//
// main template
//
?>
<!doctype html>

<!--[if IE 8]><html class="no-js oldie ie8 ie" lang="<?php echo NTemplateHelpers::escapeHtmlComment($site->language) ?>"><![endif]-->
<!--[if IE 9]><html class="no-js oldie ie9 ie" lang="<?php echo NTemplateHelpers::escapeHtmlComment($site->language) ?>"><![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" lang="<?php echo htmlSpecialChars($site->language) ?>"><!--<![endif]-->

	<head>
		<meta charset="<?php echo htmlSpecialChars($site->charset) ?>" />
<script type='text/javascript'>var ua = navigator.userAgent; var meta = document.createElement('meta');if((ua.toLowerCase().indexOf('android') > -1 && ua.toLowerCase().indexOf('mobile')) || ((ua.match(/iPhone/i)) || (ua.match(/iPad/i)))){ meta.name = 'viewport';	meta.content = 'target-densitydpi=device-dpi, width=device-width'; }var m = document.getElementsByTagName('meta')[0]; m.parentNode.insertBefore(meta,m);</script> 		<meta name="Author" content="AitThemes.com, http://www.ait-themes.com" />

		<title><?php echo WpLatteFunctions::getTitle() ?></title>
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="pingback" href="<?php echo htmlSpecialChars($site->pingbackUrl) ?>" />

<?php if(is_singular() && get_option("thread_comments")){wp_enqueue_script("comment-reply");}wp_head() ?>

		<link id="ait-style" rel="stylesheet" type="text/css" media="all" href="<?php echo WpLatteFunctions::lessify() ?>" />

		<script>
		  'article aside footer header nav section time'.replace(/\w+/g,function(n){ document.createElement(n) })
		</script>

		<script type="text/javascript">
		jQuery(document).ready(function($) {

<?php if (isset($themeOptions->search->searchCategoriesHierarchical)): ?>
			var categories = [ <?php echo $categoriesHierarchical ?> ];
<?php else: ?>
			var categories = [
<?php $iterations = 0; foreach ($iterator = $_l->its[] = new NSmartCachingIterator($categories) as $cat): ?>
				{ value: <?php echo NTemplateHelpers::escapeJs($cat->term_id) ?>, label: <?php echo NTemplateHelpers::escapeJs($cat->name) ?>
 }<?php if (!($iterator->last)): ?>,<?php endif ?>

<?php $iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
			];
<?php endif ?>
			
<?php if (isset($themeOptions->search->searchLocationsHierarchical)): ?>
			var locations = [ <?php echo $locationsHierarchical ?> ];
<?php else: ?>
			var locations = [
<?php $iterations = 0; foreach ($iterator = $_l->its[] = new NSmartCachingIterator($locations) as $loc): ?>
				{ value: <?php echo NTemplateHelpers::escapeJs($loc->term_id) ?>, label: <?php echo NTemplateHelpers::escapeJs($loc->name) ?>
 }<?php if (!($iterator->last)): ?>,<?php endif ?>

<?php $iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
			];
<?php endif ?>

			var catInput = $( "#dir-searchinput-category" ),
				catInputID = $( "#dir-searchinput-category-id" ),
				locInput = $( "#dir-searchinput-location" ),
				locInputID = $( "#dir-searchinput-location-id" );

			catInput.autocomplete({
				minLength: 0,
				source: categories,
				focus: function( event, ui ) {
					var val = ui.item.label.replace(/&amp;/g, "&");
						val = val.replace(/&nbsp;/g, " ");
					catInput.val( val );
					return false;
				},
				select: function( event, ui ) {
					var val = ui.item.label.replace(/&amp;/g, "&");
						val = val.replace(/&nbsp;/g, " ");
					catInput.val( val );
					catInputID.val( ui.item.value );
					return false;
				}
			}).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
				return $( "<li>" )
					.data( "item.autocomplete", item )
					.append( "<a>" + item.label + "</a>" )
					.appendTo( ul );
			};
			var catList = catInput.autocomplete( "widget" );
			catList.niceScroll({ autohidemode: false });

			catInput.click(function(){
				catInput.val('');
				catInputID.val('0');
				catInput.autocomplete( "search", "" );
			});

			locInput.autocomplete({
				minLength: 0,
				source: locations,
				focus: function( event, ui ) {
					var val = ui.item.label.replace(/&amp;/g, "&");
						val = val.replace(/&nbsp;/g, " ");
					locInput.val( val );
					return false;
				},
				select: function( event, ui ) {
					var val = ui.item.label.replace(/&amp;/g, "&");
						val = val.replace(/&nbsp;/g, " ");
					locInput.val( val );
					locInputID.val( ui.item.value );
					return false;
				}
			}).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
				return $( "<li>" )
					.data( "item.autocomplete", item )
					.append( "<a>" + item.label + "</a>" )
					.appendTo( ul );
			};
			var locList = locInput.autocomplete( "widget" );
			locList.niceScroll({ autohidemode: false });

			locInput.click(function(){
				locInput.val('');
				locInputID.val('0');
				locInput.autocomplete( "search", "" );
			});


<?php if (isset($_GET['dir-search'])): ?>
			// fill inputs with search parameters
			$('#dir-searchinput-text').val(<?php echo NTemplateHelpers::escapeJs($searchTerm) ?>);
			catInputID.val(<?php echo NTemplateHelpers::escapeJs($_GET["categories"]) ?>);
			for(var i=0;i<categories.length;i++){
				if(categories[i].value == <?php echo NTemplateHelpers::escapeJs($_GET["categories"]) ?>) {
					var val = categories[i].label.replace(/&amp;/g, "&");
						val = val.replace(/&nbsp;/g, " ");
					catInput.val(val);
				}
			}
			locInputID.val(<?php echo NTemplateHelpers::escapeJs($_GET["locations"]) ?>);
			for(var i=0;i<locations.length;i++){
				if(locations[i].value == <?php echo NTemplateHelpers::escapeJs($_GET["locations"]) ?>) {
					var val = locations[i].label.replace(/&amp;/g, "&");
						val = val.replace(/&nbsp;/g, " ");
					locInput.val(val);
				}
			}
<?php endif ?>

		});
		</script>

	</head>

	<body <?php body_class('ait-businessfinder') ?> data-themeurl="<?php echo NTemplateHelpers::escapeHtml($themeUrl, ENT_NOQUOTES) ?>">

		<div id="page" class="hfeed header-type-<?php echo htmlSpecialChars($headerType) ?>" >

<?php NCoreMacros::includeTemplate('snippets/branding-header.php', $template->getParams(), $_l->templates['kfldvqm1hi'])->render() ?>

<?php if ($headerType != 'map' || isset($dirSearchNotFound)): ?>

			<div id="directory-search" class="regular-search"
			data-interactive="<?php if (isset($themeOptions->search->enableInteractiveSearch)): ?>
yes<?php else: ?>no<?php endif ?>">
				<div class="wrapper">
					<form action="<?php echo htmlSpecialChars($homeUrl) ?>" id="dir-search-form" method="get" class="dir-searchform">
						
						<div class="first-row clearfix">
							<div class="basic-search-form clearfix">
								<div id="dir-search-inputs">
									<div id="dir-holder">
										<div class="dir-holder-wrap">
										<input type="text" name="s" id="dir-searchinput-text" placeholder="<?php echo htmlSpecialChars(__('Search keyword...', 'ait')) ?>
" class="dir-searchinput"<?php if (isset($isDirSearch)): ?> value="<?php echo htmlSpecialChars($site->searchQuery) ?>
"<?php endif ?> />
										<div class="reset-ajax"></div>

										</div>
									</div>

									<input type="text" id="dir-searchinput-category" placeholder="<?php echo htmlSpecialChars(__('All categories', 'ait')) ?>" />
									<input type="text" name="categories" id="dir-searchinput-category-id" value="0" style="display: none;" />

									<input type="text" id="dir-searchinput-location" placeholder="<?php echo htmlSpecialChars(__('All locations', 'ait')) ?>" />
									<input type="text" name="locations" id="dir-searchinput-location-id" value="0" style="display: none;" />

								</div>

								<div id="dir-search-button">
									<input type="submit" value="<?php echo htmlSpecialChars(__('Search', 'ait')) ?>" class="dir-searchsubmit" />
								</div>
							</div>
							<input type="hidden" name="dir-search" value="yes" />
						</div>

						<div class="advanced-search">

						</div>

					</form>
				</div>
			</div>

<?php endif ?>

			<div class="map-holder">
				<div id="directory-main-bar"<?php if ($headerType == 'image'): ?> style="background: url(<?php echo htmlSpecialChars(NTemplateHelpers::escapeCss($headerImage)) ?>
) no-repeat center top; height: <?php echo $headerImageSize[1] ?>px;"<?php endif ?>
 data-category="<?php echo htmlSpecialChars($mapCategory) ?>" data-location="<?php echo htmlSpecialChars($mapLocation) ?>
" data-search="<?php echo htmlSpecialChars($mapSearch) ?>" data-geolocation="<?php if (isset($isGeolocation)): ?>
true<?php else: ?>false<?php endif ?>">
<?php if ($headerType == 'slider'): if (function_exists('putRevSlider')): putRevSlider($headerSlider) ;endif ;endif ?>
				</div>

<?php if ($headerType == 'map' && !isset($dirSearchNotFound)): ?>

				<div id="directory-search" class="map-search"
				data-interactive="<?php if (isset($themeOptions->search->enableInteractiveSearch)): ?>
yes<?php else: ?>no<?php endif ?>">
					<div class="wrapper">
						<form action="<?php echo htmlSpecialChars($homeUrl) ?>" id="dir-search-form" method="get" class="dir-searchform">
							<p class="searchbox-title"><?php echo NTemplateHelpers::escapeHtml(__('Map Search', 'ait'), ENT_NOQUOTES) ?></p>
							<div id="dir-search-inputs">
								<div id="dir-holder">
									<div class="dir-holder-wrap">
									<input type="text" name="s" id="dir-searchinput-text" placeholder="<?php echo htmlSpecialChars(__('Search keyword...', 'ait')) ?>
" class="dir-searchinput"<?php if (isset($isDirSearch)): ?> value="<?php echo htmlSpecialChars($site->searchQuery) ?>
"<?php endif ?> />
									
									<input type="text" id="dir-searchinput-category" placeholder="<?php echo htmlSpecialChars(__('All categories', 'ait')) ?>" />
									<input type="text" name="categories" id="dir-searchinput-category-id" value="0" style="display: none;" />
									
									<input type="text" id="dir-searchinput-location" placeholder="<?php echo htmlSpecialChars(__('All locations', 'ait')) ?>" />
									<input type="text" name="locations" id="dir-searchinput-location-id" value="0" style="display: none;" />

									<div class="reset-ajax"></div>

<?php if (isset($themeOptions->search->showAdvancedSearch)): ?>
									<div id="dir-searchinput-settings" class="dir-searchinput-settings">
										<div id="dir-search-advanced">
											<?php if (isset($themeOptions->search->advancedSearchText)): ?><div class="searchbox-title text"><?php echo NTemplateHelpers::escapeHtml($themeOptions->search->advancedSearchText, ENT_NOQUOTES) ?>
</div><?php endif ?>


											<div class="search-slider-geo">
												<div class="geo-button">
													<input type="checkbox" name="geo" id="dir-searchinput-geo"<?php if (isset($isGeolocation)): ?>
 checked="true"<?php endif ?> />
												</div>

												<div class="geo-slider">
													<div class="value-slider"></div>
												</div>

												<div class="text-geo-radius clear">
													<!-- <div class="geo-radius"><?php echo NTemplateHelpers::escapeHtmlComment(__('Radius:', 'ait')) ?></div> -->
													<input type="text" name="geo-radius" id="dir-searchinput-geo-radius" value="<?php if (isset($isGeolocation)): echo htmlSpecialChars($geolocationRadius) ;else: if (isset($themeOptions->search->advancedSearchDefaultValue)): echo htmlSpecialChars($themeOptions->search->advancedSearchDefaultValue) ;else: ?>
100<?php endif ;endif ?>" data-default-value="<?php if (isset($themeOptions->search->advancedSearchDefaultValue)): echo htmlSpecialChars($themeOptions->search->advancedSearchDefaultValue) ;else: ?>
100<?php endif ?>" />
													<div class="metric">km</div>
												</div>
											</div>
										</div>
									</div>
									<input type="hidden" name="geo-lat" id="dir-searchinput-geo-lat" value="0" />
									<input type="hidden" name="geo-lng" id="dir-searchinput-geo-lng" value="0" />
<?php endif ?>

									</div>
								</div>
							</div>
							<div id="dir-search-button">
								<input type="submit" value="<?php echo htmlSpecialChars(__('Search', 'ait')) ?>" class="dir-searchsubmit" />
							</div>
							<input type="hidden" name="dir-search" value="yes" />
						</form>
					</div>
				</div>

<?php endif ?>

			</div>

<?php if (isset($isDirSingle)): NCoreMacros::includeTemplate('snippets/map-single-javascript.php', $template->getParams(), $_l->templates['kfldvqm1hi'])->render() ;else: if ($headerType == 'map'): NCoreMacros::includeTemplate('snippets/map-javascript.php', $template->getParams(), $_l->templates['kfldvqm1hi'])->render() ;endif ;endif ;

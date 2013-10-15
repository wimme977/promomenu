<?php //netteCache[01]000478a:2:{s:4:"time";s:21:"0.78207000 1381775845";s:9:"callbacks";a:3:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:89:"/var/www/promomenu/wp-content/themes/businessfinder/Templates/snippets/map-javascript.php";i:2;i:1380890610;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:30:"eee17d5 released on 2011-08-13";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:21:"WPLATTE_CACHE_VERSION";i:2;i:4;}}}?><?php

// source file: /var/www/promomenu/wp-content/themes/businessfinder/Templates/snippets/map-javascript.php

?><?php list($_l, $_g) = NCoreMacros::initRuntime($template, 'tud5jkaefc')
;
// snippets support
if (!empty($control->snippetMode)) {
	return NUIMacros::renderSnippets($control, $_l, get_defined_vars());
}

//
// main template
//
?>
<script type="text/javascript">
var mapDiv,
	map,
	infobox;

/*******************************************
 MARTIN 11.7.2013 MAP STYLING SUPPORT
********************************************/					
function aitAddMapStyles(hueVal, lightnessVal, saturationVal, gammaVal) {

	var stylersArray = [];

	if (hueVal) {
		stylersArray.push({
			"hue": hueVal
		});
	}

	 if (lightnessVal) {
        var mapLightness = parseInt(lightnessVal);
        if (mapLightness < -100) {
            mapLightness = -100;
        } else if (mapLightness > 100) {
            mapLightness = 100;
        }
        stylersArray.push({
			"lightness": mapLightness
        });
    }

    if (saturationVal) {
    	var mapSaturation = parseInt(saturationVal);
        if (mapSaturation < -100) {
            mapSaturation = -100;
        } else if (mapSaturation > 100) {
            mapSaturation = 100;
        }
		stylersArray.push({
			"saturation": mapSaturation
		});
	}

	if (gammaVal) {
    	var mapGamma = parseFloat(gammaVal);
        if (mapGamma < 0.01) {
            mapGamma = 0.01;
        } else if (mapGamma > 9.99) {
            mapGamma = 9.99;
        }
    	stylersArray.push({
    		"gamma": mapGamma
    	});
    }

    return stylersArray;
}
/*******************************************
 // END MAP STYLING SUPPORT
********************************************/

jQuery(document).ready(function($) {

	mapDiv = $("#directory-main-bar");
	mapDiv.height(<?php echo $themeOptions->directoryMap->mapHeight ?>).gmap3({
		map: {
			options: {
<?php $iterations = 0; foreach ($iterator = $_l->its[] = new NSmartCachingIterator(parseMapOptions($themeOptions->directoryMap)) as $key => $value): ?>
				<?php if ($iterator->first): echo NTemplateHelpers::escapeJs($key) ?>: <?php echo $value ;else: ?>
,<?php echo NTemplateHelpers::escapeJs($key) ?>: <?php echo $value ;endif ?>

<?php $iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ;if ((isset($items)) && (count($items) == 1) && (!isset($isGeolocation))): ?>
				,center: [<?php if (isset($items[0]->optionsDir['gpsLatitude'])): echo $items[0]->optionsDir['gpsLatitude'] ;else: ?>
0<?php endif ?>,<?php if (isset($items[0]->optionsDir['gpsLongitude'])): echo $items[0]->optionsDir['gpsLongitude'] ;else: ?>
0<?php endif ?>]
				,zoom: <?php echo $themeOptions->directory->setZoomIfOne ?>

<?php endif ?>

				/*******************************************
				 MARTIN 11.7.2013 MAP STYLING SUPPORT
				********************************************/

<?php if (isset($themeOptions->directoryMap->changeMapStyle) &&
					(!empty($themeOptions->directoryMap->mapStyleHue) || !empty($themeOptions->directoryMap->mapStyleSaturation) || 
					 !empty($themeOptions->directoryMap->mapStyleLightness) || !empty($themeOptions->directoryMap->mapStyleGamma))): ?>
				,styles: [{
					"stylers": aitAddMapStyles(<?php echo NTemplateHelpers::escapeJs($themeOptions->directoryMap->mapStyleHue) ?>
, <?php echo NTemplateHelpers::escapeJs($themeOptions->directoryMap->mapStyleLightness) ?>, 
						<?php echo NTemplateHelpers::escapeJs($themeOptions->directoryMap->mapStyleSaturation) ?>
, <?php echo NTemplateHelpers::escapeJs($themeOptions->directoryMap->mapStyleGamma) ?>)
				}]
<?php endif ?>
				/*******************************************
				 // END MAP STYLING SUPPORT
				********************************************/
			}
		}
<?php if (isset($isGeolocation) && (!isset($_GET['geo-lat'])) && (!isset($_GET['geo-lng']))): ?>
		,getgeoloc:{
			callback : function(latLng){

				if (latLng){
					$(this).gmap3({
						map:{
							options:{
								center: latLng,
								zoom: 5
							}
						}
					});
					$('#dir-searchinput-geo-lat').val(latLng.lat());
					$('#dir-searchinput-geo-lng').val(latLng.lng());
					ajaxGetMarkers(false,latLng);
				}

			}
		}
<?php else: if (!empty($items)): ?>
		,marker: {
			values: [
<?php $iterations = 0; foreach ($iterator = $_l->its[] = new NSmartCachingIterator($items) as $item): ?>
					{
						latLng: [<?php if (isset($item->optionsDir['gpsLatitude'])): echo $item->optionsDir['gpsLatitude'] ;else: ?>
0<?php endif ?>,<?php if (isset($item->optionsDir['gpsLongitude'])): echo $item->optionsDir['gpsLongitude'] ;else: ?>
0<?php endif ?>],
						options: {
							icon: "<?php echo $item->marker ?>",
							shadow: "<?php echo $themeOptions->directoryMap->mapMarkerImageShadow ?>",
						},
						data: '<div class="marker-holder"><div class="marker-content<?php if (isset($item->thumbnailDir)): ?>
 with-image"><img src="<?php echo AitImageResizer::resize($item->thumbnailDir, array('w' => 120, 'h' => 160)) ?>
" alt=""><?php else: ?>"><?php endif ?><div class="map-item-info"><div class="title">'+<?php if (isset($item->post_title)): echo NTemplateHelpers::escapeJs($item->post_title) ?>
+<?php endif ?>'</div><?php if ($item->rating): ?><div class="rating"><?php for ($i=1; $i <= $item->rating["max"]; $i++): ?>
<div class="star<?php if ($i <= $item->rating["val"]): ?> active<?php endif ?>"></div><?php endfor ?>
</div><?php endif ?><div class="address">'+<?php if (isset($item->optionsDir["address"])): echo NTemplateHelpers::escapeJs($template->nl2br($item->optionsDir["address"])) ?>
+<?php endif ?>'</div><a href="<?php echo $item->link ?>" class="more-button">' + <?php echo NTemplateHelpers::escapeJs(__('VIEW MORE', 'ait')) ?> + '</a></div><div class="arrow"></div><div class="close"></div></div></div></div>'
					}
				<?php if (!($iterator->last)): ?>,<?php endif ?>

<?php $iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
			],
			options:{
				draggable: false
			},
			cluster:{
          		radius: 20,
				// This style will be used for clusters with more than 0 markers
				0: {
					content: "<div class='cluster cluster-1'>CLUSTER_COUNT</div>",
					width: 90,
					height: 80
				},
				// This style will be used for clusters with more than 20 markers
				20: {
					content: "<div class='cluster cluster-2'>CLUSTER_COUNT</div>",
					width: 90,
					height: 80
				},
				// This style will be used for clusters with more than 50 markers
				50: {
					content: "<div class='cluster cluster-3'>CLUSTER_COUNT</div>",
					width: 90,
					height: 80
				},
				events: {
					click: function(cluster) {
						map.panTo(cluster.main.getPosition());
						map.setZoom(map.getZoom() + 2);
					}
				}
          	},
			events: {
				click: function(marker, event, context){
					map.panTo(marker.getPosition());

					infobox.setContent(context.data);
					infobox.open(map,marker);

					// if map is small
					var iWidth = 260;
					var iHeight = 300;
					if((mapDiv.width() / 2) < iWidth ){
						var offsetX = iWidth - (mapDiv.width() / 2);
						map.panBy(offsetX,0);
					}
					if((mapDiv.height() / 2) < iHeight ){
						var offsetY = -(iHeight - (mapDiv.height() / 2));
						map.panBy(0,offsetY);
					}

				}
			}
		}
		<?php endif ?> 		<?php endif ?> 	}<?php if ((isset($items)) && (count($items) > 1) && (!isset($isGeolocation))): ?>
,"autofit"<?php endif ?>);

	map = mapDiv.gmap3("get");
    infobox = new InfoBox({
    	pixelOffset: new google.maps.Size(-225, -65),
    	closeBoxURL: '',
    	enableEventPropagation: true
    });
    mapDiv.delegate('.infoBox .close','click',function () {
    	infobox.close();
    });

    if (Modernizr.touch){
    	<?php if (isset($themeOptions->directoryMap->draggableForTouch)): ?>map.setOptions({ draggable : true });<?php else: ?>
map.setOptions({ draggable : false });<?php endif ?>

<?php if (isset($themeOptions->directoryMap->draggableToggleButton)): ?>
        var draggableClass = <?php if (isset($themeOptions->directoryMap->draggableForTouch)): ?>
'active'<?php else: ?>'inactive'<?php endif ?>;
        var draggableTitle = <?php if (isset($themeOptions->directoryMap->draggableForTouch)): echo NTemplateHelpers::escapeJs(__('Deactivate map', 'ait')) ;else: echo NTemplateHelpers::escapeJs(__('Activate map', 'ait')) ;endif ?>;
        var draggableButton = $('<div class="draggable-toggle-button '+draggableClass+'">'+draggableTitle+'</div>').appendTo(mapDiv);
        draggableButton.click(function () {
        	if($(this).hasClass('active')){
        		$(this).removeClass('active').addClass('inactive').text(<?php echo NTemplateHelpers::escapeJs(__('Activate map', 'ait')) ?>);
        		map.setOptions({ draggable : false });
        	} else {
        		$(this).removeClass('inactive').addClass('active').text(<?php echo NTemplateHelpers::escapeJs(__('Deactivate map', 'ait')) ?>);
        		map.setOptions({ draggable : true });
        	}
        });
<?php endif ?>
    }

<?php if (isset($isGeolocation) && (isset($_GET['geo-lat'])) && (isset($_GET['geo-lng'])) && (isset($_GET['geo-radius']))): ?>
    generateOnlyGeo(<?php echo NTemplateHelpers::escapeJs($_GET['geo-lat']) ?>,<?php echo NTemplateHelpers::escapeJs($_GET['geo-lng']) ?>
,<?php echo NTemplateHelpers::escapeJs($_GET['geo-radius']) ?>);
<?php endif ?>

<?php NCoreMacros::includeTemplate('ajaxfunctions-javascript.php', $template->getParams(), $_l->templates['tud5jkaefc'])->render() ?>

});
</script>
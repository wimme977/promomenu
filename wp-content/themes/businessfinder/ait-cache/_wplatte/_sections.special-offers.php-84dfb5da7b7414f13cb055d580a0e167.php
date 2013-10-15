<?php //netteCache[01]000478a:2:{s:4:"time";s:21:"0.90427000 1381775845";s:9:"callbacks";a:3:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:89:"/var/www/promomenu/wp-content/themes/businessfinder/Templates/sections/special-offers.php";i:2;i:1377248416;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:30:"eee17d5 released on 2011-08-13";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:21:"WPLATTE_CACHE_VERSION";i:2;i:4;}}}?><?php

// source file: /var/www/promomenu/wp-content/themes/businessfinder/Templates/sections/special-offers.php

?><?php list($_l, $_g) = NCoreMacros::initRuntime($template, '1odpq86pg9')
;
// snippets support
if (!empty($control->snippetMode)) {
	return NUIMacros::renderSnippets($control, $_l, get_defined_vars());
}

//
// main template
//
if (!empty($items)): ?>
<div class="section-special-offers special-offer-holder">
	<div class="wrapper">
<?php $iterations = 0; foreach ($iterator = $_l->its[] = new NSmartCachingIterator($items) as $offer): ?>
		<div class="special-offer" style="display: none;">
				<div class="image<?php if (empty($offer->options['specialImage'])): ?> no-image<?php endif ?>">
<?php if (!empty($offer->options['specialImage'])): ?>
						<a href="<?php echo htmlSpecialChars($offer->link) ?>"><img src="<?php echo AitImageResizer::resize($offer->options['specialImage'], array('w' => 450, 'h' => 270)) ?>" /></a>
<?php endif ?>
					<div class="price"><?php echo NTemplateHelpers::escapeHtml($offer->options['specialPrice'], ENT_NOQUOTES) ?></div>
				</div>
				<div class="text">
					<h3 class="title"><a href="<?php echo htmlSpecialChars($offer->link) ?>"><?php echo NTemplateHelpers::escapeHtml($offer->options['specialTitle'], ENT_NOQUOTES) ?></a></h3>
					<div class="at"><?php echo NTemplateHelpers::escapeHtml(__("at", 'ait'), ENT_NOQUOTES) ?>
 <a href="<?php echo htmlSpecialChars($offer->link) ?>"><?php echo $offer->post_title ?></a></div>
					<div class="content"><?php echo $offer->options['specialContent'] ?></div>
				</div>
		</div>
<?php $iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
		<div class="section-controls">
			<div class="prev"><div class="prev-img"></div></div>
			<div class="next"><div class="next-img"></div></div>
		</div>
	</div>
</div>
<script type="text/javascript">
jQuery(document).ready(function($) {
	var sec = $('.section-special-offers'),
		offers = sec.find('.special-offer'),
		controls = sec.find('.section-controls'),
		current = 0,
		count = offers.length,
		animated = false,
		speed = 400;

	offers.eq(current).show();

	controls.find('.prev').click(function(event) {
		if (!animated) {
			animated = true;
			if (current > 0) {
				offers.eq(current).fadeOut(speed, function() {
					current -= 1;
					offers.eq(current).fadeIn(speed, function() {
						animated = false;
					});
				});
			} else {
				offers.eq(current).fadeOut(speed, function() {
					current = count - 1;
					offers.eq(current).fadeIn(speed, function() {
						animated = false;
					});
				});
			}
		}
	});

	controls.find('.next').click(function(event) {
		if (!animated) {
			animated = true;
			if (current < (count - 1)) {
				offers.eq(current).fadeOut(speed, function() {
					current += 1;
					offers.eq(current).fadeIn(speed, function() {
						animated = false;
					});
				});
			} else {
				offers.eq(current).fadeOut(speed, function() {
					current = 0;
					offers.eq(current).fadeIn(speed, function() {
						animated = false;
					});
				});
			}
		}
	});
});
</script>
<?php endif ;

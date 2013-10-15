<?php //netteCache[01]000478a:2:{s:4:"time";s:21:"0.10945400 1381775846";s:9:"callbacks";a:3:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:89:"/var/www/promomenu/wp-content/themes/businessfinder/Templates/sections/people-ratings.php";i:2;i:1377048492;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:30:"eee17d5 released on 2011-08-13";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:21:"WPLATTE_CACHE_VERSION";i:2;i:4;}}}?><?php

// source file: /var/www/promomenu/wp-content/themes/businessfinder/Templates/sections/people-ratings.php

?><?php list($_l, $_g) = NCoreMacros::initRuntime($template, 'rmpta9x3xs')
;
// snippets support
if (!empty($control->snippetMode)) {
	return NUIMacros::renderSnippets($control, $_l, get_defined_vars());
}

//
// main template
//
if (!empty($items)): ?>
<div class="section-people-ratings">
	<div class="wrapper">
		<h3 class="section-title"><?php echo NTemplateHelpers::escapeHtml(__("People Saying", 'ait'), ENT_NOQUOTES) ?></h3>
		<div class="people-ratings">
<?php $iterations = 0; foreach ($iterator = $_l->its[] = new NSmartCachingIterator($items) as $item): ?>
			<div class="person-rating" data-by="<?php echo htmlSpecialChars($item->post_title) ?>
" data-for="<?php echo htmlSpecialChars($item->for->post_title) ?>" data-for-link="<?php echo htmlSpecialChars(get_permalink($item->for->ID)) ?>" style="display: none;">
				<div class="rating-bubble">
					<div class="content"><?php echo NTemplateHelpers::escapeHtml($item->post_content, ENT_NOQUOTES) ?></div>
					<div class="stars clearfix">
<?php for ($j = 1; $j <= $item->rating['max']; $j++): ?>
						<span class="star<?php if ($j <= $item->rating['val']): ?> active<?php endif ;if ($j == $item->rating['max']): ?>
 last<?php endif ?>"></span>
<?php endfor ?>
					</div>
				</div>
				<div class="rating-meta-info">
					<span class="by"><?php echo NTemplateHelpers::escapeHtml($item->post_title, ENT_NOQUOTES) ?></span>
					<?php echo NTemplateHelpers::escapeHtml(__("at", 'ait'), ENT_NOQUOTES) ?>

					<a href="<?php echo htmlSpecialChars(get_permalink($item->for->ID)) ?>" class="at"><?php echo NTemplateHelpers::escapeHtml($item->for->post_title, ENT_NOQUOTES) ?></a>
				</div>
			</div>
<?php $iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
			<div class="section-controls">
				<div class="prev"><div class="prev-img"></div></div>
				<div class="next"><div class="next-img"></div></div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
jQuery(document).ready(function($) {
	var sec = $('.section-people-ratings'),
		ratings = sec.find('.person-rating'),
		controls = sec.find('.section-controls'),
		current = 0,
		count = ratings.length,
		animated = false,
		speed = 400;

	ratings.eq(current).show();

	controls.find('.prev').click(function(event) {
		if (!animated) {
			animated = true;
			if (current > 0) {
				ratings.eq(current).fadeOut(speed, function() {
					current -= 1;
					ratings.eq(current).fadeIn(speed, function() {
						animated = false;
					});
				});
			} else {
				ratings.eq(current).fadeOut(speed, function() {
					current = count - 1;
					ratings.eq(current).fadeIn(speed, function() {
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
				ratings.eq(current).fadeOut(speed, function() {
					current += 1;
					ratings.eq(current).fadeIn(speed, function() {
						animated = false;
					});
				});
			} else {
				ratings.eq(current).fadeOut(speed, function() {
					current = 0;
					ratings.eq(current).fadeIn(speed, function() {
						animated = false;
					});
				});
			}
		}
	});
});
</script>
<?php endif ;

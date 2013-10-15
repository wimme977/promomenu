<?php //netteCache[01]000487a:2:{s:4:"time";s:21:"0.01183100 1381775846";s:9:"callbacks";a:3:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:98:"/var/www/promomenu/wp-content/themes/businessfinder/Templates/snippets/content-loop-dir-search.php";i:2;i:1380734672;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:30:"eee17d5 released on 2011-08-13";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:21:"WPLATTE_CACHE_VERSION";i:2;i:4;}}}?><?php

// source file: /var/www/promomenu/wp-content/themes/businessfinder/Templates/snippets/content-loop-dir-search.php

?><?php list($_l, $_g) = NCoreMacros::initRuntime($template, '8wig0i8h4t')
;
// snippets support
if (!empty($control->snippetMode)) {
	return NUIMacros::renderSnippets($control, $_l, get_defined_vars());
}

//
// main template
//
if (isset($displayType)): else: $displayType = 'grid' ;endif ?>


<?php if ($displayType === 'list'): ?>

	<ul class="items items-list-view<?php if (isset($onecolumn)): ?> onecolumn<?php endif ?>">
<?php $iterations = 0; foreach ($iterator = $_l->its[] = new NSmartCachingIterator($posts) as $item): $options = get_post_meta($item->ID, '_ait-dir-item', true) ?>
		<li class="item clearfix<?php if (isset($item->packageClass)): ?> <?php echo htmlSpecialChars($item->packageClass) ;endif ;if ($iterator->isLast()): ?>
 item-last<?php endif ;if (isset($item->optionsDir['featured'])): ?> featured<?php endif ?>">
			<div class="item-content-wrapper clearfix left">
<?php if ($item->thumbnailDir): ?>
				<div class="item-thumbnail left">
					<a href="<?php echo $item->link ?>"><img src="<?php echo AitImageResizer::resize($item->thumbnailDir, array('w' => 84, 'h' => 84)) ?>
" alt="<?php echo htmlSpecialChars(__('Item thumbnail', 'ait')) ?>" /></a>
				</div>
<?php endif ?>
				<div class="item-description left">
					<h3 class="item-title"><a href="<?php echo $item->link ?>"><?php echo NTemplateHelpers::escapeHtml($item->post_title, ENT_NOQUOTES) ?></a></h3>
					<p class="item-excerpt"><?php echo $item->excerptDir ?></p>
					<div class="item-meta">
<?php if (isset($options['address'])): ?>
						<div class="item-meta-information item-address left"><?php echo NTemplateHelpers::escapeHtml($options['address'], ENT_NOQUOTES) ?></div>
<?php endif ?>

<?php if (!empty($options['web'])): ?>
						<div class="item-meta-information item-website left"><a href="<?php echo htmlSpecialChars(aitAddHttp($options['web'])) ?>
"><?php echo NTemplateHelpers::escapeHtml($options['web'], ENT_NOQUOTES) ?></a></div>
<?php endif ?>

<?php if (isset($options['email'])): ?>
						<div class="item-meta-information item-meta-information-last item-email left"><a href="mailto:<?php echo htmlSpecialChars($options['email']) ?>
"><?php echo NTemplateHelpers::escapeHtml($options['email'], ENT_NOQUOTES) ?></a></div>
<?php endif ?>
					</div>
				</div>
			</div>

<?php if (isset($themeOptions->rating->enableRating)): ?>
			<div class="item-rating rating-grey right">
<?php if ($item->rating): ?>
				<div class="item-stars clearfix">
<?php for ($j = 1; $j <= $item->rating['max']; $j++): ?>
					<span class="star<?php if ($j <= $item->rating['val']): ?> active<?php endif ;if ($j == $item->rating['max']): ?>
 last<?php endif ?>"></span>
<?php endfor ?>
				</div>
<?php else: ?>
				<div class="item-no-rating"><?php echo NTemplateHelpers::escapeHtml(__("No rating yet.", 'ait'), ENT_NOQUOTES) ?></div>
<?php endif ?>
			</div>
<?php endif ?>

		</li>
<?php $iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
	</ul>

<?php else: ?>

<?php $i = 0 ;$iterations = 0; foreach ($iterator = $_l->its[] = new NSmartCachingIterator($posts) as $item): ?>
	<?php if ($iterator->isFirst()): ?><ul class="items items-grid-view clearfix<?php if (isset($onecolumn)): ?>
 onecolumn<?php endif ?>"><?php endif ?>

<?php $i++ ;$options = get_post_meta($item->ID, '_ait-dir-item', true) ?>
		<li class="item clearfix sc-column <?php if ($i == 3): ?>sc-column-last <?php endif ?>
one-third<?php if ($i == 3): ?>-last<?php endif ;if (isset($item->packageClass)): ?>
 <?php echo htmlSpecialChars($item->packageClass) ;endif ;if (isset($item->optionsDir['featured'])): ?>
 featured<?php endif ?>">

<?php if ($item->thumbnailDir): ?>
			<div class="item-thumbnail">
				<a href="<?php echo $item->link ?>"><img src="<?php echo AitImageResizer::resize($item->thumbnailDir, array('w' => 420, 'h' => 200)) ?>
" alt="<?php echo htmlSpecialChars(__('Item thumbnail', 'ait')) ?>" /></a>
			</div>
<?php endif ?>
			
			<h3 class="item-title"><a href="<?php echo $item->link ?>"><?php echo NTemplateHelpers::escapeHtml($item->post_title, ENT_NOQUOTES) ?></a></h3>

<?php if (isset($options['address'])): ?>
			<div class="item-address-wrapper">
				<div class="item-address-pin"></div>
				<p class="item-address">
					<?php echo NTemplateHelpers::escapeHtml($options['address'], ENT_NOQUOTES) ?>

				</p>
			</div>
<?php endif ?>

<?php if (isset($themeOptions->rating->enableRating)): ?>
			<div class="item-rating rating-grey">
<?php if ($item->rating): ?>
				<div class="item-stars clearfix">
<?php for ($j = 1; $j <= $item->rating['max']; $j++): ?>
					<span class="star<?php if ($j <= $item->rating['val']): ?> active<?php endif ;if ($j == $item->rating['max']): ?>
 last<?php endif ?>"></span>
<?php endfor ?>
				</div>
<?php else: ?>
				<div class="item-no-rating"><?php echo NTemplateHelpers::escapeHtml(__("No rating yet.", 'ait'), ENT_NOQUOTES) ?></div>
<?php endif ?>
			</div>
<?php endif ?>

		</li>
<?php if ($i == 3): $i = 0 ;endif ?>
	<?php if ($iterator->isLast()): ?></ul><?php endif ?>

<?php $iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>

<?php endif ;

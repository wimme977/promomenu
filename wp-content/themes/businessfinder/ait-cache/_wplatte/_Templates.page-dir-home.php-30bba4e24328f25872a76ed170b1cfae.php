<?php //netteCache[01]000468a:2:{s:4:"time";s:21:"0.15858300 1381775845";s:9:"callbacks";a:3:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:79:"/var/www/promomenu/wp-content/themes/businessfinder/Templates/page-dir-home.php";i:2;i:1380890820;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:30:"eee17d5 released on 2011-08-13";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:21:"WPLATTE_CACHE_VERSION";i:2;i:4;}}}?><?php

// source file: /var/www/promomenu/wp-content/themes/businessfinder/Templates/page-dir-home.php

?><?php list($_l, $_g) = NCoreMacros::initRuntime($template, '7a5322txpd')
;//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lbb0f7775c61_content')) { function _lbb0f7775c61_content($_l, $_args) { extract($_args)
?>

<div class="subcats-holder<?php if (!isset($post->content)): ?> no-margin<?php endif ;if (isset($themeOptions->directory->showTopCategories)): ?>
 categories-active<?php else: ?> categories-inactive<?php endif ;if (isset($themeOptions->directory->showTopLocations)): ?>
 locations-active<?php else: ?> locations-inactive<?php endif ?>">
<?php if (isset($themeOptions->directory->showTopCategories)): ?>
	<div class="category-subcategories categories onecolumn clearfix">
		<div class="wrapper">
<?php if (!empty($themeOptions->directory->topCategoriesTitle)): ?>
			<h2><?php echo $themeOptions->directory->topCategoriesTitle ?></h2>
<?php endif ;$i = 0 ;$iterations = 0; foreach ($iterator = $_l->its[] = new NSmartCachingIterator($subcategories) as $category): $i++ ?>
			<?php if ($iterator->isFirst()): ?><ul class="subcategories"><?php endif ?>

				<li class="category sc-column <?php if ($i == 4): ?>sc-column-last <?php endif ?>
one-fourth<?php if ($i == 4): ?>-last<?php endif ?>">
					<div class="category-wrap-table">
						<div class="category-wrap-row">
							<div class="heading">
								<div class="icon" style="background: url('<?php echo AitImageResizer::resize($category->icon, array('w' => 48, 'h' => 48)) ?>') no-repeat center top;"></div>
								<h3><a href="<?php echo $category->link ?>"><?php echo $category->name ?></a></h3>
							</div>
							<div class="description">
								<?php echo $category->excerpt ?>

							</div>
						</div>
					</div>
				</li>
<?php if ($i == 4): ?>
				<li class="clearfix"></li>
<?php $i = 0 ;endif ?>
			<?php if ($iterator->isLast()): ?></ul><?php endif ?>

<?php $iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
		</div>
	</div>
<?php endif ?>

<?php if (isset($themeOptions->directory->showTopLocations)): ?>
	<div class="category-subcategories locations onecolumn clearfix">
		<div class="wrapper">
<?php if (!empty($themeOptions->directory->topLocationsTitle)): ?>
			<h2 class="subcategories-title"><?php echo $themeOptions->directory->topLocationsTitle ?></h2>
<?php endif ;$i = 0 ;$iterations = 0; foreach ($iterator = $_l->its[] = new NSmartCachingIterator($sublocations) as $location): $i++ ?>
			<?php if ($iterator->isFirst()): ?><ul class="subcategories"><?php endif ?>

				<li class="category sc-column <?php if ($i == 4): ?>sc-column-last <?php endif ?>
one-fourth<?php if ($i == 4): ?>-last<?php endif ?>">
					<div class="category-wrap-table">
						<div class="category-wrap-row">
							<div class="heading">
								<div class="icon" style="background: url('<?php echo AitImageResizer::resize($location->icon, array('w' => 48, 'h' => 48)) ?>') no-repeat center top;"></div>
								<h3><a href="<?php echo $location->link ?>"><?php echo $location->name ?></a></h3>
							</div>
							<div class="description">
								<?php echo $location->excerpt ?>

							</div>
						</div>
					</div>
				</li>
<?php if ($i == 4): ?>
				<li class="clearfix"></li>
<?php $i = 0 ;endif ?>
			<?php if ($iterator->isLast()): ?></ul><?php endif ?>

<?php $iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
		</div>
	</div>
<?php endif ?>
</div>

<?php if ($post->content): ?>
<div id="content" role="main">
	<div id="primary">

		<article id="post-<?php echo htmlSpecialChars($post->id) ?>" class="<?php echo htmlSpecialChars($post->htmlClasses) ?>">
			
			
<?php if ($themeOptions->directory->dirHomepageAltContent): ?>
			<div class="alternative-content">
				<?php echo $themeOptions->directory->dirHomepageAltContent ?>

			</div>
<?php endif ?>
			
<?php if ($post->thumbnailSrc): ?>
			<a href="<?php echo $post->thumbnailSrc ?>">
				<div class="entry-thumbnail"><img src="<?php echo AitImageResizer::resize($post->thumbnailSrc, array('w' => 140, 'h' => 200)) ?>" alt="" /></div>
			</a>
<?php endif ?>

			<div class="entry-content">
				<?php echo $post->content ?>

			</div>

		</article><!-- /#post-<?php echo NTemplateHelpers::escapeHtmlComment($post->id) ?> -->

<?php if (isset($themeOptions->advertising->showBox4)): ?>
		<div id="advertising-box-4" class="advertising-box wrapper-650">
		    <?php echo $themeOptions->advertising->box4Content ?>

		</div>
<?php endif ?>

	</div>

<?php if(is_active_sidebar("sidebar-home")): ?>
	<div id="secondary" class="widget-area" role="complementary">
<?php dynamic_sidebar('sidebar-home') ?>
	</div>
<?php endif ?>

</div>
<?php endif ?>

<?php $iterations = 0; foreach ($iterator = $_l->its[] = new NSmartCachingIterator($secOrder) as $sec): if (($sec == 'specialOffers') && isset($post->options('sections')->section1Show)): NCoreMacros::includeTemplate('sections/special-offers.php', array('items' => $specialOffers) + $template->getParams(), $_l->templates['7a5322txpd'])->render() ;endif ;if (($sec == 'bestPlaces') && isset($post->options('sections')->section2Show)): NCoreMacros::includeTemplate('sections/best-places.php', array('items' => $bestPlaces) + $template->getParams(), $_l->templates['7a5322txpd'])->render() ;endif ;if (($sec == 'recentPlaces') && isset($post->options('sections')->section3Show)): NCoreMacros::includeTemplate('sections/recent-places.php', array('items' => $recentPlaces) + $template->getParams(), $_l->templates['7a5322txpd'])->render() ;endif ;if (($sec == 'peopleRatings') && isset($post->options('sections')->section4Show)): NCoreMacros::includeTemplate('sections/people-ratings.php', array('items' => $peopleRatings) + $template->getParams(), $_l->templates['7a5322txpd'])->render() ;endif ;$iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>

<?php
}}

//
// end of blocks
//

// template extending and snippets support

$_l->extends = true; unset($_extends, $template->_extends);


if ($_l->extends) {
	ob_start();
} elseif (!empty($control->snippetMode)) {
	return NUIMacros::renderSnippets($control, $_l, get_defined_vars());
}

//
// main template
//
$_l->extends = $layout ?>

<?php 
// template extending support
if ($_l->extends) {
	ob_end_clean();
	NCoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render();
}

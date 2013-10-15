<?php //netteCache[01]000475a:2:{s:4:"time";s:21:"0.91556200 1381775845";s:9:"callbacks";a:3:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:86:"/var/www/promomenu/wp-content/themes/businessfinder/Templates/sections/best-places.php";i:2;i:1377188812;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:30:"eee17d5 released on 2011-08-13";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:21:"WPLATTE_CACHE_VERSION";i:2;i:4;}}}?><?php

// source file: /var/www/promomenu/wp-content/themes/businessfinder/Templates/sections/best-places.php

?><?php list($_l, $_g) = NCoreMacros::initRuntime($template, '7u7t9a976p')
;
// snippets support
if (!empty($control->snippetMode)) {
	return NUIMacros::renderSnippets($control, $_l, get_defined_vars());
}

//
// main template
//
if (!empty($items)): ?>
<div class="section-best-places">
    <div class="wrapper">
         <h3 class="section-title"><?php echo NTemplateHelpers::escapeHtml(__("The Best Places", 'ait'), ENT_NOQUOTES) ?></h3>
        <div class="best-places-wrap">
<?php if (!empty($post->options('sections')->section2Type)): $displayType = $post->options('sections')->section2Type ;else: $displayType = 'grid' ;endif ;NCoreMacros::includeTemplate('../snippets/content-loop-dir-search.php', array('displayType' => $displayType, 'posts' => $items, 'hideSorting' => true, 'onecolumn' => true) + $template->getParams(), $_l->templates['7u7t9a976p'])->render() ?>
        </div>
    </div>
</div>
<?php endif ;

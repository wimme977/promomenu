<?php //netteCache[01]000462a:2:{s:4:"time";s:21:"0.17522900 1381775845";s:9:"callbacks";a:3:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:73:"/var/www/promomenu/wp-content/themes/businessfinder/Templates/@layout.php";i:2;i:1372076434;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:30:"eee17d5 released on 2011-08-13";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:21:"WPLATTE_CACHE_VERSION";i:2;i:4;}}}?><?php

// source file: /var/www/promomenu/wp-content/themes/businessfinder/Templates/@layout.php

?><?php list($_l, $_g) = NCoreMacros::initRuntime($template, 'wuqo8t0cl2')
;
// snippets support
if (!empty($control->snippetMode)) {
	return NUIMacros::renderSnippets($control, $_l, get_defined_vars());
}

//
// main template
//
get_header("") ?>

<?php $fullwidth = true ?>

<?php if (isset($sidebarType) && $sidebarType == 'home'): if (is_active_sidebar('sidebar-home')): $fullwidth = false ;endif ;elseif (isset($sidebarType) && $sidebarType == 'item'): if (is_active_sidebar('sidebar-item')): $fullwidth = false ;endif ;elseif (isset($sidebarType) && $sidebarType == 'sidebar-1'): if (is_active_sidebar('sidebar-1')): $fullwidth = false ;endif ;else: $fullwidth = true ;endif ?>

<div id="main" class="mainpage<?php if ($fullwidth): ?> onecolumn<?php endif ?>">
	<div id="wrapper-row">

<?php if (isset($themeOptions->advertising->showBox2)): ?>
        <div id="advertising-box-2" class="advertising-box">
            <div class="wrapper-650">
            	<?php echo $themeOptions->advertising->box2Content ?>

            </div>
        </div>
<?php endif ?>
		
<?php NUIMacros::callBlock($_l, 'content', array('fullwidth' => $fullwidth) + $template->getParams()) ?>

	</div>

</div> <!-- /#main -->

<?php get_footer("") ;

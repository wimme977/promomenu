<?php //netteCache[01]000479a:2:{s:4:"time";s:21:"0.55256700 1381775845";s:9:"callbacks";a:3:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:90:"/var/www/promomenu/wp-content/themes/businessfinder/Templates/snippets/branding-header.php";i:2;i:1380113354;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:30:"eee17d5 released on 2011-08-13";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:21:"WPLATTE_CACHE_VERSION";i:2;i:4;}}}?><?php

// source file: /var/www/promomenu/wp-content/themes/businessfinder/Templates/snippets/branding-header.php

?><?php list($_l, $_g) = NCoreMacros::initRuntime($template, 'cgsr1pxks5')
;
// snippets support
if (!empty($control->snippetMode)) {
	return NUIMacros::renderSnippets($control, $_l, get_defined_vars());
}

//
// main template
//
if (isset($registerErrors)): ?>
<div id="ait-dir-register-notifications" class="error">
	<div class="message wrapper">
	<?php echo $registerErrors ?>

	<div class="close"></div>
	</div>
</div>
<?php endif ?>

<?php if (isset($registerMessages)): ?>
<div id="ait-dir-register-notifications" class="info">
	<div class="message wrapper">
	<?php echo $registerMessages ?>

	<div class="close"></div>
	</div>
</div>
<?php endif ?>

<?php if (isset($themeOptions->advertising->showBox1)): ?>
<div id="advertising-box-1" class="advertising-box">
	<div class="wrapper">
		<div><?php echo $themeOptions->advertising->box1Content ?></div>
	 </div>
</div>
<?php endif ?>

<div class="topbar"></div>

<header id="branding" role="banner" class="<?php if (function_exists('icl_get_languages') && icl_get_languages('skip_missing=0')): ?>
wpml-active <?php else: ?>wpml-inactive <?php endif ;if (isset($themeOptions->general->registerMenuItem)): ?>
register-active <?php else: ?>register-inactive <?php endif ;if (isset($themeOptions->general->loginMenuItem)): ?>
login-active <?php else: ?>login-inactive <?php endif ?>site-header">
	<div class="wrapper header-holder">
		<div id="logo" class="left">
<?php if (!empty($themeOptions->general->logo_img)): ?>
			<a class="trademark" href="<?php echo htmlSpecialChars($homeUrl) ?>">
				<img src="<?php echo WpLatteFunctions::linkTo($themeOptions->general->logo_img) ?>
" alt="<?php echo htmlSpecialChars($themeOptions->general->logo_text) ?>" />
			</a>
<?php else: ?>
			<a href="<?php echo htmlSpecialChars($homeUrl) ?>">
				<span><?php echo NTemplateHelpers::escapeHtml($themeOptions->general->logo_text, ENT_NOQUOTES) ?></span>
			</a>
<?php endif ?>
		</div>
		
		<div class="menu-container right<?php if (!is_admin()): ?> clearfix<?php endif ?>">
			
		<div class="other-buttons">
			
<?php if ((!is_admin()) && function_exists('icl_get_languages')): if (icl_get_languages('skip_missing=0')): ?>
			<!-- WPML plugin required -->
			<div class="lang-wpml clearfix right">
				<div class="wpml-switch clearfix">
					<div class="lang-button">
<?php $iterations = 0; foreach ($iterator = $_l->its[] = new NSmartCachingIterator(icl_get_languages('skip_missing=0')) as $lang): ?>
							<?php if ($lang['active'] == 1): echo NTemplateHelpers::escapeHtml($lang['language_code'], ENT_NOQUOTES) ;endif ?>

<?php $iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
						<ul id="language-bubble" class="lang-bubble bubble clearfix">
<?php $iterations = 0; foreach ($iterator = $_l->its[] = new NSmartCachingIterator(icl_get_languages('skip_missing=0')) as $lang): if ($lang['active'] != 1): ?>
									<li class="lang <?php if ($lang['active'] == 1): ?>active<?php endif ?>
 left"><a href="<?php echo htmlSpecialChars($lang['url']) ?>"><?php echo NTemplateHelpers::escapeHtml($lang['language_code'], ENT_NOQUOTES) ?></a></li>
<?php endif ;$iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
						</ul>
					</div>
				</div> <!-- /.language-button -->
			</div>
			<div class="wpml-replace clearfix right">

			</div>
<?php endif ;endif ?>
			
<?php if (is_admin()): ?>
				<!-- EASY ADMIN MENU -->
<?php $screen = get_current_screen() ;$subscriber = in_array('subscriber', $GLOBALS['current_user']->roles) ?>

<?php if (!$subscriber): ?>
				<a href="<?php echo admin_url('edit.php?post_type=ait-dir-item') ?>" class="items button<?php if ((($screen->base == 'edit' && $screen->post_type == 'ait-dir-item') || ($screen->base == 'post' && $screen->post_type == 'ait-dir-item'))): ?>
 button-primary<?php endif ?>">
					<?php echo NTemplateHelpers::escapeHtml(__('My Items', 'ait'), ENT_NOQUOTES) ?>

				</a>
<?php if (isset($themeOptions->rating->enableRating)): ?>
				<a href="<?php echo admin_url('edit.php?post_type=ait-rating') ?>" class="ratings button<?php if (($screen->base == 'edit' && $screen->post_type == 'ait-rating')): ?>
 button-primary<?php endif ?>">
					<?php echo NTemplateHelpers::escapeHtml(__('Ratings', 'ait'), ENT_NOQUOTES) ?>

				</a>
<?php endif ;endif ?>
				<a href="<?php echo admin_url('profile.php') ?>" class="account button<?php if (($screen->base == 'profile')): ?>
 button-primary<?php endif ?>">
					<?php echo NTemplateHelpers::escapeHtml(__('Account', 'ait'), ENT_NOQUOTES) ?>

				</a>
				<a href="<?php echo htmlSpecialChars(home_url()) ?>" class="view-site button">
					<?php echo NTemplateHelpers::escapeHtml(__('View site', 'ait'), ENT_NOQUOTES) ?>

				</a>
<?php endif ?>

<?php if (isset($themeOptions->general->loginMenuItem)): if (is_user_logged_in()): ?>
					<a href="<?php echo wp_logout_url(home_url()) ?>" class="<?php if (is_admin()): ?>
login button<?php else: ?>menu-login menu-logout clearfix right<?php endif ?>"><?php echo NTemplateHelpers::escapeHtml(__("Logout", 'ait'), ENT_NOQUOTES) ?></a>
<?php if (!is_admin()): ?>
					<a href="<?php echo admin_url() ?>" class="menu-login menu-admin clearfix right"><?php echo NTemplateHelpers::escapeHtml(__("Admin", 'ait'), ENT_NOQUOTES) ?></a>
<?php endif ;else: ?>
					<a href="<?php echo wp_login_url() ?>" class="<?php if (is_admin()): ?>login button<?php else: ?>
menu-login not-logged clearfix right<?php endif ?>"><?php echo NTemplateHelpers::escapeHtml(__("Login", 'ait'), ENT_NOQUOTES) ?></a>
					<div style="display: none;">
						<div id="dir-login-form-popup">
							<?php echo NTemplateHelpers::escapeHtml(wp_login_form( array( 'form_id' => 'ait-dir-login-popup' ) ), ENT_NOQUOTES) ?>

						</div>
					</div>
<?php endif ;endif ?>

		</div>

<?php if (!is_admin()): ?>
			<div class="menu-content defaultContentWidth clearfix right">
				<nav id="access" role="navigation">
					<span class="menubut bigbut"><?php echo NTemplateHelpers::escapeHtml(__('Main Menu', 'ait'), ENT_NOQUOTES) ?></span>
<?php wp_nav_menu(array('theme_location' => 'primary-menu', 'fallback_cb' => 'default_page_menu', 'container' => 'nav', 'container_class' => 'mainmenu', 'menu_class' => 'menu')) ?>
				</nav><!-- #access -->
			</div>
<?php endif ?>

		</div>

	</div>
</header><!-- #branding -->
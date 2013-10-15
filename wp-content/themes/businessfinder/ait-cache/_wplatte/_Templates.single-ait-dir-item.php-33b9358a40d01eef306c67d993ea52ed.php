<?php //netteCache[01]000474a:2:{s:4:"time";s:21:"0.27712200 1381868192";s:9:"callbacks";a:3:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:85:"/var/www/promomenu/wp-content/themes/businessfinder/Templates/single-ait-dir-item.php";i:2;i:1380802956;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:30:"eee17d5 released on 2011-08-13";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:21:"WPLATTE_CACHE_VERSION";i:2;i:4;}}}?><?php

// source file: /var/www/promomenu/wp-content/themes/businessfinder/Templates/single-ait-dir-item.php

?><?php list($_l, $_g) = NCoreMacros::initRuntime($template, 'on125e5j7r')
;//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb74441779b7_content')) { function _lb74441779b7_content($_l, $_args) { extract($_args)
?>
<div id="content" role="main">
<div id="primary">

<article id="post-<?php echo htmlSpecialChars($post->id) ?>" class="<?php echo htmlSpecialChars($post->htmlClasses) ?>">

	<div class="item-detail-top clearfix">

<?php if ($post->thumbnailSrc): ?>
		<div class="item-detail-thumbnail left">
			<img src="<?php echo AitImageResizer::resize($post->thumbnailSrc, array('w' => 270, 'h' => 130)) ?>
" alt="<?php echo htmlSpecialChars(__('Item image', 'ait')) ?>" />
		</div>
<?php endif ?>

		<header class="item-detail-header<?php if ($post->thumbnailSrc): ?> left<?php endif ?>">
			<h1 class="entry-title"><?php echo NTemplateHelpers::escapeHtml($post->title, ENT_NOQUOTES) ?></h1>

			<div class="item-detail-breadcrumb breadcrumbs clearfix">
				<span class="home"><a href="<?php echo $homeUrl ?>"><?php echo NTemplateHelpers::escapeHtml(__('Home', 'ait'), ENT_NOQUOTES) ?></a>&nbsp;&nbsp;</span>
<?php $iterations = 0; foreach ($iterator = $_l->its[] = new NSmartCachingIterator($ancestors) as $anc): ?>
					<?php if ($iterator->isFirst()): ?><span class="ancestors"><?php endif ?>

					<a href="<?php echo $anc->link ?>"><?php echo $anc->name ?></a>&nbsp;&nbsp;&gt;
					<?php if ($iterator->isLast()): ?></span><?php endif ?>

<?php $iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
				<?php if (isset($term)): ?><span class="name"><a href="<?php echo $term->link ?>
"><?php echo $term->name ?></a></span><?php endif ?>

				<span class="title"> &gt;&nbsp;&nbsp;<?php echo NTemplateHelpers::escapeHtml($post->title, ENT_NOQUOTES) ?></span>
			</div>

<?php if ($rating): ?>
			<span class="item-detail-rating">
<?php for ($i = 1; $i <= $rating['max']; $i++): ?>
				<span class="star big<?php if ($i <= $rating['val']): ?> active<?php endif ?>"></span>
<?php endfor ?>
			</span>
<?php endif ?>
		</header>

	</div>


	<div class="item-detail-info clearfix">
		
<?php if ((!empty($options['address'])) || (!empty($options['gpsLatitude'])) || (!empty($options['telephone'])) || (!empty($options['email'])) || (!empty($options['web']))): ?>
		<div class="sc-column one-third">
			<dl class="item-detail-contact">
				
<?php if ((!empty($options['address']))): ?>
			    <dt class="item-detail-info-term"><?php echo NTemplateHelpers::escapeHtml(__('Address:', 'ait'), ENT_NOQUOTES) ?></dt>
			    <dd class="item-detail-info-desc"><?php echo $options['address'] ?></dd>
<?php endif ?>
			     
<?php if ((!empty($options['gpsLatitude']))): ?>
			    <dt class="item-detail-info-term"><?php echo NTemplateHelpers::escapeHtml(__('GPS:', 'ait'), ENT_NOQUOTES) ?></dt>
			    <dd class="item-detail-info-desc"><?php echo NTemplateHelpers::escapeHtml($options['gpsLatitude'], ENT_NOQUOTES) ?>
, <?php echo NTemplateHelpers::escapeHtml($options['gpsLongitude'], ENT_NOQUOTES) ?></dd>
<?php endif ?>
			    
<?php if ((!empty($options['telephone']))): ?>
			    <dt class="item-detail-info-term"><?php echo NTemplateHelpers::escapeHtml(__('Telephone:', 'ait'), ENT_NOQUOTES) ?></dt>
			    <dd class="item-detail-info-desc"><?php echo NTemplateHelpers::escapeHtml($options['telephone'], ENT_NOQUOTES) ?></dd>
<?php endif ?>
			    
<?php if ((!empty($options['email']))): ?>
			    <dt class="item-detail-info-term"><?php echo NTemplateHelpers::escapeHtml(__('Email:', 'ait'), ENT_NOQUOTES) ?> </dt>
			    <dd class="item-detail-info-desc"><a href="mailto:<?php echo $options['email'] ?>
"><?php echo $options['email'] ?></a></dd>
<?php endif ?>

<?php if ((!empty($options['web']))): ?>
			    <dt class="item-detail-info-term"><?php echo NTemplateHelpers::escapeHtml(__('Web:', 'ait'), ENT_NOQUOTES) ?> </dt>
			    <dd class="item-detail-info-desc"><a href="<?php echo $options['web'] ?>"><?php echo $options['web'] ?></a></dd>
<?php endif ?>
			    
			</dl>
<?php endif ?>
			<ul class="item-social-icons clearfix">
<?php for ($i = 1; $i <= 6; $i++): if (!empty($options['socialImg' . $i]) && !empty($options['socialLink' . $i])): ?>
				<li class="item-social-icon left">
					<a href="<?php echo htmlSpecialChars($options['socialLink' . $i]) ?>" class="block"><img src="<?php echo htmlSpecialChars($options['socialImg' . $i]) ?>
" alt="ico<?php echo htmlSpecialChars($i) ?>" class="block" /></a>
				</li>			
<?php endif ;endfor ?>
			</ul>
		</div>

		<div class="sc-column sc-column-last two-third-last">
<?php if ((!empty($options['hoursMonday'])) || (!empty($options['hoursTuesday'])) || (!empty($options['hoursWednesday'])) || (!empty($options['hoursThursday'])) || (!empty($options['hoursFriday'])) || (!empty($options['hoursSaturday'])) || (!empty($options['hoursSunday']))): ?>
			<dl class="item-detail-hours left">
				
				<dt class="item-detail-hours-title"><?php echo NTemplateHelpers::escapeHtml(__('Hours Open: ', 'ait'), ENT_NOQUOTES) ?></dt> 
				
<?php if ((!empty($options['hoursMonday']))): ?>
			    <dt class="item-detail-info-term"><?php echo NTemplateHelpers::escapeHtml(__('Monday:', 'ait'), ENT_NOQUOTES) ?></dt>
			    <dd class="item-detail-info-desc"><?php echo $options['hoursMonday'] ?></dd>
<?php endif ?>
			    
<?php if ((!empty($options['hoursTuesday']))): ?>
			    <dt class="item-detail-info-term"><?php echo NTemplateHelpers::escapeHtml(__('Tuesday:', 'ait'), ENT_NOQUOTES) ?></dt>
			    <dd class="item-detail-info-desc"><?php echo $options['hoursTuesday'] ?></dd>
<?php endif ?>
			    
<?php if ((!empty($options['hoursWednesday']))): ?>
			    <dt class="item-detail-info-term"><?php echo NTemplateHelpers::escapeHtml(__('Wednesday:', 'ait'), ENT_NOQUOTES) ?></dt>
			    <dd class="item-detail-info-desc"><?php echo $options['hoursWednesday'] ?></dd>
<?php endif ?>
			    
<?php if ((!empty($options['hoursThursday']))): ?>
			    <dt class="item-detail-info-term"><?php echo NTemplateHelpers::escapeHtml(__('Thursday:', 'ait'), ENT_NOQUOTES) ?></dt>
			    <dd class="item-detail-info-desc"><?php echo $options['hoursThursday'] ?></dd>
<?php endif ?>
			    
<?php if ((!empty($options['hoursFriday']))): ?>
			    <dt class="item-detail-info-term"><?php echo NTemplateHelpers::escapeHtml(__('Friday:', 'ait'), ENT_NOQUOTES) ?></dt>
			    <dd class="item-detail-info-desc"><?php echo $options['hoursFriday'] ?></dd>
<?php endif ?>

<?php if ((!empty($options['hoursSaturday']))): ?>
			    <dt class="item-detail-info-term"><?php echo NTemplateHelpers::escapeHtml(__('Saturday:', 'ait'), ENT_NOQUOTES) ?></dt>
			    <dd class="item-detail-info-desc"><?php echo $options['hoursSaturday'] ?></dd>
<?php endif ?>
			    
<?php if ((!empty($options['hoursSunday']))): ?>
			    <dt class="item-detail-info-term"><?php echo NTemplateHelpers::escapeHtml(__('Sunday:', 'ait'), ENT_NOQUOTES) ?></dt>
			    <dd class="item-detail-info-desc"><?php echo $options['hoursSunday'] ?></dd>
<?php endif ?>
			    
			</dl>
<?php endif ?>

<?php if (isset($options['emailContactOwner']) && (!empty($options['email']))): ?>
			<a id="contact-owner-button" class="contact-owner button" href="#contact-owner-form-popup"><?php echo NTemplateHelpers::escapeHtml(__("Contact owner", 'ait'), ENT_NOQUOTES) ?></a>
			<!-- contact owner form -->
			<div id="contact-owner-form-popup" style="display: none;">
				<div id="contact-owner-form" data-email="<?php echo htmlSpecialChars($options['email']) ?>">
					
					<h3><?php echo NTemplateHelpers::escapeHtml(__("Contact Owner", 'ait'), ENT_NOQUOTES) ?></h3>

					<div class="input name">
						<input type="text" name="cowner-name" value="" placeholder="<?php echo htmlSpecialChars(__('Your name', 'ait')) ?>" />
					</div>
					<div class="input email">
						<input type="text" name="cowner-email" value="" placeholder="<?php echo htmlSpecialChars(__('Your email', 'ait')) ?>" />
					</div>
					<div class="input subject">
						<input type="text" name="cowner-subject" value="" placeholder="<?php echo htmlSpecialChars(__('Subject', 'ait')) ?>" />
					</div>
					<div class="input message">
						<textarea name="cowner-message" cols="30" rows="4" placeholder="<?php echo htmlSpecialChars(__('Your message', 'ait')) ?>"></textarea>
					</div>
					<button class="contact-owner-send"><?php echo NTemplateHelpers::escapeHtml(__("Send message", 'ait'), ENT_NOQUOTES) ?></button>
					
					<div class="messages">
						<div class="success" style="display: none;"><?php echo NTemplateHelpers::escapeHtml(__("Your message has been successfully sent", 'ait'), ENT_NOQUOTES) ?></div>
						<div class="error validator" style="display: none;"><?php echo NTemplateHelpers::escapeHtml(__("Please fill out email, subject and message", 'ait'), ENT_NOQUOTES) ?></div>
						<div class="error server" style="display: none;"></div>
					</div>

				</div>
			</div>
<?php endif ?>

<?php if ((isset($themeOptions->directory->enableClaimListing)) && (!$hasAlreadyOwner)): ?>
			<a id="claim-listing-button" class="claim-listing-button" href="#claim-listing-form-popup"><?php echo NTemplateHelpers::escapeHtml(__("Own this business?", 'ait'), ENT_NOQUOTES) ?></a>
			<!-- claim listing form -->
			<div id="claim-listing-form-popup" style="display:none;">
				<div id="claim-listing-form" data-item-id="<?php echo htmlSpecialChars($post->id) ?>">

					<h3><?php echo NTemplateHelpers::escapeHtml(__("Enter your claim", 'ait'), ENT_NOQUOTES) ?></h3>

					<div class="input name">
						<input type="text" id="claim-name" name="claim-name" value="" placeholder="<?php echo htmlSpecialChars(__('Your name', 'ait')) ?>" />
					</div>
					<div class="input email">
						<input type="text" id="claim-email" name="claim-email" value="" placeholder="<?php echo htmlSpecialChars(__('Your email', 'ait')) ?>" />
					</div>
					<div class="input number">
						<input type="text" id="claim-number" name="claim-number" value="" placeholder="<?php echo htmlSpecialChars(__('Your phone number', 'ait')) ?>" />
					</div>
					<div class="input username">
						<input type="text" id="claim-username" name="claim-username" value="" placeholder="<?php echo htmlSpecialChars(__('Username', 'ait')) ?>" />
					</div>
					<div class="input message">
						<textarea id="claim-message" name="claim-message" cols="30" rows="4" placeholder="<?php echo htmlSpecialChars(__('Your claim message', 'ait')) ?>"></textarea>
					</div>
					<button class="claim-listing-send"><?php echo NTemplateHelpers::escapeHtml(__("Submit", 'ait'), ENT_NOQUOTES) ?></button>
					
					<div class="messages">
						<div class="success" style="display: none;"><?php echo NTemplateHelpers::escapeHtml(__("Your claim has been successfully sent", 'ait'), ENT_NOQUOTES) ?></div>
						<div class="error validator" style="display: none;"><?php echo NTemplateHelpers::escapeHtml(__("Please fill out inputs!", 'ait'), ENT_NOQUOTES) ?></div>
						<div class="error server" style="display: none;"></div>
					</div>

				</div>
			</div>
<?php endif ?>

		</div>

	</div>

<?php if (isset($options['galleryEnable'])): ?>
	<div class="item-gallery">
		
<?php $firstImage ;for ($i = 1; $i <= 20; $i++): if (empty($firstImage) && (!empty($options['gallery'.$i]))): $firstImage = $options['gallery'.$i] ;endif ;endfor ?>

<?php if (!empty($firstImage)): ?>
		
<?php if (isset($fullwidth)): ?>
		<img class="item-gallery-large fullwidth" src="<?php echo AitImageResizer::resize($firstImage, array('w' => 977, 'h' => 550)) ?>
" alt="<?php echo htmlSpecialChars(__('Item image', 'ait')) ?>" />
<?php else: ?>
		<img class="item-gallery-large" src="<?php echo AitImageResizer::resize($firstImage, array('w' => 718, 'h' => 400)) ?>
" alt="<?php echo htmlSpecialChars(__('Item image', 'ait')) ?>" />
<?php endif ?>
		
		<ul class="item-gallery-thumbnails">
<?php for ($i = 1; $i <= 20; $i++): if (!empty($options['gallery'.$i])): ?>
				<li class="image image-<?php echo htmlSpecialChars($i) ?>" data-large-url="<?php if (isset($fullwidth)): echo AitImageResizer::resize($options['gallery'.$i], array('w' => 977, 'h' => 550)) ;else: echo AitImageResizer::resize($options['gallery'.$i], array('w' => 718, 'h' => 400)) ;endif ?>">
					<img src="<?php echo AitImageResizer::resize($options['gallery'.$i], array('w' => 96, 'h' => 55)) ?>
" alt="<?php echo htmlSpecialChars(__('Gallery image', 'ait')) ?>" />
				</li>
<?php endif ;endfor ?>
		</ul>
<?php endif ?>
		
	</div>
<?php endif ?>

	<div class="entry-content clearfix">		
		<?php echo $post->content ?>

	</div>

<?php if (isset($themeOptions->directory->showShareButtons)): ?>
	<div class="item-detail-share clearfix">
		<!-- facebook -->
		<div class="item-detail-social fb">
			<iframe src="//www.facebook.com/plugins/like.php?href=<?php echo htmlSpecialChars($post->permalink) ?>&amp;send=false&amp;layout=button_count&amp;width=113&amp;show_faces=true&amp;font&amp;colorscheme=light&amp;action=like&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:113px; height:21px;" allowTransparency="true"></iframe>
		</div>
		<!-- twitter -->
		<div class="item-detail-social tw">
			<a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo htmlSpecialChars($post->permalink) ?>
" data-text="<?php echo htmlSpecialChars($themeOptions->directory->shareText) ?>
 <?php echo htmlSpecialChars($post->permalink) ?>" data-lang="en">Tweet</a>
			<script>!function(d,s,id){ var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){ js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
		</div>
		<!-- google plus -->
		<!-- Place this tag where you want the +1 button to render. -->
		<div class="item-detail-social gp">
			<div class="g-plusone"></div>
			<!-- Place this tag after the last +1 button tag. -->
			<script type="text/javascript">
			  (function() {
			    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
			    po.src = 'https://apis.google.com/js/plusone.js';
			    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
			  })();
			</script>
		</div>

	</div>
<?php endif ?>

</article><!-- /#post-<?php echo NTemplateHelpers::escapeHtmlComment($post->id) ?> -->


<?php if (isset($themeOptions->advertising->showBox4)): ?>
<div id="advertising-box-4" class="advertising-box wrapper-650">
    <?php echo $themeOptions->advertising->box4Content ?>

</div>
<?php endif ?>
</div> <!-- /#primary -->


<?php if(is_active_sidebar("sidebar-item")): ?>
<div id="secondary" class="widget-area" role="complementary">
<?php dynamic_sidebar('sidebar-item') ?>
</div>
<?php endif ?>

</div>

<div class="wrapper item-map clearfix">
</div>

<?php if ((!empty($options['alternativeContent']))): ?>
<div class="item-detail-alternative-content wrapper onecolumn">
	<?php echo do_shortcode($options['alternativeContent']) ?>

</div>
<?php endif ?>

<?php if (isset($options['specialActive'])): ?>
<div class="special-offer-holder">
	<div class="wrapper">
		<div class="image<?php if (empty($options['specialImage'])): ?> no-image<?php endif ?>">
<?php if (!empty($options['specialImage'])): ?>
				<img src="<?php echo AitImageResizer::resize($options['specialImage'], array('w' => 450, 'h' => 270)) ?>" />
<?php endif ?>
			<div class="price"><?php echo NTemplateHelpers::escapeHtml($options['specialPrice'], ENT_NOQUOTES) ?></div>
		</div>
		<div class="text">
			<h3 class="title"><?php echo NTemplateHelpers::escapeHtml($options['specialTitle'], ENT_NOQUOTES) ?></h3>
			<div class="content"><?php echo $options['specialContent'] ?></div>
		</div>
	</div>
</div>
<?php endif ?>

<?php if (isset($themeOptions->rating->enableRating)): ?>
<div class="ait-rating-system-holder">
	<?php echo getAitRatingElement($post->id) ?>

</div>
<?php endif ?>

<div class="comments-holder">
<?php NCoreMacros::includeTemplate("comments-dir.php", array('closeable' => (isset($themeOptions->general->closeComments)) ? true : false, 'defaultState' => $themeOptions->general->defaultPosition) + $template->getParams(), $_l->templates['on125e5j7r'])->render() ?>
</div>

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

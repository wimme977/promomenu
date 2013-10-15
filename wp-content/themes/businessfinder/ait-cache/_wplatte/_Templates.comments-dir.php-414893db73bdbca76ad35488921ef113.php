<?php //netteCache[01]000467a:2:{s:4:"time";s:21:"0.69294400 1381868192";s:9:"callbacks";a:3:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:78:"/var/www/promomenu/wp-content/themes/businessfinder/Templates/comments-dir.php";i:2;i:1372076434;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:30:"eee17d5 released on 2011-08-13";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:21:"WPLATTE_CACHE_VERSION";i:2;i:4;}}}?><?php

// source file: /var/www/promomenu/wp-content/themes/businessfinder/Templates/comments-dir.php

?><?php list($_l, $_g) = NCoreMacros::initRuntime($template, 'z2ia09364v')
;
// snippets support
if (!empty($control->snippetMode)) {
	return NUIMacros::renderSnippets($control, $_l, get_defined_vars());
}

//
// main template
//
if ($post->hasOpenComments): if (isset($themeOptions->advertising->showBox3)): ?>
<div id="advertising-box-3" class="advertising-box wrapper-650">
    <?php echo $themeOptions->advertising->box3Content ?>

</div>
<?php endif ;endif ;if ($post->comments): if (isset($closeable)): ?>
	<div class="closeable">
		<div class="open-button <?php if ($defaultState == 'opened'): ?>comments-opened<?php else: ?>
comments-closed<?php endif ?>">
<?php if ($defaultState == 'opened'): ?>
				<?php echo NTemplateHelpers::escapeHtml(__('Close Comments', 'ait'), ENT_NOQUOTES) ?>

<?php else: ?>
				<?php echo NTemplateHelpers::escapeHtml(__('Show Comments', 'ait'), ENT_NOQUOTES) ?>

<?php endif ?>
		</div>
<?php endif ;endif ?>

<div id="comments">
<?php if (!$post->isPasswordRequired): ?>

<?php if ($post->comments): ?>

		<h2 id="comments-title">
<?php 
				$a = array($post->title, $post->commentsCount, 'One thought on', 'Thoughts on');
				$a[0] = NTemplateHelpers::escapeHtml($a[0], ENT_NOQUOTES);
				printf(_n(
						"$a[2] &ldquo;%2\$s&rdquo;",
						"%1\$s $a[3] &ldquo;%2\$s&rdquo;",
						$a[1],
						"ait"
					),
					number_format_i18n($a[1]),
					"<span>$a[0]</span>"
				);unset($a) ?>
		</h2>

<?php NCoreMacros::includeTemplate("snippets/comments-pagination.php", array('location' => 'above') + $template->getParams(), $_l->templates['z2ia09364v'])->render() ?>

<?php 
			$a = array('comments' => $post->comments);
			$depth = 1;
			if(isset($a["begin"]))
				echo $a["begin"];
			else
				echo "<ol class=\"commentlist\">";

			if(isset($a["childrenClass"]))
				$children = " class=\"$a[childrenClass]\"";
			else
				$children = " class=\"children\"";

			$iterations = 0; foreach ($iterator = $_l->its[] = new NSmartCachingIterator($a["comments"]) as $comment):
				if ($comment->depth > $depth){
					echo "<ul{$children}>";
					$depth = $comment->depth;
				}elseif($comment->depth == $depth and !$iterator->isFirst()){
					echo "</li>";
				}elseif($comment->depth < $depth){
					echo "</li>";
					echo str_repeat("</ul></li>", $depth - $comment->depth);
					$depth = $comment->depth;
				}
			 if ($comment->type == 'pingback' or $comment->type == 'trackback'): ?>
			<li class="post pingback">
				<p>
				Pingback
				<?php echo $comment->author->link ?>

<?php WpLatteFunctions::editCommentLink(__("Edit", "ait"), $comment->id, "<span class=\"edit-link\">", "</span>") ?>
				</p>
<?php else: ?>

						<li class="<?php echo htmlSpecialChars($comment->classes) ?>">

				<article id="comment-<?php echo htmlSpecialChars($comment->id) ?>" class="comment">
					
					<div class="comment-content clearfix">
						<div class="comment-avatar left"><?php echo $comment->author->avatar ?></div>
<?php if (!$comment->approved): ?>
							<em class="comment-awaiting-moderation"><?php echo NTemplateHelpers::escapeHtml(__('Your comment is awaiting moderation.', 'ait'), ENT_NOQUOTES) ?></em><br />
<?php else: ?>
							<?php echo $comment->content ?>

<?php endif ?>
					</div>

					<div class="comment-meta clearfix">
						<div class="meta-info author vcard left"><cite class="fn"><?php echo $comment->author->nameWithLink ?></cite></div>
						<div class="meta-info date left"><a href="<?php echo htmlSpecialChars($comment->url) ?>
" class="comment-date"><time pubdate datetime="<?php echo htmlSpecialChars($template->date($comment->date, 'c')) ?>
"><?php echo NTemplateHelpers::escapeHtml($template->date($comment->date, $site->dateFormat), ENT_NOQUOTES) ?>
 at <?php echo NTemplateHelpers::escapeHtml($template->date($comment->date, $site->timeFormat), ENT_NOQUOTES) ?></time></a></div>

						<div class="meta-controls reply right"><?php 
				$a = array('Reply', $comment->args, $comment->depth, $comment->id);
				comment_reply_link(array_merge(
					$a[1],
					array(
						"reply_text" => $a[0],
						"depth" => $a[2],
						"max_depth" => $a[1]["max_depth"]
					)
				), $a[3]); unset($a) ?></div>
						<div class="meta-controls edit right"><?php WpLatteFunctions::editCommentLink(__("Edit", "ait"), $comment->id, "<span class=\"edit-link\">", "</span>") ?></div>
					</div>

				</article>
<?php endif ;
			$iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its);
			echo "</li>";
			echo str_repeat("</ul></li>", $depth - 1);
			if(isset($a["end"]))
				echo $a["end"];
			else
				echo "</ol>" ?>

<?php NCoreMacros::includeTemplate("snippets/comments-pagination.php", array('location' => 'below') + $template->getParams(), $_l->templates['z2ia09364v'])->render() ?>

<?php elseif (!$post->hasOpenComments && $post->type != 'page' && $post->hasSupportFor('comments')): ?>

	<p class="nocomments"><?php echo NTemplateHelpers::escapeHtml(__('Comments are closed.', 'ait'), ENT_NOQUOTES) ?></p>

<?php endif ?>

<?php ob_start() ;echo NTemplateHelpers::escapeHtml(_x('Comment', 'noun', 'ait'), ENT_NOQUOTES) ;$reviewNoun = ob_get_clean() ?>

<?php ob_start() ;echo $template->printf(__('You must be <a href="%s">logged in</a> to post a comment.', 'ait'), wp_login_url(apply_filters('the_permalink', get_permalink()))) ;$reviewLoggedIn = ob_get_clean() ?>

<?php ob_start() ;echo NTemplateHelpers::escapeHtml(__('Leave a Comment', 'ait'), ENT_NOQUOTES) ;$reviewLeave = ob_get_clean() ?>

<?php ob_start() ;echo NTemplateHelpers::escapeHtml(__('Leave a Comment to %s', 'ait'), ENT_NOQUOTES) ;$reviewReplyTo = ob_get_clean() ?>

<?php ob_start() ;echo NTemplateHelpers::escapeHtml(__('Cancel Comment', 'ait'), ENT_NOQUOTES) ;$reviewCancel = ob_get_clean() ?>

<?php ob_start() ;echo NTemplateHelpers::escapeHtml(__('Post Comment', 'ait'), ENT_NOQUOTES) ;$reviewPost = ob_get_clean() ?>


<?php comment_form(array('comment_field' => '<p class="comment-form-comment"><label for="comment">' . $reviewNoun . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>',
	'must_log_in' => '<p class="must-log-in">' .  $reviewLoggedIn . '</p>',
	'title_reply' => $reviewLeave,
	'title_reply_to' => $reviewReplyTo,
	'cancel_reply_link' => $reviewCancel,
	'label_submit' => $reviewPost)) ?>

<?php else: ?>
	<p class="nopassword"><?php echo NTemplateHelpers::escapeHtml(__('This post is password protected. Enter the password to view any comments.', 'ait'), ENT_NOQUOTES) ?></p>
<?php endif ?>
</div><!-- #comments -->

<?php if (isset($closeable) && ($post->hasOpenComments)): ?>
</div> 			<!-- /.closeable -->
<?php endif ;

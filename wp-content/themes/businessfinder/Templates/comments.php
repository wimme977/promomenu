{if $post->comments}
	{ifset $closeable}
	<div class="closeable">
		<div class="open-button {if $defaultState == 'opened'}comments-opened{else}comments-closed{/if}">
			{if $defaultState == 'opened'}
				Close Comments
			{else}
				Show Comments
			{/if}
		</div>
	{/ifset}
{/if}

<div id="comments">
{if !$post->isPasswordRequired}

{if $post->comments}

		<h2 id="comments-title">
			{commentTitle $post->title, $post->commentsCount, 'One thought on', 'Thoughts on'}
		</h2>

		{include snippets/comments-pagination.php, location => 'above'}

		{listComments comments => $post->comments}
			{if $comment->type == 'pingback' or $comment->type == 'trackback'}
			<li class="post pingback">
				<p>
				Pingback
				{!$comment->author->link}
				{editCommentLink $comment->id}
				</p>
			{else}

			{* this is start tag, but end tag is missing in this template, it is included in {/listComments} macro. Weird. I know. *}
			<li class="{$comment->classes}">

				<article id="comment-{$comment->id}" class="comment">
					
					<div class="comment-content clearfix">
						<div class="comment-avatar left">{!$comment->author->avatar}</div>
						{if !$comment->approved}
							<em class="comment-awaiting-moderation">Your comment is awaiting moderation.</em><br>
						{else}
							{!$comment->content}
						{/if}
					</div>

					<div class="comment-meta clearfix">
						<div class="meta-info author vcard left"><cite class="fn">{!$comment->author->nameWithLink}</cite></div>
						<div class="meta-info date left"><a href="{$comment->url}" class="comment-date"><time pubdate datetime="{$comment->date|date:'c'}">{$comment->date|date:$site->dateFormat} at {$comment->date|date:$site->timeFormat}</time></a></div>

						<div class="meta-controls reply right">{commentReplyLink 'Reply', $comment->args, $comment->depth, $comment->id}</div>
						<div class="meta-controls edit right">{editCommentLink $comment->id}</div>
					</div>

				</article>
			{/if}
		{/listComments}

		{include snippets/comments-pagination.php, location => 'below'}

{elseif !$post->hasOpenComments && $post->type != 'page' && $post->hasSupportFor('comments')}

	<p class="nocomments">Comments are closed.</p>

{/if}

{commentForm}

{else}
	<p class="nopassword">This post is password protected. Enter the password to view any comments.</p>
{/if}
</div><!-- #comments -->


{if $post->comments && isset($closeable)}
</div> 			<!-- /.closeable -->
{/if}
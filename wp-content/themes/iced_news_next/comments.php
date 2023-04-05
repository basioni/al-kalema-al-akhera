<?php if(!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) : ?>  	
	<?php die('You can not access this page directly!'); ?>  
<?php endif; ?>

<?php if(!empty($post->post_password)) : ?>
  	<?php if($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) : ?>
		<p>This post is password protected. Enter the password to view comments.</p>
  	<?php endif; ?>
<?php endif; ?>
	<div class="totalcomments">
	  This post currently has
	  <?php comments_number( 'no commets.', 'one comment', '% comments.' ); ?>.
	</div>
	
	<?php wp_list_comments('type=comment&callback=iced_comment');
	paginate_comments_links();
	function iced_comment($comment, $args, $depth) { 
		?>
			<div class="commentauthor"><?php echo get_avatar($comment, 32, $default_avatar ); echo $author_email;?>  
			By <?php comment_author_link() ?> <br />on <a href="#comment-<?php comment_ID() ?>" title=""><?php comment_date('F jS, Y') ?> at <?php comment_time() ?> <?php edit_comment_link('edit','&nbsp;&nbsp;',''); ?></a></div>
				<div <?php echo comment_class();?>><?php comment_text() ?></div>
				<?php if ($comment->comment_approved == '0') : ?>
				<em>Your comment is awaiting moderation.</em>
				 <?php if ( is_singular() ) wp_enqueue_script( "comment-reply" ); ?>

				<?php endif; ?>

			<?php
			/* Changes every other comment to a different class */
			$oddcomment = ( empty( $oddcomment ) ) ? 'class="oddcomment" ' : '';	
			
	}
	?>
<?php comment_form(array('title_reply'=>'Post your comment','comment_notes_after' => '')); ?>

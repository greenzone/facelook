<?php get_header(); ?>

<div id="post-container">
	<div id="posts">

<?php while(have_posts()) : the_post(); ?>
	<div class="post">
		<div class="post-text">
			<div class="title-post">
				<div class="icon-title"><img src="<?php echo get_template_directory_uri();?>/images/judul.svg"></div>
				<h2 class="title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			</div>
			<div class="meta-post">
				<i class="fa fa-hand-o-right"></i>&nbsp;Diterbitkan pada:&nbsp;<i class="fa fa-clock-o"></i>&nbsp;<?php the_time('j F Y'); echo ' at '; the_time('H:i'); ?>
			</div>
			<div class="thumbnail-single-post">
				<div class="single-post-tumb">
					<?php the_post_thumbnail( 'medium' ); ?>
				</div>
			</div>
			<?php the_content('(more..)'); ?>
			<div class="post-meta"> 
				<i class="fa fa-paperclip"></i>&nbsp;Categories: <?php the_category(' - '); ?>&nbsp;
				<i class="fa fa-tags"></i>&nbsp;Tags: <?php the_tags(''); ?>&nbsp;
				<i class="fa fa-comments"></i>&nbsp;<a href="<?php the_permalink(); ?>#respond" class="respondlink notajax" id="respondlink-<?php echo $post->ID; ?>">Comments</a>
			</div>
			<!-- comment start--->
			<?php comments_template(); ?>
			<?php if($post->comment_status == 'open' && get_option('slf_ajax') == 1 && $count != 0) { ?>
					<div class="index-comment"><textarea class="respondtext">Write a comment..</textarea></div><?php 
				} ?>
			
			<div id="commentform-<?php echo $post->ID; ?>" class="index-comment comment-form" style="display:none;">
			<?php if($post->comment_status != 'open') { ?>
				Comment form currently closed..
			<?php } else { ?>
				<form action="<?php bloginfo('wpurl') ?>/wp-comments-post.php" method="post">
				<?php if($user_ID) { ?>
					<div class="form_login ic-avatar">
							<?php echo get_avatar($user_email, '37'); ?>
					</div>
				<?php } else { ?>
					<div class="form_input">
						<input class="author focus" name="author" type="text" />
						<label for="author">Nama</label>
					</div>
					<div class="form_input">
						<input class="email" name="email" type="text" />
						<label for="email">Email</label>
					</div>
					<div class="form_input">
						<input class="url" name="url" type="text" />
						<label for="url">Website</label>
					</div>
				<?php } ?>
					<div class="form_comment">
						<textarea name="comment" class="focus <?php if($user_ID) { echo "commenttextright"; } ?>"></textarea>
					</div>
					<div class="form_submit<?php if ($user_ID) { echo "_right"; } ?>">
						<input type="submit" name="submit" value="Comment" class="submit" />
					</div>
					<input type="hidden" name="comment_post_ID" value="<?php echo $post->ID; ?>" />
				</form>
			<?php } ?>
			</div>
			
		</div>
	</div>
<?php endwhile; ?>

	<input type="hidden" name="title" value="<?php wp_title( '-', true, 'right' ); echo wp_specialchars( get_bloginfo('name'), 1 ) ?>" />
	</div>
</div>
	
<?php get_footer(); ?>

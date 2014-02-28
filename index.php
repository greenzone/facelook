<?php get_header(); ?>
<div id="post-container">
	<div id="posts">
	<div class="post-list">
		<?php while(have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
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
						<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_post_thumbnail( array(100,100) ); ?></a>
					</div>
				</div>
				<?php echo get_excerpt(555); ?>
				<div class="meta">
					<i class="fa fa-paperclip"></i>&nbsp;Categories:&nbsp;<?php the_category(' - '); ?>
				</div>
			</div>
		</div>
		<?php endwhile; ?>
		<?php if(get_next_posts_link() != "" && is_paged()) { ?><input type="hidden" id="nextpage" value="<?php next_posts(); ?>" /><?php } ?>
	</div>
	<div class="navigation">
		<div class="next"><i class="fa fa-hand-o-down"></i>&nbsp;<?php next_posts_link('Show Older Posts..') ?></div>
		<div class="prev"><i class="fa fa-hand-o-up"></i>&nbsp;<?php previous_posts_link('Show Newer Posts..') ?></div>
	</div>
	<input type="hidden" name="title" value="<?php wp_title( '-', true, 'right' ); echo wp_specialchars( get_bloginfo('name'), 1 ) ?>" />
	</div>
</div>
<?php get_footer(); ?>

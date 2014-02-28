<?php get_header(); ?>
<div id="post-container">
	<div id="posts">
		<?php if (is_category()) { ?>
		<h2 class="archive"><i class="fa fa-briefcase"></i>&nbsp;Arsip untuk:&nbsp;'<?php single_cat_title(); ?>'&nbsp;Category</h2>
		<?php } elseif( is_tag() ) { ?>
		<h2 class="archive">Posts Tagged&nbsp;'<?php single_tag_title(); ?>'</h2>
		<?php } elseif (is_day()) { ?>
		<h2 class="archive"><i class="fa fa-briefcase"></i>&nbsp;Arsip untuk:&nbsp;<?php the_time('F jS, Y'); ?></h2>
		<?php } elseif (is_month()) { ?>
		<h2 class="archive"><i class="fa fa-briefcase"></i>&nbsp;Arsip untuk:&nbsp;<?php the_time('F, Y'); ?></h2>
		<?php } elseif (is_year()) { ?>
		<h2 class="archive"><i class="fa fa-briefcase"></i>&nbsp;Arsip untuk:&nbsp;<?php the_time('Y'); ?></h2>
		<?php } elseif (is_author()) { ?>
		<h2 class="archive"><i class="fa fa-briefcase"></i>&nbsp;Author Arsip</h2>
		<?php } ?>

		<div class="post-list">
			<?php while(have_posts()) : the_post(); ?>
			<div class="post" id="post-<?php the_ID(); ?>">
				<div class="post-text">
					<div class="title-post">
						<div class="icon-title"><img src="<?php echo get_template_directory_uri();?>/images/judul.svg"></div>
						<h2 class="title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
					</div>
					<div class="meta-post">
						<i class="fa fa-hand-o-right"></i>&nbsp;Diterbitkan pada:&nbsp;<i class="fa fa-clock-o"></i> <?php the_time('j F Y'); echo ' at '; the_time('H:i'); ?>
					</div>
					<?php the_excerpt(); ?>
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

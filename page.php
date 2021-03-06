<?php get_header(); ?>

<div id="post-container">
	<div id="posts">
		<?php while(have_posts()) : the_post(); ?>
			<div class="post">
				<div class="post-text">
					<div class="title-post">
						<div class="icon-title"><img src="<?php echo get_template_directory_uri();?>/images/page.svg"></div>
						<h2 class="title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
					</div>
					<?php the_content('(more..)'); ?>
					<div class="post-meta">
						<i class="fa fa-clock-o"></i>&nbsp;<?php the_time('j F Y'); echo ' at '; the_time('H:i'); ?>
					</div>
					<?php comments_template(); ?>
				</div>
			</div>
		<?php endwhile; ?>
	<input type="hidden" name="title" value="<?php wp_title( '-', true, 'right' ); echo wp_specialchars( get_bloginfo('name'), 1 ) ?>" />
	</div>
</div>
	
<?php get_footer(); ?>

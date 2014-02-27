<?php get_header(); ?>

<div id="post-container">
	<div id="posts">

<?php if(have_posts()) : ?>

<h2 class="archive"><i class="fa fa-search-plus"></i> Hasil pencarian untuk: '<?php echo strip_tags($_GET['s']) ?>'</h2>

	<div class="post-list">
<?php while(have_posts()) : the_post(); ?>
	<div class="post" id="post-<?php the_ID(); ?>">
		<div class="post-text">
			<div class="title-post">
				<div class="icon-title"><img src="<?php echo get_template_directory_uri();?>/images/judul.svg"></div>
				<h2 class="title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			</div>
			<div class="meta-post">
				<i class="fa fa-hand-o-right"></i> Diterbitkan pada: <i class="fa fa-clock-o"></i> <?php the_time('j F Y'); echo ' at '; the_time('H:i'); ?>
			</div>
			<?php the_excerpt(); ?>
		</div>
	</div>
<?php endwhile; ?>
		<?php if(get_next_posts_link() != "" && is_paged()) { ?><input type="hidden" id="nextpage" value="<?php next_posts(); ?>" /><?php } ?>
	</div>
	
	<div class="navigation">
		<div class="next"><i class="fa fa-hand-o-down"></i> <?php next_posts_link('Show Older Posts..') ?></div>
		<div class="prev"><i class="fa fa-hand-o-up"></i> <?php previous_posts_link('Show Newer Posts..') ?></div>
	</div>
	
<?php else : ?>
	<div style="text-align:center;border-top:solid 1px #ddd;padding-top:25px;">
	<h1><?php _e('Whuaaaaaa......:-(', 'albert_menangis'); ?></h1><br/>
	<div><img itemprop="logo" src="<?php echo get_template_directory_uri();?>/img/404.jpg" style="text-align:center;"></div><br/>
	Pencarian dengan kata kunci <h2>"<?php echo strip_tags($_GET['s']) ?>"</h2> tidak ditemukan!<br/>
	Cobalah menggunakan kata kunci yang lain.
	</div>
<?php endif; ?>
		<input type="hidden" name="title" value="<?php wp_title( '-', true, 'right' ); echo wp_specialchars( get_bloginfo('name'), 1 ) ?>" />
	</div>
</div>
<?php get_footer(); ?>

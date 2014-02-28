<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes() ?>>
<head profile="http://gmpg.org/xfn/11">
	<title><?php wp_title( '-', true, 'right' ); echo wp_specialchars( get_bloginfo('name'), 1 ) ?></title>
	<meta http-equiv="content-type" content="<?php bloginfo('html_type') ?>; charset=<?php bloginfo('charset') ?>" />
	<meta name="home" content="<?php bloginfo('url') ?>" />
	<meta name="url" content="<?php bloginfo('wpurl') ?>" />
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url') ?>" />
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
	<?php wp_head() // For plugins ?>
	<link rel="alternate" type="application/rss+xml" href="<?php bloginfo('rss2_url') ?>" title="<?php printf( __( '%s latest posts', 'sandbox' ), wp_specialchars( get_bloginfo('name'), 1 ) ) ?>" />
	<link rel="alternate" type="application/rss+xml" href="<?php bloginfo('comments_rss2_url') ?>" title="<?php printf( __( '%s latest comments', 'sandbox' ), wp_specialchars( get_bloginfo('name'), 1 ) ) ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url') ?>" />
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri();?>/ico/favicon.png">
	<!--[if IE]>
	<link rel="stylesheet" type="text/css" href="<?php echo get_bloginfo('template_directory').'/ie.css' ?>" />
	<style type="text/css" media="screen">
		body{behavior:url(<?php echo get_bloginfo('template_directory').'/iehover.htc' ?>);}
	</style>
	<![endif]-->
</head>
<?php $slfheader = get_option('slf_header'); ?>
<body class="<?php echo $slfheader == 0 ? 'new' : 'old'; ?>">

<div id="header-wrapper">
	<div id="header">
		<?php if($slfheader == 0) : ?>
		<div id="menu" class="new">
			<div class="logo-header">
				<a class="brand" href="http://www.greenboxindonesia.com" title="Greenboxindonesia" rel="home" target="_blank">
					<img src="<?php echo get_template_directory_uri();?>/images/home.png">
				</a>
			</div>
			<div class="logo-icon-header ">
				<a href="<?php echo get_option('greenhouse_facebook'); ?>" target="_blank"><i class="fa fa-facebook fa-2x"></i></a>
			</div>
			<div class="logo-icon-header ">
				<a href="<?php echo get_option('greenhouse_twitter'); ?>" target="_blank"><i class="fa fa-twitter fa-2x"></i></a>
			</div>
			<div class="logo-icon-header ">
				<a href="<?php echo get_option('greenhouse_github'); ?>" target="_blank"><i class="fa fa-github fa-2x"></i></a>
			</div>
			<form id="search" action="<?php bloginfo('url'); ?>/" method="get">
				<input type="text" onfocus="this.value=''" value="Search or type a command" name="s" id="search-text" />
			</form>
			<div id="more">
			<div id="desc"><i class="fa fa-coffee"></i> <?php bloginfo('description') ?></div>
			</div>
		</div>
		<div class="clear"></div>
		<?php elseif($slfheader == 1) : ?>
		<div id="menu">
			<ul id="pagemenu">
				<?php wp_list_pages('depth=2&sort_column=menu_order&title_li='); ?>
			</ul>
		
			<div id="more">
				<?php get_search_form(); ?>
				<ul id="moremenu">
					<li>
						<a href="#" onclick="return false">Feed</a>
						<ul id="feedmenu">
							<li class="feedli"><a class="notajax" href="<?php bloginfo('rss2_url'); ?>">Latest posts</a></li>
							<li class="feedli"><a class="notajax" href="<?php bloginfo('comments_rss2_url'); ?>">Latest comments</a></li>
						</ul>
					</li>
					<li>
					<?php wp_loginout(); ?>
					</li>
				</ul>
			</div>
		</div>
		<?php endif; ?>
	</div>
</div>

<div id="wrapper">
	<div id="container">
		<?php get_sidebar(); ?>
		<div id="content">
			<div id="categories">
				<ul>
					<?php $showcats = abs(intval(get_option("slf_showcats"))); ?>
					<?php $showcats = ($showcats != 0) ? $showcats : 5; ?>
					<li class="cat-item<?php echo is_category() ? '' : ' current-cat' ?>"><a href="<?php bloginfo('url') ?>/"><i class="fa fa-home fa-lg"></i></a></li>
					<?php wp_list_categories("orderby=count&order=desc&number=$showcats&depth=1&title_li="); ?>
					<li id="liplus">
						<a id="plus" href="#" title="More categories.." onclick="showbox(this); return false" class="none">&nbsp;</a>
						<div id="hiddencats" style="display: none;">
							<div id="hiddenleft"><div id="hiddenplus" onclick="hidebox()">&nbsp;</div></div>
							<div id="hiddenright">
								<ul>
									<li class="browsecat">List Category</li>
									<?php wp_list_categories("orderby=count&order=desc&number=100&offset=$showcats&depth=1&title_li="); ?>
								</ul>
							</div>
						</div>
					</li>
				</ul>
			</div>

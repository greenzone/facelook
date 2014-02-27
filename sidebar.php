<div id="sidebar">
	<ul>
		<div class="avatar-profile">
		<li class="large-avatar"><a class="brand" href="<?php echo home_url('/'); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home"><?php slf_avatar(); ?></a></li>
		</div>
		<li>
			<div style="font-size:19px;font-weight:300;border-bottom:solid 1px #ddd;padding-bottom:10px;">
				<a href="<?php bloginfo('url') ?>" title="<?php echo wp_specialchars( get_bloginfo('name'), 1 ) ?>" rel="home">
				<i class="fa fa-user-md"></i> <?php bloginfo('name') ?>
				</a>
			</div>
		</li>
		<br />
		<div class="Profile-user">
		<table>
			<tbody>
				<tr>
					<td style="width: 15%; text-align:center;"><i class="fa fa-users"></i></td>
					<td style="color:#505050;"><?php echo get_option('greenhouse_company'); ?></td>
				</tr>
				<tr>
					<td style="width: 15%; text-align:center;"><i class="fa fa-map-marker fa-lg"></i></td>
					<td style="color:#505050;"><?php echo get_option('greenhouse_country'); ?></td>
				</tr>
				<tr>
					<td style="width: 15%; text-align:center;"><i class="fa fa-envelope"></i></td>
					<td><a href="mailto:<?php echo get_option('greenhouse_email'); ?>"><?php echo get_option('greenhouse_email'); ?></a></td>
				</tr>
				<tr>
					<td style="width: 15%; text-align:center;"><i class="fa fa-phone-square"></i></td>
					<td style="color:#505050;"><?php echo get_option('greenhouse_contact'); ?></td>
				</tr>
			</tbody>
		</table>
		<br />
		</div>
		<?php slf_info(); ?>
			<li class="widget">
				<h2 class="widgettitle"><i class="fa fa-briefcase"></i> Arsip</h2>
				<ul>
				<?php wp_get_archives('type=monthly'); ?>
				</ul>
			</li>
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(1) ) : ?>
			<li class="widget">
				<h2 class="widgettitle"><i class="fa fa-briefcase"></i> Arsip</h2>
				<ul>
				<?php wp_get_archives('type=monthly'); ?>
				</ul>
			</li>
		<?php endif; ?>
	</ul>
</div>

<?php if(get_option('slf_sidebarad') == 1) { ?>
<div id="sidebarright">
	<ul>
		<li class="widget">
			<div style="color:#999;font-weight:300;font-size:12px;">Ads</div>
			<a href="http://www.greenboxindonesia.com" target="_blank"><img src="<?php bloginfo('template_directory') ?>/images/ads_gb.png" alt="Greenboxindonesia" width="150" /></a><br/>
		</li>
	</ul>
	<ul>
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(2) ) : ?>
			<li class="widget">
				<h2 class="widgettitle"><i class="fa fa-briefcase"></i> Arsip</h2>
				<ul>
				<?php wp_get_archives('type=monthly'); ?>
				</ul>
			</li>
		<?php endif; ?>
	</ul>
</div>
<?php } ?>
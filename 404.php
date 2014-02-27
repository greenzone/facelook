<?php get_header(); ?>
<div id="headline">
	<div style="text-align:center;">
		<header style="margin-top:50px;">
		    <h1><?php _e('Whuaaaaaa......:-(', 'albert_menangis'); ?></h1>
		</header>
		<div><img itemprop="logo" src="<?php echo get_template_directory_uri();?>/img/404.jpg" style="text-align:center;"></div>
		<div>
		    <p style="font-size:17px;"><?php _e(
                'Tampaknya kami tidak dapat menemukan apa yang Anda cari.<br/> Mungkin halaman sudah kami hapus, atau salah penulisan pada link alamat halaman.<br/> Mohon maaf atas ketidakyamanan ini.',
                'albert_menangis'
            ); ?></p>
		</div><!-- .row content -->
	</div>
</div>
<?php get_footer(); ?>

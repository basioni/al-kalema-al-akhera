<?php get_header(); ?>

<div class="cnt">

<?php get_sidebar();?>

	<div class="icnt">
        <div class="breadcrumb"><?php  if(function_exists('bcn_display')) { bcn_display(); } ?></div>
<p></p><p></p><p></p><p></p>
		<center><img src="<?php echo get_template_directory_uri(); ?>/images/404.jpg" /></center>

    </div>
</div>

<?php get_footer();?>

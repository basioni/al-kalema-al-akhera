<div class="rside">
	
    <div class="rsidebox"><center>
	<?php if(!empty($options['sidebar-ad']))
			$headerad = $options['sidebar-ad'];
			else $headerad = '<img src="http://localhost/wordpress/wp-content/themes/iced_news_next/images/adv/right_ad1.jpg" />';
		?>
        <div class="sidebarad"><?php echo $headerad; ?></div>
	
	</center></div>    
	<div class="clear"></div>
	<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar(1)) : else : ?>

	<div class="pre-widget">
		<p><strong>Widgetized Area</strong></p>
		<p>This panel is active and ready for you to add some widgets via the WP Admin</p>
	</div>

	<?php endif; ?>
	<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar(2)) : else : ?>
	<?php wp_tag_cloud( 'Tags'); ?>
	<?php endif; ?>
</div>
<?php wp_reset_query(); ?> 

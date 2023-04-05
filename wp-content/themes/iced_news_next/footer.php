</div>
	<div class="foot">
		<div class="foot1">
		
		Copyright &copy; 2013 <?php  bloginfo('name'); ?> | All Rights Reserved. <br />Powered by <a class="dt" href="http://wordpress.org">Wordpress</a> and theme by <a class="dt" href="http://icedapp.com" target="_blank">Iced App</a>
		</div>
		
		<div class="foot2">
		<?php if(!empty($options['footer-text']))
			$headerad = $options['footer-text'];
			else $headerad = 'Footer text - Use theme settings to place any text - contact info/deslaimer etc here';
		?>
        <div class="topad"><?php echo $headerad; ?></div>
		</div>

	</div>
</div>
<?php wp_footer(); ?>

</body>
</html>
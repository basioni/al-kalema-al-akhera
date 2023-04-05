<?php /* Template Name: Print  */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php bloginfo('name'); ?> </title>
<link rel="stylesheet" href="http://bangalorenext.com/wp-content/plugins/wp-print/print-css.css" type="text/css" media="screen, print" />
<?php //wp_head(); ?>
</head>

<body>
<div class="Center">
	<div id="Outline">
                <?php   query_posts('p='.$_REQUEST['print_page']);?>
  	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
		<div class="spost" id="post-<?php the_ID(); ?>">

			<h2><?php the_title(); ?></h2>
				
			<div class="entry1">
				<?php the_content('<p>Continue reading &raquo;</p>'); ?>

	
			</div>
		</div>
		
		
	<?php endwhile; else: ?>
	
	<p>Sorry, no posts matched your criteria.</p>
	
	<?php endif; ?>
	
	

</div>
</div>

</body>
</html>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html <?php language_attributes(); ?> xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Archive <?php } ?> <?php wp_title(); ?></title>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php $options = get_option( 'iced_theme_options' ); ?>
      

<!-- First, add jQuery (and jQuery UI if using custom easing or animation -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>

<!--  add the Timer and Easing plugins -->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/galleryview/js/jquery.timers-1.2.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/galleryview/js/jquery.easing.1.3.js"></script>

<!--  add the GalleryView Javascript and CSS files -->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/galleryview/js/jquery.galleryview-3.0-dev.js"></script>
<link type="text/css" rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/galleryview/css/jquery.galleryview-3.0-dev.css" />

	<script type="text/javascript">
	
			$(function(){
		$('#slider-id').galleryView({autoplay:true, panel_width: 400, panel_height: 250, frame_width: 60, frame_height: 30, enable_overlays:true	});
	});
	</script>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>> 
<div class="container">
<div class="icontainer">

<div class="head">
	<div class="head1">
		<?php if(isset($options['logo-url'])) $logourl = $options['logo-url']; 
		else  $logourl = get_template_directory_uri() . "/images/logo.jpg"; ?>

    	<div class="logo"><a href="<?php echo home_url(); ?>"><img src="<?php echo $logourl;?>" /></a></div>
		<?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'container_class' => 'main-menu' ) ); ?>
    </div>
    
    <div class="head2">
    	<div class="social">
        <div class="tdate">
        	<b> Today:</b>
			<script type="text/javascript">
			var d_names = new Array("Sunday", "Monday", "Tuesday",
			"Wednesday", "Thursday", "Friday", "Saturday");

			var m_names = new Array("January", "February", "March", 
			"April", "May", "June", "July", "August", "September", 
			"October", "November", "December");

			var d = new Date();
			var curr_day = d.getDay();
			var curr_date = d.getDate();
			var sup = "";
			if (curr_date == 1 || curr_date == 21 || curr_date ==31)   sup = "st";
			else if (curr_date == 2 || curr_date == 22)   sup = "nd";
			else if (curr_date == 3 || curr_date == 23)   sup = "rd";
			else   sup = "th";
			var curr_month = d.getMonth();
			var curr_year = d.getFullYear();

			document.write(d_names[curr_day] + " " + curr_date + "<SUP>"
			+ sup + "</SUP> " + m_names[curr_month] + " " + curr_year);
			</script>
        </div>
        
			<div class="sicons">
				<a href="<?php echo $options['twitter-url']?>"><img src="<?php echo get_template_directory_uri(); ?>/images/twitter.png" border="0" width="24"/></a>
				<a href="<?php echo $options['facebook-url']?>"><img src="<?php echo get_template_directory_uri(); ?>/images/facebook.png" border="0" width="24"/></a>
				<a href="<?php echo $options['feed-url']?>"><img src="<?php echo get_template_directory_uri(); ?>/images/rss.png" border="0" width="24"/></a>
			</div>
        
        </div>
		<?php if(!empty($options['header-ad']))
			$headerad = $options['header-ad'] . "888";
			else $headerad = '<img src="' . get_template_directory_uri() . '/images/adv/topad.jpg" />';
		?>
        <div class="topad"><?php echo $headerad; ?></div>
    </div>
        
</div>

<div class="menubar">
	<?php wp_nav_menu( array( 'theme_location' => 'second-menu', 'container_class' => 'second-menu', 'fallback_cb' => 'category_menu') ); 
	function category_menu(){
		 ?>
		 <div class="second-menu">
		 <?php wp_list_categories(array('title_li' => '', 'hide_empty' => 1 ));
		 ?></div><?php
	}
	?>

	<div id="searchbox">
	<?php get_search_form(); ?>
	</div>

</div>

<div class="topnews">
    <div class="topnews1">    TODAY HEADLINES     </div>
    <div class="topnews2">
    <marquee onMouseOver="this.stop();" onMouseOut="this.start();" scrolldelay="0" scrollamount="4">
    <ul>
	<?php $my_query = new WP_Query('cat=9&showposts=5');
	while ($my_query->have_posts()) {
	$my_query->the_post(); ?>
	<li><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>
	<?php } ?>
    </ul>
    </marquee>
	</div>
</div>
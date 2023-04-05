<?php
// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Main Header template
 *
 * @file           header.php
 * @package        Preference Lite 
 * @author         Andre Jutras 
 * @copyright      2013 StyledThemes.com
 * @license        license.txt
 * @version        Release: 1.0
 * @since          available since Release 1.0
 */
?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="page-top-bg" style="border-top-color: <?php echo get_theme_mod( 'page_top_border', '#595A67' ); ?>; border-bottom-color: <?php echo get_theme_mod( 'tophalf_botline', '#BCBCBC' ); ?>; background-color:<?php echo get_theme_mod( 'tophalf_bg', '#ffffff' ); ?>;"></div>
		<div id="centered-wrapper">
	
			<div id="logo-wrapper">			
			<?php 
			$logostyle = get_theme_mod( 'logo_style', 'text' );
			 switch ($logostyle) {
				case "default" : // default theme logo ?>
						<div id="logo">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
								<img src="<?php echo get_template_directory_uri() ; ?>/images/logo-demo.png" alt="<?php bloginfo( 'name' ); ?>" />
							</a>
						</div>	 
				<?php break;
				case "custom" : // your own logo ?>
					<?php if ( get_option('my_logo') ) : ?>
						<div id="logo">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
							<img src="<?php echo get_option( 'my_logo' ); ?> "/>
						</a>
						</div>
					<?php endif; ?>			 
				<?php break;
				case "text" : // text based title and site description ?>
					<hgroup>
						<h1 id="site-title">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
								<span><?php bloginfo( 'name' ); ?></span>
							</a>
						</h1>
						<h2 id="site-description"><?php bloginfo( 'description' ); ?></h2>
					</hgroup>			
				<?php break;
				} 
			?>												
			</div>
		
			<div id="content-wrapper" style="background-color:<?php echo get_theme_mod( 'content_bg', '#F8F8F8' ); ?>; border-color: <?php echo get_theme_mod( 'page_top_border', '#595A67' ); ?>;">			
				<div id="nav-wrapper" style="background-color:<?php echo get_theme_mod( 'mainmenu_bg', '#78A5B6' ); ?>;">
					<div class="container">
						<div class="row">
							<div class="span12">
								<nav id="site-navigation" class="main-navigation" role="navigation">
								<h3 class="menu-toggle"><?php _e( 'Menu', 'preference' ); ?></h3>
								<?php wp_nav_menu( array( 'theme_location' => 'primary-menu', 'menu_class' => 'nav-menu' ) ); ?>
							</nav><!-- #site-navigation -->					
							</div>
						</div>
					</div>
					
				</div>			
			
				<div id="showcase-wrapper" style="padding:<?php echo get_theme_mod( 'showcase_bg_padding', '10px 0' ); ?> ; 
				background:<?php echo get_theme_mod( 'showcase_bg_colour', '#B9CADC' ); ?> url('<?php echo get_template_directory_uri(); ?>/images/backgrounds/<?php echo get_theme_mod( 'showcase_bg', 'showcase-bg1.jpg' ); ?>'); border-color: <?php echo get_theme_mod( 'showcase_botline', '#B2C1CC' ); ?>;">
					<div class="container">
						<div class="row">
							<div class="span12">
								<div id="showcase">
								
									<?php if ( is_active_sidebar( 'sidebar-showcase' ) ) : ?>									
										<?php dynamic_sidebar( 'sidebar-showcase' ); ?>									
									<?php endif; ?>
									<?php if ( is_front_page() ) : ?>						
										<?php $header_image = get_header_image();
										if ( ! empty( $header_image ) ) : ?>
										<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $header_image ); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" /></a>
										<?php endif; ?>	
									<?php endif; ?>
								</div>
							</div>
						</div>		
					</div>		
				</div>
				
				<div id="showcase-footer" style="background-color:<?php echo get_theme_mod( 'showcase_footerbar', '#B9CBD8' ); ?>; border-color: <?php echo get_theme_mod( 'showcase_footerline', '#D7DFE6' ); ?>;"></div>
				<div id="showcase-shadow"><img src="<?php echo get_template_directory_uri() ; ?>/images/showcase-shadow.png" alt="shadow"/></div>
	
				<div class="container">
					<div class="row">
						<div id="breadcrumbs" class="span12">
							<?php if ( !is_front_page() ) : ?>
								<?php if(function_exists('bcn_display'))
									{
										bcn_display();
									}?>
							<?php endif; ?>
						</div>
					</div>
				</div>
				
				<div id="content" style="border-color: <?php echo get_theme_mod( 'content_botline', '#8FAEB8' ); ?>; color:<?php echo get_theme_mod( 'content_text', '#747474' ); ?>;">

					<div class="container">
						<aside class="row">
							<div id="cta">
								
							</div>
						</aside>
					</div><!-- .container -->
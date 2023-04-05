<?php 
/**
 * @package Featured articles Lite - Wordpress plugin
 * @author CodeFlavors ( codeflavors[at]codeflavors.com )
 * @version 2.4
 * 
 * For more information on FeaturedArticles template functions, see: http://www.codeflavors.com/documentation/display-slider-file/
 */
?>
<?php the_slideshow_title();?>
<div class="FA_overall_container_title_nav FA_slider <?php the_slider_color();?>" style="<?php the_slider_width()?>;border:3px outset #0B0A72;height:378px;border-radius:10px;" id="<?php echo $FA_slider_id;?>">	

	<div class="FA_featured_articles" style="<?php the_slider_height();?>">
	<?php foreach ($postslist as $i => $post):?>
		<div class="FA_article  <?php the_fa_class();?>" style="<?php the_fa_background(false);?>; <?php the_slider_height();?>; <?php if($i > 0):?> display:none;<?php endif;?>">	
			<div class="FA_wrap">
			
				<?php the_fa_image();?>
			<div style="width:100%;background-color:#0B0A72;opacity:0.7;">
                <?php the_fa_title('<h2 style="font-size:20px;">', '</h2>');?>
                </div>	
                <?php the_fa_date('<span class="FA_date">', '</span>');?>
                <?php the_fa_content('<p>', '</p>');?>
                <?php the_fa_read_more();?>
			</div>                			
		</div>	
	<?php endforeach;?>			
	</div>
	<ul class="FA_navigation" style="<?php the_slider_height();?>">
	<?php foreach ($postslist as $post):
$string=the_title('<h3">', '</h3>',false);
$string = (strlen($string) > 100) ? $string = approx_len($string,100).'...' : $string;
	?>
	
		<li><a href="#" title="<?php the_title();?>"><?php echo $string;?></a></li>
	<?php endforeach;?>
	</ul>

</div>
<?php get_header(); ?>

<div class="cnt">

<?php get_sidebar();?>

	<div class="icnt">
<div class="breadcrumb"><?php   if(function_exists('bcn_display')) { bcn_display(); } ?></div>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="pagepost" id="post-<?php the_ID(); ?>">
		<h2><?php the_title(); ?></h2>
			<div class="entry">
				<?php the_content('<p>Continue reading &raquo;</p>'); ?>
	
				<?php //if page is split into more than one
					wp_link_pages('<p>Pages: ', '</p>', 'number'); ?>
			</div>
		</div>
        
        <?php $pageChildren = $wpdb->get_results("SELECT *	FROM $wpdb->posts WHERE post_parent = ".$post->ID."	AND post_type = 'page' ORDER BY menu_order", 'OBJECT');	?>
<?php if ( $pageChildren ) : foreach ( $pageChildren as $pageChild ) : setup_postdata( $pageChild ); ?>
<div class="pagepost" id="post-<?php the_ID(); ?>">
<h2><a class="one" href="<?php echo get_permalink($pageChild->ID); ?>" rel="bookmark" title="Permanent Link to <?php echo $pageChild->post_title; ?>"><?php echo $pageChild->post_title; ?></a></h2>

<div class="entry">
	 <?php the_excerpt(); ?>
     <div id="rdmr"><a href="<?php echo get_permalink($pageChild->ID); ?>" rel="bookmark" title="<?php echo $pageChild->post_title; ?>">Read More..</a></div>
</div>
</div>
	<?php  endforeach; endif; ?>
    
    
    
   	  <?php endwhile; endif; ?>
      	<?php edit_post_link('(edit this page)', '<p>', '</p>'); ?>

</div>

</div>

<?php get_footer();?>

<?php get_header(); ?>

<div class="cnt">

<?php get_sidebar();?>

	<div class="icnt">		
        <div class="breadcrumb"><?php  if(function_exists('bcn_display')) { bcn_display(); } ?></div>
  	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
		<div class="spost" id="post-<?php the_ID(); ?>">

			<h2><?php the_title(); ?></h2>
			<small><?php the_time('F jS, Y') ?> by <?php the_author_posts_link();  edit_post_link('(edit)'); ?></small>
					
			<?php if(function_exists('wp_print')) { print_link(); } ?>         
			<?php if(function_exists('wp_email')) { email_link(); } ?>


			<div class="entry1">
				<?php the_content('<p>Continue reading &raquo;</p>'); ?>

				<?php the_tags('<p>Related Topics: ', ', ', '</p>'); ?>


			</div>
		</div>
		<div class="clear"></div>
		<?php comments_template(); ?>

	<?php endwhile; else: ?>
	
	<p>Sorry, no posts matched your criteria.</p>
	
	<?php endif; ?>
	
	</div>
	
</div>

<?php get_footer();?>

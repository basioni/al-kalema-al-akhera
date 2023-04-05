<?php get_header(); ?>

<div class="cnt">

<?php get_sidebar();?>

	<div class="icnt">		
        <div class="breadcrumb"><?php  if(function_exists('bcn_display')) { bcn_display(); } ?></div>
	<?php if (have_posts()) : ?>

		
		<?php while (have_posts()) : the_post(); ?>	
			<div class="post">
				<h2 id="post-<?php the_ID(); ?>"><a class="one" href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
				<small><?php the_time('l, F jS, Y') ?></small>
				
				<div class="entry">
					<?php the_excerpt() ?>
				</div>
		
						<div id="rdmr"><a href="<?php the_permalink() ?>">Read More..</a></div>

			</div>
	
		<?php endwhile; ?>

		<div class="navigation">
         	<center><?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?></center> 
		</div>
	
	<?php else : ?>

		<h2>Not Found</h2>
		<?php  get_search_form(); ?>

	<?php endif; ?>
		
	</div>

</div>

<?php get_footer();?>

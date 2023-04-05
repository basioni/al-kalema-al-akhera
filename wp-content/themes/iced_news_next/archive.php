<?php get_header(); ?>

<div class="cnt">

<?php get_sidebar();?>

	<div class="icnt">
   
<div class="breadcrumb"><?php   if(function_exists('bcn_display')) { bcn_display(); } ?></div>

		<?php if (have_posts()) : ?>

			<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
			 
			<?php /* If this is a category archive */ if (is_category()) { ?>				
			
			<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
			
			<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
			<h2 class="archivetitle">Archive for <?php the_time('F, Y'); ?></h2>
	
			<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
			<h2 class="archivetitle">Archive for <?php the_time('Y'); ?></h2>
			
			<?php /* If this is a search */ } elseif (is_search()) { ?>
			<h2 class="archivetitle">Search Results</h2>
			
			<?php /* If this is an author archive */ } elseif (is_author()) { ?>
			<h2 class="archivetitle">Author Archive</h2>
	
			<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
			<h2 class="archivetitle">Blog Archive</h2>

		<?php } ?>

		<?php while (have_posts()) : the_post(); ?>
		<div class="post">
			<h2 id="post-<?php the_ID(); ?>"><a class="one"  href="<?php the_permalink() ?>" rel="bookmark" title=" <?php the_title(); ?>"><?php the_title(); ?></a></h2>
			<small><?php the_time(get_option('date_format')) ?><?php edit_post_link('(edit)'); ?></small>
				
			<div class="entry">
			<?php
			if ( has_post_thumbnail() ) {
				the_post_thumbnail('thumbnail');
			} 				 
			the_excerpt() ?>
			</div>
		<div id="rdmr"><a href="<?php the_permalink() ?>">Read More..</a></div>
			

		</div>
	
		<?php endwhile; ?>

		<div class="navigation">
         	<center><?php  paginate_links(); ?></center> 
		</div>
	
	<?php else : ?>

		<h2>Not Found</h2>
		<?php get_search_form(); ?>
	<?php endif; ?>
		
	</div>
</div>

<?php get_footer(); ?>
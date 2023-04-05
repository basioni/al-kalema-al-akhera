<?php
/**
 * The loop that displays posts and can also be used in child themes.
 *
 * @package Supernova
 * @since Supernova 1.4.0
 */



if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
            <h2 class="post_title" ><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
            <div class="entry">
                <a href="<?php the_permalink() ?>"><?php supernova_thumbnail(); ?></a>
                <?php if(!supernova_options('full-content')){ the_excerpt();}else{the_content();} ?>
                <div class="clearfix"></div>
            </div><!--entry -->                   
            <?php get_template_part('includes/meta'); ?>                    
        </article>
         <?php endwhile; else : 
            echo "<h2>".__('Sorry Nothing Found', 'Supernova')."</h2>"; 
endif; ?>
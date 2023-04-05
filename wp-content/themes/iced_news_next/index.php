<?php get_header(); ?>

<div class="cnt">
	<div class="lside">
    
    	<div class="hbox">
		
		 						
			<div class="slider-wrap">
				<ul class="panelContainer"  id="slider-id">
				<?php $my_query = new WP_Query('showposts=5');
				while ($my_query->have_posts()) {
					$my_query->the_post(); 
					if ( has_post_thumbnail() ) { ?>
						<li><a href="<?php the_permalink();?>"><?php echo get_the_post_thumbnail( $my_query->ID, 'medium', array('alt'=>  get_the_title())  );?></a></li>
					<?php }
					else {
						?><li><a href="<?php the_permalink();?>"><img src="" alt="<?php echo get_the_title();?>"></a></li> <?php
					}
				} ?>				
				</ul>
			</div>
            
            
            
            
            <div class="latnews">
            <h1>Latest News</h1>
            	<?php $my_query = new WP_Query('showposts=8');
				while ($my_query->have_posts()) {
				$my_query->the_post(); ?>
				<h6><a class="one"  <?php post_class(); ?> href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h6>
				<?php } ?>
				<div class="rdmr"><a href="">View More</a></div>
			</div>
        </div>
        
        
        <div class="hbox">
        	<div class="nbox1">
			<?php $options = get_option( 'iced_theme_options' ); 
			$boxcat = get_category($options['box1']);
			if ($boxcat) {
			echo '<h1>' . $boxcat->name . '</h1>';
			}?>
            <div class="nbox3">
            <?php $my_query = new WP_Query('cat='.$options['box1'].'&showposts=3');
				while ($my_query->have_posts()) {
				$my_query->the_post(); ?>
				<h6><a class="one" href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h6>
                   
                <p><?php short_excerpt('','...', true, '50'); ?></p>
				<?php } ?>
				<div class="rdmr"><a href="<?php echo get_category_link( $options['box1'] ); ?> ">View More</a></div>
                </div>
            </div>
            
            <div class="nbox2 cls1">
			<?php $options = get_option( 'iced_theme_options' ); 
			$boxcat = get_category($options['box2']);
			if ($boxcat) {
			echo '<h1>' . $boxcat->name . '</h1>';
			}?>            <div class="nbox3">
            <?php $my_query = new WP_Query('cat='.$options['box2'].'&showposts=3');
				while ($my_query->have_posts()) {
				$my_query->the_post(); ?>
				<h6><a class="one" href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h6>
                <p><?php short_excerpt('','...', true, '50'); ?></p>
				<?php } ?>
				<div class="rdmr"><a href="<?php echo get_category_link( $options['box2'] ); ?> ">View More</a></div>
                </div>
            </div>
                        
            <div class="nbox1">
			<?php $options = get_option( 'iced_theme_options' ); 
			$boxcat = get_category($options['box3']);
			if ($boxcat) {
			echo '<h1>' . $boxcat->name . '</h1>';
			}?>             <div class="nbox3">
            <?php $my_query = new WP_Query('cat='.$options['box3'].'&showposts=3');
				while ($my_query->have_posts()) {
				$my_query->the_post(); ?>
				<h6><a class="one" href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h6>
                <p><?php short_excerpt('','...', true, '50'); ?></p>
				<?php } ?>
				<div class="rdmr"><a href="<?php echo get_category_link( $options['box3'] ); ?> ">View More</a></div>
                </div>
            </div>            
        </div>
        
			<?php if(!empty($options['header-ad']))
			$headerad = $options['header-ad'] . "888";
			else $headerad = '<img src="' . get_template_directory_uri() . '/images/adv/homead.jpg" />';
			?>
			<div class="homead"><?php echo $headerad; ?></div>       
        
        <div class="hbox">
        
        <div class="nbox2">
			<?php $options = get_option( 'iced_theme_options' ); 
			$boxcat = get_category($options['box4']);
			if ($boxcat) {
			echo '<h1>' . $boxcat->name . '</h1>';
			}?>             <div class="nbox3">
            <?php $my_query = new WP_Query('cat='.$options['box4'].'&showposts=3');
				while ($my_query->have_posts()) {
				$my_query->the_post(); ?>
				<h6><a class="one" href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h6>
                <p><?php short_excerpt('','...', true, '50'); ?></p>
				<?php } ?>
				<div class="rdmr"><a href="<?php echo get_category_link( $options[box4] ); ?> ">View More</a></div>
                </div>
            </div>
            
            <div class="nbox1 cls1">
			<?php $options = get_option( 'iced_theme_options' ); 
			$boxcat = get_category($options['box5']);
			if ($boxcat) {
			echo '<h1>' . $boxcat->name . '</h1>';
			}?>             <div class="nbox3">
            <?php $my_query = new WP_Query('cat='.$options['box5'].'&showposts=3');
				while ($my_query->have_posts()) {
				$my_query->the_post(); ?>
				<h6><a class="one" href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h6>
                <p><?php short_excerpt('','...', true, '50'); ?></p>
				<?php } ?>
				<div class="rdmr"><a href="<?php echo get_category_link( $options['box5'] ); ?> ">View More</a></div>
                </div>
            </div>
                        
            <div class="nbox2">
			<?php $options = get_option( 'iced_theme_options' ); 
			$boxcat = get_category($options['box6']);
			if ($boxcat) {
			echo '<h1>' . $boxcat->name . '</h1>';
			}?>             <div class="nbox3">
            <?php $my_query = new WP_Query('cat='.$options['box6'].'&showposts=3');
				while ($my_query->have_posts()) {
				$my_query->the_post(); ?>
				<h6><a class="one" href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h6>
                <p><?php short_excerpt('','...', true, '50'); ?></p>
				<?php } ?>
				<div class="rdmr"><a href="<?php echo get_category_link( $options['box6'] ); ?> ">View More</a></div>
                </div>
            </div> 
        
        </div>
    
    </div>
	<?php get_sidebar();?>
</div>

<?php get_footer();?>


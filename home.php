<br><br><br><br><br><br><br><br><br><br><br><br>
<?php/* Newspaper theme 

	created by Gus Lally*/ ?>
<?php
	get_header();?>
	
	

	
<?php	
// List of parrent categories variable
    $list =  array('orderby'=> DESC,
  'parent' => 0
  );?>

<!-- other posts -->
<?php $posts=query_posts($query_string."&orderby=date&order=DESC&offset=1"); ?>
<?php if (have_posts()) : ?>			
			<ul style="float:left;">
            <div style="float:left;">
			 <h3> <?php echo "more news" ; ?></h3>
			 
	<?php while (have_posts()) : the_post(); ?>
	<p><h3><?php echo get_the_category()[0]->cat_name ;?></h3></p>
	<?php if(isImage()){?>
		<?php echo get_image(100,100) ?>
		<?php } ?>
		<?php if(isVideo()){?>
			
			<?php echo get_video(150,100,'preview') ?>
	<?php }?>
			<p><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></p>
			<hr>
 <?php endwhile;?></div></ul><?php endif; ?>
  
 
  
<?php $page_count =1; //page count variable

// Make a list of parrent categories 1 post per category
$categories = get_categories( $list );
    foreach ( $categories as $category ) {
		$args = array(
    'cat' => $category->term_id,
    'post_type' => 'post',
    'posts_per_page' => $page_count,
);
		$query = new WP_Query( $args );?>
	
<center>



<?php if ( $query->have_posts() ) { ?>
		
	
	<h2><?php	echo ' <a rel="canonical" class="nounderline" href="' . get_category_link( $category->term_id ) . '">' .'Latest in '. $category->name . '</a> '; ?>:</h2>
     
 
        <?php while ( $query->have_posts() ) {
				
			
            $query->the_post();
            ?>
			
			<div class="post" >
			
			<h1><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1><br>
           <?php if(isImage()){?>
	<?php echo get_image() ?>
	<?php } ?>
	<?php if(isVideo()){?>
			
			<?php echo get_video(800,450,'embed') ?><br>
	<?php }?>
	<a class="nounderline" href="<?php echo get_permalink(); ?>"><class="nounderline"<?php   the_excerpt();?> Read More...</a>
			</div><br>
        <?php }  ?>
		
		</center>
 
<?php } // end if
    }?>

	

<?php get_footer(); ?>


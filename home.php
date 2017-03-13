
<?php/* Newspaper theme 

	created by Gus Lally*/ ?>
<?php
	get_header();?>

<center><h1><?php if(!is_category()&& !is_single()&& !is_search()){ bloginfo('description');} ?></center></h1><hr>
<?php
	
// List of parrent categories variable
    $list =  array('orderby'=> DESC,
  'parent' => 0
  );?>
  
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





<?php if ( $query->have_posts() ) { ?>
			
			
   
		<br>
        <?php while ( $query->have_posts() ) {?>
		
		<center>
			<div class="post-navigation" >
	<h2><?php	echo ' <a rel="canonical" class="nounderline" href="' . get_category_link( $category->term_id ) . '">' .'Latest in '. $category->name . '</a> '; ?>:</h2>
         <?php   $query->the_post();
            ?>
			
			
			
			<h1><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1><br>
			
           <?php if(isImage()){?>
	<?php echo get_image() ?><br>
	<?php } ?>
	<?php if(isVideo()){?>
			
			<?php echo get_video(800,450,"embed") ?><br>
	<?php }?>
	
	<a class="nounderline" href="<?php echo get_permalink(); ?>"><class="nounderline"<?php   the_excerpt();?> Read More...</a></p>
	
	
				
        <?php }  ?>
		
<br>

<?php } // end if?>
	<?php get_other_posts($category->name);?></center>
   <?php }?>

 

	

<?php get_footer(); ?>


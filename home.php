
<?php/* Newspaper theme 

	created by Gus Lally*/ ?>
<?php
	get_header();?>
<center style="float:left;">	

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
		
	<ul class = "related">
	<h2><?php	echo ' <a rel="canonical" class="nounderline" href="' . get_category_link( $category->term_id ) . '">' .'Latest in '. $category->name . '</a> '; ?>:</h2>
     
		
        <?php while ( $query->have_posts() ) {?>
				
         <?php   $query->the_post();
            ?>
			
			<div class="post" style=" float:left; ">
			
			<h1><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1><br>
           <?php if(isImage()){?>
	<?php echo get_image() ?>
	<?php } ?>
	<?php if(isVideo()){?>
			
			<?php echo get_video(400,225) ?><br>
	<?php }?>
	<a class="nounderline" href="<?php echo get_permalink(); ?>"><class="nounderline"<?php   the_excerpt();?> Read More...</a>
			</div></ul>
			
        <?php }  ?>
		
	
 
<?php } // end if
	
    }?></center><center style="float:top-right;">
	
<!-- other posts -->
<?php // Make a list of parrent categories 1 post per category
$category2 = get_categories( $list );
    foreach ( $category2 as $category ) {
		$args2 = array(
    'cat' => $category->term_id,
    'post_type' => 'post',
    'posts_per_page' => 6,'offset'=>1,
);
		$query2 = new WP_Query( $args2 );?>
		
<?php if ($query2->have_posts()){ ?>			
     <div class="post-navigation" style="width:200px;">	
		<p><h3><?php echo "more ".$category->name ;?></h3></p> 
	<?php while ($query2->have_posts()) { ?><?php $query2->the_post(); ?>
	
	
	<?php if(isImage()){?>
		<?php echo get_image(100,100) ?>
		<?php } ?>
		<?php if(isVideo()){?>
			
			<?php echo get_video(150,100,'preview') ?>
	<?php }?>
			<p><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></p>
			<hr>
<?php }?></div><br><br><br><br><br><br><br><?php }?></ul><?php } ?>

 
 


	

<?php get_footer(); ?>


<?php
	get_header(); include "function.php";
	
    $list =  array('orderby'=> DESC,
  'parent' => 0
  );
$categories = get_categories( $list );
    foreach ( $categories as $category ) {
		$args = array(
    'cat' => $category->term_id,
    'post_type' => 'post',
    'posts_per_page' => '1',
);
		$query = new WP_Query( $args );

if ( $query->have_posts() ) { ?>
		
	<li class = "noBullets">
	<h2><?php	echo ' <a rel="canonical" class="nounderline" href="' . get_category_link( $category->term_id ) . '">' .'Latest in '. $category->name . '</a> '; ?>:</h2>
     
 
        <?php while ( $query->have_posts() ) {
				
 
            $query->the_post();
            ?>

           <?php post_results();?>
 
        <?php } // end while ?></li>
		
		
 
<?php } // end if
    }

?>
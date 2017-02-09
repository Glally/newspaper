<?php/* Newspager theme 

	created by Gus Lally*/ ?>




	
<?php get_header();include 'function.php';?>
<?php

$get_category = null;
 if(is_category()|| is_single()){

	 
	}
	?>

    <?php $catTitle= single_cat_title('',false);
			$get_category = get_category($cat);?>
			
<?php if($catTitle != get_bloginfo('description') && is_category()) {
	
	echo '<ul class = "nav">';
    $catId = get_cat_ID($catTitle);
	//$catId-=1;
	//echo $get_category->cat_ID;
	//echo $catId;
    
    $get_category = wp_list_categories('orderby=id&depth=1
    &title_li=&use_desc_for_title=1&child_of='.$catId);
 

		
	
		echo "</ul>"?>
 <?php }else{
	  echo "<ul></ul>";
 } ?>
  

<center><h1> <?php echo single_cat_title('') ; ?></center></h1>

<?php $posts=query_posts($query_string."&orderby=date&order=DESC"); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php post_results()?>
<!--<hr> --> <?php endwhile;?> <?php else: ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>

<div  id="delimiter">
</div>
<?php get_footer(); ?>
</div>

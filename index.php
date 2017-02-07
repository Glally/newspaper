




	
<?php get_header();include 'function.php';?>

<?php

$get_category = null;
 if(is_category()|| is_single()){

	 
	} ?>
<!--<div id="main"> -->
<!--<div id="content"> -->

<?php if($catTitle != get_bloginfo('description') && is_category()) {
 echo "<ul class='nav'>";
    
    $get_category = get_category($cat);
    
    $get_category = wp_list_categories('orderby=id&depth=1
    &title_li=&use_desc_for_title=1&child_of='.$get_category->cat_ID);
 


	 echo $get_category; ?>
</ul> <?php } ?>
<center><h1> <?php echo single_cat_title(''); ; ?></center></h1>

<?php $posts=query_posts($query_string."&orderby=date&order=DESC"); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php post_results()?>
<!--<hr> --> <?php endwhile;?> <?php else: ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>

<div  id="delimiter">
</div>
<?php get_footer(); ?>
</div>

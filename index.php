<?php/* Newspager theme 

	created by Gus Lally*/ ?>


<?php get_header();include 'function.php';?>

<?php
$catTitle = $catTitle= single_cat_title('',false);
// Category title_
 $catid = $category[0]->cat_ID;
 
 // get the top level cat id of a single post

$category = get_the_category($post->ID);
 
$catid = $category[0]->cat_ID;
$catId = get_cat_ID($catTitle);

$top_level_cat = smart_category_top_parent_id ($catid);
if(category_has_parent($catId)){
	echo '<ul class = "nav">'; 
	
	 ?> 

	<div style="padding-left:16px">
	<script>
	function myFunction2() {
		document.getElementsByClassName("nav")[1].classList.toggle("responsive");
	}
	</script>
	</div>
		<li class="icon"> 
	
    <a href="javascript:void(0);" style="font-size:15px;"class="nounderline" onclick="myFunction2()"><?php echo$catTitle;?></a>
    </li>
	<?php

	$get_category = wp_list_categories('orderby=id&depth=1
		&title_li=&use_desc_for_title=1&child_of='.$top_level_cat);?>

</ul>
<br>

<?php }?>


<?php

$get_category = null;
 
	?>

    
			
<?php if($catTitle != get_bloginfo('description') && is_category() && !empty(get_categories('orderby=id&depth=1
    &title_li=&use_desc_for_title=1&child_of='.$catId))) {
	echo '<ul class = "nav">';
	//$catId-=1;
	//echo $get_category->cat_ID;
	//echo $catId;
    ?><div style="padding-left:16px">
	<script>
	function myFunction2() {
		document.getElementsByClassName("nav")[1].classList.toggle("responsive");
	}
	</script>
	</div>
		<li class="icon"> 
	
    <a href="javascript:void(0);" style="font-size:15px;"class="nounderline" onclick="myFunction2()"><?php echo$catTitle;?></a>
    </li><?php
    $get_category = wp_list_categories('orderby=id&depth=1
    &title_li=&use_desc_for_title=1&child_of='.$catId);
 
		
	
		echo "</ul>"?>
 <?php }else{
	  echo "<ul></ul>";
 } ?>
  

<center><h1> <?php echo single_cat_title('') ; ?></center></h1>

<?php $posts=query_posts($query_string."&orderby=date&order=DESC"); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?><li class = "noBullets">

<?php post_results()?>
</li> <?php endwhile;?> <?php else: ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>

<div  id="delimiter">
</div>
<?php get_footer(); ?>
</div>

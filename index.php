<?php/* Newspaper theme 

	created by Gus Lally*/ ?>


<?php get_header();?>

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
<!-- main post -->
<ul>
<center>

<?php $posts=query_posts($query_string."&orderby=date&order=DESC&posts_per_page=1"); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div >
	
	<h1><a href="<?php the_permalink() ?>" rel="bookmark"  class="nounderline"title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1> 
	<h4><a class="nounderline" href="<?php the_permalink() ?>">Posted on <?php the_time('F jS, Y') ?></h4>

	
	<?php if(isImage()){?>
	<?php echo get_image() ?><br>
	<?php } ?>
	<?php if(isVideo()){?>
			
			<?php echo get_video(800,450,'embed') ?><br>
	<?php }?>
	<a class="nounderline" href="<?php echo get_permalink(); ?>"><class="nounderline"<?php   the_excerpt();?> Read More...</a>

	</div>
 <?php endwhile;?> <?php else: ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?></ul></center>


<!-- More top posts -->

<?php $posts=query_posts($query_string."&orderby=date&order=DESC&posts_per_page=6&offset=1"); ?>
<center>
<?php if (have_posts()) :?><ul class = "related"><?php while (have_posts()) : the_post(); ?><li class = "noBullets">
<div class="post">

	
	<?php echo post_results();?>

	</div>
 <?php endwhile;?></li> <?php endif; ?>

<!-- other posts -->
<?php $posts=query_posts($query_string."&orderby=date&order=DESC&offset=7"); ?>
<?php if (have_posts()) : ?>			
			<ul style="float:to-right;">
            <div style="float:top-right;">
			 <h3> <?php echo "more $catTitle" ; ?></h3>
			 
	<?php while (have_posts()) : the_post(); ?>

<?php if(isImage()){?>
		<?php echo get_image(100,100) ?>
		<?php } ?>
		<?php if(isVideo()){?>
			
			<?php echo get_video(150,100,'smallPreview') ?>
	<?php }?>
			<p><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></p>
			<hr>
 <?php endwhile;?></div></ul><?php endif; ?>
  



<div  id="delimiter">
</div>
</div>
<?php get_footer(); ?>
</div>

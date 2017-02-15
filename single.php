<?php/* Newspager theme 

	created by Gus Lally*/ ?>
	


<?php
/**
 * The Template for displaying all single posts.
 */
// Get the category name

get_header(); include "function.php"; ?>

<?php
$catTitle = get_the_category()[0]->cat_name ;
// get the top level cat id of a single post

$category = get_the_category($post->ID);
 
$catid = $category[0]->cat_ID;
$catId = get_cat_ID($catTitle);
$top_level_cat = smart_category_top_parent_id ($catid);
if(category_has_parent($catid)){
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
	<?php $get_category = wp_list_categories('orderby=id&depth=1
		&title_li=&use_desc_for_title=1&child_of='.$top_level_cat);?>

</ul>
<br>
<?php } ?>

<?php if($catTitle != get_bloginfo('description') && is_category() && !empty(get_categories('orderby=id&depth=1
    &title_li=&use_desc_for_title=1&child_of='.$catid))) {
 // get the top level cat id of a single post
echo '<ul class = "nav">'; ?>
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
$category = get_the_category($post->ID);
 

 
$top_level_cat = smart_category_top_parent_id ($catId); ?> 

<?php $get_category = wp_list_categories('orderby=id&depth=1
    &title_li=&use_desc_for_title=1&child_of='.$catId);?>

<?php


?>
</ul>
<?php } ?>




<!-- related posts -->
 <?php $related = ci_get_related_posts( get_the_ID(), -1 );
 
          if( $related->have_posts() ):
          ?>
			
			<ul class = "related">
            <div class="post-navigation">
              <h3>Related posts</h3>
              
                <?php while( $related->have_posts() ): $related->the_post(); ?>
				<?php if(isImage()){?>
		<?php echo get_image(100,100) ?>
		<?php } ?>
		<?php if(isVideo()){?>
			
			<?php echo get_video(150,100) ?>
	<?php }?>
			<p><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></p>
			<hr>
                <?php endwhile; ?>
              </ul>
           
          <?php
          endif; ?>

	<center>
	<?php $posts=query_posts($query_string."&orderby=date&order=DESC"); ?>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div class ="post"   style=width:38%  >
        <h2><?php the_title();?></h2>
		
		

     <p>    <?php  add_filter( 'the_content', 'get_video_link' ); the_content();?></p>
            

<p  class="nounderline"><?php the_tags('Tags: ', ', ', '<br />'); ?><b> Posted by:</b> <?php the_author(); ?> <b>on:</b> <?php the_time('M.d, Y') ?> </p>



</div>


   	 <?php// comments_template(); ?>
	
    <?php endwhile; endif; ?>
 <br> 

<?php get_footer() ?>
<div class= "comment">	<?php comments_template();?> <style="display: inline-block;">	<div>
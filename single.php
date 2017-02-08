
<?php
/**
 * The Template for displaying all single posts.
 */

get_header(); include "function.php"; ?>

<?php
// Get the category name
$catname = get_the_category()[0]->cat_name ;

?>

<!-- Print a link to this category -->
<ul class="nav"><a href="<?php echo esc_url( link_post($catname) ); ?>" title="<?php echo $catname?>"><?php echo "More $catname"?></a></ul>
<center><h1><?php $catTitle= get_the_category()[0]->cat_name;
				echo $catTitle;?></h1></center>
	



<!-- related posts -->
 <?php $related = ci_get_related_posts( get_the_ID(), -1 );
 
          if( $related->have_posts() ):
          ?>
			
			<ul class = "related">
            <div class="post-navigation">
              <h3>Related posts</h3>
              
                <?php while( $related->have_posts() ): $related->the_post(); ?>
				
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
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
        <small><?php the_time('F jS, Y') ?> <!-- by <?php the_author() ?> --></small>
		
		

         <center><?php  add_filter( 'the_content', 'get_video_link' ); the_content();?></center>
            

<p  class="nounderline"><?php the_tags('Tags: ', ', ', '<br />'); ?><b> Posted by:</b> <?php the_author(); ?> <b>on:</b> <?php the_time('M.d, Y') ?> </p>



</div>


   	 <?php// comments_template(); ?>
	
    <?php endwhile; endif; ?>
 <br> 

<?php get_footer() ?>
<div class= "comment">	<?php comments_template();?> <style="display: inline-block;">	<div>
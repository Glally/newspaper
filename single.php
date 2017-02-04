
<?php
/**
 * The Template for displaying all single posts.
 */

get_header(); include "function.php" ?>

<center>


    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div <?php post_class() ?>   style=width:70% >
        <h2><?php the_title();?></h2>
        <small><?php the_time('F jS, Y') ?> <!-- by <?php the_author() ?> --></small>
		
		

         <center><?php  add_filter( 'the_content', 'get_video_link' ); the_content();?></center>
            

<p  class="nounderline"><?php the_tags('Tags: ', ', ', '<br />'); ?><b> Posted by:</b> <?php the_author(); ?> <b>on:</b> <?php the_time('M.d, Y') ?> </p>



</div>


   	 <?php// comments_template(); ?>
	
    <?php endwhile; endif; ?>
     

<?php get_footer() ?>
<div class= "comment">	<?php comments_template();?> <style="display: inline-block;">	<div>
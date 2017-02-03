
<?php
/**
 * The Template for displaying all single posts.
 */

get_header(); ?>

<center>


    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div <?php post_class() ?>   style=width:70% >
        <h2><?php the_title();?></h2>
        <small><?php the_time('F jS, Y') ?> <!-- by <?php the_author() ?> --></small>

         <?php the_content(); ?>
            

<p  class="nounderline"><?php the_tags('Tags: ', ', ', '<br />'); ?><b> Posted by:</b> <?php the_author(); ?> <b>on:</b> <?php the_time('M.d, Y') ?> </p>



</div>
<hr>
<div>
<p>	<?php comments_template(); ?>	</p>
</div>
   <p>	 <?php// comments_template(); ?></p>
	
    <?php endwhile; endif; ?>
     

<?php get_footer() ?>

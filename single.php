<?php/* Newspaper theme 

	created by Gus Lally*/ ?>
	


<?php
/**
 * The Template for displaying all single posts.
 */
// Get the category name

get_header();?>
<br><br><br><br><br>
<!-- related posts -->
 <?php $related = ci_get_related_posts( get_the_ID(), -1 );
 
          if( $related->have_posts() ):
          ?>
			
			<ul class = "related" style="float:left;" >
            <div class="post-navigation" style="float:left;">
              <h3>Related posts</h3>
              
                <?php while( $related->have_posts() ): $related->the_post(); ?>
				<?php if(isImage()){?>
		<?php echo get_image(100,100) ?>
		<?php } ?>
		<?php if(isVideo()){?>
			
			<?php echo get_video(150,100,'preview'); ?>
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
    <div class ="post"   style= "width:38%; float:center;" >
        <h2><?php the_title();?></h2>
		
		

	<?php  add_filter( 'the_content', 'get_video_link' ); the_content();?>
            

<p  class="nounderline"><?php the_tags('Tags: ', ', ', '<br />'); ?><center><b> Posted by:</b> <?php the_author(); ?> <b>on:</b> <?php the_time('M.d, Y') ?></center> </p>

<div class= "comment">	<?php comments_template();?> <style="display: inline-block;">	<div>

</div>



	
    <?php endwhile; endif; ?>
 <br> 
 
</center>

<?php get_footer() ?>

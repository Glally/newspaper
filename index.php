<?php/* Newspaper theme 

	created by Gus Lally*/ ?>



	
<?php get_header();?>
<br>
<center><h1 class="titles"> <?php echo single_cat_title('') ; ?></center></h1><hr>


<!-- main posts -->



<center>
<p align="center"><?php echo category_description(); ?></p>
<?php $posts=query_posts($query_string."&orderby=date&order=DESC&posts_per_page=7"); ?>
<?php if (have_posts()) :?> <?php while (have_posts()) : the_post(); ?>

	
			<div class ="post"  >
	
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
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?></center>


<!-- other posts -->
<?php $posts=query_posts($query_string."&orderby=date&order=DESC&offset=7"); ?>
<?php if (have_posts()) : ?>
	
            
			<center> <h3> <?php echo "more ".single_cat_title('',false); ?></h3></center>
	<?php while (have_posts()) : the_post(); ?>
<div  style="display: inline-block;">
			 
<?php if(isImage()){?>
		<?php echo get_image(100,100) ?>
		<?php } ?>
		<?php if(isVideo()){?>
			
			<?php echo get_video(400,225,'nextPost') ?>
	<?php }?>
			<p><h3><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3></p>
			<hr></div>&nbsp;&nbsp;
 <?php endwhile;?><?php endif; ?>


  



<div  id="delimiter">
</div>
</div>
<?php get_footer(); ?>
</div>

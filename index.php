<?php/* Newspaper theme 

	created by Gus Lally*/ ?>



	
<?php get_header();?>
<center><h1> <?php echo single_cat_title('') ; ?></center></h1><hr>

<!-- other posts -->
<?php $posts=query_posts($query_string."&orderby=date&order=DESC&offset=7"); ?>
<?php if (have_posts()) : ?>
			<ul class = "related" style="float:left:16px;" >
            <div class="post-navigation" style="float:left;">
			 <h3> <?php echo "more ".single_cat_title('',false); ?></h3>
			 
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



<!-- main posts -->




<?php $posts=query_posts($query_string."&orderby=date&order=DESC&posts_per_page=7"); ?>
<?php if (have_posts()) :?> <?php while (have_posts()) : the_post(); ?>

	<center>
			<div class ="post"   style= "width:38%; float:center;" >
	
	<h1><a href="<?php the_permalink() ?>" rel="bookmark"  class="nounderline"title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1> 
	<h4><a class="nounderline" href="<?php the_permalink() ?>">Posted on <?php the_time('F jS, Y') ?></h4>

	
	<?php if(isImage()){?>
	<?php echo get_image() ?><br>
	<?php } ?>
	<?php if(isVideo()){?>
			
			<center><?php echo get_video(800,450,'embed') ?></center><br>
	<?php }?>
	<a class="nounderline" href="<?php echo get_permalink(); ?>"><class="nounderline"<?php   the_excerpt();?> Read More...</a>

	</div>
 <?php endwhile;?> <?php else: ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?></center>





  



<div  id="delimiter">
</div>
</div>
<?php get_footer(); ?>
</div>

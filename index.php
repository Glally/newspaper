
<?php get_header();include 'function.php';?>
<!--<div id="main"> -->
<!--<div id="content"> -->
<?php $posts=query_posts($query_string."&orderby=date&order=DESC"); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="post" style="display: inline-block;">
<h1><a href="<?php the_permalink() ?>" rel="bookmark"  class="nounderline"title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1> 
<h4>Posted on <?php the_time('F jS, Y') ?></h4> 


<?php if(isImage()){?>
 <?php echo get_image(300,300) ?>
<?php } ?>
<?php if(isVideo()){?>
			<?php echo get_video(300,300) ?>
<?php } ?>

<a class="nounderline" href="<?php echo get_permalink(); ?>"><p><class="nounderline"<?php the_excerpt();?> Read More...</p></a>

</div> 
<!--<hr> --> <?php endwhile;?> <?php else: ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>

<div  id="delimiter">
</div>
<?php get_footer(); ?>
</div>
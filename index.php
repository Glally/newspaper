
<?php get_header();include 'function.php';?>

<!--<div id="main"> -->
<!--<div id="content"> -->
<?php $posts=query_posts($query_string."&orderby=date&order=DESC"); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php post_results()?>
<!--<hr> --> <?php endwhile;?> <?php else: ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>

<div  id="delimiter">
</div>
<?php get_footer(); ?>
</div>

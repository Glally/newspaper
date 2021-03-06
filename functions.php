
<?php
/* Newspager theme 

	created by Gus Lally*/

/*function include_video_button_js_file() {
    wp_enqueue_script('media_button', 'js/video_button.js', array('jquery'), '1.0', true);
}*/
?>



<?php
/**
* Returns ID of top-level parent category, or current category if you are viewing a top-level
*
* @param    string      $catid      Category ID to be checked
* @return   string      $catParent  ID of top-level parent category
*/




//Check if there is a parrent category
function category_has_parent($catid){
    $category = get_category($catid);
    if ($category->category_parent > 0){
        return true;
    }
    return false;
}
function smart_category_top_parent_id ($catid) {
    while ($catid) {
        $cat = get_category($catid); // get the object for the catid
        $catid = $cat->category_parent; // assign parent ID (if exists) to $catid
          // the while loop will continue whilst there is a $catid
          // when there is no longer a parent $catid will be NULL so we can assign our $catParent
        $catParent = $cat->cat_ID;
    }
    return $catParent;	
}

function get_image($height,$width) {
  global $post, $posts;
  $img = '';
  $content = $post->post_content;
  ob_start();
  ob_end_clean();
  
  if(preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $content, $matches)){
  $img = $matches [1] [0];
  $img = "<img src='$img'height='$height' width='$width'>";
  }
   
  return $img;
}


function post_results($postitions){ ?> 
	
	
	<h1><a href="<?php the_permalink() ?>" rel="bookmark"  class="nounderline"title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1> 
	<h4><a class="nounderline" href="<?php the_permalink() ?>">Posted on <?php the_time('F jS, Y') ?></h4>
	<?php if(isImage()){?>
	<?php echo get_image(200,200) ?>
	<?php } ?>
	<?php if(isVideo()){?>
			
			<?php echo get_video(300,200,'preview') ?>
	<?php }?>
	<p><center><a class="nounderline" href="<?php echo get_permalink(); ?>"><class="nounderline"  <?php the_excerpt();?> Read More... </a></center></p>

	 <?php } 



function get_video($width,$height,$Class) {
	global $post, $posts;
  $video = '';
  $posting = $post->post_content;
  ob_start();
  ob_end_clean();
  if (preg_match_all('#<a href="https?://www.youtube.*?>([^>]*)</a>#i', $posting, $matches) ){
	 add_filter( 'the_excerpt', 'get_video_link_excerpt' );
	 $video =  $matches [1][0];
	 $video =strip_tags($video);
	 //Get rid of &t=time if it is on the link
	 $arrays =  preg_split('/&/', $video, PREG_SPLIT_OFFSET_CAPTURE);
	 $video = $arrays[0];
	 $video = str_replace("/watch?v=","/embed/", $video);
	 $video = str_replace("&nbsp;","",$video);
	 $video = "<iframe  class = '$Class' width='$width' height='$height' frameborder='0' src='$video'>
	</iframe>";
	
	
  }
  if (preg_match_all('#<a href="http?://www.dailymotion.*?>([^>]*)</a>#i', $posting, $matches) ){
	 add_filter( 'the_excerpt', 'get_video_link_excerpt' );
	 $video =  $matches [1][0];
	 $video =strip_tags($video);
	 $video = str_replace(".com/video",".com/embed/video", $video);
	 $video = str_replace("&nbsp;","",$video);
	 $video = "<iframe class ='$Class' width='$width' frameborder='0' height='$height' src='$video'>
	</iframe>";
	
	
  }
  if(preg_match_all('/(mp[34]=.*)[\'"].*/i', $posting, $matches)){
	   
  $video =$matches [1][0];
  $video = str_replace('mp4="', '', $video) ;
  $video="<video class ='$Class' width='$width' height='$height' controls src='$video'></video>";
  }
  if(preg_match('/<iframe.*src=\"(.*)\".*><\/iframe>/isU', $posting, $matches)){
	   
  $video =$matches [1];
  $video = "<iframe  class ='$Class' width='$width' frameborder='0' height='$height' src='$video'>
	</iframe>";
  }
  
  
   return $video;
 }
 
 // Make a video link in the_content() a video that can be played
function get_video_link($content){
	if ( is_single() ) {
	if (preg_match('#<a href="https?://www.youtube.*?>([^>]*)</a>#i', $content, $matches)  ){
		$video = $matches [1];
		$video =strip_tags($video);
		//Get rid of &t=time if it is on the link
		$arrays =  preg_split('/&/', $video, PREG_SPLIT_OFFSET_CAPTURE);
		$video = $arrays[0];
		//Make the video link embeded if it is not
		$video = str_replace("/watch?v=","/embed/", $video);
		$video = str_replace("&nbsp;","",$video);
		$video = "<iframe class = 'embed'  src='$video' frameborder='0' allowfullscreen='allowfullscreen'>
		</iframe>";
		$content =preg_replace('/<a (.*?)href=[\"\'](.*?)\/\/(.*?)[\"\'](.*?)>(.*?)<\/a>/i', "$video", $content);
	return $content;
	}
	if (preg_match('#<a href="http?://www.dailymotion.*?>([^>]*)</a>#i', $content, $matches)  ){
		$video = $matches [1];
		$video =strip_tags($video);
		//Make the video link embeded if it is not
		$video = str_replace(".com/video/",".com/embed/video/", $video);
		$video = str_replace("&nbsp;","",$video);
		$video = "<iframe class = 'embed'  src='$video' frameborder='0' allowfullscreen='allowfullscreen'>
		</iframe>";
		$content =preg_replace('/<a (.*?)href=[\"\'](.*?)\/\/(.*?)[\"\'](.*?)>(.*?)<\/a>/i', "$video", $content);
	return $content;
  
	}
	

  return $content;
 
 }
} 
// remove video links in text from the excerpt
function get_video_link_excerpt($posting){
	if (preg_match('@(https?://)?(?:www\.)?(youtu(?:\.be/([-\w]+)|be\.com/watch\?v=([-\w]+)))\S*@im', $posting, $matches) ){
		// Replace video link text with blank text
		$posting= preg_replace('@(https?://)?(?:www\.)?(youtu(?:\.be/([-\w]+)|be\.com/watch\?v=([-\w]+)))\S*@im',"", $posting);
		// Replace embed video link text with blank text
		$posting= preg_replace('@(https?://)?(?:www\.)?(youtu(?:\.be/([-\w]+)|be\.com/embed/([-\w]+)))\S*@im',"", $posting);
  }
  if (preg_match('!^.+dailymotion\.com/(video|hub)/([^_]+)[^#]*(#video=([^_&]+))?|(dai\.ly/([^_]+))!', $posting, $matches) ){
		// Replace video link text with blank text
		$posting= preg_replace('!^.+dailymotion\.com/(video|hub)/([^_]+)[^#]*(#video=([^_&]+))?|(dai\.ly/([^_]+))!',"", $posting);
		// Replace embed video link text with blank text
		$posting= preg_replace('!^.+dailymotion\.com/embed(video|hub)/([^_]+)[^#]*(#video=([^_&]+))?|(dai\.ly/([^_]+))!',"", $posting);
  }
	
  return $posting; 
 
}


function isImage(){ 
    
	if(get_image() == null){ 
        return FALSE; 
    }
    return TRUE; 
     
}
function isVideo(){ 
    
	if(get_Video() == null){ 
        return FALSE; 
    }
    return TRUE; 
     
}
function link_post($cat_post){

    // Get the category id
    $cat_id = get_cat_ID( $cat_post );

    // Get the category url
    $cat_link = get_category_link( $cat_id );
	return $cat_link;
}

?>


<?php
  function ci_get_related_posts( $post_id, $related_count, $args = array() ) {
    $terms        = get_the_terms( $post_id, 'category' );
    if ( empty( $terms ) ) $terms = array();
    $term_list    = wp_list_pluck( $terms, 'slug' );
    $related_args = array(
      'post_type'      => 'post',
      'posts_per_page' => $related_count,
      'post_status'    => 'publish',
      'post__not_in'   => array( $post_id ),
      'orderby'        => 'rand',
      'tax_query'      => array(
        array(
          'taxonomy' => 'category',
          'field'    => 'slug',
          'terms'    => $term_list
        )
      )
    );
 
    return new WP_Query( $related_args );
  }
  
function get_other_posts($catname){?>
	
   <?php
	 $posts=query_posts($query_string."&category_name=$catname&orderby=category=DESC&posts_per_page=6&offset=1"); 
 if (have_posts()) :?> <h1><?php echo "more ".$catname ;?> </h1> 
 <?php while (have_posts()) :?> <?php the_post();?> 
	<div  style="display:inline-block;">
			
	

	
	
	<?php if(isImage()){
		 echo get_image(100,200);
	} 
	 if(isVideo()){
			
		echo get_video(400,225,'nextPost');
	 }
			?><center><h3><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></h3></a><hr></center></div>&nbsp;&nbsp;
		
 <?php endwhile;?><?php endif;

	
}
  
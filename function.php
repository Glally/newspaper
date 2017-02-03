<?php
 

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

function post_results(){ ?> 
	
	<div class="post" style="display: inline-block;">

	<h1><a href="<?php the_permalink() ?>" rel="bookmark"  class="nounderline"title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1> 
	<h4><a class="nounderline" href="<?php the_permalink() ?>">Posted on <?php the_time('F jS, Y') ?></h4> 


	<?php if(isImage()){?>
	<?php echo get_image(300,300) ?>
	<?php } ?>
	<?php if(isVideo()){?>
			<?php echo get_video(300,300) ?>
	<?php } ?>

	<a class="nounderline" href="<?php echo get_permalink(); ?>"><p><class="nounderline"<?php the_excerpt();?> Read More...</p></a>

	</div> <?php } 



function get_video($width,$height) {
  global $post, $posts;
  $video = '';
  $content = $post->post_content;
  ob_start();
  ob_end_clean();
  if (preg_match_all('#<a href="https?://www.youtube.*?>([^>]*)</a>#i', $content, $matches) ){
	 
	 $video =strip_tags($content);
	 $video = str_replace("/watch?v=","/embed/", $video);
	 $video = str_replace("&nbsp;","",$video);
	 $video = "<iframe width='$width' height='$height' src='$video'>
	</iframe>";

  }
  if(preg_match_all('/(mp[34]=.*)[\'"].*/i', $content, $matches)){
	   
  $video =$matches [1][0];
  $video = str_replace('mp4="', '', $video) ;
  $video="<video width='$width' height='$height' controls src='$video'></video>";
  }
  if(preg_match('/<iframe.*src=\"(.*)\".*><\/iframe>/isU', $content, $matches)){
	   
  $video =$matches [1];
  $video = "<iframe width='$width' height='$height' src='$video'>
	</iframe>";
  }
  
  
   return $video;
 }
 // Make a youtube link in the_content() a video preview
function get_video_link($content){
	if ( is_single() ) {
	if (preg_match('#<a href="https?://www.youtube.*?>([^>]*)</a>#i', $content, $matches) ){
		$video = $matches [1];
		$video =strip_tags($video);
		$video = str_replace("/watch?v=","/embed/", $video);
		$video = str_replace("&nbsp;","",$video);
		$video = "<iframe width='600' height='800' src='$video'>
		</iframe>";
		
	  //$content = "<iframe width='600' height='800' '$content'>
	//</iframe>";
	
  }
	} 
  return $content.$video;
 
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

// Check if the_content() is a youtube link
function isVideoLink($content){ 
    
	if(get_video_link($content) == null){ 
        return FALSE; 
    }
    return TRUE; 
     
}
?>
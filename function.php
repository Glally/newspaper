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

?>
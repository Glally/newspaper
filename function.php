<?php
 

function get_image() {
  global $post, $posts;
  $img = '';
  $content = $post->post_content;
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $content, $matches);
  $img = $matches [1] [0];
  // if there is no image
  if(empty($img)){ 
    $img = null;
  }
  return $img;
}

function isImage(){ 
    if(get_image() == null){ 
        return FALSE; 
    }else{ 
        return TRUE; 
    } 
}


?>
<?php

function get_image() {
  global $post, $posts;
  $img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $img = $matches [1] [0];
  if(empty($img)){ //Defines a default image
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
<doctype! html>

<html>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">

<head>
<title><?php echo get_bloginfo('name')?></title>
<div class="top">
<ul id="title" class="topnav">
<center>
<a  rel="canonical" class="nounderline" href="<?php echo home_url();?>"><h1><?php echo get_bloginfo( 'name' ); ?></h1></a>
</center>
</ul>


<ul class="nav">
<div style="padding-left:16px">
<script>
function myFunction() {
    document.getElementsByClassName("nav")[0].classList.toggle("responsive");
}
</script>
</div>
 <?php
 $list =  array('orderby'=> DESC,
  'parent' => 0
  );
$categories = get_categories( $list );
foreach ( $categories as $category ) {
	echo '<li> <a rel="canonical" class="nounderline" href="' . get_category_link( $category->term_id ) . '"><h3>' . $category->name . '</h3></a></li> ';
}
?>
<form class= "search" action="<?php echo home_url(); ?>" method="get" id="searchform" > <input type="text" class="search" name="s" placeholder="Search.." > </form>  
<li class="icon"> 

	
    <a href="javascript:void(0);" style="font-size:15px;"class="nounderline" onclick="myFunction()">&#9776;</a>
    </li>
 
 
  </ul>

<center><h1><?php if(!is_category()&& !is_single()&& !is_search()){ bloginfo('description');} ?></center></h1>
<center><h1><?php if(is_category()|| is_single()){
	 $catTitle= get_the_category()[0]->cat_name;
	echo $catTitle;} ?></center></h1>
<center><h1><?php if(is_search()){
			echo "results";} ?> </center></h1>


<?php wp_head()?>
</head>
<body>


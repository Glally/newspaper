<doctype! html>
<?php /* Newspaper theme 

	created by Gus Lally*/?> 
<html>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">

<head>

<title><?php echo get_bloginfo('name')?></title>
<div class="top">
<ul class="nav">

<ul id="title" class="topnav">
<center>
<a  rel="canonical" class="nounderline" href="<?php echo home_url();?>"><h1><?php echo get_bloginfo( 'name' ); ?></h1></a>
</center>
</ul>







<ul style="float:left"><?php echo date("l  F j, Y ");?></ul>
 <li style="float:left;"><h3> <?php  $get_category = wp_list_categories('orderby=id&depth=1
		&title_li=&use_desc_for_title=1&child_of='.$top_level_cat); ?> </h3></li>


<div style="padding-left:16px">
<script>
function myFunction() {
    document.getElementsByClassName("nav")[0].classList.toggle("responsive");
}
</script>

</div>



	

    
 


<?php
$catTitle = get_the_category()[0]->cat_name ;
// get the top level cat id of a single post

$category = get_the_category($post->ID);
 
$catid = $category[0]->cat_ID;
$catId = get_cat_ID($catTitle);
$top_level_cat = smart_category_top_parent_id ($catid);

	
	 ?> 

<form class= "search" action="<?php echo home_url(); ?>" method="get" id="searchform" > <input type="text" class="search" name="s" placeholder="Search.." > </form>  	
	





<?php if($catTitle != get_bloginfo('description') && is_category() && !empty(get_categories('orderby=id&depth=1
    &title_li=&use_desc_for_title=1&child_of='.$top_level_cat))||is_single()  && !empty(get_categories('orderby=id&depth=1
    &title_li=&use_desc_for_title=1&child_of='.$top_level_cat))) {
 // get the top level cat id of a single post



$parent = get_cat_name($category[0]->category_parent);

$category = get_the_category($post->ID);
 

 
$top_level_cat = smart_category_top_parent_id ($catId); ?> 

		

<li style="float:left;"><h3> <?php  $get_category = wp_list_categories('orderby=id&depth=1
		&title_li=&use_desc_for_title=1&child_of='.$top_level_cat); ?> </h3></li>



 

<?php } ?>
 
 <li class="icon">

 
	
    <a href="javascript:void(0);" style="font-size:15px;  background-color: grey"class="nounderline" onclick="myFunction()"><?php  echo "categories";?></a>
    </li>
	
<!--<div id="main"> -->
<!--<div id="content"> -->



 </ul>

 







<?php wp_head()?>

</head>
<body>
<br><br><br><br><br><br><br><br>
<center><h1><?php if(is_search()){
			echo "results";} ?> </center></h1>
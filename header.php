<doctype! html>
<?php /* Newspaper theme 

	created by Gus Lally*/?> 
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
foreach ( $categories as $category2 ) {
	echo '<li> <a rel="canonical" class="nounderline" href="' . get_category_link( $category2->term_id ) . '"><h3>' . $category2->name . '</h3></a></li> ';
}
?>





<!--<div id="main"> -->
<!--<div id="content"> -->


<form class= "search" action="<?php echo home_url(); ?>" method="get" id="searchform" > <input type="text" class="search" name="s" placeholder="Search.." > </form>  
<li class="icon"> 

	
    <a href="javascript:void(0);" style="font-size:15px;"class="nounderline" onclick="myFunction()">&#9776;</a>
    </li>
 


<?php
$catTitle = get_the_category()[0]->cat_name ;
// get the top level cat id of a single post

$category = get_the_category($post->ID);
 
$catid = $category[0]->cat_ID;
$catId = get_cat_ID($catTitle);
$top_level_cat = smart_category_top_parent_id ($catid);

	
	 ?> 
	
	
	





<?php if($catTitle != get_bloginfo('description') && is_category() && !empty(get_categories('orderby=id&depth=1
    &title_li=&use_desc_for_title=1&child_of='.$top_level_cat))||is_single()) {
 // get the top level cat id of a single post
echo '<ul class = "nav">'; ?>

<?php
$category = get_the_category($post->ID);
 

 
$top_level_cat = smart_category_top_parent_id ($catId); ?> 

<div style="padding-left:16px">
	<script>
	function myFunction2() {
		document.getElementsByClassName("nav")[1].classList.toggle("responsive");
	}
	</script>
	</div>
		<li class="icon"> 
	
    <a href="javascript:void(0);" style="font-size:15px;"class="nounderline" onclick="myFunction2()"><?php echo$catTitle;?></a>
    </li>

<li><h3> <?php  $get_category = wp_list_categories('orderby=id&depth=1
		&title_li=&use_desc_for_title=1&child_of='.$top_level_cat);?></h3></li>



</ul>
<?php } ?>
 
 </ul>
 

 
 

<center><h1><?php if(!is_category()&& !is_single()&& !is_search()){ bloginfo('description');} ?></center></h1>

<center><h1><?php if(is_search()){
			echo "results";} ?> </center></h1>



<?php wp_head()?>

</head>
<body>


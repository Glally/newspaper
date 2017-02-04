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
    if (is_category()) {
    $get_category = get_category($cat);
    }
    ?>
    <?php
    if($get_category->category_parent){
    $get_category = '<li>'.'<h1>'.wp_list_categories('orderby=id&
    &title_li=&use_desc_for_title=1&child_of='.$get_category->category_parent).'</h1>'.'</li>';
	}else{
    $get_category = wp_list_categories('orderby=id&depth=1
    &title_li=&use_desc_for_title=1&child_of='.$get_category->cat_ID);
    if ($get_category) { ?> 

<ul>
<?php echo $get_category; ?>

</ul>

	<?php } }?>
<form class= "search" action="<?php echo home_url(); ?>" method="get" id="searchform" > <input type="text" class="search" name="s" placeholder="Search.." > </form>  
<li class="icon"> 

	
    <a href="javascript:void(0);" style="font-size:15px;"class="nounderline" onclick="myFunction()">&#9776;</a>
    </li>
 
 
  </ul>

<center><h1><?php if(!is_category()&& !is_single()&& !is_search()){ bloginfo('description');} ?></center></h1>
<center><h1><?php if(is_category()|| is_single()){
	 $catTitle=  single_cat_title(''); 
	echo $catTitle;} ?></center></h1>
<center><h1><?php if(is_search()){
			echo "results";} ?> </center></h1>


<?php wp_head()?>
</head>
<body>


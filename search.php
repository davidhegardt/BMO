<?php 
include("incl/config.php");
$title = "search";
$pageId = "search";

// Path to the SQLite database file
$pathToDB = dirname(__FILE__) . "/incl/bmo/data/bmo.sqlite"; 

// Check if the url contains a querystring with a page-part.
$p = null;
if(isset($_GET["p"])) 
{
  $p = $_GET["p"];
}


// Is the page known?
$file = null;
switch($p)
{
	case "search_object":
	{
		$pageTitle	= "Search Object";
		$file		= "search_object.php";
	}	
	break;
		
	case "search_article":
	{
    $pageTitle   = "Search article";
    $file        = "search_article.php";
	}
	break;
			
	default:
	{
    $pageTitle   = "Search front";
    $file        = "incl/search/default.php";
	}
}
?>


<?php include("incl/header.php"); ?>
<div id="content">
  <aside class="left" style="width:22%;">
    <?php include("incl/search/aside.php"); ?>
  </aside>
  <article class="right border justify-para" style="width:72%;">
    <?php include("$file"); ?>
    <hr>
  </article>
</div>
<?php include("incl/footer.php"); ?>

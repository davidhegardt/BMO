<?php 
include("incl/config.php");
$title = "articles";
$pageId = "articles";

// Path to the SQLite database file
$pathToDB = dirname(__FILE__) . "/incl/bmo/data/bmo.sqlite"; 

// Check if the url contains a querystring with a page-part.
$p = null;
if(isset($_GET["p"])) 
{
  $p = $_GET["p"];
}


// Is the page known?
$path = "incl/articles";
$file = null;
switch($p)
{
	case "show":
	{
		$pageTitle	= "Show";
		$file		= "show.php";
	}	
	break;
		
	case "update":
	{
    $pageTitle   = "Uppdatera article";
    $file        = "update.php";
	}
	break;
	
	case "search":
	{
    $pageTitle   = "Search";
    $file        = "search.php";
	}
	break;
	
    case "showall":
	{
    $pageTitle   = "Show all";
    $file        = "showall.php";
	}
	break;
		
	default:
	{
    $pageTitle   = "Articles front";
    $file        = "default.php";
	}
}
?>


<?php include("incl/header.php"); ?>
<div id="content">
  <aside class="left" style="width:22%;">
    <?php include("incl/articles/aside.php"); ?>
  </aside>
  <article class="right border justify-para" style="width:72%;">
    <?php include("$path/$file"); ?>
    <hr>
  </article>
</div>
<?php include("incl/footer.php"); ?>

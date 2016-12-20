<?php 
include("incl/config.php");
$title = "admin BMO";
$pageId = "admin";

// Path to the SQLite database file
$pathToDB = dirname(__FILE__) . "/incl/bmo/data/bmo.sqlite"; 

// Check if the url contains a querystring with a page-part.
$p = null;
if(isset($_GET["p"])) 
{
  $p = $_GET["p"];
}


// Is the page known?
$path = "incl/admin";
$file = null;
switch($p)
{
	case "new_object":
	{
		$pageTitle	= "New Object";
		$file		= "new_object.php";
	}	
	break;
		
	case "update_object":
	{
    $pageTitle   = "Update Object";
    $file        = "update_object.php";
	}
	break;
	
	case "new_article":
	{
    $pageTitle   = "New Article";
    $file        = "new_article.php";
	}
	break;
	
	case "update_article":
	{
    $pageTitle   = "Update Object";
    $file        = "update_article.php";
	}
	break;
	
    case "delete_object":
	{
    $pageTitle   = "Delete Object";
    $file        = "delete_object.php";
	}
	break;
	
	 case "delete_article":
	{
    $pageTitle   = "Delete Object";
    $file        = "delete_article.php";
	}
	break;
	
	case "update_start":
	{
    $pageTitle   = "Update Startpage";
    $file        = "update_start.php";
	}
	break;
		
	default:
	{
    $pageTitle   = "Admin start";
    $file        = "default.php";
	}
}
?>


<?php include("incl/header.php"); ?>
<div id="content">
  <aside class="left" style="width:22%;">
    <?php include("incl/admin/aside.php"); ?>
  </aside>
  <article class="right border justify-para" style="width:72%;">
    <?php include("$path/$file"); ?>
    <hr>
  </article>
</div>
<?php include("incl/footer.php"); ?>

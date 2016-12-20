<?php 
include("incl/config.php");
$title = "objects";
$pageId = "objects";

// Path to the SQLite database file
$pathToDB = dirname(__FILE__) . "/incl/bmo/data/bmo.sqlite"; 

// Check if the url contains a querystring with a page-part.
$p = null;
if(isset($_GET["p"])) 
{
  $p = $_GET["p"];
}


// Is the page known?
$path = "incl/objects";
$file = null;
switch($p)
{
	case "show":
	{
		$pageTitle	= "Show";
		$file		= "show.php";
	}	
	break;
		
	case "kategori1":
	{
    $pageTitle   = "kategori1";
    $file        = "kategori1.php";
	}
	break;
	
	case "kategori2":
	{
    $pageTitle   = "kategori2";
    $file        = "kategori2.php";
	}
	break;
	
	case "kategori3":
	{
    $pageTitle   = "kategori3";
    $file        = "kategori3.php";
	}
	break;
	
	case "kategori4":
	{
    $pageTitle   = "kategori4";
    $file        = "kategori4.php";
	}
	break;
	
	case "kategori5":
	{
    $pageTitle   = "kategori5";
    $file        = "kategori5.php";
	}
	break;
	
	case "kategori6":
	{
    $pageTitle   = "kategori6";
    $file        = "kategori6.php";
	}
	break;
	
	case "kategori7":
	{
    $pageTitle   = "kategori7";
    $file        = "kategori7.php";
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
	
	case "gallery2":
	{
    $pageTitle   = "Galleri2";
    $file        = "gallery2.php";
	}
	break;
	
	case "gallery3":
	{
    $pageTitle   = "Galleri3";
    $file        = "gallery3.php";
	}
	break;
	
	case "gallery4":
	{
    $pageTitle   = "Galleri4";
    $file        = "gallery4.php";
	}
	break;
		
	default:
	{
    $pageTitle   = "Objects front";
    $file        = "default.php";
	}
}
?>


<?php include("incl/header.php"); ?>
<div id="content">
  <aside class="left" style="width:22%;">
    <?php include("incl/objects/aside.php"); ?>
  </aside>
  <article class="right border justify-para" style="width:75%;">
    <?php include("$path/$file"); ?>
    
  </article>
</div>
<?php include("incl/footer.php"); ?>

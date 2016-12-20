<?php include("incl/config.php");

$title="Källkod";
$pageId = "source";
$pageStyle=""; //Här kan sidspecifik CSS skrivas in

// Include code from source.php to display sourcecode-viewer
$sourceBasedir=dirname(__FILE__);
      $sourceNoEcho=true;
      include("src/source.php");
      $pageStyle=$sourceStyle;
include("incl/header.php"); ?> <!--Inkluderar header-->

<!--Sidans huvudinnehåll-->
    <div id="content">
      <?php echo "$sourceBody"; ?>
      <hr>
    </div>

<!--Inkluderar byline-->
<?php include("incl/byline.php"); ?>

<!--Inkluderar footer-->
<?php include("incl/footer.php"); ?>

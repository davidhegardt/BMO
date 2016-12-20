<?php 
include("incl/config.php");
$title = "Login";
$pageId = "login";


// Check if the url contains a querystring with a page-part.
$p = null;
if(isset($_GET["p"])) 
{
  $p = $_GET["p"];
}


// Is the action a known action?
$content = null;
$output = null;
if($p == "login") // Takes you to login page-part
{
  $pageTitle = "Logga in";
  $content = userLogin();
}
else if ($p == "logout") // Takes you to the logout screen
{
  $pageTitle = "Logga ut";
  $content = userLogout();
} 
else
{
  $pageTitle = "Status login / logout"; //Takes you to the status screen
}

?>


<?php include("incl/header.php"); ?>
<div id="content">
  <div class="left border" style="width:80%;">

    <?php if(isset($content)):
      echo $content;
    else: ?> 
      <h1>Status login / logout</h1>
      <p>Denna webbplats har skyddade delar. Du måste logga in för att komma åt dem.</p>
      <p>För tillfället är du: 
      <?php if(userIsAuthenticated()): ?>
        <strong>inloggad</strong> 
        <p><a href="?p=logout">Vill du logga ut</a>?</p>
      <?php else: ?>
        <strong>ej inloggad</strong>.</p>
        <p><a href="?p=login">Vill du logga in</a>?</p>
      <?php endif; ?>  
    <?php endif; ?>

    <hr>
  </div>
</div>
<?php include("incl/footer.php"); ?>

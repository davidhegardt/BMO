<?php 
include("incl/config.php");
$title = "Sök efter Objekt";
$pageId = "search_object";

// ---------------------------------------------------------------------------------------------
//
// Create a object that connects to the database file "database.sqlite". The database-file is 
// created if it does not exist. The database file must be writable by the webserver (chmod 666) 
// and so must the directory in which the file resides (chmod 777). 
// Create an empty database-file by using Firefox SQLite Manager.
// Set attributes to use exception handling.
//
//  http://php.net/manual/en/pdo.connections.php
//  http://php.net/manual/en/pdo.setattribute.php
//

// Path to the SQLite database file
$pathToDB = dirname(__FILE__) . "/incl/bmo/data/bmo.sqlite"; 

// Connect to the DB
$db = new PDO("sqlite:$pathToDB");
// $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // Display warnings but continue script anyway


// ---------------------------------------------------------------------------------------------
//
// Select rows from a table. An exception is thrown if something fails.
//
//  http://www.sqlite.org/lang_select.html
//  http://www.sqlite.org/lang_expr.html
//  http://php.net/manual/en/pdo.prepared-statements.php
//  http://php.net/manual/en/pdo.prepare.php
//  http://php.net/manual/en/pdostatement.execute.php
//  http://php.net/manual/en/pdostatement.fetch.php
//  http://php.net/manual/en/pdostatement.fetchall.php
//

include("incl/header.php"); 

echo "<h1>$title</h1>";
echo "<form method=get><label>Sök: <input type=search name=search></label></form>";

$res = null;
if(isset($_GET['search']) && !empty($_GET['search'])) {
  $stmt = $db->prepare('SELECT * FROM Object WHERE owner LIKE "%" || ? || "%" OR title LIKE "%" || ? || "%" OR category LIKE "%" || ? || "%";');
  
  
  $stmt->execute(array($_GET['search'], $_GET['search'], $_GET['search']));
  
  $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
  echo "<p>Resultat från sökning</p>";
  $rowCount = count($res);
  echo "<p>Hittade $rowCount resultat.";
  
      
    // Get all rows, one by one
    foreach($res AS $val) {
            
    }
    
  }
 else {
  echo "<p>Skriv in ett sökord för det du vill söka efter. Du kan söka efter Titel,kategori, skriven av</p>";
}

?>
   <?php foreach((array)$res as $object): ?>
  
   
    <h2><?php echo $object['title']; ?></h2>
	<img class="size" alt="objectimage" src="<?php echo $object['image']; ?>">
    <p><?php echo $object['text']; ?></p>
	<p><?php echo $object['owner']; ?></p>
	<hr>
  
  
  <?php endforeach; ?>




<?php include("incl/footer.php"); ?>
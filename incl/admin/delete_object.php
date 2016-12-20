<?php

// Connect to the DB. 
$db = new PDO("sqlite:$pathToDB");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // Display errors, but continue script 


//
// Was the form submitted for delete? Then delete this object
//
if(isset($_POST['doDelete'])) {

	$object[] = $_POST["objects"];
	
    $stmt = $db->prepare("DELETE FROM Object WHERE id=?");
    $stmt->execute($object);
    $show = "objekten raderades. Rowcount is = " . $stmt->rowCount() . ".";
}

//
// Skapa en val/alternativ-lista baserad innehållet i Arrayen $files
// 
$stmt = $db->prepare('SELECT * FROM Object;');
$stmt->execute();
$res = $stmt->fetchAll(PDO::FETCH_ASSOC);
$current = null;

$select = "<select id='input1' multiple name='objects'>";
foreach($res as $object) 
{
  $select .= "<option value='{$object['id']}'>{$object['title']} ({$object['id']})</option>";
}
$select .= "</select>";


// Kontrollera ifall Delete knappen är tryckt, ta då bort objekten. 
// Gör några kontroller innan objekt tas bort


?>

<h1>Radera Objekt</h1>

<p>Välj det objekt som du vill göra ändringar för</p>

<form method="post">
  <fieldset>
    <!-- <legend>Radera objekt</legend> -->
    <p>
      <label for="input1">objekt:</label><br>
      <?php echo $select; ?>
    </p>
   	<input type="submit" name="doDelete" value="Radera">
	
	
	<?php if(isset($show)): ?>
    <p><output class="info"><?php echo $show ?></output></p>
    <?php endif; ?>
	
	</fieldset>
</form>
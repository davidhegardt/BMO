<?php

// Connect to the DB. 
$db = new PDO("sqlite:$pathToDB");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // Display errors, but continue script 


//
// Was the form submitted for delete? Then delete this article
//
if(isset($_POST['doDelete'])) {

	$article[] = $_POST["articles"];
	
    $stmt = $db->prepare("DELETE FROM Article WHERE id=?");
    $stmt->execute($article);
    $show = "artikeln raderades. Rowcount is = " . $stmt->rowCount() . ".";
}

//
// Skapa en val/alternativ-lista baserad innehållet i Arrayen $files
// 
$stmt = $db->prepare('SELECT * FROM Article;');
$stmt->execute();
$res = $stmt->fetchAll(PDO::FETCH_ASSOC);
$current = null;

$select = "<select id='input1' multiple name='articles'>";
foreach($res as $article) 
{
  $select .= "<option value='{$article['id']}'>{$article['title']} ({$article['id']})</option>";
}
$select .= "</select>";


// Kontrollera ifall Delete knappen är tryckt, ta då bort artikelen. 
// Gör några kontroller innan artikel tas bort


?>

<h1>Radera artikel</h1>

<p>Välj den artikel som du vill göra ändringar för</p>

<form method="post">
  <fieldset>
    <!-- <legend>Radera artikel</legend> -->
    <p>
      <label for="input1">artikel:</label><br>
      <?php echo $select; ?>
    </p>
   	<input type="submit" name="doDelete" value="Radera">
	
	
	<?php if(isset($show)): ?>
    <p><output class="info"><?php echo $show ?></output></p>
    <?php endif; ?>
	
	</fieldset>
</form>
<?php

// Connect to the DB. 
$db = new PDO("sqlite:$pathToDB");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // Display errors, but continue script 

// Kontrollera ifall Create-knappen användes, om den gjorde så skapa en ny object.
// Gör några kontroller innan objecten skapas

if(isset($_POST['doCreate'])) {
 $strip = "<b><i><p><img>";
    $object = null;

    $object[] = strip_tags($_POST['title'], $strip);
    $object[] = strip_tags($_POST['category'], $strip);
	$object[] = strip_tags($_POST['text'], $strip);
    $object[] = strip_tags($_POST['owner'], $strip);

    $stmt = $db->prepare("INSERT INTO Object (title,category,text,owner) VALUES (?,?,?,?)");
    $stmt->execute($object);
    $show = "Objektet skapades. Rowcount = " . $stmt->rowCount() . ".";
  
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

// Skapa en val/alternativ-lista baserad innehållet i Arrayen $files
// 
$stmt = $db->prepare('SELECT * FROM Object;');
$stmt->execute();
$res = $stmt->fetchAll(PDO::FETCH_ASSOC);
$current = null;

$select_cat = "<select id='input1' multiple name='objects'>";
foreach($res as $object) 
{
  $select_cat .= "<option value='{$object['category']}'>({$object['category']})</option>";
}
$select_cat .= "</select>";


?>

<h1>Lägg till nytt objekt</h1>

<p>Ange ett unikt namn på ett Objekt och klicka på knappen för att spara det.</p>

<form method="post">
  <fieldset>
    <p>
      <label for="input1">Befintliga objekt:</label><br>
      <?php echo $select; ?>
    </p>
    
     <p> 
      <label for="input1">Titel:</label><br> 
      <input type="text" class="text" name="title"> 
    </p>     
     
    <p> 
      <label for="input1">Kategori</label><br> 
      <?php echo $select_cat; ?>
    </p> 

	<p> 
      <label for="input1">Ägare</label><br> 
      <input type="text" class="text" name="owner"> 
    </p>     
     
    <p> 
	  <label for="input1">Text</label><br> 
      <textarea style="width:100%;" name="text"></textarea> 
    </p>  
    
    <p>
      <input type="submit" name="doCreate" value="Skapa">
      <input type="reset" value="Ångra">
    </p>
        
    <?php if(isset($show)): ?>
    <p><output class="info"><?php echo $show ?></output></p>
    <?php endif; ?>
        

  </fieldset>
</form>
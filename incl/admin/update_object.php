<?php 
// 
// Connect to the DB.  
$db = new PDO("sqlite:$pathToDB"); 
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // Display errors, but continue script  


// 
// Check if Save-button was pressed, save the object if true. 
// 
if(isset($_POST['doSave'])) { 

  $include = "<b><i><p><img>"; 

  // Spara formulärdata i en Array 
   $object = null; 
  $object[] = strip_tags($_POST["title"], $include); 
  $object[] = strip_tags($_POST["category"], $include); 
  $object[] = strip_tags($_POST["text"], $include); 
  $object[] = strip_tags($_POST["owner"], $include); 
  $object[] = strip_tags($_POST["id"], $include); 

 $stmt = $db->prepare("UPDATE Object SET title=?, category=?, text=?, owner=? WHERE id=?"); 
  $stmt->execute($object); 
  $show = "Uppdaterade objektet. Rowcount is = " . $stmt->rowCount() . "."; 
} 


// 
// Search the DB for Objects and add them to a select list.  
//  
$stmt = $db->prepare('SELECT * FROM Object;'); 
$stmt->execute(); 
$res = $stmt->fetchAll(PDO::FETCH_ASSOC); 
$current = null; 

$select = "<select id='input1' name='objects' onchange='form.submit();'>"; 
$select .= "<option value='-1'>Välj Object</option>"; 

//Loopa igenom resultaten 

foreach($res as $object) { 
  $selected = ""; 
  if(isset($_POST['objects']) && $_POST['objects'] == $object['id']) { 
    $selected = "selected"; 
    $current = $object; 
  } 
  $select .= "<option value='{$object['id']}' {$selected}>{$object['title']} ({$object['id']})</option>"; 
} 
$select .= "</select>"; 


?> 

<h1>Uppdatera objekt</h1> 

<p>Välj det Objekt som du vill ändra.</p> 

<form method="post"> 
  <fieldset> 
    <input type="hidden" name="id" value="<?php echo $current['id']; ?>"> 

    <p> 
      <label for="input1">Objekt:</label><br> 
      <?php echo $select; ?> 
    </p> 
     
    <p> 
      <label for="input1">Titel:</label><br> 
      <input type="text" class="text" name="title" value="<?php echo $current['title']; ?>"> 
    </p>     
     
    <p> 
      <label for="input1">Kategori</label><br> 
      <input type="text" class="text" name="category" value="<?php echo $current['category']; ?>"> 
    </p>    
  <p> 
      <label for="input1">Ägare</label><br> 
      <input type="text" class="text" name="owner" value="<?php echo $current['owner']; ?>"> 
    </p>    	
     
    <p> 
      <textarea style="width:100%;" name="text"><?php echo $current['text']; ?></textarea> 
    </p>     
     
    <p> 
      <input type="submit" name="doSave" value="Spara" <?php if(!isset($current['id'])) echo "disabled";  ?>> 
      <input type="reset" value="Ångra"> 
    </p> 

    <?php if(isset($show)): ?> 
    <p><output class="success"><?php echo $show; ?></output></p> 
    <?php endif; ?> 
         
  </fieldset> 
</form> 
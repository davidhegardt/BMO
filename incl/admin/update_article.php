<?php 
// 
// Connect to the DB.  
$db = new PDO("sqlite:$pathToDB"); 
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // Display errors, but continue script  


// 
// Check if Save-button was pressed, save the article if true. 
// 
if(isset($_POST['doSave'])) { 

  $include = "<b><i><p><img>"; 

  // Spara formulärdata i en Array 
   $article = null; 
  $article[] = strip_tags($_POST["category"], $include); 
  $article[] = strip_tags($_POST["title"], $include); 
  $article[] = strip_tags($_POST["content"], $include); 
  $article[] = strip_tags($_POST["author"], $include); 
  $article[] = strip_tags($_POST["id"], $include); 

 $stmt = $db->prepare("UPDATE Article SET category=?, title=?, content=?, author=? WHERE id=?"); 
  $stmt->execute($article); 
  $show = "Uppdaterade Artikeln. Rowcount is = " . $stmt->rowCount() . "."; 
} 


// 
// Search the DB for articles and add them to a select list.  
//  
$stmt = $db->prepare('SELECT * FROM Article;'); 
$stmt->execute(); 
$res = $stmt->fetchAll(PDO::FETCH_ASSOC); 
$current = null; 

$select = "<select id='input1' name='articles' onchange='form.submit();'>"; 
$select .= "<option value='-1'>Välj Artikel</option>"; 

//Loopa igenom resultaten 

foreach($res as $article) { 
  $selected = ""; 
  if(isset($_POST['articles']) && $_POST['articles'] == $article['id']) { 
    $selected = "selected"; 
    $current = $article; 
  } 
  $select .= "<option value='{$article['id']}' {$selected}>{$article['title']} ({$article['id']})</option>"; 
} 
$select .= "</select>"; 


?> 

<h1>Uppdatera artikel</h1> 

<p>Välj den artikel som du vill ändra.</p> 

<form method="post"> 
  <fieldset> 
    <input type="hidden" name="id" value="<?php echo $current['id']; ?>"> 

    <p> 
      <label for="input1">artikel:</label><br> 
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
      <label for="input1">Författare</label><br> 
      <input type="text" class="text" name="author" value="<?php echo $current['author']; ?>"> 
    </p>    	
     
    <p> 
	  <label for="input1">Innehåll</label><br> 
      <textarea style="width:100%;" name="content"><?php echo $current['content']; ?></textarea> 
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
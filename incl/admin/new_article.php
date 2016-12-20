<?php

// Connect to the DB. 
$db = new PDO("sqlite:$pathToDB");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // Display errors, but continue script 

// Kontrollera ifall Create-knappen användes, om den gjorde så skapa en ny article.
// Gör några kontroller innan articleen skapas

if(isset($_POST['doCreate'])) {
 $strip = "<b><i><p><img>";
    $article = null;

    $article[] = strip_tags($_POST['category'], $strip);
    $article[] = strip_tags($_POST['title'], $strip);
	$article[] = strip_tags($_POST['content'], $strip);
    $article[] = strip_tags($_POST['author'], $strip);

    $stmt = $db->prepare("INSERT INTO Article (category,title,content,author) VALUES (?,?,?,?)");
    $stmt->execute($article);
    $show = "Artikeln skapades. Rowcount = " . $stmt->rowCount() . ".";
  
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


?>

<h1>Lägg till ny Artikel</h1>

<p>Ange ett unikt namn på en artikel och klicka på knappen för att spara den.</p>

<form method="post">
  <fieldset>
    <p>
      <label for="input1">Befintliga Artiklar:</label><br>
      <?php echo $select; ?>
    </p>
    
     <p> 
      <label for="input1">Titel:</label><br> 
      <input type="text" class="text" name="title"> 
    </p>     
     
    <p> 
      <label for="input1">Kategori</label><br> 
      <input type="text" class="text" name="category"> 
    </p> 

	<p> 
      <label for="input1">Författare</label><br> 
      <input type="text" class="text" name="author"> 
    </p>     
     
    <p> 
	  <label for="input1">Text</label><br> 
      <textarea style="width:100%;" name="content"></textarea> 
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
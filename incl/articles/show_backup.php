<?php
// Connect to the DB
$db = new PDO("sqlite:$pathToDB");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // Display warnings but continue script anyway

// Search the DB for articles and add them to a select list.  
//  
$stmt = $db->prepare('SELECT * FROM Article;'); 
$stmt->execute(); 
$res = $stmt->fetchAll(PDO::FETCH_ASSOC); 
$current = null; 

$select = "<select id='input1' name='articles' onchange='form.submit();'>"; 
$select .= "<option value='-1'>Välj article</option>";

// Loop through results

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


<div id="content">
<h1>Visa artiklar</h1> 

<p>Välj den artikel som du vill visa</p> 

<form method="post"> 
  <fieldset> 
    <!-- <legend>Editera Annons</legend> --> 
    <p> 
      <label for="input1">Artikel:</label><br> 
      <?php echo $select; ?> 
    </p> 
    <p> 
       	          
		?>
        <?php if(isset($current)): ?> 
    <p> 
        <div class='show'> 
        <h2><?php echo $current['title']; ?></h2> 
       <h3><?php echo $current['author']; ?></h3>
	   <h3><?php echo $current['id']; ?></h3>
	    <?php 
            if($current['id'] == '4'){  
            echo "bajs";  
          } 
        ?>
		<p><?php echo $current['content']; ?></p> 
      </div> 
    </p> 
  <?php endif; ?> 

    </p> 
     
  </fieldset> 
</form>

</div>


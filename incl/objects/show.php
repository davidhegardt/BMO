<?php
// Connect to the DB
$db = new PDO("sqlite:$pathToDB");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // Display warnings but continue script anyway

// Search the DB for objects and add them to a select list.  
//  
$stmt = $db->prepare('SELECT * FROM Object;'); 
$stmt->execute(); 
$res = $stmt->fetchAll(PDO::FETCH_ASSOC); 
$current = null; 

$select = "<select id='input1' name='objects' onchange='form.submit();'>"; 
$select .= "<option value='-1'>Välj Object</option>";

// Loop through results

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



<h1>Visa Objekt</h1> 

<p>Välj det objekt som du vill visa</p> 

<form method="post"> 
  <fieldset> 
    <!-- <legend>Editera Objekt</legend> --> 
    <p> 
      <label for="input1">Objekt:</label><br> 
      <?php echo $select; ?> 
    </p> 
    <p> 
       
        <?php if(isset($current)): ?> 
    <p> 
        <div class='show'> 
        <h2><?php echo $current['title']; ?></h2>
		<div class="gallery-item">
        <img class="size" alt="" src="<?php echo $current['image']; ?>" class="left">
		</div>
        <p><?php echo $current['text']; ?></p> 
      </div> 
    </p> 
  <?php endif; ?> 
       
    </p> 
     
  </fieldset> 
</form>




<?php
$title = "Galleri";

// Connect to the DB. 
$db = new PDO("sqlite:$pathToDB");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // Display errors, but continue script 

$stmt = $db->prepare('SELECT * FROM Object WHERE id limit 0, 9;');
$stmt->execute();
$res = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<h1><?php echo $title ?> </h1>
<h2>Sida 1 av 4 <a href="?p=gallery2"><img alt="nextimage" src="img/next.png"></a></h2>


  <?php foreach($res as $object): ?>
    
  
  <div class="img">
  <a href="img/bmo/<?= basename($object['image']); ?>"  rel="lightbox"><span title="<?php echo $object['title']; ?>">
  <img class="size" alt="objectimage" src="<?php echo $object['image']; ?>"></span> 
  </a>
  </div>
  
  <?php endforeach; ?>


	 	

	
	






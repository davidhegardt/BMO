<?php
// Connect to the DB. 
$db = new PDO("sqlite:$pathToDB");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // Display errors, but continue script 

$stmt = $db->prepare('SELECT * FROM Article WHERE category = "article";');
$stmt->execute();
$show = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<div class="show">
<h1>Visa alla Artiklar</h1>


  <em>Samtlig Artiklar i Museet.</em>

    
  <?php foreach($show as $article): ?>
  
  
   
    <h2><?php echo $article['title']; ?></h2>
	<?php 
           if($article['id'] == '1'){  
            echo 
			'<img class="size" alt="imageid1" src="img/bmo/begravningskonfekt_madonna_maria_o_jesus.jpg">';  
          } 
		  elseif($article['id'] == '2'){
			echo
			'<img class="size" alt="imageid2" src="img/bmo/minnestavla_pas.jpg">';
			
		  }
		  elseif($article['id'] == '3'){
			echo
			'<img class="size" alt="imageid3" src="img/bmo/parlkrans_jesus_bild.jpg">';
			
		  }
		  elseif($article['id'] == '5'){
			echo
			'<img class="size" alt="imageid5" src="img/bmo/gravol.jpg">';
			
		  }
		   elseif($article['id'] == '6'){
			echo
			'<img class="size" alt="imageid6" src="img/bmo/minnestavla_uss.jpg">';
			
		  }
        ?>
    <?php echo $article['content']; ?>
	<?php 
           if($article['id'] == '1'){  
            echo '<img class="size" alt="imageid1" src="img/bmo/begravningskonfekt_tro_hopp_karlek_samt_grav.jpg">';
			}
			elseif($article['id'] == '2'){
			echo
			'<img class="size" alt="imageid2" src="img/bmo/minnestavla_granstorp.jpg">';
			
		  }
		  elseif($article['id'] == '3'){
			echo
			'<img class="size" alt="imageid3" src="img/bmo/parlkrans_blomma.jpg">';
			
		  }
		  elseif($article['id'] == '5'){
			echo
			'<img class="size" alt="imageid5" src="img/bmo/begravningstarta.jpg">';
			
		  }
		  
		 ?>
	<hr>
  
 
  <?php endforeach; ?>
</div>

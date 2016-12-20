<?php
// Connect to the DB
$db = new PDO("sqlite:$pathToDB");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // Display warnings but continue script anyway

// Search the DB for articles and add them to a select list.  
//  
$stmt = $db->prepare('SELECT * FROM Article WHERE category = "article";'); 
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


<div class="show">
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
       	          
		
        <?php if(isset($current)): ?> 
    <p> 
         
        <h2><?php echo $current['title']; ?></h2> 
       <h3><?php echo $current['author']; ?></h3>
	   
	   
	  		<div class="gallery-item">
	    <?php 
            if($current['id'] == '1'){  
            echo 
			'<img class="size" src="img/bmo/begravningskonfekt_madonna_maria_o_jesus.jpg">';  
          } 
		  elseif($current['id'] == '2'){
			echo
			'<img class="size" src="img/bmo/minnestavla_pas.jpg">';
			
		  }
		  elseif($current['id'] == '3'){
			echo
			'<img class="size" src="img/bmo/parlkrans_jesus_bild.jpg">';
			
		  }
		  elseif($current['id'] == '5'){
			echo
			'<img class="size" src="img/bmo/gravol.jpg">';
			
		  }
		   elseif($current['id'] == '6'){
			echo
			'<img class="size" src="img/bmo/minnestavla_uss.jpg">';
			
		  }
		?>
		</div>
		<p><?php echo $current['content']; ?></p> 
		<div class="gallery-item">
		<?php 
            if($current['id'] == '1'){  
            echo '<img class="size" src="img/bmo/begravningskonfekt_tro_hopp_karlek_samt_grav.jpg">';
			}
			elseif($current['id'] == '2'){
			echo
			'<img class="size" src="img/bmo/minnestavla_granstorp.jpg">';
			
		  }
		  elseif($current['id'] == '3'){
			echo
			'<img class="size" src="img/bmo/parlkrans_blomma.jpg">';
			
		  }
		  elseif($current['id'] == '5'){
			echo
			'<img class="size" src="img/bmo/begravningstarta.jpg">';
			
		  }
		  
		?>
		</div>
	  </div>
	</div>
    </p> 
  <?php endif; ?> 

    </p> 
     
  </fieldset> 
</form>
</div>
		
	


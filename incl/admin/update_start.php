<?php
// Läs in sökvägen
// Set up path and read directory
$path = dirname(__FILE__) . "/../start/";
$files = readDirectory($path);


//Check if filename is valid
$isWritable = null;
$filename = $path . $files[0];
if(is_writable($filename)) {
  $isWritable = true;
} else {
  $isWritavle = false;      
}

// Ifall användare Använder 'spara' knappen, spara ändringar 

if(isset($_POST['doSave'])) { 
  $resFromSave = putFileContents($filename, strip_tags($_POST['content'], "<b><i><p><img><p><ul><li><h1><h2><h3><div><a>")); 
  } 
   

?> 



<h1>Uppdatera Startsidan</h1> 

<p>Nedan kan du göra ändringar direkt för BMO Startsida</p> 

<form method="post"> 
  <fieldset> 
    <!-- <legend>Editera Annons</legend> --> 
     
      <label>Redigera innehåll:</label><br> 
       
     
      <textarea style="width:100%;" name="content"> 
    <?php if($filename) echo getFileContents($filename); ?> 
    </textarea> 
     
  <input type="submit" name="doSave" value="Spara"> 
  <input type="reset" value="Ångra"> 
 
 
  
  <?php if(isset($resFromSave)): ?> 
  <p><output class="success"><?php echo $resFromSave ?></output></p> 
  <?php endif; ?> 
     
  </fieldset> 
</form> 
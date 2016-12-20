<?php
$title = "Begravningssked";


// Connect to the DB. 
$db = new PDO("sqlite:$pathToDB");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // Display errors, but continue script 

$stmt = $db->prepare('SELECT * FROM Object WHERE Category = "Begravningssked";');
$stmt->execute();
$res = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>



<?php
if(isset($res)):
	foreach($res as $object):
?>
<h1><?php echo $object['category']; ?></h1>

<div class="container">
	<div class="gallery clearfix">
		<div class="gallery-item">
		<h4><?php echo $object['title']; ?></h4>
			<a href="img/bmo/<?= basename($object['image']); ?>" target="_blank" rel="lightbox" data-lightbox="gallery1">
		<img src="img/bmo/550/<?= basename($object['image']); ?>" alt="<?= $object['category']?>" /> 
	</a>
	<?php echo $object['text']; ?>
		</div>
	</div>
</div>

<?php endforeach; ?>
<?php endif; ?>


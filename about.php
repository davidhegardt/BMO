<?php 
include("incl/config.php");
$title = "Om BMO";
$pageId = "about";
$pageStyle = '#map { height: 500px; visibility: hidden; width: 500px; }';
?>

<?php

// Path to the SQLite database file
$pathToDB = dirname(__FILE__) . "/incl/bmo/data/bmo.sqlite"; 

// Connect to the DB. 
$db = new PDO("sqlite:$pathToDB");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // Display errors, but continue script 

$stmt = $db->prepare('SELECT * FROM Article WHERE id = 4;');
$stmt->execute();
$show = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<?php include("incl/header.php"); ?>
<div id="content">
<div class="show">
<?php foreach($show as $article): ?>


	<a name="About"><h1><?php echo $article['title']; ?></h1> </a>
	<figure class="left">
	<a href="img/bmo/ronny_holm_200.jpg" rel="lightbox">
	<img src="img/bmo/ronny_holm_200.jpg" alt="ronny" height="180"></a> <figcaption> Ronny Holm </figcaption></figure>
	
	<?php echo $article['content']; ?>
	

<?php endforeach; ?>
	</div>
	
<a name="Contact"></a>
<h1>Kontakta oss</h1>
<figure class="left">
<iframe width="260" height="200"
src="https://maps.google.se/maps?f=q&amp;source=s_q&amp;hl=sv&amp;geocode=&amp;q=Kyrkogatan+5,+Ljunby&amp;aq=&amp;sll=56.83484,13.933813&amp;sspn=0.010799,0.033023&amp;ie=UTF8&amp;hq=&amp;hnear=Kyrkogatan+5,+341+35+Ljungby&amp;t=m&amp;ll=56.839349,13.934269&amp;spn=0.014085,0.074158&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe>
</figure>
<p> Adress: Kyrkogatan 5, 341 35 Ljungby </p>
<p>Postadress: Box 4 341 21 Ljungby</p>
<h2>Öppettider:</h2> 
<p>Vardagar kl. 09.00 - 12.00</p>
<p>Telefon: 0372 - 671 10</p>

<?php include("incl/byline.php"); ?>
</div>
<?php include("incl/footer.php"); ?>
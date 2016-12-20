<!DOCTYPE html>
<html lang="sv">

<head>
    <meta charset="utf-8">
    <title><?php echo $title ?></title>
		
	<!-- links to external stylesheets -->
<?php if(isset($_SESSION['stylesheet'])): ?>
 <link rel="stylesheet" href="style/<?php echo $_SESSION['stylesheet']; ?>">        
<?php else: ?>

  <link rel="stylesheet" href="style/bmo.css" title="General stylesheet">
  
  
<?php endif; ?>
	<!-- display image as favorite-icon -->
  <link rel="shortcut icon" href="img/logo_yellow.png">  
  <!-- lightbox feature for gallery -->
  <link href="style/lightbox.css" rel="stylesheet" />
  <!-- font import -->
  <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine">
 <link href='http://fonts.googleapis.com/css?family=Bree+Serif&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
  
	<!-- CSS for gallery -->
  <link rel="stylesheet" href="style/gallery.css">
  
 <!-- Lightbox script to display in image gallery -->
 <script src="js/jquery-1.11.0.min.js"></script>
	<script src="js/lightbox.min.js"></script>
 
 
    <!-- Each page can set $pageStyle to create an internal stylesheet -->
  <?php if(isset($pageStyle)) : ?>
  <style type="text/css">
    <?php echo $pageStyle; ?>
  </style>
  <?php endif; ?>

<!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

  
</head>

<!-- The body id helps with highlighting current menu choice -->
<body<?php if(isset($pageId)) echo " id='$pageId' "; ?>>


<header id="above">



  <!-- Relateted links --> 
 <nav class="related1"> 
    
  </nav>
</header>




<!-- Header with logo and main navigation -->

<a href="index.php"><img class="logo" src="img/logo_svala2.png" alt="bmo logo" width=740 height=85></a>


<header id="top">
 <figure class="left">
<img height="200" width="444" src="img/bmo/maggy/begravning_1800.jpg" alt="Begravningsmuseum Online"> 
</figure>
 
<figure class="right">
<img height="200" width="444" src="img/bmo/maggy/likvagn_med_hast.jpg" alt="Begravningsmuseum Online"> 
</figure>


 
  <!-- Main navigation menu -->
  <nav class="navmenu">
    <a id="index-"     href="index.php">Hem</a>
    <a id="article-" href="articles.php">Artiklar</a>
	<a id="objects-"  href="objects.php">Objekt</a>
	<a id="gallery-"	href="objects.php?p=showall">Galleri</a> 
	<a id="about-" href="about.php#About">Om oss</a>
	<a id="contact-" href="about.php#Contact">Kontakta oss</a>
    <a id="search-" href="search.php">Sök i BMO</a>
	</nav>
</header>
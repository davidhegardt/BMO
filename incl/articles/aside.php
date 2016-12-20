<nav class="vmenu">

  <ul <?php if(isset($p)) echo "id='".strip_tags($p)."'"; ?>>
    <li><h4>Artiklar</h4>
      <ul>
        <li id="show-"><a href="?p=show">Visa Artiklar</a>
		<li id="search_article-"><a href="search_article.php">Sök Artiklar</a>
		<li id="showall-"><a href="?p=showall">Visa Alla Artiklar</a>
      </ul>
  </ul>
  
</nav>		
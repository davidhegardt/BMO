<nav class="vmenu">

  <ul <?php if(isset($p)) echo "id='".strip_tags($p)."'"; ?>>
    <li><h4>Administration</h4>
      <ul>
        <li id="new_object-"><a href="?p=new_object">Nytt objekt</a>
		<li id="update_object-"><a href="?p=update_object">Uppdatera objekt</a>
		<li id="new_article-"><a href="?p=new_article">Ny Artikel</a>
		<li id="update_article-"><a href="?p=update_article">Uppdatera Artikel</a>
		<li id="delete_object-"><a href="?p=delete_object">Radera Objekt</a>
		<li id="delete_article-"><a href="?p=delete_article">Radera Artikel</a>
		<li id="update_start-"><a href="?p=update_start">Uppdatera Startsidan</a>
      </ul>
  </ul>
  
</nav>		
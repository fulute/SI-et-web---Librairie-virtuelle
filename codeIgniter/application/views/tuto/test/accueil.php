<h1>
	Test
</h1>

<p>
	<a href="<?php echo site_url(); ?>">accueil</a>
	<br />
	
	<a href="<?php echo site_url('test'); ?>">accueil</a> du test
	<br />
	
	<a href="<?php echo site_url('test/secret'); ?>">page secrète</a>
	<br />
	
	<a href="<?php echo site_url(array('test', 'secret')); ?>">page secrète</a>
</p>


<?php
$url_secret = site_url('forum', 'secret', '2452', 'codeigniter');
/*
   $url_secret va donc valoir quelque chose comme cela : 
   http://nom_de_domaine.tld/forum/secret/2452/codeigniter.html
*/
?>


<?php

//    Affichera (selon les préférences) : <a href="http://nom_de_domaine.tld/user/connexion.html">Page de connexion</a>
url('Page de connexion', 'user', 'connexion');
?>
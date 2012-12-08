<!--<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">-->
<!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml">
<!--<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >-->
	<head>
		<!--<title>&#9835; Music Area &#9835; &bull; Inscription</title>-->
		<title><?php echo $titre; ?></title>
		<!--<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />-->
		<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $charset; ?>" />
		<meta http-equiv="content-language" content="fr"/>
		<meta name="author" content="Florence MARCHAND et David SOBCZAK"/>
		<meta name="Keywords" content="partitions, scores, scores, sheet music, free, guitare, saxophone, lute, luth, orgue, organ, orgao, guitar, free, sheet, music, free sheet music, sheet music, piano, accordion, accordeon, orchestre, orchestra, orchesta, trompette, trumpet, violon, violin, viola, cello, violoncelle, basse, bass, bass guitar, scores, free scores, mp3, PDF, pdf, midi, classical, percussion, drum, rythm, rithme, rythme, banjo, harpe, mandoline, harpa, harp, synthe, scores, free music scores, flute, clarinette, trombone, basson, harmonica, notes, tablatura, tablaturas, notas, ensemble, pontos, scores, sheet music, free, free sheet music, free scores, score, music scores, free music scores, sheet, ridse, vertering, umiskor, punteggio, resultado, gratuito, guitarra, guitar, guitare, umsonst, libre, franca, francos, francas, gratuitos, gratuitas, disponible, disponibles, online, gitarre, gitarr, piano, pianon, klaver, pianoforte, classic, klassisk, cl&aacute;ssico, clasica, clasico, violin, viola, violino, classico,  rabeca, geige, fiedel, choral, chorale,  band, bandas, orchesta, gruppo, group, music, flute, flauto, flauta, clarinet, bass, bassoon,  trumpet, trombone, mandolin, banjo, drum, tambour, tamburellare, keyboard, choral, percussion, wind, winds, instrument, gif, PDF, pdf, guitar pro, tabledit, tabrite, trumpet, trombone, harmonica, harmonika,  armonica, cello, viola, hapschord,  saxophone, saxo, jazz, world, music, flamenco, classical, classic, sassofono, saxophon,  musica, paco de lucia, flamenca, clasico, clasica, jazz, jazzy, fusion,  gratuites, gratos, guitare flamenco, guitare classique, lute, luth, Laute, bladmuziek, annuaire, directory, directorio"/>
		<meta name="description" content="Librairie virtuelle de partitions de musique"/>	

		<!--<link href="css/style.css" rel="stylesheet" type="text/css">-->
	<?php foreach($css as $url): ?>
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $url; ?>" />
	<?php endforeach; ?>		
		
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
		
	<?php foreach($js as $url): ?>
		<script type="text/javascript" src="<?php echo $url; ?>"></script> 
	<?php endforeach; ?>

		<!--Champ de recherche-->
		<!--<script src="js/jquery.color.js"></script>
		<script src="js/script.js"></script>-->
	</head>

	<body>
		<div id="page">
			<?php echo $output; ?>
		</div>
	</body>
</html>

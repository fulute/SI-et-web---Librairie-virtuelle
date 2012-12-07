<?php

$this->load->database();

/*$resultat = $this->db->select('id, email')
                     ->from('utilisateurs')
                     ->where('pseudo', 'ChuckNorris')
                     ->limit(1)
                     ->get()
                     ->result();*/

//	Mise en place de notre requ�te
$sql = "SELECT	`id`,
		`email`
	FROM	`utilisateurs`
	WHERE	`pseudo` = ?
	LIMIT	0,1
     ;";

// Les valeurs seront automatiquement �chapp�es
$data = array('ChuckNorris');

//	On lance la requ�te
$query = $this->db->query($sql, $data);

//	On r�cup�re le nombre de r�sultats
$nb_resultat = $query->num_rows();

//	On parcourt l'ensemble des r�sultats
foreach($query->result() as $ligne)
{
	echo $ligne->id;
}

//	On lib�re la m�moire de la requ�te (fortement conseill� pour lancer une seconde requ�te)
$query->free_result();
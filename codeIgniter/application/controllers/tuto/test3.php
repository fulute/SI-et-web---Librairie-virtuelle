<?php

class Test3 extends CI_Controller
{
	public function accueil()
	{
		/*$this->load->model('user_model', 'userManager');
		
		//	Le nombre d'entr�es dans la table du mod�le userManager
		$nb_membres = $this->userManager->count();
		
		//	Une seule condition
		$nb_messages = $this->userManager->count('pseudo', 'Arthur');
		
		//	Multiples conditions
		$option = array();
		$option['titre']  = 'Mon Super Titre';
		$option['auteur'] = 'Arthur';
		$nb_messages_deux = $this->userManager->count($option);*/
		
		
		$this->load->model('user_model', 'userManager');

		$options_echappees = array();
		$options_echappees['pseudo'] = 'Arthur';
		$options_echappees['mot_de_passe'] = 'bonjour';

		$options_non_echappees = array();
		$options_non_echappees['date_inscription'] = 'NOW()';
			
		//	Renvoie false car les param�tres sont vides
		$resultat = $this->userManager->create();
			
		//	Renvoie true sans sauvegarder la date
		$resultat = $this->userManager->create($options_echappees);

		//	Renvoie true en sauvegardant la date comme une fonction SQL
		$resultat = $this->userManager->create($options_echappees, $options_non_echappees);
	}
	
	
	
	
	public function count($champ = array(), $valeur = null) // Si $champ est un array, la variable $valeur sera ignor�e par la m�thode where()
	{
		return (int) $this->db->where($champ, $valeur)
								  ->from($this->table)
								  ->count_all_results();
	}
}
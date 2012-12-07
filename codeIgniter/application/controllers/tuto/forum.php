<?php

class Forum extends CI_Controller
{
	private $titre_defaut;
	
	public function __construct()
	{
		//	Obligatoire
		parent::__construct();
		
		//	Maintenant, ce code sera ex�cut� chaque fois que ce contr�leur sera appel�.
		//$this->titre_defaut = 'Mon super site';
		//echo 'Bonjour !';
		
		//if( ! isAdmin())
		//	exit("Vous n'avez pas le droit de voir cette page.");
	}
	
	/*public function activer_maintenance()
	{*/
		/* ---- */
	/*}*/

	/*public function ajouter_rang()
	{*/
		/* ---- */
	/*}*/
	
	public function index()
	{
		//echo 'Index';
		$this->accueil();
		//var_dump($this->titre_defaut);
	}
	
	public function accueil()
	{
		//echo 'Hello World!';
		echo 'Bonjour';
	}
	
	/*public function maintenance()
	{
		echo "D�sol�, c'est la maintenance.";
	}
	
	public function _remap($method)
	{
		$this->maintenance();
	}*/
	
	//	L'affichage de la variable $output est le comportement par d�faut.
	public function _output($output)
	{
		var_dump($output);
	}
	
	/*public function bonjour()
	{
		echo 'Salut � tous !';
	}*/
	//	Cette page accepte une variable $_GET facultative
	public function bonjour($pseudo = '')
	{
		echo 'Salut � toi : ' . $pseudo;
	}

	/*public function manger()
	{
		echo 'Bon app�tit !';
	}*/
	//	Cette page accepte deux variables $_GET facultatives
	public function manger($plat = '', $boisson = '')
	{
		echo 'Voici votre menu : <br />';
		echo $plat . '<br />';
		echo $boisson . '<br />';
		echo 'Bon app�tit !';
	}
}
?>
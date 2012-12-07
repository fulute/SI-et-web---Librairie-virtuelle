<?php

class Test extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
				
		//$this->load->helper('nom');
		
		//	« Décommenter » cette ligne pour charger le helper url
		//$this->load->helper('url');
		
		//$this->load->helper('assets');
	}
	
	public function index()
	{
		redirect(array('error', 'probleme'));
	}
	
	public function accueil()
	{
		//	On inclut la vue ./application/views/test/accueil.php
		$this->load->view('test/accueil');
	}
}
?>
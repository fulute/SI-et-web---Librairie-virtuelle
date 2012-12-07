<?php
class Layout extends CI_Controller
{
	public function accueil()
	{
		$this->load->library('layout');
		
		$this->layout->views('premiere_vue')
				 ->views('deuxieme_vue')
				 ->view('derniere_vue');
	}
}
?>
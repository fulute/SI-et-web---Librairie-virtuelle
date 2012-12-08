<?php
class Test_ctrl extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		
		$this->load->helper('assets');
	}
	
	public function accueil()
	{
		$this->load->library('layout');
		
		$this->layout->set_titre('&#9835; Music Area &#9835; &bull;');
		
		$this->layout->ajouter_css('style');
		
		$this->layout->ajouter_js('jquery.color');
		$this->layout->ajouter_js('script');
	
		$this->layout->views('Template/header')
					->views('Template/main_menu')
					->views('Template/left_menu')
					->views('index')
					->view('Template/footer');
	}
}
?>
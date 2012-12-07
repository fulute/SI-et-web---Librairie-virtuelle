<?php
class News extends CI_Controller
{	
	/*public function __construct()
	{
		parent::__construct();
	}*/
	
	public function index()
	{
		$this->accueil();
	}

	public function accueil()
	{
		//$this->load->view('vue');
		
		$data = array();
		$data['pseudo'] = 'Arthur';
		$data['email'] = 'email@ndd.fr';
		$data['en_ligne'] = true;

		/*//	Maintenant, les variables sont disponibles dans la vue
		//$this->load->view('vue', $data);*/	
		
		/*//$this->load->view('news/vue');
		$this->load->view('news/vue', $data); //*/
		
		/*$this->load->view('theme/en_tete');
		$this->load->view('theme/menu_gauche');
		$this->load->view('theme/menu_droit');

		$this->load->view('news/accueil');

		$this->load->view('theme/footer');*/
		
		$vue = $this->load->view('vue', $data, true);
	}
}
?>
<?php

class Alpha extends CI_Controller
{
	public function accueil()
	{$this->load->
		$data = array();

		//$this->load->library('nom_de_la_biblioth�que');
		
		//	Chargement de notre biblioth�que Alphabet via la biblioth�que Load
		$this->load->library('alphabet');

		//$data['alphabet'] = $this->alphabet->recuperer_alphabet();
		//	Appel de la m�thode Alphabet::recuperer_alphabet
		$data['defaut_alphabet'] = $this->alphabet->recuperer_alphabet();
	
		//	Appel de la m�thode Alphabet::supprimer_alphabet
		$this->alphabet->supprimer_alphabet();

		//	Appel de la m�thode Alphabet::changer_alphabet
		$data['alphabet'] = 'acegikmoqsuwybdfhjlnprtvxz';
		$this->alphabet->changer_alphabet($data['alphabet']);
	
		//	Appel de la m�thode Load::view
		$this->load->view('accueil', $data);
	}
}
?>

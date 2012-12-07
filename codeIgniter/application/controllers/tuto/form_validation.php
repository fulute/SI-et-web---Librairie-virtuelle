<?php
class Form_validation extends CI_Controller
{
	public function connexion()
	{
		//	Chargement de la biblioth�que
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('pseudo', '"Nom d\'utilisateur"', 'trim|required|min_length[5]|max_length[52]|alpha_dash|encode_php_tags|xss_clean');
		$this->form_validation->set_rules('mdp',    '"Mot de passe"',       'trim|required|min_length[5]|max_length[52]|alpha_dash|encode_php_tags|xss_clean');

	
		if($this->form_validation->run())
		{
			//	Le formulaire est valide
			$this->load->view('connexion_reussie');
		}
		else
		{
			//	Le formulaire est invalide ou vide
			$this->load->view('formulaire');
		}
	}	
	
	//$pseudo = $this->input->post('pseudo');
	//$mdp = $this->input->post('mdp');
}

?>
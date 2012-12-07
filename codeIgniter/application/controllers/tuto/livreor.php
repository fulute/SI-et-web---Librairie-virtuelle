<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Livreor extends CI_Controller
{
	/*//    Chargement de la biblioth�que
	$this->load->library('pagination');

	//    Initialisation des param�tres d'utilisation de la pagination
	define('NB_COMMENTAIRE_PAR_PAGE', 15);
	define('NB_COMMENTAIRE_SAUVEGARDE_EN_BDD', 4587);

	$this->pagination->initialize(array('base_url' => base_url() . 'index.php/livreor/voir/',
						'total_rows' => NB_COMMENTAIRE_SAUVEGARDE_EN_BDD,
						'per_page' => NB_COMMENTAIRE_PAR_PAGE)); 

	//    R�cup�ration du HTML
	$html_pagination = $this->pagination->create_links();*/


	const NB_COMMENTAIRE_PAR_PAGE = 15;
	
	public function __construct()
	{
		parent::__construct(); //parent::Controller();
		
		//	Chargement des ressources pour tout le contr�leur
		$this->load->database();
		$this->load->helper(array('url', 'assets'));
		$this->load->model('livreor_model', 'livreorManager');
	}
	
// ------------------------------------------------------------------------
	
	public function index($g_nb_commentaire = 1)
	{
		$this->voir($g_nb_commentaire);
	}
	
// ------------------------------------------------------------------------

	public function voir($g_nb_commentaire = 1)
	{
		//    La page qui permet de voir les commentaires.


		$this->load->library('pagination');
		
		$data = array();
		
		//	R�cup�ration du nombre total de messages sauvegard�s dans la base de donn�es
		$nb_commentaire_total = $this->livreorManager->count();
		
		//	On v�rifie la coh�rence de la variable $_GET
		if($g_nb_commentaire > 1)
		{
			//	La variable $_GET semblent �tre correcte. On doit maintenant
			//	v�rifier s'il y a bien assez de commentaires dans la base de donn�es.
			if($g_nb_commentaire <= $nb_commentaire_total)
			{
				//	Il y a assez de commentaires dans la base de donn�es.
				//	La variable $_GET est donc coh�rente.
				
				$nb_commentaire = intval($g_nb_commentaire);
			}
			else
			{
				//	Il n'y pas assez de messages dans la base de donn�es.
				
				$nb_commentaire = 1;
			}
		}
		else
		{
			//	La variable $_GET "nb_commentaire" est erron�e. On lui donne une
			//	valeur par d�faut.
			
			$nb_commentaire = 1;
		}
		
		//	Mise en place de la pagination
		$this->pagination->initialize(array('base_url' => base_url() . 'index.php/livreor/voir/',
							'total_rows' => $nb_commentaire_total,
							'per_page' => self::NB_COMMENTAIRE_PAR_PAGE)); 
		
		$data['pagination'] = $this->pagination->create_links();
		$data['nb_commentaires'] = $nb_commentaire_total;
		
		//	Maintenant que l'on conna�t le num�ro du commentaire, on peut lancer
		//	la requ�te r�cup�rant les commentaires dans la base de donn�es.
		$data['messages'] = $this->livreorManager->get_commentaires(self::NB_COMMENTAIRE_PAR_PAGE, $nb_commentaire-1);
		
		//	On charge la vue
		$this->load->view('livreor/afficher_commentaires', $data);
	}

	
// ------------------------------------------------------------------------

	public function ecrire()
	{
		//    La page qui permet d'�crire un commentaire.

		
		$this->load->library('form_validation');
		
		//	Cette m�thode permet de changer les d�limiteurs par d�faut des messages d'erreur (<p></p>).
		$this->form_validation->set_error_delimiters('<p class="form_erreur">', '</p>');
		
		//	Mise en place des r�gles de validation du formulaire
		//	Nombre de caract�res : [3,25] pour le pseudo et [3,3000] pour le commentaire
		//	Uniquement des caract�res alphanum�riques, des tirets et des underscores pour le pseudo
		$this->form_validation->set_rules('pseudo',  '"Pseudo"',  'trim|required|min_length[3]|max_length[25]|alpha_dash');
		$this->form_validation->set_rules('contenu', '"Contenu"', 'trim|required|min_length[3]|max_length[3000]');
		
		if($this->form_validation->run())
		{
			//	Nous disposons d'un pseudo et d'un commentaire sous une bonne forme
			
			//	Sauvegarde du commentaire dans la base de donn�es
			$this->livreorManager->ajouter_commentaire($this->input->post('pseudo'),
								   $this->input->post('contenu'));
			
			//	Affichage de la confirmation
			$this->load->view('livreor/confirmation');
		}
		else
		{
			$this->load->view('livreor/ecrire_commentaire');
		}
	}
}


/* End of file livreor.php */
/* Location: ./application/controllers/livreor.php */
?>
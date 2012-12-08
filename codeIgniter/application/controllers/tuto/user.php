<?php
class User extends CI_Controller
{
	public function accueil()
	{
		/*//	Chargement du modèle de gestion des news
		//$this->load->model('news_model');

		$data = array();

		//	On lance une requête
		$data['user_info'] = $this->news_model->get_info();

		//	On inclut une vue
		$this->layout->view('ma_vue', $data);*/
		
		
		/*//	Chargement du modèle de gestion des news
		//	Nous l'appellerons newsManager
		$this->load->model('news_model', 'newsManager');

		$data = array();

		//	On lance une requ�te
		$data['user_info'] = $this->newsManager->get_info();

		//	Et on inclut une vue
		$this->layout->view('ma_vue', $data);*/
		
		
		/*public function accueil()
		{
			$this->load->model('news_model', 'newsManager');

			$resultat = $this->newsManager->ajouter_news('Arthur',
									 'Un super titre',
									 'Un super contenu !');
			var_dump($resultat);
		}*/
            
                $this->load->model('news_model', 'newsManager');

                $nb_news = $this->newsManager->count();
                $nb_news_de_bob = $this->newsManager->count(array('auteur' => 'Bob'));		
	}
}
?>
<?php

class Crud extends CI_Controller
{
    public function index()
    {
            //	Nous chargeons les deux modèles
            $this->load->model('user_model', 'userManager');
            $this->load->model('news_model', 'newsManager');

            //	Nous utiliserons une méthode du CRUD pour chacun des deux modèles
            $nb_membre = $this->userManager->count();
            $nb_news   = $this->newsManager->count();
    }
}
?>
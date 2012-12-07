<?php

class Crud extends CI_Controller
{
    public function index()
    {
            //	Nous chargeons les deux mod�les
            $this->load->model('user_model', 'userManager');
            $this->load->model('news_model', 'newsManager');

            //	Nous utiliserons une m�thode du CRUD pour chacun des deux mod�les
            $nb_membre = $this->userManager->count();
            $nb_news   = $this->newsManager->count();
    }
}
?>
<?php

//    Les vues qui seront tout le temps inclues
$this->load->view('header.php');
$this->load->view('menu_gauche.php');
$this->load->view('menu_droite.php');

//    L'unique partie du site qui change
$this->load->view('ma_vue.php');

//    La fermeture des balises ouvertes dans les premières vues
$this->load->view('pied_de_page.php');
?>
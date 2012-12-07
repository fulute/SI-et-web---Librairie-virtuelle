<?php

$session_id = $this->session->userdata('session_id');

$adresse_ip               = $this->session->userdata('ip_address');
$user_agent_du_navigateur = $this->session->userdata('user_agent');
$derniere_visite          = $this->session->userdata('last_activity');


//$this->session->set_userdata('nom_de_votre_valeur', 'valeur');

$this->session->set_userdata('pseudo', 'Arthur');

// ...............

$pseudo = $this->session->userdata('pseudo');
// $pseudo vaut 'Arthur'

/*
set_flashdata
flashdata
keep_flashdata
*/
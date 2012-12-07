<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// -----------------------------------------------------------------------------

class MY_Model extends CI_Model
{
	/**
	 *	Ins�re une nouvelle ligne dans la base de donn�es.
	 */
	public function create($options_echappees = array(), $options_non_echappees = array())
	{
		//	V�rification des donn�es � ins�rer
		if(empty($options_echappees) AND empty($options_non_echappees))
		{
			return false;
		}
		
		return (bool) $this->db->set($options_echappees)
								   ->set($options_non_echappees, null, false)
								   ->insert($this->table);
	}

	/**
	 *	R�cup�re des donn�es dans la base de donn�es.
	 */
	public function read($select = '*', $where = array(), $nb = null, $debut = null)
	{
		return $this->db->select($select)
							->from($this->table)
							->where($where)
							->limit($nb, $debut)
							->get()
							->result();
	}
	
	/**
	 *	Modifie une ou plusieurs lignes dans la base de donn�es.
	 */
	////$where = array('pseudo' => 'Arthur', 'mot_de_passe' => 'bonjour');
	public function update($where, $options_echappees = array(), $options_non_echappees = array())
	{		
		//	V�rification des donn�es � mettre � jour
		if(empty($options_echappees) AND empty($options_non_echappees))
		{
			return false;
		}
		
		//	Raccourci dans le cas o� on s�lectionne l'id
		if(is_integer($where))
		{
			$where = array('id' => $where);
		}

		return (bool) $this->db->set($options_echappees)
								   ->set($options_non_echappees, null, false)
								   ->where($where)
								   ->update($this->table);

	}
	
	/**
	 *	Supprime une ou plusieurs lignes de la base de donn�es.
	 */
	public function delete($where)
	{
		if(is_integer($where))
		{
			$where = array('id' => $where);
		}
		
		return (bool) $this->db->where($where)
								   ->delete($this->table);
	}

	/**
	 *	Retourne le nombre de r�sultats.
	 */
	public function count($champ = array(), $valeur = null) // Si $champ est un array, la variable $valeur sera ignor�e par la m�thode where()
	{
		return (int) $this->db->where($champ, $valeur)
								  ->from($this->table)
								  ->count_all_results();
	}
	
	
	////$r = $this->db->query('la requete');
}

/* End of file MY_Model.php */
/* Location: ./system/application/core/MY_Model.php */
?>
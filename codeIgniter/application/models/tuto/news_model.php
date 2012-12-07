<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 *	News_model
 *
 *		ajouter_news($auteur, $titre, $contenu)
 *		editer_news($id, $titre = null, $contenu = null)
 *		supprimer_news($id)
 *		count($where = array())
 *		liste_news($nb = 10, $debut = 0)
 */
 
//class News_model extends CI_Model
class News_model extends MY_Model
{
	/*public function get_info()
	{
		//	On simule l'envoi d'une requête
		return array('auteur' => 'Chuck Norris',
			     'date' => '24/07/05',
		             'email' => 'email@ndd.fr');
	}*/
	
	protected $table = 'news';
	
	/**
	 *	Ajoute une news
	 *
	 *	@param string $auteur 	L'auteur de la news
	 *	@param string $titre 	Le titre de la news
	 *	@param string $contenu 	Le contenu de la news
	 *	@return bool		Le résultat de la requête
	 */
	public function ajouter_news($auteur, $titre, $contenu)
	{
		//	Ces données seront automatiquement échappées
		//$this->set ( $nom_du_champ, $valeur, $echappement_automatique = true )
		$this->db->set('auteur',  $auteur);
		$this->db->set('titre',   $titre);
		$this->db->set('contenu', $contenu);
		
		//	Ces données ne seront pas échappées
		$this->db->set('date_ajout', 'NOW()', false);
		$this->db->set('date_modif', 'NOW()', false);
		
		//	Une fois que tous les champs ont bien été définis, on "insert" le tout
		return $this->db->insert($this->table);
		
		
		/*return $this->db->set('auteur',	 $auteur)
			->set('titre', 	 $titre)
			->set('contenu', $contenu)
			->set('date_ajout', 'NOW()', false)
			->set('date_modif', 'NOW()', false)
			->insert($this->table);*/
	}
	
	/**
	 *	Édite une news déjà existante
	 *	
	 *	@param integer $id	L'id de la news à modifier
	 *	@param string  $titre 	Le titre de la news
	 *	@param string  $contenu Le contenu de la news
	 *	@return bool		Le résultat de la requête
	 */
	public function editer_news($id, $titre = null, $contenu = null)
	{
		//	Il n'y a rien à éditer
		if($titre == null AND $contenu == null)
		{
			return false;
		}
		
		//	Ces données seront échappées
		if($titre != null)
		{
			$this->db->set('titre', $titre);
		}
		if($contenu != null)
		{
			$this->db->set('contenu', $contenu);
		}
		
		//	Ces données ne seront pas échappées
		$this->db->set('date_modif', 'NOW()', false);
		
		//	La condition
		$this->db->where('id', (int) $id);
		
		return $this->db->update($this->table);
		
		
		/*return $this->db->set('date_modif', 'NOW()', false)
				->where('id', (int) $id)
				->update($this->table);*/
				
		
		/*//	Exemple de valeur pour $id.
		$id = 5;
		$id = array('id' => 9);
		$id = array('pseudo' => 'Arthur',
					'titre' => 'monTitre');

		/* ******* */

		/*if(is_array($id))
		{
			$this->db->where($id);
		}
		else
		{
			$this->db->where('id', (int) $id);
		}*/
	}
	
	/**
	 *	Supprime une news
	 *	
	 *	@param integer $id	L'id de la news à modifier
	 *	@return bool		Le résultat de la requête
	 */
	public function supprimer_news($id)
	{
		return $this->db->where('id', (int) $id)
				->delete($this->table);
	}
	
	/**
	 *	Retourne le nombre de news.
	 *	
	 *	@param array $where	Tableau associatif permettant de définir des conditions
	 *	@return integer		Le nombre de news satisfaisant la condition
	 */
	public function count($where = array())
	{
		return (int) $this->db->where($where)
					  ->count_all_results($this->table);
	}

	/**
	 *	Retourne une liste de $nb dernières news.
	 *	
	 *	@param integer $nb	Le nombre de news
	 *	@param integer $debut	Nombre de news à sauter
	 *	@return objet		La liste de news
	 */
	public function liste_news($nb = 10, $debut = 0)
	{
		return $this->db->select('*')
				->from($this->table)
				->limit($nb, $debut)
				->order_by('id', 'desc')
				->get()
				->result();
	}
}


/* End of file news_model.php */
/* Location: ./application/models/news_model.php */
?>
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Layout
{
	private $CI;
	//private $output = '';
	private $var = array();
	
	
	private $theme = 'default';
	
/*
|===============================================================================
| Constructeur
|===============================================================================
*/
	
	public function __construct()
	{
		$this->CI = get_instance();
		
		$this->var['output'] = '';
		
		//	Le titre est compos� du nom de la m�thode et du nom du contr�leur
		//	La fonction ucfirst permet d'ajouter une majuscule
		$this->var['titre'] = ucfirst($this->CI->router->fetch_method()) . ' - ' . ucfirst($this->CI->router->fetch_class());
		
		//	Nous initialisons la variable $charset avec la m�me valeur que
		//	la cl� de configuration initialis�e dans le fichier config.php
		$this->var['charset'] = $this->CI->config->item('charset');
		
		$this->var['css'] = array();
		$this->var['js'] = array();
	}
	
/*
|===============================================================================
| M�thodes pour charger les vues
|	. view
|	. views
|===============================================================================
*/
	
	public function view($name, $data = array())
	{
		/*$this->output .= $this->CI->load->view($name, $data, true);
	
		$this->CI->load->view('../themes/default', array('output' => $this->output));*/
		
		$this->var['output'] .= $this->CI->load->view($name, $data, true);
		
		//$this->CI->load->view('../themes/default', $this->var);
		$this->CI->load->view('../themes/' . $this->theme, $this->var);
	}
	
	public function views($name, $data = array())
	{
		//$this->output .= $this->CI->load->view($name, $data, true);
		$this->var['output'] .= $this->CI->load->view($name, $data, true);
		return $this;
	}
	
	
	/*
	|===============================================================================
	| M�thodes pour modifier les variables envoy�es au layout
	|	. set_titre
	|	. set_charset
	|===============================================================================
	*/
	public function set_titre($titre)
	{
		if(is_string($titre) AND !empty($titre))
		{
			$this->var['titre'] = $titre;
			return true;
		}
		return false;
	}

	public function set_charset($charset)
	{
		if(is_string($charset) AND !empty($charset))
		{
			$this->var['charset'] = $charset;
			return true;
		}
		return false;
	}

	/*
	|===============================================================================
	| M�thodes pour ajouter des feuilles de CSS et de JavaScript
	|	. ajouter_css
	|	. ajouter_js
	|===============================================================================
	*/
	public function ajouter_css($nom)
	{
		if(is_string($nom) AND !empty($nom) AND file_exists('./assets/css/' . $nom . '.css'))
		{
			$this->var['css'][] = css_url($nom);
			return true;
		}
		return false;
	}

	public function ajouter_js($nom)
	{
		if(is_string($nom) AND !empty($nom) AND file_exists('./assets/javascript/' . $nom . '.js'))
		{
			$this->var['js'][] = js_url($nom);
			return true;
		}
		return false;
	}


	public function set_theme($theme)
	{
		if(is_string($theme) AND !empty($theme) AND file_exists('./application/themes/' . $theme . '.php'))
		{
			$this->theme = $theme;
			return true;
		}
		return false;
	}


	//m�thode permettant d'ajouter rapidement un ou plusieurs frameworks JavaScript.
	// mis en place, via le constructeur, un syst�me qui me permettait d'inclure automatiquement une feuille de style CSS. Son chemin �tait d�fini en fonction du nom du contr�leur appel� et de sa m�thode.
}

/* End of file layout.php */
/* Location: ./application/libraries/layout.php */
?>
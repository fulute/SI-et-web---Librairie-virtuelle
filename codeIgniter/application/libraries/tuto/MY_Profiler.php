<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Profiler extends CI_Profiler
{	
	function run()
	{
		/*$output = "<div id='codeigniter_profiler' style='clear:both;background-color:#fff;padding:10px;'>";

		$output .= $this->_compile_uri_string();
		$output .= $this->_compile_get();
		$output .= $this->_compile_post();
		$output .= $this->_compile_controller_info();
		$output .= $this->_compile_benchmarks();
		$output .= $this->_compile_queries();
		$output .= $this->_compile_memory_usage();

		$output .= '</div>';
		
		return $output;*/
		
		
		/*$output = "<div id='codeigniter_profiler' style='clear:both;background-color:#fff;padding:10px;'>";
		
		$output .= $this->_compile_uri_string();
		$output .= $this->_compile_get();
		$output .= $this->_compile_post();
		$output .= $this->_compile_memory_usage();
		$output .= $this->_compile_benchmarks();
		$output .= $this->_compile_controller_info();
		$output .= $this->_compile_queries();
		$output .= $this->_compile_session();

		$output .= '</div>';

		return $output;*/
		
		
		/*$output = "<div id='codeigniter_profiler' style='clear:both;background-color:#fff;padding:10px;'>";
	
		$output .= '<div style="margin-left: 2%; margin-right: 1%; float: left; width: 47%;">';
		$output .= $this->_compile_uri_string();
		$output .= $this->_compile_controller_info();
		$output .= $this->_compile_memory_usage();
		$output .= $this->_compile_benchmarks();
		$output .= '</div>';
		
		$output .= '<div style="margin-left: 51%; margin-right: 2%; width: auto;">';
		$output .= $this->_compile_get();
		$output .= $this->_compile_post();
		$output .= $this->_compile_queries();
		$output .= $this->_compile_session();
		$output .= '</div>';

		$output .= '</div>';

		return $output;*/
		
		
		$output = "<div id='codeigniter_profiler' style='clear:both;background-color:#fff;padding:10px;'>";
		
		$output .= '<div style="margin-left: 2%; margin-right: 1%; float: left; width: 47%;">';
		$output .= $this->_compile_uri_string();
		$output .= $this->_compile_get();
		$output .= $this->_compile_memory_usage();
		$output .= '</div>';
		
		$output .= '<div style="margin-left: 51%; margin-right: 2%; width: auto;">';
		$output .= $this->_compile_controller_info();
		$output .= $this->_compile_post();
		$output .= $this->_compile_benchmarks();
		$output .= '</div>';
		
		$output .= '<div style="margin-left: 2%; margin-right: 2%; width: auto;">';
		$output .= $this->_compile_queries();
		$output .= $this->_compile_session();
		$output .= '</div>';
	
        $output .= '</div>';

        return $output;
	}
	
	
	function _compile_session()
	{
		$output  = "\n\n";
		$output .= '<fieldset style="border:1px solid #009999;padding:6px 10px 10px 10px;margin:20px 0 20px 0;background-color:#eee">';
		$output .= "\n";

		$output .= '<legend style="color:#009999;">&nbsp;&nbsp;' . 'DONNEES SESSION' . '&nbsp;&nbsp;</legend>';
		$output .= "\n";

		if(is_object($this->CI->session))
		{
			//	Le contenu de la session
			$output .= "\n\n<table cellpadding='4' cellspacing='1' border='0' width='100%'>\n";
				
			//	Nous devons ex�cuter cette fonction pour r�cup�rer un tableau de valeurs
			//	En effet, pour acc�der aux donn�es de la session, il faut r�cup�rer ses attributs
			$sess = get_object_vars($this->CI->session);

			//	Nous parcourons chaque valeur du tableau de sessions
			foreach($sess['userdata'] as $key => $val)
			{
				//	On �chappe (juste pour l'affichage) les donn�es non num�riques et on les affiche
				if( ! is_numeric($key))
				{
					$key = "'" . $key . "'";
				}
				$output .= "<tr><td width='50%' style='color:#000;
	background-color:#ddd;'>&#36;_SESSION[" . $key . "]&nbsp;&nbsp; </td><td width='50%' style='color:#009999;font-weight:normal;background-color:#ddd;'>";

				//	On affiche la valeur de la variable. Si c'est un tableau, on ex�cute la fonction print_r
				if(is_array($val))
				{
					$output .= "<pre>" . htmlspecialchars(stripslashes(print_r($val, true))) . "</pre>";
				} 
				else
				{
					$output .= htmlspecialchars(stripslashes($val));
				}

				$output .= "</td></tr>\n";
			}

			$output .= "</table>\n";
		}
		else
		{
			//	La session est ind�finie
			$output .= "<div style='color:#009999;font-weight:normal;padding:4px 0 4px 0'>".'No SESSION data exists'."</div>";
		}

		return $output . "</fieldset>";
	}
}
?>
<?php

class Test2 extends CI_Controller
{
	public function index()
	{
		$this->output->enable_profiler(true);
		
		
		/*//	Première requête
		$this->benchmark->mark('requete1_start');
		$query = $this->db->query('SELECT `id`, `username`, `user_rank` FROM `users`')->result();
		$this->benchmark->mark('requete1_end');
		
		//	Deuxième requête
		$this->benchmark->mark('requete2_start');
		$query = $this->db->select('id, username, user_rank')->from('users')->get()->result();
		$this->benchmark->mark('requete2_end');
 
		$this->output->enable_profiler(true);*/
		
		
		//$this->benchmark->elapsed_time('requete1_start', 'requete1_end');
	}
}

/* End of file test.php */
/* Location: ./application/controllers/test.php */
?>
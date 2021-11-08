<?php 

class Register_model extends CI_Model{

	function add_user($insert)
	{
		$this->db->insert('users', $insert);
	}
}


?>
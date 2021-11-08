<?php 

class Login_model extends CI_Model{

	public function login_valid($username, $password){

		$q = $this->db->where(['username' => $username, 'password' => $password])
					  ->get('users');

		if($q->num_rows()==1){
			// return TRUE;
			$attr=array(

				'current_user_id'=>	$q->row(0)->user_id,
				// 'current_user_img'=>$q->row(0)->profile_img,
				'current_user_name'=> $username

			);
			$this->session->set_userdata($attr);
			return TRUE;
			// return $q->row()->id;
		}else{
			return FALSE;
		}		  
	}
}


?>
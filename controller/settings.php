<?php 

class settings extends fh_ctrl{
	protected $new_changes;
	protected $new_upload;
	protected $user_email;
	protected $user_name;

	public function index(){
		global $data;

		$data['title'] = $this->title('vlogic Air Shipping');
		$this->user_email=call_sess(USER_SESSION, 'email');
		$this->user_name=call_sess(USER_SESSION, 'name');


		// model
		$this->new_changes= inst("vlogic_air_users","model");

		// helper
		$this->new_upload = inst("form_helpers","helper");
	}


	public function avater(){
		try{
			// aut
			$this->check_fields($this->data);

			$file = $this->new_upload->file_upload("new_avater",
				"png,jpg,jpeg,JPEG,PNG,JPG",
				TRUE,
				10);

			
			/*
			
			"tmp_name"
            "name"
            "size"
            "ext"
			*/

			$new_user_avater = $this->user_email.'.'.$file['ext'];

			move_files($file['tmp_name'],"uploads/users/$new_user_avater");

			$this->data['user_avater'] = $new_user_avater;

			$where = array(
							"user_mail" => $this->user_email
							);
			// check and update if needed
			// remove old
			$param['where'] = array('user_mail' => $this->user_email);
			$old_file = $this->new_changes->getRow($param);
			$fetched['old_file_name'] = $old_file['user_avater'];
			$old = $fetched['old_file_name'];
			unlink("uploads/users/$old");
			if(!$this->new_changes->updateRow($this->data,$where)){
				unlink("uploads/users/$new_user_avater");
				throw new Exception("Avater could not be uploaded");
				
			}

			// update the session
			$this->update_sess(USER_SESSION,$this->data['user_avater'],'user_avater');		


			// on success
			htmlFeed('success', 'Avater uploaded successfully');

			redir('dashboard/settings');

		}
		catch(Exception $e){
			htmlFeed('warning', $e->getMessage());
			redir('dashboard/settings');
		}
	}
}
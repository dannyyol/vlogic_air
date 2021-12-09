<?php

class view_users extends fh_ctrl{
	protected $all_users;

	public function index(){
		global $data;

		$data['title'] = $this->title("vLogic Air Shipping");

		// model
		$this->all_users = inst("vlogic_air_users","model");

		// get all users
		$data['i'] = 1;
		$param['items'] = 8;
		$data['all_userz'] = $this->all_users->pageRow($param);

		// count users
		$where = NULL;
		$data['total_users'] = $this->all_users->countRows($where);
		// count online users
		$where = array("user_status" => 'Online');
		$data['online'] = $this->all_users->countRows($where);
		// count offline
		$where = array("user_status" => 'Offline');
		$data['offline'] = $this->all_users->countRows($where);
		// count staffs
		$where = array("user_role" => 'Staff');
		$data['staffs'] = $this->all_users->countRows($where);
		// count admins
		$where = array("user_role" => 'Admin');
		$data['admins'] = $this->all_users->countRows($where);
		// count managers
		$where = array("user_role" => 'Manager');
		$data['managers'] = $this->all_users->countRows($where);
		// count suspended users
		$where = array("user_status" => 'suspended');
		$data['suspended'] = $this->all_users->countRows($where);

		
	}

	public function update_user(){
		global $data;

		
		$this->data['user_full_name'] = $this->post('user_full_name');
		$this->data['user_mail'] = $this->post('user_mail');
        if(!empty($this->post('user_psw'))){
            $this->data['user_psw'] = sha1($this->post('user_psw'));
        }
		$this->data['ip_address'] = $this->post('ip_address');
		$this->data['user_role'] = $this->post('user_role');
		$this->data['user_status'] = $this->post('user_status');

		try{

			$where = array("user_mail" => $this->data['user_mail']
						);

			//update status
			if(!$this->all_users->updateRow($this->data,$where)){
					throw new Exception("Unable to update user");
					
			}

			// Mail
			$this->data['user_psw'] = $this->post('user_psw');
            $content = array();
            $content['header_color'] = 'white';
            $content['to'] = $this->data['user_mail'];
            $content['from'] = "support@v-logic.com.ng";
            $content['subject'] = 'Account Update, '.$this->data['user_full_name'];
            $content['logo'] =  BASE_URL.'assets/vlogic/assets/images/logo.png';
            
            $vlink = BASE_URL;
            $content['body'] = '<p style="font-size:1.5em">Hello, '.ucfirst($this->data['user_full_name']).'</p>';
            $content['body'] .= '<p>Your account has been updated for '.ucfirst(SITENAME).'</p>';
            $content['body'] .= '<p>New changes:</p>';
            $content['body'] .= '<p><b>Full Name:</b> '.$this->data['user_full_name'].'</p>';
            $content['body'] .= '<p><b>Email Address:</b> '.$this->data['user_mail'].'</p>';
            $content['body'] .= '<p><b>Role:</b> '.$this->data['user_role'].'</p>';
            $content['body'] .= '<p><b>Status:</b> '.$this->data['user_status'].'</p>';
            $content['body'] .= '<p style="margin-top:30px">
                                    <a href="'.$vlink.'" target="_BLANK" style="padding:20px;color:white;font-size:1.2em;background-color:#7ac043;text-decoration:none;border-radius:5px;border:0">Signin</a>
                                </p>';
            $content['footer'] = NULL;
                
            fh_mail($content);

			htmlFeed('success', 'User details updated successfully');
			redir('dashboard/view_users');

		}
		catch(Exception $e){
			htmlFeed('warning', $e->getMessage());
			redir('dashboard/view_users');

		}
	}

    function remove_user(){
        global $data;
        
        if(count(getval()) > 2){
            $this->data['id'] = getval()[2];
            // check if user exist
            if(!$this->all_users->checkTable($this->data)){
                throw new Exception('User does not exist');
            }
            
            // delete user
            if(!$this->all_users->deleteRow($this->data)){
                throw new Exception('Unable to remove user');
            }
            
            // output response
            htmlFeed('success','User has been removed');
            
            // redirect
            redir('dashboard/view_users');
        }
        else{
            $data['error404'] = TRUE;
        }
    }

}
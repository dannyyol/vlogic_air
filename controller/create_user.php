<?php

class create_user extends fh_ctrl{
	protected $new_user;

	public function index(){
		global $data;

		$data['title'] = $this->title("vLogic Air Shipping");

		// model
		$this->new_user= inst("vlogic_air_users","model");

		
	}

	public function process(){
		// get form inputs
		$this->data['user_full_name']=$this->post('new_full_name');
		$this->data['user_mail']=$this->post('new_mail');
		$this->data['user_psw']=sha1($this->post('new_psw'));
		$this->data['user_role']=ucfirst($this->post('new_role'));
		$this->data['ip_address']=$this->post('ip_address');
		$this->data['user_since']=date('F d Y');
		$this->data['user_avater']='custom.png';
		$this->data['user_status']='Offline';
		

		try{
			// Auth
			$this->check_fields($this->data);
			$this->check_email($this->data['user_mail']);
            
            // validate email
            if(explode('@',$this->data['user_mail'])[1] != 'v-logic.net'){
                throw new Exception('E-mail Address provided is not a "v-logic.net" email');
            }


			if($this->new_user->checkTable(array("user_mail" => $this->data['user_mail']))){
				throw new Exception("User already exists");
			}


			if (!$this->new_user->storeRow($this->data)) {
				# code...

				throw new Exception("Error creating user");
				
			}

			// send mail
			$this->data['user_mail_psw'] = $this->post('new_psw');

            $content = array();
            $content['header_color'] = 'white';
            $content['to'] = $this->data['user_mail'];
            $content['from'] = "support@v-logic.com.ng";
            $content['subject'] = 'Welcome to Vlogic Air Shipping, '.$this->data['user_full_name'];
            $content['logo'] =  BASE_URL.'assets/vlogic/assets/images/logo.png';
            
            $vlink = BASE_URL;
            $content['body'] = '<p style="font-size:1.5em">Hello, '.ucfirst($this->data['user_full_name']).'</p>';
            $content['body'] .= '<p>Welcome to '.ucfirst(SITENAME).'</p>';
            $content['body'] .= '<p>We are glad to have you on board and can\'t wait for you to start working with us.</p>';
            $content['body'] .= '<p>To proceed kindly sign in with the following details:</p>';
            $content['body'] .= '<p><b>Email Address:</b> '.$this->data['user_mail'].'</p>';
            $content['body'] .= '<p><b>Password:</b> '.$this->data['user_mail_psw'].'</p>';
            $content['body'] .= '<p style="margin-top:30px">
                                    <a href="'.$vlink.'" target="_BLANK" style="padding:20px;color:white;font-size:1.2em;background-color:#7ac043;text-decoration:none;border-radius:5px;border:0">Signin</a>
                                </p>';
            
            $content['footer'] = NULL;
                
            fh_mail($content);

			htmlFeed('success', 'User created');

			redir('dashboard/create_user');



		}
		catch(Exception $e){
			htmlFeed('warning', $e->getMessage());
			redir('dashboard/create_user');
		}
	}

}
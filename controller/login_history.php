<?php 

class login_history extends fh_ctrl{
	protected $user_history;
	protected $user_email;

	public function index(){
		global $data;

		$data['title'] = $this->title('vlogic Air Shipping');

		// model
		$this->user_history= inst("vlogic_air_loginhistory","model");
		$this->user_email = call_sess(USER_SESSION, 'email');

		// get user login
		$param['where'] = NULL;
        $param['order'] = 'ORDER BY id DESC';
        $param['items'] = 100;
		$data['history'] = $this->user_history->pageRow($param);

		// count success
		$where = array("user_mail" => $this->user_email, "user_message" => 'Success');
		$data['success'] = $this->user_history->countRows($where);
		// count failed
		$where = array("user_mail" => $this->user_email, "user_message" => 'Incorrect password');
		$data['failed'] = $this->user_history->countRows($where);
		// count suspended
		$where = array("user_mail" => $this->user_email, "user_message" => 'Suspended');
		$data['suspended'] = $this->user_history->countRows($where);

	}


	function page(){}
}
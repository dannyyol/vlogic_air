<?php

class dashboard extends fh_ctrl{
	protected $user_email;
	protected $signout;
	protected $v_fetch_files;
	protected $file_no;
	protected $file_remark;


	public function index(){
		global $data;

		$data['title'] = $this->title("vLogic Air Shipping");
		$this->user_email= call_sess(USER_SESSION, 'email');

		// model
		$this->signout= inst("vlogic_air_users","model");
		$this->v_fetch_files = inst("vlogic_air_files","model");

		// get uncompleted air jobs
		$data['i'] = 1;
		$param['where'] = array(
                                "v_complete" => 0
                            );
        $param['append'] = "job_type != 'Consolidation - sea' AND job_type != 'Sea freight'";
        $param['items'] = 100;
		$data['pending_jobs'] = $this->v_fetch_files->pageRow($param);









		// count files
		$where = NULL;
		$data['total_files'] = $this->v_fetch_files->countRows($where);
		// count incomplete file
		$where = array("v_complete" => 0);
		$data['incomplete'] = $this->v_fetch_files->countRows($where);
		// count complete file
		$where = array("v_complete" => 1);
		$data['complete'] = $this->v_fetch_files->countRows($where);
		// count mawbstat
		$where = array("v_mawbcom" => 0);
		$data['mawb'] = $this->v_fetch_files->countRows($where);
	}


	public function update_remark(){
		global $data;

		if (isset(getval()[2])) {
			$this->file_no = getval()[2];
		}
		if (isset(getval()[3])) {
			$this->file_remark = getval()[3];
		}


		$this->data['v_remarks'] = urldecode($this->file_remark);

		try{

			$where = array("v_job_no" => $this->file_no
						);

			//update status
			if(!$this->v_fetch_files->updateRow($this->data,$where)){
					throw new Exception("Unable to update remark");
					
				}

			htmlFeed('success', 'File '.$this->file_no.' remark updated successfully');
			redir('dashboard');

		}
		catch(Exception $e){
			htmlFeed('warning', $e->getMessage());
			redir('dashboard');

		}

		unset($this->data['v_remark']);
	}


	function signout(){

		$this->data['user_status'] = 'Offline';

		try{
			$where = array("user_mail" => $this->user_email

						);

			//update status
			if(!$this->signout->updateRow($this->data,$where)){
					throw new Exception("Unable to signout");
					
				}


			// unset session
			$this->remove_sess(USER_SESSION);
			// output signout message
			// htmlFeed("success","Signout successful, we hope to see you soon");
			// redirect
			redir();

		}
		catch(Exception $e){
			htmlFeed('warning', $e->getMessage());
			redir('dashboard');
		}
		
	}

	function page(){}

}
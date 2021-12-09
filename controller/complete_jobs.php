<?php
class Complete_jobs extends fh_ctrl{
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
		$param['where'] = array("v_complete" => 1);
        $param['items'] = 100;
		$data['complete_jobs'] = $this->v_fetch_files->pageRow($param);
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

			$where = array(
                        "v_job_no" => $this->file_no
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
			redir('complete_jobs');

		}

		unset($this->data['v_remark']);
	}
    
	function page(){}

}
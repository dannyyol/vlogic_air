<?php

class clearing_payments extends fh_ctrl{
	protected $month;
	protected $months;
	protected $get_month;

	public function index(){
		global $data;

		$data['title'] = $this->title("vLogic Air Shipping");
		// model
		$this->get_month= inst("vlogic_air_files","model");

		$this->months = ['january','february','march','april','may','june','july','august','september','october','november','december'];

		// if(count(getval()) < 1 || count(getval()) > 1){
		// 	$data['error404'] = TRUE;
		// }

		$data['i']=1;

		// get uncompleted air jobs
		$param['where'] = $where = array("v_mawbstat" => NULL);
		$data['clearing'] = $this->get_month->pageRow($param);

		// get uncompleted air jobs
		$param['where'] = array("v_mawbcom" => 0);
		$data['cleared'] = $this->get_month->pageRow($param);

		// count files
		$where = NULL;
		$data['total'] = $this->get_month->countRows($where);
		// count incomplete file
		$where = array("v_mawbcom" => 0);
		$data['incomplete'] = $this->get_month->countRows($where);
		// count complete file
		$where = array("v_mawbcom" => 1);
		$data['complete'] = $this->get_month->countRows($where);
	}


	public function update_mawb(){
		global $data;

		$this->data['v_job_no'] = $this->post('v_job_no');
		$this->data['v_mawbto'] = $this->post('mawb_to');
		$this->data['v_mawbamt'] = $this->post('mawb_amt');
		$this->data['v_mawbcom']= $this->post('mawb_com') == 'on' ? 1 : 0;

		try{

			$where = array("v_job_no" => $this->data['v_job_no']
						);

			//update status
			if(!$this->get_month->updateRow($this->data,$where)){
					throw new Exception("Unable to clearing payment for".$this->data['v_job_no']);
					
			}



			htmlFeed('success', 'Clearing payment updated successfully');
			redir('dashboard/clearing_payments');

		}
		catch(Exception $e){
			htmlFeed('warning', $e->getMessage());
			redir('dashboard/clearing_payments');

		}
	}

	public function month(){

		
	}

	function page(){}

}
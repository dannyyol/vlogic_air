<?php

class file extends fh_ctrl{
	protected $month,
                $year,
	           $months,
	           $get_month;

	public function index(){
		global $data;

		$data['title'] = $this->title("vLogic Air Shipping");
		// model
		$this->get_month= inst("vlogic_air_files","model");

		$this->months = ['january','february','march','april','may','june','july','august','september','october','november','december'];

		if (isset(getval()[2]) && isset(getval()[3])) {
			$this->month = getval()[2];
			$this->year = getval()[3];
		}

		$data['month_file'] = $this->month;

		$data['i']=1;
    

		// get uncompleted air jobs
		$param['where'] = array("v_month" => $this->month,"v_year" => $this->year);
        if(isset(getval()[4])){
            $param['where']['job_type'] = simple_decrypt(getval()[4]);
        }
        $param['items'] = 100;
		$data['pending_jobs'] = $this->get_month->pageRow($param);
        
        // get sum of profits
        $param_p['col'] = 'SUM(v_profit)';
        $param_p['where'] = $param['where'];
        $data['profit_sum'] = $this->get_month->getRow($param_p);

		// count files
		$where = array("v_month" => $this->month,"v_year" => $this->year);
        if(isset(getval()[4])){
            $where['job_type'] = simple_decrypt(getval()[4]);
        }
		$data['total_files'] = $this->get_month->countRows($where);
		// count incomplete file
		$where = array("v_month" => $this->month, "v_year" => $this->year, "v_complete" => 0);
        if(isset(getval()[4])){
            $where['job_type'] = simple_decrypt(getval()[4]);
        }
		$data['incomplete'] = $this->get_month->countRows($where);
		// count complete file
		$where = array("v_month" => $this->month, "v_year" => $this->year, "v_complete" => 1);
        if(isset(getval()[4])){
            $where['job_type'] = simple_decrypt(getval()[4]);
        }
		$data['complete'] = $this->get_month->countRows($where);
		// count mawbstat
		// $where = array("v_mawbstat" => NULL);
		// $data['mawb'] = $this->get_month->countRows($where);
	}


	public function month(){

		
	}
    
    function sea(){
        global $data;
        
        $param['where'] = array(
                                "v_complete" => 0,
                                "or= job_type" => 'Consolidation - sea',
                                "job_type" => 'Sea freight'
                            );
        
        $param['items'] = 100;
		$data['pending_jobs'] = $this->get_month->pageRow($param);
        
        // get sum of profits
        $param_p['col'] = 'SUM(v_profit)';
        $param_p['where'] = $param['where'];
        $data['profit_sum'] = $this->get_month->getRow($param_p);

		// count files
		$where = array(
                        "or= job_type" => 'Consolidation - sea',
                        "job_type" => 'Sea freight'
                    );
		$data['total_files'] = $this->get_month->countRows($where);
        
		// count incomplete file
		$where = array(
                        "v_complete" => 0,
                        "or= job_type" => 'Consolidation - sea',
                        "job_type" => 'Sea freight'
                    );
        
		$data['incomplete'] = $this->get_month->countRows($where);
        
		// count complete file
		$where = array(
                        "v_complete" => 1,
                        "or= job_type" => 'Consolidation - sea',
                        "job_type" => 'Sea freight'
                    );
		$data['complete'] = $this->get_month->countRows($where);
    }

	function page(){}

}
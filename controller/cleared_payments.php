<?php
class Cleared_payments extends fh_ctrl{
    protected $vlogic_files,
                    $months,
                $get_month;
    
    function index(){
        global $data;
        
        $data['title'] = $this->title('Cleared payments');
    
        // model
		$this->get_month= inst("vlogic_air_files","model");

		$this->months = ['january','february','march','april','may','june','july','august','september','october','november','december'];
        
        // vlogic_air_files model
        $this->vlogic_files = inst('vlogic_air_files','model');
        
        $param['where'] = array('v_mawbcom' => 1);
        $data['cleared'] = $this->vlogic_files->pageRow($param);
        
        $data['i']=1;
        
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
}
<?php
class Search extends fh_ctrl{
    protected $files;
    
    function index(){
        global $data;
        
        $data['title'] = $this->title('V-logic Air');
        
        $this->files = inst("vlogic_air_files","model");
    }
    
    function query(){
        global $data;
        
        // $this->data['v_job_no'] = $this->get('q');
        // $this->data['v_client'] = $this->get('q');
        // $this->data['v_commodity'] = $this->get('q');
        // print $this->get('q');
        
        // $param['where'] = $this->data;
        $param['column_append'] = "v_job_no LIKE '%".$this->get('q')."%' OR v_client LIKE '%".$this->get('q')."%' OR v_commodity LIKE '%".$this->get('q')."%' ";
        $data['jobs'] = $this->files->getRows($param);
    }
}
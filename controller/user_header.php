<?php
class User_header extends fh_ctrl{
    protected $files;
    
    function index(){
        global $data;
        
        if(empty(call_sess(USER_SESSION))){
            // redirect to signin page
            redir();
        }
        
        $this->files = inst('vlogic_air_files','model');
        
        // get years available in files
        $param['col'] = 'DISTINCT v_year';
        $data['years'] = $this->files->getRows($param);
        
        // send months to an array
        $data['months'] = array(
                            'january',
                            'february',
                            'march',
                            'april',
                            'may',
                            'june',
                            'july',
                            'august',
                            'september',
                            'october',
                            'november',
                            'december'
                        );
    }
}
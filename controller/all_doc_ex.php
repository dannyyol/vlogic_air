<?php
class All_doc_ex extends fh_ctrl{
    protected $doc_ex;
    
    function index(){
        global $data;
        
        $data['title'] = $this->title('All Document Exchange');
        
        // doc_ex model
        $this->doc_ex = inst('db_doc_ex','model');
        
        // get all document exchange
        $param['items'] = 100;
        $data['doc_exs'] = $this->doc_ex->pageRow($param);
    }
    
    function page(){}
}
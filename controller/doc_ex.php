<?php
class Doc_ex extends fh_ctrl{
    protected $doc_ex;
    
    function index(){
        global $data;
        
        $data['title'] = $this->title('New Document Exchange');
        
        // doc_ex model
        $this->doc_ex = inst('db_doc_ex','model');
        
        // define perserved vars
        $data['job_no'] = $this->post('job_no') !== FALSE ? $this->post('job_no') : NULL;
        $data['b_l'] = $this->post('b_l') !== FALSE ? $this->post('b_l') : NULL;
        $data['invoice_no'] = $this->post('invoice_no') !== FALSE ? $this->post('invoice_no') : NULL;
        $data['payment_mode'] = $this->post('payment_mode') !== FALSE ? $this->post('payment_mode') : NULL;
        
        if($this->post('doc_ex_btn') !== FALSE){
            $this->data['de_job_no'] = $this->post('job_no');
            $this->data['de_b_l'] = $this->post('b_l');
            $this->data['de_invoice_no'] = $this->post('invoice_no');
            $this->data['de_payment_mode'] = $this->post('payment_mode');
            $this->data['de_date_added'] = now();
            
            try{
                $this->check_fields($this->data);
                
                // store new document exchange
                if(!$this->doc_ex->storeRow($this->data)){
                    throw new Exception('Unable to store new document exchange');
                }
                
                // output response
                htmlFeed('success','New Document Exchange Created');
                // redirect
                redir('dashboard/doc_ex');
            }
            catch(Exception $e){
                htmlFeed('warning',$e->getMessage());
            }
        }
    }
}
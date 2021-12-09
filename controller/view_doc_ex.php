<?php
class View_doc_ex extends fh_ctrl{
    protected $doc_ex,
                $doc_ex_id,
                $form_helpers;
    
    function index(){
        global $data;
        
        $data['title'] = $this->title('View Document Exchange');
        
        // form helper
        $this->form_helpers = inst('form_helpers','helper');
        
        // doc_ex model
        $this->doc_ex = inst('db_doc_ex','model');
        
        // validate document exchange id
        if(count(getval()) > 2){
            $this->doc_ex_id = getval()[2];
            
            // check if document exchange exist
            $where = array('doc_ex_id' => $this->doc_ex_id);
            if(!$this->doc_ex->checkTable($where)){
                $data['error404'] = TRUE;
            }
        }
        else{
            $data['error404'] = TRUE;
        }
    }
    
    private function getDocData(){
        $param['where'] = array('doc_ex_id' => $this->doc_ex_id);
        return $this->doc_ex->getRow($param);
    }
    
    function doc_ex(){
        global $data;
        
        // get document exchange data
        $data['doc_ex'] = $this->getDocData();
    }
    
    function edit(){
        global $data;
        
        $data['doc_ex'] = $this->getDocData();
        
        $this->data['de_job_no'] = $this->post('job_no');
        $this->data['de_b_l'] = $this->post('b_l');
        $this->data['de_invoice_no'] = $this->post('invoice_no');
        $this->data['de_payment_mode'] = $this->post('payment_mode');
        
        try{
            // check fields
            $this->check_fields($this->data);
            
            // upload file
            $doc_ex_file = $this->form_helpers->file_upload(
                                                        "doc_ex_file",
                                                        "png,jpg,jpeg,JPEG,PNG,JPG,pdf,docx",
                                                        FALSE,
                                                        12
                        );
            if($doc_ex_file !== FALSE){
                // check for user default image
                if(!empty($this->getDocData()['de_documents'])){
                    // replace user profile image on server
                    unlink('uploads/doc_ex_files/'.$this->getDocData()['de_documents']);
                }
                
                // rename file
                $doc_ex_file_renamed = now(FALSE).'.'.$doc_ex_file['ext'];
                // add profile image new name to database data
                $this->data['de_documents'] = $doc_ex_file_renamed;
                
                // move files to server
                move_files($doc_ex_file['tmp_name'],'uploads/doc_ex_files/'.$doc_ex_file_renamed);
            }
            
            // update table
            if(!$this->doc_ex->updateRow($this->data,array('doc_ex_id' => $this->doc_ex_id))){
                throw new Exception('Unable to upload document exchange');
            }
            
            // output response
            htmlFeed('success','Document Exchange Updated');
            // redirect
            redir('dashboard/view_doc_ex/doc_ex/'.$this->doc_ex_id);
        }
        catch(Exception $e){
            htmlFeed('warning',$e->getMessage());
        }
    }
    
    function delete_doc(){
        global $data;
        
        $data['doc_ex'] = $this->getDocData();
        
        $old_file = $this->getDocData()['de_documents'];
        
        try{
            if(!$this->doc_ex->removeRow(array('doc_ex_id' => $this->doc_ex_id))){
                throw new Exception('Unable to remove document exchange');
            }
            
            // unlink document on server
            unlink('uploads/doc_ex_files/'.$old_file);
            
            // output response
            htmlFeed('success','Document Exchange Job has been removed');
            // redirect
            redir('dashboard/all_doc_ex');
        }
        catch(Exception $e){
            htmlFeed('warning',$e->getMessage());
        }
    }
}
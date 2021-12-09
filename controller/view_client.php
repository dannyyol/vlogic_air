<?php
class View_client extends fh_ctrl{
    protected $client,
                $client_id;
    
    function index(){
        global $data;
        
        $data['title'] = $this->title('View Document Exchange');
        
        // client model
        $this->client = inst('client','model');
        
        // validate client_id
        if(count(getval()) > 2){
            $this->client_id = getval()[2];
            
            // check if client exist
            $where = array('client_short_name' => $this->client_id);
            if(!$this->client->checkTable($where)){
                $data['error404'] = TRUE;
            }
        }
        else{
            $data['error404'] = TRUE;
        }
    }
    
    private function getClientData(){
        $param['where'] = array('client_short_name' => $this->client_id);
        return $this->client->getRow($param);
    }
    
    function client(){
        global $data;
        
        // get client data
        $data['client'] = $this->getClientData();
    }
    
    function edit(){
        global $data;
        
        $data['client'] = $this->getClientData();
        
        $this->data['client_short_name'] = strtoupper($this->post('client_short_name'));
        $this->data['client_full_name'] = $this->post('client_full_name');
        $this->data['client_address'] = $this->post('address');
        $this->data['con_full_name'] = $this->post('con_full_name');
        $this->data['con_email'] = $this->post('con_email');
        $this->data['con_tel'] = $this->post('con_tel');
        
        try{
            // check fields
            $this->check_fields($this->data);
            
            // check if there is a client with the typed short name
            if($this->client->checkTable(array('client_short_name' => $this->data['client_short_name']),"client_short_name != '".$this->client_id."'")){
                throw new Exception('Kindly use another short name, there is already a client with the prefered short name - '.$this->data['client_short_name']);
            }
            
            // update table
            if(!$this->client->updateRow($this->data,array('client_short_name' => $this->client_id))){
                throw new Exception('Unable to update client information');
            }
            
            // output response
            htmlFeed('success','Client information updated');
            // redirect
            redir('dashboard/view_client/client/'.$this->data['client_short_name']);
        }
        catch(Exception $e){
            htmlFeed('warning',$e->getMessage());
        }
    }
    
    function delete_client(){
        global $data;
        
        $data['client'] = $this->getClientData();
        
        try{
            if(!$this->client->removeRow(array('client_short_name' => $this->client_id))){
                throw new Exception('Unable to remove client');
            }
            
            // output response
            htmlFeed('success','Client has been removed');
            // redirect
            redir('dashboard/all_clients');
        }
        catch(Exception $e){
            htmlFeed('warning',$e->getMessage());
        }
    }
}
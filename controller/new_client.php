<?php
class New_client extends fh_ctrl{
    protected $client;
    
    function index(){
        global $data;
        
        $data['title'] = $this->title('New Client');
        
        // client model
        $this->client = inst('client','model');
        
        // define perserved vars
        $data['short_name'] = $this->post('client_short_name') !== FALSE ? $this->post('client_short_name') : NULL;
        $data['client_full_name'] = $this->post('client_full_name') !== FALSE ? $this->post('client_full_name') : NULL;
        $data['address'] = $this->post('address') !== FALSE ? $this->post('address') : NULL;
        $data['con_full_name'] = $this->post('con_full_name') !== FALSE ? $this->post('con_full_name') : NULL;
        $data['con_email'] = $this->post('con_email') !== FALSE ? $this->post('con_email') : NULL;
        $data['con_tel'] = $this->post('con_tel') !== FALSE ? $this->post('con_tel') : NULL;
        
        if($this->post('client_btn') !== FALSE){
            $this->data['client_short_name'] = strtoupper($this->post('client_short_name'));
            $this->data['client_full_name'] = $this->post('client_full_name');
            $this->data['client_address'] = $this->post('address');
            $this->data['con_full_name'] = $this->post('con_full_name');
            $this->data['con_email'] = $this->post('con_email');
            $this->data['con_tel'] = $this->post('con_tel');
            $this->data['client_date_added'] = now();
            
            try{
                $this->check_fields($this->data);
                
                // check if email is valid
                $this->check_email($this->data['con_email']);
                
                // check if there is a client with the typed short name
                if($this->client->checkTable(array('client_short_name' => $this->data['client_short_name']))){
                    throw new Exception('Kindly use another short name, there is already a client with the prefered short name - '.$this->data['client_short_name']);
                }
                
                // store new document exchange
                if(!$this->client->storeRow($this->data)){
                    throw new Exception('Unable to create new client information');
                }
                
                // output response
                htmlFeed('success','New Client Information Created');
                // redirect
                redir('dashboard/new_client');
            }
            catch(Exception $e){
                htmlFeed('warning',$e->getMessage());
            }
        }
    }
}
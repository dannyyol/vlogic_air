<?php
class Api extends fh_ctrl{
    protected $client;
    
    function index(){
        // client model
        $this->client = inst('client','model');
    }
    
    function new_client(){
        $this->data['client_short_name'] = strtoupper($this->post('client_short_name'));
        $this->data['client_full_name'] = $this->post('client_full_name');

        try{
            $this->check_fields($this->data);

            // check if there is a client with the typed short name
            if($this->client->checkTable(array('client_short_name' => $this->data['client_short_name']))){
                throw new Exception('Kindly use another short name, there is already a client with the prefered short name - '.$this->data['client_short_name']);
            }

            // store new document exchange
            if(!$this->client->storeRow($this->data)){
                throw new Exception('Unable to create new client information');
            }

            // output response
            print json_encode(
                    array(
                        'error' => 0,
                        'msg' => 'New Client Information Created',
                        'client_name' => ucfirst($this->data['client_full_name']),
                        'client_short_name' => $this->data['client_short_name']
                    )  
            );
        }
        catch(Exception $e){
            print json_encode(
                    array(
                        'error' => 1,
                        'msg' => $e->getMessage()
                    )  
            );
        }
        
        $this->ajax();
    }
}
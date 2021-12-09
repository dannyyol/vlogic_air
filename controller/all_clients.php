<?php
class All_clients extends fh_ctrl{
    protected $client;
    
    function index(){
        global $data;
        
        $data['title'] = $this->title('All Client');
        
        // client model
        $this->client = inst('client','model');
        
        // get all clients
        $param['items'] = 100;
        $data['clients'] = $this->client->pageRow($param);
    }
    
    function page(){}
}
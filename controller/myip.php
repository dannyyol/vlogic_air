<?php
class Myip extends fh_ctrl{
    function index(){
        global $data;
        
        $data['title'] = $this->title('My IP');
        $data['ip'] = $_SERVER['REMOTE_ADDR'];
    }
}
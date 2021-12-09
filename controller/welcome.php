<?php
class welcome extends fh_ctrl{
	protected $v_users;
    protected $history;
    
    public function index(){
        global $data;

        $data['title'] = $this->title("vLogic Air Shipping");

        // model
        $this->v_users = inst("vlogic_air_users","model");
        $this->user_history= inst("vlogic_air_loginhistory","model");

        // check active user session
        if(!empty(call_sess(USER_SESSION))){
            // redirect
            redir("dashboard");
        }
        
        // preserved vars
        $data['email'] = $this->post('user_mail') !== FALSE ? $this->post('user_mail') : NULL;
    }



    // Signin 
    public function signin(){

    	// Get form input
    	$this->data['user_mail']=$this->post('user_mail');
    	$this->data['user_psw']=sha1($this->post('user_psw'));
        $this->history['user_mail'] = $this->post('user_mail');
        $this->history['user_message'] = 'Incorrect password';
        $this->history['user_date'] = now();


        // Function to get the client IP address
          function get_client_ip() {
              $ipaddress = '';
              if (getenv('HTTP_CLIENT_IP'))
                  $ipaddress = getenv('HTTP_CLIENT_IP');
              else if(getenv('HTTP_X_FORWARDED_FOR'))
                  $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
              else if(getenv('HTTP_X_FORWARDED'))
                  $ipaddress = getenv('HTTP_X_FORWARDED');
              else if(getenv('HTTP_FORWARDED_FOR'))
                  $ipaddress = getenv('HTTP_FORWARDED_FOR');
              else if(getenv('HTTP_FORWARDED'))
                 $ipaddress = getenv('HTTP_FORWARDED');
              else if(getenv('REMOTE_ADDR'))
                  $ipaddress = getenv('REMOTE_ADDR');
              else
                  $ipaddress = 'UNKNOWN';
              return $ipaddress;
          }

          $this->history['user_ip'] = get_client_ip();

          // Device
          function isMobileDevice() {
              return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
          }

          $this->history['user_device'] = isMobileDevice();

          // Browser
          function get_the_browser(){
            if(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)
               return 'Internet explorer';
             elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Trident') !== false)
                return 'Internet explorer';
             elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox') !== false)
               return 'Mozilla Firefox';
             elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') !== false)
               return 'Google Chrome';
             elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== false)
               return "Opera Mini";
             elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Opera') !== false)
               return "Opera";
             elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Safari') !== false)
               return "Safari";
             else
               return 'Other';
            }

            $this->history['user_browser'] = get_the_browser();

            // Location
            $PublicIP = get_client_ip(); 
            $json  = file_get_contents("http://api.ipstack.com/$PublicIP?access_key=d542bec551c7d70de86905cbec08262c");
            $json  =  json_decode($json ,true);
            $country =  $json['country_name'];
            $region= $json['region_name'];
            $city = $json['city'];
            $this->history['user_location'] = $region.' '.$country.' '.$city;

            //Device
            $devicesTypes = array(
                "computer" => array("msie 10", "msie 9", "msie 8", "windows.*firefox", "windows.*chrome", "x11.*chrome", "x11.*firefox", "macintosh.*chrome", "macintosh.*firefox", "opera"),
                "tablet"   => array("tablet", "android", "ipad", "tablet.*firefox"),
                "mobile"   => array("mobile ", "android.*mobile", "iphone", "ipod", "opera mobi", "opera mini"),
                "bot"      => array("googlebot", "mediapartners-google", "adsbot-google", "duckduckbot", "msnbot", "bingbot", "ask", "facebook", "yahoo", "addthis")
            );
            function detectDevice(){
          $userAgent = $_SERVER["HTTP_USER_AGENT"];
          $devicesTypes = array(
                "computer" => array("msie 10", "msie 9", "msie 8", "windows.*firefox", "windows.*chrome", "x11.*chrome", "x11.*firefox", "macintosh.*chrome", "macintosh.*firefox", "opera"),
                "tablet"   => array("tablet", "android", "ipad", "tablet.*firefox"),
                "mobile"   => array("mobile ", "android.*mobile", "iphone", "ipod", "opera mobi", "opera mini"),
                "bot"      => array("googlebot", "mediapartners-google", "adsbot-google", "duckduckbot", "msnbot", "bingbot", "ask", "facebook", "yahoo", "addthis")
            );
          foreach($devicesTypes as $deviceType => $devices) {           
                foreach($devices as $device) {
                    if(preg_match("/" . $device . "/i", $userAgent)) {
                        $deviceName = $deviceType;
                    }
                }
            }
            return ucfirst($deviceName);
          }
            
            $this->history['user_device'] = detectDevice();




    	// Auth
    	try{
    		$this->check_fields($this->data);
    		$this->check_email($this->data['user_mail']);
    		$param['where']=$this->data;

    		$user_row = $this->v_users->getRow($param);

    		if(empty($user_row)){
                $where = array('user_mail' => $this->data['user_mail']);
                if($this->v_users->checkTable($where)) {
                    $this->user_history->storeRow($this->history);
                    throw new Exception("Incorrect password");
                }else{
    			throw new Exception("User not found");
                }
    		}

            // check if user ip is valid
            if(!empty($user_row['ip_address'])){
                if(strpos($user_row['ip_address'],',') !== FALSE){
                    $ips = explode(',',$user_row['ip_address']);
                    
                    if(!in_array($this->history['user_ip'],$ips)){
                        throw new Exception("Invalid I.P Address");
                    }
                }
                else{
                    if($user_row['ip_address'] != $this->history['user_ip']){
                        throw new Exception("Invalid I.P Address");
                    }
                }
            }
            
            
            if($user_row['user_status']=='Suspended'){
              $this->history['user_message'] = 'Suspended';
              $where = array('user_mail' => $this->data['user_mail']);
                if($this->v_users->checkTable($where)) {
                    $this->user_history->storeRow($this->history);
                }
                throw new Exception("Suspended, report to your admin.");
            }
            

            if($this->v_users->updateRow(array('user_status' => 'Online'),array("user_mail" => $this->data['user_mail']))){
            $role = 1;
            $user_id = $user_row['id'];
            $name = $user_row['user_full_name'];
            $email = $user_row['user_mail'];
            $user_role = $user_row['user_role'];
            $user_since = $user_row['user_since'];
            $user_avater = $user_row['user_avater'];
            $this->history['user_message'] = 'Success';


            $where = array('user_mail' => $this->data['user_mail']);
                if($this->v_users->checkTable($where)) {
                    $this->user_history->storeRow($this->history);
                }

            // staff 1
            if ($user_role=="Staff 1") {
              $manage = '';
              $showText = 'Cost';
              $cost = '';
              $selling = 'style="display: none;"';
              $showBtn = '<button type="submit" name="v_pay" class="btn btn-sm btn-primary waves-effect waves-light f-right">
                            <i class="icofont icofont-edit"></i> Save</button>';
              $job_profit ='style="display: none;"';
            }

            // staff 2
            if ($user_role=="Staff 2") {
              $manage = '';
              $showText = 'Selling';
              $cost = 'style="display: none;"';
              $selling = '';
              $showBtn = '<button type="submit" name="v_pay" class="btn btn-sm btn-primary waves-effect waves-light f-right">
                            <i class="icofont icofont-edit"></i> Save</button>';
              $job_profit ='style="display: none;"';
            }

            // admin
            if ($user_role=="Admin") {
              $manage = '<li class="pcoded-hasmenu">
                     <a href="javascript:void(0)">
                         <span class="pcoded-micon text-white"><i class="text-white feather icon-users"></i></span>
                         <span class="pcoded-mtext text-white">Manage Accounts</span>
                     </a>
                     <ul class="pcoded-submenu">
                         <li class="">
                             <a href="'.BASE_URL.'dashboard/create_user">
                                 <span class="pcoded-mtext text-white">Create User</span>
                             </a>
                         </li>
                         <li class="">
                             <a href="'.BASE_URL.'dashboard/view_users">
                                 <span class="pcoded-mtext text-white">View Users</span>
                             </a>
                         </li>
                         <li class="">
                             <a href="'.BASE_URL.'dashboard/login_history">
                                 <span class="pcoded-mtext text-white">Login History</span>
                             </a>
                         </li>
                     </ul>
                 </li>';
              $showText = 'Cost / Selling';
              $cost = 'style="display: block;"';
              $selling = 'style="display: block;"';
              $showBtn = '<button type="submit" name="v_pay" class="btn btn-sm btn-primary waves-effect waves-light f-right">
                            <i class="icofont icofont-edit"></i> Save</button>';
              $job_profit ='style="display: block;"';
            }

            // manager
            if ($user_role=="Manager") {
              $manage = '';
              $showText = 'Cost / Selling';
              $cost = '';
              $selling = '';
              $showBtn = '';
              $job_profit='';
            }

            // create user session
            $this->sess(USER_SESSION,$this->createUser_graph("$role,$user_id,$name,$email,$user_role,$user_since,$user_avater,$manage,$showText,$cost,$selling,$showBtn,$job_profit"));

            // redirect
            redir("dashboard");
            }
    		

    	}
    	catch(Exception $e){
    		htmlFeed('warning', $e->getMessage());
    	}
    }


}

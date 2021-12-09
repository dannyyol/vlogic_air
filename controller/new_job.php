<?php

class new_job extends fh_ctrl{
	protected $new_file;
	protected $new_upload;
	protected $new_upload_model,
                $client;

	public function index(){
		global $data;

		$data['title'] = $this->title('vLogic Air Shipping');

		// model
		$this->new_file= inst("vlogic_air_files","model");

		// helper
		$this->new_upload = inst("form_helpers","helper");
		$this->new_upload_model = inst("vlogic_air_docs","model");
        
        // client model
        $this->client = inst('client','model');
        
        // load clients
        $data['clients'] = $this->client->getRows();
	}


	public function process(){

		if (isset($_POST['v_jobnew'])) {
			# code...
		
			// get form data
			$this->data['v_job_no']=$this->post('v_job_no');

			try{
				// auth
				$v_job_no = str_replace('vln',NULL,$this->data['v_job_no']);
		        $v_job_no = str_replace('VLN',NULL,$this->data['v_job_no']);
		        $v_job_no = str_replace('-',NULL,$v_job_no);
		        $v_job_no = str_replace(' ',NULL,$v_job_no);
		        $lent = str_split($v_job_no);
		        $month = $lent[2].$lent[3];
		        $year = $lent[2].$lent[3];
                
                $cur_year_suf = str_split(date('Y'));
                $cur_year_suf = $cur_year_suf[0].$cur_year_suf[1];
                
                $this->data['v_year'] = $cur_year_suf.$lent[0].$lent[1];

		        if ($month=='01') {
		        	$this->data['v_month'] = "January";
		        }elseif ($month=='02') {
		        	$this->data['v_month'] = "February";
		        }elseif ($month=='03') {
		        	$this->data['v_month'] = "March";
		        }elseif ($month=='04') {
		        	$this->data['v_month'] = "April";
		        }elseif ($month=='05') {
		        	$this->data['v_month'] = "May";
		        }elseif ($month=='06') {
		        	$this->data['v_month'] = "June";
		        }elseif ($month=='07') {
		        	$this->data['v_month'] = "July";
		        }elseif ($month=='08') {
		        	$this->data['v_month'] = "August";
		        }elseif ($month=='09') {
		        	$this->data['v_month'] = "September";
		        }elseif ($month=='10') {
		        	$this->data['v_month'] = "October";
		        }elseif ($month=='11') {
		        	$this->data['v_month'] = "November";
		        }elseif ($month=='12') {
		        	$this->data['v_month'] = "December";
		        }else{
		        	// throw error
		           throw new Exception("Invalid VLN number, can not detect month in job number");
		        }

		        // auth
				$this->check_fields($this->data);
                
                $this->data['v_mawb']=$this->post('v_mawb');
                $this->data['v_by']=call_sess(USER_SESSION, 'email');
                $this->data['job_type']= ucfirst($this->post('job_type'));
                $this->data['v_qty']=$this->post('v_qty');
                $this->data['v_date']=$this->post('v_date');
                $this->data['v_eta']=$this->post('v_eta');
                $this->data['v_delay']=$this->post('v_delay');
                $this->data['v_eta']=$this->post('v_eta');
                $this->data['v_client']=$this->post('v_client');
                $this->data['v_commodity']=$this->post('v_commodity');
                $this->data['v_cne']=$this->post('v_cne');
                $this->data['v_gw']=$this->post('v_gw');
                $this->data['v_cw']=$this->post('v_cw');
                $this->data['v_al']=$this->post('v_al');
                $this->data['v_orig']=$this->post('v_orig');
                $this->data['v_agent']=$this->post('v_agent');
                $this->data['v_in']=$this->post('v_in');
                $this->data['v_remarks']=$this->post('v_remarks');



				// check if there is a hyphen is in the valid position of job no
		        $str_el_pos = str_split($this->data['v_job_no']);
		        if(strlen($this->data['v_job_no']) >= 12){
		          if($str_el_pos[7] == '-'){
		            // explode job
		            $v_job_num_ed = explode('-',$this->data['v_job_no']);
		            // get first element of job
		            $job_f_el = $v_job_num_ed[0];
		            // get second element of job
		            $job_sec_el = $v_job_num_ed[1];
		            // check if vln is present in first element of array
		            if(strpos($job_f_el,'VLN') !== FALSE){
		              // check four digits in the first element
		              $job_f_el_digits = str_replace('VLN',NULL,$job_f_el);
		              // check if four string is int
		              if(is_numeric($job_f_el_digits)){
		                // count string
		                if(strlen($job_f_el_digits) != 4){
		                  // throw error
		                   throw new Exception("Invalid VLN number");
		                }
		              }
		              else{
		                // throw error
		                 throw new Exception("Invalid VLN number");
		              }
		            }
		            else{
		              // throw error
		             throw new Exception("Invalid VLN number");
		            }
		          }
		          else{
		            // throw error
		             throw new Exception("Invalid VLN number");
		          }
		        }
		        else{
		          // throw error
		           throw new Exception("Invalid VLN number");
		        }
		        // validation end

		        
				// check if file exist
				if($this->new_file->checkTable(array("v_job_no" => $this->data['v_job_no']))){
					throw new Exception("file already exists");
				}

				// create file
				if (!$this->new_file->storeRow($this->data)) {
					# code...

					throw new Exception("Error creating file");
					
				}

				// on success
				htmlFeed('success', 'File created successfully');

				redir('dashboard/new_job');
			}
			catch(Exception $e){
				htmlFeed('warning', $e->getMessage());
				//redir('dashboard/new_job');
			}
		}
	}
}
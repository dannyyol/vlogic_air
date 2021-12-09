<?php

class view_job extends fh_ctrl{
	protected $get_fileno;
	protected $file_no;
	protected $get_role,
                $client;

	public function index(){
		global $data;

		$data['title'] = $this->title('vLogic Air Shipping');

		// model
		$this->get_fileno= inst("vlogic_air_files","model");
		// helper
		$this->new_upload = inst("form_helpers","helper");

		// model
		$this->new_upload_model = inst("vlogic_air_docs","model");
		$this->get_role = inst("vlogic_air_users","model");
        
        // client model
        $this->client = inst('client','model');
        
        // load clients
        $data['clients'] = $this->client->getRows();


		if(count(getval()) > 3 || count(getval()) < 3){
			$data['error404'] = TRUE;
		}

		if(getval()[1] = "update_transport"){
			$data['error404'] = FALSE;
		}

		if (isset(getval()[2])) {
			$this->file_no = getval()[2];
			$this->file_no = simple_decrypt($this->file_no);
		}


		$data['i']=1;

		// get uncompleted air jobs
		$param['where'] = $where = array("v_job_no" => $this->file_no);
		$data['docx'] = $this->new_upload_model->pageRow($param);
	}



	public function close(){
		global $data;
		if (isset(getval()[2])) {
			$this->file_no = getval()[2];
			$this->file_no = simple_decrypt($this->file_no);
			try{

			
			// close file
			$data = array("v_complete" => 1);
			$where = array("v_job_no" => $this->file_no);
			if(!$this->get_fileno->updateRow($data,$where)){
				throw new Exception('success', 'Error closing this file');
			}

			htmlFeed('success', 'File closed successfully');
			redir('dashboard/view_job/file/'.simple_encrypt($this->file_no));
			}
			catch(Exception $e){
				htmlFeed('warning', $e->getMessage());
				redir('dashboard/view_job/file/'.simple_encrypt($this->file_no));
			}
		}

		
	}


	public function file(){
		global $data;
        
		try{
			// check if file exist
			if(!$this->get_fileno->checkTable(array("v_job_no" => $this->file_no))){
				throw new Exception("File not found");
			}
			// fetch if file exist
				$param['where'] = array("v_job_no" => $this->file_no);

	    		$file_row = $this->get_fileno->getRow($param);
	    		$data['fetched_job_no'] = $file_row['v_job_no'];
	    		$data['v_commodity'] = $file_row['v_commodity'];
	    		$data['fetched_date'] = $file_row['v_date'];
	    		$data['fetched_eta'] = $file_row['v_eta'];
	    		$data['fetched_delay'] = $file_row['v_delay'];
	    		$data['fetched_client'] = $file_row['v_client'];
	    		$data['fetched_cne'] = $file_row['v_cne'];
	    		$data['fetched_orig'] = $file_row['v_orig'];
	    		$data['fetched_agent'] = $file_row['v_agent'];
	    		$data['fetched_mawb'] = $file_row['v_mawb'];
	    		$data['fetched_mawbstat'] = $file_row['v_mawbstat'];
	    		$data['fetched_qty'] = $file_row['v_qty'];
	    		$data['fetched_al'] = $file_row['v_al'];
	    		$data['fetched_gw'] = $file_row['v_gw'];
	    		$data['fetched_cw'] = $file_row['v_cw'];
				$data['fetched_in'] = $file_row['v_in'];
				$data['fetched_awarded'] = $file_row['v_awarded'];
				$data['fetched_underclearance'] = $file_row['v_underclearance'];
	    		$data['fetched_document'] = $file_row['v_document'];
	    		$data['fetched_cleared'] = $file_row['v_cleared'];
	    		$data['fetched_invoicebi'] = $file_row['v_invoicebi'];
	    		$data['fetched_delivered'] = $file_row['v_delivered'];
	    		$data['fetched_cclearance'] = $file_row['v_cclearance'];
	    		$data['fetched_cdutyhandling'] = $file_row['v_cdutyhandling'];
	    		$data['fetched_cdeliverycost'] = $file_row['v_cdeliverycost'];
	    		$data['fetched_cnafdac'] = $file_row['v_cnafdac'];
	    		$data['fetched_cother'] = $file_row['v_cother'];
	    		$data['fetched_cdoortodoor'] = $file_row['v_cdoortodoor'];
	    		$data['fetched_sdoortodoor'] = $file_row['v_sdoortodoor'];
	    		$data['fetched_sporttodoor'] = $file_row['v_sporttodoor'];
	    		$data['fetched_doc_h_fee'] = $file_row['doc_h_fee'];
	    		$data['fetched_smiscellenous'] = $file_row['v_smiscellenous'];
	    		$data['fetched_sdelivery'] = $file_row['v_sdelivery'];
	    		$data['fetched_sclearance'] = $file_row['v_sclearance'];
	    		$data['fetched_cost'] = $file_row['v_cost'];
	    		$data['fetched_selling'] = $file_row['v_selling'];
	    		$data['fetched_profit'] = $file_row['v_profit'];
				$data['fetched_complete'] = $file_row['v_complete'];
				$data['fetched_remark'] = $file_row['v_remarks'];
				$data['job_type'] = $file_row['job_type'];
		}
		catch(Exception $e){
			htmlFeed('warning', $e->getMessage());
			redir('dashboard');
		}

	}


	public function update_job(){
		global $data;


		// get data
		$this->data['v_date']=$this->post('v_date');
		$this->data['v_eta']=$this->post('v_eta');
		$this->data['v_delay']=$this->post('v_delay');
		$this->data['v_client']=$this->post('v_client');
		$this->data['v_commodity']=$this->post('v_commodity');
		$this->data['job_type']=ucfirst($this->post('job_type'));
		$this->data['v_cne']=$this->post('v_cne');
		$this->data['v_orig']=$this->post('v_orig');
		$this->data['v_agent']=$this->post('v_agent');
		$this->data['v_mawb']=$this->post('v_mawb');
		$this->data['v_mawbstat']=$this->post('v_mawbstat');
		$this->data['v_al']=$this->post('v_al');
		$this->data['v_gw']=$this->post('v_gw');
		$this->data['v_cw']=$this->post('v_cw');
		$this->data['v_qty']=$this->post('v_qty');
		$this->data['v_in']=$this->post('v_agent');
		$this->data['v_remarks']=$this->post('v_remarks');

		try{
            if($this->post('v_job_no') !== FALSE){
                $this->data['v_job_no'] = $this->post('v_job_no');

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
            }
            else{
                $this->data['v_job_no'] = $this->file_no;
            }
            
            if(call_sess(USER_SESSION,'user_role') != 'Admin' && call_sess(USER_SESSION,'user_role') != 'Manager'){
                // check if file exist
                if($this->get_fileno->checkTable(array("v_job_no" => $this->file_no, "v_complete" => 1))){
                    throw new Exception("Error updating closed job, report to your admin for further assistance.");
                }
            }
                
			// check role
			if($this->get_role->checkTable(array("user_role" => "Staff", "user_mail" => call_sess(USER_SESSION, 'email')))){
				throw new Exception("You have no access for this operation, report to your admin");
			}

			$where = array("v_job_no" => $this->file_no);
			if(!$this->get_fileno->updateRow($this->data,$where)){
				throw new Exception("Error updating job");
				
			}

			htmlFeed('success', 'Job&nbsp;' .$this->file_no. '&nbsp;info updated successfully');
			redir('dashboard/view_job/file/'.simple_encrypt($this->data['v_job_no']));

		}
		catch(Exception $e){
			htmlFeed('warning', $e->getMessage());
			redir('dashboard/view_job/file/'.simple_encrypt($this->file_no));
		}

	}



	public function update_cost(){
		global $data;


		// get data
		$this->data['v_cclearance']=$this->post('v_cclearance');
		$this->data['v_cdutyhandling']=$this->post('v_cdutyhandling');
		$this->data['v_cdeliverycost']=$this->post('v_cdeliverycost');
		$this->data['v_cnafdac']=$this->post('v_cnafdac');
		$this->data['v_cother']=$this->post('v_cother');
		$this->data['v_cdoortodoor']=$this->post('v_cdoortodoor');
		$this->data['v_sclearance']=$this->post('v_sclearance');
		$this->data['v_sdoortodoor']=$this->post('v_sdoortodoor');
		$this->data['v_sporttodoor']=$this->post('v_sporttodoor');
		$this->data['v_smiscellenous']=$this->post('v_smiscellenous');
		$this->data['v_sdelivery']=$this->post('v_sdelivery');
		$this->data['doc_h_fee']=$this->post('doc_h_fee');
		$this->data['v_cost']=$this->post('v_cost');
		$this->data['v_selling']=$this->post('v_selling');
		$this->data['v_profit']=($this->data['v_selling'] - $this->data['v_cost']);

		try{
			// check if file exist
            if(call_sess(USER_SESSION,'user_role') != 'Admin' && call_sess(USER_SESSION,'user_role') != 'Manager'){
                if($this->get_fileno->checkTable(array("v_job_no" => $this->file_no, "v_complete" => 1))){
                    throw new Exception("Error updating closed job, report to your admin for further assistance.");
                }
            }
			// check role
			if($this->get_role->checkTable(array("user_role" => "Staff", "user_mail" => call_sess(USER_SESSION, 'email')))){
				throw new Exception("You have no access for this operation, report to your admin");
			}

			$where = array("v_job_no" => $this->file_no);
			if(!$this->get_fileno->updateRow($this->data,$where)){
				throw new Exception("Error updating job");
				
			}

			htmlFeed('success', 'Job&nbsp;' .$this->file_no. '&nbsp;info updated successfully');
			redir('dashboard/view_job/file/'.simple_encrypt($this->file_no));

		}
		catch(Exception $e){
			htmlFeed('warning', $e->getMessage());
			redir('dashboard/view_job/file/'.simple_encrypt($this->file_no));
		}

	}


	
	public function update_log(){
		global $data;

		// unset less data
		unset($this->data['v_month']);
		unset($this->data['v_customerref']);
		unset($this->data['v_commodity']);
		unset($this->data['v_vessel']);
		unset($this->data['v_bl']);
		unset($this->data['v_eta']);
		unset($this->data['v_container']);
		unset($this->data['v_rno']);
		unset($this->data['v_containerno']);
		unset($this->data['v_transporter']);
		unset($this->data['v_agent']);
		unset($this->data['v_deliverto']);
		unset($this->data['v_pi']);
		unset($this->data['v_remark']);
		unset($this->data['v_cclearance']);
		unset($this->data['v_cdutyhandling']);
		unset($this->data['v_cdeliverycost']);
		unset($this->data['v_cnafdac']);
		unset($this->data['v_cother']);
		unset($this->data['v_cdoortodoor']);
		unset($this->data['v_cost']);
		unset($this->data['v_selling']);
		unset($this->data['v_profit']);
		unset($this->data['v_sclearance']);
		unset($this->data['v_sdoortodoor']);
		unset($this->data['v_sporttodoor']);
		unset($this->data['v_smiscellenous']);
		unset($this->data['v_sdelivery']);
		// get data
		try{	
			// check if file exist
			    if(call_sess(USER_SESSION,'user_role') != 'Admin' && call_sess(USER_SESSION,'user_role') != 'Manager'){
                    if($this->get_fileno->checkTable(array("v_job_no" => $this->file_no, "v_complete" => 1))){
                        throw new Exception("Error updating closed file, report to your admin for further assistance.");
                    }        
                }

				$v_awarded = $this->data['v_awarded']= $this->post('v_awarded') == 'on' ? 1 : 0;
				// check if file exist
                
				$where = array("v_job_no" => $this->file_no);
				if(!$this->get_fileno->updateRow($this->data,$where)){
					throw new Exception("Error updating file");
					
				}
				unset($this->data['v_awarded']);

				$v_underclearance = $this->data['v_underclearance']= $this->post('v_underclearance') == 'on' ? 1 : 0;
				
				$where = array("v_job_no" => $this->file_no);
				if(!$this->get_fileno->updateRow($this->data,$where)){
					throw new Exception("Error updating file");
					
				}
				unset($this->data['v_underclearance']);

				$v_cleared = $this->data['v_cleared']= $this->post('v_cleared') == 'on' ? 1 : 0;
				
				$where = array("v_job_no" => $this->file_no);
				if(!$this->get_fileno->updateRow($this->data,$where)){
					throw new Exception("Error updating file");
					
				}
				unset($this->data['v_cleared']);

				$v_document = $this->data['v_document']= $this->post('v_document') == 'on' ? 1 : 0;
				
				$where = array("v_job_no" => $this->file_no);
				if(!$this->get_fileno->updateRow($this->data,$where)){
					throw new Exception("Error updating file");
					
				}
				unset($this->data['v_document']);

				$v_delivered = $this->data['v_delivered']= $this->post('v_delivered') == 'on' ? 1 : 0;
				
				$where = array("v_job_no" => $this->file_no);
				if(!$this->get_fileno->updateRow($this->data,$where)){
					throw new Exception("Error updating file");
					
				}
				unset($this->data['v_delivered']);


				$v_invoicebi = $this->data['v_invoicebi']= $this->post('v_invoicebi') == 'on' ? 1 : 0;
				
            
                
				$where = array("v_job_no" => $this->file_no);
				if(!$this->get_fileno->updateRow($this->data,$where)){
					throw new Exception("Error updating file");
					
				}
				unset($this->data['v_invoicebi']);

			

			htmlFeed('success', 'Log updated successfully');
			redir('dashboard/view_job/file/'.simple_encrypt($this->file_no));

		}
		catch(Exception $e){
			htmlFeed('warning', $e->getMessage());
			redir('dashboard/view_job/file/'.simple_encrypt($this->file_no));
		}

	}

	public function new_upload(){
		global $data;
		// get data
		if(isset(getval()[2])){
			$this->data['v_job_no'] = getVal()[2];
		}
		$this->data['v_doctype']=$this->post('new_doctype');
		$this->data['v_date']=now();
		$this->data['v_by']=call_sess(USER_SESSION, 'email');



		try{
			// aut
			$this->check_fields($this->data);
			

			$file = $this->new_upload->file_upload("new_doc",
				"png,jpg,jpeg,JPEG,PNG,JPG,docx,pdf,cvr,xls,xlsx",
				TRUE,
				10);

			
			/*
			
			"tmp_name"
            "name"
            "size"
            "ext"
			*/

			$new_file_name = $this->data['v_job_no'].'_'.date('F s').time().'_'.$this->data['v_doctype'].'.'.$file['ext'];

			move_files($file['tmp_name'],"uploads/document/$new_file_name");

			$this->data['v_doc'] = $new_file_name;
			$this->data['v_ext'] = $file['ext'];
			$this->data['v_size'] = $file['size'];

			$where = array(
							"v_job_no" => $this->data['v_job_no'],
							"v_doctype" => $this->data['v_doctype']
							);
			// check and update if needed
			if($this->new_upload_model->checkTable($where)){
				// remove old
				$param['where'] = $where;
				$old_file = $this->new_upload_model->getRow($param);
				$fetched['old_file_name'] = $old_file['v_doc'];
				$old = $fetched['old_file_name'];
				unlink("uploads/document/$old");
				// add new
				if(!$this->new_upload_model->updateRow($this->data,$where)){
					unlink("uploads/document/$new_file_name");
					throw new Exception("File could not be updated");
					
				}
			}
			else{
				// send to db;
				if(!$this->new_upload_model->storeRow($this->data)){
					unlink("uploads/document/$new_file_name");
					throw new Exception("File could not be uploaded");
					
				}
			}
			


			// on success
			htmlFeed('success', 'File uploaded successfully');

			redir('dashboard/view_job/file/'.simple_encrypt($this->data['v_job_no']));

		}
		catch(Exception $e){
			htmlFeed('warning', $e->getMessage());
			redir('dashboard/view_job/file/'.simple_encrypt($this->data['v_job_no']));
		}
		
	}



	public function new_othername(){
		// get data
		// unset less data
		unset($this->data['v_dutypaid']);
		unset($this->data['shippingdo']);
		unset($this->data['v_examination']);
		unset($this->data['v_customrelease']);
		unset($this->data['v_returned']);
		unset($this->data['v_loaded']);
		unset($this->data['v_containercard']);
		unset($this->data['v_invoice']);
		unset($this->data['v_document']);
		unset($this->data['v_month']);
		unset($this->data['v_customerref']);
		unset($this->data['v_commodity']);
		unset($this->data['v_vessel']);
		unset($this->data['v_bl']);
		unset($this->data['v_eta']);
		unset($this->data['v_container']);
		unset($this->data['v_rno']);
		unset($this->data['v_containerno']);
		unset($this->data['v_transporter']);
		unset($this->data['v_agent']);
		unset($this->data['v_deliverto']);
		unset($this->data['v_pi']);
		unset($this->data['v_remark']);
		
		if(isset(getval()[2])){
			$this->data['v_job_no'] = getVal()[2];
		}

		$this->data['v_doctype']=$this->post('new_othername');
		$this->data['v_date']=now();
		$this->data['v_by']=call_sess(USER_SESSION, 'email');


		try{
			// aut
			$this->check_fields($this->data);
			// check if file exist
            if(call_sess(USER_SESSION,'user_role') != 'Admin' && call_sess(USER_SESSION,'user_role') != 'Manager'){
                if($this->get_fileno->checkTable(array("v_job_no" => $this->file_no, "v_complete" => 1))){
                    throw new Exception("Error updating closed file, report to your admin for further assistance.");
                }
            }

			$file = $this->new_upload->file_upload("new_otherdoc",
				"png,jpg,jpeg,JPEG,PNG,JPG,docx,pdf,cvr,xls,xlsx",
				TRUE,
				10);

			
			/*
			
			"tmp_name"
            "name"
            "size"
            "ext"
			*/

			$new_file_name = $this->data['v_job_no'].'_'.date('F').'_'.$this->data['v_doctype'].'.'.$file['ext'];

			move_files($file['tmp_name'],"uploads/document/$new_file_name");

			$this->data['v_doc'] = $new_file_name;
			$this->data['v_ext'] = $file['ext'];
			$this->data['v_size'] = $file['size'];

			$where = array(
							"v_job_no" => $this->data['v_job_no'],
							"v_doctype" => $this->data['v_doctype']
							);
			// check and update if needed
			if($this->new_upload_model->checkTable($where)){
				// add new
				if(!$this->new_upload_model->storeRow($this->data)){
					unlink("uploads/document/$new_file_name");
					throw new Exception("File could not be updated");
					
				}
			}
			else{
				// send to db;
				if(!$this->new_upload_model->storeRow($this->data)){
					unlink("uploads/document/$new_file_name");
					throw new Exception("File could not be uploaded");
					
				}
			}
			


			// on success
			htmlFeed('success', 'File uploaded successfully');

			redir('dashboard/view_job/file/'.simple_encrypt($this->data['v_job_no']));

		}
		catch(Exception $e){
			htmlFeed('warning', $e->getMessage());
			redir('dashboard/view_job/file/'.simple_encrypt($this->data['v_job_no']));
		}
		
	}
    
    function sendmail(){
        $this->data['email'] = $this->post('email');
        $this->data['update'] = $this->post('update');
        
        try{
            // check for empty fields
            $this->check_fields($this->data);
            
            // send mail
            $content = array();
            $content['header_color'] = 'white';
            $content['from'] = "support@v-logic.com.ng";
            $content['subject'] = 'Update for the job - '.$this->file_no;
            $content['logo'] = BASE_URL.'assets/vlogic/assets/images/logo.jpg';
            
            $content['body'] = '<p>'.nl2br($this->data['update']).'</p>';
            $content['body'] .= '<p>Regards<br />Vlogic Team</p>';
            $content['footer'] = NULL;
                
            $content['to'] = $this->data['email'];
            
            fh_mail($content);  
            
            htmlFeed("success","Message sent");
            // redirect
            redir("dashboard/view_job/file/".simple_encrypt($this->file_no));
        }
        catch(Exception $e){
            htmlFeed("warning",$e->getMessage());
        }
    }
    
    
    function delete_job(){
        $this->data['v_job_no'] = $this->file_no;
        
        $this->get_fileno->removeRow($this->data);
        $this->new_upload_model->removeRow($this->data);

        // output feed
        htmlFeed('success','Job has been removed from record');
        // redirect
        redir('dashboard');
    }
}
<?php 

class file_manager extends fh_ctrl{
	protected $new_upload;
	protected $new_upload_model;
	protected $page;
	protected $pages;
	protected $images;
	protected $documents;
	protected $all_files;

	public function index(){
		global $data;

		$data['title'] = $this->title('vLogic Air Shipping');
		$data['new_header'] = "file_header";
		$data['new_footer'] = "file_footer";

		// helper
		$this->new_upload = inst("form_helpers","helper");

		// model
		$this->new_upload_model = inst("vlogic_air_docs","model");

		// arrays
		$this->pages = ['images','documents','archive'];
		$this->images = ['png','jpg','jpeg','PNG','JPG','JPEG'];
		$this->documents = ['pdf','docx','cvr','xls','xlsx'];
		$this->all_files = ['pdf','docx','cvr','xls','xlsx','png','jpg','jpeg','PNG','JPG','JPEG'];


		// check url
		if(count(getval()) > 2 || count(getval()) < 2){
			$data['file_msg'] = $this->page;
		}else{
			$data['file_msg'] = $this->page;
		}

		// fetch value
		if (isset(getval()[1])) {
			$this->page = getval()[1];
		}

		// check value
		if (!in_array($this->page, $this->pages)) {
			$data['file_msg'] = $this->page;
		}else{
			$data['file_msg'] = $this->page;
		}

		// print_r(getval());
		// exit;

		// get all files
		$param['items'] = 100;
		$data['all_file'] = $this->new_upload_model->pageRow($param);

		// count all
		$where = NULL;
		$data['all'] = $this->new_upload_model->countRows($where);

		// // count images
		// $where1= array("v_ext" => 'png');
		// $data['png'] = $this->new_upload_model->countRows($where1);
		// $where2= array("v_ext" => 'jpg');
		// $data['jpg'] = $this->new_upload_model->countRows($where2);
		// $where3= array("v_ext" => 'jpeg');
		// $data['jpeg'] = $this->new_upload_model->countRows($where3);
		// $data['img'] = $png + $jpg + $jpeg;

		// // count files
		// $where4= array("v_ext" => 'docx');
		// $data['docx'] = $this->new_upload_model->countRows($where4);
		// $where5= array("v_ext" => 'pdf');
		// $data['pdf'] = $this->new_upload_model->countRows($where5);
		// $where6= array("v_ext" => 'xls');
		// $data['xls'] = $this->new_upload_model->countRows($where6);
		// $where7= array("v_ext" => 'xlsx');
		// $data['xlsx'] = $this->new_upload_model->countRows($where7);
		// $where8= array("v_ext" => 'cvr');
		// $data['cvr'] = $this->new_upload_model->countRows($where8);
		// $data['fil'] = $pdf + $docx + $xls + $xlsx + $cvr;

	}



	public function new_upload(){
		// get data
		$this->data['v_fileno']=$this->post('new_fileno');
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

			$new_file_name = $this->data['v_fileno'].'_'.date('F').'_'.$this->data['v_doctype'].'.'.$file['ext'];

			move_files($file['tmp_name'],"uploads/document/$new_file_name");

			$this->data['v_doc'] = $new_file_name;
			$this->data['v_ext'] = $file['ext'];
			$this->data['v_size'] = $file['size'];

			$where = array(
							"v_fileno" => $this->data['v_fileno'],
							"v_doctype" => $this->data['v_doctype']
							);
			// check and update if needed
			if($this->new_upload_model->checkTable($where)){
				// remove old
				$param['where'] = array('v_fileno' => $this->data['v_fileno']);
				$old_file = $this->new_upload_model->getRow($param);
				$fetched['old_file_name'] = $old_file['v_doc'];
				$old = $fetched['old_file_name'];
				unlink("uploads/document/$old");
				// add new
				if(!$this->new_upload_model->updateRow($this->data,array("v_fileno"=>$this->data['v_fileno']))){
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

			redir('dashboard/file_manager');

		}
		catch(Exception $e){
			htmlFeed('warning', $e->getMessage());
			redir('dashboard/file_manager');
		}
		
	}


	public function images(){
		global $data;

		// get all files
		$param['append'] = "v_ext = 'png' OR v_ext = 'jpg' OR v_ext = 'jpeg'";
		$param['items'] = 100;
		$data['all_file'] = $this->new_upload_model->pageRow($param);
	}


	public function documents(){
		global $data;

		// get all files
		$param['append'] = "v_ext = 'pdf' OR v_ext = 'docx' OR v_ext = 'cvr' OR v_ext = 'xls' OR v_ext = 'xlsx'";
		$param['items'] = 100;
		$data['all_file'] = $this->new_upload_model->pageRow($param);
		
	}


	public function archive(){
		global $data;

		// get all files
		$where = array("v_archive" => 1);
		// print_r($where);
		// exit;
		$param['where'] = $where;
		$param['items'] = 100;
		$data['all_file'] = $this->new_upload_model->pageRow($param);
		
	}


	public function result(){
		global $data;


		$this->data['v_fileno']=$this->post('searchfile');

		try{
			// get file
			$where = array("v_fileno" => $this->data['v_fileno']);
			// print_r($where);
			// exit;
			$param['where'] = $where;
			$data['all_file'] = $this->new_upload_model->pageRow($param);
			if (!$data['all_file']) {
				throw new Exception("File does not exist");
				
			}


			htmlFeed('success', 'Results for File '.''.$this->data['v_fileno']);

		}
		catch(Exception $e){
			htmlFeed('warning', $e->getMessage());
			redir('dashboard/file_manager');
		}

		// $param['where'] = array('v_fileno' => 'o' );
		// $param['items'] = 100;
		// $data['all_file'] = $this->new_upload_model->pageRow($param);

	}

	public function docs(){
		
	}
}




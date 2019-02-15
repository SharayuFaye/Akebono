<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// error_reporting(0); 
class Welcome extends CI_Controller {
	function __Construct(){
  parent::__Construct ();
   $this->load->database(); // load database
   $this->load->model('postmodel');
   $this->load->model('Login');
   $this->load->model('Machinecontrol');
   $this->load->model('Machinerunning');
    $this->load->model('Cleanhistory');
   $this->load->model('Forecastsetting'); 
   $this->load->model('Forecast');
       $this->load->model('Mold');
   // load model 
   $this->load->model('Production');
    $this->load->model('Tableajax');
    $this->load->model('Statushistory');
    $this->load->model('Statushistory1');
    $this->load->model('Moldsetting');  
    $this->load->model('Moldsearch');
    $this->load->model('Moldsetting1'); 
    $this->load->model('Searchmodel');  
    $this->load->model('Shortcounterhistory');  
    $this->load->model('Temp');  

     $this->load->model('Inspection_Result_Sheet');
     $this->load->model('Mold_Die_History_Record');

    $this->load->helper('url_helper');
	$this->load->helper('url');
	$this->load->helper('file');

	// Load form helper library
	$this->load->helper('form');

	// Load form validation library
	$this->load->library('form_validation');

	// Load session library
	$this->load->library('session');
	 
 }

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		
		//$this->load->view('templates/header.php');
		$this->load->view('login');
		//$this->load->view('templates/footer.php');
		//$this->data['tables'] = $this->Tableajax->getTableajax();	
	//$this->load->view('tables_ajax', $this->data);	

	}


	public function profile()
	{ 

		if(!isset($this->session->userdata['username']) ||  ($this->session->userdata['username']=='')){
			$this->load->view('login');
		} else{
		if($this->input->post('username')){ 
			$id = $this->session->userdata['id'] ;  
			$username =$this->input->post('username') ;   
			 $target = array(  	
				"username"=>$username
				); 
				$this->db->where(array( 'id' =>$id ));
				$this->db->update('login', $target); 
			$config['upload_path']  = './img/'; 
			$config['allowed_types']        = 'jpg|png'; 

            $this->load->library('upload', $config); 
            	if ( ! $this->upload->do_upload('file'))
                {
                        $error = array('error' => $this->upload->display_errors()); 
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());
                        $file = $data['upload_data']['file_name']; 
			        	$targets = array(  	
						"image"=>$file
						); 
						$this->db->where(array( 'id' =>$id ));
						$this->db->update('login', $targets ); 
						$this->session->set_userdata(array(  
						'image' => $file,
						)) ; 
                } 
			$this->session->set_userdata(array( 
			'username' => $username 
			)) ;
		}	
			$this->load->view('templates/header.php');
			$this->load->view('profile');
			$this->load->view('templates/footer.php');  
		}
	}



	public function manage_user()
	{ 

		if(!isset($this->session->userdata['username']) ||  ($this->session->userdata['username']=='')){
			$this->load->view('login');
		} else{
		if($this->input->post('username_add')){  
			$username =$this->input->post('username_add') ;   
			$password =$this->input->post('password_add') ;   
			$role =$this->input->post('role_add') ;   
			$file =$this->input->post('file_add') ;   
			 $target = array(  	
				"username"=>$username,
				"password"=>$password,
				"role"=>$role,
				"image"=>$file
				);  
				$this->db->insert('login', $target);
 
			$creds = array(
			"username"=> $this->input->post('username_add'),
			"password"=> $this->input->post('password_add')
			);
			$query = $this->db->get_where('login', $creds); 
			$v = $query->result(); 


			$config['upload_path']  = './img/'; 
			$config['allowed_types']        = 'jpg|png'; 

            $this->load->library('upload', $config);
 
            	if ( ! $this->upload->do_upload('file_add'))
                {
                        $error = array('error' => $this->upload->display_errors()); 
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());
                        $file = $data['upload_data']['file_name']; 
			        	$targets = array(  	
						"image"=>$file
						); 
						$this->db->where(array( 'id' => $v[0]->id));
						$this->db->update('login', $targets ); 
                } 
		}	




		if($this->input->post('username_edit')){  
			$id =$this->input->post('id_edit') ;   
			$username =$this->input->post('username_edit') ;   
			$password =$this->input->post('password_edit') ;   
			$role =$this->input->post('role_edit') ;  
			 $target = array(  	
				"username"=>$username,
				"password"=>$password,
				"role"=>$role 
				);  
			 	$this->db->where(array( 'id' => $id));
				$this->db->update('login', $target);
 
			$creds = array(
			"username"=> $this->input->post('username_edit'),
			"password"=> $this->input->post('password_edit')
			);
			$query = $this->db->get_where('login', $creds); 
			$v = $query->result(); 


			$config['upload_path']  = './img/'; 
			$config['allowed_types']        = 'jpg|png'; 

            $this->load->library('upload', $config); 
            	if ( ! $this->upload->do_upload('file_edit'))
                {
                        $error = array('error' => $this->upload->display_errors()); 
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());
                        $file = $data['upload_data']['file_name']; 
			        	$targets = array(  	
						"image"=>$file
						); 
						$this->db->where(array( 'id' => $v[0]->id));
						$this->db->update('login', $targets ); 
                }
               
		}	

		if($this->input->post('ok')){
			$model = $this->input->post('modeldel');
			$this->db->where(array( 'id' =>$model));
			$this->db->delete('login');
		}	



			$this->db->select("*"); 
  			$this->db->from('login');
  			$this->db->where(array( 'role' => 'User' ));
  			$query = $this->db->get();
  			$querydata = $query->result();

  			$this->data['users'] = $querydata;

			$this->load->view('templates/header.php');
			$this->load->view('manage_user', $this->data);
			$this->load->view('templates/footer.php');  
		}
	}


	public function about_us()
	{ 
		$this->load->view('templates/header.php');
		$this->load->view('about_us');
		$this->load->view('templates/footer.php');  
	}


	public function logout() {

		// $this->session->unset_userdata() ;
		// Removing session data
		$this->session->set_userdata(array(
							'username' => '',
							'password' => '',
							));
		// $this->session->unset_userdata('logged_in', $sess_array);
		$data['message_display'] = 'Successfully Logout';
		$this->load->view('login', $data);
	}
	public function login(){
		$this->load->database();
		$creds = array(
			"username"=> $this->input->post('username'),
			"password"=> $this->input->post('password')
		);
		$query = $this->db->get_where('login', $creds);
		
		if($query->num_rows() > 0){
			$v = $query->result();
			$this->session->set_userdata(array(
							'id' => $v[0]->id,
							'username' => $v[0]->username,
							'password' => $v[0]->password,
							'role' =>  $v[0]->role,
							'image' => $v[0]->image,
							)) ;
			// Add user data in session
			// $this->session->set_userdata('logged_in', $session_data);
			$this->welcome_message(); 
		}else{
			$data = array(
				'error_message' => 'Invalid Username or Password'
			);
		$this->load->view('login', $data);
		}
			
	} 
	public function welcome_message(){  
		if(!isset($this->session->userdata['username']) ||  ($this->session->userdata['username']=='')){
			$this->load->view('login');
		} else{

			if($this->input->post('model')){
				// print_r($this->input->post('model'));exit;	
				$model = $this->input->post('model');
				$mold = $this->input->post('mold');
				$cavity = $this->input->post('cavity');
				$m_c = $this->input->post('m_c');
				$clean_set = $this->input->post('clean_set');
				$hard_chrom_set = $this->input->post('hard_chrom_set');
				$die_change_set = $this->input->post('die_change_set');
				$qua_att = $this->input->post('qua_att');
				$req_chorm = $this->input->post('req_chorm');
				$die_change = $this->input->post('die_change');
				$price_hard_chrom = $this->input->post('price_hard_chrom'); 
				$price_die_change = $this->input->post('price_die_change');
				$mold_setting = array(
					"model"=> $model,
					"mold"=> $mold,
					"cavity"=> $cavity,
					"m_c"=> $m_c,
					"clean_set"=> $clean_set,
					"hard_chrom_set"=> $hard_chrom_set,
					"die_change_set"=> $die_change_set,
					"qua_att"=> $qua_att,
					"req_chorm"=> $req_chorm,
					"die_change"=> $die_change,
					"price_hard_chrom"=> $price_hard_chrom,
					"price_die_change"=> $price_die_change 
				);
		 
					$query1 = $this->db->query("SELECT * FROM mold_setting where model ='".$model."' and mold ='".$mold."'  "); 
					if($query1->num_rows() == 0){
						// $status_mold = array(
						// 	"model"=> $model,
						// 	"mold_setting"=> $mold
						// );

						$query = $this->db->insert('mold_setting', $mold_setting); 
					 // $this->db->query("insert into status_mold values('$mold','$model','','','','','','','','','')" );
					}
		}


	
			$this->db->select("*"); 
  			$this->db->from('temp_press'); 
  			$query = $this->db->get();
  			$querydata = $query->result();

  			$this->data['countdata'] = $querydata;


  			$this->db->select("*"); 
  			$this->db->from('mold_setting'); 
			$this->db->order_by("LEFT(mold,PATINDEX('%[0-9]%',mold)-1),CONVERT(INT,SUBSTRING(mold,PATINDEX('%[0-9]%',mold),LEN(mold))) ");
  			$mold = $this->db->get();
  			$molddata = $mold->result(); 
  			$this->data['mold_setting'] = $molddata;


  			// foreach ($molddata as $value) {
  			// 	echo  $value->mold ;
  			// 	$this->db->select('mold'); 
  			// 	$this->db->from('status_mold');  
	  		// 	$this->db->where(array( 'mold' => $value->mold  , 'shot_current' => '1')); 
	  		// 	$q=$this->db->get();
	  		// 	$moldd = $q->result();  
	  		// 	print_r($moldd);
	  		// 	// $nr = $q->num_rows() ;	
	  		// 	// print_r($nr);
	  		// 	echo "<Br>";

  			// }
  			
 



  			$this->db->select("*"); 
  			$this->db->from('status_mold'); 
  			$status = $this->db->get();
  			$status_mold = $status->result(); 
  			$this->data['status_mold'] = $status_mold;



  			$this->db->select("*"); 
  			$this->db->from('production'); 
  			$prod = $this->db->get();
  			$production = $prod->result(); 
  			$this->data['production'] = $production;


 
			$this->data['posts'] = $this->postmodel->getPosts(); 

			$this->load->view('templates/header.php');
			$this->load->view('welcome_message', $this->data);
			$this->load->view('templates/footer.php'); 
		}	
	}
	


	 


	public function operate_mold(){
		if(!isset($this->session->userdata['username']) ||  ($this->session->userdata['username']=='')){
			$this->load->view('login');
		} else{

			if($this->input->post('mold_id')){ 
			$mold_id =str_replace('HP-', '', $this->input->post('mold_id')) ; 
			$moldid = $this->input->post('mold_id') ; 

			$this->db->select("mold,mold_setting_id,model,shot_current,shot_setting,hard_current,hard_setting,change_current,change_setting,status_running,m_c"); 
  			$this->db->from('status_mold');
  			$this->db->where(array( 'mold_setting_id' => $mold_id ));
  			$query = $this->db->get();
  			$querydata = $query->result();
  			$this->data['status_mold_data'] = $querydata; 


 
			$shot_current = $this->db->query("SELECT mold FROM status_mold where  mold_setting_id = '".$mold_id."' and shot_current = '1'  "); 
			$this->data['shot_current_count'] = $shot_current->num_rows() ;	 
			// print_r($shot_current_count);


			$hard_current = $this->db->query("SELECT mold FROM status_mold where  mold_setting_id = '".$mold_id."' and hard_current = '1'  "); 
			$this->data['hard_current_count'] = $hard_current->num_rows() ;	
			// print_r($hard_current_count);


			$change_current = $this->db->query("SELECT mold FROM status_mold where  mold_setting_id = '".$mold_id."' and change_current = '1'  "); 
			$this->data['change_current_count'] = $change_current->num_rows() ;	
			// print_r($change_current_count);


 
  			$this->db->select("*"); 
  			$this->db->from('mold_setting');
  			$this->db->where(array( 'mold' => $moldid ));
  			$query1 = $this->db->get();
  			$querydata1 = $query1->result(); 
  			$this->data['mold_setting_data'] = $querydata1;



  			$query = $this->db->query("SELECT date,current_shot,maximum_shot,hard_chrome_shot,mold,type FROM identification  "); 

  			$this->data['status_history_data'] =  $query->result(); 
  			// print_r($this->data['mold_setting_data']);exit();

			}
			else{
				$this->data['mold_setting_data'] ='';
			}


			$this->db->select("*"); 
  			$this->db->from('mold_setting');
			 $this->db->distinct();
  			$query12 = $this->db->get();
  			$this->data['mold_setting'] = $query12->result();


  			$this->db->select("*"); 
  			$this->db->from('production'); 
  			$prod = $this->db->get();
  			$production = $prod->result(); 
  			$this->data['production'] = $production;


			$this->load->view('templates/header.php');
			$this->load->view('operate_mold' , $this->data);
			$this->load->view('templates/footer.php'); 
		}		
	}
public function Mold()
	{	 
		// print_r($this->session->userdata['username']);exit;
		if(!isset($this->session->userdata['username']) ||  ($this->session->userdata['username']=='')){
			$this->load->view('login');
		} else{
		
        if($this->input->post('upload')){ 
        	$req_num_data = $this->input->post('req_num_data');

			$config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png|xlsx|xlx|pdf'; 

            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('file'))
                {
                        $error = array('error' => $this->upload->display_errors()); 
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());
                        $file = $data['upload_data']['file_name']; 
			        	$targets = array(  	
						"fileupload"=>$file
						); 
						$this->db->where(array( 'req_num' =>$req_num_data ));
						$this->db->update('mold', $targets );
                }  
        }	

        if($this->input->post('uploadno_po')){ 
        	$req_num_data = $this->input->post('req_num_no_po');

			$config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png|xlsx|xlx|pdf'; 

            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('fileno_po'))
                {
                        $error = array('error' => $this->upload->display_errors()); 
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());
                        $file = $data['upload_data']['file_name']; 
			        	$targets = array(  	
						"fileupload_no_po"=>$file
						); 
						$this->db->where(array( 'req_num' =>$req_num_data ));
						$this->db->update('mold', $targets );
                }  
        }	

        if($this->input->post('uploaddata_inspection')){ 
        	$req_num_data = $this->input->post('req_num_data_inspection');

			$config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png|xlsx|xlx|pdf'; 

            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('filedata_inspection'))
                {
                        $error = array('error' => $this->upload->display_errors()); 
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());
                        $file = $data['upload_data']['file_name']; 
			        	$targets = array(  	
						"fileupload_data_inspection"=>$file
						); 
						$this->db->where(array( 'req_num' =>$req_num_data ));
						$this->db->update('mold', $targets );
                }  
        }

		if($this->input->post('req_num')){ 
			$req_num = $this->input->post('req_num'); 
			$query1 = $this->db->query("SELECT * FROM mold where req_num ='".$req_num."'"); 
			$query2 =$query1->result(); 
			// print_r($query1->num_rows());
			if($query1->num_rows() > 0){
 
			$quatation_no = $this->input->post('quatation_no'); 
			$rfq_no = $this->input->post('rfq_no'); 
			$pr = $this->input->post('pr'); 
			$no = $this->input->post('no'); 
			$part_no = $this->input->post('part_no'); 
			$description = $this->input->post('description'); 
			$quantity = $this->input->post('quantity'); 
			$unit = $this->input->post('unit'); 
			$unit_cost = $this->input->post('unit_cost'); 
			$discount = $this->input->post('discount'); 
			$amount = $this->input->post('amount'); 
			$required_by = $this->input->post('required_by'); 
			$objective = $this->input->post('objective'); 
			$mp_no = $this->input->post('mp_no'); 
			$due_date = $this->input->post('due_date');  
			$no_po = $this->input->post('no_po'); 
			$tax_invoice = $this->input->post('tax_invoice'); 
			$receive_date = $this->input->post('receive_date'); 
			$new_hard_chrome = $this->input->post('new_hard_chrome'); 
			$data_inspection = $this->input->post('data_inspection'); 
			
			$targets = array( 
			"req_num"=> $req_num ,	
			"quatation_no"=> $quatation_no ,
			"rfq_no"=> $rfq_no ,	
			"pr"=> $pr ,
			"no"=> $no ,	
			"part_no"=> $part_no ,
			"description"=> $description ,	
			"quantity"=> $quantity ,
			"unit"=> $unit ,	
			"unit_cost"=> $unit_cost ,
			"discount"=> $discount ,	
			"amount"=> $amount ,
			"required_by"=> $required_by ,	
			"objective"=> $objective ,
			"mp_no"=> $mp_no ,	
			"due_date"=> $due_date ,
			"no_po"=> $no_po ,	
			"tax_invoice"=> $tax_invoice ,
			"receive_date"=> $receive_date  ,
			"new_hard_chrome"=> $new_hard_chrome ,	
			"data_inspection"=> $data_inspection
			);
		 // print_r($targets); 
			$this->db->where(array('req_num' =>$req_num));
			$this->db->update('mold', $targets);  	
 
			}else{
			$req_num = $this->input->post('req_num'); 
			$quatation_no = $this->input->post('quatation_no'); 
			$rfq_no = $this->input->post('rfq_no'); 
			$pr = $this->input->post('pr'); 
			$no = $this->input->post('no'); 
			$part_no = $this->input->post('part_no'); 
			$description = $this->input->post('description'); 
			$quantity = $this->input->post('quantity'); 
			$unit = $this->input->post('unit'); 
			$unit_cost = $this->input->post('unit_cost'); 
			$discount = $this->input->post('discount'); 
			$amount = $this->input->post('amount'); 
			$required_by = $this->input->post('required_by'); 
			$objective = $this->input->post('objective'); 
			$mp_no = $this->input->post('mp_no'); 
			$due_date = $this->input->post('due_date');  
			$no_po = $this->input->post('no_po'); 
			$tax_invoice = $this->input->post('tax_invoice'); 
			$receive_date = $this->input->post('receive_date'); 
			$new_hard_chrome = $this->input->post('new_hard_chrome'); 
			$data_inspection = $this->input->post('data_inspection'); 
			
			$targets = array( 
			"req_num"=> $req_num ,	
			"quatation_no"=> $quatation_no ,
			"rfq_no"=> $rfq_no ,	
			"pr"=> $pr ,
			"no"=> $no ,	
			"part_no"=> $part_no ,
			"description"=> $description ,	
			"quantity"=> $quantity ,
			"unit"=> $unit ,	
			"unit_cost"=> $unit_cost ,
			"discount"=> $discount ,	
			"amount"=> $amount ,
			"required_by"=> $required_by ,	
			"objective"=> $objective ,
			"mp_no"=> $mp_no ,	
			"due_date"=> $due_date ,
			"no_po"=> $no_po ,	
			"tax_invoice"=> $tax_invoice ,
			"receive_date"=> $receive_date  ,
			"new_hard_chrome"=> $new_hard_chrome ,	
			"data_inspection"=> $data_inspection
			);
		 
			
			$query = $this->db->insert('mold', $targets); 
			}
		}	


		



		if($this->input->post("ExportType"))
		{	
			 // $this->db->select("req_num,quatation_no,rfq_no,pr,no,part_no,description,quantity,unit,unit_cost,discount,amount,required_by,objective,mp_no,due_date,no_po,tax_invoice,receive_date,new_hard_chrome,data_inspection,fileupload,fileupload_no_po,fileupload_data_inspection");  

			$query = $this->db->query("SELECT req_num,quatation_no,rfq_no,pr,no,part_no,description,quantity,unit,unit_cost,discount,amount,required_by,objective,mp_no,due_date,no_po,tax_invoice,receive_date,new_hard_chrome,data_inspection,fileupload,fileupload_no_po,fileupload_data_inspection FROM mold  ");  
			 $rail_head =   $query->result(); 


			$row = 5;
	    	$col = 1;
	    $this->load->library('excel');
	    //activate worksheet number 1
	    $this->excel->setActiveSheetIndex(0);
	    $this->excel->getActiveSheet()->setShowGridlines(false);
	    //name the worksheet
	    $this->excel->getActiveSheet()->setTitle('Mold');
	    $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(12);
	    $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(12);
	    $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(12);
	    $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(12);
	    $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(12);
	    $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(12);
	    $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(12);
	    $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(12);
	    $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(12);
	    $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(12);
	    $this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(12);
	    $this->excel->getActiveSheet()->getColumnDimension('L')->setWidth(12);
	    $this->excel->getActiveSheet()->getColumnDimension('M')->setWidth(12);
	    $this->excel->getActiveSheet()->getColumnDimension('N')->setWidth(12);
	    $this->excel->getActiveSheet()->getColumnDimension('O')->setWidth(12);
	    $this->excel->getActiveSheet()->getColumnDimension('P')->setWidth(12);
	    $this->excel->getActiveSheet()->getColumnDimension('Q')->setWidth(12);
	    $this->excel->getActiveSheet()->getColumnDimension('R')->setWidth(12);
	    $this->excel->getActiveSheet()->getColumnDimension('S')->setWidth(12);
	    $this->excel->getActiveSheet()->getColumnDimension('T')->setWidth(12);
	    $this->excel->getActiveSheet()->getColumnDimension('U')->setWidth(12);
	    $this->excel->getActiveSheet()->getColumnDimension('V')->setWidth(12);
	    $this->excel->getActiveSheet()->getColumnDimension('W')->setWidth(12); 
	    
	   
	    $header_style = array(
	        'font'  => array(
	            'bold'  => true,
	            'color' => array('rgb' => '#000000'),
	            'size'  => 12,
	            'name'  => 'Times'
	        )
	    );
	    $this->excel->getActiveSheet()->getStyle('A1:W1')->applyFromArray($header_style);
	    $this->excel->getActiveSheet()->getStyle('B2')->applyFromArray($header_style);
	    //set cell A1 content with some text
	    //$this->excel->getActiveSheet()->setCellValue('A1', ''.$organization.'');
	    //merge cell A1 until D1
	    $this->excel->getActiveSheet()->mergeCells('A1:W1');
	    //set aligment to center for that merged cell (A1 to D1)
	    $this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


	    $this->excel->getActiveSheet()->getRowDimension('1')->setRowHeight(10);
	    //$this->excel->getActiveSheet()->setCellValue('A2', 'Rail Head');
	    //change the font size
	    $this->excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(12);
	    //make the font become bold
	    // 	        $this->excel->getActiveSheet()->getStyle('A2')->getFont()->setBold(true); 
	    //set aligment to center for that merged cell (A1 to D1)
	    $this->excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	    
	    //Display Mold
	    foreach ($rail_head as $district) {
	        $dist = $district;
	    }
	    
	     $this->excel->getActiveSheet()->setCellValue('A2', 'Mold Document History');
	    
	    
	    //change the font size
	    $this->excel->getActiveSheet()->getStyle('C2')->getFont()->setSize(10);
	    //make the font become bold
	    $this->excel->getActiveSheet()->getStyle('C2')->getFont()->setBold(true);
	    //merge cell A1 until D1
	    $this->excel->getActiveSheet()->mergeCells('A2:W2');
	    //set aligment to center for that merged cell (A1 to D1)
	    $this->excel->getActiveSheet()->getStyle('C2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	    
	    // $this->excel->getActiveSheet()->setCellValue('B2', ''.$rail_head.'');
	    //change the font size
	    $this->excel->getActiveSheet()->getStyle('B2')->getFont()->setSize(10);
	    //set aligment to center for that merged cell (A1 to D1)
	    
	    $this->excel->getActiveSheet()->getStyle('M2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	    
	    // $this->excel->getActiveSheet()->setCellValue('N2', 'Date of verification');
	    //change the font size
	    $this->excel->getActiveSheet()->getStyle('N2')->getFont()->setSize(10);
	    //make the font become bold
	    $this->excel->getActiveSheet()->getStyle('N2')->getFont()->setBold(true);
	    //set aligment to center for that merged cell (A1 to D1)
	    $this->excel->getActiveSheet()->getStyle('N2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	    $this->excel->getActiveSheet()->getRowDimension('2')->setRowHeight(15);
	    
	    //change the font size
	    $this->excel->getActiveSheet()->getStyle('W2')->getFont()->setSize(10);
	    //set aligment to center for that merged cell (A1 to D1)
	    $this->excel->getActiveSheet()->getStyle('W2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	    
	    $this->excel->getActiveSheet()->getRowDimension('3')->setRowHeight(2);
	    //set cell A1 content with some text
	    //$this->excel->getActiveSheet()->setCellValue('A3', 'Rake Placement Time:- '.$rakexlstimeshow.'('.$rakexlsdtshow.'); Rake Clearance Time:-'.$rakexlsctimeshow.'('.$rakexlsvdtshow.')');
	    
	    //change the font size
	    $this->excel->getActiveSheet()->getStyle('A3')->getFont()->setSize(10);
	    //make the font become bold
	    $this->excel->getActiveSheet()->getStyle('A3')->getFont()->setBold(true);
	    // 	        $this->excel->getActiveSheet()->getStyle('A5')->getFont()->setBold(true);
	    //merge cell A1 until D1
	    $this->excel->getActiveSheet()->mergeCells('A3:W3');
	    //set aligment to center for that merged cell (A1 to D1)
	    $this->excel->getActiveSheet()->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	    
	    $this->excel->getActiveSheet()->getRowDimension('4')->setRowHeight(25);
	    $this->excel->getActiveSheet()->getRowDimension('5')->setRowHeight(20);
	    //set cell A1 content with some text
	    
	    //change the font size
	    $this->excel->getActiveSheet()->getStyle('A4')->getFont()->setSize(10);
	    //set aligment to center for that merged cell
	    $this->excel->getActiveSheet()->getStyle('A4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	    $this->excel->getActiveSheet()->getStyle('A4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
	    
	    $styleArray = array(
	        'borders' => array(
	            'outline' => array(
	                'style' => PHPExcel_Style_Border::BORDER_DOUBLE,
	                'color' => array('argb' => '#000000'),
	            ),
	        ),
	    );
	    $this->excel->getActiveSheet()->getStyle('A1:W1')->applyFromArray($styleArray);
	    
	    $styleArray1 = array(
	        'borders' => array(
	            'outline' => array(
	                'style' => PHPExcel_Style_Border::BORDER_THIN,
	                'color' => array('argb' => '#000000'),
	            ),
	        ),
	    );
	    $this->excel->getActiveSheet()->getStyle('A2')->applyFromArray($styleArray1);
	    $this->excel->getActiveSheet()->getStyle('B2')->applyFromArray($styleArray1);
	    $this->excel->getActiveSheet()->getStyle('C2:M2')->applyFromArray($styleArray1);
	    $this->excel->getActiveSheet()->getStyle('N2')->applyFromArray($styleArray1); 
	    
	    $styleArray2 = array(
	        'borders' => array(
	            'allborders' => array(
	                'style' => PHPExcel_Style_Border::BORDER_THIN,
	                'color' => array('argb' => '#000000'),
	            ),
	        ),
	    );
	    $this->excel->getActiveSheet()->getStyle('A4:W6')->applyFromArray($styleArray2);
	    
	    $styleArray3 = array(
	        'font'  => array(
	            'size'  => 10,
	        ),
	        'borders' => array(
	            'bottom' => array(
	                //'style' => PHPExcel_Style_Border::BORDER_THICK,
	                'color' => array('argb' => '#000000'),
	            ),
	        ),
	    );
	    $this->excel->getActiveSheet()->getStyle('A4:W4')->applyFromArray($styleArray3);
	    
	    //$this->excel->getActiveSheet()->getStyle('P1:O27')->applyFromArray($styleArray22);
	    //text wrap
	    $this->excel->getActiveSheet()->getStyle('A4:W4')->getAlignment()->setWrapText(true);
	    
	    //set aligment to center for that merged cell
	    $this->excel->getActiveSheet()->getStyle('A4:W4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	    $this->excel->getActiveSheet()->getStyle('A4:W4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
	    
	    $this->excel->getActiveSheet()->getStyle('A5:W5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	    $this->excel->getActiveSheet()->getStyle('A5:W5')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
	    
	    $this->excel->getActiveSheet()->getStyle('A6:W6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	    $this->excel->getActiveSheet()->getStyle('A6:W6')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
	    
	    
	    $this->excel->getActiveSheet()->setCellValue('A4', 'Req Num'); 
	    $this->excel->getActiveSheet()->setCellValue('B4', 'Quotation No'); 
	    $this->excel->getActiveSheet()->setCellValue('C4', 'Rfq No'); 
	    $this->excel->getActiveSheet()->setCellValue('D4', 'pr'); 
	    $this->excel->getActiveSheet()->setCellValue('E4', 'no'); 
	    $this->excel->getActiveSheet()->setCellValue('F4', 'Description'); 
	    $this->excel->getActiveSheet()->setCellValue('G4', 'Quantity'); 
	    $this->excel->getActiveSheet()->setCellValue('H4', 'Unit');
	    $this->excel->getActiveSheet()->setCellValue('I4', 'Unit Cost'); 
	    $this->excel->getActiveSheet()->setCellValue('J4', 'Discount'); 
	    $this->excel->getActiveSheet()->setCellValue('K4', 'Amount');   
	    $this->excel->getActiveSheet()->setCellValue('L4', 'Required By'); 
	    $this->excel->getActiveSheet()->setCellValue('M4', 'Objective'); 
	    $this->excel->getActiveSheet()->setCellValue('N4', 'Mp No'); 
	    $this->excel->getActiveSheet()->setCellValue('O4', 'Due Date'); 
	    $this->excel->getActiveSheet()->setCellValue('P4', 'No Po');
	    $this->excel->getActiveSheet()->setCellValue('Q4', 'Tax Invoice');
	    $this->excel->getActiveSheet()->setCellValue('R4', 'Receive Date');
	    $this->excel->getActiveSheet()->setCellValue('S4', 'New Hard Chrome');
	    $this->excel->getActiveSheet()->setCellValue('T4', 'Data Inspection');
	    $this->excel->getActiveSheet()->setCellValue('U4', 'Quotation No. File');
	    $this->excel->getActiveSheet()->setCellValue('V4', ' No Po File');
	    $this->excel->getActiveSheet()->setCellValue('W4', 'Data Inspection File'); 
	    //set cell A1 content with some text
	   
	        
	 //   }
	     
	    foreach ($rail_head as $value) {
	        
	        //print_r($row);
	        //STYLE
	        $styleArray4 = array(
	            'font'  => array(
	                'size'  => 10,
	            ),
	            'borders' => array(
	                'allborders' => array(
	                    'style' => PHPExcel_Style_Border::BORDER_THIN,
	                    'color' => array('argb' => '#000000'),
	                ),
	            ),
	        );
	        $this->excel->getActiveSheet()->getStyle('A'.$row.':W'.$row.'')->applyFromArray($styleArray4);
	        $this->excel->getActiveSheet()->getStyle('A'.$row.':W'.$row.'')->getAlignment()->setWrapText(true);
	        $this->excel->getActiveSheet()->getRowDimension($row)->setRowHeight(25);
	        
	        $this->excel->getActiveSheet()->getStyle('A'.$row.':W'.$row.'')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	        $this->excel->getActiveSheet()->getStyle('A'.$row.':W'.$row.'')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
	        
	        $req_num = $value->req_num;
	        $quatation_no = $value->quatation_no;
	        $rfq_no = $value->rfq_no;
	        $pr = $value->pr;
	        $no = $value->no; 
	        $description = $value->description;
	        $quantity = $value->quantity;
	        $unit = $value->unit;
	        $unit_cost = $value->unit_cost;
	        $discount = $value->discount;
	        $amount = $value->amount;
	        $required_by = $value->required_by;
	        $objective = $value->objective;
	        $mp_no = $value->mp_no;
	        $due_date = $value->due_date;
	        $no_po = $value->no_po;
	        $tax_invoice = $value->tax_invoice;
	        $receive_date = $value->receive_date;
	        $new_hard_chrome = $value->new_hard_chrome;
	        $data_inspection = $value->data_inspection;
	        $fileupload = $value->fileupload;
	        $fileupload_no_po = $value->fileupload_no_po;
	        $fileupload_data_inspection = $value->fileupload_data_inspection;
	       
	        	        
	        //Print Data
	        $this->excel->getActiveSheet()->setCellValue('A'.$row.'', $req_num);
	        $this->excel->getActiveSheet()->setCellValue('B'.$row.'', $quatation_no);
	        $this->excel->getActiveSheet()->setCellValue('C'.$row.'', $rfq_no);
	        $this->excel->getActiveSheet()->setCellValue('D'.$row.'', $pr);
	        $this->excel->getActiveSheet()->setCellValue('E'.$row.'', $no);
	        $this->excel->getActiveSheet()->setCellValue('F'.$row.'', $description);
	        $this->excel->getActiveSheet()->setCellValue('G'.$row.'', $quantity);
	        $this->excel->getActiveSheet()->setCellValue('H'.$row.'', $unit);
	        $this->excel->getActiveSheet()->setCellValue('I'.$row.'', $unit_cost); 
	        $this->excel->getActiveSheet()->setCellValue('K'.$row.'', $discount);
	        $this->excel->getActiveSheet()->setCellValue('L'.$row.'', $amount);
	        $this->excel->getActiveSheet()->setCellValue('M'.$row.'', $required_by);
	        $this->excel->getActiveSheet()->setCellValue('N'.$row.'', $objective);
	        $this->excel->getActiveSheet()->setCellValue('O'.$row.'', $mp_no);
	        $this->excel->getActiveSheet()->setCellValue('P'.$row.'', $due_date);
	        $this->excel->getActiveSheet()->setCellValue('Q'.$row.'', $no_po);
	        $this->excel->getActiveSheet()->setCellValue('R'.$row.'', $tax_invoice);
	        $this->excel->getActiveSheet()->setCellValue('S'.$row.'', $receive_date);
	        $this->excel->getActiveSheet()->setCellValue('T'.$row.'', $new_hard_chrome);
	        $this->excel->getActiveSheet()->setCellValue('U'.$row.'', $data_inspection);
	        $this->excel->getActiveSheet()->setCellValue('V'.$row.'', $fileupload);
	        $this->excel->getActiveSheet()->setCellValue('W'.$row.'', $fileupload_no_po);
	        $this->excel->getActiveSheet()->setCellValue('W'.$row.'', $fileupload_data_inspection);
	      	
	        
	        $row++;
	    }
	     
	    $filename='MoldReport.xls'; //save our workbook as this file name
	    header('Content-Type: application/vnd.ms-excel'); //mime type
	    header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
	    // header('Cache-Control: max-age=0'); //no cache
	    
	    //if you want to save it as .XLSX Excel 2007 format
	    $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
	    //force user to download the Excel file without writing it to server's HD
	    ob_end_clean();
		ob_start();
	    $objWriter->save('php://output');
	    //--------------------------------------END OF XLS----------------------------------------------


		}
		} 

		if($this->input->post('searchdisplay')){ 

			$quotation = $this->input->post('quotation');
			$qad = $this->input->post('qad');
			$date = $this->input->post('date');

			 
			$query = $this->db->query("SELECT req_num,quatation_no,rfq_no,pr,no,part_no,description,quantity,unit,unit_cost,discount,amount,required_by,objective,mp_no,due_date,no_po,tax_invoice,receive_date,new_hard_chrome,data_inspection,fileupload,fileupload_no_po,fileupload_data_inspection FROM mold  ");  
			 

			if($quotation!=''){	
				$query = $this->db->query("SELECT req_num,quatation_no,rfq_no,pr,no,part_no,description,quantity,unit,unit_cost,discount,amount,required_by,objective,mp_no,due_date,no_po,tax_invoice,receive_date,new_hard_chrome,data_inspection,fileupload,fileupload_no_po,fileupload_data_inspection FROM mold  where quatation_no  = '$quotation'   ");  
			}
			if($qad!=''){
				$query = $this->db->query("SELECT req_num,quatation_no,rfq_no,pr,no,part_no,description,quantity,unit,unit_cost,discount,amount,required_by,objective,mp_no,due_date,no_po,tax_invoice,receive_date,new_hard_chrome,data_inspection,fileupload,fileupload_no_po,fileupload_data_inspection FROM mold  where  part_no= '$qad' "); 
			} 
			if($date!=''){
				$query = $this->db->query("SELECT req_num,quatation_no,rfq_no,pr,no,part_no,description,quantity,unit,unit_cost,discount,amount,required_by,objective,mp_no,due_date,no_po,tax_invoice,receive_date,new_hard_chrome,data_inspection,fileupload,fileupload_no_po,fileupload_data_inspection FROM mold  where  due_date= '$date' "); 
			} 

			 
			$this->data['Molds'] = $query->result(); 
		}  

		if(isset($this->data['Molds'])){

		}else{
			$this->data['Molds'] = $this->Mold->getMold();	
		}
		$this->load->view('templates/header.php');
		$this->load->view('Mold', $this->data);
		$this->load->view('templates/footer.php');
				
	}
 	 
 public function Temp()
	{
		// print_r($this->session->userdata['username']);exit;
		if(!isset($this->session->userdata['username']) ||  ($this->session->userdata['username']=='')){
			$this->load->view('login');
		} else{

			$mold_query = $this->db->query("SELECT * FROM mold_setting "); 
		$mold_data = $mold_query->result(); 
		//print_r($mold_data);exit();
		foreach($mold_data as $moldData){ 
			
			$mold_new = str_replace("HP-","",$moldData->mold);
			$temp_data = $this->db->query("SELECT * FROM temp_press  where upper_moldid='".$mold_new."' "); 
			$temp = $temp_data->result(); 
			foreach($temp as $tmp){
				//print_r($tmp->CYCLE_COMPLETE); 
				$ratio_calc = $this->db->query("SELECT * FROM ratio_calc  where mold='".$mold_new."' "); 
				if($tmp->machine_running>0){
				$ratio=$tmp->machine_running/$moldData->clean_set; 
				$ratio_calc1=$ratio*100;
				// echo $tmp->CYCLE_COMPLETE ;echo "*******";   echo $moldData->clean_set;echo "*******";   
				$ratio_calc2 = 100 - floatval($ratio_calc1) ; 
				//print_r(floatval($ratio_calc2));exit();
				$ratio_data = array(
					"mold"=> $mold_new,
					"ratio"=>floatval($ratio_calc2)
				);
				if($ratio_calc->num_rows() == 0){
					$query = $this->db->insert('ratio_calc', $ratio_data); 
				}else{ 
					$this->db->where(array( 'mold' =>$mold_new)); 
					$this->db->update('ratio_calc', $ratio_data);
				} 
				}
			} 
			//for middle
			$temp_data = $this->db->query("SELECT * FROM temp_press  where middle_moldid='".$mold_new."' "); 
			$temp = $temp_data->result(); 
			foreach($temp as $tmp){
				//print_r($tmp->CYCLE_COMPLETE); 
				$ratio_calc = $this->db->query("SELECT * FROM ratio_calc  where mold='".$mold_new."' "); 
				if($tmp->machine_running>0){
				$ratio=$tmp->machine_running/$moldData->clean_set; 
				$ratio_calc1=$ratio*100;
				// echo $tmp->CYCLE_COMPLETE ;echo "*******";   echo $moldData->clean_set;echo "*******";   
				$ratio_calc2 = 100 - floatval($ratio_calc1) ; 
				//print_r(floatval($ratio_calc2));exit();
				$ratio_data = array(
					"mold"=> $mold_new,
					"middle_ratio"=>floatval($ratio_calc2)
				);
				if($ratio_calc->num_rows() == 0){
					$query = $this->db->insert('ratio_calc', $ratio_data); 
				}else{ 
					$this->db->where(array( 'mold' =>$mold_new)); 
					$this->db->update('ratio_calc', $ratio_data);
				} 
				}
			} 
			//for lower
			$temp_data = $this->db->query("SELECT * FROM temp_press  where lower_moldid='".$mold_new."' "); 
			$temp = $temp_data->result(); 
			foreach($temp as $tmp){
				//print_r($tmp->CYCLE_COMPLETE); 
				$ratio_calc = $this->db->query("SELECT * FROM ratio_calc  where mold='".$mold_new."' "); 
				if($tmp->machine_running>0){
				$ratio=$tmp->machine_running/$moldData->clean_set; 
				$ratio_calc1=$ratio*100;
				// echo $tmp->CYCLE_COMPLETE ;echo "*******";   echo $moldData->clean_set;echo "*******";   
				$ratio_calc2 = 100 - floatval($ratio_calc1) ; 
				//print_r(floatval($ratio_calc2));exit();
				$ratio_data = array(
					"mold"=> $mold_new,
					"lower_ratio"=>floatval($ratio_calc2)
				);
				if($ratio_calc->num_rows() == 0){
					$query = $this->db->insert('ratio_calc', $ratio_data); 
				}else{ 
					$this->db->where(array( 'mold' =>$mold_new)); 
					$this->db->update('ratio_calc', $ratio_data);
				} 
				}
			} 
			
			
		}


		

			if($this->input->post('searchdisplay')){ 

			$startdate = $this->input->post('startdate') .' 00:00:00.000';
			$enddate = $this->input->post('enddate').' 00:00:00.000';
			$mold = $this->input->post('moldid');
			$hotpress = $this->input->post('hotpress');

			$mold_no = str_replace("HP-","",$mold);

			if($startdate!=' 00:00:00.000' && $enddate!=' 00:00:00.000'){	
				$query = $this->db->query("SELECT * FROM temp_press where hotpress_time >= '$startdate' and hotpress_time <= '$enddate'  ");  
			}else{
				$query = $this->db->query("SELECT * FROM temp_press  "); 
			} 

			if($mold != '0'){	
				$query = $this->db->query("SELECT * FROM temp_press where  upper_moldid = '$mold_no' or middle_moldid = '$mold_no' or lower_moldid = '$mold_no'  "); 
			}

			if($hotpress != '0'){	
				$query = $this->db->query("SELECT * FROM temp_press where  MACHINE_NAME = '$hotpress' "); 
			}  

 
			$this->data['mold'] = $mold;
			$this->data['Temps'] = $query->result();

			 // print_r($this->data['Temps']);exit();
			} 
			else{
				$this->data['mold'] = ''; 
			}	

			$this->data['Tempsmold'] = $this->Temp->getTemp();


			$query =  $this->db->query(" SELECT CONVERT(INT, CONVERT(DATETIME,hotpress_time)) as time,upper_upper_temp from temp_press");

			$upper_lower_temp =  $this->db->query(" SELECT CONVERT(INT, CONVERT(DATETIME,hotpress_time)) as time,upper_lower_temp from temp_press");

			$middle_upper_temp =  $this->db->query(" SELECT CONVERT(INT, CONVERT(DATETIME,hotpress_time)) as time,middle_upper_temp from temp_press");

			$middle_lower_temp =  $this->db->query(" SELECT CONVERT(INT, CONVERT(DATETIME,hotpress_time)) as time,middle_lower_temp from temp_press");

			$lower_upper_temp =  $this->db->query(" SELECT CONVERT(INT, CONVERT(DATETIME,hotpress_time)) as time,lower_upper_temp from temp_press");

			$lower_lower_temp =  $this->db->query(" SELECT CONVERT(INT, CONVERT(DATETIME,hotpress_time)) as time,lower_lower_temp from temp_press");
	 
			$a = $query->result(); 
			$upper_lower = $upper_lower_temp->result(); 
			$middle_upper = $middle_upper_temp->result(); 
			$middle_lower = $middle_lower_temp->result(); 
			$lower_upper = $lower_upper_temp->result(); 
			$lower_lower = $lower_lower_temp->result(); 
		
		$this->data['timedata'] = $a;
		$this->data['upper_lower'] = $upper_lower;
		$this->data['middle_upper'] = $middle_upper;
		$this->data['middle_lower'] = $middle_lower;
		$this->data['lower_upper'] = $lower_upper;
		$this->data['lower_lower'] = $lower_lower;
		

		
		$query = $this->db->query("SELECT * FROM  mold_setting ");
		$this->data['mold_setting'] = $query->result(); 


		 
		$this->load->view('templates/header.php');
		$this->load->view('temp_pressure', $this->data); 
		}		
	}

	public function Temp1()
	{
		$this->data['count'] = 1 ; 

		$this->data['mold'] = '';

		$this->db->select("hotpress_time,upper_upper_temp,upper_lower_temp,middle_upper_temp,middle_lower_temp,lower_upper_temp,lower_lower_temp,pressure,moldid,item,upper_moldid,lower_moldid,middle_moldid,barcode,MACHINE_NAME"); 
		$this->db->from('temp_press');
		$this->db->order_by('hotpress_time','DESC');
		$query = $this->db->get(); 


		$this->data['Temps'] = $query->result();
		 
		$this->data['Tempsmold'] = $this->Temp->getTemp();


		$query =  $this->db->query(" SELECT CONVERT(INT, CONVERT(DATETIME,hotpress_time)) as time,upper_upper_temp from temp_press");

		$upper_lower_temp =  $this->db->query(" SELECT CONVERT(INT, CONVERT(DATETIME,hotpress_time)) as time,upper_lower_temp from temp_press");

		$middle_upper_temp =  $this->db->query(" SELECT CONVERT(INT, CONVERT(DATETIME,hotpress_time)) as time,middle_upper_temp from temp_press");

		$middle_lower_temp =  $this->db->query(" SELECT CONVERT(INT, CONVERT(DATETIME,hotpress_time)) as time,middle_lower_temp from temp_press");

		$lower_upper_temp =  $this->db->query(" SELECT CONVERT(INT, CONVERT(DATETIME,hotpress_time)) as time,lower_upper_temp from temp_press");

		$lower_lower_temp =  $this->db->query(" SELECT CONVERT(INT, CONVERT(DATETIME,hotpress_time)) as time,lower_lower_temp from temp_press");
 
		$a = $query->result(); 
		$upper_lower = $upper_lower_temp->result(); 
		$middle_upper = $middle_upper_temp->result(); 
		$middle_lower = $middle_lower_temp->result(); 
		$lower_upper = $lower_upper_temp->result(); 
		$lower_lower = $lower_lower_temp->result(); 
		
		$this->data['timedata'] = $a;
		$this->data['upper_lower'] = $upper_lower;
		$this->data['middle_upper'] = $middle_upper;
		$this->data['middle_lower'] = $middle_lower;
		$this->data['lower_upper'] = $lower_upper;
		$this->data['lower_lower'] = $lower_lower;

		$this->load->view('templates/header.php');
		$this->load->view('temp_pressure', $this->data); 
	}

	public function Forecastsetting()
	{
		// print_r($this->session->userdata['username']);exit;
		if(!isset($this->session->userdata['username']) ||  ($this->session->userdata['username']=='')){
			$this->load->view('login');
		} else{
		if($this->input->post('savedata')){ 
		$mold_item = $this->input->post('mold_item');
		$forecast = $this->input->post('forecast');
		$no_value = $this->input->post('no_value');
		$year = $this->input->post('year');
		$jan = $this->input->post('jan');
		$feb = $this->input->post('feb');
		$mar = $this->input->post('mar');
		$apr = $this->input->post('apr');
		$may = $this->input->post('may');
		$jun = $this->input->post('jun');
		$jul = $this->input->post('jul');
		$aug = $this->input->post('aug');
		$sep = $this->input->post('sep');
		$oct = $this->input->post('oct');
		$nov = $this->input->post('nov');
		$dec = $this->input->post('dec');


		$query = $this->db->query("SELECT * FROM  mold_setting where mold_setting_id= '".$mold_item."'");
		$querydata=$query->result();  
		// print_r($querydata[0]->model);exit();
		$targets = array(
			"mold_setting_id"=> $mold_item,
			"mold_item" => $querydata[0]->model,
			"forecast"=> $forecast ,
			"no_value"=> $no_value,
			"year"=> $year ,
			"jan"=> $jan ,
			"feb"=> $feb,
			"mar"=> $mar ,
			"apr"=> $apr,
			"may"=> $may ,
			"jun"=> $jun,
			"jul"=> $jul ,
			"aug"=> $aug,
			"sep"=> $sep ,
			"oct"=> $oct,
			"nov"=> $nov,
			"dec"=> $dec 
		);
		 
		 
			$query = $this->db->insert('forecast', $targets); 

		}



		if($this->input->post('searchdisplay')){ 
	 	 	$this->data['Forecastsettings'] = $this->Forecastsetting->getdateforecastsetting($this->input->post('year'));

	 	 }	
	 	 else{
	 	 	$this->data['Forecastsettings'] = $this->Forecastsetting->getforecastsetting();
	 	 }



		$status_mold = $this->db->query("SELECT hard_current,mold ,model,time FROM status_mold");
		$mold = $this->db->query("SELECT * FROM  mold_setting");
		$this->data['mold']=$mold->result(); 
		$this->data['status_mold']=$status_mold->result(); 
		// $this->data['Forecastsettings'] = $this->Forecastsetting->getforecastsetting();
		$this->load->view('templates/header.php');
		$this->load->view('forecastsetting', $this->data);
		$this->load->view('templates/footer.php');
		}	

	}
	public function Forecast()
	{
		// print_r($this->session->userdata['username']);exit;
		if(!isset($this->session->userdata['username']) ||  ($this->session->userdata['username']=='')){
			$this->load->view('login');
		} else{
			

		 if($this->input->post('saveX')){ 
		 	$mold_setting_id = $this->input->post('mold_item');

		 	$query = $this->db->query("SELECT * FROM  mold_setting where mold_setting_id= '".$mold_setting_id."'");
			$querydata=$query->result();    

			$mold_item = $querydata[0]->mold ;
		 	$x = $this->input->post('x');
		 	$y = $this->input->post('y'); 
			$query1 = $this->db->query("SELECT * FROM targets where mold_item ='".$mold_item."'"); 
			$query2 =$query1->result(); 
			// print_r($query2);
			// print_r($query2[0]->count); 
			if($query1->num_rows() > 0){ 
				$targets = array(
				"mold_item"=> $mold_item,
				"x"=> $x ,
				"y"=> $y,
				"mold_setting_id" => $mold_setting_id,
				"count"=> $query2[0]->count+1
				);
				$this->db->where(array( 'mold_item' =>$mold_item));
				$this->db->update('targets', $targets);
			}else{
				$targets = array(
				"mold_item"=> $mold_item,
				"x"=> $x ,
				"y"=> $y,
				"mold_setting_id" => $mold_setting_id,
				"count"=> 0
				);
				$query = $this->db->insert('targets', $targets);
			}


		 }

		 if($this->input->post('saveY')){  
		 	$mold_setting_id = $this->input->post('mold_item');

		 	$query = $this->db->query("SELECT * FROM  mold_setting where mold_setting_id= '".$mold_setting_id."'");
			$querydata=$query->result();    

			$mold_item = $querydata[0]->mold ;

		 	$y = $this->input->post('y'); 
			$query1 = $this->db->query("SELECT * FROM targetsy where mold_item ='".$mold_item."'"); 
			$query2 =$query1->result(); 
			// print_r($query2);
			// print_r($query2[0]->count); 
			if($query1->num_rows() > 0){ 
				$targets = array(
				"mold_item"=> $mold_item, 
				"y"=> $y,
				"mold_setting_id" => $mold_setting_id,
				"count"=> $query2[0]->count+1
				);
				$this->db->where(array( 'mold_item' =>$mold_item));
				$this->db->update('targetsy', $targets);
			}else{
				$targets = array(
				"mold_item"=> $mold_item, 
				"y"=> $y,
				"mold_setting_id" => $mold_setting_id,
				"count"=> 0
				);
				$query = $this->db->insert('targetsy', $targets);
			} 
		 }	

		$status_mold = $this->db->query("SELECT hard_current,mold ,model,time FROM status_mold");
		$this->data['status_mold']=$status_mold->result();

		$mold_settingdata = $this->db->query("SELECT  * FROM mold_setting");
		$this->data['mold_settingdata']= $mold_settingdata->result();
 	

 		if($this->input->post('searchdisplay')){ 
	 	 	$this->data['Forecastsettings'] = $this->Forecast->getdateforecast($this->input->post('year'));

	 	 }	
	 	 else{
	 	 	$this->data['Forecastsettings'] = $this->Forecast->getforecast();
	 	 }

		
		$this->load->view('templates/header.php');
		$this->load->view('forecast', $this->data);
		$this->load->view('templates/footer.php');
		}		
	}

public function Machinecontrol()
	{	  
		if(!isset($this->session->userdata['username']) ||  ($this->session->userdata['username']=='')){
			$this->load->view('login');
		} else{
		$this->data['model'] = $this->input->get('model');

			if($this->input->post('save')){  
			$model = $this->input->post('modelData');
			$mold = $this->input->post('moldid');
			
			$targets = array( 
			"mold"=> $mold 
			);
		 	// print_r($targets);exit();
			$this->db->where(array( 'model' =>$model ));
			$this->db->update('status_mold', $targets );

		}
 

 		


		$mold_settingdata = $this->db->query("SELECT  * FROM mold_setting order by mold");
		$this->data['mold_settingdata'] = $mold_settingdata->result();
	
		
		// $query = $this->db->query("SELECT TOP 12 *  FROM mold_setting order by mold_setting_id desc  "); 
		// $this->data['tables'] = $query->result(); 

		//Search code starts

		if($this->input->post('searchdisplay')){ 
 
			$mold = $this->input->post('moldid');
 			
			if($mold!=''){
				$query = $this->db->query("SELECT  model , mold, mold_setting_id FROM mold_setting where  mold= '$mold' "); 
				$this->data['tables'] = $query->result(); 
			}  
							 
			
		 }	

		 if($this->input->post('moldId_die')){
				$query = $this->db->query("SELECT  model , mold, mold_setting_id FROM mold_setting where  mold= '".$this->input->post('moldId_die')."' "); 
				$this->data['tables'] = $query->result(); 
			}  


		//Search code end 








		$mold_status = $this->db->query("SELECT  * FROM mold_setting "); 
		$ms = $mold_status->result();  
		$this->data['mold_setting'] = $ms;

		$this->data['Machinecontrols'] = $this->Machinecontrol->getMachinecontrol();
		$this->load->view('templates/header.php');
		$this->load->view('machinecontrol', $this->data);
		$this->load->view('templates/footer.php');
		
		}		
	}

public function Machinerunning()
	{
		// print_r($this->session->userdata['username']);exit;
		if(!isset($this->session->userdata['username']) ||  ($this->session->userdata['username']=='')){
			$this->load->view('login');
		} else{
		$this->data['Machinerunning'] = $this->Machinerunning->getMachinerunning();
		$this->load->view('templates/header_chart.php');
		$this->load->view('machinerunning', $this->data);
		//$this->load->view('templates/footer.php');
		}		
	}
	public function Cleanhistory()
	{
		// print_r($this->session->userdata['username']);exit;
		if(!isset($this->session->userdata['username']) ||  ($this->session->userdata['username']=='')){
			$this->load->view('login');
		} else{
			if($this->input->post('submit')){ 
				$this->data['type'] =$this->input->post('type');
			}else{
				$this->data['type'] = 	'Clean';
			}

			
		$query1 = $this->db->query("SELECT * FROM clean_history"); 
			$query2 =$query1->result(); 	
			$this->data['result']= $query2;
		$this->data['Cleanhistory'] = $this->Cleanhistory->getCleanhistory();
		$this->load->view('templates/header.php');
		$this->load->view('cleanhistory', $this->data);
		$this->load->view('templates/footer.php');
		}		
	}
	public function cleanhistorydata()
	{
		 $query1 = $this->db->query("SELECT * FROM company_performance"); 
			$query2 =$query1->result(); 
		 print_r(json_encode($query2, true));
	}

	public function Production()
	{
		if(!isset($this->session->userdata['username']) ||  ($this->session->userdata['username']=='')){
			$this->load->view('login');
		} else{

		if($this->input->post('searchdisplay')){ 

			$machine = $this->input->post('machine');
			$model = $this->input->post('model');
			$mold = $this->input->post('moldid'); 
			$mold_no = str_replace('HP-', '', $mold );

 
			$query = $this->db->query("SELECT * FROM production "); 


			$startdate = $this->input->post('startdate');
			$enddate = $this->input->post('enddate'); 

			if($startdate!='' && $enddate!=''){	
			$query = $this->db->query("SELECT * FROM production where date >= '$startdate' and date <= '$enddate'   ");
			  
			} 



			if($machine!='0'){	
				$query = $this->db->query("SELECT * FROM production where hot_press  = '$machine'   ");  
			}
			if($model!='0'){
				$query = $this->db->query("SELECT * FROM production where  item= '$model' "); 
			} 
			if($mold!='0'){
				$query = $this->db->query("SELECT * FROM production where  mold_no= '$mold_no' "); 
			} 
			if($model =='All' || $machine =='All'){
				$query = $this->db->query("SELECT * FROM production  "); 
			} 
			$this->data['mold'] = $mold;
			$this->data['Productions'] = $query->result(); 
		}  
		
		 
		  $this->db->select("*"); 
		  $this->db->from('mold_setting');  
 		  $this->db->order_by("LEFT(mold,PATINDEX('%[0-9]%',mold)-1),CONVERT(INT,SUBSTRING(mold,PATINDEX('%[0-9]%',mold),LEN(mold))) ");
		  $query = $this->db->get();
		  $this->data['mold_setting']=   $query->result();
		  
 


		$temp = $this->db->query("SELECT * FROM temp_press "); 
		$temp_press =$temp->result(); 	
		$this->data['temp_press']= $temp_press;




		$this->data['Prod'] = $this->Production->getproduction();

		$this->data['prod_item'] = $this->Production->getprod_item();
		$this->data['prod_machine'] = $this->Production->getprod_machine();

		$this->load->view('templates/header.php');
		$this->load->view('Production', $this->data);
		$this->load->view('templates/footer.php');
		}		
	}
	public function Tableajax()
	{	
		// print_r($this->session->userdata['username']);exit;
		if(!isset($this->session->userdata['username']) ||  ($this->session->userdata['username']=='')){ 
			$this->load->view('login');
		} else{

		$query = $this->db->query("SELECT * FROM status_mold   ");   
		$this->data['mold_data'] = $query->result(); 
				
		$this->data['tables'] = $this->Tableajax->getTableajax();
		$this->load->view('templates/header.php');
		$this->load->view('tables_ajax', $this->data);
		$this->load->view('templates/footer.php');
		}			
	}
	
	public function Statushistory()
	{
		// print_r($this->session->userdata['username']);exit;
		if(!isset($this->session->userdata['username']) ||  ($this->session->userdata['username']=='')){
			$this->load->view('login');
		} else{
		if($this->input->post('searchdisplay')){ 

			$startdate = $this->input->post('startdate');
			$enddate = $this->input->post('enddate');
			$mold = $this->input->post('moldid');

			if($startdate!='' && $enddate!=''){	
			$query = $this->db->query("SELECT date,current_shot,maximum_shot,hard_chrome_shot,mold,type FROM identification where date >= '$startdate' and date <= '$enddate'   ");
			  
			}else{
				$query = $this->db->query("SELECT date,current_shot,maximum_shot,hard_chrome_shot,mold,type FROM identification where  mold= '$mold' "); 
			} 
			$this->data['mold'] = $mold;
			$this->data['Statushistorys'] = $query->result();
		} 
		else{
			$this->data['mold'] = '';
			$this->data['Statushistorys'] = '';
		}

		if($this->input->post('moldId_operate')){ 
			$query = $this->db->query("SELECT date,current_shot,maximum_shot,hard_chrome_shot,mold,type FROM identification where  mold= '".$this->input->post('moldId_operate')."' "); 
			$this->data['mold'] = $this->input->post('moldId_operate');
			$this->data['Statushistorys'] = $query->result();
		}	




		$this->db->select("*"); 
		  $this->db->from('mold_setting');  
 		  $this->db->order_by("LEFT(mold,PATINDEX('%[0-9]%',mold)-1),CONVERT(INT,SUBSTRING(mold,PATINDEX('%[0-9]%',mold),LEN(mold))) ");
		  $query = $this->db->get();
		  $this->data['Statushistory1'] =   $query->result();



		$this->load->view('templates/header.php');
		$this->load->view('status_history', $this->data);
		$this->load->view('templates/footer.php');
		}			
	}
	public function Statushistory1()
	{
		$this->data['Statushistory1'] = $this->Statushistory1->getStatushistory1();
		$this->load->view('templates/header.php');
		$this->load->view('status_history1', $this->data);
		$this->load->view('templates/footer.php');
				
	}

	public function Moldsetting()
	{ 
		
		if(!isset($this->session->userdata['username']) ||
		($this->session->userdata['username']=='')){
		$this->load->view('login'); } else{  
		
			if($this->input->post('model')){
		// print_r($this->input->post('model'));exit;	
		$model = $this->input->post('model');
		$mold = $this->input->post('mold');
		$cavity = $this->input->post('cavity');
		$m_c = $this->input->post('m_c');
		$clean_set = $this->input->post('clean_set');
		$hard_chrom_set = $this->input->post('hard_chrom_set');
		$die_change_set = $this->input->post('die_change_set');
		$qua_att = $this->input->post('qua_att');
		$req_chorm = $this->input->post('req_chorm');
		$die_change = $this->input->post('die_change');
		$price_hard_chrom = $this->input->post('price_hard_chrom'); 
		$price_die_change = $this->input->post('price_die_change');
		$mold_setting = array(
			"model"=> $model,
			"mold"=> $mold,
			"cavity"=> $cavity,
			"m_c"=> $m_c,
			"clean_set"=> $clean_set,
			"hard_chrom_set"=> $hard_chrom_set,
			"die_change_set"=> $die_change_set,
			"qua_att"=> $qua_att,
			"req_chorm"=> $req_chorm,
			"die_change"=> $die_change,
			"price_hard_chrom"=> $price_hard_chrom,
			"price_die_change"=> $price_die_change 
		);
		
		 
			

			$query1 = $this->db->query("SELECT * FROM mold_setting where   mold ='".$mold."'  "); 
			if($query1->num_rows() == 0){
				// $status_mold = array(
				// 	"model"=> $model,
				// 	"mold_setting"=> $mold
				// );

				$query = $this->db->insert('mold_setting', $mold_setting); 
			 // $this->db->query("insert into status_mold values('$mold','$model','','','','','','','','','')" );
			}
		}


		if($this->input->post('modelupdate')){

		$mold_setting_id = $this->input->post('mold_setting_id');
		$model = $this->input->post('modelupdate');
		$mold = $this->input->post('mold');
		$cavity = $this->input->post('cavity');
		$m_c = $this->input->post('m_c');
		$clean_set = $this->input->post('clean_set');
		$hard_chrom_set = $this->input->post('hard_chrom_set');
		$die_change_set = $this->input->post('die_change_set');
		$qua_att = $this->input->post('qua_att');
		$req_chorm = $this->input->post('req_chorm');
		$die_change = $this->input->post('die_change');
		$price_hard_chrom = $this->input->post('price_hard_chrom'); 
		$price_die_change = $this->input->post('price_die_change');
		$mold_setting = array( 
			"model"=> $model,
			"mold"=> $mold,
			"cavity"=> $cavity,
			"m_c"=> $m_c,
			"clean_set"=> $clean_set,
			"hard_chrom_set"=> $hard_chrom_set,
			"die_change_set"=> $die_change_set,
			"qua_att"=> $qua_att,
			"req_chorm"=> $req_chorm,
			"die_change"=> $die_change,
			"price_hard_chrom"=> $price_hard_chrom,
			"price_die_change"=> $price_die_change 
		); 
		 	$this->db->where(array( 'mold_setting_id' =>$mold_setting_id)); 
			 $this->db->update('mold_setting', $mold_setting);
			  
	 $query1 = $this->db->query("SELECT * FROM status_mold where model ='".$model."' and mold  ='".$mold."'  "); 
	if($query1->num_rows() > 0){    
		 
	 $this->db->query("update status_mold set  hard_chrom_shots='$hard_chrom_set' ,maximum_shots ='$clean_set'   where model ='".$model."' and mold  ='".$mold."'" );
			} 
		}

		if($this->input->post('ok')){
			$model = $this->input->post('modeldel');
			$this->db->where(array( 'mold_setting_id' =>$model));
			$this->db->delete('mold_setting');
		}	


		$this->data['Moldsetting'] = $this->Moldsetting->getMoldsetting();
		// print_r($this->data['Moldsetting']);exit();
		$this->data['status_mold'] = $this->Moldsetting->getPosts(); 
		$this->load->view('templates/header.php');
		$this->load->view('mold_setting', $this->data);
		$this->load->view('templates/footer.php');
				
	}

}

	


	public function Moldsetting1()
	{
		$this->data['count'] = 1 ; 

		$this->data['Moldsetting'] = $this->Moldsetting->getMoldsetting1();
		// print_r($this->data['Moldsetting']);exit();
		$this->data['status_mold'] = $this->Moldsetting->getPosts(); 
		$this->load->view('templates/header.php');
		$this->load->view('mold_setting', $this->data);
		$this->load->view('templates/footer.php');
				
	}
	public function Moldsearch()
	{
		
		$this->data['Moldsearch'] = $this->Moldsearch->getMoldsearch();
		$this->load->view('templates/header.php');
		$this->load->view('mold_search', $this->data);
		$this->load->view('templates/footer.php');
				
	}
	public function Shortcounterhistory()
	{
		$this->data['Shortcounterhistory'] = $this->Shortcounterhistory->getShortcounterhistory();
		$this->load->view('templates/header.php');
		$this->load->view('Shortcounter_history', $this->data);
		$this->load->view('templates/footer.php');
				
	}
public function select ($search){

    $this->load->model('searchmodel');

    if(isset($_GET ['search']) && !empty($_GET['search'])) {

         if($result)
        {
            $data['result']=$result;
            $this->load->view('welcome_message', $data);
        }
        else
        {
            redirect('welcome_message');
        }
    }  
} 



public function savedata()
	{
		//load registration view form
		$this->load->view('mold_setting');
	
		//Check submit button 
		if($this->input->post('save'))
		{
		//get form's data and store in local varable
		$ms=$this->input->post('mold_setting');
		$m=$this->input->post('model');
		$ss=$this->input->post('shot_setting');
		$hd=$this->input->post('hard_setting');
		$cs=$this->input->post('change_setting');
		$mc=$this->input->post('m_c');
		
//call saverecords method of Hello_Model and pass variables as parameter
		$this->Moldsetting->saverecords($ms,$m,$ss,$hd,$cs,$cs);		
		echo "Records Saved Successfully";
		}
	}




public function Inspection_Result_Sheet(){ 
	if(!isset($this->session->userdata['username']) ||  ($this->session->userdata['username']=='')){
			$this->load->view('login');
	} else{
		// if($this->input->post('select_hotpress')){ 

		$this->data['select_hotpress'] =$this->input->post('select_hotpress') ;
		$hotpress = $this->input->post('select_hotpress');
		$hotpressp = $this->input->post('select_hotpress');
		// }
		// if(!isset($hotpress)){
		// 	$this->data['select_hotpress'] = 'Hot Press 6';
		// 	$hotpress = 'Hot Press 6';
		// }
		// if(!isset($hotpressp)){
		// 	$hotpressp = 'Hot Press 6';
		// } 
//FOr Die Start--------------------- 
	if($this->input->post('hotpress')){ 

		$hotpress = $this->input->post('hotpress');
		$moldd = $this->input->post('moldId');
		$item = $this->input->post('block');
		$query1 = $this->db->query("SELECT * FROM inspection_result_sheet_die where item ='".$item."' and hotpress ='".$hotpress."' and mold = '".$moldd."' "); 
		$query2 =$query1->result();  
		$tolerance = $this->input->post('tolerance');
		$point1 = $this->input->post('point1');
		$point2 = $this->input->post('point2');
		$point3 = $this->input->post('point3');
		$point4 = $this->input->post('point4');
		$maximum_value = max($point1,$point2,$point3,$point4);
		// print_r($maximum_value);exit();
		$item = $this->input->post('block');
		// $query1 = $this->db->query("SELECT * FROM mold_setting where   mold ='".$hotpress."'  "); 
		// $query2 =$query1->result();  


		$result = $this->input->post('result');
		$inspection_result_sheet = array(
			"hotpress"=> $hotpress,
			"item"=> $item,
			"tolerance"=> $tolerance,
			"point1"=> $point1,
			"point2"=> $point2,
			"point3"=> $point3,
			"point4"=> $point4,
			"maximum_value"=> $maximum_value,
			"result"=> $result,
			"mold"=> $moldd
		);

		// print_r($inspection_result_sheet);exit();

		if($query1->num_rows() > 0){ 
		  // $this->db->where(array( 'hotpress' =>$hotpress));
		  // $this->db->where(array( 'item' =>$item));
		  // $this->db->update('inspection_result_sheet_die', $inspection_result_sheet);

		  $this->db->query("UPDATE inspection_result_sheet_die set hotpress='$hotpress',
			item='$item',
			tolerance=N'$tolerance',
			point1='$point1',
			point2='$point2',
			point3='$point3',
			point4='$point4',
			maximum_value='$maximum_value',
			result= '$result'  where mold= '".$moldd."' and item ='".$item."' and hotpress ='".$hotpress."'  "); 

		}else{	
		
		$this->db->query("INSERT into inspection_result_sheet_die (hotpress,item,tolerance,point1,point2,point3,point4,maximum_value,result,mold) values ('$hotpress','$item',N'$tolerance','$point1','$point2','$point3','$point4','$maximum_value','$result','$moldd')"); 
		// $query = $this->db->insert('inspection_result_sheet_die', $inspection_result_sheet);	
		
		}	 
		}

//FOr Die End---------------------
//FOr punch Start---------------------
		if($this->input->post('hotpressp')){ 
			$moldp = $this->input->post('moldId');
			$hotpressp = $this->input->post('hotpressp');
			$item = $this->input->post('blockp');
			$query1 = $this->db->query("SELECT * FROM inspection_result_sheet_punch where item ='".$item."' and hotpress ='".$hotpressp."'  and mold = '".$moldp."' "); 
			$query2 =$query1->result();  
			$tolerance = $this->input->post('tolerancep');
			$point1 = $this->input->post('point1p');
			$point2 = $this->input->post('point2p');
			$point3 = $this->input->post('point3p');
			$point4 = $this->input->post('point4p'); 
			$result = $this->input->post('resultp');
			$inspection_result_sheet = array(
				"hotpress"=> $hotpressp,
				"item"=> $item,
				"tolerance"=> $tolerance,
				"point1"=> $point1,
				"point2"=> $point2,
				"point3"=> $point3,
				"point4"=> $point4, 
				"result"=> $result,
				"mold"=> $moldp
			);

			// print_r($inspection_result_sheet);exit();

			if($query1->num_rows() > 0){ 
			//   $this->db->where(array( 'hotpress' =>$hotpressp));
			//   $this->db->where(array( 'item' =>$item));
			//   $this->db->update('inspection_result_sheet_punch', $inspection_result_sheet);
			// }else{	
			
			
			// $query = $this->db->insert('inspection_result_sheet_punch', $inspection_result_sheet);	


				$this->db->query("UPDATE inspection_result_sheet_punch set hotpress='$hotpressp',
					item='$item',
					tolerance=N'$tolerance',
					point1='$point1',
					point2='$point2',
					point3='$point3',
					point4='$point4', 
					result= '$result'  where item ='".$item."' and hotpress ='".$hotpressp."'  and mold = '".$moldp."' "); 

				}else{	
				
				$this->db->query("INSERT into inspection_result_sheet_punch (hotpress,item,tolerance,point1,point2,point3,point4, result ,mold) values ('$hotpressp','$item',N'$tolerance','$point1','$point2','$point3','$point4', '$result' ,'$moldp')"); 
			
			}	 
		} 


//FOr punch end---------------------
//FOr mold Start---------------------
		if($this->input->post('hotpressm')){ 
			$moldp = $this->input->post('moldId');
			$hotpressm = $this->input->post('hotpressm');
			$part = $this->input->post('part'); 
			$item = $this->input->post('itemm');
			$query1 = $this->db->query("SELECT * FROM inspection_result_sheet_mold where part ='".$part."' and hotpress ='".$hotpressm."' and item ='".$item."'  "); 
			$query2 =$query1->result();   
			$qty = $this->input->post('qty');
			$standard = $this->input->post('standard');
			$remark = $this->input->post('remark'); 
			$result = $this->input->post('resultm');
			$inspection_result_sheet = array(
				"hotpress"=> $hotpressm,
				"item"=> $item,
				"part"=> $part, 
				"qty"=> $qty,
				"standard"=> $standard,
				"remark"=> $remark, 
				"result"=> $result,
				"mold"=> $moldp
			);

			// print_r($inspection_result_sheet);exit();

			if($query1->num_rows() > 0){ 
			//   $this->db->where(array( 'hotpress' =>$hotpressm));
			//   $this->db->where(array( 'part' =>$part));
			//   $this->db->where(array( 'item' =>$item));
			//   $this->db->update('inspection_result_sheet_mold', $inspection_result_sheet);
			// }else{	
			
			
			// $query = $this->db->insert('inspection_result_sheet_mold', $inspection_result_sheet);	

				$this->db->query("UPDATE inspection_result_sheet_mold set hotpress='$hotpress',
					item='$item',
					part=N'$part',
					qty='$qty',
					standard=N'$standard',
					remark='$remark',
					result='$result'  where item ='".$item."' and hotpress ='".$hotpress."' and mold = '".$moldp."'   "); 

				}else{	
				
				$this->db->query("INSERT into inspection_result_sheet_mold (hotpress,item,part,qty,standard,remark,result ,mold) values ('$hotpress','$item',N'$part','$qty','$standard','$remark','$result' ,'$moldp')"); 
			
				}	 
		}

//FOr mold end---------------------

		//For new row mold

		if($this->input->post('mrow')){ 
			$hotpressm = $this->input->post('mrow');
			$part = $this->input->post('part'); 
			$item = $this->input->post('itemm');
			$query1 = $this->db->query("SELECT * FROM inspection_result_sheet_mold where part ='".$part."' and hotpress ='".$hotpressm."' and item ='".$item."'  "); 
			$query2 =$query1->result();   
			$qty = $this->input->post('qty');
			$standard = $this->input->post('standard');
			$remark = $this->input->post('remark'); 
			$result = $this->input->post('resultm');
			$inspection_result_sheet = array(
				"hotpress"=> $hotpressm,
				"item"=> $item,
				"part"=> $part, 
				"qty"=> $qty,
				"standard"=> $standard,
				"remark"=> $remark, 
				"result"=> $result
			);  
			if($query1->num_rows() > 0){  
				$this->db->query("UPDATE inspection_result_sheet_mold set hotpress='$hotpress',
					item='$item',
					part=N'$part',
					qty='$qty',
					standard=N'$standard',
					remark='$remark',
					result='$result'  where item ='".$item."' and hotpress ='".$hotpress."'  "); 

				}else{	
				
				$this->db->query("INSERT into inspection_result_sheet_mold (hotpress,item,part,qty,standard,remark,result ) values ('$hotpress','$item',N'$part','$qty','$standard','$remark','$result' )"); 
			
			}	 
		}


		//end new row




		if($this->input->post("export"))
		{	 

			// $query = $this->db->query("SELECT * FROM inspection_result_sheet_die where hotpress= '$hotpress' ");  
			// $rail_head =   $query->result(); 
			$hotpress = $this->input->post('hotpress_data');
			$this->db->select("*"); 
		  $this->db->from('inspection_result_sheet_die'); 
		  $this->db->where('hotpress',$hotpress);
		  $this->db->order_by('item');
		  $query = $this->db->get();
		  $rail_head =   $query->result();
		  // print_r($rail_head);exit();

		  $this->db->select("*"); 
		  $this->db->from('inspection_result_sheet_punch'); 
		  $this->db->where('hotpress',$hotpress);
		  $this->db->order_by('item');
		  $query = $this->db->get();
		  $punch =   $query->result();


		  $this->db->select("*"); 
		  $this->db->from('inspection_result_sheet_mold'); 
		  $this->db->where('hotpress',$hotpress);
		  $this->db->order_by('item');
		  $query = $this->db->get();
		  $mold =   $query->result();

		  

			$row = 25;
	    	$col = 1;
		$this->load->library('excel');
		//activate worksheet number 1
		$this->excel->setActiveSheetIndex(0);
		$this->excel->getActiveSheet()->setShowGridlines(false);
		//name the worksheet
		$this->excel->getActiveSheet()->setTitle('Mold');
		$this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(12);
		$this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(12);
		$this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(12);
		$this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(12);
		$this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(12);
		$this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(12);
		$this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(12);
		$this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(12);
		$this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(12);
		$this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(12);
		$this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(12);
		$this->excel->getActiveSheet()->getColumnDimension('L')->setWidth(12);
		$this->excel->getActiveSheet()->getColumnDimension('M')->setWidth(12);
		$this->excel->getActiveSheet()->getColumnDimension('N')->setWidth(12);
		$this->excel->getActiveSheet()->getColumnDimension('O')->setWidth(12);
		$this->excel->getActiveSheet()->getColumnDimension('P')->setWidth(12);
		$this->excel->getActiveSheet()->getColumnDimension('Q')->setWidth(12);
		$this->excel->getActiveSheet()->getColumnDimension('R')->setWidth(12);
		$this->excel->getActiveSheet()->getColumnDimension('S')->setWidth(12);
		$this->excel->getActiveSheet()->getColumnDimension('T')->setWidth(12);
		$this->excel->getActiveSheet()->getColumnDimension('U')->setWidth(12);
		$this->excel->getActiveSheet()->getColumnDimension('V')->setWidth(12);
		$this->excel->getActiveSheet()->getColumnDimension('W')->setWidth(12); 


		$header_style = array(
		    'font'  => array(
		        'bold'  => true,
		        'color' => array('rgb' => '#000000'),
		        'size'  => 12,
		        'name'  => 'Times'
		    )
		);
		$this->excel->getActiveSheet()->getStyle('A1:H1')->applyFromArray($header_style);
		$this->excel->getActiveSheet()->getStyle('B2')->applyFromArray($header_style); 
		$this->excel->getActiveSheet()->mergeCells('A1:H1'); 
		$this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
		$this->excel->getActiveSheet()->getRowDimension('1')->setRowHeight(10); 
		$this->excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(12); 
		$this->excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
		foreach ($rail_head as $district) { $dist = $district;} 
		$this->excel->getActiveSheet()->setCellValue('A2', 'Inspection Result Sheet'); 
		$this->excel->getActiveSheet()->getStyle('C2')->getFont()->setSize(10); 
		$this->excel->getActiveSheet()->getStyle('C2')->getFont()->setBold(true); 
		$this->excel->getActiveSheet()->mergeCells('A2:F2'); 
		$this->excel->getActiveSheet()->setCellValue('G2', 'Date');
		$this->excel->getActiveSheet()->mergeCells('G2:H2'); 
		$this->excel->getActiveSheet()->getStyle('C2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
		$this->excel->getActiveSheet()->getStyle('B2')->getFont()->setSize(10); 
		$this->excel->getActiveSheet()->getStyle('M2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
		$this->excel->getActiveSheet()->getStyle('N2')->getFont()->setSize(10); 
		$this->excel->getActiveSheet()->getStyle('N2')->getFont()->setBold(true); 
		$this->excel->getActiveSheet()->getStyle('N2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$this->excel->getActiveSheet()->getRowDimension('2')->setRowHeight(15); 
		$this->excel->getActiveSheet()->getRowDimension('23')->setRowHeight(15); 
		$this->excel->getActiveSheet()->getRowDimension('33')->setRowHeight(15); 

		$this->excel->getActiveSheet()->getStyle('H2')->getFont()->setSize(10); 
		$this->excel->getActiveSheet()->getStyle('H2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
		$this->excel->getActiveSheet()->getRowDimension('3')->setRowHeight(15); 
		$this->excel->getActiveSheet()->getStyle('A3')->getFont()->setSize(10); 
		$this->excel->getActiveSheet()->getStyle('A3')->getFont()->setBold(true); 
		$this->excel->getActiveSheet()->mergeCells('A3:C3'); 
		$this->excel->getActiveSheet()->mergeCells('D3:F3'); 
		$this->excel->getActiveSheet()->mergeCells('G3:H3'); 
		$this->excel->getActiveSheet()->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);  

		$this->excel->getActiveSheet()->setCellValue('A3', 'Mold Name :Hot Press'); 
		$this->excel->getActiveSheet()->setCellValue('D3', 'Model :        '); 
		$this->excel->getActiveSheet()->setCellValue('G3', 'Code Mold :'); 





		// $this->excel->getActiveSheet()->setCellValue('A3', '<img src="381405_draw.png">'); 
		$this->excel->getActiveSheet()->getStyle('A23')->getFont()->setBold(true);
		$this->excel->getActiveSheet()->setCellValue('A23', 'The wear of the mold surface ( Die )'); 
		$this->excel->getActiveSheet()->getRowDimension('24')->setRowHeight(25);
		$this->excel->getActiveSheet()->getRowDimension('25')->setRowHeight(20); 
		$this->excel->getActiveSheet()->getStyle('A24')->getFont()->setSize(10); 
		$this->excel->getActiveSheet()->getStyle('A24')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('A24')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

		$styleArray = array(
		    'borders' => array(
		        'outline' => array(
		            'style' => PHPExcel_Style_Border::BORDER_DOUBLE,
		            'color' => array('argb' => '#000000'),
		        ),
		    ),
		);
		// $this->excel->getActiveSheet()->getStyle('A1:H1')->applyFromArray($styleArray);
		$styleArray1 = array(
		    'borders' => array(
		        'outline' => array(
		            'style' => PHPExcel_Style_Border::BORDER_THIN,
		            'color' => array('argb' => '#000000'),
		        ),
		    ),
		);
		$this->excel->getActiveSheet()->getStyle('A2')->applyFromArray($styleArray1);
		$this->excel->getActiveSheet()->getStyle('B2')->applyFromArray($styleArray1);
		$this->excel->getActiveSheet()->getStyle('C2:H2')->applyFromArray($styleArray1);
		$this->excel->getActiveSheet()->getStyle('H2')->applyFromArray($styleArray1); 



		$this->excel->getActiveSheet()->getStyle('A3')->applyFromArray($styleArray1); 
		$this->excel->getActiveSheet()->getStyle('D3')->applyFromArray($styleArray1);  
		$this->excel->getActiveSheet()->getStyle('G3')->applyFromArray($styleArray1);
		$this->excel->getActiveSheet()->getStyle('H3')->applyFromArray($styleArray1);
		  

		$styleArray2 = array(
		    'borders' => array(
		        'allborders' => array(
		            'style' => PHPExcel_Style_Border::BORDER_THIN,
		            'color' => array('argb' => '#000000'),
		        ),
		    ),
		);
		$this->excel->getActiveSheet()->getStyle('A23:H23')->applyFromArray($styleArray1);
		$this->excel->getActiveSheet()->getStyle('A24:H26')->applyFromArray($styleArray2);

		$styleArray3 = array(
		    'font'  => array(
		        'size'  => 10,
		    ),
		    'borders' => array(
		        'bottom' => array(
		            //'style' => PHPExcel_Style_Border::BORDER_THICK,
		            'color' => array('argb' => '#000000'),
		        ),
		    ),
		);
		$this->excel->getActiveSheet()->getStyle('A24:H24')->applyFromArray($styleArray3); 
		$this->excel->getActiveSheet()->getStyle('A24:H24')->getAlignment()->setWrapText(true); 
		$this->excel->getActiveSheet()->getStyle('A24:H24')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('A24:H24')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

		$this->excel->getActiveSheet()->getStyle('A25:H25')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('A25:H25')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

		$this->excel->getActiveSheet()->getStyle('A26:H26')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('A26:H26')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);


		$this->excel->getActiveSheet()->setCellValue('A24', 'Item'); 
		$this->excel->getActiveSheet()->setCellValue('B24', 'Tolerance'); 
		$this->excel->getActiveSheet()->setCellValue('C24', 'Point  1'); 
		$this->excel->getActiveSheet()->setCellValue('D24', 'Point  2'); 
		$this->excel->getActiveSheet()->setCellValue('E24', 'Point  3'); 
		$this->excel->getActiveSheet()->setCellValue('F24', 'Point  4'); 
		$this->excel->getActiveSheet()->setCellValue('G24', 'Maximum Value'); 
		$this->excel->getActiveSheet()->setCellValue('H24', 'Result data'); 
		 
		foreach ($rail_head as $value) { 
	    $styleArray4 = array(
	        'font'  => array(
	            'size'  => 10,
	        ),
	        'borders' => array(
	            'allborders' => array(
	                'style' => PHPExcel_Style_Border::BORDER_THIN,
	                'color' => array('argb' => '#000000'),
	            ),
	        ),
	    );
	    $this->excel->getActiveSheet()->getStyle('A'.$row.':H'.$row.'')->applyFromArray($styleArray4);
	    $this->excel->getActiveSheet()->getStyle('A'.$row.':H'.$row.'')->getAlignment()->setWrapText(true);
	    $this->excel->getActiveSheet()->getRowDimension($row)->setRowHeight(25);
	    
	    $this->excel->getActiveSheet()->getStyle('A'.$row.':H'.$row.'')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	    $this->excel->getActiveSheet()->getStyle('A'.$row.':H'.$row.'')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
	    
	    $item = $value->item;
	    $tolerance = $value->tolerance;
	    $point1 = $value->point1;
	    $point2 = $value->point2;
	    $point3 = $value->point3; 
	    $point4 = $value->point4;
	    $quantity = $value->maximum_value;
	    $result = $value->result; 

	    $this->excel->getActiveSheet()->setCellValue('A'.$row.'', $item);
	    $this->excel->getActiveSheet()->setCellValue('B'.$row.'', 'ไม่เกิน 0.18mm');
	    $this->excel->getActiveSheet()->setCellValue('C'.$row.'', $point1);
	    $this->excel->getActiveSheet()->setCellValue('D'.$row.'', $point2);
	    $this->excel->getActiveSheet()->setCellValue('E'.$row.'', $point3);
	    $this->excel->getActiveSheet()->setCellValue('F'.$row.'', $point4);
	    $this->excel->getActiveSheet()->setCellValue('G'.$row.'', $quantity);
	    $this->excel->getActiveSheet()->setCellValue('H'.$row.'', $result);  
	    
	    $row++;
	}


//punch 


$this->excel->getActiveSheet()->getStyle('A33')->getFont()->setBold(true);
$this->excel->getActiveSheet()->setCellValue('A33', 'The wear of the mold surface ( Punch )'); 
$this->excel->getActiveSheet()->getRowDimension('34')->setRowHeight(25);
$this->excel->getActiveSheet()->getRowDimension('35')->setRowHeight(20); 
$this->excel->getActiveSheet()->getStyle('A34')->getFont()->setSize(10); 
$this->excel->getActiveSheet()->getStyle('A34')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$this->excel->getActiveSheet()->getStyle('A34')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

  $this->excel->getActiveSheet()->getStyle('A33:H33')->applyFromArray($styleArray1);
  $this->excel->getActiveSheet()->getStyle('A34:G34')->applyFromArray($styleArray2);
$this->excel->getActiveSheet()->getStyle('A34:G34')->applyFromArray($styleArray3); 
$this->excel->getActiveSheet()->getStyle('A34:G34')->getAlignment()->setWrapText(true); 
$this->excel->getActiveSheet()->getStyle('A34:G34')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$this->excel->getActiveSheet()->getStyle('A34:G34')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

$this->excel->getActiveSheet()->getStyle('A35:G35')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$this->excel->getActiveSheet()->getStyle('A35:G35')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

$this->excel->getActiveSheet()->getStyle('A36:G36')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$this->excel->getActiveSheet()->getStyle('A36:G36')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);


$this->excel->getActiveSheet()->setCellValue('A34', 'Item'); 
$this->excel->getActiveSheet()->setCellValue('B34', 'Tolerance'); 
$this->excel->getActiveSheet()->setCellValue('C34', 'Point  1'); 
$this->excel->getActiveSheet()->setCellValue('D34', 'Point  2'); 
$this->excel->getActiveSheet()->setCellValue('E34', 'Point  3'); 
$this->excel->getActiveSheet()->setCellValue('F34', 'Point  4');  
$this->excel->getActiveSheet()->setCellValue('G34', 'Result data'); 
 $row1 = 35;
foreach ($punch as $value) { 
    $styleArray4 = array(
        'font'  => array(
            'size'  => 10,
        ),
        'borders' => array(
            'allborders' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN,
                'color' => array('argb' => '#000000'),
            ),
        ),
    );
    $this->excel->getActiveSheet()->getStyle('A'.$row1.':G'.$row1.'')->applyFromArray($styleArray4);
    $this->excel->getActiveSheet()->getStyle('A'.$row1.':G'.$row1.'')->getAlignment()->setWrapText(true);
    $this->excel->getActiveSheet()->getRowDimension($row1)->setRowHeight(25);
    
    $this->excel->getActiveSheet()->getStyle('A'.$row1.':G'.$row1.'')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $this->excel->getActiveSheet()->getStyle('A'.$row1.':G'.$row1.'')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
    
    $item = $value->item;
    $tolerance = $value->tolerance;
    $point1 = $value->point1;
    $point2 = $value->point2;
    $point3 = $value->point3; 
    $point4 = $value->point4; 
    $result = $value->result; 

    $this->excel->getActiveSheet()->setCellValue('A'.$row1.'', $item);
    $this->excel->getActiveSheet()->setCellValue('B'.$row1.'', 'ไม่แตกร้าว,ผิวบิ่น');
    $this->excel->getActiveSheet()->setCellValue('C'.$row1.'', $point1);
    $this->excel->getActiveSheet()->setCellValue('D'.$row1.'', $point2);
    $this->excel->getActiveSheet()->setCellValue('E'.$row1.'', $point3);
    $this->excel->getActiveSheet()->setCellValue('F'.$row1.'', $point4); 
    $this->excel->getActiveSheet()->setCellValue('G'.$row1.'', $result);  
    
    $row1++;
}


//punch end






//mold 
$this->excel->getActiveSheet()->getStyle('A43')->getFont()->setBold(true);
$this->excel->getActiveSheet()->getRowDimension('43')->setRowHeight(18);

$this->excel->getActiveSheet()->setCellValue('A43', 'Overall Condition of the mold'); 
$this->excel->getActiveSheet()->getRowDimension('44')->setRowHeight(25);
$this->excel->getActiveSheet()->getRowDimension('45')->setRowHeight(20); 
$this->excel->getActiveSheet()->getStyle('A44')->getFont()->setSize(10); 
$this->excel->getActiveSheet()->getStyle('A44')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$this->excel->getActiveSheet()->getStyle('A44')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

  $this->excel->getActiveSheet()->getStyle('A43:H43')->applyFromArray($styleArray1);
  $this->excel->getActiveSheet()->getStyle('A44:H44')->applyFromArray($styleArray2);
$this->excel->getActiveSheet()->getStyle('A44:H44')->applyFromArray($styleArray4); 
$this->excel->getActiveSheet()->getStyle('A44:H44')->getAlignment()->setWrapText(true); 
$this->excel->getActiveSheet()->getStyle('A44:H44')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$this->excel->getActiveSheet()->getStyle('A44:H44')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

$this->excel->getActiveSheet()->getStyle('A45:H45')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$this->excel->getActiveSheet()->getStyle('A45:H45')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

$this->excel->getActiveSheet()->getStyle('A46:H46')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$this->excel->getActiveSheet()->getStyle('A46:H46')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

$this->excel->getActiveSheet()->mergeCells('D44:F44'); 
$this->excel->getActiveSheet()->getStyle('D44:F44')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$this->excel->getActiveSheet()->setCellValue('A44', 'Item'); 
$this->excel->getActiveSheet()->setCellValue('B44', 'Part Name'); 
$this->excel->getActiveSheet()->setCellValue('C44', "Q'ty"); 
$this->excel->getActiveSheet()->setCellValue('D44', 'Standard'); 
$this->excel->getActiveSheet()->setCellValue('G44', 'Result'); 
$this->excel->getActiveSheet()->setCellValue('H44', 'Remark');   
 $row2 = 45;
foreach ($mold as $value) { 
    $styleArray4 = array(
        'font'  => array(
            'size'  => 10,
        ),
        'borders' => array(
            'allborders' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN,
                'color' => array('argb' => '#000000'),
            ),
        ),
    );
    $this->excel->getActiveSheet()->mergeCells('D'.$row2.':F'.$row2.''); 
    $this->excel->getActiveSheet()->getStyle('D'.$row2.':F'.$row2.'')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);


    $this->excel->getActiveSheet()->getStyle('A'.$row2.':H'.$row2.'')->applyFromArray($styleArray4);
    $this->excel->getActiveSheet()->getStyle('A'.$row2.':H'.$row2.'')->getAlignment()->setWrapText(true);
    $this->excel->getActiveSheet()->getRowDimension($row2)->setRowHeight(25);
    
    $this->excel->getActiveSheet()->getStyle('A'.$row2.':H'.$row2.'')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $this->excel->getActiveSheet()->getStyle('A'.$row2.':H'.$row2.'')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
    
    $item = $value->item;
    $part = $value->part;
    $qty = $value->qty;
    $standard = $value->standard;
    $result = $value->result; 
    $remark = $value->remark;  

    $this->excel->getActiveSheet()->setCellValue('A'.$row2.'', $item);
    $this->excel->getActiveSheet()->setCellValue('B'.$row2.'', $part);
    $this->excel->getActiveSheet()->setCellValue('C'.$row2.'', $qty);
    $this->excel->getActiveSheet()->setCellValue('D'.$row2.'', $standard);
    $this->excel->getActiveSheet()->setCellValue('G'.$row2.'', $result); 
    $this->excel->getActiveSheet()->setCellValue('H'.$row2.'', $remark);  
    
    $row2++;
}


//mold end

$this->excel->getActiveSheet()->mergeCells('A57:E57'); 
$this->excel->getActiveSheet()->getStyle('A57:E57')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 

$this->excel->getActiveSheet()->mergeCells('A58:E58'); 
$this->excel->getActiveSheet()->getStyle('A58:E58')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 

$this->excel->getActiveSheet()->getStyle('A57:E57')->applyFromArray($styleArray4); 

$this->excel->getActiveSheet()->getStyle('A58:E58')->applyFromArray($styleArray4); 

$this->excel->getActiveSheet()->getStyle('F57')->applyFromArray($styleArray4); 
$this->excel->getActiveSheet()->getStyle('G57')->applyFromArray($styleArray4); 
$this->excel->getActiveSheet()->getStyle('H57')->applyFromArray($styleArray4); 
$this->excel->getActiveSheet()->getStyle('F58')->applyFromArray($styleArray4); 
$this->excel->getActiveSheet()->getStyle('G58')->applyFromArray($styleArray4); 
$this->excel->getActiveSheet()->getStyle('H58')->applyFromArray($styleArray4); 


 $this->excel->getActiveSheet()->getStyle('F57')->getFont()->setBold(true); 
$this->excel->getActiveSheet()->getStyle('G57')->getFont()->setBold(true); 
$this->excel->getActiveSheet()->getStyle('H57')->getFont()->setBold(true); 

$this->excel->getActiveSheet()->setCellValue('F57', 'Inspection by'); 
$this->excel->getActiveSheet()->setCellValue('G57', 'Checked by'); 
$this->excel->getActiveSheet()->setCellValue('H57', "Approved by"); 
$this->excel->getActiveSheet()->setCellValue('F58', ''); 
$this->excel->getActiveSheet()->setCellValue('G58', ''); 
$this->excel->getActiveSheet()->setCellValue('H58', '');  

$this->excel->getActiveSheet()->getRowDimension('60')->setRowHeight(18);
$this->excel->getActiveSheet()->mergeCells('A60:C60'); 
$this->excel->getActiveSheet()->mergeCells('D60:F60'); 
$this->excel->getActiveSheet()->mergeCells('G60:H60'); 
$this->excel->getActiveSheet()->setCellValue('A60', 'Form Number : FR-MN-014'); 
$this->excel->getActiveSheet()->setCellValue('D60', 'Akebono Brake ( Thailand) Co.,Ltd'); 
$this->excel->getActiveSheet()->setCellValue('G60', "Revision 00(April 25,2014)"); 




 
$filename='MoldReport.xls'; //save our workbook as this file name
header('Content-Type: application/vnd.ms-excel'); //mime type
header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
// header('Cache-Control: max-age=0'); //no cache

//if you want to save it as .XLSX Excel 2007 format
// $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');



// $gdImage = imagecreatefrompng('img/381405_draw.png');
// $objDrawing = new PHPExcel_Worksheet_MemoryDrawing();
// $objDrawing->setName('Sample image');
// $objDrawing->setDescription('TEST');
// $objDrawing->setImageResource($gdImage);
// $objDrawing->setRenderingFunction(PHPExcel_Worksheet_MemoryDrawing::RENDERING_PNG);
// $objDrawing->setMimeType(PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_DEFAULT);
// $objDrawing->setHeight(100);
// $objDrawing->setCoordinates('A3');
// $objDrawing->setWorksheet($this->excel->getActiveSheet());


 
$objDrawing = new PHPExcel_Worksheet_Drawing();
$objDrawing->setPath('./img/381405_draw.png');
$objDrawing->setHeight(85);
$objDrawing->setCoordinates('B5');
$objDrawing->setWorksheet($this->excel->getActiveSheet());

$objDrawing = new PHPExcel_Worksheet_Drawing();
$objDrawing->setPath('./img/381405_draw.png');
$objDrawing->setHeight(85);
$objDrawing->setCoordinates('D5');
$objDrawing->setWorksheet($this->excel->getActiveSheet());

if($hotpress == 'Hot Press 6'){
$objDrawing = new PHPExcel_Worksheet_Drawing();
$objDrawing->setPath('./img/381405_draw.png');
$objDrawing->setHeight(85);
$objDrawing->setCoordinates('F5');
$objDrawing->setWorksheet($this->excel->getActiveSheet());
}

$objDrawing = new PHPExcel_Worksheet_Drawing();
$objDrawing->setPath('./img/381405_draw.png');
$objDrawing->setHeight(85);
$objDrawing->setCoordinates('B14');
$objDrawing->setWorksheet($this->excel->getActiveSheet());

$objDrawing = new PHPExcel_Worksheet_Drawing();
$objDrawing->setPath('./img/381405_draw.png');
$objDrawing->setHeight(85);
$objDrawing->setCoordinates('D14');
$objDrawing->setWorksheet($this->excel->getActiveSheet());

if($hotpress == 'Hot Press 6'){
$objDrawing = new PHPExcel_Worksheet_Drawing();
$objDrawing->setPath('./img/381405_draw.png');
$objDrawing->setHeight(85);
$objDrawing->setCoordinates('F14');
$objDrawing->setWorksheet($this->excel->getActiveSheet());
}  
$objWriter =  PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
ob_end_clean();
ob_start();
 

$objWriter->save('php://output');

// $this->data['Mold_Die_History_Record'] =$this->Mold_Die_History_Record->Mold_Die_History_Record_get();
// $this->load->view('templates/header.php');
// $this->load->view('Mold_Die_History_Record', $this->data);
// $this->load->view('templates/footer.php'); 
//    //--------------------------------------END OF XLS----------------------------------------------
// exit();

} 




	 
	$this->data['inspectiona'] =$this->Inspection_Result_Sheet->Inspection_Result_Sheet_get('Block A',$this->input->post('moldId'));
 
	$this->data['inspectionb'] =$this->Inspection_Result_Sheet->Inspection_Result_Sheet_get('Block B',$this->input->post('moldId'));
	$this->data['inspectionc'] =$this->Inspection_Result_Sheet->Inspection_Result_Sheet_get('Block C',$this->input->post('moldId'));
	$this->data['inspectiond'] =$this->Inspection_Result_Sheet->Inspection_Result_Sheet_get('Block D',$this->input->post('moldId'));
	$this->data['inspectione'] =$this->Inspection_Result_Sheet->Inspection_Result_Sheet_get('Block E',$this->input->post('moldId'));
	$this->data['inspectionf'] =$this->Inspection_Result_Sheet->Inspection_Result_Sheet_get('Block F',$this->input->post('moldId'));


	$this->data['puncha'] =$this->Inspection_Result_Sheet->Inspection_Result_Sheetpunch('Block A',$this->input->post('moldId'));
	$this->data['punchb'] =$this->Inspection_Result_Sheet->Inspection_Result_Sheetpunch('Block B',$this->input->post('moldId'));
	$this->data['punchc'] =$this->Inspection_Result_Sheet->Inspection_Result_Sheetpunch('Block C',$this->input->post('moldId'));
	$this->data['punchd'] =$this->Inspection_Result_Sheet->Inspection_Result_Sheetpunch('Block D',$this->input->post('moldId'));
	$this->data['punche'] =$this->Inspection_Result_Sheet->Inspection_Result_Sheetpunch('Block E',$this->input->post('moldId'));
	$this->data['punchf'] =$this->Inspection_Result_Sheet->Inspection_Result_Sheetpunch('Block F',$this->input->post('moldId'));



$this->data['mold1'] =$this->Inspection_Result_Sheet->Inspection_Result_Sheet_mold($hotpress,'Pin',1,$this->input->post('moldId'));
$this->data['mold2'] =$this->Inspection_Result_Sheet->Inspection_Result_Sheet_mold($hotpress,'ฝาโมลด์',2,$this->input->post('moldId'));
$this->data['mold3'] =$this->Inspection_Result_Sheet->Inspection_Result_Sheet_mold($hotpress,'Spring mold',3,$this->input->post('moldId'));
$this->data['mold4'] =$this->Inspection_Result_Sheet->Inspection_Result_Sheet_mold($hotpress,'Bush',4,$this->input->post('moldId')); 
$this->data['mold5'] =$this->Inspection_Result_Sheet->Inspection_Result_Sheet_mold($hotpress,'Stopper (knock out)',5,$this->input->post('moldId'));
$this->data['mold6'] =$this->Inspection_Result_Sheet->Inspection_Result_Sheet_mold($hotpress,'Cover',6,$this->input->post('moldId'));
$this->data['mold7'] =$this->Inspection_Result_Sheet->Inspection_Result_Sheet_mold($hotpress,'Punch',7,$this->input->post('moldId'));
$this->data['mold8'] =$this->Inspection_Result_Sheet->Inspection_Result_Sheet_mold($hotpress,'Die',8,$this->input->post('moldId'));
$this->data['mold9'] =$this->Inspection_Result_Sheet->Inspection_Result_Sheet_mold($hotpress,'ฝาโมลด์',9,$this->input->post('moldId'));
$this->data['mold10'] =$this->Inspection_Result_Sheet->Inspection_Result_Sheet_mold($hotpress,'Pin ยึดตำแหน่งฝาโมลด์',10,$this->input->post('moldId'));
$this->data['mold11'] =$this->Inspection_Result_Sheet->Inspection_Result_Sheet_mold($hotpress,'Triper bolt nut',11,$this->input->post('moldId'));
$this->data['mold12'] =$this->Inspection_Result_Sheet->Inspection_Result_Sheet_mold($hotpress,'Dis spring',12,$this->input->post('moldId'));







//Operate mold button code styarts

		if($this->input->post('currentshots')){ 

			 $this->data['moldId'] =   $this->input->post('moldId');
			// redirect('/Machinecontrol',$this->data);
			$model = $this->input->post('model'); 
			$mold_no = str_replace('HP-', '', $this->input->post('moldId'));
			//$targets = array( 
			//"COMPLETE"=> '0' 
			//); 
			//$this->db->where(array( 'mold_no' =>  $mold_no));
			//$th;
			$targets = array( 
			"shot_current"=> '0' 
			); 
			$this->db->where(array( 'mold_setting_id' =>  $mold_no));
			$this->db->update('status_mold', $targets ); 


			$target = array( 
			"current_shot"=> $this->input->post('shot_current') ,
			"hard_chrome_shot"=> $this->input->post('hard_chrome') ,
			"maximum_shot"=> $this->input->post('Maximum')  ,
			"date"=> date('Y-m-d H:i:s') ,
			"mold"=> $this->input->post('moldId') ,
			"type"=> 'currentshots'
			); 
			$this->db->insert('identification', $target); 

		}

		if($this->input->post('hardchromeshots')){ 
			 $this->data['moldId'] =   $this->input->post('moldId');
			$model = $this->input->post('model'); 
			$mold_no = str_replace('HP-', '', $this->input->post('moldId'));
			
			$targets = array( 
			"shot_current"=> '0' ,
			"hard_current"=> '0' 
			); 
			$this->db->where(array( 'mold_setting_id' =>  $mold_no));
			$this->db->update('status_mold', $targets ); 


			$target = array( 
			"current_shot"=> $this->input->post('shot_current') ,
			"hard_chrome_shot"=> $this->input->post('hard_chrome') ,
			"maximum_shot"=> $this->input->post('Maximum')  ,
			"date"=> date('Y-m-d H:i:s') ,
			"mold"=> $this->input->post('moldId')  ,
			"type"=> 'hardchromeshots'
			); 
			$this->db->insert('identification', $target); 
		}

		if($this->input->post('diechange')){ 
			 $this->data['moldId'] =   $this->input->post('moldId');
			$model = $this->input->post('model'); 
			$mold_no = str_replace('HP-', '', $this->input->post('moldId'));
			
			$targets = array( 
			"shot_current"=> '0' ,
			"hard_current"=> '0' ,
			"change_current"=> '0' 
			); 
			$this->db->where(array( 'mold_setting_id' =>  $mold_no));
			$this->db->update('status_mold', $targets ); 
			
		  

			$target = array( 
			"current_shot"=> $this->input->post('shot_current') ,
			"hard_chrome_shot"=> $this->input->post('hard_chrome') ,
			"maximum_shot"=> $this->input->post('Maximum')  ,
			"date"=> date('Y-m-d H:i:s') ,
			"mold"=> $this->input->post('moldId')  ,
			"type"=> 'diechange'
			); 
			$this->db->insert('identification', $target); 
		}		
		

	if($this->input->post('moldId')){ 
		$query1 = $this->db->query("SELECT * FROM mold_setting where mold ='".$this->input->post('moldId')."'  "); 
		$query2 =$query1->result();  
		 $this->data['mold_setting_data'] = $query2;
	}	 
		$query1 = $this->db->query("SELECT * FROM mold_setting "); 
		$query2 =$query1->result();  
		 $this->data['mold_settingdata'] = $query2;
	 

$this->data['moldId'] =$this->input->post('moldId') ;


//print_r($this->data['moldId']);exit;

	$this->load->view('templates/header.php');
	$this->load->view('Inspection_Result_Sheet', $this->data);
	$this->load->view('templates/footer.php');  


}
	
}

public function Mold_Die_History_Record(){
	// print_r('expression');exit();
	if(!isset($this->session->userdata['username']) ||  ($this->session->userdata['username']=='')){
			$this->load->view('login');
		} else{


	
	if($this->input->post("export"))
		{	 

	 
		  

			$row = 4;
	    	$col = 1;
$this->load->library('excel');
//activate worksheet number 1
$this->excel->setActiveSheetIndex(0);
$this->excel->getActiveSheet()->setShowGridlines(false); 
$this->excel->getActiveSheet()->setTitle('Mold');
$this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(12);
$this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(12);
$this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(12);
$this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(12);
$this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(12);
$this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(12);  
$header_style = array(
    'font'  => array(
        'bold'  => true,
        'color' => array('rgb' => '#000000'),
        'size'  => 12,
        'name'  => 'Times'
    )
);
$this->excel->getActiveSheet()->getStyle('A1:F1')->applyFromArray($header_style);
$this->excel->getActiveSheet()->getStyle('B2')->applyFromArray($header_style); 
$this->excel->getActiveSheet()->mergeCells('A1:F1'); 
$this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
$this->excel->getActiveSheet()->getRowDimension('1')->setRowHeight(10); 
$this->excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(12); 
$this->excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);  
$this->excel->getActiveSheet()->setCellValue('A2', 'MOLD & DIE HISTORY RECORD'); 
$this->excel->getActiveSheet()->getStyle('C2')->getFont()->setSize(10); 
$this->excel->getActiveSheet()->getStyle('C2')->getFont()->setBold(true); 
$this->excel->getActiveSheet()->mergeCells('A2:F2');  
$this->excel->getActiveSheet()->getStyle('C2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
$this->excel->getActiveSheet()->getStyle('B2')->getFont()->setSize(10); 
$this->excel->getActiveSheet()->getStyle('M2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
$this->excel->getActiveSheet()->getStyle('N2')->getFont()->setSize(10); 
$this->excel->getActiveSheet()->getStyle('N2')->getFont()->setBold(true); 
$this->excel->getActiveSheet()->getStyle('N2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$this->excel->getActiveSheet()->getRowDimension('2')->setRowHeight(15); 
$this->excel->getActiveSheet()->getRowDimension('23')->setRowHeight(15); 
$this->excel->getActiveSheet()->getRowDimension('33')->setRowHeight(15); 

$this->excel->getActiveSheet()->getStyle('F2')->getFont()->setSize(10); 
$this->excel->getActiveSheet()->getStyle('F2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
$this->excel->getActiveSheet()->getRowDimension('3')->setRowHeight(15); 
$this->excel->getActiveSheet()->getStyle('A3')->getFont()->setSize(10); 
$this->excel->getActiveSheet()->getStyle('A3')->getFont()->setBold(true); 
$this->excel->getActiveSheet()->mergeCells('A3:F3'); 
$this->excel->getActiveSheet()->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);  

$this->excel->getActiveSheet()->setCellValue('A3', '(บันทึกประวัติแม่พิมพ์)');  



$styleArray = array(
    'borders' => array(
        'outline' => array(
            'style' => PHPExcel_Style_Border::BORDER_DOUBLE,
            'color' => array('argb' => '#000000'),
        ),
    ),
);
// $this->excel->getActiveSheet()->getStyle('A1:H1')->applyFromArray($styleArray);
$styleArray1 = array(
    'borders' => array(
        'allborders' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN,
            'color' => array('argb' => '#000000'),
        ),
    ),
);
$styleArray2 = array(
    'borders' => array(
        'allborders' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN,
            'color' => array('argb' => '#000000'),
        ),
    ),
); 
$styleArray3 = array(
    'font'  => array(
        'size'  => 10,
    ),
    'borders' => array(
        'right' => array(
            'style' => PHPExcel_Style_Border::BORDER_THICK,
            'color' => array('argb' => '#000000'),
        ),
    ),
);
$this->excel->getActiveSheet()->getStyle('A2')->applyFromArray($styleArray);
$this->excel->getActiveSheet()->getStyle('A3')->applyFromArray($styleArray1);
$this->excel->getActiveSheet()->getStyle('A3')->applyFromArray($styleArray3);
// $this->excel->getActiveSheet()->setCellValue('A3', '<img src="381405_draw.png">'); 
$this->excel->getActiveSheet()->mergeCells('B5:C5'); 
$this->excel->getActiveSheet()->mergeCells('E5:F5'); 
$this->excel->getActiveSheet()->mergeCells('B6:C6'); 
$this->excel->getActiveSheet()->mergeCells('E6:F6'); 

$this->excel->getActiveSheet()->getStyle('A5')->getFont()->setBold(true);
$this->excel->getActiveSheet()->setCellValue('A5', 'Model Name '); 
$this->excel->getActiveSheet()->setCellValue('B5', ' '); 
$this->excel->getActiveSheet()->setCellValue('D5', ' Mold No. '); 
$this->excel->getActiveSheet()->setCellValue('E5', ' '); 
$this->excel->getActiveSheet()->setCellValue('A6', 'Location'); 
$this->excel->getActiveSheet()->setCellValue('B6', ' '); 
$this->excel->getActiveSheet()->setCellValue('D6', 'Maker'); 
$this->excel->getActiveSheet()->setCellValue('E6', ' '); 
$this->excel->getActiveSheet()->getRowDimension('5')->setRowHeight(25);
$this->excel->getActiveSheet()->getRowDimension('6')->setRowHeight(20); 
$this->excel->getActiveSheet()->getStyle('A5')->applyFromArray($styleArray1);
$this->excel->getActiveSheet()->getStyle('A6')->applyFromArray($styleArray1);
$this->excel->getActiveSheet()->getStyle('B5')->applyFromArray($styleArray1);
$this->excel->getActiveSheet()->getStyle('B6')->applyFromArray($styleArray1);
$this->excel->getActiveSheet()->getStyle('E5')->applyFromArray($styleArray1);
$this->excel->getActiveSheet()->getStyle('E6')->applyFromArray($styleArray1);
$this->excel->getActiveSheet()->getStyle('D5')->applyFromArray($styleArray1);
$this->excel->getActiveSheet()->getStyle('D6')->applyFromArray($styleArray1);



$this->excel->getActiveSheet()->mergeCells('A7:C7'); 
$this->excel->getActiveSheet()->mergeCells('D7:F7'); 
$this->excel->getActiveSheet()->getStyle('A7')->applyFromArray($styleArray1); 
$this->excel->getActiveSheet()->getStyle('D7')->applyFromArray($styleArray1); 
$this->excel->getActiveSheet()->getStyle('A7:C7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
$this->excel->getActiveSheet()->getStyle('D7:F7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 


$this->excel->getActiveSheet()->setCellValue('A7', 'Drawing Pad'); 
$this->excel->getActiveSheet()->setCellValue('D7', 'Picture Mold');  




$this->excel->getActiveSheet()->mergeCells('E18:F18'); 

$this->excel->getActiveSheet()->setCellValue('A18', 'วันที่'); 
$this->excel->getActiveSheet()->setCellValue('B18', 'รายละเอียด'); 
$this->excel->getActiveSheet()->setCellValue('C18', 'รายละเอียดการซ่อม'); 
$this->excel->getActiveSheet()->setCellValue('D18', 'ผู้รับผิดชอบ'); 
$this->excel->getActiveSheet()->setCellValue('E18', 'หมายเหตุ');  
$this->excel->getActiveSheet()->getStyle('A18')->applyFromArray($styleArray1); 
$this->excel->getActiveSheet()->getStyle('B18')->applyFromArray($styleArray1); 
$this->excel->getActiveSheet()->getStyle('C18')->applyFromArray($styleArray1); 
$this->excel->getActiveSheet()->getStyle('D18')->applyFromArray($styleArray1); 
$this->excel->getActiveSheet()->getStyle('E18')->applyFromArray($styleArray1);  
 

$row=19;
for($i=0;$i>10;$i++) { 
$styleArray4 = array(
        'font'  => array(
            'size'  => 10,
        ),
        'borders' => array(
            'allborders' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN,
                'color' => array('argb' => '#000000'),
            ),
        ),
    ); 
	$this->excel->getActiveSheet()->mergeCells('E'.$row.':F'.$row.'');
    
    $this->excel->getActiveSheet()->getStyle('A'.$row.':E'.$row.'')->applyFromArray($styleArray4);
    $this->excel->getActiveSheet()->getStyle('A'.$row.':E'.$row.'')->getAlignment()->setWrapText(true);
    $this->excel->getActiveSheet()->getRowDimension($row)->setRowHeight(25);
    
    $this->excel->getActiveSheet()->getStyle('A'.$row.':E'.$row.'')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $this->excel->getActiveSheet()->getStyle('A'.$row.':E'.$row.'')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
     

    $this->excel->getActiveSheet()->setCellValue('A'.$row.'', '');
    $this->excel->getActiveSheet()->setCellValue('B'.$row.'', '');
    $this->excel->getActiveSheet()->setCellValue('C'.$row.'', '');
    $this->excel->getActiveSheet()->setCellValue('D'.$row.'', '');
    $this->excel->getActiveSheet()->setCellValue('E'.$row.'', ''); 
    
    $row++;
}


$this->excel->getActiveSheet()->mergeCells('A30:F30'); 
$this->excel->getActiveSheet()->getStyle('A30:E30')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 

$this->excel->getActiveSheet()->mergeCells('A32:F32'); 
$this->excel->getActiveSheet()->getStyle('A32:F32')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT); 
 

 $this->excel->getActiveSheet()->getStyle('A32:F32')->getFont()->setBold(true);  

$this->excel->getActiveSheet()->setCellValue('A32', 'หมายเหตุ :  เมื่อมีการซ่อมแก้ไข ดัดแปลง เปลี่ยนชิ้นส่วนแม่พิมพ์ให้ลงบันทึกรายละเอียดทุกครั้ง');  

$this->excel->getActiveSheet()->getRowDimension('33')->setRowHeight(18);
$this->excel->getActiveSheet()->mergeCells('A33:B33'); 
$this->excel->getActiveSheet()->mergeCells('C33:D33'); 
$this->excel->getActiveSheet()->mergeCells('E33:F33'); 
$this->excel->getActiveSheet()->setCellValue('A33', 'Form Number : FR-MN-014'); 
$this->excel->getActiveSheet()->setCellValue('C33', 'Akebono Brake ( Thailand) Co.,Ltd'); 
$this->excel->getActiveSheet()->setCellValue('E33', "Revision 00(April 25,2014)"); 

 
$filename='MoldDieReport.xls'; //save our workbook as this file name
header('Content-Type: application/vnd.ms-excel'); //mime type
header('Content-Disposition: attachment;filename="'.$filename.'"');  
 
$objWriter =  PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
ob_end_clean();
ob_start();
  
$objWriter->save('php://output'); 
}		

	$mold_no = str_replace('HP-', '', $this->input->post('moldId')) ; 
 
if($this->input->post('searchdisplay')){ 

	$startdate = $this->input->post('startdate') .' 00:00:00.000';
	$enddate = $this->input->post('enddate').' 00:00:00.000';
	$mold = $this->input->post('moldId'); 

	$query = $this->db->query("SELECT * FROM mold_die_history where  mold = '$mold' "); 
 	$status_mold = $this->db->query("SELECT * FROM status_mold where   mold_setting_id ='".$mold_no."'    "); 

	if($startdate!=' 00:00:00.000' && $enddate!=' 00:00:00.000'){	
		$query = $this->db->query("SELECT * FROM mold_die_history where date >= '$startdate' and date <= '$enddate'  ");  
		$status_mold = $this->db->query("SELECT * FROM status_mold where    time >= '$startdate' and time <= '$enddate'  mold_setting_id ='".$mold_no."'    "); 
	} 
	if(isset($mold)){	
		$query = $this->db->query("SELECT * FROM mold_die_history where  mold = '$mold' "); 
		$status_mold = $this->db->query("SELECT * FROM status_mold where   mold_setting_id ='".$mold_no."'    "); 
	}
 
 	


	$status_mold_data =$status_mold->result(); 

  
	$query2 = $query->result();
} 
else{
	$status_mold = $this->db->query("SELECT * FROM status_mold where   mold_setting_id ='".$mold_no."'    "); 
	$status_mold_data =$status_mold->result(); 

	
}	

  
 if($this->input->post('date')){ 

 		$mold = $this->input->post('moldId');
 		$date = $this->input->post('date'); 
 		$query1 = $this->db->query("SELECT * FROM mold_die_history where  date ='".$date."'  and  mold ='".$mold."'    "); 
 		$query2 =$query1->result();  
 		$c1 = $this->input->post('c1');
 		$c2 = $this->input->post('c2');
 		$c3 = $this->input->post('c3');
 		$c4 = $this->input->post('c4');  

 		if($query1->num_rows() > 0){  

 		  $this->db->query("UPDATE mold_die_history set c1='$c1',
 			c2='$c2',
 			c3='$c3',
 			c4='$c4'
 			  where  date ='".$date."' and  mold ='".$mold."'  "); 

 		}else {
				$targets = array(
					'c1'=>$c1,
					'c2'=>$c2,
					'c3'=>$c3,
					'c4'=>$c4,
					 'mold' =>$mold,
					 'date' =>$date
				);
				$query = $this->db->insert('mold_die_history', $targets);
				 
		}
		
 	}else
 	 { 
 		$query1 = $this->db->query("SELECT * FROM mold_die_history where   mold ='".$this->input->post('moldId')."'    "); 
 		$query2 =$query1->result();  
 	}	

	$this->data['moldId'] = $this->input->post('moldId'); 
	
	$mold_setting = $this->db->query("SELECT * FROM mold_setting where mold ='".$this->input->post('moldId')."'  "); 
	$mold_settingdata =$mold_setting->result();  
	$this->data['mold_settingdata'] = $mold_settingdata;


	$mold_set = $this->db->query("SELECT * FROM mold_setting  "); 
	$mold_settingdt =$mold_set->result();  
	$this->data['mold_settingdt'] = $mold_settingdt;


	$this->data['Mold_Die_History'] = $query2;

	$this->data['status_mold_data'] = $status_mold_data;



	$mold_n = $this->db->query("SELECT * FROM mold_die_history  "); 
	$mold_name =$mold_n->result();  
	$this->data['mold_name'] = $mold_name;


	 // $this->data['Mold_Die_History'] =$this->Mold_Die_History_Record->Mold_Die_History();
	$this->data['Mold_Die_History_Record'] =$this->Mold_Die_History_Record->Mold_Die_History_Record_get();
	$this->load->view('templates/header.php');
	$this->load->view('Mold_Die_History_Record', $this->data);
	$this->load->view('templates/footer.php');  
}
}




	
}
?>

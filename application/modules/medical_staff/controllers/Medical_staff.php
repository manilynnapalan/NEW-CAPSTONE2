<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Medical_staff extends MX_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->model(array('Model'));
  } 

	public function index(){
		$row = $this->checkAccountNotNull();
		$this->checkAccountUpdated($row);
		if(@$this->input->get('ts') == NULL){
			$where = [
				'a.usertype' => 3
			];
		} else {
			$where = [
				'i.sports' => $this->input->get('ts'),
				'a.usertype' => 3
			];	
		}
		$order_name = 'sport_name';
		$order_by = 'ASC';
		$data['allData'] = $this->Model->getAthletes($where);
		$data['sports'] = $this->Model->getDataResult('sports',[],$order_name,$order_by);
		$this->heading($row);
		$this->load->view('athletes',$data);
		$this->load->view('footer');
	}

	public function update_athlete_medical($athlete_id){
		$row = $this->checkAccountNotNull();
		$id = $this->nativesession->get('id');
		$data_input = $this->input->post();
		date_default_timezone_set('Asia/Manila');
		$date_updated = date('Y-m-d H:i:s');
		$data1 = ['updated_on'=>$date_updated,'medical_staff'=>$id];
		$data = array_merge($data_input,$data1);
		$where1 = ['account_id'=>$athlete_id];
		$this->Model->update('information',$data,$where1);
		$message = base64_encode("success~Athlete's blood pressure successfully added.");
		redirect(base_url('medical_staff/?m='.$message));
	}

	public function changeAccount(){
		$row = $this->checkAccountNotNull();
		$data['row'] = $row;
		$this->heading($row);
		$this->load->view('changeAccount',$data);
		$this->load->view('footer');
	}

	public function update_user_account(){
		$this->checkAccountNotNull();
		$id = $this->nativesession->get('id');
		$username = $this->input->post('username');
		$password = base64_encode(md5($this->input->post('password')));
		$data = ['username'=>$username,'password'=>$password,'updated'=>1];
		$where = ['id'=>$id];
		$this->Model->update('accounts',$data,$where);
		$message = base64_encode("success~Your username and password successfully updated.");
		redirect(base_url('medical_staff/?m='.$message));
	}

	public function profile(){
		$row = $this->checkAccountNotNull();
		// var_dump($row);exit;
		$data['hresult'] = $row;
		$this->heading($row);
		$this->load->view('profile',$data);
		$this->load->view('footer');
	}

	public function update_profile(){
		$row = $this->checkAccountNotNull();
		$lname = $this->input->post('lname');
		$fname = $this->input->post('fname');
		$mi = $this->input->post('mi');
		$address = $this->input->post('license_number');
		$birthdate = $this->input->post('validity');
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$config['upload_path'] = FCPATH."assets\images";
	    $config['allowed_types'] = 'gif|jpg|png|jpeg';
	    $config['max_size'] = 100000;
	    $config['max_width'] = 5000;
	    $config['max_height'] = 5000;

	    $this->load->library('upload', $config);
	    $image_name = $_FILES['pro_pic']['name'];
	    $image_path = './assets/pro_pic_images/'.$image_name;
	  	if($this->upload->do_upload('pro_pic')){
    	$image_path = $this->upload->data()['file_name'];
    	$where1 = ['id'=>$this->nativesession->get('id')];
			if($password != null){
				$data_account = [
					'username' => $username,
					"pro_pic" => $image_path,
					'password' => base64_encode(md5($password))
				];
			} else {
				$data_account = [
					'username' => $username,
					"pro_pic" => $image_path
				];
			}
			$this->Model->update('accounts',$data_account,$where1);
    } else {
    	$where1 = ['id'=>$this->nativesession->get('id')];
			if($password != null){
				$data_account = [
					'username' => $username,
					'password' => base64_encode(md5($password))
				];
			} else {
				$data_account = [
					'username' => $username
				];
			}
			$this->Model->update('accounts',$data_account,$where1);
    }
		$where = ['account_id'=>$this->nativesession->get('id')];
		$data = [
			"firstname" => $fname,
			"middle_initial" => $mi,
			"address" => $address,
			"birthdate" => $birthdate,
			"lastname" => $lname
		];
		// var_dump($data);exit;
		$this->Model->update('information',$data,$where);

		$message =  base64_encode("success~Admin information successfully updated.");
		redirect(base_url('medical_staff/profile/?m='.$message));
	}

	function heading($row){
		$data['hresult'] = $row;
		$this->load->view('head.php');
		$this->load->view('header.php',$data);
	}

	function checkAccountNotNull(){
		$id = $this->nativesession->get('id');
		if($id == NULL){
			$message = base64_encode("errorrr~You have to login first before you can access the page.");
			redirect(base_url('?m='.$message));
		} else {
			$where = array(
				'a.id' => $id
			);
			$rows = $this->Model->CheckAccount( 'accounts' , $where );

			if($rows->usertype != 4){
				$message = base64_encode("errorrr~Restricted page. Your account is not a medical staff type.");
				redirect(base_url('?m='.$message));
			} else {
				return $rows;
			}
			
		}
	}

	function checkAccountUpdated($row){
		if($row->updated == 0){
			$message = base64_encode("errorrr~Before continuing, update your account.");
			redirect(base_url('medical_staff/changeAccount/?m='.$message));
		}
	}
	
}

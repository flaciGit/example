<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	public function index()
	{
		
		$this->load->view('common/header');
		$this->load->view('pages/index');
		$this->load->view('common/footer');
	}
	public function create()
	{
		$this->load->view('common/header');
		$this->load->view('pages/create');
		$this->load->view('common/footer');
	}
	
	public function createuser()
	{
		$this->form_validation->set_rules('name', 'name', 'required');
		$this->form_validation->set_message('name', 'Hibás/hiányzó név!');
		
		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_message('username', 'Hibás/hiányzó felhasználónév!');
		
		$this->form_validation->set_rules('password', 'password', 'required');
		$this->form_validation->set_message('password', 'Hibás/hiányzó jelszó!');
		
		$this->form_validation->set_rules('email', 'email', 'required');
		$this->form_validation->set_message('email', 'Hibás/hiányzó email!');
		
		$this->form_validation->set_rules('intro', 'intro', 'required');
		$this->form_validation->set_message('intro', 'Hibás/hiányzó bemutatkozás!');
		
		if ($this->form_validation->run() == FALSE || $this->UserModel->uniqueUsername($_POST['username']) == FALSE){
			
			if(validation_errors())
				$data['resultMessage'] = validation_errors();
			if(!$this->UserModel->uniqueUsername($_POST['username']))
				$data['resultMessage'] = "Username is not unique!";
			

			$this->load->view('common/header');
			$this->load->view('pages/result', $data);
			$this->load->view('common/footer');
			return 0;
		}
		
		
		if(isset($_POST) && !empty($_POST)){
			
			$newUser = array (
				'name' => $_POST['name'],
				'username' => $_POST['username'],
				'email'=> $_POST['email'],
				'password' => sha1($_POST['password']),
				'intro' => $_POST['intro']
				
			);
			$this->UserModel->insert($newUser);
			
			$data['resultMessage'] = 'Sikeres beküldés!';
		}else{
			$data['resultMessage'] = 'Hibás beküldés!';
		}
		
		$this->load->view('common/header');
		$this->load->view('pages/result', $data);
		$this->load->view('common/footer');
	}
	public function delete($id = null)
	{
		if(isset($id) && !empty($id)){
			
			$this->UserModel->delete($id);
			
			$data['resultMessage'] = 'Sikeres törlés!';
		}else{
			$data['resultMessage'] = 'Hibás törlés!';
		}
		
		$this->load->view('common/header');
		$this->load->view('pages/result', $data);
		$this->load->view('common/footer');
	}
	
	public function update($id = null)
	{
		
		if(isset($id) && !empty($id) && $this->UserModel->getById($id) != null ){
			
			$data['userToUpdate'] = $this->UserModel->getById($id);
			$this->load->view('common/header');
			$this->load->view('pages/update', $data);
			$this->load->view('common/footer');
			
		}else{

			$data['resultMessage'] = 'Felhasználó nem található!';
			
			$this->load->view('common/header');
			$this->load->view('pages/result', $data);
			$this->load->view('common/footer');
		}
	}
	
	public function updateuser($id = null)
	{
		
		$this->form_validation->set_rules('name', 'name', 'required');
		$this->form_validation->set_message('name', 'Hibás/hiányzó név!');
		
		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_message('username', 'Hibás/hiányzó felhasználónév!');
		
		$this->form_validation->set_rules('password', 'password', 'required');
		$this->form_validation->set_message('password', 'Hibás/hiányzó jelszó!');
		
		$this->form_validation->set_rules('email', 'email', 'required');
		$this->form_validation->set_message('email', 'Hibás/hiányzó email!');
		
		$this->form_validation->set_rules('intro', 'intro', 'required');
		$this->form_validation->set_message('intro', 'Hibás/hiányzó bemutatkozás!');
		
		if ($this->form_validation->run() == FALSE || $this->UserModel->uniqueUsername($_POST['username']) == FALSE){
			
			if(validation_errors())
				$data['resultMessage'] = validation_errors();
			if(!$this->UserModel->uniqueUsername($_POST['username']))
				$data['resultMessage'] = "Username is not unique!";
			

			$this->load->view('common/header');
			$this->load->view('pages/result', $data);
			$this->load->view('common/footer');
			return 0;
		}
		
		if(isset($id) && !empty($id) && $this->UserModel->getById($id) != null ){
			
			$editedUser = array (
				'id' => $id,
				'name' => $_POST['name'],
				'username' => $_POST['username'],
				'email'=> $_POST['email'],
				'password' => sha1($_POST['password']),
				'intro' => $_POST['intro']
			);
			
			$this->UserModel->update($editedUser);
			$data['resultMessage'] = 'Sikeres szerkesztés!';
			
		}else{
			$data['resultMessage'] = 'Felhasználó nem található!';
		}
					
		$this->load->view('common/header');
		$this->load->view('pages/result', $data);
		$this->load->view('common/footer');
		

	}
	public function list($page = 0)
	{
		$data['users'] = $this->UserModel->getAll();
		
		$this->load->view('common/header');
		$this->load->view('pages/list', $data);
		$this->load->view('common/footer');
	}
	
	
	
	
}

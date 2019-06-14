<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AgentController extends CI_Controller {

	public function index()
	{
		//chargement de la page ajouter_agent dans la vue
		// var_dump($this->session->userdata);
		// var_dump($this->session->userdata('id'));
		// var_dump($this->session->userdata('email'));

		// foreach($users as $user){
		// 	echo $user;
		// }
		$idAgent = (int) $this->session->userdata('idAgent');
		$data['horaire']= $this->HoraireModel->get_Horaire($idAgent);
		$data['jour']= $this->AgentsModel->get_jour();
		$this->load->view('agent',$data);
	}
	public function ajouter_agent()
	{
		//recuperation des donnees dans la vue
		$nomAgent= $this->input->post('name');
		$telephone= $this->input->post('phone');
		$email= $this->input->post('email');
		$fonction= $this->input->post('fonction');
		$username= $this->input->post('username');
		$pwd= $this->input->post('pwd');
		$pwdconf = $this->input->post('confpwd');
		$confpwd=$this->input->post('confpwd');
		$idEntreprise = $this->session->userdata('id');
		$dept       = $this->input->post('dept');
		//var_dump($dept);die;
		if($pwd == $confpwd){
			$pwd = sha1($pwd);
			$data = array(
				'nomAgent'=> $nomAgent,
				//'telephone'=> $telephone,
				'email'=> $email, 
				'fonction'=> $fonction,
				// 'username'=> $username,
				'pwd'=>$pwd,
				'idEntreprise' => $idEntreprise,
				'idDept' => $dept
			);
			$this->AgentsModel->ajouter_agent($data);
			redirect(base_url('/departement/DepartementController'));
		}
		else{
			$data['error'] = "mot de passe incorrect";
			$data['agents'] = $this->AgentsModel->get_Agent($idEntreprise);
			$this->load->view('setting', $data);
		}
				
		
	}

	public function modifier_agent(){
		$idEntreprise = (int) $this->session->userdata('id');
		$data['agents'] = $this->AgentsModel->get_Agent($idEntreprise);
		$this->load->view('modifier_agent', $data);
	}

	public function delete_agent(){
		$id = $this->input->get("id");
		$idEntreprise = (int) $this->session->userdata('id');
		$this->AgentsModel->delete_agent($id);
		$data['agents'] = $this->AgentsModel->get_Agent($idEntreprise);
		$this->load->view('setting', $data);
	}
	
}
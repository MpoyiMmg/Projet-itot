<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AgentController extends CI_Controller {

	public function index()
	{
		//chargement de la page ajouter_agent dans la vue
		$this->load->view('ajouter_agent');
	}
	public function ajouter_agent()
	{
		//recuperation des donnees dans la vue
		$nomAgent= $this->input->post('nomAgent');
		$telephone= $this->input->post('telephone');
		$email= $this->input->post('email');
		$photo= $this->input->post('photo');
		$username= $this->input->post('username');
		$pwd= $this->input->post('pwd');
		$confpwd=$this->input->post('confpwd');
		$idEntreprise = 1;
		$idDept = 1;

		echo $nomAgent, $telephone;
		$data = array(
						'nomAgent'=> $nomAgent,
						'telephone'=> $telephone,
						'email'=> $email,
						'photo'=> $photo,
						'username'=> $username,
						'pwd'=>sha1($pwd),
						'idEntreprise' => $idEntreprise,
						'idDept' => $idDept
					);
		$this->AgentsModel->ajouter_agent($data);		
		
	}
}
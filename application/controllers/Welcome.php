<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	
	public function index()
	{
		$entreprise = $this->EntreprisesModel->get_Entreprise_Index();
		$data['dataEntreprise'] = $entreprise;
		$this->load->view('header');
		$this->load->view('index',$data);
		// $this->load->view('rdv');
	}
	public function creno(){
		$heure_debut = "02:00";
		$heure_fin = "03:00";
		$d = new DateTime($heure_debut);
		while ($d->format('H:i') <= $heure_fin) {
			echo $d->format('H\hi') . "<br />";
			$d->modify("+20min");
		}
		//var_dump($d);die;
	}
	public function precharge()
	{
		$this->load->view('precharge');
	}
	public function list_entreprise()
	{
		$entreprise = $this->EntreprisesModel->get_Entreprise();
		$random = $this->EntreprisesModel->get_Random_Entreprises();
		$data['dataEntreprise'] = $entreprise;
		$data['randomEntreprise'] = $random;
		$this->load->view('listentreprise',$data);
	}
	public function login_valide(){
		redirect(base_url('login_valide'));
	}

	public function login()
	{
		$data['error'] = "";
		$this->load->view('login',$data);
	}

	public function register()
	{
	
		$this->load->view('register');
	}

	public function test()
	{
		$this->load->view('test');
	}

	public function entreprise()
	{
		
		$idEntreprise=$this->input->get('id');
		$agents = $this->AgentsModel->get_Agent($idEntreprise);
		$horaires = array();
		
		foreach($agents as $agent){
			$idAgent = $agent->idAgent;
			$horaires[] = $this->HoraireModel->get_Horaire($idAgent);	
		}
		$data['entreprise']=$this->EntreprisesModel->get_Entreprise_Select($idEntreprise);
		//$random = $this->EntreprisesModel->get_Random_Entreprises();
		
		$data['agent'] = $agents;
		$data['horaire'] = $horaires;
		//$data['horaire'] = $horaire;
		//var_dump($data['horaire']);die;
		$this->load->view('entreprise',$data);
	
	}
	  // Methode de validation des données du formulaire
	  public function login_validation(){
		redirect(base_url('/login/LoginController'));
	}

	public function rdv()
	{
		$reservation = $this->RdvModel->get_reservation();
		$idRdv = $this->input->get("idHoraire");
		$jour = $this->input->get("jour");
		$data = array(
			'idRdv'=>$this->input->get("idHoraire"),
			'jour'=>$this->input->get("jour"),
			'reserve'=>$reservation
		);
		//var_dump($data);die;
		$this->load->view('rdv',$data);
	}
	public function agent()
	{
		$this->load->view('agent');
	}
	public function enregistrer()
	{
		$agent=1;
		$this->load->helper(array('form', 'url'));
		$data = array(
			'idAgent' => $agent,
			'titre' => $this->input->post('titre'),
			'note' => $this->input->post('note'),
			'date' => $this->input->post('format'),
			'HeureFin' => $this->input->post('fin'),
			'HeureDebut' => $this->input->post('deb'),
			'Nbrdv' => $this->input->post('nbrdv')
		);
		$this->HoraireModel->ajouter_horaire($data);
	
	}
	public function date()
	{
		$jours = array(
			"Lundi" 	=>"monday",
			"Mardi" 	=>"tuesday",
			"Mercredi"	=>"wednesday",
			"Jeudi"		=>"thursday",
			"Vendredi"	=>"friday",
			"Samedi"	=>"saturday ",
			"Dimanche"	=>"sunday"
		);
		var_dump($jours['Lundi']);die;
		$mois_courant=date('M');
		$reservation=7;
		$jourHoraire='sunday';
		$aujourdhui=new DateTime();
		$format=$aujourdhui->format('Y-m-d');
		//var_dump($jourHoraire);
		$date = new DateTime($format.' +'.$reservation.'day');
		$dateformat=$date->format('d-m-Y');
		$datef = new DateTime($dateformat); 
		$dateRDV=($datef->modify('next '.$jourHoraire))->format('d-m-Y');
		var_dump($dateRDV);die;
		//var_dump($aujourdhui->format('d-m-Y'));die;	
	}
}



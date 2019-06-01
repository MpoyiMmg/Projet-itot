<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RdvController extends CI_Controller {

	// public function index()
	// {
	// 	//chargement de la methode prendre rdv
	// 	// $this->prendre_rdv();
	// 	$idRdv = $this->input->get("idHoraire");
	// 	$data = array(
	// 		'idRdv'=>$this->input->get("idHoraire"),
	// 		'jour'=>$this->input->get("jour")

	// 	);
	// 	var_dump($data);die;
	// 	//$this->load->view('header');
	
	// 	//$this->load->view('rdv',$data);
	// }
	public function prendre_rdv()
	{
		$nom_complet	= $this->input->post('nom_complet');
		$motif			= $this->input->post('motif');
		$jour			= $this->input->post('jour');
		$etat			= $this->input->post('etat');
		$telephone		= $this->input->post('telephone');
		$email			=$this->input->post('email');
		$idhoraire		= $this->input->post('idhoraire');
		$reservation	= $this->input->post('reservation');
			$jours = array(
				"Lundi" 	=>"monday",
				"Mardi" 	=>"tuesday",
				"Mercredi"	=>"wednesday",
				"Jeudi"		=>"thursday",
				"Vendredi"	=>"friday",
				"Samedi"	=>"saturday ",
				"Dimanche"	=>"sunday"
			);
			$reservation_v=array(
				"1 semaine avant" =>"7",
				"2 semaines avant" =>"14"
			);
			$reservation=(int)$reservation_v[$reservation];
			$jourHoraire=$jours[$jour];
			//var_dump($jourHoraire);die;
			$aujourdhui=new DateTime();
			$format=$aujourdhui->format('Y-m-d');
			//var_dump($jourHoraire);
			$date = new DateTime($format.' +'.$reservation.'day');
			$dateformat=$date->format('d-m-Y');
			$datef = new DateTime($dateformat); 
			$dateRDV=($datef->modify('next '.$jourHoraire))->format('d-m-Y');
			//var_dump($dateRDV);die;
			//var_dump($aujourdhui->format('d-m-Y'));die;	
			$data = array(
				'motif'=> $motif,
				'idHoraire'=> $idhoraire,
				'etat'=> $etat,
				'nomComplet'=> $nom_complet,
				'telephone'=> $telephone,
				'email' => $email,
				'date' => $dateRDV
			);
			$this->RdvModel->prendre_rdv($data);		
		
	}
}
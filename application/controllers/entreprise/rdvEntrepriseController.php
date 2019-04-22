<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class rdvEntrepriseController extends CI_Controller {

	public function __construct(){
		parent::__construct();
}

	//fonction dans le but de lister les rendezvous [Caleb]
	public function liste_rendez_vous_approuve()
	{
		$idAgent=2;
		$data['rdvPris']=$this->RdvModel->afficherRdv($idAgent);
		$this->load->view('RdvDejaPris',$data);
	}
	//fonction pour annuler RDV [Caleb]
	public  function annuler_rdv_controller(){
		$idRdv=1;
		//$etat="0";
		//$this->input->post('idClient');
		$idClient = "1";
		$idEntreprise="2";
		$motif="";
		$date='2019-04-18';
		$duree="2h";
		$heure="08:00:00";
		$data  = array(
			'idClient' => $idClient,
			'idEntreprise'=>$idEntreprise,
			'motif'=>$motif,
			'date'=>$date,
			'heure'=>$heure,
			'duree'=>$duree,
			'etat' => "0",
			'commentaire'=>''
		);
		//$data['rdvPris']=$this->RdvModel->annulerRDV($idRdv,$etat);
		$this->RdvModel->annulerRDV($idRdv, $data);

	}
	public function ajouter_commentaire(){
		$data=array(
			'commentaire'=>
		);
	}
}

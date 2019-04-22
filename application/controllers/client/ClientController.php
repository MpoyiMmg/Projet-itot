<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ClientController extends CI_Controller {

	public function index()
	{
		$this->annuler_rdv();
	}

	public function annuler_rdv(){
		//recuperation des données
		/*$id = $this->input->get("id");
		$idClient = $this->input->get("idClient");
		$idEntrprise = $this->input->get("idEntrprise");
		$motif = $this->input->get("motif");
		$date = $this->input->get("date");
		$duree = $this->input->get("duree");
		$commentaire= $this->input->get("commentaire");*/
		$id = "1";
		$idClient ="1" ;
		$idEntrprise ="1";
		$motif = "hgjkfjhkljkhj";
		$date = "wvgvh";
		$duree = "20";
		$commentaire="dhqhgdsfvsjhdf";

		//vérification des clés fournies 
		if (isset($id)){
			//creation de la variable data
			$data = array (
				'idClient'=>$idClient,
				'idEntreprise'=>$idEntrprise,
				'motif'=>$motif,
				'date'=>$date,
				'duree'=>$duree,
				'etat' => '0',
				'commentaire'=>$commentaire
			);
			$this->ClientModel->annuler_rdv($id,$data);

		}
		public function modifier_rdv(){
			// recuperation des donnée du formulaire
			$id = $this->input->get("id");
			$idClient = $this->input->get("idClient");
			$idEntrprise = $this->input->get("idEntreprise");

			$motif = $this->input->post("motif");
			$date = $this->input->post("date");
			$duree = $this->input->post("duree");
			$commentaire= $this->input->post("commentaire");

			//vérification des clés fournies 
		if (isset($idClient,$idEntrprise,$motif,$date,$heure,$duree,$commentaire)){
			//creation de la variable data

			$data = array (

				'idClient'=>$idClient,
				'idEntreprise'=>$idEntrprise,
				'motif'=>$motif,
				'date'=>$date,
				'duree'=>$duree,
				'etat' => '1',
				'commentaire'=>$commentaire
			);

			try{

				//appel de la methode modifier_rdv
				$this->ClientModel->modifier_rdv($id,$data);
			}
			catch(Exception $e){

				redirect('modifier_view');
			}
			
			
			
		}
	}
}
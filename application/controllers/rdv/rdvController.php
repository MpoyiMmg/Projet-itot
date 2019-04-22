<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RdvController extends CI_Controller {

	public function index()
	{
		//chargement de la methode prendre rdv
		$this->prendre_rdv();
	}
	public function prendre_rdv()
	{
		//recuperation des données dans la vue
		$motif= $this->input->post('motif');
		$date= $this->input->post('date');
		$heure= $this->input->post('heure');
		$duree= $this->input->post('duree');
		$etat= $this->input->post('etat');
		$commentaire= $this->input->post('commentaire');
		$idEntreprise = 1;
		$idClient = 1;

		echo $commentaire, $date, $heure;
		$data = array(
						'motif'=> $motif,
						'date'=> $date,
						'heure'=> $heure,
						'duree'=> $duree,
						'etat'=> $etat,
						'commentaire'=> $commentaire,
						'idEntreprise' => $idEntreprise,
						'idClient' => $idClient
					);
		$this->RdvModel->prendre_rdv($data);		
		
	}
}
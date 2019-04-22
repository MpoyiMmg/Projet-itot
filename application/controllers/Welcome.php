<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {


	public function index()
	{

		$id_rdv = 1;
		$this->load->model("EntreprisesModel");
		$data["fetch_data"] = $this->EntreprisesModel->fetch_data();
		$data["rdv_data"] = $this->EntreprisesModel->accepter_refuser_rdv($id_rdv);
		$this->load->view('accepter_view', $data);
		

		//chargement de la vue horaire

		//$this->load->view('client/ClientAjouterCommentaire');

		$this->load->view('horaire/horaire_view');

	}
}

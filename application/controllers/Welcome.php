<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {


	public function index()
	{
		//chargement de la vue horaire
		$this->load->view('horaire/horaire_view');

	}
}

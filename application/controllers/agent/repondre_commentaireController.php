<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Repondre_commentaireController extends CI_Controller {

	public function index()
	{
		//chargement de la methode prendre rdv
		$this->repondre_commentaire();
	}
	public function repondre_commentaire()
	{
		//recuperation des données dans la vue
        $contenu= $this->input->post('commentaire');
        $idAgent= 1;
		$id_comment= 1;
		//var_dump($contenu);die();
		$data = array(
                        'contenu'=> $contenu,
                        'idAgent'=> $idAgent,
						'id_comment' => $id_comment
					);
		$this->AgentsModel->repondre_commentaire($data);		
		
	}
}
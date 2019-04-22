<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class RdvModel extends CI_Model{
    
    public function prendre_rdv($data)
    {
        //insertion des donnees dans la base des données bd_rdv
        
        $this->db->insert('tb_rdv', $data);
    }

	public $idRdv;
	public $idClient;
	public $idEntreprise;
	public $motif;
	public $date;
	public $heure;
	public $duree;
	public $etat;
	public $commentaire;

	public function __construct()
	{
		parent::__construct();
	}

	//afficher les rendez vous deja accépté en fonction des agents [Caleb]
    public function afficherRDV($idAgent)
	{
		/*
    	$this->db->select('*');
		$this->db->from('tb_rdv');
		$this->db->join('tb_client, tb_client.idClient=tb_rdv.idClient');
		$this->db->join('tb_agent, tb_agent.idEntreprise=tb_rdv.idEntreprise');
		$this->db->where(array('tb_agent.idAgent='.$idAgent));
		$query=$this->db->get();
		return $query;
		*/

		/*$this->db->select('NomClient, date , heure, dure');
    	//$this->db->where('idRdv='.$idRdv);
    	return $this->db-get('tb_rdv, tb_client')->result_array();*/

		$this->db->select('*');
		$this->db->where('idAgent='.$idAgent);
		$this->db->where('tb_rdv.idClient=tb_client.idClient');
		$this->db->where('etat=1');
		return $this->db->get('tb_rdv, tb_agent, tb_client')->result_array();
	}


	//cette methode parle d'elle même! j'espère que cela passera sans me prendre la tête [Caleb]
	public  function annulerRDV($idRdv,$data)
	{
		/*$data = array(
			'etat' => $etat
		);*/

		$this->db->where('idRdv', $idRdv);
		$this->db->update('tb_rdv', $data);
		return $this->db->get('tb_rdv');
		redirect(anchor('Welcome'));
	}
	public function ajouter_commentaire($idRdv,$commentaire){
		$this->db->where('idRdv',$idRdv);
		$this->db->insert('commentaire',$commentaire);
		return $this->db->get('tb_rdv');
		redirect(anchor('Welcome'));
	}

}
?>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class RdvModel extends CI_Model{
    
    public function prendre_rdv($data)
    {
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

	//afficher les rendez vous en fonction des agents [Caleb]
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
		return $this->db->get('tb_rdv, tb_agent, tb_client')->result_array();
	}


	//cette methode parle d'elle même! j'espère que cela passera sans me prendre la tête [Caleb]
	public  function annulerRDV($idRdv,$etat)
	{
		$data = array(
			'etat' => $etat
		);

		$this->db->where('idRdv', $idRdv);
		$this->db->update('tb_rdv', $data);
		redirect('view/RdvDejaPris');
	}
	public  function get_reservation()
	{
		$this->db->select('*');
		return $this->db->get('tb_reservation')->result_array();
	}

}
?>

<?php
defined('BASEPATH') or exit('No direct script access allowed');
class EntreprisesModel extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    public function register($produit)
    {
        $this->db->set('nomEntreprise',$produit['nom']);
        $this->db->set('description',$produit['description']);
        $this->db->set('telephone',$produit['telephone']);
        $this->db->set('email',$produit['email']);
        $this->db->set('pwd',$produit['pwd']);
       

        return $this->db->insert('tb_entreprise');
    }
    public function fetch_data()
	{
        $query = $this->db->get("tb_rdv");
        return $query;
	}


    function accepter_refuser_rdv($id)
    {
        $this->db->where('idRdv', $id);
        $query = $this->db->get("tb_rdv");
        return $query;
    }
    #######################################################

    public function get_state($id){
        $this->db->select('etat')
                 ->where("idRdv", $id);

        return $this->db->get('tb_rdv');
    }

    public function update_data($id, $state){
        $this->db->where("idRdv", $id);
        $this->db->update("tb_rdv", $state);
    }

    #######################################################    
    public function reporter_rdv($idRdv, $data){

        //Requête de report du rendez-vous
        $this->db->where('idRdv', $idRdv);
        $this->db->update('tb_rdv', $data);
    }
    
    #######################################################
    
    public function can_login($data)
    {
        $tb_agent = 'tb_agent';
        $this->db->where('username', $data['username']);
        $this->db->where('pwd', $data['password']);
        $query = $this->db->get($this->tb_agent);

        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
  
    #######################################################
    public function get_Entreprise()
    {
        //cette methode recupere tout les elements de la table tb_entreprise
        $this->db->select('*');
        return $this->db->get('tb_entreprise')->result_array();
    }

    public function get_Entreprise_Index()
    {
        //cette methode recupere tout les elements de la table tb_entreprise
        $this->db->select('*');
        $this->db->limit(3);
        return $this->db->get('tb_entreprise')->result_array();
    }

    #########################################################################
   

    public function get_Random_Entreprises()
    {
        //cette methode recupere une seule entreprise dans la table tb_entreprise d'une maniere aleatoire
        $this->db->select('*');
        $this->db->order_by('RAND()');
        $this->db->limit(1);
        return $this->db->get('tb_entreprise')->result_array();
    }

}
?>

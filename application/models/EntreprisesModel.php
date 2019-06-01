<?php
defined('BASEPATH') or exit('No direct script access allowed');
class EntreprisesModel extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    #######################################################
    public function register($produit)
    {
         $this->db->insert('tb_entreprise', $produit);
    }

    #######################################################
    public function fetch_data()
	{
        $query = $this->db->get("tb_rdv");
        return $query;
    }
    
    #######################################################
    public function  profil($data, $id){
        
        $this->db->where('idEntreprise', $id)
                ->update("tb_entreprise", array(
                        'adresse' => $data["adresse"],
                        'logo' => $data["logo"],
                        'pays' => $data["pays"],
                        'codePostal' => $data["code_postal"],
                        'siteWeb' => $data["site_web"]
                ));

        return true;
    } 

    ######################################################
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

    #######################################################
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
        $tb_agent = 'tb_entreprise';
        $this->db->where('email', $data['email']);
        $this->db->where('pwd', $data['password']);
        $query = $this->db->get($tb_entreprise);

        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    #########################################################################
    public function verification($data){

        $this->db->select('*');
        $this->db->where('email', $data['email']);
        $this->db->where('pwd', $data['pwd']);
        $req = $this->db->get('tb_entreprise');

        if($req->num_rows() > 0){
            return True;
        }

        else{
            return False;   
        }
        
    }
    #########################################################################
    public function get_entreprise_line($data){
        $req = $this->db->select("*")
                        ->where('email', $data['email'])
                        ->where('pwd', $data['pwd'])
                        ->get('tb_entreprise')
                        ->result();
                        
        return $req;
    }
  
    #######################################################
    public function get_Entreprise()
    {
        //cette methode recupere tout les elements de la table tb_entreprise
        $this->db->select('*');
        return $this->db->get('tb_entreprise')->result_array();
    }
    #########################################################################
    public function get_Entreprise_Select($id)
    {
        //cette methode recupere tout les elements de la table tb_entreprise
        $this->db->select('*');
        $this->db->where('idEntreprise',$id);
        return $this->db->get('tb_entreprise')->result_array();
    }

    #########################################################################
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

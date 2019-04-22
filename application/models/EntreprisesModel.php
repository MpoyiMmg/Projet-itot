<?php


    defined('BASEPATH') OR exit('No direct script access allowed');
    class EntreprisesModel extends CI_Model{

        public function __construct(){

            parent::__construct();
        }
      
        #######################################################
        public $tb_agent = 'tb_agent';
        #######################################################
        public function reporterr_rdv($idRdv, $data){
            $this->db->where('idRdv', $idRdv);
            $this->db->update('tb_rdv', $data);
        }
        ######################################################
        public function get_Entreprise()
        {
            //cette methode recupere tout les elements de la table tb_entreprise
            $this->db->select('*');
            return $this->db->get('tb_entreprise')->result_array();
        }
        ######################################################
      public function can_login($data){
            $this->db->where('username', $data['username']);
            $this->db->where('pwd', $data['password']);
            $query = $this->db->get($this->tb_agent);

            if($query->num_rows() > 0){
                return true;
            }
            else{
                return false;
            }
        }

    #######################################################
   
}

?>

        
    

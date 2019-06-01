<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AgentsModel extends CI_Model{
	//méthode dans le but de récuperer l'id de l'agent [Caleb]

    public function ajouter_agent($data)
    {
        //insertion des donnees dans la base des donnees
        $this->db->insert('tb_agent', $data);
    }

    public function delete_agent($id)
    {
        //suppression de l'agent dans la base des donnees
        $this->db->where('idAgent', $id);
        $this->db->delete('tb_agent');
    }

    public function get_Agent($idEntreprise)
    {
        $this->db->select('*');
        $this->db->join('tb_departement', 'tb_agent.idDept = tb_departement.idDept'); 
        $this->db->where('tb_agent.idEntreprise',$idEntreprise);
        return $this->db->get('tb_agent')->result();
    }
       
    public function repondre_commentaire($data)
    {
        //recuperation de l'id du commentaire client
        $this->db->insert('tb_reponse_commentaire',$data);
    }

    public function verification($data){
       
        $this->db->select('*')
                 ->where('email', $data['email'])
                 ->where('pwd', $data['pwd']);
         $req = $this->db->get('tb_agent');
       
        if($req->num_rows() > 0){
            return True;
        }

        else{
            return False;   
        }
       
        
    }

    public function get_agents_line($data){
        $req = $this->db->select("*")
                        ->where('email', $data['email'])
                        ->where('pwd', $data['pwd'])
                        ->get('tb_agent')
                        ->result();
        return $req;
    }
    public function get_jour(){
        $req = $this->db->select("*")
                        ->get('tb_jour')
                        ->result_array();
        return $req;
    }
    
}
?>

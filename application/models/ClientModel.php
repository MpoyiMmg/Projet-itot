<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ClientModel extends CI_Model{

    public function annuler_rdv($id,$data){
      //requete d'annulation du rdv  
      $this->db->update('tb_rdv', $data);
      $this->db->where('id',$id);  
    }
    public function modifier_rdv($id,$data){
        //requete de modification du rdv
        $this->db->where('id',$id);
        $this->db->update('tb_rdv', $data);
        
    }
}
?>
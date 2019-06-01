<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class DepartementModel extends CI_Model{

    public function enregister($data){
        $this->db->insert('tb_departement', $data);
    }

    public function get_departement($id){
        $this->db->select('*');
        $this->db->where('idEntreprise',$id);
        return $this->db->get('tb_departement')->result_array();
    }
}
?>
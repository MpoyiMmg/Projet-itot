<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class EntreprisesModel extends CI_Model{

    function __construct()
    {
        parent::__construct();
    }
    function accepter_refuser_rdv($id, $data)
    {
        $this->db->where('idRdv', $id);
        $this->db->update('tb_entreprise', $data);
    }
}
?>
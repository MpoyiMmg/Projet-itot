<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    class HoraireModel extends CI_Model{

        public function ajouterHoraire($data){
            $this->db->insert('tb_horaire',$data);
        }
        
    }
?>
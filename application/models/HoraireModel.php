<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    class HoraireModel extends CI_Model{

        public function __construct(){
            parent::__construct();
        }

        // =======================================================================>
        public function ajouter_horaire($data){
            $this->db->insert('tb_horaire',$data);
        }
        public function get_Agent()
        {
            $this->db->select('*');
            return $this->db->get('tb_agent')->result_array();
        }
        // =======================================================================>
        // public function get_horaire($idAgent){
        //     // recuperation de l'horaire par rapport a un agent
        //     $req = $this->db->select('*')
        //              ->from('tb_horaire as h')
        //              ->join('tb_agent as a', 'a.idAgent = h.idAgent')
        //              ->get();  
        //     return $req;
        // }
        public function get_horaire($idAgent)
        {
            $this->db->select('*');
            $this->db->join('tb_jour', 'tb_horaire.jour = tb_jour.id'); 
            $this->db->where('tb_horaire.idAgent',$idAgent);
            return $this->db->get('tb_horaire')->result_array();
        }
    }
?>
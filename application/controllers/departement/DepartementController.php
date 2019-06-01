<?php

    class DepartementController extends CI_Controller{

        public function index(){

            redirect(base_url('/entreprise/EntrepriseController/load_setting_view'));   

            
        }

        public function enregstrer_departement(){
            $id = (int) $this->session->userdata('id');
            $nom = $this->input->post("name");

            $data = array(
                    'nomDept' => $nom,
                    'idEntreprise' => $id
                );
            
            $this->DepartementModel->enregister($data);
            redirect(base_url('/entreprise/EntrepriseController/load_setting_view'));   
        }
    }
?>
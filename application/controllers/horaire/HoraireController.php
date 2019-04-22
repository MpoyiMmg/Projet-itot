<?php

    class HoraireController extends CI_Controller{

        public function index(){
            $this->enregistrer();
        }

        public function horaireView(){
            $this->load->view('horaire_view');
        }

        public function enregistrer(){

            $jour        = $this->input->post('jour');
            $heure_debut = $this->input->post('heuredebut');
            $heure_fin   = $this->input->post('heurefin');
            // $this->session->userdata['id']
            $idagent     =  1 ;

            echo $heure_debut;

            $data        = array(
                                'idAgent'       => $idagent,
                                'jour'          => $jour,
                                'heureDebut'    => $heure_debut,
                                'heureFin'      => $heure_fin
                           );

            $this->HoraireModel->ajouterHoraire($data);
            echo "bien joué";
        }
    }
?>
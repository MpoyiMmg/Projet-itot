<?php

    class HoraireController extends CI_Controller{

        public function index(){
            $this->enregistrer();
        }

        public function horaireView(){
            $this->load->view('horaire_view');
        }

        public function get_horaire(){

            $idAgent=$this->input->get('id');
            $horaire = $this->HoraireModel->get_Horaire($idAgent);
		    $data['randomEntreprise'] = $horaire;
		    $this->load->view('',$data);
        }
        public function ajouter_horaire()
        {
            $id =$this->session->userdata('idAgent');
                var_dump($id);
            $data = array(
                "heureDebut" => $this->input->post('debut'),
                "heureFin" 		=> $this->input->post('fin'),
                "description" 		=> $this->input->post('desc'),
                "jour" 		=> $this->input->post('jour'),
                "idAgent"      => $id,
               
            );
            
            $this->HoraireModel->ajouter_horaire($data);
            redirect(base_url('/agent/AgentController'));
        }
    

       
    }
?>
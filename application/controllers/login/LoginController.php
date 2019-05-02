<?php
defined('BASEPATH') or exit('No direct script access allowed');

    class LoginController extends CI_Controller{

        public function index(){
            $data['error'] = "";
            $this->load->view('login',$data);//Chargement de la page de connexion
        }
        // Methode de validation des données du formulaire
        public function login_validation(){
            // Données venant du formulaire
            $username = $this->input->post('email');
            $password = sha1($this->input->post('pwd'));

            $data = array(
                'email' => $username,
                'pwd'   => $password
            );
            // Données venant de la base de données pour permettre la vérification de l'authentification
            $data_db = $this->EntreprisesModel->get_ligne($data);
        
            if($data_db){
                redirect('agent/AgentController');
            }
            else{
                $data['error'] = "Email ou mot de passe incorrect";
                $this->load->view('login', $data);
            }
        }

   // Fonction de déconnexion

        public function logout(){
            $this->session->unset_userdata($session_data);//Destruction des valeurs de session
            redirect(base_url('login'));
        }
    }
?>

   

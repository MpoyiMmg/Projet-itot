<?php
defined('BASEPATH') or exit('No direct script access allowed');

    class LoginController extends CI_Controller{

        public function index(){
            $this->load->view('login');//Chargement de la page de connexion
        }

        // Methode de validation des données du formulaire
        public function login_validation(){
            // Données venant du formulaire
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $hash = sha1($password);//Encodage du mot de passe
            // Données venant de la base de données pour permettre la vérification de l'authentification
            $data_db = $this->EntreprisesModel->get_db_data($username);
            // Cette ligne permet de convertir la variable $pass_db en une chaîne de caractères
            $data_db = json_decode(json_encode($data_db), TRUE);

            // Vérification de l'authentification
            if($data_db['pwd'] == $hash){
                // Création d'un tableau de données
                $data = array(
                    'username' => $username,
                    'password' => $hash
                );

                // Vérification de la valeur de la fonction can_login du model EntreprisesModel
                if($this->EntreprisesModel->can_login($data)){
                    // Création d'un tableau de données de session
                    $session_data = array(
                        'id' => $data_db['idAgent'],
                        'username' => $data['username']
                    );
                    // Création des données de session
                    $this->session->set_userdata($session_data);
                    redirect(base_url('loginController/enter'));
                }
                else{
                    redirect(base_url('loginController'));
                }

            }
            else{
                redirect(base_url('loginController'));
            }
        }

        // Fonction de redirection en cas de resultat positif de la verification de l'authentification
        public function enter(){
            if($this->session->userdata['username'] != '' && $this->session->userdata['id'] != null){
                echo '<h1>Welcome '.$this->session->userdata['username'].'</h1>';
                echo '<label><a href="'.base_url('login/logout').'">logout</a></label>';
            }
            else{
                redirect(base_url('login'));
            }
        }

        // Fonction de déconnexion
        public function logout(){
            $this->session->unset_userdata($session_data);//Destruction des valeurs de session
            redirect(base_url('login'));
        }
    }
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
            $data_db  =   $this->EntreprisesModel->verification($data);
            $admin    =   $this->EntreprisesModel->get_entreprise_line($data);

            // var_dump($admin);

            $agents_data   =   $this->AgentsModel->verification($data);
            $agents        =   $this->AgentsModel->get_agents_line($data);
        
            if($data_db){
                foreach($admin as $adm){
                    $data_session = array(
                        'id' => $adm->idEntreprise,
                        'email' => $adm->email,
                        'nom' => $adm->nomEntreprise,
                        'description' => $adm->description
                    );
                
                    // echo $data_session['email'];
                    $this->session->set_userdata('id', $data_session['id']);
                    $this->session->set_userdata('email', $data_session['email']);   
                    $this->session->set_userdata('nom', $data_session['nom']);  
                    $this->session->set_userdata('description', $data_session['description']); 
                }
                
                redirect(base_url('/departement/DepartementController'));
            }
            elseif($agents_data){
                
                foreach($agents as $agent){
        
                    $this->session->set_userdata('id', $agent->idAgent);
                    $this->session->set_userdata('email', $agent->email);

                    redirect(base_url('/agent/AgentController'));
                }
            }
            else{
                $data['error'] = "Email ou mot de passe incorrect";
                $this->load->view('login', $data);
            }
        }

       
        public function load_login_view(){
            $data['error'] = "";
            $this->load->view('agent_login',$data);
        }

        public function login_agent(){
            
            $username = $this->input->post('email');
            $password = sha1($this->input->post('pwd'));
         
            $data = array(
                'email' => $username,
                'pwd'   => $password
            );
            // Données venant de la base de données pour permettre la vérification de l'authentification
            // $data_db  =   $this->EntreprisesModel->verification($data);
            // $admin    =   $this->EntreprisesModel->get_entreprise_line($data);

            // var_dump($admin);

            $agents_data   =   $this->AgentsModel->verification($data);
            //var_dump($agents_data);
            $agents        =   $this->AgentsModel->get_agents_line($data);
            if($agents_data){
                
                foreach($agents as $agent){
        
                    $id=$this->session->set_userdata('idAgent', $agent->idAgent);
                    $this->session->set_userdata('nomAgent', $agent->nomAgent);
                    $data['horaire']= $this->HoraireModel->get_horaire($id);
                    $data['jour']= $this->AgentsModel->get_jour();
                    //var_dump($data);die;
		            //$this->load->view('agent',$data);
                   redirect(base_url('/agent/AgentController'));
                }
            }
            else{
                $data['error'] = "Email ou mot de passe incorrect";
                $this->load->view('agent_login', $data);
            }
        }

        // Fonction de déconnexion

        public function logout_entreprise(){
            $this->session->unset_userdata('id');//Destruction des valeurs de session
            $this->session->unset_userdata('email');
            $this->session->unset_userdata('nom');
            $this->session->unset_userdata('description');
            redirect(base_url('login'));
        }
        public function logout_agent(){
            $this->session->unset_userdata('idAgent');//Destruction des valeurs de session
            $this->session->unset_userdata('nomAgent');
            redirect(base_url('login_agent'));
        }
    }
?>

   

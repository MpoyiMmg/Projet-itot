<?php
defined('BASEPATH') or exit('No direct script access allowed');

class EntrepriseController extends CI_Controller{

	public function _rules() 
    {
        $this->form_validation->set_rules('nom','Nom Entreprise','trim|required', array('required' => 'Saisissez le nom de l entreprise'));
        $this->form_validation->set_rules('description','Description de l entreprise','trim|required', array('required' => 'Saisissez la Description de l entreprise'));
        $this->form_validation->set_rules('telephone','Telephone','trim|required', array('required' => 'Saisissez le numero de telephone'));
        $this->form_validation->set_rules('email','Email','trim|required', array('required' => 'Saisissez l adresse mail'));
        $this->form_validation->set_rules('pwd','Mot de passe','trim|required', array('required' => 'Saisissez le mot de passe'));
        $this->form_validation->set_rules('pwdConf','Confirmation Mot de passe','trim|required', array('required' => 'Confirmez le mot de passe'));
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}

	public function register(){
	
		$this->load->view("register");
	}
	
	public function upload_logo(){
		$config['upload_path'] = base_url("/assets/img");
		$config["allowed_type"] = 'jpg|jpeg|gif|png';

		$this->load->library('upload', $config);

		if(!$this->upload->do_upload()){
			echo "error";
		}

		else{
			$file_data   = $this->upload->data();
			$data['img'] = base_url()."/assets/img/".$file_data['file_name'];

			
			echo $data['img'];
		}

	}
	
	public function inscription_entreprise()
    {
		$image_path = $this->upload_logo();
		echo $image_path;
     
      $pwd = $this->input->post('pwd');
			$pwdConf = $this->input->post('confpwd');
			if($pwd==$pwdConf)
			{
				$password = sha1($this->input->post('pwd'));

				$entreprise = array(
					"nomEntreprise" => $this->input->post('name'),
					"secteur" 		=> $this->input->post('secteur'),
					"telephone" 		=> $this->input->post('tel'),
					"email" 		=> $this->input->post('email'),
					"description"   => $this->input->post('desc'),
					"pwd"			=> $password
				);
				try{
					$this->EntreprisesModel->register($entreprise);
					redirect(base_url('login'));
				}catch (Exception $e){
					print_r($e);
				}
			}
			else{
				redirect('Welcome/register');
			}
//         }
//         else{
//             $data['error'] = array('err1'=>'','err2'=>'');
//             $data['title'] = "Inscription entreprise";
// //            $this->load->view('_inc/header_admin',$data);
// redirect('Welcome/register');
// //            $this->load->view('_inc/footer_admin');
//         }

    }

	// public function index()
	// {
	// 	$this->load->model("EntreprisesModel");
	// 	$data["fetch_data"] = $this->EntreprisesModel->fetch_data();
	// 	$data["rdv_data"] = $this->EntreprisesModel->accepter_refuser_rdv($id_rdv);
	// 	$this->load->view('accepter_view', $data);
	// 	$this->accepter_controller();
	// }

	public function index()
	{
		$this->load->model("EntreprisesModel");
		$data["fetch_data"] = $this->EntreprisesModel->fetch_data();
		$data["rdv_data"] = $this->EntreprisesModel->accepter_refuser_rdv($id_rdv);
		$this->load->view('accepter_view', $data);
		$this->accepter_controller();

		/*$this->email->initialize(array(
			'protocol' => 'smtp',
			'smtp_host' => 'smtp.sendgrid.net',
			'smtp_user' => 'sendgridusername',
			'smtp_pass' => 'sendgridpassword',
			'smtp_port' => 587,
			'crlf' => "\r\n",
			'newline' => "\r\n"
		  ));

		  $this->email->from('your@example.com', 'Your Name');
		  $this->email->to('someoneexampexample@example.com');
		  $this->email->cc('another@another-example.com');
		  $this->email->bcc('them@their-example.com');
		  $this->email->subject('Email Test');
		  $this->email->message('Testing the email class.');
		  $this->email->send();
		  
		  echo $this->email->print_debugger();*/
	}


	public function update_data(){

		$id_rdv = $this->uri->segment(3);
		$this->load->model("EntreprisesModel");
		$data['rdv_data'] = $this->EntreprisesModel->accepter_refuser_rdv($id_rdv) ;
		$data["fetch_data"] = $this->EntreprisesModel->fetch_data();
		$this->load->view('accepter_view', $data);
	}

	//La methode change l'etat d'un rendez-vous du cote Entreprise
	public function accepter_refuser_rdv()
	{
		$id = $this->input->get('id');
		$state = $this->EntreprisesModel->get_state($id);
		$stateValue = $this->input->get('state');

		if($stateValue == 1){
			$newState = "1";
	
			$data = array(
				'idRdv' => $id,
				'etat' => $newState
			);
	
			$this->EntreprisesModel->update_data($id, $data);
			$this->reporter_rdv();

		}
		else{
			$newState = "0";
	
			$data = array(
				'idRdv' => $id,
				'etat' => $newState
			);
	
			$this->EntreprisesModel->update_data($id, $data);
		}
		redirect(base_url());
	}

	#######################################################
	// public function reporter_rdv(){

	// 	//Réccupération des données venant du formulaire
	// 	$idRdv = $this->input->get("idRdv");
		
	// 	$motif = $this->input->post("motif");
	// 	$date = $this->input->post("date");
	// 	$heure = $this->input->post("heure");
	// 	$duree = $this->input->post("duree");
	// 	$commentaire = $this->input->post("commentaire");

	// 	}
	// }

	#######################################################
	public function reporter_rdv(){

		//Réccupération des données venant du formulaire
			$idRdv = $this->input->get("idRdv");
			
			$motif = $this->input->post("motif");
			$date = $this->input->post("date");
			$heure = $this->input->post("heure");
			$duree = $this->input->post("duree");
			$commentaire = $this->input->post("commentaire");

		//Vérification de l'existance des clés fournies
		if(isset($motif, $date, $heure, $duree, $commentaire)){

			$data = array(

				"motif" => $motif,
				"date" => $date,
				"heure" => $heure,
				"duree" => $duree,
				"etat" => "2",
				"commentaire" => $commentaire
			);

			try{

				//Appel de la méthdode reporter_rdv en lui passant  
				//l'id et le tableau des valeurs en paramètre
				$this->EntreprisesModel->reporter_rdv($idRdv, $data);
				$this->notifier();
			}
			catch(Exception $e){

				redirect('reporter_view');
			}
		}

			else{
					redirect(base_url());
				}
	}
	
	#######################################################
	public function notifier(){
		
		$from_email = "simonmwepu@gmail.com";
		$to_email = $this->input->post('email');
		$this->email->from($from_email, 'Identification');
        $this->email->to($to_email);
        $this->email->subject('Send Email Codeigniter');
		$this->email->message('matako');
		if($this->email->send())
			$this->session->set_flashdata("email_sent","Congragulation Email Send Successfully.");
		else
            $this->session->set_flashdata("email_sent","You have encountered an error");
        $this->load->view('entreprise/notifier');
	
	}

	#######################################################

	public function repporter_rdv()
	{

		//Réccupération des données venant du formulaire
		$idRdv = $this->input->get("idRdv");

		$motif = $this->input->post("motif");
		$date = $this->input->post("date");
		$heure = $this->input->post("heure");
		$duree = $this->input->post("duree");
		$commentaire = $this->input->post("commentaire");

		//Vérification de l'existance des clés fournies
		if (isset($motif, $date, $heure, $duree, $commentaire)) {

			$data = array(

				"motif" => $motif,
				"date" => $date,
				"heure" => $heure,
				"duree" => $duree,
				"etat" => "2",
				"commentaire" => $commentaire
			);

			try {

				//Appel de la méthdode reporter_rdv en lui passant  
				//l'id et le tableau des valeurs en paramètre
				$this->EntreprisesModel->reporter_rdv($idRdv, $data);
			} catch (Exception $e) {

				redirect('reporter_view');
			}
		}
	}


	public function modifier_rdv()
	{

		//Réccupération des données venant du formulaire
		$idRdv = $this->input->get("idRdv");
		$idClient = $this->input->get("idClient");
		$idEntreprise = $this->input->get("id");

		$motif = $this->input->post("motif");
		$date = $this->input->post("date");
		$heure = $this->input->post("heure");
		$duree = $this->input->post("duree");
		$commentaire = $this->input->post("commentaire");

		//Vérification de l'existance des clés fournies
		if (isset($idClient, $idEntreprise, $motif, $date, $heure, $duree, $commentaire)) {

			$data = array(

				"idClient" => $idClient,
				"idEntreprise" => $idEntreprise,
				"motif" => $motif,
				"date" => $date,
				"heure" => $heure,
				"duree" => $duree,
				"etat" => "1",
				"commentaire" => $commentaire
			);
			try {

				//Appel de la méthdode modifier_rdv en lui passant  
				//l'id et le tableau des valeurs en paramètre
				$this->EntreprisesModel->modifier_rdv($idRdv, $data);
			} catch (Exception $e) {
	
				redirect('modiifer_view');
			}
		}
	}

	public function get_Entreprise()
	{
		// cette methode permet d'envoyer les informations  des entreprises à une vue
		$entreprise = $this->EntreprisesModel->get_Entreprise();
		$data['dataEntreprise'] = $entreprise;
		$this->load->view('', $data);
		
	}
	
	public function get_Random_Entreprise()
	{
		//cette methode envoie les informations recuperée via la methode get_Random_Entreprises,d'une entreprise 
		//à une vue
		$random = $this->EntreprisesModel->get_Random_Entreprises();
		$data['dataEntreprises'] = $random;
	}

	public function load_setting_view(){
	
		$idEntreprise = (int) $this->session->userdata('id');
		$data['agents'] = $this->AgentsModel->get_Agent($idEntreprise);
		//$data['entreprise']=$this->EntreprisesModel->get_Entreprise_Select($idEntreprise);
		$data['depts']	= $this->DepartementModel->get_departement($idEntreprise);
		$data['error']  = '';
		  //var_dump($data['depts']);die;
		$this->load->view('setting', $data);
	}

}

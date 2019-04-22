<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class EntrepriseController extends CI_Controller {

		public function index(){
			$this->repporter_rdv();
		}

		#######################################################
		public function repporter_rdv(){

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
				}
				catch(Exception $e){

					redirect('reporter_view');
				}
			}
		}

		#######################################################
		public function modifier_rdv(){

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
			if(isset($idClient, $idEntreprise, $motif, $date, $heure, $duree, $commentaire)){

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

				try{

					//Appel de la méthdode modifier_rdv en lui passant  
					//l'id et le tableau des valeurs en paramètre
					$this->EntreprisesModel->modifier_rdv($idRdv, $data);
				}
				catch(Exception $e){

					redirect('modiifer_view');
				}
				
			}
		}

		#######################################################
		public function get_Entreprise()
		{
			// cette methode permet d'envoyer les information  de l'entreprise à une vue
			$entreprise=$this->EntreprisesModel->get_Entreprise();
			$data['dataEntreprise']=$entreprise;
			$this->load->view('',$data);

		}
	}

?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Formulaire extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// Maintenant, ce code sera exécuté chaque fois que ce contrôleur sera appelé.
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->library('form_validation');
		$data = array();
	}

	public function index()
	{
		/*$this->template->set('titre', 'Bienvenue dans ERP_BPO');
		$this->template->load('themes/template', 'content/home');*/
		$data['titre']='CSAV';
		$this->load->view('csav/index');
	}

	public function envoi()
	{
		$envoi=array( 'extDossierNo' => $this->input->post('extDossierNo'),
						'invoice' => array('invoiceNo' => $this->input->post('extDossierNo'),
						'purchaseDate' => date('d/m/Y'),
						'distributorCode' => 'ARISTON_REWORK'
						),
						'product' => array('code' => $this->input->post('code'),
											'Sn01' => strtoupper($this->input->post('Sn01'))
							),
						'client' => array( 'data' => array( 
							'titleCode' => $this->input->post('titleCode'),
							'firstName' => strtoupper($this->input->post('firstName')),
							'name' => strtoupper($this->input->post('name')),
							'address01' => strtoupper($this->input->post('address01')),
							'address02' => strtoupper($this->input->post('address02')),
							'address03' => strtoupper($this->input->post('address03')),
							'postalCode' => $this->input->post('postalCode'),
							'city' => strtoupper($this->input->post('city')),
							'email' => $this->input->post('email'),
							'mobile' => $this->input->post('mobile'),
							'countryCode'  => 'FR') 
							),
						'interventionTypeCode' => 'SITE',
						'internalObservation' => $this->input->post('internalObservation'),
						'folderType' => '1'
			); 
		//echo json_encode($envoi);
		$this->soumettre($envoi);
	}

	public function soumettre($envoi)
	{
		
		// Création d'une ressource cURL
		$curl = curl_init();

		// Définition de l'URL et autres options appropriées
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		//curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC ); 
		//curl_setopt($curl, CURLOPT_USERPWD, "login:password");

		//désactive les tests du SSL
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

		//données
		$data = json_encode($envoi);

		//headers
		$headers = [
	    'Accept-Language: fr',
	    'LBR-ProjectID: LBS01_A1',
	    'LBR-CallerID: 09336c01-7ddb-4795-abea-55d1b05a6e6b',
	    'LBR-AuthToken: 5771f418-756f-4b1a-9bc7-ffa41db608d0',
	    'Content-Type: application/json'
		];

		//données de type json et envoi en POST
		curl_setopt($curl, CURLOPT_HTTPHEADER, $headers); 
		curl_setopt($curl, CURLOPT_POST, true);

		//envoi des données  
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

		//url de l'API
		curl_setopt($curl, CURLOPT_URL, "testapp.csav.fr/runtime/rest/aristote/workflow/dossier");

		//exécution
		$json = curl_exec($curl); 
		$resultStatus = curl_getinfo($curl);

		if($resultStatus['http_code'] == 200) echo "MILAY <br />";
		else echo "ECHEC (code " . $resultStatus['http_code'] . ")<br />";

		curl_close($curl);

	}

}
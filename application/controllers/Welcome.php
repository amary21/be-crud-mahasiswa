<?php

use chriskacerguis\RestServer\RestController;

class Welcome extends RestController
{
	public function __construct($config = 'rest')
	{
		parent::__construct($config);
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
		$method = $_SERVER['REQUEST_METHOD'];
		if ($method == "OPTIONS") {
			die();
		}
	}

	public function index_get()
	{
		$id = $this->get('id');
		$response['status'] = 200;
		$response['error'] = false;
		$response['message'] = 'success';

		if (!isset($id)) {
			$response['data'] = $this->M_mahasiswa->get_all();
		} else {
			$response['data'] = $this->M_mahasiswa->get_id($id);
		}

		$response['status'] = 200;
		$response['error'] = false;
		$response['message'] = 'success';

		$this->response($response, RestController::HTTP_OK);
	}

	public function index_post()
	{
		$data   = array(
			'nim'   		=> $this->post('nim'),
			'fullname'      => $this->post('fullname'),
			'address'      	=> $this->post('address'),
			'prodi'      	=> $this->post('prodi'),
			'fakultas'      => $this->post('fakultas'),
			'no_hp'      	=> $this->post('no_hp'),
			'email'      	=> $this->post('email'),
		);

		$result = $this->M_mahasiswa->insert($data);
		if ($result) {
			$response['status'] = 200;
			$response['error'] = false;
			$response['message'] = 'success';

			$this->response($response, RestController::HTTP_OK);
		} else {
			$response['status'] = 400;
			$response['error'] = true;
			$response['message'] = 'failed';

			$this->response($response, RestController::HTTP_BAD_REQUEST);
		}
	}
}

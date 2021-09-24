<?php

use chriskacerguis\RestServer\RestController;

class Welcome extends RestController
{

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
		# code...
	}
}

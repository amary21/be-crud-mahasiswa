<?php

use chriskacerguis\RestServer\RestController;

class Add extends RestController
{
    public function index_post()
    {
        $data   = array(
            'nim'               => $this->post('nim'),
            'fullname'          => $this->post('fullname'),
            'address'           => $this->post('address'),
            'prodi'             => $this->post('prodi'),
            'fakultas'          => $this->post('fakultas'),
            'no_hp'             => $this->post('no_hp'),
            'email'             => $this->post('email'),
        );

        $result = $this->M_mahasiswa->insert($data);
        if ($result) {
            $response['status'] = 200;
            $response['error'] = false;
            $response['message'] = 'success add data mahasiswa';

            $this->response($response, RestController::HTTP_OK);
        } else {
            $response['status'] = 400;
            $response['error'] = true;
            $response['message'] = 'failed add data mahasiswa';

            $this->response($response, 502);
        }
    }
}

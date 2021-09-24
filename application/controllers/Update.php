<?php

use chriskacerguis\RestServer\RestController;

class Update extends RestController
{
    public function index_put()
    {
        $id     = $this->put('id');
        $data   = array(
            'nim'               => $this->put('nim'),
            'fullname'          => $this->put('fullname'),
            'address'           => $this->put('address'),
            'prodi'             => $this->put('prodi'),
            'fakultas'          => $this->put('fakultas'),
            'no_hp'             => $this->put('no_hp'),
            'email'             => $this->put('email'),
        );

        $result = $this->M_mahasiswa->update($data, $id);
        if ($result) {
            $response['status'] = 200;
            $response['error'] = false;
            $response['message'] = 'success update data mahasiswa';

            $this->response($response, RestController::HTTP_OK);
        } else {
            $response['status'] = 400;
            $response['error'] = true;
            $response['message'] = 'failed update data mahasiswa';

            $this->response($response, RestController::HTTP_BAD_REQUEST);
        }
    }
}

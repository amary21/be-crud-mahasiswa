<?php

use chriskacerguis\RestServer\RestController;

class Delete extends RestController
{
    public function index_delete()
    {
        $id     = $this->delete('id');

        $result = $this->M_mahasiswa->delete($id);
        if ($result) {
            $response['status'] = 200;
            $response['error'] = false;
            $response['message'] = 'success delete data mahasiswa';

            $this->response($response, RestController::HTTP_OK);
        } else {
            $response['status'] = 400;
            $response['error'] = true;
            $response['message'] = 'failed delete data mahasiswa';

            $this->response($response, RestController::HTTP_BAD_REQUEST);
        }
    }
}

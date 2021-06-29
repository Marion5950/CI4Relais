<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;

class Conteneurs extends ResourceController
{
    protected $modelName = 'App\Models\Mconteneur';
    protected $model;
    protected $format = 'json';
    public function index()
    {
        $recherche = $this->request->getGet('recherche');
        if ($recherche ==""){
        $result['data'] = $this->model->getAll();
        $result['row'] = count($result['data']);
        return $this->respond($result,200);
    }else{
        $result ['data'] = $this->model->getSearch($recherche);
        $result['row'] = count($result['data']);
        return $this->respond($result,200);
    }
    }

    public function show($prmID = null)
    {
        $result = $this->model->getDetail($prmID);
        if (count($result) != 0) {
            return $this->respond($result[0]);
        } else {
            return $this->respond(null, $this->codes['invalid_request']);
        }
    }

    public function create()
    {
        $data = $this->request->getPost('dto');
        $data = json_decode($data, true);

        if ($data != null) {
            $retour = $this->model->createConteneur($data);
            return $this->respond($retour, 201);
        } else {
            return $this->respond(null, 400);
        }
    }

    public function update($prmID = null)
    {
        $dto = null;
        $raw_data = $this->request->getRawInput();
        if (count($raw_data) != 0) {
            $dto = json_decode($raw_data['dto'], true);
            if ($dto != null) {
                $retour = $this->model->updateConteneur($prmID, $dto);
                if (count($retour) != 0) {
                    return $this->respond($retour[0], 200);
                } else {
                    return $this->respond(null, 404);
                }
            } else {
                return $this->respond(null, 400);
            }

            
        } else {
            return $this->respond(null, 400);
        }
    }


    public function delete($prmID = null)
    {
        if ($prmID != null){
            $retour = $this->model->deleteConteneur($prmID);
            return $this->respond($retour, 200);
        }else{
            return $this->respond(null, 400);
        }
    }
}
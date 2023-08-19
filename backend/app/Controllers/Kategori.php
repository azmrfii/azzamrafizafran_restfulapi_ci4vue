<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Kategori extends ResourceController
{
    protected $modelName = 'App\Models\KategoriModel';
    protected $format = 'json';

    /**
     * index function
     * @method : GET
     */
    public function index()
    {
        return $this->respond([
            'statusCode' => 200,
            'message'    => 'OK',
            'data'       => $this->model->orderBy('id', 'DESC')->findAll()
        ], 200);
    }

    /**
     * show function
     * @method : GET with params ID
     */
    public function show($id = null)
    {
        return $this->respond([
            'statusCode' => 200,
            'message'    => 'OK',
            'data'       => $this->model->find($id)
        ], 200);
    }

    /**
     * create function
     * @method : POST
     */
    public function create()
    {
        if ($this->request)
        {
            //get request from Vue Js
            if($this->request->getJSON()) {

                $json = $this->request->getJSON();

                $kategori = $this->model->insert([
                    'kategori'   => $json->kategori
                ]);

            } else {

                //get request from Postman and more
                $kategori = $this->model->insert([
                    'kategori'   => $this->request->getPost('kategori'),
                ]);
            }
            
            return $this->respond([
                'statusCode' => 201,
                'message'    => 'Data Berhasil Disimpan!',
            ], 201);
        }
    }

    /**
     * update function
     * @method : PUT or PATCH
     */
    public function update($id = null)
    {
        //model
        $kategori = $this->model;

        if ($this->request)
        {
            //get request from Vue Js
            if($this->request->getJSON()) {
            
                $json = $this->request->getJSON();
                
                $kategori->update($json->id, [
                    'kategori'   => $json->kategori,
                ]);

            } else {

                //get request from Postman and more
                $data = $this->request->getRawInput();
                $kategori->update($id, $data);
            }

            return $this->respond([
                'statusCode' => 200,
                'message'    => 'Data Berhasil Diupdate!',
            ], 200);
        }
    }


    /**
     * edit function
     * @method : DELETE with params ID
     */
    public function delete($id = null)
    {
        $kategori = $this->model->find($id);

        if($kategori) {

            $this->model->delete($id);

            return $this->respond([
                'statusCode' => 200,
                'message'    => 'Data Berhasil Dihapus!',
            ], 200);

        }
    }
}
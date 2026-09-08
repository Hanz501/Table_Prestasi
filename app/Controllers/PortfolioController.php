<?php

namespace App\Controllers;

use App\Controllers\BaseController;
// use CodeIgniter\HTTP\ResponseInterface;
use App\Models\PortfolioModel;

class PortfolioController extends BaseController
{

    public $helpers = ['form'];

    
    public function index()
    {

        $model = new PortfolioModel();
        $data = [
            'portfolios' => $model->findAll()
        ];
        echo view('portfolio/index', $data);
    }

    public function create()
    {
        helper(['form', 'url']);
        
        // Jika request adalah POST, maka ini untuk menyimpan data
        if ($this->request->is('post')) {
            $rules = [
                'title'       => 'required',
                'description' => 'required'
            ];

            if ($this->validate($rules)) {
                $model = new PortfolioModel();
                
                // Mengambil file gambar
                $imageFile = $this->request->getFile('image');
                $imageName = '';
                
                // Cek apakah ada file gambar yang diupload
                if ($imageFile && $imageFile->isValid() && !$imageFile->hasMoved()) {
                    // Generate nama file acak
                    $imageName = $imageFile->getRandomName();
                    // Pindahkan file ke folder public/uploads
                    $imageFile->move(FCPATH . 'uploads', $imageName);
                }
                
                $model->save([
                    'title'       => $this->request->getPost('title'),
                    'description' => $this->request->getPost('description'),
                    'image'       => $imageName // Simpan nama file ke database
                ]);

                return redirect()->to('/portfolio')->with('message', 'Data berhasil ditambahkan');
            } else {
                $data['validation'] = $this->validator;
                return view('portfolio/create', $data);
            }
        }
        
        return view('portfolio/create');
    }

    public function edit($id)
    {
        helper('form');
        $model = new PortfolioModel();
        
        $data['portfolio'] = $model->find($id);
        if (!$data['portfolio']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('portfolio/edit', $data);
    }

    public function update($id)
    {
        helper(['form', 'url']);
        $model = new PortfolioModel();
        
        $rules = [
            'title'       => 'required',
            'description' => 'required'
        ];

        if ($this->validate($rules)) {
            $dataToUpdate = [
                'title'       => $this->request->getPost('title'),
                'description' => $this->request->getPost('description'),
            ];

            // Cek apakah ada upload gambar baru
            $imageFile = $this->request->getFile('image');
            if ($imageFile && $imageFile->isValid() && !$imageFile->hasMoved()) {
                $imageName = $imageFile->getRandomName();
                $imageFile->move(FCPATH . 'uploads', $imageName);
                $dataToUpdate['image'] = $imageName;
            }
            
            $model->update($id, $dataToUpdate);
            return redirect()->to('/portfolio')->with('success_message', 'Data berhasil diupdate');
        } else {
            $data['portfolio'] = $model->find($id);
            $data['validation'] = $this->validator;
            return view('portfolio/edit', $data);
        }
    }

    public function delete($id)
    {
        $model = new PortfolioModel();
        $portfolio = $model->find($id);
        
        if ($portfolio) {
            $model->delete($id);
            return redirect()->to('/portfolio')->with('success_message', 'Data berhasil dihapus');
        }
        
        return redirect()->to('/portfolio');
    }
}

<?php

namespace App\Controllers;

use App\Models\OrangModel;

class orang extends BaseController
{
    protected $orangModel;
    public function __construct()
    {
        $this->orangModel = new OrangModel();
    }

    public function index()
    {
        $currentPage = $this->request->getVar('page_orang') ? $this->request->getVar('page_orang') :
        1;

        $keyword = $this->request->getVar('keyword');
        if($keyword) {
           $orang = $this->orangModel->search($keyword);
        }else {
            $orang = $this->orangModel;
        }


        $data =[
            'title' => 'Daftar Orang' ,
            // 'orang' => $this->OrangModel->findAll()
            'orang' => $orang->paginate(6, 'orang'),
            'pager' => $this->orangModel->pager,
            'currentPage' => $currentPage
        ];
        return view('orang/index' ,$data);
     }
     
     public function detail($nama)
    {
        $data =[
            'title' => 'Detail Orang',
            'orang' => $this->orangModel->getOrang($nama)
        ];
        return view('orang/detail', $data);       
    }
    public function create()
    {
        //session();
        $data = [
            'title' => 'Form Tambah Data Buku',
            'validation' => \Config\Services::validation()
        ];
        return view('orang/create', $data);
    }
    public function save()
    {
        //validasi input
        if(!$this->validate([
            'Nama' => [
                'rules' => 'required|is_unique[orang.nama]',
                'errors' =>[
                    'required' => '{field} nama harus diisi',
                    'is_unique' => '{field} nama sudah terdaftar!'
                ]
                ]
            
                  ]))
         if(!$this->validate([
             'alamat' => [
                 'rules' => 'required|is_unique[orang.alamat]',
                 'errors' =>[
                     'required' => '{field}  buku harus diisi',
                    
                 ]
             ]
                    
                  ])){
                  $validation = \Config\Services::validation();
                    return redirect()->to('/orang/create')->withInput()->with('validation', $validation);
                  }
                  $slug = url_title($this->request->getVar('nama'), '-', true);
                  $this->bukuModel->save([
                      'nama' => $this->request->getVar('nama'),
                      'slug' => $slug,
                      'alamat' => $this->request->getVar('alamat'),
                  ]);
                  session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!');
                  return redirect()->to('/orang');
              }
    public function delete($id)
    {
        $this->OrangModel->delete($id);
        session()->setFlashdata('pesan','Data Berhasil Dihapus!');
        return redirect()->to('/orang');
    }
     public function edit($slug)
     {
         $data =[
             'title'=> 'From Ubah Data Karyawan',
             'validation'=>\Config\Services::validation(),
             'orang'=>
             $this->OrangModel->getOrang($slug)
         ];
         return view('buku/edit', $data);
     }
     public function update($id)
    {
        if(!$this->validate([
            'Namal' => [
            'rules' => 'required|is_unique[orang.Nama]',
               'errors' => [
                       'required' => '{field} Nama harus diisi',
                        'is_unique' => '{field} Nama sudah terdaftar!'
             ]
          ]
          ]))
                if(!$this->validate([
                'Alamat' => [
                    'rules' => 'required|is_unique[orang.alamat]',
                    'errors' =>[
                        'required' => '{field}  Alamat harus diisi',
                        'is_unique' => '{field} Alamat sudah terdaftar!'
                    ]
                ]
                       
                ])){                       
         
                    return redirect()->to('/orang/edit/'. $this->request->getVar('slug'))->withInput();
                }
                $slug = url_title($this->request->getVar('Nama'), '-', true);
        $this->OrangModel->save([
            'id' => $id,
            'Nama' => $this->request->getVar('Nama'),
            'slug' => $slug,
            'Alamat' => $this->request->getVar('Alamat'),
        ]);
        session()->setFlashdata('pesan', 'Data Berhasil Diubah!');
        return redirect()->to('/orang');
    }
   
}

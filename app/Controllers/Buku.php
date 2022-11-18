<?php

namespace App\Controllers;

use App\Models\BukuModel;

class Buku extends BaseController
{
    protected $bukuModel;
    public function __construct()
    {
        $this->bukuModel = new BukuModel();
    }

    public function index()
    {
        $currentPage = $this->request->getVar('page_buku') ? $this->request->getVar('page_buku') :
        1;

        $keyword = $this->request->getVar('keyword');
        if($keyword) {
           $buku = $this->bukuModel->search($keyword);
        }else {
            $buku = $this->bukuModel;
        }

       // $buku = $this->bukuModel->FindAll();
        $data =[
            'title' => 'Daftar Buku' ,
            'buku' => $buku->paginate(3, 'buku'),
            'pager' => $this->bukuModel->pager,
            'currentPage' => $currentPage
        ];
        return view('buku/index' ,$data);

    }
    public function detail($slug)
    {
        $data =[
            'title' => 'Detail Buku',
            'buku' => $this->bukuModel->getBuku($slug)
        ];
        return view('buku/detail', $data);       
    }
    public function create()
    {
        //session();
        $data = [
            'title' => 'Form Tambah Data Buku',
            'validation' => \Config\Services::validation()
        ];
        return view('buku/create', $data);
    }

    public function save()
    {
        //validasi input
        if(!$this->validate([
            'judul' => [
                'rules' => 'required|is_unique[buku.judul]',
                'errors' =>[
                    'required' => '{field} buku harus diisi',
                    'is_unique' => '{field} buku sudah terdaftar!'
                ]
                ]
            
                  ]))
         if(!$this->validate([
             'kelas' => [
                 'rules' => 'required|is_unique[buku.kelas]',
                 'errors' =>[
                     'required' => '{field}  buku harus diisi',
                    
                 ]
             ]
                    
                  ]))
             if(!$this->validate([
             'penulis' => [
                 'rules' => 'required|is_unique[buku.penulis]',
                 'errors' =>[
                      'required' => '{field} buku harus diisi',
                        
                     ]
            ]
                            
                 ]))
             if(!$this->validate([
             'penerbit' => [
             'rules' => 'required|is_unique[buku.penerbit]',
                'errors' =>[
                        'required' => '{field} buku harus diisi',
                        
                     ]
             ] 
                                            
                  ]))
             if(!$this->validate([
              'sampul' => [
              'rules' => 'required|is_unique[buku.sampul]',
                 'errors' =>[
                         'required' => '{field} buku harus diisi',
                          
                        ]
            ],
            'sampul' => [
                'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/
                jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ]
                                                    
                 ])) {
                    // $validation = \Config\Services::validation();
                    // return redirect()->to('/buku/create')->withInput()->with('validation', $validation);
                    return redirect()->to('/buku/create')->withInput();
                  }
                  //ambil gambar
                  $fileSampul = $this->request->getFile('sampul');
                  //apakah tidak ada gambar yang di upload
                  if($fileSampul->getError() == 4) {
                    $namaSampul ='default.jpg';
                  } else {
                    // generate nama sampul random
                    $namaSampul = $fileSampul->getRandomName();
                    //pindahkan file ke folder img
                    $fileSampul->move('img', $namaSampul);
                  }

        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->bukuModel->save([
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'kelas' => $this->request->getVar('kelas'),
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'sampul' => $namaSampul
        ]);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!');
        return redirect()->to('/buku');
    }
    public function delete($id)
    {
        //cari gambar berdasarkan id
        $buku = $this->bukuModel->find($id);
        //cek jika file gambarnya fisika.jpg
        if ($buku['sampul'] != 'default.jpg') {
            //hapus gambar
            // unlink('img/' . $buku['sampul']);
        }
        $this->bukuModel->delete($id);
        session()->setFlashdata('pesan','Data Berhasil Dihapus!');
        return redirect()->to('/buku');
    }
    public function edit($slug)
    {
        $data =[
            'title'=> 'Form Ubah Data Buku',
            'validation' => \Config\Services::validation(),
            'buku' => $this->bukuModel->getBuku($slug)
        ];
        return view('buku/edit',$data);
    }
    public function update($id)
    {
        //cek judul
        $bukuLama = $this->bukuModel->getBuku($this->request->getVar('slug'));
        if($bukuLama['judul'] == $this->request->getVar('judul')){
            $rule_judul = 'required';
        }else{
            $rule_judul = 'required|is_unique[buku.judul]';
        }
        if(!$this->validate([
            'judul' => [
            'rules' => 'required|is_unique[buku.judul]',
               'errors' => [
                       'required' => '{field} buku harus diisi',
                        'is_unique' => '{field} sampul sudah terdaftar!'
             ]
          ]
          ]))
                if(!$this->validate([
                'kelas' => [
                    'rules' => 'required|is_unique[buku.kelas]',
                    'errors' =>[
                        'required' => '{field}  buku harus diisi',
                        'is_unique' => '{field} sampul sudah terdaftar!'
                    ]
                ]
                       
                ]))
                if(!$this->validate([
                'penulis' => [
                    'rules' => 'required|is_unique[buku.penulis]',
                    'errors' =>[
                         'required' => '{field} buku harus diisi',
                         'is_unique' => '{field} sampul sudah terdaftar!'
                          
                        ]
               ]
                               
                    ]))
                if(!$this->validate([
                'penerbit' => [
                'rules' => 'required|is_unique[buku.penerbit]',
                   'errors' =>[
                           'required' => '{field} buku harus diisi',
                           'is_unique' => '{field} sampul sudah terdaftar!'
                          
                        ]
                ] 
                                               
                     ]))
                if(!$this->validate([
                 'sampul' => [
                 'rules' => 'required|is_unique[buku.sampul]',
                    'errors' =>[
                            'required' => '{field} buku harus diisi',
                            'is_unique' => '{field} sampul sudah terdaftar!'
                             
                           ]
               ],
               'sampul' => [
                   'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                   'errors' => [
                       'max_size' => 'ukuran gambar terlalu besar',
                       'is_image' => 'Yang anda pilih bukan gambar',
                       'mime_in' => 'Yang anda pilih bukan gambar'
                   ]
               ]

        ])){                       
         
         return redirect()->to('/buku/edit/'. $this->request->getVar('slug'))->withInput();
     }
     $fileSampul = $this->request->getFile('sampul');

     //cek gambar,apakah tetapgambar yang lama
     if($fileSampul->getError() == 4) {
        $namaSampul = $this->request->getVar('sampulLama');
     } else {
        //generate nama file random
        $namaSampul = $fileSampul->getRandomName();
        //pindahkan gambar
        $fileSampul->move('img', $namaSampul);
        //hapus file yang lama
        unlink('img/'. $this->request->getVar('sampulLama'));
     }
    
        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->bukuModel->save([
            'id' => $id,
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'kelas' => $this->request->getVar('kelas'),
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'sampul' => $namaSampul
        ]);
        session()->setFlashdata('pesan', 'Data Berhasil Diubah!');
        return redirect()->to('/buku');
    }
}

<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'web | skanic',
        ];
    return view('pages/home', $data);
   
    }

    public function about()
    {
        $data = [
            'title' => 'about | skanic',
        ];
        return view('pages/about', $data);
        

    }

    public function contact()
    {
        $data = [
            'title' => 'contact | skanic',
            'alamat' => [
                [
                    'tipe' =>'Rumah',
                    'alamat' =>'jl.ciomas',
                    'kab' =>'Bogor'
                ],
                [
                    'tipe' =>'sekolah',
                    'alamat' =>'jl.pagelaran',
                    'kab' =>'Bogor'
                ]
            ]
        ];
        return view('pages/contact', $data);
        

    }
}

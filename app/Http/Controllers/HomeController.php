<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Termwind\Components\Raw;

class HomeController extends Controller
{
    public function home ()
    {
        return view ('welcome');
    }

    public function about ()
    {
        return view ('about');
    }

    public function contact ()
    {
        return view ('contact');
    }

    public function kirim (Request $request)
    {
    
        $nama = $request->input("nama");
        $jurusan = $request->input("jurusan");
        $alamat = $request->input("alamat");

        return view ("page.dashboard",['nama'=>$nama,'jurusan'=>$jurusan,'alamat'=>$alamat]);
    }
}

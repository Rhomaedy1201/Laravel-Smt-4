<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index($nama)
    {
        return $nama;
    }
    // fungsi dibawah juga sama outputnya seperti diatas
    // public function index(Request $request){
    //     return $request->segment(2);
    // }

    //request menggunakan post
    public function formulir()
    {
        return view('formulir');
    }
    public function proses(Request $request)
    {
        // menambahakan array yang terdapat parameter required, min, nax dan juga keterangannya yg disimpan di variable messages
        $messages = [
            'required' => 'Input :attribute wajib diisi!',
            'min' => 'Input :attribute harus diisi minimal :min karakter!',
            'max' => 'Input :attribute harus diisi maksimal :max karakter!',
        ];

        // memvalidasi nama dan juga alamat untuk menentukan inputannya
        $this->validate($request, [
            'nama' => 'required|min:5|max:20',
            'alamat' => 'required|alpha_num'
        ], $messages);

        // menyimpan input data nama dan alamat yg disimpan pada variable
        $nama = $request->input('nama');
        $alamat = $request->input('alamat');

        // mengembalikan dan juga menampilkan hasil inputan nama dan alamat
        return "Nama : " . $nama . "<br>" . "Alamat : " . $alamat;
    }
}
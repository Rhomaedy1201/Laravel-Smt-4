<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class UploadController extends Controller
{
    public function upload(Request $request)
    {
        return view('upload');
    }

    public function proses_upload(Request $request)
    {
        $this->validate($request, [
            'file' => 'required',
            'keterangan' => 'required',
        ]);

        // menyimpan data file yang di upload ke variable file
        $file = $request->file('file');
        // nama file
        echo 'File Name: ' . $file->getClientOriginalName() . '<br/>';
        // extensi file
        echo 'File Extension: ' . $file->getClientOriginalExtension() . '<br/>';
        // real path
        echo 'File Real Path: ' . $file->getRealPath() . '<br/>';
        // ukuran file
        echo 'File Size: ' . $file->getSize() . '<br/>';
        // type mime
        echo 'File Mime Type: ' . $file->getMimeType() . '<br/>';
        // isikan dengan folder dimana file diupload
        $tujual_upload = 'data_file';
        // upload file
        $file->move($tujual_upload, $file->getClientOriginalName());
    }

    public function resize_upload(Request $request)
    {
        $this->validate($request, [
            'file' => 'required',
            'keterangan' => 'required'
        ]);

        // Tentukan path lokasi upload
        $path = public_path("img/logo");

        // Jika folder belum ada maka folder tersebut akan dibuat
        if (!File::isDirectory($path)) {
            File::makeDirectory($path, 0777, true);
        }

        // Mengambil file image dari form
        $file = $request->file('file');

        // Membuat name file dari gabungan tanggal dan uniqid()
        $fileName = 'logo_' . uniqid() . '.' . $file->getClientOriginalExtension();

        // Membuat canvas image sebesar dimensi
        $canvas = Image::canvas(200, 200);

        // Resize image sesuai dimensi dengan mempertahankan ratio
        $resizeImage = Image::make($file)->resize(null, 200, function ($constraint) {
            $constraint->aspectRatio();
        });

        // Memasukan image yang telah diresize ke dalam canvas
        $canvas->insert($resizeImage, 'center');

        // Simpan image ke folder
        if ($canvas->save($path . '/' . $fileName)) {
            return redirect(url('upload'))->with('success', 'Data berhasil ditambahkan!');
        } else {
            return redirect(url('upload'))->with('error', 'Data gagal ditambahkan!');
        }

    }

    public function dropzone()
    {
        return view('dropzone');
    }
    public function dropzone_store(Request $request)
    {
        $image = $request->file('file');
        $imageName = time() . '.' . $image->extension();
        $image->move(public_path('img/dropzone'), $imageName);
        return response()->json(['success' => $imageName]);
    }

    public function pdf_upload()
    {
        return view('pdf_upload');
    }
    public function pdf_store(Request $request)
    {
        $pdf = $request->file('file');
        $pdfName = 'pdf_' . time() . '.' . $pdf->extension();
        $pdf->move(public_path('pdf/dropzone'), $pdfName);
        return response()->json(['success' => $pdfName]);
    }
}
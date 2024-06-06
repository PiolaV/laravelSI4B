<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::all(); // select * from mahasiswa 
        return view('mahasiswa.index')
                ->with('mahasiswa', $mahasiswa);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $prodi = Prodi::all();
        return view('mahasiswa.create')->with('prodi',$prodi);
   
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
          //dd($request);
        // validasi form
        $val = $request ->validate([
            'npm' => "required|unique:mahasiswas",
            'nama' => "required",
            'tempat_lahir' => "required",
            'tanggal_lahir'=>"required|date",
            'alamat'=>"required",
            'prodi_id'=>"required",
            'url_foto'=>"required|file|mimes:png,jpg|max:5000"
        ]);

        // ektensi file yang diupload
        $ext = $request->url_foto->getClientOriginalExtension();
        // rename misal : npm 22272579.png
        $val['url_foto'] = $request->npm.".".$ext;
        // uplod ke dalam folder public /foto 
        $request->url_foto->move('foto', $val['url_foto'] );





        // simpan le tabel fakultas
        Mahasiswa:: create($val);

        // redirect ke halam list program studi 
        return redirect()->route('mahasiswa.index')->with('success',$val['nama'].'berhasil disimpan');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        //dd($mahasiswa);
        $prodi= Prodi::all();
        return view('mahasiswa.edit')
            ->with('prodi', $prodi)
            ->with('mahasiswa', $mahasiswa);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        //dd($request);
        if($request->url_foto){ // jika ada file yangdilampirkan 
            $val = $request ->validate([
                // 'npm' => "required|unique:mahasiswas",
                'nama' => "required",
                'tempat_lahir' => "required",
                'tanggal_lahir'=>"required|date",
                'alamat'=>"required",
                'prodi_id'=>"required",
                'url_foto'=>"required|file|mimes:png,jpg|max:5000"
            ]);
             // ektensi file yang diupload
            $ext = $request->url_foto->getClientOriginalExtension();
            // rename misal : npm 22272579.png
            $val['url_foto'] = $request->npm.".".$ext;
            // uplod ke dalam folder public /foto 
            $request->url_foto->move('foto', $val['url_foto'] );

        } else {// jika tidak ada file foto 
            $val = $request ->validate([
                // 'npm' => "required|unique:mahasiswas",
                'nama' => "required",
                'tempat_lahir' => "required",
                'tanggal_lahir'=>"required|date",
                'alamat'=>"required",
                'prodi_id'=>"required",
                // 'url_foto'=>"required|file|mimes:png,jpg|max:5000"
            ]);

        }
       
    




        // simpan le tabel mahasiswa
        Mahasiswa:: where('id', $mahasiswa['id']) ->update($val);

        // redirect ke halam list program studi 
        return redirect()->route('mahasiswa.index')->with('success',$val['nama'].'berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        //dd($mahasiswa);
        File:: delete('foto/'. $mahasiswa['url_foto']);
        $mahasiswa->delete(); // untuk menghapus data mahasiswa
        return redirect()->route('mahasiswa.index')->with('success','Data berhasil dihapus');
    }
}

<?php

namespace App\Http\Controllers;

use App\Isi;
use Illuminate\Http\Request;
use App\Image;
use App\Http\Request\IsiRequest;
use Illuminate\Support\Facades\Input;
use App\Kategori;
use Illuminate\Support\Facades\Storage;


class IsiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Isi = isi::latest()->paginate(5);

        return view('isi.index', ['Isi' => $Isi]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Isi $isi)
    {
        $kategoris = Kategori::all();
        return view('isi.create')->with('kategoris', $kategoris);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        //metode tutorial

        $this->validate($request, [
            'judul' => 'required',
            'keterangan_objek' =>'required',
            //'map' => 'nullable',
            'nama_admin' =>'required',
            'kategori_id' => 'required',
            'gambar' => 'required|image',
            'pengarang' => 'nullable'
        ]);

        if ($request->hasFile('gambar')) {
            $namaFileDenganExt = $request->file('gambar')->getClientOriginalName();
            $namaFile = pathinfo($namaFileDenganExt, PATHINFO_FILENAME);
            $extensi = $request->file('gambar')->getClientOriginalExtension();
            $namaFileDisimpan = $namaFile.'_'.time().'.'.$extensi;
            $jalur = $request->file('gambar')->storeAs('public/gambar', $namaFileDisimpan);
        }else{
            $namaFileDisimpan = 'noimage.jpg';
        }

        $isi = new isi;
        $isi->judul = $request->input('judul');
        $isi->keterangan_objek = $request->input('keterangan_objek');
        $isi->map = $request->input('map');
        $isi->nama_admin = $request->input('nama_admin');
        $isi->gambar = $namaFileDisimpan;
        $isi->kategori_id = $request->kategori_id;
        $isi->pengarang = $request->input('pengarang');
        $isi->lat = $request->input('lat');
        $isi->lng = $request->input('lng');
        $isi->save();

        return redirect('/home');

        //sampai sini metodenya
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Isi  $isi
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $isi = isi::all();

        return view('isi.index', ['isi' => $isi]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Isi  $isi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $isi = isi::find($id);
        $kategoris = Kategori::all();
        return view('isi.edit')->with('isi', $isi)->with('kategoris', $kategoris); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Isi  $isi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            $this->validate($request, [
                'judul' => 'required',
                'keterangan_objek' =>'required',
                //'map' => 'nullable',
                'nama_admin' =>'required',
                'gambar' => 'required | image',
                'pengarang' => 'nullable',
                'lat' => 'nullable',
                'lng' => 'nullable',
                'kategori_id' => 'required'   
            ]);

            $isi = isi::find($id);
            if ($request->hasFile('gambar')) {
                $namaFileDenganExt = $request->file('gambar')->getClientOriginalName();
                $namaFile = pathinfo($namaFileDenganExt, PATHINFO_FILENAME);
                $extensi = $request->file('gambar')->getClientOriginalExtension();
                $namaFileDisimpan = $namaFile.'_'.time().'.'.$extensi;
                $jalur = $request->file('gambar')->storeAs('public/gambar', $namaFileDisimpan);
            }
            $isi->judul = $request->input('judul');
            $isi->keterangan_objek = $request->input('keterangan_objek');
            $isi->map = $request->input('map');
            $isi->nama_admin = $request->input('nama_admin');
            $isi->kategori_id = $request->input('kategori_id');
            $isi->pengarang = $request->input('pengarang');
            $isi->lat = $request->input('lat');
            $isi->lng = $request->input('lng');
            if ($request->hasFile('gambar')){
                $isi->gambar = $namaFileDisimpan;
            }
            $isi->save();

            return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Isi  $isi
     * @return \Illuminate\Http\Response
     */
    
    public function destroy($id)
    {
        $isi = isi::find($id);
        
        if ($isi['gambar'] != 'noimage.jpg') {
            Storage::delete('public/gambar'.$isi->gambar);
        }
        
        $isi->delete();
        
        return redirect('/home'); 
    }

}

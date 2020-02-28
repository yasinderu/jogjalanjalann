<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Isi;
use App\Kategori;
use App\Image;
use Mapper;
use Illuminate\Support\Facades\Storage;
class artikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
        //$kategori = Kategori::with('artikel')->where('judul', '=', 'abc');
        //$kategori = Kategori::all();
        //$search = $request->input('search');
        $artikel = isi::latest()->paginate(3);
        $kategori = Kategori::all();

        //return view('artikel.index')->with('kategori', $kategori);

        return view('artikel.index')->with('artikel', $artikel)->with('kategori', $kategori);
    }


    /*public function navbar_index()
    {
        $kategori = Kategori::all();
        //$kategori = Kategori::find($id);
        //$artikel = Isi::all();

        return view('layouts.navbar')->with('kategori', $kategori);
    }
    */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create ()
    {
         
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $artikel = isi::find($id);
        return view ('artikel.post')->with('artikel', $artikel);

        //$kategori = Kategori::find($id);
        //return view ('artikel.post')->with('kategori', $kategori);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

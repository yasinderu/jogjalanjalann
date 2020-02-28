<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Isi;
use App\Kategori;
use App\Image;
use Illuminate\Support\Facades\Storage;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function pantai()
    {
        $artikels = isi::latest()->where('kategori_id', '=', 1)->paginate(3);
        return view('kategori.pantai', ['artikels' => $artikels]);
    }

    /*public function index(){
        $kategori = Kategori::all();
        return view('artikel.index')->with('kategori', $kategori);
    }

    public function show($id){
        $kategori = Kategori::find($id);
        $artikel = Isi::all();
        return view('Kategori.post')->with('kategori', $kategori)->with('artikel', $artikel);
    }*/

    public function budaya()
    {
        $artikels = isi::latest()->where('kategori_id', '=', 2)->paginate(3);
        return view('kategori.budaya', ['artikels' => $artikels]);
    }

    public function gunung()
    {
        $artikels = isi::latest()->where('kategori_id', '=', 3)->paginate(3);
        return view('kategori.gunung', ['artikels' => $artikels]);
    }

    public function kuliner()
    {
        $artikels = isi::latest()->where('kategori_id', '=', 4)->paginate(3);
        return view('kategori.kuliner', ['artikels' => $artikels]);
    }

    public function search(Request $request){
        $result = isi::search($request->search)->get();
        return view('search.result', compact('result'));
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Isi extends Model
{
	use Searchable;
    protected $table = 'isi';
    protected $fillable = ['judul', 'keterangan_objek', 'gambar', 'map', 'nama_admin', 'isi_id'];

    public function kategori(){
    	return $this->belongsTo('App\Kategori');
    }
}

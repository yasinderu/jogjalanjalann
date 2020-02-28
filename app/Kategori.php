<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Kategori extends Model
{
	use Searchable;
    protected $table = 'kategori';

    public function artikel (){
    	return $this->hasMany('App\Isi');
    }
}

@extends('layouts.app') 

@section('content')


<div class="panel panel-info">
    <div class="panel-heading">
        <center>
        <h1>
        Form Tambah Data
        </h1>
        </center>
    </div>
    
    <div class="panel-body">
        <a href="{{ URL('isi') }}" class="btn btn-raised btn-danger pull-left">Kembali</a>
        {{-- part alert --}}
        
            {{-- Kita cek, jika sessionnya ada maka tampilkan alertnya, jika tidak ada maka tidak ditampilkan alertnya --}}
        
        @if (Session::has('after_save'))
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-dismissible alert-{{ Session::get('after_save.alert') }}">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                      <strong>{{ Session::get('after_save.title') }}</strong>
                      <a href="javascript:void(0)" class="alert-link">{{ Session::get('after_save.text-1') }}</a> {{ Session::get('after_save.text-2') }}
                    </div>
                </div>
            </div>
        @endif
        {{-- end part alert --}}
        <div class="row">
            <div class="col-md-12"><hr>
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <form class="form-horizontal" action="{{ URL('isi/store') }}" method="POST">
                    {{ csrf_field() }}
                      <fieldset>
    
    <div class="form-group label-floating">
        <label class="control-label" for="focusedInput2">Judul</label>
            <input class="form-control" id="focusedInput2" type="text" name="judul">
                <p class="help-block">Masukan data Informasi dengan benar.</p>
                </div>

   <div class="form-group label-floating">
        <label class="control-label" for="focusedInput2">Keterangan</label>
        <textarea class="form-control" id="focusedInput2" type="text" name="keterangan_objek"> </textarea>
                <p class="help-block">Masukan data Informasi dengan benar.</p>
                </div>

    <div class="form-group label-floating">
        <label class="control-label" for="focusedInput2">Map</label>
            <input class="form-control" id="focusedInput2" type="text" name="map">
                <p class="help-block">Masukan data Informasi dengan benar.</p>
                </div>   

    <div class="form-group label-floating">
        <label class="control-label" for="focusedInput2">Nama Admin</label>
            <input class="form-control" id="focusedInput2" type="text" name="nama_admin">
                <p class="help-block">Masukan data Informasi dengan benar.</p>
                </div> 

    <div class="form-group label-floating">
        <label class="control-label" for="focusedInput2">Gambar</label>  
            <input type="file" name="gambar">
                <p class="help-block">Masukan data Informasi dengan benar.</p>
                </div>                                      
                            
                            <div class="form-group">
                              <div class="col-md-12">
                                <button type="submit" class="btn btn-raised btn-primary" name="simpan">Submit</button>
                                <button type="reset" class="btn btn-raised btn-warning">Reset</button>
                              </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </div>
</div>
</form>

@stop
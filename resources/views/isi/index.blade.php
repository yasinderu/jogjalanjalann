@extends('layouts.app')

@section('content')
<title>Jogjalanjalan</title>
<main role="main">
<div class="col-md-12">
    <div class="panel panel-primary">
        <div class="panel-heading"> <h2 class="text-left">Tabel Informasi</h2></div>
        <div class="panel-body">
 <a href="{{url('/isi/create')}}" class="btn btn-success pull-right">Tambah Data</a> 
    <br>  
 <hr>
 <table class="table table-bordered table-hover">
     <thead>
     <tr class="bg-info" align="center" valign="center">
         <td >No</td>
         <td >Judul</td>
         <td >Keterangan</td>
         <td >Kategori</td>
         <td >Pengarang</td>
         <td >Gambar</td>
         <td ></td>
     </tr>
     </thead>
     <tbody>
        <?php
        $no=1;
        ?>

     @foreach ($Isi as $isi)
         <tr>
             <td>{{ $no++ }}</td>
             <td>{{ $isi->judul }}</a></td>
             <td>{{ substr($isi->keterangan_objek, 0, 50) }} {{strlen($isi->keterangan_objek) > 50 ? "..." : ""}}</td>
             <td>{{ $isi->kategori->nama_kategori }}</td>  
             <td>{{ $isi->pengarang }}</td>
             <td><img src="storage/gambar/{{$isi->gambar}}" style="width:50px"></td>
             <td align="center"> <a href="{{ route('isi.edit', $isi->id)}}" class="btn btn-link">Ubah</a>
                    <form method="post" action="{{ url('/isi/'.$isi->id)}}">
                    {{ csrf_field() }} 
                    {{ method_field('DELETE')}}
                    <button type="submit" name="hapus" class="btn btn-link" align="right" onClick="return confirm('Anda yakin akan menghapus data ini?');">Hapus</button>
                </form>
            </td>
         </tr>
     @endforeach
     </tbody>
 </table>
<div class="text-center">
    {{ $Isi->links() }}
</div>
@endsection
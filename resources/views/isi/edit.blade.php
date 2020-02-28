@extends('layouts.app') 

<style>
#map-canvas{
    width: 600px;
    height: 300px;
}
</style>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCakgkG11LGcP9vbEBIq-ULHcN1hbLc908&libraries=places"></script>

<div class="panel panel-info">
	<div class="panel-heading">
		<center>
		<h1>
		Form Edit Data
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
        @include('inc.messages')
		<div class="row">
			<div class="col-md-12"><hr>
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<form class="form-horizontal" action="{{ route('isi.update', $isi->id) }}" method="POST" enctype="multipart/form-data">
					{{ method_field('PUT') }}
					{{ csrf_field() }}
					  <fieldset>
    <div class="form-group label-floating">
        <label class="control-label" for="focusedInput2">Judul</label>
            <input class="form-control" id="focusedInput2" type="text" name="judul" value="{{$isi->judul}}">
                </div>

   <div class="form-group label-floating">
        <label class="control-label" for="focusedInput2">Keterangan</label>
        <textarea class="form-control" id="focusedInput2" type="text" name="keterangan_objek">{{$isi->keterangan_objek}}</textarea>
                </div> 

    <div class="form-group label-floating">
        <label class="control-label" for="focusedInput2">Nama Admin</label>
            <input class="form-control" id="focusedInput2" type="text" name="nama_admin" value="{{$isi->nama_admin}}">
                </div>

    <div class="form-group label-floating">
        <label class="control-label" for="focusedInput2">Pengarang</label>
            <input class="form-control" id="focusedInput2" type="text" name="pengarang" value="{{$isi->pengarang}}">
                </div> 

    <div class="form-group label-floating">
        <label class="control-label" for="focusedInput2">Kode Kategori</label>
            <select class="form-control" name="kategori_id">
                @foreach($kategoris as $kategori)
                    <option class="form-group" value="{{$kategori->id}}">{{$kategori->nama_kategori}}</option>
                @endforeach
            </select>
        </div>
    <div class="form-group label-floating">
        <label class="control-label" for="focusedInput2">Gambar</label>  
            <input type="file" name="gambar">
                </div>

    <div class="col-md-2"></div>
				<div class="form-group">
                        <label>lokasi</label>
                        <input type="text" class="form-control input-sm" id="searchmap" placeholder="Masukan Lokasi">
                        <div id="map-canvas"></div>
                    </div>
                    <div class="form-group">
                        <label>lat</label>
                        <input type="text" class="form-control input-sm" name="lat" id="lat">
                    </div>
                    <div class="form-group">
                        <label>lng</label>
                        <input type="text" class="form-control input-sm" name="lng" id="lng">
                    </div>
                </div>
                <script>
                    var map = new google.maps.Map(document.getElementById('map-canvas'),{
                        center:{
                            lat: -7.7828893,
                            lng: 110.36707619999993
                        },
                        zoom:15
                    });

                    var marker = new google.maps.Marker({
                        position:{
                            lat: -7.7828893,
                            lng: 110.36707619999993
                        },
                        map: map,
                        draggable: true
                    });

                    var searchBox = new google.maps.places.SearchBox(document.getElementById('searchmap'));

                    google.maps.event.addListener(searchBox, 'places_changed', function(){
                        var places = searchBox.getPlaces();
                        var bounds = new google.maps.LatLngBounds();
                        var i, place;

                        for (i = 0; place=places[i];i++){
                            bounds.extend(place.geometry.location);
                            marker.setPosition(place.geometry.location);
                        }
                        map.fitBounds(bounds);
                        map.setZoom(15);
                    });
                    google.maps.event.addListener(marker,'position_changed', function(){
                        var lat = marker.getPosition().lat();
                        var lng = marker.getPosition().lng();
                        $('#lat').val(lat);
                        $('#lng').val(lng);
                    });
                </script>     			
                        	<div class="form-group">
                        		<div class="col-md-12">
                        			<button type="submit" class="btn btn-raised btn-primary" name="simpanedit">Submit</button> 
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

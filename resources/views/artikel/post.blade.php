@include('layouts.app1')
  <script src="{{asset('js/jquery.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script>
    $(document).ready(function() {
    $('.navbar').addClass('solid');
    });
  </script>  
<style type="text/css">
  .banner-section{
  background-image:url('{{asset('img/headerpost.jpg')}}'); 
  background-size:cover; 
  height: 300px; 
  left: 0; 
  position: absolute; 
  top: 0; 
  background-position:0;
}
</style>

</head>
@include('layouts.navbar')
<body>

<style> 
p.test1 {
    width: 200px; 
    border: 2px solid #000000;
    font-size: 100px;
    word-break: keep-all;
}
#map-canvas{
    width: 600px;
    height: 300px;
}
</style>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCakgkG11LGcP9vbEBIq-ULHcN1hbLc908&libraries=places"></script>
<section class="banner-section">
</section>
<section class="post-content-section">
    <div class="container">
<div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 post-title-block">
              <h1 class="text-center" style="color: white">{{$artikel->judul}}</h1>
                <ul class="list-inline text-center">
                    <li style="color: white">{{$artikel->pengarang}} | </li> 
                    <li style="color: white">{{$artikel->kategori->nama_kategori}} - {{$artikel->kategori->aksara}} | </li>
                    <li style="color: white">{{date('M j,Y', strtotime($artikel->created_at))}}</li>
                </ul>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-12">
            <div class="col-md-9">
                <div class="text-center">
                    <img src="{{ URL::to('/') }}/storage/gambar/{{ $artikel->gambar }}" style="max-height: 300px"><br>
                    <p></p>
                    <br>
                </div>
            </div><br>
            <div class="col-md-12">
                <article><p class="text1">{{$artikel->keterangan_objek}}</p></article><br><br>
            @if($artikel->lat != null && $artikel->lng != null)
                <div class="col-md-6">
                    <div class="form-group">    
                        <div id="map-canvas"></div>
                    </div>
                    
                </div>
                <script>

                    var lat = {{$artikel->lat}};
                    var lng = {{$artikel->lng}};

                    var map = new google.maps.Map(document.getElementById('map-canvas'),{
                        center:{
                            lat: lat,
                            lng: lng
                        },
                        zoom:15
                    });

                    var marker = new google.maps.Marker({
                        position:{
                            lat: lat,
                            lng: lng
                        },
                        map: map,
                        draggable: true
                    });
                </script>
                @else
                <div class="col-md-6">
                    <div class="form-group">
                        <label>lokasi</label>
                        <input type="text" class="form-control input-sm" id="searchmap" placeholder="Masukan Lokasi">
                        <div id="map-canvas"></div>
                    </div>
                </div>
                <script>

                    var map = new google.maps.Map(document.getElementById('map-canvas'),{
                        center:{
                            lat: -7.7974565,
                            lng: 110.37069700000006
                        },
                        zoom:15
                    });

                    var marker = new google.maps.Marker({
                        position:{
                            lat: -7.7974565,
                            lng: 110.37069700000006
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
                @endif
            </div>
</div>

<div class="col-lg-3  col-md-3 col-sm-12">
  
                <div class="well">
                    <h3 class="text-center">ꦔꦪꦺꦴꦒꦾꦏꦂꦠ</h3><br>
                    <img src="{{ asset('img/logoprov.jpg') }}" class="img-rounded" width="225" height="260"/><br><br>
                    <p>Yogyakarta Special Region (Java: Dhaérah Istiméwa Ngayogyakarta) is a province-level Special Region in Indonesia which is a fusion of the Sultanate of Yogyakarta and the Paku Alaman State of Kadipaten. Yogyakarta Special Region is located in the southern part of Java Island, and is bordered by Central Java Province and Indian Ocean.</p>
                    <a href="https://id.wikipedia.org/wiki/Daerah_Istimewa_Yogyakarta" class="btn btn-default">Read more</a>
                </div>
            </div>
        </div>
    </div> <!-- /container -->
    <br><br>

    <!----------- Footer ------------>
  @include('layouts.footer')


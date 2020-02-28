@include('layouts.navbar')
@include('layouts.app1')
<script src="{{asset('js/jquery.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script>
    $(document).ready(function() {
    $('.navbar').addClass('solid');
    });
  </script>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="img/slider/mount/ireng.jpg" alt="Image">     
      </div>

      <div class="item">
        <img src="img/slider/mount/gentong.jpg" alt="Image">     
      </div>

      <div class="item">
        <img src="img/slider/mount/nglanggeran.jpg" alt="Image">     
      </div>
    </div>




    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
 </div>
            <div class="main-text hidden-xs">
                <div class="col-md-12 text-center">
                    <h1>
                        ꧋ꦣꦲꦺꦫꦃꦲꦶꦯ꧀ꦡꦶꦩꦺꦮꦔꦪꦺꦴꦓꦾꦑꦂꦡ꧉</h1>
                  </div>
                </div>
                
<div class="index-content">
    <div class="container">
      <div class="site-heading text-center">
            <h3>Mount - ꦒꦸꦤꦸꦁ</h3><br><br><br>
            <div class="border"></div>
          </div>
            @foreach($artikels as $artikel)
            
            <a href="{{ route('artikel.show', $artikel->id)}}">
                <div class="col-lg-4">
                    <div class="card">
                        <img src="storage/gambar/{{$artikel->gambar}}" style="height: 200px">
                        <h4>{{ substr($artikel->judul, 0, 30)}} {{strlen($artikel->judul) > 30 ? "..." : ""}}</h4>
                        <p>{{ substr($artikel->keterangan_objek, 0, 85) }} {{strlen($artikel->keterangan_objek) > 85 ? "..." : ""}}</p>
                        <p>{{$artikel->kategori->nama_kategori}}</p>
                        <p>{{date('M j,Y', strtotime($artikel->created_at))}}</p>
                        <a href="{{ route('artikel.show', $artikel->id)}}" class="blue-button">Read More</a>
                    </div>
                </div>
            </a>
            
            @endforeach

        </div>
    </div>
    
<div class="text-center">
  {{ $artikels->links() }}
</div> 

 @include('layouts.footer')
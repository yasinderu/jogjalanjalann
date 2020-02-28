@include('layouts.wrapper')
@include('layouts.app1')
<title>
    <link rel="shortcut icon" href="{{asset('img/logo.png')}}">
  </title>
@include('layouts.navbar')
<div class="container">
  <div class="row">
    <h2></h2>
    <form action="{{ url('/search') }}" method="GET">
      <div id="custom-search-input">
        <div class="input-group col-md-12">
          <input type="text" class="search-query form-control" name="search" type="text" placeholder="Search" ">
            <span class="input-group-btn">
                <button class="btn btn-danger" type="submit">
                    <span class="glyphicon glyphicon-search"></span>
                </button>
            </span>
        </div>
      </div>
    </form>
  </div>
</div>

  <div class="index-content">
      <div class="container">
        <div class="site-heading text-center">
              <h3>Artikel</h3><br>
              <div class="border"></div>
              <h3>ꦮꦕꦤꦤ꧀</h3><br>
        </div>
        <br><br>
        @foreach($artikel as $artikels)       
              <a href="{{ route('artikel.show', $artikels->id)}}">
                  <div class="col-lg-4">
                      <div class="card">
                          <img src="storage/gambar/{{$artikels->gambar}}" style="height: 200px">
                          <h4><a href="{{ route('artikel.show', $artikels->id)}}">{{ substr($artikels->judul, 0, 30)}} {{strlen($artikels->judul) > 30 ? "..." : ""}}</a></h4>
                          <p>{{ substr($artikels->keterangan_objek, 0, 85) }} {{strlen($artikels->keterangan_objek) > 85 ? "..." : ""}}</p>
                          <p>{{$artikels->kategori->nama_kategori}}</p>
                          <p>{{date('M j,Y', strtotime($artikels->created_at))}}</p>
                          <a href="{{ route('artikel.show', $artikels->id)}}" class="blue-button">Read More</a>
                      </div>
                  </div>
              </a>
          @endforeach
      </div>
  </div>
<div class="text-center">
  {{ $artikel->links() }}
</div> 
  @include('layouts.footer')
  



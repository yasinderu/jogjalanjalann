  @include('layouts.navbar')
  @include('layouts.wrapper')
  @include('layouts.app1')
  <script src="{{asset('js/jquery.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script>
    $(document).ready(function() {
    $('.navbar').addClass('solid');
    });
  </script>


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
        @if(count($result) > 0)
        @foreach($result as $row)       
              <a href="{{ route('artikel.show', $row->id)}}">
                  <div class="col-lg-4">
                      <div class="card">
                          <img src="storage/gambar/{{$row->gambar}}" style="max-height: 300px">
                          <h4><a href="{{ route('artikel.show', $row->id)}}">{{$row->judul}}</a></h4>
                          <p>{{ substr($row->keterangan_objek, 0, 20) }} {{strlen($row->keterangan_objek) > 20 ? "..." : ""}}</p>
                          <p>{{$row->kategori->nama_kategori}}</p>
                          <p>{{date('M j,Y', strtotime($row->created_at))}}</p>
                          <a href="{{ route('artikel.show', $row->id)}}" class="blue-button">Read More</a>
                      </div>
                  </div>
              </a>
        @endforeach
        @else
        <p>Data tidak ditemukan</p>
        @endif
      </div>
  </div>
<div class="text-center">
</div> 
  @include('layouts.footer')
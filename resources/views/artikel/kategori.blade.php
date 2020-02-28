  @include('layouts.navbar')
  @include('layouts.wrapper')
 
<div class="index-content">
    <div class="container">
      <div class="site-heading text-center">
            <h3>{{$kategori->nama_kategori}}</h3><br><br><br>
            <div class="border"></div>
          </div>
          @foreach($kategori as $kategori)
            <a href="post.php">
                <div class="col-lg-4">
                    <div class="card">
                        <img src="img/depan.jpg">
                        <h4>$kategori->artikel->judul</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <a href="post.php" class="blue-button">Read More</a>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
    @include('layouts.footer')
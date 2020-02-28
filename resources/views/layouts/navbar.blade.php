
<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{ url('artikel') }}"><img src="{{ asset('img/logo-jogja.png') }}" alt="JOGJALANJALAN" width="100" height="50">
        </a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="{{ url('/pantai') }}">Beach - ꦥꦤ꧀ꦠꦻ</a></li>
            <li><a href="{{ url('/budaya') }}">Cultural - ꦧꦸꦢꦪ</a></li>
            <li><a href="{{ url('/gunung') }}">Mount - ꦒꦸꦤꦸꦁ</a></li>
            <li><a href="{{ url('/kuliner') }}">Culinary - ꦏꦸꦭꦶꦤꦺꦂ</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
  </body>
</html>
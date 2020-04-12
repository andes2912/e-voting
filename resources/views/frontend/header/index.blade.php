<nav class="navbar navbar-expand-sm navbar-light bg-light shadow-lg rounded">
    <a class="navbar-brand" href="#">E-Voting</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
     
    </div>
    <span class="navbar-text">
      @auth
        <a href="/home">Welcome, {{auth::user()->name}}</a>
      @else
      <a href="{{route('login')}}" class="btn btn-outline-primary btn-sm"><span style="font-size:17px;">Masuk</span></a>
      @endauth
    </span>
</nav>

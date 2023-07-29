<style>
  .navbar-nav .nav-link {
    color: black;
    /* border-radius: 10%; */
    padding: 5px;
    margin: 0 10px;
  }
  .navbar-brand{
    background-color: rgb(63, 63, 228);
    color: white;
    /* border-radius: 10%; */
    padding: 5px 10px;
    margin: 0 10px;
  }
  #navbar{
    transform: translateY(-120px);
  }
</style>
<nav id="navbar" class="navbar navbar-expand-lg fixed-top">
    <div class="container">
      <a class="navbar-brand btn btn-sm" href="#">Tracer Study</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav m-auto " id="navbar-nav">
          <a class="nav-link btn btn-sm" aria-current="page" href="/#">Home</a>
          <a class="nav-link btn btn-sm" href="/#about">Tracer Study</a>
          <a class="nav-link btn btn-sm" href="/#statistik">Statistik</a>
          <a class="nav-link btn btn-sm" href="/search">Cari Alumni</a>
        </div>
        @auth
        {{-- <a class="nav-link" href="/logout">Logout</a> --}}
      <li class="nav-item dropdown" style="list-style: none">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          {{auth()->user()->name}}
        </a>
        <ul class="dropdown-menu">
          @if (auth()->user()->name == "admin")
          <li><a class="dropdown-item btn" href="/admin/user">Halaman Admin</a></li>
          @else
          <li><a class="dropdown-item" href="/alumni">My Dashboard</a></li>
          @endif

          <form action="/logout" method="post">
            @csrf
            <li>
              <a class="dropdown-item" href="/logout">
                <button class="btn" type="submit">Logout</button>
              </a>
            </li>
          </form>
        </ul>
      </li>  
      @else
      <a class="nav-link " href="/login">Login</a>
      @endauth
    </div>

      {{-- <a class="navbar-brand" href="#">{{auth()->user()->name}}</a> --}}

    </div>
  </nav>
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

    z-index: 2;/* From https://css.glass */
    background: rgba(0, 0, 0, 0.2);
    border-radius: 10px;
    box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
    backdrop-filter: blur(5px);
    -webkit-backdrop-filter: blur(5px);
  }
  #navbar{
    color: white;
  }
  .navbar-nav a.nav-link{
    color: white;
    z-index: 2;/* From https://css.glass */
    background: rgba(0, 0, 0, 0.2);
    border-radius: 10px;
    box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
    backdrop-filter: blur(5px);
    -webkit-backdrop-filter: blur(5px);
    transition: 0.5s;
  }
  .navbar-nav a.nav-link:hover{
    color: black;
    z-index: 2;/* From https://css.glass */
    background: rgba(23, 23, 23, 0.2);
    border-radius: 10px;
    box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
    backdrop-filter: blur(15px);
    -webkit-backdrop-filter: blur(5px);
    transform: scale(1.1);
  }
  .glass{
    z-index: 2;/* From https://css.glass */
    background: rgba(0, 0, 0, 0.2);
    border-radius: 10px;
    box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
    backdrop-filter: blur(5px);
    -webkit-backdrop-filter: blur(5px);
  }
</style>
<nav id="navbar" class="navbar navbar-expand-lg fixed-top">
    <div class="container">
      <a class="navbar-brand btn btn-sm" href="/">Tracer Study</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav m-auto" id="navbar-nav">
          <a class="nav-link " aria-current="page" href="/#">Home</a>
          <a class="nav-link " href="/#about">Tracer Study</a>
          <a class="nav-link " href="/#statistik">Statistik</a>
          <a class="nav-link " href="/search">Cari Alumni</a>
        </div>
        <div class="navbar-nav m-end" id="navbar-nav">
          @auth
          {{-- <a class="nav-link" href="/logout">Logout</a> --}}
        <li class="nav-item dropdown m-auto " style="list-style: none">
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
        <a class="nav-link " id="login" href="/login">Login</a>
        @endauth
        </div>
    </div>

      {{-- <a class="navbar-brand" href="#">{{auth()->user()->name}}</a> --}}

    </div>
  </nav>
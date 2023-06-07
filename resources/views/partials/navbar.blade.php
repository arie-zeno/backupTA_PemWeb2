{{-- <style>
    nav.navbar:hover{
        background-color: #3333;
    }
</style> --}}

<nav id="navbar" class="navbar navbar-expand-lg sticky-top">
    <div class="container">
      <a class="navbar-brand" href="#">Tracer Study</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav m-auto ">
          <a class="nav-link" aria-current="page" href="/#">Home</a>
          <a class="nav-link" href="/#about">Tentang Tracer Study</a>
          <a class="nav-link" href="/#statistik">Statistik</a>
        </div>
        @auth
        {{-- <a class="nav-link" href="/logout">Logout</a> --}}
      <li class="nav-item dropdown" style="list-style: none">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          {{auth()->user()->name}}
        </a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="/alumni">My Dashboard</a></li>
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
      <a class="nav-link" href="/login">Login</a>
      @endauth
    </div>

      {{-- <a class="navbar-brand" href="#">{{auth()->user()->name}}</a> --}}

    </div>
  </nav>
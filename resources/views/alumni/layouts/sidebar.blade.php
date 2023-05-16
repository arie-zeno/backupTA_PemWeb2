<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{Request::is('dashboard') ? 'active' : '' }} " aria-current="page" href="/alumni">
            <span data-feather="home" class="align-text-bottom"></span>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{Request::is('alumni/bios*') ? 'active' : '' }}" href="/alumni/bios">
            <span data-feather="file-text" class="align-text-bottom"></span>
            Biodata
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{Request::is('alumni/fotos') ? 'active' : '' }}" href="/alumni/fotos">
            <span data-feather="image" class="align-text-bottom"></span>
            Foto
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{Request::is('alumni/komens') ? 'active' : '' }}" href="/alumni/komens">
            <span data-feather="message-square" class="align-text-bottom"></span>
            Komen
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{Request::is('alumni/strukturs') ? 'active' : '' }}" href="/alumni/strukturs">
            <span data-feather="box" class="align-text-bottom"></span>
            Struktur
          </a>
        </li>
      </ul>

    </div>
  </nav>
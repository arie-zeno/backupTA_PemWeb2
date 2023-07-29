<?php
use Carbon\Carbon;
?>
@extends("layouts.main")
<style>
    span{
        color: #eca457;
    }
    nav{
        transition: 0.2s;
    }

    .container-home{
      background-image: url('/img/SAM_2141.JPG');
      background-attachment: fixed;
      background-position: center;
      background-size: cover;
    }

    .welcome{
      /* background-color: rgba(0, 0, 0, 0.329); */
      padding: 20px;
    }

    body{
      background-image: url('/img/playstation-pattern.webp');
    }
</style>
<style>
  .bd-placeholder-img {
    font-size: 1.125rem;
    text-anchor: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
  }

  @media (min-width: 768px) {
    .bd-placeholder-img-lg {
      font-size: 3.5rem;
    }
  }

  .b-example-divider {
    width: 100%;
    height: 3rem;
    background-color: rgba(0, 0, 0, .1);
    border: solid rgba(0, 0, 0, .15);
    border-width: 1px 0;
    box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
  }

  .b-example-vr {
    flex-shrink: 0;
    width: 1.5rem;
    height: 100vh;
  }

  .bi {
    vertical-align: -.125em;
    fill: currentColor;
  }

  .nav-scroller {
    position: relative;
    z-index: 2;
    height: 2.75rem;
    overflow-y: hidden;
  }

  .nav-scroller .nav {
    display: flex;
    flex-wrap: nowrap;
    padding-bottom: 1rem;
    margin-top: -1px;
    overflow-x: auto;
    text-align: center;
    white-space: nowrap;
    -webkit-overflow-scrolling: touch;
  }

  .btn-bd-primary {
    --bd-violet-bg: #712cf9;
    --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

    --bs-btn-font-weight: 600;
    --bs-btn-color: var(--bs-white);
    --bs-btn-bg: var(--bd-violet-bg);
    --bs-btn-border-color: var(--bd-violet-bg);
    --bs-btn-hover-color: var(--bs-white);
    --bs-btn-hover-bg: #6528e0;
    --bs-btn-hover-border-color: #6528e0;
    --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
    --bs-btn-active-color: var(--bs-btn-hover-color);
    --bs-btn-active-bg: #5a23c8;
    --bs-btn-active-border-color: #5a23c8;
  }
  .bd-mode-toggle {
    z-index: 1500;
  }
</style>
@section("container")
  <div class="container">
        <div class="row flex-rows justify-content-center align-items-center" style="height: 90vh" id="about">
            <div class="col-sm-5">
                <h2 class="fw-bold">Cari Alumni</h2>

                <div>
                  <form action="" method="get">

                      <div class="input-group">
                        <input name="keyword" type="text" class="form-control" placeholder="Masukkan nama / nim" aria-label="Masukkan nama / nim" aria-describedby="basic-addon2">
                        <button class="input-group-text btn btn-outline-success" id="basic-addon2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                          <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg> </button>
                      </div> 
                    </form>
                  </div>
                
              </div>
            <div class="col-sm-7 ">
              @if ($keyword == "")
              <img class="img-fluid" src="/img/tracer.png" alt="">
              @else
                @if (count($biodatas) == 0)
                  <h4 class="text-center">Nama atau NIM tidak ditemukan</h4>
                @else
                <ul class="list-group">
                  @foreach ($biodatas as $biodata)
                    
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{$biodata->name}}
                    <button class=" btn btn-sm btn-outline-success" data-bs-toggle="modal" data-bs-target="#detal{{$biodata->nim}}">Lihat</button>
                  </li>

                    {{-- modal --}}
                  <div class="modal fade" id="detal{{$biodata->nim}}" tabindex="-1" aria-labelledby="detal{{$biodata->nim}}Label" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="detal{{$biodata->nim}}Label">{{$biodata->nim}}</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                              <button class="nav-link active" id="foto-tab" data-bs-toggle="tab" data-bs-target="#foto-{{$biodata->nim}}-tab-pane" type="button" role="tab" aria-controls="foto-{{$biodata->nim}}-tab-pane" aria-selected="true">Foto</button>
                            </li>
                            <li class="nav-item" role="presentation">
                              <button class="nav-link" id="biodata-tab" data-bs-toggle="tab" data-bs-target="#biodata-{{$biodata->nim}}-tab-pane" type="button" role="tab" aria-controls="biodata-{{$biodata->nim}}-tab-pane" aria-selected="false">Biodata</button>
                            </li>
                            <li class="nav-item" role="presentation">
                              <button class="nav-link" id="pekerjaan-tab" data-bs-toggle="tab" data-bs-target="#pekerjaan-{{$biodata->nim}}-tab-pane" type="button" role="tab" aria-controls="pekerjaan-{{$biodata->nim}}-tab-pane" aria-selected="false">Pekerjaan</button>
                            </li>

                          </ul>                        
                          
                          <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="foto-{{$biodata->nim}}-tab-pane" role="tabpanel" aria-labelledby="foto-{{$biodata->nim}}-tab" tabindex="0">
                              @if($biodata->foto)
                              <img src="{{asset('storage/' . $biodata->foto) }}" class="img-thumbnail" alt="...">
                              @else
                              <img src="/img/noImage.png" class="img-thumbnail" alt="...">
                              @endif
                            </div>
                            
                            <div class="tab-pane fade" id="biodata-{{$biodata->nim}}-tab-pane" role="tabpanel" aria-labelledby="biodata-{{$biodata->nim}}-tab" tabindex="0">
                              
                              <div class=" bg-light p-4 rounded">
                              <label class="text-secondary" for="">Nama</label>
                              <h6 class="fw-bold">{{$biodata->name}}</h6>
                      
                              <label class="text-secondary" for="">NIM</label>
                              <h6 class="fw-bold">{{$biodata->nim}}</h6>
                      
                              <label class="text-secondary" for="">Kontak</label>
                              <h6 class="fw-bold">{{$biodata->kontak}}</h6>
                      
                              <label class="text-secondary" for="">Tempat Tanggal Lahir</label>
                              <h6 class="fw-bold">{{$biodata->tempatLahir}}, {{$biodata->tglLahir}}</h6>
                      
                              <label class="text-secondary" for="">Jenis Kelamin</label>
                              <h6 class="fw-bold">{{$biodata->jk}}</h6>
                      
                              <label class="text-secondary" for="">Agama</label>
                              <h6 class="fw-bold">{{$biodata->agama}}</h6>
                      
                              <label class="text-secondary" for="">Status Pernikahan</label>
                              <h6 class="fw-bold">{{$biodata->kawin}} kawin</h6>
                              
                              <label class="text-secondary" for="">Tahun Masuk</label>
                              <h6 class="fw-bold">{{$biodata->thnMasuk}}</h6>
                      
                              <label class="text-secondary" for="">Tahun Kelulusan</label>
                              <h6 class="fw-bold">{{$biodata->thnLulus}}</h6>
                              
                              
                              <label class="text-secondary" for="">Lama Masa Studi</label>
                              <h6 class="fw-bold">{{$biodata->thnLulus - $biodata->thnMasuk}} Tahun</h6>
                      
                              <label class="text-secondary" for="">IPK</label>
                              <h6 class="fw-bold">{{$biodata->ipk}}</h6>

                              <label class="text-secondary" for="">Status Pekerjaan</label>
                              <h6 class="fw-bold">{{$biodata->pekerjaan}} bekerja</h6>
                              </div>
                            </div>
                              
 
                            <div class="tab-pane fade" id="pekerjaan-{{$biodata->nim}}-tab-pane" role="tabpanel" aria-labelledby="pekerjaan-{{$biodata->nim}}-tab" tabindex="0">
                              @if (count($biodata->works) != 0)
                                  <div class="bg-light p-4 rounded">
                                    <label class="text-secondary" for="">Nama</label>
                                    <h6 class="fw-bold">{{$biodata->name}}</h6>
                            
                                    <label class="text-secondary" for="">Kategori Pekerjaan</label>
                                    <h6 class="fw-bold">{{$biodata->works[count($biodata->works)-1]->kategori_pekerjaan}}</h6>
                            
                                    <label class="text-secondary" for="">Bekerja Sebagai</label>
                                    <h6 class="fw-bold">{{$biodata->works[count($biodata->works)-1]->nama_pekerjaan}}</h6>
                            
                                    <label class="text-secondary" for="">Alamat Pekerjaan</label>
                                    <h6 class="fw-bold">{{$biodata->works[count($biodata->works)-1]->tempat_pekerjaan}}</h6>
                            
                                    <label class="text-secondary" for="">Tahun Kelulusan</label>
                                    <h6 class="fw-bold">{{$biodata->thnLulus}}</h6>
                            
                            
                                    <label class="text-secondary" for="">Mulai Bekerja</label>
                                    <h6 class="fw-bold">{{Carbon::parse($biodata->works[count($biodata->works)-1]->tanggal_pekerjaan)->diffForHumans($biodata->thnLulus . '0101')}} kelulusan ~ {{$biodata->works[count($biodata->works)-1]->tanggal_pekerjaan}} </h6>
                                    {{-- <h6 class="fw-light">{{$work->tanggal_pekerjaan}}</h6> --}}
                            
                            
                                    <label class="text-secondary" for="">Kisaran Gaji</label>
                                    <h6 class="fw-bold">Rp. {{number_format($biodata->works[count($biodata->works)-1]->gaji,2,",",".")}}</h6>
                
                                    <label class="text-secondary" for="">Relevansi</label>
                                    <h6 class="fw-bold">{{$biodata->works[count($biodata->works)-1]->relevansi_pekerjaan}}</h6>
                            
                            
                                    
                                </div>
                              @else
                                <p>tidak bekerja</p>
                              @endif
                            </div>
                        
                          
                          </div>                      
           
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  @endforeach
                </ul>
                @endif
              @endif
          </div>
        </div>
      </div>
      <script>

        let navbar = document.getElementById("navbar");
        let navbarNav = document.getElementById("navbar-nav");

            navbar.style.backgroundColor = "#ffffff88"
            navbar.style.boxShadow = "2px 2px 2px black"
            navbar.style.transform = "translateY(0)"
      </script>

@endsection
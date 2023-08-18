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
    <div class="container-fluid container-home" style="position:relative">
      <div style="background-color:rgba(0, 0, 0, 0.385); position: absolute; top: 0; bottom: 0; left: 0; right: 0; z-index: 1; ">

      </div>
      
      <div class="container ">
        <div class=" row justify-content-between align-items-center" style="height: 100vh ;">
          
          
          <div class="col-sm-6 " style="z-index: 2; ">
            
        </div>
        <div class="col-sm-5 welcome " style="z-index: 2;/* From https://css.glass */
          background: rgba(0, 0, 0, 0.2);
          border-radius: 16px;
          box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
          backdrop-filter: blur(5px);
          -webkit-backdrop-filter: blur(5px);">
              <h1 class="fw-bold text-white text-shadow">Selamat Datang Di Website <span> Tracer Study</span> Prodi Pendidikan Komputer Universitas Lambung Mangkurat</h1>
              <p class="text-white fs-5 mt-4">Mari sukseskan pelaksanaan <span>tracer study </span>Prodi Pendidikan Komputer Universitas Lambung Mangkurat.</p>
            </div>
        </div>

      </div>
  </div>

  <div class="container">
        <div class="row flex-column justify-content-center" style="height: 90vh" id="about">
            <div class="col-sm-6">
                <h6 class="text-secondary" >Tentang Tracer Study</h6>
                <h2 class="fw-bold">Apa itu Tracer Study ?</h2>
                <p>Tracer Study adalah website yang mengumpulkan data tentang kiprah lulusan di dunia kerja untuk meningkatkan kualitas pendidikan dan program-program perguruan tinggi. Data yang dikumpulkan mencakup data kelulusan alumni, data pekerjan alumni, dan lain lain.</p>
            </div>
            <div class="col-sm-7 ">
              <img class="img-fluid" src="/img/tracer.png" alt="">
          </div>
        </div>
      </div>

        <div class="container">

        <div class="row flex-row align-items-center" style="min-height: 90vh">
            <h2 class="fw-bold text-center" id="statistik">Statistik</h2>
            <!-- <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quis quibusdam nulla doloremque obcaecati repudiandae, nam officia quae voluptas distinctio commodi mollitia sapiente dolor quaerat facere iusto repellendus, ducimus rerum cumque?</p> -->
      
            @if (count($biodatas) > 0 && count($pekerjaans) > 0)
              
            

            <div class="col-sm-6 my-5">      
              <h3 class="text-center">Data Kelulusan </h3>     
                <div>
                  <canvas id="chartKelulusan"></canvas>
                </div>
                <p class="text-secondary text-center">Total Alumni Mahasiswa Pendidikan Komputer : {{count($biodatas)}} </p>
            </div>

            <div class="col-sm-6 my-5">      
              <h3 class="text-center">Data Kelulusan Per Angkatan</h3>     
                <div>
                  <canvas id="chartKelulusanAngkatan"></canvas>
                </div>
                <p class="text-secondary text-center">Total Alumni Mahasiswa Pendidikan Komputer : {{count($biodatas)}} </p>
            </div>

            <div class="col-sm-6 my-5">      
              <h3 class="text-center">Lama masa study</h3>     
                <div>
                  <canvas id="chartLamaKuliah"></canvas>
                </div>
                <p class="text-secondary text-center">Rata rata lama masa study {{$rata2_kuliah}} Tahun</p>
            </div>

            <div class="col-sm-6 my-5">      
              <h3 class="text-center">IPK Alumni </h3>     
                <div>
                  <canvas id="chartIPK"></canvas>
                </div>
                <p class="text-secondary text-center">Rata rata IPK alumni : {{$avgIPK}} </p>
            </div>

            <div class="col-sm-6 my-5">      
              <h3 class="text-center">Status Pekerjaan</h3>     
                <div>
                  <canvas id="chartBekerja"></canvas>
                </div>
                <p class="text-secondary text-center">Jumlah Alumni yang sudah bekerja {{count($sudahBekerja)}}, yang belum bekerja {{count($belumBekerja)}} </p>
            </div>

            <div class="col-sm-6 my-5">      
              <h3 class="text-center">Relevansi Pekerjaan</h3>     
                <div>
                  <canvas id="chartRelevansi"></canvas>
                </div>
                <p class="text-secondary text-center"> {{($pRelevan[0])}} relevansi tinggi, {{ ($pRelevan[1]) }} relevansi sedang dan {{($pRelevan[2])}} relevansi rendah</p>
            </div>


            <div class="col-sm-12 my-5">      
              <h3 class="text-center">Kategori Pekerjaan</h3>     
                <div>
                  <canvas id="chartKategori2"></canvas>
                </div>
                <p class="text-secondary text-center">Jumlah Alumni yang sudah bekerja : {{count($sudahBekerja)}} </p>
            </div>

            <div class="col-sm-6 my-5">      
              <h3 class="text-center">Gaji Alumni</h3>     
                <div>
                  <canvas id="chartGaji"></canvas>
                </div>
                <p class="text-secondary text-center">Rata-rata Gaji Alumni : Rp. {{number_format($avgGaji,2,",",".")}} </p>
            </div>

            <div class="col-sm-6 my-5">      
              <h3 class="text-center">Rentang Waktu Mendapatkan Pekerjaan</h3>     
                <div>
                  <canvas id="chartRKerja"></canvas>
                </div>
                <p class="text-secondary text-center">Rata-rata Rentang Alumni Mendapatkan Pekerjaan : {{number_format($avgRKerja,2)}} Tahun</p>
            </div>


          </div>    
        </div>

      </div>

      <div class="b-example-divider"></div>

      <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="bootstrap" viewBox="0 0 118 94">
          <title>Bootstrap</title>
          <path fill-rule="evenodd" clip-rule="evenodd" d="M24.509 0c-6.733 0-11.715 5.893-11.492 12.284.214 6.14-.064 14.092-2.066 20.577C8.943 39.365 5.547 43.485 0 44.014v5.972c5.547.529 8.943 4.649 10.951 11.153 2.002 6.485 2.28 14.437 2.066 20.577C12.794 88.106 17.776 94 24.51 94H93.5c6.733 0 11.714-5.893 11.491-12.284-.214-6.14.064-14.092 2.066-20.577 2.009-6.504 5.396-10.624 10.943-11.153v-5.972c-5.547-.529-8.934-4.649-10.943-11.153-2.002-6.484-2.28-14.437-2.066-20.577C105.214 5.894 100.233 0 93.5 0H24.508zM80 57.863C80 66.663 73.436 72 62.543 72H44a2 2 0 01-2-2V24a2 2 0 012-2h18.437c9.083 0 15.044 4.92 15.044 12.474 0 5.302-4.01 10.049-9.119 10.88v.277C75.317 46.394 80 51.21 80 57.863zM60.521 28.34H49.948v14.934h8.905c6.884 0 10.68-2.772 10.68-7.727 0-4.643-3.264-7.207-9.012-7.207zM49.948 49.2v16.458H60.91c7.167 0 10.964-2.876 10.964-8.281 0-5.406-3.903-8.178-11.425-8.178H49.948z"></path>
        </symbol>
        <symbol id="facebook" viewBox="0 0 16 16">
          <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
        </symbol>
        <symbol id="instagram" viewBox="0 0 16 16">
            <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
        </symbol>
        <symbol id="twitter" viewBox="0 0 16 16">
          <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
        </symbol>
      </svg>
    <div class="container">
      <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <div class="col-md-4 d-flex align-items-center">

          <span class="mb-3 mb-md-0 text-body-secondary">&copy; 2023 Computer Education</span>
        </div>

        <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
          <li class="ms-3"><a class="text-body-secondary" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"/></svg></a></li>
          <li class="ms-3"><a class="text-body-secondary" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"/></svg></a></li>
          <li class="ms-3"><a class="text-body-secondary" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"/></svg></a></li>
        </ul>
      </footer>
    </div>
        {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> --}}
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script type="text/javascript" src="https://unpkg.com/chartjs-chart-venn@3.6.0/build/index.umd.min.js"></script>
            
            <script>
              const cKelulusan = document.getElementById('chartKelulusan'),
                    cKelulusanAkt = document.getElementById('chartKelulusanAngkatan'),
                    cBekerja = document.getElementById('chartBekerja'),
                    cRelevansi = document.getElementById('chartRelevansi'),
                    cKategori = document.getElementById('chartKategori'),
                    cKategori2 = document.getElementById('chartKategori2'),
                    cGaji = document.getElementById('chartGaji'),
                    cRKerja = document.getElementById('chartRKerja'),
                    cIPK = document.getElementById('chartIPK'),
                    cLamaKuliah = document.getElementById('chartLamaKuliah');
      
                    
              let dataLulus = [{{count($kelulusan_2020)}}, {{count($kelulusan_2021)}}, {{count($kelulusan_2022)}}, {{count($kelulusan_2023)}}, {{count($kelulusan_2024)}}, {{count($kelulusan_2025)}}],
                  belumBekerja = {{count($belumBekerja)}},
                  sudahBekerja = {{count($sudahBekerja)}},
                  dataNama = <?= $dataNama?>
                

            
              new Chart(cKelulusan, {
                type: 'line',
                data: {
                  labels: [2020, 2021, 2022,2023,2024,2025],
                  datasets: [{
                    label: 'Lulus',
                    data: dataLulus,
                    borderColor: '#36A2EB',
                    borderWidth: 2,
                  }]
                },

                options: {
                  scales: {
                    y: { // defining min and max so hiding the dataset does not change scale range
                      beginAtZero: true
                    }
                  }
                }
              });

              new Chart(cKelulusanAkt, {
                type: 'line',
                data: {
                  labels: [2020, 2021, 2022,2023,2024,2025],
                  datasets: [
                    {
                    label: 'Angkatan 2016',
                    data: [{{$alumni2016[0]}},{{$alumni2016[1]}},{{$alumni2016[2]}},{{$alumni2016[3]}},{{$alumni2016[4]}},{{$alumni2016[5]}},{{$alumni2016[6]}},{{$alumni2016[7]}}],
                    borderColor: '#36A2EB',
                    borderWidth: 2,
                  },
                  {
                    label: 'Angkatan 2017',
                    data: [{{$alumni2017[0]}},{{$alumni2017[1]}},{{$alumni2017[2]}},{{$alumni2017[3]}},{{$alumni2017[4]}},{{$alumni2017[5]}},{{$alumni2017[6]}},{{$alumni2017[7]}}],
                    borderColor: 'red',
                    borderWidth: 2,
                  },
                  {
                    label: 'Angkatan 2018',
                    data: [{{$alumni2018[0]}},{{$alumni2018[1]}},{{$alumni2018[2]}},{{$alumni2018[3]}},{{$alumni2018[4]}},{{$alumni2018[5]}},{{$alumni2018[6]}},{{$alumni2018[7]}}],
                    borderColor: 'blue',
                    borderWidth: 2,
                  },
                  {
                    label: 'Angkatan 2019',
                    data: [{{$alumni2019[0]}},{{$alumni2019[1]}},{{$alumni2019[2]}},{{$alumni2019[3]}},{{$alumni2019[4]}},{{$alumni2019[5]}},{{$alumni2019[6]}},{{$alumni2019[7]}}],
                    borderColor: 'purple',
                    borderWidth: 2,
                  },
                  {
                    label: 'Angkatan 2020',
                    data: [{{$alumni2020[0]}},{{$alumni2020[1]}},{{$alumni2020[2]}},{{$alumni2020[3]}},{{$alumni2020[4]}},{{$alumni2020[5]}},{{$alumni2020[6]}},{{$alumni2020[7]}}],
                    borderColor: 'pink',
                    borderWidth: 2,
                  },
                  {
                    label: 'Angkatan 2021',
                    data: [{{$alumni2021[0]}},{{$alumni2021[1]}},{{$alumni2021[2]}},{{$alumni2021[3]}},{{$alumni2021[4]}},{{$alumni2021[5]}},{{$alumni2021[6]}},{{$alumni2021[7]}}],
                    borderColor: 'brown',
                    borderWidth: 2,
                  },
                  {
                    label: 'Angkatan 2022',
                    data: [{{$alumni2022[0]}},{{$alumni2022[1]}},{{$alumni2022[2]}},{{$alumni2022[3]}},{{$alumni2022[4]}},{{$alumni2022[5]}},{{$alumni2022[6]}},{{$alumni2022[7]}}],
                    borderColor: 'magenta',
                    borderWidth: 2,
                  }

                ]
                },

                options: {
                  scales: {
                    y: { // defining min and max so hiding the dataset does not change scale range
                      beginAtZero: true
                    }
                  }
                }
              });

              new Chart(cBekerja, {
                type: 'pie',
                data: {
                  labels: ["Sudah Bekerja", "Belum Bekerja"],
                  datasets: [{
                    label: 'Jumlah',
                    data: [sudahBekerja, belumBekerja],
                    hoverOffset: 4,
                    backgroundColor: [
                      '#47A992',
                      'salmon'
                    ],
                  }]
                }
              });


              new Chart(cLamaKuliah, {
                type: 'bar',
                data: {
                  labels: ["3 ~ 4 Tahun", "5 ~ 6 Tahun", "Lebih Dari 6 Tahun"],
                  datasets: [{
                    label: 'Alumni',
                    data: [{{count($K3tahun)}}, {{count($K5tahun)}}, {{count($K6tahun)}}, ],
                    hoverOffset: 4,
                    borderWidth:4,
                    borderColor: ['#47A992', '#36A2EB', '#B70404']
                  }],
                },
                options:{
                  scales: {
                    y: { // defining min and max so hiding the dataset does not change scale range
                      beginAtZero: true
                    }
                  }
                }
              });

              new Chart(cIPK, {
                type: 'bar',
                data: {
                  labels: ["2.4 ~ 2.7", "2.7 ~ 3.0", "3.0 ~ 3.3", "3.3 ~ 3.6", "3.6 ~ 3.9"],
                  datasets: [{
                    label: 'Alumni',
                    data: [{{$ipk[0]}}, {{$ipk[1]}}, {{$ipk[2]}}, {{$ipk[3]}}, {{$ipk[4]}} ],
                    hoverOffset: 4,
                    borderWidth:4,
                    borderColor: ['black', 'red', '#DAA520', '#36A2EB','#47A992' ,'#B70404',]
                  }],
                },
                options:{
                  scales: {
                    y: { // defining min and max so hiding the dataset does not change scale range
                      beginAtZero: true
                    }
                  }
                }
              });

              new Chart(cRelevansi, {
                type: 'doughnut',
                data: {
                  labels: ["Tinggi", "Sedang", "Rendah"],
                  datasets: [{
                    label: 'Jumlah',
                    data: [{{$pRelevan[0]}}, {{$pRelevan[1]}}, {{$pRelevan[2]}} ],
                    hoverOffset: 4,
                    borderWidth:2,
                    backgroundColor: ['#47A992', 'lightskyblue', 'red']
                  }]
                },
              });

           

              new Chart(cGaji, {
                type: 'bar',
                data: {
                  labels: ["1 ~ 3 Juta", "3 ~ 8 Juta", "8 ~ 13 Juta", "13 ~ 18 Juta", "18 ~ 25 Juta", "25 ~ 50 Juta", "50 ~ 100 Juta", "100 ~ 250 Juta", "Lebih dari 250 Juta" ],
                  datasets: [{
                    label: 'Jumlah',
                    data: [{{ $gajiAlumni[0]}}, {{ $gajiAlumni[1] }}, {{ $gajiAlumni[2] }}, {{ $gajiAlumni[3] }}, {{ $gajiAlumni[4] }}, {{ $gajiAlumni[5] }}, {{ $gajiAlumni[6] }}, {{ $gajiAlumni[7] }}, {{ $gajiAlumni[8] }} ],
                    hoverOffset: 4,
                    borderWidth:2,
                    backgroundColor: ['lightblue', '#47A992', 'blue', 'brown', 'red','brown', 'green', 'black', 'salmon']
                  }]
                },
                options:{
                  scales: {
                    y: { // defining min and max so hiding the dataset does not change scale range
                      beginAtZero: true
                    }
                  }
                }
              });

              new Chart(cRKerja, {
                type: 'bar',
                data: {
                  labels: ["Kurang Dari 1 Tahun", "1 ~ 2 Tahun", "2 ~ 3 Tahun", "3 ~ 4 Tahun", "4 ~ 5 Tahun", "5 ~ 6 Tahun", "Lebih Dari 6 Tahun" ],
                  datasets: [{
                    label: 'Jumlah',
                    data: [{{ $rentangKerja[0]}}, {{ $rentangKerja[1] }}, {{ $rentangKerja[2] }}, {{ $rentangKerja[3] }}, {{ $rentangKerja[4] }}, {{ $rentangKerja[5] }}, {{ $rentangKerja[6] }}],
                    hoverOffset: 4,
                    borderWidth:2,
                    backgroundColor: [
                    'rgba(255, 26, 104, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(0, 0, 0, 0.2)'
                  ]
                  }]
                },
                options:{
                  scales: {
                    y: { // defining min and max so hiding the dataset does not change scale range
                      beginAtZero: true
                    }
                  }
                }
              });

              const config = {
                type: 'venn',
                data: ChartVenn.extractSets(
                  [
                    
                    { label: 'Kependidikan', values: [@foreach ($kategoriPekerjaan1 as $a)
                      {{$a}},
                    @endforeach ]},
                    { label: 'IT', values: [@foreach ($kategoriPekerjaan2 as $a)
                      {{$a}},
                    @endforeach ]},
                    { label: 'Wirausaha', values: [@foreach ($kategoriPekerjaan3 as $a)
                      {{$a}},
                    @endforeach ]},
                  ],
                  {
                    label: 'Kategori'
                  }
                ),
                options: {
                  backgroundColor: [
                    'rgba(255, 26, 104, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(0, 0, 0, 0.2)'
                  ],
                  borderColor: [
                    'rgba(255, 26, 104, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(0, 0, 0, 1)'
                  ],
                  borderWidth: 1,
                  label: 'Kategori'
                },
              };

    // render init block
    const myChart = new Chart(
      document.getElementById('chartKategori2'),
      config
    );

            </script>
        @endif
        <script>

let navbar = document.getElementById("navbar");
let navbarNav = document.querySelector(".navbar-nav");
let linkNav = navbarNav.querySelectorAll("a.nav-link");
let navbarBrand = document.querySelector(".navbar-brand");
window.addEventListener("scroll", () =>{
  console.log(window.scrollY)
  if(window.scrollY > 350){
    // navbar.style.backgroundColor = "#eca457"
    navbar.style.backgroundColor = "#ffffff88"
    navbar.style.boxShadow = "3px 3px 3px black"
    linkNav[0].style.color = "black"
    linkNav[1].style.color = "black"
    linkNav[2].style.color = "black"
    linkNav[3].style.color = "black"
    navbarBrand.style.color = "black"
  }else {
    navbar.style.backgroundColor = "transparent"
    navbar.style.boxShadow = "none"
    linkNav[0].style.color = "white"
    linkNav[1].style.color = "white"
    linkNav[2].style.color = "white"
    linkNav[3].style.color = "white"
    navbarBrand.style.color = "white"
    
  }
});

</script>
@endsection


@extends("layouts.main")
<style>
    span{
        color: #eca457;
    }
    nav{
        transition: 0.2s;
    }
</style>
@section("container")
    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 90vh">
            <div class="col-sm-7 border">
                <h1>foto</h1>
            </div>

            <div class="col-sm-5">
                <h1 class="fw-bold">Selamat Datang Di Website <span> Tracer Study</span> Prodi Pendidikan Komputer Universitas Lambung Mangkurat</h1>
            </div>
        </div>

        <div class="row" style="height: 90vh" id="about">
            <div class="col-sm-6">
                <h6 class="text-secondary" >Tentang Tracer Study</h6>
                <h2 class="fw-bold">Apa itu Tracer Study ?</h2>
                <p>Tracer Study adalah website yang mengumpulkan data tentang kiprah lulusan di dunia kerja untuk meningkatkan kualitas pendidikan dan program-program perguruan tinggi. Data yang dikumpulkan mencakup data kelulusan alumni, data pekerjan alumni, dan lain lain.</p>
            </div>
        </div>

        <div class="row flex-row align-items-center" style="min-height: 90vh">
            <h2 class="fw-bold text-center" id="statistik">Statistik</h2>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quis quibusdam nulla doloremque obcaecati repudiandae, nam officia quae voluptas distinctio commodi mollitia sapiente dolor quaerat facere iusto repellendus, ducimus rerum cumque?</p>
      
            @if (count($biodatas) > 0)
              
            

            <div class="col-sm-6 my-5">      
              <h3 class="text-center">Data Kelulusan Alumni</h3>     
                <div>
                  <canvas id="chartKelulusan"></canvas>
                </div>
                <p class="text-secondary text-center">Total Alumni Mahasiswa Pendidikan Komputer : {{count($biodatas)}} </p>
                {{-- <p>Rata rata lama kuliah {{$rata2_kuliah}} Tahun</p> --}}
            </div>

            <div class="col-sm-6 my-5">      
              <h3 class="text-center">Lama masa study</h3>     
                <div>
                  <canvas id="chartLamaKuliah"></canvas>
                </div>
                <p class="text-secondary text-center">Rata rata lama masa study {{$rata2_kuliah}} Tahun</p>
            </div>


            <div class="col-sm-6 my-5">      
              <h3 class="text-center">Status Pekerjaan</h3>     
                <div>
                  <canvas id="chartBekerja"></canvas>
                </div>
                <p class="text-secondary text-center">Jumlah Alumni yang sudah bekerja : {{count($sudahBekerja)}} </p>
            </div>

            <div class="col-sm-6 my-5">      
              <h3 class="text-center">Relevansi Pekerjaan</h3>     
                <div>
                  <canvas id="chartRelevansi"></canvas>
                </div>
                <p class="text-secondary text-center">Jumlah Alumni yang sudah bekerja : {{count($sudahBekerja)}} </p>
            </div>

            <div class="col-sm-6 my-5">      
              <h3 class="text-center">Kategori Pekerjaan</h3>     
                <div>
                  <canvas id="chartKategori"></canvas>
                </div>
                <p class="text-secondary text-center">Jumlah Alumni yang sudah bekerja : {{count($sudahBekerja)}} </p>
            </div>

            <div class="col-sm-6 my-5">      
              <h3 class="text-center">Gaji Alumni</h3>     
                <div>
                  <canvas id="chartGaji"></canvas>
                </div>
                <p class="text-secondary text-center">Rata-rata Gaji Alumni : Rp. {{($avgGaji)}} </p>
            </div>

          </div>    
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            
            <script>
              const cKelulusan = document.getElementById('chartKelulusan'),
                    cBekerja = document.getElementById('chartBekerja'),
                    cRelevansi = document.getElementById('chartRelevansi'),
                    cKategori = document.getElementById('chartKategori'),
                    cGaji = document.getElementById('chartGaji'),
                    cLamaKuliah = document.getElementById('chartLamaKuliah');
      
                    
              let dataLulus = [{{count($kelulusan_2020)}}, {{count($kelulusan_2021)}}, {{count($kelulusan_2022)}}, {{count($kelulusan_2023)}}, {{count($kelulusan_2024)}}, {{count($kelulusan_2025)}}],
                  belumBekerja = {{count($belumBekerja)}},
                  sudahBekerja = {{count($sudahBekerja)}},
                  dataNama = <?= $dataNama?>

                  console.log(dataNama)
            
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
                  animations: {
                    tension: {
                      duration: 1000,
                      easing: 'linear',
                      from: 1,
                      to: 0,
                      loop: true
                    }
                  },
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
                      'red',
                      '#36A2EB'
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
                    borderWidth:2,
                    backgroundColor: ['#47A992', '#36A2EB', '#B70404']
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
                type: 'pie',
                data: {
                  labels: ["Relevan", "Tidak Relevan"],
                  datasets: [{
                    label: 'Alumni',
                    data: [{{$pRelevan}}, {{$pTRelevan}} ],
                    hoverOffset: 4,
                    borderWidth:2,
                    backgroundColor: ['#47A992', 'red']
                  }]
                },
              });

              new Chart(cKategori, {
                type: 'pie',
                data: {
                  labels: ["IT Non kependidikan", "IT kependidikan", "Kependidikan IT", "Kependidikan Non IT", "Non IT Non Kependidikan" ],
                  datasets: [{
                    label: 'Alumni',
                    data: [{{ $kategoriPekerjaan1}}, {{ $kategoriPekerjaan2 }}, {{ $kategoriPekerjaan3 }}, {{ $kategoriPekerjaan4 }}, {{ $kategoriPekerjaan5 }} ],
                    hoverOffset: 4,
                    borderWidth:2,
                    backgroundColor: ['lightblue', '#47A992', 'blue', 'brown', 'red']
                  }]
                }
              });

              new Chart(cGaji, {
                type: 'line',
                data: {
                  labels: ["1 ~ 3 Juta", "3 ~ 8 Juta", "8 ~ 13 Juta", "13 ~ 18 Juta", "18 ~ 25 Juta" ],
                  datasets: [{
                    label: 'Jumlah',
                    data: [{{ $gajiAlumni[0]}}, {{ $gajiAlumni[1] }}, {{ $gajiAlumni[2] }}, {{ $gajiAlumni[3] }}, {{ $gajiAlumni[4] }} ],
                    hoverOffset: 4,
                    borderWidth:2,
                    borderColor:'lightblue',
                    backgroundColor: ['lightblue', '#47A992', 'blue', 'brown', 'red']
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

            </script>
        @endif
@endsection
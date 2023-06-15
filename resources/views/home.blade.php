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
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus blanditiis saepe tempore neque magni eaque labore esse sequi libero maiores, dicta aliquam rerum optio earum, ducimus accusantium eveniet a tempora.</p>
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

<<<<<<< HEAD
            <div class="col-sm-6 my-5">      
              <h3 class="text-center">Lama masa study</h3>     
                <div>
                  <canvas id="chartLamaKuliah"></canvas>
                </div>
                <p class="text-secondary text-center">Rata rata lama masa study {{$rata2_kuliah}} Tahun</p>
            </div>

            <div class="col-sm-6 my-5">      
              <h3 class="text-center">Status Pekerjaan</h3>     
=======
            <div class="col-sm-6 mb-5">      
              <h3 class="text-center">Lama masa study</h3>     
>>>>>>> 84e084bdb39e2781841d2f201b35d1d85fd9b45a
                <div>
                  <canvas id="chartLamaKuliah"></canvas>
                </div>
                <p class="text-secondary text-center">Rata rata lama masa study {{$rata2_kuliah}} Tahun</p>
            </div>

            <!-- <div class="col-sm-6 my-5">      
              <h3 class="text-center">Status Pekerjaan</h3>     
                <div>
                  <canvas id="chartBekerja"></canvas>
                </div>
                <p class="text-secondary text-center">Jumlah Alumni yang sudah bekerja : {{count($sudahBekerja)}} </p>
            </div> -->

          </div>    
        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            
            <script>
              const cKelulusan = document.getElementById('chartKelulusan'),
                    cBekerja = document.getElementById('chartBekerja'),
                    cLamaKuliah = document.getElementById('chartLamaKuliah');
      
<<<<<<< HEAD
                    
=======
>>>>>>> 84e084bdb39e2781841d2f201b35d1d85fd9b45a
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

              });

              new Chart(cBekerja, {
                type: 'pie',
                data: {
                  labels: ["Sudah Bekerja", "Belum Bekerja", "Wirausaha"],
                  datasets: [{
                    label: 'Jumlah',
                    data: [sudahBekerja, belumBekerja, 8],
                    hoverOffset: 4,
                    backgroundColor: [
                      '#47A992',
                      'red',
                      '#36A2EB'
                    ],
                  }]
                }
              });

<<<<<<< HEAD

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
=======
              new Chart(cLamaKuliah, {
                type: 'bar',
                data: {
                  labels: dataNama,
                  datasets: [{
                    label: 'Tahun',
                    data: {{$dataLamaKuliah}},
                    hoverOffset: 4,
                    borderWidth:2,
                    backgroundColor: <?=$warnaBar?>
>>>>>>> 84e084bdb39e2781841d2f201b35d1d85fd9b45a
                  }]
                }
              });
            </script>
                      @endif
@endsection
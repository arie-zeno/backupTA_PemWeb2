@extends("alumni.layouts.main")
@section("container")
<meta name="csrf-token" content="{{csrf_token()}}"/>
<h1>Isi Biodata</h1>

<div class="col-sm-6 pb-5">

    <form method="POST" action="/alumni/bios" enctype="multipart/form-data">
        @csrf
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Nama</label>
      <input type="name" class="form-control" id="exampleInputname1" aria-describedby="nameHelp" value="{{auth()->user()->name}} " name="name">
    </div>
    <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
    <div class="mb-3">
        <label for="foto" class="form-label">foto</label>
        <input type="file" class="form-control" id="foto" name="foto" placeholder="foto">
    </div>
    <div class="mb-3">
        <label for="nim" class="form-label">NIM</label>
        <input type="text" class="form-control @error('nim')
            is-invalid
        @enderror" id="nim" name="nim" placeholder="NIM" value="{{auth()->user()->nim}}">
    </div>

    <div class="mb-3">
        <label for="kontak" class="form-label">Kontak</label>
        <input type="number" class="form-control @error('kontak')
        is-invalid
    @enderror" id="kontak" name="kontak" placeholder="Contoh : 0822xxxxxxxx" >
    </div>

    <div class="mb-3">
        <label for="tglMasuk" class="form-label">Tanggal Masuk</label>
        <input type="date" class="form-control @error('tglMasuk')
        is-invalid
    @enderror" id="tglMasuk" name="tglMasuk" placeholder="Contoh : 2015">
    </div>

    <div class="mb-3">
        <label for="tglLulus" class="form-label">Tanggal Kelulusan</label>
        <input type="date" class="form-control @error('tglLulus')
        is-invalid
    @enderror" id="tglLulus" name="tglLulus" placeholder="Contoh : 2015">
    </div>

    <div class="mb-3">
        <label for="noIjazah" class="form-label">Nomor Ijazah</label>
        <input type="text" class="form-control @error('noIjazah')
        is-invalid
    @enderror" id="noIjazah" name="noIjazah" placeholder="Nomor Ijazah ">
    </div>

    <div class="mb-3">
        <label for="fotoIjazah" class="form-label">Scan Ijazah</label>
        <input type="file" class="form-control @error('fotoIjazah')
        is-invalid
    @enderror" id="fotoIjazah" name="fotoIjazah" placeholder="foto Ijazah">
    </div>

    <div class="mb-3">
        <label for="ipk" class="form-label">IPK</label>
        <input type="text" class="form-control @error('ipk')
        is-invalid
    @enderror" id="ipk" name="ipk" placeholder="Contoh : 3.8">
    </div>

    <div class="mb-3">
        <label for="thnLulus" class="form-label">Tempat, Tanggal Lahir</label>
        <div class="input-group">
            <input type="text" aria-label="First name" class="form-control @error('tempatLahir')
            is-invalid
        @enderror" name="tempatLahir" placeholder="Tempat Lahir">
            <input type="date" aria-label="Last name" class="form-control @error('tglLahir')
            is-invalid
        @enderror" name="tglLahir">
        </div>
    </div>

    <label class="form-label" >Alamat</label>
    <div class="input-group mb-3">
        <label class="input-group-text " for="provinsi">Provinsi</label>
        <select class="form-select" id="provinsi" name="provinsi">
          <option selected>--Pilih Provinsi--</option>
          @foreach ($provinces as $provinsi )  
          <option value="{{$provinsi->id}}">{{$provinsi->name}}</option>
          @endforeach
        </select>
      </div>

      <div class="input-group mb-3">
        <label class="input-group-text" for="kabupaten">Kabupaten</label>
        <select class="form-select" id="kabupaten" name="kabupaten">

        </select>
      </div>

      <div class="input-group mb-3">
        <label class="input-group-text" for="kecamatan">Kecamatan</label>
        <select class="form-select" id="kecamatan" name="kecamatan">

        </select>
      </div>

      <div class="input-group mb-3">
        <label class="input-group-text" for="kelurahan">Kelurahan</label>
        <select class="form-select" id="kelurahan" name="kelurahan">

        </select>
      </div>
      

    <div class="mb-3">
        <label for="jk" class="form-label">Jenis Kelamin</label>
        <select id="jk" class="form-select" aria-label="Default select example" name="jk">
            <option selected>--Pilih Jenis Kelamin--</option>
            <option value="laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
          </select>
    </div>

    <div class="mb-3">
        <label for="agama" class="form-label">Agama</label>
        <select class="form-select" aria-label="Default select example" name="agama">
            <option selected>--Pilih Agama--</option>
            <option value="islam">Islam</option>
            <option value="kristen">Kristen</option>
            <option value="hindu">Hindu</option>
            <option value="buddha">Buddha</option>
          </select>
    </div>

    <div class="mb-3">
        <label for="kawin" class="form-label">Status Perkawinan</label>
        <select id="kawin" class="form-select" aria-label="Default select example" name="kawin">
            <option selected>--Pilih Status Perkawinan--</option>
            <option value="belum">Belum Menikah</option>
            <option value="sudah">Sudah Menikah</option>
          </select>
    </div>

    <div class="mb-3">
        <label for="pekerjaan" class="form-label">Status Pekerjaan</label>
        <select class="form-select" aria-label="Default select example" name="pekerjaan">
            <option selected>--Pilih Status Pekerjaan--</option>
            <option value="belum">Belum Bekerja</option>
            <option value="sudah">Sudah Bekerja</option>
          </select>
    </div>
    


    <button type="submit" class="btn btn-primary">Selesai</button>
</form>
</div>


@endsection

<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>

<script>
    $(function(){
        $.ajaxSetup({
            headers: {'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')}
        });
    });

    $(function(){
        $('#provinsi').on('change', () => {
            let id_provinsi = $('#provinsi').val();
            
            $.ajax({
                type : "POST",
                url : "{{route('getKabupaten')}}",
                data : {id_provinsi:id_provinsi},
                cache : false,

                success: function(msg){
                    $('#kabupaten').html(msg);
                    $('#kecamatan').html('');
                    $('#kelurahan').html('');
                },
                error: (data) => {
                    console.log('error', data)
                }
            })
        })

        $('#kabupaten').on('change', () => {
            let id_kabupaten = $('#kabupaten').val();
            
            $.ajax({
                type : "POST",
                url : "{{route('getKecamatan')}}",
                data : {id_kabupaten:id_kabupaten},
                cache : false,

                success: function(msg){
                    $('#kecamatan').html(msg);
                    $('#kelurahan').html('');
                },
                error: (data) => {
                    console.log('error', data)
                }
            })
        })

        $('#kecamatan').on('change', () => {
            let id_kecamatan = $('#kecamatan').val();
            
            $.ajax({
                type : "POST",
                url : "{{route('getKelurahan')}}",
                data : {id_kecamatan:id_kecamatan},
                cache : false,

                success: function(msg){
                    $('#kelurahan').html(msg);
                },
                error: (data) => {
                    console.log('error', data)
                }
            })
        })
    })
</script>
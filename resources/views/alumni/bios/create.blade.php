@extends("alumni.layouts.main")
@section("container")
<h1>Isi Biodata</h1>

<div class="col-sm-6">

    <form method="POST" action="/alumni/bios" enctype="multipart/form-data">
        @csrf
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Nama</label>
      <input type="name" class="form-control" id="exampleInputname1" aria-describedby="nameHelp" value="{{auth()->user()->name}} " name="name">
    </div>
    <input type="hidden" name="id" value="{{auth()->user()->id}}">
    <div class="mb-3">
        <label for="foto" class="form-label">foto</label>
        <input type="file" class="form-control" id="foto" name="foto" placeholder="foto">
    </div>
    <div class="mb-3">
        <label for="nim" class="form-label">NIM</label>
        <input type="text" class="form-control @error('nim')
            is-invalid
        @enderror" id="nim" name="nim" placeholder="NIM">
    </div>

    <div class="mb-3">
        <label for="thnLulus" class="form-label">Tahun Lulus</label>
        <input type="text" class="form-control" id="thnLulus" name="thnLulus" placeholder="Contoh : 2015">
    </div>

    <div class="mb-3">
        <label for="thnLulus" class="form-label">Tempat, Tanggal Lahir</label>
        <div class="input-group">
            <input type="text" aria-label="First name" class="form-control" name="tempatLahir" placeholder="Tempat Lahir">
            <input type="date" aria-label="Last name" class="form-control" name="tglLahir">
        </div>
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
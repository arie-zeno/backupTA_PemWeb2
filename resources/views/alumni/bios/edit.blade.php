@extends("alumni.layouts.main")
@section("container")
<h1>Isi Biodata</h1>

<div class="col-sm-6">

    <form method="POST" action="/alumni/bios/{{$bio->nim}}" enctype="multipart/form-data">
        @method("put")
        @csrf
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Nama</label>
      <input type="name" class="form-control" id="exampleInputname1" aria-describedby="nameHelp" value="{{$bio->name}} " name="name">
    </div>
    <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
    <div class="mb-3">
        <label for="foto" class="form-label">foto</label>
        <input type="file" class="form-control" id="foto" name="foto" placeholder="foto" value="{{asset('storage/' . $bio->foto) }}">
    </div>
    <div class="mb-3">
        <label for="nim" class="form-label">NIM</label>
        <input type="text" class="form-control @error('nim')
            is-invalid
        @enderror" id="nim" name="nim" placeholder="NIM" value="{{$bio->nim}}">
    </div>

    <div class="mb-3">
        <label for="thnLulus" class="form-label">Tahun Lulus</label>
        <input type="text" class="form-control" id="thnLulus" name="thnLulus" placeholder="Contoh : 2015" value="{{$bio->thnLulus}}">
    </div>

    <div class="mb-3">
        <label for="thnLulus" class="form-label">Tempat, Tanggal Lahir</label>
        <div class="input-group">
            <input type="text" aria-label="First name" class="form-control" name="tempatLahir" placeholder="Tempat Lahir" value="{{$bio->tempatLahir}}">
            <input type="date" aria-label="Last name" class="form-control" name="tglLahir" value="{{$bio->tglLahir}}">
        </div>
    </div>

    <div class="mb-3">
        <label for="jk" class="form-label">Jenis Kelamin</label>
        <select id="jk" class="form-select" aria-label="Default select example" name="jk" >
            <option selected value="{{ $bio->jk }}">{{ $bio->jk }}</option>
            <option value="laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
          </select>
    </div>

    <div class="mb-3">
        <label for="agama" class="form-label">Agama</label>
        <select class="form-select" aria-label="Default select example" name="agama">
            <option selected value="{{ $bio->agama }}">{{ $bio->agama }}</option>
            <option value="islam">Islam</option>
            <option value="kristen">Kristen</option>
            <option value="hindu">Hindu</option>
            <option value="buddha">Buddha</option>
          </select>
    </div>

    <div class="mb-3">
        <label for="kawin" class="form-label">Status Perkawinan</label>
        <select id="kawin" class="form-select" aria-label="Default select example" name="kawin">
            <option selected value="{{ $bio->kawin }}">{{ $bio->kawin  }}</option>
            <option value="belum">Belum Menikah</option>
            <option value="sudah">Sudah Menikah</option>
          </select>
    </div>

    <div class="mb-3">
        <label for="pekerjaan" class="form-label">Status Pekerjaan</label>
        <select class="form-select" aria-label="Default select example" name="pekerjaan">
            <option selected value="{{ $bio->pekerjaan }}"> {{ $bio->pekerjaan }}</option>
            <option value="belum">Belum Bekerja</option>
            <option value="sudah">Sudah Bekerja</option>
          </select>
    </div>
    


    <button type="submit" class="btn btn-primary">Selesai</button>
</form>
</div>
@endsection
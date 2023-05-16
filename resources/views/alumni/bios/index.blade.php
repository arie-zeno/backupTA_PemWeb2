@extends("alumni.layouts.main")
@section("container")
@if (count($biodatas) < 1)
    
<a href="/alumni/bios/create">isi biodata</a>
@endif
<h1>Halaman biodata</h1>


<div class="col-sm-4 bg-light p-4 rounded mt-5">
    @foreach ($biodatas as $biodata)
    
        <label class="text-secondary" for="">Nama</label>
        <h6 class="fw-bold">{{$biodata->name}}</h6>

        <label class="text-secondary" for="">NIM</label>
        <h6 class="fw-bold">{{$biodata->nim}}</h6>

        <label class="text-secondary" for="">Tempat Tanggal Lahir</label>
        <h6 class="fw-bold">{{$biodata->tempatLahir}}, {{$biodata->tglLahir}}</h6>

        <label class="text-secondary" for="">Jenis Kelamin</label>
        <h6 class="fw-bold">{{$biodata->jk}}</h6>

        <label class="text-secondary" for="">Agama</label>
        <h6 class="fw-bold">{{$biodata->agama}}</h6>

        <label class="text-secondary" for="">Status Pernikahan</label>
        <h6 class="fw-bold">{{$biodata->kawin}} kawin</h6>

        
        
    @endforeach
</div>

@endsection
@extends("alumni.layouts.main")
@section("container")

<h1 class="mt-4">Halaman Biodata</h1>

@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{session('success')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if (session()->has('loginError'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{session('loginError')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (count($biodatas) < 1)
    
    
    <div class="col-sm-4 bg-light p-4 rounded mt-5">
        <h5>Anda belum mengisi biodata, silahkan <a href="/alumni/bios/create">isi biodata</a></h5>
    </div>
@else


@foreach ($biodatas as $biodata)
<div class="row">

    <div class="col-sm-4 bg-light p-4 rounded mt-5">
        
        <!-- <label class="text-secondary" for="">Nama</label> -->
        @if($biodata->foto)
        <img src="{{asset('storage/' . $biodata->foto) }}" class="img-thumbnail" alt="...">
        @else
            <img src="/img/noImage.png" class="img-thumbnail" alt="...">
        @endif
    </div>

<div class="col-sm-4 bg-light p-4 rounded mt-5">
    
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
        
        <label class="text-secondary" for="">Tahun Masuk</label>
        <h6 class="fw-bold">{{$biodata->thnMasuk}}</h6>

        <label class="text-secondary" for="">Tahun Kelulusan</label>
        <h6 class="fw-bold">{{$biodata->thnLulus}}</h6>
        
        
        <label class="text-secondary" for="">Lama Masa Studi</label>
        <h6 class="fw-bold">{{$biodata->thnLulus - $biodata->thnMasuk}} Tahun</h6>
        
        <h6 class="mt-5">Edit data <a href="/alumni/bios/{{ $biodata->nim }}/edit">biodata</a> </h6>
        
    </div>
</div>
    @endforeach

@endif

@endsection
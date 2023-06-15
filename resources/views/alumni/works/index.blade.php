@extends("alumni.layouts.main")
@section("container")

<<<<<<< HEAD
<?php
use Carbon\Carbon
?>
<h1 class="mt-4">Halaman Pekerjaan</h1>
@if ( $pekerjaan[0]->pekerjaan === 'belum')
    <div class="col-sm-4 bg-light p-4 rounded mt-5">
        <h5>Anda belum bisa mengisi data pekerjaan karena status anda belum bekerja</h5>
    </div>
@elseif (count($pekerjaan) < 1)
=======
{{-- @dd($pekerjaans[0]->works) --}}
<h1 class="mt-4">Halaman Pekerjaan</h1>
@if (count($biodatas[0]->works) == 0)
    
    
>>>>>>> 84e084bdb39e2781841d2f201b35d1d85fd9b45a
    <div class="col-sm-4 bg-light p-4 rounded mt-5">
        <h5>Anda belum mengisi data pekerjaan, silahkan <a href="/alumni/works/create">isi data pekerjaan</a></h5>
    </div>
@else


<div class="col-sm-4 bg-light p-4 rounded mt-5">
<<<<<<< HEAD
@foreach ($pekerjaan as $p )

    <label class="text-secondary" for="">Nama</label>
    <h6 class="fw-bold">{{$p->biodata->name}}</h6>

    <label class="text-secondary" for="">Kategori Pekerjaan</label>
    <h6 class="fw-bold">{{$p->kategori_pekerjaan}}</h6>

    <label class="text-secondary" for="">Bekerja Sebagai</label>
    <h6 class="fw-bold">{{$p->nama_pekerjaan}}</h6>

    <label class="text-secondary" for="">Alamat Pekerjaan</label>
    <h6 class="fw-bold">{{$p->tempat_pekerjaan}}</h6>

    <label class="text-secondary" for="">Mulai Bekerja</label>
    <h6 class="fw-bold">{{Carbon::parse($p->tanggal_pekerjaan)->locale('id')->diffForHumans()}} ({{$p->tanggal_pekerjaan}})</h6>
    <!-- <h6 class="fw-bold">{{$p->tanggal_pekerjaan}}</h6> -->
    
    <label class="text-secondary" for="">Tahun Kelulusan</label>
    <h6 class="fw-bold">{{$p->biodata->thnLulus}}</h6>


    <label class="text-secondary" for="">Kisaran Gaji</label>
    <h6 class="fw-bold">Rp. {{$p->gaji}}</h6>


    <h6 class="mt-5">Edit data <a class="text-primary" href="/alumni/works/{{$p->id}}/edit">pekerjaan</a></h6>
@endforeach
=======
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
>>>>>>> 84e084bdb39e2781841d2f201b35d1d85fd9b45a
</div>

@endif

@endsection
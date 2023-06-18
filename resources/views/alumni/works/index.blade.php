@extends("alumni.layouts.main")
@section("container")

<?php
use Carbon\Carbon;
?>
<h1 class="mt-4">Halaman Pekerjaan</h1>


@if (count($pekerjaan) != 0)
    

@if($pekerjaan[0]->pekerjaan == "belum")
    <div class="col-sm-4 bg-light p-4 rounded mt-5">
        <h5>Anda tidak bisa mengisi data pekerjaan karena status anda belum bekerja</h5>
    </div>
@else
    @if (count($pekerjaan[0]->works) == 0)
        <div class="col-sm-4 bg-light p-4 rounded mt-5">
            <h5>Anda belum mengisi data pekerjaan, silahkan <a href="/alumni/works/create">isi data pekerjaan</a></h5>
        </div>
    @else
        <div class="col-sm-4 bg-light p-4 rounded mt-5">

        <label class="text-secondary" for="">Nama</label>
        <h6 class="fw-bold">{{$pekerjaan[0]->name}}</h6>

        <label class="text-secondary" for="">Kategori Pekerjaan</label>
        <h6 class="fw-bold">{{$pekerjaan[0]->works[0]->kategori_pekerjaan}}</h6>

        <label class="text-secondary" for="">Bekerja Sebagai</label>
        <h6 class="fw-bold">{{$pekerjaan[0]->works[0]->nama_pekerjaan}}</h6>

        <label class="text-secondary" for="">Alamat Pekerjaan</label>
        <h6 class="fw-bold">{{$pekerjaan[0]->works[0]->tempat_pekerjaan}}</h6>

        <label class="text-secondary" for="">Tahun Kelulusan</label>
        <h6 class="fw-bold">{{$pekerjaan[0]->thnLulus}}</h6>


        <label class="text-secondary" for="">Mulai Bekerja</label>
        <h6 class="fw-bold">{{Carbon::parse($pekerjaan[0]->works[0]->tanggal_pekerjaan)->locale('id')->diffForHumans($pekerjaan[0]->thnLulus . '0101')}} (kelulusan)</h6>
        <!-- <h6 class="fw-bold">{{$pekerjaan[0]->tanggal_pekerjaan}}</h6> -->


        <label class="text-secondary" for="">Kisaran Gaji</label>
        <h6 class="fw-bold">Rp. {{$pekerjaan[0]->works[0]->gaji}}</h6>


        <h6 class="mt-5">Edit data <a class="text-primary" href="/alumni/works/{{$pekerjaan[0]->works[0]->id}}/edit">pekerjaan</a></h6>
    </div>
    @endif
@endif
@else
        <div class="col-sm-4 bg-light p-4 rounded mt-5">
            <h5>Anda belum mengisi data pekerjaan, silahkan <a href="/alumni/works/create">isi data pekerjaan</a></h5>
        </div>
@endif


@endsection
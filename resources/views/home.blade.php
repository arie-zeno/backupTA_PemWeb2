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

        <div class="row" style="height: 90vh">
            <div class="col-sm-6 msx-auto">
                <h2 class="fw-bold" id="statistik">Statistik</h2>
                <p>Jumlah alumni Pendidikan Computer {{count($biodatas)}} </p>
            </div>
        </div>
    </div>
@endsection
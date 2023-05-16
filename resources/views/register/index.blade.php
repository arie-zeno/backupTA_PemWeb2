@extends("layouts.main")
@section("container")

    <div class="row align-items-center" style="height: 90vh">
        <div class="col-sm-3 m-auto">
            <h3 class="text-center">From Registrasi</h3>
            <form action="/register" method="post">
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="floatingInput" placeholder="Nama" value="{{old('name')}}">
                    <label for="floatingInput">Masukkan Nama</label>
                    @error('name')
                        <div class="invalid-feedback">  
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="email" name="email" class="form-control @error('email')
                        is-invalid
                    @enderror" id="floatingInput" placeholder="name@example.com" value="{{old('email')}}">
                    <label for="floatingInput">Masukkan Email</label>
                    @error('email')
                        <div class="invalid-feedback">  
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="password" name="password" class="form-control @error('password')
                        is-invalid
                    @enderror" id="floatingPassword" placeholder="Password" >
                    <label for="floatingPassword">Password</label>
                    @error('password')
                        <div class="invalid-feedback">  
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div>
                    <button type="submit" name="register" class="btn btn-primary mt-3">Register</button>
                </div>
            </div>
        </form>
    </div>

@endsection
@extends("layouts.main")
@section("container")

<style>
    .container-login{
        background-image: url('/img/SAM_2141.JPG');
        background-attachment: fixed;
        background-size: cover;
    }
    .form-login{
        background-color: #000000ad;
    }
</style>
    <div class="container-login row align-items-center" style="height: 100vh">
        <div class="form-login col-sm-3 m-auto border py-5">

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
            <h3 class="text-center text-white mb-5">Silahkan Login</h3>
            <form action="/login" method="post" class="">
                @csrf
                <div class="form-floating mb-3">
                    <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
                    <label for="floatingInput">Masukkan Email</label>
                </div>
                <div class="form-floating">
                    <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                    <label for="floatingPassword">Password</label>
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" name="login" class="btn btn-primary mt-3">Login</button>
                </div>
            </div>
        </form>
    </div>

@endsection
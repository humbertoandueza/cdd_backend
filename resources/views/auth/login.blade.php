@extends('index')
@section('content')
    <div class="container">
        <form action="{{ route('login-post')}}" method="POST">
        <div class="row flex-column justify-content-center align-items-center form-box">
                @csrf
                <div class="col-12 col-sm-8 col-lg-5 d-flex">
                    <img class="banner-img" src="{{asset('assets/images/icons/Logo Letras Negras sin Fondo.png')}}" alt="">
                </div>
                <div class="col-12 col-sm-8 col-lg-5 bg-orange text-light p-5">
                    <h2 class="text-light">Iniciar Sesión</h2>
                    <div class="my-1">
                        <label for="email" class="form-label">Correo</label>
                        <input type="email" name="email" class="form-control" placeholder="Correo">
                    </div>
                    <div class="my-1">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" name="password" class="form-control" placeholder="Contraseña">
                    </div>
                    <button type="submit" class="btn btn-dark mt-2 w-100">Entrar</button>
                </div>
            </div>
        </form>
    </div>

@endsection

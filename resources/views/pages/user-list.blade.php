@extends('layouts.main')
@include('layouts.sidebar')
@include('layouts.navbar')

@section('user-lists')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Lista de usuarios
                            <small>Alianza Admin panel</small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item">
                            <a href="index.html">
                                <i data-feather="home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item">Usuarios</li>
                        <li class="breadcrumb-item active">Lista</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <form class="" method="GET" action="{{ route('list-user') }}">
            <div class="row">
                <div class="col-2">
                    <label for="status" class="form-label m-0">Estado</label>
                    <select class="form-select" name="filter" aria-label="Default select example">
                        <option value="ACTIVE">ACTIVO</option>
                        <option value="INACITVE">INACTIVO</option>
                    </select>
                </div>
                <div class="col-5">
                    <div class="input-group search">
                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                        <input type="text" class="form-control search-input" value="{{ $search }}" name="search"
                            placeholder="Buscar" aria-label="Buscar" aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="col-3">
                    <button type="submit" class="btn btn-secondary mt-3">Filtrar</button>
                </div>
            </div>

        </form>
        <div class="card">
            <div class="card-header justify-content-end">

                <a href="{{route('user-form', ['action' => 'create'])}}" class="btn btn-primary mt-md-0 mt-2">Crear usuario</a>
            </div>

            @if (session('success'))
                <div class="bg-success p-2">{{session('success')}}</div>
            @endif
            <div class="card-body">
                <div class="table-responsive table-desi">
                    <table class="all-package coupon-table table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Foto</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Estatus</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($users as $user )
                            <tr data-row-id="1">
                                <td>{{$loop->iteration}}</td>
                                <td>
                                    <img src="{{asset('assets/images/avatar/'.$user->picture)}}" alt="">
                                </td>

                                <td>{{$user->name}}</td>

                                <td>{{$user->email}}</td>

                                <td>{{$user->status}}</td>

                                <td>
                                    <a href="{{route('user-form', ['action' => 'edit', 'id' => $user->id])}}">
                                        <button class="btn btn-primary"><i class="bi bi-pencil-square"></i></button>
                                    </a>
                                    <a href="{{route('delete-user', ['id' => $user->id])}}">
                                        <button class="btn btn-danger"><i class="bi bi-person-x-fill"></i></button>
                                    </a>
                                </td>
                            </tr>
                            @empty
                                <h2>No hay usuarios</h2>
                            @endforelse
                            {!!$users->links()!!}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
@endsection

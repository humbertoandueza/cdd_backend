@extends('layouts.main')
@include('layouts.sidebar')
@include('layouts.navbar')

@section('store-lists')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Lista de Tiendas
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
                        <li class="breadcrumb-item">Tiendas</li>
                        <li class="breadcrumb-item active">Lista</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <form class="" method="GET" action="{{ route('list-store') }}">
            <div class="row">
                <div class="col-2">
                    <label for="status" class="form-label m-0">Buscar por:</label>
                    <select class="form-select" name="searchBy" aria-label="Default select example">
                        <option value="name">Nombre</option>
                        <option value="user">Propietario</option>
                    </select>
                </div>
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

                <a href="{{ route('store-form', ['action' => 'create']) }}" class="btn btn-primary mt-md-0 mt-2">Crear
                    tienda</a>
            </div>

            @if (session('success'))
                <div class="bg-success p-2">{{ session('success') }}</div>
            @endif
            {{-- <div class="card-body">
                <div class="table-responsive table-desi">
                    <table class="all-package coupon-table table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Foto</th>
                                <th>Nombre</th>
                                <th>Propietario</th>
                                <th>Email</th>
                                <th>Estatus</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($stores as $store)
                                <tr data-row-id="1">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <img src="{{ asset('assets/images/storeProfile/' . $store->picture) }}"
                                            alt="">
                                    </td>

                                    <td>{{ $store->name }}</td>

                                    <td>{{ $store->user->name }}</td>

                                    <td>{{ $store->email }}</td>

                                    <td>{{ $store->status }}</td>

                                    <td>
                                        <a href="{{ route('store-form', ['action' => 'edit', 'id' => $store->id]) }}">
                                            <button class="btn btn-primary"><i class="bi bi-pencil-square"></i></button>
                                        </a>
                                        <a href="{{ route('delete-store', ['id' => $store->id]) }}">
                                            <button class="btn btn-danger"><i class="bi bi-person-x-fill"></i></button>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <h2>No hay Tiendas</h2>
                            @endforelse
                            {!! $stores->links() !!}
                        </tbody>
                    </table>
                </div>
            </div> --}}
        </div>
        <div class="row">
            @forelse ($stores as $store)
                <div class="col-3">
                    <div class="card shadow">
                        <img src="{{ asset('assets/images/storeProfile/' . $store->picture) }}" class="card-img-top"
                            alt="...">
                        <div class="card-body">
                            <h5 class="card-title mb-3 text-dark fs-4 text-center">{{ $store->name }}</h5>
                            {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
                            <div class="d-flex justify-content-center">
                                <a href="{{route('detail-store', ['id' => $store->id])}}" class="btn btn-primary text-center">Ver tienda</a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
            @endforelse
        </div>
    </div>
    <!-- Container-fluid Ends-->
@endsection
